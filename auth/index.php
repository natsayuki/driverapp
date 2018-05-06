<?php
  include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");

  $key;

  $auth_code = mysqli_real_escape_string($conn, $_GET['a']);

  $sql = 'SELECT * FROM users WHERE `auth_code`="'.$auth_code.'"';
  $results = $conn->query($sql);
  if($conn->connect_error){
    echo $conn->connect_error;
  }
  else{
    if($results->num_rows > 0){
      $key = ($results->fetch_assoc())['key'];
      $token = ($results->fetch_assoc())['token'];
      $sql = 'UPDATE users SET `verified`="true" WHERE `key`="'.$key.'"';
      $results = $conn->query($sql);
      if($conn->connect_error){
        echo '<h1 align="center">cannot connect to server</h1>';
      }
      else{
        $_SESSION['token'] = $token;
        echo '<h1 align="center">successfuly authenticated this device</h1>';
      }
    }
    else{
      echo '<h1 align="center"invalid or expired authentication code</h1>';
    }

  }
?>
