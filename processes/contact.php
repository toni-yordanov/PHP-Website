<?php 
//include_once('stringOperations.php');
include_once('send_email.php');

if(isset($_POST['send-mail']))
{
    $name= strip_tags($_POST['name']) ;
    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);

    $body = "Name: " .$name . "<br> email address: " . $email ." <br>" . $message;
    //send a mail to an administrator
    Send_email::Mail("filip.andrei912@gmail.com", "contact message", $body);
    header("Location: ../html/contact.php");
    echo "Message sent!";
}
?>