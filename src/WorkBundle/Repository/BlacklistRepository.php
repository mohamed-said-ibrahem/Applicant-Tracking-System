<?php

namespace WorkBundle\Repository;
use WorkBundle\Entity\Blacklist;
use WorkBundle\Repository\BlacklistRepository;

/**
 * Blacklist Repository class. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
class BlacklistRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Revoke token for the JWT token.
     *
     * @param token    JWT token to be revoked.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * there is no return type for this method as it is send token to the database.
     */ 
    public function blackToken($token)
    {       
        $em = $this->getEntityManager();        
        $blackObject = new Blacklist;        
        $blackObject->setToken($token);        
        $em->persist($blackObject);        
        $em->flush();
    }

    /**
     * Check if the current user token is revoked or not.
     *
     * @param token    JWT token to be checked.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns the token value if it is revoked or null if it is not.
     * @return $black 
     */ 
    public function isBlack($token)
    {        
        return $black = $this->findOneBy(["token" => $token]);  
    }
}
