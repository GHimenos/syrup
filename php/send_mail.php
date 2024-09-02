<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.syrup.team';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'orders@syrup.team';                    //SMTP username
    $mail->Password   = '48>Af2TZkHr=-T+';                      //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Recipients
    $mail->setFrom('orders@syrup.team');
    $mail->addAddress('romanenko83@gmail.com');     //Add a recipient
    $mail->addAddress('syrup.team1@gmail.com');     //Name is optional
    $body = '<p>Email: ' . $_POST['email'] . '</p>' . '<p>Имя Пользователя: ' . $_POST['name'] . '</p>' . '<p> Комментарий : ' . $_POST['comment'] . '</p>';


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Message from Syrup Web Site';
    $mail->Body = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
