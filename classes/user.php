<?php 
require_once("Exceptions/UserExceptions.php");
require_once("../processes/stringOperations.php");
class User {
    //properties
    private $firstName;
    private $lastName;
    private $email;
    private $phoneNumber;
    private $password;
    private $rights;

    //constructor
    public function __construct($firstName, $lastName, $email, $phoneNumber, $password, $rights)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPhoneNumber($phoneNumber);
        $this->setPassword($password);
        $this->setRights($rights);
    }

    //getters
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone_number()
    {
        return $this->phoneNumber;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRights()
    {
        return $this->rights;
    }

    //setters
    public function setFirstName(string $firstName)
    {
        if(preg_match("/^[A-Z][-,a-zA-Z']+$/", $firstName) != 1)
        {
            throw new InvalidNameException("The first name that you inserted in invalid.
             First name has to start with a capital letter and it must containt at least 
             2 characters.");
        }

        $this->firstName = $firstName;
    }
    public function setLastName(string $lastName)
    {
        if(preg_match("/^[A-Z][-,a-zA-Z']+$/", $lastName) != 1)
            {
                throw new InvalidNameException("The last name that you inserted in invalid.
             Last name has to start with a capital letter and it must containt at least 
             2 characters.");
            }

        $this->lastName = $lastName;
    }
    public function setEmail(string $email)
    {
       if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
            {
                throw new InvalidEmailException("The entered email is invalid.");
            }
        
        $this->email = $email;
    }
    public function setPhoneNumber(string $phoneNumber)
    {
        if(preg_match("/^((\+31)|(0031)|0)(\d{1,3})(\d{8})$/",
         $phoneNumber) != 1)
        {
            throw new InvalidPhoneNumberException("The phone number that you have entered
             is invalid. The phone number should not contain any spaces, dashes or paranthesis.
             Example of valid numbers:0612345678, 04012345678, 049212345678, 0031612345678,
              003149212345678, +31612345678");
        }

        $this->phoneNumber = $phoneNumber;
    }
    public function setPassword(string $password)
    {
        
        if(preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", 
        $password) != 1)
        {
            throw new InvalidPasswordException("The password that you have entered is
             invalid. The password has to be at least 8 characters long and it must contain at least:
             one number and one special character: @$!%*#?&");
        }
        $this->password = stringOperations::cleanPassword($password);
    }
    public function setRights(string $rights)
    {
        if($rights != "ADMIN" && $rights != "USER")
        {
            throw new InvalidRightsException("The chosen rights is not valid, it has to
             be either ADMIN or USER");
        }
        $this->rights = $rights;
    }
    

    
}

?>