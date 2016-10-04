<?php

require('TCPDF/tcpdf.php');
$n = 2;

$nombre = "agregados/etiquetas_".$n;
$nombrePdf = "imprimibles/etiquetas_imprimible_".$n;
$nombrePdf_d = "etiquetas_imprimible_".$n.'.pdf';

$imgfile = $nombre.'.jpeg';
$pdffile = $nombrePdf.'.pdf';

$pdf = new TCPDF('P','mm',array(560, 710));
$pdf -> setJPEGQuality(75);
$pdf -> Image($imgfile, '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
$pdf -> Output($nombrePdf_d, 'I');

?>

