<html>
<head>
   <style>
   @import url('style.css');
   </style>
</head>
</html>


<?php

ini_set('max_execution_time', 600);

$text = file_get_contents("cyclopeptide.txt");
$delim = ' \n\t,.!?:;';

$tok = strtok($text, $delim);

$numberArray = array();
$numberArrayPosition = 0;

$importantArray = array();
$importantArrayPosition = 0;

while ($tok !== false) {
	
	if($tok>0){
		$numberArray[$numberArrayPosition++] = $tok;	
	}

	if($tok>0 && $tok<=186){
		
		$importantArray[$importantArrayPosition++] = $tok; 
	}
	
	$tok = strtok($delim);  		
}

$fixedLength = count($importantArray);

// $importantArray = array_unique($importantArray);
// $numberArray = array_unique($numberArray);


// foreach($numberArray as $numberElement => $numberValue){
//    echo $numberValue . " "; 
// }

// echo "<br><br>";

// foreach($importantArray as $importantElement => $importantValue){
//    echo $importantValue . " "; 
// }

$tempArray = array();
$tempArrayPosition = 0;

for($top = 1; $top<$fixedLength; $top++){
	for($first = 0; $first<count($importantArray); $first++){
		$constantPeptide = $importantArray[$first];

		for($second = 0; $second<count($numberArray); $second++){
			$addedProtein = $numberArray[$second];

			$newSubPeptide = $constantPeptide . " " . $addedProtein;
			$delim = ' \n\t,.!?:;';
			$subPeptide = strtok($newSubPeptide, $delim);

			$internalArray = array();
			$internalArrayPos = 0;

			$wholeSum = 0;
			while ($subPeptide !== false) {
				$wholeSum = $wholeSum + $subPeptide;
				$internalArray[$internalArrayPos++] = $subPeptide;
				$subPeptide = strtok($delim);
			}

			$lastTwoSum = 0;

			for($i = count($internalArray)-1; $i>=count($internalArray)-2; $i--){
					$lastTwoSum = $lastTwoSum + $internalArray[$i];
			}

			$internalArray = array();
			$internalArrayPos = 0;

			if((in_array($lastTwoSum, $numberArray)) && (in_array($wholeSum, $numberArray))){
				$tempArray[$tempArrayPosition++] = $newSubPeptide;
			}

		}
	}

	$importantArray = $tempArray;
	$tempArray = array();
	$tempArrayPosition = 0;
}

$importantArray = (array_count_values($importantArray));
arsort($importantArray);

foreach($importantArray as $importantElement => $importantValue){

   echo $importantValue . " : " . $importantElement . "<br>"; 

}



?>