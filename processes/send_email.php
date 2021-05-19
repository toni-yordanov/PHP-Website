<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once '../processes/php_mailer/Exception.php';
require_once '../processes/php_mailer/PHPMailer.php';
require_once '../processes/php_mailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['send-mail'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ms435674266@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'j23asd1413'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('ms435674266@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('ms435674266@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
      