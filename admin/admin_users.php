<?php
require_once('../includes/load.php');
if (isset($_GET["staff_id"])) {
  $staff_id = $_GET["staff_id"];
}

if (isset($_GET["del_id"]) ) {

$del_id = $_GET["del_id"];
$table = 'admin_users';
$delete = $select->delete_users($table,$del_id);
if ($delete) {
echo "<script>alert('Delete was sucessful')
window.location.replace('admin_dashboard.php?staff_id=$staff_id&action=admin_users')
</script>";
}else {
echo "<script>alert('Something went wrong!')</script>";
}
}



 ?>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->


<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>

<!-- <link rel="stylesheet" href="../css/mycss/admin_user_profile.css"> -->
<link rel="stylesheet" href="../css/mycss/table_style.css">





</head>
<body>

<div class="container-xl">
<div class="table-responsive">
<div class="table-wrapper">
<div class="table-title">
<div class="row">
<div class="col-sm-6">
<h2>Manage <b>Employees</b></h2>
</div>
<div class="col-sm-6">
<a href="#addEmployeeModal" class="btn btn-primary bg-primary" data-toggle="modal"><i class="material-icons ">&#xE147;</i> <span>Add New Employee</span></a>
<!-- <a href="" type="submit" class="btn btn-danger bg-danger" ><i class="material-icons ">&#xE15C;</i> <span>Delete</span></a> -->
</div>
</div>
</div>

<table id="admin_user_table" class="table table-striped table-hover table-responsive">
<thead>
<tr>
<!-- <th>
<span class="custom-checkbox">
<input type="checkbox" id="selectAll">
<label for="selectAll"></label>
</span>
</th> -->
<th>Full Name</th>
<th>Email</th>
<th>Address</th>
<th>Phone</th>
<th>Actions</th>
</tr>
</thead>
<?php
$table = 'admin_users';
$profiles = $select->load_users($table);

foreach ($profiles as $profile) {

  $full_name = $profile->full_name;
 ?>



<tbody>

<tr>

<td style="width:30%;"><?php echo $profile->full_name; ?></td>
<td><?php echo $profile->email; ?></td>
<td><?php echo $profile->residence; ?></td>
<td><?php echo $profile->phone_number; ?></td>
<td style="width:15%;">
<a data-id="" href="staff_profile.php?staff_id=<?php echo $staff_id ?>&profile_id=<?php echo $profile->id ?>" id="view"  ><i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i></a>
<a  href="edit_profile.php?staff_id=<?php echo $staff_id ?>&edit_id=<?php echo $profile->id ?>"  class="Delete"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE8B8;</i></a>
<a  href="?staff_id=<?php echo $staff_id ?>&action=admin_users&del_id=<?php echo $profile->id ?>" onclick="return confirm('Are you sure you want to delete <?php echo $profile->full_name; ?>')" class="Delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xe92e;</i></a>

<!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
</td>
</tr>
<?php
}
 ?>
</tbody>

</table>

<!-- <div class="clearfix">
<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
<ul class="pagination">
<li class="page-item disabled"><a href="#">Previous</a></li>
<li class="page-item"><a href="#" class="page-link">1</a></li>
<li class="page-item"><a href="#" class="page-link">2</a></li>
<li class="page-item active"><a href="#" class="page-link">3</a></li>
<li class="page-item"><a href="#" class="page-link">4</a></li>
<li class="page-item"><a href="#" class="page-link">5</a></li>
<li class="page-item"><a href="#" class="page-link">Next</a></li>
</ul>
</div>
</div> -->
</div>
</div>


<!-- Edit Modal HTML -->
<?php
if (isset($_POST['submit'])) {
$new_user = $insert->new_staff($_POST,$staff_id);

}
if( $_SERVER['REQUEST_METHOD']=='POST' ){
    foreach( $_POST as $field => $value ) $_SESSION[ 'formfields' ][ $field ]=$value;
}

/* Function used in html - provides previous value or empty string */
function fieldvalue( $field=false ){
        return ( $field && !empty( $field ) && isset( $_SESSION[ 'formfields' ] ) && array_key_exists( $field, $_SESSION[ 'formfields' ] ) ) ? $_SESSION[ 'formfields' ][ $field ] : '';
}

 ?>




<!--  NEW USER MODAL -->
<div id="addEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form action="" method="post" enctype="multipart/form-data">
<div class="modal-header">
<h4 class="modal-title">Add Employee</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">



  <div class="row">
    <div class="col-lg-6">

      <div class="form-group">
      <label>Full Name</label>
      <input type="text" name="full_name" class="form-control" value='<?php  ".fieldvalue('full_name')." ?>' required>
      </div>
      <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
      <label>Address</label>
      <textarea class="form-control" name="residence" required></textarea>
      </div>
      <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone_number" class="form-control" required>
      </div>
      <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control" required>
      </div>
      <div class="form-group">
      <label>Role</label>
      <select type="text" name="role" class="form-control" required>
        <option value="" selected></option>
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

      <div class="form-group">
      <label>Input Password</label>
      <input type="password" class="form-control" name="password1" required>
      </div>

    </div>


    <div class="col-lg-6">

      <div class="form-group">
      <label>Employment Date</label>
      <input type="date" name="employment_date" class="form-control" required>
      </div>
      <div class="form-group">
      <label>Upload Employee Picture</label>
      <input type="file" name="upload_img" class="form-control" required>
      </div>
      <div class="form-group">
      <label>Upload CV (PDF only)</label>
      <input type="file" name="cv" class="form-control" required>
      </div>

      <div class="form-group">
      <label>Full Name of Guarantor</label>
      <input type="text" name="name_of_guarantor" class="form-control" required>
      </div>
      <div class="form-group">
      <label>Residence of Guarantor</label>
      <textarea class="form-control" name="residence_of_guarantor" required></textarea>
      </div>
      <div class="form-group">
      <label>Phone No of Guarantor</label>
      <input type="number" class="form-control" name="phone_of_guarantor" required>
      </div>
      <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" class="form-control" name="password2" required>
      </div>


    </div>

  </div>




</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" name="submit" class="btn btn-success text-white" value="Add">
</div>
</form>
</div>
</div>
</div>


<!-- END OF NEW USER MODAL -->


<!-- Edit Modal HTML -->
<!-- <div id="editEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form>
<div class="modal-header">
<h4 class="modal-title">Edit Employee</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" required>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" required>
</div>
<div class="form-group">
<label>Address</label>
<textarea class="form-control" required></textarea>
</div>
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control" required>
</div>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" class="btn btn-info" value="Save">
</div>
</form>
</div>
</div>
</div> -->

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form action="" method="post">
<div class="modal-header">
<h4 class="modal-title">Delete Employee</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<p>Are you sure you want to delete these Records?</p>
<p class="text-warning"><small>This action cannot be undone.</small></p>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" class="btn btn-danger" value="Delete">
</div>
</form>
</div>
</div>
</div>






<!--Modal Full profile -->
<div id="viewEmployeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewEmployeeModalTitle" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h4 class="modal-title"></h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">


  <!-- <span id="pid"></span> -->


<?php
$id = "<span id=\"pid\"></span>";

$table = 'admin_users';
// $loader = $select->load_single_user($id,$table);


 ?>


  <div class="container">
    <div class="main-body">

<!-- Breadcrumb -->
<!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
<li class="breadcrumb-item active" aria-current="page">User Profile</li>
</ol>
</nav> -->
<!-- /Breadcrumb -->

<div class="row gutters-sm">
<div class="col-md-4 mb-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">

<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
<div class="mt-3">
<h4><?php?></h4>
<p class="text-secondary mb-1"><?php ?></p>
<p class="text-muted font-size-sm">20 Edenwu, Street, New Haven, Enugu</p>
<!-- <button class="btn btn-primary">Follow</button>
<button class="btn btn-outline-primary">Message</button> -->
</div>
</div>
</div>
</div>
<div class="card mt-3">
<ul class="list-group list-group-flush">
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
<span class="text-secondary">https://bootdey.com</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
<span class="text-secondary">bootdey</span>
</li>
<!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
<span class="text-secondary">@bootdey</span>
</li> -->
<!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
<span class="text-secondary">bootdey</span>
</li> -->
<!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
<span class="text-secondary">bootdey</span>
</li> -->
</ul>
</div>
</div>




<div class="col-md-8">
<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Email</h6>
</div>
<div class="col-sm-8 text-secondary">
Kenneth Valdez
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Date of Birth</h6>
</div>
<div class="col-sm-8 text-secondary">
fip@jukmuh.al
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Employed Date</h6>
</div>
<div class="col-sm-8 text-secondary">
Bay Area, San Francisco, CA
</div>
</div>
<hr>



<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Guarantor Name</h6>
</div>
<div class="col-sm-8 text-secondary">
(239) 816-9029
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Guarantor Phone</h6>
</div>
<div class="col-sm-8 text-secondary">
(320) 380-4539
</div>
</div>
<hr>

<div class="row">
<div class="col-sm-4">
<h6 class="mb-0">Guarantor Address</h6>
</div>
<div class="col-sm-8 text-secondary">
(320) 380-4539
</div>
</div>
<hr>





</div>
</div>

<?php

 ?>
<div class="row gutters-sm">
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<!-- <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6> -->
<!-- <small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Backend API</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
</div>
</div>
</div>
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<!-- <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6> -->
<!-- <small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
<!-- <small>Backend API</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>





<div class="modal-footer">
<input type="button" class="btn btn-info" data-dismiss="modal" value="Dismiss">

</div>

</div>
</div>
</div>

<script>
  $(document).ready(function(){
  $('#admin_user_table').DataTable();
  });
</script>
