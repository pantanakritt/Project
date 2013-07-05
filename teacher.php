<?php
function select_teacher($tid){
	
	$tquery = mysql_query("SELECT AsgnRef FROM teaassgn_table WHERE TeacherID = '$tid'");
	$trow = mysql_num_rows($tquery);
	
	for ($x=0;$x<=$trow;$x++){
		$tfetch = mysql_fetch_array($tquery);
		$select = "SELECT DISTINCT main_table.AsgnRef ,main_table.CourseID,main_table.Room,major_table.MajorName,main_table.Day,main_table.StartTime,course_table.Theory,course_table.Practical,course_table.CourseName FROM main_table"; 
	$join1 = " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
	$join2 = " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
	
	$wheres = " WHERE AsgnRef = '$tfetch[AsgnRef]' ORDER BY main_table.Room,main_table.StartTime";
	
	$tquery2 = mysql_query($select.$join1.$join2.$wheres);
	$t2row = mysql_num_rows($tquery2);
	
	for ($y=0;$y<=$t2row;$y++){
		$t2fetch = mysql_fetch_array($tquery2);
	print_r ($t2fetch);
	echo "<br>";
	
	}
		
		}
	
	}
	
?>
