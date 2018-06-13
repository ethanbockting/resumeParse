<html>
<?php echo "hello world"; ?>
<?php echo "hello hello world"; ?>
    <head><meta charset="UTF-8"></head>
    <body>
       <form action="index.php" method="post" enctype="multipart/form-data">
	        Your Photo: <input type="file" name="photo" size="25" />
	        <input type="submit" name="submit" value="Submit" />
        </form>
        <form action="" method="post">
		<input type="radio" name="radio" value="Crew212">Crew212
		<input type="radio" name="radio" value="Senior">Senior
		<input type="submit" name="submit" value="Get Selected Values" />
		</form>
		<?php
		if (isset($_POST['submit'])) {
		if(isset($_POST['radio']))
		{
		echo "You have selected :".$_POST['radio'];  //  Displaying Selected Value
		}
		?>
	<? //if they DID upload a file...
if($_FILES['photo']['name'])
{
	//if no errors...
	if(!$_FILES['photo']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['photo']['tmp_name']); //rename file
		if($_FILES['photo']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$new_file_name);
			$message = 'Congratulations!  Your file was accepted.';
			echo "it worked";
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['photo']['error'];
	}
}?>
    </body>
</html>
