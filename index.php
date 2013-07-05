<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<title>ระบบตารางเรียนตารางสอนออนไลน์</title>
</head>
<?php
require ("day.php");
require ("dbo.php");
require ("teacher.php");

?>
<body>
<?php

echo "<div align='center'>";c_byday('MON'); echo "</div>";
echo "<br><br><br><br><br><br><br><br>";
echo "<div align='center'>";select_teacher('0101004'); echo "</div>"

?>
</body>
</html>