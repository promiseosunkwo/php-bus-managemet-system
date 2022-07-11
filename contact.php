<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Contact Us</title>
<link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">


<!-- Font awesome 5 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/brands.min.css" integrity="sha512-AMDXrE+qaoUHsd0DXQJr5dL4m5xmpkGLxXZQik2TvR2VCVKT/XRPQ4e/LTnwl84mCv+eFm92UG6ErWDtGM/Q5Q==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<!-- custom style -->


<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<!-- custom style -->
</head>
<body tyle="font-family: 'Montserrat', sans-serrif;">
<?php
include("body/header.php");
?>

<style media="screen">



/* .container {
background: #FFFFFF;
width: 900px;
height: 650px;
margin: 5% auto;
position: relative;
} */
.container .map {
width: 100%;
/* float: left; */
}
.container .contact-form {
width: 55%;
/* margin-left: 2%; */
/* float: left; */
}
.container .contact-form .title {
font-size: 2.5em;
font-weight: 700;
color: #242424;
margin: 5% 8%;
}

.container .contact-form .subtitle {
font-size: 1.2em;
font-weight: 400;
margin: 0 4% 5% 8%;
}
.container .contact-form input,
.container .contact-form textarea {
width: 330px;
padding: 3%;
margin: 2% 8%;
color: #242424;
border: 1px solid #B7B7B7;
}
.container .contact-form input::placeholder,
.container .contact-form textarea::placeholder {
color: #242424;
}
.container .contact-form .btn-send {
background: #A383C9;
width: 180px;
height: 60px;
color: #FFFFFF;
font-weight: 700;
margin: 2% 8%;
border: none;
}

</style>




<div class="container">
<div class="map  mt-5">
<!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=20%20edenwu%20street%20new%20haven%20enugu&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org">putlocker</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">how to embed google map in wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> -->
<iframe src="https://maps.google.com/maps?q=20%20edenwu%20street%20new%20haven%20enugu&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="contact-form">
<h1 class="title">Contact Us</h1>
<h2 class="subtitle">We are here assist you.</h2>
<form action="">
<input type="text" name="name" placeholder="Your Name" />
<input type="email" name="e-mail" placeholder="Your E-mail Adress" />
<input type="tel" name="phone" placeholder="Your Phone Number"/>
<textarea name="text" id="" rows="8" placeholder="Your Message"></textarea>
<button class="btn-send">Get a Call Back</button>
</form>
</div>
</div>





<?php
include("body/footer.php");
?>
</body>
</html>
