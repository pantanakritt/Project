<?

$data = "08-1-931-9312";

$spiltdata = explode("-", $data);

foreach ($spiltdata as $v) {
	$spiltdata2 .= $v;
}

echo $spiltdata2;

?>