<?php
require "../check_admin.php";
$id = $_GET['id'];
$status = $_GET['status'];


$sql = "update orders set status='$status' where id = '$id'";
require "../connect.php";
$conn->query($sql);
header("location:index.php");