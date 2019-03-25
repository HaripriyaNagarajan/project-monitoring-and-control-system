<?php
require 'PHPMailer\PHPMailerAutoload.php';
 $mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'test@hostinger-tutorials.com';
$mail->Password = 'EMAIL_ACCOUNT_PASSWORD';
$mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
$mail->addReplyTo('reply-box@hostinger-tutorials.com', 'Your Name');
$mail->addAddress('example@gmail.com', 'Receiver Name');
$mail->Subject = 'PHPMailer SMTP message';

$mail->AltBody = 'This is a plain text message body';

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>