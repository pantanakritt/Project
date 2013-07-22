<?php
function nday ($y){
	if($y==1) $day = "MON";
		else if($y==2) $day = "TUE";
		else if($y==3) $day = "WED";
		else if($y==4) $day = "THU";
		else if($y==5) $day = "FRI";
		else if($y==6) $day = "SAT";
		else if($y==7) $day = "SUN";
			else $day = "MON ?";
		return $day;
		}
		
function call_tname($tid){
	$valquery = mysql_query("select TeacherTitle,TeacherName,TeacherLastname FROM teacher_table WHERE TeacherID = '$tid'");
	$valfetch = mysql_fetch_array($valquery);
	
	$tname = $valfetch[TeacherTitle].$valfetch[TeacherName]."  ".$valfetch[TeacherLastname];
	return $tname;
	}
	
function select_teacher($tid){

	
	echo "<div align='center'><font color='blue'>ตารางสอนของ ".call_tname($tid)."</font></div><br><table class='table table-bordered'>";
	for ($y=0;$y<8;$y++){
		$tquery2 = "SELECT teaassgn_table.AsgnRef,course_table.CourseName,course_table.CourseID,main_table.Room,main_table.Day,major_table.MajorName,course_table.Theory,course_table.Practical,main_table.StartTime ";
		$tquery2 .= "From main_table INNER JOIN teaassgn_table ON main_table.AsgnRef = teaassgn_table.AsgnRef ";
		$tquery2 .= "INNER JOIN course_table ON main_table.CourseID = course_table.CourseID ";
		$tquery2 .= "INNER JOIN major_table ON main_table.MajorID = major_table.MajorID ";
		$tquery2 .= "WHERE teaassgn_table.TeacherID = '".$tid."' && main_table.Day = '".nday($y)."'";
		$tquery2 .= " ORDER BY main_table.StartTime";
		$tquery3 = mysql_query($tquery2);
		$t2row = mysql_num_rows($tquery3);
		$t2fetch = mysql_fetch_array($tquery3);
		
		//echo $tquery2;
		$stack = 1;
		echo "<tr>";
	for ($x=0;$x<=14;$x++){
		
		if ($x==0&&$y==0){
			echo "<th align='center'>วัน / คาบ</td>";
			}
			else if ($x==0&&$y!=0){
				echo "<th align='center'>".nday($y)."</td>";
				
				}
			
			else if ($x!=0&&$y==0){
				echo "<th align='center'>".$x."</td>";
				}
				else if ($x!=0&&$y!=0){
					
					
					
					
					
					if ($t2fetch[Day]==nday($y)&&$t2fetch[StartTime]==$x){
					echo "<td align='center' colspan='".calperiod($t2fetch[Theory],$t2fetch[Practical])."' >".$t2fetch[CourseName]."(".$t2fetch[CourseID].")<br>".count_sect($t2fetch[AsgnRef])."&nbsp;&nbsp;".$t2fetch[MajorName]."<div align='right'><font color ='#FF9900'> Room : ".$t2fetch[Room]."</font></div></td>";
					$x += calperiod($t2fetch[Theory],$t2fetch[Practical])-1;
					$stack ++;
					if ($stack <= $t2row) $t2fetch = mysql_fetch_array($tquery3);
					
					}//ปิด $t2fetch[Day]==nday($y)&&$t2fetch[StartTime]==$x
					else echo "<td width='50'></td>";
				}//ปิด $x!=0&&$y!=0
				
				
		}
	echo "</tr>";
	}
	echo "</table>";
	
	echo "<br>";
	}
	
	
	
?>
