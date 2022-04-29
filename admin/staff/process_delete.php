<?php
$id = $_GET['id'];
$sql = "delete from admin where id = '$id'";
require "../connect.php";
$conn->query($sql);
$conn->close();
header('location:index.php');