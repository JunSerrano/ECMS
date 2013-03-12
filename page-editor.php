<?php 
	$bodyid = 'page-editor';
	require_once 'class/editor.php';
	require_once 'header.php';
	$editor = new editor();
	$campaignid = $_POST['campaignid'];
	$templateid = $_POST['templateid'];
	$content = $editor->getEditorContent($campaignid);	
	$layout = $editor->getTemplateLayout($templateid);
?>	
	<?php foreach($_POST as $key=>$value){ ?>
	<input id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $value; ?>" type="hidden" />
	<?php } ?>
	<input id="isnew" name="isnew" value="" type="hidden" />
	<input id="newsletter_title" name="newsletter_title" type="hidden" value="Interfiliere Hong Kong">
	<input id="newsletter_folder" name="newsletter_folder" type="hidden" value="../eurovet">
	
	<div id="primary">
		<input id="save" type="button" value="Save" disabled />
		<input id="load" type="button" value="Load" />
		<input id="generate" type="button" value="Generate" style="display:none;"/>
	</div>
	<div id="newsletter_container">
		<div id="cover"></div>
		<div id="newsletter_content">
			<center>
			<?php foreach($layout as $layout_item){ ?>
				<?php echo stripslashes($layout_item['layout']); ?>
			<?php } ?>
			</center>
		</div>
	</div>
	
	<script>
	jQuery(document).ready(function(){
		jQuery('#load').click(function(){
			jQuery('#cover').fadeOut(function(){
				jQuery('#save').removeAttr('disabled');
			});
			<?php if($content != null) { ?>
					jQuery('#isnew').val('false');
					jQuery('#save').val('Update');
					<?php foreach($content as $content_item ){ 
						// $content = preg_replace("/\[(.*?)\]\s*(.*?)\s*\[\/(.*?)\]/", "[$1]$2[/$3]", html_entity_decode($content_item['content']));
						// $content = str_replace(PHP_EOL, '', $content_item['content']);						
					?>					
						CKEDITOR.instances.<?php echo $content_item['position_name']; ?>.setData('<?php echo rtrim(str_replace(PHP_EOL, '', str_replace('\'', '\\\'', $content_item['content']))); ?>');
					<?php }				
			} else { ?>
					jQuery('#save').val('Save');
					jQuery('#isnew').val('true');
			<?php } ?>			
			jQuery(this).remove();
			jQuery('#generate').show();
		});	
	});
	</script>
<?php require_once 'footer.php'; ?>
