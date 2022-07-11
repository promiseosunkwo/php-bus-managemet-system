<?php

if (!isset($_SESSION['email'])) {
  header('location:admin_login.php');
  exit();
}

    //Logout
    include('includes/load.php');
    session_destroy();
    header('location:admin_login.php');





?>
