<?php
session_start();
$file=$_GET['file'];
$finaldir= $_SESSION['username'];
$path= "upload/$finaldir/$file";
/*
	while(is_file($file) == TRUE) {
		//chmod($file, 0666);
		if (unlink($file)){
			echo "File Deleted: $file";
		} else {
			echo "Error Deleting File: $file  ...Bummer bro-ski.";
		}
	}
*/
		//chmod($file, 0666);
		
                if (unlink($path)){
                        echo "File Deleted: $file";
                } else {
                        echo "Error Deleting File: $file  ...Bummer bro-ski.";
                }
?>
