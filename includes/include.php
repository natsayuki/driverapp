<?php
  // include($_SERVER['DOCUMENT_ROOT']."/driverApp/includes/include.php");
  require($_SERVER['DOCUMENT_ROOT']."/driverApp/PHPMailer-master/src/PHPMailer.php");
  require($_SERVER['DOCUMENT_ROOT']."/driverApp/PHPMailer-master/src/SMTP.php");
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "drive";
  $conn = new mysqli($server, $username, $password, $db);
?>
