<?php
require "../check_super_admin.php";

$id = $_GET['id'];

require "../connect.php";
$sql = "delete from manufacturer where id = '$id'";

$conn->query($sql);
header('location:./index.php');
$conn->close();