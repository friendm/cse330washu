<?php


$username="wustl_inst";
$password="wustl_pass";
$database="calender";

session_start();
$caluser=$_SESSION['userid'];




$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];

$timestamp= mktime(0,0,0,$month,$day,$year);
$string=$_POST['event_string'];

$ostring=explode(':',$string);
$event=$ostring[3];
$time=$ostring[0];
$minutes=$ostring[1];
$tzone=$ostring[2];



$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("$database",$link);
if(!$dbselected){
echo "db not selected! ";
}
$query=" delete from calender_events  where username='$caluser' and twstamp=$timestamp and event='$event' and time=$time and minutes=$minutes and tzone='$tzone'";

$result=mysql_query($query,$link);


if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

else echo  "event was deleted!";
mysql_close($link);

?>

