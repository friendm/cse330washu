<?php


$username="wustl_inst";
$sqlpassword="wustl_pass";
$database="Lab3";
$Ocomment_name=$_GET['val1'];
$Ocomment=$_GET['val2'];
$iden=$_GET['val3'];
$Ncomment_name=$_POST['new_title'];
$Ncomment=$_POST['new_content'];
$upassword=$_POST['password'];
$Ncomment_name=mysql_real_escape_string($Ncomment_name);
$Ncomment=mysql_real_escape_string($Ncomment);

session_start();

$drp=$_SESSION['password'];

$link=mysql_connect('localhost',$username,$sqlpassword);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}




$story_name_field= $_POST['title'];
$story_content_field=$_POST['content'];
$story_type=$_POST['type'];



if(strcmp($drp,$upassword)==0){
$sqlquery="update comments set comment_name='$Ncomment_name', comment='$Ncomment' where story_identifier=$iden and comment_name='$Ocomment_name' and comment='$Ocomment'";
$result= mysql_query($sqlquery,$link);


if(!result){

echo $sqlquery;
}

echo  "You are a story-editing machine. Go <a href=\"../index.php\">home.</a>";
}
else echo " Password did not match go back and try again  Go <a href=\"../index.php\">home.</a>";
mysql_close($link);
?>
