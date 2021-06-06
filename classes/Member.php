<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;
    private $_member;

    public function __construct($fname, $lname, $age, $gender, $phone,$premMember=true)
    {
        $this->_fname=$fname;
        $this->_lname=$lname;
        $this->_age=$age;
        $this->_gender=$gender;
        $this->_phone=$phone;
        $this->_member = $premMember;

    }

    /**
     * @return mixed
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname): void
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname): void
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getAge(): int
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender():String
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender):void
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPhone():String
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone):void
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail():String
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email):void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getState():String
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state):void
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getSeeking():String
    {
        return $this->_seeking;
    }

    /**
     * @param mixed $seeking
     */
    public function setSeeking($seeking):void
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return mixed
     */
    public function getBio():String
    {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio):void
    {
        $this->_bio = $bio;
    }


    /**
     * @return bool
     */
    public function ispremMember(): bool
    {
        return $this->_member;
    }

    /**
     * @param bool|mixed $member
     */
    public function setMember(bool $member): void
    {
        $this->_member = $member;
    }



}