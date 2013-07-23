<?php
function call_roomnumber(){

$SQLsyntax = "SELECT DISTINCT(main_table.Room) FROM main_table";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#''>".$fetch[Room]."</a></li>";

	}
}

function show_day(){

$SQLsyntax = "SELECT DISTINCT(main_table.Day) FROM main_table";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#''>".$fetch[Day]."</a></li>";

	}
}

function show_group(){
$SQLsyntax = "SELECT DISTINCT(main_table.MajorID),major_table.MajorName FROM main_table INNER JOIN major_table ON main_table.MajorID = major_table.MajorID ORDER BY major_table.MajorID ASC";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#''>".$fetch[MajorName]."&nbsp;(".$fetch[MajorID].")</a></li>";

	}
}

function show_teachers(){

	$SQLsyntax = "SELECT DISTINCT(teaassgn_table.TeacherID),teacher_table.TeacherName,teacher_table.TeacherLastname FROM teaassgn_table INNER JOIN teacher_table ON teaassgn_table.TeacherID = teacher_table.TeacherID ORDER BY teacher_table.TeacherID ASC";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#''>".$fetch[TeacherName]."&nbsp;&nbsp;".$fetch[TeacherLastname]."</a></li>";
	}
}

?>