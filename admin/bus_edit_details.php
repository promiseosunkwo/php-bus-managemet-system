
<?php
require_once('../includes/load.php');

if (isset($_GET['staff_id'])) {
$staff_id = $_GET['staff_id'];
}


if (isset($_GET['bus_id'])) {
$bus_id = $_GET['bus_id'];
$table = "bus_management";
$load = $select->load_single_user($bus_id,$table);
$pic = $load->pic;
// $db_date = $load->employment_date;
// $main_date = date("d-m-Y", strtotime($db_date));



if (isset($_POST["update_bus"])) {
$update = $insert->update_bus($_POST,$bus_id,$pic,$staff_id);
}

}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Edit Bus Details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/mycss/edit_profile.css">
</head>
<body style="font-family: 'Montserrat', sans-serrif;">


<form action="" method="post" enctype="multipart/form-data">

<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
<div class="account-settings">
<div class="user-profile">
<div class="user-avatar">
<img src="bus_images/<?php echo $load->pic ?>" alt="Maxwell Admin">
</div>
<h5 class="user-name"><?php echo $load->bus_name ?></h5>
<h6 class="user-email"><?php?></h6>
</div>
<div class="about">
<h5 class="mb-2 text-primary"><?php ?></h5>
<p><?php  ?></p>
<!-- <a href="#" class="btn btn-primary">Update Profile Pic</a> -->
<br/>
<br/>
<!-- <a href="#" class="btn btn-success">Update CV</a> -->
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-3 text-primary">Edit Personal Details</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="fullName">Bus Name</label>
<input type="text" class="form-control" name="bus_name" id="fullName" value="<?php echo $load->bus_name ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="eMail">Bus Number</label>
<input type="text" class="form-control" name="bus_no" id="eMail" value="<?php echo $load->bus_no ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="phone">Seats Available</label>
<input type="number" class="form-control" name="seats" id="phone" value="<?php echo $load->seats ?>">
</div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="fullName">Time</label>
<select type="text" name="time_" class="form-control" >
  <option value="<?php echo $load->time_ ?>" selected><?php echo $load->time_ ?></option>
  <option value="6:45:00">6:45 AM</option>
  <option value="9:00:00">9:00 AM</option>
  <option value="11:45:00">11:45 AM</option>
  <option value="14:30:00">2:30 PM</option>
  <option value="16:00:00">4:00 PM</option>

</select>
</div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
  <div class="form-group">
  <label for="website">Departure</label>
  <input type="text" class="form-control" name="departure" id="website" value="<?php echo $load->departure?>">
  </div>
  </div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Employment Date">Arrival</label>
<input type="text" name="arrival" class="form-control" id="eMail" value="<?php echo $load->arrival ?>">
</div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="fullName">Profile Picture</label>
<input type="file" name="bus_img" class="form-control" id="fullName" >
</div>
</div>



<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Street">Remarks</label>
<input type="text" name="remarks" class="form-control" id="Street" value="<?php echo $load->remarks ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="ciTy">Price</label>
<input type="number" name="price" class="form-control" id="ciTy"  value="<?php echo $load->price ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="sTate">Air Condition</label>
<select type="text" name="ac" class="form-control" >
  <option value="<?php echo $load->ac ?>" selected><?php echo $load->ac ?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>
</select>
</div>
</div>

</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="text-right">
<a href="admin_dashboard.php?staff_id=<?php echo $staff_id ?>&action=bus_management" class="btn btn-secondary" >Cancel</a>
<button type="submit" id="submit" name="update_bus" class="btn btn-primary">Update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</form>




</body>
</html>
