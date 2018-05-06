<?php
  include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");

  $email = mysqli_real_escape_string($conn, $_POST['email']);


  $tempAuthCode = "asdfasdfasdf";

  
  $body = '
  <center>
  <h3 style="color: blue">Please click the following link to verify your email for the CFS campus sign out website</h3>
  <div style="height: 20%; background-color: lightgrey; display: inline-block;">
  <a href="http://42turtle.com/driverapp/auth?a='.$tempAuthCode.'"><h1>Verify email</h1></a>
  </div>
  </center>
  ';
  $mail->Body = $body;
  if(!$mail->Send()){
    echo "Mailer Error:".$mail->ErrorInfo;
  }
  else{
    echo "Message has been sent";
  }
?>
