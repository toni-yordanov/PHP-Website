<?php

include_once('server.php');



class ProductManager extends Dbh{


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
    public  function addFurniture($name, $price, $description, $material, $category) {
        // with prepared statement
        $sql = "INSERT INTO furniture (product_name, price, product_description, material, category) VALUES (?,?,?,?,?)";
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