<?php
$username="wustl_inst";
$password="wustl_pass";
$database="calender";

session_start();
$verify=$_SESSION['verified'];

if(!$verify){
echo "You can't post a story unless you are a user! <a href=\"../index.php\">home.</a>";
}
if($verify){
$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("$database",$link);
if(!$dbselected){
echo "db not selected! ";
}
$temp_user=$_SESSION['userid'];
$temp_password=$_POST['password'];
$temp_timestamp= $_POST['time'] ;
$temp_events=mysql_real_escape_string($_POST['event']);
$temp_time=mysql_real_escape_string($_POST['eventtime']);
$sqlquery= "insert into calender_events (username,password,timestamp,event,time)values ('$temp_user','$temp_password','$temp_timestamp','$temp_events','$temp_time')";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo "your password was incorrect please try  <a href=\"../newstory.html\">again.</a>";

}
else echo "$temp_user your event  has been submitted.";
mysql_close($link);
}
?>

 
