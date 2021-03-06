<?php

require('TCPDF/tcpdf.php');


$n = 4;
$a = 4;
$b = 9;
$dx = 420;
$dy = 200;
$dm = 20;
$dp = 40;
$br = 2;

//$bgd = imagecreatetruecolor($a*($dx+2*$dm+$dp)+$dp, $b*($dy+2*$dm+$dp)+$dp);

$nombre = "agregados/etiquetas_".$n;
$nombrePdf = "etiquetas_imprimible_".$n;

$imgfile = $nombre.'.jpeg';
$imgfileNeg = $nombre.'2.jpeg';
$pdffile = $nombrePdf.'.pdf';

$pdf = new TCPDF('P','mm',array(560, 710));
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jos� Vaisman');
$pdf->SetTitle('Codigos de Inventario');
$pdf->setPrintHeader(false);
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(TRUE, -10);
$pdf->AddPage();
$pdf->setJPEGQuality(100);

$pdf->Image($imgfileNeg, 0, 0, 560, '', 'JPEG', '', '', true, 150, '', false, false, 0, false, false, false);
//$pdf->Image($imgfile, 0, 0, 560, '', 'JPEG', '', '', true, 150, '', false, false, 0, false, false, false);

for($j = 0; $j < $b; ++$j){
	for($i = 0; $i < $a; ++$i){
		$x = ($dp+$i*($dx+2*$dm+$dp))/($a*($dx+2*$dm+$dp)+$dp) * 560;
		$y = ($dp+$j*($dy+2*$dm+$dp))/($a*($dx+2*$dm+$dp)+$dp) * 560;		
		$pdf->SetXY(0, 0);
		$pdf->ImageSVG($file='marco.svg', $x, $y, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
	}
}
//$pdf->Output($pdffile, 'F');
$pdf->Output($pdffile, 'I');

?>

