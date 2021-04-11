<?php
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
    /*
    public static function checkPassword($string)
    {
        $pattern = "/^$/";
        return preg_match($pattern,$string);
    }*/
    public static function checkEmail($string)
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL);
    }
    public static function checkPhone_nr($string)
    {
        $pattern = "/^$/";
        return preg_match($pattern,$string);
    }
}
?>