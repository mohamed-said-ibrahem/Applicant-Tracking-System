<?php namespace WorkBundle\Controller;

use Captcha\Bundle\CaptchaBundle\Security\Core\Exception\InvalidCaptchaException;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use ReCaptcha\ReCaptcha; // Include the recaptcha lib

class SecurityController extends BaseController
{
  public function loginAction(Request $request)
  {
    /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
    $session = $request->getSession();

    if (class_exists('\Symfony\Component\Security\Core\Security')) {
      $authErrorKey = Security::AUTHENTICATION_ERROR;
      $lastUsernameKey = Security::LAST_USERNAME;
    } else {
      // BC for SF < 2.6
      $authErrorKey = SecurityContextInterface::AUTHENTICATION_ERROR;
      $lastUsernameKey = SecurityContextInterface::LAST_USERNAME;
    }

    // get captcha object instance
    $captcha = $this->get('captcha')->setConfig('LoginCaptcha');

    
    if ($request->isMethod('POST')) {
      $recaptcha = new ReCaptcha('6LftWT0UAAAAAIvF7gU8qscf-Vc5ZhkTTLBv490U');
      $resp = $recaptcha->verify($request->request
      ->get('g-recaptcha-response'), $request->getClientIp());
      if (!$resp->isSuccess()) {
        // Do something if the submit wasn't valid ! Use the message to show something
        $message = "The reCAPTCHA wasn't entered correctly. Go back and try it again.";
        echo $message;
      }else{
      // validate the user-entered Captcha code when the form is submitted
      $code = $request->request->get('captchaCode');
      $isHuman = $captcha->Validate($code);
      if ($isHuman) {
        // Captcha validation passed, check username and password
        return $this->redirectToRoute('fos_user_security_check', [
          'request' => $request], 307);
      } else {
        // Captcha validation failed, set an invalid captcha exception in $authErrorKey attribute
        $invalidCaptchaEx = new InvalidCaptchaException('CAPTCHA validation failed, try again.');
        $request->attributes->set($authErrorKey, $invalidCaptchaEx);

        // set last username entered by the user
        $username = $request->request->get('_username', null, true);
        $request->getSession()->set($lastUsernameKey, $username);
      }
    }
  }

    // get the error if any (works with forward and redirect -- see below)
    if ($request->attributes->has($authErrorKey)) {
      $error = $request->attributes->get($authErrorKey);
    } elseif (null !== $session && $session->has($authErrorKey)) {
      $error = $session->get($authErrorKey);
      $session->remove($authErrorKey);
    } else {
      $error = null;
    }

    if (!$error instanceof AuthenticationException) {
      $error = null; // The value does not come from the security component.
    }

    // last username entered by the user
    $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

    if ($this->has('security.csrf.token_manager')) {
      $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
    } else {
      // BC for SF < 2.4
      $csrfToken = $this->has('form.csrf_provider')
        ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
        : null;
    }

    return $this->renderLogin(array(
      'last_username' => $lastUsername,
      'error' => $error,
      'csrf_token' => $csrfToken,
      'captcha_html' => $captcha->Html()
    ));
  }
  
}