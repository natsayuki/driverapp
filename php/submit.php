<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "drive";
  $conn = new mysqli($server, $username, $password, $db);

  $type = $_POST['type'];
  $name = mysqli_real_escape_string($conn, $_POST['name']);

  date_default_timezone_set('America/New_York');
  $date = date('m-d-y');
  $time = date('H:i:s');
  $sql ='';
  if($type == 'leave'){
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $sql = 'INSERT INTO `leave` (`name`, `reason`, `date`, `time`) VALUES ("'.$name.'", "'.$reason.'", "'.$date.'", "'.$time.'")';
  }
  else if($type == 'return'){
    $sql = 'INSERT INTO `return` (`name`, `date`, `time`) VALUES ("'.$name.'", "'.$date.'", "'.$time.'")';
  }
  $results = $conn->query($sql);
  if($conn->error){
    echo 'cannot connect';
  }else{
    echo 'success';
  }

?>
