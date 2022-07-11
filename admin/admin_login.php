<?php
ob_start();
include("../includes/load.php");
if (isset($_POST["login"])) {
session_start();
$login = $login->verify_login($_POST);
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Login</title>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="../css/mycss/admin_login.css">
<!-- <link href='https://fonts.googleapis.com/css?family=Almendra' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'> -->
</head>
<style>
body{

background-image: url('../images/18.jpg');
background-size: cover;

}
.error{
text-align: center;
color: white;
}
</style>

<body>
<div class="loginbox">
<!-- <img src="../images/bus8.jpg" class="avatar"> -->
<h1>Login Here</h1>
<form method="post" action="">
<p>Username</p>
<input type="email" name="email" placeholder="Enter Email" required>
<p>Password</p>
<input type="password" name="password" placeholder="Enter password" required>
<input type="Submit" name="login" value="Login">
<!-- <a href="#">Lost your Password?</a><br/> -->
<!-- <a href="registeruser.php">Don't have an account?</a> -->
</form>
</div>
</body>
