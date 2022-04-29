<?php
session_start();

if (isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    require './admin/connect.php';
    $sql = "select * from customer where token = '$token' limit 1";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
    }
}
if (isset($_SESSION['id'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">

            <div class="alert alert-warning text-center my-4">
                Looking for a more detailed example? Checkout the <a
                    href="https://bootstrapcreative.com/shop/bootstrap-4-toolkit/" target="_blank">Bootstrap 4 Templates
                    Kit</a>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <div class="row">
                        <div class="col text-center">
                            <h1>Signing</h1>
                            <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia
                                and Consonantia. </p>
                        </div>
                    </div>
                    <form action="process_login.php" method="POST">

                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                            </div>

                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember">
                                        Ghi nhớ mật khẩu
                                </div>

                                <button class="btn btn-primary mt-4">Đăng nhập</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <script src="" async defer></script>
</body>

</html>