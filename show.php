<?php
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  $url = "https://$_SERVER[HTTP_HOST]/img_host/"; 
  $user = $_GET['user'];//$_SESSION['user'];
  $imgname = $_GET['file'];
  if ($imgname == '') {
 echo "
	<!DOCTYPE html>
	 <html>
	  <head>
	  <title>Upload result :: fail</title>
	  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
          <meta name=\"generator\" content=\"cat /dev/urandom > index.html\" />
	  <link href=\"css/upload.css\" rel=\"stylesheet\" media=\"all\" />
	  <link rel=\"icon\" href=\"favicon.png\" type=\"image/x-png\" />
	 </head>
	 <body>
	  <div class=\"error\">
	   <div class=\"fail\">
	    Not authorized
	   </div>
	   <div class=\"message\">
	    <br>
           </div>
          </div>
          <div class=\"back\"><a href=\"$url\" target=\"_self\">back</a></div>
	 </body>
	</html>
	";
   exit;
}
  
  $root_path = getcwd();
  $filepath = realpath("$root_path/img/$user/$imgname");
  list($width, $height) = getimagesize("$url/img/$user/$imgname");
  $type = pathinfo("$url/img/$user/$imgname", PATHINFO_EXTENSION);
  $size = filesize($filepath) / 1024;
  $time = date("F d Y H:i:s.", filemtime($filepath));
  
  echo "
	 <!DOCTYPE html>
	 <html>
	  <head>
	   <title>Show</title>
	   <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	   <meta name=\"generator\" content=\"cat /dev/urandom > index.html\" />
	   <link href=\"css/show.css\" rel=\"stylesheet\" media=\"all\" />
	   <link rel=\"icon\" href=\"favicon.png\" type=\"image/x-png\" />
	  </head>
	  <body>
	   <div class=\"result\">
	    <div class=\"text\">$imgname</div>
	    <div class=\"info\">
	     <div class=\"padding_left\">File name:</div>   		<div><a href=\"$url/img/$user/$imgname\" class=\"link\">$imgname</a></div>
	     <div class=\"padding_left\">File resolution:</div>     <div><span class=\"bold\">$width px</span> &times; <span class=\"bold\">$height px</span></div>
	     <div class=\"padding_left\">File type:</div>           <div><span class=\"bold\">$type</span></div>
	     <div class=\"padding_left\">File size:</div>           <div><span class=\"bold\">$size</span> kb</div>
	     <div class=\"padding_left\">Upload date:</div>         <div><span class=\"bold\">$time</span></div>
	    </div>
	    <div class=\"image\">
    	     <div class=\"popup\">Click on image for a direct link</div>
	     <a href=\"$url/img/$user/$imgname\" class=\"link\"><img class=\"done\" src=\"$url/img/$user/$imgname\" title=\"$imgname\"></a>
	    </div>
	   </div>
          	  <div class=\"back\"><a href=\"$url\" target=\"_self\">back</a></div>
	  </body>
	 </html>
      ";

?>

