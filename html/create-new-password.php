<?php session_start();?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" type="text/css" href="../css/create-new-password.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
</head>

<body>

<?php 
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];
    
    if(empty($selector) || empty($selector))
    {
        echo "Could not validate request";
    }
      //checking the type of selector and validator
    else if(ctype_xdigit($selector) && ctype_xdigit($validator))
        {
            ?>
            <div class="container-center col-pc-4 col-xs-10 bgr-brown">
                <h1 class="black center-text">Update password</h1>
                <form action="../processes/reset-password.php" method="POST">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <input type="password" name="pwd" placeholder="Enter a new password..">
                    <input type="password" name="pwd-repeat" placeholder="Repeat the new password..">
                    <input type="button" name="reset-password-submit" value="Reset password">
                </form>
            </div>
            <?php
        }
?>

</body>
</html>