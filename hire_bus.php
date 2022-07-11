<?php
ob_start();
require_once("includes/load.php");
$table = 'registered_users';
if (isset($_GET["user_id"])) {
$user_id = $_GET["user_id"];
}
if (isset($_POST["submit"])) {
$first_name = $db->clean_string($_POST["first_name"]);
$last_name = $db->clean_string($_POST["last_name"]);
$email = $db->clean_string($_POST["email"]);
$phone = $db->clean_string($_POST["phone"]);
$sex = $db->clean_string($_POST["sex"]);
$query = "UPDATE $table SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',sex='$sex' WHERE id='$user_id'";
$run = $db->update($query);
if ($run) {
echo "<script>alert('Edit Successful')
</script>";
}else {
echo "<script>alert('Something went wrong contact admin')
</script>";
}
}
$user = $select->load_single_user($user_id,$table);
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
<h2 class="text-uppercase text-center mb-3">Hire a Bus</h2>

<form method="post">

<div class="form-outline mb-4">
<label class="form-label" for="form3Example1cg">From</label>
<input type="date" name="first_name" id="form3Example1cg" class="form-control"  min="<?php echo date("Y-m-d"); ?>" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">To</label>
<input type="date" name="last_name" id="form3Example3cg" class="form-control"  min="<?php echo date("Y-m-d"); ?>" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Vehicle</label>
<select type="text" name="email" id="form3Example3cg" class="form-control"  required/>
<option value="">Haice</option>
</select>
</div>


<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Will you need our driver?(No extra cost)</label>
<select type="text" name="email" id="form3Example3cg" class="form-control"  required/>
<option value="">Yes</option>
<option value="">No</option>
</select>
</div>

<div class="form-check d-flex justify-content-center mb-5">
<input class="form-check-input me-2" type="checkbox"  style="margin-right:90%;" id="form2Example3cg"/>
<label class="form-check-label" for="form2Example3g">I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a></label>
</div>

<div class="d-flex justify-content-center">
<button type="submit" name="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white">Submit</button>
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
