<html>
<?php echo "hello world"; ?>
<?php echo "hello hello world"; ?>
    <head><meta charset="UTF-8"></head>
    <body>
       <form action="accept-file.php" method="post" enctype="multipart/form-data">
	        Your Photo: <input type="file" name="photo" size="25" />
	        <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>
