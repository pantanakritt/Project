<?php
function user_status (){
	require_once("dbo.php");
	?>
	<script src="js/ajax.js"> </script>
	<?
		echo "<br><br><br>";
		echo "<table class='table table-bordered' >";

		echo "<tr bgcolor='#9C9C9C'>";
			
			echo "<th colspan='2'><center>Username</center></th>";
			echo "<th><center>Permission</center></th>";
			echo "<th><center>Firstname</center></th>";
			echo "<th><center>Lastname</center></th>";
			echo "<th><center>Gender</center></th>";
			echo "<th width='200'><center>Status</center></th>";
		echo "</tr>";
	
		$query_user = mysql_query("SELECT * FROM permission_table ORDER BY StatusID,UserName ASC");
			while ($data_user = mysql_fetch_array($query_user)){
				if($data_user[StatusID]){
					echo "<tr class='success' value>";

					echo "<td><div align='center' class='btn-toolbar'>";
  							echo "<div class='btn-group'>";
    						echo "<a class='btn btn-mini' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
    							echo "<input type='hidden' class='statid' value='".$data_user[StatusID]."'>";
    							echo "<i class='icon-edit'></i></a>";
    						echo "<a class='btn btn-mini' href='#'><i class='icon-ban-circle'></i></a>";
  							echo "</div>";
						echo "</div></td>";

					echo "<td><center>".$data_user[UserName]."</center></td>";

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

					echo "<td><center>".$data_user[UserFirstname]."</center></td>";
					echo "<td><center>".$data_user[UserLastname]."</center></td>";

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
					echo "<tr class='error'>";

						echo "<td><div align='center' class='btn-toolbar'>";
  							echo "<div class='btn-group'>";
    						echo "<a class='btn btn-mini' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
    							echo "<input type='hidden' class='statid' value='".$data_user[StatusID]."'>";
    							echo "<i class='icon-edit'></i></a>";
    						echo "<a class='btn btn-mini' href='#'><i class='icon-ban-circle'></i></a>";
  							echo "</div>";
						echo "</div></td>";

					echo "<td><center>".$data_user[UserName]."</center></td>";
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
					echo "<td><center>".$data_user[UserFirstname]."</center></td><td><center>".$data_user[UserLastname]."</center></td><td>";
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

		function add_user(){
	?>
	<script src="js/ajax.js"> </script>
	<?
		echo "<br><br>";
		echo "<div class='mini-layout'>";
			echo "<div class='mini-layout-body'>";

				echo "<fieldset>";
				echo "<label>ชื่อผู้ใช้งาน</label>";
				echo "<input class='input-large add_userID' type='text' placeholder='พิมพ์ Ussername ที่ต้องการ'>";
				echo "<label>รหัสผ่านของผู้ใช้งาน</label>";
				echo "<input class='input-large add_userPWD' type='password' placeholder='พิมพ์ Password ที่ต้องการ'>";
				echo "<div class='control-group info'>";
				echo "<div class='controls'>";
				echo "<label>ยืนยันรหัสผ่าน</label>";
    			echo "<input type='text' class='confirmPWD' id='confirmPWD' placeholder='ยืนยันรหัสผ่าน'>";
    			echo "<span class='help-inline' id='pwd_error'></span>";
  				echo "</div>";
  				echo "</div>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ชื่อ - สกุล</label>";
				echo "<input class='input-large add_userFSTN' type='text' placeholder='พิมพ์ชื่อของผู้ใช้งาน'> ";
				echo "<input class='input-large add_userLSTN' type='text' placeholder='พิมพ์นามสกุลของผู้ใช้งาน'>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ระบุเพศของผู้ใช้งาน</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='optionsRadios' id='optionradiosex1' value='male' checked>";
  				echo "Male";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='optionsRadios' id='optionradiosex2' value='female'>";
  				echo "Female";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุ E-mail ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_email' type='email' placeholder='foo@bar.com' required>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุเบอร์โทรศัพท์ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_phone' type='text' placeholder='081-234-5678' required>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สิทธิ์สำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='permiss1' id='optionradiopermiss1' value='user' checked>";
  				echo "ผู้ใช้งานทั่วไป";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='permiss1' id='optionradiopermiss2' value='superuser'>";
  				echo "ผู้ดูแลระบบ";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สถานะสำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='active1' id='optionradioactive1' value='activate' checked>";
  				echo "Activate";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='active1' id='optionradioactive2' value='disactivate'>";
  				echo "Disactivate";
				echo "</label>";
				echo "</fieldset>";

				echo "<br><br>";


				echo "<center><button class='btn btn-primary add_userbtn' type='button'>บันทึกข้อมูล</button></center>";
				
			echo "</div>";
		echo "</div>";
		

	}

	function add_user_to_DB($data){

		$numrow = mysql_num_rows(mysql_query("SELECT * FROM permission_table WHERE UserName = '$data[0]'"));

		if($numrow == 1){

			echo "Username is not unique";
		}
		else {

			$tel = explode('-', $data[6]);
			foreach ($tel as $tel2){
				$tel3 .= $tel2;
			}
			if($data[4]=="male"){
				$data[4] = 1;
			}
			else $data[4] = 0;

			if($data[7]=="superuser"){
				$insert = 0;
				$update = 0;
				$delete = 0;
				$data[7] = 1;
			}
			else {
				$insert = 1;
				$update = 1;
				$delete = 1;
				$data[7] = 0;
			}
			if($data[8]=="activate"){

				$data[8] = 1;
			}
			else $data[8] = 0;

			mysql_query("INSERT INTO permission_table VALUES ('','$data[0]','$data[1]','','$data[2]','$data[3]','$data[4]','$insert','$update','$delete','$data[7]','$data[5]','$tel3','$data[8]')");
				user_status();


		}
		

	}

?>