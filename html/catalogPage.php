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
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body>
<!-- START Top page -->

<?php 
        include('menus.php');
        include_once('../processes/product-manager.php');
        include_once('../classes/furniture.php');
?>
    
<div class="top-img col-pc-12 col-xs-">
    <div class="column">
        <img src="../images/catalogPage/resized-image-Promo.jpeg">
    </div>
    <div class="column discard">
        <img src="../images/catalogPage/garden-main2.jpg">
    </div>
</div>

<div class="title">
    <h1>Garden</h1>
    <p>At MEUBILAIR you can fin the most suitable gardening tools and lorem ipsum lorem 
        ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum lorem
         ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
         At MEUBILAIR you can fin the most suitable gardening tools and lorem ipsum lorem 
         ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum lorem
          ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
</div>

<!-- END Top page -->

<div class="filter-mobile col-xs-12 b">

</div>

<div. id="catalogPage-body" class="container">

    <div class="filter-container col-pc-2 col-xs-0">
        <div class="filter">
            <form id="filters">
                
            </form>
            <div class="slider-container">

            </div>
        </div>
    </div>
    
    <div class="products col-pc-10 col-xs-12">
        <div class = "product-items">

<!-- single product -->
<?php
                $category = $_GET['varname'];
                $products = getFurnitureByCategory($category);

                
                foreach($products as $product){

                  ?>  <div class="product">
                <div class="product-content">
                    <div class="product-img">
                        <img src="../images/catalogPage/garden.jpg" alt="product image">
                    </div>
                    <div class="product-btns">
                        <button type="button" class="btn-wish">
                            wishlist
                            <span><i class = "fas fa-plus"></i></span>
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-info-top">
                        <a href="#" class="product-name"><h2 class="sm-title" id="name"><?php echo $product->getName();?></h2></a>
                    </div>
                    <p class="product-price" id="price"><?php echo $product->getPrice();?></p>
                    <!-- <p class="product-price">€133.43</p> -->
                </div>
                <!--
                <div class="off-info">
                    <h2 class= "sm-title">25% off</h2>
                </div>
                -->
            </div>
            <?php
                }
              
            ?>
            <!-- end of single product -->







</body>

</html>