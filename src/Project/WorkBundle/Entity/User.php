<?php

namespace Project\WorkBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $middle_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone_number;

    /**
     * @var string
     */
    private $id_number;

    /**
     * @var \DateTime
     */
    private $date_available;

    /**
     * @var integer
     */
    private $salary;

    /**
     * @var string
     */
    private $vacancy;

    /**
     * @var boolean
     */
    private $interviewed_before;

    /**
     * @var string
     */
    private $position;

    /**
     * @var string
     */
    private $school;

    /**
     * @var \DateTime
     */
    private $school_from;

    /**
     * @var \DateTime
     */
    private $school_to;

    /**
     * @var string
     */
    private $school_degree;

    /**
     * @var string
     */
    private $college;

    /**
     * @var string
     */
    private $college_from;

    /**
     * @var string
     */
    private $college_to;

    /**
     * @var boolean
     */
    private $graduated;

    /**
     * @var string
     */
    private $graduate_degree;

    /**
     * @var string
     */
    private $worked_before;

    /**
     * @var string
     */
    private $signature;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var string
     */
    private $gedmo;

    /**
     * @var integer
     */
    private $technical_test;

    /**
     * @var integer
     */
    private $iq_test;

    /**
     * @var string
     */
    private $technical_comments;

    /**
     * @var string
     */
    private $technical_result;

    /**
     * @var string
     */
    private $personality_profile;

    /**
     * @var string
     */
    private $hr_notes;

    /**
     * @var string
     */
    private $gm_result;

    /**
     * @var string
     */
    private $final_decision;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     *
     * @return User
     */
    public function setMiddleName($middleName)
    {
        $this->middle_name = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set idNumber
     *
     * @param string $idNumber
     *
     * @return User
     */
    public function setIdNumber($idNumber)
    {
        $this->id_number = $idNumber;

        return $this;
    }

    /**
     * Get idNumber
     *
     * @return string
     */
    public function getIdNumber()
    {
        return $this->id_number;
    }

    /**
     * Set dateAvailable
     *
     * @param \DateTime $dateAvailable
     *
     * @return User
     */
    public function setDateAvailable($dateAvailable)
    {
        $this->date_available = $dateAvailable;

        return $this;
    }

    /**
     * Get dateAvailable
     *
     * @return \DateTime
     */
    public function getDateAvailable()
    {
        return $this->date_available;
    }

    /**
     * Set salary
     *
     * @param integer $salary
     *
     * @return User
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return integer
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set vacancy
     *
     * @param string $vacancy
     *
     * @return User
     */
    public function setVacancy($vacancy)
    {
        $this->vacancy = $vacancy;

        return $this;
    }

    /**
     * Get vacancy
     *
     * @return string
     */
    public function getVacancy()
    {
        return $this->vacancy;
    }

    /**
     * Set interviewedBefore
     *
     * @param boolean $interviewedBefore
     *
     * @return User
     */
    public function setInterviewedBefore($interviewedBefore)
    {
        $this->interviewed_before = $interviewedBefore;

        return $this;
    }

    /**
     * Get interviewedBefore
     *
     * @return boolean
     */
    public function getInterviewedBefore()
    {
        return $this->interviewed_before;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return User
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set school
     *
     * @param string $school
     *
     * @return User
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set schoolFrom
     *
     * @param \DateTime $schoolFrom
     *
     * @return User
     */
    public function setSchoolFrom($schoolFrom)
    {
        $this->school_from = $schoolFrom;

        return $this;
    }

    /**
     * Get schoolFrom
     *
     * @return \DateTime
     */
    public function getSchoolFrom()
    {
        return $this->school_from;
    }

    /**
     * Set schoolTo
     *
     * @param \DateTime $schoolTo
     *
     * @return User
     */
    public function setSchoolTo($schoolTo)
    {
        $this->school_to = $schoolTo;

        return $this;
    }

    /**
     * Get schoolTo
     *
     * @return \DateTime
     */
    public function getSchoolTo()
    {
        return $this->school_to;
    }

    /**
     * Set schoolDegree
     *
     * @param string $schoolDegree
     *
     * @return User
     */
    public function setSchoolDegree($schoolDegree)
    {
        $this->school_degree = $schoolDegree;

        return $this;
    }

    /**
     * Get schoolDegree
     *
     * @return string
     */
    public function getSchoolDegree()
    {
        return $this->school_degree;
    }

    /**
     * Set college
     *
     * @param string $college
     *
     * @return User
     */
    public function setCollege($college)
    {
        $this->college = $college;

        return $this;
    }

    /**
     * Get college
     *
     * @return string
     */
    public function getCollege()
    {
        return $this->college;
    }

    /**
     * Set collegeFrom
     *
     * @param string $collegeFrom
     *
     * @return User
     */
    public function setCollegeFrom($collegeFrom)
    {
        $this->college_from = $collegeFrom;

        return $this;
    }

    /**
     * Get collegeFrom
     *
     * @return string
     */
    public function getCollegeFrom()
    {
        return $this->college_from;
    }

    /**
     * Set collegeTo
     *
     * @param string $collegeTo
     *
     * @return User
     */
    public function setCollegeTo($collegeTo)
    {
        $this->college_to = $collegeTo;

        return $this;
    }

    /**
     * Get collegeTo
     *
     * @return string
     */
    public function getCollegeTo()
    {
        return $this->college_to;
    }

    /**
     * Set graduated
     *
     * @param boolean $graduated
     *
     * @return User
     */
    public function setGraduated($graduated)
    {
        $this->graduated = $graduated;

        return $this;
    }

    /**
     * Get graduated
     *
     * @return boolean
     */
    public function getGraduated()
    {
        return $this->graduated;
    }

    /**
     * Set graduateDegree
     *
     * @param string $graduateDegree
     *
     * @return User
     */
    public function setGraduateDegree($graduateDegree)
    {
        $this->graduate_degree = $graduateDegree;

        return $this;
    }

    /**
     * Get graduateDegree
     *
     * @return string
     */
    public function getGraduateDegree()
    {
        return $this->graduate_degree;
    }

    /**
     * Set workedBefore
     *
     * @param string $workedBefore
     *
     * @return User
     */
    public function setWorkedBefore($workedBefore)
    {
        $this->worked_before = $workedBefore;

        return $this;
    }

    /**
     * Get workedBefore
     *
     * @return string
     */
    public function getWorkedBefore()
    {
        return $this->worked_before;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return User
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set gedmo
     *
     * @param string $gedmo
     *
     * @return User
     */
    public function setGedmo($gedmo)
    {
        $this->gedmo = $gedmo;

        return $this;
    }

    /**
     * Get gedmo
     *
     * @return string
     */
    public function getGedmo()
    {
        return $this->gedmo;
    }

    /**
     * Set technicalTest
     *
     * @param integer $technicalTest
     *
     * @return User
     */
    public function setTechnicalTest($technicalTest)
    {
        $this->technical_test = $technicalTest;

        return $this;
    }

    /**
     * Get technicalTest
     *
     * @return integer
     */
    public function getTechnicalTest()
    {
        return $this->technical_test;
    }

    /**
     * Set iqTest
     *
     * @param integer $iqTest
     *
     * @return User
     */
    public function setIqTest($iqTest)
    {
        $this->iq_test = $iqTest;

        return $this;
    }

    /**
     * Get iqTest
     *
     * @return integer
     */
    public function getIqTest()
    {
        return $this->iq_test;
    }

    /**
     * Set technicalComments
     *
     * @param string $technicalComments
     *
     * @return User
     */
    public function setTechnicalComments($technicalComments)
    {
        $this->technical_comments = $technicalComments;

        return $this;
    }

    /**
     * Get technicalComments
     *
     * @return string
     */
    public function getTechnicalComments()
    {
        return $this->technical_comments;
    }

    /**
     * Set technicalResult
     *
     * @param string $technicalResult
     *
     * @return User
     */
    public function setTechnicalResult($technicalResult)
    {
        $this->technical_result = $technicalResult;

        return $this;
    }

    /**
     * Get technicalResult
     *
     * @return string
     */
    public function getTechnicalResult()
    {
        return $this->technical_result;
    }

    /**
     * Set personalityProfile
     *
     * @param string $personalityProfile
     *
     * @return User
     */
    public function setPersonalityProfile($personalityProfile)
    {
        $this->personality_profile = $personalityProfile;

        return $this;
    }

    /**
     * Get personalityProfile
     *
     * @return string
     */
    public function getPersonalityProfile()
    {
        return $this->personality_profile;
    }

    /**
     * Set hrNotes
     *
     * @param string $hrNotes
     *
     * @return User
     */
    public function setHrNotes($hrNotes)
    {
        $this->hr_notes = $hrNotes;

        return $this;
    }

    /**
     * Get hrNotes
     *
     * @return string
     */
    public function getHrNotes()
    {
        return $this->hr_notes;
    }

    /**
     * Set gmResult
     *
     * @param string $gmResult
     *
     * @return User
     */
    public function setGmResult($gmResult)
    {
        $this->gm_result = $gmResult;

        return $this;
    }

    /**
     * Get gmResult
     *
     * @return string
     */
    public function getGmResult()
    {
        return $this->gm_result;
    }

    /**
     * Set finalDecision
     *
     * @param string $finalDecision
     *
     * @return User
     */
    public function setFinalDecision($finalDecision)
    {
        $this->final_decision = $finalDecision;

        return $this;
    }

    /**
     * Get finalDecision
     *
     * @return string
     */
    public function getFinalDecision()
    {
        return $this->final_decision;
    }
}

