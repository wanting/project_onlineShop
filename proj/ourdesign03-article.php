<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
    .y-hight-1 {
        height: 100px;
    }

    .y-hight-2 {
        height: 50px;
    }

    .y-hight-3 {
        height: 25px;
    }

    .y-text-style {
        color: #465038;
        text-align: center;
        font-family: 'Noto Sans TC', sans-serif;
        line-height: 45px;
        font-size: 16px;
    }

    .y-container {
        max-width: 1140px;
        width: 100%;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    .y-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media screen and (max-width:576px) {
        .y-container {
            width: 500px;
        }
        .y-hight-1 {
        height: 50px;
    }

    }

    @media screen and (max-width:414px) {
        .y-container {
            width: 300px;
        }
    }

    .y-menu {
        padding: 0;
        display: flex;

    }

    .y-btn {

        list-style: none;
        margin: 10px;
        font-family: 'Noto Sans TC', sans-serif;
        /* font-weight: 400; */
        letter-spacing: 1.2px;
        font-size: 18px;
    }

    @media screen and (max-width:576px) {
        .y-menu {
            flex-direction: column;
            margin-bottom: 0;
            margin: 0 36px;
        }

        .y-menu li {
            position: relative;
        }

        .y-all {
            margin-left: 65px;
            margin-right: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .y-down-arrow {
            border: solid #465038;
            border-width: 0 1px 1px 0;
            display: inline-block;
            padding: 5px;
            margin: 19px;
            transform: rotate(45deg);
            /* -webkit-transform: rotate(45deg); */
        }

        .y-phone-nav ul li ul .down-arrow.up-arrow {
            transform: rotate(-135deg);
        }

        .y-list {
            color: #465038;
            margin: 0;
            padding: 10px 20px;
            border-top: solid 1px #465038;
        }

        .y-phone-nav {
            display: block;
            /* background: white; */
        }

        .y-phone-nav .wrapper {
            display: flex;
            width: 100%;
            text-align: center;
        }

        .y-phone-nav ul {
            list-style: none;
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .y-phone-nav ul li {
            position: relative;
            border-bottom: solid 1px #465038;
            background: white;

        }

        .y-submenu1 {

            position: absolute;
            transition: .5s;
            opacity: 0;
            /* 加hidden才能把空間隱藏 */
            overflow: hidden;
            max-height: 0;
            /* width: 100%讓寬度跟上層一樣 */
            width: 100%;
            text-align: center;
            border-radius: 0;
            /* border: solid 1px #465038; */

        }

        .y-phone-nav ul li .y-submenu1.open {
            opacity: 1;
            max-height: 300px;
        }

        .y-submenu1 li a {
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .y-phone-nav ul li a {
            color: #465038;
            padding: 10px 20px;
            /* display: block撐開 */
            display: block;
        }
    }

    /* ----------------menu 特效------------------------------- */

    .y-menu {
        padding: 0;
        display: flex;

    }

    .y-main-nav {
        margin-top: 25px;
    }

    .y-main-nav ul {
        margin: 0;
        padding: 0;
        text-align: right;
        display: inline-block;
        vertical-align: middle;
    }

    .y-main-nav ul li a {
        color: #465038;
        text-decoration: none;
        display: inline-block;
        padding: 10px;
        transition: color 0.5s;
    }

    .y-main-nav ul li .y-underline {
        height: 3px;
        margin: 2px 0;
        background-color: transparent;
        width: 0%;
        transition: width 0.2s, background-color 0.5s;
        margin: 0 auto;
    }

    .y-main-nav ul li.y-active-link .y-underline {
        width: 100%;
        background-color: #e0b872;
    }

    .y-main-nav ul li:hover .y-underline {
        background-color: #e0b872;
        width: 100%;
    }

    .y-main-nav ul li:hover a {}

    .y-main-nav ul li:active a {
        transition: 0.1s;
        /* color: rgba(255, 255, 255, 0.76); */
    }

    .y-main-nav ul li:active .y-underline {
        transition: none;
        background-color: rgba(255, 255, 255, 0.76);
    }

    /* --------banner------------------------------------------------- */
    .y-banner {
        height: 350px;
        /* border: 1px solid #465038; */
    }

    /* --------麵包屑------------------------------------------------- */

    .y-bread-list {
        padding: 0;
        margin-top: 50px;
        margin-bottom: 25px;
        /* margin: 25px; */
        display: flex;
        /* 文字水平基準 */
        align-items: baseline;
        list-style: none;
    }

    .y-bread-list>li {
        margin-right: 5px;
    }

    /* --------------------------------------------------------- */

    .y-article-left {
        /* width: 600px; */
        height: 300px;
    }

    .y-article-right {
        height: 300px;
        margin-left: 10px;
    }

    .font4,
    .font5 {
        line-height: 40px;
    }

    /* .font3 {
        font-weight: 600;
    } */

    .y-shop-link {
        width: 350px;
    }

    figure.y-shop {
        width: 266px;
        height: 266px;
        overflow: hidden;
    }

    .y-shop img {
        transform: scale(1, 1);
        transition: all 0.8s ease-out;
    }

    .y-shop img:hover {
        transform: scale(1.2, 1.2);
        cursor: pointer;
    }

    .y-shop-link {
        margin-top: 80px;
    }

    .y-item:hover {
        color: #e0b872
    }

    .y-sub-btn {
        margin-top: 50px;
    }

    .y-sub-btn {
        margin-top: 50px;
    }

    .y-pattern {
        margin-top: 25px;
        /* filter:grayscale(50%); */
        transition: .5s;
    }


    @media screen and (max-width:576px) {

        .y-banner {
            width: 100%;
            height: 200px;
        }


        .y-article-up {
            width: 100%;
            margin: 0 auto;
            flex-direction: column;
        }

        .y-article-down {
            width: 100%;
            margin: 0 auto;
            flex-direction: column-reverse;
        }

        .y-article-left {
            max-width: 100%;
            margin: 25px auto;
        }

        .y-article-right {
            max-width: 100%;
            /* height: 375px; */
            margin: 25px auto;
        }

        figure.y-shop {
            width: 100%;
            height: 100%;
        }

        .y-shop-link {
            margin-top: 50px;
            margin-bottom: 50px;
            /* margin: 0 auto; */

        }

        .y-sub-btn {
            width: 100%;
            text-align: center;
            /* font-size: 16px; */
            margin-top: 50px;
        }

    }

    @media screen and (max-width:414px) {

        .y-bread-list {
            align-items: center;
            justify-content: center;
        }

        .y-pattern {
            width: 100%;
        }

        figure.y-shop {
            width: 100%;
            height: 100%;
        }

    }

    /* ---------頁面特效---------------------------*/
    .animated {
        visibility: visible;
        animation-fill-mode: both;
        animation-duration: 2s;
        animation-play-state: running;
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }


    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }


    .animated.fadeInDown {
        animation-name: fadeInDown;
    }

    .animated.fadeInUp {
        animation-name: fadeInUp;
    }
</style>

<div class="y-hight-2"></div>
<h1 class="font1 d-flex justify-content-center animated fadeInDown"><a href="<?= WEB_ROOT ?>/ourdesign-index.php">Our Design</a></h1>
<div class="y-container y-main-nav animated fadeInDown">
    <ul class="d-flex justify-content-around">
        <li class="y-btn y-nav-link y-active-link">
            <a class="font3" href="">聯名商品</a>
            <div class="y-underline"></div>
        </li>
    </ul>
</div>
<!-- <nav class="y-phone-nav">
    <ul class="y-menu">
        <li>
            <ul class="d-flex justify-content-center  y-list" href="">

                <a class="y-all">所有商品 </a> <i class="y-down-arrow "></i>
            </ul>

            <ul class="y-submenu1">
                <li><a href="">主題商品</a></li>
                <li><a href="">聯名商品</a></li>
            </ul>
        </li>

    </ul>
</nav> -->
<div class="y-hight-2"></div>
<div class="y-container">
    <div class="y-banner">
        <img class="y-cover-fit animated fadeInUp" src="../img/ourdesign-banner03.jpg" alt="" >
    </div>
</div>
<div class="y-container">
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="#">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="<?= WEB_ROOT ?>/ourdesign-index.php">Our Design</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">聯名商品</li>

        </ol>
    </nav>
    <!-- <div class="y-hight-3"> </div> -->
    <article class="y-article-up row d-flex justify-content-between">
        <div class="y-article-left col-6">
            <img class="y-cover-fit" src="../img/pentel09.jpg" alt="" data-aos="fade-up"  data-aos-duration="2000">
        </div>
        <div class="y-article-right col-5" data-aos="fade-up"  data-aos-duration="2000">
            <div class="y-slogan-w font3 d-flex justify-content-center">
                文具控不能錯過的圖案饗宴
            </div>
            <div class="y-hight-2"> </div>
            <div class="font5">
                經典印花設計與實用長銷文具品牌跨界合作新火花，Pugrace和Pentel合作系列文具再一暢銷商品。
            </div>
        </div>
    </article>
    <div class="y-hight-1"> </div>
    <article class="y-article-down row d-flex justify-content-between" data-aos="fade-up"  data-aos-duration="2000">
        <div class="y-article-left col-6" >
            <div class="y-hight-3"> </div>
            <div class="font5">
                我們從豐富的圖案設計中，精挑細選了粉絲們喜愛以及最能代表pugrace的圖案，搭配Pentel的Energel鋼珠筆、
                Energize自動鉛筆、I+三色筆管，多種款式、多元選擇，不管是每日手帳紀錄、上學考試、上班開會，都能輕鬆組
                合出美觀且實用的組合。
            </div>

        </div>
        <div class="y-article-right col-5">
            <img class="y-cover-fit" src="../img/pentel13.jpg" alt="">
        </div>
    </article>

    <div class="y-container">
        <div class="y-hight-2"> </div>
        <div class="row ">
            <div class="col-3 y-pattern">
                <figure><img class="y-cover-fit" src="../img/pentel02.jpg" alt="" data-aos="flip-left"  data-aos-duration="2000"></figure>
                <p class="font5 d-flex justify-content-center">圓滿花朵</p>
            </div>
            <div class="col-3 y-pattern">
                <figure><img class="y-cover-fit" src="../img/pentel04.jpg" alt="" data-aos="flip-left" data-aos-duration="2000"></figure>
                <p class="font5 d-flex justify-content-center">烏秋圈圈</p>
            </div>
            <div class="col-3 y-pattern">
                <figure><img class="y-cover-fit" src="../img/pentel03.jpg" alt="" data-aos="flip-left" data-aos-duration="2000"></figure>
                <p class="font5 d-flex justify-content-center">動物森林</p>
            </div>
            <div class="col-3 y-pattern">
                <figure><img class="y-cover-fit" src="../img/pentel05.jpg" alt="" data-aos="flip-left" data-aos-duration="2000"></figure>
                <p class="font5 d-flex justify-content-center">台灣八哥</p>
            </div>
        </div>
    </div>

    <div class="y-hight-2"> </div>
    <section class="y-container">
        <div class="font2 d-flex justify-content-center">-商品連結-</div>
        <!-- <div class="y-hight-2"></div> -->
        <div class="row" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000">
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href=""><img class="y-cover-fit" src="../img/pentel13.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=28">珊瑚自動鉛筆</a>
                <a class="y-item font3 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=28">$150</a>
            </div>
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href=""><img class="y-cover-fit" src="../img/b_living02_0.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=27">圓滿花朵鋼筆</a>
                <a class="y-item font3 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=27">$150</a>
            </div>
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href=""><img class="y-cover-fit" src="../img/b_living03_0.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=29">三色筆管
                </a>
                <a class="y-item font3 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=29">$150</a>
            </div>
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href=""><img class="y-cover-fit" src="../img/pentel09.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=27">珊瑚自動鉛筆</a>
                <a class="y-item font3 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=27">$450</a>
            </div>
        </div>
        <div class="y-hight-1"></div>
        <div class="d-flex justify-content-center">
            <a href="<?= WEB_ROOT ?>/onlineshop-index.php" class="y-sub-btn yellow_btn" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Go Store</a>
        </div>
    </section>
    <div class="y-hight-1"></div>

</div>
<div id="goTop" class="top" onclick="goTop();">
  <img src="../img/TOP.svg" />
</div>
<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // 頁面特效
    AOS.init();

    // 頁面切換 underline
    $('.y-nav-link').on('click', function() {
        $('.y-active-link').removeClass('y-active-link');
        $(this).addClass('y-active-link');
    });
    $(".y-menu").on("click", function() {
        $(".y-submenu1").toggleClass("open")
        $(".y-down-arrow").toggleClass("up-arrow")
        //  console.log("123")
    })
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->