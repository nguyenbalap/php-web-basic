<?php
require "../check_super_admin.php";

// $id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['image'];

require '../connect.php';

if (empty($name) || empty($address) || empty($phone) || empty($image)) {
    header('location:./index.php?error=Phải điền đẩy đủ thông tin');
    exit;
}
$sql = "insert into manufacturer (name,address,phone,image) values ('$name','$address','$phone','$image')";
mysqli_query($conn, $sql);
$conn->close();

// $conn->query($sql);
header('location:./index.php?success=Thành công');