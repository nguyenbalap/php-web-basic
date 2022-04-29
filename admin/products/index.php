<?php
require "../check_admin.php";
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
    <link rel="stylesheet" href="../styles.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>'
    <style>
    /* th {
        min-width: 50px;
        max-width: 200px;
        text-align: center;
    } */

    /* .table_wrapper {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    } */
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
<?php
require '../connect.php';
$sql = "select products.*, manufacturer.name as manufacturer_name FROM products JOIN manufacturer WHERE products.manufacturer_id = manufacturer.id";
$result = mysqli_query($conn, $sql);
$error = "";
$success = "";

?>

<body>
    <a href="form_insert.php">Thêm</a>

    <div class="container-fluid">


        <div class="row">
            <!-- sidebar 1 -->
            <?php
            include "../sidebar.php";
            ?>
            <!-- end sidebar 1 -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="form_insert.php" class="btn btn-primary ">Thêm mới</a>

                            <!-- <a href="" class="btn btn-danger ">

                                <?php
                                if (isset($_GET['error'])) {
                                    $error = $_GET['error'];
                                    echo $error;
                                }

                                ?>
                            </a> -->
                        </div>

                    </div>
                </div>

                <h2>Thông tin sản phẩm</h2>
                <div class="table-responsive ">
                    <div class="table_wrapper">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Thao tác</th>

                                    <th scope="col">Mã</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên nhà sản xuất</th>
                                    <th scope="col">Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $each) : ?>

                                <tr>
                                    <td>
                                        <a href="form_update.php?id=<?php echo $each['id'] ?>"
                                            class="btn btn-info">Sửa</a>
                                        <a href="process_delete.php?id=<?php echo $each['id']; ?>"
                                            class="btn btn-danger">Xóa</a>
                                    </td>
                                    <td><?php echo $each['id'] ?></td>
                                    <td><?php echo $each['name'] ?></td>
                                    <td><?php
                                            // $pieces = explode("\n", $each['description']);
                                            // $last = array_pop($pieces);
                                            // $text = implode(" ", $pieces) . " - " . $last;



                                            echo $each['description'] ?></td>

                                    <td>
                                        <img src="photo/<?php echo $each['image'] ?>"
                                            style="height:100px; width: 100px;">
                                    </td>
                                    <td><?php echo $each['manufacturer_name'] ?></td>

                                    <td><?php echo $each['price'] ?></td>


                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>




            </main>

            <!-- <?php
                    // require "../footer.php"
                    ?> -->

        </div>
    </div>
    <script>

    </script>
</body>

</html>