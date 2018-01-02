<?php

namespace WorkBundle\Repository;
use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\User;

/**
 * User Repository class. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Search for the User by it is name.
     *
     * @param input  user name.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded User.
     * @return user 
     */ 
    public function findOneByName($input)
    {
        $user = $this->createQueryBuilder('a')
                ->select()
                ->where('a.username = :username')
                ->setParameter('username', '%' . $input . '%')
                ->getQuery()
                ->getResult();

        return $user;
    }
}
