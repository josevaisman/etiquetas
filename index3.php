<?php

require('fpdf181/fpdf.php');
$n = 4;

$nombre = "agregados/etiquetas_".$n;
$nombrePdf = "imprimibles/etiquetas_imprimible_".$n;

$imgfile = $nombre.'.jpeg';
$pdffile = $nombrePdf.'.pdf';

//$pdf = new FPDF('P', 'cm', array(71, 56));
$pdf = new FPDF('L','mm',array(710, 560));
//$pdf -> Image($imgfile);
$pdf -> Output('F', $pdffile);

?>

