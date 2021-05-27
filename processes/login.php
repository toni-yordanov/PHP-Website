<?php 

session_start();

include_once('userQueries.php');
include_once('stringOperations.php');

if(isset($_POST['btn-login']))
{
    $email = stringOperations::cleanString($_POST['email']);
    $password = stringOperations::cleanPassword($_POST['password']);

    if($email == "" || $password == "")
    {
        echo "No field can be left empty";
        return;
    }
    if(userQueries::CheckLogin($email,$password))
    {
        $_SESSION['email'] = $email;
        header("Location: ../html/profile.php");
    }
    else
    {
        echo "The username and password are incorrect";
    }
}



?>