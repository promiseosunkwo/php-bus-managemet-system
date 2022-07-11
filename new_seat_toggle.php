
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->

    <style>
    .checked {
    border:solid 2px red;
      /* background:#ffff00; */
    }
    </style>


    <div class="container" id=imgs>
      <div class="row">
        <div class="col-sm-8 pt-1 pb-3 text-center" style="background-color:white;">
          <img src="#" style="width:7%;" class="p-2" alt="">
          <img src="#" style="width:7%;" class="p-2" alt="">
          <img src="#" style="width:7%;" class="p-2" alt="">
          <a href="#"><img src="images/seat_icon.jpg" class="p-2 select_img" id=1 style="width:11%;" alt=""></a>
          <a href="#"><img src="images/seat_icon.jpg" class="p-2 select_img" id=2 style="width:11%;" alt=""></a>
          <br>
          <img src="#" style="width:7%;" class="p-2" alt="">
          <img src="#" style="width:7%;" class="p-2" alt="">
          <a href="#"><img src="images/seat_icon.jpg"  class="p-2 select_img" id=3 style="width:11%;" alt=""></a>
          <a href="#"><img src="images/green_seat.jpg" class="p-2 select_img" id=4 style="width:10%;" alt=""></a>
          <a href="#"><img src="images/green_seat.jpg" class="p-2 select_img" id=5 style="width:10%;" alt=""></a>
          <br>
          <a href="#"><img src="images/blue_seat.jpg" class="p-2 select_img" id=6 style="width:9%;" alt=""></a>
          <a href="#"><img src="images/seat_icon.jpg" class="p-2 select_img" id=7 style="width:11%;" alt=""></a>
          <a href="#"><img src="images/blue_seat.jpg" class="p-2 select_img" id=8 style="width:9%;" alt=""></a>
          <a href="#"><img src="images/seat_icon.jpg" class="p-2 select_img" id=9 style="width:11%;" alt=""></a>
          <a href="#"><img src="images/blue_seat.jpg" class="p-2 select_img" id=10 style="width:9%;" alt=""></a>
        </div>
        <div class="col-sm-4 pt-3 text-center">
          <img src="images/blue_seat.jpg" style="width:6%;" class="pb-2" alt=""> <b>Unavailable</b>
          <br>
          <img src="images/green_seat.jpg" style="width:8%;" class="pb-2"  alt=""> <b>Available</b>
          <br>
          <img src="images/seat_icon.jpg" style="width:10%;" class="pb-2" alt=""> <b>Booked</b>
          <br><br>
          <a href="#" class="btn btn-danger text-white">Continue</a>
        </div>
      </div>
      </div>

      <div id=display>*</div>

<script>
$(document).ready(function() {
////////////////////////
var image_selected = new Array();

//////////////
$('#imgs').on('click', ".select_img", function () {

var aa = $(this)
if( !aa.is('.checked')){
aa.addClass('checked');

var my_id=this.id;
image_selected.push(my_id);

} else {
aa.removeClass('checked');
var my_id=this.id;
var index = image_selected.indexOf(my_id);
if (index > -1) {
image_selected.splice(index, 1);
}
}
$('#display').html("ID of selected images :"+image_selected);
})

///////////////////

})</script>
