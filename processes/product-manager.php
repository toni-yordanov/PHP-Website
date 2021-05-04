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
    }
    
    if(addFurniture($con,$product_name,$product_price,$product_description,$material,$category))
    {
        
    }
    else
    {
        ?>
        <script>
        alert("An error has ocurred, cannot add product");
        </Script>

        <?php
    }
}

if(isset($_POST['update-product']))
{
    $con =  Dbh::connect();
    
    $item_id = GetItemID();
    $product_name = stringOperations::cleanString($_POST['product-name']);
    $product_price = stringOperations::cleanString($_POST['product-price']);
    $product_description = ($_POST['product-description']);
    $material = stringOperations::cleanString($_POST['material']);
    $category = stringOperations::cleanString($_POST['category']);
    
    if($item_id < 1)
    {
        ?>
        <script>
        alert("Select an product");
        </Script>
        <?php
    }

    if($product_name == "" || $product_price == "" || $product_description == "" || $material == "" || $category == "" )
    {
        ?>
        <script>
        alert("Fill in the fields");
        </Script>

        <?php
    }
    
    if(updateFurniture($item_id,$product_name,$product_price,$product_description,$material,$category))
    {
        ?>
        <script>
        alert("Product Updated");
        </Script>

        <?php
    }
    else
    {
        ?>
        <script>
        alert("An error has ocurred, cannot add product");
        </Script>

        <?php
        
    }
}

if(isset($_POST['delete-product']))
{
    $con =  Dbh::connect();
    
    $item_id = GetItemID();
    
    if($item_id < 1)
    {
        ?>
        <script>
        alert("Select an product");
        </Script>
        <?php
    }
    
    if(deleteFurniture($item_id))
    {
        ?>
        <script>
        alert("Product Dleted");
        </Script>

        <?php
    }
    else
    {
        ?>
        <script>
        alert("An error has ocurred, cannot add product");
        </Script>

        <?php
        
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

function updateFurniture($item_id,$product_name,$product_price,$product_description,$material,$category)
{
    $con =  Dbh::connect();
    $query = $con->prepare("
    UPDATE furniture
     SET product_name = :name, price = :price, product_description = :description, material = :material, category = :category 
    WHERE id=:id
    ");
    $query->bindParam(":name", $product_name);
    $query->bindParam(":price", $product_price);
    $query->bindParam(":description", $product_description);
    $query->bindParam(":material", $material);
    $query->bindParam(":category", $category);
    $query->bindParam(":id",$item_id);

    return $query->execute();
}

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
 
function deleteFurniture($item_id) {
    $con =  Dbh::connect();
    $query = $con->prepare("
    UPDATE furniture
     SET deleted = TRUE
    WHERE id=:id
    ");
    $query->bindParam(":id",$item_id);

    return $query->execute();
}   

?>