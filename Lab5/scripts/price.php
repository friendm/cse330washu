<?php

$username="wustl_inst";
$password="wustl_pass";


$num_cards= $_POST['cards'];
$zip=$_POST['zip'];

//set location of the card vendor
$sender=66203;
$lat=39.015629;
$long=-94.693187;

//users lat and longitude retried from sql database stored as global variables



$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("lab5",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select latitude,longitude from zipcodes where zip=$zip";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}
//sets values of users
$row=mysql_fetch_array($result);
$lat1=$row['latitude'];
$long1=$row['longitude'];




//calculates the distance between zipcodes using their coordinates
//to figure out shipping costs
function  calc_distance($latA,$lat1B,$longC,$long1D){
    $radius      = 3958;      // Earth's radius (miles)
    $pi          = 3.1415926;
    $deg_per_rad = 57.29578;  // Number of degrees/radian (for conversion)

    $distance = ($radius * $pi * sqrt(
                ($latA-$lat1B)
                * ($latA - $lat1B)
                + cos($latA / $deg_per_rad)  // Convert these to
                * cos($lat1B / $deg_per_rad)  // radians for cos()
                * ($longC - $long1D)
                * ($longC - $long1D)
        ) / 180);

    return $distance;
}

//calculates price

$price=0.5*$num_cards;

$price=$price+.02* calc_distance($lat,$lat1,$long,$long1);


echo $price;


session_start();
//the name of the person ordering
$ordername=$_SESSION['userid'];

$sqlquery="select orderhist from users where username='$ordername'";
$result=mysql_query($sqlquery,$link);

if(!$result){
echo "malformed query $sqlquery";
}
$row=mysql_fetch_array($result);
$var1=$row['orderhist'];
$hist_old=$var1;
$date = date('Y-m-d');
$orderhistory="$hist_old:$date:$num_cards";

$sqlquery1="update users set orderhist= '$orderhistory'where username='$ordername'";

$result=mysql_query($sqlquery1,$link);
mysql_close($link);

?>
