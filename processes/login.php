<?php 

session_start();

include_once('server.php');

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

    if(checkLogin($con,$email,$password))
    {
        $_SESSION['email'] = $email;
        header("Location: ../html/profile.php");
    }
    else
    {
        echo "The username and password are incorrect";
    }
}

function checkLogin($con,$email,$password)
{
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