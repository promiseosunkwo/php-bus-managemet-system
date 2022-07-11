<?php
ob_start();
require_once("../includes/load.php");
if (!isset($_GET["staff_id"])) {
header("location:admin_login.php");
}else {
$staff_id = $_GET["staff_id"];
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
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Bootstrap core CSS -->
  <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../css/mycss/admin_dashboard.css">
  <!-- <link href="../css/seat_select/ui.css" rel="stylesheet" type="text/css" /> -->

  <!-- Custom styles for this template -->
  <link href="../css/mycss/template_sidebar.css" rel="stylesheet">
  <link href="../css/mycss/admin_user_form.css" rel="stylesheet">
  <!-- <link href="../css/mycss/payment_form.css" rel="stylesheet" type="text/css" /> -->

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body style="font-family: 'Montserrat', sans-serrif;">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
<div class="bg- border-right" id="sidebar-wrapper">
<div class="sidebar-heading">Admin Panel </div>
<div class="list-group list-group-flush mt-3">
<a href="admin_dashboard.php?staff_id=<?php echo $staff_id; ?>" class="list-group-item list-group-item-action bg-light">Dashboard</a>
<a href="?staff_id=<?php echo $staff_id; ?>&action=bus_management" class="list-group-item list-group-item-action bg-light">Bus Management</a>
<a href="?staff_id=<?php echo $staff_id; ?>&action=bookings" class="list-group-item list-group-item-action bg-light">Bookings</a>
<a href="?staff_id=<?php echo $staff_id; ?>&action=admin_users" class="list-group-item list-group-item-action bg-light">Staff Profile</a>
<a href="?staff_id=<?php echo $staff_id; ?>&action=users" class="list-group-item list-group-item-action bg-light">Registered Users</a>
<a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
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
if (isset($_GET["action"]) && $_GET["action"] == 'bus_management') {
    include("bus_management.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'admin_users') {
    include("admin_users.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'accounts') {
    include("accounts.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'bookings') {
    include("bookings.php");
}elseif (isset($_GET["action"]) && $_GET["action"] == 'users') {
    include("registered_users.php");
}
// include("bookings.php");
// include("bus_management.php");
// include("add_bus_details.php");
// include("add_user_form.php");
 ?>


    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript disturbing my datatables for admin -->
<!-- <script src="../js/myjs/jquery.min.js"></script>
<script src="../js/myjs/bootstrap.bundle.min.js"></script> -->

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
