<?php 
//include 'SendEmail.php';
//include 'senior.php';
//include 'crew212.php';

require_once( './PHPMailer/src/PHPMailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


error_reporting(E_ERROR | E_WARNING | E_PARSE);

if(isset($_FILES['file'])) {
	$file = $_FILES['file'];
	
	if ($file == null) {
		echo "no file";
	}
	
	// File properties
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];

	// Work out the file extension
	$file_ext = explode('.', $file_name);
	$file_ext = strtolower(end($file_ext));

	$allowed = array('txt', 'jpg', 'docx');

	// Functions
	function crew212Parser($file) { //Need to pass in file
		echo $file_name;
		sendEmail("crew212", $file);

	}

	function seniorParser($file) {
		echo $file_name;
		sendEmail("senior", $file);
	}

	function sendEmail($environment, $file) {
		echo $environment." sendEmail called </br>";
		
		echo "SendEmail was called </br>";
		
		$email = new PHPMailer(true);
		$email->SetFrom("testCrew212@gmail.com","Test Name");
		$email->Subject   = "Subject";
		$email->Body      = "Body";
		$email->AddAddress( "testCrew212@gmail.com","Test Name2");
		
		echo "object was created";
		
		try{
			echo "try start";
			$email->Send();
			echo "try end";
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		//$email->AddAttachment( $file , 'resume' );
		if(!$email->Send()) {
			echo 'message was not sent.';
			echo 'Mailer error: '. $mail->ErrorInfo;
		}
		else {
			echo 'Message has been sent.';
		}
		
		//$email = new PHPMailer;
		//echo "line after new object";
		//$email->SendEmail('crew212test@gmail.com', 'crew212test@gmail.com', 'TEST', 'texties', 'Message Subject', $file);
		//echo "line after call function";
	}
	
	// Deal with radio button
	if (isset($_POST['submit'])) {
		if(isset($_POST['radio']))
		{
			if($_POST['radio'] == "Crew212") {
				//echo "IF: Crew212 selected </br>";
				crew212Parser($file);
			}
			elseif($_POST['radio'] == "Senior") {
				//echo "IF: Senior selected </br>";
				seniorParser($file);
			}

			//echo "Selected: ".$_POST['radio']."</br>";  //  Displaying Selected Value
		}
	}
	
	if(in_array($file_ext, $allowed)) {
		if($file_error === 0) {
			if($file_size <= 2097152) {

				echo $file_name_new = $file_name;

				//where the file is headed
				$file_destination = 'documents/' . $file_name_new;

				if(move_uploaded_file($file_tmp, $file_destination)) {
					$file_destination;
				}
				else {
					echo "</br>Not moved";
				}

			}
		    else {
		    	echo "There was a file error";
		    }
		}
	}
	else{
		echo "No File Found";
	}
}
?>
