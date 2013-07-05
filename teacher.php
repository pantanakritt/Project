<?php
function nday ($y){
	if($y==1) $day = "MON";
		else if($y==2) $day = "TUE";
		else if($y==3) $day = "WED";
		else if($y==4) $day = "THU";
		else if($y==5) $day = "FRI";
		else if($y==6) $day = "SAT";
		else if($y==7) $day = "SUN";
		return $day;
		}
function select_teacher($tid){
	
	$tquery = mysql_query("SELECT AsgnRef FROM teaassgn_table WHERE TeacherID = '$tid'");
	$trow = mysql_num_rows($tquery);
	
	
		$tfetch = mysql_fetch_array($tquery);
		$tquery2 = "SELECT DISTINCT main_table.AsgnRef ,main_table.CourseID,main_table.Room,major_table.MajorName,main_table.Day,main_table.StartTime,course_table.Theory,course_table.Practical,course_table.CourseName FROM main_table"; 
		$tquery2 .= " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
		$tquery2 .= " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
		$tquery2 .= " WHERE AsgnRef = '$tfetch[AsgnRef]' ORDER BY main_table.Room,main_table.StartTime";
	
	$tquery3 = mysql_query($tquery2);
	$t2row = mysql_num_rows($tquery3);
	echo "<table border='1'>";
	for ($y=0;$y<=8;$y++){
		$t2fetch = mysql_fetch_array($tquery3);
	echo "<tr>";
	for ($x=0;$x<=14;$x++){
		
		if ($x==0&&$y==0){
			echo "<td align='center'>วัน / คาบ</td>";
			}
			else if ($x==0&&$y!=0){
				echo "<td align='center'>".nday($y)."</td>";
				
				}
			
			else if ($x!=0&&$y==0){
				echo "<td align='center'>".$x."</td>";
				}
				else echo "<td></td>";
				
		}
	echo "</tr>";
	}
	echo "</table>";
	echo "<br>";
	}
	
	
	
?>
