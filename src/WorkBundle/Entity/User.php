<?php

namespace WorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints as CaptchaAssert;

/**
* @ORM\Entity
* @ORM\Table(name="`user`")
*/
class User extends BaseUser
    {
        function __construct() {
        parent::__construct();
        $this->addRole("ROLE_SUPER_ADMIN");
    }
/**
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
* @ORM\Column(type="integer")
*/
    protected $id;
    public function getId()
    {
    return $this->id;
    }

// /**
// * @CaptchaAssert\ValidCaptcha(
// *      message = "CAPTCHA validation failed, try again."
// *     groups={"registration","login"} 
// */
    protected $captchaCode;
    public function getCaptchaCode()
    {
      return $this->captchaCode;
    }
  
    public function setCaptchaCode($captchaCode)
    {
      $this->captchaCode = $captchaCode;
    }
}