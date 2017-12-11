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
    
    public function createNewApplicant($firstName,$middleName,$lastName,
    $address,$email,$phoneNumber,$idCardNumber,$dateAvailable,$desiredSalary,
    $hiringWay,$interviewedBefore,$appliedPosition,$isWorkedBefore,$signature,
    $schoolName,$schoolFrom,$schoolTo,$schoolDegree,$collegeName,$collegeFrom,
    $collageTo,$isGraduated,$graduateDegree)
    {
       $employee = $this->em->getRepository('WorkBundle:Application')
                ->createApplication($firstName,$middleName,$lastName,
                $address,$email,$phoneNumber,$idCardNumber,$dateAvailable,$desiredSalary,
                $hiringWay,$interviewedBefore,$appliedPosition,$isWorkedBefore,$signature);
                
       $education = $this->em->getRepository('WorkBundle:Education')
                ->createEducation($employee,$schoolName,$schoolFrom,$schoolTo,
                $schoolDegree,$collegeName,$collegeFrom,$collageTo,$isGraduated,$graduateDegree);
                
        return $education;
    }

    public function findApplicantById($id)
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findApplicant($id);
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
    
    public function deleteApplicant($id)
    {
        $this->em->getRepository('WorkBundle:Application')
        ->deleteApplication($id);
    }

    public function findAllApplicants()
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findAllApplications();   
    }

    public function logout($token)
    {   
        $repo = $this->em->getRepository("WorkBundle:Blacklist");   
        $repo->blackToken($token);   
    }

}
