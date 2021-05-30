<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once '../processes/php_mailer/Exception.php';
require_once '../processes/php_mailer/PHPMailer.php';
require_once '../processes/php_mailer/SMTP.php';

class  Send_email
{
  static function Mail($address, $subject, $body)
  {
    try{
      $mail = new PHPMailer(true);

      $alert = '';
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'ms435674266@gmail.com'; // Gmail address which you want to use as SMTP server
      $mail->Password = 'j23asd1413'; // Gmail address Password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = '587';
  
      $mail->setFrom('no-reply@meubilair.com', 'no-reply:Meubilair'); // Gmail address which you used as SMTP server
      $mail->addAddress($address); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
  
      $mail->isHTML(true);
      
      $mail->Subject = $subject;
      $mail->Body = $body;
      
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

}
?>
      