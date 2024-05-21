<html>
<head>
<title>Dosya yükleme</title><meta charset="utf-8">
</head>
<body> <center>
<?php
error_reporting(0);

//config and security check


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


// config and security check









$email= $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$homepagedescription = $_POST['homepagedescription'];
$address = $_POST['address'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter'];
$youtube = $_POST['youtube'];
$aboutdescription = $_POST['aboutdescription'];




$dizin = '../../../assets/img/';

$_FILES['dosya']['name'] = 'logo.jpg';

$yuklenecek_dosya = $dizin . basename($_FILES['dosya']['name']);



echo $dosya . $name; 
if (move_uploaded_file($_FILES['dosya']['tmp_name'], $yuklenecek_dosya))
{
   


 $dizin . basename($_FILES['dosya']['name']);      //  Path update to database // 


$contactinfoupdatequery = "UPDATE contactinfo SET email='$email'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET phonenumber='$phonenumber'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET homepagedescription='$homepagedescription'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET address='$address'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET facebook='$facebook'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET instagram='$instagram'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET twitter='$twitter'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET youtube='$youtube'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET aboutdescription='$aboutdescription'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);


$logopath = $dizin . basename($_FILES['dosya']['name']);

$contactinfoupdatequery = "UPDATE contactinfo SET logopath='$logopath'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

echo "Information Updated successfully.<br>";
header( "Refresh:3; url='index.php?id=contactinfo'");

 
} else {
	
	
	$contactinfoupdatequery = "UPDATE contactinfo SET email='$email'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET phonenumber='$phonenumber'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET homepagedescription='$homepagedescription'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET address='$address'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET facebook='$facebook'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET instagram='$instagram'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET twitter='$twitter'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET youtube='$youtube'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);

$contactinfoupdatequery = "UPDATE contactinfo SET aboutdescription='$aboutdescription'";
$contactinfo = mysqli_query($conn, $contactinfoupdatequery);
	
	echo "Information Updated successfully.<br>";
	header( "Refresh:3; url='index.php?id=contactinfo'");
    
}
?>
</center>
</body>
</html>