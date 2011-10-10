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

$sqlquery= "select story_identifier,story_type,story_name,story_content from stories";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){

$commentquery= "select comment_name,comment from comments where story_identifier=2";

$commentresult=mysql_query($commentquery,$link);

$row2=mysql_fetch_array($commentresult);


echo ,$row['story_type'],":__",$row['story_name'],":",$row['story_content'], "__",$row2['comment_name'],":",$row2['comment'],"                " ;



}

mysql_close($link);

?>
