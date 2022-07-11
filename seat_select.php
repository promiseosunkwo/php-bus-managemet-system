<?php
ob_start();
ini_set('display_errors',0);
require_once("includes/load.php");
if (!isset($_GET["user_id"])) {
$user_id = 0;
}else {
$user_id = $_GET["user_id"];
}
ob_end_flush();




if (isset($_POST["book_seat"])) {
$to_departure = $db->clean_string($_POST["departure"]);
$to_arrival = $db->clean_string($_POST["arrival"]);
$to_departure_date = $db->clean_string($_POST["departure_date"]);
$table = "bus_management";
$current_date = date('Y/m/d');
$book_seat = $select->search_bus($to_departure,$to_arrival,$table);
$db_departure = $book_seat->departure;
$db_arrival =  $book_seat->arrival;
}


$cd = DateTime::createFromFormat('Y/m/d', $current_date);
if ($cd === false) {
    echo "<script>alert('Incorrect date string')
    window.location.replace('index.php?user_id=$user_id')
    </script>";

} else {
    $cd_timestamp = $cd->getTimestamp();
}

$dd = DateTime::createFromFormat('Y-m-d', $to_departure_date);
if ($dd === false) {
    echo "<script>alert('Incorrect date string')
    window.location.replace('index.php?user_id=$user_id')
    </script>";

} else {
    $dd_timestamp = $dd->getTimestamp();
}

 ?>



<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Select Seat</title>
    <!-- OwlCarousel2 -->



    <!-- <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script> -->
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
    <link href="css/seat_select/ui.css" rel="stylesheet" type="text/css" />
    <link href="css/seat_select/responsive.css" rel="stylesheet" type="text/css">
    <link href="css/seat_select/seat_layout.css" rel="stylesheet" type="text/css" />


    <!--jquery price changing -->
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



<?php

if ($cd_timestamp > $dd_timestamp ) {
 ?>

<div class="container " style="margin-top:150px;">
<div class="row bg-danger p-3">
<div class="col-lg-10 text-white">
<h3>No Result Found. </h3>
<h6>Please check details and search again!</h6>
</div>
<div class="col-lg-2">
<button type="button" href="index.php?user_id=<?php echo $user_id ?>" class="btn btn-outline-light text-light mt-4 p-2" id="btn_hover" name="button">Edit Search</button>
</div>
</div>
</div>

<?php }else {
  // session_start();
  $query = "SELECT * FROM $table WHERE departure = '$to_departure' AND arrival = '$to_arrival' AND suspend_bus = 0";
  $obj= $db->query($query);
  $rows = mysqli_num_rows($obj);
  if ($rows == 0 ) {
  echo "<div class='container' style='margin-top:150px;''>
  <div class='row bg-danger p-3'>
  <div class='col-lg-10 text-white'>
  <h3>No Result Found. </h3>
  <h6>Please check details and search again!</h6>
  </div>
  <div class='col-lg-2'>
  <a type='button' href='index.php?user_id=$user_id' class='btn btn-outline-light text-light mt-4 p-2' id='btn_hover' name='button'>Edit Search</a>
  </div>
  </div>
  </div>";
?>


<?php
// looking for this else
}else {
?>

<div class="container" style="margin-top:80px;">
<div class="row bg-danger p-3">
<div class="col-lg-10 text-white">
<h3><?php echo $db_departure ?> => <?php echo $db_arrival ?></h3>
<h6>Departure Date => <?php echo date('d-M-Y', strtotime($to_departure_date));?></h6>
<?php
if (!empty($_POST["return_date"]) && $_POST["return_date"] > $to_departure_date) {
$return_date = $_POST["return_date"];
 ?>
<h6>Return Date => <?php echo date('d-M-Y', strtotime($return_date));?></h6>
 <?php
}else {
  ?>
 <h6>One Way Trip</h6>
<?php } ?>
</div>
<div class="col-lg-2">
<a href="index.php?user_id=<?php echo $user_id ?>" type="button" class="btn btn-outline-light text-light mt-4 p-2" id="btn_hover" name="button">Edit Search</a>
</div>
</div>
</div>


<?php

  while ($row = mysqli_fetch_array($obj)) {
  $db_time = $row['time_'];
  $current_timestamp = (strtotime("now"));
  $db_timestamp = (strtotime($db_time));
  $buss_id = $row["id"];

 ?>

 <?php
if (!empty($return_date)) {
  ?>
<form  action="return_seat.php?to_id=<?php echo $buss_id ?>&user_id=<?php echo $user_id ?>" method="post">
<?php }else {
?>
<form  action="single_payment.php?bus_id=<?php echo $row["id"]; ?>&user_id=<?php echo $user_id ?>" method="post">
<?php } ?>
<main class="main-content mt-4">
<section class="summary-cart">
<div class="container">
<div class="row">
<aside class="col-lg-12">
<div class="card">
<div class="table-responsive">
<table class="table">
<thead class="text-muted">
<tr class="medium text-uppercase">
<th scope="col">Bus</th>
<th scope="col" width="120">Time</th>
<th scope="col" width="120">Seat(s)</th>
<th scope="col" width="120">Adults</th>
<th scope="col" width="120">Children</th>
<th scope="col" width="120">Price</th>
<th scope="col" width="120">Book</th>
</tr>
</thead>


<tbody>
  <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>">
  <input type="hidden" name="to_departing_date" value="<?php echo $to_departure_date; ?>">
  <input type="hidden" name="return_date" value="<?php echo $return_date; ?>">
<tr>
<td>
<figure class="itemside align-items-center">
<div class="aside"><img src="images/<?php echo $row['pic']; ?>" class="img-sm"></div>
<figcaption class="info">
<a href="#" class="title text-dark"><b><?php echo $row['bus_name']; ?></b></a>
<p class="text-muted medium"><?php echo $row['departure']; ?> =><?php echo $row['arrival']; ?><br> AC: <?php echo $row['ac']; ?></p>
<input type="hidden" name="to_departure" value="<?php echo $row['departure']; ?>">
<input type="hidden" name="to_arrival" value="<?php echo $row['arrival']; ?>">
</figcaption>
</figure>
</td>

<td>
<div class="price-wrap">
  <h6><?php echo date('h:i a' , strtotime($row["time_"]));?></h6>
  <input type="hidden" name="to_time_" value="<?php echo $row["time_"];?>">
</div>
</td>

<td>
<div class="price-wrap">
  <h6>(<?php echo $row['seats']; ?>) Available</h6>
</div>
</td>



<td>
<select class="form-control adult_seat" name="adult_seat">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
</td>

<td>
<select class="form-control child_seat" name="child_seat">
<option value="0">None</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
</td>
<td>
<div class="price-wrap">
<var class="price">N <?php echo number_format($row["price"]); ?></var>
<input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
<!-- <small class="text-muted"><b>N9,500.00</b></small> -->
</div> <!-- price-wrap .// -->
</td>


<td class="">
  <?php
  if ($cd_timestamp == $dd_timestamp && $current_timestamp > $db_timestamp) {

   ?>
<button class="btn btn-danger" type="button" data-toggle="collapse"  role="button" href="#collapseExample<?php echo $row['id']; ?>" name="button" aria-expanded="false" aria-controls="collapseExample1" disabled>Closed</button>
<!-- <a class="btn btn-danger" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample1" disabled>Book Seat</a> -->
<?php } elseif ($cd_timestamp > $dd_timestamp && $current_timestamp > $db_timestamp) {

?>
<button class="btn btn-danger" type="button" data-toggle="collapse"  role="button" href="#collapseExample<?php echo $row['id']; ?>" name="button" aria-expanded="false" aria-controls="collapseExample1">Book Seat</button>
<!-- <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample1">Book Seat</a> -->
<?php }else {
 ?>

<button class="btn btn-danger" type="button" data-toggle="collapse"  role="button" href="#collapseExample<?php echo $row['id']; ?>" name="button" aria-expanded="false" aria-controls="collapseExample1">Book Seat</button>

<?php } ?>
</td>
</tr>
</tbody>
</div>

</table>
</div> <!-- table-responsive.// -->
<style>
  .checked {
  border:solid 2px red;
    background:#ffff00;
  }
</style>

<!-- <form  action="" method="post"> -->

<div class="collapse" id="collapseExample<?php echo $row['id']; ?>">
  <div class="container" id=<?php echo $row['id']; ?>>

      <?php


      $seat_positionz = $select->get_avialable_seats($to_departure,$to_arrival,$to_departure_date,$db_time);

      // print_r($seat_positionz);

      // $seat_positionzz = array_slice($seat_positionz,  2 );
      // print_r($seat_positionz);
      $positionz =  implode(',', $seat_positionz);
      $chunk = explode(',', $positionz);
      // $seat_preg = preg_split('/,/' , $to_seat_number);
      foreach ($chunk as $key => $value) if ($key&1) unset($chunk[$key]);


      $iD = $row['id'];
      $c1 = 1; $c2 = 2; $c3 = 3; $c4 = 4; $c5 = 5; $c6 = 6; $c7 = 7; $c8 = 8; $c9 = 9; $c10 = 10;
      // $s1 = $c1; $s2 = $c2; $s3 = $c3; $s4 = $c4; $s5 = $c5;
      // $s6 = $c6; $s7 = $c7; $s8 = $c8; $s9 = $c9; $s10 = $c10;
      // $imp = implode("," , $seat_positionz);

       ?>
    <div class="row">
      <div class="col-sm-8 pt-1 pb-3 text-center" style="background-color:white;">
      <?php

      if (!in_array($c1,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=1,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>
      <br>

      <?php
      if (!in_array($c2,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=2,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>

      <?php
      if (!in_array($c3,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=3,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>



      <?php
      if (!in_array($c4,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=4,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>
      <br>



      <?php
      if (!in_array($c5,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=5,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>


      <?php
      if (!in_array($c6,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=6,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>


      <?php
      if (!in_array($c7,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=7,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>
      <br>

      <?php
      if (!in_array($c8,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=8,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>



      <?php
      if (!in_array($c9,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=9,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>




      <?php
      if (!in_array($c10,$chunk)) {
      ?>
      <img src="images/green_seat.jpg" class="p-2 select_img" id=10,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
      <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
      <?php } ?>






</div>

<div class="col-sm-4 pt-3 text-center">
<img src="images/blue_seat.jpg" style="width:6%;" class="pb-2" alt=""> <b>Unavailable</b>
<br>
<img src="images/green_seat.jpg" style="width:8%;" class="pb-2"  alt=""> <b>Available</b>
<br>
<img src="images/seat_icon.jpg" style="width:10%;" class="pb-2" alt=""> <b>Booked</b>
<br><br>

<?php if (isset($return_date)) {
?>
<button type="submit" name="submit_return<?php echo $row['id']; ?>" id="submit_continue<?php echo $row['id']; ?>"  class="btn btn-danger text-white">Proceed</button>
<?php
} else {
?>
<button type="submit" name="submit_continue<?php echo $row['id']; ?>" id="submit_continue<?php echo $row['id']; ?>"  class="btn btn-danger text-white">Continue</button>
<?php
}

?>

</div>
</div>
</div>



  <!-- HIGHLIGHTING OF SEATS JQUERY -->

  <script>
    $(document).ready(function() {
    ////////////////////////
    var image_selected = new Array();

    //////////////
    $('#<?php echo $row['id']; ?>').on('click', ".select_img", function () {

    var aa = $(this)
    if( !aa.is('.checked')){
    aa.addClass('checked');

    var my_id=this.id;
    image_selected.push(my_id);

    } else {
    aa.removeClass('checked');
    var my_id=this.id;
    var index = image_selected.indexOf(my_id);
    if (index > -1) {
    image_selected.splice(index, 1);
    }
    }
    // var adult_seat = $('#adult_seat').val();
   $('#count<?php echo $row['id']; ?>').html(" "+image_selected.length);
   $('#number<?php echo $row['id']; ?>').html(" "+image_selected);


  $(document).ready(function(){
    var count = image_selected.length;
    var number = image_selected;
  $("#submit_continue<?php echo $row['id']; ?>").click(function(){
  // alert(count);
  $(this).closest("form")
  .append($("<input>", {"type":"hidden", "name":"seat_count", "value":count}));
  $(this).closest("form")
  .append($("<input>", {"type":"hidden", "name":"seat_number", "value":number}));
    });
  });
})
})

  </script>

  <!--END HIGHLIGHTING OF SEATS JQUERY -->
  <?php
  // $ids = $row['id'];
  // $seat_count  = "<span id=\"count$ids\"></span>";
  // $seat_number  = "<span id=\"number$ids\"></span>";

  // echo $seat_count;

   ?>
  <!-- <input type="hidden" name="seat_count" value="">
  <input type="hidden" name="seat_number" value=""> -->




</div> <!-- card.// -->



</aside> <!-- col.// -->

</div> <!-- row.// -->
</div>
</section>
</main>
</form>
<?php } ?>

<?php } }?>









<br><br><br><br><br><br>

<?php
include("body/footer.php");

 ?>





 <!-- bootstrap javascript -->
 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/bootstrap-datepicker.min.js"></script>


 <script src="js/main.js"></script>
 <script src="js/header.js"></script>

    <!-- OwlCarousel2 -->
    <script src="owlcarousel/owl.carousel.min.js"></script>

</body>
