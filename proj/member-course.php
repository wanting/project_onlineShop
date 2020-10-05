<?php require __DIR__ . '/__connect_db.php';
$pageName = '會員中心';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
    main {
        /* margin: 25px 35px; */
        margin-top: 25px;
        flex-flow: column nowrap;
    }

    .y-container {
        max-width: 1140px;
        width: 100%;
        margin: 0 auto;
        justify-content: center;
        /* align-items: center; */
    }

    .title {
        margin: 0;
        padding: 35px 0;
        text-align: center;
    }

    .breadcrumb {
        max-width: 800px;
        margin: 25px ;
        display: flex;
        align-items: start;
        justify-content: start;
    }

    .y-course-card {
        /* width: 20rem; */
        position: relative;
        border: 2px solid #e0b872;
        border-bottom: 10px solid #e0b872;
        margin-bottom: 50px;
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

        .breadcrumb {
            /* margin: 0; */
            display: flex;
            align-items: center;
            justify-content: center;

        }

    }

    @media screen and (max-width:375px) {
        .y-course-card {
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

    .red_btn {
        font-size: 16px;
    }
</style>
<script>
    var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (!login_success) {
        location.href = 'login.php';
    };
    //判斷是否登入,未登入就跳去登入頁面,登入就載入此頁
</script>
<main class="y-container  d-flex justify-content-center">
    <h1 class="title font1" data-aos="fade-down" data-aos-duration="2000">會員中心</h1>

    <!-- <div class=" row align-items-start d-flex justify-content-start"> -->
    <nav aria-label="breadcrumb">
        <ol class=" breadcrumb">
            <li class="breadcrumb-item"><a href="<?= WEB_ROOT ?>/member-index.php">會員中心</a></li>
            <li class="breadcrumb-item active" aria-current="page">會員資訊</li>
        </ol>
        <!-- 麵包屑位置 -->
    </nav>
    </div>

    <div class="y-container row d-flex justify-content-center">
        <div class="col-lg-3 col-sm-6 col-12 d-flex justify-content-center">
            <div class="y-course-card">
                <img src="../img/course-card01.jpg" class="card-img-top y-cover-fit" alt="">
                <i class="fa  fa-heart-o b-fa-heart addToFavorites"></i>
                <div class="y-card-body">
                    <p class="font5 mx-5">經典印花課</p>
                    <h5 class="font4">感光印花進階製版</h5>
                    <p class="font5">NT $1200</p>
                    <a type="button" href="#" class="red_btn">查看課程</a>
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
                    <a type="button" href="#" class="red_btn">查看課程</a>
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
                    <a type="button" href="#" class="red_btn">查看課程</a>
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
                    <a type="button" href="#" class="red_btn">查看課程</a>
                </div>
            </div>
        </div>
    </div>
</main>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // 頁面特效
    AOS.init();
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->