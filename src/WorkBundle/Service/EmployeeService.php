<?php

namespace WorkBundle\Service;

use Doctrine\ORM\EntityManager;
use WorkBundle\Entity\Employee;

class EmployeeService {
    
    private $em;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }

    public function createNewEmployee($application,$nameArabic,$nameEnglish,$birthDate,
    $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
    $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate)
    {
        return $this->em->getRepository('WorkBundle:Employee')
        ->createEmployee($application,$nameArabic,$nameEnglish,$birthDate,
        $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
        $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate);
    }

    public function findEmployeeByName($employeeName)
    {
        return $this->em->getRepository('WorkBundle:Employee')
        ->findByName($employeeName); 
    }

    public function findAllEmployees()
    {
       return $this->em->getRepository('WorkBundle:Employee')
       ->findEmployees();

    }

    public function findEmployeeByPhone($number)
    {
        return $this->em->getRepository('WorkBundle:Employee')
        ->findByPhone($number);  

    }

    public function findEmployeeByPosition($position)
    {
        return $this->em->getRepository('WorkBundle:Employee')
        ->findByPosition($position);
    }

    public function deleteEmployee($employeeId)
    { 
        return $this->em->getRepository('WorkBundle:Employee')
        ->deleteEmployee($employeeId);  
    }

    public function findEmployeeByEmail($email)
    {
        return $this->em->getRepository('WorkBundle:Employee')
        ->findByEmail($email);
    }

}

