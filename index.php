<?php
for($i=1;$i<=100;++$i){

$code ="780001".substr("000000".rand(), -5);
$digit=0;
$strlen=strlen($code);

for( $j= 0; $j < $strlen; $j++ ){ 
       $char = (int) substr( $code, $j, 1 );
       $digit=($digit+$char*(3-2*($j%2)))%10;
}

$digit = (10 - $digit)%10;

$nombre=$code."".$digit;

$bar = imagecreatefrompng('http://barcode.tec-it.com/barcode.ashx?translate-esc=off&data='.$code.'&code=UPCA&unit=px&width=300&height=200&imagetype=png&rotation=0&color=000000&bgcolor=FFFFFF&qunit=px&quiet=0%20alt=Codigo%20de%20barras%20'.$nombre);

$qr = imagecreatefrompng('http://api.qrserver.com/v1/create-qr-code/?data=http://www.supply.cl/token/token.php?token='.$nombre.'&size=165x165');

$bgd = imagecreatefrompng('white.png');

imagealphablending($bgd, false);
imagesavealpha($bgd, true);

imagecopymerge($bgd, $bar, 0, 0, 0, 0, 300, 200, 100);
imagecopymerge($bgd, $qr, 335, 10, 0, 0, 165, 165, 100);

header('Content-Type: image/png');
imagepng($bgd, 'codigos/'.$nombre.".png");
//imagepng($bgd);
}
imagedestroy($bgd);
imagedestroy($bar);
imagedestroy($qr);

?>