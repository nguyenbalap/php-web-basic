<?php

$email = $_POST['email'];
$password = $_POST['password'];

require "./connect.php";
$sql = "select * from admin where email='$email' and password = '$password' limit 1 ";

$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) !== 1) {
    header('location:index.php?error=Sai mật khẩu hoặc email');
    exit;
}
session_start();
$_SESSION['id_admin'] = $row['id'];
$_SESSION['name_admin'] = $row['name'];
$_SESSION['level'] = $row['level'];


header('location:./root/index.php');