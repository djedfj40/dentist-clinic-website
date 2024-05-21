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

$sliderquery = "DELETE FROM slider WHERE path='$path'";

$slider = mysqli_query($conn, $sliderquery);

unlink($path);

echo "Image Deleted Successfully.";
header( "Refresh:4; url='index.php?id=slider'");
		  
		  
		  
		  
		  ?>
		  