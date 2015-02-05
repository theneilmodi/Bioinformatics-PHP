<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

include_once 'functions.php';

for($strand = 1; $strand<=2; $strand++){
	$data = file_get_contents("peptide-encoding.txt");
	if($strand == 2)$data = getRevCompliment($data);

	$proteinPattern = 'MDSFRTLY';


	$finalRNA = dnaToRNA($data);
	$rnaArray = array();
	$rnaArrayPosition = 0;

	for($frame = 0; $frame<=2; $frame++){
		for($first = $frame; $first<strlen($finalRNA); $first=$first+3){

				$rnaNucleotide = substr($finalRNA, $first, 3);
				$rnaArray[$rnaArrayPosition] = $rnaNucleotide;
				$rnaArrayPosition++;

				for($second = 1; $second<strlen($proteinPattern); $second++){
					$nextRNA = substr($finalRNA, $first+(3*$second) , 3);
					$rnaArray[$rnaArrayPosition] = $nextRNA;
					$rnaArrayPosition++;
				}

					//convert to protein
					$rnaToProtein = "";
					foreach($rnaArray as $rnaArrayElement => $rnaArrayValue){
						$rnaToProtein = $rnaToProtein . "" . getProtein($rnaArrayValue);
					}
						//echo $rnaToProtein . "<br>";

						// if protein matches protein patter print out the original DNA from RNA
						$completeRNA = "";
						if($rnaToProtein == $proteinPattern){
							foreach($rnaArray as $rnaArrayElement2 => $rnaArrayValue2){
								$completeRNA = $completeRNA . "" . rnaToDNA($rnaArrayValue2);
							}
							if($strand == 1) echo rnaToDNA($completeRNA);
							else echo getRevCompliment(rnaToDNA($completeRNA));
							echo " ";
						}

				$rnaArray = array();
				$rnaArrayPosition = 0;
				
		}
	}
}


?>