<?php 
session_start();
include_once('server.php');

removeUser();
session_destroy();
header("Location: ../html/index.php");

function removeUser()
{
    $email = $_SESSION['email'];
    $con = Dbh::connect();
    //I really could not use * and had to name each column name, otherwise it threw an error
    //copy the user to deleted_user
    $quey = $con->prepare("
        INSERT INTO deleted_user (id,first_name,last_name,email,phone_nr,password,rights)
        SELECT id,first_name,last_name,email,phone_nr,password,rights
        FROM user
        WHERE email = :email
        ");
    $quey->bindParam(":email",$email);
    $quey->execute();
    
    //delete the user from user table
    $quey = $con->prepare("
        DELETE 
        FROM user
        WHERE email = :email
    ");
    $quey->bindParam(":email",$email);
    $quey->execute();
}

?>