<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage inventory</title>
    <link rel="stylesheet" href="../css/inventory.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include('menu.html')?>

<div class = "col-pc-6 col-xs-12">
<form id="f-products" method="POST" action="../processes/product-manager.php">
        
            <label for="product-id">ID</label>
            <p><input type="text" id="product-id" name="product-id" readonly>
            </p>

            <label for="product-name">Name</label>
            <p><input type="text" id="product-name" name="product-name" >
            </p>

            <label for="product-price">Price</label>
            <p><input type="number" id = "product-price" name="product-price" >
            </p>

            <label for="product-description">Description</label>
            <p><textarea id="product-description" name="product-description" rows="5" cols="60"></textarea></p>
            
            <label for="material">Select material</label>
            <div class="custom-select" style="width:200px;">
            <select id="material" name="material">
                <option value="Wood">Wood</option>
                <option value="Metal">Metal</option>
                <option value="Glass">Glass</option>
                <option value="Pladtic">Pladtic</option>
                <option value="Ceramic">Ceramic</option>
            </select>
            </div>
            <br>

            <label for="category">Select material</label>
            <div class="custom-select" style="width:200px;">
            <select id="category" name="category">
                <option value="Bedroom">Bedroom</option>
                <option value="Bathroom">Bathroom</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Garden">Garden</option>
            </select>
            </div>
            <br>


            

            <button id="add-product" type="submit" name="add-product" >Add product</button>
            <button id="update-product" type="submit" name="update-product" >Update product</button>

</form> 
</div>

<div class = "col-pc-6 col-xs-12">
    <formmethod="POST" action="../processes/product-manager.php">
    <label for="search-id">Enter ID</label>
    <p><input type="text" id="search-id" name="search-id"></p>
    <button id="search-id" type="submit" name="search-id" >Search by id</button>        
    </form>

</div>

</body>
</html>