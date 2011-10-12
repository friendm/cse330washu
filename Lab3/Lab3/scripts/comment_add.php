<?php

$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";
$identifier=mysql_real_escape_string($_GET['var1']);
session_start();
$temp_usr=$_SESSION['userid'];
$temp_pass=mysql_real_escape_string($_POST['password']);
$temp_name=mysql_real_escape_string($_POST['title']);
$temp_comment=mysql_real_escape_string( $_POST['content']);
$usrpass=$_SESSION['password'];
$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}
$psql="select * from users where username='$temp_usr'";
$presult=mysql_query($psql,$link);
$row=mysql_fetch_array($presult);
$usrpass=$row['password'];

if(strcmp($usrpass,$temp_pass)==0){
$sqlquery= "insert into comments values('$temp_usr','$temp_pass','$identifier','$temp_name','$temp_comment')";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message= $sqlquery;
echo $message;
}else echo "Nice comment. Go <a href=\"../index.php\">home</a>";

}else
echo "Try again Passwords didn't <a href=\"../index.php\">match.</a>";



mysql_close($link);

?>

