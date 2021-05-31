<?php
include('../classes/Exceptions/UserExceptions.php');
class stringOperations{
    public static function cleanString($string)
    {
        //strip slashes and remove " "
        $string = strip_tags($string);
        $string = str_replace(" ","",$string);

        return $string;
    }
    public static function cleanPassword($string)
    {
        //password hashing
        $string = md5($string);
        
        return $string;
    }
    public static function checkName($name)
    {
        if(preg_match("/^[A-Z][-,a-zA-Z']+( [A-Z][-,a-zA-Z']+)$/", $name) != 1)
        {
            throw new InvalidNameException("The name that you inserted in invalid.
             It has to start with a capital letter and it must containt at least 
             2 characters.");
        }
        return true;
    }
    public static function checkFirstName($firstName)
    {
        if(preg_match("/^[A-Z][-,a-zA-Z']+$/", $firstName) != 1)
        {
            throw new InvalidFirstNameException("The first name that you inserted in invalid.
             First name has to start with a capital letter and it must containt at least 
             2 characters.");
        }

        return true;
    }
    public static function checkLastName($lastName)
    {
        if(preg_match("/^[A-Z][-,a-zA-Z']+$/", $lastName) != 1)
        {
            throw new InvalidLastNameException("The last name that you inserted in invalid.
            Last name has to start with a capital letter and it must containt at least 
            2 characters.");
        }

        return true;
    }
    public static function checkPassword($password)
    {
        if(preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", 
        $password) != 1)
        {
            throw new InvalidPasswordException("The password that you have entered is
             invalid. The password has to be at least 8 characters long and it must contain
             at least: one number and one special character: @$!%*#?&");
        }
        return true;
    }
    public static function checkEmail($string)
    {
        if(filter_var($string, FILTER_VALIDATE_EMAIL) == false)
        {
            throw new InvalidEmailException("The entered email is invalid.");
        }
        return true;
    }

    public static function checkPhone_nr($phoneNumber)
    {
        if(preg_match("/^((\+31)|(0031)|0)(\d{1,3})(\d{8})$/",
         $phoneNumber) != 1)
        {
            throw new InvalidPhoneNumberException("The phone number that you have entered
             is invalid. The phone number should not contain any spaces, dashes or paranthesis.
             Example of valid numbers:0612345678, 04012345678, 049212345678, 0031612345678,
              003149212345678, +31612345678");
        }
        return true;
    }
}
?>