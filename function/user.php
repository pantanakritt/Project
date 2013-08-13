<?php

function user_status (){
	require_once("dbo.php");
		echo "<br><br><br>";
		echo "<table class='table table-bordered'  >";
		echo "<tr><td><center>Username</center></td><td><center>Firstname</center></td><td><center>Lastname</center></td>";
		echo "<td><center>Gender</center></td><td><center>Status</center></td>";

		echo "</tr>";
		$query_user = mysql_query("SELECT * FROM permission_table");
			while ($data_user = mysql_fetch_array($query_user)){
				if($data_user[StatusID]){
					echo "<tr class='success'><td>".$data_user[UserName]."</td>";
					echo "<td>".$data_user[UserFirstname]."</td><td>".$data_user[UserLastname]."</td><td>";
						if($data_user[Gender]){echo "<center>Male</center>";}
							else {echo "<center>Female</center>";}
					echo "</td><td>";
					echo "<font color='green'><center>Activated</center></font>"; 
					echo "</td></tr>";
				}
				else {
					echo "<tr class='error'><td>".$data_user[UserName]."</td>";
					echo "<td>".$data_user[UserFirstname]."</td><td>".$data_user[UserLastname]."</td><td>";
						if($data_user[Gender]){echo "<center>Male</center>";}else {echo "<center>Female</center>";}
						echo "</td><td><font color='red'> <center>Not Activated</center></font>";
					echo "</td></tr>";
				}

			}
		echo "</table>";


		}


?>