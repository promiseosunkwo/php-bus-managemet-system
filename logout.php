<?php

if (!isset($_SESSION['email'])) {
  header('location:login.php');
  exit();
}

    //Logout
    include('includes/load.php');
    session_destroy();
    header('location:login.php');





?>
