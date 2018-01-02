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
use WorkBundle\Exception\WorkBundleError;
use WorkBundle\Service\ApplicationService;
use WorkBundle\Utility\PageUtility;
use WorkBundle\Constant\Error;
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
  * handle the user login action.
  * @param request   the request to the action.
  *
  * @author Mohamed Said.
  * 
  * returns failed or success login state.
  */ 
  public function loginAction(Request $request)
  {   
      $invalidReCaptchaExMsg =null;$invalidCaptchaExMsg=null;    
      $captcha = $this->get('captcha')->setConfig('LoginCaptcha');
    if($request->isMethod('POST'))
    {
      if (!($this->recapatchaCheck($request))->isSuccess())
      {$invalidReCaptchaExMsg = (new WorkBundleError(Error::INVALID_RECAPATCHA))->getMessage();}
      if(!($captcha->Validate($request->request->get('captchaCode'))))
      {$invalidCaptchaExMsg = (new WorkBundleError(Error::INVALID_CAPATCHA))->getMessage();}
      if(is_null($invalidReCaptchaExMsg) && is_null($invalidCaptchaExMsg))
      {
        if ($this->getUserInfo($request))
        {
          $this->setTokenLocal($request,$this->getUserInfo($request),$request->request->get('_password'));
        }
        return $this->redirectToRoute('fos_user_security_check',['request' => $request,], 307);        
      }
      $request->getSession()->set(Security::LAST_USERNAME,$request->request->get('_username', null, true));
    }
      $error = $this->checkForErrorType($request,Security::AUTHENTICATION_ERROR,$request->getSession()); 
    
    if (!$error instanceof AuthenticationException){$error = null;}
     
      $lastUsername = (null === $request->getSession()) ? '' : ($request->getSession())->get(Security::LAST_USERNAME);
      $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
    return $this->renderLogin(array('last_username' => $lastUsername,'error' => $error,'csrf_token' => $csrfToken,'captcha_html' => $captcha->Html(),'capatcha_error'=> $invalidReCaptchaExMsg,'capatcha_error_2'=> $invalidCaptchaExMsg,));
  }

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
  private function recapatchaCheck(Request $request){
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
  private function getUserInfo(Request $request){
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
  private function setTokenLocal(Request $request,$user,$password){
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
  private function checkForErrorType(Request $request,$authErrorKey,$session)
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
  private function getToken(User $user)
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

}