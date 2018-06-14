<?php
require_once 'bootstrap.php';
echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;
/*$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Keyot Profile - Erin (template).docx');
// Variables on different parts of document
$templateProcessor->setValue('name', 'Erin Oldfield');            // On section/content// On footer
$templateProcessor->setValue('description', ' effective presentations. '); // On header
$templateProcessor->setValue('relatedExp', ' and customers.');
$templateProcessor->setValue('indExp', 'Business Communicators');
//<w:br/> == new line please remember
$templateProcessor->setValue('roles','•	Chief of Staff
<w:br/>•	Account Executive');
$templateProcessor->setValue('tools1', 'White papers');
$templateProcessor->setValue('tools2', 'Consistent messaging');
$templateProcessor->setValue('chronoExp','just a lot of stuff');
 
echo date('H:i:s'), ' Saving the result document...', EOL;
//where the file name goes
$templateProcessor->saveAs('./templateOutput.docx');
//echo getEndingNotes(array('Word2007' => 'docx'), './Sample_07_TemplateCloneRow.docx');
*/
$obj = array(
'name' => array('Test name'),
'description' => array("This is discription", "line 2 of description", "line 3 of description"),
'related experience' => array('i did the thing','and','again'),
'industry experience' => array('this thing ','this other thing','another thing'),
'roles'=> array('r1','r2'),
'tools' => array('t1 ','t2 ','t3 ','t4 ','t5 ','t6'),
'chrono experience' => array('this','this','that','and','the','other')
);
fillSeniorTemplate($obj);



function fillSeniorTemplate($resume){
	$name = implode('',$resume['name']);
	$descrip = implode("<w:br/>",$resume['description']);
	$relatedExp = implode("<w:br/>",$resume['related experience']);
	$indExp = implode("<w:br/>",$resume['industry experience']);
	$roles = implode("<w:br/>", $resume['roles']);
	$tools = $resume['tools'];
	$length = count($tools);
	$tools1 = implode("<w:br/>", array_slice($tools, 0, $length/2));
	$tools2 = implode("<w:br/>", array_slice($tools, $length/2, $length));
	$chronoExp = implode("<w:br/>",$resume['chrono experience']);



	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Keyot Profile - Erin (template).docx');
	// Variables on different parts of document
	$templateProcessor->setValue('name', $name);            // On section/content
	$templateProcessor->setValue('description', $descrip); // On header
	$templateProcessor->setValue('relatedExp', $relatedExp);
	$templateProcessor->setValue('indExp', $indExp);
	//<w:br/> == new line please remember
	$templateProcessor->setValue('roles', $roles);
	$templateProcessor->setValue('tools1', $tools1);
	$templateProcessor->setValue('tools2', $tools2);
	$templateProcessor->setValue('chronoExp',$chronoExp);


	$templateProcessor->saveAs('./'.$name.'.docx');



}


?>