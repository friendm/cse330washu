<?php

$username="wustl_inst";
$password="wustl_pass";
$database="lab5";
$card_usr= $_POST['reg_user'];//name of the person the card is for
session_start();
$user=$_SESSION['userid'];

$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}

$dbselected=mysql_select_db("lab5",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select name,title,office,department,phone,email,adress from csvfile where usrname=$user and name=$card_usr";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){
$var1=$row['name'];
$var2=$row['title'];
$var3=$row['office'];
$var4=$row['department'];
$var5=$row['phone'];
$var6=$row['email'];
$var7=$row['adress'];
echo $var1+","+$var2+","+$var3+","+$var4+","+$var5+","+$var6+","+$var7;


}




mysql_close($link);


?>

