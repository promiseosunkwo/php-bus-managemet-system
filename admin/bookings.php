<?php
ob_start();
require_once('../includes/load.php');
if (!isset($_GET["staff_id"])) {
header("location:admin_login.php");
}else {
$staff_id = $_GET["staff_id"];
}
if (isset($_GET["p_key"]) ) {
$p_key = $_GET["p_key"];
$b_delete = $select->delete_bookings('bookings',$p_key);
$c_delete = $select->delete_bookings('booked_seats',$p_key);
$d_delete = $select->delete_bookings('customer_details',$p_key);
if ($b_delete && $c_delete && $d_delete) {
echo "<script>alert('Booking Record Deleted sucessfully')
window.location.replace('admin_dashboard.php?staff_id=$staff_id&action=bookings')
</script>";
}else {
echo "<script>alert('Something went wrong!')</script>";
exit();
}
}
if (isset($_GET["key"])) {
$key = $_GET["key"];
$query = $db->get_results("UPDATE booked_seats SET status = 2 WHERE p_key = '$key'");
if ($query) {
echo "<script>alert('Your Booking has been completed')
window.location.replace('admin_dashboard.php?staff_id=$staff_id&action=bookings')
</script>";
}
}
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
<th>Actions</th>
<th>Status</th>
</tr>
</thead>
<?php

$bookings = $select->get_bookings('booked_seats');
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
<td style="width:15%;">
<a data-id="" href="payment_receipt.php?key=<?php echo $key;?>" id="view"  ><i class="material-icons" data-toggle="tooltip" title="Receipt">&#xE417;</i></a>
<!-- <a  href=""  class="Delete"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE8B8;</i></a> -->
<a  href="?staff_id=<?php echo $staff_id;?>&action=bookings&p_key=<?php echo $key;?>" onclick="return confirm('Are you sure you want to delete this booking?')" class="Delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xe92e;</i></a>

<!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
</td>
<td>
  <?php
  if ($booking->status == 1) {
    $staff_id = $_GET["staff_id"];
    ?>
  <a href="?staff_id=<?php echo $staff_id ?>&key=<?php echo $booking->p_key ?>&action=bookings&job=complete" onclick="return confirm('Press ok to confirm customer payment')" class="btn btn-info text-white">Complete</a>
  <?php }elseif ($booking->status == 0) {
  ?>
  <a href="#" class="btn btn-success text-white disabled">Completed</a>
  <?php }elseif ($booking->status == 2) {
  ?>
  <a href="#" class="btn btn-danger text-white disabled">Cancelled</a>
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
