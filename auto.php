<?php
$connection = mysql_connect('localhost', 'root', '');

if (!$connection){
die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('store');
if (!$select_db){
die("Database Selection Failed" . mysql_error());
}


 $q=$_GET['q'];
 $my_data=mysql_real_escape_string($q);
 $sql="SELECT name FROM products WHERE name LIKE '%$my_data%' ORDER BY name";
 $result = mysql_query($sql) or die(mysql_error());

 if($result)
 {
  while($row=mysql_fetch_array($result))
  {
   echo $row['name']."\n";
  }
 }
?>
