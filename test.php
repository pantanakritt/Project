<?

$data = "08-1-931-9312";

$spiltdata = explode("-", $data);

foreach ($spiltdata as $v) {
	$spiltdata2 .= $v;
}

echo $spiltdata2;

echo "<br>----------------------------<br><br>";

$string = 'asd.';
if (eregi("^[a-z\*]{1,3}\.", $string)) {
    echo "'$string' contains a 'z' or 'Z'!";
}


?>