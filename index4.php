<?php

require('TCPDF/tcpdf.php');
$n = 3;

$nombre = "agregados/etiquetas_".$n;
$nombrePdf = "imprimibles/etiquetas_imprimible_".$n;

$imgfile = $nombre.'.jpeg';
$pdffile = $nombrePdf.'.pdf';

$pdf = new TCPDF('P','mm',array(560, 710));
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('José Vaisman');
$pdf->SetTitle('Codigos de Inventario');
$pdf->setPrintHeader(false);
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->AddPage();
$pdf->setJPEGQuality(100);
$pdf->Image($imgfile, 0, 0, 560, '', 'JPEG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->ImageSVG($file='marco.svg', $x=15, $y=30, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
//$pdf->Output($pdffile, 'F');
$pdf->Output($pdffile, 'I');

?>

