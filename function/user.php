<?php
session_start();
function user_status ($expression_us){

	require_once("dbo.php");
	?>
	<script src="js/ajax.js"> </script>
	<?
		echo "<br><br><br>";
		echo "<table class='table table-bordered' >";

		echo "<tr bgcolor='#9C9C9C'>";
			
			echo "<th colspan='2' width='150'><center>Username</center></th>";
			echo "<th width='100'><center>Permission</center></th>";
			echo "<th><center>Firstname</center></th>";
			echo "<th><center>Lastname</center></th>";
			echo "<th><center>Gender</center></th>";
			echo "<th width='200'><center>Status</center></th>";
		echo "</tr>";
	
		$query_user = mysql_query("SELECT * FROM permission_table $expression_us ORDER BY StatusID,UserName ASC");
			while ($data_user = mysql_fetch_array($query_user)){
				if($data_user[StatusID]){
					echo "<tr class='success' value>";

					echo "<td width='50'>";
					echo "<div align='center' class='btn-toolbar'>";
  							echo "<div class='btn-group'>";
    						echo "<a class='btn btn-mini edit_userbtn' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
    							
    							echo "<i class='icon-edit'></i>";
    						echo "</a>";
    						echo "<a class='btn btn-mini del_userbtn' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
    							
    							echo "<i class='icon-ban-circle'></i>";
    						echo "</a>";
  							echo "</div>";
						echo "</div>";
						echo "</td>";

					echo "<td><center>".$data_user[UserName]."</center></td>";

					echo "<td>";
						echo "<div align='center'>";
							if($data_user[SuperUser]){
								echo "<img src='img/per_admin.png' width='16' height='16'>";
							}
							else {
								if ($data_user[Pinsert]){
									echo "<img src='img/per_insert.png' width='16' height='16'>";
								}
								if ($data_user[Pupdate]){
									echo "<img src='img/per_update.png' width='16' height='16'>";
								}
								if ($data_user[Pdelete]){
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
    						echo "<a class='btn btn-mini edit_userbtn' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
    							
    							echo "<i class='icon-edit'></i>";
    						echo "</a>";
    						echo "<a class='btn btn-mini del_userbtn' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$data_user[UserName]."'>";
    							
    							echo "<i class='icon-ban-circle'></i>";
    						echo "</a>";
  							echo "</div>";
						echo "</div></td>";

					echo "<td><center>".$data_user[UserName]."</center></td>";
					echo "<td>";
						echo "<div align='center'>";
							if($data_user[SuperUser]){
								echo "<img src='img/per_admin.png' width='16' height='16'>";
							}
							else {
								if ($data_user[Pinsert]){
									echo "<img src='img/per_insert.png' width='16' height='16'>";
								}
								if ($data_user[Pupdate]){
									echo "<img src='img/per_update.png' width='16' height='16'>";
								}
								if ($data_user[Pdelete]){
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
					echo "<div class='control-group addusername'>";
					echo "<div class='controls'>";
					echo "<input class='input-large add_userID' type='text' placeholder='พิมพ์ Ussername ที่ต้องการ'>";
					echo "<span class='help-inline' id='user_error'></span>";
					echo "</div>";
	  				echo "</div>";
				echo "<label>รหัสผ่านของผู้ใช้งาน</label>";
				
				echo "<div class='control-group'>";
				echo "<div class='controls'>";
				echo "<input class='input-large add_userPWD' type='password' placeholder='พิมพ์ Password ที่ต้องการ'>";
				echo "<label>ยืนยันรหัสผ่าน</label>";
    			echo "<input type='password' class='confirmPWD' id='confirmPWD' placeholder='ยืนยันรหัสผ่าน'>";
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

		if($numrow >= 1){

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

	function edit_profile($UID){

		echo "<br><br> This is function Edit profile";
	}

	function search_user(){
		?>
		<script src="js/ajax.js"> </script>
		<br>
		<form class="form-search pull-right">
  		<input type="text" class="input-medium search-query" id="s_user" placeholder="ค้นหาโดยชื่อผู้ใช้งาน">
  		<input type="text" class="input-medium search-query" id="s_name" placeholder="ค้นหาโดยชื่อแรก">
  		<input type="text" class="input-medium search-query" id="s_lname" placeholder="ค้นหาโดยนามสกุล">
  		<input type="text" class="input-medium search-query" id="s_email" placeholder="ค้นหาโดยอีเมล์">
  		<input type="text" class="input-medium search-query" id="s_tel" placeholder="ค้นหาโดยเบอร์โทรศัพท์">
  		<button type="button" class="s_btn btn"><i class="icon-search"></i> ค้นหา</button>
		</form>
		<?
	}
	function user_edit($edit_uid){
		?>
		<script src="js/ajax.js"> </script>
		<?
		$user_query = mysql_query("SELECT * FROM permission_table WHERE UserName = '$edit_uid'");
		$query_fetch_edid = mysql_fetch_array($user_query);


		echo "<br><br>";

		//print_r($query_fetch_edid);
		echo "<div class='mini-layout'>";
			echo "<div class='mini-layout-body'>";

				echo "<fieldset>";
				echo "<label>ชื่อผู้ใช้งาน</label>";
					echo "<div class='control-group addusername'>";
					echo "<div class='controls'>";
					echo "<input class='input-large add_userID' type='text' value ='".$query_fetch_edid[1]."' disabled>";
					echo "<span class='help-inline' id='user_error'></span>";
					echo "</div>";
	  				echo "</div>";
				echo "<label>รหัสผ่านของผู้ใช้งาน</label>";
				
				echo "<div class='control-group'>";
				echo "<div class='controls'>";
				echo "<input class='input-large add_userPWD' type='password' value ='".$query_fetch_edid[2]."'>";
				echo "<label>ยืนยันรหัสผ่าน</label>";
    			echo "<input type='password' class='confirmPWD' id='confirmPWD' value='".$query_fetch_edid[2]."'>";
    			echo "<span class='help-inline' id='pwd_error'></span>";
  				echo "</div>";
  				echo "</div>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ชื่อ - สกุล</label>";
				echo "<input class='input-large add_userFSTN' type='text' value ='".$query_fetch_edid[4]."'> ";
				echo "<input class='input-large add_userLSTN' type='text' value ='".$query_fetch_edid[5]."'>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ระบุเพศของผู้ใช้งาน</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='optionsRadios' id='optionradiosex1' value='male' ";
 					if($query_fetch_edid[6]==1) echo "checked>";
 						else echo ">";
  				echo "Male";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='optionsRadios' id='optionradiosex2' value='female'";
  					if($query_fetch_edid[6]==0) echo "checked>";
  						else echo ">";
  				echo "Female";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุ E-mail ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_email' type='email' value ='".$query_fetch_edid[11]."' required>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุเบอร์โทรศัพท์ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_phone' type='text' value ='".$query_fetch_edid[12]."' required>";
				echo "</fieldset>";

				echo "<br>";
			if($_SESSION['SuperUser']){
				echo "<fieldset>";
				echo "<label>สิทธิ์สำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='permiss1' id='optionradiopermiss1' value='user'";
 					if(($query_fetch_edid[7]==1||$query_fetch_edid[8]||$query_fetch_edid[9])==1) echo " checked>";
 						else echo ">";
  				echo "ผู้ใช้งานทั่วไป";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='permiss1' id='optionradiopermiss2' value='superuser'";
  					if($query_fetch_edid[10]==1) echo " checked>";
  						else echo ">";
  				echo "ผู้ดูแลระบบ";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สถานะสำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='active1' id='optionradioactive1' value='activate'";
 					if($query_fetch_edid[13]==1) echo " checked>";
 						else echo ">";
  				echo "Activate";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='active1' id='optionradioactive2' value='disactivate'";
  					if($query_fetch_edid[13]==0) echo " checked>";
  						else echo ">";
  				echo "Disactivate";
				echo "</label>";
				echo "</fieldset>";
			}

			else {
				echo "<fieldset>";
				echo "<label>สิทธิ์สำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='permiss1' id='optionradiopermiss1' value='user'";
 					if(($query_fetch_edid[7]==1||$query_fetch_edid[8]||$query_fetch_edid[9])==1) echo " checked disabled >";
 						else echo " disabled >";
  				echo "ผู้ใช้งานทั่วไป";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='permiss1' id='optionradiopermiss2' value='superuser'";
  					if($query_fetch_edid[10]==1) echo " checked disabled >";
  						else echo " disabled >";
  				echo "ผู้ดูแลระบบ";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สถานะสำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='active1' id='optionradioactive1' value='activate'";
 					if($query_fetch_edid[13]==1) echo " checked disabled >";
 						else echo " disabled >";
  				echo "Activate";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='active1' id='optionradioactive2' value='disactivate'";
  					if($query_fetch_edid[13]==0) echo " checked disabled >";
  						else echo " disabled >";
  				echo "Disactivate";
				echo "</label>";
				echo "</fieldset>";
			}

				echo "<br><br>";


				echo "<center><button class='btn btn-primary update_userbtn' type='button'>บันทึกข้อมูล</button></center>";
				
			echo "</div>";
		echo "</div>";
	}

	function update_user_to_DB($update_usr_data){

		$tel = explode('-', $update_usr_data[6]);
			foreach ($tel as $tel2){
				$tel3 .= $tel2;
			}
			if($update_usr_data[4]=="male"){
				$update_usr_data[4] = 1;
			}
			else $update_usr_data[4] = 0;

			if($update_usr_data[7]=="superuser"){
				$insert = 0;
				$update = 0;
				$delete = 0;
				$update_usr_data[7] = 1;
			}
			else {
				$insert = 1;
				$update = 1;
				$delete = 1;
				$update_usr_data[7] = 0;
			}
			if($update_usr_data[8]=="activate"){

				$update_usr_data[8] = 1;
			}
			else $update_usr_data[8] = 0;

			$up_query1 = "UPDATE permission_table SET Password = '".$update_usr_data[1]."', UserFirstname = '".$update_usr_data[2]."', UserLastname = '".$update_usr_data[3]."', ";
			$up_query2 = "Gender = '".$update_usr_data[4]."', Email = '".$update_usr_data[5]."', Telephone = '".$tel3."'";
			if ($_SESSION['SuperUser']){
				$up_query3 = ", Pinsert = '".$insert."', Pupdate = '".$update."', Pdelete = '".$delete."', SuperUser = '".$update_usr_data[7]."', StatusID = '".$update_usr_data[8]."'";
			}
			$up_query4 = " WHERE UserName ='".$update_usr_data[0]."'";
		//echo "<br>";
		//print_r($update_usr_data);

		$finup_query = $up_query1.$up_query2.$up_query3.$up_query4;

		//echo $finup_query;
		mysql_query($finup_query);
		echo "<script> alert('ทำการบัณทึกข้อมูลแล้ว'); </script>";
		user_edit($update_usr_data[0]);

	}
?>