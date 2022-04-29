<?php
session_start();
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
                            <h1>Register</h1>
                            <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia
                                and Consonantia. </p>
                        </div>
                    </div>
                    <form action="process_register.php" method="POST" id="commentForm">
                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input type="text" class="form-control" placeholder="Tên" name="name" required>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="phone"
                                    required>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                                    id="password" required>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Xác nhận lại mât khẩu" required
                                    name="confirm_password">
                            </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="confirm">
                                        I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
                                    </label>
                                </div>

                                <button class="btn btn-primary mt-4">Đăng Ký</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script>
    $("#commentForm").validate({
        rules: {
            'name': {
                required: true,
                maxlength: 15,
                minlength: 2,
            },
            'password': {
                required: true,
                minlength: 6,
            },
            'phone': {
                required: true,
                minlength: 10,
            },
            'confirm_password': {
                required: true,
                equalTo: '#password',
                minlength: 6,
            },
            'email': {
                required: true,
                email: true,
            },

        },
        messages: {
            "name": {
                required: "Không được để trống",
                minlength: "Tên phải trên 2 và dưới 15 ký tự"
            },
            "password": {
                required: "Không được để trống",
                minlength: "Mật khẩu không được dưới 6 ký tự"
            },
            "phone": {
                required: "Không được để trống",
                minlength: "Mật khẩu không được dưới 10 ký tự"
            },
            "email": {
                required: "Không được để trống",
                minlength: "Email phải có @"
            },
            "confirm_password": {
                required: "Không được để trống",
                minlength: "Mật khẩu không được dưới 6 ký tự"
            },
        }
    });
    </script>
</body>

</html>