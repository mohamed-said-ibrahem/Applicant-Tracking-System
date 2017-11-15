<?php

namespace WorkBundle\Service;

use Doctrine\ORM\EntityManager;
use WorkBundle\Entity\Application;

class ApplicationService {
    
    private $em;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }
    
    
    
    public function findApplicantByNameOrEmail($input)
    {
        return $this->em->getRepository('WorkBundle:Application')
                ->findByUserOrEmail($input);
    }
    
    public function findApplicantByPosition($position)
    {
        return $this->em->getRepository('WorkBundle:Application')
                ->findByPosition($position);
    }
    
    public function findApplicantByPhone($phone)
    {
        return $this->em->getRepository($entityName)
                ->findByPhone($phone);
    }
    
    
}
