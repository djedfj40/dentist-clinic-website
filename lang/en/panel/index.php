

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
		  
		 
		 
		
		
		 

//

// mysql total visitor check

$sqlvisitor = "SELECT * FROM visitor";

$resultvisitor = mysqli_query($conn, $sqlvisitor);
$row_cnt = $resultvisitor->num_rows;



// date picker for today visitor query

$year = date("Y");
$month = date("m");
$day = date("d");


//


// Today visitor count mysql query

$sqlvisitortoday = "SELECT * FROM visitor WHERE year='$year' and month='$month' and day='$day'";

$resultvisitortoday = mysqli_query($conn, $sqlvisitortoday);
$row_cnttoday = $resultvisitortoday->num_rows;




// landing page visitor count


if($_GET['id']=='landing'){
	
	?>
	<div class="visitorbox" >
<i class="fas fa-chart-bar fa-10x" id="chart1"></i>
<h1><font size="6" id="totalvisitoryazi" color="white">Total Visitors: <?php echo $row_cnt; ?></font></h1>

<div id="visitorbox2">
<i class="fas fa-chart-bar fa-10x" id="chart2"></i>
<h1><font size="6" id="totalvisitoryazi2" color="white">Visitors Today: <?php echo $row_cnttoday; ?></font></h1>
</div>

</div>
	
	<?php
	
	
}




//


$id = $_GET['id'];


// user logout

if($_GET['id']=='logout'){
	
	setcookie("session", "", time() - 3600);
	header('Location: login.php');
	
}

//

if($_GET['id']=='messages'){
	if($_GET['show']=='25'){
		
		$show = $_GET['show'];
		$sqlcontact = "SELECT * FROM contact order by id DESC limit 0,$show";
		
	}
	if($_GET['show']==50){
		
		$show = $_GET['show'];
		$sqlcontact = "SELECT * FROM contact order by id DESC limit 0,$show";
		
	}
	if($_GET['show']==100){
		
		$show = $_GET['show'];
		$sqlcontact = "SELECT * FROM contact order by id DESC limit 0,$show";
		
	}
	
	if($_GET['show']==200){
		
		$show = $_GET['show'];
		$sqlcontact = "SELECT * FROM contact order by id DESC limit 0,$show";
		
	}
	if($_GET['show']=='all'){
		
		
		$sqlcontact = "SELECT * FROM contact order by id DESC limit 9999";
		
	}
	
	
    $queryrun = mysqli_query($conn,$sqlcontact);
	
	?>
	
	
	<div class="shownumber">
    <label for="cars">Show Number:</label>

<select name="cars" id="cars" onchange="location = this.value;">
  <option value="index.php?id=messages&show=25">25</option>
  <option value="index.php?id=messages&show=50">50</option>
  <option value="index.php?id=messages&show=100">100</option>
  <option value="index.php?id=messages&show=200">200</option>
    <option value="index.php?id=messages&show=all">All</option>
</select>
    
    </div>
	
	<table id="editableTable" class="table table-bordered">
	
	<thead>
		<tr>
			<th class="col-sm-1">Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>	
            <th class="col-sm-5">Message</th>	
			
            <th>Date</th>			
		</tr>
	</thead>
	<tbody>
	
	
	
	<?php
	
	while($rowcontact = mysqli_fetch_array($queryrun)){
		?>
		
		
               <form action="index.php?id=deletemessage" method="POST">
			   
			<td><?php echo $rowcontact ['id']; ?></td>
		   <td><?php echo $rowcontact ['name']; ?></td>
		   <td><?php echo $rowcontact ['email']; ?></td>
		   <td><?php echo $rowcontact ['phone']; ?></td>  	
           <td><?php echo $rowcontact ['message']; ?></td>  
           <td><?php echo $rowcontact ['date']; ?></td>  	
		   
           	<input type="text"  name="id" style="position:relative; border: 3px solid black; color:black; bottom:40px; left:370; " value="<?php echo $rowcontact['id'] ?>" />
			   
	        
			   
			<td><input type="submit" value="Delete Message"></td>  	
		
		    </form>
		
		

	
		
		
			   
		  
		</tbody>

		
		
		
		
		<?php
		
	}

}

if($_GET['id']=='deletemessage'){
	
	
	$message_id = $_POST['id'];
	
	$sqlupdateadmin = "DELETE FROM contact WHERE id='$message_id'";
$queryrunupdate = mysqli_query($conn,$sqlupdateadmin);
	
	header('Location: index.php?id=messages&show=25');
	
}

if($_GET['id']=='admins'){
	

$sqlcontact = "SELECT * FROM admin order by user_id DESC";
    $queryrun = mysqli_query($conn,$sqlcontact);
	while($rowcontact = mysqli_fetch_array($queryrun)){
		?>
		<div class="admins">
		<form action="index.php?id=updated" method="POST">
		USER ID<input type="text" readonly="readonly" name="user_id" style="border: 3px solid black; color:black;" value="<?php echo $rowcontact['user_id'] ?>" />
		<input type="text"  name="username" style="position:relative; border: 3px solid black; color:black; bottom:40px; left:370; " value="<?php echo $rowcontact['username'] ?>" />
		<input type="text"  name="password" style="position:relative; border: 3px solid black; color:black; bottom:81.4px; left:740; " value="" placeholder="Leave blank if you don't wanna change it"/>
		
		

		<div id="username">USERNAME</div>
		<div id="password">PASSWORD</div>
		<div id="updatebutton"><input type="submit" value="UPDATE INFO">
		</div>
		<div id="deleteadminbutton"><input type="submit" value="DELETE ADMIN" name="deleteadmin">
		
		
		
		</input></div>
		</form>
		</div>
		
		
		
		<?php
	
}
?>
<div class="admins">
		<form action="index.php?id=addadmin" method="POST">
		
		<input type="text"  name="username" style="position:relative; border: 3px solid black; color:black; bottom:40px; left:370; " value="username" />
		<input type="text"  name="password" style="position:relative; border: 3px solid black; color:black; bottom:81.4px; left:740; " value="password" placeholder=""/>
		
		

		<div id="username">USERNAME</div>
		<div id="password">PASSWORD</div>
		<div id="updatebutton"><input type="submit" value="ADD ADMIN">


<?php
}

if($_GET['id']=='addadmin'){
$adminid = $_POST['user_id'];
$usernameadmin= $_POST['username'];
$passadmin= $_POST['password'];

if (empty($passadmin)) {
	$sqlupdateadmin = "insert into admin VALUES (3,$usernameadmin,$passadmin)";
$queryrunupdate = mysqli_query($conn,$sqlupdateadmin);
	
}
else{
	
	$sqlupdateadmin = "INSERT INTO admin (user_id, username, password,cookie) VALUES ('', '$usernameadmin', '$passadmin','$passadmin')";
$queryrunupdate = mysqli_query($conn,$sqlupdateadmin);
	
	
}


?>

<script>alert("Admin added successfully!")
window.location.href = "index.php?id=admins";
</script>


<?php

}



if($_GET['id']=='updated'){
$adminid = $_POST['user_id'];
$usernameadmin= $_POST['username'];
$passadmin= $_POST['password'];


if (isset($_POST["deleteadmin"]))
   {
       
	   $sqlupdateadmin = "DELETE FROM admin WHERE user_id='$adminid'";
$queryrunupdate = mysqli_query($conn,$sqlupdateadmin);
header('Location: index.php?id=admins');
exit();
	   
   }

if (empty($passadmin)) {
	$sqlupdateadmin = "UPDATE admin SET username='$usernameadmin' WHERE user_id='$adminid'";
$queryrunupdate = mysqli_query($conn,$sqlupdateadmin);
	
}
else{
	
	$sqlupdateadmin = "UPDATE admin SET username='$usernameadmin' , password='$passadmin' WHERE user_id='$adminid'";
$queryrunupdate = mysqli_query($conn,$sqlupdateadmin);
	
	
}


?>

<script>alert("Information updated successfully!")
window.location.href = "index.php?id=admins";
</script>


<?php

}
	?>
	
	<?php

if($_GET['id']=='clinicphoto'){
	
	$showimagequery = "SELECT * FROM clinicphoto";

$resultshowimage = mysqli_query($conn, $showimagequery);

$rowcountimage = $resultshowimage->num_rows; // kaç tane kayıdın geldiğini sayar.
	
	
	
	while($resultshowimagerow = mysqli_fetch_array($resultshowimage)){ 
	
	?>
	
	
	<div class="testphoto">
   <img src="<?php echo $resultshowimagerow ['path']; ?>" width=60% height=50% style="position:relative; left:25%; top:90px;"/ title="<?php echo $resultshowimagerow ['filename']; ?>">
	
	</div>
	<form action="deleteclinicphoto.php" method="POST">
	
	 <input type="hidden" name="path" value="<?php echo $resultshowimagerow ['path']; ?>" >
	 <input type="submit" id="deletebutton" class="btn btn-danger" value="Delete Image"></input>
	 
	 </form>
	 
	 
	  <br>
	   
  
	
	
	


	
	
	<?php
	
	
	

	}
	
	
	
	
	?>
	<br><br><br><br><br><br>
	
	<div class="uploadform">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="fileToUpload" id="fileToUpload">
	
  
  <input name="submit" type="submit" value="Upload">
</form>


</div>
	
	<?php
	
}

?>

<?php


if($_GET['id']=='slider'){
	
	
	$sliderquery = "SELECT * FROM slider";

$slider = mysqli_query($conn, $sliderquery);
	
	
while($sliderrow = mysqli_fetch_array($slider)){ 
	
	
	?>
	
	<div class="testphoto">
   <img src="<?php echo $sliderrow ['path']; ?>" width=60% height=50% style="position:relative; left:25%; top:90px;"/ title="<?php echo $sliderrow ['name']; ?>">
	
	</div>
	<form action="deletesliderphoto.php" method="POST">
	
	 <input type="hidden" name="path" value="<?php echo $sliderrow ['path']; ?>" >
	 <input type="submit" id="deletebutton" class="btn btn-danger" value="Delete Image"></input>
	 
	 </form>
	 
	 
	  <br><br><br>
	
	
	
	<?php
	
}


?>

<div class="uploadform">
	<form action="uploadslider.php" method="post" enctype="multipart/form-data">
	<input type="file" name="fileToUpload" id="fileToUpload">
	
  
  <input name="submit" type="submit" value="Upload">
</form>

<a id="note">Important Note: Your image must be 1920x890 Or it will oversize the slider page. Just google "image resizer" and resize it to width:1920 height:890</a>
</div>


<?php

}






?>

<?php

if($_GET['id']=='contactinfo'){
	
$contactinfoquery = "SELECT * FROM contactinfo";

$contactinfo = mysqli_query($conn, $contactinfoquery);

$contactinforow = mysqli_fetch_array($contactinfo);


	?>


<div class="contactinfo">
<form enctype="multipart/form-data" method="post" action="contactinfoupdate.php">

<div id="infotext">Email</div><input type="text" id="email" name="email" value="<?php echo $contactinforow ['email'];?>"><br>
<div id="infotext">Phonenumber</div><input type="text" id="phonenumber" name="phonenumber" value="<?php echo $contactinforow ['phonenumber'];?>"><br>
<div id="infotext">Homepagedescription</div><input type="text" id="homepagedescription" name="homepagedescription" value="<?php echo $contactinforow ['homepagedescription'];?>"><br>
<div id="infotext">address</div><input type="text" id="address" name="address" value="<?php echo $contactinforow ['address'];?>"><br>
<div id="infotext">Facebook</div><input type="text" id="facebook" name="facebook" value="<?php echo $contactinforow ['facebook'];?>"><br>
<div id="infotext">Instagram</div><input type="text" id="instagram" name="instagram" value="<?php echo $contactinforow ['instagram'];?>"><br>
<div id="infotext">Twitter</div><input type="text" id="twitter" name="twitter" value="<?php echo $contactinforow ['twitter'];?>"><br>
<div id="infotext">Youtube</div><input type="text" id="youtube" name="youtube" value="<?php echo $contactinforow ['youtube'];?>"><br>
<div id="infotext">Aboutpage Description</div><input type="text" id="email" name="aboutdescription" value="<?php echo $contactinforow ['aboutdescription'];?>"><br>
<div id="infotext">Website Logo</div><img src="<?php echo $contactinforow ['logopath'];?>" /> <input name="dosya" type="file" /> <br>

<input type="submit" id="submitbtnn" class="btn btn-success" value="Update Information">



</form>
</div>

<?php



}

if($_GET['id']=='staff'){
	
	
	$staffinfoquery = "SELECT * FROM staffinfo";

$staffinfo = mysqli_query($conn, $staffinfoquery);



while($staffinforow = mysqli_fetch_array($staffinfo)){ 
	
	
	?>
	
	
	<div class="staffinfo">
	
<form action="staffupload.php?id=updateinfo" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" id="id" value="<?php echo $staffinforow ['id'];?>">
  Name<input type="text" value="<?php echo $staffinforow ['name'];?>" name="name">
  Description<input type="text" value="<?php echo $staffinforow ['description'];?>" name="description">
  <img id="staffimage" src="../<?php echo $staffinforow ['photopath'];?>" style="width:155px;"/>
  
  
  
  
  
  <input name="delete" id="staffdeletebtn" type="submit" value="Delete Person">
  

  <input name="submit" id="staffsubmitbtn" type="submit" value="Update info">
  <input id="fileuploader" type="file" name="fileToUpload" id="fileToUpload">
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
  
</form>







	
	
	</div>
	
	
	
	
	
	<?php
	
	
	
}

// altta staff ekle var
?>

<form action="staffupload.php?id=addperson" method="get">

<input name="id" id="staffsubmitbtn" type="submit" value="addperson">




</form>





<?php

} 

if($_GET['id']=='treatments'){
	
	
		$treatmentsquery = "SELECT * FROM treatments";

$treatments = mysqli_query($conn, $treatmentsquery);
	
	
	while($treatmentsrow = mysqli_fetch_array($treatments)){ 
	
	
	?>
	
	<div class="staffinfo">
	
<form action="treatmentsupload.php?id=updateinfo" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" id="id" value="<?php echo $treatmentsrow ['id'];?>">
  Name<input type="text" value="<?php echo $treatmentsrow ['name'];?>" name="name">
  Description<input type="text" value="<?php echo $treatmentsrow ['description'];?>" name="description">
  <img id="staffimage" src="../<?php echo $treatmentsrow ['photopath'];?>" style="width:155px;"/>
  
  
  
  
  
  <input name="delete" id="staffdeletebtn" type="submit" value="Delete Treatment">
  

  <input name="submit" id="staffsubmitbtn" type="submit" value="Update info">
  <input id="fileuploader" type="file" name="fileToUpload" id="fileToUpload">
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
  
</form>







	
	
	</div>
	
	
	
	
	
	<?php
	
	
	
}



?>


<form action="treatmentsupload.php?id=addtreatment" method="get">

<input name="id" id="staffsubmitbtn" type="submit" value="addtreatment">




</form>


<?php

}




?>


<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    @charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic);
@import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css);
html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

body {
  background: #f1f2f7;
  font-family: "Open Sans", arial, sans-serif;
  color: darkslategray;
  overflow:visible;
}

body.login {
  background-color: white;
  max-width: 500px;
  margin: 10vh auto;
  padding: 1em;
  height: auto;
}

.warn {
  color: red;
}

/* header */
header[role="banner"] {
  background: white;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
}
header[role="banner"] h1 {
  margin: 0;
  font-weight: 300;
  padding: 1rem;
}
header[role="banner"] h1:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: 0.6em;
  color: red;
}
header[role="banner"] .utilities {
  width: 100%;
  background: slategray;
  color: #ddd;
}
header[role="banner"] .utilities li {
  border-bottom: solid 1px rgba(255, 255, 255, 0.2);
}
header[role="banner"] .utilities li a {
  padding: 0.7em;
  display: block;
}

/* header */
.utilities a:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: 0.6em;
}

.logout a:before {
  content: "";
}

.users a:before {
  content: "";
}

nav[role="navigation"] {
  background: #2a3542;
  
  color: #ddd;
  z-index:16

  
  /* icons */
}
nav[role="navigation"] li {
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
nav[role="navigation"] li a {
  color: #ddd;
  text-decoration: none;
  display: block;
  padding: 0.7em;
}
nav[role="navigation"] li a:hover {
  background-color: purple;
}
nav[role="navigation"] li a:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: 0.6em;
}
nav[role="navigation"] .dashboard a:before {
  content: "";
  
}
nav[role="navigation"] .write a:before {
  content: "";
}
nav[role="navigation"] .edit a:before {
  content: "";
}
nav[role="navigation"] .comments a:before {
  content: "";
}
nav[role="navigation"] .users a:before {
  content: "";
}

/* current nav item */
.current, .dashboard .dashboard a,
.write .write a,
.edit .edit a,
.comments .comments a,
.users .users a {
  background-color: rgba(255, 255, 255, 0.1);
}

footer[role="contentinfo"] {
  background: slategray;
  color: #ddd;
  font-size: 0.8em;
  text-align: center;
  padding: 0.2em;
}

/* panels */
.panel {
  background-color: white;
  color: darkslategray;
  -webkit-border-radius: 0.3rem;
  -moz-border-radius: 0.3rem;
  -ms-border-radius: 0.3rem;
  border-radius: 0.3rem;
  margin: 1%;
}
.panel > h2, .panel > ul {
  margin: 1rem;
}

/* typography */
a {
  text-decoration: none;
  color: inherit;
}

h2,
h3,
h4 {
  font-weight: 300;
  margin: 0;
}

h2 {
  color: #ff1a1a;
}

b {
  color: lightsalmon;
}

.hint {
  color: lightslategray;
}

/* lists */
ul,
li {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

main li {
  position: relative;
  padding-left: 1.2em;
  margin: 0.5em 0;
}
main li:before {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  left: 0;
  top: 0.3em;
  border-left: solid 10px #dde;
  border-top: solid 5px transparent;
  border-bottom: solid 5px transparent;
}

/* forms */
form input,
form textarea,
form select {
  width: 100%;
  display: block;
  border: solid 1px #dde;
  padding: 0.5em;
}
form input:after,
form textarea:after,
form select:after {
  content: "";
  display: table;
  clear: both;
}
form input[type="checkbox"],
form input[type="radio"] {
  display: inline;
  width: auto;
}
form label,
form legend {
  display: block;
  margin: 1em 0 0.5em;
}
form input[type="submit"] {
  background: #ff1a1a;
  border: none;
  border-bottom: solid 4px #e60000;
  padding: 0.7em 3em;
  margin: 1em 0;
  color: white;
  text-shadow: 0 -1px 0 #e60000;
  font-size: 1.1em;
  font-weight: bold;
  display: inline-block;
  width: auto;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  -ms-border-radius: 0.5em;
  border-radius: 0.5em;
}
form input[type="submit"]:hover {
  background: turquoise;
  border: none;
  border-bottom: solid 4px #21ccbb;
  padding: 0.7em 3em;
  margin: 1em 0;
  color: white;
  text-shadow: 0 -1px 0 #21ccbb;
  font-size: 1.1em;
  font-weight: bold;
  display: inline-block;
  width: auto;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  -ms-border-radius: 0.5em;
  border-radius: 0.5em;
}

/* feedback */
.error {
  background-color: #ffe9e0;
  border-color: #ffc4ad;
}

label.error {
  padding: 0.2em 0.5em;
}

.feedback {
  background: #fcfae6;
  color: #857a11;
  margin: 1em;
  padding: 0.5em 0.5em 0.5em 2em;
  border: solid 1px khaki;
}
.feedback:before {
  content: "";
  font-family: fontawesome;
  color: #e4d232;
  margin-left: -1.5em;
  margin-right: 0.5em;
}
.feedback li:before {
  border-left-color: #f6f0b9;
}
.feedback.error {
  background: #ffe9e0;
  color: #942a00;
  margin: 1em;
  padding: 0.5em 0.5em 0.5em 2em;
  border: solid 1px lightsalmon;
}
.feedback.error:before {
  content: "";
  font-family: fontawesome;
  color: #ff5714;
  margin-left: -1.5em;
  margin-right: 0.5em;
}
.feedback.error li:before {
  border-left-color: #ffc4ad;
}
.feedback.success {
  background: #98eee6;
  color: #08322e;
  margin: 1em;
  padding: 0.5em 0.5em 0.5em 2em;
  border: solid 1px turquoise;
}
.feedback.success:before {
  content: "";
  font-family: fontawesome;
  color: #1aa093;
  margin-left: -1.5em;
  margin-right: 0.5em;
}
.feedback.success li:before {
  border-left-color: #6ce7db;
}

/* tables */
table {
  border-collapse: collapse;
  width: 96%;
  margin: 2%;
}

th {
  text-align: left;
  font-weight: 400;
  font-size: 13px;
  text-transform: uppercase;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding: 0 10px;
  padding-bottom: 14px;
}

tr:not(:first-child):hover {
  background: rgba(0, 0, 0, 0.1);
}

td {
  line-height: 40px;
  font-weight: 300;
  padding: 0 10px;
}

@media screen and (min-width: 600px) {
  html,
  body {
    height: 100%;
  }

  header[role="banner"] {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
    height: 75px;
  }
  header[role="banner"] .utilities {
    position: absolute;
    top: 0;
    right: 0;
    background: transparent;
    color: darkslategray;
    width: auto;
  }
  header[role="banner"] .utilities li {
    display: inline-block;
  }
  header[role="banner"] .utilities li a {
    padding: 0.5em 1em;
  }

  nav[role="navigation"] {
    position: fixed;
    width: 200px;
    top: 75px;
    bottom: 0px;
    left: 0px;
  }

  main[role="main"] {
    margin: 75px 0 40px 200px;
  }
  main[role="main"]:after {
    content: "";
    display: table;
    clear: both;
  }

  .panel {
    margin: 2% 0 0 2%;
    float: left;
    width: 96%;
  }
  .panel:after {
    content: "";
    display: table;
    clear: both;
  }

  .box, .onethird, .twothirds {
    padding: 1rem;
  }

  .onethird {
    width: 33.333%;
    float: left;
  }

  .twothirds {
    width: 66%;
    float: left;
  }

  footer[role="contentinfo"] {
    clear: both;
    margin-left: 200px;
  }
}
@media screen and (min-width: 900px) {
  footer[role="contentinfo"] {
    position: fixed;
    width: 100%;
    bottom: 0;
    left: 0px;
    margin: 0;
  }

  .panel {
    width: 47%;
    clear: none;
  }
  .panel.important {
    width: 96%;
  }
  .panel.secondary {
    width: 23%;
  }
}
.forms{
	
	position:relative;
	width:1500px;
	left:20%;
	top:90px;
	
	
}

.admins{
	
	position:relative;
	width:350px;
	left:210px;
	top:90px;
}

#username{
	
	position:relative;
	bottom:140px;
	left:370px;
	
}

#password{
	
	position:relative;
	bottom:161px;
	left:741px;
}

#updated{
	
	
	
	color:black;
	
	
	z-index:1555;
	
}

#updatebutton{
	
	position:relative;
	bottom:181px;
	left:1100px;
	
}

#deleteadminbutton{
	
	position:relative;
	bottom:258px;
	left:1350px;
	
}

#editableTable{
	
	position:relative;
	width:75%;
	top:10%;
	
	
	left:190px;
	background-color:#9B9B9B;
	color:black;
	word-break:break-word;
	
	
}

.shownumber{
	
	display:inline;
	position:relative;
	left:42%;
	top:13%;
}


.visitorbox{
	
	position:relative;  
	background-color:orange; 
	color:orange; 
	border:solid; 
	width:650px; 
	height:550px; 
	left:25rem;
	top:11em;
	
	
	
}


#totalvisitoryazi{
	display:inline;
	position:relative;
	left:31%;
	width:5px;
	top:325px;
	height:5px;
}

#chart1{
	
	position:relative;
	z-index:15;
	color:purple;
	left:1.75em;
	top:1em;
}


#visitorbox2{
	
	position:relative;  
	background-color:orange; 
	color:orange; 
	border:solid; 
	width:650px; 
	height:550px; 
	left:49em;
	bottom:14.8em;
}

#totalvisitoryazi2{
	
	display:inline;
	position:relative;
	left:31%;
	width:5px;
	top:325px;
	height:5px;
}

#chart2{
	position:relative;
	z-index:1;
	color:#15AABF;
	left:1.75em;
	top:1em;
}


#deletebutton{
	
	position:relative;
	
	left:51%;
	top:110px;
	
	
}

.testphoto{
	
	display:flex
	
}


.uploadform{
	
	display:inline-block;
	position:relative;
	left:52%;
}

#fileToUpload{
	width:220px;
	position:relative;
	top:58px;
	right:240px;
}


.contactinfo{
	
	position:relative;
	
	z-index:15;
	width:35%;
	
	top:25%;
	left:500px;
}

#infotext{
	
	
	position:relative;
	z-index:15;
	right:155px;
	top:28px;
	width:5px;
}

#submitbtnn{
	
	position:relative;
	left:180px;
	
}



#note{
	display:block;
	position:relative;
	right:600px;
	width:900px;
	color:red;
}


.staffinfo{
	
	position:relative;
	width:45%;
	left:25%;
	top:15%;
	
}

#staffimage{
	
	position:relative;
	left:40%;
}

#staffdeletebtn{
	
	position:relative;
	right:15%;
}

#staffsubmitbtn{
	
	position:relative;
	left:35%;
	
}





    </style>
	 <link href="css/all.css" rel="stylesheet">
</head>
<header role="banner">
  <h1>Control Panel</h1>
  <ul class="utilities">
    <br>
	<li class="return"><a href="../index.php">Homepage</a></li>
    <li class="users"><a href="index.php?id=admins">My Account</a></li>
    <li class="logout warn"><a href="index.php?id=logout">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
  <ul class="main">
    <li class="dashboard"><a href="index.php?id=landing">Dashboard</a></li>
	<li class="usr"><a href="index.php?id=messages&show=25">Messages</a></li>
    <li class="users"><a href="index.php?id=admins">Manage Users</a></li>
	<li class="clinicphoto"><a href="index.php?id=clinicphoto">About Us Clinic Photo</a></li>
	<li class="clinicphoto"><a href="index.php?id=slider">Slider Images</a></li>
	<li class="clinicphoto"><a href="index.php?id=treatments">Treatments</a></li>
	<li class="clinicphoto"><a href="index.php?id=staff">Staff</a></li>
	<li class="clinicphoto"><a href="index.php?id=contactinfo">Contact Info</a></li>
	
  </ul>
  
</nav>

<main role="main">
  
  
  
  

</main>


