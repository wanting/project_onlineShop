<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
    /* --------------通用元件--------------------------------- */
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

    /* ----------------menu 特效------------------------------- */

    .y-menu {
        padding: 0;
        display: flex;

    }

    .y-main-nav {
        margin-top: 25px;
        padding: 0;
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
        /* padding: 10px; */
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

    }

    .y-main-nav ul li:active .y-underline {
        transition: none;
        background-color: rgba(255, 255, 255, 0.76);
    }

    /* -------------menu----------------------------- */

    .y-btn {

        list-style: none;
        margin: 10px;
        /* font-weight: 400; */
        letter-spacing: 1.2px;

    }

    a {
        text-decoration: none;
        /* color: #465038; */
        border: 0;
        /* font-size: 20px; */
    }

    a:hover {
        text-decoration: none;

    }

    .y-dropdown {
        display: none;
    }

    @media screen and (max-width:576px) {
        .y-main-nav {
            display: none;
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

    /*------slider------------------------------------*/
    .y-slider-wrap {
        height: 350px;
        background: #ccc;
    }

    .y-slider-image {
        height: 350px;
        transition: .5s;
        left: 0;
    }

    .y-slider-image li {
        flex: 1 0 0;
    }

    .y-slider-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .y-slider-point {
        bottom: 0px;
        left: 0;
        width: 100%;
    }

    .y-slider-point li {
        border: 1px solid #465038;
        height: 15px;
        width: 15px;
        border-radius: 50%;
        margin: 0 3px;
    }

    .y-slider-point li.active {
        background: #465038;
    }

    .y-dir-btn {
        width: 48px;
        height: 100%;
        /* background: rgba(0,0,0,.6); */
        color: #fff;
        opacity: .5;
        cursor: pointer;
        transition: .3s;
    }

    .y-dir-btn:hover {
        opacity: 1;
    }

    /* .y-dir-btn .fas {
        color: #fff;
    } */

    .y-btn-prev {
        left: 0;
    }

    .y-btn-next {
        right: 0;
    }

    @media screen and (max-width:576px) {
        .y-container {
            max-width: 500px;
        }

        .y-hight-1 {
            height: 50px;
        }

        .y-slider-wrap {
            height: 200px;
            /* background: #ccc; */
        }

        .y-slider-image {
            height: 200px;
            transition: .5s;
            left: 0;
        }

        .y-slider-point li {
            border: 1px solid #465038;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            margin: 0 3px;
        }

    }

    @media screen and (max-width:414px) {
        .y-container {
            width: 300px;
        }

        .font4 {
            font-size: 12px;
        }

    }

    /*-------麵包屑-----------------------------------*/
    .y-bread-list {
        padding: 0;
        margin-top: 50px;
        display: flex;
        /* 文字水平基準 */
        align-items: baseline;
        list-style: none;
    }

    .y-bread-list>li {
        margin-right: 5px;
    }

    /*-------內文-----------------------------------*/

    .y-hide {
        /* 隱藏項目 */
        display: none;
    }

    .y-card-body {
        margin: 50px 0;
    }

    .y-pic {
        /* width: 500px; */
        height: 400px;
        overflow: hidden;
    }

    .y-pic img {
        transform: scale(1, 1);
        transition: all 0.8s ease-out;
    }

    .y-pic img:hover {
        transform: scale(1.2, 1.2);
        cursor: pointer;
    }

    .y-card-topic {
        margin-top: 25px;
    }

    @media screen and (max-width:576px) {

        .y-bread-list {
            justify-content: center;
        }

        .y-card-body {
            
            width: 100%;
            height: 300px;
        }

        .y-pic {
            /* width: 500px; */
            height: 300px;
            overflow: hidden;
        }
        


    }

    @media screen and (max-width:414px) {
        .y-container {
            max-width: 300px;
        }

        .y-pic {
            /* width: 500px; */
            height: 200px;
            overflow: hidden;
        }

        .y-card-body {
            margin: 25px 0;
            width: 100%;
            height: 100%;
        }
    }

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
<h1 class="font1 d-flex justify-content-center animated fadeInDown">Our Design</h1>
<!-- <div class="y-hight-2"></div> -->
<div class="y-container y-main-nav" >
    <!-- id="y-all-item" id="y-topic-item" id="y-brand-item"-->
    <ul class="d-flex justify-content-around  ">
        <li id="y-all-item" class="y-btn font3 y-nav-link y-active-link">
            <a>所有商品</a>
            <div class="y-underline"></div>
        </li>
        <li id="y-topic-item" class="y-btn font3 y-nav-link">
            <a>主題商品</a>
            <div class="y-underline"></div>
        </li>
        <li id="y-brand-item" class="y-btn font3 y-nav-link">
            <a>聯名商品</a>
            <div class="y-underline"></div>
        </li>
    </ul>
</div>
<!-- 手機下拉選單 -->
<div class="y-container">
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
</div>
<div class="y-hight-2"> </div>
<div class="y-container">
    <!--------------------slider-------------------->
    <div class="y-slider-wrap overflow-hidden position-relative a" data-aos="fade-up" data-aos-duration="2000">
        <ul class="list-unstyled y-slider-image d-flex position-absolute">
            <!-- <li><img src="ourdesign-banner01.jpg" alt=""></li>
                <li><img src="ourdesign-banner02.jpg" alt=""></li>
                <li><img src="ourdesign-banner03.jpg" alt=""></li> -->
        </ul>
        <ul class="list-unstyled y-slider-point position-absolute d-flex justify-content-center">
            <!-- <li class="active"></li>
                <li></li>
                <li></li> -->
        </ul>
        <a id="next" role="button" class="y-dir-btn y-btn-next position-absolute d-flex justify-content-center align-items-center">

        </a>
        <a id="prev" role="button" class="y-dir-btn y-btn-prev position-absolute d-flex justify-content-center align-items-center">

        </a>

    </div>

    <!--------------------麵包屑-------------------->

    <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">Our Design</li>
        </ol>
    </nav>



</div>
<!--------------------內容-------------------->
<div class="y-container">
    <div class="row" data-aos="fade-up" data-aos-duration="2000">
        <!-- 分類 y-topic-item / y-brand-item -->
        <div class="y-topic-item  y-card-body col-lg-4 col-6">
            <div class="y-pic"><a href="<?= WEB_ROOT ?>/ourdesign02-article.php"><img class="y-cover-fit" src="../img/mountain03.jpg" alt=""></a></div>
            <a href="<?= WEB_ROOT ?>/ourdesign02-article.php" class="y-card-topic font4 d-flex justify-content-center">｜夏日野餐趣｜</a>
        </div>
        <div class="y-topic-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign02.jpg" alt=""></div>
            <a class="y-card-topic  font4 d-flex justify-content-center" href="">｜森林系女孩｜</a>
        </div>
        <div class="y-topic-item  y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign03.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜橙夏｜</a>
        </div>
        <div class="y-topic-item  y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign-topic01.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜花草台灣味｜</a>
        </div>
        <div class="y-topic-item  y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign-topic02.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜uulin印花｜</a>
        </div>
        <div class="y-topic-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign-topic03.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜純棉感｜</a>
        </div>
        <div class="y-hight-2"></div>
        <div class="y-brand-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><a href="<?= WEB_ROOT ?>/ourdesign03-article.php"><img class="y-cover-fit" src="../img/ourdesign04.jpg" alt=""></a></div>
            <a href="<?= WEB_ROOT ?>/ourdesign03-article.php" class="y-card-topic font4 d-flex justify-content-center">｜ Pugrace X Pentel ｜</a>
        </div>
        <div class="y-brand-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign05.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜Pugrace X Hello Kity｜</a>
        </div>
        <div class="y-brand-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign06.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜Pugrace X Naniiro｜</a>
        </div>
        <div class="y-hight-2"></div>
        <div class="y-brand-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign-brand02.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center">｜Pugrace X Let's cafe｜</a>
        </div>
        <div class="y-brand-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign-brand01.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜ Pugrace X 好玻 ｜</a>
        </div>
        <div class="y-brand-item y-card-body col-lg-4 col-6">
            <div class="y-pic"><img class="y-cover-fit" src="../img/ourdesign-brand03.jpg" alt=""></div>
            <a class="y-card-topic font4 d-flex justify-content-center" href="">｜Pugrace X McDonald's｜</a>
        </div>
    </div>
</div>
<div class="y-hight-2"> </div>
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

    // slider
    var index = 0;
    var slideWidth = $(".y-container").width();
    var slideImages = ["ourdesign-banner01.jpg", "ourdesign-banner02.jpg", "ourdesign-banner03.jpg"];
    var slideCount = slideImages.length;
    console.log(slideCount)

    var slideImagesCount = "";
    var sliderPoint = "";
    for (let i = 0; i < slideCount; i++) {
        slideImagesCount = slideImagesCount + `<li><img src="../img/${slideImages[i]}" alt=""></li>`;
        sliderPoint = sliderPoint + "<li></li>";
    }
    $(".y-slider-image").append(slideImagesCount)
    $(".y-slider-point").append(sliderPoint);
    $(".y-slider-point li").eq(0).addClass("active")
    $(".y-slider-image").css("width", slideCount * slideWidth)

    $(".y-slider-point li").mouseenter(function() {
        index = $(this).index();
        goTo()
    })

    $("#next").click(function() {
        index++;
        console.log(index)
        if (index >= slideCount) {
            index = 0;
        }
        goTo()
    })
    $("#prev").click(function() {
        index--;
        console.log(index)
        if (index < 0) {
            index = slideCount - 1
        }
        goTo()
    })

    function goTo() {
        var slideMove = 0 - index * slideWidth;
        $(".y-slider-image").css("left", slideMove)
        $(".y-slider-point li").eq(index).addClass("active").siblings().removeClass("active")
    }

    $(window).resize(function() {
        slideWidth = $(".y-container").width()
        $(".y-slider-image").css("width", slideCount * slideWidth)
        goTo()
    })


    // menu內容切換(web)
    $('#y-topic-item').click(function() {
        console.log('所有商品')
        $(".y-topic-item").show();
        $(".y-brand-item").hide();
    });

    $('#y-brand-item').click(function() {
        console.log('主題商品')
        $(".y-brand-item").show();
        $(".y-topic-item").hide();
    });
    $('#y-all-item').click(function() {
        console.log('聯名商品')
        $(".y-brand-item, .y-topic-item").show();
    });

    // menu內容切換(mobile)
    $('#y-topic-item-m').click(function() {
        console.log('主題商品')
        $(".y-topic-item").show();
        $(".y-brand-item").hide();
    });

    $('#y-brand-item-m').click(function() {
        console.log('聯名商品')
        $(".y-brand-item").show();
        $(".y-topic-item").hide();
    });
    $('#y-all-item-m, #y-all-item1-m').click(function() {
        console.log('所有商品')
        $(".y-brand-item, .y-topic-item").show();
    });

    // 手機版menu
    $(".y-dropdown, .y-dropdown ul li").on("click", function() {
        $(".y-down-arrow").toggleClass("y-up-arrow")
        //  console.log("dropdown")
    })

    $(document).ready(function() {
        $('.y-dropdown ul>li').click(function() {
            $('.y-dropdown ul>li').each(function() {
                $(this).removeClass('drop-selected');
            });
            $(this).toggleClass('drop-selected');
            $('.y-dropdown .y-menu>span').text($(this).attr("val"))
        });
    });

</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->