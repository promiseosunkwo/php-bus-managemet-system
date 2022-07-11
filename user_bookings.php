<?php
ob_start();
require_once('includes/load.php');
require_once("url.php");
if (!isset($_GET["user_id"])) {
header("location:login.php");
}else {
$user_id = $_GET["user_id"];
}
// if (isset($_GET["p_key"]) ) {
// $p_key = $_GET["p_key"];
// }
ob_end_flush();
 ?>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

<!--Jquery and bootstrap  cdn this version of jquery connects with datatale more -->
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!--- Datatables ---------->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
<!-- end Datatables ---------->

<!-- <link rel="stylesheet" href="../css/mycss/admin_user_profile.css"> -->
<link rel="stylesheet" href="../css/mycss/table_style.css">
</head>
<body>

<div class="container-xl">
<div class="table-responsive">
<div class="table-wrapper">
<div class="table-title">
<div class="row">
<div class="col-sm-6">
<h2>Bookings <b></b></h2>
</div>

</div>
</div>

<table id="bus_table" class="table table-striped table-hover table-responsive">
<thead>
<tr>
<th>Departure</th>
<th>Arrival</th>
<th>Departure Date</th>
<th>Departure Time</th>
<th>Seat(s)</th>
<th>Date of Booking</th>
<th>View</th>
<th>Status</th>
</tr>
</thead>
<?php

$bookings = $select->get_user_bookings('booked_seats',$user_id);
foreach ($bookings as $booking) {
  $key = $booking->p_key;
  $customer_details = $select->get_booking_details('customer_details',$key);
  $book_details = $select->get_booking_details('bookings',$key);
 ?>



<tbody>

<tr>

<td><?php echo $booking->departure; ?></td>
<td><?php echo $booking->arrival; ?></td>
<td><?php echo date('d-M-y', strtotime($booking->date_of_movement)); ?></td>
<td><?php echo date('h:i a' , strtotime($booking->time_of_movement)); ?></td>
<td><?php echo $book_details->no_of_seats; ?></td>
<td><?php echo date('d-M-y', strtotime($book_details->date_of_booking)); ?></td>
<td>
<a data-id="" href="admin/payment_receipt.php?key=<?php echo $key;?>" id="view"  ><i class="material-icons" data-toggle="tooltip" title="Receipt">&#xE417;</i></a>
</td>
<td>
<?php
if ($booking->status == 0) {
  ?>
<span>Completed</span>
<?php }elseif ($booking->status == 1) {
?>
<span>Pending</span>
<?php }elseif ($booking->status == 2) {
?>
<span>Cancelled</span>
<?php } ?>
</td>
</tr>

</tbody>
<?php } ?>
</table>
<!-- datatables -->
<script>
  $(document).ready(function(){
  $('#bus_table').DataTable();
  });
</script>
  <!--end datatables -->
<!-- <div class="clearfix">
<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
<ul class="pagination">
<li class="page-item disabled"><a href="#">Previous</a></li>
<li class="page-item"><a href="#" class="page-link">1</a></li>
<li class="page-item"><a href="#" class="page-link">2</a></li>
<li class="page-item active"><a href="#" class="page-link">3</a></li>
<li class="page-item"><a href="#" class="page-link">4</a></li>
<li class="page-item"><a href="#" class="page-link">5</a></li>
<li class="page-item"><a href="#" class="page-link">Next</a></li>
</ul>
</div>
</div> -->
</div>
</div>
