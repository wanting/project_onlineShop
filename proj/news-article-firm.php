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
            <img class="" src="../img/news-bn_02firm.jpg" alt="">
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
                <span class="font4 a-content-tag">企業合作</span>
                <h1 class="font1">Pugrace × CLINIQUE倩碧推出聯名彩妝，經典花色一字排開</h1>
                <h6 class="font6">POSTED ON 2020-02-05 BY PUGRACE</h6>
            </div>
            <div class="a-content">
                <h3 class="font3">
                    Pugrace經典印花躍上彩妝！與倩碧聯手「開花」！
                </h3>
                <p class="font5">
                    「這些印花圖案代表了品牌最知名的設計，也捕捉了 Pugrace 印花藝術背後的工藝：運用顏色疊加和令人驚喜的色彩組合，創造出具影響力的設計。」</p>
                <h3 class="font3">聯名包裝穿上了 Pugrace 最標誌性的印花圖案。</h3>
                <p class="font5">
                    Pugrace聯名限量系列，其中5色MMKO限定紐約普普塗鴉唇膏，和4色紐約普普水感鏡光唇釉，已於2月1日在倩碧官網販售，2月10日起開始於全台限定櫃點販售。 </p>
                <p class="font5">
                    紐約普普水感鏡光唇釉，是倩碧將於4月上市的全新唇彩，此次以Pugrace包裝搶先和消費者say hi。至於4款聯名氣墊粉盒，則安排在母親節限量推出。</p>
                <p class="font5">
                    鏡面光澤的保濕水唇釉，擁有輕盈不黏膩的水潤質地，兼具防沾黏的護唇閃亮保護層，富含呵護雙唇的西瓜萃取精華成分，為雙唇極緻保濕。
                </p>
            </div>

        </div>
        <div class="text-center a-btn-group">
            <a href="<?= WEB_ROOT ?>/news-article-index.php" class="white_btn">消息總覽</a>
            <a href="" class="green_btn">下一篇</a>
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