<?php
require_once("../includes/load.php");


if (isset($_GET["key"])) {
$key = $_GET["key"];


if (isset($_GET["action"]) && $_GET["action"] == 'cancel_booking') {
$query = $db->get_results("UPDATE booked_seats SET status = 2 WHERE p_key = '$key'");
if ($query) {
  echo "<script>alert('Your Booking has been cancelled')
  history.go(-2);
  </script>";
}
}
}

$booked_seats = $select->get_booking_details('booked_seats',$key);
$customer_details = $select->get_booking_details('customer_details',$key);
$bookings = $select->get_booking_details('bookings',$key);
$current_date = date('Y/m/d');
$movement_date = date('Y/m/d', strtotime($booked_seats->date_of_movement));
$cd = DateTime::createFromFormat('Y/m/d', $current_date);
$dd = DateTime::createFromFormat('Y/m/d', $movement_date );
$cd_timestamp = $cd->getTimestamp();
$dd_timestamp = $dd->getTimestamp();
$customer_name = unserialize($customer_details->p_full_name);
$customer_gender = unserialize($customer_details->p_gender);
$unit_price = $bookings->total / $bookings->no_of_seats;
 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/mycss/payment_receipt.css">
  </head>
  <body style="font-family: 'Montserrat', sans-serrif;">

<div class="container bootstrap snippets bootdeys">
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default invoice" id="invoice">
<div class="panel-body">
<div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
<div class="row">

<div class="col-sm-6 top-left">
<!-- <i class="fa fa-rocket"></i> -->
</div>

<div class="col-sm-6 top-right">
<h3 class="marginright"><?php echo $booked_seats->departure  ?>- <?php echo $booked_seats->arrival ?></h3>
<span class="marginright"><?php echo date('d-M-y', strtotime($bookings->date_of_departure));?></span> -
<span class="marginright"><?php echo date('h:i a', strtotime($bookings->time_of_departure));?></span>
</div>

</div>
<hr>
<div class="row">

<div class="col-xs-4 from">
<p class="lead marginbottom">COMPANY ADDRESS</p>
<p>HEAD OFFICE</p>
<p>No 20 Edenwu Street,New Haven</p>
<p>Enugu State, 94103</p>
<p><b>Phone:</b> +234-8039-678-56</p>
<p><b>Email:</b> <?php echo $customer_details->p_email; ?></p>
</div>

<div class="col-xs-4 to">
<p class="lead marginbottom">CUSTOMER DETAILS</p>

<p><b> Email:</b> <?php  echo $customer_details->p_email; ?></p>
<p><b>Customer Phone:</b> <?php  echo $customer_details->p_phone; ?></p>
<p><b>Next of Kin:</b> <?php  echo $customer_details->p_next_of_kin; ?></p>
<p><b>Next of Kin Phone:</b> <?php  echo $customer_details->p_next_of_kin_phone; ?></p>


</div>

<div class="col-xs-4 text-right payment-details">
<p class="lead marginbottom payment-info">Payment details</p>
<p><b>Date of Booking:</b> <?php echo date('d-M-y', strtotime($bookings->date_of_booking));?></p>


<p><b>No of Seat(s):</b> <?php echo $bookings->no_of_seats;?></p>

<?php $seat_preg = preg_split('/,/' , $booked_seats->seat_position);
foreach ($seat_preg as $key => $value) if ($key&1) unset($seat_preg[$key]);
 ?>
<p><b>Seat Position(s):</b> <?php  echo implode("," ,$seat_preg);?></p>

<!-- <p>Account Name: Flatter</p> -->
</div>

</div>

<div class="row table-row">
<table class="table table-striped">
<thead>
<tr>
<th class="text-center" style="width:5%">#</th>
<th style="width:50%">Name</th>
<th class="text-right" style="width:15%">Gender</th>
<th class="text-right" style="width:15%">Unit Price</th>
<!-- <th class="text-right" style="width:15%">Total Price</th> -->
</tr>
</thead>

<tbody>
  <?php
  $counter = 1;
  foreach (array_combine($customer_name,$customer_gender) as $name => $gender) {
   ?>

<tr>

<td class="text-center"><?php echo $counter++; ?></td>
<td><?php echo  $name;?></td>
<td class="text-right"><?php echo $gender; ?></td>
<td class="text-right">₦ <?php echo number_format($unit_price); ?></td>
<!-- <td class="text-right">$180</td> -->
</tr>
<?php } ?>


</tbody>
</table>

</div>

<div class="row">
<div class="col-xs-6 margintop">
<p class="lead marginbottom">THANK YOU!</p>

<button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
<button class="btn btn-info" onclick="return history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
<?php
if ($dd_timestamp > $cd_timestamp && $booked_seats->status == 1) {
  $key = $_GET["key"];
 ?>
 <a href="?key=<?php echo $key ?>&action=cancel_booking" onclick="return confirm('Are you sure u want to cancel this booking?')" class="btn btn-primary" >Cancel Booking</a>

<?php }?>
</div>
<div class="col-xs-6 text-right pull-right invoice-total">
<p>Subtotal :₦<?php echo number_format($bookings->total); ?></p>
<p>Discount (0%) : ₦ <?php echo number_format($bookings->discount); ?></p>
<p>VAT (0%) : ₦ 0.00 </p>
<p>Total :₦ <?php echo number_format($bookings->total); ?></p>

</div>
</div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>
