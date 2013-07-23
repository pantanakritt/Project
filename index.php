<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<title>ระบบตารางเรียนตารางสอนออนไลน์</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 90px;
      }
      #footer {
        background-color: #f5f5f5;
      }
      #tcolor {
      	background-color: #F8ECE0;

      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
        padding-top: 60px;
      }
      .container .credit {
        margin: 20px 0;
      }

      code {
        font-size: 80%;
      }

    </style>
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
<div id="warp">

<div class="container-fluid">
	<div class="row-fluid">
		
			<div class="span12" >

				<div class="navbar navbar-fixed-top">
				<p class="navbar-text pull-right"><a href="#" class ="navbar-link">SIGN IN</a> or <a href="#" class ="navbar-link">SIGN UP</a>&nbsp;&nbsp;&nbsp;</p>
  <div class="navbar-inner">
    <a class="brand" href="#">&nbsp;&nbsp;&nbsp;ระบบตารางเรียนตารางสอนออนไลน์</a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle pull-right" data-toggle="dropdown" href="#">
				แสดงข้อมูลตารางเรียนตารางสอน
			<b class="caret"></b>
			</a>
  				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    				<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามวัน</a>
    				<ul class="dropdown-menu">
    					<?php
              require_once("function/gadget.php");
                show_day();
              ?>


    				</ul>	
    				</li>
    				<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามห้อง</a>
    				<ul class="dropdown-menu">
    					<?php
              require_once("function/gadget.php");
                call_roomnumber();
              ?>
    					</ul>
    				</li>
    			<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามกลุ่มเรียน</a>
    				<ul class="dropdown-menu">
    					<?php
                require_once("function/gadget.php");
                show_group();
              ?>
    					</ul>
    			</li>
    			<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามผู้สอน</a>
    				<ul class="dropdown-menu">
    					<?php
                require_once("function/gadget.php");
                show_teachers();
              ?>
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
      <!--LEFT SIDE -->
    </div>
    <div class="span10" >
    <br><br>
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
    <!-- RIGHT SIDE -->
    </div>
  </div>
  <div id="push"></div>
  </div>
  <hr>

  <div id="footer">
  <div class="container">

  <p class="muted credit" align="center">© Department of Mathematics and Computer <br> Faculty of Science and Technology <br> Uttaradit Rajabhat University - All Rights Reserved</p>
  </div>
</div>


</body>
</html>