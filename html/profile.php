<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- START Top page -->
<?php include('menu.html')?>
<!-- END Top page -->

<div class = "col-pc-6 col-xs-12">
<div class = "left">

<img class="profile-img" src="../pictures/Portrait_Placeholder.png" >

</div>

<div class = "right">

<form id="f-user">
        
            <label for="user-first-name">First Name</label>
            <p><input type="text" id="user-first-name" name="user-first-name" >
            </p>

            <label for="user-last-name">Last Name</label>
            <p><input type="text" id = "user-last-name" name="user-last-name" >
            </p>

            <label for="user-email">Email</label>
            <p><input type="text" id="user-email" name="user-email" >
            </p>
        
            <label for="user-phonr">Phone number</label>
            <p><input type="text" id = "user-phonr" name="user-phonr"></p>


        </form> 
</div>


</body>
</html>
















<?php 
session_start();

include_once("../processes/server.php");

echo "Welcome " . $_SESSION['email'];
echo "<a href='logout.php'>Logout</a>";
echo "<a href='update.php'>Update</a>";
echo "<a href='delete.php'>Delete</a>";
?>