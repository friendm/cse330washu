<?php



$username="wustl_inst";
$password="wustl_pass";


session_start();
$formuser=$_SESSION['userid'];

$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("lab5",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select orderhist from users where username='$formuser'";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){
$var1=$row['orderhist'];
echo $var1; 
}
?>


