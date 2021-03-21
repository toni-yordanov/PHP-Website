<?php
class Dbh{
    private $host = "studmysql01.fhict.local";
    private $username = "dbi450402";
    private $password = "dSae23dd/*-";
    
    protected function connect(){
        try {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->username", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $conn;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        } finally
        {
            $conn = null;
        }
    }
}
?>