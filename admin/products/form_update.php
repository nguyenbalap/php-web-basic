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
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
include "../connect.php";
$sql = "select * from manufacturer";
$result = $conn->query($sql);

$id = $_GET['id'];
$sql2 = "select * from products where id='$id'";
$products = $conn->query($sql2);
$data = mysqli_fetch_array($products);



?>

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
                            <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia
                                and Consonantia. </p>
                        </div>
                    </div>
                    <form action="process_update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name"
                                    value="<?php echo $data['name'] ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <textarea class="form-control" rows="3" placeholder="Mô tả"
                                    name="description"><?php echo $data['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                Ảnh cũ
                                <img src="photo/<?php echo $data['image'] ?>" style="height: 100px;">
                                <input type="hidden" name="image_old" value="<?php echo $data['image'] ?>">
                            </div>

                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                Hoặc đổi mới
                                <input type="file" class="form-control" placeholder="Ảnh" name="image_new">
                            </div>

                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input type="" class="form-control" placeholder="Giá" name="price"
                                    value="<?php echo $data['price'] ?>">
                            </div>

                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <select name="manufacturer_id" id="" class="form-control">
                                    <?php foreach ($result as $each) : ?>
                                    <option value="<?php echo $each['id'] ?>"
                                        <?php if ($data['manufacturer_id'] == $each['id']) { ?> selected <?php } ?>>
                                        <?php echo $each['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- <input type="" class="form-control" placeholder="Giá" name="price"> -->
                            </div>

                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col text-center">
                                <button class="btn btn-primary btn-lg">Sửa</button>
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