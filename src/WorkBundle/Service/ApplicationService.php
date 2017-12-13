<?php

namespace WorkBundle\Service;

use Doctrine\ORM\EntityManager;
use WorkBundle\Entity\Application;

/**
 * Application Service class the main service layer for the Applicants.
 *
 * This service class contains Application&Business logic. 
 *
 * @Author Mohamed said.
 */ 
class ApplicationService {
    
    private $em;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }
    
    /**
     * Creates new application for the applicant service.
     *
     * @param firstName         first name for the applicant.
     * @param middleName        middle name for the applicant.
     * @param lastName          last name for the applicant.
     * @param address           address for the applicant.
     * @param email             email for the applicant.
     * @param phoneNumber       phone number for the applicant.
     * @param idCardNumber      id card number for the applicant.
     * @param dateAvailable     date available for applicant to join.
     * @param desiredSalary     desired salary  for the applicant.
     * @param hiringWay         hiring way for the applicant.
     * @param interviewedBefore if applicant is interviewd before or not?
     * @param appliedPosition   apllied position for the applicant.
     * @param isWorkedBefore    if applicant worked before?
     * @param signature         applicant signature.
     * @param schoolName        apllicant school name.
     * @param schoolFrom        applicant start school date.
     * @param schoolTo          applicant end school date.
     * @param collegeName       apllicant college name.
     * @param collegeFrom       applicant college start date.
     * @param collegeTo         apllicant college end date.
     * @param isGraduated       does applicant graduate?
     * @param graduateDegree    applicant graduated degree. 
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * There is no return type for this method as it creates a new applicant only. 
     */ 
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
                
        // return $education;
    }

    public function findApplicantById($id)
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findApplicant($id);
    }

    public function findApplicantByNameOrEmail($input)
    {
        return $this->em->getRepository('WorkBundle:Application')
                ->findByNameOrEmail($input);
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
