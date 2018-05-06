<?php
  include($_SERVER['DOCUMENT_ROOT']."/driverapp/includes/include.php");

  $type = $_POST['type'];

  if($type == 'fetch'){
    if(!isset($_SESSION['token']) || $_SESSION['token'] == ''){
      echo 'no token';
    }
    else{
      echo $_SESSION['token'];
    }
  }
?>
