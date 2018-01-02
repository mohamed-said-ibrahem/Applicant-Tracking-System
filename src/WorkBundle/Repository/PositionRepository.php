<?php

namespace WorkBundle\Repository;
use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\Position;

/**
 * Position Repository class. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
class PositionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Creates new position for the applicant.
     *
     * @param application      an object from the application.
     * @param jobTitle         position job title name.
     * @param companyName      worked before company name.
     * @param address          address for the company.
     * @param reason           reason for leaving the old company.
     * @param responsibilities responsibilities in the last company.
     * @param supervisor       last company supervisor.
     * @param startSalary      start salary in the last company.
     * @param endSalary        end salary in the last company.
     * @param fromDate         start working date in the last company.
     * @param toDate           end working date in the last company.
     * @param callSupervisor   can we call your last company supercisor?
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the created position.
     * @return position 
     */ 
    public function createPosition($application,$jobTitle,$companyName,$address,$reason
    ,$responsibilities,$supervisor,$startSalary,$endSalary,$fromDate,$toDate,$callSupervisor)
    {
        $position = new Position();

        $position->setApplication($application)->setJobTitle($jobTitle)
                 ->setCompanyName($companyName)->setAddress($address)
                 ->setReason($reason)->setResponsibilities($responsibilities)
                 ->setSupervisor($supervisor)->setStartingSalary($startSalary)
                 ->setEndingSalary($endSalary)->setFromDate($fromDate)
                 ->setToDate($toDate)->setCallSupervisor($callSupervisor);

        $em = $this->getEntityManager();
        $em->persist($position);
        $em->flush();
        
        return $position;
    }

    /**
     * Delete all the position with a specific application id.
     *
     * @param positionId   the Apllicant id.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * There is no return from this method.
     */   
    public function deletePosition($positionId)
    {
        $this->createQueryBuilder('a')
             ->delete()
             ->where('a.application =:positionId')
             ->setParameter('positionId',$positionId)
             ->getQuery()
             ->execute();
    }
}
