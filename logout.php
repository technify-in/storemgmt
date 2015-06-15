<?php  //Start the Session
session_start();
session_destroy();
header('Location: index.php?msg=user logged out');
?>
