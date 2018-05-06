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
?>
