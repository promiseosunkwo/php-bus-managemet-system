<?php
ob_start();
// ini_set('display_errors',0);
require_once("includes/load.php");
if (!isset($_GET["user_id"])) {
$user_id = 0;
}else {
$user_id = $_GET["user_id"];
}
ob_end_flush();



if (isset($_GET["to_id"])) {
  $to_id = $_GET["to_id"];
}



if (isset($_POST["submit_return$to_id"])) {
$to_departure = $db->clean_string($_POST["to_departure"]);
$to_arrival = $db->clean_string($_POST["to_arrival"]);
$return_date = $db->clean_string($_POST["return_date"]);
$to_departing_time = $db->clean_string($_POST["to_time_"]);
$table = "bus_management";
$current_date = date('Y/m/d');
$book_seat = $select->search_bus($to_departure,$to_arrival,$table);
$db_fro_departure = $book_seat->departure;
$db_fro_arrival =  $book_seat->arrival;
}


$cd = DateTime::createFromFormat('Y/m/d', $current_date);
if ($cd === false) {
    die("Incorrect date string");
} else {
    $cd_timestamp = $cd->getTimestamp();
}

$dd = DateTime::createFromFormat('Y-m-d', $return_date);
if ($dd === false) {
    die("Incorrect date string");
} else {
    $dd_timestamp = $dd->getTimestamp();
}

$to_adult_seat = $_POST["adult_seat"];
$to_child_seat = $_POST["child_seat"];
// $fro_adult_seat = $_POST["fro_adult_seat"];
// $fro_child_seat = $_POST["fro_child_seat"];
$to_departing_date = $_POST["to_departing_date"];
$to_price = $_POST["price"];
$to_total_price = ($to_adult_seat + $to_child_seat) * $to_price;


$to_seat_number = isset($_POST['seat_number'])?$_POST['seat_number']:'not yet';
$to_seat_count = isset($_POST['seat_count'])?$_POST['seat_count']:'not yet';
if ($to_adult_seat + $to_child_seat != $to_seat_count ) {
  echo "<script>
  alert('Selected seats does not Match!');
  history.go(-1);
  </script>";
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
  $query = "SELECT * FROM $table WHERE departure = '$to_arrival' AND arrival = '$to_departure' AND suspend_bus = 0";
  $obj= $db->query($query);
  $rows = mysqli_num_rows($obj);
  if ($rows == 0 ) {
  echo "<div class='container' style='margin-top:150px;''>
  <div class='row bg-danger p-3'>
  <div class='col-lg-10 text-white'>
  <h3>No Result Found. </h3>
  <h6>This route might not have a return service! Please book a one way trip!</h6>
  </div>
  <div class='col-lg-2'>
  <a type='button' href='index.php?user_id=$user_id' class='btn btn-outline-light text-light mt-4 p-2' id='btn_hover' name='button'>Edit Search</a>
  </div>
  </div>
  </div>";
?>


<?php
}else {
?>

<div class="container " style="margin-top:150px;">
<div class="row bg-danger p-3">
<div class="col-lg-10 text-white">
<h3><?php echo $to_arrival ?> => <?php echo $to_departure ?></h3>
<h6>Return Date => <?php echo date('d-M-Y', strtotime($return_date));?></h6>
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
  $return_id = $row["id"];

 ?>


<form  action="payment.php?to_id=<?php echo $to_id ?>&return_id=<?php echo $return_id ?>&user_id=<?php echo $user_id ?>" method="post">
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
  <input type="hidden" name="fro_hidden_id" value="<?php echo $row["id"]; ?>">
  <input type="hidden" name="return_date" value="<?php echo $return_date; ?>">
  <input type="hidden" name="to_departure" value="<?php echo $to_departure?>">
  <input type="hidden" name="to_arrival" value="<?php echo $to_arrival?>">
  <input type="hidden" name="to_departing_date" value="<?php echo $to_departing_date?>">
  <input type="hidden" name="to_departing_time" value="<?php echo $to_departing_time?>">
  <input type="hidden" name="to_seat_number" value="<?php echo $to_seat_number?>">
  <input type="hidden" name="to_seat_count" value="<?php echo $to_seat_count?>">
  <input type="hidden" name="to_price" value="<?php echo $to_price?>">
  <input type="hidden" name="to_adult_seat" value="<?php echo $to_adult_seat?>">
  <input type="hidden" name="to_child_seat" value="<?php echo $to_child_seat?>">
<tr>
<td>
<figure class="itemside align-items-center">
<div class="aside"><img src="images/<?php echo $row['pic']; ?>" class="img-sm"></div>
<figcaption class="info">
<a href="#" class="title text-dark"><b><?php echo $row['bus_name']; ?></b></a>
<p class="text-muted medium"><?php echo $row['departure']; ?> =><?php echo $row['arrival']; ?><br> AC: <?php echo $row['ac']; ?></p>
<input type="hidden" name="fro_departure" value="<?php echo $row['departure']; ?>">
<input type="hidden" name="fro_arrival" value="<?php echo $row['arrival']; ?>">
</figcaption>
</figure>
</td>

<td>
<div class="price-wrap">
  <h6><?php echo date('h:i a' , strtotime($row['time_']));?></h6>
  <input type="hidden" name="fro_time_" value="<?php echo date('h:i a' , strtotime($row['time_']));?>">
</div>
</td>

<td>
<div class="price-wrap">
  <h6>(<?php echo $row["seats"] ?>) Available</h6>
</div>
</td>



<td>
<select class="form-control adult_seat" name="fro_adult_seat" disabled>
<option value="1" selected><?php echo $to_adult_seat ?></option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
</td>

<td>
<select class="form-control child_seat" name="fro_child_seat" disabled>
<option value="0"><?php echo $to_child_seat ?></option>
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
<input type="hidden" name="fro_price" value="<?php echo $row["price"]; ?>">
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
    <div class="row">
      <?php
      $timee = $row['time_'];
      $return_position = $select->get_avialable_seats($to_arrival,$to_departure,$return_date,$db_time);
      // $seat_positionzz = array_slice($seat_positionz,  2 );

      $position =  implode(',', $return_position);
      $chunk = explode(',', $position);
      // $seat_preg = preg_split('/,/' , $to_seat_number);
      foreach ($chunk as $key => $value) if ($key&1) unset($chunk[$key]);


      $iD = $row['id'];
      $c1 = 1; $c2 = 2; $c3 = 3; $c4 = 4; $c5 = 5; $c6 = 6; $c7 = 7; $c8 = 8; $c9 = 9; $c10 = 10;
      $s1 = $c1; $s2 = $c2; $s3 = $c3; $s4 = $c4; $s5 = $c5;
      $s6 = $c6; $s7 = $c7; $s8 = $c8; $s9 = $c9; $s10 = $c10;
      // $imp = implode("," , $seat_positionz);
       ?>

      <div class="col-sm-8 pt-1 pb-3 text-center" style="background-color:white;">
        <?php
        if (!in_array($s1,$chunk)) {
         ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=1,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>
        <br>

        <?php
        if (!in_array($s2,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=2,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>

        <?php
        if (!in_array($s3,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=3,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>



        <?php
        if (!in_array($s4,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=4,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>
        <br>



        <?php
        if (!in_array($s5,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=5,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>


        <?php
        if (!in_array($s6,$chunk)) {
         ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=6,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>


        <?php
        if (!in_array($s7,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=7,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>
        <br>

        <?php
        if (!in_array($s8,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=8,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>



        <?php
        if (!in_array($s9,$chunk)) {
        ?>
        <img src="images/green_seat.jpg" class="p-2 select_img" id=9,<?php echo $row['id']; ?> style="width:11%;" alt="">
      <?php }else {?>
        <img src="images/seat_icon.jpg" class="p-2 "  style="width:11%;" alt="">
        <?php } ?>




        <?php
        if (!in_array($s10,$chunk)) {
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
        <button type="submit" name="submit_continue<?php echo $row['id']; ?>" id="submit_continue<?php echo $row['id']; ?>"  class="btn btn-danger text-white">Continue</button>
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
  .append($("<input>", {"type":"hidden", "name":"fro_seat_count", "value":count}));
  $(this).closest("form")
  .append($("<input>", {"type":"hidden", "name":"fro_seat_number", "value":number}));
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
