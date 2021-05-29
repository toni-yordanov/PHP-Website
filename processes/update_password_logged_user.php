<?php 
session_start();
include_once('userQueries.php');
include_once('stringOperations.php');
include_once('../classes/Exceptions/UserExceptions.php');

//declare vars 
$email = $password = $newPassword = $newPasswordRepeat = "";
if(isset($_POST['reset-password']))
{
    //store required data in variables
    $email = $_SESSION['email'];
    $password = stringOperations::cleanPassword($_POST['current-pwd']);
    $newPassword = stringOperations::cleanPassword($_POST['new-pwd']);
    $newPasswordRepeat =stringOperations::cleanPassword($_POST['new-pwd-repeat']);

    try {
        if(CheckInput($email,$password,$newPassword,$newPasswordRepeat))
        {
            if(UserQueries::CheckLogin($email, $password))
            {
                if($password != $newPassword)
                {
                        userQueries::UpdatePassword($email, $newPassword);
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
    catch (InvalidPasswordException $ex)
    {
        echo $ex->getMessage();
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
    else
    {
        stringOperations::checkPassword($password);
    }


    if(empty($newPassword))
    {
        echo"New password is empty!";
        return false;
    }
    else
    {
        stringOperations::checkPassword($newPassword);
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
?>