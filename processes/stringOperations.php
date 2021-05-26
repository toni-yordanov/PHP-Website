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
    public static function checkName($string)
    {
        $pattern = "/^[a-z .,'-]+$/";
        return preg_match($pattern,$string);
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

    public static function checkPhone_nr($string)
    {
        $pattern = "/^$/";
        return preg_match($pattern,$string);
    }
}
?>