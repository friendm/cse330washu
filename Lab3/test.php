<?php

$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
$username1="56gfh";
$password1="friend";
$protected=crypt($username1,$password1);
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
if($protected == crypt($row['username'],$row['password'])){
echo "authentication complete!";
$_session['userid']=$row['username'];
}
}
echo $_session['userid'];
mysql_close($link);

?>
