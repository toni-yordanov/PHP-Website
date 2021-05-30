<?php session_start();?>
<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" type="text/css" href="../css/log-in.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include('menus.php');?>
<div class="container-center col-pc-4 col-xs-10 bgr-brown" id="log-in">
    <h1 class="black center-text">Log in</h1>
    <form  method="POST" action="../processes/login.php">
        <label for="Email">Email</label>
        <p><input type="text" name="email" autocapitalize="off" autocorrect="off"></p>

        <label for="Password">Password</label>
        <p><input type="password" name="password" value="" id="password"></p>

        <button id="log-in" type="submit" name="btn-login">Log In</button>
        
        <label id="showPassword">
            Show password
            <input type="checkbox" checked="checked" name="showPassword" onclick="ShowPassword()">
        </label>

        <div class="log_in-help">
            <p id="forgotPassword"><a href="../html/reset_password_anonymous_user.php">Forgot your password?</a></p>
            <p id="noAccount"><a href="../html/register.php">I don't have an account</a></p>
        </div>
    </form>
</div>

</body>

<script>
function ShowPassword(){
var passCheckBox = document.getElementById('showPassword');
if(passCheckBox){
    document.getElementById('password').type = 'text';
}
else{
    document.getElementById('password').type = 'password';
}
}
</script>
</html>