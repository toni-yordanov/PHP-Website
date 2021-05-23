<!DOCTYPE html>
<html>
<head> </head>

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
            <form action="../processes/reset-password.php" method="POST">
                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                <input type="password" name="pwd" placeholder="Enter a new password..">
                <input type="password" name="pwd-repeat" placeholder="Repeat the new password...">
                <button type="submit" name="reset-password-submit">Reset password</button>
            </form>
            <?php
        }
?>

</body>
</html>