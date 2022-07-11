
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<style media="screen">
/* Modal styles */
.modal .modal-dialog {
max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
padding: 20px 30px;
}
.modal .modal-content {
border-radius: 3px;
font-size: 14px;
}
.modal .modal-footer {
background: #ecf0f1;
border-radius: 0 0 3px 3px;
}
.modal .modal-title {
display: inline-block;
}
.modal .form-control {
border-radius: 2px;
box-shadow: none;
border-color: #dddddd;
}
.modal textarea.form-control {
resize: vertical;
}
.modal .btn {
border-radius: 2px;
min-width: 100px;
}
.modal form label {
font-weight: normal;
}

</style>



<div class="container-xl">
<div class="table-responsive">
<div class="table-wrapper">
<div class="table-title">
<div class="row">
<div class="col-sm-5">
<h2>Bus Schedule <b>Management</b></h2>
</div>
<div class="col-sm-7">
<a href="" data-target="#exampleModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons" >&#xE147;</i> <span>Add New Schedule</span></a>
<!-- <a href="#" class="btn btn-secondary"><i class="material-icons" data-toggle="modal">&#xE24D;</i> <span>Export to PDF</span></a> -->
</div>
</div>
</div>
<table class="table table-striped table-hover">
<thead>
<tr>
<th>#</th>
<th>Bus Name</th>
<th>Time</th>
<th>From</th>
<th>To</th>
<th>Amount</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td><a href="#"><img src="../images/person_1.jpg" class="avatar" alt="Avatar" style="width:10%;"> Michael Holz</a></td>
<td>7:30AM</td>
<td>Enugu</td>
<td><span class="status text-success">&bull;</span> Owerri</td>
<td><span class="status text-success">&bull;</span> N8,500</td>
<td>
<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
</td>
</tr>

</tbody>
</table>
<div class="clearfix">
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
</div>
</div>
</div>


<!-- Edit Modal HTML -->
<div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form action="" method="post" enctype="multipart/form-data">
<div class="modal-header">
<h4 class="modal-title">ADD A BUS SCHEDULE</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
  <div class="form-group">
  <label>From Where</label>
  <input type="text" class="form-control" required>
  </div>
<div class="form-group">
<label>To Where</label>
<input type="text" class="form-control" required>
</div>
<div class="form-group">
<label>Bus Name</label>
<input type="email" class="form-control" required>
</div>
<div class="form-group">
<label>Time</label>
<input type="date" class="form-control" required>
</div>
<div class="form-group">
<label>Amount</label>
<input type="number" class="form-control" required>
</div>
<div class="form-group">
<label>Image</label>
<input type="file" class="form-control" required>
</div>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" class="btn btn-success" value="Add">
</div>
</form>
</div>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="myModal" class="modal fade">
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
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form>
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
