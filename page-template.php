<?php	
	$bodyid = 'page-template';
	require_once 'class/template.php';
	require_once 'header.php';
 	$template = new template();
	$template_list = $template->getTemplate();	
?>
<div id="primary">
	<div id="container">
		<div class="content">
			<div class="entry-header">
				<h1 class="entry-title">Template Page</h1>			
			</div>		
			<div class="entry-content">			
				<form id="template_form" method="post" action="#">			
					<p><label for="title">Template Name : </label><input type="text" name="title" /></p>
					<p><label for="layout">Layout : </label><br /><textarea name="layout" id="layout" class="ckeditorx" style="width:100%; height:300px;" ></textarea></p>		
					<input name="submit" type="submit" value="Submit" />			
					<input name="cancel" type="button" value="Clear" />				
					<input name="update" type="hidden" value="-1" />			
					<input name="id" type="hidden" value="-1" />				
				</form>						
				<table id="template_table" width="500">			
					<tr>				
						<th>ID</th>					
						<th>Template Title</th>		
						<th></th>					
						<th></th>					
					</tr>				
					<?php foreach( $template_list as $template_item ){ ?>			
					<tr>					
						<td><?php echo $template_item['id']; ?></td>	
						<td><?php echo $template_item['title']; ?></td>		
						<td>			
							<div id="template_update_form_<?php echo $template_item['id']; ?>">				
								<input name="templateid" type="hidden" value="<?php echo $template_item['id']; ?>" />		
								<input name="templatetitle" type="hidden" value="<?php echo $template_item['title']; ?>" />			
								<textarea style="display:none;" name="layout_<?php echo $template_item['id']; ?>" id="layout_<?php echo $template_item['id']; ?>"><?php echo stripslashes($template_item['layout']); ?></textarea>			
								<input class="template_edit" type="button" value="Edit" />			
							</div>					
						</td>					
						<td>						
							<form id="template_delete_form_<?php echo $template_item['id']; ?>" method="post" action="#">				
								<input name="templateid" type="hidden" value="<?php echo $template_item['id']; ?>" />				
								<input name="delete" type="hidden" value="delete" />				
								<input class="template_delete" type="button" value="Delete" />					
							</form>				
						</td>				
					</tr>					
					<?php } ?>		
				</table>			
			</div>	
		</div>	
	</div>
</div><?php require_once 'footer.php'; ?>