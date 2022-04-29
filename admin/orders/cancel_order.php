<?php
require "../check_admin.php";
require "../connect.php";
$sql = "select orders.*, customer.name,customer.address,customer.phone from orders join customer on orders.customer_id = customer.id && orders.status = 2";
$result = mysqli_query($conn, $sql);
$num = mysqli_fetch_all($result);

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar 1 -->
            <?php include "../sidebar.php" ?>
            <!-- end sidebar 1 -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Đơn đã hủy(<?php echo count($num) ?>)</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

                <!-- <h2>Section title</h2> -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Thông tin người nhận</th>
                                <th scope="col">Thông tin người đặt</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tổng tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $each) { ?>
                            <tr>
                                <td><?php echo $each['date'] ?></td>
                                <td>
                                    <?php echo $each['name_receive'] ?>
                                    <?php echo $each['address_receive'] ?>
                                    <?php echo $each['phone_receive'] ?>

                                </td>
                                <td>
                                    <?php echo $each['name'] ?>
                                    <?php echo $each['address'] ?>
                                    <?php echo $each['phone'] ?>
                                </td>
                                <td><?php
                                        switch ($each['status']) {
                                            case 0:
                                                echo 'Mới đặt';
                                                break;
                                            case 1:
                                                echo "Đang giao";
                                                break;
                                            case 2:
                                                echo "<span class='text-danger'>Đã hủy </span>";
                                                break;
                                        }
                                        ?></td>
                                <td>$<?php echo $each['total_money'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>

            <?php include "../footer.php" ?>
        </div>
    </div>
    <script>

    </script>
</body>

</html>