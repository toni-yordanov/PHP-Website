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
}
?>