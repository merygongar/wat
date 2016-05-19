<?php
 	setlocale(LC_ALL, 'es_ES.utf8');

function sendEmail($email, $name, $lastname, $company, $link) {
	date_default_timezone_set('Etc/UTC');
	require_once('PHPMailerAutoload.php');
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "wordannotationtool@gmail.com";
	$mail->Password = "(wat2016)";
	$mail->setFrom('wordannotationtool@gmail.com', 'Word Annotation Tool- WAT');
	$mail->addAddress($email, $name.' '.$lastname);
	$mail->isHTML(true);

	$mail->Subject = '[WAT] Registration Confirmation';

	$body = $body.' ';
	$body = 'Hello '.$name.' '.$lastname.', <br/><br/>';

        $body = $body."We have received a registration request for Word Annnotation Tool of this email address.<br/><br/>"."Here are the details:<br/>  Name: $name<br/>  Last Name: $lastname<br/>  Company: $company<br/>  Email: $email<br/><br/>If this is correct, please click on the next link to finish the registration process:<br/><br/><a href=\"$link\">$link</a>";
	
	$body = $body.' <br/>';
	$body = $body.'<span>   </span><br/>';
	$body = $body.'Thank you.<br/><br/>';
		
	$mail->Body = $body;		
	if (!$mail->send()) {
		//    echo "Mailer Error: " . $mail->ErrorInfo;
		return false;
	} else {
		//    echo "Message sent!";
		return true;
	}
}
?>
