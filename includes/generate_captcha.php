<?php

require_once __DIR__ . '/../utility/config.php';

$captchaTextLen = 6;

/** generate random number and store in session */
$config = [];

$config['min_len']            = $captchaTextLen;
$config['max_len']            = $captchaTextLen;
$config['make_alpha_numeric'] = TRUE;

$randomnr                     = createRandomChars($config);
$_SESSION['captcha']          = hash('sha512', sha1(md5((string) $randomnr)));


/** Init variables  */
$imageWidth  = 200;
$imageHeight = 60;
$font        = realpath('../assets/fonts/typography/ubuntu/regular/webfont.ttf');
$fontSize    = 25;
$minAngle    = -3;
$maxAngle    = 3;
$angle       = random_int($minAngle, $maxAngle);


/** generate image*/
$im     = imagecreatetruecolor($imageWidth, $imageHeight);

/** colors:  */
$white  = imagecolorallocate($im, 244, 244, 244);
$grey   = imagecolorallocate($im, 128, 128, 128);
$black  = imagecolorallocate($im, 0, 0, 0);

imagefilledrectangle($im, 0, 0, $imageWidth, $imageHeight, $white);

/**  Write text on image */


/**  center text in image */
$textBox    = imagettfbbox($fontSize, ($angle+15), $font, (string) $randomnr);

$textWidth  = $textBox[2] - $textBox[0];
$textHeight = $textBox[3] - $textBox[1];


/**  $ix = ($imageWidth/2) - (($textWidth/2) + 7); */
$ix = 20;
$iy = ($imageHeight/2) - (($textHeight/2) + 7) + 14;

/** draw text && create image: */
for ($i=0; $i < strlen((string) $randomnr); $i++) { 
    
  $angle = random_int($minAngle, $maxAngle);
  $x     = $ix + ($ix * $i+2);
  $y     = $iy + $angle;

  imagettftext($im, $fontSize, 2, $x, $y, $grey, $font, (string) $randomnr[$i]);
  imagettftext($im, $fontSize, $angle, ($x-6), ($y-5), $black, $font, (string) $randomnr[$i]);

}

/**  avoid browser caching */
header('Expires: Wed, 1 Jan 1997 00:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

/** send image to browser */
header ("Content-type: image/jpeg");
imagejpeg($im);
imagedestroy($im);
exit();

?>