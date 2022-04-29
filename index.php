<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="a.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .row_item {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-self: center;
        width: 60%;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 10px;
    }

    .row_content {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: auto;
    }

    .row_divider {
        display: flex;
        justify-content: center;
        width: 60%;
        margin: auto;
        align-items: center;
    }

    .divider {
        width: 30%;
        background-color: rgba(0, 0, 0, 0.1);
        ;
        height: 1px;
    }

    .icon_size {
        font-size: 50px;
        color: black;
    }

    .text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .row_products {
        display: flex;
        width: 60%;
        align-items: center;
        flex-wrap: wrap;
        margin: auto;

        justify-content: center;
    }
    </style>
</head>
<?php
require "./admin/connect.php";
$count = "select count(*) from products";
$page = 1;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$res = $conn->query($count);
$total_product = mysqli_fetch_array($res)['count(*)'];

$number_product = 6;
$number_page = ceil($total_product / $number_product);

$current_page = $number_product * ($page - 1);
$sql = "select * from products limit 3";
$sql1 = "select * from products limit $number_product offset $current_page";

$result = $conn->query($sql);
$result1 = $conn->query($sql1);

// echo json_encode($result1->fetch_all());
// die();
if (isset($_GET['warning'])) {
    echo "<script type='text/javascript'>alert('Chưa có tài khoản mời bạn đăng nhập');</script>";
}
if (isset($_GET['type'])) {
    echo "<script type='text/javascript'>alert('Thêm mới thành công');</script>";
}
session_start();
?>

<body>
    <?php
    include "./menu.php"
    ?>
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100"
                        src="http://giaythethao.giaodienwebmau.com/wp-content/uploads/2019/10/banner-4.jpg"
                        alt="First slide">
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="http://giaythethao.giaodienwebmau.com/wp-content/uploads/2019/10/slider_2.jpg"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="http://giaythethao.giaodienwebmau.com/wp-content/uploads/2019/10/banner-1.jpg"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="row_item">
            <div class="row_content">
                <a href="#"><i class="ion-home icon_size"></i></a>
                <h5>GIAO HÀNG MIỄN PHÍ</h5>
                <p>Tất cả sản phẩm đều vận chuyển miễn phí</p>
            </div>
            <div class="row_content">
                <a href="#"><i class="ion-star icon_size"></i></a>
                <h5>BẢO HÀNH SẢN PHẨM 1 NĂM</h5>
                <p> Dịch vụ chăm sóc khách hàng nhiệt tình, chu đáo,
                    Lên tâm nhất
                </p>
            </div>
            <div class="row_content">
                <a href="#"><i class="ion-calendar icon_size"></i></a>
                <h5>GIÁ CẢ LUÔN HỢP LÝ NHẤT</h5>
                <p>Luôn luôn tiết kiệm chi phí khách hàng</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row_divider ">
            <div class="divider"></div>
            <h4 style="margin-left: 4px;margin-right: 4px;">
                Phổ biến
            </h4>
            <div class="divider"></div>

        </div>
    </div>

    <div class="row">
        <div class="row_item">
            <?php foreach ($result as $each) : ?>
            <figure class="snip1268 card" style="margin: 12px;">
                <div class="image">
                    <img src="./admin/products/photo/<?php echo $each['image'] ?>" style="height: 310px;width: 100%;" />
                    <div class="icons">
                        <a href="#"><i class="ion-star"></i></a>
                        <a href="#"> <i class="ion-share"></i></a>
                        <a href="product_detail.php?id=<?php echo $each['id'] ?>"> <i class="ion-search"></i></a>
                    </div>
                    <a href="#" class="add-to-cart">
                        <i class="ion-plus-circled"></i>
                        Add to Cart</a>
                </div>
                <figcaption>
                    <h2 class="text"><?php echo $each['name'] ?></h2>
                    <!-- <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p> -->
                    <div class="price"><?php echo $each['price'] ?> </div>
                </figcaption>
            </figure>
            <?php endforeach ?>

        </div>

    </div>

    <div class="row">
        <div class="row_divider ">
            <div class="divider"></div>
            <h4 style="margin-left: 4px;margin-right: 4px;">
                Sản phẩm
            </h4>
            <div class="divider"></div>

        </div>
    </div>
    <div class="row_products">

        <?php foreach ($result1 as $each1) : ?>
        <a href="product_detail.php?id=<?php echo $each1['id'] ?>">
            <div class="card" style="width: 25%; margin: 12px;">
                <img src="./admin/products/photo/<?php echo $each1['image'] ?>" class="card-img-top" alt="..."
                    style="height: 300px;width: 100%;">
                <div class="card-body">
                    <h5 class="text"><?php echo $each1['name'] ?></h5>
                    <p class="card-text"><?php echo $each1['price'] ?></p>
                    <a></a>
                    <button data-id="<?php echo $each1['id'] ?>" class="btn btn-primary btn-button-add-cart">
                        <i class="ion-checkmark-round"></i>
                        Add to Cart
                    </button>
                </div>
            </div>
        </a>

        <?php endforeach ?>
    </div>

    <div class="row_item">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $number_page; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <!-- Footer -->
    <?php
    include "./footer.php"
    ?>
    <!-- Footer -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $(".btn-button-add-cart").click(function() {
        let id = $(this).data('id');
        $.ajax({
                url: "add_cart.php",
                type: 'GET',
                data: {
                    id
                },

            })
            .done(function(res) {
                console.log(JSON.parse(res));
                let quantity = $(".btn_quantity").text();
                quantity++;
                $(".btn_quantity").text(quantity);

                alert('Thêm giỏ hàng thành công');
            })
            .fail(function() {
                console.log('error')
            })
    })
})
</script>

</html>