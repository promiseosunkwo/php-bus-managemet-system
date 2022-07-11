<?php
ob_start();
require_once('../includes/load.php');
if (!isset($_GET["staff_id"])) {
header("location:admin_login.php");
}else {
$staff_id = $_GET["staff_id"];
}
if (isset($_GET["b_id"])) {
$b_id = $_GET["b_id"];
$query = "UPDATE registered_users SET blocked = 1 WHERE id = '$b_id'";
$run = $db->query($query);
if ($run) {
echo "<script>alert('User Blocked')
window.location.replace('admin_dashboard.php?staff_id=$staff_id&action=users')
</script>";

}else {
echo "<script>alert('Something went wrong, contact admin')</script>";
}
}
if (isset($_GET["ub_id"])) {
$b_id = $_GET["ub_id"];
$query = "UPDATE registered_users SET blocked = 0 WHERE id = '$b_id'";
$run = $db->query($query);
if ($run) {
echo "<script>alert('User unblocked')
window.location.replace('admin_dashboard.php?staff_id=$staff_id&action=users')
</script>";
}else {
echo "<script>alert('Something went wrong, contact admin')</script>";
}
}
if (isset($_GET["del_id"])) {
$del_id = $_GET["del_id"];
$query = "DELETE FROM registered_users WHERE id = '$del_id'";
$run = $db->query($query);
if ($run) {
echo "<script>alert('User deleted')
window.location.replace('admin_dashboard.php?staff_id=$staff_id&action=users')
</script>";
}else {
echo "<script>alert('Something went wrong, contact admin')</script>";
}
}
ob_end_flush();
?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<!-- custom style -->

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<!--- Datatables ---------->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
<!-- end Datatables ---------->


<div class="container mt-5">
<h3 class="text-center">All Users</h3><hr>
<table id="user_table" class="table table-striped table-hover">
<thead>
<tr>
<th>#</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Sex</th>
<th>Action</th>
</tr>
</thead>

<?php
$query = $db->query("SELECT * FROM registered_users");
$users = $query->fetch_all(MYSQLI_ASSOC);
foreach ($users as $key => $user  ) {
$key++;
 ?>


<tbody>

<tr>
<td><?php echo $key ?></td>
<td><?php echo $user["first_name"] ?></td>
<td><?php echo $user["last_name"] ?></td>
<td><?php echo $user["phone"] ?></td>
<td><?php echo $user["email"] ?></td>
<td><?php echo $user["sex"] ?></td>
<td style="width:15%;">
<?php if ($user["blocked"] == 0){ ?>
<a href="?staff_id=<?php echo $staff_id;?>&action=users&b_id=<?php echo $user["id"];?>" class="btn btn-info text-white" onclick="return confirm('By clicking this button you are blocking this user?')" id="view">Block</a>
<?php }else{ ?>
<a  href="?staff_id=<?php echo $staff_id;?>&action=users&ub_id=<?php echo $user["id"];?>" class="btn btn-info text-white" onclick="return confirm('By clicking this button you are unblocking this user?')" id="view">Unblock</a>
<?php } ?>
<a  href="?staff_id=<?php echo $staff_id;?>&action=users&del_id=<?php echo $user["id"];?>" onclick="return confirm('Are you sure you want to delete this user?')" class="Delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xe92e;</i></a>
</td>
</tr>

<?php
}
 ?>

</tbody>

</table>
</div>


<script>
  $(document).ready(function(){
  $('#user_table').DataTable();
  });
</script>
