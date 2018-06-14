<?php
require_once 'bootstrap.php';
echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Template - Crew212 Profile.docx');
// Variables on different parts of document
$templateProcessor->setValue('name', 'Erin Oldfield');            // On section/content
$templateProcessor->setValue('skills', 'Consultant');             // On footer
$templateProcessor->setValue('role', ' effective presentations. '); // On header
$templateProcessor->setValue('description', ' and customers.
');
$templateProcessor->setValue('role2', 'Business Communicators');
//<w:br/> == new line please remember
$templateProcessor->setValue('description2','•	Chief of Staff
<w:br/>•	Account Executive');
$templateProcessor->setValue('role3', 'White papers');
$templateProcessor->setValue('description3', 'Consistent messaging');
$templateProcessor->setValue('degree','just a lot of stuff');

 
echo date('H:i:s'), ' Saving the result document...', EOL;
//where the file name goes
$templateProcessor->saveAs('./templateOutput212.docx');
//echo getEndingNotes(array('Word2007' => 'docx'), './Sample_07_TemplateCloneRow.docx');


$obj = array(
'name' => array('Test Name Crew'),
'skills' => array("This is discription", "line 2 of description", "line 3 of description"),
'role' => array('i did the thing','and','again'),
'description' => array('this thing ','this other thing','another thing'),
'role2'=> array('r1','r2'),
'description2' => array('t1 ','t2 ','t3 ','t4 ','t5 ','t6'),
'role3' => array('this','this','that','and','the','other'),
'description3' => array('this is a thing', 'this is a thing'),
'degree' => array('one long')
);
fillCrewTemplate($obj);

function fillCrewTemplate($resume){
	$name = implode('',$resume['name']);
	$skills = implode("<w:br/>",$resume['skills']);
	$role = implode("",$resume['role']);
	$description = implode("<w:br/>",$resume['description']);
	$role2 = implode("", $resume['role2']);
	$description2 = implode("<w:br/>",$resume['description2']);
	$role3 = implode("",$resume['role3']);
	$description3 = implode("<w:br/>", $resume['description3']);
	$degree = implode("", $resume['degree']);



$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Template - Crew212 Profile.docx');
	// Variables on different parts of document
	$templateProcessor->setValue('name', $name);            // On section/content
	$templateProcessor->setValue('skills', $skills); // On header
	$templateProcessor->setValue('role', $role);
	$templateProcessor->setValue('description', $description);
	//<w:br/> == new line please remember
	$templateProcessor->setValue('role2', $role2);
	$templateProcessor->setValue('description2', $description2);
	$templateProcessor->setValue('role3', $role3);
	$templateProcessor->setValue('description3',$description3);
	$templateProcessor->setValue('degree',$degree);

	$templateProcessor->saveAs('./'.$name.'.docx');



}




?>