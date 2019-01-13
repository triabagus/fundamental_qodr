<?php
session_start();
$captha= rand(1000000,9999999);
// membuat gambar dengan menentukan ukuran
$_SESSION["captha"]= $captha;
$gbr = imagecreatetruecolor(500, 50);
//warna background captcha
$background = imagecolorallocate($gbr, 99, 99, 99);
$color 		= imagecolorallocate($gbr, 255, 255, 255);
imagefill($gbr,0,0,$background);
imagestring($gbr, 10, 220, 10, $captha, $color);
//untuk membuat gambar 
header("Cache-control: no-cache,must-revalidate");
header("Content-type: image/png");
imagepng($gbr); 
imagedestroy($gbr);
?>