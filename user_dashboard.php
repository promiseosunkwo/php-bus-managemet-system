<?php
ob_start();
require_once("includes/load.php");
if (!isset($_SESSION['email'])) {
  header('location:login.php');
  exit();
}
if (!isset($_GET["user_id"])) {
header("location:login.php");
}else {
$user_id = $_GET["user_id"];
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- FONT FAMILY -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Bootstrap core CSS -->
  <!-- <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/mycss/admin_dashboard.css">
<link href="css/seat_select/ui.css" rel="stylesheet" type="text/css" /> -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../css/mycss/admin_dashboard.css">
  <link href="css/mycss/template_sidebar.css" rel="stylesheet">
  <link href="css/mycss/admin_user_form.css" rel="stylesheet">
  <!-- <link href="css/mycss/payment_form.css" rel="stylesheet" type="text/css" /> -->

  <!-- tabpill is for the booking area -->
  <link rel="stylesheet" href="css/tabpill.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<style media="screen">
  .circle-tile {
    margin-bottom: 15px;
    text-align: center;
  }
  .circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
  }
  .circle-tile-heading .fa {
    line-height: 80px;
  }
  .circle-tile-content {
    padding-top: 50px;
  }
  .circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
  }
  .circle-tile-description {
    text-transform: uppercase;
  }
  .circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
  }
  .circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
  }
  .circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
  }
  .circle-tile-heading.green:hover {
    background-color: #138F77;
  }
  .circle-tile-heading.orange:hover {
    background-color: #DA8C10;
  }
  .circle-tile-heading.blue:hover {
    background-color: #2473A6;
  }
  .circle-tile-heading.red:hover {
    background-color: #CF4435;
  }
  .circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
  }
  .tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
  }

  .dark-blue {
    background-color: #34495E;
  }
  .green {
    background-color: #16A085;
  }
  .blue {
    background-color: #2980B9;
  }
  .orange {
    background-color: #F39C12;
  }
  .red {
    background-color: #E74C3C;
  }
  .purple {
    background-color: #8E44AD;
  }
  .dark-gray {
    background-color: #7F8C8D;
  }
  .gray {
    background-color: #95A5A6;
  }
  .light-gray {
    background-color: #BDC3C7;
  }
  .yellow {
    background-color: #F1C40F;
  }
  .text-dark-blue {
    color: #34495E;
  }
  .text-green {
    color: #16A085;
  }
  .text-blue {
    color: #2980B9;
  }
  .text-orange {
    color: #F39C12;
  }
  .text-red {
    color: #E74C3C;
  }
  .text-purple {
    color: #8E44AD;
  }
  .text-faded {
    color: rgba(255, 255, 255, 0.7);
  }


</style>
<body style="font-family: 'Montserrat', sans-serrif;">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
<div class="bg- border-right" id="sidebar-wrapper">
<div class="sidebar-heading">Admin Panel </div>
<div class="list-group list-group-flush mt-3">
<a href="user_dashboard.php?user_id=<?php echo $user_id; ?>" class="list-group-item list-group-item-action bg-light">Dashboard</a>
<a href="?user_id=<?php echo $user_id; ?>&action=book_seat" class="list-group-item list-group-item-action bg-light">Book a Seat</a>
<a href="?user_id=<?php echo $user_id; ?>&action=all_bookings" class="list-group-item list-group-item-action bg-light">Bookings</a>
<a href="?user_id=<?php echo $user_id; ?>&action=hire_bus" class="list-group-item list-group-item-action bg-light">Hire a Bus</a>
<a href="?user_id=<?php echo $user_id; ?>&action=edit_profile" class="list-group-item list-group-item-action bg-light">Edit Profile</a>
<a href="?user_id=<?php echo $user_id; ?>&action=change_password" class="list-group-item list-group-item-action bg-light">Change Password</a>
<a href="?user_id=<?php echo $user_id; ?>&action=contact_us" class="list-group-item list-group-item-action bg-light">Contact Us</a>
</div>
</div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
<div id="page-content-wrapper">

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom text-white">
<span class="navbar-toggler-icon" id="menu-toggle"></span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

    <!-- <li class="text-dark mt-3"></li> -->
    <form class="" action="index.html" method="post">
    <div class="input-group">
    <input type="text" class="form-control search_input" name="" value="" placeholder="Search">
    <button type="button" class="btn btn-light search_button" name="button"><i class="fa fa-search text-danger"></i></button>
    </div>
    </form>


  <ul class="navbar-nav">
  <li class="nav-item icon-parent"> <a href="#" class="nav-link icon-bullet"> <i class="fa fa-comment text-muted fa-lg"></i></a></li>
  <li class="nav-item icon-parent"> <a href="#" class="nav-link icon-bullet"> <i class="fa fa-bell text-muted fa-lg"></i></a></li>
  <li class="nav-item ml-md-auto"> <a href="#" class="nav-link "> <i class="fa fa-arrow-right text-danger fa-lg"></i></a></li>
  </ul>



<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="logout.php" id="navbarDropdown" role="button">
Logout
</a>
<!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="logout.php">Logout</a> -->
<!-- <a class="dropdown-item" href="#">Another action</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a> -->
<!-- </div> -->
</li>
</ul>
</div>



</nav>


<?php
if (isset($_GET["action"]) && $_GET["action"] == 'book_seat') {
echo "<script>window.location.replace('index.php?user_id=$user_id')</script>";
}elseif (isset($_GET["action"]) && $_GET["action"] == 'admin_users') {
    include("admin_users.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'all_bookings') {
    include("user_bookings.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'edit_profile') {
    include("edit_profile.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'change_password') {
    include("change_password.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'contact_us') {
    include("contact_us.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'hire_bus') {
    include("hire_bus.php");
}

else {
  include("dashboard_analytics.php");
}


 ?>




</div>
</div>



<?php
// if (isset($_GET["action"]) && $_GET["action"] == 'bus_management') {
//     include("bus_management.php");
// }elseif (isset($_GET["action"]) && $_GET["action"] == 'admin_users') {
//     include("admin_users.php");
// }elseif (isset($_GET["action"]) && $_GET["action"] == 'accounts') {
//     include("accounts.php");
// }elseif (isset($_GET["action"]) && $_GET["action"] == 'bookings') {
//     include("bookings.php");
// }

// include("bookings.php");
// include("bus_management.php");
// include("add_bus_details.php");
// include("add_user_form.php");
 ?>


    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="../js/myjs/jquery.min.js"></script>
<script src="../js/myjs/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
</script>

<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>

</html>
