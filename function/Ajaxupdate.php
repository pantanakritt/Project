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
	if ($_SESSION['StatusID']) { ?>
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

else if ($_POST['type_view'] == "check_logout"){
	session_destroy();
	echo "<script>";
	//echo "alert('');";
	echo "window.location.href='index.php'</script>";
	
	}

	else if ($_POST['type_view'] == "status_users"){
			user_status("");
	}
else if ($_POST['type_view']== "ActivateID"){
	dis_or_activate_user($_POST[userSTSid],$_POST[StatID]);
	//echo "<br><br> username is = ".$_POST[userSTSid]." status id = ".$_POST[StatID];
	user_status('');
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
?>