<?php session_start(); ?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/catalogPage.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <script src="../js/catalogPage.Js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</head>
<body>
<!-- START Top page -->

<?php 
        include('menus.php');
        include('../processes/productQuerries.php');
        include_once('../classes/furniture.php');
        $category = $_GET['varname'];
?>
    


<div class="title">
    <h1><?php echo $category?></h1>
    
</div>

<!-- END Top page -->


<div id="catalogPage-body" class="container">


    
    <div class="products col-pc-12 col-xs-12">
        <div class = "product-items">

<!-- single product -->
<?php
                
                $products = ProductQueries::getFurnitureByCategory($category);

                
        $i = 0;
        if($products != null){
            

            foreach($products as $product){
    
                include('singleProduct.php');
                $i++;
              }
            
          
        }
        else
        {
            echo "No products here";
        }
    
                ?> 
            <!-- end of single product -->

        </div>
    </div>
</div>
</body>





</html>