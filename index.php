<?php
for($i=121;$i<=120;++$i){

	//$short_code = rand();
	$short_code = $i;
	$code ="780001".substr("000000".$short_code, -5);
	
	$digit=0;
	$strlen=strlen($code);
	
	for( $j= 0; $j < $strlen; $j++ ){ 
		$char = (int) substr( $code, $j, 1 );
		$digit=($digit+$char*(3-2*($j%2)))%10;
		}
		
	$digit = (10 - $digit)%10;
	$nombre=$code."".$digit;
	
	$bar = imagecreatefrompng('http://barcode.tec-it.com/barcode.ashx?translate-esc=off&data='.$code.'&code=UPCA&unit=px&width=300&height=200&imagetype=png&rotation=0&color=000000&bgcolor=FFFFFF&qunit=px&quiet=0%20alt=Codigo%20de%20barras%20'.$nombre);

	$qr = imagecreatefrompng('http://api.qrserver.com/v1/create-qr-code/?data=http://www.supply.cl/token/token.php?token='.$nombre.'&size=110x110');
	
	$bgd = imagecreatetruecolor(420, 200);
	$white = imagecolorallocate($bgd, 255, 255, 255);
	imagefill($bgd, 0, 0, $white);

	imagealphablending($bgd, false);
	imagesavealpha($bgd, true);
	imagecopymerge($bgd, $bar, 0, 0, 0, 0, 300, 200, 100);
	imagecopymerge($bgd, $qr, 310, 65, 0, 0, 110, 110, 100);
	
	$font = 'arial.ttf';
	$black = imagecolorallocate($bgd, 0, 0, 0);
	$font_size = 40;
	$bbox = imagettfbbox($font_size, 0, $font, $i);
	imagealphablending($bgd, true);
	imagettftext($bgd, $font_size, 0, 400 + $bbox[0] - $bbox[2], 50, $black, $font, $i);
	imagettftext($bgd, 15, 90, 300, 150, $black, $font, '® KAF - 2016');
	
	header('Content-Type: image/png');
	imagepng($bgd, 'codigos/'.$nombre.".png");
	//imagepng($bgd);
}

imagedestroy($bgd);
imagedestroy($bar);
imagedestroy($white);
imagedestroy($black);

?>
