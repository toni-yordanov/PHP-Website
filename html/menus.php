<?php 


    
if(isset($_SESSION["email"]))
{
    
    $user = GetUserDetails($_SESSION["email"]);
    if($user["rights"] == "ADMIN"){
        include_once("loged-in-admin-menu.php");
    }
    include_once("loged-in-user-menu.php");
}
else{

    
    include_once("menu.php");
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