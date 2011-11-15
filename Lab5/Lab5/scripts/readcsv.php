<?php

session_start();

$user=$_SESSION('user');

$hashed=hash('crc32',$user);
$filepath=("images/$hashed/csv.csv");
$handle=fopen($filepath,'r');
$contents=fread($handle,filesize($filepath));
fclose($handle);
echo $contents;
?>



