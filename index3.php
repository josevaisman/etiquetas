<?php

$n = 4;

$nombre = "agregados/etiquetas_".$n;
$nombrePdf = "etiquetas_imprimible_".$n;

$imgfile = $nombre.'.jpeg';
$imgfileNeg = $nombre.'2.jpeg';

$im = imagecreatefromjpeg($imgfile);
$a = 100;
$b = 150;
$c = Round(255-(255-$b)*255/(255-$a));

imagefilter($im, IMG_FILTER_COLORIZE, 255-$c, 255-$c, 255-$c);
imagefilter($im, IMG_FILTER_NEGATE);
imagefilter($im, IMG_FILTER_COLORIZE, 255-$a, 255-$a, 255-$a);
imagefilter($im, IMG_FILTER_NEGATE);

imagejpeg($im, $imgfileNeg, 100);
imagedestroy($im);
?>