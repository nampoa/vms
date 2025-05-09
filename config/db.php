<?php
// OBJECT ORIENTED PHP
$db_server = 'localhost';
$db_name = 'vms';
$db_user = 'root';
$db_pass = '';

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if($conn->connect_error) {
    die('Error connecting to db'. $conn->connect_error);
}

// // PROCEDURAL 
// $conn2 = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// if(!$conn2) {
//     echo "Error connecting to db". mysqli_connect_error();
// }
