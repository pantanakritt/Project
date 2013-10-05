<?php
function user_status (){
	require_once("dbo.php");
	?>
	<script src="js/ajax.js"> </script>
	<?
		echo "<br><br><br>";
		echo "<table class='table table-bordered' >";

		echo "<tr>";
			echo "<th><center>Username</center></th>";
			echo "<th><center>Permission</center></th>";
			echo "<th><center>Firstname</center></th>";
			echo "<th><center>Lastname</center></th>";
			echo "<th><center>Gender</center></th>";
			echo "<th width='200'><center>Status</center></th>";
		echo "</tr>";
	
		$query_user = mysql_query("SELECT * FROM permission_table ORDER BY StatusID,UserName ASC");
			while ($data_user = mysql_fetch_array($query_user)){
				if($data_user[StatusID]){
					echo "<tr class='success' value><td>".$data_user[UserName]."</td>";

					echo "<td>";
						echo "<div align='center'>";
							if($data_user[SuperUser]){
								echo "<img src='img/per_admin.png' width='16' height='16'>";
							}
							else {
								if ($data_user[Insert]){
									echo "<img src='img/per_insert.png' width='16' height='16'>";
								}
								if ($data_user[Update]){
									echo "<img src='img/per_update.png' width='16' height='16'>";
								}
								if ($data_user[Delete]){
									echo "<img src='img/per_delete.png' width='16' height='16'>";
								}
							}


						echo "</div>";
						
					echo "</td>";

					echo "<td>".$data_user[UserFirstname]."</td>";
					echo "<td>".$data_user[UserLastname]."</td>";

					echo "<td>";
						if($data_user[Gender]){echo "<center>Male</center>";}
							else {echo "<center>Female</center>";}
					echo "</td>";

					echo "<td>";
					echo "<div align='center'>";
					echo "<font color='green'>Activated</font>";
					echo "&nbsp;&nbsp;&nbsp;<button class='btn btn-mini activateID' type='button'>";
						echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
						echo "<input type='hidden' class='statid' value='".$data_user[StatusID]."'>";
					echo "Clik to disactivate</button>";
					
					echo "</div>"; 
					echo "</td></tr>";
				}
				else {
					echo "<tr class='error'><td>".$data_user[UserName]."</td>";
					echo "<td>";
						echo "<div align='center'>";
							if($data_user[SuperUser]){
								echo "<img src='img/per_admin.png' width='16' height='16'>";
							}
							else {
								if ($data_user[Insert]){
									echo "<img src='img/per_insert.png' width='16' height='16'>";
								}
								if ($data_user[Update]){
									echo "<img src='img/per_update.png' width='16' height='16'>";
								}
								if ($data_user[Delete]){
									echo "<img src='img/per_delete.png' width='16' height='16'>";
								}
							}


						echo "</div>";
						
					echo "</td>";
					echo "<td>".$data_user[UserFirstname]."</td><td>".$data_user[UserLastname]."</td><td>";
						if($data_user[Gender]){echo "<center>Male</center>";}else {echo "<center>Female</center>";}
						echo "</td><td>";
						echo "<div align='center'><font color='red'>Not Activated</font>";
						echo "&nbsp;&nbsp;&nbsp;<button class='btn btn-mini activateID' type='button'>";
						echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
						echo "<input type='hidden' class='statid' value='".$data_user[StatusID]."'>";
					echo "Clik to activate</button>";
					
					echo "</div>";
					echo "</td></tr>";
				}

			}
		echo "</table>";


		}


?>