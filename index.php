<?
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<title>ระบบตารางเรียนตารางสอนออนไลน์</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
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
        min-height: 89%;
        height: auto !important;
        height: 89%;
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

      .scroll{
        width: 250px;
        height: 200px;
        overflow: scroll;
      }

      code {
        font-size: 80%;
      }

    </style>
</head>
<?php


require ("function/day.php");
require ("function/dbo.php");


?>
<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ajax.js"> </script>
<div id="wrap">

<div class="container-fluid">
	<div class="row-fluid">
    	<div class="span12" >
<?
require_once("function/gadget.php");
require_once("function/user.php");
login();
?>
				<div class="navbar navbar-fixed-top">
 <div class="navbar-inner">
    <a class="brand" href="./index.php">&nbsp;&nbsp;&nbsp;ระบบตารางเรียนตารางสอนออนไลน์</a>
    <ul class="nav">
    
                
      <li><a href="./index.php">หน้าหลัก</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
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
    				<ul class="dropdown-menu scroll">
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
      <li>
        <a tabindex="-1" href="#">แสดงคำสั่งผู้สอน</a>
       </li>
      
    </ul>
    <? if(chk_session()){ ?>
    
    <ul class="nav pull-right">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
    ส่วนจัดการระบบ
			<b class="caret"></b>
			</a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li class="dropdown-submenu"><a tabindex="-1" href="#">จัดการข้อมูลหลัก</a>
    				<ul class="dropdown-menu">
                    <? if($_SESSION['SuperUser']||$_SESSION['Pinsert']){ ?>
                        <li><a tabindex="-1"  href="#" class="list_views">เรียกดูข้อมูลตารางสอนทั้งหมด(list view)</a></li> 
                        <li><a tabindex="-1" href="#" class="add_teach">เพิ่มข้อมูลตารางสอน</a></li>

                        <? } ?>
                    <? if($_SESSION['SuperUser']||$_SESSION['Insert']) { ?> 
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">การจัดการไฟล์(csv)</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" class="csv_link" href="#">Import ข้อมูลจากไฟล์(csv)</a></li>
                            <li><a tabindex="-1" class="sss" href="#">ส่วนจัดการไฟล์ import</a></li>
                            <li><a tabindex="-1" class="csv_clear" href="#">ยกเลิกการนำเข้า(csv)</a>
                            <? if($_SESSION['SuperUser']) {?><li><a tabindex="-1" class="csv_clear_cache" href="#">ล้างข้อมูลใน temp cache</a> <?}?>
                          </ul>
                        </li>
                        <? } ?>
                    <? if($_SESSION['Update']||$_SESSION['SuperUser']) { ?> <li><a tabindex="-1"  href="#">แก้ไขข้อมูลตารางสอน</a></li> 
                        <? } ?>
                    <? if($_SESSION['Delete']||$_SESSION['SuperUser']) { ?> <li><a tabindex="-1"  href="#">ลบข้อมูลตารางสอน</a></li>
                        <? } ?>
                    </ul>
    	   </li>
         <? if ($_SESSION['SuperUser']) {?> <li class="dropdown-submenu">
              <a tabindex="-1" href="#">ส่วนจัดการสำหรับผู้ดูแลระบบ</a>
                <ul class="dropdown-menu">
                  <li><a tabindex='-1' class='add_user' href="#">เพิ่มผู้ใช้งาน</a></li>
                  <li><a tabindex='-1' class='search_ulink' href="#">ค้นหาผู้ใช้งาน</a></li>
                  <li ><a tabindex='-1' class='status_user' href="#">สถานะผู้ใช้งาน</a></li>
                  <li ><a tabindex='-1' class='view_log' href="#">ข้อมูลการใช้งานระบบ</a></li>
                </ul>
           
           </li>
           <? } ?>
           <li>
           		<a tabindex="-1" class = 'edit_profile' href="#">แก้ไขข้อมูลส่วนตัว<input type='hidden' class='statname' value='<?=$_SESSION['username']?>'></a>
           
           </li>
          
           <li>
           		<a tabindex="-1" href="function/logout.php"><i class="icon-off"></i>&nbsp;&nbsp;ออกจากระบบ</a>
           
           </li>
           </ul>
    </li>
    </ul>
    
    <p class="navbar-text pull-right">Loged in as : <?=$_SESSION['username']?>&nbsp;&nbsp;&nbsp;</p>
    <? } 
	else {
	?>
	
    <p class="navbar-text pull-right"><a href="#Login" class="navbar-link" data-toggle="modal"">เข้าสู่ระบบ</a>&nbsp;&nbsp;&nbsp;</p>
    <? } ?>
    <p class="divider-vertical pull-right"></p>
    
    
  </div>
</div>

				</div>
			</div>
			
	</div>
  <div class="row-fluid">
    <div class="span1">
      <!-- LEFT SIDE -->
    </div>
    <div class="span10 updates" >
    
    <?
      if ($_GET['imprt_func']=="set_imprt") {
        echo "<div align='center'>".imprt_form()."</div>";
      }
      else echo "<div align='center'>".c_byday('MON')."</div>";
	  
	  
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