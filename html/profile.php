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

<?php include('menu.html')?>
<?php 
session_start();

include_once("../processes/server.php");

echo "Welcome " . $_SESSION['email'];
echo "<a href='logout.php'><button>Logout</button></a>";
echo "<a href='../processes/delete_user.php'><button>Delete</button></a>";
?>
<div class = "col-pc-6 col-xs-12">
<div class = "left">

<img class="profile-img" src="../pictures/Portrait_Placeholder.png" >

</div>

<div class = "right">

    <form id="update-user" method="POST" action="../processes/update_profile.php">

        <label for="user-first-name">First Name</label>
        <p><input type="text" name="first_name" value="<?php ?>">
        </p>

        <label for="user-last-name">Last Name</label>
        <p><input type="text" name = "last_name" value="<?php ?>">
        </p>

        <label for="user-email">Email</label>
        <p><input type="text" name="email" value="<?php echo $_SESSION['email']?>">
        </p>

        <label for="user-phone">Phone number</label>
        <p><input type="text" name ="phone" value="<?php ?>"></p>

        <label for="password">Password</label>
        <p><input type="text" name ="phone" value="<?php ?>"></p>

        <label for="repeat_password">Repeat password</label>
        <p><input type="text" name ="phone" value="<?php ?>"></p>

        <input type="submit" value="update" name="update">

    </form>
</div>


</body>
</html>