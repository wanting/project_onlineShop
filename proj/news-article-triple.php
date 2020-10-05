<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>

<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<style>
    li {
        list-style: none;
    }

    .a-bg-attachment {
        background-attachment: fixed;
    }

    .a-container {
        max-width: 1140px;
        padding: 0;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    @media screen and (max-width:576px) {
        .a-container {
            margin: 0 10%;
        }
    }

    .a-py-6 {
        padding: 3.125rem 0;
    }

    /* ------------------麵包屑------------------ */

    .a-bread-list {
        display: flex;
        margin-top: 50px;
    }

    @media screen and (max-width:576px) {
        .a-bread-list {
            margin: 25px 0 0 0;
            justify-content: center;
        }
    }

    /* ------------------最新消息------------------ */
    .a-news-bn {
        width: 1140px;
        height: 350px;
        overflow: hidden;
        margin: 0 auto;
        background-size: cover;
    }

    @media screen and (max-width:576px) {
        .a-news-bn {
            max-width: 100%;
            height: 170px;
        }
    }

    .a-news-bn>img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ------------------文章內容------------------ */
    .a-container-content {
        max-width: 700px;
        padding: 0;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        letter-spacing: 2.25px;
        line-height: 2;
        padding: 3rem 0;
    }

    .a-content-tag {
        background-color: #E0B872;
        padding: 5px 20px;
    }

    @media screen and (max-width:576px) {
        .a-container-content {
            padding: 1.5rem 0;
        }

        .a-content-title {
            width: 100%;
            text-align: center;
        }

        .a-content-tag {
            display: block;
        }
    }

    .font1 {
        margin: 2rem 0;
        line-height: 1.5;
    }

    .font6 {
        margin: 2rem 0;
    }

    .font3 {
        font-weight: 500;
        margin: 2rem 0;
    }

    @media screen and (max-width:576px) {
        .font3 {
            font-weight: 500;
            margin: 1.5rem 0;
        }
    }

    /* ------------按鈕-------------  */
    .a-btn-group {
        display: block;
    }

    .white_btn {
        margin: 10px;
    }

    .green_btn {
        width: 100%;

        margin: 10px;
    }

    @media screen and (max-width:576px) {
        .a-btn-group {
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .white_btn {
            width: 100%;
            margin: 0 0 30px 0;
        }

        .green_btn {
            width: 100%;
            margin: 0 0 30px 0;
        }
    }

</style>

</section>
<!-- 最新消息 -->
<section class="a-py-6">
    <div class="a-container">
        <div class="a-news-bn">
            <img class="" src="../img/news-bn_03.jpg" alt="">
        </div>
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb" class="a-bread-list">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/news-article-index.php">News</a></li>
            </ol>
        </nav>

        <!-- 文章內容 -->
        <div class="a-container-content">
            <div class="a-content-title">
                <span class="font4 a-content-tag">門市活動</span>
                <h1 class="font1">Pugrace 放大振興<br>
                    使用紙本振興券，500送100</h1>
                <h6 class="font6">POSTED ON 2020-07-10 BY PUGRACE</h6>
            </div>
            <div class="a-content">
                <h3 class="font3">Pugrace 放大振興專案</h3>
                <p class="font5">
                    ○ 活動內容：使用紙本振興券消費，200送30，500送100，全部使用振興券消費，至多送550。<br>
                    ○ 活動時間：7/15～8/31<br>
                    ○ 活動地點：Pugrace直營門市，請見以下<br>
                    ● Pugrace 旗艦店｜106 台北市大安區復興南路一段390號3樓<br>
                    ● Pugrace 台中店｜407 台中市西屯區台灣大道三段251號3樓<br>
                    ● Pugrace 台南店｜701 台南市東區中華東路一段366號1樓<br>
                    詳細活動辦法歡迎洽詢門市夥伴
                </p>
            </div>
        </div>
        <div class="text-center a-btn-group">
            <a href="<?= WEB_ROOT ?>/news-article-index.php" class="white_btn">消息總覽</a>
            <a href="<?= WEB_ROOT ?>/news-article-happywk.php" class="green_btn">下一篇</a>
        </div>
    </div>

</section>

<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->