<?php
	$url = "http://$_SERVER[HTTP_HOST]/img_host/";
	$files = scandir("/opt/lampp/htdocs/img_host/img");
	$select = '';

	foreach (array_diff( $files, [".", ".."] ) as $value)
	{	
		$select .= "<option value=\"$value\">$value</option>\n";
	}

	echo "
	<!DOCTYPE html>
	<html>
	<head>
	<title>Image upload</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<meta name=\"generator\" content=\"cat /dev/urandom > index.html\" />
	<link href=\"css/upload.css\" rel=\"stylesheet\" media=\"all\" />
	<link rel=\"icon\" href=\"favicon.png\" type=\"image/x-png\" />
	</head>
	<body>
	<div class=\"layer\">

	<form name=\"upload\" id=\"upload\" action=\"upload.php\" method=\"POST\" ENCTYPE=\"multipart/form-data\">     
	<div class=\"title\">Select image to upload</div>
	<br>
	<input size=\"44\" id=\"upload\" type=\"file\" name=\"userfile\" value=\"Select\" accept=\"image/jpeg, image/png, image/gif, image/*\">
	<br><br>
	<input id=\"upload\" class=\"button\" type=\"submit\" name=\"upload\" value=\"UPLOAD\">
	</form>

	<form name=\"show\" id=\"show\" action=\"show.php?file=file\" method=\"POST\" ENCTYPE=\"multipart/form-data\">     
	<div class=\"title\">Show uploaded image</div>
	<br>
	<select name=\"file\" id=\"file\">
		$select
	</select>
	<br><br>
	<input id=\"show\" class=\"button\" type=\"submit\" name=\"show\" value=\"SHOW\">
	</form>

	</div>
	<div class=\"footer\">
	</div>
	</body>
	</html>
	";
?>
