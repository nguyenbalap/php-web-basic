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
    <link rel="stylesheet" href="./styles.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body>
    <header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <div class="col-md-3 col-lg-2 me-0 p-0"></div>

        <div class="col-md-9 col-lg-10 me-0 px-0 d-flex justify-content-center py-0">
            <span class="mb-0 mx-auto filter-span"
                style="color: white; font-size: 1.75rem; padding: 0; font-weight: 700">Hệ thống quản lý bán hàng NBL - 1
                thương hiệu triệu niềm tin !!!
            </span>
        </div>
    </header>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
        style="position: static !important">

        <!--<div class="position-sticky pt-3">-->
        <!--
        <div class="pt-3" 
             style="position: fixed !important; position: sticky !important; overflow-y: auto; overflow-x: hidden">-->
        <div class="pt-3 col-md-3 col-lg-2 bg-light"
            style="position: fixed !important; overflow-y: auto; overflow-x: hidden; height: 100%">
            <!-- sidebar 1 -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="../root/">
                        <span data-feather="home"></span>
                        <i class="ion-person "></i>
                        <?php echo $_SESSION['name_admin'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="../root/">
                        <span data-feather="home"></span>
                        Tổng quan
                    </a>
                </li>
                <?php if ($_SESSION['level'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../manufacturer">
                        <span data-feather="file"></span>
                        Quản lý nhà cung cấp
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../staff">
                        <span data-feather="file"></span>
                        Quản lý nhân viên
                    </a>
                </li>
                <?php  } ?>
                <li class="nav-item">
                    <a class="nav-link" href="../products/">
                        <span data-feather="shopping-cart"></span>
                        Quản lý sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../orders/">
                        <span data-feather="users"></span>
                        Quản lý đơn hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../orders/cancel_order.php">
                        <span data-feather="bar-chart-2"></span>
                        Đơn đã hủy
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../orders/approve_order.php">
                        <span data-feather="layers"></span>
                        Đơn đang giao
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../process_logout.php">
                        <span data-feather="layers"></span>
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
    // const tabs = document.querySelectorAll(".nav-link");
    // console.log(tabs)
    // // const $$ = document.querySelectorAll.bind(document);
    // // document.querySelector(".nav-link.active").classList.remove("active");

    // for (let i = 0; i < tabs.length; i++) {
    //     tabs[i].onclick = function() {

    //         this.classList.add("active");
    //         console.log(123)

    //     }
    // }
    // const tabs = $(".nav-link");
    // console.log(tabs)
    </script>
</body>

</html>