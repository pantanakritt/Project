<?
if($_GET['test']==1){ ?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<form action="test.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?
function utf8_fopen_read($fileName) { 
    $fc = iconv('windows-874', 'utf-8', file_get_contents($fileName)); 
    $handle=fopen("php://memory", "rw"); 
    fwrite($handle, $fc); 
    fseek($handle, 0); 
    return $handle; 
} 
//---------------------------------------------------------------------------------------------------

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . round(($_FILES["file"]["size"] / 1024),2) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  //---------------------------------------------------------------------------------------------------

  //move_uploaded_file($_FILES["file"]["tmp_name"], "CSV/".$_FILES['file']['name']);
  move_uploaded_file($_FILES["file"]["tmp_name"], "CSV/tempCSV.csv");


$file = utf8_fopen_read("CSV/tempCSV.csv"); 
 
	echo "<br>";
	while (!feof($file)&&(file_exists("CSV/tempCSV.csv"))){
	print_r(fgetcsv($file));
}

	fclose($file);


  unlink("CSV/tempCSV.csv");
  }
}

else {

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

function testtime(){

  echo date("ymdhis");
}

function testlog(){
require_once("function/dbo.php");

$qry = mysql_query("SELECT action FROM dblog_table");
$fetch = mysql_fetch_array($qry);

echo $fetch[0];

}
$str1 = "ฟasdฟหกฟห69";


//echo "a".$str1."a<br>";
echo $str1;
echo "<br>";
for ($str2 = 0 ; $str2 <= 100 ; $str2++){
if (strrpos($str1, $str2)){
  echo "TRUE<br>";
  $str2 = 200;

}
 else {
  echo "FALSE<br>";
 }



}
   
   //while (!ereg("^[0-9]", $str1)) {
 //    $str1 = ereg_replace("^.", '', $str1);
 //  }

   





$subject = "abc 10";
$pattern = '/([1-9][0-9])|[1-9]{1}/';
preg_match($pattern, $subject, $matches);
print_r($matches);
}

?>