<?php 
require_once("../processes/send_email.php");
Send_email::Mail('filip.andrei912@gmail.com','subj','as');

/*
if(isset($_POST['update_password']))
{
    
    $mail = new PHPMailer();
    //enable smtp
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';

    $mail->isHTML();
    
    $mail->Username = 'ms435674266@gmail.com';
    $mail->Password = 'j23asd1413';
    $mail->setFrom('no-reply@meubilair.com');
    
    $mail->Subject = 'Hello Word';
    $mail->Body = 'A test email!';
    $mail->addAddress('filip.andrei912@gmail.com');

    $mail->Send();
    

}*/

