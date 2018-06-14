<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

//these should all be strings my doods
function SendEmail($from, $to, $fromName, $body, $subject, $file)
{
	$email = new PHPMailer();
	$email->From      = $from;
	$email->FromName  = $fromName;
	$email->Subject   = $subject;
	$email->Body      = $body;
	$email->AddAddress( $to );

	$email->AddAttachment( $file , 'resume' );

	return $email->Send();
}


function SendTestEmail()
{
	// TODO replace with actual email information
	$email = new PHPMailer();
	$email->From      = 'mikeentin@gmail.com';
	$email->FromName  = 'Your Name';
	$email->Subject   = 'Message Subject';
	$email->Body      = 'bazooper';
	$email->AddAddress( 'mikeentin@gmail.com' );

	// replace this with actual document
	$file_to_attach = '/Users/michaelentin/Downloads/test.docx';

	// rename the thing here
	$email->AddAttachment( $file_to_attach , 'picture' );

	return $email->Send();
}

?>