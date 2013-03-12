<!DOCTYPE html>
<html>
<title>Mail</title>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#sendmail').submit(function(){
			myajax('sendmail.php', jQuery(this).serialize());
		});
	});

	function myajax(url, form){
	$.ajax({
		type: "POST",
		url: url,
		data: form,
		async: false,
		success: function(msg){
			alert(msg);
		}
	});
}
</script>
</head>
<body>
	<form id="sendmail" method="post" action="#">
		<label for="name">Name: </label><input id="name" name="name" type="text" value="" />
		<label for="name">Email: </label><input id="email" name="email" type="email" value="" />
		<label for="message">Message: </label><br><textarea id="message" name="message"></textarea>
		<input name="submit" type="submit" value="send" />
	</form>
</body>
</html>