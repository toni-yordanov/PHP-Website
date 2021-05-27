<?php 

session_start();

include_once('server.php');
include_once('stringOperations.php');

if(isset($_POST['btn-login']))
{
    $con =  Dbh::connect();
    $email = stringOperations::cleanString($_POST['email']);
    $password = stringOperations::cleanPassword($_POST['password']);

    if($email == "" || $password == "")
    {
        echo "No field can be left empty";
        return;
    }
    if(checkLogin($email,$password))
    {
        $_SESSION['email'] = $email;
        header("Location: ../html/profile.php");
    }
    else
    {
        echo "The username and password are incorrect";
    }
}
/*
function checkAdmin($con,$email,$password){
    $query = $con->prepare("
    
        SELECT * FROM user WHERE email=:email AND password=:password AND rights=:right
    ");
    $admin = "ADMIN";
    $query->bindParam(":email",$email);
    $query->bindParam(":password",$password);
    $query->bindParam(":right", $admin);

    $query->execute();
    if($query->rowCount() == 1)
    {
        return true;
    }
    else 
    {
        return false;
    }
}*/

function checkLogin($email,$password)
{
    $con = Dbh::connect();
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

?>