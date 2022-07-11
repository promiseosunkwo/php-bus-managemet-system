<?php
ob_start();
require_once("includes/load.php");
$table = 'registered_users';
if (isset($_POST["submit"])) {
$first_name = $db->clean_string($_POST["first_name"]);
$last_name = $db->clean_string($_POST["last_name"]);
$email = $db->clean_string($_POST["email"]);
$phone = $db->clean_string($_POST["phone"]);
$sex = $db->clean_string($_POST["sex"]);
$password1 = $db->clean_string($_POST["password1"]);
$password2 = $db->clean_string($_POST["password2"]);

if ($password1 != $password2) {
echo "<script> alert('Passwords dont match')</script>";
}elseif ($login->email_exists('registered_users', $email)){
  echo "<script>alert('Email already exists in database')</script>";
}else {
$password_hash =  md5($password1);
$query = "INSERT INTO $table (first_name, last_name, email, phone, sex, password)
          VALUES('$first_name', '$last_name', '$email','$phone', '$sex', '$password_hash')";
$run = $db->update($query);
if ($run) {
        echo "<script>alert('Registration was Successful, please login')
        window.location.replace('login.php')
        </script>";

        }
}
}
ob_end_flush();
 ?>


<!doctype html>
<html lang="en">

<head>
<title>PrimeTime &mdash; </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="font-family: 'Montserrat', sans-serrif;">
<?php
include("body/header.php");
?>
<br><br><br>
<section>
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
<div class="container h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-12 col-md-9 col-lg-7 col-xl-6">
<div class="card" style="border-radius: 15px;">
<div class="card-body p-5">
<h2 class="text-uppercase text-center mb-5">Create an account</h2>

<form method="post">

<div class="form-outline mb-4">
<label class="form-label" for="form3Example1cg">First Name</label>
<input type="text" name="first_name" id="form3Example1cg" class="form-control" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Last Name</label>
<input type="text" name="last_name" id="form3Example3cg" class="form-control" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Email</label>
<input type="email" name="email" id="form3Example3cg" class="form-control" required/>
</div>


<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Phone</label>
<input type="text" name="phone" id="form3Example3cg" class="form-control" pattern="[0-9]+" minlength="11" placeholder="e.g 08033123345" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Sex</label>
<select type="text" name="sex" id="form3Example3cg" class="form-control" required/>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example4cg">Password</label>
<input type="password" name="password1" id="form3Example4cg" class="form-control"  minlength="6" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example4cdg">Repeat your password</label>
<input type="password" name="password2" id="form3Example4cdg" class="form-control"  minlength="6" required/>
</div>


<!-- <div class="form-check d-flex justify-content-center mb-5">
<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg"/>
<label class="form-check-label" for="form2Example3g">I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a></label>
</div> -->

<div class="d-flex justify-content-center">
<button type="submit" name="submit" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-white">Register</button>
</div>

<p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
<!-- <p class="text-center text-muted mt-5 mb-0">Back to homepage <a href="index.php" class="fw-bold text-body"><u>Home</u></a></p> -->
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
