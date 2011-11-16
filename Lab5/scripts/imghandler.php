<?php
/*
 * Created on Sep 18, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

session_start();

$usr =$_SESSION['userid'];
$target_path = $usr.'/';
$saved=$target_path;
$target_path = $target_path.basename($_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo $_SESSION['username']," the File "  .basename( $_FILES['uploadedfile']['name']), " is uploaded";
} else{

   echo "There was an error uploading the file, you shall not pass";
}

//header('Location:index.html');


$name="badge.png";
rename($target_path,$saved.$name);

?>

