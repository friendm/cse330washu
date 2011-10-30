<?php


$username="wustl_inst";
$password="wustl_pass";
$database="calender";
$username=$POST['username'];
$timestamp=$POST['timestamp'];
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db($database,$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select event,time from calender_events where username='$username' and tsstamp ='$timestamp'";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){



$temp_event = $row['event'];
$temp_time = $row['time'];


//print out event titles and times

echo""
}
}
mysql_close($link);

?>
