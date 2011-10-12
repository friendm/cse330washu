<?php

$sql_username="wustl_inst";
$sql_password="wustl_pass";
$sql_db= "Lab3";
$sqlserver=mysql_connect($sql_location,$sql_username,$sql_password);

@mysql_select_db('Lab3',$sq$sql_dbr);
  
  
$query="select * from users";
$userdata=mysql_query($query,$sqlserver);

echo $userdata;

?>


