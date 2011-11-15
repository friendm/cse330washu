<?php

$username="wustl_inst";
$password="wustl_pass";
$database="zipcode";

$num_cards= $_POST['cards'];
$card_type= $_POST['type'];
$r_zip=$_POST['zip'];

//set location of the card vendor
$sender=02493;
$lat=0.0;
$long=0.0;

//users lat and longitude retried from sql database stored as global variables
$lat1;
$long1;
session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("lab5",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select latitude,longitude from zipcodes";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}
//sets values of users
while($row=mysql_fetch_array($result)){
$lat1=$row['latitude'];
$long1=$row['longitude'];
}

//calculates the distance between zipcodes using their coordinates
//to figure out shipping costs
function calc_distance($lat,$lat1,$long,$long1)
{
    $radius      = 3958;      // Earth's radius (miles)
    $pi          = 3.1415926;
    $deg_per_rad = 57.29578;  // Number of degrees/radian (for conversion)

    $distance = ($radius * $pi * sqrt(
                ($lat-$lat1)
                * ($lat - $lat1)
                + cos($lat / $deg_per_rad)  // Convert these to
                * cos($lat1 / $deg_per_rad)  // radians for cos()
                * ($long - $long1)
                * ($long - $long1)
        ) / 180);

    return $distance;
}

//calculates price
$price=.5*$num_cards;
if($card_type=="High"){
$price=$price*2;
}
else if ($card_type=="Medium"){
$price=$price*1.5;
}
$price=$price+(.2*calc_distance($lat,$lat1,$long,$long1);
echo $price;
session_start();
//the name of the person ordering
$ordername=$_SESSION['username'];
$orderhistory;
$sqlquery="select orderhist from users where username=$ordername";
$result=mysql_query($sqlquery,$link);
while($row=mysql_fetch_array($result)){
$var1=$row['orderhist'];
$orderhistroy=$var1;
}

$orderhistory=$orderhistory+":"+date('Y-m-d')+":"+$num_cards;

$sqlquery"update users  set orderhist= '$orderhistory'where username='$ordername'";
mysql_close($link);

$_SESSION['price']= $price;
$_SESSION['order_size']=$num_cards;
?>
