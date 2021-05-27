<?php 
if(isset($_SESSION["email"]))
{
    include_once("loged-in-menu.php");
}
else{
    include_once("menu.php");
}

?>