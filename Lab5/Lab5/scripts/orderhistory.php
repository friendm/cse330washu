<?php



$username="wustl_inst";
$password="wustl_pass";
$database="Lab5";
$formuser= $_POST['reg_user'];
$formpassword= $_POST['reg_pass1'];
$formpassword2= $_POST['reg_pass2'];
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("users",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select orderhist from users where username='$formuser'";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){
$var1=$row['orderhist'];
echo 
}
?>


