<?php
error_reporting(0);

include("../../../config.php");


$n=32;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}
  
  $session = getName($n);
//echo $session;





if(!isset($_COOKIE['session'])) {
    setcookie('session', $session);
   
}

function RemoveSpecialChar($str)
{
    $res = preg_replace('/[0-9\@\.\;\" "]+/', '', $str);
    return $res;
}

$sessioncookie = $_COOKIE['session'];
$sessioncookieson = str_replace(['"',"'"], "", $sessioncookie);


$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM admin WHERE cookie='$sessioncookieson'";

$result = mysqli_query($conn, $sql);
		 $row = mysqli_fetch_array($result);
		 
		  if($row != 0) {
     
	  header('Location: index.php?id=landing');
	  
		  }






?>























<html>
    <head>
        <link rel="stylesheet" href="css/login2.css" type="text/css">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
        <form method="post" action="authentication.php">
            <div class="box">
                <span class="text-center">Login</span>
	       <div class="input-container">
		        <input type="text" name="username" required="required"/>
		        <label>Username</label>		
	       </div>
	       <div class="input-container">		
		        <input type="password" name="password" required="required"/>
		        <label>Password</label>
	       </div>
                <button class="glow-on-hover" type="submit">Login</button>
           </div>
        </form>
    </body>
</html>