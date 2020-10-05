<?php require __DIR__ . '/__connect_db.php';
$pageName = 'wishlist-empty';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 1;
$sql_c = "SELECT * FROM `products` WHERE `sid`";
$cate = $pdo->query($sql_c)->fetchAll();


?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<style>
    /* --------------通用元件--------------------------------- */
    .y-hight-2 {
        height: 50px;
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

    .navbar-container ul li:hover a {}

    .y-main-nav ul li:active a {
        transition: 0.1s;
        /* color: rgba(255, 255, 255, 0.76); */
    }

    .y-main-nav ul li:active .y-underline {
        transition: none;
        background-color: rgba(255, 255, 255, 0.76);
    }

    /* -----------------menu-------------------------------- */

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

    .y-phone-nav {
        display: none;
    }

    @media screen and (max-width:576px) {

        .y-main-nav {
            display: none;
        }

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

        .y-phone-nav ul li ul .y-down-arrow.up-arrow {
            transform: rotate(-135deg);
        }

        .y-list {
            color: #465038;
            margin: 0;
            padding: 10px 20px;
            border-top: solid 1px #465038;
        }

        .y-phone-nav {
            margin-top: 50px;
            display: block;
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

        }

        .y-submenu1 {
            z-index: 2;
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
            background-color: #fff;

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



    /*-------內文-----------------------------------*/
    .f-content {
        max-width: 1140px;
        text-align: center;
        position: relative;
        margin: 0 auto 50px auto;
    }


    /* -----------------------favorites-------------------------------- */
    .demo {
        position: relative;
        font-family: 'Nunito', sans-serif;
        color: white;
        width: 100%;
        height: 350px;
    }

    .contain-all {
        margin: auto;
        /* width: 150px; */
    }
    .text{
        width: 200px;
    }

    .contain-all a {
        position: relative;
        display: block;
        margin: auto;
        padding-top: 50px;
        text-decoration: none;
        color: white;
        width: 150px;
        height: 150px;
    }

    .contain-all a:visited {
        text-decoration: none;
        /* color: inherit; */
        color: #cf7e60;
    }

    .contain-all a:active {
        text-decoration: none;
        /* color: inherit; */
    }

    .icon-hook {
        position: relative;
    }

    .icon-hook:after {
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .icon-hook>svg {
        pointer-events: none;
    }

    .favorite {
        /* background: #fcab54; */
    }

    .heart-icon {
        top: 75px;
        left: 22px;
    }

    .loader-1 {
        opacity: 0;
        transform-origin: 50% 50%;
        transform: scale(.3);
    }

    .active .heart-1 {
        transform-origin: center;
        animation: grow-heart 500ms 2s forwards;
        stroke: #465038;
    }

    .active .loader-1-l {
        animation: load-1 500ms 500ms forwards;
    }

    .active .loader-1-m {
        animation: load-1 500ms 1s forwards;
    }

    .active .loader-1-r {
        animation: load-1 500ms 1500ms forwards;
    }

    @keyframes load-1 {
        50% {
            opacity: 1;
            transform: scale(1.3);
        }
    }

    @keyframes grow-heart {
        50% {
            transform: scale(.3);
        }
    }

    /* --------------slider--------------------- */

    .b-h2-introduction {
        margin: 55px;
        text-align: center;
    }

    .b-introduction-li .b-introduction-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    .f-wrapper {
        max-width: 100%;
        height: 730px;
        background: hsl(38, 64%, 66%, 0.2);
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


    @media screen and (max-width:375px) {
        .b-wrapper {
            max-width: 315px;
            /* margin: 0 auto; */
            /* margin-bottom: 380px; */
        }

        .b-card {
            width: 285px;
            height: 285px;
        }

        .b-arrow-b-btn-g {
            padding-left: 0;
            margin: 0 -25px;
            margin-top: -350px;
        }
        .y-container {
            max-width: 300px;
        }

        .f-content {
            max-height: 200px;
        }

        .f-alert {
            margin: 50px auto auto auto;
        }

        .wishIconImg {
            width: 40px;
            height: 40px;
        }

        .f-dot-line {
            border: none;
            border-bottom: 2px dashed #000;
            width: 303px;
            margin: 0 auto;
        }

        .f-wrapper {
            height: 600px;
            background: transparent;
        }

        .b-h2-introduction {
            margin: 25px;
        }



    }
</style>


<div class="y-hight-2"></div>
<h1 class="font1 d-flex justify-content-center">收藏清單</h1>
<div class="y-container y-main-nav">
    <ul class="d-flex justify-content-around  ">
        <li class="y-btn font3 y-nav-link y-active-link">
            <a href="">收藏商品</a>
            <div class="y-underline"></div>
        </li>
        <li class="y-btn font3 y-nav-link">
            <a href="">收藏課程</a>
            <div class="y-underline"></div>
        </li>
    </ul>
</div>
<nav class="y-phone-nav">
    <ul class="y-menu">
        <li>
            <ul class="d-flex justify-content-center  y-list" href="">

                <a class="y-all">收藏清單 </a> <i class="y-down-arrow "></i>
            </ul>

            <ul class="y-submenu1">
                <li><a href="">收藏商品</a></li>
                <li><a href="">收藏課程</a></li>
            </ul>
        </li>

    </ul>
</nav>
<!--------------------內容---------------------->

<div class="col f-content">
    <div class="demo favorite">
        <div class="contain-all">
            <a href="#" class="contain-icon icon-hook">
                <!--Begin First Favorite Icon-->
                <svg class="heart-icon heart-icon-1" version="1.1" width="70px" height="auto" viewBox="0 0 90.65 85.04">
                    <path class="heart-1" fill="none" stroke="#465038" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
          M45.137,23.041c4.912-24.596,40.457-27.775,42.128-0.435c1.398,22.88-21.333,40.717-42.128,50.522 M45.137,23.041
          C40.225-1.555,5.057-4.734,3.387,22.606c-1.398,22.88,20.955,40.717,41.75,50.522" />
                    <circle class="loader-1 loader-1-l" fill="#465038" stroke="none" stroke-miterlimit="10" cx="25.173" cy="39.773" r="5.014" />
                    <circle class="loader-1 loader-1-r" fill="#465038" stroke="none" stroke-miterlimit="10" cx="65.477" cy="39.773" r="5.014" />
                    <circle class="loader-1 loader-1-m" fill="#465038" stroke="none" stroke-miterlimit="10" cx="45.325" cy="39.773" r="5.014" />
                </svg>
                <!--End First Favorite Icon-->
                <!-- <h4 class="font4 p-3">目前尚無收藏商品 !</h4> -->
            </a>
            <h4 class="font4 p-3">目前尚無收藏商品 !</h4>
        </div>
    </div>
</div>

<div class="f-dot-line"></div>

<div class="f-wrapper">
    <div class="y-hight-2"></div>
    <h2 class="b-h2-introduction font2">- 你可能也會喜歡 -</h2>

    <div class="b-wrapper">
        <div class="b-slideWrapper overflow-hidden position-relative">

            <ul id="b-slideImages" class="list-unstyled b-slideImages d-flex position-absolute">
                <?php foreach ($cate as $r) :
                    if (in_array($r['cate_sid'], [6, 7, 8])) :
                        if ($r['sid'] != $sid) : ?>

                            <li data-sid="<?= $r['sid'] ?>">
                                <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                    <div class="card b-card" style="">
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
            </ul>



        </div>

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



<?php include __DIR__ . '/__scripts.php' ?>
<script>
    // 手機板menu
    $(".y-menu").on("click", function() {
        $(".y-submenu1").toggleClass("open")
        $(".y-down-arrow").toggleClass("up-arrow")
        //  console.log("123")
    });

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

    icons = document.querySelectorAll('.icon-hook');

    // Cycle through list
    for (var i = 0; i < icons.length; i++) {
        icons[i].addEventListener('click', function(event) {
            event.preventDefault();

            var icon = this;
            var currentClass = icon.getAttribute('class'); // The starting class

            console.log(icon);

            if (currentClass.indexOf('active') > -1) {
                // Remove .active
                icon.setAttribute('class', currentClass.replace(' active', ''));
            } else {
                // Add .active
                icon.setAttribute('class', currentClass + ' active');
            }
        }, false);
    }
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->