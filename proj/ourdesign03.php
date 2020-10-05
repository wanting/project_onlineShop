<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
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


    h3 {
        color: #465038;
        text-align: center;
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: bold;
    }

    .y-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
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

    a {
        text-decoration: none;
        color: #465038;
        border: 0;
        font-size: 20px;
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
            background: #fff;

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

    /* ----------------------------------------------------- */
    .y-slider {
        height: 350px;
    }

    .y-bread-list {
        padding: 0;
        margin-top: 25px;
        display: flex;
        /* 文字水平基準 */
        align-items: baseline;
        list-style: none;
    }

    .y-bread-list>li {
        margin-right: 5px;
    }

    .y-card-body {
        height: 390px;
        margin: 20px 0;
        /* background: #eee; */
    }

    .y-card-topic {
        margin-top: 25px;
    }

    @media screen and (max-width:576px) {
        .y-container {
            width: 500px;
        }
       
        .y-card-body {
            width: 100%;
            height: 250px;
        }

        .y-hight-1 {
            height: 50px;
        }
    }
</style>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<div class="y-hight-1"></div>
<!-- ---------------------------主題選單--web------------------------------------------------- -->
<h1 class="font1 d-flex justify-content-center">Our Design</h1>
<div class="y-hight-2"></div>
<div class="y-container y-main-nav">
    <ul class="d-flex justify-content-around  ">
        <li class="y-btn"><a href="">所有商品</a></li>
        <li class="y-btn"><a href="">主題商品</a></li>
        <li class="y-btn"><a href="">聯名商品</a></li>
    </ul>
</div>
<!-------------主題選單-mobile------------------------ -->
<nav class="y-phone-nav">
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
</nav>
<div class="y-hight-2"> </div>
<div class="y-container">
    <div class="y-banner">
        <img class="y-cover-fit" src="../img/ourdesign-banner03.jpg" alt="">
    </div>
    <!-- --------------麵包屑---------------------------------- -->

    <ul class="y-bread-list">
        <li><a href="" class="font5">Home</a></li>
        <li class="font5">></li>
        <li><a href="" class="font5">Our Design</a></li>
        <li class="font5">></li>
        <li class="font5">聯名商品</li>
    </ul>

</div>
<!-- ---------------------------內文------------------------- -->
<div class="y-container ">
    <div class="row ">
        <div class="col-lg-4 col-6">
            <div class="y-card-body">
                <img class="y-cover-fit" src="../img/pentel12.jpg" alt="">
            </div>
            <p class="font4 y-card-topic d-flex justify-content-center">| Pugrace Ｘ Pentel |</p>
        </div>
        <div class="col-lg-4 col-6">
            <div class="y-card-body">
                <img class="y-cover-fit" src="../img/ourdesign05.jpg" alt="">
            </div>
            <p class="font4 y-card-topic d-flex justify-content-center">｜ Pugrace X Hello Kity ｜</p>
        </div>
        <div class="col-lg-4 col-6">
            <div class="y-card-body">
                <img class="y-cover-fit" src="../img/ourdesign06.jpg" alt="">
            </div>
            <p class="font4 y-card-topic d-flex justify-content-center">｜Pugrace X Naniiro｜</p>
        </div>
        <div class="col-lg-4 col-6">
            <div class="y-card-body">
                <img class="y-cover-fit" src="../img/pentel12.jpg" alt="">
            </div>
            <p class="font4 y-card-topic d-flex justify-content-center">｜ Pugrace X Pentel ｜</p>
        </div>
        <div class="col-lg-4 col-6">
            <div class="y-card-body">
                <img class="y-cover-fit" src="../img/ourdesign05.jpg" alt="">
            </div>
            <p class="font4 y-card-topic d-flex justify-content-center">｜ Pugrace X Hello Kity ｜</p>
        </div>
        <div class="col-lg-4 col-6">
            <div class="y-card-body">
                <img class="y-cover-fit" src="../img/ourdesign06.jpg" alt="">
            </div>
            <p class="font4 y-card-topic d-flex justify-content-center">｜Pugrace X Naniiro｜</p>
        </div>
    </div>
</div>
<div class="y-hight-2"> </div>
<div class="y-hight-2"> </div>


<?php include __DIR__ . '/__scripts.php' ?>
<script>
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