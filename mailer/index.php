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

    //Recipients
    $mail->setFrom('mahbubhussaincse@gmail.com', 'Mahbub');// from which mail sent this main
    $mail->addAddress('devmahbubmamun@gmail.com', 'Mahbub Hussain User');     //Add a recipient

    //content
    $mail->isHTML(true);  
    $mail->Subject = 'An Email sent From Mahbub Hussain';
    $mail->Body    = 'Please take a look this email as soon as possible';

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




