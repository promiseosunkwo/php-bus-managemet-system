<?php
ob_start();
require_once("includes/load.php");
require_once("url.php");
$table = 'registered_users';
if (isset($_GET["user_id"])) {
$user_id = $_GET["user_id"];
}

$user = $select->load_single_user($user_id,$table);
if (isset($_POST["submit"])) {
$old_password = $db->clean_string($_POST["old_password"]);
$password1 = $db->clean_string($_POST["password1"]);
$password2 = $db->clean_string($_POST["password2"]);
$old_pass = md5($old_password);
if ($old_pass != $user->password) {
echo "<script>alert('Your old password is wrong')
</script>";
}elseif ($password1 != $password2) {
echo "<script>alert('New Passwords does not match')
</script>";
}else {
$new_pass = md5($password1);
$query = "UPDATE $table SET password='$new_pass' WHERE id='$user_id'";
$run = $db->update($query);
if ($run) {
echo "<script>alert('Password change Successful')
</script>";
}else {
echo "<script>alert('Something went wrong contact admin')
</script>";
}
}
}
ob_end_flush();
?>


<!doctype html>
<html lang="en">

<head>
<title>PrimeTime Edit Profile; </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="font-family: 'Montserrat', sans-serrif;">
<section>
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
<div class="container h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-12 col-md-9 col-lg-7 col-xl-6">
<div class="card" style="border-radius: 15px;">
<div class="card-body p-5">
<h2 class="text-uppercase text-center mb-3">Change Password</h2>

<form method="post">

  <div class="form-outline mb-4">
  <label class="form-label" for="form3Example4cg">Old Password</label>
  <input type="password" name="old_password" id="form3Example4cg" class="form-control"  minlength="6" required/>
  </div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example4cg">New Password</label>
<input type="password" name="password1" id="form3Example4cg" class="form-control"  minlength="6" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example4cdg">Repeat New password</label>
<input type="password" name="password2" id="form3Example4cdg" class="form-control"  minlength="6" required/>
</div>

<div class="d-flex justify-content-center">
<button type="submit" name="submit" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-white">Submit</button>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</section>


<!-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> -->
<!-- <script src="js/bootstrap-datepicker.min.js"></script> -->

<!--
<script src="js/main.js"></script>
<script src="js/header.js"></script> -->
</body>

</html>
