<?php session_start();?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" type="text/css" href="../css/create-new-password.css">
    <script defer src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script defer src="../js/create-new-password.js" ></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>

<body>

<?php 
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if(empty($selector) || empty($selector))
    {
        
        ?><script>
            alert("Could not validate request");
        </script><?php
    }
      //checking the type of selector and validator
    elseif(ctype_xdigit($selector) && ctype_xdigit($validator))
    {
        ?>
        <div class="container-center col-pc-4 col-xs-10 bgr-brown">
            <h1 class="black center-text">Update password</h1>
            <form action="../processes/reset-password.php" method="post">
                <input type="hidden" id="selector" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" id="validator" name="validator" value="<?php echo $validator; ?>">
                <input type="password" id="pwd" name="pwd" placeholder="Enter a new password..">
                <input type="password" id="pwd_repeat" name="pwd_repeat" placeholder="Repeat the new password..">
                <input type="submit" id="reset_password_submit" name="reset_password_submit" value="Reset password">
            </form>
            <p class="form-message"></p>
        </div>
        <?php
    }
?>

</body>
</html>