<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<title>ระบบตารางเรียนตารางสอนออนไลน์</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<?php
require ("function/day.php");
require ("function/dbo.php");
require ("function/teacher.php");
require ("function/room.php");
require ("function/stdgroup.php");

?>
<body>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<div class="container-fluid">
	<div class="row-fluid">
		
			<div class="span12" >

				<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">ระบบตารางเรียนตารางสอนออนไลน์</a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle pull-right" data-toggle="dropdown" href="#">
				แสดงข้อมูลตารางเรียนตารางสอน
			<b class="caret"></b>
			</a>
  				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    				<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามวัน</a>
    				<ul class="dropdown-menu">
    					<li>MON</li>
    					<li>TUE</li>
    					<li>WED</li>
    					<li>THU</li>
    				</ul>	
    				</li>
    				<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามห้อง</a>
    				<ul class="dropdown-menu">
    					<li>823</li>
    					<li>824</li>
    					</ul>
    				</li>
    			<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามกลุ่มเรียน</a>
    				<ul class="dropdown-menu">
    					<li>Com-sci(520423801)</li>
    					<li>IT(520429701)</li>
    					</ul>
    			</li>
    			<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามผู้สอน</a>
    				<ul class="dropdown-menu">
    					<li>อ.เณริสา อ่อนขำ</li>
    					<li>อ.กฤษณ์ ชัยวัณณคุปต์</li>
    					</ul>
    			</li>
  				</ul>
			</a>
	 </li>
    </ul>
  </div>
</div>

				</div>
			</div>
			
	</div>
  <div class="row-fluid">
    <div class="span1">
      LEFT SIDE
    </div>
    <div class="span10" >
    <?
      echo "<div align='center'>";c_byday('MON'); echo "</div>";
//echo "<br><br><br><br><br>";
//echo "<div align='center'>";select_teacher('0101002'); echo "</div>";
//echo "<br><br><br><br><br>";
//echo "<div align='center'>";select_room('832'); echo "</div>";
//echo "<br><br><br><br><br>";
//echo "<div align='center'>";select_group('560429701'); echo "</div>";
?>
    </div>
    <div class="span1">
    RIGHT SIDE
    </div>
  </div>
</div>

</body>
</html>