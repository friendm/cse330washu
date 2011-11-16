<?php
session_start();
$text_name=$_POST['text_name'];
$text_namex=$_POST['text_namex'];
$text_namey=$_POST['text_namey'];




$text_title=$_POST['text_title'];
$text_titlex=$_POST['text_titlex'];
$text_titley=$_POST['text_titley'];

$text_office=$_POST['text_office'];
$text_officex=$_POST['text_officex'];
$text_officey=$_POST['text_officey'];

$text_dept=$_POST['text_dept'];
$text_deptx=$_POST['text_deptx'];
$text_depty=$_POST['text_depty'];

$text_phone=$_POST['text_phone'];
$text_phonex=$_POST['text_phonex'];
$text_phoney=$_POST['text_phoney'];

$text_email=$_POST['text_email'];
$text_emailx=$_POST['text_emailx'];
$text_emaily=$_POST['text_emaily'];

$text_address=$_POST['text_address'];
$text_addressx=$_POST['text_addressx'];
$text_addressy=$_POST['text_addressy'];





$imgx=$_POST['imgx'];
$imgy=$_POST['imgy'];
$imagesrc=imagecreatefrompng("$_SESSION['userid']/badge.png");
//creating image in php
$dest=imagecreate(306,175);
$background=imagecolorallocate($dest,255,255,255);
$textcolor=imagecolorallocate($dest,0,0,0);
imagestring($dest,2,$text_namex,$texty,$text,$textcolor);
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
