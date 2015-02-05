<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$data = file_get_contents("approximate-pattern.txt");
$pattern = 'ACCCGTGGAT';
$d = 6;
$incorrect = 0;

for($i = 0; $i<strlen($data); $i++){

	$mer = substr($data, $i, strlen($pattern));
	
	for($k = 0; $k<strlen($pattern); $k++){
		if(!((substr($pattern, $k, 1)) == (substr($mer, $k, 1)))) $incorrect++;
	}
	if($incorrect <= $d) echo $i . " ";
	$incorrect = 0;
}

?>