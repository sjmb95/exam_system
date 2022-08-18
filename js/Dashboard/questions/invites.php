<?php
session_start();
include "connect.php";
require 'PHPMailer/PHPMailerAutoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/class.phpmailer.php'; // path to the PHPMailer class
       require 'PHPMailer/class.smtp.php';

 


// include "../signup/index.php";

// $infoSql = "SELECT ID, firstname, lastname, username,level,email FROM user_info WHERE username=$_SESSION['username'] ";
// $result = $conn->query($infoSql);

// if(isset($_POST["logout"]))
//    {
//     if(!empty($_SESSION["login"]))
//     {
//       $_SESSION['Username'] = '';
//       session_unset();
//       session_destroy();
//      // header("index.php");
//     }
//     header("location:index.php");
//    }
//  $someSql="SELECT ID, Fname, Lname FROM `general` WHERE ID = 2";


// deleting quizes




if(isset($_POST['mail_multiples'])){

 
    $query = "SELECT *  FROM  user_info";

    /*  get result*/
    $results = $conn -> query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

 for($i=1;$i<2;$i++) {  

    $query = "SELECT * FROM  user_info
    WHERE Reg_no='$i'"; 




/*  get result*/
$result = $conn -> query($query) or die($conn->error.__LINE__);
$mailAdd = $result->fetch_assoc();

$theEmail = $mailAdd["email"];


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

 
try {
    //Server settings
   $mail->isSMTP();  
    //$mail->SMTPDebug = 2;                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'group6onlineport@gmail.com';                     // SMTP username
    $mail->Password   = 'Groupsix_6';                              // SMTP password
     //$mail->SMTPSecure = 'ssl';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('group6onlineport@gmail.com', 'Online Exam Portal Group 6');
    $mail->addAddress($theEmail);     // Add a recipient
    // $mail->addReplyTo('@onlineexamportalgroup4@gmail.com', 'No reply');
    
    // Content
    $url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."multiple.php?n=1";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Quiz invite';
    $mail->Body    = "<h1> Click link to launch quiz</h1><br>
                        Click<a href='$url'>This link</a>to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo ' the link to reset  password has been sent to your email<br>you will need to reset from the link sent to your email'.'<br>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();


 /*
     $e =$result -> fetch_assoc() ;
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port ='465';
    $mail->isHTML();
    $mail->Username = 'salimjaafar95@gmail.com';
    $mail->password = 'Cheesecake1995.';
    $mail->SetFrom('From: salimjaafar95@gmail.com');
    $mail->subject = 'Quiz Invite';
    $mail->body = ' link :blanks.php?n=1';
    
    $mail->AddAddress('salimbalarabe@yahoo.com'); 
  
    $mail->Send();


    
 

*/
 }

  

}else if(isset($_POST['mail_theory'])){
  

    $query = "SELECT *  FROM  user_info";

    /*  get result*/
    $results = $conn -> query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

 for($i=1;$i<2;$i++) {  

    $query = "SELECT *   FROM  user_info
    WHERE Reg_no='$i'"; 



/*  get result*/
$result = $conn -> query($query) or die($conn->error.__LINE__);
$mailAdd = $result->fetch_assoc();

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
try {
    //Server settings
   $mail->isSMTP();  
    $mail->SMTPDebug = 2;                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'group6onlineport@gmail.com';                     // SMTP username
    $mail->Password   = 'Groupsix_6';                              // SMTP password
     $mail->SMTPSecure = 'ssl';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('group6onlineport@gmail.com', 'Online Exam Portal Group 6');
    $mail->addAddress($mailAdd['email']);        // Add a recipient
    // $mail->addReplyTo('@onlineexamportalgroup4@gmail.com', 'No reply');
    
    // Content
    $url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."theory.php?n=1";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Quiz invite';
    $mail->Body    = "<h1>Click link to launch quiz</h1><br>
                        Click<a href='$url'>This link</a>to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo ' the link to reset  password has been sent to your email<br>you will need to reset from the link sent to your email'.'<br>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();


 /*
     $e =$result -> fetch_assoc() ;
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port ='465';
    $mail->isHTML();
    $mail->Username = 'salimjaafar95@gmail.com';
    $mail->password = 'Cheesecake1995.';
    $mail->SetFrom('From: salimjaafar95@gmail.com');
    $mail->subject = 'Quiz Invite';
    $mail->body = ' link :blanks.php?n=1';
    
    $mail->AddAddress('salimbalarabe@yahoo.com'); 
  
    $mail->Send();


    
 

*/
 }

 


  
}else if(isset($_POST['mail_blanks'])){
  

    $query = "SELECT *  FROM  user_info";

    /*  get result*/
    $results = $conn -> query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

 for($i=1;$i<2;$i++) {  

    $query = "SELECT *   FROM  user_info
    WHERE Reg_no='$i'"; 



/*  get result*/
$result = $conn -> query($query) or die($conn->error.__LINE__);
$mailAdd = $result->fetch_assoc();


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

 
try {
    //Server settings
   $mail->isSMTP();  
    //$mail->SMTPDebug = 2;                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'group6onlineport@gmail.com';                     // SMTP username
    $mail->Password   = 'Groupsix_6';                              // SMTP password
     //$mail->SMTPSecure = 'ssl';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('group6onlineport@gmail.com', 'Online Exam Portal Group 6');
    $mail->addAddress($mailAdd['email']);         // Add a recipient
    // $mail->addReplyTo('@onlineexamportalgroup4@gmail.com', 'No reply');
    
    // Content
    $url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."blanks.php?n=1";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Quiz invite';
    $mail->Body    = "<h1>Clcik link to launch quiz</h1><br>
                        Click<a href='$url'>This link</a>to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo ' the link to reset  password has been sent to your email<br>you will need to reset from the link sent to your email'.'<br>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();


 /*
     $e =$result -> fetch_assoc() ;
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port ='465';
    $mail->isHTML();
    $mail->Username = 'salimjaafar95@gmail.com';
    $mail->password = 'Cheesecake1995.';
    $mail->SetFrom('From: salimjaafar95@gmail.com');
    $mail->subject = 'Quiz Invite';
    $mail->body = ' link :blanks.php?n=1';
    
    $mail->AddAddress('salimbalarabe@yahoo.com'); 
  
    $mail->Send();


    
 

*/
 }
}    
 //   header("Location: ../index.php");

?>