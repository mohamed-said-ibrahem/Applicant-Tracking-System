<?php

namespace WorkBundle\Service;

use Doctrine\ORM\EntityManager;
use WorkBundle\Entity\Employee;

class EmployeeService {
    
    private $repo;
    private $repo2;
    private $repo3;
    
    public function __construct($repo,$repo2,$repo3) 
    {
        $this->repo = $repo;
        $this->repo2 = $repo2;
        $this->repo3 = $repo3;
    }

    public function createNewEmployee($application,$nameArabic,$nameEnglish,$birthDate,
    $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
    $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate)
    {
        return $this->repo3->createEmployee($application,$nameArabic,$nameEnglish,$birthDate,
        $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
        $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate);
    }

    public function findEmployeeByName($employeeName)
    {
        return $this->repo3->findByName($employeeName); 
    }

    public function findAllEmployees()
    {
       return $this->repo3->findEmployees();

    }

    public function findEmployeeByPhone($number)
    {
        return $this->repo3->findByPhone($number);  

    }

    public function findEmployeeByPosition($position)
    {
        return $this->repo3->findByPosition($position);
    }

    public function deleteEmployee($employeeId)
    { 
        return $this->repo3->deleteEmployee($employeeId);  
    }

    public function findEmployeeByEmail($email)
    {
        return $this->repo3->findByEmail($email);
    }

}

