<?php
class email{

	function send_email($body)
	{
require_once('./PHPMailer_5.2.4/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.rwandair.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.rwandair.com"; // sets the SMTP server
$mail->Port       = 2525;                    // set the SMTP port for the GMAIL server
$mail->Username   = "olivier.komeza@rwndair.com"; // SMTP account username
$mail->Password   = "STGprod@pass123";        // SMTP account password

$mail->SetFrom('olivier.komeza@rwndair.com', 'First Last');

$mail->AddReplyTo("olivier.komeza@rwndair.com","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "olikom04@gmail.com";
$mail->AddAddress($address, "Komeza Olivier");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    
}
}
$email =new email();
$body="hello";
$email::send_email($body);
?>