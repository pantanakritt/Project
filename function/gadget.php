<?
session_start();

require_once("dbo.php");

function call_roomnumber(){

$SQLsyntax = "SELECT DISTINCT(main_table.Room) FROM main_table";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_room'>";
	echo "<input type='hidden' class='roomID' value='".$fetch[Room]."'>";
	echo $fetch[Room];
	echo "</a></li>";

	}
}

function show_day(){

$SQLsyntax = "SELECT DISTINCT(main_table.Day) FROM main_table";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_day'>";
	echo "<input type='hidden' class='dayID' value='".$fetch[Day]."'>";
	echo $fetch[Day];
	echo "</a></li>";

	}
}

function show_group(){
$SQLsyntax = "SELECT DISTINCT(main_table.MajorID),major_table.MajorName FROM main_table INNER JOIN major_table ON main_table.MajorID = major_table.MajorID ORDER BY major_table.MajorID ASC";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_group'>";
	echo $fetch[MajorName]."&nbsp;(".$fetch[MajorID].")";
	echo "<input type='hidden' class='groupID' value='".$fetch[MajorID]."'>";
	echo "</a></li>";

	}
}

function show_teachers(){

	$SQLsyntax = "SELECT DISTINCT(teaassgn_table.TeacherID),teacher_table.TeacherName,teacher_table.TeacherLastname FROM teaassgn_table INNER JOIN teacher_table ON teaassgn_table.TeacherID = teacher_table.TeacherID ORDER BY teacher_table.TeacherID ASC";
$sqlquery = mysql_query($SQLsyntax);
$numrows = mysql_num_rows($sqlquery);

	for ($x=1;$x<=$numrows;$x++){
	$fetch = mysql_fetch_array($sqlquery);
	echo "<li><a tabindex='-1' href='#' class='search_from_teacher'>";
	echo $fetch[TeacherName]."&nbsp;&nbsp;".$fetch[TeacherLastname];
	echo "<input type='hidden' class='teacherID' value='".$fetch[TeacherID]."'>";
	echo "</a></li>";
	}
}

function login(){
	?>
    <div id="Login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">ลงชื่อเข้าสู่ระบบ</h3>
  </div>
  <div class="modal-body">
  
   <div class = "updatelogin"></div>

   <form>
  <fieldset>
    <label>Username</label>
    <input type="text" id="userlogin" placeholder="พิมพ์ชื่อผู้ใช้ของท่าน">
    </label>
    <label>Password</label>
    <input type="password" id="passwordlogin" placeholder="พิมพ์รหัสผ่าน">
     </label>
    
  </fieldset>

  </div>
  <div class="modal-footer">
  	<button class="btn btn-primary loginuser" type="Submit">Log In</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    
  </div>
</div>
</form>
   
    
  

	<?
	}
	
	function chk_login($user,$password){
		$loginquery = mysql_query("SELECT * FROM permission_table WHERE UserName = '$user' && Password = '$password'");
		$nums = mysql_num_rows($loginquery);
		$fetchlogin = mysql_fetch_array($loginquery);
		if($nums >= 1){
			$_SESSION['log_code'] = date("ymdhis");
			$_SESSION['sesid'] = session_id();
			$_SESSION['username'] = $fetchlogin[UserName];
			$_SESSION['password'] = $fetchlogin[Password];
			$_SESSION['SuperUser'] = $fetchlogin[SuperUser];
			$_SESSION['Insert'] = $fetchlogin[Pinsert];
			$_SESSION['Update'] = $fetchlogin[Pupdate];
			$_SESSION['Delete'] = $fetchlogin[Pdelete];
			$_SESSION['StatusID'] = $fetchlogin[StatusID];

			update_log("-->Login ,",get_client_ip(),$_SESSION['username'],"login");
			
			return TRUE;
			}
			else return FALSE;
		}
		
	 function chk_session(){
		if (($_SESSION['sesid']== session_id()) && isset($_SESSION['username'])    &&   isset($_SESSION['password'] )){
			return TRUE;
			}
			else 
			return FALSE;
		}

	function chk_admin(){
		if (($_SESSION['sesid']== session_id()) && isset($_SESSION['username'])    &&   isset($_SESSION['password'] ) && isset($_SESSION['SuperUser'])){
			return TRUE;
			}
			else 
			return FALSE;
	}

	function dis_or_activate_user($user,$IDnum){
		if ($IDnum==1) {
			$IDnum = 0;
			update_log("Change status ".$user." to Disactivate ,",get_client_ip(),$_SESSION['username'],"dis_ac");
		}
			else {
				$IDnum = 1;
				update_log("Change status ".$user." to Activate ,",get_client_ip(),$_SESSION['username'],"dis_ac");
			}

		mysql_query("UPDATE permission_table SET StatusID='$IDnum' WHERE UserName = '$user'");
	}

	function delete_user($del_user){
		require_once("user.php");
		if(chk_admin()){
			update_log("Delete ".$del_user." ,",get_client_ip(),$_SESSION['username'],"del_user");
			mysql_query("UPDATE permission_table SET StatusID = '2' WHERE UserName = '$del_user'");
			
			user_status("1");
		}
		else{
			
			?>
				<script>
				alert("คุณไม่มีสิทธิ์ในการแก้ไขข้อมูล กรุณาติดต่อผู้ดูแลระบบ !!!");
				</script>
			<?
			user_status();

		}

	}

function utf8_fopen_read($fileName) { 
	    $fc = iconv('windows-874', 'utf-8', file_get_contents($fileName)); 
	    $handle=fopen("php://memory", "rw"); 
	    fwrite($handle, $fc); 
	    fseek($handle, 0); 
	    return $handle; 
	} 

function imprt_form(){
	if (isset($_SESSION['tmpcsvname'])){
		$file = utf8_fopen_read("CSV/".$_SESSION['tmpcsvname']);
		echo "<br><br>";
		while (!feof($file)&&(file_exists("CSV/".$_SESSION['tmpcsvname']))) {
		print_r(fgetcsv($file));
		echo "<br>";
		}

		fclose($file);


  		unlink("CSV/".$_SESSION['tmpcsvname']);
  		

		echo "<br><br>";
		echo "This is import function";

		unset($_SESSION['tmpcsvname']);
	}

	else {
		echo "<script src='js/ajax.js'></script>";
		echo "<br><br>";
		echo "คุณยังไม่ได้อัพโหลดไฟล์ใด ๆ กรุณา <a href='#' class='csv_link'>อัพโหลด</a>";
	}
	
}

function get_client_ip() {
     $ipaddress = '';
     if ($_SERVER['HTTP_CLIENT_IP'])
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if($_SERVER['HTTP_X_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if($_SERVER['HTTP_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if($_SERVER['HTTP_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if($_SERVER['REMOTE_ADDR'])
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';

     return $ipaddress; 
}

function update_log($action,$ip,$user,$logcode){
	
	if($logcode=="login"){
		mysql_query("INSERT INTO dblog_table (user,action,ip,log_code) VALUES ('$user','$action','$ip','".$_SESSION['log_code']."')");
	}
	else {
		$log_query = mysql_query("SELECT action FROM dblog_table WHERE log_code = '".$_SESSION['log_code']."'");
		$log_fetch = mysql_fetch_array($log_query);

		$log_fetch[0] .= $action;

		mysql_query("UPDATE dblog_table SET action='$log_fetch[0]' WHERE log_code = '".$_SESSION['log_code']."'");

	}
}
?>