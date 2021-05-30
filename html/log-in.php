<?php session_start();?>
<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" type="text/css" href="../css/log-in.css">
    <script defer src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="../js/log-in.js"></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body>

<?php include('menus.php');?>
<div class="container-center col-pc-4 col-xs-10 bgr-brown" id="log-in">
    <h1 class="black center-text">Log in</h1>

    <form  method="POST" action="../processes/login.php">
        <label for="Email">Email</label>
        <p><input type="text" id="email" name="email" autocapitalize="off" autocorrect="off"></p>

        <label for="Password">Password</label>
        <p><input type="password" id="password" name="password" value=""></p>

        <button id="log-in" type="submit" name="submit_login">Log In</button>
        
        <label id="showPassword">
            Show password
            <input type="checkbox" checked="checked" name="showPassword">
        </label>

        <p class="form-message"></p>

        <div class="log_in-help">
            <p id="forgotPassword"><a href="../html/reset_password_anonymous_user.php">Forgot your password?</a></p>
            <p id="noAccount"><a href="../html/register.php">I don't have an account</a></p>
        </div>
    </form>

</div>

</body>
</html>