<?php
// error_reporting(E_ALL);ini_set('display_errors',1);
ob_start();
require_once("load.php");
class Login{
public function __construct(){
global $db;
session_start();
$this->db =  $db;
}

public function verify_login($post){
global $db;
// check if user exists
$email = $post['email'];
$password = $post['password'];
$password_hash =  password_hash($password,PASSWORD_DEFAULT);
$table = 'admin_users';
$id = $this->user_profile_id($table,$email);
$db_pass = $this->get_password($table,$email);
if (password_verify($password,$db_pass)) {
if ($this->email_exists($table,$email ) == true) {
header("location:admin_dashboard.php?staff_id=$id");
$_SESSION['email'] = $email;
exit();
}
}
echo "<script>alert('Incorrect Username or Password')
      window.location.replace('admin_login.php')
      </script>";
exit();
}




// public function verify_session(){
// $user_email = $_SESSION['email'];
// $user = $this->user_exists();
//
// if (false !== $user) {
// $this->user = $user;
// return true;
// }
// return false;
// }
//

private function user_exists($table,$email){
global $db;
$user = $db->get_results("SELECT * FROM $table WHERE email = '$email'");
$run = mysqli_num_rows($user);
if ($run == 1) {
return true;
}
return false;
}


public function email_exists($table,$email){
global $db;
$user = $db->get_results("SELECT * FROM $table WHERE email = '$email'");
$run = mysqli_num_rows($user);
if ($run == 1) {
return true;
}
return false;
}

private function auth_exists($table,$auth){
global $db;
$user = $db->query("SELECT * FROM $table WHERE auth_code = '$auth'");
$result = mysqli_num_rows($user);
if ($result > 0) {
return true;
}
}


public function user_profile_id($table,$user){
global $db;
$query =$db->get_results("SELECT * FROM $table WHERE email = '$user'");
$result = mysqli_num_rows($query);
if ($result == 1) {
while ($row = mysqli_fetch_assoc($query)) {
 return $row['id'];
}
}
}

public function get_password($table,$email){
global $db;
$query =$db->get_results("SELECT * FROM $table WHERE email = '$email'");
$result = mysqli_num_rows($query);
if ($result == 1) {
while ($row = mysqli_fetch_assoc($query)) {
return $row['password'];
}
}
}
}
$login = new Login;
ob_end_flush();
