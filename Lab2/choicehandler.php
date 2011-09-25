<?php
/*
 * Created on Sep 21, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * this directs you to the correct page based on the button you press.
 * 
 */
session_start(); 
if($_SESSION['verify']){ 
 		
 		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'uploadscreen.html';

 		
 	echo "<a href=\"http://$host$uri/$extra\"> Upload </a> <br>";
 	
 	

 
 
 	
 	$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'filelister.php';
 	echo "<a href=\"http://$host$uri/$extra\"> Download/Delete </a> <br><br>";
 	
	

	
 	echo "<a href=\"logout.php\">Logout</a>";	
} else {
	header('Location: index.html');
}


?>
