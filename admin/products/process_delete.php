<?php
require "../check_admin.php";

$id = $_GET['id'];

require "../connect.php";
$sql = "delete from products where id = '$id'";

$conn->query($sql);
header('location:./index.php');
$conn->close();