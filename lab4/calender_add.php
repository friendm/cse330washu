<?php
$username="wustl_inst";
$password="wustl_pass";
$database="calender";

session_start();
$verify=$_SESSION['verified'];

if(!$verify){
echo "You can't post an event unless you are a user!";
}
if($verify){
$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db($database,$link);
if(!$dbselected){
echo "db not selected! ";
}
$temp_user=$_SESSION['userid'];
$temp_password=$_SESSION['password'];
$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];

$temp_timestamp= mktime(0,0,0,$month,$day,$year);
$temp_events=mysql_real_escape_string($_POST['event']);
$temp_time=mysql_real_escape_string($_POST['eventtime']);
$temp_min=$_POST['minutes'];
$temp_timezone=$_POST['tzone'];
$sqlquery= "insert into calender_events (username,password,twstamp,event,time,minutes,tzone)values ('$temp_user','$temp_password','$temp_timestamp','$temp_events',$temp_time,$temp_min,'$temp_timezone')";


$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo "$message";

}
else echo "$temp_user your event  has been submitted.";
mysql_close($link);
}

?>

 
