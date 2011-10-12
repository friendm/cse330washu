<?php

$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
$comment_name=mysql_real_escape_string( $_GET['val1']);
$comment=mysql_real_escape_string( $_GET['val2']);
$iden=mysql_real_escape_string($_GET['val3']);
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "delete from comments where comment_name='$comment_name'
 and comment='$comment' and story_identifier='$iden'";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}
else  echo "comment deleted  Go <a href=\"../index.php\">home.</a>";
mysql_close($link);

?>

