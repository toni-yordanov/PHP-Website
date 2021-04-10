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

    public function getFurniterById($id) {
        
        $sql = "SELECT * FROM furniture WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        foreach ($result as $id) {
            echo $id['id'] . '<br>';
            echo $id['name'] . '<br>';
            echo $id['price'] . '<br>';
            echo $id['description'] . '<br>';
            echo $id['material'] . '<br>';
        }
    }
    //to insert into the database
    public function addFurniture($name, $price, $description, $material, $category) {
        // with prepared statement
        $sql = "INSERT INTO furniture(name, price, description, material, category) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name,$price, $description, $material, $category]);
    }

    public function getAllFurniture() {
        
        $sql = "SELECT * FROM furniture";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}
?>