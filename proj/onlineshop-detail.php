<?php
require __DIR__ . '/__connect_db.php';
$pageName = 'onlineshop-detail';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 1;
$sql = "SELECT * FROM `products` WHERE `sid`= $sid";
$row = $pdo->query($sql)->fetch();



$sql_c = "SELECT * FROM `products` WHERE `sid`";
$cate = $pdo->query($sql_c)->fetchAll();

if (!empty($_SESSION['member']['sid'])) {
    $w_sql = "SELECT sid FROM `wishlist` WHERE member_sid=? AND products_id=?";
    $w_stmt = $pdo->prepare($w_sql);
    $w_stmt->execute([
        $_SESSION['member']['sid'],
        $sid
    ]);

    $wishAdded = $w_stmt->rowCount();
}
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    /* 加入購物車後的彈窗 */
    .a-blocks {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
    }

    @media screen and (max-width: 576px) {
        .a-blocks {
            flex-direction: row;
        }
    }

    .a-blocks .a-block {
        padding-top: 50px;
        text-align: center;
    }

    @media screen and (max-width: 576px) {
        .a-blocks .a-block {
            padding-top: 30px;
            margin-left: 10px;
            margin-right: 10px;
            width: calc(33.33% - 20px);
        }
    }

    .a-blocks .addCart-sidebar {
        background-color: #465038;
        color: #fff;
        cursor: auto;
        display: block;
        height: 100%;
        overflow-y: auto;
        /* padding: 70px 20px 20px; */
        position: fixed;
        float: none;
        right: 0;
        top: 0;
        bottom: 0;
        left: auto;
        text-align: left;
        width: 100%;
        transform: translateZ(0) translateX(0) translateX(100%);
        transition: transform 0.3s ease-in-out;
        z-index: 10;
    }

    .a-blocks .addCart-sidebar {
        padding: 90px 50px 50px;
        width: 600px;
        transform: translateZ(0) translateX(0) translateX(600px);
        z-index: 1000;
    }

    @media screen and (max-width: 576px) {
        .a-blocks .addCart-sidebar {
            width: 100vw;
        }
    }

    .a-blocks .addCart-sidebar .close {
        cursor: pointer;
        display: inline-block;
        margin-bottom: 20px;
        position: absolute;
        top: 20px;
    }

    @media screen and (max-width: 576px) {
        .a-blocks .addCart-sidebar .close {
            padding: 8px;
            top: 36px;
        }
    }

    .a-blocks .addCart-sidebar.open {
        transform: translateZ(0) translateX(0%);
    }

    .addCart-sidebar-form th img {
        width: 60px;
        height: 60px;
    }

    .table th,
    .table td {
        border-top: none;
    }

    .table thead th {
        border-bottom: 2px solid #e0b872;
    }

    .checkOut_btn {
        margin-top: 50px;
    }

    /* ---------------------- */

    .breadcrumb {
        padding: 10px;
    }

    .b-product .b-mainpic li {
        height: 460px;
        width: 460px;
        background: #e8e2d4;

        /* overflow: hidden; */

    }

    .b-mainpic .b-picture {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #e8e2d4;

    }


    .b-product ul li {
        border: 2px solid transparent;
        height: 96px;
        width: 96px;
        margin: 10px;
        background: #e8e2d4;

    }

    .b-product ul li.b-active {
        border: 4px solid #465038;
    }

    .b-product ul li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #e8e2d4;

    }



    .b-fa-heart {
        color: #465038;
        position: absolute;
        font-size: 1rem;
        background-color: #eeeeee;
        padding: 15px;
        border-radius: 50px;
        margin-left: 20px;
        margin-top: 5px;
        transition: .3s;
    }


    .b-fa-heart:hover {
        background-color: #465038;
        color: #e8e2d4;

    }

    .b-productName .b-productName-li h3 {
        margin: 0;
        padding: 10px 0;
        max-width: 450px;
        word-break: break-all;

    }

    .b-productName ul .b-item-d1 {
        margin: 16px 0;
    }


    .b-item-d {
        display: flex;
        /* font-size: 20px; */
        align-items: center;
        /* margin: 10px 0; */
    }

    .b-flower {
        height: 40px;
        width: 40px;
        border-radius: 50px;
        background: #e8e2d4;
        overflow: hidden;
        margin: 0 10px;

    }

    .b-flower .b-flower-p {
        width: 100px;
        height: 100%;
        object-fit: cover;


    }


    .b-price-d {
        /* font-size: 24px;
        font-weight: bold; */
        display: flex;
        align-items: center;
        margin-left: 25px;
    }


    .b-buttom-q {
        border: 1px solid;
        width: 40px;
        height: 40px;
        color: #eeeeee;
        transition: color .25s;
        position: relative;
        border-radius: 50%;
        margin: 0 28px;
        transition: .3s;


    }

    .b-add::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 18px;
        margin-left: -8.3px;
        margin-top: -2px;
        border-top: 3px solid;
        color: #465038;
        border-radius: 10px;
        transition: .3s;
    }

    .b-add::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        height: 18px;
        margin-left: -0.3px;
        margin-top: -9px;
        border-left: 3px solid;
        color: #465038;
        border-radius: 10px;
        transition: .3s;

    }


    .b-less::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 18px;
        margin-left: -9.5px;
        margin-top: -2px;
        border-top: 3px solid;
        color: #465038;
        border-radius: 10px;
        transition: .3s;

    }

    .b-less:hover {
        background: #465038;

    }

    .b-less:hover.b-less::before {
        color: #ffffff;
    }

    .b-add:hover {
        background: #465038;

    }

    .b-add:hover.b-add::after {
        color: #ffffff;
    }

    .b-add:hover.b-add::before {
        color: #ffffff;
    }


    .b-quantity {
        display: flex;
        align-items: center;
        /* font-size: 21px; */
    }

    .b-lquan {
        display: flex;
        align-items: center;
        width: 145px;
        margin-left: 10px;
        /* color: #cf7e60;
        font-size: 16px; */
    }

    .b-addcar:focus {
        outline: none;
    }

    .b-line {
        height: 2px;
        /* border:solid 1px #ffffff; */
        background-color: #e8e2d4;
        margin: 45px 0;
    }

    .b-productDetail {
        line-height: 30px;
        letter-spacing: 0.96px;
    }

    .b-linedot {
        border-top: 3px dashed #465038;
        /* height: 1px; */
        /* padding: 10px; */
        margin: 80px 0;
        /* overflow:hidden */


    }




    .b-introduction {
        text-align: center;
    }

    .b-introduction .font3 {
        margin-bottom: 30px;
    }

    .b-introduction p {
        line-height: 40px;
        letter-spacing: 3px;
        max-width: 550px;
        margin: 0 auto;
    }


    .b-h2-introduction {
        margin: 55px;
        text-align: center;
    }

    .b-introduction-li {
        width: 600px;
        height: 600px;
        background: #e8e2d4;
        margin: 90px auto;


    }

    .b-introduction-li .b-introduction-img {
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .b-eval {
        max-width: 855px;
        margin: 0 auto;
    }

    .b-evalLine {
        border-bottom: solid 1.5px #eeeeee;
        padding: 29px 0;
        align-items: center;
        margin: 0;
    }

    .b-evalLine-1 {
        border-top: solid 1.5px #eeeeee;

    }

    .b-cuspic {
        width: 80px;
        height: 80px;
        border-radius: 50px;
        background-color: #e8e2d4;
        overflow: hidden;
        margin-right: 24px;

    }

    .b-cuspic img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .b-heart-2 i {
        display: none;
    }

    .b-name-d {
        /* color: #cf7e60; */
        padding-bottom: 15px;
    }

    .b-text-d {
        line-height: 24px;
        max-width: 512px;
        /* font-size: 16px; */
    }

    .b-heart {
        color: #cf7e60;
        padding: 0 5px;
        font-size: 24px;
    }



    .b-wrapper {
        max-width: 990px;
        margin: 0 auto;
        margin-bottom: 380px;

    }

    .b-slideWrapper {
        height: 500px;
        /* background: #465038; */
    }

    .b-slideImages {
        /* 四張圖片的寬加起來800*4 */
        /* width: 4000px; */
        /* 往左移(一張照片的寬)可以看到下一張 */
        left: 0;
        transition: .5s;
    }

    .b-card {
        width: 300px;
        height: 300px;
    }

    .b-slideImages li {
        /* 讓圖片跟容器一樣寬 */
        width: 300px;
        height: 300px;
        margin: 15px;
        /* padding:  30px; */
    }

    .b-slideImages img {
        /* 呈現整張圖片 */
        width: 100%;
        height: 100%;
        object-fit: cover;
    }



    .b-arrow {
        color: #465038;
    }

    .b-arrow-b-btn {
        /* background: */
        /* top: 0;
        bottom: 0; */
        width: 80px;
        /* height: 80px; */
        font-size: 30px;
        /* opacity: .5; */

    }

    .b-arrow-b-btn:hover {

        cursor: pointer;
    }

    .b-arrow-b-btn-g {

        padding-left: 0;

        margin: 0 -75px;
        margin-top: -330px;


    }

    .b-arrow-b-btn-l {
        padding-left: 0;
    }

    .b-arrow-b-btn-r {

        padding-left: 0;


    }

    .b-arrow {
        z-index: 1;
    }

    .card {
        /* background-color: #465038; */
        background: #e8e2d4;
        border: 0;

    }

    .b-card-body {
        text-align: center;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .b-card-text {
        /* font-size: 16px; */
        padding-top: 26px;
        line-height: 24px;
        letter-spacing: 1.6px;
    }

    .b-card-title {
        /* font-size: 28px; */
        /* font-weight: bold; */
        padding-top: 15px;
        line-height: 41px;
    }


    @media screen and (max-width:576px) {
        .b-menu-n {
            display: none;
        }

        .b-product {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .b-product .b-mainpic li {
            height: 225px;
            width: 225px;
        }

        .b-product ul li {
            height: 50px;
            width: 50px;
            margin: 2px;
        }

        .b-productName .b-productName-li h3 {
            max-width: 280px;
            text-align: center;
            padding-left: 50px;
        }

        .b-introduction p {
            max-width: 300px;
        }

        .b-fa-heart {
            padding: 10px;
        }

        .b-roductNameW {
            padding-left: 60px;
        }

        .b-addcarM {
            margin: 0 auto;
        }

        .b-addcar {
            width: 300px;

        }

        .b-buy {
            display: none;
        }

        .b-line {
            width: 296px;
            margin: 18px auto;
        }

        .b-productDetail {
            text-align: center;
            width: 297px;
            margin: 0 auto;
        }

        .b-linedot {
            width: 296px;
            margin: 18px auto;
        }

        .b-introduction li {
            width: 250px;
            height: 250px;
        }

        .b-cuspic {
            width: 60px;
            height: 60px;

        }

        .b-name-d {
            padding-bottom: 5px;
        }

        .b-heart {
            font-size: 16px;
            padding: 0 2px;


        }

        .b-heart-2 i {
            display: block;
            margin-bottom: 10px;
        }

        .b-heart-1 i {
            display: none;
        }

        .b-234 {
            width: 234px;
        }

        .b-card {
            width: 285px;
            height: 285px;
        }

        .b-wrapper {
            max-width: 315px;
            /* margin: 0 auto; */
            /* margin-bottom: 380px; */

        }

        .b-arrow-b-btn-g {
            padding-left: 0;
            margin: 0 -25px;
            margin-top: -350px;
        }

    }

    /* -----------評論----------- */
    
    .y-text-show {
        color: #cf7e60;
        font-size: 18px;
        padding: 20px 0px;
        align-items: center;
        justify-content: start;
        /* margin-left: 20px; */
    }

    .y-show {
        margin: 20px 0 20px 0px;
    }

    .showName {
        margin-left: 20px;
        text-align: center;
        margin-right: 15px;
        /* margin-top: 20px; */
    }

    #showText {
        color: #465038;
    }

    .y-com-pic {
        justify-content: center;
        text-align: center;
        align-items: center;
        /* border: 1px solid black; */
        background-color: #e7e1d2;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .y-com-pic>i {
        font-size: 20px;
        color: #465038;
    }

    .y-form {
        max-width: 855px;
    }

    .y-comm {
        align-items: center;
        margin: 20px 0;
    }

    .y-comm>input {
        margin-left: 25px;
        border: 1px solid #e0b872;
    }

    .y-heart {
        font-size: 25px;
        color: #cf7e60;
        /* margin: 0 3px; */
        padding: 0 4px;
    }

    .y-heart-group{
        justify-content: end;
    }

    .y-sub_btn {
        margin: 20px 0;

    }

    @media screen and (max-width:576px) {
        .y-heart-group {
            top: 0;  
        }
        .y-heart{
            font-size: 15px;
        }
        .y-com-pic{
            padding: 40px;
        }
        /* .y-com-top{
            flex-direction: column;
        } */
        .y-text-show{
            font-size: 14px;
            flex-direction: column-reverse;

        }
    }
</style>


<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<?php include __DIR__ . '/nav2_html.php' ?>


<div class="container">
    <!-- 購物車彈窗 -->
    <div class="a-blocks">
        <div class="a-block has-sidebar">
            <!-- This exists for tabbability? -->

            <div class="addCart-sidebar">
                <button class="close">
                    <i class="fas fa-times" style="color:#fff; width:25px; height:25px;"></i>
                </button>
                <!-- 購物車項目 -->
                <table class="table col-12 addCart-sidebar-form" style="color: #fff; margin:0;">
                    <thead>
                        <tr>
                            <th class="font2" style="color:#fff;" colspan="3">SHOPPING CART</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $i) : ?>
                            <tr class="p-item" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['quantity'] ?>">
                                <th scope="row" class="align-middle">
                                    <img src="../img/<?= $i['products_id'] ?>_0.jpg" alt="">
                                </th>
                                <td class="align-middle font6 products_name" style="color:#fff;">
                                    <?= $i['products_name'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle font6" style="color:#fff;">單價</th>
                                <td class="align-middle font6 price" style="color:#fff;">$ <?= $i['price'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle font6" style="color:#fff;">數量</th>
                                <td class="quantity align-middle" style="color:#fff;">
                                    <?= $i['quantity'] ?>
                                </td>
                            </tr>

                            <tr style="border-bottom:2px solid #e0b872;">
                                <th scope="row" class="align-middle font6 sub-total" style="color:#fff;">
                                    小計
                                </th>
                                <td class="align-middle font6 sub-total" colspan="2" style="color:#fff;">$ <?= $i['price'] * $i['quantity'] ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        <tr>
                            <td class="h_cartTitle font6" style="color:#fff;">運費</td>
                            <td class="h_cartNum font6" id="shipping" style="color:#fff;">$ 60</td>
                        </tr>
                        <tr>
                            <td class="font6" scope="" style="color:#fff;">
                                合計
                            </td>
                            <td class="h_cartNum font5" style="color:#fff;">
                                <span id="total"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="checkOut_btn">
                    <a class="yellow_btn text-center" id="checkOut_btn" role="button" href="<?= WEB_ROOT ?>/shoppingcart01.php">查看購物車</a>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>

        </ol>
    </nav>
    <!-- <div>麵包屑</div> -->

    <div class=" row b-text b-item" data-sid="<?= $row['sid'] ?>" data-price="<?= $row['price'] ?>" data-quantity="<?= $row['quantity'] ?>">
        <aside class="b-product text-center col-lg-6">
            <ul class="list-unstyled b-mainpic">
                <li><img id="b-picture" src="../img/<?= $row['products_id'] ?>_0.jpg" alt=""></li>
            </ul>
            <ul class="list-unstyled d-flex ">
                <li class="b-active"><img src="../img/<?= $row['products_id'] ?>_0.jpg" alt=""></li>
                <li><img src="../img/<?= $row['products_id'] ?>_1.jpg" alt=""></li>
                <li><img src="../img/<?= $row['products_id'] ?>_2.jpg" alt=""></li>
            </ul>
        </aside>


        <article class="b-productName col-lg-6">
            <ul class="list-unstyled d-flex">
                <li class="b-productName-li">
                    <h3 class=" b-h3-d font3"> <?= $row['products_name'] ?></h3>
                </li>
                <li>
                    <i class="fa  <?= $wishAdded ? 'fa-heart' : 'fa-heart-o' ?> b-fa-heart addToFavorites" id="<?= $row['products_id'] ?>"></i>
                </li>
            </ul>

            <ul class="list-unstyled ">
                <div class="b-roductNameW">
                    <li class="d-flex py-2 b-item-d1">
                        <div class="b-item-d font5">花色</div>
                        <ul class="list-unstyled d-flex pl-4">
                            <?php
                            // $count = 0;
                            // foreach ($cate as $r) :
                            //     if (in_array($r['cate_sid'], [15])) :
                            //     if ($r['sid'] != $sid) :
                            ?>
                            <a href="">

                                <!-- <li class="b-flower "> <img class="b-flower-p" src="../img/ // $r['products_id'] ?>_1.jpg" alt=""></li> -->

                                <li class="b-flower "> <img class="b-flower-p" src="../img/c_bag01_1.jpg" alt=""></li>

                            </a>
                            <a href="">
                                <li class="b-flower "> <img class="b-flower-p" src="../img/c_bag02_1.jpg" alt=""></li>
                            </a>
                            <a href="">
                                <li class="b-flower "> <img class="b-flower-p" src="../img/b_living01_1.jpg" alt=""></li>
                            </a>
                            <?php
                            //         $count++;
                            //         if ($count >= 3) {
                            //             break;
                            //         }
                            //     endif;
                            // endif;
                            // endforeach; 
                            ?>

                        </ul>
                    </li>
                    <li class="d-flex  py-2 b-item-d1">
                        <div class="b-item-d py-2 font5">NT </div>
                        <div class="b-price-d pl-4 font3 price"><?= $row['price'] ?></div>
                    </li>
                    <li class="d-flex  py-2 b-item-d1">
                        <div class="b-item-d font5">數量</div>
                        <ul class="list-unstyled d-flex pl-2">
                            <select class="form-control qty quantity">
                                <option value="">請選擇</option>

                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <!-- <li><button class="b-buttom-q b-less "></button></li>
                            <li class="b-quantity font3">1</li>
                            <li><button class="b-buttom-q b-add "></button></li> -->
                            <li class="b-lquan font5 red">剩最後10件</li>
                        </ul>
                    </li>
                </div>

                <li class="d-flex">
                    <ul class="list-unstyled d-flex  py-2 b-addcarM">
                        <li><button id="fiiisssh" class="b-addcar white_btn mx-2">加入購物車</button></li>
                        <li> <a type="button" class="b-addcar  red_btn mx-2 b-buy " role="button" href="<?= WEB_ROOT ?>/shoppingcart01.php">立即購買 </a></li>
                    </ul>
                </li>
            </ul>
            <div class="b-line"></div>



            <section class="b-productDetail font6">

                <ul class="list-unstyled">【商品規格】
                    <li> <?= $row['intro_spec'] ?>
                        <!-- 材質：棉、聚酯纖維、高發泡泡棉、尼龍拉鍊<br>
                            尺寸：L43 x W29.5 x D2 cm<br>
                            重量：260g<br>
                            產地：台灣<br> -->
                    </li>
                </ul>
                <ul class="list-unstyled">
                    【洗滌說明】
                    <li> <?= $row['intro_note'] ?>
                        <!-- 請勿機洗，若出現髒汙，請以軟毛刷沾清水或中性清潔劑局部刷洗後自然陰乾。 -->
                    </li>
                </ul>
            </section>
        </article>
    </div>


    <div class="b-linedot"></div>
    <div class="b-introduction">
        <h2 class="b-h2-introduction font2">- 商品介紹 -</h2>
        <!-- <h4 class="font3">「荷包蛋花朵」系列，春日新色登場！</h4> -->
        <p class="font5">
            <?= $row['intro_information'] ?></p>
        <ul class="list-unstyled">
            <li class="b-introduction-li"><img class="b-introduction-img" src="../img/<?= $row['products_id'] ?>_1.jpg" alt=""></li>
            <li class="b-introduction-li"><img class="b-introduction-img" src="../img/<?= $row['products_id'] ?>_2.jpg" alt=""></li>
            <li class="b-introduction-li"><img class="b-introduction-img" src="../img/<?= $row['products_id'] ?>_3.jpg" alt=""></li>
        </ul>
    </div>
    <div class="b-eval">
        <h2 class="b-h2-introduction font2">- 顧客評價 -</h2>
        <ul class="list-unstyled d-flex  b-evalLine b-evalLine-1">
            <div class="y-com-pic d-flex">
                <i class="fas fa-user"></i>
            </div>
            <div class="b-234">
                <li class="d-flex mx-2 ml-auto b-heart-2">
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                </li>
                <li class="">
                    <ul class="list-unstyled">
                        <li class="b-name-d font4 red">錢夫人 - 3月2日, 2020</li>
                        <li class="b-text-d font5">出貨超快，收到後馬上迫不急待用上。品質很穩定不用說，觸感非常棒，
                            顏色飽和好看，印刷細緻，值得推薦！</li>
                    </ul>
                </li>
            </div>

            <li class="d-flex mx-2 ml-auto b-heart-1">
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
            </li>

        </ul>
        <ul class="list-unstyled d-flex mb-3 b-evalLine">
            <div class="y-com-pic d-flex">
                <i class="fas fa-user"></i>
            </div>
            <div class="b-234">

                <li class="d-flex mx-2 ml-auto b-heart-2">
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                    <i class="fas fa-heart b-heart"></i>
                </li>
                <li class="">
                    <ul class="list-unstyled">
                        <li class="b-name-d font4 red">依夫人 - 3月1日, 2020</li>
                        <li class="b-text-d font5">出貨很快，回覆也很快速。重點是商品超可愛的！很喜歡</li>
                    </ul>
                </li>
            </div>

            <li class="d-flex mx-2 ml-auto b-heart-1">
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
                <i class="fas fa-heart b-heart"></i>
            </li>

        </ul>

        <div class="row d-flex  y-form b-evalLine justify-content-between">
            
            <div class="col-8 p-0 d-flex y-com-top">
                <div class="y-com-pic d-flex">
                    <i class="fas fa-user"></i>
                </div>
                <div class="y-text-show font5" id="showValue">
                    <?= empty($_SESSION['member']) ? '<input type="text" class="form-control " id="input01" value="" placeholder="請輸入姓名" style="width: 20%;">' : $_SESSION['member']['name'] ?>
                    -
                    <?php
                    date_default_timezone_set('Asia/Taipei');
                    echo date("Y-m-d") . '<br>';
                    ?>
                    <div class="row d-flex y-show">
                        <span class="showName" id="showName"></span>
                        <span class="showText" id="showText"></span>

                    </div>
                </div>

            </div>

            <div class="co1-4 d-flex y-heart-gruop">
                <i class="fa fa-heart-o y-heart" id="heart1"></i>
                <i class="fa fa-heart-o y-heart" id="heart2"></i>
                <i class="fa fa-heart-o y-heart" id="heart3"></i>
                <i class="fa fa-heart-o y-heart" id="heart4"></i>
                <i class="fa fa-heart-o y-heart" id="heart5"></i>
            </div>



            <!-- <form class="row d-flex justify-content-center"> -->


            <div class="y-comm col-lg-3  col-12 d-flex ">
                <!-- <label for="" class="col-form-label font5 ">我的評論</label> -->

                <?= empty($_SESSION['member']) ? '<input type="text" class="form-control " id="input01" value="" placeholder="請輸入姓名" style="width: 20%;">' : $_SESSION['member']['name'] ?>
            </div>
            <div class="col-lg-6 col-12">
                <input type="text" class="form-control " id="input02" value="" placeholder="您的評論" style="height: 100px;">

            </div>

            <div class="y-comm-reset col-lg-3 col-12 d-flex justify-content-end">
                <a class="y-sub_btn btn" id="setText">重設</a>
            </div>


            <!-- </form> -->



        </div>
        <div class="d-flex justify-content-center">
            <a class="y-sub_btn btn green_btn font5" id="getText"> 我要評論</a>
        </div>
    </div>
    <div>
        <h2 class="b-h2-introduction font2">- 你可能也會喜歡 -</h2>
        <div class="b-wrapper">
            <div class="b-slideWrapper overflow-hidden position-relative">

                <ul id="b-slideImages" class="list-unstyled b-slideImages d-flex position-absolute">
                    <?php
                    foreach ($cate as $r) :
                        if (in_array($r['cate_sid'], [6, 7, 8])) :
                            if ($r['sid'] != $sid) :
                    ?>
                                <li data-sid="<?= $r['sid'] ?>">
                                    <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                        <div class="card b-card">
                                            <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                            <div class="card-body b-card-body">

                                                <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                                <h5 class="b-card-title font3">NT$ <?= $r['price'] ?></h5>

                                            </div>
                                        </div>
                                    </a>
                                </li>
                    <?php

                            endif;
                        endif;
                    endforeach; ?>
                    <!-- <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#465038 ;">
                            <div class="card b-card" style="">
                                <img src="images/newArrival01.jpg" class="card-img-top" alt="...">
                                <div class="card-body b-card-body">

                                    <p class="b-card-text font6">便當袋 - 荷包蛋花朵/橘色</p>
                                    <h5 class="b-card-title font3">NT$ 450</h5>

                                </div>
                            </div>
                        </a>
                    </li> -->



                </ul>



            </div>

            <!-- <ul id="b-slideDots" class="list-unstyled b-slideDots position-absolute d-flex justify-content-center">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>


        </ul> -->
            <ul class="d-flex justify-content-between b-arrow-b-btn-g">
                <a id="goNext" class="b-arrow-b-btn b-arrow-b-btn-l d-flex justify-content-center align-items-center ">
                    <i class="fas fa-chevron-circle-left b-arrow"></i>
                </a>

                <a id="goPrev" class="b-arrow-b-btn b-arrow-b-btn-r d-flex justify-content-center align-items-center ">
                    <i class="fas fa-chevron-circle-right  b-arrow"></i>

                </a>

            </ul>


        </div>

    </div>


</div>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script>
    // 加入購物車彈窗
    class SidebarToggle {
        constructor() {

            this.closeSidebarOnEscape();
            this.PathwaysSidebarOnClickElement();
        }

        shouldShow() {
            const params = new URLSearchParams(location.search);
            if (params.get('addItem') === "1") { // 判斷參數為 1 時顯示購物車
                this.close('productitem');
                this.closeSidebarOnClickClose();
                this.closeSidebarOnDocumentClick();
                // add class to the one we clicked
                $(".addCart-sidebar")
                    .addClass("open");
                $(this).attr("aria-expanded", "true");
                $("body").addClass("fixedPosition");
            }
        }

        close(productitem) {
            $(".open").removeClass("open");
            $(".b-addcar").attr("aria-expanded", "false");
            $("body").removeClass("fixedPosition");
        }

        PathwaysSidebarOnClickElement() {
            var $this = this;
            // 加到購物車的按鈕，按的時候執行綁定的 function
            $("#fiiisssh").on("click", function(event) {
                // 因為購物車內容是透過 SESSION 傳遞，所以如果要更新購物車的內容需要重新整理
                // 我們在網址上多加一個參數，判斷是否要顯示購物車

                const params = new URLSearchParams(location.search); // 解析 query string
                params.set('addItem', 1); // 設定參數
                window.location.href = `${window.location.pathname}?${params.toString()}`;

                // remove classes from all
                $this.close();
                $this.closeSidebarOnClickClose();
                $this.closeSidebarOnDocumentClick();

                // add class to the one we clicked
                $(".addCart-sidebar")
                    .addClass("open");
                $(this).attr("aria-expanded", "true");
                $("body").addClass("fixedPosition");
                event.stopPropagation();
            });

            this.shouldShow(); // 判斷是否需要顯示購物車
        }

        closeSidebarOnClickClose() {
            var $this = this;

            $(".a-block .close").on("click", function(event) {
                $this.close();

                // setTimeout(function() {
                //     $(this)
                //         .parent()
                //         .parent()
                //         .closest("button")
                //         .focus();
                // }, 1);

                event.stopPropagation();
            });

        }

        closeSidebarOnEscape() {
            var $this = this;

            $(document).keyup(function(event) {
                if (event.key === "Escape") {
                    $this.close();
                }
            });
        }

        closeSidebarOnDocumentClick() {
            var $this = this;

            $(document).on("click", function() {
                $this.close();
            });

            $(".a-block.has-sidebar").on("click", function(event) {
                event.stopPropagation();
            });
        }
    }

    new SidebarToggle();


    $(".b-product ul li").click(function() {

        // $(this).css("border","4px solid yellow")
        // .siblings().css("border","4px solid transparent")
        //.siblings()其他的


        $(this).addClass("b-active")
            .siblings().removeClass("b-active")

        let picture = $(this).find("img").attr("src")
        // console.log(picture)
        $("#b-picture").attr("src", picture)

    })

    // $(".b-fa-heart-d").on("click", function() {
    //     $(".b-like-d").toggleClass("appear")


    // })

    // $(".y-com_btn").click(function() {
    //     $(".y-form").toggle("slow");
    // });



    $("#getText").click(function() {
        var info = $("#input01").val();
        $("#showName").text(info);
    });
    $("#getText").click(function() {
        var info = $("#input02").val();
        $("#showText").text(info);
    });
    $("#setText").click(function() {
        $("#input01").val("text");
    });
    $("#setText").click(function() {
        $("#input02").val("text");
    });
    // ------------------愛心----------------
    $("#heart1").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });
    $("#heart2").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });
    $("#heart3").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });
    $("#heart4").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });
    $("#heart5").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });

    $(".b-fa-heart").click(function() {

        if ($(this).hasClass('fa-heart')) {
            $(this).addClass('fa-heart-o');
            $(this).removeClass('fa-heart');
            console.log('yes');
        } else {
            $(this).addClass('fa-heart');
            $(this).removeClass('fa-heart-o');
            console.log('no');
        }
    });

    //登入才能收藏商品

    $(".b-fa-heart").click(function() {
        var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;
        if (!login_success) {
            location.href = 'login.php';
        }
    });
    // 加入收藏按鈕
    const addToFavorites_btn = $('.addToFavorites'); //抓到按鈕
    addToFavorites_btn.click(function() {
        const b_item = $(this).closest('.b-item') //closest()往外層找到class: b-item
        const sid = b_item.attr('data-sid'); //得到data-sid的值  (產品編號)
        const qty = b_item.find('select').val() //find()往內層找到select  (購買數量)
        const sendObj = {
            action: 'add',
            sid,
            quantity: qty
        }
        $.get('wishlist-api.php', sendObj, function(data) {
            console.log(data);
        }, 'json');
    });

    //判斷class是fa-heart-o時remove，fa-heart時add

    //刪除收藏商品
    // $('.b-fa-heart').on('click', function() {
    //     const p_item = $(this).closest('.b-item');
    //     const sid = p_item.attr('data-sid');
    //     $.get('wishlist-api.php', {
    //         action: 'remove',
    //         sid: sid
    //     }, function(data) {
    //         p_item.remove();
    //     }, 'json');
    // });

    function isMobile() {

        try {
            document.createEvent("TouchEvent");
            return true;
        } catch (e) {
            return false;
        }

    }
    if (isMobile()) {
        $(window).scroll(function() {
            let sildeIndex = 0;
            let sildeWitdth = $(".b-slideWrapper ").width();
            let sildeCount = $("#b-slideImages li").length;


            $("#b-slideImages").css("width", sildeWitdth * sildeCount)


            $("#goNext").click(function() {

                sildeIndex = sildeIndex - 1;

                goSlider()

            })
            $("#goPrev").click(function() {

                sildeIndex = sildeIndex + 1;

                goSlider()
            })

            function goSlider() {

                if (sildeIndex < 0) {
                    sildeIndex = sildeCount - 1;
                }
                if (sildeIndex > sildeCount - 1) {
                    sildeIndex = 0;
                }

                $("#b-slideImages").css("left", 0 - sildeIndex * sildeWitdth)


            }
        })
    } else {
        let sildeIndex = 0;
        let sildeWitdth = $(".b-slideWrapper ").width();
        let sildeCount = ($("#b-slideImages li").length / 3);


        $("#b-slideImages").css("width", sildeWitdth * sildeCount)


        $("#goNext").click(function() {

            sildeIndex = sildeIndex - 1;

            goSlider()

        })
        $("#goPrev").click(function() {

            sildeIndex = sildeIndex + 1;

            goSlider()
        })

        function goSlider() {

            if (sildeIndex < 0) {
                sildeIndex = sildeCount - 1;
            }
            if (sildeIndex > sildeCount - 1) {
                sildeIndex = 0;
            }

            $("#b-slideImages").css("left", 0 - sildeIndex * sildeWitdth)


        }
    }

    // 讀入金額，計算
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    function prepareCartTable() {
        const $p_items = $('.b-item');

        if (!$p_items.length && $('#total-price').length) {
            // location.href = location.href;
            location.reload();
            return;
        }
        let total = 0;
        // if ($p_items.length == 0) {
        //     location.href="product-list.php";
        // } else {
        $p_items.each(function() {
            const sid = $(this).attr('data-sid');
            const price = $(this).attr('data-price');
            const quantity = $(this).attr('data-quantity');

            $(this).find('.price').text(' $' + dallorCommas(price));
            // $(this).find('.qty').val(quantity);
            $(this).find('.sub-total').text('$ ' + dallorCommas(quantity * price));
            total += quantity * price;
            $('#total-price').text('$ ' + dallorCommas(total));
        })
    }
    // }
    prepareCartTable();

    // 加入購物車按鈕
    const addcar_btn = $('.b-addcar'); //抓到按鈕
    addcar_btn.click(function() {
        const b_item = $(this).closest('.b-item') //closest()往外層找到class: b-item
        const sid = b_item.attr('data-sid'); //得到data-sid的值  (產品編號)
        const qty = b_item.find('select').val() //find()往內層找到select  (購買數量)
        const sendObj = {
            action: 'add',
            sid,
            quantity: qty
        }
        $.get('handle-cart.php', sendObj, function(data) {
            setCartCount(data); //呼叫_scripts.php裡的function
        }, 'json');
        // navbar的快速檢視
    });

    // const cart_count = $('.cart-count'); // span tag 抓到購物車class ->navbar cart旁邊的購物車數量

    // const cart_short_list = $('.cart-short-list'); //navbar的快速檢視

    // $.get('handle-cart.php', function(data) {
    //     setCartCount(data);
    // }, 'json');

    // function setCartCount(data) {
    //     let count = 0;
    //     cart_short_list.empty();
    //     if (data && data.cart && data.cart.length) {
    //         for (let i in data.cart) {
    //             let item = data.cart[i];
    //             count += item.quantity;
    //             // cart_short_list.append(`<a class="dropdown-item" href="#">${item.bookname} ${item.quantity}</a>`)
    //         }
    //         cart_count.text(count);
    //     }

    //     // console.log('123', cart_short_list)
    // }

    //prepareCartTable啟動位置? 叫購物車的資訊
    function prepareCartTable() {
        const $p_items = $('.p-item');

        if (!$p_items.length && $('#total-price').length) {
            // location.href = location.href;
            location.reload();
            return;
        }
        let subtotal = 0;
        // if ($p_items.length == 0) {
        //     location.href="product-list.php";
        // } else {
        $p_items.each(function() {
            const sid = $(this).attr('data-sid');
            const price = $(this).attr('data-price');
            const quantity = $(this).attr('data-quantity');

            $(this).find('.price').text('$ ' + dallorCommas(price));
            $(this).find('.qty').val(quantity);
            $(this).find('.sub-total').text('$ ' + dallorCommas(quantity * price));
            subtotal += quantity * price;
            $('#subtotal').text('$ ' + dallorCommas(subtotal));
            total = subtotal + 60;
            $('#total').text('$ ' + dallorCommas(total));
        })
    }
    // }
    prepareCartTable();

    //呼叫handle-cart.php ,做了什麼事?
    const qty_sel = $('.qty');
    qty_sel.on('change', function() {
        const p_item = $(this).closest('.p-item');
        const sid = p_item.attr('data-sid');
        // alert(sid +', '+ $(this).val() )
        const sendObj = {
            action: 'add',
            sid: sid,
            quantity: $(this).val()
        }
        $.get('handle-cart.php', sendObj, function(data) {
            setCartCount(data); // navbar
            p_item.attr('data-quantity', sendObj.quantity);
            prepareCartTable();
        }, 'json');
    });
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>