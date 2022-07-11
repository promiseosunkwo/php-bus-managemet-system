<?php
$email = $_SESSION['email'];
$server = $_SERVER['SERVER_NAME'];
$host = $_SERVER['HTTP_HOST'];
$self = $_SERVER['PHP_SELF'];


$servername = $server;
$username = "root";
$password = "";

// Creating a connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE transport";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

?>

<?php

// require_once('config.php');
// require_once('class-db.php');


// $sql = "CREATE TABLE IF NOT EXISTS users(
//          ID INT(6) AUTO_INCREMENT PRIMARY KEY,
//          username VARCHAR (26) NOT NULL,
//          email VARCHAR (26) NOT NULL,
//          location VARCHAR (26) NOT NULL,
//          password VARCHAR (26) NOT NULL
//
//
//    )";
//    if ($conn->query($sql) == TRUE) {
//     echo "Table Created";
//   }else {
//     echo "There was an Error";
//   }
//   $conn->close();
//
//
//  ?>
