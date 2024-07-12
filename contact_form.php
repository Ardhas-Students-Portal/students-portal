<?php

// session_start();






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once('contactdb.php');


if(isset($_POST['submit'])){
  $name = $_POST['firstname'];
  $email = $_POST['email'];
  $message = $_POST['message'];


$mail = new PHPMailer(true);

try {
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;                                   
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->Username   = 'aaathmiga@gmail.com';                     
    $mail->Password   = 'cdlv gwld mouz wdsx'; 
                                  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    $mail->setFrom('aaathmiga@gmail.com', 'Mailer');
    $mail->addAddress('aathmiga24@gmail.com', 'User');    
    
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'New Query';
    $mail->Body    = '<h3>Hi, you got new query</h3>
    <h4>Fullname: '.$name.'</h4>
    <h4>Email: '.$email.' </h4>
    <h4>Message: '.$message.' </h4>
    
    ';

    if($mail->send()){
      // $_SESSION['status']="Thankyou for your message";
      echo '<script>
            alert("Message Send");
            window.location.href="home.php";
            </script>';
      exit(0);
    }
    else{
      // $_SESSION['status']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      echo "error";
      exit(0);
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
else{
  header('Location:home.php');
  exit(0);
}

?>
