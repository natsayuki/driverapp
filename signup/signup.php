<?php
  include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP(); // enable SMTP

  $body = '
  <center>
    <h3 style="color: blue">Please click the following link to verify your email for the CFS campus sign out website</h3>
    <div style="height: 20%; background-color: lightgrey; display: inline-block;">
      <a href="http://42turtle.com/driverapp"><h1>Verify email</h1></a>
    </div>
  </center>
  ';

  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
  $mail->Username = "the42ndturtle@gmail.com";
  $mail->Password = "xxxx";
  $mail->SetFrom("the42ndturtle@gmail.com");
  $mail->Subject = "Test";
  $mail->Body = $body;
  $mail->AddAddress($email);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      echo "Message has been sent";
   }
?>
