<?php
require ("dbo.php");
for ($x=0;$x<=2;$x++){
	if ($x==0){
		$day = "MON";
		}
		else if ($x==1) $day = "TUE";
		else if ($x==2) $day = "WED";
		
	$tquery2 = "SELECT DISTINCT main_table.AsgnRef ,main_table.CourseID,main_table.Room,major_table.MajorName,main_table.Day,main_table.StartTime,course_table.Theory,course_table.Practical,course_table.CourseName FROM main_table"; 
		$tquery2 .= " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
		$tquery2 .= " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
		$tquery2 .= " where Day = '$day' ORDER BY main_table.Room,main_table.StartTime";
	$query = mysql_query($tquery2);
	$fetch  = mysql_fetch_array($query);
	
	print_r ($fetch);
	
	echo "<br>===========================================<br>";
	}

?>