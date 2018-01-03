<?php

namespace WorkBundle\Service;


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
use WorkBundle\Repository\UserRepository;
use WorkBundle\Constant\Error;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\User;
use ReCaptcha\ReCaptcha; 


/**
 * Application Service class the main service layer for the Applicants.
 *
 * @Author Mohamed said.
 */ 
class SecurityService {
    use \WorkBundle\Helper\ControllerHelper;  

    private $repo;
    private $repo2;
    private $repo3;
    private $repo4;
    
    public function __construct($repo,$repo2,$repo3,$repo4) 
    {
        $this->repo = $repo;
        $this->repo2 = $repo2;
        $this->repo3 = $repo3;
        $this->repo4 = $repo4;
    }
        
    /**
    * handle the user login action.
    * @param request   the request to the action.
    *
    * @author Mohamed Said.
    * 
    * returns failed or success login state.
    */ 
    public function loginNewUser($lastUsername,$error,$reCapatcha,$clientIp,$capatchaCode
    ,$captcha,$userName,$password,$csrfToken,$reCapachaParameter) {     
        $reCaptchaExMsg = null;
        $captchaExMsg = null;
      if (!($this->recapatchaCheck($reCapachaParameter,$reCapatcha,$clientIp)->isSuccess())) {
        $reCaptchaExMsg = (new WorkBundleError(Error::INVALID_RECAPATCHA))->getMessage();
       }
      if(!($captcha->Validate($capatchaCode))) {
        $captchaExMsg = (new WorkBundleError(Error::INVALID_CAPATCHA))->getMessage();
       }
      if(is_null($reCaptchaExMsg) && is_null($captchaExMsg)) {
          return true;
        }
      else {
        return false;
      }
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
    * check for the user name existence.
    *
    * @param username      the request to the action.
    * 
    * @throws Some_Exception_Class  there is not exeptions.
    * @author Mohamed Said.
    * 
    * returns $user an object of the user entity.
    */  
    public function checkForUser($username){
      $user = $this->repo4->findOneBy(['username' => $username]);
      return $user;
    }

   /**
    * check for login Auth Error.
    *
    * @param findAuthError     check for auth error.
    * @param setAuthError      set auth error.
    * @param authErrorKey      auth error key.
    * @param session           session contains the error.
    * 
    * @throws Some_Exception_Class  there is not exeptions.
    * @author Mohamed Said.
    * 
    * returns $error an error.
    */  
    public function checkError($findAuthError,$setAuthError,$authErrorKey,$session) {
      if($findAuthError) {
        $error = $setAuthError;
       } 
      elseif(null !== $session && $session->has($authErrorKey)) {
        $error = $session->get($authErrorKey);
        $session->remove($authErrorKey);
       } 
      else {
        $error = null;
       }
        return $error;
    }

  }