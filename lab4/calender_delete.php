<?php


$username="wustl_inst";
$password="wustl_pass";
$database="lab4";
$username=$_SESSION['username'];
$timestamp=$_POST['timestamp'];
$event=$_POST['event'];
$time=$_POST['time'];

session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("$database",$link);
if(!$dbselected){
echo "db not selected! ";
}
$query=" delete from calender_events  where username=$username" and timestampt=$timestamp and event=$event and time=$time  ;

$result=mysql_query($query,$link);


if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

if (!$commentresult){

echo "comment query malformed";
}
else echo  "event was deleted!";
mysql_close($link);

?>

