<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Template</title>
	<?php //$link = ($bodyid != 'page-editor')? '<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />' : false ; echo $link; ?>	
	<link rel="stylesheet" type="text/css" media="all" href="style.css" />	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script src="ckeditor/ckeditor.js" type='text/javascript'></script>	
</head>
<body id="<?php echo $bodyid; ?>">
	<div id="page">
		<header id="branding">
			<hgroup>
				<a id="site-title" href="#?" rel="home">Newsletter Generator</a>
				<nav id="access" role="navigation">
					<ul id="main-menu" class="primary-menu menu">
						<li style="display:none;"><a href="page-template.php">Template</a></li>
						<li><a href="page-campaign.php">Campaign</a></li>
						<li><a href="eurovet">Newsletter</a></li>
					</ul>				
				</nav>			
			</hgroup>
		</header>	
		<div id="main">