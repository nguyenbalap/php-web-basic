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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    .row_item {
        display: flex;
        justify-content: center;
        align-self: center;
        width: 60%;
        margin: auto;
        margin-top: 30px;
        padding-bottom: 30px;
        padding-top: 10px;

        background-color: #fff;
    }

    .row_divider {
        margin-left: 16px;
    }
    </style>
</head>

<?php
$id = $_GET['id'];
require "./admin/connect.php";
$sql = "select * from products where id = '$id'";
$result = mysqli_query($conn, $sql);
$each = mysqli_fetch_array($result);
session_start();

?>

<body style="background-color: #f5f5f5;">
    <?php
    include './menu.php'

    ?>



    <div class="row_item">
        <div>
            <img src="./admin/products/photo/<?php echo $each['image'] ?>" style="height: 300px;width: 300px;"
                alt="...">
        </div>
        <div class="row_divider">
            <h5><?php echo $each['name'] ?></h5>
            <p><?php echo $each['description'] ?></p>
            <img src="./admin/products/photo/background.png" style="width: 100%;" alt="...">
            <p class="text-success"><?php echo $each['price'] ?></p>
            <a href="#" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</a>
            <a href="#" class="btn btn-sm btn-outline-secondary">Mua ngay</a>
        </div>
    </div>



    <?php
    include './footer.php'

    ?>

    <script src="" async defer></script>
</body>

</html>