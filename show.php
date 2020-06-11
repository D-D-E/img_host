<?php
  error_reporting(E_ERROR | E_PARSE);
  
  $uploaddir = 'img/';
  $imgname = '43b3ebb0491111cf0276d3a73098c9b5.png';
  
  list($width, $height) = getimagesize("$uploaddir$imgname");
  $type = filetype("$uploaddir$imgname");
  $size = getimagesize("$uploaddir$imgname");
  $time = 0;
  
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
	    <div class=\"text\">$name</div>
	    <div class=\"info\">
	     <div class=\"padding_left\">File name:</div>   		<div><a href=\"$url/img/$imgname\" class=\"link\">$imgname</a></div>
	     <div class=\"padding_left\">File resolution:</div>     <div><span class=\"bold\">$width px</span> &times; <span class=\"bold\">$height px</span></div>
	     <div class=\"padding_left\">File type:</div>           <div><span class=\"bold\">$type</span></div>
	     <div class=\"padding_left\">File size:</div>           <div><span class=\"bold\">$size</span> kb</div>
	     <div class=\"padding_left\">Upload date:</div>         <div><span class=\"bold\">$time</span></div>
	    </div>
	    <div class=\"image\">
    	     <div class=\"popup\">Click on image for a direct link</div>
	     <a href=\"$url/img/$imgname\" class=\"link\"><img class=\"done\" src=\"$url/img/$imgname\" title=\"$imgname\"></a>
	    </div>
	   </div>
           <div class=\"back\"><a href=\"$url\" target=\"_self\">back</a></div>
	  </body>
	 </html>
      ";
 
?>