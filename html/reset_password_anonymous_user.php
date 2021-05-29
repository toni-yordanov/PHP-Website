<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/reset_password_anonymous_user.css"></link>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>


<body>
    <?php include('menus.php');?>

    <div class="container-center col-pc-4 col-xs-10 bgr-brown reset_password">
        <h1 class="black center-text">Reset your password</h1>
        <p class="info">You will receive an email with the instructions for resetting your password</p>

        <form action="../processes/update_password.php" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email">
            <input class = "button" type="submit" name="update_password" value="Get email">
        </form>
    </div>




<?php 
    if(isset($_GET["reset"]) && $_GET["reset"] == "success")
    {
        echo"An email was sent to your address";
    }
    elseif(isset($_GET["newpwd"]))
    {
        if($_GET["newpwd"]=="empty")
        {
            echo "There has been an error, please resubmit your request.";
        }
        elseif($_GET["newpwd"]=="mismatch")
        {
            echo "The passwords do not match";
        }
        elseif($_GET["newpwd"]=="passwordupdated")
        {
            echo "Password updated successfully";
        }
    }
?>

</body>

</html>