<?php

namespace WorkBundle\Entity;

/**
 * Degree
 */
class Degree
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $university;

    /**
     * @var \DateTime
     */
    private $degreeFrom;

    /**
     * @var \DateTime
     */
    private $degreeTo;

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
     * Set name
     *
     * @param string $name
     *
     * @return Degree
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set university
     *
     * @param string $university
     *
     * @return Degree
     */
    public function setUniversity($university)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return string
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * Set degreeFrom
     *
     * @param \DateTime $degreeFrom
     *
     * @return Degree
     */
    public function setDegreeFrom($degreeFrom)
    {
        $this->degreeFrom = $degreeFrom;

        return $this;
    }

    /**
     * Get degreeFrom
     *
     * @return \DateTime
     */
    public function getDegreeFrom()
    {
        return $this->degreeFrom;
    }

    /**
     * Set degreeTo
     *
     * @param \DateTime $degreeTo
     *
     * @return Degree
     */
    public function setDegreeTo($degreeTo)
    {
        $this->degreeTo = $degreeTo;

        return $this;
    }

    /**
     * Get degreeTo
     *
     * @return \DateTime
     */
    public function getDegreeTo()
    {
        return $this->degreeTo;
    }

    /**
     * Set application
     *
     * @param  \WorkBundle\Entity\Application $application
     *
     * @return Degree
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

