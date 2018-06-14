<?php
function IsASynonym($word, $filename)
{
	$lines = file($filename, FILE_IGNORE_NEW_LINES) or die("Could not open file!");

	foreach ($lines as &$line) {
		$line = strtolower($line);

		$word = strtolower($word);

		if ($word === $line)
		{
			return true;
		}

		//echo $line . "\n";
	}

	return false;
}

if (IsASynonym("skills & certificationS", "./documents/Skills.txt")) 
{
	echo "skills syn returned true\n";
}
else
{
	echo "skills syn returned false\n";
}

if (IsASynonym("WoRk Experience", "./documents/WorkExperience.txt")) 
{
	echo "experience syn returned true\n";
}
else
{
	echo "experience syn returned false\n";
}

# fclose($myfile);

?>