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
    
    public function findApplicantByPhone($phone)
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findByPhone($phone);
    }
    
    public function filterApplicantsByPosition($position)
    {
        return $this->em->getRepository('WorkBundle:Application')
                ->filterByPosition($position);
    }
    
    public function logout($token)
    {   
        $repo = $this->em->getRepository("WorkBundle:Blacklist");   
        $repo->blackToken($token);   
    }

}
