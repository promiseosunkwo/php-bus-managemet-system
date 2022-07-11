<?php
ob_start();
// require_once("includes/load.php");
if (!isset($_GET["user_id"])) {
$user_id = 0;
}else {
$user_id = $_GET["user_id"];
}
ob_end_flush();
?>
<?php if (isset($_GET["p_key"])) {
  $key = $_GET["p_key"];
} ?>

<html>
<head>
  <!-- Bootstrap4 files-->
  <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
body {
text-align: center;
padding: 40px 0;
background: #EBF0F5;
}
h1 {
color: #88B04B;
font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
font-weight: 900;
font-size: 40px;
margin-bottom: 10px;
}
p {
color: #404F5E;
font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
font-size:20px;
margin: 0;
}
i {
color: #9ABC66;
font-size: 100px;
line-height: 200px;
margin-left:-15px;
}
.card {
background: white;
padding: 60px;
border-radius: 4px;
box-shadow: 0 2px 3px #C8D0D8;
display: inline-block;
margin: 0 auto;
}
</style>
<body>
<div class="card">
<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
<i class="checkmark">✓</i>
</div>
<h1>Success</h1>
<p>Your Booking has been Confirmed!<br/> Check your email for details!</p>
<a href="customer_recipt.php?key=<?php echo $key ?>&user_id=<?php echo $user_id ?>" class="btn btn-success text-white">View Payment Recipt</a>
<a href="index.php?user_id=<?php echo $user_id ?>" class="btn btn-info text-white">Back to Home Page</a>
</div>
</body>
</html>
