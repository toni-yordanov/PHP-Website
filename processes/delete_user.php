<?php 
session_start();
include_once('userQueries.php');

UserQueries::RemoveUser($_SESSION['email']);

session_destroy();
header("Location: ../html/index.php");
?>