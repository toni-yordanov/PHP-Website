<?php session_start();?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body id="myPage" data-spy="scroll" data-target=".menu" data-offset="60">
<!-- START Top page -->
<div id="home" class="container-full-height img-bgr">
        
    <?php include('menus.php');?>
    <div class="top flex-container-center">
        <div>
            <h2><span class="almond">Home, sweet home!</span></h2>
        </div>
    </div>
</div> 

<!-- END Top page -->

<!-- Start Categories -->

<div id="Categories" class="container">
    <div class="bgr-bone">
    <h2 class="center-text padding-top">Categories</h2>
    <div class="flex-container-order padding-all-double">
        
        <div class="flex-item">
            <div class="overlay">
                <img alt="Bedrooms" src="../pictures/bedroom.jpg" >
                <a href="catalogPage.php?varname=<?php echo "Bedroom" ?>"><button class="btn-coffee">Bedroom</button></a>
            </div>
            
        </div>
        
        <div class="flex-item">
            <div class="overlay">
                <img alt="Bathroom" src="../pictures/bathroom.jpg" >
                <a href="catalogPage.php?varname=<?php echo "Bathroom" ?>"><button class="btn-coffee">Bathroom</button></a>
            </div>
            
        </div>
        
        <div class="flex-item">
            <div class="overlay">
                <img alt="Garden" src="../pictures/garden.jpg" >
                <a href="catalogPage.php?varname=<?php echo "Garden" ?>"><button class="btn-coffee">Garden</button></a>
            </div>
            
        </div>
        
        
        <div class="flex-item">
            <div class="overlay">
                <img alt="Office" src="../pictures/office.jpg" >
                <a href="catalogPage.php?varname=<?php echo "Office" ?>"><button class="btn-coffee">Office</button></a>
            </div>
            
        </div>

        <div class="flex-item">
            <div class="overlay">
                <img alt="Living room" src="../pictures/living_room.jpg" >
                <a href="catalogPage.php?varname=<?php echo "Living room" ?>"><button class="btn-coffee">Living room</button></a>
            </div>
            
        </div>

        <div class="flex-item">
            <div class="overlay">
                <img alt="kitchen" src="../pictures/kitchen.jpg" >
                <a href="catalogPage.php?varname=<?php echo "Kitchen" ?>"><button class="btn-coffee">Kitchen</button></a>
            </div>
            
        </div>
               
    </div>
</div>
</div>

<!-- End Categories -->
</body>
<script>
        var header = $('.img-bgr');

var backgrounds = new Array( 
    'url(../images/slideshow/slideshow.jpeg)'
  , 'url(../images/slideshow/slideshow1.jpg)'
  , 'url(../images/slideshow/slideshow2.jpg)'
  , 'url(../images/slideshow/slideshow3.jpg)'
);
    
var current = 0;

function nextBackground() {
    current++;
    current = current % backgrounds.length;
    header.css('background-image', backgrounds[current]);
}
setInterval(nextBackground, 2000);

header.css('background-image', backgrounds[0]);
    </script>
</html>