
<?php
require_once('../includes/load.php');

if (isset($_GET['edit_id'])) {
  $edit_id = $_GET['edit_id'];
$table = "admin_users";
$load = $select->load_single_user($edit_id,$table);
$cv_photo = $load->cv;
$pic_photo = $load->picture;
// $db_date = $load->employment_date;
// $main_date = date("d-m-Y", strtotime($db_date));

if (!isset($_GET['staff_id'])) {
  header("location:admin_login.php");
}else {
  $staff_id = $_GET['staff_id'];
}

if (isset($_POST["update_user"])) {
$update = $insert->update_staff($_POST,$edit_id,$pic_photo,$cv_photo,$staff_id);
}

}


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Edit Profile</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../css/mycss/edit_profile.css">
</head>
<body>


<form action="" method="post" enctype="multipart/form-data">

<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
<div class="account-settings">
<div class="user-profile">
<div class="user-avatar">
<img src="images/<?php echo $load->picture ?>" alt="Maxwell Admin">
</div>
<h5 class="user-name"><?php echo $load->full_name ?></h5>
<h6 class="user-email"><?php echo $load->email ?></h6>
</div>
<div class="about">
<h5 class="mb-2 text-primary"><?php echo $load->role ?></h5>
<p><?php echo $load->residence ?></p>
<a href="#" class="btn btn-primary">Update Profile Pic</a>
<br/>
<br/>
<a href="#" class="btn btn-success">Update CV</a>
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
<label for="fullName">Full Name</label>
<input type="text" class="form-control" name="full_name" id="fullName" value="<?php echo $load->full_name ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="eMail">Email</label>
<input type="email" class="form-control" name="email" id="eMail" value="<?php echo $load->email ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="phone">Phone</label>
<input type="text" class="form-control" name="phone_number" id="phone" value="<?php echo $load->phone_number ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="website">Date of Birth</label>
<input type="text" class="form-control" name="dob" id="website" value="<?php echo $load->dob?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="fullName">Role</label>
<select type="text" name="role" class="form-control" >
  <option value="<?php echo $load->role?>" selected><?php echo $load->role?></option>
  <option value="Admin">Admin</option>
  <option value="Managing Director">Managing Director</option>
  <option value="General Manager">General Manger</option>
  <option value="Manager"> Manger</option>
  <option value="Sales Rep">Sales Rep</option>
  <option value="Customer Care">Customer Care</option>
  <option value="Driver">Driver</option>
  <option value="Cleaner">Cleaner</option>
  <option value="Security">Security</option>
  <option value="Casual Staff">Casual Worker</option>
</select>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Employment Date">Employment Date</label>
<input type="text" name="employment_date" class="form-control" id="eMail" value="<?php echo $load->employment_date ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="fullName">Profile Picture</label>
<input type="file" name="upload_image" class="form-control" id="fullName" >
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="eMail">CV</label>
<input type="file" name="cvs" class="form-control" id="eMail" >
</div>
</div>
</div>

<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<!-- <h6 class="mb-3 text-primary">Address</h6> -->
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Street">Address</label>
<input type="text" name="residence" class="form-control" id="Street" value="<?php echo $load->residence ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="ciTy">Name of Guarantor</label>
<input type="text" name="name_of_guarantor" class="form-control" id="ciTy"  value="<?php echo $load->name_of_guarantor ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="sTate">Phone of Guarantor</label>
<input type="text" name="phone_of_guarantor" class="form-control" id="sTate" value="<?php echo $load->phone_of_guarantor ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="zIp">Address of Guarantor</label>
<input type="text" name="residence_of_guarantor" class="form-control" id="zIp" value="<?php echo $load->residence_of_guarantor ?>">
</div>
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="text-right">
<a href="admin_dashboard.php?staff_id=<?php echo $staff_id ?>&action=admin_users" class="btn btn-secondary" >Cancel</a>
<button type="submit" id="submit" name="update_user" class="btn btn-primary">Update</button>
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
