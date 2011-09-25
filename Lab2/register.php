<?php

$username=$_POST['RegUser'];
$passwrd=$_POST['RegPass'];
$newdata="$username.$passwrd.";//new data to register user
$path="upload/$username";

if(is_dir($path)){
echo "username is taken, please try another";
}
else {
$myfile="users.txt";
 $fo=fopen($myfile,"a");
fwrite($fo,$newdata);//add data to register user
fclose($fo);
mkdir("$path",0755);
echo "Registration successful. Redirecting to Login Screen...";
sleep(2);
header('Location: index.html');
}

?>
