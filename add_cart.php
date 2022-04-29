<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:index.php?warning=Chưa có tài khoản');
    exit;
}
$id = $_GET['id'];
if (!empty($_SESSION['cart'][$id]) && $id !== "") {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    require './admin/connect.php';

    $sql = "select * from products where id = '$id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $row['name'];
    $_SESSION['cart'][$id]['image'] = $row['image'];
    $_SESSION['cart'][$id]['price'] = $row['price'];
    $_SESSION['cart'][$id]['description'] = $row['description'];
    $_SESSION['cart'][$id]['quantity'] = 1;
}
// header('location:index.php?success=Thêm mới thành công&type=Add');
echo json_encode($_SESSION['cart']);