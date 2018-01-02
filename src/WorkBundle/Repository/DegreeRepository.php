<?php

namespace WorkBundle\Repository;
use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\Degree;

/**
 * Degree Repository class. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
class DegreeRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Creates new degree for the applicant.
     *
     * @param application   an object of the application entity.
     * @param name          name of the degree.
     * @param university    name of the university.
     * @param degreeFrom    start date for the degree.
     * @param degreeTo      end date for the degree.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the created degree.
     * @return degree 
     */ 
    public function createDegree($application,$name,$university,$degreeFrom,$degreeTo)
    {
        $degree = new Degree();

        $degree->setApplication($application)
               ->setName($name)
               ->setUniversity($university)
               ->setDegreeFrom($degreeFrom)
               ->setDegreeTo($degreeTo);

        $em = $this->getEntityManager();
        $em->persist($degree);
        $em->flush();
        return $degree;
    }

    /**
     * Delete all the degree for a spacific application id.
     *
     * @param applicationId   the application id.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * There is no return from this method.
     */  
    public function deleteDegree($applicationId)
    {
        $this->createQueryBuilder('a')
             ->delete()
             ->where("a.Application = :applicationId")
             ->setParameter('applicationId', $applicationId)
             ->getQuery()
             ->execute();
    }

    /**
     * Find all the degrees for a spacific applicant id.
     *
     * @param applicationId   the application id.
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns all the degrees for a spacific application.
     * @return degrees 
     */ 
    public function findAllApplicationDegree($applicationId)
    {
        $degrees = $this->createQueryBuilder('b')
                        ->select()
                        ->where('b.Application = :applicationId')
                        ->setParameter('applicationId',$applicationId)
                        ->getQuery()
                        ->execute();
        return $degrees;
    }
}
