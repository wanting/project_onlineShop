<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';

$cate_id = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$where = ' WHERE 1 ';
if (!empty($cate_id)) {
    $where .= " AND `cate_sid`=$cate_id ";
    //$qs['cate'] = $cate_id;
}
$t_sql = "SELECT COUNT(1) FROM `products` $where ";

$sql = "SELECT * FROM `products`  $where ORDER BY `sid`";

$rows = $pdo->query($sql)->fetchAll();



// --- 分類資料
$c_sql = "SELECT * FROM `categories` WHERE `parent_sid`=3";
$cates = $pdo->query($c_sql)->fetchAll();
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<div class="b-hight"></div>
<h1 class="b-h1 green font1"><a href="<?= WEB_ROOT ?>/onlineshop-index.php">Online Shop</a></h1>
<div class="container b-main-nav">
    <ul class="d-flex justify-content-center  ">
        <li class="b-btn-n active"><a class="b-sale" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a></li>
        <li class="b-btn-n  "><a class="text-nowrap " href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
    </ul>
</div>
<nav class="b-phone-nav-n">
    <ul class="b-menu-n">
        <li id="b-drop-down">
            <ul class="d-flex justify-content-center  b-list-n bb-button" href="">

                <a class="b-all-n label-text b-sale">Sale </a> <i class="b-down-arrow-n "></i>
            </ul>

            <ul class="b-submenu1-n options">
                <li class="option  "><a class="b-sale" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a>
                </li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
                <li class="option"><a class="" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
            </ul>
        </li>


    </ul>
</nav>
<!-- <script>
    let button = document.querySelector(".bb-button");
    let label = document.querySelector(".label-text");
    let options = document.querySelector(".options");

    const NODES = ["BUTTON", "LABEL", "I"];

    window.addEventListener("click", (e) => {
        if (NODES.includes(e.target.nodeName)) return;
        button.classList.remove("active");
    });

    button.addEventListener("click", (e) => {
        button.classList.toggle("active");
    });

    options.addEventListener("click", (e) => {
        label.innerText = e.target.innerText;
        button.classList.add("selected");
        button.classList.remove("active");
    });
</script> -->
<style>
    .b-main-nav-b1 {
        padding: 0;
    }

    .b-btn-b1 {

        list-style: none;
        margin: 10px;
        font-family: 'Noto Sans TC', sans-serif;
        /* font-weight: 400; */
        letter-spacing: 2.7px;
        font-size: 18px;
    }

    .b-btn-b1 a {
        text-decoration: none;
        color: #465038;
        border: 0;
        padding: 10px;

    }

    .b-h2-b1 {
        font-weight: bold;
        text-align: center;
        margin: 25px 0;
    }

    .b-phone-nav2-b1 {
        display: none;
    }


    /* ---------------------------------------- */
    .b-menu-b1 {
        flex-direction: column;
        margin-bottom: 0;
        /* margin: 0 36px; */
        width: 175px;

    }

    .b-menu-b1 li {
        position: relative;
    }

    .b-all-b1 {
        margin-left: 20px;
        /* margin-right: 0px; */
        font-size: 16px;
        font-weight: 500;
        color: #465038;
        font-family: 'Noto Sans TC', sans-serif;
    }


    .b-down-arrow-b1 {
        border: solid #465038;
        border-width: 0 1px 1px 0;
        display: inline-block;
        padding: 5px;
        margin: 19px;
        transform: rotate(45deg);
        transition: .5s;
        /* -webkit-transform: rotate(45deg); */
    }



    .b-phone-nav-b1 ul li ul .b-down-arrow-b1.up-arrow {
        transform: rotate(-135deg);
    }


    .b-list-b1 {
        color: #465038;
        margin: 0;
        padding: 10px 20px;
        border-top: solid 1px #465038;

    }

    .b-phone-nav-b1 {
        display: block;

    }

    .b-phone-nav-b1 .b-wrapper-b1 {
        display: flex;
        width: 100%;
        text-align: center;


    }

    .b-phone-nav-b1 ul {
        list-style: none;
        padding: 0;
        margin-top: 0;
        margin-bottom: 0;
    }

    .b-phone-nav-b1 ul li {
        position: relative;
        border-bottom: solid 1px #465038;

    }

    .b-submenu1-b1 {

        position: absolute;
        transition: .5s;
        /* opacity: 0; */
        /* 加hidden才能把空間隱藏 */
        overflow: hidden;
        max-height: 0;
        /* width: 100%讓寬度跟上層一樣 */
        width: 100%;
        text-align: center;
        border-radius: 0;
        /* border: solid 1px #465038; */
        z-index: 1;
    }

    .b-phone-nav-b1 ul li .b-submenu1-b1.open {
        opacity: 1;
        max-height: 300px;
    }

    .b-submenu1-b1 li a {
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.5px;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .b-phone-nav-b1 ul li a {
        color: #465038;
        padding: 10px 20px;
        /* display: block撐開 */
        display: block;
    }


    /* ----------------------------- */
    .a-promotion-l {
        max-width: 100%;
        height: auto;
    }

    .a-promotion-r {
        width: 570px;
        height: 350px;
        background-color: #e0b872;
    }


    .breadcrumb2{
        display: none;
    }

    /* ------------------------------ */
    .b-g-card {
        /* margin: 0 auto; */
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
        margin-bottom: 100px;
        /* align-content: center; */
        /* padding-left: 50px; */
    }
    .b-card {
        border: 0;
        margin-top: 58px;
        padding: 0 20px;
    }
    .b-card a{
        margin: 0 auto;
    }
    .b-card ul {
        list-style: none;
    }

    .b-card .b-figure-b1 {
        width: 300px;
        height: 300px;
        position: relative;
        background-color: #e8e2d4;
        overflow: hidden;



    }

    .b-card .b-figure-b1 .b-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .b-card .b-figure-b1 .b-cover-fit:hover{ transform: scale(1.2, 1.2);
        transition: all ease-in .8s;}

    .b-fa-heart {
        color: #465038;
        position: absolute;
        bottom: 37%;
        /* right: 18%; */
        margin-left: 270px;
        font-size: 1.7rem;
    }

    .b-card ul li {
        /* color: #465038; */
        /* font-family: 'Noto Sans TC', sans-serif; */
        letter-spacing: 1.6px;
        text-align: center;
        border: 0;
        /* font-size: 16px; */
    }

    .b-productName {
        padding-top: 39px;
        padding-bottom: 0;
    }

    .b-card ul .b-price {
        /* font-size: 28px;
        font-weight: 600; */
        letter-spacing: 2.8px;
        /* padding-top: 26px; */
        text-decoration:line-through;
        padding-bottom: 0;
    }
    .b-card ul .b-price-s {
        padding-top: 5px;
    }


    @media screen and (max-width:576px) {
        .b-main-nav-g{
            flex-direction:row-reverse !important ;
        }
        .a-promotion-l {
            max-width: 100%;
            height: auto;
        }

        .a-promotion-r {
            width: 100%;
            height: 240px;
        }

        .breadcrumb1{
        display: none;
        }
        .breadcrumb2{
            display: flex;
            justify-content: center;
            /* margin: 0 auto; */
            margin-bottom: 30px;
        }
        .b-sale-p{
            width: 300px;
            margin: 0 auto;
        }

        .b-card ul li {
            letter-spacing: 0.96px;
            /* font-size: 1px; */
        }

        .b-card ul .b-price {
            padding: 5px;
            max-width: 146px;
        }

        .b-braedCrumb {
            display: none;
        }

        .b-card {
            margin-top: 20px;
            padding: 0 10px;
        }


        .b-card .b-figure-b1 {
            width: 146px;
            height: 146px;

        }

        .b-fa-heart {

            bottom: 49%;
            right: 11%;
            font-size: 1rem;
        }

        .b-g-card {
            /* margin-bottom: 50px; */
            padding-left: 0;
            margin: 0 auto 50px auto;
            max-width: 330px;
        }

        .b-card {
            max-width: 165px;
        }

        .b-productName {
            height: 55px;
            max-width: 146px;
            /* padding-top: 20px; */
            padding-bottom: 0;
        }

    }
</style>

<div class="container">
    <!-- <div class=" b-main-nav-b1">
        <ul class="d-flex justify-content-center ">
            <li class="b-btn-b1 "><a class="b-line-b1" href="#">Bags</a></li>
            <li class="b-btn-b1  "><a class="text-nowrap " href="">手提包</a></li>
            <li class="b-btn-b1   "><a href="">側背包</a></li>
            <li class="b-btn-b1   "><a href="">電腦包</a></li>

        </ul>
    </div> -->
    <h2 class="b-h2-b1 red" data-aos="fade-up"
     data-aos-duration="3000">- Sale -</h2>
    <section class="a-py-6" data-aos="fade-up" data-aos-duration="2000" >
        <div class="a-container">

            <div class="row d-flex justify-content-center align-items-center py-5 b-sale-p">
                <a href="a-promotion-l ">
                    <img src="../img/sale-img.jpg" class="a-promotion-l" alt="" />
                </a>
                <div class="a-promotion-r d-flex flex-column justify-content-center align-items-center" >
                    <h2 class="text-center font2" style="margin-bottom: 1rem; letter-spacing:3px; line-height: 1.5;">
                        Summer Sale
                    </h2>
                    <h6 class="text-center font6" style="line-height: 2; letter-spacing:2px;">
                        UP TO 50% OFF<br />
                        Fachion & HOME ITEMS
                    </h6>

                </div>
            </div>
        </div>
    </section>
    <nav aria-label="breadcrumb" class="y-bread-list breadcrumb2">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">Sale</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between b-main-nav-g">
        <!-- <p class="b-braedCrumb">麵包屑</p> -->
        <nav aria-label="breadcrumb" class="y-bread-list breadcrumb1">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">Sale</li>
        </ol>
    </nav>

        <!-- <nav class=" b-phone-nav2-b1">
                <ul class="b-menu2-b1">
                    <li>
                        <ul class="d-flex justify-content-center  b-list-b1" href="">

                            <a class="b-all2-b1">Bags </a> <i class="b-down-arrow2 "></i>
                        </ul>

                        <ul class="b-submenu2-b1">
                            
                            <li><a class="sale" href="">手提包</a>
                            </li>
                            <li><a href="">側背包</a></li>
                            <li><a href="">電腦包</a></li>


                        </ul>
                    </li>


                </ul>
            </nav> -->

 
        <nav class="b-phone-nav-b1 ">
            <ul class="b-menu-b1">
                <li>
                    <ul class="d-flex justify-content-center  b-list-b1" href="">

                        <a class="b-all-b1">熱銷排行 </a> <i class="b-down-arrow-b1 "></i>
                    </ul>

                    <ul class="b-submenu1-b1">
                        <li><a class="sale" href="">價格由低到高</a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>

    </div>
<!-- 商品 -->
    <div class="b-g-card list-array-4 row">

 
<?php

foreach ($rows as $r) :
    if (in_array($r['cate_sid'], [7, 10, 12])) : ?>

        <div class=" card b-card col-lg-4 col-ms-6 " data-aos="fade-up"
     data-aos-anchor-placement="center-bottom"  data-aos-duration="1000" data-sid="<?= $r['sid'] ?>">

            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                <div class="b-figure-b1">
                    <img class="b-cover-fit" src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="">

                </div>
            </a>
            <i class="fa fa-heart-o b-fa-heart" id="<?= $r['products_id'] ?>"></i>
            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item b-productName font6"><?= $r['products_name'] ?><br>
                    </li>
                    <li class="list-group-item b-price font6 ">NT$ <?= $r['price'] ?></li>
                    <li class="list-group-item b-price-s font3 red">NT$ <?= $r['price']-100 ?></li>

                </ul>
            </a>
        </div>

<?php


    endif;
endforeach; ?>


</div>



<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>
    


</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
      AOS.init();
    $(".b-menu-b1").on("click", function() {
        $(".b-submenu1-b1").toggleClass("open")
        $(".b-down-arrow-b1").toggleClass("up-arrow")
        //  console.log("123")
    })

    $(".b-menu2-b1").on("click", function() {
        $(".b-submenu2-b1").toggleClass("open")
        $(".b-down-arrow2").toggleClass("up-arrow2")

    })

    $(".b-fa-heart").click(function() {

// $(this).addClass('fa-heart');
// $(this).removeClass('fa-heart-o');


// $(this).addClass('fa-heart-o');
// $(this).removeClass('fa-heart');


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
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>