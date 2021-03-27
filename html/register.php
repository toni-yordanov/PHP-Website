<?php session_start(); ?>
<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/log-in.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-center col-pc-4 col-xs-10 bgr-brown" id="register">
<h2>Register</h2>
<form id="register" method="POST" action="../processes/register.php">

    <label for="name">First name</label>
    <p><input type="text" name="first_name" value="" autocorrect="off">
    </p>

    <label for="name">Last name</label>
    <p><input type="text" name="last_name" value="" autocorrect="off">
    </p>

    <label for="email">Email</label>
    <p><input type="text" name="email" value="" autocapitalize="off" autocorrect="off">
    </p>

    <label for="phoneNr">Phone number</label>
    <p><input type="tel" name="phone_nr" value="">
    </p>

    <label for="password">Password</label>
    <p><input type="password" name="password" value=""></p>

    <label for="passwordMatch">Repeat password</label>
    <p><input type="password" name="passwordMatch" value=""></p>

    <button id="btn-register" type="submit" name="register">Create account</button>
    <label id="showPassword">
        Show password
        <input type="checkbox" checked="checked" name="showPassword">
    </label>

    <div class="register-help">
        <p id="alreadyAccount"><a href="../html/log-in.html">Do you already have an account?</a></p>
    </div>

    <div class="clearfix"></div>

</form>
</div>

</body>
</html>