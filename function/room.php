<?php
require_once("teacher.php");

function select_room($rid){

	
	echo "<br><br><div align='center'><font color='blue'>ตารางการใช้ห้องเรียน ประจำห้อง ".$rid."</font></div><br><table class='table table-bordered'>";
	for ($y=0;$y<8;$y++){
		$tquery2 = "SELECT teaassgn_table.AsgnRef,course_table.CourseName,course_table.CourseID,main_table.Room,main_table.Day,major_table.MajorName,course_table.Theory,course_table.Practical,main_table.StartTime,teaassgn_table.TeacherID ";
		$tquery2 .= "From main_table ";
		$tquery2 .= "INNER JOIN teaassgn_table ON main_table.AsgnRef = teaassgn_table.AsgnRef INNER JOIN course_table ON main_table.CourseID = course_table.CourseID ";
		$tquery2 .= "INNER JOIN major_table ON main_table.MajorID = major_table.MajorID ";
		$tquery2 .= "WHERE main_table.Room = '".$rid."' && main_table.Day = '".nday($y)."' ";
		$tquery2 .= "ORDER BY main_table.StartTime";
		$tquery3 = mysql_query($tquery2);
		$t2row = mysql_num_rows($tquery3);
		$t2fetch = mysql_fetch_array($tquery3);
		
		//echo $tquery2;
		$stack = 1;
		if (($y%2)==0)echo "<tr class='success'>";
		else echo "<tr class='info'>";
	for ($x=0;$x<=14;$x++){
		
		if ($x==0&&$y==0){
			echo "<td>วัน / คาบ</td>";
			}
			else if ($x==0&&$y!=0){
				echo "<td>".nday($y)."</td>";
				
				}
			
			else if ($x!=0&&$y==0){
				echo "<td align='center'>".$x."</td>";
				}
				else if ($x!=0&&$y!=0){
					
					
					
					
					
					if ($t2fetch[Day]==nday($y)&&$t2fetch[StartTime]==$x){
					echo "<td align='center' id='tcolor' colspan='".calperiod($t2fetch[Theory],$t2fetch[Practical])."' >".$t2fetch[CourseName]."(".$t2fetch[CourseID].")<br>".count_sect($t2fetch[AsgnRef])."&nbsp;&nbsp;".$t2fetch[MajorName]."<div align='right'><font color ='#FF9900'> ผู้สอน : ".call_tname($t2fetch[TeacherID])."</font></div></td>";
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
	
	
	}
	
	

?>