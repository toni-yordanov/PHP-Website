<?php 
include_once('../classes/furniture.php');
session_start(); ?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/product.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body>
<!-- START Top page -->
<div id="home" class="">
        
<?php include('menus.php');
$src='../pictures/chair.jpg';
$product = $_SESSION['product'];

if( $product->getFileName() == null)
{
    
}
else{
    $src = '../images/products'.$product -> getFileName();
}

?>
<!-- END Top page -->


<!-- START Product-->
<div class=" container-product">
    <div class=" flex-container-order">
        <div class=" col-pc-6 col-xs-12">
            <img alt="chair" src="../pictures/chair.jpg">
        </div>
        <div class=" col-pc-6 col-xs-12">
            <h3> <span class=" text-left"> <?php echo $product -> getName();?></span> <span class=" text-right"> <?php echo $product -> getPrice();?></h3>
            <p>
                <?php echo $product -> getDescription();?>
            </p>
            <form>
                <button class=" btn-coffee">Something</button>
            </form>
        </div>
</div>
</div>
<div></div>


<!-- END Product-->
