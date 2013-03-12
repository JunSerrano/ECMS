<?php
	$bodyid = 'page-campaign';
	require_once 'class/campaign.php';
	require_once 'class/template.php';
	require_once 'header.php';
	$template = new template();
	$campaign = new campaign();
	$campaign_list = $campaign->getCampaign();
	$template_list = $template->getTemplate();
?>
<div id="primary">
	<div id="container">
		<div class="content">
			<div class="entry-header">
				<h1 class="entry-title">Campaign Page</h1>
			</div>
			<div class="entry-content">
				<div class="left-content">
				<form id="campaign_form" action="#" method="post">
					<select name="templateid">
						<option value="-1">Select Template</option>
						<?php foreach( $template_list as $template_item ){ ?>
						<option value="<?php echo $template_item['id']; ?>"><?php echo $template_item['title']; ?></option>
						<?php } ?>
					</select>
					<input name="insert" type="hidden" value="insert" />
					<input name="campaigntitle" type="hidden" value="<?php echo date("YmdHis"); ?>" />
					<input name="submit" type="submit" value="Create" />					
				</form>
				<table id="campaign_table" width="500">
					<tr>
						<th>Campaign ID</th>
						<th>Campaign</th>
						<th>Template</th>
						<th></th>
						<th></th>
					</tr>
					<?php foreach( $campaign_list as $campaign_item ){ ?>
					<tr>
						<td><?php echo $campaign_item['id']; ?></td>
						<td><?php echo $campaign_item['title']; ?></td>
						<td><?php echo $campaign_item['templatename']; ?></td>
						<td>
							<form id="<?php echo $campaign_item['title']; ?>_form" method="post" action="page-editor.php">
								<input name="campaignid" type="hidden" value="<?php echo $campaign_item['id']; ?>" />
								<input name="campaigntitle" type="hidden" value="<?php echo $campaign_item['title']; ?>" />
								<input name="templateid" type="hidden" value="<?php echo $campaign_item['templateid']; ?>" />
								<input type="submit" value="Edit" />
							</form>
						</td>
						<td>
							<form id="<?php echo $campaign_item['title']; ?>_delete_form" method="post" action="#">
								<input name="campaignid" type="hidden" value="<?php echo $campaign_item['id']; ?>" />
								<input name="delete" type="hidden" value="delete" />
								<input class="campaign_delete" type="button" value="Delete" />
							</form>
						</td>
					</tr>
					<?php } ?>
				</table>				
				</div>
				<div class="right-content" style="border:1px solid #cccccc;">
					<div id="template-name" style="color:#ffffff; background:#cccccc;">TEMPLATE DESIGN</div>
					<div id="output"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?>