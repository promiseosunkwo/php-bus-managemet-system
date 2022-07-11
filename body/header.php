<?php
ob_start();
require_once("includes/load.php");
if (!isset($_GET["user_id"])) {
$user_id = 0;
}else {
$user_id = $_GET["user_id"];
}
ob_end_flush();
?>
<style>
/* HOVER FOR Navbar */
.nav-item :hover{
  background-color: #444;
  border-radius: 5px;

}
.nav-item{
transition: all .4s;
}

/* HOVER FOR REGISTER & LOGIN */
.btn-outline-light:hover{
color: #fff;
background-color: #B00F0F;

}

</style>





<div class="site-wrap" id="home-section">

<div class="site-mobile-menu site-navbar-target">
<div class="site-mobile-menu-header">
<div class="site-mobile-menu-close mt-3">
<span class="icon-close2 js-menu-toggle"></span>
</div>
</div>
<div class="site-mobile-menu-body"></div>
</div>


<!-- IMPORTED -->



<nav class=" navbar fixed-top navbar navbar-expand-lg navbar-light bg-dark" style=" border-bottom:4px solid #E31F1F;">

<div class="container" style="font-family:rale;">
<a class="navbar-brand text-light" href="#" style="font-size:30px;"><img src="images/logo.png" style="width:20%;"><strong style="font-family: brush script mt;"><span class="text-danger" style="font-style:bold;"></span></strong></a>

  <button class="navbar-toggler bg-white"  type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
  <span class="navbar-toggler-icon"></span>
  </button>


<div class="col-sm-8" style="font-size:14px; font-family: 'Montserrat', sans-serrif;;">
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav" >
<li class="nav-item">
<a class="nav-link text-white" href="index.php">HOME</a>
</li>
<li class="nav-item">
<a class="nav-link text-white" href="about.php">ABOUT</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link text-white" href="pickup.php">PICKUP</a>
</li> -->
<li class="nav-item">
<a class="nav-link text-white" href="routes.php"> ROUTES</a>
</li>
<li class="nav-item">
<a class="nav-link text-white" href="contact.php"> CONTACT</a>
</li>
<?php if ( $user_id == 0) {?>
<li class="nav-item">
<a class="nav-link text-white" href="login.php"> LOGIN</a>
</li>
<li class="nav-item">
<a class="nav-link text-white" href="register.php"> REGISTER</a>
</li>
<?php }else {?>
  <li class="nav-item">
  <a class="nav-link text-white" href="logout.php"> LOGOUT</a>
  </li>
  <li class="nav-item">
  <a class="nav-link text-white" href="user_dashboard.php?user_id=<?php echo $user_id; ?>">DASHBOARD</a>
  </li>

<?php } ?>
<!-- <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Dropdown link
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</li> -->
</ul>
</div>

</div>
</div>
<!-- <div class="">
<button type="button" class="btn btn-outline-light btn-block">Logout</button>
</div>
<div class="p-2">
<button type="button" class="btn btn-outline-light">Dashboard</button>
</div> -->
</nav>
