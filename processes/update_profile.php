<?php 


include_once('server.php');
include_once('../html/profile.php');
include_once('../processes/stringOperations.php');

$email = GetEmail();
$result = GetUserDetails($email);

if(isset($_POST['update']))
{
    $con =  Dbh::connect();
    $first_name = stringOperations::cleanString($_POST['first_name']);
    $last_name = stringOperations::cleanString($_POST['last_name']);
    $phone_nr = stringOperations::cleanString($_POST['phone_nr']);

    if($first_name == "" || $last_name == "" || $phone_nr == "" )
    {
        echo "No field can be left empty";
        return;
    }
    $id = $result['id'];

    if(updateDetails($id,$first_name,$last_name,$phone_nr))
    {
        //$_SESSION['email'] = $email;
        header("Location: ../html/profile.php");
    }
}


function updateDetails($id,$first_name,$last_name,$phone_nr)
{
    $con =  Dbh::connect();
    $query = $con->prepare("
    UPDATE user
    SET first_name=:first_name, last_name=:last_name, phone_nr=:phone_nr
    WHERE id=:id
    ");
    $query->bindParam(":first_name",$first_name);
    $query->bindParam(":last_name",$last_name);
    $query->bindParam(":phone_nr",$phone_nr);
    $query->bindParam(":id",$id);

    return $query->execute();
}

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