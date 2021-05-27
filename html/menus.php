<?php 
include_once("../processes/update_profile.php");
include_once("../classes/user.php");


    
if(isset($_SESSION["email"]))
{
    
    $user = GetUserDetails($_SESSION["email"]);
    if($user->getRights() == "ADMIN"){
        include_once("loged-in-admin-menu.php");
    }
    include_once("loged-in-user-menu.php");
}
else{
    include_once("menu.php");
}

?>