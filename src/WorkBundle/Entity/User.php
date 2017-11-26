<?php

namespace WorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

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

}