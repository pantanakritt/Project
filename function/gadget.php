<?php
function call_roomnumber(){

$SQLsyntax = "SELECT DISTINCT(main_table.Room) FROM main_table";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_room'>";
	echo "<input type='hidden' class='roomID' value='".$fetch[Room]."'>";
	echo $fetch[Room];
	echo "</a></li>";

	}
}

function show_day(){

$SQLsyntax = "SELECT DISTINCT(main_table.Day) FROM main_table";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_day'>";
	echo "<input type='hidden' class='dayID' value='".$fetch[Day]."'>";
	echo $fetch[Day];
	echo "</a></li>";

	}
}

function show_group(){
$SQLsyntax = "SELECT DISTINCT(main_table.MajorID),major_table.MajorName FROM main_table INNER JOIN major_table ON main_table.MajorID = major_table.MajorID ORDER BY major_table.MajorID ASC";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_group'>";
	echo $fetch[MajorName]."&nbsp;(".$fetch[MajorID].")";
	echo "<input type='hidden' class='groupID' value='".$fetch[MajorID]."'>";
	echo "</a></li>";

	}
}

function show_teachers(){

	$SQLsyntax = "SELECT DISTINCT(teaassgn_table.TeacherID),teacher_table.TeacherName,teacher_table.TeacherLastname FROM teaassgn_table INNER JOIN teacher_table ON teaassgn_table.TeacherID = teacher_table.TeacherID ORDER BY teacher_table.TeacherID ASC";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_teacher'>";
	echo $fetch[TeacherName]."&nbsp;&nbsp;".$fetch[TeacherLastname];
	echo "<input type='hidden' class='teacherID' value='".$fetch[TeacherID]."'>";
	echo "</a></li>";
	}
}

function login(){
	?>
    <div id="Login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Log In</h3>
  </div>
  <div class="modal-body">
  
   <div class = "updatelogin"></div>

   <form>
  <fieldset>
    <label>Username</label>
    <input type="text" class="userlogin" placeholder="พิมพ์ชื่อผู้ใช้ของท่าน">
    </label>
    <label>Password</label>
    <input type="password" class="passwordlogin" placeholder="พิมพ์รหัสผ่าน">
     </label>
    
  </fieldset>
</form>
   
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary loginuser">Log In</button>
  </div>
</div>

	<?
	}

?>