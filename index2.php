<?php

$n = 2;
$a = 3;
$b = 5;
$dx = 420;
$dy = 200;
$dm = 20;
$dp = 40;

$bgd = imagecreatetruecolor($a*($dx+2*$dm+$dp)+$dp, $b*($dy+2*$dm+$dp)+$dp);
$fill = imagecreatetruecolor( $dx+2*$dm , $dy+2*$dm );

$magenta = imagecolorallocate($bgd, 255, 0, 255);
imagefill($bgd, 0, 0, $magenta);
imagealphablending($bgd, false);
imagesavealpha($bgd, true);

$white = imagecolorallocate($fill, 255, 255, 255);
imagefill($fill, 0, 0, $white);
imagealphablending($fill, false);
imagesavealpha($fill, true);

$nombre = "etiquetas_".$n;
$files = glob('codigos/*.png', GLOB_BRACE);

foreach ($files as $file){
	for($i = 0; $i < $a; ++$i){
		for($j = 0; $j < $b; ++$j){
			if((int)substr($file, 16, 3) == (($n-1)*$a*$b)+$i*$b+$j+1){
				$img = imagecreatefrompng($file);
				imagecopymerge($bgd, $fill, $dp+$i*($dx+2*$dm+$dp), $dp+$j*($dy+2*$dm+$dp), 0, 0, $dx+2*$dm, $dy+2*$dm, 100);
				imagecopymerge($bgd, $img, $dp+$i*($dx+2*$dm+$dp)+$dm, $dp+$j*($dy+2*$dm+$dp)+$dm, 0, 0, $dx, $dy, 100);
			}
		}
	}
}
header('Content-Type: image/png');
//imagepng($bgd, 'imprimibles/'.$nombre.".png");
imagepng($bgd);


imagedestroy($bgd);
imagedestroy($magenta);
imagedestroy($fill);
imagedestroy($img);
imagedestroy($while);



?>

