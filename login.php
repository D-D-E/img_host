<?php
   session_start();
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'img_host_db');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $root_path = getcwd();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  
      $sql = "SELECT id FROM user WHERE LOGIN = '$myusername' and PASSW = md5('$mypassword')";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      
      //$count = mysqli_num_rows($active);
		
      if( $active != NULL) {
         $_SESSION['user'] = $myusername;
        
		if (!file_exists("$root_path/img/$myusername")) {
			mkdir("$root_path/img/$myusername", 0777, true);
		}
      }else {
         $error = "Your Login Name or Password is invalid";
      }
	  header("Location: http://$_SERVER[HTTP_HOST]/img_host/");
	  die();
   } else {
         $_SESSION['user'] = NULL;
         
   	 header("Location: http://$_SERVER[HTTP_HOST]/img_host/");
	 die();
   }
?>
