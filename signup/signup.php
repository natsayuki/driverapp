<?php
  include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");
  $email = mysqli_real_escape_string($conn, $_POST['email']);


  function newAuthCode($length = 16) {
  	$str = "";
  	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
  	$max = count($characters) - 1;
  	for ($i = 0; $i < $length; $i++) {
  		$rand = mt_rand(0, $max);
  		$str .= $characters[$rand];
  	}
  	return $str;
  }

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
  $mail->AddAddress($email);

  $sql = 'SELECT * FROM users WHERE `email`="'.$email.'"';
  $results = $conn->query($sql);
  if($results->num_rows > 0){
    $tempAuthCode = ($results->fetch_assco())['auth_code'];
    $verified = ($results->fetch_assoc())['verified'];
    if($verified == 'true'){
      echo "email already in use";
    }
    else{
      echo "resending verification email";
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
    }
  }
  else{
    $tempAuthCode = newAuthCode();
    $tempToken = newAuthCode(6);

    $body = '
    <center>
    <h3 style="color: blue">Please click the following link to verify your email for the CFS campus sign out website</h3>
    <div style="height: 20%; background-color: lightgrey; display: inline-block;">
    <a href="http://42turtle.com/driverapp/auth?a='.$tempAuthCode.'"><h1>Verify email</h1></a>
    </div>
    </center>
    ';
    $mail->Body = $body;


    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message has been sent";
      $sql = 'INSERT INTO users (`email`, `token`, `verified`, `auth_code`) VALUES ("'.$email.'", "'.$tempToken.'", "false", "'.$tempAuthCode.'")';
      $conn->query($sql);
    }
  }

?>
