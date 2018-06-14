<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if(isset($_FILES['file'])) {
	$file = $_FILES['file'];
	
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
		include 'crew212.php';
		//echo "FUNCT: Crew212 selected </br>";
		//echo $file_name;
		sendEmail("crew212");

	}

	function seniorParser($file) {
		include 'senior.php';
		//echo "FUNCT: Senior selected </br>";
		//echo $file_name;
		sendEmail("senior");
	}

	function sendEmail($environment) {
		echo $environment." email sent";
		//$filename = $file_name;

		    $mailto = 'ethanbockting123@gmail.com';
		    $subject = 'Cool Stuff';
		    $message = 'Mor cool stufSUP and STUFF';

		    //$content = file_get_contents($file);
		    //$content = chunk_split(base64_encode($content));

		    // a random hash will be necessary to send mixed content
		    $separator = md5(time());

		    // carriage return type (RFC)
		    $eol = "\r\n";

		    // main header (multipart mandatory)
		    $headers = "From: name <test@test.com>" . $eol;
		    $headers .= "MIME-Version: 1.0" . $eol;
		    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
		    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
		    $headers .= "This is a MIME encoded message." . $eol;

		    // message
		    $body = "--" . $separator . $eol;
		    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
		    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
		    $body .= $message . $eol;

		    // attachment
		    /*$body .= "--" . $separator . $eol;
		    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
		    $body .= "Content-Transfer-Encoding: base64" . $eol;
		    $body .= "Content-Disposition: attachment" . $eol;
		    $body .= $content . $eol;
		    $body .= "--" . $separator . "--";*/

		    //SEND Mail
		    if (mail($mailto, $subject, /*$body,*/ $headers)) {
			echo "mail send ... OK"; // or use booleans here
		    } else {
			echo "mail send ... ERROR!";
			print_r( error_get_last() );
		    }
	}
	
	// Deal with radio button
	if (isset($_POST['submit'])) {
		if(isset($_POST['radio']))
		{
			if($_POST['radio'] == "Crew212") {
				//echo "IF: Crew212 selected </br>";
				crew212Parser();
			}
			elseif($_POST['radio'] == "Senior") {
				//echo "IF: Senior selected </br>";
				seniorParser();
			}

			//echo "Selected: ".$_POST['radio']."</br>";  //  Displaying Selected Value
		}
	}
	
	if(in_array($file_ext, $allowed)) {
		if($file_error === 0) {
			if($file_size <= 2097152) {

				echo $file_name_new = uniqid('', true) . '.' . $file_ext;

				//where the file is headed
				$file_destination = 'uploads/' . $file_name_new;

				if(move_uploaded_file($file_tmp, $file_destination)) {
					$file_destination;
				}
				else {
					echo "</br>Not moved";
				}

			}
		}
	}
	else{
		echo "No File Found";
	}
}
?>
