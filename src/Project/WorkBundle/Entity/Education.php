<?php

namespace Project\WorkBundle\Entity;

/**
 * Education
 */
class Education
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $school_name;

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
    private $college_name;

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
    private $is_graduate;

    /**
     * @var string
     */
    private $graduate_degree;

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
     * Set schoolName
     *
     * @param string $schoolName
     *
     * @return Education
     */
    public function setSchoolName($schoolName)
    {
        $this->school_name = $schoolName;

        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string
     */
    public function getSchoolName()
    {
        return $this->school_name;
    }

    /**
     * Set schoolFrom
     *
     * @param \DateTime $schoolFrom
     *
     * @return Education
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
     * @return Education
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
     * @return Education
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
     * Set collegeName
     *
     * @param string $collegeName
     *
     * @return Education
     */
    public function setCollegeName($collegeName)
    {
        $this->college_name = $collegeName;

        return $this;
    }

    /**
     * Get collegeName
     *
     * @return string
     */
    public function getCollegeName()
    {
        return $this->college_name;
    }

    /**
     * Set collegeFrom
     *
     * @param string $collegeFrom
     *
     * @return Education
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
     * @return Education
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
     * Set isGraduate
     *
     * @param boolean $isGraduate
     *
     * @return Education
     */
    public function setIsGraduate($isGraduate)
    {
        $this->is_graduate = $isGraduate;

        return $this;
    }

    /**
     * Get isGraduate
     *
     * @return boolean
     */
    public function getIsGraduate()
    {
        return $this->is_graduate;
    }

    /**
     * Set graduateDegree
     *
     * @param string $graduateDegree
     *
     * @return Education
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
     * Set application
     *
     * @param \Project\WorkBundle\Entity\Application $application
     *
     * @return Education
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

