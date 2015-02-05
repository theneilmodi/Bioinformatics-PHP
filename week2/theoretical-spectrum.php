<html>
<head>
   <style>
   @import url('style.css');
   </style>
</head>
</html>

<?php

include_once 'functions.php';

$data = file_get_contents("theoretical-spectrum.txt");
$peptideArray = array();
$peptideArrayPosition = 0;
$evaluation = true;


for($pick = 1; $pick<strlen($data); $pick++){
   for($pos = 0; $pos<strlen($data); $pos++){
      if((strlen($data)-$pos) >= $pick) $evaluation = true;
      else $evaluation = false;

      if($evaluation == true){
         $peptide = substr($data, $pos, $pick);
         // Remove comment for linear peptide processing
         // $peptideArray[$peptideArrayPosition] = $peptide;
         // $peptideArrayPosition++;
      }else{
         $peptide = substr($data, $pos, $pick);
         $peptide = $peptide . "" . substr($data, 0, $pick-(strlen($data)-$pos));
      }
      $peptideArray[$peptideArrayPosition] = $peptide;
      $peptideArrayPosition++;
   }
}

$peptideArray[$peptideArrayPosition] = $data;

$weightArray = array();
$weightArrayPosition = 0;

foreach($peptideArray as $peptideElement => $peptideValue){
   //echo $peptideValue . "<br>";
   $weightArray[$weightArrayPosition] = weightOfProtein($peptideValue);
   $weightArrayPosition++;
}



echo "0 ";
sort($weightArray);
foreach($weightArray as $weightElement => $weightValue){
   echo $weightValue . " ";
}

?>