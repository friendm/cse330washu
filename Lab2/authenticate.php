

<?php
/*
 * Created on Sep 18, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 session_start();
 
 $myfile="users.txt";
 $fopen=fopen($myfile,'r');
 $filedata=fread($fopen,filesize($myfile));
 
 $information=explode(".",$filedata);// create an array from the data delimited by a "."
 
 $size= count($information);//figuring out size

 for($j=0;$j<$size;$j+= 2){
 	$k=$j;
 if(strcmp($_POST['username'],$information[$j]) == 0 and strcmp($_POST['password'],$information[$k+=1]) == 0)

 	{  
 $_SESSION['username']=$_POST['username'];
 $_SESSION ['password']=$_POST['password'];
 $_SESSION['verify']=True;
 	
header('Location:choicehandler.php');
 		return;
 	}
 }
header('Location:index.html');


?>
