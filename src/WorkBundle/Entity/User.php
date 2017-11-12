<?php

namespace WorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
    
    public function __construct() {
    parent::__construct();
    $this->addRole("ROLE_ADMIN");
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