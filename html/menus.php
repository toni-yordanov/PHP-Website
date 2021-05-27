<?php 
$user = $_SESSION["email"];
if($user == null){
    include_once("menu.php");
}
else{
    include_once("loged-in-menu.php");
}

?>