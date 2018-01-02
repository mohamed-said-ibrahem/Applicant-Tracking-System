<?php

namespace WorkBundle\Repository;
use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\Education;

/**
 * Education Repository class. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
class EducationRepository extends \Doctrine\ORM\EntityRepository
{
     /**
     * Creates new education for the applicant.
     *
     * @param application       an object of the application.
     * @param schoolName        school name for the applicant.
     * @param schoolFrom        school start date for the applicant.
     * @param schoolTo          school end date for the applicant.
     * @param schoolDegree      school degree for the applicant.
     * @param collegeName       college name for the applicant.
     * @param collegeFrom       college start date for the applicant.
     * @param collageTo         college end date for the applicant.
     * @param isGraduated       is the applicant still undergraduate?
     * @param graduateDegree    graduate degree for the applicant.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the created education.
     * @return education 
     */ 
     public function createEducation($application,$schoolName,$schoolFrom,$schoolTo,
     $schoolDegree,$collegeName,$collegeFrom,$collageTo,$isGraduated,$graduateDegree)
    {
        $education = new Education();

        $education->setApplication($application)->setSchoolName($schoolName)
                    ->setSchoolFrom($schoolFrom)->setSchoolTo($schoolTo)
                    ->setSchoolDegree($schoolDegree)->setCollegeName($collegeName)
                    ->setCollegeFrom($collegeFrom)->setCollegeTo($collageTo)
                    ->setIsGraduate($isGraduated)->setGraduateDegree($graduateDegree);

        $em = $this->getEntityManager();
        $em->persist($education);
        $em->flush();

        return $education;
    }

    /**
     * Delete the education with a specific application id.
     *
     * @param educationId   the application id.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * There is no return from this method.
     */ 
    public function deleteEducation($educationId)
    {
        $this->createQueryBuilder('a')
             ->delete()
             ->where('a.Application =:educationId')
             ->setParameter('educationId',$educationId)
             ->getQuery()
             ->execute();
    }

    /**
     * Find all the educations from the database by an id.
     *
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded education.
     * @return education 
     */ 
    public function findEducation($educationId)
    {
        $education = $this->findOneById($educationId);
        return $education;
    }

}
