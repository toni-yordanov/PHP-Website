<?php session_start(); ?>
<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/log-in.css">
    <script defer src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="../js/register.js"></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>
<body>

<?php include('menus.php');?>

<div class="container-center col-pc-4 col-xs-10 bgr-brown register">
    <h1>Register</h1>

    <form id="register-form" method="POST" action="../processes/register.php">

        <label for="name">First name</label>
        <p><input type="text" id="first-name" name="first_name" value="" autocorrect="off">
        </p>

        <label for="name">Last name</label>
        <p><input type="text" id="last-name" name="last_name" value="" autocorrect="off">
        </p>

        <label for="email">Email</label>
        <p><input type="text" id="email" name="email" value="" autocapitalize="off" autocorrect="off">
        </p>

        <label for="phoneNr">Phone number</label>
        <p><input type="tel" id="phone-number" name="phone_nr" value="">
        </p>

        <label for="password">Password</label>
        <p><input type="password" id="password" name="password" value=""></p>

        <label for="passwordMatch">Repeat password</label>
        <p><input type="password" id="password-repeat" name="passwordMatch" value=""></p>

        <p><input id="btn-register" type="submit" name="submit_register" value="Create account"></input></p>
        
        <label id="showPassword">
            Show password
            <input type="checkbox" checked="checked" name="showPassword">
        </label>

        <p class="form-message"></p>
        
        <div class="register-help">
            <p id="alreadyAccount"><a href="../html/log-in.php">Do you already have an account?</a></p>
        </div>
    </form>
</div>

</body>
</html>