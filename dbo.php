<?php
$host = "127.0.0.1";
$user = "root";
$pass = "1234";
$dbname = "project";

function dbconnect (){
	$objConnect = mysql_connect($host,$user,$pass);
if($objConnect) mysql_select_db ($dbname);
else echo "Database Connect Failed.";
	};
	
function dbclose (){
		mysql_close();
		};

?>