<?php 
class User {
    //properties
    private $firstName;
    private $lastName;
    private $email;
    private $phone_number;
    private $password;

    //constructor
    public function __construct($firstName, $lastName, $email, $phone_number, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
    }

    //getters
    public function getFirstName()
    {
        return "$this->firstName";
    }
    public function getLastName()
    {
        return "$this->lastName";
    }
    public function getEmail()
    {
        return "$this->email";
    }
    public function getPhone_number()
    {
        return "$this->phone_number";
    }
    public function getPassword()
    {
        return "$this->password";
    }
}

?>