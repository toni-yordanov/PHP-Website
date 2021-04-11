<?php

include_once('server.php');
include_once('stringOperations.php');

if(isset($_POST['add-product']))
{
    $con =  Dbh::connect();
    $product_name = stringOperations::cleanString($_POST['product-name']);
    $product_price = stringOperations::cleanString($_POST['product-price']);
    $product_description = ($_POST['product-description']);
    $material = stringOperations::cleanString($_POST['material']);
    $category = stringOperations::cleanString($_POST['category']);
    

    if($product_name == "" || $product_price == "" || $product_description == "" || $material == "" || $category == "" )
    {
        ?>
        <script>
        alert("Fill in the fields");
        </Script>

        <?php
        return;
    }
    
    if(addFurniture($con,$product_name,$product_price,$product_description,$material,$category))
    {
        
    }
    else
    {
        echo "An error has ocurred, cannot register user";
    }
}



/*
foreach (getAllFurniture() as $result) {
    echo $result['id'] . '<br>';
    echo $result['product_name'] . '<br>';
    echo $result['price'] . '<br>';
    echo $result['product_description'] . '<br>';
    echo $result['material'] . '<br>';
    echo $result['category'] . '<br>';
    echo '<br>';
}*/

function getFurnitureById($id) {
        
        $sql = "SELECT * FROM furniture WHERE id = ?";
        $stmt = Dbh::connect()->prepare($sql);

        $stmt->execute([$id]);
        $result = $stmt->fetch();


        return $result;
        
    }
    //to insert into the database
function addFurniture($con, $name, $price, $description, $material, $category) {
            $query = $con->prepare("
            INSERT INTO  furniture (id,product_name,price,product_description,material,category)

            VALUES(NULL,:product_name,:price,:product_description,:material,:category)
        ");
        $query->bindParam(":product_name",$name);
        $query->bindParam(":price",$price);
        $query->bindParam(":product_description",$description);
        $query->bindParam(":material",$material);
        $query->bindParam(":category",$category);

return $query->execute();
    }

function getAllFurniture() {
        
        $sql = "SELECT * FROM furniture";
        $stmt = Dbh::connect()->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }

?>