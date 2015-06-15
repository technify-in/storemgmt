<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
require('connect.php');
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  if(isset($_REQUEST['msg'])){
    echo "<p style=\"float:right;display:block;width:100%;height:30px;text-align:right\">".$_REQUEST['msg']." " . $username . " ";
  }
  else{
  echo "<p style=\"float:right;display:block;width:100%;height:30px;text-align:right\">Hi " . $username . "";
  echo "This is the Members Area";
  }
echo "<a href='logout.php'>Logout</a></p>";
    }
  else{

    header('Location: index.php?msg=invalid login');
    }
?>


<?php
echo"<center><p>";
$date = new DateTime();
echo date_format($date, 'd/m/Y H:i:s');


echo"<center></p>";
 ?>

<?php
 $query = "SELECT * FROM `attendance` WHERE eid= (select eid from employee where username='$username') and date = curdate()";
 $result = mysql_query($query) or die(mysql_error());
 $count = mysql_num_rows($result);
 if($count==1){
   $row = mysql_fetch_array($result);
   echo"attendance already marked";
  }
 else{

   echo"<form action=\"mark_attendance.php\" method=\"POST\">";
   echo"<input type=\"hidden\" name=\"username\" value=\"$username\" /></p>";
   echo"<input class=\"att\" type=\"submit\" name=\"submit\" value=\"mark att\" />";
   echo"</form>";

   }




   ////////////////////////////////////calendar////////////////////////////////////////

/* draws a calendar */
function draw_calendar($month,$year,$js){
  $cdate = new DateTime();
	/* draw table */

$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */

//print_r($js);
      if(in_array($list_day,$js)){
        $calendar.= '<div class="day-number" style="background:lightgreen">'.$list_day.'</div>';
      }
      else{
          if (strlen($list_day)==1){ $list_day = "0".$list_day;}

          if( date_format($cdate, 'Y').date_format($cdate, 'm').date_format($cdate, 'd')  > $year.$month.$list_day){
              $calendar.= '<div class="day-number" style="background:LightPink">'.$list_day.'</div>';
              }
          else{
            $calendar.= '<div class="day-number">'.$list_day.'</div>';
        }


      }


      //print date_format($cdate, 'Y').date_format($cdate, 'm').date_format($cdate, 'd');
    //  print "<br>".$year.$month.$list_day."<br>";

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);

		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';

	/* all done, return result */
	return $calendar;
}

////////////////////////////////////////////////////////////////////////////////////







if(isset($_REQUEST['date']))
  { $m_y=$_REQUEST['date'];
    $ar= split("-",$m_y);
    //print_r($ar);
    $mm=$ar[1];
    $yy=$ar[0];
    if( !$mm ){$mm= date_format($date, 'm') ;}
    if( !$yy ){$yy=date_format($date, 'Y');}

    $dateObj   = DateTime::createFromFormat('!m', $mm);
    $monthName = $dateObj->format('F');
}
else{
  $mm=date_format($date, 'm');
  $yy=date_format($date, 'Y');
  $dateObj   = DateTime::createFromFormat('!m', $mm);
  $monthName = $dateObj->format('F');



}


echo "<h2>$monthName $yy</h2>";

echo"<form action=\"dashboard.php\" method=\"POST\">";
echo"<input type=\"month\" name=\"date\" /></p>";
echo"<input class=\"att\" type=\"submit\" name=\"submit\" value=\"show\" />";
echo"</form>";


/////////////////////////////////fetch attendance///////////////////////////////////
$query = "   SELECT day(date) present FROM `attendance` WHERE  year(date) = $yy and month(date) = $mm and eid= (select eid from employee where username='$username') ";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if($count>0){
  while($row = mysql_fetch_array($result)){
       $json[] = $row['present'];
  }

  //print_r($json);
 }



////////////////////////////////////////////////////////////////////////////////////


echo draw_calendar($mm,$yy,$json);


////////////////////////////////////////////////////////////////////////////////////






?>


<a href="new.php">add product</a>
