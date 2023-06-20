<?php 
use App\Mahbub\Phpmailer\Config\Config;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


include_once __DIR__ .'/vendor/autoload.php';


$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = Config::SMTP_HOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = Config::SMTP_USER;                     //SMTP username
    $mail->Password   = Config::SMTP_PASSWORD;                              //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = Config::SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('mahbubhussaincse@gmail.com', 'Mahbub');// from which mail sent this main
    $mail->addAddress('devmahbubmamun@gmail.com', 'Mahbub Hussain User');     //Add a recipient

    //content
    $mail->isHTML(true);  
    $mail->Subject = '<h3>An Email sent From Mahbub Hussain<h3>';
    // $mail->Body    = '<h2>Please take a look this email as soon as possible</h2>'
    $mail->Body = '<h2>Please take a look this email as soon as possible</h2>'
             . '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/265px-Red_Apple.jpg">'
             . "\n"
             . '<p style="color: #f00;">This is an email with some <span style="color: #0f0">CSS styles</span>.</p>';
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/banana.png', 'banana');
    $mail->AltBody = "Hello.\nThis is the body in plain text for non-HTML mail clients";
    

    // reply option
    $mail->addReplyTo('info@example.com', 'Information');

    // cc & bcc 
    $mail->addCC('sylheteducation@gmail.com');
    $mail->addBCC('devmahbub@gmail.com');

    //  attachment
    $mail->addAttachment(dirname(__FILE__) . '/example.pdf');
  

$mail->send();
    echo 'Message has been sent';
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




