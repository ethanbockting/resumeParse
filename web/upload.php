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
	}

	function seniorParser() {
		echo "FUNCT: Senior selected </br>";
		echo $file_name;
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
