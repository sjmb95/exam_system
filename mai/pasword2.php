<?php
include "connection.php";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'connection.php';

$code=uniqid(true);
$query="INSERT INTO resetpassword(code,email) VALUES('$code','$email') ";
if ($conn->query($query) === FALSE){
    exit("error in generating code");
}
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

 
try {
    //Server settings
   $mail->isSMTP();  
    //$mail->SMTPDebug = 2;                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'group6onlineport@gmail.com';                     // SMTP username
    $mail->Password   = 'Groupsix_6';                               // SMTP password
     //$mail->SMTPSecure = 'ssl';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('group6onlineport@gmail.com', 'Online Exam Portal Group 6');
    $mail->addAddress("$email");     // Add a recipient
    // $mail->addReplyTo('@onlineexamportalgroup4@gmail.com', 'No reply');
    
    // Content
    $url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."../new_password.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password reset link';
    $mail->Body    = "<h1>forgot your password adnd You requested a password reset? if yes click the link below to do so</h1><br>
                        Click<a href='$url'>This link</a>to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo ' the link to reset  password has been sent to your email<br>you will need to reset from the link sent to your email'.'<br>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();


?>