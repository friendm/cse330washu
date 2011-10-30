<?php

$username="wustl_inst";
$password="wustl_pass";
$database="calender";
$username1=mysql_real_escape_string($_POST['user']);
$password1=mysql_real_escape_string($_POST['pass']);
$protected=crypt($username1,$password1);
session_start();

$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select username,password,user_type from users";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){
if($protected == crypt($row['username'],$row['password'])){
echo "authentication complete! ";
$_SESSION['userid']=$row['username'];
$_SESSION['password']=$row['password'];
$_SESSION['verified']=true;
if(strcmp($row['user_type'],'Admin')==0){
$_SESSION['Admin']=true;
}
echo $_SESSION['userid'],"  you are logged in!";
echo "<br><a href=\"../index.php\">Go to your calender!</a>";

}
}

if(!$_SESSION['verified']){
echo "sorry your login didn't work";

echo "<br><a href=\"../index.php\">Go to news.</a>";
}

mysql_close($link);

?>
