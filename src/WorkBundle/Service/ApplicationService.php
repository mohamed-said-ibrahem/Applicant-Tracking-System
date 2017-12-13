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

    /**
     * Search for the applicant by it is id service.
     *
     * @param id     applicant id.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicant.
     * findApplicantById is a method of Application Repository.
     * @return findApplicant($id)
     */ 
    public function findApplicantById($id)
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findApplicant($id);
    }

    /**
     * Search for the applicant by it is name or email service.
     *
     * @param input     applicant name or email.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicants.
     * findByNameOrEmail is a method of Application Repository.
     * @return findByNameOrEmail($input)
     */ 
    public function findApplicantByNameOrEmail($input)
    {
        return $this->em->getRepository('WorkBundle:Application')
                ->findByNameOrEmail($input);
    }
    
    /**
     * Search for the applicant by it is phone number service.
     *
     * @param phone     applicant phone number.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicant.
     * findByPhone is a method of Application Repository.
     * @return findByPhone($phone)
     */ 
    public function findApplicantByPhone($phone)
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findByPhone($phone);
    }
    
    /**
     * Filter the applicants by their position service.
     *
     * @param position     position filter.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicants.
     * findByPosition is a method of Application Repository.
     * @return findByPosition($position)
     */ 
    public function filterApplicantsByPosition($position)
    {
        return $this->em->getRepository('WorkBundle:Application')
                ->filterByPosition($position);
    }
    
    /**
     * Delete service.
     *
     * @param id      applicant id.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * there is no return for this method as it execute a delete operation
     * deleteApplication is a method of Application Repository.
     */
    public function deleteApplicant($id)
    {
        $this->em->getRepository('WorkBundle:Application')
        ->deleteApplication($id);
    }

    /**
     * Find all the applicants from the database service.
     *
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from all the founded applicants.
     * findAllApplications is a method of Application Repository.
     * @return findAllAplications()
     */ 
    public function findAllApplicants()
    {
        return $this->em->getRepository('WorkBundle:Application')
        ->findAllApplications();   
    }

    /**
     * logout JWT revoke token service.
     *
     * @param token      user token.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * there is no return for this method 
     * blackToken is a method of BlackList Repository.
     * 
     * NOTE:: this should be removed from here to another service class 
     * which will be used for the JWT TOKEN services.
     * NOTE that JWT will be as a seperated layer inside the application.
     */
    public function logout($token)
    {   
        $repo = $this->em->getRepository("WorkBundle:Blacklist");   
        $repo->blackToken($token);   
    }

}
