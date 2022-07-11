
<?php require_once('includes/load.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Routes</title>
<!-- <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<!-- CSS only -->
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!--- Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Font awesome 5 -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/brands.min.css" integrity="sha512-AMDXrE+qaoUHsd0DXQJr5dL4m5xmpkGLxXZQik2TvR2VCVKT/XRPQ4e/LTnwl84mCv+eFm92UG6ErWDtGM/Q5Q==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet"> -->

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<!-- custom style -->



<!--- Datatables ---------->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
<!-- end Datatables ---------->
</head>

<body style="font-family: 'Montserrat', sans-serrif;">

  <?php
  include("body/header.php");
  ?>
<br><br>

<div class="container mt-5">
<h3 class="text-center">Our Routes</h3><hr>
<table id="route_table" class="table table-striped table-hover table-responsive">
<thead>
<tr>
<th>#</th>
<th>Bus Name</th>
<th>Departure</th>
<th>Arrival</th>
<th>Departure Time</th>
<th>Price</th>
<!-- <th>Final Bus</th> -->
</tr>
</thead>

<?php
$query = $db->query("SELECT * FROM bus_management");
$customers = $query->fetch_all(MYSQLI_ASSOC);
foreach ($customers as $key => $bus  ) {
$bus_name = $bus["bus_name"];
$key++;
 ?>


<tbody>

<tr>
<td><?php echo $key ?></td>
<td><?php echo $bus["bus_name"]; ?></td>
<td><?php echo $bus["departure"]; ?></td>
<td><?php echo $bus["arrival"]; ?></td>
<td><?php echo $bus["time_"]; ?></td>
<td>N <?php echo number_format($bus["price"]); ?></td>
<!-- <td>16:00</td> -->

</tr>

<?php
}
 ?>

</tbody>

</table>
</div>


<script>
  $(document).ready(function(){
  $('#route_table').DataTable();
  });
</script>

<?php
include("body/footer.php");
?>

</body>
</html>
