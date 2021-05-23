<!DOCTYPE html>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../js/FlowTypeJS/flowtype.js"></script>
        <script src="../js/jquerymenu.js"></script>
    </head>
    
    <body onload="LoadInfo()">

    <div class="product">
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
                        <a href="#" class="product-name"><h2 class="sm-title" id="name">NULL</h2></a>
                    </div>
                    <p class="product-price" id="price">NULL</p>
                    <!-- <p class="product-price">€133.43</p> -->
                </div>
                <!--
                <div class="off-info">
                    <h2 class= "sm-title">25% off</h2>
                </div>
                -->
            </div>

        <script>
           function LoadInfo()
           {
               <?php
               include_once('../classes/furniture.php');
                $product = $_POST['product'];
                ?>
                document.getElementById('name').innerHTML = "<?php echo $product->getName(); ?>"
                document.getElementById('price').innerHTML = "<?php echo $product->getPrice(); ?>"
            }
        </script>


    </body> 
    
</html>
