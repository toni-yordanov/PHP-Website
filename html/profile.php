<?php session_start(); ?>

<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/profile.css">
    <script defer src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="../js/profile.js"></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body>

<?php include('menus.php');

include_once("../processes/userQueries.php");
include_once("../processes/update_profile.php");
if(isset($_SESSION['email']))
{
    $result = UserQueries::GetUserDetails($_SESSION['email']);

    echo "Welcome " . $_SESSION['email'];
    echo "<a href='../processes/logout.php'><button>Logout</button></a>";
    echo "<a href='../processes/delete_user.php'><button>Delete</button></a>";
}
else
{
    header("Location: index.php");
}


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

        <input type="submit" value="Update information" name="update">
    </form>
    <input type="submit" value="Update password" name="update_password">
</div>

</body>
</html>