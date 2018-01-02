<?php

namespace WorkBundle\Repository;
use Doctrine\ORM\EntityRepository;
use WorkBundle\Entity\Employee;

/**
 * Employee Repository class. 
 *
 * The Repository contains main CRUD operation.
 *
 * @Author Mohamed said.
 */ 
class EmployeeRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Creates new employee for the applicant.
     *
     * @param application      an object of the application.
     * @param nameArabic       employee full name in arabic.
     * @param nameEnglish      employee full name in english.
     * @param birthDate        birthdate for the employee.
     * @param address          current address for the employee.
     * @param homePhone        home phone number for the employee.
     * @param mobilePhone      mobile phone number for the employee.
     * @param emergencyContactPerson   emergency contact person name for the employee.
     * @param emergencyPersonNumber    emergency contact person number for the employee.
     * @param emailPersonal    email personal for the employee.
     * @param idCardNumber     id card number for the employee.
     * @param academicDegree   acadimic degree for the employee.
     * @param graduationDate   graduation date for the employee.
     * @param joiningDate      joining date for the employee.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the created employee.
     * @return employee 
     */ 
    public function createEmployee($application,$nameArabic,$nameEnglish,$birthDate,
    $address,$homePhone,$mobilePhone,$emergencyContactPerson,$emergencyPersonNumber,
    $emailPersonal,$idCardNumber,$academicDegree,$graduationDate,$joiningDate)
    {
        $employee = new Employee();
        $employee->setApplication($application)->setNameArabic($nameArabic)
                 ->setNameEnglish($nameEnglish)->setBirthDate($birthDate)
                 ->setAddress($address)->setHomePhone($homePhone)
                 ->setMobilePhone($mobilePhone)->setEmergencyContactPerson($emergencyContactPerson)
                 ->setEmergencyPersonNumber($emergencyPersonNumber)->setEmailPersonal($emailPersonal)
                 ->setIdCardNumber($idCardNumber)->setAcademicDegree($academicDegree)
                 ->setGraduationDate($graduationDate)->setJoiningDate($joiningDate);
        
        $em = $this->getEntityManager();
        $em->persist($employee);
        $em->flush();

        return $employee;
    }

    public function findByName($employeeName)
    {
        $employees = $this->createQueryBuilder('a')
                     ->select()
                     ->where('a.nameArabic LIKE :username')
                     ->orWhere('a.nameEnglish LIKE :username')
                     ->setParameter('username', '%' . $employeeName . '%')
                     ->orderBy('a.id' , 'ASC')
                     ->getQuery()
                     ->getResult();
        return $employees;
    }

    /**
     * find all the employees.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employees.
     * @return employees 
     */ 
    public function findEmployees()
    {
        $employess = $this->createQueryBuilder('b')
                    ->select()
                    ->getQuery()
                    ->getResult();
        return $employees;
    }

    /**
     * Search for the employee by it is phone number.
     *
     * @param number   the employee phone number.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employee.
     * @return employee 
     */ 
    public function findByPhone($number)
    {
        $employee = $this->createQueryBuilder('c')
                 ->select()
                 ->where('c.mobilePhone = :phone')
                 ->orWhere('c.homePhone = :phone')
                 ->setParameter('phone',$number)
                 ->getQuery()
                 ->getResult();
        return $employee;
    }

    /**
     * Filter the applicants by a specific position.
     *
     * @param position   the Apllicant position.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employees.
     * @return employees 
     */ 
    public function findByPosition($position)
    {
        $employees = $this->createQueryBuilder('d')
                     ->select()
                     ->where('d.currentPosition LIKE :position')
                     ->setParameter('position', '%' . $position . '%')
                     ->getQuery()
                     ->getResult();
        return $employees;
    }

     /**
     * Delete the employee with a specific id.
     *
     * @param employeeId   the employee id.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * There is no return from this method.
     */   
    public function deleteEmployee($employeeId)
    { 
        $this->createQueryBuilder('e')
             ->delete()
             ->where('e.id = :id')
             ->setParameter('id',$employeeId)
             ->getQuery()
             ->execute();
    }

    /**
     * Filter the employees by an email.
     *
     * @param email   the employee email.
     * 
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said.
     * 
     * returns an object from the founded employees.
     * @return employees 
     */
    public function findByEmail($email)
    {
        $employees = $this->createQueryBuilder('f')
                      ->select()
                      ->where('f.emailPersonal LIKE :email')
                      ->setParameter('email', '%' . $email . '%')
                      ->orderBy('f.id', 'ASC')
                      ->getQuery()
                      ->getResult();
        return $employees;
    }
}
