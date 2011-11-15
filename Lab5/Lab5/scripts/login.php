<?php

$username="wustl_inst";
$password="wustl_pass";
$database="Lab5";
$username1=mysql_real_escape_string($_POST['user']);
$password1=mysql_real_escape_string($_POST['pass']);
$protected=crypt($username1,$password1);
session_start();
//connects to the mysql server
$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}

//selects database
$dbselected=mysql_select_db("users",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select username,password from users";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}
//checks user exists against current users and verifies data
while($row=mysql_fetch_array($result)){
if($protected == crypt($row['username'],$row['password'])){
echo "authentication complete! ";
$_SESSION['userid']=$row['username'];
$_SESSION['password']=$row['password'];
$_SESSION['verified']=true;

echo $_SESSION['userid'],"  you are logged in!";

}
}

if(!$_SESSION['verified']){
echo "sorry your login didn't work";

}

mysql_close($link);

?>
