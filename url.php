<?php
if (!isset($_SESSION['email'])) {
header('location:login.php');
exit();
}else {
$email = $_SESSION['email'];
}
$query = $db->get_results("SELECT * FROM registered_users WHERE email = '$email'");
if(mysqli_num_rows($query) == 1) {
while ($row = mysqli_fetch_array($query)) {
$db_id = $row["id"];
}
}
if (isset($_GET["user_id"]) && empty($_GET["user_id"]) || !isset($_GET["user_id"]) || $_GET["user_id"] == NULL) {
echo "<script>window.location.replace('login.php')</script>";
exit();
}
if ($user_id !== $db_id) {
echo "<script>window.location.replace('login.php')</script>";
exit();
}
?>
