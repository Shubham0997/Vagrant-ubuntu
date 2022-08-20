<?php
$name = $_POST['Name'];
$em = $_POST['Email'];
$sub= $_POST['Subject'];
$msg=$_POST['Message'];

$message= "     Name : " . $name . "    Email: " . $em . "   Subject : " . $sub . "   Message : " . $msg;
//echo $message;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('senders mail');

    $mail->addAddress('Shubham49412@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);

    $mail->send();
  //  echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('testphpmail.shubham@gmail.com');

    $mail->addAddress($em);     //Add a recipient
$subj= 'Thank you for visiting www.ershubham.live';
$body='<h1>Thank you for visiting www.ershubham.live  <br> </h1> <h2>I have received your Email, I will get back to you as soon as possible. <br><br><br><br> </h2> <p> This is a auto Generated Email. ';

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subj;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<html>
    <head>
    <meta http-equiv="refresh" content="0; url= index.php" />
    </head>
</html>
