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


$user=$_SESSION['username'];
$sqlquery="select username,password,story_identifier,story_type,story_name,story_content from stories where username =$user";
$sqlcomment= "select comment_name,comment from comments where username =$user";
if(!$_SESSION['Admin']){

$sqlquery= "select username,password,story_identifier,story_type,story_name,story_content from stories";

$sqlcomment= "select comment_name,comment from comments";

}

$storyresult=mysql_query($sqlquery,$link);
$commentresult=mysql_query($sqlcomment,$link);

if(!$storyresult){
$message="oh shit story query is malformed!";
echo $message;
}
if(!$commentresult){
echo "oh shit comment query is malformed!";
}
while($row=mysql_fetch_array($storyresult)){
//lists stories
//prints out story name
$identifier=$row['story_identifier'];
$storytype= $row['story_type'];
$storyname= $row['story_name'];

echo $storytype,":",$storyname;
echo "link to delete story  is $identifier";
echo "link to edit story $identifier";
}

while($row2=mysql_fetch_array($commentresult){
$comname=$row2['comment_name'];
$comval=$row2['comment'];
echo $comname,": ", $comval;
echo "link to delete $comname,$comval";
echo "link to edit comment $comname,$comval";
}
mysql_close($link);


?>


