<?php
require_once("dbo.php");
require_once("day.php");
require_once("room.php");
require_once("teacher.php");
require_once("stdgroup.php");

if($_POST['type_view'] == "from_day") c_byday($_POST['data_send']);

else if($_POST['type_view'] == "from_room") select_room($_POST['data_send']);

else if ($_POST['type_view'] == "from_teacher") select_teacher($_POST['data_send']);

else if($_POST['type_view'] == "from_group") select_group($_POST['data_send']);

else if ($_POST['type_view'] == "check_login"){
?>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>เกิดข้อผิดพลาด!</strong> <p>มีข้อผิดพลาดในชื่อผู้ใช้งาน หรือ รหัสผ่านของท่าน กรุณาตรวจสอบอีกครั้ง</p>
</div>
<?
}
?>