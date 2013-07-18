<?php
require_once ("teacher.php");
function select_group($majorid){
	$mfetch = mysql_fetch_array(mysql_query("select * from major_table where MajorID = '$majorid'"));
	echo "<div align='center'><font color='blue'>ตารางเรียนสำหรับกลุ่มเรียน ".$mfetch[MajorName]."(".$mfetch[MajorID].")</font></div><br><table border='1'>";
	for ($y=0;$y<8;$y++){
	$rquery = "SELECT teaassgn_table.AsgnRef, course_table.CourseName, course_table.CourseID, main_table.Room, main_table.Day, major_table.MajorID, major_table.MajorName, course_table.Theory, course_table.Practical, main_table.StartTime, teaassgn_table.TeacherID
FROM main_table";
$rquery .= " INNER JOIN teaassgn_table ON main_table.AsgnRef = teaassgn_table.AsgnRef";
$rquery .= " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
$rquery .= " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
$rquery .= " WHERE main_table.MajorID =  '".$majorid."' && main_table.Day =  '".nday($y)."'";
$rquery .= " ORDER BY main_table.StartTime";
		$rquery2 = mysql_query($rquery);
		$r2row = mysql_num_rows($rquery2);
		$r2fetch = mysql_fetch_array($rquery2);
		$stack = 1;
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
				else if ($x!=0&&$y!=0){
					
					
					
					
					
					if ($r2fetch[Day]==nday($y)&&$r2fetch[StartTime]==$x){
					echo "<td align='center' colspan='".calperiod($r2fetch[Theory],$r2fetch[Practical])."' >".$r2fetch[CourseName]."(".$r2fetch[CourseID].")<br>".count_sect($r2fetch[AsgnRef])."&nbsp;&nbsp;".call_tname($r2fetch[TeacherID])."<div align='right'><font color ='#FF9900'> ห้องเรียน : ".$r2fetch[Room]."</font></div></td>";
					$x += calperiod($r2fetch[Theory],$r2fetch[Practical])-1;
					$stack ++;
					if ($stack <= $r2row) $r2fetch = mysql_fetch_array($rquery2);
					
					}//ปิด $r2fetch[Day]==nday($y)&&$t2fetch[StartTime]==$x
					else echo "<td width='50'></td>";
				}//ปิด $x!=0&&$y!=0
				
				
		}
	echo "</tr>";
	}
	echo "</table>";
	
	echo "<br>";
	}

?>