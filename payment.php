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
<?php
if (isset($_GET["to_id"])) {
  $to_id = $_GET["to_id"];
}
if (isset($_GET["return_id"])) {
  $return_id = $_GET["return_id"];
}


  if (isset($_POST["submit_continue$return_id"])) {
    // $seat_count = $_POST["seat_count"];
    // $seat_number = $_POST["seat_number"];
    $h_id = $_POST["fro_hidden_id"];
    $fro_time = $_POST["fro_time_"];
    $fro_departure = trim($_POST["fro_departure"]);
    $fro_arrival = trim($_POST["fro_arrival"]);
    $fro_price = $_POST["fro_price"];
    // $fro_adult_seat = $_POST["fro_adult_seat"];
    $fro_departing_date = $_POST["return_date"];
    // $fro_child_seat = $_POST["fro_child_seat"];
    // $fro_total_price = ($fro_adult_seat + $fro_child_seat) * $fro_price;

    $to_departure = trim($_POST["to_departure"]);
    $to_arrival = trim($_POST["to_arrival"]);
    $to_departing_date = $_POST["to_departing_date"];
    $to_departing_time = $_POST["to_departing_time"];
    $to_seat_number = $_POST["to_seat_number"];
    $to_seat_count = $_POST["to_seat_count"];
    $to_price = $_POST["to_price"];
    $to_adult_seat = $_POST["to_adult_seat"];
    $to_child_seat = $_POST["to_child_seat"];




$fro_seat_number = isset($_POST['fro_seat_number'])?$_POST['fro_seat_number']:'not yet';
$fro_seat_count = isset($_POST['fro_seat_count'])?$_POST['fro_seat_count']:'not yet';
if ($fro_seat_count != $to_seat_count ) {
  echo "<script>
  alert('Selected seats does not Match!');
  history.go(-1);
  </script>";
}elseif ( $to_seat_count != $to_adult_seat + $to_child_seat) {
  echo "<script>
  alert('Selected seats does not Match!');
  history.go(-1);
  </script>";
}
}
$fro_sub_total = $fro_price * $fro_seat_count;
$to_sub_total = $to_price * $to_seat_count;
$grand_total = $to_sub_total + $fro_sub_total;
 ?>

<?php
if (isset($_POST["pay_all"])) {

  // print_r($_POST);
  $passenger_name = serialize($_POST["passenger_name"]);
  $gender = serialize($_POST["gender"]);
  $passenger_email = $_POST["passenger_email"];
  $passenger_phone =$_POST["passenger_phone"];
  $next_of_kin = $_POST["next_of_kin"];
  $next_of_kin_phone = $_POST["next_of_kin_phone"];
  $rand =  mt_rand(1,100000);
  $current_date = date('y-m-d');

  $post_to_departure = trim($_POST["post_to_departure"]);
  $post_to_arrival = trim($_POST["post_to_arrival"]);
  $post_to_seat_number = $_POST["post_to_seat_number"];
  $post_to_departing_date = $_POST["post_to_departing_date"];
  $post_to_departing_time = $_POST["post_to_departing_time"];
  $post_to_seat_count = $_POST["post_to_seat_count"];
  $post_to_price = $_POST["post_to_price"];
  $to_sub_total = $post_to_price * $post_to_seat_number;
  // $post_to_sub_total = $_POST["post_to_sub_total"];


  $post_fro_departure = trim($_POST["post_fro_departure"]);
  $post_fro_arrival = trim($_POST["post_fro_arrival"]);
  $post_fro_seat_number = $_POST["post_fro_seat_number"];
  $post_fro_departing_date = $_POST["post_fro_departing_date"];
  $post_fro_departing_time = $_POST["post_fro_departing_time"];
  $post_fro_seat_count = $_POST["post_fro_seat_count"];
  $post_fro_price = $_POST["post_fro_price"];
  $fro_sub_total = $post_fro_price * $post_fro_seat_number;
  // $post_fro_sub_total = $_POST["post_fro_sub_total"];

  // $fro_sub_total = $fro_price * $fro_seat_count;
  // $to_sub_total = $to_price * $to_seat_count;


  // $post_grand_total =  $_POST["post_grand_total"];

  $query1 = "INSERT INTO bookings (bus_id,p_key,no_of_seats,discount,total,date_of_departure,time_of_departure,date_of_booking)
            VALUES               ('$to_id','$rand','$post_to_seat_count',0,'$to_sub_total','$post_to_departing_date','$post_to_departing_time','$current_date')";

$query2 = "INSERT INTO bookings  (bus_id,p_key,no_of_seats,discount,total,date_of_departure,time_of_departure,date_of_booking)
            VALUES               ('$return_id','$rand','$post_fro_seat_count',0,'$fro_sub_total','$post_fro_departing_date','$post_fro_departing_time','$current_date')";

$query3 = "INSERT INTO customer_details (p_key,p_full_name,p_gender,p_email,p_phone,p_next_of_kin,p_next_of_kin_phone)
            VALUES               ('$rand','$passenger_name','$gender','$passenger_email','$passenger_phone','$next_of_kin','$next_of_kin_phone')";


$query4 = "INSERT INTO booked_seats (p_key,departure,arrival,seat_position,no_of_seats,date_of_movement,time_of_movement,user_id,status)
            VALUES               ('$rand','$post_to_departure','$post_to_arrival','$post_to_seat_number','$post_to_seat_count','$post_to_departing_date','$post_to_departing_time','$user_id',1)";

$query5 = "INSERT INTO booked_seats (p_key,departure,arrival,seat_position,no_of_seats,date_of_movement,time_of_movement,user_id,status)
            VALUES               ('$rand','$post_fro_departure','$post_fro_arrival','$post_fro_seat_number','$post_fro_seat_count','$post_fro_departing_date','$post_fro_departing_time','$user_id',1)";

            if ($db->query($query1) && $db->query($query2) && $db->query($query3) && $db->query($query4) && $db->query($query5)) {
           header("location: success_page.php?p_key=$rand&user_id=$user_id");
            }
}



 ?>


<!DOCTYPE HTML>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Payment Page</title>
<!-- OwlCarousel2 -->

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<!-- custom style -->
<link href="css/seat_select/ui.css" rel="stylesheet" type="text/css" />
<link href="css/seat_select/responsive.css" rel="stylesheet" type="text/css" />
<link href="css/mycss/payment_form.css" rel="stylesheet" type="text/css" />
<!-- font family style -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<script
src="https://code.jquery.com/jquery-3.5.1.slim.js"
integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
crossorigin="anonymous"></script>

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>
</head>

<body style="font-family: 'Montserrat', sans-serrif;">




<?php

include("body/header.php");

 ?>
















<form action="" method="post">

<?php
// if (isset($_POST["pay"])) {
//   print_r($_POST);
// }

 ?>

<main class="main-content mt-5 pt-5">
<section class="summary-cart">
<div class="container">
<div class="row">
<aside class="col-lg-9">
<div class="card">
<div class="table-responsive">




<!-- NAME AND EMAIL PART START  -->

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
<div class="card card0 border-0">
<div class="row d-flex">

<div class="col-lg-12">
<div class="card2 card border-0 px-4 py-5">

<?php
$counter = 1;
for ($i=0; $i < $fro_seat_count; $i++, $counter++) {
echo "  <div class='row'>
<div class='col-lg-6'>

<div class='row px-3'> <label class='mb-1'>
<h6 class='mb-0 text-sm'>Full Name (Passenger $counter)</h6>
</label> <input class='mb-4' type='text' name='passenger_name[$i]' placeholder='Enter Full Name'> </div>
</div>

<div class='col-lg-6'>
<div class='row px-3'> <label class='mb-1'>
<h6 class='mb-0 text-sm'>Gender (Passenger $counter)</h6>
</label>
<select class='form-control mb-4  m-1 pb-2' name='gender[$i]'>
<option value='' selected>Select Gender</option>
<option value='Male' >Male</option>
<option value='Female'>Female</option>
</select>
</div>


</div>
</div>";
}

   ?>








</div>
</div>
</div>


</div>
</div>

<!-- NAME AND EMAIL PART END  -->








<div class="container-fluid px-1 px-md-5">
<div class="card card0 border-0">
<div class="row d-flex">

<div class="col-lg-12">
<div class="card2 card border-0 px-4 py-5">


<!--START ROW FOR MORE THAN ONE PASSENGER -->
<div class="row">
<div class="col-lg-6">

<div class="row px-3"> <label class="mb-1">
<h6 class="mb-0 text-sm">Email Address</h6>
</label> <input class="mb-4" type="email" name="passenger_email" placeholder="Enter a valid email address" required> </div>
</div>

<div class="col-lg-6">
<div class="row px-3"> <label class="mb-1">
<h6 class="mb-0 text-sm">Phone Number</h6>
</label> <input class="mb-4" type="number" name="passenger_phone" placeholder="Enter a valid Phone Number"> </div>


</div>
</div>
<!--END ROW FOR MORE THAN ONE PASSENGER -->

<!--START ROW FOR MORE THAN ONE PASSENGER -->
<div class="row">
<div class="col-lg-6">

<div class="row px-3"> <label class="mb-1">
<h6 class="mb-0 text-sm">Next of kin Name</h6>
</label> <input class="mb-4" type="text" name="next_of_kin" placeholder="Enter next of kin full name"> </div>
</div>

<div class="col-lg-6">
<div class="row px-3"> <label class="mb-1">
<h6 class="mb-0 text-sm">Next of kin Phone Number</h6>
</label> <input class="mb-4" type="number" name="next_of_kin_phone" placeholder="Enter a valid Next of Kin Phone"> </div>


</div>
</div>
<!--END ROW FOR MORE THAN ONE PASSENGER -->




<!--
<div class="row px-3"> <label class="mb-1">
<h6 class="mb-0 text-sm">Password</h6>
</label> <input type="password" name="password" placeholder="Enter password"> </div> -->

  <!-- <a href="#" class="btn btn-danger btn-block mt-4"> Proceed to Pay </a> -->

</div>
</div>
</div>


</div>
</div>





</div> <!-- table-responsive.// -->
</div> <!-- card.// -->
</aside> <!-- col.// -->



<aside class="col-lg-3">
<div class="card mb-3">
<div class="card-body">
        <div class="form-group">


            <hr>
            <span><b>First Trip</b></span>
            <hr>

            <dl class="dlist-align">
            <dt>Depature:</dt>
            <dd class="text-right"><?php echo $to_departure; ?></dd>
            <input type="hidden" name="post_to_departure" value=" <?php echo $to_departure?> ">
            </dl>

            <dl class="dlist-align">
            <dt>Arrival:</dt>
            <dd class="text-right"><?php echo $to_arrival; ?></dd>
            <input type="hidden" name="post_to_arrival" value=" <?php echo $to_arrival?> ">
            </dl>

            <dl class="dlist-align">
            <dt>Seat No(s):</dt>
            <?php
             $to_preg = preg_split('/,/' , $to_seat_number);
            foreach ($to_preg as $key => $value) if ($key&1) unset($to_preg[$key]);
             ?>
            <dd class="text-right"><?php echo implode(',' , $to_preg); ?></dd>
            <input type="hidden" name="post_to_seat_number" value=" <?php echo $to_seat_number?> ">
            </dl>

            <dl class="dlist-align">
            <dt>Date:</dt>
            <dd class="text-right"><?php echo date('d-M-y', strtotime($to_departing_date)); ?></dd>
            <input type="hidden" name="post_to_departing_date" value=" <?php echo $to_departing_date?> ">
            </dl>

            <dl class="dlist-align">
            <dt>Time:</dt>
            <dd class="text-right"><?php echo date('h:i a' , strtotime($to_departing_time)); ?></dd>
            <input type="hidden" name="post_to_departing_time" value=" <?php echo date('G:i', strtotime($to_departing_time));?> ">
            </dl>

            <dl class="dlist-align">
            <dt>No of Seats:</dt>
            <dd class="text-right"><?php echo  $to_seat_count;?></dd>
            <input type="hidden" name="post_to_seat_count" value=" <?php echo $to_seat_count?> ">
            </dl>


            <dl class="dlist-align">
            <dt>Price Per Seat:</dt>
            <dd class="text-right"><?php echo number_format($to_price);?></dd>
            <input type="hidden" name="post_to_price" value=" <?php echo $to_price?> ">
            </dl>



            <hr>
            <span><b>Return Trip</b></span>
            <hr>

          <dl class="dlist-align">
          <dt>Depature:</dt>
          <dd class="text-right"><?php echo $fro_departure; ?></dd>
          <input type="hidden" name="post_fro_departure" value=" <?php echo $fro_departure?> ">
          </dl>

          <dl class="dlist-align">
          <dt>Arrival:</dt>
          <dd class="text-right"><?php echo $fro_arrival; ?></dd>
          <input type="hidden" name="post_fro_arrival" value=" <?php echo $fro_arrival?> ">
          </dl>

          <dl class="dlist-align">
          <dt>Seat No(s):</dt>
          <?php
           $fro_preg = preg_split('/,/' , $fro_seat_number);
          foreach ($fro_preg as $key => $value) if ($key&1) unset($fro_preg[$key]);
           ?>
          <dd class="text-right"><?php echo implode(',' , $fro_preg); ?></dd>
          <input type="hidden" name="post_fro_seat_number" value=" <?php echo $fro_seat_number ?> ">
          </dl>

          <dl class="dlist-align">
          <dt>Date:</dt>
          <dd class="text-right"><?php echo date('d-M-y', strtotime($fro_departing_date));?></dd>
          <input type="hidden" name="post_fro_departing_date" value=" <?php echo $fro_departing_date ?> ">
          </dl>


          <dl class="dlist-align">
          <dt>Time:</dt>
          <dd class="text-right"><?php echo date('h:i a' , strtotime($fro_time));?></dd>
          <input type="hidden" name="post_fro_departing_time" value=" <?php echo date('G:i', strtotime($fro_time)); ?> ">
          </dl>


          <dl class="dlist-align">
          <dt>No of Seats:</dt>
          <dd class="text-right"><?php echo $fro_seat_count;?></dd>
          <input type="hidden" name="post_fro_seat_count" value=" <?php echo $fro_seat_count ?> ">
          </dl>

          <dl class="dlist-align">
          <dt>Price per Seat:</dt>
          <dd class="text-right"><?php echo number_format($fro_price);  ?></dd>
          <input type="hidden" name="post_fro_price" value=" <?php echo $fro_price ?> ">
          </dl>

        </div>
</div>
</div> <!-- card.// -->
<div class="card">
<div class="card-body">
<dl class="dlist-align">
<dt>Sub Total 1:</dt>
<dd class="text-right">N<?php echo number_format($fro_sub_total); ?></dd>
<input type="hidden" name="post_fro_sub_total" value="<?php echo $fro_sub_total ?>">
</dl>
<dl class="dlist-align">
<dt>Sub Total 2:</dt>
<dd class="text-right">N<?php echo number_format($to_sub_total); ?></dd>
<input type="hidden" name="post_to_sub_total" value="<?php echo $to_sub_total ?>">
</dl>
<!-- <dl class="dlist-align">
<dt>Discount:</dt>
<dd class="text-right text-danger">N 0.00</dd>
</dl> -->
<dl class="dlist-align">
<dt>Grand Total:</dt>
<dd class="text-right text-dark b"><strong>N<?php echo number_format($grand_total); ?></strong></dd>
<input type="hidden" name="post_grand_total" value=" <?php echo $grand_total ?> ">
</dl>
<hr>
<p class="text-center mb-3">
<img src="images/payment_gateway.png" height="26">
</p>
<button type="submit" name="pay_all" class="btn btn-success text-white btn-block">Proceed to Pay</button>
<a href="#" onclick="return history.go(-1);"  class="btn btn-danger btn-block text-white">Back to Seat Selection</a>
</form>
</div> <!-- card-body.// -->
</div> <!-- card.// -->
</aside> <!-- col.// -->
</div> <!-- row.// -->
</div>
</section>
</main>

<?php
include("body/footer.php");

 ?>
 <!-- jquery -->
<script src="js/jquery-3.3.1.min.js"></script>
 <!-- jquery -->

<!-- OwlCarousel2 -->
<script src="owlcarousel/owl.carousel.min.js"></script>
</body>
