<?php

class Furniture{

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


}
?>