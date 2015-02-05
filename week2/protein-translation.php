<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

include_once 'getProtein.php';

$data = file_get_contents("protein-translation.txt");
$finalProtein = "";

for($i = 0; $i<strlen($data); $i=$i+3){

	$codon = substr($data, $i, 3);
	$returnedProtein = getProtein($codon);
	$finalProtein = $finalProtein . "" . $returnedProtein;
}

echo $finalProtein;

?>
