<?php


// check permission
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
		  
		  
		  if($_GET['id']=='updateinfo'){
		  
		  
		  $staffid = $_POST["id"];
		  $name = $_POST["name"];
		  $description = $_POST["description"];
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
$target_dir = "../../../assets/img/dis-hekimlerimiz/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  
  $completepath = $target_dir.$filenameaddquery;
	  
	  $completepath = substr($completepath, 3);
	  
	  $filename = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
	  
	 
	  
	  $updatestaffinfoquery = "UPDATE staffinfo SET name='$name' , description='$description' WHERE id='$staffid'";
	  
	  echo "Information Updated Successfully \n";
	  header( "Refresh:4; url='index.php?id=staff'");


$updatestaffinfo = mysqli_query($conn, $updatestaffinfoquery);
  
  
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	  
	 
	  
	  $completepath = $target_dir.$filenameaddquery;
	  
	  $completepath = substr($completepath, 3);
	  
	  $filename = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
	  
	 
	  
	  $updatestaffinfoquery = "UPDATE staffinfo SET name='$name' , description='$description' , photopath='$completepath$filename' WHERE id='$staffid'";

$updatestaffinfo = mysqli_query($conn, $updatestaffinfoquery);
	  
	  
	  
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	
	header( "Refresh:4; url='index.php?id=staff'");
	
	
  } else {
    echo "Sorry, there was an error uploading your file.";
	
  }
}


if(isset($_POST["delete"])) {
	
	
	$getpathquery = "SELECT photopath FROM staffinfo WHERE id='$staffid'";

$getpath = mysqli_query($conn, $getpathquery);

$getpathrow = mysqli_fetch_array($getpath);

$corrector = '../';

$photopath = $corrector.$getpathrow ['photopath'];

	
	
	$deletestaffinfoquery = "delete from staffinfo WHERE id='$staffid'";

$deletestaff = mysqli_query($conn, $deletestaffinfoquery);
	
	
	unlink($photopath);
	
	echo "Personal Deleted Successfully";
	header( "Refresh:4; url='index.php?id=staff'");
	
	
}


		  }




  if($_GET['id']=='addperson'){  // add person
	  
	  
	  	
	$addpersonquery = "INSERT INTO staffinfo (id,name,description,photopath) VALUES ('','Person Name','Description','photopath')";

$addperson = mysqli_query($conn, $addpersonquery);

echo "Person Added Successfully";
header( "Refresh:4; url='index.php?id=staff'");


	  
	  
	  
	  
  }






?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	