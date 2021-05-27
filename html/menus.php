<?php 
include_once("../processes/update_profile.php");
include_once("../classes/user.php");
$email = $_SESSION["email"];
if($email == null){

    include_once("menu.php");

}
else{

    $user = GetUserDetails($email);
    if($user->getRights() == "ADMIN"){
        include_once("loged-in-admin-menu.php");
    }
    include_once("loged-in-user-menu.php");
}

?>