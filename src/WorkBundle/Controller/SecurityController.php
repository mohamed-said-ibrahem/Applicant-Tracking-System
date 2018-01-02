<?php 

namespace WorkBundle\Controller;

use Captcha\Bundle\CaptchaBundle\Security\Core\Exception\InvalidCaptchaException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use WorkBundle\Repository\BlacklistRepository;
use WorkBundle\Exception\WorkBundleException;
use WorkBundle\Service\ApplicationService;
use WorkBundle\Utility\PageUtility;
use WorkBundle\Constant\Exceptions;
use WorkBundle\Entity\Application;
use WorkBundle\Entity\Education;
use WorkBundle\Entity\Blacklist;
use WorkBundle\Entity\User;
use ReCaptcha\ReCaptcha; 

/**
 * Security controller class.
 *
 */ 
class SecurityController extends BaseController
{
  use \WorkBundle\Helper\ControllerHelper;
  
  /**
  * check for the reCAPATCHA validiation by comparing
  * public key with the private key.
  *
  * @param request      the request to the action.
  * 
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns $resp the validiation response.
  */  
  public function recapatchaCheck(Request $request){
    $var = $this->getParameter('recapacha');
    $recaptcha = new ReCaptcha($var);
    $resp = $recaptcha->verify($request->request
    ->get('g-recaptcha-response'), $request->getClientIp());
    return $resp;
  }

  /**
  * check for the user name existence.
  *
  * @param request      the request to the action.
  * 
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns $user an object of the user entity.
  */  
  public function getUserInfo(Request $request){
    $username = $request->request->get('_username');
    $user = $this->getDoctrine()
    ->getRepository('WorkBundle:User')
    ->findOneBy(['username' => $username]);
    return $user;
  }

  /**
  * pass the token to a cookie so we can store it at local storage.
  *
  * @param request      the request to the action.
  * 
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns $user an object of the user entity.
  */  
  public function setTokenLocal(Request $request,$user,$password){
      $isValid = $this->get('security.password_encoder')
      ->isPasswordValid($user, $password);
      if($isValid)
      {
        $token = $this->getToken($user);
        setcookie("_token_jwt","$token",time()+9999);
      }
  }

  /**
  * check for the error type.
  *
  * @param request      the request to the action.
  * @param authErrorKey the authuntication error key.
  * @param session      the session which may contain an error.
  *
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns $error an error.
  */  
  public function checkForErrorType(Request $request,$authErrorKey,$session)
  {
    if ($request->attributes->has($authErrorKey)) {
      $error = $request->attributes->get($authErrorKey);
    } elseif (null !== $session && $session->has($authErrorKey)) {
      $error = $session->get($authErrorKey);
      $session->remove($authErrorKey);
    } else {
      $error = null;
    }
      return $error;
  }

  /**
  * generate the token for the user when the successufl login happens.
  *
  * @param user   the login user object.
  *
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns JWT token generated.
  */ 
  public function getToken(User $user)
  {
      return $this->container->get('lexik_jwt_authentication.encoder')
              ->encode([
                  'username' => $user->getUsername(),
                  'exp' => $this->getTokenExpiryDateTime(),]);
  }

  /**
  * get the expired date for the JWT token generated.
  *
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns expired date & time for the JWT token so it will be revoked.
  */ 
  private function getTokenExpiryDateTime()
  {
      $tokenTtl = $this->container->getParameter('lexik_jwt_authentication.token_ttl');
      $now = new \DateTime();
      $now->add(new \DateInterval('PT'.$tokenTtl.'S'));
   
      return $now->format('U');
  }

  /**
  * invoke JWT token generated.
  * @param request   the request to the action.
  *
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns a redirection to thank you route after the user logout.
  */ 
  public function blackTokenLogoutAction(Request $request)
  { 
    $data = $request->request->get('x');
     $token = $request->getContent();    
     $repo = $this->getDoctrine()->getRepository("WorkBundle:Blacklist");   
     $repo->blackToken($token); 
     return $this->redirectToRoute('thank_you');
  }

  /**
  * logout action with JWT revoke token.
  * @param request   the request to the action.
  *
  * @throws Some_Exception_Class  there is not exeptions.
  * @author Mohamed Said.
  * 
  * returns a redirection to revoke token Route.
  */ 
  public function logoutCheckAction(Request $request)
  {
    return $this->render('check_logout.html.twig');
  }

  /**
  * handle the user login action.
  * @param request   the request to the action.
  *
  * @throws INVALID_RECAPATCHA_EXCEPTION  there is not exeptions.
  * @throws INVALID_CAPATCHA_EXCEPTION  there is not exeptions.
  *
  * @author Mohamed Said.
  * 
  * returns failed or success login state.
  */ 
  public function loginAction(Request $request)
  {   
      $message =null;$invalidCaptchaEx=null;    
      $session = $request->getSession();
      $authErrorKey = Security::AUTHENTICATION_ERROR;
      $lastUsernameKey = Security::LAST_USERNAME;
      $captcha = $this->get('captcha')->setConfig('LoginCaptcha');
    if ($request->isMethod('POST')) {$resp = $this->recapatchaCheck($request);
    if (!$resp->isSuccess()) {      
      $message = new WorkBundleException(Exceptions::INVALID_RECAPATCHA_EXCEPTION);$message = $message->getMessage();}
    else{
      $code = $request->request->get('captchaCode');
      $isHuman = $captcha->Validate($code);
      $password = $request->request->get('_password');
    if ($isHuman) {$user = $this->getUserInfo($request);
    if ($user) {$this->setTokenLocal($request,$user,$password);}
    return $this->redirectToRoute('fos_user_security_check',['request' => $request,], 307);}
      $invalidCaptchaEx = new WorkBundleException(Exceptions::INVALID_CAPATCHA_EXCEPTION);
      $invalidCaptchaEx = $invalidCaptchaEx->getMessage();
      $request->attributes->set($authErrorKey, $invalidCaptchaEx);
      $username = $request->request->get('_username', null, true);
      $request->getSession()->set($lastUsernameKey, $username);}}
      $error = $this->checkForErrorType($request,$authErrorKey,$session);
    if (!$error instanceof AuthenticationException) {$error = null;}
      $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);
      $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
    return $this->renderLogin(array('last_username' => $lastUsername,'error' => $error,'csrf_token' => $csrfToken,'captcha_html' => $captcha->Html(),'capatcha_error'=> $message,'capatcha_error_2'=> $invalidCaptchaEx,));
  }
}