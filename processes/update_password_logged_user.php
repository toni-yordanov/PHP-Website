<?php 
session_start();
require_once('server.php');
require_once('stringOperations.php');

//declare vars 
$email = $password = $newPassword = $newPasswordRepeat = "";
if(isset($_POST['reset-password']))
{
    //store required data in variables
    $email = $_SESSION['email'];
    $password = stringOperations::cleanPassword($_POST['current-pwd']);
    $newPassword = stringOperations::cleanPassword($_POST['new-pwd']);
    $newPasswordRepeat =stringOperations::cleanPassword($_POST['new-pwd-repeat']);

    
    if(CheckInput($email,$password,$newPassword,$newPasswordRepeat))
    {
        if(checkLogin($email, $password))
        {
           if($password != $newPassword)
           {
                UpdatePassword($email, $newPassword);
                session_destroy();
                header("Location: ../html/log-in.php");
                //script alert bla bla bla 
           }
           else {
               echo "Please choose a new password different from the old one!";
           }
        }
        else
        {
            echo "Wrong current password";
        }
    }
}



function checkLogin($email,$password)
{
    $con =  Dbh::connect();
    $query = $con->prepare("
    
        SELECT * FROM user WHERE email=:email AND password=:password
    ");
    $query->bindParam(":email",$email);
    $query->bindParam(":password",$password);

    $query->execute();

    //check how many rows are returned
    if($query->rowCount() == 1)
    {
        return true;
    }
    else {
        return false;
    }
}
function CheckInput($email, $password, $newPassword, $newPasswordRepeat)
{
    //in case of an error 
    if(empty($email))
    {
        header("Location: ../html/index.php");
        return false;
    }
    if(empty($password))
    {
        echo"Current password is empty!";
        return false;
    }
        
    if(empty($newPassword))
    {
        echo"New password is empty!";
        return false;
    }
    if(empty($newPasswordRepeat))
    {
        echo"New password repeat is empty!";
        return false;
    }
    if($newPassword != $newPasswordRepeat)
    {
        echo"Passwords do not match!";
        return false;
    }
    return true;
}
function UpdatePassword($email, $newPassword)
{
    $con = Dbh::connect();
    $sql = $con->prepare("
        UPDATE user SET password=:newPassword WHERE email = '$email';
    ");
    $sql->bindParam(":newPassword", $newPassword);
    $sql->execute();
}
?>