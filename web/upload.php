<?php
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

	$allowed = array('txt', 'jpg');

	if(in_array($file_ext, $allowed)) {
		if($file_error === 0) {
			if($file_size <= 2097152) {

				echo $file_name_new = uniqid('', true) . '.' . $file_ext;

				//where the file is headed
				$file_destination = 'uploads/' . $file_name_new;

				if(move_uploaded_file($file_tmp, $file_destination)) {
					echo $file_destination;
				}

			}
		}
	}
	else{
		echo "nope";
	}
}
?>