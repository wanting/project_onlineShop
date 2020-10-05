<?php require __DIR__ . '/__connect_db.php';
$pageName = '會員中心';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
    main {
        margin: 25px 35px;
        flex-flow: column nowrap;
    }
    .box{
        min-height: calc(100vh - 335px);
    }
    .title {
        margin: 0;
        padding: 35px 0;
        text-align: center;
    }

    .e-card {
        text-align: center;
        padding: 0;
        margin: 35px;
        max-width: 300px;
        transition: .5s;
    }

    .e-card:hover{
        transform: translateY(-0.5rem) scale(1.0125);
        box-shadow: 0 0 0 0.15rem #465038;
        cursor: pointer;
    }

    .e-card h3 {
        margin: 0;
        padding: 25px 0;
    }

    .e-card_inside {
        flex-flow: column nowrap;
        padding: 0 40px 25px 40px;
    }

    .e-card_icon {
        height: 75px;
    }

    .green_btn {
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
<main class="container d-flex justify-content-center">
    <h1 class="title font1" data-aos="fade-down" data-aos-duration="2000">會員中心</h1>
    <div class="e-card_group row align-items-start d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000">
        <div class="e-card col-xl-3 radius_border bg_beige" >
            <h3 class="bg_yellow font3">會員資訊</h3>
            <div class="e-card_inside d-flex justify-content-center">
                <img class="e-card_icon m-4" src="../img/edit.svg" alt="">
                <a class="green_btn mb-3 " href="<?= WEB_ROOT ?>/member-info.php">修改資料</a>
                <a class="green_btn " href="<?= WEB_ROOT ?>/member-password.php">修改密碼</a>
            </div>
        </div>
        <div class="e-card col-xl-3 bg_beige radius_border" >
            <h3 class="bg_yellow font3">訂單紀錄</h3>
            <div class="e-card_inside d-flex justify-content-center">
                <img class="e-card_icon m-4" src="../img/list.svg" alt="">
                <a class="green_btn" href="<?= WEB_ROOT ?>/member-orderlist.php">查詢訂單</a>
            </div>
        </div>
        <div class="e-card col-xl-3 bg_beige radius_border" >
            <h3 class="bg_yellow font3">我的課程</h3>
            <div class="e-card_inside d-flex justify-content-center">
                <img class="e-card_icon m-4" src="../img/course.svg" alt="">
                <a class="green_btn" href="<?= WEB_ROOT ?>/member-course.php">查看課程</a>
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