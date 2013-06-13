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
$chkarry = array();
	$sectarry = array();
	$teacherarry = array();
	
	$select = "SELECT * FROM main_table"; 
	$join1 = " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
	$join2 = " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
	$join3 = " INNER JOIN teacher_table ON main_table.TeacherID = teacher_table.TeacherID";
	$join4 = " INNER JOIN merge_table ON main_table.MergeID = merge_table.MergeID";
	$wheres = " WHERE Day = '$day' ORDER BY main_table.Room";
	
	$query = mysql_query($select.$join1.$join2.$join3.$join4.$wheres);
	$numrow = mysql_num_rows($query);
	
echo "<div align='center'> ตารางการใช้ห้องเรียนประจำวัน ".$day."</div><br><br>";
echo "<table border='1'>";

	for ($x=0;$x<=$numrow;$x++){
		if ($x!=0)$row_co = mysql_fetch_array($query);		
		
	if (chk_col($row_co[MergeID])) {		
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
			echo "<td width='40'></td>";
			}
			else {
//-------------------------------------------------------------------chkmerge				
				$query2 = mysql_query($select.$join1.$join2.$join3.$join4.$wheres);
				for ($y1=1;$y1<=$numrow;$y1++){
				$fetch2 = mysql_fetch_array($query2);
				if ($row_co[MergeID]==$fetch2[MergeID]){
					array_push($chkarry,$fetch2[MergeID]);
					if ($row_co[MergeType]=="ST"){
						array_push($sectarry,$fetch2[Section]);
						array_push($teacherarry,$fetch2[TeacherName]);
						}
						else if ($row_co[MergeType]=="T"){
							array_push($teacherarry,$fetch2[TeacherName]);
							}
							else if ($row_co[MergeType]=="S"){
								array_push($sectarry,$fetch2[Section]);
								}
					}
					
				}
	//------------------------------------------------------------merge_str			
				if (count($teacherarry)>1){
		for ($x1=0;$x1<count($teacherarry);$x1++){
		$teachfin = $teachfin.$teacherarry[$x1];
		}
	}
		else {
			$teachfin = $row_co[TeacherName];
			}
		
	if (count($sectarry)>1){
		for ($x1=0;$x1<count($sectarry);$x1++){
		$sectfin = $sectfin.$sectarry[$x1];
		}
	}
	else {
		$sectfin = $row_co[Section];
		}
		$finmerge = array($sectfin,$teachfin);
//--------------------------------------------------------------------------show data
echo "<td colspan = ".merge_period($row_co[StartTime],$row_co[Theory],$row_co[Practical])." align='center'>".$row_co[CourseName]."<br>".$finmerge[0]."<br>".$finmerge[1]."</td>";		
		$sectarry = array();
		$teacherarry = array();

		
				//merge_string($row_co[TeacherName],$row_co[Section]);
				//show_data($finmerge,$row_co);
				//echo "<td colspan = ".merge_period($row_co[StartTime],$row_co[Theory],$row_co[Practical])." align='center'>".$row_co[CourseName]."<br>".$row_co[TeacherName]."</td>";
				
				
				}
				
				
				
				
 		}
	}
 	echo "</tr>";
	}
	}
	echo "</table>";
	
	print_r($chkarry);
	print_r($sectarry);
	print_r($teacherarry);
	
	}






function show_data ($message,$row_co){
	echo "<td colspan = ".merge_period($row_co[StartTime],$row_co[Theory],$row_co[Practical])." align='center'>".$row_co[CourseName]."<br>".$message[0]."<br>".$message[1]."</td>";
	
	}

function chk_col ($col){
	for ($x2=0;$x2<count($chkarry);$x2++){
		if ($col==$chkarry[$x2]){
			$sum++;
			}
			}
			if ($sum>1)return FALSE;
				
				else return TRUE;
		}
function merge_period ($time,$theory,$Practice){
	$sum = ($theory+$Practice);
	return $sum;
	
	}
	
function chk_merge ($query,$row_co,$numrow){
	$query2 = $query;
	

				for ($y1=1;$y1<=$numrow;$y1++){
				$fetch2 = mysql_fetch_array($query2);
				if ($row_co[MergeID]==$fetch2[MergeID]){
					array_push($chkarry,$fetch2[MergeID]);
					if ($row_co[MergeType]=="ST"){
						array_push($sectarry,$fetch2[Section]);
						array_push($teacherarry,$fetch2[TeacherName]);
						}
						else if ($row_co[MergeType]=="T"){
							array_push($teacherarry,$fetch2[TeacherName]);
							}
							else if ($row_co[MergeType]=="S"){
								array_push($sectarry,$fetch2[Section]);
								}
					}
					
				}
				
		}

function merge_string ($teacher,$section){
	if (count($teacherarry)>1){
		for ($x1=0;$x1<count($teacherarry);$x1++){
		$teachfin = $teachfin.$teacherarry[$x1];
		}
	}
		else {
			$teachfin = $teacher;
			}
		
	if (count($sectarry)>1){
		for ($x1=0;$x1<count($sectarry);$x1++){
		$sectfin = $sectfin.$sectarry[$x1];
		}
	}
	else {
		$sectfin = $section;
		}
		$finmerge = array($sectfin,$teachfin);
		return $finmerge;
	}
?>