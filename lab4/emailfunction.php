<?
require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer(); 
$mail->IsSMTP(); // send via SMTP
IsSMTP(); // send via SMTP
$mail->SMTPAuth = true; // turn on SMTP authentication

$webmaster_email=$_POST['usermail'];
$recievermail=$_POST['reciever'];
$content=$_POST['content'];

$mail->Username = "sodium56@gmail.com"; // SMTP username
$mail->Password = "Nonesuch!92589"; // SMTP password
$email=$recievermail; // Recipients email ID
$name="Chosen One"; // Recipient's name
$mail->From = $webmaster_email;
$mail->FromName = "Calenderp";
$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,$_SESSION['username']);
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = $_SESSION['username'] + "itinerary";
$mail->Body = $content; //HTML Body
$mail->AltBody = $content; //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent";
}
?>
