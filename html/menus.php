<?php 
include_once("../processes/server.php");
include_once("../processes/userQueries.php");

if(isset($_SESSION["email"]))
{
    
    $user = UserQueries::GetUserDetails($_SESSION["email"]);
    if($user["rights"] == "ADMIN"){
        include_once("loged-in-admin-menu.php");
    }
    include_once("loged-in-user-menu.php");
}
else{

    
    include_once("menu.php");
}




?>