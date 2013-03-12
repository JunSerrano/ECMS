<?php
	require_once '../class/template.php';
	$template = new template();
	$templateid = (!isset($_POST['templateid'])) ? '-1' : $_POST['templateid'];
	$id = (!isset($_POST['id'])) ? '-1' : $_POST['id'];
	$title = (!isset($_POST['title'])) ? '-1' : $_POST['title'];
	$layout = (!isset($_POST['layout'])) ? '-1' : $_POST['layout'];
	$delete = (!isset($_POST['delete'])) ? '-1' : $_POST['delete'];
	
	if($delete != 'delete'){
		if($id > 0){
			$template->updateTemplate($id, $title, stripslashes($layout));
			echo 'template updated';
		}else{			
			$template->insertTemplate($title, stripslashes($layout));	
			echo 'template added';
		}
	}else{		
		$template->deleteTemplate($templateid);
		echo 'delete template';
	}
?>