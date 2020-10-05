<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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
        padding: 0;
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
    }

    @media screen and (max-width:414px) {
        .y-container {
            max-width: 300px;
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
        /* text-decoration: none; */
        /* color: #465038; */
        /* border: 0; */
        /* font-size: 20px; */
    }

    /* a:hover {
        text-decoration: none;
    } */

    .y-dropdown {
        display: none;
    }


    /*------banner------------------------------------*/
    .y-course-ban {
        max-width: 100%;
        height: 300px;
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

    @media screen and (max-width:576px) {
        .y-course-ban {
            max-width: 100%;
            height: 200px;

        }

        .y-bread-list {
            justify-content: center;
            margin-bottom: 50px;
        }
    }

    @media screen and (max-width:375px) {
        .y-course-ban {
            max-width: 300px;
            height: 200px;

        }
    }

    /*-------slider-----------------------------------*/

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

    .y-btn-prev {
        left: 0;
    }

    .y-btn-next {
        right: 0;
    }

    @media screen and (max-width:576px) {
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
    @media screen and (max-width:414px){
        .y-slider-wrap {
            width: 300px;
        }
    }


    /* -------頁面特效------------------------ */
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
    
    /* ----------課程卡片--------------------------- */
    .y-course-card {
        /* width: 20rem; */
        position: relative;
        border: 2px solid #e0b872;
        border-bottom: 10px solid #e0b872;
    }

    .y-course-card:hover {
        transform: translateY(-0.5rem) scale(1.0125);
        transition: .5s;
        box-shadow: 0 0.5em 3rem -1rem rgba(0, 0, 0, 0.5);
    }

    .y-course-card>img {
        height: 201.05px;
    }

    .y-card-body>img :hover {
        transform: translateY(-0.5rem) scale(1.2);
        box-shadow: 0 0.5em 3rem -1rem rgba(0, 0, 0, 0.5);
    }

    .y-course-card>p,
    h5 {
        letter-spacing: 5px;
    }

    .y-card-body {
        align-items: center;
        height: 10rem;
        text-align: center;
        margin: 20px auto;
    }

    .y-card-body>p {
        margin-bottom: 20px;
    }

    @media screen and (max-width:576px) {
        .y-course-card {
            
            margin-bottom: 35px;
            width: 350px;
        }
    }

    @media screen and (max-width:375px) {
        .y-course-card{
            width: 300px;
        }
        .y-card-body {
            height: 9rem;
        }

        .y-course-card>img {
            width: 100%;
        }

        .green_btn {
            padding: 10px 60px;
            font-size: 14px;
        }
    }

    /* ---------下拉篩選---------------------------- */
    .b-menu {
        flex-direction: column;
        margin-bottom: 0;
        width: 175px;

    }

    .b-menu li {
        position: relative;
    }

    .b-main-nav-g {
        display: flex;
        justify-content: space-between;
    }

    .b-all {
        margin-left: 20px;
        margin-right: -8px;
        font-size: 16px;
        font-weight: 500;
        color: #465038;
        font-family: 'Noto Sans TC', sans-serif;
    }


    .b-down-arrow {
        border: solid #465038;
        border-width: 0 1px 1px 0;
        display: inline-block;
        padding: 5px;
        margin: 19px;
        transform: rotate(45deg);

    }

    .b-phone-nav ul li ul .b-down-arrow.b-up-arrow {
        transform: rotate(-135deg);
    }

    .b-list {
        color: #465038;
        margin: 0;
        padding: 10px 20px;
        border-top: solid 1px #465038;
        /* border-bottom: solid 1px #465038; */

    }

    .b-phone-nav {
        display: block;
    }

    .b-phone-nav .b-wrapper {
        display: flex;
        width: 100%;
        text-align: center;
    }

    .b-phone-nav ul {
        list-style: none;
        padding: 0;
        margin-top: 0;
        margin-bottom: 0;
    }

    .b-phone-nav ul li {
        position: relative;
        border-bottom: solid 1px #465038;
        /* border-top: solid 1px #465038; */

    }

    .b-submenu1 {

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
        background-color: #ffffff;
        border-top: solid 1px #465038;


    }

    .b-phone-nav ul li .b-submenu1.open {
        opacity: 1;
        max-height: 300px;
    }

    .b-submenu1 li a {
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.5px;
        font-family: 'Noto Sans TC', sans-serif;

    }

    .b-phone-nav ul li a {
        color: #465038;
        padding: 10px 20px;
        /* display: block撐開 */
        display: block;
    }

    @media screen and (max-width:576px) {
        .b-menu {
            width: 100%;
        }
    }

    /* ---------收藏愛心------------------- */
    .b-fa-heart {
        color: #465038;
        position: absolute;
        font-size: 1rem;
        background-color: #eeeeee;
        padding: 15px;
        border-radius: 50px;
        top: 35%;
        left: 5%;
        z-index: 2;
    }


    .b-fa-heart:hover {
        background-color: #465038;
        color: #e8e2d4;

    }
</style>


<div class="y-hight-2"></div>
<h1 class="font1 d-flex justify-content-center animated fadeInDown m-0">Course</h1>
<!-- <div class="y-hight-2"></div> -->
<div class="y-container y-main-nav animated fadeInDown">
    <!-- id="y-all-item" id="y-topic-item" id="y-brand-item"-->
    <ul class="d-flex justify-content-around  ">
        <li id="y-course-info" class="y-btn font3 y-nav-link y-active-link">
            <a>課程資訊</a>
            <div class="y-underline"></div>
        </li>
        <!-- <li id="y-course-book" class="y-btn font3 y-nav-link">
            <a>預約課程</a>
            <div class="y-underline"></div>
        </li>
        <li id="y-course-case" class="y-btn font3 y-nav-link">
            <a>活動案例</a>
            <div class="y-underline"></div>
        </li> -->
    </ul>
</div>
<!-- 手機下拉選單 -->
<div class="y-container">
    <div class="y-dropdown" id="y-drop-down">
        <div id="y-course-info-m" class="y-menu">
            <span id="y-course-info-m">課程資訊</span>
            <i class="y-down-arrow "></i>
        </div>
        <label>
            <input type="checkbox">
            <ul>
                <li id="y-course-info-m" val="課程資訊">課程資訊</li>
                <li id="y-course-book-m" val="預約課程">預約課程</li>
                <li id="y-course-case-m" val="聯名商品">活動案例</li>
            </ul>
        </label>
    </div>
</div>
<div class="y-hight-2"> </div>

<div class="y-container">
    <!--------------------banner-------------------->
    <!-- <div class="y-course-ban">
        <img class="y-cover-fit" src="../img/course02.jpg" alt="">
    </div> -->
    <!--------------------slider-------------------->
    <div class="y-slider-wrap overflow-hidden position-relative animated fadeInDown">
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
    <div class="y">
        <nav aria-label="breadcrumb" class="y-bread-list">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page"> <a href="<?= WEB_ROOT ?>/course_index.php">Course</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page">課程資訊</li>
            </ol>
        </nav>
    <!-- ------------------下拉篩選--------------- -->
        <nav class="b-phone-nav d-flex justify-content-end">
            <ul class="b-menu">
                <li>
                    <ul class="d-flex justify-content-center  b-list" href="">

                        <a class="b-all">熱銷排行 </a> <i class="b-down-arrow "></i>
                    </ul>

                    <ul class="b-submenu1">
                        <li><a class="sale" href="">價格由低到高</a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>

    </div>
    <div class="y-hight-2"> </div>
    <!-----------------課程卡片-------------------->
    <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-sm-6 col-12 d-flex justify-content-center">
            <div class="y-course-card">
                <img src="../img/course-card01.jpg" class="card-img-top y-cover-fit" alt="">
                <i class="fa  fa-heart-o b-fa-heart addToFavorites"></i>
                <div class="y-card-body">
                    <p class="font5 mx-5">經典印花課</p>
                    <h5 class="font4">感光印花進階製版</h5>
                    <p class="font5">NT $1200</p>
                    <a type="button" href="#" class="green_btn">立即報名</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6  col-12 d-flex justify-content-center">
            <div class="y-course-card">
                <img src="../img/course-card02.jpg" class="card-img-top y-cover-fit" alt="">
                <i class="fa  fa-heart-o b-fa-heart addToFavorites"></i>
                <div class="y-card-body">
                    <p class="font5 mx-5">經典印花課</p>
                    <h5 class="font4">生活包袋 (兩入組)</h5>
                    <p class="font5">NT $1000</p>
                    <a type="button" href="#" class="green_btn">立即報名</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6  col-12 d-flex justify-content-center">
            <div class="y-course-card">
                <img src="../img/course-card03.jpg" class="card-img-top y-cover-fit" alt="">
                <i class="fa  fa-heart-o b-fa-heart addToFavorites"></i>
                <div class="y-card-body">
                    <p class="font5 mx-5">經典印花課</p>
                    <h5 class="font4">調色創意印花班</h5>
                    <p class="font5">NT $500</p>
                    <a type="button" href="#" class="green_btn">立即報名</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6  col-12 d-flex justify-content-center">
            <div class="y-course-card">
                <img src="../img/course-card04.jpg" class="card-img-top y-cover-fit" alt="">
                <i class="fa  fa-heart-o b-fa-heart addToFavorites"></i>
                <div class="y-card-body">
                    <p class="font5 mx-5">經典印花課</p>
                    <h5 class="font4">卡典西德型紙印花班</h5>
                    <p class="font5">NT $1000</p>
                    <a type="button" href="#" class="green_btn">立即報名</a>
                </div>
            </div>
        </div>
    </div>



</div>
<!--------------------內容-------------------->

<div class="y-hight-2"> </div>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // 頁面切換 underline
    $('.y-nav-link').on('click', function() {
        $('.y-active-link').removeClass('y-active-link');
        $(this).addClass('y-active-link');
    });

    // slider
    var index = 0;
    var slideWidth = $(".y-container").width();
    var slideImages = ["course01.jpg", "course02.jpg", "course03.jpg"];
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



    // heart
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

    // menu內容切換(web)
    $('#y-course-info').click(function() {
        console.log('課程資訊')
        $(".y-topic-item").show();
        $(".y-brand-item").hide();
    });

    $('#y-course-book').click(function() {
        console.log('預約課程')
        $(".y-brand-item").show();
        $(".y-topic-item").hide();
    });
    $('#y-course-case').click(function() {
        console.log('活動案例')
        $(".y-brand-item, .y-topic-item").show();
    });

    // menu內容切換(mobile)
    $('#y-topic-item-m').click(function() {
        console.log('課程資訊')
        $(".y-topic-item").show();
        $(".y-brand-item").hide();
    });

    $('#y-brand-item-m').click(function() {
        console.log('預約課程')
        $(".y-brand-item").show();
        $(".y-topic-item").hide();
    });
    $('#y-all-item-m, #y-all-item1-m').click(function() {
        console.log('活動案例')
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

    // GOTOP
    $("#goTop").click(function() {
        // $("html").scrollTop(0); //沒有漸變時間
        //animate有動畫秒數
        $("html").animate({
            scrollTop: 0,
        });
    });
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->