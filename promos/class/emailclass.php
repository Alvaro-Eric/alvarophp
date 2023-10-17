<?php
class email{

	function send_email($body,$to,$nameto,$subject)
	{
require_once('../class/PHPMailer-master/PHPMailerAutoload.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
//WHEN THROUGH FILE
//$file            = file_get_contents($body);
//$body             = eregi_replace("[\]",'',$file );

$body             = eregi_replace("[\]",'',$body );

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.rwandair.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;  
$mail->SMTPSecure = "tls";// enable SMTP authentication
$mail->Host       = "mail.rwandair.com"; // sets the SMTP server
$mail->Port       = 2525;                    // set the SMTP port for the GMAIL server
$mail->Username   = "exchange.monitor@rwandair.com"; // SMTP account username
$mail->Password   = "EXmon@rdair123";        // SMTP account password
$mail->SMTPDebug = false;
$mail->do_debug = 0;
$mail->SetFrom('exchange.monitor@rwandair.com', 'Rwandair');

$mail->AddReplyTo('exchange.monitor@rwandair.com','Rwandair');

$mail->Subject    = $subject;

//$mail->AltBody    = ""$altbody; // optional, comment out and test

$mail->MsgHTML($body);

$address = $to;
$mail->AddAddress($address, $nameto   );

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

$options = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->smtpConnect($options);
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    
}
}

?>
