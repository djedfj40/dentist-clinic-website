<?php

error_reporting(0);

include("../../../config.php");



// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}


$user= $_POST['username'];
$pass= $_POST['password'];


$cleansedusername= mysqli_real_escape_string($conn,$user);
$cleansedpassword= mysqli_real_escape_string($conn,$pass);

 $sql = "SELECT * FROM admin WHERE username='$cleansedusername' AND password='$cleansedpassword'";
 
         $result = mysqli_query($conn, $sql);
		 $row = mysqli_fetch_array($result);
		 
		 function RemoveSpecialChar($str)
{
    $res = preg_replace('/[0-9\@\.\;\" "]+/', '', $str);
    return $res;
}
		 
		 $sessioncookie = $_COOKIE['session']; // cookieyi alıyorum
		 $sessioncookieson = str_replace(['"',"'"], "", $sessioncookie);


 if($row != 0) {
      echo "You login successfully. You are being redirected.";
	  
	  $sql1 = "UPDATE admin SET cookie='$sessioncookieson' WHERE username='$cleansedusername'";
	  mysqli_query($conn, $sql1);
	  header('Location: index.php?id=landing');
} else {
      echo "Username or Password is incorrect!";
	  header( "refresh:3;url=login.php" );
}
mysqli_close($conn);  



?>