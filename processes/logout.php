<?php 
//session start call is needed before destroying
session_start();
session_destroy();

header('Location: ../html/index.php');
?>