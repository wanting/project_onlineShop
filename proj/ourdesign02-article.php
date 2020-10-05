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

    /* .y-text-style {
        color: #465038;
        text-align: center;
        font-family: 'Noto Sans TC', sans-serif;
        line-height: 45px;
        font-size: 16px;
    } */

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
            max-width: 500px;
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

    /* a {
        text-decoration: none;
        color: #465038;
        border: 0;
        font-size: 20px;
    } */

    /* a:hover {
        text-decoration: none;

    } */

    .y-dropdown {
        display: none;
    }

    @media screen and (max-width:576px) {
        .y-main-nav {
            /* display: none; */
        }

        .y-menu {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .y-menu span {
            margin-left: 65px;
            margin-right: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .y-dropdown {
            display: flex;
            flex-direction: column;
            height: 50px;
            position: relative;
            font-size: 16px;
            text-align: center;
            color: #465038;
            margin: 50px 0 0 0;
            border-top: solid 1px #465038;
            border-bottom: solid 1px #465038;
            z-index: 10;
        }

        .y-down-arrow {
            border: solid #465038;
            border-width: 0 1px 1px 0;
            display: inline-block;
            padding: 5px;
            margin: 19px;
            transform: rotate(45deg);
        }

        .y-up-arrow {
            transform: rotate(-135deg);
        }

        .y-dropdown>span {
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
            display: inline-block;
            color: #465038;
            cursor: pointer;
        }

        .y-dropdown input[type=checkbox] {
            position: absolute;
            display: block;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            margin: 0px;
            opacity: 0;
        }

        .y-dropdown ul {
            width: 100%;
            text-align: center;
            position: absolute;
            display: none;
            padding: 0;
            margin: 0;
            background-color: white;
        }

        .y-dropdown input[type=checkbox]:checked+ul {
            display: block;
        }

        .y-dropdown ul li {
            display: block;
            border-bottom: solid 1px #465038;
            padding: 10px 0px;
        }

        .y-dropdown ul li:hover {
            background-color: #F5F5F5;
            cursor: pointer;
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
        /* margin-top: 25px; */
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

    .y-slogan-m {
        display: none;
    }

    .font4,
    .font5 {
        line-height: 50px;
    }


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

    @media screen and (max-width:576px) {
        .y-banner {
            width: 100%;
            height: 200px;
        }

        .y-bread-list {
            justify-content: center;
        }


        .y-article-up {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            flex-direction: column;
        }

        .y-article-down {
            width: 100%;
            /* height: 100%; */
            margin: 0 auto;
            flex-direction: column-reverse;
        }

        .y-article-left {
            max-width: 100%;
            margin: 20px auto;
        }

        .y-article-right {
            max-width: 100%;
            height: 375px;
            margin: 100px 0 0 0;
        }

        .y-slogan-m {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }

        .y-slogan-w {
            display: none;
        }

        .y-slogan {
            font-size: 20px;
            align-items: center;
        }

        figure.y-shop {
            width: 100%;
            /* height: 100%; */
        }

        .y-shop-link {
            margin-top: 80px;
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
            height: 70%;
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
<!-- ---------------------------主題選單--web------------------------------------------------- -->
<h1 class="font1 d-flex justify-content-center animated fadeInDown"><a href="<?= WEB_ROOT ?>/ourdesign-index.php">Our Design</a></h1>
<div class="y-container y-main-nav animated fadeInDown">
    <ul class="d-flex justify-content-around">
        <li class="y-btn y-nav-link y-active-link">
            <a class="font3" href="">主題商品</a>
            <div class="y-underline"></div>
        </li>
    </ul>
</div>

<!-- 手機下拉選單 -->
<!-- <div class="y-container">
    <div class="y-dropdown" id="y-drop-down">
        <div id="y-all-item-m" class="y-menu">
            <span id="y-all-item1-m">所有商品</span>
            <i class="y-down-arrow "></i>
        </div>
        <label>
            <input type="checkbox">
            <ul>
                <li id="y-topic-item-m" val="主題商品">主題商品</li>
                <li id="y-brand-item-m" val="聯名商品">聯名商品</li>
            </ul>
        </label>
    </div>
</div> -->

<!-- banner -->
<div class="y-hight-2"></div>
<div class="y-container">
    <div class="y-banner">
        <img class="y-cover-fit" src="../img/ourdesign-banner01.jpg" alt="" data-aos="fade-up" data-aos-duration="2000">
    </div>
</div>
<div class="y-hight-2"> </div>
<div class="y-container">
    <!----------------------麵包屑--------------------------------------->

    <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="#">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="<?= WEB_ROOT ?>/ourdesign-index.php">Our Design</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">主題商品</li>

        </ol>
    </nav>
    <!------------------------------------------------------------->
    <div class="y-hight-3"> </div>
    <article class="y-article-up row d-flex justify-content-between">
        <div class="y-article-left col-6">
            <div class="y-slogan-m font2 yellow" style="letter-spacing: 1rem;" data-aos="fade-up" data-aos-duration="2000">
                這個夏天，<br>
                讓Pugrace陪你一起野餐
            </div>
            <img class="y-cover-fit" src="../img/mountain03.jpg" alt="" data-aos="fade-up" data-aos-duration="2000">
        </div>
        <div class="y-article-right col-5">
            <div class="y-slogan-w font2 yellow" data-aos="fade-up" data-aos-duration="2000">
                這個夏天，<br>
                &emsp;&emsp;&emsp;讓Pugrace陪你一起野餐
                <div class="y-hight-2"> </div>
            </div>

            <div class="font5" data-aos="fade-up" data-aos-duration="2000">
                為戶外活動與減塑生活而設計

                一個從設計開始就為方便日常減塑生活而打造的系列，從外出、外食、自備餐具與購物袋等簡單的小動作開始一起綠色生活。
            </div>
        </div>
    </article>
    <div class="y-hight-1"> </div>
    <article class="y-article-down row d-flex justify-content-between">

        <div class="y-article-left col-6">
            <div class="y-hight-3"> </div>
            <div class="font2 d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                永續的綠色生活
            </div>
            <div class="font5" data-aos="fade-up" data-aos-duration="3000">
                當我們深愛大自然，就不會想要破壞她；當我們擁有設計力，就可以用設計改善生活。

                印花樂首度推出的有機棉系列商品，第二波上市的是結合品牌熱門圖案「山中健行」的戶外、減塑生活商品，「永續生活」不是刻意為之，而是秉持著對資源的尊重，物盡其用不浪費；對於美感或是風格營造也不妥協。

                「買好物、用長久」，好好買件喜歡的東西，珍惜地使用很久很久。
            </div>

        </div>
        <div class="y-article-right col-5">
            <img class="y-cover-fit" src="../img/ourdesign01-1.jpg" alt="" data-aos="fade-up" data-aos-duration="2000">
        </div>
    </article>
    <div class="y-hight-1"> </div>

    <section class="y-container">
        <div class="font2 d-flex justify-content-center" >-商品連結-</div>
        <!-- <div class="y-hight-2"></div> -->
        <div class="row" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000">
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=23"><img class="y-cover-fit" src="../img/hat03_0.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=23">花瓣帽/雲塵灰色</a>
                <a class="y-item font3 d-flex justify-content-center" href="">$350</a>
            </div>
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=22"><img class="y-cover-fit" src="../img/hat02_0.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=22">花瓣帽/花卉藍紅</a>
                <a class="y-item font3 d-flex justify-content-center" href="">$350</a>
            </div>
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=21"><img class="y-cover-fit" src="../img/hat01_0.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=21">花瓣帽/風土黃</a>
                <a class="y-item font3 d-flex justify-content-center" href="">$350</a>
            </div>
            <div class="y-shop-link col-lg-3 col-6">
                <figure class="y-shop">
                    <a href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=3"><img class="y-cover-fit" src="../img/h_bag03_0.jpg" alt=""></a>
                </figure>
                <a class="y-item font5 d-flex justify-content-center" href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=3">圓底小提袋
                </a>
                <a class="y-item font3 d-flex justify-content-center" href="">$450</a>
            </div>
        </div>
        <div class="y-hight-2"></div>
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