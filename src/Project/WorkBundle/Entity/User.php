<?php

namespace Project\WorkBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var int
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
     * @var date
     */
    private $date_available;

    /**
     * @var int
     */
    private $salary;

     /**
     * @var string
     */
    private $vacancy;

    /**
     * @var string
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
     * @var date
     */
    private $school_from;

    /**
     * @var date
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
     * Get id
     *
     * @return int
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
     * @return User
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
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
}

