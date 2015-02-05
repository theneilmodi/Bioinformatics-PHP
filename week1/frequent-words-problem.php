<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$data = file_get_contents("frequent-words-problem.txt");


$typeOfMer = 10;
$merArray = array();
$merArrayPosition = 0;

// Putting the k-mers in a array
for($i = 0; $i<strlen($data); $i++){

	$mer = substr($data, $i, $typeOfMer);
	$merArray[$merArrayPosition] = $mer;
	$merArrayPosition++;
}

//Arranging the k-mer array by occurence
$occurenceArray = (array_count_values($merArray));
arsort($occurenceArray);

// Printing occurence array
foreach($occurenceArray as $occurenceElement => $occurenceValue){
	echo $occurenceElement . " : " . $occurenceValue . "<br>";
}


?>