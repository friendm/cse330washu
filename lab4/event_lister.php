<?php
$username="wustl_inst";
$password="wustl_pass";
$database="calender";
$month=$_POST["month"];
$year=$_POST["year"];
$date=$_POST["date"];
$timestamp=mktime(0,0,0,$month,$date,$year);
session_start();
$calUser=$_SESSION['userid'];

$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}

$dbselected=mysql_select_db($database,$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select event,time,minutes,tzone from calender_events where username='$calUser' and twstamp=$timestamp";


$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}
$i=0;
while($row=mysql_fetch_array($result)){
$temp_event = $row['event'];
$temp_time = $row['time'];
$temp_minutes = $row['minutes'];
$temp_timezone=$row['tzone'];
if ($temp_minutes==0){
$temp_minutes="00";
}else if ($temp_minutes==1){
$temp_minutes="01";
}else if ($temp_minutes==2){
$temp_minutes="02";
}else if ($temp_minutes==3){
$temp_minutes="03";
}else if ($temp_minutes==4){
$temp_minutes="04";
}else if ($temp_minutes==5){
$temp_minutes="05";
}else if ($temp_minutes==6){
$temp_minutes="06";
}else if ($temp_minutes==7){
$temp_minutes="07";
}else if ($temp_minutes==8){
$temp_minutes="08";
}else if ($temp_minutes==9){
$temp_minutes="09";
}

//print out event titles and times
echo "<div class=\"event\" id=\"event$i\">$temp_time:$temp_minutes:$temp_timezone:$temp_event.</div><br />";
$i++;
}

mysql_close($link);

?>
