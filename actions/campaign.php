<?php 
	require_once '../class/campaign.php';
	$campaign = new campaign();
	$campaign_list = $campaign->getCampaign();
	
	$id = (!isset($_POST['campaignid'])) ? '-1' : $_POST['campaignid'];
	$templateid = (!isset($_POST['templateid'])) ? '-1' : $_POST['templateid'];
	$title = (!isset($_POST['campaigntitle'])) ? '-1' : $_POST['campaigntitle'];
	$insert = (!isset($_POST['insert'])) ? '-1' : $_POST['insert'];
	$delete = (!isset($_POST['delete'])) ? '-1' : $_POST['delete'];
	$idchange = (!isset($_POST['data1'])) ? '-1' : $_POST['data1'];
	$display = (!isset($_POST['data2'])) ? '-1' : $_POST['data2'];
	
	if($insert != -1){
		if($templateid != -1){
			$campaign->insertCampaign($title, $templateid);
			echo 'campaign added';
		}else{
			echo 'select a template';
		}
		
	}
	
	if($delete != -1){
		$campaign->deleteCampaign($id);			
		$campaign->deleteContent($id);
		echo 'delete campaign';
	}
	
	if($display != -1){
		$content_list = $campaign->getTemplateLayout($idchange);
		foreach( $content_list as $content_item ){
			echo $content_item['layout'];
		}
	}
?>