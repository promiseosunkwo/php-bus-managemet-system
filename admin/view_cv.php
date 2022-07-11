
<?php
require_once('../includes/load.php');

if (isset($_GET['view_id'])) {
  $profile_id = $_GET['view_id'];
$table = "admin_users";
$load = $select->load_single_user($profile_id,$table);
$doc = $load->cv;
}

$file = "cv/$doc";
$filename = $doc;
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename .'"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($file);

 ?>
