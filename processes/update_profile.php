<?php 

session_start();

$email = $_SESSION['email'];
include_once('server.php');

GetUserDetails($email);

function GetUserDetails($var)
{
    $con = Dbh::connect();
    $query = $con->prepare("
        SELECT *
        FROM user
        WHERE email = :email
    ");
    $query->bindParam(":email",$var);
    $query->execute();

    $result = $query->fetch();
    return $result;
}
?>