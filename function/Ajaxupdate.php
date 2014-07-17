<?php
session_start();
require_once("dbo.php");
require_once("day.php");
require_once("room.php");
require_once("teacher.php");
require_once("stdgroup.php");
require_once("user.php");
require_once("gadget.php");

if($_POST['type_view'] == "from_day") c_byday($_POST['data_send']);

else if($_POST['type_view'] == "from_room") select_room($_POST['data_send']);

else if ($_POST['type_view'] == "from_teacher") select_teacher($_POST['data_send']);

else if($_POST['type_view'] == "from_group") select_group($_POST['data_send']);

else if ($_POST['type_view'] == "check_login"){
	require_once("gadget.php");
	
	if (chk_login($_POST['user'],$_POST['password'])){
	if ($_SESSION['StatusID']==1) { ?>
    <script>
    window.location.href="index.php";
    </script>
    <?
		}
		else { ?>
			<div class="alert">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>เกิดข้อผิดพลาด!</strong> <p>ชื่อผู้ใช้งานของท่านยังไม่ได้รับการยืนยัน กรุณาติดต่อผู้ดูแลระบบ</p>
		</div>
		<?
		session_destroy();
	}
		}
		else {

?>
		<div class="alert">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>เกิดข้อผิดพลาด!</strong> <p>มีข้อผิดพลาดในชื่อผู้ใช้งาน หรือ รหัสผ่านของท่าน กรุณาตรวจสอบอีกครั้ง</p>
		</div>
<?
		}
}


	else if ($_POST['type_view'] == "status_users"){
			user_status("1");
	}
else if ($_POST['type_view']== "ActivateID"){
	dis_or_activate_user($_POST[userSTSid],$_POST[StatID]);
	//echo "<br><br> username is = ".$_POST[userSTSid]." status id = ".$_POST[StatID];
	user_status("1");
	}

else if ($_POST['add_user']=="add_user"){

	add_user();
	}

else if ($_POST['add_user']=="form_adduser"){

	$form_data = $_POST['data_user'];
	$data_spilt = explode(',', $form_data);

	//echo "<br><br>";
	//print_r($data_spilt);

	add_user_to_DB($data_spilt);


	}

	else if ($_POST['type_view']=="del_user"){

	delete_user($_POST['del_user']);


	}

	else if($_POST['type_view']=="chk_usr"){

		$usrn = $_POST['usrn'];
		$uque = mysql_query("SELECT * FROM `permission_table` WHERE `UserName` = '$usrn'");
		$rowque = mysql_num_rows($uque);
		if ($rowque!=0){
			?>
			<script>
			$(".addusername").removeClass("success");
			$(".addusername").addClass("error");
			</script>
			<?
			echo "ชื่อผู้ใช้งานถูกใช้งานแล้ว";
		}
		else {
			?>
			<script>
			$(".addusername").removeClass("error");
			$(".addusername").addClass("success");
			</script>
			<?
			$usrval = 0;
			echo "";
		}

	}

else if ($_POST['type_view']=="search_ulink"){
	search_user();
}

else if ($_POST['type_view']=="search_user1"){

	$data_spilt = explode(',', $_POST['search_data']);	
	$expres2find = "WHERE UserName LIKE '".$data_spilt[0]."%' AND UserFirstname LIKE '".$data_spilt[1]."%' AND UserLastname LIKE '";
	$expres2find .= $data_spilt[2]."%' AND Email LIKE '".$data_spilt[3]."%' AND Telephone LIKE '".$data_spilt[4]."%'";
	search_user();
	user_status($expres2find);
}

else if ($_POST['type_view']=="edit_user"){
	user_edit($_POST['edit_id'],$_POST['header_chk']);
}

else if ($_POST['type_view']=="update_user"){

$form_data = $_POST['usr_data'];
	$data_spilt = explode(',', $form_data);

	//echo "<br><br>";
	//print_r($data_spilt);

	update_user_to_DB($data_spilt);
}

else if($_POST['type_view'] == "show_log") {

	?>
	<script src="js/ajax.js"> </script>
	<?

	$log_query = mysql_query("SELECT * FROM dblog_table ORDER BY log_Date DESC");
	
	$log_num = mysql_num_rows($log_query);

	if ($log_num%20!=0){
		$num_log_page = ceil($log_num/20);
	}
	else {
		$num_log_page = floor($log_num/20);
	}

		echo "<div class='pagination pagination-centered'>";
	  	echo "<ul>";
	    
	    	for ($x=1;$x<=$num_log_page;$x++){
	    		echo "<li><a href='#' class='page_dvide' id='page".$x."'>".$x."</a></li>";
			}
	    
	    
	  	echo "</ul>";
		echo "</div>";

		echo "<ul class='pager'>";
  		echo "<li class='previous disabled'>";
    	echo "<a href='#' class='prev_page'><input type='hidden' class='prev_val' value='1'>&larr; Previous</a>";
  		echo "</li>";
  		echo "<li><a href='#' class='this_page'>Page 1</a></li>";
  		echo "<li class='next'>";
    	echo "<a href='#' class='next_page'><input type='hidden' class='next_val' value='2'><input type='hidden' class='max_page' value='".$num_log_page."'>Next &rarr;</a>";
  		echo "</li>";
		echo "</ul>";

		echo "<div class='show_log_page'>";
		$log_query_lim = mysql_query("SELECT * FROM dblog_table ORDER BY log_Date DESC LIMIT 0,20 ");

		echo "<table class='table table-bordered'>";
		echo "<tr><th width='15%'>Time</th><th width='15%'>User</th><th width='55%'>Action</th><th width='15%'>IP Address</th></tr>";
		$num_lim = mysql_num_rows($log_query_lim);
		for($y=1;$y<=$num_lim;$y++){
			$feth_lim = mysql_fetch_array($log_query_lim);
			echo "<tr>";
				echo "<td>".$feth_lim[log_Date]."</td>";
				echo "<td>".$feth_lim[User]."</td>";
				echo "<td>";
				echo $feth_lim[Action];
				echo "</td>";
				echo "<td>".$feth_lim[ip]."</td>";
			echo "</tr>";

		}
		echo "</table>";

		echo "</div>";


}

else if($_POST['type_view']=="getpage"){



	$limitpage = ($_POST['num_lim']-1)*20;

	$log_query_lim = mysql_query("SELECT * FROM dblog_table ORDER BY log_Date DESC LIMIT $limitpage,20 ");

		echo "<table class='table table-bordered'>";
		echo "<tr><th width='15%'>Time</th><th width='15%'>User</th><th width='55%'>Action</th><th width='15%'>IP Address</th></tr>";
		$num_lim = mysql_num_rows($log_query_lim);
		for($y=1;$y<=$num_lim;$y++){
			$feth_lim = mysql_fetch_array($log_query_lim);
			echo "<tr>";
				echo "<td>".$feth_lim[log_Date]."</td>";
				echo "<td>".$feth_lim[User]."</td>";
				echo "<td>";
				echo $feth_lim[Action];
				echo "</td>";
				echo "<td>".$feth_lim[ip]."</td>";
			echo "</tr>";

		}
		echo "</table>";

}

else if($_POST['ajax_update_var']=="add_teach_table"){
	echo "<br>";
	?>
	<script src="js/ajax.js"> </script>
	<form>
		<fieldset>
			<legend>ส่วนเพิ่มข้อมูลตารางสอน</legend>
		</fieldset>
		<label>รหัสวิชา</label>
		<input type="text" class="span5" id="inst_code" placeholder="Example : 4000115Z"></input>
		<br>
		<br>
		<label>ชื่อวิชา</label>		
		<input type="text" class="span5" id="inst_name_course" placeholder="Example : เทคโนโลยีสารสนเทศเพื่อการศึกษาค้นคว้า"></input>
		<br>
		<br>
		<label>section</label>
		<input type="text" class="span5" "inst_sect" id=placeholder="Example : 1"></input>
		<br>
		<br>
		<label>เวลาเรียน</label>
			<table>
				<tr>
					<th>วัน</th><th>คาบเริ่มต้น</th><th>คาบสิ้นสุด</th><th>ห้องเรียน</th>
				</tr>
				<td><select id="inst_day">
					<option>จันทร์</option>
					<option>อังคาร</option>
					<option>พุธ</option>
					<option>พฤหัสบดี</option>
					<option>ศุกร์</option>
					<option>เสาร์</option>
					<option>อาทิตย์</option>
					</select>
				</td>
				<td>
					<center><input type="text" class="span4" id="inst_pstart" placeholder="1-14"></input></center>
				</td>
				<td>
					<center><input type="text" class="span4" id="inst_pend" placeholder="1-14"></input></center>
				</td>
				<td>
					<center><input type="text" class="span4" id="inst_room"placeholder="823"></input></center>
				</td>
			</table>
			<br>
			<br>
		<label>รหัสหมู่เรียน</label>
		<input type="text" id="inst_sectcode" placeholder="Example : 550462201" class="span5"></input>
		<br><br>
		<label>ชื่อ-สกุล อาจารย์ผู้สอน</label>
			<table class="myTable">
				<tr><th></th><th>ชื่อ</th><th>นามสกุล</th></tr>
				
					<tr>
						<td>&nbsp;1&nbsp;</td>
						<td> <input type="text" placeholder="Example : ประยุทธ์" ></input></td>
						<td><input type="text" placeholder="Example : จันทร์โอชา" ></input></td>
					</tr>

				
				
			</table>
			<div><a href="#" class="add_multiple_teacher">กดเพื่อเพิ่มผู้สอน(กรณีมีผู้สอนมากกว่า 1 คน)<input class="number_teacher" type="hidden" value="1"></input></a></div>
			<br>
			<br>
			<div align='center'><button class="insert_dbtableclk btn" type="button">เพิ่มข้อมูลตารางสอน</button></div>
	</form>
	<?

}

else if ($_POST['type_chk']=="listviewfunc"){
	?>
	
	<script src="js/ajax.js"> </script>
	<br><br>
	<div>Hello world</div>

	<?
}
	



?>