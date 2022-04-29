<?php
$quantity = 0;
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    foreach ($cart as $id => $each) {
        $quantity += $each['quantity'];
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="a.scss">
    <style>
    a:hover,
    a:active {
        color: black;
        text-decoration: none;
    }

    a {
        color: black;

    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #fff;">
        <a class="navbar-brand" href="./index.php">Trang chủ</a>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!-- <li class="nav-item active">
                <a class="nav-link" href="./index.php"> <span class="sr-only">(current)</span></a>
            </li> -->

                <?php
                if (empty($_SESSION['id'])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./signup.php">Đăng ký</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./signing.php">Đăng nhập</a>

                </li>

                <?php } else { ?>
                <li class="nav-item">
                    <a class="btn btn-outline-success my-2 my-sm-0" href="">
                        <i class="ion-person "></i>

                        <?php echo $_SESSION['name'] ?></a>


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./process_logout.php">Đăng xuất</a>

                </li>

                <?php  } ?>

                <li class="nav-item">
                    <a class="nav-link" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Hõ trợ</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm">
                <a href="view_cart.php" class="position-relative">
                    <i class="ion-bag " style="font-size: 24px;"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger btn_quantity">
                        <?php echo $quantity ?>
                    </span>
                </a>
            </form>
        </div>
    </nav>

    <script src="" async defer></script>
</body>

</html>