<?php

class Furniture extends Dbh{

    //properties
    private $id;
    private $name;
    private $price;
    private $description;
    private $material;
    private $category;

    //constructor
    public function __construct($id, $name, $price, $description, $material, $category)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this -> price = $price;
        $this -> description = $description;
        $this -> material = $material;
        $this -> category = $category;
    }

    //methods
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price; 
    }

    public function getDescription(){
        return $this->description;
    }

    public function getMaterial(){
        return $this->material;
    }

    public function getCategory(){
        return $this->category;
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