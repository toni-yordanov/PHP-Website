<?php
class Dbh{
    private static $host = "studmysql01.fhict.local";
    private static $username = "dbi450402";
    private static $password = "dSae23dd/*-";
    
    public static function connect(){
        try {
        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi450402", self::$username, self::$password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected successfully";
        return $conn;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        /* finally
        {
            $conn = null;
        }*/
    }


    
}
?>