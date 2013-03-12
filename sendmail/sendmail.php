<?php 
	$name = (!isset($_POST['name'])) ? '-1' : $_POST['name'];
	$email = (!isset($_POST['email'])) ? '-1' : $_POST['email'];
	$message = (!isset($_POST['message'])) ? '-1' : $_POST['message'];
	
	if($name != -1 && $email != -1){
		mail( "junserrano12@gmail.com", "Reservation Inquiry", $message, "From: $name<$email>" );
		echo 'mail send';
	}
?>