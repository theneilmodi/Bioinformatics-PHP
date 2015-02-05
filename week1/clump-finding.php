<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$k = 9;
$l = 571;
$t = 17;
$finalArray = array();
$finalArrayPosition = 0;

$data = file_get_contents("clump-finding.txt");


for($first = 0; $first<strlen($data); $first++){
	
	$window = substr($data, $first, $l);
	$merArray = array();
	$merArrayPosition = 0;

	for($second = 0; $second<strlen($window); $second++){
		$mer = substr($window, $second, $k);
		$merArray[$merArrayPosition] = $mer;
		$merArrayPosition++;	
	}

	$occurenceArray = (array_count_values($merArray));
	arsort($occurenceArray);

	
		foreach($occurenceArray as $occurenceElement => $occurenceValue){
			if($occurenceValue == $t){
				$finalArray[$finalArrayPosition] = $occurenceElement;
				$finalArrayPosition++;
			}

		}
}

$finalArray = (array_count_values($finalArray));
arsort($finalArray);

foreach($finalArray as $finalElement => $finalValue){
	echo $finalElement . " ";
}

?>