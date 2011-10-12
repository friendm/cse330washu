<?php

$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
$formuser=$_POST['reg_user'];
$formpassword=$_POST['reg_pass1'];
$formpassword2=$_POST['reg_pass2'];
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
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

echo " sorry this username: " , $row['username'], " is taken. Go <a href=\"../register.html\">Back</a>";
exit;
}
}

if (strcmp($formpassword, $formpassword2)!=0){
echo "your passwords don't match. Go <a href=\"../register.html\">Back</a> ";
exit;
}

$sqlquery1= "insert into users (username,password,user_type) values ('$formuser','$formpassword','Registered')";

$result=mysql_query($sqlquery1,$link);

if(!$result){
echo "sql query derped hard";
}
echo "Congrats ",$formuser," you are registered. Go <a href=\"../index.php\">home</a>, my child.";


mysql_close($link);
?>

