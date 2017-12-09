<?php

namespace WorkBundle\Repository;

use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\Application;
/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ApplicationRepository extends \Doctrine\ORM\EntityRepository
{

    public function findByUserOrEmail($input)
    {
        $applicants = $this->createQueryBuilder('a')
                ->select()
                ->where('a.first_name LIKE :name')
                ->orWhere('a.middle_name LIKE :name')
                ->orWhere('a.last_name LIKE :name')
                ->setParameter('name', '%' . $input . '%')
                ->orWhere('a.email LIKE :email')
                ->setParameter('email', '%' . $input . '%')
                ->orderBy('a.id', 'ASC')
                ->getQuery()
                ->getResult();
        return $applicants;
    }
     
    public function findByPhone($phone)
    {
        $applicant = $this->createQueryBuilder('b')
                ->select()
                ->where('b.phone_number = :phone')
                ->setParameter('phone',$phone)
                ->getQuery()
                ->getResult();
        return $applicant;
    }

    public function filterByPosition($userPosition)
    {
        $applicants = $this->createQueryBuilder('c')
                ->select()
                ->where('c.applied_position = :position')
                ->setParameter('position', $userPosition )
                ->getQuery()
                ->getResult();
        return $applicants;
    }
    
    public function deleteApplication($applicationId)
    { 
        $this->createQueryBuilder('d')
             ->delete()
             ->where('d.id = :id')
             ->setParameter('id',$applicationId)
             ->getQuery()
             ->execute();
    }

    public function getAllApplications()
    {
        $applications = $this->createQueryBuilder('e')
                ->select()
                ->getQuery()
                ->getResult();
        return $applications;
    }
}

