<?php

include_once('productQuerries.php');
include_once('stringOperations.php');
include('../classes/furniture.php');

if(isset($_POST['add-product']))
{
    $con =  Dbh::connect();
    $product_name = stringOperations::cleanString($_POST['product-name']);
    $product_price = stringOperations::cleanString($_POST['product-price']);
    $product_description = ($_POST['product-description']);
    $material = stringOperations::cleanString($_POST['material']);
    $category = stringOperations::cleanString($_POST['category']);
    $file_name = '';
    
    if(isset($_FILES['file'])){

        $ext_err = false;
        $extentions = array('jpg', 'jpeg', 'png', 'gif');

        $file_ext = explode('.',$_FILES['userfile']['name']);
        $file_ext = end($file_ext);


        if(!in_array($file_ext, $extentions)){
            $ext_err = true;
        }

        if($_FILES['userfile']['error']){
            ?>
        <script>
        alert("error with the file");
        </Script>

        <?php
        }
        if($ext_err){
            ?>
            <script>
            alert("wrong extention");
            </Script>
    
            <?php
        }

        move_uploaded_file($_FILES['userfile']['temp_name'], "images/products/".$_FILES['userfile']['name']);
        $file_name = $_FILES['userfile']['name'];
        
    }

    if($product_name == "" || $product_price == "" || $product_description == "" || $material == "" || $category == "" )
    {
        ?>
        <script>
        alert("Fill in the fields");
        </Script>

        <?php
    }
    else 
    {
        if(ProductQueries::addFurniture($con,$product_name,$product_price,$product_description,$material,$category, $file_name))
        {
            ?>
            <script>
            alert("Product Added");
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
    
}

if(isset($_POST['update-product']))
{
    $con =  Dbh::connect();
    
    $item_id = $_POST['product-id'];
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
    
    if(ProductQueries::updateFurniture($item_id,$product_name,$product_price,$product_description,$material,$category))
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
    
    $item_id = $_POST['product-id'];
    
    if($item_id < 1)
    {
        ?>
        <script>
        alert("Select an product");
        </Script>
        <?php
    }
    
    if(ProductQueries::deleteFurniture($item_id))
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



 
  

?>