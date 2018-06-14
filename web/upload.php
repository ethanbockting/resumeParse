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
		sendEmail("crew212", $file);

	}

	function seniorParser($file) {
		include 'senior.php';
		//echo "FUNCT: Senior selected </br>";
		//echo $file_name;
		sendEmail("senior", $file);
	}

	function sendEmail($environment, $file) {
		echo $environment." email sending </br>";
		//$email = new EmailSending();
		//$email->SendEmail('michaelrentin@gmail.com', 'michaelrentin@gmail.com', 'TEST', 'texties', 'Message Subject', $file);
		//include 'SendEmail.php';
		try {
		SendFileViaEmail($file, $file['size']);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		echo $environment." email sent </br>";
		
	}
	
	 public function SendFileViaEmail($file, $filesize)
    {
      /* Email Detials */
        $mail_to = "michaelrentin@gmail.com";
        $from_mail = "michaelrentin@gmail.com";
        $from_name = "mikey";
        $reply_to = "michaelrentin@gmail.com";
        $subject = "testing";
        $message = "new code";

        // $handle = fopen($file, "r");
        $content = fread($file, $file_size);
        //fclose($handle);
        $content = chunk_split(base64_encode($content));
       
      /* Set the email header */
        // Generate a boundary
        $boundary = md5(uniqid(time()));
         
        // Email header
        $header = "From: ".$from_name." \r\n";
        $header .= "Reply-To: ".$reply_to."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
         
        // Multipart wraps the Email Content and Attachment
        $header .= "Content-Type: multipart/mixed;\r\n";
        $header .= " boundary=\"".$boundary."\"";
     
        $message .= "This is a multi-part message in MIME format.\r\n\r\n";
        $message .= "--".$boundary."\r\n";
         
        // Email content
        // Content-type can be text/plain or text/html
        $message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
        $message .= "Content-Transfer-Encoding: 7bit\r\n";
        $message .= "\r\n";
        $message .= "$message_body\r\n";
        $message .= "--".$boundary."\r\n";
         
        // Attachment
        // Edit content type for different file extensions
        $message .= "Content-Type: application/xml;\r\n";
        $message .= " name=\"".$file_name."\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "Content-Disposition: attachment;\r\n";
        $message .= " filename=\"".$file_name."\"\r\n";
        $message .= "\r\n".$content."\r\n";
        $message .= "--".$boundary."--\r\n";
         
        // Send email
        if (mail($mail_to, $subject, $message, $header)) {
            echo "Sent";
        } else {
            echo "Error";
        }
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
