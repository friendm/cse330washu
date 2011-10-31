<?php

require_once('phpmailer/PHPMailer_5.2.0/class.phpmailer.php');

//from php mailer explanation


function mailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = 'sodium56@gmail.com';  
	$mail->Password = 'Landfill1137';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);

	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}


$to=$_POST['reciever'];
$from=$_POST['usermail'];
$from_name='Calenderp';
$subject='Calenderp itinerary';
$body1=$_POST['content'];
$bodyarr=explode(".",$body1);
$i=0;
$body;

for($i=0;$i<count($bodyarr);$i++){
$body="$bodyarr[$i]\n$body";
}


mailer($to,$from,$from_name,$subject,$body);
echo "$error";

?>

