<?php

$sqlserver=mysql_connect(' ec2-50-18-11-249.us-west-1.compute.amazonaws.com','wustl_user','wustl_pass');

mysql_select_db('Lab3',$sqlserver);

$userdata=mysql_query(select username,password from users,$sqlserver)

echo "$userdata";

?>


