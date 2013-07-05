<?php
function select_teacher($tid){
	
	$tquery = mysql_query("SELECT AsgnRef FROM Teaasgn_table WHERE TeacherID = '$tid'");
	$trow = mysql_num_rows($tquery);
	
	
	
	}
	
	echo "<br><br><br><div align='center'><font size ='+5'>Hello World !!</div>";
?>
