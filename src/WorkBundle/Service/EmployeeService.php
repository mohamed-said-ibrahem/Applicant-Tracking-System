<?php

namespace WorkBundle\Service;

use Doctrine\ORM\EntityManager;
use WorkBundle\Entity\Employee;

/**
 * Employee Service class the main service layer for the Employees.
 *
 * @Author Mohamed said.
 */ 
class EmployeeService {
    private $repo;private $repo2;private $repo3;
    
    public function __construct($repo,$repo2,$repo3) 
    {
        $this->repo = $repo;$this->repo2 = $repo2;$this->repo3 = $repo3;
    }

    /**
     * Creates new employee for the employee service.
     *
     * @param application       application object.
     * @param nameArabic        employee name in arabic.
     * @param nameEnglish       employee name in english.
     * @param birthDate         bithdate for the employee.
     * @param address           current address for the employee.
     * @param homePhone         home phone number for the current employee.
     * @param mobilePhone       mobile phone number for the current employee.
     * @param emergencyContactPerson    emergency contact person for the current employee.
     * @param emergencyPersonNumber     emergency contact number for the current employee.
     * @param emailPersonal     personal email for the employee.         
     * @param idCardNumber      id card number for the current employee.
     * @param academicDegree    academic degree for the current employee.
     * @param graduationDate    graduation date for the current employee.
     * @param joiningDate       joining date for the current employee.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object of the new employee created. 
     */ 
    public function createNewEmployee($application,$nameArabic,$nameEnglish,$birthDate,
    $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
    $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate)
    {
        return $this->repo3->createEmployee($application,$nameArabic,$nameEnglish,$birthDate,
        $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
        $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate);
    }

    /**
     * Search for the employee by it is name service.
     *
     * @param employeeName     employee name.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an array of objects from the founded employees.
     * findByName is a method of Employee Repository.
     * @return findByName($employeeName)
     */ 
    public function findEmployeeByName($employeeName)
    {
        return $this->repo3->findByName($employeeName); 
    }

    /**
     * Find all the employees from the database service.
     *
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from all the founded employess.
     * findEmployees is a method of Employee Repository.
     * @return findEmployees()
     */ 
    public function findAllEmployees()
    {
       return $this->repo3->findEmployees();

    }

    /**
     * Search for the employee by it is phone number service.
     *
     * @param number     employee phone number.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employee.
     * findByPhone is a method of Employee Repository.
     * @return findByPhone($number)
     */ 
    public function findEmployeeByPhone($number)
    {
        return $this->repo3->findByPhone($number);  

    }

    /**
     * Filter the employees by their position service.
     *
     * @param position   position filter.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employees.
     * findByPosition is a method of Employee Repository.
     * @return findByPosition($position)
     */ 
    public function findEmployeeByPosition($position)
    {
        return $this->repo3->findByPosition($position);
    }

    /**
     * Delete  employee service.
     *
     * @param employeeId      employee id.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * there is no return for this method as it execute a delete operation
     * deleteEmployee is a method of Employee Repository.
     */
    public function deleteEmployee($employeeId)
    { 
        return $this->repo3->deleteEmployee($employeeId);  
    }

    /**
     * Search for the employee by it is email service.
     *
     * @param email     employee email.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employee.
     * findByEmail is a method of Employee Repository.
     * @return findByEmail($email)
     */ 
    public function findEmployeeByEmail($email)
    {
        return $this->repo3->findByEmail($email);
    }

}