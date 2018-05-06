<?php
  include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP(); // enable SMTP

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
  $mail->Body = "<h1 style="color: blue;">try this <em>for</em> size</h1>";
  $mail->AddAddress($email);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      echo "Message has been sent";
   }
?>
