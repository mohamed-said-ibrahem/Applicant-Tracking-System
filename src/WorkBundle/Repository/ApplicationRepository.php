<?php

namespace WorkBundle\Repository;

use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\Application;

/**
 * Application Repository class the main Repo for the Applicants. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
/**
 * @Entity(repositoryClass="WorkBundle\Repository\ApplicationRepository")
 */
class ApplicationRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Creates new application for the applicant.
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
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the created applicant.
     * @return applicant 
     */ 
    public function createApplication($firstName,$middleName,$lastName,
        $address,$email,$phoneNumber,$idCardNumber,$dateAvailable,$desiredSalary,
        $hiringWay,$interviewedBefore,$appliedPosition,$isWorkedBefore,$signature)
    {
        $applicant = new Application();

        $applicant->setFirstName($firstName)->setMiddleName($middleName)
                  ->setLastName($lastName)->setAddress($address)->setEmail($email)
                  ->setPhoneNumber($phoneNumber)->setIdCardNumber($idCardNumber)
                  ->setDateAvailable($dateAvailable)->setDesiredSalary($desiredSalary)
                  ->setHiringWay($hiringWay)->setInterviewedBefore($interviewedBefore)
                  ->setAppliedPosition($appliedPosition)->setIsWorkedBefore($isWorkedBefore)
                  ->setSignature($signature);

        $em = $this->getEntityManager();
        $em->persist($applicant);
        $em->flush();

        return $applicant;
    }

    /**
     * Search for the applicant by it is id.
     *
     * @param id     applicant id.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicant.
     * @return applicant 
     */ 
    public function findApplicant($id)
    {
        $applicant = $this->findOneById($id);
        return $applicant;
    }

    /**
     * Search for the applicants by name or email.
     *
     * @param input   the Apllicant name or email.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicants.
     * prefered return type is an array of the applicants.
     * 
     * @return applicants 
     */ 
    public function findByNameOrEmail($input)
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
     
    /**
     * Search for the applicant by it is phone number.
     *
     * @param phone   the Apllicant phone number.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicant.
     * @return applicant 
     */ 
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

    /**
     * Filter the applicants by a specific position.
     *
     * @param position   the Apllicant position.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicants.
     * @return applicants 
     */ 
    public function filterByPosition($position)
    {
        $applicants = $this->createQueryBuilder('c')
                ->select()
                ->where('c.applied_position = :position')
                ->setParameter('position', $position )
                ->orderBy('c.id', 'ASC')                
                ->getQuery()
                ->getResult();

        return $applicants;
    }
    
    /**
     * Delete the applicant with a specific id.
     *
     * @param applicationId   the Apllicant id.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * There is no return from this method.
     */   
    public function deleteApplication($applicationId)
    { 
        $this->createQueryBuilder('d')
             ->delete()
             ->where('d.id = :id')
             ->setParameter('id',$applicationId)
             ->getQuery()
             ->execute();
    }

    /**
     * Find all the applicants from the database.
     *
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an object from the founded applicants.
     * @return applicants 
     */ 
    public function findAllApplications()
    {
        $applications = $this->createQueryBuilder('e')
                ->select()
                ->getQuery()
                ->getResult();
                
        return $applications;
    }
}