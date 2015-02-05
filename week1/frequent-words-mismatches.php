<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$data = file_get_contents("frequent-words-mismatches.txt");
$k = 8;
$difference = 3;
$incorrect = 0;


function permutations($arr,$n)
{
     $res = array();

     foreach ($arr as $w)
     {
           if ($n==1) $res[] = $w;
           else
           {
                 $perms = permutations($arr,$n-1);

                 foreach ($perms as $p)
                 {
                      $res[] = $w." ".$p;
                 } 
           }
     }

     return $res;
}

// Your array
$words = array('A','G','C','T');
// Get permutation by groups of 3 elements
$pe = permutations($words,$k);
// Print all possibilities
// foreach($pe as $peElement => $peValue){
// 	echo $peElement . " : " . $peValue . "<br>";
// }

for($first = 0; $first<count($pe); $first++){
	$pattern = $pe[$first];

	for($second = 0; $second<strlen($data); $second++){

		$mer = substr($data, $second, strlen($pattern));
	
		for($third = 0; $third<strlen($pattern); $third++){
			if(!((substr($pattern, $third, 1)) == (substr($mer, $third, 1)))) $incorrect++;
		}

		if($incorrect <= $difference) echo $pattern . "<br>";
		$incorrect = 0;
	}
}


?>