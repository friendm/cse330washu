<?php
/*
 * Created on Sep 17, 2011
 * this is the more advanced 
 * calculator with a template
 * 
 */
 function multiply($x,$y){
 	return ($x*$y);
 	
 }
 function add($x,$y){
 	return ($x+$y);
 }

function divide($x,$y){
	return ($x/$y);
} 

function subtract ($x,$y){
	return($x-$y);
}

$firstvar =$_POST['firstinteger'];
$secondvar =$_POST['secondinteger'];


	$selected_radio = $_POST['group1'];
	if($selected_radio == '+'){
		echo 'result is ', add($firstvar,$secondvar);
		
	}
		elseif($selected_radio == '-'){
		echo 'result is ' ,subtract($firstvar,$secondvar);
		
	}
		elseif($selected_radio == '/'){
		echo 'result is ',divide($firstvar,$secondvar);
		
	}
		elseif($selected_radio == '*'){
		echo 'result is ' , multiply($firstvar,$secondvar);
		
	}
	


?>
