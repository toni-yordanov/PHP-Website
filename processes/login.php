<?php 
//get values from form in log-in.html
$email = $POST['email'];
$password = $POST['password'];

//prevent mysql injection
$email = stripcslashes($email);
$password = stripcslashes($password);


?>