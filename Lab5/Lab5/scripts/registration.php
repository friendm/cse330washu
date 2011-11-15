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

$sqlquery= "select username,password from users";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){
$var1=$row['username'];
if($var1== $formuser){

echo " sorry this username: " , $row['username'], " is taken.";
exit;
}
}

if (strcmp($formpassword, $formpassword2)!=0){
echo "your passwords don't match.";
exit;
}

$sqlquery1= "insert into users (username,password) values ('$formuser','$formpassword')";

$result=mysql_query($sqlquery1,$link);

if(!$result){
echo "sql query derped hard";
}
echo "Congrats ",$formuser," you are registered.";


mysql_close($link);
$folder=$formuser;
$path="$folder";
mkdir($path);
$path2="$folder/cards";
mkdir($path2);

mysql_close($link);

?>

