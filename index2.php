<?php

$n = 1;
$a = 4;
$b = 9;
$dx = 420;
$dy = 200;
$dm = 20;
$dp = 40;
$br = 2;

$bgd = imagecreatetruecolor($a*($dx+2*$dm+$dp)+$dp, $b*($dy+2*$dm+$dp)+$dp);

$while = imagecolorallocate($bgd, 255, 255, 255);
imagefill($bgd, 0, 0, $while);
imagealphablending($bgd, false);
imagesavealpha($bgd, true);

$nombre = "agregados/etiquetas_".$n;
$files = glob('codigos/*.png', GLOB_BRACE);

foreach ($files as $file){
	for($i = 0; $i < $a; ++$i){
		for($j = 0; $j < $b; ++$j){
			if((int)substr($file, 16, 3) == (($n-1)*$a*$b)+$i*$b+$j+1){
				$img = imagecreatefrompng($file);
				imagecopymerge($bgd, $img, $dp+$i*($dx+2*$dm+$dp)+$dm, $dp+$j*($dy+2*$dm+$dp)+$dm, 0, 0, $dx, $dy, 100);
			}
		}
	}
}

header('Content-Type: image/jpeg');
$imgfile = $nombre.'.jpeg';
imagejpeg($bgd, $imgfile);

imagedestroy($bgd);
imagedestroy($img);
imagedestroy($while);



?>

