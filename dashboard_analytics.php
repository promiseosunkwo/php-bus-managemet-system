<?php
ob_start();
require_once("includes/load.php");
require_once("url.php");
$user_id = $_GET["user_id"];
$query = $db->get_results("SELECT * FROM booked_seats WHERE user_id='$user_id'");
$count = mysqli_num_rows($query);
ob_end_flush();
?>

<?php
// $dataPoints = array();
$bookings = $select->get_user_bookings('booked_seats',$user_id);
foreach ($bookings as $booking) {
$key = $booking->p_key;
$customer_details = $select->get_booking_details('customer_details',$key);
$book_details = $select->get_booking_details('bookings',$key);
}
// array_push($dataPoints, array("x"=> $booking->no_of_seats, "y"=> $booking->date_of_movement));



// print_r($booking->date_of_movement);
// $dataPoints = array(
// array("y" => 0, "label" => $booking->date_of_movement),
// array("y" => $booking->no_of_seats, "label" => $booking->date_of_movement)
// array("y" => 5, "label" => "2021-01-11"),
// array("y" => $count, "label" => "Tuesday"),
// array("y" => $count, "label" => "Wednesday"),
// array("y" => $count, "label" => "Thursday"),
// array("y" => $count, "label" => "Friday"),
// array("y" => $count, "label" => "Saturday")
// );

?>

<!-- script for the analytics graph -->
<!-- <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
animationEnabled: true,
exportEnabled: true,
theme: "light1", // "light1", "light2", "dark1", "dark2"
title:{
text: "ALL ACTIVITIES"
},
data: [{
type: "column", //change type to bar, line, area, pie, etc
dataPoints:  -->
<?php
// echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
?>
<!-- }]
});
chart.render();

}
</script> -->
<!-- script for the analytics graph -->

<!-- dashboard card -->
<div class="container bootstrap snippet">
<div class="row">
<div class="col-lg-6 col-sm-6">
<div class="circle-tile ">
<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
<div class="circle-tile-content dark-blue">
<div class="circle-tile-description text-faded">ALL BOOKINGS</div>
<div class="circle-tile-number text-faded "><?php echo $count ?></div>
<a class="circle-tile-footer" href="?user_id=<?php echo $user_id ?>&action=all_bookings">More Info<i class="fa fa-chevron-circle-right"></i></a>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6">
<div class="circle-tile ">
<a href="#"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
<div class="circle-tile-content red">
<div class="circle-tile-description text-faded">ALL COURIER</div>
<div class="circle-tile-number text-faded ">0</div>
<a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
</div>
</div>
</div>
</div>
</div>

<!-- Graph Code -->
<!-- <div class="container-fluid">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<!-- Graph Code -->
