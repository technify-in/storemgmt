<?php  //Start the Session
session_start();
require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
  $username = $_POST['username'];
  $password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
  $query = "SELECT * FROM `employee` WHERE username='$username' and password='$password'";
  $result = mysql_query($query) or die(mysql_error());
  $count = mysql_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
  $_SESSION['username'] = $username;
  header('Location: dashboard.php');
}else{
  //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
  header('Location: index.php?msg=invalid login');
  }
}

?>
