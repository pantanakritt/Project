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
	echo "<script>window.location.href='index.php'</script>";
	
	}

	else if ($_POST['type_view'] == "status_users"){
			user_status();
	}
else if ($_POST['type_view']== "ActivateID"){
	dis_or_activate_user($_POST[userSTSid],$_POST[StatID]);
	//echo "<br><br> username is = ".$_POST[userSTSid]." status id = ".$_POST[StatID];
	user_status();
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
?>