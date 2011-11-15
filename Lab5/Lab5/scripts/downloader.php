<?php

/*
$file=$_GET['value'];
$name = $_SESSION["username"];
$path="upload/$name/$file";
$finfo = finfo(FILEINFO_MIME, "/usr/share/misc/magic" ; // return mime type ala mimetype extension
if (!$finfo) {
 	echo "Opening fileinfo database failed";
}

$mime=mime_content_type($finfo, $path);
*/
/*
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
$file=$_GET['value'];
$name=$_SESSION['username'];
$path = "upload/$name/$file";

    $mime= finfo_file($finfo, $path) . "\n";
	echo "$mime";
finfo_close($finfo);



    
    header('Content-type:'. $mime);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename= '.basename($file));
    readfile($file);

*/

session_start();

$file=$_GET['value'];
$name = $_SESSION["username"];
$path="images/$name/$file";

$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
if (!$finfo) {
 	echo "Opening fileinfo database failed";
}

$mime=finfo_file($finfo, $path);
finfo_close($finfo);

header('content-type:'. $mime);
header("Content-Disposition: attachment; filename=$file");
readfile($path);    
?>








?>
