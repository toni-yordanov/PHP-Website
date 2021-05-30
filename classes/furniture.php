<?php

class Furniture{

    //properties
    private $id;
    private $name;
    private $price;
    private $description;
    private $material;
    private $category;
    private $deleted;
    private $file_name;

    //constructor
    public function __construct($id, $name, $price, $description, $material, $category, $file_name)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this -> price = $price;
        $this -> description = $description;
        $this -> material = $material;
        $this -> category = $category;
        $this -> deleted = false;
        $this -> file_name = $file_name;

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
    
    public function getDeleted()
    {
        return $this->deleted;
    }

    public function getFileName()
    {
        return $this->file_name;
    }
}
?>