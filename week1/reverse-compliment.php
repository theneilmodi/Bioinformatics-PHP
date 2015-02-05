<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$data = file_get_contents("reverse-compliment.txt");
$halfCompliment = "";

for($i = 0; $i<strlen($data); $i++){

	$nucleotide = substr($data, $i, 1);

	if($nucleotide == 'A') $halfCompliment  = $halfCompliment.'T';
	if($nucleotide == 'T') $halfCompliment  = $halfCompliment.'A';
	else if($nucleotide == 'C') $halfCompliment  = $halfCompliment.'G';
	else if($nucleotide == 'G') $halfCompliment  = $halfCompliment.'C';
	
}

echo strrev($halfCompliment);


?>