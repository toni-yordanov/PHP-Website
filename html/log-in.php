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

    
<div class="container-center col-pc-4 col-xs-10 bgr-brown" id="log-in">

<h2>Log in</h2>
<form id="log-in" method="POST" action="../processes/login.php">

    <label for="Email">Email</label>
    <p><input type="text" name="email" autocapitalize="off" autocorrect="off">
    </p>
    <label for="Password">Password</label>
    <p><input type="password" name="password" value=""></p>
    <button id="log-in" type="submit" name="btn-login">Log In</button>
    <label id="showPassword">
        Show password
        <input type="checkbox" checked="checked" name="showPassword">
    </label>
    <div class="log_in-help">
        <p id="forgotPassword"><a href="#">Forgot your password?</a></p>
        <p id="noAccount"><a href="../html/register.php">I don't have an account</a></p>
    </div>

</form>
</div>

</body>
</html>