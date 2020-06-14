<?php
	session_start();
     	error_reporting(E_ERROR | E_WARNING | E_PARSE);	
	$url = "https://$_SERVER[HTTP_HOST]/img_host/";
	$root_path = getcwd();
	
	$select = '';
	$user = $_SESSION['user'];
	if (isset($_SESSION['user'])) {
		$files = scandir("$root_path/img/$user");
		foreach (array_diff( $files, [".", ".."] ) as $value)
		{	
			$select .= "<option value=\"$value\">$value</option>\n";
		}
	}

	$log_form = "";
	if (!isset($_SESSION['user'])) {
		$log_form = "
		<form name=\"login\" id=\"f_upload\" action=\"login.php\" method=\"POST\" ENCTYPE=\"multipart/form-data\">     
		<div class=\"title\">Log in</div>
		<div class=\"login_text\">Login:</div>
		<input type=\"text\" id=\"username\" name=\"username\" size=\"40\">
		<div class=\"login_text\">Password:</div>
		<input type=\"password\" id=\"password\" name=\"password\" size=\"40\">
		<br><br>
		<input id=\"s_upload\" class=\"button\" type=\"submit\" name=\"login\" value=\"LOGIN\">
		</form>
		";
	} else {
		$log_form = "
			<div class=\"title\">$user</div>
			<div class=\"href_logout\"><a href=\"login.php\">log out</a></div>
			<form name=\"upload\" id=\"f_upload\" action=\"upload.php\" method=\"POST\" ENCTYPE=\"multipart/form-data\">     
			<div class=\"title\">Select image to upload</div>
			<br><div class=\"help_text\">Can paste from clipbord Ctrl + V</div><br>
			<input size=\"44\" id=\"i_upload\" type=\"file\" name=\"userfile\" value=\"Select\" accept=\"image/jpeg, image/png, image/gif, image/*\">
			<br><br><br>
			<input id=\"s_upload\" class=\"button\" type=\"submit\" name=\"upload\" value=\"UPLOAD\">
			</form>

			<form name=\"show\" id=\"show\" action=\"show.php\" method=\"GET\" ENCTYPE=\"multipart/form-data\">     
			<div class=\"title\">Show uploaded image</div>
			<br><br><br>
			<select size=\"1\" name=\"file\" id=\"file\">
				$select
			</select>
			<br><br><br>
			<input name=\"user\" id=\"user\" value=\"$user\" hidden>
			<input id=\"show\" class=\"button\" type=\"submit\" name=\"show\" value=\"SHOW\">
			</form>
			";	
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
	$log_form	
	</div>
	
	<div class=\"footer\">	</div>
	
	<script>
		var file = document.getElementById(\"i_upload\");
		window.addEventListener('paste', e => {
			file.files = e.clipboardData.files;
		}, false);
	</script>
	
	</body>
	</html>
	";
?>
