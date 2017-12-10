<?php

namespace WorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Application
 */
class Application
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
     *      min = 2,
     *      max = 50,
     *      minMessage = "NAME MUST BE AT LEAST 2 CHARS",
     *      maxMessage = "NAME MUST BE AT MOST 50 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * 
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     * 
     */
    private $first_name;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "NAME MUST BE AT LEAST 2 CHARS",
     *      maxMessage = "NAME MUST BE AT MOST 50 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     * 
     */
    private $middle_name;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "NAME MUST BE AT LEAST 2 CHARS",
     *      maxMessage = "NAME MUST BE AT MOST 50 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * 
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     * 
     */
    private $last_name;


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
    private $email;


    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 10,
     *      max = 11,
     *      minMessage = "NUMBER MUST BE AT LEAST 11 NUMBERS",
     *      maxMessage = "NUMBER MUST BE AT MOST 11 NUMBERS"
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     *     
     * @Assert\Regex(     
     * pattern="/^[1-9]\d*$/",
     * message="please check the input again"
     * )
     */
    private $phone_number;


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
     * 
     *@Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * 
     * @Assert\Regex(     
     * pattern="/^[1-9]\d*$/",
     * message="please check the input again"
     * )
     * 
     */
    private $id_card_number;


    /**
     * 
     * @var \DateTime
     * 
     * @Assert\DateTime()
     * 
     */
    private $date_available;


    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 1,
     *      max = 10,
     *      minMessage = "SALARY MUST BE AT LEAST 1 NUMBERS",
     *      maxMessage = "SALARY MUST BE AT MOST 10 NUMBERS"
     * )
     *@Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * 
     * @Assert\Regex(     
     * pattern="/^[1-9]\d*$/",
     * message="please check the input again"
     * )
     * 
     */
    private $desired_salary;



    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 3,
     *      max = 200,
     *      minMessage = "HIRING WAY MUST BE AT LEAST 3 CHARS",
     *      maxMessage = "HIRING WAY MUST BE AT MOST 200 CHARS"
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="hiring way cannot contain a number"
     * ) 
     */
    private $hiring_way;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 2,
     *      max = 3,
     *      minMessage = "INTERVIEWED BEFORE  MUST BE 'YES' OR 'NO'",
     *      maxMessage = "INTERVIEWED BEFORE  MUST BE 'YES' OR 'NO'",
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Choice(
     *     choices = { "YES", "NO" },
     *     message = "*INTERVIEWED BEFORE  MUST BE 'YES' OR 'NO'"
     * )
     */
    private $interviewed_before;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull() 
     * @Assert\Length(
     *      min = 3,
     *      max = 200,
     *      minMessage = "APPLIED POSITION  MUST BE AT LEAST 3 CHARS",
     *      maxMessage = "APPLIED POSITION  MUST BE AT MOST 200 CHARS",
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="applied position cannot contain a number"
     * )  
     */
    private $applied_position;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull() 
     * @Assert\Length(
     *      min = 2,
     *      max = 3,
     *      minMessage = "IS WORKED BEFORE  MUST BE 'YES' OR 'NO'",
     *      maxMessage = "IS WORKED BEFORE  MUST BE 'YES' OR 'NO'",
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * 
     * @Assert\Choice(
     *     choices = { "YES", "NO" },
     *     message = "*IS WORKED BEFORE  MUST BE 'YES' OR 'NO'"
     * )
     * 
     */
    private $is_worked_before;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()  
     * @Assert\Length(
     *      min = 3,
     *      max = 200,
     *      minMessage = "SIGNATURE MUST BE AT LEAST 3 CHARS",
     *      maxMessage = "SIGNATURE MUST BE  AT MOST 200 CHARS",
     * )
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="signature cannot contain a number"
     * )
     *   
     */
    private $signature;


    /**
     * @var integer
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $technical_test;


    /**
     * @var integer
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $iq_test;


    /**
     * @var string
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $technical_comments;


    /**
     * @var string
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $technical_result;


    /**
     * @var string
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $personality_profile;


    /**
     * @var string
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $hr_notes;

    /**
     * @var string
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $gm_result;


    /**
     * @var string
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * ) 
     */
    private $final_decision;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Degrees;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Positions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Degrees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Positions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * Set idCardNumber
     *
     * @param string $idCardNumber
     *
     * @return Application
     */
    public function setIdCardNumber($idCardNumber)
    {
        $this->id_card_number = $idCardNumber;

        return $this;
    }

    /**
     * Get idCardNumber
     *
     * @return string
     */
    public function getIdCardNumber()
    {
        return $this->id_card_number;
    }

    /**
     * Set dateAvailable
     *
     * @param \DateTime $dateAvailable
     *
     * @return Application
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
     * Set desiredSalary
     *
     * @param integer $desiredSalary
     *
     * @return Application
     */
    public function setDesiredSalary($desiredSalary)
    {
        $this->desired_salary = $desiredSalary;

        return $this;
    }

    /**
     * Get desiredSalary
     *
     * @return integer
     */
    public function getDesiredSalary()
    {
        return $this->desired_salary;
    }

    /**
     * Set hiringWay
     *
     * @param string $hiringWay
     *
     * @return Application
     */
    public function setHiringWay($hiringWay)
    {
        $this->hiring_way = $hiringWay;

        return $this;
    }

    /**
     * Get hiringWay
     *
     * @return string
     */
    public function getHiringWay()
    {
        return $this->hiring_way;
    }

    /**
     * Set interviewedBefore
     *
     * @param boolean $interviewedBefore
     *
     * @return Application
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
     * Set appliedPosition
     *
     * @param string $appliedPosition
     *
     * @return Application
     */
    public function setAppliedPosition($appliedPosition)
    {
        $this->applied_position = $appliedPosition;

        return $this;
    }

    /**
     * Get appliedPosition
     *
     * @return string
     */
    public function getAppliedPosition()
    {
        return $this->applied_position;
    }

    /**
     * Set isWorkedBefore
     *
     * @param string $isWorkedBefore
     *
     * @return Application
     */
    public function setIsWorkedBefore($isWorkedBefore)
    {
        $this->is_worked_before = $isWorkedBefore;

        return $this;
    }

    /**
     * Get isWorkedBefore
     *
     * @return string
     */
    public function getIsWorkedBefore()
    {
        return $this->is_worked_before;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return Application
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
     * Set technicalTest
     *
     * @param integer $technicalTest
     *
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
     * @return Application
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Application
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Application
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add degree
     *
     * @param \WorkBundle\Entity\Degree $degree
     *
     * @return Application
     */
    public function addDegree(\WorkBundle\Entity\Degree $degree)
    {
        $this->Degrees[] = $degree;

        return $this;
    }

    /**
     * Remove degree
     *
     * @param \WorkBundle\Entity\Degree $degree
     */
    public function removeDegree(\WorkBundle\Entity\Degree $degree)
    {
        $this->Degrees->removeElement($degree);
    }

    /**
     * Get degrees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDegrees()
    {
        return $this->Degrees;
    }

    /**
     * Add position
     *
     * @param \WorkBundle\Entity\Position $position
     *
     * @return Application
     */
    public function addPosition(\WorkBundle\Entity\Position $position)
    {
        $this->Positions[] = $position;

        return $this;
    }

    /**
     * Remove position
     *
     * @param \WorkBundle\Entity\Position $position
     */
    public function removePosition(\WorkBundle\Entity\Position $position)
    {
        $this->Positions->removeElement($position);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPositions()
    {
        return $this->Positions;
    }
    /**
     * @ORM\PrePersist
     */
    public function setTimeStamps()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateTime()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}

