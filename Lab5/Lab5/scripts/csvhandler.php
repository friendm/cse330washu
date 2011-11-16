<?php
/*
 * Created on Sep 18, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 session_start();
$target_path = $_SESSION['userid'].'/';
$save_path = $target_path;
$target_path = $target_path.basename($_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo $_SESSION['username']," the File "  .basename( $_FILES['uploadedfile']['name']), " is uploaded";
} else{

   echo "There was an error uploading the file, you shall not pass";
}


//header('Location:index.html');
echo "<br>";
echo $target_path;
echo "<br>";
echo $_SESSION['userid'];

$name="csv.csv";
rename($target_path,$save_path.$name);


$username="wustl_inst";
$password="wustl_pass";
$database="lab5";


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}

$dbselected=mysql_select_db("lab5",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "load data local infile '/home/MJF/.html/Lab5/scripts/$_SESSION['userid']' into table csvfile fields terminated by ',' lines terminated by '\r\n'";

$result=mysql_query($sqlquery,$link);

mysql_close($link);



?>

