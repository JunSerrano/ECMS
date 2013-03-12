<?php 
	require_once '../class/editor.php';	$editor = new editor();
	$field = $_POST['data1'];
	$value = $_POST['data2'];
	$campaignid = $_POST['data3'];
	$isnew = $_POST['data4'];
	
	if($isnew == 'true'){
		foreach($field as $index=>$name){
			$editor->insertEditorContent(stripslashes(str_replace(PHP_EOL, '', $value[$index])), $campaignid, $name);		
		}
		echo 'save data';
	} else {
		foreach($field as $index=>$name){
			$editor->updateEditorContent(stripslashes(str_replace(PHP_EOL, '', $value[$index])), $campaignid, $name);		
		}
		echo 'update data';
	}

?>
	