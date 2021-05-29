<?php session_start();?>
<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage inventory</title>
    <link rel="stylesheet" href="../css/inventory.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body>

<?php include('menus.php');?>

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

            <label for="category">Select category</label>
            <div class="custom-select" style="width:200px;">
            <select id="category" name="category">
                <option value="Bedroom">Bedroom</option>
                <option value="Bathroom">Bathroom</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Garden">Garden</option>
                <option value="Office">Office</option>
                <option value="Living room">Living room</option>
            </select>
            </div>
            <br>


            

            <button id="add-product" type="submit" name="add-product" >Add product</button>
            <button id="update-product" type="submit" name="update-product" >Update product</button>
            <button id="delete-product" type="submit" name="delete-product" >Delete product</button>

</form> 
</div>
<?php
$item_id = 0;

if(isset($_POST['search']))
{
    include_once('../processes/server.php');
    include_once('../processes/product-manager.php');
    $con =  Dbh::connect();
    $id = ($_POST['search-id']);
    $item_id = $id;

    $result = getFurnitureById($id);

    ?>
    <script>
        document.getElementById('product-id').value = "<?php echo $result['id'] ?>"
        document.getElementById('product-name').value = "<?php echo $result['product_name'] ?>"
        document.getElementById('product-price').value = "<?php echo $result['price'] ?>"
        document.getElementById('product-description').value = "<?php echo $result['product_description'] ?>"
        document.getElementById('material').value = "<?php echo $result['material'] ?>"
        document.getElementById('category').value = "<?php echo $result['category'] ?>"
    </script>
    <?php
    
}


?>


<div class = "col-pc-6 col-xs-12">
    <form method="POST" action="">
    <label for="search-id">Enter ID</label>
    <p><input type="text" id="search-id" name="search-id"></p>
    <button id="search" type="submit" name="search" >Search by id</button>        
    </form>

</div>

</body>
</html>