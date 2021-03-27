<?php 
session_start();
include_once('server.php');

if(isset($_POST['register']))
{
    $con =  Dbh::connect();
    $first_name = Dbh::cleanString($_POST['first_name']);
    $last_name = Dbh::cleanString($_POST['last_name']);
    $email = Dbh::cleanString($_POST['email']);
    $phone_nr = Dbh::cleanString($_POST['phone_nr']);
    $password = Dbh::cleanPassword($_POST['password']);
    $passwordMatch = Dbh::cleanPassword($_POST['passwordMatch']);

    if($first_name == "" || $last_name == "" || $email == "" || $phone_nr == "" || $password == "" || $passwordMatch == "")
    {
        echo "No field can be left empty";
        return;
    }
    if(isEmailUnique($email))
    {
        if($password == $passwordMatch && insertUser($con,$first_name,$last_name,$email,$phone_nr,$password))
        {
            $_SESSION['email'] = $email;
            header("Location: ../html/profile.php");    //redirects user to profile.php
        }
        else
            echo "An error has ocurred, cannot register user";
    }
    else
        echo "Email already is in use";
}

function insertUser($con,$first_name,$last_name,$email,$phone_nr,$password)
{
    $query = $con->prepare("
        INSERT INTO  user (id,first_name,last_name,email,phone_nr,password)

        VALUES(NULL,:first_name,:last_name,:email,:phone_nr,:password)
    ");
    $query->bindParam(":first_name",$first_name);
    $query->bindParam(":last_name",$last_name);
    $query->bindParam(":email",$email);
    $query->bindParam(":phone_nr",$phone_nr);
    $query->bindParam(":password",$password);
    
    return $query->execute();
}

function isEmailUnique($email)
{
    $con =  Dbh::connect();
    $query = $con->prepare("
        SELECT * FROM user WHERE email=:email
    ");
    $query->bindParam(":email",$email);

    $query->execute();

    //check how many rows are returned
    if($query->rowCount() == 0)
    {
        return true;
    }
    else 
    {
        return false;
    }
}
?>