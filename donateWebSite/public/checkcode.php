<?php

use Session;
//session_start();


$im = @imagecreate (60, 20) ;

$background_clolr = imagecolorallocate ($im, 227, 215, 205);

$text_clolr = imagecolorallocate ($im, 7, 84, 3);

$checkcode = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

imagestring ($im, 5, 10, 3, $checkcode, $text_clolr);

header ("Content-type: image/png");

imagepng ($im);

imagedestroy ($im);


Seession::put('$checkcode1',$checkcode);
//session()->put('checkcode',$checkcode);
//$_SESSION['checkcode1'] = $checkcode;
//echo $_SESSION['checkcode1'];
//$_SESSION['checkcode'] = $checkcode;
//session()->save(); // 手動寫入

//dump($_SESSION['checkcode']);
//$content = ob_get_clean();

// output 'bar', 'bar'

//return $content;

?>
