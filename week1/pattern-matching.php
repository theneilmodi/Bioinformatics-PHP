<html>
<head>
	<style>
	@import url('style.css');
	</style>
</head>
</html>

<?php

$data = file_get_contents("pattern-matching.txt");

$search = "CTTGATCAT";

$lengthOfMer = strlen($search);

for($i = 0; $i<strlen($data); $i++){

	$kmer = substr($data, $i, $lengthOfMer);
	
	if($kmer == $search){
		echo $i . " ";
	}
}

?>