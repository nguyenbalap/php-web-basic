<?php
require "../check_admin.php";

// $id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$manufacturer_id = $_POST['manufacturer_id'];
$id = $_POST['id'];
$image_old = $_POST['image_old'];
$image_new = $_FILES['image_new'];

if ($image_new['size'] !== 0) {
    $target_dir = "photo/";
    $file_format_name = explode(".", $image_new['name']);

    $file_name = time() . "." . $file_format_name[1];
    $target_file = $target_dir . $file_name;

    $path_file = move_uploaded_file($image_new["tmp_name"], $target_file);
} else {
    $file_name = $_POST['image_old'];
}



require '../connect.php';

// if (empty($name) || empty($description) || empty($price) || empty($image)) {
//     header('location:./index.php?error=Phải điền đẩy đủ thông tin');
//     exit;
// }
$sql = "update products set  name = '$name',description = '$description',image = '$file_name',price = '$price',manufacturer_id = '$manufacturer_id' where id = '$id'";
mysqli_query($conn, $sql);
$conn->close();

// $conn->query($sql);
header('location:./index.php?success=Thành công');