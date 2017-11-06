<?php

namespace WorkBundle\Entity;

/**
 * Employee
 */
class Employee
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nameArabic;

    /**
     * @var string
     */
    private $nameEnglish;

    /**
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $homePhone;

    /**
     * @var string
     */
    private $mobilePhone;

    /**
     * @var string
     */
    private $emergencyContactPerson;

    /**
     * @var string
     */
    private $emergencyPersonNumber;

    /**
     * @var string
     */
    private $emailPersonal;

    /**
     * @var string
     */
    private $idCardNumber;

    /**
     * @var string
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
     */
    private $currentPosition;


    /**
     * Get id
     *
     * @return int
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
}

