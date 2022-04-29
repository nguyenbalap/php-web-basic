<?php
require "../check_admin.php";

// $id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$image = $_FILES['image'];
$price = $_POST['price'];
$manufacturer_id = $_POST['manufacturer_id'];

$target_dir = "photo/";
$file_format_name = explode(".", $image['name']);

$file_name = time() . "." . $file_format_name[1];
$target_file = $target_dir . $file_name;

$path_file = move_uploaded_file($image["tmp_name"], $target_file);
require '../connect.php';

// if (empty($name) || empty($description) || empty($price) || empty($image)) {
//     header('location:./index.php?error=Phải điền đẩy đủ thông tin');
//     exit;
// }
$sql = "insert into products (name,description,image,price,manufacturer_id) values ('$name','$description','$file_name','$price','$manufacturer_id')";
mysqli_query($conn, $sql);
$conn->close();

// $conn->query($sql);
header('location:./index.php?success=Thành công');