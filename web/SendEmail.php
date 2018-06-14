<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
echo "SendEmail included";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'].'/web/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/web/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/web/PHPMailer/src/SMTP.php';

public class EmailSending()
{
		// these should all be strings my doods
	public function SendEmail($from, $to, $fromName, $body, $subject, $file)
	{
		echo "SendEmail was called </br>";
		$email = new PHPMailer();
		$email->From      = $from;
		$email->FromName  = $fromName;
		$email->Subject   = $subject;
		$email->Body      = $body;
		$email->AddAddress( $to );
		
		//$email->AddAttachment( $file , 'resume' );

		return $email->Send();
		
		if(Send()){ echo "successfully sent email";}
		else { echo "did not send email";}
	}


	public function SendTestEmail()
	{
		// TODO replace with actual email information
		$email = new PHPMailer();
		$email->From      = 'michaelrentin@gmail.com';
		$email->FromName  = 'Your Name';
		$email->Subject   = 'Message Subject';
		$email->Body      = 'texties';
		$email->AddAddress( 'michaelrentin@gmail.com' );

		// replace this with actual document
		$file_to_attach = '/Users/michaelentin/Downloads/test.docx';

		// rename the thing here
		$email->AddAttachment( $file_to_attach , 'picture' );

		return $email->Send();
	}
}



?>
