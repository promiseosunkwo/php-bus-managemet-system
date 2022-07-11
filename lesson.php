<?php
require_once('includes/load.php');


function select($key){
$array = array();
$query = "SELECT * FROM bookings WHERE p_key = '$key'";
$run = $db->query($query);
while ($row = $run->fetch_object()) {
$array[] = $row;
}
return $array;

}


$q = "SELECT * FROM booked_seats where departure = 'sagos'";
$r= $db->query($q);
$run = mysqli_num_rows($r);
if ($run > 0) {

echo "Yes";
}else {
echo "No";
}
// $rows = mysqli_num_rows($run);
// if ($rows  > 0) {
// while($row = mysqli_fetch_array($run)){
// echo $row['p_key'];
// }
// }
 ?>
