<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
require('connect.php');


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}



if (isset($_SESSION['username']) &&  ( $_SESSION['username'] == $_POST['username'] ) )
  {
    $username = $_SESSION['username'];
    }
else{

    header('Location: index.php?msg=invalid user');
  }


    $date = new DateTime();

    if(  $_SERVER['REMOTE_ADDR'] != "203.134.194.91"  )
      {
        header('Location: dashboard.php?msg=invalid location'.get_client_ip());

      }
      else{



if( date_format($date, 'H') < 8 || date_format($date, 'H') > 20  )
  {
    header('Location: dashboard.php?msg=invalid timings');

  }
else{

  $query = "INSERT into `attendance` (eid,date) values((select eid from employee where username='$username'),curdate()) ";
  $result = mysql_query($query) or die(mysql_error());
    if($result){
      header('Location: dashboard.php?msg=attendance marked');
    }
    else{
      header('Location: dashboard.php?msg=error marking attendance');
      }

    }
}


?>
