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
	$teastr = $teastr.$fetch2[TeacherTitle].$fetch2[TeacherName];
	if ($ii != ($teanum-1)) $teastr = $teastr." , ";
	
	}
	return $teastr;
	}  //ปิด function
	
function count_sect($refid2){
	$querychk_sect = mysql_query("SELECT COUNT(main_table.AsgnRef) FROM main_table WHERE main_table.AsgnRef = '$refid2'");
	$fetchchk_sect = mysql_fetch_array($querychk_sect);
	$queryfetch_sect = mysql_query("SELECT * FROM main_table WHERE AsgnRef = '$refid2'");
	$sumsect = "Section : ";
	if ($fetchchk_sect[0] == 1){
		$fectch_sect = mysql_fetch_array($queryfetch_sect);
		$sumsect = $sumsect.$fectch_sect[Section];
		return $sumsect;
		}
	else{
	$num_sect = mysql_num_rows($queryfetch_sect);
	
	for ($xf=0;$xf<$num_sect;$xf++){
		$fectchk2_sect = mysql_fetch_array($queryfetch_sect);
		$sumsect = $sumsect.$fectchk2_sect[Section];
		if ($xf != ($num_sect - 1)) $sumsect = $sumsect." , ";
		
		}
		return $sumsect;
	}
	}
function chk_samevalueRoom(){    //ฟังก์ชั่นสำหรับตรวจสอบในกรณีที่มี section ที่ใช้ห้องเรียนเวลาเดียวกัน
	
	}

function c_byday ($day){    //แสดงตารางสอนเรียงตาม วันแต่ละวันในสัปดาห์
	
	$select = "SELECT DISTINCT main_table.AsgnRef ,main_table.CourseID,main_table.Room,major_table.MajorName,main_table.Day,main_table.StartTime,course_table.Theory,course_table.Practical,course_table.CourseName FROM main_table"; 
	$select .= " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
	$select .= " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
	$select .= " WHERE Day = '".$day."' ORDER BY main_table.Room,main_table.StartTime";
	
	$query = mysql_query($select);
	$numrow = mysql_num_rows($query);
	
	
	//echo $select;
	
	//print_r($fetch);
	
echo "<div align='center'> ตารางการใช้ห้องเรียนประจำวัน ".$day."</div><br><br>";


echo "<table class='table table-bordered'  >"; //เปิด Table
echo "<tr class='success'>";    //Tr บรรทัดแรก

for ($xi=0;$xi<=14;$xi++){    
	//for สำหรับ บอก คาบเรียน
	if ($xi==0) echo "<td><center>ห้อง / คาบ</center></td>";
	else echo "<td><center>".$xi."</center></td>";
}
echo "</tr>";   //ปิด Tr บรรทัดแรก
$trcount = 1;

for ($i=0;$i<$numrow;$i++){  //for เพื่อกำหนด แถว

		if ($i<($numrow-1))
			$fetch = mysql_fetch_array($query);	//fetch ข้อมูล
	if (($trcount%2)!=0) echo "<tr class='info'>";	
	else echo "<tr class='success'>"; 
	$trcount ++;
	$stack = 0;
	for ($x=0;$x<=14;$x++){ //for เพื่อนกำหนด Col
		if ($x==0) { 
			echo "<td><center>".$fetch[Room]."</center></td>";  //เช็คเงื่อน ไข หาก x เป็น 0 ให้ echo ห้องเรียน
			$room_chk = $fetch[Room];
		}
		else if ($fetch[StartTime]==$x&&$room_chk==$fetch[Room]){
			
			$sql_class_room = "SELECT COUNT(DISTINCT main_table.AsgnRef,main_table.Room) FROM main_table ";
			$sql_class_room .= "WHERE main_table.Room = '$fetch[Room]' ORDER BY main_table.Room,main_table.StartTime";

			$query3 = mysql_query($sql_class_room);    //ตรวจสอบห้องเรียนว่า มีห้องเดียวกัน ใช้วันเดียวกันแต่คนละคาบหรือ ไม่
			$fetch3 = mysql_fetch_array($query3);
			
			if ($fetch3[0]>1){
				
				
				echo "<td align='center' id='tcolor' colspan='".calperiod($fetch[Theory],$fetch[Practical])."'>";
				echo $fetch[CourseName]."<br>";
				echo show_teacher($fetch[AsgnRef])."<br>";
				echo count_sect($fetch[AsgnRef]);
				echo "</td>";
				
				
				$x += calperiod($fetch[Theory],$fetch[Practical])-1;
				
				$stack +=1;
				if ($stack<$fetch3[0]) {
						$fetch = mysql_fetch_array($query);
				}
				else 
					$i++;
				}
			else if ($fetch3[0]==1) {
				
				echo "<td align='center' id='tcolor' colspan='".calperiod($fetch[Theory],$fetch[Practical])."'>";
				echo $fetch[CourseName]."<br>";
				echo show_teacher($fetch[AsgnRef])."<br>";
				echo count_sect($fetch[AsgnRef])."</td>";
				
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

