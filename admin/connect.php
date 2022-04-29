<?php


$servername = "localhost";
$username = "root";
$db = "web-basic";

// $connect = mysqli_connect($servername, $username, $password, $db);
$conn = new mysqli($servername, $username, "", $db);
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";