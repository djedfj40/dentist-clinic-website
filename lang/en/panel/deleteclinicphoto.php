

<?php

error_reporting(0);

include("../../../config.php");


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

// session is login check

$sessioncookie = $_COOKIE['session'];
$sessioncookieson = str_replace(['"',"'"], "", $sessioncookie);

$sql = "SELECT * FROM admin WHERE cookie='$sessioncookieson' ";


$result = mysqli_query($conn, $sql);
		 $row = mysqli_fetch_array($result);
		 
		 
		  if($row == 0) {
     header('Location: login.php');
	  die();
	  
		  }
		  
		  
		  $path= $_POST['path'];
		  
		  if (isset($_POST["path"])) {
			  
			  
			  unlink($path);
    
	$deleteimagefromdb = "DELETE FROM clinicphoto WHERE path='$path'";

$resultdeleteimagefromdb = mysqli_query($conn, $deleteimagefromdb);

echo "Image deleted successfully.";

header( "Refresh:4; url=index.php?id=clinicphoto");
	
	
	
	
	
}
		  else{
			  
			  
			  echo "An error occurred.";
		  }
		  
		  ?>