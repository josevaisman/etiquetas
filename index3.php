<?php

require('fpdf181/fpdf.php');
$n = 3;

$nombre = "agregados/etiquetas_".$n;
$nombrePdf = "imprimibles/etiquetas_imprimible_".$n;

$imgfile = $nombre.'.jpeg';
$pdffile = $nombrePdf.'.pdf';

$pdf = new FPDF('P','mm',array(560, 710));
$pdf -> Image($imgfile, null, null, 200, 710);
$pdf -> Output('F', $pdffile);

?>

