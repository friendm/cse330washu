<?php
$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";

session_start();
$verify=$_SESSION['verified'];

if(!$verify){
echo "You can't post a story unless you are a user! <a href=\"../index.php\">home.</a>";
}
if($verify){
$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}
$temp_user=$_SESSION['userid'];
$temp_password=$_POST['password'];
$temp_story_type= $_POST['type'] ;
$temp_story_name=mysql_real_escape_string($_POST['title']);
$temp_story_content=mysql_real_escape_string($_POST['content']);
$sqlquery= "insert into stories (username,password,story_type,story_name,story_content)values ('$temp_user','$temp_password','$temp_story_type','$temp_story_name','$temp_story_content')";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message,":",$sqlquery;
}
else echo "$temp_user your story has been submitted. Go <a href=\"../index.php\">home.</a>";
mysql_close($link);
}
?>

 
