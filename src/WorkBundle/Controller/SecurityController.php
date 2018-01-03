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
use WorkBundle\Exception\WorkBundleError;
use WorkBundle\Service\SecurityService;
use WorkBundle\Constant\Error;
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
    $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();        
    $error = $this->checkForErrorType($request,Security::AUTHENTICATION_ERROR,
    $request->getSession());
    $lastUsername = $request->request->get('_username', null, true);
    $captcha = $this->get('captcha')->setConfig('LoginCaptcha');
    $reCapatcha = $request->request->get('g-recaptcha-response');
    $capatchaCode = $request->request->get('captchaCode');    
    $userName = $request->request->get('_username');  
    $password = $request->request->get('_password');    
    $reCapachaParameter = $this->getParameter('recapacha');
    $clientIp = $request->getClientIp();
    $reCaptchaExMsg =null;
    $captchaExMsg=null;  

    if($request->isMethod('POST')) {
      $checkUserLogin = $this->get(SecurityService::class)
      ->loginNewUser($lastUsername,$error,$reCapatcha,$clientIp,$capatchaCode
      ,$captcha,$userName,$password,$csrfToken,$reCapachaParameter);

     if($checkUserLogin === true) {
       if($this->getUserInfo($userName)){
        $this->setTokenLocal($this->getUserInfo($userName),$password);}      
        return $this->redirectToRoute('fos_user_security_check',['request' => $request,], 307);
      }
      else {
          $reCaptchaExMsg = (new WorkBundleError(Error::INVALID_RECAPATCHA))->getMessage();
          $captchaExMsg = (new WorkBundleError(Error::INVALID_CAPATCHA))->getMessage();
       }
    }

    if (!$error instanceof AuthenticationException) {
        $error = null;
     }
        
    return $this->renderLogin(
        array(
          'last_username' => $lastUsername,
          'error' => $error,
          'csrf_token' => $csrfToken,
          'captcha_html' => $captcha->Html(),
          'capatcha_error'=> $reCaptchaExMsg,
          'capatcha_error_2'=> $captchaExMsg)
        );
  }

    /**
     * check for the reCAPATCHA validiation by comparing
     * public key with the private key.
     * @param reCapachaParameter   get new parameter to check for the capatcha.
     * @param recapatchaResponse   recapacha handling response. 
     * @param clientIp             client ip who has entered the recapacha.
     *
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns $resp the validiation response.
     */  
    private function recapatchaCheck($reCapachaParameter,
      $recapatchaResponse,$clientIp) {
        $recaptcha = new ReCaptcha($reCapachaParameter);
        $resp = $recaptcha->verify($recapatchaResponse,$clientIp);
        return $resp;
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
    private function getToken(User $user) {
      return $this->container->get('lexik_jwt_authentication.encoder')
             ->encode([
            'username' => $user->getUsername(),
            'exp' => $this->getTokenExpiryDateTime(),
              ]);
    }
    
    /**
    * get the expired date for the JWT token generated.
    *
    * @throws Some_Exception_Class  there is not exeptions.
    * @author Mohamed Said.
    * 
    * returns expired date & time for the JWT token so it will be revoked.
    */ 
    private function getTokenExpiryDateTime() {
      $tokenTtl = $this->container->getParameter('lexik_jwt_authentication.token_ttl');
      $now = new \DateTime();
      $now->add(new \DateInterval('PT'.$tokenTtl.'S'));

      return $now->format('U');
    }
    
    /**
     * check for the user name existence.
     *
     * @param username      the request to the action.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns $user an object of the user entity.
     */  
    private function getUserInfo($username) {
      $user = $this->get(SecurityService::class)
              ->checkForUser($username);
      return $user;
    }

   /**
    * pass the token to a cookie so we can store it at local storage.
    *
    * @param user        user who is login now.
    * @param password    user password.
    *
    * @throws Some_Exception_Class  there is not exeptions.
    * @author Mohamed Said.
    * 
    * there is no return type for this method.
    */  
    private function setTokenLocal($user,$password){
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
    private function checkForErrorType(Request $request,$authErrorKey,$session) {
      $findAuthError = $request->attributes->has($authErrorKey);
      $setAuthError = $request->attributes->get($authErrorKey);

      $error = $this->get(SecurityService::class)
               ->checkError($findAuthError,$setAuthError,$authErrorKey,$session);

      return $error;
    }

    /**
    * logout Avtion to logout the User.
    *
    * @param request      the request to the action.
    *
    * @throws Some_Exception_Class  there is not exeptions.
    * @author Mohamed Said.
    * 
    * returns a view for the Main page.
    */ 
    public function logoutCheckAction(Request $request) {
      return $this->render('check_logout.html.twig');
    }
  
}