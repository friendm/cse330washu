<?php
session_start();
$text=$_POST['text'];
$textx=$_POST['textx'];
$texty=$_POST['texty'];
$imgx=$_POST['imgx'];
$imgy=$_POST['imgy'];
$imagesrc=imagecreatefromgif("/images/$_SESSION['username']/badge.gif");
//creating image in php
$dest=imagecreate(500,500);
$background=imagecolorallocate($dest,255,255,255);
$textcolor=imagecolorallocate($dest,0,0,0);
imagestring($dest,2,$textx,$texy,$text,$textcolor);
imagecopy($dest,$imagesrc,$imgx,$imgy,80,80);

//output image header
header('Content-Type: image/gif');
// determines filename
$i=1;
$filename="/images/$_SESSION['username']/card$i.gif";

while(file_exists($filename)){
$i=$i+1;
$filename="/images/$_SESSION['username']/card$i.gif";

if(file_exists($filename)!=true){
return $filename;
break;
}
}
//save image to file
imagegif($dest,$filename);

// destroy image ad free up memory
imagedestroy($dest);
