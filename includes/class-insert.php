<?php

require_once('load.php');
date_default_timezone_set('Africa/Lagos');


if (!class_exists('INSERTS')) {
   class INSERTS {

  public function insert_bus_schedule($user_id,$postdata){
  global $db;
  $table = 'available_buses';
  $name = $postdata['name'];
  $password = $postdata['password'];
  if (strlen($password) < 6) {
  echo "<script>alert('Password must be 6 letters and above')</script>";
  echo "<script>window.open('editprofile.php?id=$user_id','_self')</script>";
  exit();
}else {
  $upload_img = $_FILES['upload_img']['name'];
  $img_tmp = $_FILES['upload_img']['tmp_name'];
  // $ref = $this->load_user_object($user_id);
  // $refno = $ref->refno;
  $rand = rand(0,99999999);
  $target = "img/$upload_img.$rand";
  if ($upload_img) {
  move_uploaded_file($img_tmp,$target);
}
  $query = "UPDATE $table SET name='$name', email= '$postdata[email]', phone = '$postdata[phone]', password = '$password'  , profileimage = '$upload_img.$rand' WHERE ID = $user_id";
  if ($query) {
  // $_SESSION['msg'] ='Profile has Updated Successfully';
  // $_SESSION['name'] = $name;
  // echo "<script>alert('Profile Updated Successfully')</script>";
  // echo "<script>window.open('profilepage.php?id=$user_id','_self')</script>";
  // exit();
  header("location:profilepage.php?id=$user_id");
}
}
  return $db->update($query);

}


public function new_staff($postdata,$id){
global $db;
$table = 'admin_users';
$full_name = $db->clean_string($postdata['full_name']);
$email = $db->clean_string($postdata['email']);
$role = $db->clean_string($postdata['role']);
$employment_date = $db->clean_string($postdata['employment_date']);
$phone_number = $db->clean_string($postdata['phone_number']);
$residence = $db->clean_string($postdata['residence']);
// $cv = $db->clean_string($postdata['cv']);
// $picture = $db->clean_string($postdata['picture']);
$dob = $db->clean_string($postdata['dob']);
$name_of_guarantor = $db->clean_string($postdata['name_of_guarantor']);
$phone_of_guarantor = $db->clean_string($postdata['phone_of_guarantor']);
$residence_of_guarantor= $db->clean_string($postdata['residence_of_guarantor']);
$password1 = $db->clean_string($postdata['password1']);
$password2 = $db->clean_string($postdata['password2']);


if (strlen($password1) < 6) {
  echo "<script>alert('Passwords must be 6 characters and above ')
  window.location.replace('admin_dashboard.php?staff_id=$id&action=admin_users')
  </script>";
  exit();
}

if ($password1 !== $password2) {
  echo "<script>alert('Passwords don\'t match ')
  window.location.replace('admin_dashboard.php?staff_id=$id&action=admin_users')
  </script>";
  exit();
}




$allowedExts = array(
  "pdf"

  // "jpg",
  // "jpeg"
);

$upload_doct = $_FILES['cv']['name'];
$cv_tmp = $_FILES['cv']['tmp_name'];
$target_doc = "cv/$upload_doct";
$explode = explode(".", $upload_doct);
$extension = end($explode);

if ( ! ( in_array($extension, $allowedExts ) ) ) {

  echo "<script>alert('Your CV format must be pdf only! ')
    window.location.replace('admin_dashboard.php?staff_id=$id&action=admin_users')
  </script>";
  exit();
}



if ($upload_doct) {
move_uploaded_file($cv_tmp,$target_doc);
}


$upload_img = $_FILES['upload_img']['name'];
$img_tmp = $_FILES['upload_img']['tmp_name'];
$target = "images/$upload_img";
if ($upload_img) {
move_uploaded_file($img_tmp,$target);
}
$password_hash =  password_hash($password1,PASSWORD_DEFAULT);
$query = "INSERT INTO $table (full_name, email, password, role, employment_date, phone_number,residence,cv,picture,dob,name_of_guarantor,phone_of_guarantor,residence_of_guarantor)
          VALUES ('$full_name','$email', '$password_hash', '$role','$employment_date','$phone_number','$residence','$upload_doct','$upload_img','$dob','$name_of_guarantor','$phone_of_guarantor','$residence_of_guarantor')";
$run = $db->update($query);
if ($run) {
  echo "<script>alert('Upload was sucessful')
        window.location.replace('admin_dashboard.php?staff_id=$id&action=admin_users')
        </script>";
  // echo "<script>window.open('uploadbeat.php?id=$user_id','_self')</script>";
  // exit();

// }
}
// return $db->update($query);

}

public function update_staff($postdata,$edit_id,$picture,$docx,$id){
global $db;
$table = 'admin_users';
$full_name = $db->clean_string($postdata['full_name']);
$email = $db->clean_string($postdata['email']);
$role = $db->clean_string($postdata['role']);
$employment_date = $db->clean_string($postdata['employment_date']);
$phone_number = $db->clean_string($postdata['phone_number']);
$residence = $db->clean_string($postdata['residence']);
// $cv = $db->clean_string($postdata['cv']);
// $picture = $db->clean_string($postdata['picture']);
$dob = $db->clean_string($postdata['dob']);
$name_of_guarantor = $db->clean_string($postdata['name_of_guarantor']);
$phone_of_guarantor = $db->clean_string($postdata['phone_of_guarantor']);
$residence_of_guarantor= $db->clean_string($postdata['residence_of_guarantor']);


if ($_FILES['cvs']['name']=='') {
$upload_docx = $docx;
}else {
  $allowedExts = array(
    "pdf",
    "PDF"
    // "jpg",
    // "jpeg"
  );
$upload_docx = $_FILES['cvs']['name'];
$cv_tmp = $_FILES['cvs']['tmp_name'];
$explode = explode(".", $upload_docx);
$extension = end($explode);
$target_doc = "cv/$upload_docx";


if ( ! ( in_array($extension, $allowedExts ) ) ) {

  echo "<script>alert('Only pdf is allowed ')
    window.location.replace('edit_profile.php?staff_id=$id&action=admin_users')
  </script>";
  exit();
}




if ($upload_docx) {
move_uploaded_file($cv_tmp,$target_doc);
}
}

if ($_FILES['upload_image']['name']=='') {
$upload_image = $picture;

}else {

$upload_image = $_FILES['upload_image']['name'];
$img_tmp = $_FILES['upload_image']['tmp_name'];


$target = "images/$upload_image";
if ($upload_image) {
move_uploaded_file($img_tmp,$target);
}
}

$query = "UPDATE $table SET full_name = '$full_name', email = '$email', role = '$role', employment_date = '$employment_date',
          phone_number = '$phone_number', residence = '$residence',cv = '$upload_docx',picture = '$upload_image', dob = '$dob',
          name_of_guarantor = '$name_of_guarantor', phone_of_guarantor = '$phone_of_guarantor',
          residence_of_guarantor = '$residence_of_guarantor'  WHERE id = '$edit_id'";
$run = $db->update($query);
if ($run) {
  echo "<script>alert('Update was Successful')
        window.location.replace('admin_dashboard.php?staff_id=$id&action=admin_users&edit_id=$edit_id')
        </script>";

}else {
  echo "<script>alert('Something went wrong')

  </script>";
}


}



public function update_bus($postdata,$bus_id,$pic,$id){
global $db;
$table = 'bus_management';
$bus_name = $db->clean_string($postdata['bus_name']);
$bus_no = $db->clean_string($postdata['bus_no']);
$departure = $db->clean_string($postdata['departure']);
$arrival = $db->clean_string($postdata['arrival']);
$price = $db->clean_string($postdata['price']);
$ac = $db->clean_string($postdata['ac']);
$time_ = $db->clean_string($postdata['time_']);
$seats = $db->clean_string($postdata['seats']);
$remarks = $db->clean_string($postdata['remarks']);

if ($_FILES['bus_img']['name']=='') {
$bus_img = $pic;
}else {
$allowedExts = array(
"jpg",
"jpeg",
"png"
);
$bus_img  = $_FILES['bus_img']['name'];
$bus_tmp = $_FILES['bus_img']['tmp_name'];
$explode = explode(".", $bus_img);
$extension = end($explode);
$target_doc = "bus_images/$bus_img";

if ( ! ( in_array($extension, $allowedExts ) ) ) {

echo "<script>alert('Only pdf is allowed ')
window.location.replace('edit_profile.php?staff_id=$id&action=bus_management&edit_id=$edit_id')
</script>";
exit();
}
if ($bus_img) {
move_uploaded_file($bus_tmp,$target_doc);
}
}
$query = "UPDATE $table SET bus_name = '$bus_name', bus_no = '$bus_no', departure = '$departure', arrival = '$arrival',
price = '$price', ac = '$ac', pic = '$bus_img', time_ = '$time_',
seats = '$seats', remarks = '$remarks' WHERE id = '$bus_id'";
$run = $db->update($query);
if ($run) {
echo "<script>alert('Update was Successful')
window.location.replace('admin_dashboard.php?staff_id=$id&action=bus_management')
</script>";
}else {
echo "<script>alert('Something went wrong')
</script>";
}
}














public function new_bus($postdata,$id){
global $db;
$table = 'bus_management';
$bus_name = $db->clean_string($postdata['bus_name']);
$bus_no = $db->clean_string($postdata['bus_no']);
$departure = $db->clean_string($postdata['departure']);
$arrival = $db->clean_string($postdata['arrival']);
$price = $db->clean_string($postdata['price']);
$ac = $db->clean_string($postdata['ac']);
$time_ = $db->clean_string($postdata['time_']);
$seats = $db->clean_string($postdata['seats']);
$remarks = $db->clean_string($postdata['remarks']);
$allowedExts = array(
"jpg",
"png",
"jpeg"
);

$bus_pic = $_FILES['bus_img']['name'];
$cv_tmp = $_FILES['bus_img']['tmp_name'];
$target_doc = "bus_images/$bus_pic";
$explode = explode(".", $bus_pic);
$extension = end($explode);

if ( ! ( in_array($extension, $allowedExts ) ) ) {
echo "<script>alert('Your format must be jpg or png only! ')
window.location.replace('admin_dashboard.php?staff_id=$id&action=bus_management')
</script>";
exit();
}

if ($bus_pic) {
move_uploaded_file($cv_tmp,$target_doc);
}

$query = "INSERT INTO $table (bus_no, bus_name, pic, seats, departure, arrival,time_,price,ac,remarks)
VALUES ('$bus_no','$bus_name', '$bus_pic', '$seats','$departure','$arrival','$time_','$price','$ac','$remarks')";
$run = $db->update($query);
if ($run) {
echo "<script>alert('Upload was Successful')
window.location.replace('admin_dashboard.php?staff_id=$id&action=bus_management')
</script>";

}
}
















}
}


$insert = new INSERTS;


 ?>
