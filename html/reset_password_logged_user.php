<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/reset_password_anonymous_user.css"></link>
</head>

<body>
    <?php include('menus.php');?>
    <div class="container-center col-pc-4 col-xs-10 bgr-brown reset_password">
        <h1 class="black center-text">Reset your password</h1>
        <p>Please enter your current password, your new password followed by your new password again</p>
        <form method="POST" action="../processes/update_password_logged_user.php">
            <label for="current-pwd">Current password</label>
            <input type="password" name="current-pwd" placeholder="Current password..">
            
            <label for="new-pwd">New password</label>
            <input type="password" name="new-pwd" placeholder="New password..">

            <label for="new-pwd-repeat">Repeat the new password</label>
            <input type="password" name="new-pwd-repeat" placeholder="Repeat the new password..">
            
            <input type="submit" name="reset-password" value="Reset password">
        </form>
    </div>
</body>

</html>