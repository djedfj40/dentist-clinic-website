<?php
error_reporting(0);

include("../../config.php");


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}



$showimagequery = "SELECT * FROM clinicphoto";

$resultshowimage = mysqli_query($conn, $showimagequery);

$contactinfoquery = "SELECT * FROM contactinfo";

$contactinfo = mysqli_query($conn, $contactinfoquery);

$contactinforow = mysqli_fetch_array($contactinfo);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
    
  <title>Dental clinic website About</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
  <meta name="Robots" content="INDEX,FOLLOW">
  <meta name="revisit-after" content="1 days"/>  
  <meta name="keywords" content="prodentalia, pro dentalia, dentalia, prod oral and dental health, prod, prodentalya, pro dentalya, sinan Tozoğlu, professor Sinan Tozoğlu, Professor Sinan Tozoğlu, Prof Sinan Tozoğlu, Sinan Tozoğlu, Sinan Tozoğlu, Prof Sinan Tozoğlu, Professor Sinan Tozoğlu, mouth dental and maxillofacial surgery, dental and maxillofacial surgery, oral surgery, maxillofacial surgery, dental surgery, antalya, antalya dental, dental antalya, antalya dental professor">
  <meta name="prodentalia, pro dentalia, dentalia, prod oral and dental health, prod, prodentalya, pro dentalya, sinan Tozoğlu, professor Sinan Tozoğlu, Professor Sinan Tozoğlu, Prof Sinan Tozoğlu, Sinan Tozoğlu, Sinan Tozoğlu, Prof Sinan Tozoğlu, Professor Sinan Tozoğlu, mouth dental and maxillofacial surgery, dental and maxillofacial surgery, oral surgery, maxillofacial surgery, dental surgery, antalya, antalya dental, dental antalya, antalya dental professor">
  <meta name="Abstract" content="prodentalia, pro dentalia, dentalia, prod oral and dental health, prod, prodentalya, pro dentalya, sinan Tozoğlu, professor Sinan Tozoğlu, Professor Sinan Tozoğlu, Prof Sinan Tozoğlu, Sinan Tozoğlu, Sinan Tozoğlu, Prof Sinan Tozoğlu, Professor Sinan Tozoğlu, mouth dental and maxillofacial surgery, dental and maxillofacial surgery, oral surgery, maxillofacial surgery, dental surgery, antalya, antalya dental, dental antalya, antalya dental professor">
  <meta name="page-topic" content="Dental Clinic Website">
  <meta name="description" content="Dental Clinic Website">
  <meta name="audience" content="all">
  <meta name="Language" content="Turkish">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <link href="../../assets/style.css" rel="stylesheet" type="text/css" />
    
  <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

  <script src="../../assets/scripts/cbp-af-header/modernizr.custom.js"></script>
  
  <link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
  <script src="../../assets/scripts/back-to-top-jquery.js"></script>
  <script>
  $(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
  });
  </script>

  <script src="../../assets/scripts/lightbox/jquery.js"></script>
  <script src="../../assets/scripts/lightbox/lightbox.js"></script>
  <script type="text/javascript">
	$(function() {
		$('#picture a').lightbox({});
	});
  </script>

<!-- Global site tag (gtag.js) - Google Ads: 726926688 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-726926688"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-726926688'); </script>

</head>

<body>
  
  
  
  <div id="toTop">Back To Top</div>
  
  <!-- ust alan baslangic -->
  <div class="cbp-af-header">
    
    <div class="cbpah-yesil">
        
      <ul class="baslik-iletisim">
        <li><a class="anas" href="index.php">Homepage</a></li>
        <li><a class="tele"><?php echo $contactinforow['phonenumber'];?></a></li>
        <li><a class="mail" href="mailto:info@<?php echo $contactinforow['email'];?>"><?php echo $contactinforow['email'];?></a></li> 
        <div class="clear"></div>
      </ul>
        
      <ul class="ikonmenu">
        <li><a class="fb" href="<?php echo $contactinforow['facebook'];?>" target="_blank">Facebook</a></li>
        <li><a class="ig" href="<?php echo $contactinforow['instagram'];?>" target="_blank">Instagram</a></li>
        <li><a class="tw" href="<?php echo $contactinforow['twitter'];?>" target="_blank">Twitter</a></li>
        <li><a class="yt" href="<?php echo $contactinforow['youtube'];?>" target="_blank">YouTube</a></li>
       
        
        
        <div class="clear"></div>
      </ul>
        
      <div class="clear"></div>
            
    </div>

    <a class="logo" href="index.php">ProDentalia Dental Clinic, Professor Sinan Tozoglu, Antalya, Turkey</a>

    <div class="topnav" id="myTopnav">
      <a class="active" href="about.php">ABOUT US</a>
      <div class="dropdown">
        
        
      </div>  
      <div class="dropdown">
          <button class="dropbtn"><a href="staff.php">STAFF</a></button>
        <div class="dropdown-content">
          
        </div>
      </div> 
      <a href="contact.php">CONTACT</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776; <span>MENU</span></a>
    </div>
        
    <div class="clear"></div>

  </div>
  <!-- ust alan bitis -->
  
  <div class="sayfabaslik">
    <h3>ABOUT US</h3> 
    <img src="../../assets/img/sayfabaslik/kurumsal.jpg" />  
  </div>

  <div class="icerikalani">
    <div class="icerik"> 
      
      <h1>Our Dental Clinic</h1>
      
      <p><?php echo $contactinforow['aboutdescription'];?></p>
      
      <br><br>
      
      <h1>Photos from our Clinic</h1>
      
      <div class="kucukresimler" id="picture">
	  
	  
	  <?php while($resultshowimagerow = mysqli_fetch_array($resultshowimage)){ 
	  
	  
	  ?>
        <a href="<?php echo substr($resultshowimagerow['path'], 3); ?>"><img src="<?php echo  substr($resultshowimagerow['path'], 3); ?>" height=200px></a>
		
		
         
	  <?php
	  } 
	  
	  ?>
    </div>
      
    </div>
  </div>
  
  <footer>

    
   
    <div class="clear"></div>    
    <br>
    
    <div class="footermenu">

    <ul>
      <li><b>CONTACT US</b></li>
      <br>
      
      <li><?php echo $contactinforow['address'];?><br></li>
      <li><a><?php echo $contactinforow['phonenumber'];?><br></a>
      <li><a href="mailto:info@<?php echo $contactinforow['email'];?>"><?php echo $contactinforow['email'];?></a></li>
    </ul>

    <ul>
      <li><b>SITE MAP</b></li>
      <br>
      <li><a href="index.php">Homepage</a></li>
      <li><a href="about.php">About Us</a></li>
      
      <li><a href="staff.php">Staff</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
    
    <ul>
      <li><b>WORKING HOURS</b></li>
      <br>
      <li><span>Monday</span>09:00 - 18:00</li>
      <li><span>Tuesday</span>09:00 - 18:00</li>
      <li><span>Wednesday</span>09:00 - 18:00</li>
      <li><span>Thursday</span>09:00 - 18:00</li>
      <li><span>Friday</span>09:00 - 18:00</li>
      <li><span>Saturday</span>09:00 - 15:00</li>
      <li><span>Sunday</span>Closed</li>
    </ul>

    <ul class="gizle">
      <li><b>SOCIAL NETWORKS</b></li>
      <br>
      <li><a href="<?php echo $contactinforow['facebook'];?>" target="_blank">Facebook</a></li>
      <li><a href="<?php echo $contactinforow['instagram'];?>" target="_blank">Instagram</a></li>
      <li><a href="<?php echo $contactinforow['twitter'];?>" target="_blank">Twitter</a></li>
      <li><a href="<?php echo $contactinforow['youtube'];?>" target="_blank">YouTube</a></li>
    </ul>
    
    </div>

      <p class="imza">All rights reserved for<br>Dental Clinic<br><br>©2021<br><br></p>
    
    <div class="clear"></div>

  </footer>
          
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
      
  <script src="../../assets/scripts/cbp-af-header/classie.js"></script>
  <script src="../../assets/scripts/cbp-af-header/cbpAnimatedHeader.min.js"></script>      
    
</body>



</html>