<?php

namespace WorkBundle\Entity;

use WorkBundle\Entity\Application;
/**
 * Employee
 */
class Employee
{
    /**
     * @var integer
     */
    private $id;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "NAME MUST BE AT LEAST 5 CHARS",
     *      maxMessage = "NAME MUST BE AT MOST 50 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $nameArabic;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "NAME MUST BE AT LEAST 5 CHARS",
     *      maxMessage = "NAME MUST BE AT MOST 50 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $nameEnglish;


    /**
     * @var \DateTime
     */
    private $birthDate;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "ADDRESS MUST BE AT LEAST 5 CHARS",
     *      maxMessage = "ADDRESS MUST BE AT MOST 100 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $address;


    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 6,
     *      max = 8,
     *      minMessage = "NUMBER MUST BE AT LEAST 7 NUMBERS",
     *      maxMessage = "NUMBER MUST BE AT MOST 8 NUMBERS"
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $homePhone;


    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 10,
     *      max = 11,
     *      minMessage = "NUMBER MUST BE 11 NUMBERS",
     *      maxMessage = "NUMBER MUST BE 11 NUMBERS"
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $mobilePhone;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "NAME MUST BE AT LEAST 5 CHARS",
     *      maxMessage = "NAME MUST BE AT MOST 50 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $emergencyContactPerson;


    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 10,
     *      max = 11,
     *      minMessage = "NUMBER MUST BE 11 NUMBERS",
     *      maxMessage = "NUMBER MUST BE 11 NUMBERS"
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $emergencyPersonNumber;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "E-MAIL MUST BE AT LEAST 5 CHARS",
     *      maxMessage = "E-MAIL MUST BE AT MOST 100 CHARS"
     * )
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $emailPersonal;


    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 14,
     *      max = 14,
     *      minMessage = "NUMBER MUST BE 14 NUMBERS",
     *      maxMessage = "NUMBER MUST BE 14 NUMBERS"
     * )
     *@Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $idCardNumber;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull() 
     * @Assert\Length(
     *      min = 4,
     *      max = 150,
     *      minMessage = "ACADEMIC DEGREE MUST BE AT LEAST 4 CHARS",
     *      maxMessage = "ACADEMIC DEGREE MUST BE AT MOST 150 CHARS",
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $academicDegree;

    
    /**
     * @var \DateTime
     */
    private $graduationDate;


    /**
     * @var \DateTime
     */
    private $joiningDate;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull() 
     * @Assert\Length(
     *      min = 3,
     *      max = 200,
     *      minMessage = "CURRENT POSITION  MUST BE AT LEAST 3 CHARS",
     *      maxMessage = "CURRENT POSITION  MUST BE AT MOST 200 CHARS",
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $currentPosition;

    /**
     * @var \WorkBundle\Entity\Application
     */
    private $Application;

    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameArabic
     *
     * @param string $nameArabic
     *
     * @return Employee
     */
    public function setNameArabic($nameArabic)
    {
        $this->nameArabic = $nameArabic;

        return $this;
    }

    /**
     * Get nameArabic
     *
     * @return string
     */
    public function getNameArabic()
    {
        return $this->nameArabic;
    }

    /**
     * Set nameEnglish
     *
     * @param string $nameEnglish
     *
     * @return Employee
     */
    public function setNameEnglish($nameEnglish)
    {
        $this->nameEnglish = $nameEnglish;

        return $this;
    }

    /**
     * Get nameEnglish
     *
     * @return string
     */
    public function getNameEnglish()
    {
        return $this->nameEnglish;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Employee
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Employee
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set homePhone
     *
     * @param string $homePhone
     *
     * @return Employee
     */
    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    /**
     * Get homePhone
     *
     * @return string
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     *
     * @return Employee
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Set emergencyContactPerson
     *
     * @param string $emergencyContactPerson
     *
     * @return Employee
     */
    public function setEmergencyContactPerson($emergencyContactPerson)
    {
        $this->emergencyContactPerson = $emergencyContactPerson;

        return $this;
    }

    /**
     * Get emergencyContactPerson
     *
     * @return string
     */
    public function getEmergencyContactPerson()
    {
        return $this->emergencyContactPerson;
    }

    /**
     * Set emergencyPersonNumber
     *
     * @param string $emergencyPersonNumber
     *
     * @return Employee
     */
    public function setEmergencyPersonNumber($emergencyPersonNumber)
    {
        $this->emergencyPersonNumber = $emergencyPersonNumber;

        return $this;
    }

    /**
     * Get emergencyPersonNumber
     *
     * @return string
     */
    public function getEmergencyPersonNumber()
    {
        return $this->emergencyPersonNumber;
    }

    /**
     * Set emailPersonal
     *
     * @param string $emailPersonal
     *
     * @return Employee
     */
    public function setEmailPersonal($emailPersonal)
    {
        $this->emailPersonal = $emailPersonal;

        return $this;
    }

    /**
     * Get emailPersonal
     *
     * @return string
     */
    public function getEmailPersonal()
    {
        return $this->emailPersonal;
    }

    /**
     * Set idCardNumber
     *
     * @param string $idCardNumber
     *
     * @return Employee
     */
    public function setIdCardNumber($idCardNumber)
    {
        $this->idCardNumber = $idCardNumber;

        return $this;
    }

    /**
     * Get idCardNumber
     *
     * @return string
     */
    public function getIdCardNumber()
    {
        return $this->idCardNumber;
    }

    /**
     * Set academicDegree
     *
     * @param string $academicDegree
     *
     * @return Employee
     */
    public function setAcademicDegree($academicDegree)
    {
        $this->academicDegree = $academicDegree;

        return $this;
    }

    /**
     * Get academicDegree
     *
     * @return string
     */
    public function getAcademicDegree()
    {
        return $this->academicDegree;
    }

    /**
     * Set graduationDate
     *
     * @param \DateTime $graduationDate
     *
     * @return Employee
     */
    public function setGraduationDate($graduationDate)
    {
        $this->graduationDate = $graduationDate;

        return $this;
    }

    /**
     * Get graduationDate
     *
     * @return \DateTime
     */
    public function getGraduationDate()
    {
        return $this->graduationDate;
    }

    /**
     * Set joiningDate
     *
     * @param \DateTime $joiningDate
     *
     * @return Employee
     */
    public function setJoiningDate($joiningDate)
    {
        $this->joiningDate = $joiningDate;

        return $this;
    }

    /**
     * Get joiningDate
     *
     * @return \DateTime
     */
    public function getJoiningDate()
    {
        return $this->joiningDate;
    }

    /**
     * Set currentPosition
     *
     * @param string $currentPosition
     *
     * @return Employee
     */
    public function setCurrentPosition($currentPosition)
    {
        $this->currentPosition = $currentPosition;

        return $this;
    }

    /**
     * Get currentPosition
     *
     * @return string
     */
    public function getCurrentPosition()
    {
        return $this->currentPosition;
    }

    /**
     * Set application
     *
     * @param \WorkBundle\Entity\Application $application
     *
     * @return Employee
     */
    public function setApplication(\WorkBundle\Entity\Application $application = null)
    {
        $this->Application = $application;
        
        return $this;
    }

    /**
     * Get application
     *
     * @return \WorkBundle\Entity\Application
     */
    public function getApplication()
    {
        return $this->Application;
    }

}

