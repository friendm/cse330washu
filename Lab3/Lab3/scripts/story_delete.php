<?php


$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
$identifier=mysql_real_escape_string($_GET['value1']);
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}
$commentquery=" delete from comments where story_identifier=$identifier";
$sqlquery= "delete from stories where story_identifier=$identifier";
$commentresult=mysql_query($commentquery,$link);
$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

if (!$commentresult){

echo "comment query malformed";
}
else echo  "story was deleted!   Go <a href=\"../index.php\">home.</a>";
mysql_close($link);

?>

