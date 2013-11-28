<?
session_start();

require_once("schedule.php");
require_once("dbo.php");
require_once("gadget.php");
//------------------------------------------------------------------------------------------------------------------------------------------------
function es_time($a_time){
	//$a_time = 'A'.$a_time;
	$a_timenum = strlen($a_time);
	echo ord($a_time[0])."---";
	echo ord($a_time[1]);
	for($xt=0;$xt<$a_timenum;$xt++){
		if ((ord($a_time[$xt])>=48)&&(ord($a_time[$xt])<=57)){

			$a_send .= $a_time[$xt];
		}
	}
	return $a_send;
}
//------------------------------------------------------------------------------------------------------------------------------------------------
function spilt_time ($char,$choice){
	//$char = trim($char);
	$day_explod = explode('-', $char);

	$end_t = $day_explod[1];
	$day_explod[0] = trim($day_explod[0]);

	if(stristr($day_explod[0], 'จ')){
		$start_t = ereg_replace('จ','',$day_explod[0]);
		$day_t = "MON";
	}
		else if(stristr($day_explod[0], 'อ')) {
			$start_t = ereg_replace('อ','',$day_explod[0]);
			$day_t = "TUE";
		}
			else if(stristr($day_explod[0], 'พ')) {
				$start_t = ereg_replace('พ','',$day_explod[0]);
				$day_t = "WED";
			}
				else if(stristr($day_explod[0],'ฤ')) {
						$start_t = ereg_replace('ฤ','',$day_explod[0]);
						$day_t = "THU";
				}
					else if(stristr($day_explod[0], 'ศ')) {
							$start_t = ereg_replace('ศ','',$day_explod[0]);
							$day_t = "FRI";
					}
						else if(stristr($day_explod[0], 'ส')) {
								$start_t = ereg_replace('ส','',$day_explod[0]);
								$day_t = "SAT";
						}
							else if(stristr($day_explod[0], "อา")) {
									$start_t = ereg_replace('อา','',$day_explod[0]);
									$day_t = "SUN";
							}
	else {
			$start_t = "NUL";
			$day_t = "NUL";
	}	

	if($choice=="DAY"){
		return $day_t;
	}
	else if ($choice == "STRT") {
		$send_st = es_time($start_t);
		return $start_t;
	}
	else if ($choice == "ETRT"){
		$send_ed = es_time($end_t);
		return $send_ed;
	}
	else {
		return "INVALID !!";
	}
}
//----------------------------------------------------------------------------------------------------------------------------
function teacher_name($name){
	$title_spilt_t = explode('.',$name);
	for ($x11=0;$x11<=count($title_spilt_t)-2;$x11++){
		$titlename_t.= $title_spilt_t[$x11].".";
	}
	$name_spilt_t = explode(' ',$title_spilt_t[count($title_spilt_t)-1]);
	for ($x22=0;$x22<=count($name_spilt_t)-1;$x22++){
		if ($x22 == 0){
			$first_name_t = $name_spilt_t[$x22];
		}
		else if ($x22 == (count($name_spilt_t)-1)){
			$last_name_t = $name_spilt_t[$x22];
		}
		else {
			$first_name_t.= " ".$name_spilt_t[$x22];
		}
	}

	$t_name = $titlename_t.",".$first_name_t.",".$last_name_t;
	return $t_name;
	
}
//------------------------------------------------------------------------------------------------------------------------------------------------

	if($_POST[type_view]=="clear_csv"){

		@unlink("../CSV/".$_SESSION['tmpcsvname']);
		unset($_SESSION['tmpcsvname']);
		mysql_query("DELETE FROM temp_schedule_table WHERE user ='".$_SESSION['username']."'");
		mysql_query("UPDATE permission_table SET CSVname = '' WHERE UserName = '".$_SESSION['username']."'");
		$_GET['type_view'] = "csv_form";
		$_POST['type_view'] = "csv_form";
		cvsform_upload();

	}
//------------------------------------------------------------------------------------------------------------------------------------------------
	else if($_POST[type_view]=="csv_ok"){
		$num_tmp = mysql_num_rows(mysql_query("SELECT * FROM temp_schedule_table WHERE user = '".$_SESSION['username']."'"));
		//if($num_tmp<1){
			if (file_exists("../CSV/".$_SESSION['tmpcsvname'])){
				$file_location = "../CSV/".$_SESSION['tmpcsvname'];
			}
				else if (file_exists("CSV/".$_SESSION['tmpcsvname'])){
					$file_location = "CSV/".$_SESSION['tmpcsvname'];
				}

			if(file_exists($file_location)){
				
				$file = utf8_fopen_read($file_location);
				mysql_query("BEGIN");
				while (!feof($file)) {

					$num_arry+= 1;
					if($num_arry==1 || $num_arry == 2){
						$csv_arry = fgetcsv($file);
					}
					else {
						$csv_arry = fgetcsv($file);

						$name_arry = explode(',',teacher_name($csv_arry[7]));

						$ed_t = spilt_time($csv_arry[4],"STRT");
						$query1 = "INSERT INTO temp_schedule_table ";
						$query2 = "(user,std_type,course_code,course_name,section,day,time_start,time_end,room,major_code,titlename,first_name,last_name) ";
						$query3 = "VALUES ";
						$query4 = "('".$_SESSION['username']."','".$csv_arry[0]."','".$csv_arry[1]."','".$csv_arry[2]."','".$csv_arry[3]."','".spilt_time($csv_arry[4],"DAY");
						$query5 = "','".$ed_t[2]."','".spilt_time($csv_arry[4],"ETRT")."','".$csv_arry[5]."','".$csv_arry[6]."','".$name_arry[0]."','".$name_arry[1]."','".$name_arry[2]."')";

						$fin_query = $query1.$query2.$query3.$query4.$query5;

						$mysql_obj = mysql_query($fin_query);
						//echo $fin_query."<br><br>x".ereg_replace(" ", '',spilt_time($csv_arry[4],"STRT"))." --- ".spilt_time($csv_arry[4],"ETRT")."<br><br>";

						if($mysql_obj){
							$aaaa = spilt_time($csv_arry[4],"STRT");
							echo "-X-".ord($aaaa[0])."&&".ord($aaaa[1])."-X-".strlen($aaaa)."--X--".$aaaa."<br>";
						}
						else{
						//	fclose($file);
						echo "Error in LINE : ";
						echo $num_arry-2;
						echo "<br>";
						//mysql_query("ROLLBACK");
						$obj_err = "ERROR";
						}
					}
				}

				if($obj_err == "ERROR") {
					mysql_query("ROLLBACK");
					$obj_err = '';
				}
				else {
					mysql_query("COMMIT");
				}
				fclose($file);
			}
		//}
		//else {
			//echo "<script>alert('คุณได้ทำการ อัพโหลดไฟล์ CVS แล้วกรุณาตรวจสอบ');window.location.href='../Project/index.php'</script>";
		//}
	}

		
	//----------------------------------------------------------------------------------------------------------------
		else if($_POST[type_view]=="csv_clear_cache"){
			$obj_cache = mysql_query("SELECT * FROM temp_schedule_table");
			$num_cache = mysql_num_rows($obj_cache);
			mysql_query("TRUNCATE TABLE temp_schedule_table");
			for ($x111=0;$x111<$num_cache;$x111++){
				$cache_fetch = mysql_fetch_array($obj_cache);
					$obj_cache_query = "INSERT INTO temp_schedule_table ";
					$obj_cache_query .= "(user,std_type,course_code,course_name,section,day,time_start,time_end,room,major_code,titlename,first_name,last_name) ";
					$obj_cache_query .= "VALUES ";
					$obj_cache_query .= "('".$cache_fetch[user]."','".$cache_fetch[std_type]."','".$cache_fetch[course_code]."','";
					$obj_cache_query .= $cache_fetch[course_name]."','".$cache_fetch[section]."','".$cache_fetch[day];
					$obj_cache_query .= "','".$cache_fetch[time_start]."','".$cache_fetch[time_end]."','".$cache_fetch[room]."','";
					$obj_cache_query .= $cache_fetch[major_code]."','".$cache_fetch[titlename]."','".$cache_fetch[first_name]."','".$cache_fetch[last_name]."')";

					mysql_query($obj_cache_query);

			}
			
			cvsform_upload();
	}
//------------------------------------ Invalid Option -------------------------------------------------------------------------------
else {

		echo "<div align='center'><font size='5'>Invalid Option !!</font></div>";
	}

?>