<?php
require "../check_super_admin.php";

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['image'];

include "../connect.php";

if (empty($name) || empty($address) || empty($phone) || empty($image)) {
    header("location:./index.php?id='$id'&error=Phải điền đẩy đủ thông tin");
    exit;
}
$sql = "update manufacturer set name='$name', address='$address',
phone='$phone',
image='$image' where id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location:./index.php?id='$id'&success=Thành công");
} else {
    header("location:./index.php?id='$id'&error=Lỗi truy vấn");
}
$conn->close();