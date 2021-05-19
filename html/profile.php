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

<?php include('menu.html');
session_start();

include_once("../processes/server.php");
include_once("../processes/update_profile.php");
$result = GetUserDetails($_SESSION['email']);

echo "Welcome " . $_SESSION['email'];
echo "<a href='../html/logout.php'><button>Logout</button></a>";
echo "<a href='../processes/delete_user.php'><button>Delete</button></a>";

function GetEmail()
{
    return $_SESSION['email'];
}
?>

<div class = "col-pc-6 col-xs-12">


<img class="profile-img" src="../pictures/Portrait_Placeholder.png" >


</div>

<div class = "col-pc-6 col-xs-12">


    <form id="update-user" method="POST" action="../processes/update_profile.php">

        <label for="user-first-name">First Name</label>
        <p><input type="text" name="first_name" value="<?php echo $result['first_name'] ?>">
        </p>

        <label for="user-last-name">Last Name</label>
        <p><input type="text" name = "last_name" value="<?php echo $result['last_name']?>">
        </p>

        <label for="user-phone">Phone number</label>
        <p><input type="text" name ="phone_nr" value="<?php echo $result['phone_nr']?>"></p>

        <input type="submit" value="Update" name="update">
        <input type="submit" value="Update password" name="Update_Password">
        <input type="submit" value="Update email" name = "Update_Email">
        
    </form>
        

</div>

</body>
</html>