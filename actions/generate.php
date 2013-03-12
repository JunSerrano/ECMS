<?php
$filename = $_POST['data1'];
$body = $_POST['data2'];
$title = $_POST['data3'];$folder = $_POST['data4'];
$file = $folder."/".$filename.".html";
$fileHandle = fopen($file, 'w') or die("file could not be accessed/created");
$content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'
	.'<html xmlns="http://www.w3.org/1999/xhtml">'
	.'<head>'
	.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'
	.'<title>'.$title.'</title>'
	.'</head>'
	.'<body>';
$content .= stripslashes(str_replace('true', 'false', $body));
$content .= '</body>'
	.'</html>';
fwrite($fileHandle, $content);
fclose($fileHandle);
echo 'File '.$filename.'.html is Generated';
?>