<?

session_start()
//source phpmailer tutorial
require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer(); 
$mail->IsSMTP(); // send via SMTP
IsSMTP(); // send via SMTP
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure='ssl';
$mail->Host='smtp.gmail.com';
mail->Port=465;
$webmaster_email=$_POST['usermail'];
$recievermail=$_POST['reciever'];
$content=" Your total was:"+$_SESSION['price']+"and you ordered:"+$_SESSION['num_cards'];

$mail->Username = "sodium56@gmail.com"; // SMTP username
$mail->Password = "Landfill1137"; // SMTP password
$email=$recievermail; // Recipients email ID
$name=$_SESSION['username']; // Recipient's name
$mail->From = $webmaster_email;
$mail->FromName = "CardsbyJay";
$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,$_SESSION['username']);
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject =" $_SESSION['username']-Your Buisiness Cards";
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
