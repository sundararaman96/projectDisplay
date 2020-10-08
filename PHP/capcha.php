<?php
session_start();
$captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
$captcha_num = substr(str_shuffle($captcha_num), 0, 6);
$_SESSION['code'] = $captcha_num;

$font_size = 20;
$img_width = 120;
$img_height = 40;


header('Content-type: image/jpeg');

$image = imagecreate($img_width, $img_height); 
imagecolorallocate($image, 255, 255, 255); 
$text_color = imagecolorallocate($image, 0, 0, 0);

imagettftext($image, $font_size, 0, 15, 30, $text_color, 'Montserrat-Regular.ttf', $captcha_num);
imagejpeg($image);



?>