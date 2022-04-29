<?php
session_start();
$name_receive = $_POST['name_receive'];
$address_receive = $_POST['address_receive'];
$phone_receive = $_POST['phone_receive'];

$customer_id = $_SESSION['id'];
$cart = $_SESSION['cart'];

$total_money = 0;
require "./admin/connect.php";

foreach ($cart as $each) {
    $total_money += $each['quantity'] * $each['price'];
}
$status = 0; //moi dat
$sql = "insert into orders (name_receive,address_receive,phone_receive, customer_id, status, total_money) values ('$name_receive', '$address_receive', '$phone_receive', '$customer_id', '$status', '$total_money')";
$conn->query($sql);

$sql = 'select max(id) from orders';
$result = $conn->query($sql);
$order_id = mysqli_fetch_array($result)['max(id)'];


foreach ($cart as $id => $each) {
    $quantity = $each['quantity'];
    $sql = "insert into orders_product (order_id, product_id, quantity) values ('$order_id', '$id', '$quantity')";
    $conn->query($sql);
}
unset($_SESSION['cart']);
header('location:index.php?success=Đặt hàng thành công');