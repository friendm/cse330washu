<?php


$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
$story_identifier=$_GET['val1'];

session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}


$up=$_SESSION['password'];
$fp=$_POST['password'];
$story_name_field= mysql_real_escape_string($_POST['title']);
$story_content_field=mysql_real_escape_string($_POST['content']);
$story_type=$_POST['type'];
if(strcmp($up,$fp)==0){
$sqlquery="update stories set story_type='$story_type', story_name='$story_name_field',story_content='$story_content_field' where story_identifier=$story_identifier";
$result= mysql_query($sqlquery,$link);


if(!result){

echo $sqlquery;
}

echo "You are a story-editing machine. Go <a href=\"../index.php\">home.</a>";
}
else echo "Woah bro try again <a href=\"../index.php\">!.</a>";
mysql_close($link);
?>
