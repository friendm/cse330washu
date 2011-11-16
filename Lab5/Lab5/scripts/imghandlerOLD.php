<?php
/*
 * Created on Sep 18, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 session_start();
$usr=$_SESSION['userid']; 
$target_path = '../'.$usr.'/';
$filename=($_FILES['uploadedfile']['name']);
//finds the file extension
function findexts($filename) { $filename = strtolower($filename) ; $exts = split("[/\\.]", $filename) ; $n = count($exts)-1; $exts = $exts[$n]; return $exts; }  
//finds extension, names the file badge so it is easy to find
$ext=findexts($filename);
$name="badge";
$target_path="$target_path$name.$ext";


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo $_SESSION['username']," the File "  .basename( $_FILES['uploadedfile']['name']), " is uploaded";
} else{
	 
   echo "There was an error uploading the file, you shall not pass";
}
 
echo $target_path;
echo "<br>"; 
 
 
?>
