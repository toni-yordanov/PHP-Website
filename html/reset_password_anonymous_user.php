<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <script defer src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="../js/reset_password_anonymous_user.js"></script>
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
            <input type="text" id="email" name="email">
            <input class = "button" type="submit" id="update_password" name="update_password" value="Get email">
        </form>
        <p class="form-message"></p>
    </div>




<?php 
    if(isset($_GET["reset"]) && $_GET["reset"] == "success")
    {
        ?><script>
            alert("An email was sent to your address");
        </script><?php
    }
    elseif(isset($_GET["newpwd"]))
    {
        if($_GET["newpwd"]=="empty")
        {
            ?>
            <script>
                alert("There has been an error, please resubmit your request.");
            </script>
            <?php
        }
        elseif($_GET["newpwd"]=="mismatch")
        {
            ?>
            <script>
                alert("The passwords do not match");
            </script>
            <?php
        }
        elseif($_GET["newpwd"]=="passwordupdated")
        {
            ?>
            <script>
                alert("Password updated successfully");
            </script>
            <?php
        }
    }
?>
</body>
</html>