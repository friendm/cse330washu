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
    echo " the File "  .basename( $_FILES['uploadedfile']['name']), " is uploaded";
} else{

   echo "There was an error uploading the file, you shall not pass";
}
//echo "$target_path";
//header('Location:index.html');


$name="csv.csv";
rename($target_path,$saved.$name);



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
$terminatedby='\r\n';
$sqlquery= "load data local infile '/home/MJF/.html/Lab5/scripts/$usr/csv.csv into table csvfile fields terminated by ',' lines terminated by $terminatedby";
//$sqlquery= "load data local infile '$usr/csv.csv' into table csvfile fields terminated by ',' lines terminated by $terminatedby";

if(!$result){

echo "sqlderp:$sqlquery";
}

$result=mysql_query($sqlquery,$link);

mysql_close($link);



?>

