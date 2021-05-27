<?php  
include_once("userQueries.php");
include_once("stringOperations.php");


if (isset($_POST["reset-password-submit"])) 
{
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if(empty($selector) || empty($validator))
    {
        header("Location: ../html/reset_password_anonymous_user.php?newpwd=empty"); 
        exit();
    }
    elseif($password != $passwordRepeat)
    {
        header("Location: ../html/reset_password_anonymous_user.php?newpwd=mismatch"); 
        exit();
    }
    UserQueries::Update_password($selector, $validator, $password);
}
else
{
    header("Location: ../html/index.php");
}




