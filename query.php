<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php


function c_byday ($day){

	
	$select = "SELECT * FROM main_table"; 
	$join1 = " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
	$join2 = " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
	$join3 = " INNER JOIN teacher_table ON main_table.TeacherID = teacher_table.TeacherID";
	$join4 = " INNER JOIN merge_table ON main_table.MergeID = merge_table.MergeID";
	$wheres = " WHERE Day = '$day' ORDER BY main_table.Room";
	
	$query = mysql_query($select.$join1.$join2.$join3.$join4.$wheres);
	$numrow = mysql_num_rows($query);

?>

<table border="1">
<?
	for ($x=0;$x<=$numrow;$x++){
		if ($x!=0)$row_co = mysql_fetch_array($query);
		$mergeid = $row_co[MergeID];
			
	echo "<tr>";
	if ($x==0){
			echo "<td>ห้อง/คาบ</td>";
			}
			else {
				echo "<td>".$row_co[Room]."</td>";
				}
	if ($x==0){
		for ($i=1;$i<=14;$i++) echo "<td>".$i."</td>";
		}	
		else {
	for ($y=1;$y<12;$y++)
	{
  		if ($y!=$row_co[StartTime]){
			echo "<td></td>";
			}
			else {
				echo "<td colspan = ".merge_period($row_co[StartTime],$row_co[Theory],$row_co[Practical])." align='center'>".$row_co[CourseName]."<br>".$row_co[TeacherName]."</td>";
				}
 		}
	}
 	echo "</tr>";
	}
	echo "</table>";
}
	
function merge_period ($time,$theory,$Practice){
	$sum = ($theory+$Practice);
	return $sum;
	
	}
?>