<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="../js/reset_password_logged_user.js"></script>
    <link rel="stylesheet" href="../css/reset_password_anonymous_user.css"></link>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>

<body>
    <?php include('menus.php');?>
    <div class="container-center col-pc-4 col-xs-10 bgr-brown reset_password">
        <h1 class="black center-text">Reset your password</h1>
        <p>Please enter your current password, your new password followed by your new password again</p>
        <form method="POST" action="../processes/update_password_logged_user.php">
            <label for="current-pwd">Current password</label>
            <input type="password" id="current_pwd" name="current_pwd" placeholder="Current password..">
            
            <label for="new-pwd">New password</label>
            <input type="password" id="new_pwd" name="new_pwd" placeholder="New password..">

            <label for="new-pwd-repeat">Repeat the new password</label>
            <input type="password" id="new_pwd_repeat" name="new_pwd_repeat" placeholder="Repeat the new password..">
            
            <input type="submit" id="reset_password" name="reset_password" value="Reset password">
        </form>
        <p class="form-message"></p>
    </div>
</body>

</html>