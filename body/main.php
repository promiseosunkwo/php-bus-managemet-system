<?php require_once("includes/load.php");
ob_start();
if (!isset($_GET["user_id"])) {
$user_id = 0;
}else {
$user_id = $_GET["user_id"];
}
ob_end_flush();
?>
<?php $query = $db->query("SELECT * FROM terminal");
$terminals = $query->fetch_all(MYSQLI_ASSOC); ?>
<div class="hero" style="background-image: url('images/road.jpg');">

<div class="container" style="opacity:0.9; padding-top: 90px;" >
<div class="row align-items-center justify-content-center">
<div class="col-lg-10">

<!-- <div class="row mb-5">
<div class="col-lg-7 intro">
<h1><strong>Rent a car</strong> is within your finger tips.</h1>
</div>
</div> -->

<form  action="seat_select.php?user_id=<?php echo $user_id ?>" method="post" class="trip-form">

<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
<a class="nav-item nav-link text-success active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">BOOK A SEAT</a>
<!-- <a class="nav-item nav-link text-success" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">RENT A RIDE</a> -->
<a class="nav-item nav-link text-success" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">TRACK COURIER</a>
</div>
</nav>



<div class="row align-items-center py-4 tab-content" id="nav-tabContent">




<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<div class="row align-items-center">

<div class="mb-2 mb-md-0 col-md-2">
<span class="pl-2 p-2"><b>Departure</b></span>
<!-- <label for="from">Departure </label> -->
<select  id="" name="departure" class="custom-select form-control" required>
<option value="">Departure</option>
  <?php
  foreach ($terminals as $key => $terminal  ) {
   ?>
<option value="<?php echo $terminal["terminal"] ?>"><?php echo $terminal["terminal"] ?></option>
<?php } ?>
</select>
</div>

<div class="mb-2 mb-md-0 col-md-2">
  <span class="pl-2 p-2"><b>Arrival</b></span>
<!-- <label for="from">Arrival </label> -->
<select name="arrival" id="" class="custom-select form-control" required>
<option value="" >Arrival</option>
<?php
foreach ($terminals as $key => $terminal  ) {
 ?>
<option value="<?php echo $terminal["terminal"] ?>"><?php echo $terminal["terminal"] ?></option>
<?php } ?>
</select>
</div>

<div class="mb-3 mb-md-0 col-md-3">
<div class="form-control-wrap">
<span class="pl-2 p-2"><b>Departure Date</b></span>
<!-- <label for="departure">Date</label> -->
<input type="date" name="departure_date" id="cf-3" placeholder="Date" class="form-control" min="<?php echo date("Y-m-d"); ?>" required>
<!-- <span class="icon icon-date_range"></span> -->
</div>
</div>


<div class="mb-3 mb-md-0 col-md-3">
<div class="form-control-wrap">
<span class="pl-2 p-2"><b>Return(optional)</b></span>
<!-- <label for="Return">Return (Optional)</label> -->
<input type="date" name="return_date" id="cf-4" placeholder="Return" class="form-control" min="<?php echo date("Y-m-d"); ?>">
<!-- <span class="icon icon-date_range"></span> -->
</div>
</div>


<div class="mb-2 mb-md-0 col-md-2">
<span class="pl-1 p-1"></span>
<input type="submit" value="Book" name="book_seat" class="btn btn-danger btn-block py-3">
</div>
</div>
</div>




<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<div class="row align-items-center">

<div class="mb-3 mb-md-0 col-md-3">
<select name="" id="" class="custom-select form-control">
<option value="">From</option>
<option value="">Enugu</option>
<option value="">Abuja</option>
<option value="">Lagos</option>
<option value="">Port-Harcourt</option>
</select>
</div>

<div class="mb-3 mb-md-0 col-md-3">
<select name="" id="" class="custom-select form-control">
<option value="">To</option>
<option value="">Enugu</option>
<option value="">Abuja</option>
<option value="">Lagos</option>
<option value="">Port-Harcourt</option>
</select>
</div>

<div class="mb-2 mb-md-0 col-md-2">
<div class="form-control-wrap">
<input type="text" id="cf-3" placeholder="Date" class="form-control datepicker px-3">
<span class="icon icon-date_range"></span>
</div>
</div>


<div class="mb-2 mb-md-0 col-md-2">
<div class="form-control-wrap">
<input type="text" id="cf-3" placeholder="Date" class="form-control datepicker px-3">
<span class="icon icon-date_range"></span>
</div>
</div>


<!-- <div class="mb-2 mb-md-0 col-md-2">
<select name="" id="" class="custom-select form-control">
<option value="">Duration</option>
<option value="">1 day</option>
<option value="">2 days</option>
<option value="">3 days</option>
<option value="">4 days</option>
<option value="">5days</option>
<option value="">more</option>
</select>
</div> -->


<div class="mb-2 mb-md-0 col-md-2">
<input type="submit" value="Book a Ride" class="btn btn-danger btn-block py-3">
</div>

</div>
</div>






<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

<div class="row align-items-center">



<div class="col-sm-8 pl-4" style="padding-left:40%;">
<div class="form-control-wrap">
<input type="number" placeholder="Enter your tracking id" class="form-control" min="7">

</div>
</div>




<div class="col-sm-4">
<div class="pl-4 p-2">
<button type="submit" name="tracker" onclick="return alert('Please input a valid tracking id')" class="btn btn-danger btn-block">Track</button>
</div>
</div>







</div>



</div>

</form>

</div>
</div>
</div>
</div>
