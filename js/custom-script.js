jQuery(document).ready(function(){
	//TEMPLATE PAGE
	//template form insert update delete
	jQuery('#template_form').submit(function(){
		if(jQuery('input[name=title]').val() != ''){
			myajax("actions/template.php", jQuery(this).serialize());
		}else{
			alert('Add Template Name');
		}
	});
	
	//edit
	jQuery('.template_edit').click(function(){
		var id = $(this).parents('div').attr('id');		
		jQuery('input[name=id]').val(jQuery('#'+id+' input[name=templateid]').val());
		jQuery('input[name=title]').val(jQuery('#'+id+' input[name=templatetitle]').val());
		var content = jQuery('#'+id+' textarea').text();
		// CKEDITOR.instances.layout.setData(content);
		jQuery('textarea[name=layout]').text(content);
		jQuery('input[name=update]').val('Update');
		jQuery('input[type=submit]').val('Update');
		jQuery('input[name=cancel]').val('Cancel');
	});
	
	//delete
	jQuery('.template_delete').click(function(){
		var id = $(this).parents('form').attr('id');
		myajax("actions/template.php", jQuery('#'+id).serialize());
		window.location.reload();
	})
	
	//clear
	jQuery('#template_form input[name=cancel]').click(function(){
		jQuery('input[name=title]').val('');
		jQuery('textarea[name=layout]').val('');
		jQuery('input[name=id]').val('-1');
		jQuery('input[name=delete]').val('-1');
		jQuery('input[name=update]').val('-1');
		jQuery('input[type=submit]').val('Submit');		
		jQuery('input[name=cancel]').val('Clear');
	});
	
	//CAMPAIGN PAGE
	jQuery('#campaign_form').submit(function(){	
		myajax("actions/campaign.php", jQuery(this).serialize());
	});
	
	//delete
	jQuery('.campaign_delete').click(function(){
		var id = $(this).parents('form').attr('id');		
		myajax("actions/campaign.php", jQuery('#'+id).serialize());
		jQuery('#campaign_table').reload();
	});
	
	jQuery("select[name=templateid]").change(function(){
		myajaxdisplay("actions/campaign.php", jQuery(this).val(), "display");
		jQuery('#template-name').empty().html(jQuery('select option:selected').text());
		
	});
	
	//EDITOR PAGE
	jQuery('.content_container').attr('contenteditable', 'true');			
	jQuery('#save').click(function(){		
		var myinstances = [];
		var fieldname = new Array();
		var fieldvalue = new Array();
		var campaignid = jQuery('#campaignid').val();
		var isnew = jQuery('#isnew').val();
		for(var i in CKEDITOR.instances){
			myinstances[CKEDITOR.instances[i].name] = CKEDITOR.instances[i].getData();			
			fieldname.push(CKEDITOR.instances[i].name);
			fieldvalue.push(CKEDITOR.instances[i].getData());			
		}
		if(jQuery(this).val() != 'Update'){
			jQuery(this).val('Update');
			jQuery('#isnew').val('1');
		}
		
		myajaxwithparam("actions/editor.php", fieldname, fieldvalue, campaignid, isnew);
	});
	
	//generate
	jQuery('#generate').click(function(){		
		var campaignname = jQuery('#campaigntitle').val();
		var campaignbody = jQuery('#newsletter_content').html();
		var newslettertitle = jQuery('#newsletter_title').val();
		var folder = jQuery('#newsletter_folder').val();
		myajaxwithparam("actions/generate.php", campaignname, campaignbody, newslettertitle, folder);	
	});
	
	
});

function myajax(url, form){
	$.ajax({
		type: "POST",
		url: url,
		data: form,
		async : false,
		success: function(data){
			alert(data);
		}
	});
}

function myajaxwithparam(url, data1, data2, data3, data4){
	$.ajax({
		type: "POST",
		url: url,
		data: {data1 : data1, data2 : data2, data3 : data3, data4 : data4},
		async: false,
		success: function(data){
			alert(data);			
		}
	});
}

function myajaxdisplay(url, data1, data2){
	$.ajax({
		type: "POST",
		url: url,
		data: {data1: data1, data2: data2},
		async : false,
		success: function(data){
			jQuery('#output').html(data);
		}
	});
}
