<?php

$n = 3;
$a = 2;
$b = 4;
$dx = 420;
$dy = 200;
$dm = 20;
$dp = 40;
$br = 2;

$bgd = imagecreatetruecolor($a*($dx+2*$dm+$dp)+$dp, $b*($dy+2*$dm+$dp)+$dp);
$fill1 = imagecreatetruecolor( $dx+2*$dm , $dy+2*$dm );
$fill2 = imagecreatetruecolor( $dx+2*$dm+2*$br , $dy+2*$dm+2*$br );


$white1 = imagecolorallocate($fill1, 255, 255, 255);
imagefill($fill1, 0, 0, $white1);
imagealphablending($fill1, false);
imagesavealpha($fill1, true);

$magenta = imagecolorallocate($fill2, 255, 0, 255);
imagefill($fill2, 0, 0, $magenta);
imagealphablending($fill2, false);
imagesavealpha($fill2, true);

$white2 = imagecolorallocate($bgd, 255, 255, 255);
imagefill($bgd, 0, 0, $white2);
imagealphablending($bgd, false);
imagesavealpha($bgd, true);

$nombre = "etiquetas_".$n;
$files = glob('codigos/*.png', GLOB_BRACE);

foreach ($files as $file){
	for($i = 0; $i < $a; ++$i){
		for($j = 0; $j < $b; ++$j){
			if((int)substr($file, 16, 3) == (($n-1)*$a*$b)+$i*$b+$j+1){
				$img = imagecreatefrompng($file);
				imagecopymerge($bgd, $fill2, $dp+$i*($dx+2*$dm+$dp)-$br, $dp+$j*($dy+2*$dm+$dp)-$br, 0, 0, $dx+2*$dm+2*$br, $dy+2*$dm+2*$br, 100);
				imagecopymerge($bgd, $fill1, $dp+$i*($dx+2*$dm+$dp), $dp+$j*($dy+2*$dm+$dp), 0, 0, $dx+2*$dm, $dy+2*$dm, 100);
				imagecopymerge($bgd, $img, $dp+$i*($dx+2*$dm+$dp)+$dm, $dp+$j*($dy+2*$dm+$dp)+$dm, 0, 0, $dx, $dy, 100);
			}
		}
	}
}
header('Content-Type: image/png');
$imgfile = 'imprimibles/'.$nombre.'.png';
imagepng($bgd, $imgfile);
//imagepng($bgd);

imagedestroy($bgd);
imagedestroy($magenta);
imagedestroy($fill1);
imagedestroy($fill2);
imagedestroy($img);
imagedestroy($while);



?>

