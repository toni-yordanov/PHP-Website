<?php 
//session start call is needed beofer destroying
session_start();
session_destroy();

header("Location: ../html/index.php");
?>