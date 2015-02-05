<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$data = file_get_contents("skew.txt");
$skew = 0;

$skewArray = array();
$skewArrayPosition = 0;

$skewArray[$skewArrayPosition] = $skew;
$skewArrayPosition++;

// Adding skew points to array

for($i = 0; $i<strlen($data); $i++){

	$nucleotide = substr($data, $i, 1);
	if($nucleotide == 'C'){
		$skew--;
		$skewArray[$skewArrayPosition] = $skew;
	}
	else if($nucleotide == 'G'){
		$skew++;
		$skewArray[$skewArrayPosition] = $skew;
	}else{
		$skewArray[$skewArrayPosition] = $skew;
	}

	$skewArrayPosition++;
	
}

arsort($skewArray);

foreach($skewArray as $skewElement => $skewValue){
	echo $skewElement . ") " . $skewValue . "<br>";
}

// $slope = 0;
// $counter = 0;

// for($k = 0; $k<count($skewArray)-1; $k++){
// 	$slope = ($skewArray[$k+1]-$skewArray[$k])/(($k+1)-$k);
// 	echo $counter . ") " . $slope . "<br>";
// 	$counter++;
// }

?>