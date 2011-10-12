<?php
$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}













?>

