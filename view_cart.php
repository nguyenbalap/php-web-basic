<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:index.php?warning=Phải có tài khoản');
    exit;
}
$cart = array();
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

$sum = 0;
$id = $_SESSION['id'];
require "./admin/connect.php";

$sql = "select * from customer where id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
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
    <?php
    include './menu.php';
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4 mt-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Giỏ hàng</h1>

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
                        <th scope="col">Thao tác</th>
                        <th scope="col">Tổng tiền</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $id => $each) : ?>
                    <tr>
                        <td>
                            <img src="./admin/products/photo/<?php echo $each['image'] ?>"
                                style="height: 100px;width: 100px;" alt="...">
                        </td>
                        <td><?php echo $each['name'] ?></td>
                        <td>
                            <spam class="span_price">
                                <?php echo $each['price'] ?>

                            </spam>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary btn-update-quantity"
                                data-id="<?php echo $id ?>" data-type="decrease">-</button>

                            <span class="btn_quantity_val">
                                <?php echo $each['quantity'] ?>
                            </span>

                            <button class="btn btn-sm btn-outline-secondary btn-update-quantity"
                                data-id="<?php echo $id ?>" data-type="increase">+</button>
                        </td>

                        <td>
                            <a class="btn btn-danger" href="delete_product.php?id=<?php echo $id ?>">Xóa</a>
                        </td>
                        <td>
                            <span class="span_total_price">
                                <?php
                                    $sum += $each['quantity'] * $each['price'];
                                    echo $each['quantity'] * $each['price'] ?>
                            </span>

                        </td>

                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

            <div>
                <h2>
                    Tổng tiền: <span class="span_sum"><?php echo $sum ?></span>
                </h2>
                <form action="process_checkout.php" method="POST">

                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="text" class="form-control" value="<?php echo $row['name'] ?>"
                                placeholder="Tên người nhận" name="name_receive">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="text" class="form-control" value="<?php echo $row['address'] ?>"
                                placeholder="Địa chỉ người nhận" name="address_receive">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="text" class="form-control" value="<?php echo $row['phone'] ?>"
                                placeholder="Số điện thoại người nhận" name="phone_receive">
                        </div>
                    </div>
                    <div class="row justify-content-start mt-4">
                        <div class="col">
                            <button class="btn btn-primary mt-4">Đặt hàng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $(".btn-update-quantity").click(function() {
            let id = $(this).data('id');
            let type = $(this).data('type');

            let _this = $(this);

            // let quantity = $(".btn_quantity_val").text();
            // console.log(quantity);

            // quantity++;

            $.ajax({
                    url: "update_quantity.php",
                    type: 'GET',
                    data: {
                        id,
                        type
                    },

                })
                .done(function(res) {
                    let parents_tr = _this.parents('tr');
                    let quantity = parents_tr.find('.btn_quantity_val').text();
                    let price = parents_tr.find('.span_price').text();

                    if (type == 'increase') {
                        quantity++;
                    } else {
                        if (quantity == 1) {
                            _this.parents('tr').remove();
                        } else quantity--;

                    }
                    let total = price * quantity;

                    parents_tr.find('.btn_quantity_val').text(quantity);
                    parents_tr.find('.span_total_price').text(total);
                    let sum = 0;
                    let total_quantity = 0;
                    $(".span_total_price").each(function() {
                        sum += parseFloat($(this).text());
                    })

                    $(".btn_quantity_val").each(function(index, val) {
                        total_quantity += parseFloat(val.innerHTML);
                    })

                    $(".span_sum").text(sum);
                    $(".btn_quantity").text(total_quantity);

                })
                .fail(function() {
                    console.log('error')
                })
        })

    })
    </script>
</body>

</html>