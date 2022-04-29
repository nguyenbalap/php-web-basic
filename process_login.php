<?php

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}
if (empty($_POST['email']) || empty($_POST['password'])) {
    header("location:signup.php?error=Thông tin không được để trống");
    exit;
} else {
    require './admin/connect.php';
    $sql = "select * from customer where email='$email' && password='$password'";
    $result = $conn->query($sql);
    $row = mysqli_num_rows(($result));
    $fetch_array = mysqli_fetch_array($result);

    if ($row == 1) {
        $id = $fetch_array['id'];
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $fetch_array['name'];

        if ($remember) {
            $token = md5(uniqid('user', true));
            $sql = "update customer set token = '$token' where id = '$id'";
            mysqli_query($conn, $sql);
            setcookie('remember', $token, time()  + (86400 * 30));
        }

        header('location:index.php?success=Đăng nhập thành công');
        exit;
    } else {
        header('location:signing.php?error=Sai email hoặc mật khẩu');
        exit;
    }
}