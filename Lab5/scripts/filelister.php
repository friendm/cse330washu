

<?php
/*
 * Created on Sep 19, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */ //this script reads out the names of the files in a directory and then gives the user options of
 //what to do with the files

session_start();

if($_SESSION['verify']){
$username=$_POST['username'];

echo " <html>
        <body>
        <form method=\"post\" action=\"fileactionfire.php\">";



 
$filepath='images/'.$username.'/';


echo "<html> <body> <form method=\"POST\">";
 
$i=1;
$direct=opendir($filepath);

while(FALSE !==  ($file=readdir($direct))){ // from php doc online
if (!($file == "." || $file == "..")){ //simple check to avoid listing "." and ".."


echo " <br> <input  type= \"text\" value= \"$file\" name=\"file$i\" />
	<a href=\"deletefile.php?file=$file\"> DELETE  </a>
     
    <a href=\"downloader.php?value=$file\"> DOWNLOAD </a>
    </br>";
}
$i++;
}

echo "</form></body></html>";
}

else header('Location:index.html');

?>
 
