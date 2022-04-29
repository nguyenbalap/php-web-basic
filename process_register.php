<?php



if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
    header("location:signup.php?error=Thông tin không được để trống");
    exit;
} else {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    require "./admin/connect.php";
    $sql = "select count(*) from customer where email = '$email'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result)['count(*)'];
    // die($row);
    if ($row == 1) {
        header('location:signup.php?error=Email đã tồn tại vui lòng thử lại');
        exit;
    } else if ($password !== $confirm) {
        header('location:signup.php?error=Mật khẩu không khớp');
        exit;
    } else {
        $sql = "insert into customer (name, email,address,phone, password, confirm_password) values ('$name', '$email','$address','$phone', '$password', '$confirm')";
        $conn->query($sql);

        header('location:signing.php?success=Đăng ký thành công');
    }
}