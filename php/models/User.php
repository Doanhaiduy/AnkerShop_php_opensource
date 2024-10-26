<?php
class User
{
    protected $id;
    protected $fullName;
    protected $email;
    protected $password;
    protected $phoneNumber;
    protected $gender;
    protected $address;

    public function __construct($id, $fullName, $email, $password, $phoneNumber, $gender, $address)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->gender = $gender;
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getGender()
    {
        return $this;
    }
    public function getAddress()
    {
        return $this->address;
    }



    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}
