<?php 
session_start();

include_once("../processes/server.php");

echo "Welcome " . $_SESSION['email'];
echo "<a href='logout.php'>Logout</a>";
echo "<a href='update.php'>Update</a>";
echo "<a href='delete.php'>Delete</a>";
?>