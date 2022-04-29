<?php
require "../check_admin.php";

$id = $_GET['id'];
$sql = "select * from orders_product join products on orders_product.product_id = products.id  where order_id = '$id'";
require "../connect.php";
$result = $conn->query($sql);
$sum = 0;
?>

<!DOCTYPE html>

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
    table {
        table-layout: fixed;
        width: 100%;
    }

    table td {
        word-wrap: break-word;
        /* All browsers since IE 5.5+ */
        overflow-wrap: break-word;
        /* Renamed property in CSS3 draft spec */
    }
    </style>
</head>

<body>

    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4 mt-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Xem chi tiết</h1>

        </div>

        <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

        <!-- <h2>Section title</h2> -->
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $each) : ?>
                    <tr>
                        <td>
                            <img src="../products/photo/<?php echo $each['image'] ?>"
                                style="height: 100px;width: 100px;" alt="...">
                        </td>
                        <td><?php echo $each['name'] ?></td>
                        <td><?php echo $each['price'] ?></td>
                        <td>

                            <?php echo $each['quantity'] ?>
                        </td>
                        <td><?php
                                $sum += $each['quantity'] * $each['price'];
                                echo $each['quantity'] * $each['price'] ?></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <div>
                <h2>
                    Tổng đơn: $<?php echo $sum ?>
                </h2>
            </div>

        </div>

    </main>

    <script src="" async defer></script>
</body>

</html>