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

?>