<?
session_start();
require_once("dbo.php");

//--------------------------------------------------------------------------------- function Part ----------------------------------------------------------------
	function cvsform_upload(){
		if($_SESSION['tmpcsvname']=="null"||$_SESSION['tmpcsvname']==""){
			if ($_GET['func']!=1){
				echo "<br><br>";
				echo "<div align='center'><form action='function/schedule.php?type_view=".$_POST['type_view']."&func=1' method='post' enctype='multipart/form-data'>";
				echo "<label for='file'>ชื่อไฟล์(csv)&nbsp;: </label>";
				echo "<input type='file' name='file' id='file'><br>";
				echo "<input type='submit' name='submit' value='ยืนยัน'>";
				echo "</form></div>";
			}
			else {
				if ($_FILES["file"]["error"] > 0){
				  echo "Error: " . $_FILES["file"]["error"] . "<br>";
				  $_GET['func'] = 1;
				  ?>
				  <script> 
								window.location.href='../index.php?imprt_func=set_imprt';
				  		</script>
				  		<?
				}
				else {
					
				  	if ($_FILES["file"]["type"]== "application/vnd.ms-excel") {
				  		
						//echo "<div align='center'>Upload: " . $_FILES["file"]["name"] . "<br>";
						//echo "Type: " . $_FILES["file"]["type"] . "<br>";
						//echo "Size: " . round(($_FILES["file"]["size"] / 1024),2) . " kB<br>";
						//echo "Stored in: " . $_FILES["file"]["tmp_name"]."</div>";
						//---------------------------------------------------------------------------------------------------

						//move_uploaded_file($_FILES["file"]["tmp_name"], "CSV/".$_FILES['file']['name']);
						$_SESSION['tmpcsvname'] = "tempCSV_".date("Y_m_d_H_i_s").".csv";
						move_uploaded_file($_FILES["file"]["tmp_name"], "../CSV/".$_SESSION['tmpcsvname']);
						$_GET['func'] = 1;
						require_once("gadget.php");
						update_log("Import CSV file to server name ".$_SESSION['tmpcsvname']."<br>",get_client_ip(),$_SESSION['username'],"ImportCSV");
						mysql_query("UPDATE permission_table SET CSVname = '".$_SESSION['tmpcsvname']."' WHERE UserName = '".$_SESSION['username']."'");
						
						?>
						<script> 
								window.location.href='../index.php?imprt_func=set_imprt';
								

				  		</script>
				  		<?

				  		
					}
						else {
							$_GET['func'] = 1;
							echo "<script> alert('ไฟล์ไม่ถูกต้องกรุณา ตรวจสอบไฟล์ต้นฉบับ'); window.location.href='../index.php'; </script>";

						}
				}
			}
		}
		else {
			require_once("gadget.php");
			imprt_form();
		}
	}

	function import_table(){
		
	}

//---------------------------------------- route part ----------------------------------------------------------------------

if($_POST['type_view']=="csv_form"||$_GET['type_view']=="csv_form") {

	cvsform_upload();
	

}

	
?>
