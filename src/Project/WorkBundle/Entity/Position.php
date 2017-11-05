<?php

namespace Project\WorkBundle\Entity;

/**
 * Position
 */
class Position
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $jobTitle;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var string
     */
    private $responsibilities;

    /**
     * @var string
     */
    private $supervisor;

    /**
     * @var integer
     */
    private $startingSalary;

    /**
     * @var integer
     */
    private $endingSalary;

    /**
     * @var \DateTime
     */
    private $fromDate;

    /**
     * @var \DateTime
     */
    private $toDate;

    /**
     * @var boolean
     */
    private $callSupervisor;

    /**
     * @var \Project\WorkBundle\Entity\Application
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
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return Position
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Position
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Position
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
     * Set reason
     *
     * @param string $reason
     *
     * @return Position
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set responsibilities
     *
     * @param string $responsibilities
     *
     * @return Position
     */
    public function setResponsibilities($responsibilities)
    {
        $this->responsibilities = $responsibilities;

        return $this;
    }

    /**
     * Get responsibilities
     *
     * @return string
     */
    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

    /**
     * Set supervisor
     *
     * @param string $supervisor
     *
     * @return Position
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * Get supervisor
     *
     * @return string
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * Set startingSalary
     *
     * @param integer $startingSalary
     *
     * @return Position
     */
    public function setStartingSalary($startingSalary)
    {
        $this->startingSalary = $startingSalary;

        return $this;
    }

    /**
     * Get startingSalary
     *
     * @return integer
     */
    public function getStartingSalary()
    {
        return $this->startingSalary;
    }

    /**
     * Set endingSalary
     *
     * @param integer $endingSalary
     *
     * @return Position
     */
    public function setEndingSalary($endingSalary)
    {
        $this->endingSalary = $endingSalary;

        return $this;
    }

    /**
     * Get endingSalary
     *
     * @return integer
     */
    public function getEndingSalary()
    {
        return $this->endingSalary;
    }

    /**
     * Set fromDate
     *
     * @param \DateTime $fromDate
     *
     * @return Position
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * Get fromDate
     *
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Set toDate
     *
     * @param \DateTime $toDate
     *
     * @return Position
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;

        return $this;
    }

    /**
     * Get toDate
     *
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * Set callSupervisor
     *
     * @param boolean $callSupervisor
     *
     * @return Position
     */
    public function setCallSupervisor($callSupervisor)
    {
        $this->callSupervisor = $callSupervisor;

        return $this;
    }

    /**
     * Get callSupervisor
     *
     * @return boolean
     */
    public function getCallSupervisor()
    {
        return $this->callSupervisor;
    }

    /**
     * Set application
     *
     * @param \Project\WorkBundle\Entity\Application $application
     *
     * @return Position
     */
    public function setApplication(\Project\WorkBundle\Entity\Application $application = null)
    {
        $this->Application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return \Project\WorkBundle\Entity\Application
     */
    public function getApplication()
    {
        return $this->Application;
    }
}

