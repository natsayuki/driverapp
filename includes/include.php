<?php
  // include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");
  session_start();

  require($_SERVER['DOCUMENT_ROOT']."/driverapp/PHPMailer-master/src/PHPMailer.php");
  require($_SERVER['DOCUMENT_ROOT']."/driverapp/PHPMailer-master/src/SMTP.php");
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "drive";
  $conn = new mysqli($server, $username, $password, $db);

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 1;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->IsHTML(true);
  $mail->Username = "the42ndturtle@gmail.com";
  $mail->Password = "xxxx";
  $mail->SetFrom("the42ndturtle@gmail.com");
  $mail->Subject = "Test";

?>
