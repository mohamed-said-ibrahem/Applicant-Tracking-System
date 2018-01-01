<?php 

namespace WorkBundle\Controller;

use Captcha\Bundle\CaptchaBundle\Security\Core\Exception\InvalidCaptchaException;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use ReCaptcha\ReCaptcha; // Include the recaptcha lib
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WorkBundle\Entity\User;
use WorkBundle\Entity\Application;
use WorkBundle\Entity\Education;
use WorkBundle\Entity\Blacklist;
use WorkBundle\Repository\BlacklistRepository;
use WorkBundle\Service\ApplicationService;
use WorkBundle\Utility\PageUtility;
use WorkBundle\Exception\WorkBundleException;
use WorkBundle\Constant\Exceptions;

class SecurityController extends BaseController
{
  use \WorkBundle\Helper\ControllerHelper;
  
  public function recapatchaCheck(Request $request){
    $recaptcha = new ReCaptcha('6LftWT0UAAAAAIvF7gU8qscf-Vc5ZhkTTLBv490U');
    $resp = $recaptcha->verify($request->request
    ->get('g-recaptcha-response'), $request->getClientIp());
    return $resp;
  }

  public function getUserInfo(Request $request){
    $username = $request->request->get('_username');
    $password = $request->request->get('_password');
    $user = $this->getDoctrine()
    ->getRepository('WorkBundle:User')
    ->findOneBy(['username' => $username]);
    return $user;
  }

  public function setTokenLocal(Request $request,$user,$password){
    global $error;    
      $isValid = $this->get('security.password_encoder')
      ->isPasswordValid($user, $password);
      if($isValid)
      {
        $token = $this->getToken($user);
      setcookie("_token_jwt","$token",time()+9999);
      }
      else{
        dump("asdsad");die;
      }
  }

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
      $code = $request->request->get('captchaCode');
      $isHuman = $captcha->Validate($code);
      $password = $request->request->get('_password');      
    if ($isHuman) {$user = $this->getUserInfo($request);
    if ($user) {$this->setTokenLocal($request,$user,$password);}
    return $this->redirectToRoute('fos_user_security_check',['request' => $request,], 307);}
    else{
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

  public function getToken(User $user)
  {
      return $this->container->get('lexik_jwt_authentication.encoder')
              ->encode([
                  'username' => $user->getUsername(),
                  'exp' => $this->getTokenExpiryDateTime(),
              ]);
  }

  private function getTokenExpiryDateTime()
  {
      $tokenTtl = $this->container->getParameter('lexik_jwt_authentication.token_ttl');
      $now = new \DateTime();
      $now->add(new \DateInterval('PT'.$tokenTtl.'S'));
   
      return $now->format('U');
  }

  public function blackTokenLogoutAction(Request $request)
  { 
    $data = $request->request->get('x');
     $token = $request->getContent();    
     $repo = $this->getDoctrine()->getRepository("WorkBundle:Blacklist");   
     $repo->blackToken($token); 
     return $this->redirectToRoute('thank_you');
  }

  public function logoutCheckAction(Request $request)
  {
    return $this->render('check_logout.html.twig');
  }

}