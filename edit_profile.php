<?php
ob_start();
require_once("includes/load.php");
require_once("url.php");
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
<h2 class="text-uppercase text-center mb-3">Edit Profile</h2>

<form method="post">

<div class="form-outline mb-4">
<label class="form-label" for="form3Example1cg">First Name</label>
<input type="text" name="first_name" id="form3Example1cg" class="form-control" value="<?php echo $user->first_name ?>" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Last Name</label>
<input type="text" name="last_name" id="form3Example3cg" class="form-control" value="<?php echo $user->last_name ?>" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Email</label>
<input type="email" name="email" id="form3Example3cg" class="form-control" value="<?php echo $user->email ?>" required/>
</div>


<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Phone</label>
<input type="text" name="phone" id="form3Example3cg" class="form-control" pattern="[0-9]+" minlength="11" value="<?php echo $user->phone ?>" placeholder="e.g 08033123345" required/>
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Sex</label>
<select type="text" name="sex" id="form3Example3cg" class="form-control" required/>
<option value="<?php echo $user->sex ?>"><?php echo $user->sex ?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
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
