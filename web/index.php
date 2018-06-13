<html>
<?php echo "hello world"; ?>
<?php echo "hello hello world"; ?>
    <head><meta charset="UTF-8"></head>
    <body>
        <form action="index.php" method="post">
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
			}
		?>
    </body>
</html>
