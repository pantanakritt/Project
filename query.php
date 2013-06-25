<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#99CCFF">

</body>
</html>
<?php

function calperiod($a1,$a2){   //function สำหรับ การคำนวนคาบเรียน
	$sum = $a1+$a2;
	return $sum;
	}
	
function show_teacher($refid){    //function สำหรับการ แสดงรายชื่อ อาจารย์ผู้สอน
	$shwtea = mysql_query("SELECT * FROM teaassgn_table INNER JOIN teacher_table ON teaassgn_table.TeacherID = teacher_table.TeacherID WHERE teaassgn_table.AsgnRef = '$refid'");
	$teanum = mysql_num_rows($shwtea);
	for ($ii=0;$ii<$teanum;$ii++){
		$fetch2 = mysql_fetch_array($shwtea);
	$teastr = $teastr.$fetch2[TeacherTitle].$fetch2[TeacherName]." , ";
	
	}
	return $teastr;
	}  //ปิด function
	
function cal_room($roomid){
	
	
	}

function c_byday ($day){    //แสดงตารางสอนเรียงตาม วันแต่ละวันในสัปดาห์
	
	$select = "SELECT DISTINCT main_table.AsgnRef,main_table.CourseID,main_table.Room,major_table.MajorName,main_table.Day,main_table.StartTime,course_table.Theory,course_table.Practical,course_table.CourseName FROM main_table"; 
	$join1 = " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
	$join2 = " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
	
	$wheres = " WHERE Day = '$day' ORDER BY main_table.Room,main_table.StartTime";
	
	$query = mysql_query($select.$join1.$join2.$wheres);
	$numrow = mysql_num_rows($query);
	
	
	echo $select.$join1.$join2.$wheres;
	echo "<br><br>";
	print_r($fetch);
	
echo "<div align='center'> ตารางการใช้ห้องเรียนประจำวัน ".$day."</div><br><br>";


echo "<table border='1' bgcolor='#FF99CC'>"; //เปิด Table
echo "<tr height='30'>";    //Tr บรรทัดแรก

for ($xi=0;$xi<=14;$xi++){    //for สำหรับ บอก คาบเรียน
		if ($xi==0) echo "<td align='center'>ห้อง / คาบ</td>";
		else echo "<td align='center'>".$xi."</td>";
		}
echo "</tr>";   //ปิด Tr บรรทัดแรก

for ($i=0;$i<$numrow;$i++){  //for เพื่อกำหนด แถว
	$fetch = mysql_fetch_array($query);	//fetch ข้อมูล
	echo "<tr>"; 
	
	
	for ($x=0;$x<=14;$x++){ //for เพื่อนกำหนด Col
		if ($x==0) echo "<td align='center'>".$fetch[Room]."</td>";  //เช็คเงื่อน ไข หาก x เป็น 0 ให้ echo ห้องเรียน
			else if ($fetch[StartTime]==$x){
			 $query3 = mysql_query("SELECT COUNT(DISTINCT main_table.AsgnRef,main_table.Room) FROM main_table WHERE main_table.Room = '$fetch[Room]' ORDER BY main_table.Room,main_table.StartTime");    //ตรวจสอบห้องเรียนว่า มีห้องเดียวกัน ใช้วันเดียวกันแต่คนละคาบหรือ ไม่
			 $fetch3 = mysql_fetch_array($query3);
			 if ($fetch3[0]>1){
				 $stack += 1;
				 echo "<td align='center' bgcolor='#CCFF99' colspan='".calperiod($fetch[Theory],$fetch[Practical])."'>".$fetch[CourseName]."<br>".show_teacher($fetch[AsgnRef])."</td>";
					$x += calperiod($fetch[Theory],$fetch[Practical])-1;
					if ($stack!=$fetch3[0]) $fetch = mysql_fetch_array($query);
					else $i++;
				 }
			 
				else if ($fetch3[0]==1) {
					echo "<td align='center' bgcolor='#CCFF99' colspan='".calperiod($fetch[Theory],$fetch[Practical])."'>".$fetch[CourseName]."<br>".show_teacher($fetch[AsgnRef])."</td>";
					$x += calperiod($fetch[Theory],$fetch[Practical])-1;
				}
					}
			else echo "<td width='50'></td>";
			
	}
	echo "</tr>";

}
echo "</table>";
	
	}
?>

