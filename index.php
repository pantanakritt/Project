<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<title>ระบบตารางเรียนตารางสอนออนไลน์</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

</head>
<?php
require ("function/day.php");
require ("function/dbo.php");
require ("function/teacher.php");
require ("function/room.php");
require ("function/stdgroup.php");

?>
<body>
<?php

echo "<div align='center'>";c_byday('MON'); echo "</div>";
echo "<br><br><br><br><br>";
echo "<div align='center'>";select_teacher('0101002'); echo "</div>";
echo "<br><br><br><br><br>";
echo "<div align='center'>";select_room('832'); echo "</div>";
echo "<br><br><br><br><br>";
echo "<div align='center'>";select_group('560429701'); echo "</div>";

?>
</body>
</html>