<?php

function getProtein($nuc){
	if($nuc == 'AAA' || $nuc == 'AAG') return 'K' ;
	else if($nuc == 'AAC' || $nuc == 'AAU') return 'N';
	else if($nuc == 'ACA' || $nuc == 'ACC' || $nuc == 'ACG' || $nuc == 'ACU') return 'T';
	else if($nuc == 'AGA' || $nuc == 'AGG') return 'R';
	else if($nuc == 'AGC' || $nuc == 'AGU') return 'S';
	else if($nuc == 'AUA' || $nuc == 'AUC' || $nuc == 'AUU') return 'I';
	else if($nuc == 'AUG') return 'M';
	else if($nuc == 'CAA' || $nuc == 'CAG') return 'Q';
	else if($nuc == 'CAC' || $nuc == 'CAU') return 'H';
	else if($nuc == 'CCA' || $nuc == 'CCC' || $nuc == 'CCG' || $nuc == 'CCU') return 'P';
	else if($nuc == 'CGA' || $nuc == 'CGC' || $nuc == 'CGG' || $nuc == 'CGU') return 'R';
	else if($nuc == 'CUA' || $nuc == 'CUC' || $nuc == 'CUG' || $nuc == 'CUU' || $nuc == 'UUA' || $nuc == 'UUG') return 'L';
	else if($nuc == 'GAA' || $nuc == 'GAG') return 'E';
	else if($nuc == 'GAC' || $nuc == 'GAU') return 'D';
	else if($nuc == 'GCA' || $nuc == 'GCC' || $nuc == 'GCG' || $nuc == 'GCU') return 'A';
	else if($nuc == 'GGA' || $nuc == 'GGC' || $nuc == 'GGG' || $nuc == 'GGU') return 'G';
	else if($nuc == 'GUA' || $nuc == 'GUC' || $nuc == 'GUG' || $nuc == 'GUU') return 'V';
	else if($nuc == 'UAC' || $nuc == 'UAU') return 'Y';
	else if($nuc == 'UCA' || $nuc == 'UCC' || $nuc == 'UCG' || $nuc == 'UCU') return 'S';
	else if($nuc == 'UGC' || $nuc == 'UGU') return 'C';
	else if($nuc == 'UGG') return 'W';
	else if($nuc == 'UUC' || $nuc == 'UUU') return 'F';
	else if($nuc == 'UGA' || $nuc == 'UAG' || $nuc == 'UAA') return '';
}

function weightOfProtein($peptide){
	$sum = 0;

	for($i = 0; $i<strlen($peptide); $i++){

		$singleProtein = substr($peptide, $i, 1);

		if($singleProtein == 'G') $sum = $sum + 57;
		else if($singleProtein == 'A') $sum = $sum + 71;
		else if($singleProtein == 'S') $sum = $sum + 87;
		else if($singleProtein == 'P') $sum = $sum + 97;
		else if($singleProtein == 'V') $sum = $sum + 99;
		else if($singleProtein == 'T') $sum = $sum + 101;
		else if($singleProtein == 'C') $sum = $sum + 103;
		else if($singleProtein == 'I') $sum = $sum + 113;
		else if($singleProtein == 'L') $sum = $sum + 113;
		else if($singleProtein == 'N') $sum = $sum + 114;
		else if($singleProtein == 'D') $sum = $sum + 115;
		else if($singleProtein == 'K') $sum = $sum + 128;
		else if($singleProtein == 'Q') $sum = $sum + 128;
		else if($singleProtein == 'E') $sum = $sum + 129;
		else if($singleProtein == 'M') $sum = $sum + 131;
		else if($singleProtein == 'H') $sum = $sum + 137;
		else if($singleProtein == 'F') $sum = $sum + 147;
		else if($singleProtein == 'R') $sum = $sum + 156;
		else if($singleProtein == 'Y') $sum = $sum + 163;
		else if($singleProtein == 'W') $sum = $sum + 186;
	}
	
	return $sum;
}

function dnaToRNA($data){

	$finalRNA = "";

	for($i = 0; $i<strlen($data); $i++){

		$dnaNucleotide = substr($data, $i, 1);
		if($dnaNucleotide == 'T') $rnaNucleotide = 'U';
		else $rnaNucleotide = $dnaNucleotide;

		$finalRNA = $finalRNA . "" . $rnaNucleotide;
		
	}

	return $finalRNA;
}

function rnaToDNA($data){

	$finalDNA = "";

	for($i = 0; $i<strlen($data); $i++){

		$rnaNucleotide = substr($data, $i, 1);
		if($rnaNucleotide == 'U') $dnaNucleotide = 'T';
		else $dnaNucleotide = $rnaNucleotide;

		$finalDNA = $finalDNA . "" . $dnaNucleotide;
		
	}

	return $finalDNA;
}

function getRevCompliment($data){
	$halfCompliment = "";

	for($i = 0; $i<strlen($data); $i++){

		$nucleotide = substr($data, $i, 1);

		if($nucleotide == 'A') $halfCompliment  = $halfCompliment.'T';
		if($nucleotide == 'T') $halfCompliment  = $halfCompliment.'A';
		else if($nucleotide == 'C') $halfCompliment  = $halfCompliment.'G';
		else if($nucleotide == 'G') $halfCompliment  = $halfCompliment.'C';
		
	}

	return strrev($halfCompliment);
}


?>