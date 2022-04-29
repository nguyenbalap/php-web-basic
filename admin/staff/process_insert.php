<?php
require "../check_super_admin.php";

// $id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];

require '../connect.php';

if (empty($name) || empty($email) || empty($password)) {
    header('location:./index.php?error=Phải điền đẩy đủ thông tin');
    exit;
}
$sql = "insert into admin (name,email,password,level) values ('$name','$email','$password','$level')";
mysqli_query($conn, $sql);
$conn->close();

// $conn->query($sql);
header('location:./index.php?success=Thành công');