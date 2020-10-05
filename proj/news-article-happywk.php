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
            <img class="" src="../img/news-bn_01.jpg" alt="">
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
                <h1 class="font1">2020.5.23-24/5.30-31 Happy Weekend <br>
                    指定商品單一優惠500元</h1>
                <h6 class="font6">POSTED ON 2020-05-22 BY PUGRACE</h6>
            </div>
            <div class="a-content">
                <h3 class="font3">5月底連續的雨天是不是心情都跟著煩躁了起來？</h3>
                <p class="font5">
                    Pugrace會員不要煩惱，HAPPY WEEKEND 指定商品 500元 均一價優惠，每天都有不同商品優惠，讓你開心手滑。
                </p>
                <h3 class="font3">5.20-6.30 雨季限定加價購</h3>
                <p class="font5">
                    消費不限金額可用990元加價購小彎竹柄輕便折傘 一支。
                </p>
                <h3 class="font3">5.23-24／5.30-31 Happy Weekend 500元閃購價</h3>
                <p class="font5">
                    Pugrace會員可享有500元優惠價購買以下商品<br>
                    ○ 5/23 鋪棉坐墊(圓形/方形) 鋪棉便當袋(紅黑系列/uulin系列)<br>
                    ○ 5/24 寬幅布料 (寬幅平織薄棉布 / 500g帆布 / 8N帆布/ 棉麻布)<br>
                    ○ 5/30 防水裝備袋<br>
                    ○ 5/31 大人小書包 (藍綠系列 / 珍奶系列)<br>
                    優惠均為當日一日限定 ! 需加入會員才享有優惠價，可當場填資料成為會員。
                </p>
                <h3 class="font3">5/25-5/31 犀牛盾買一送一</h3>
                <p class="font5">
                    購買犀牛盾限定型號手機殼贈限定型號背板<br>
                    限定 : X、XS、XR、XS MAX<br>
                    指定型號範圍內，可以任選手機殼和背板的型號，如：買iPhone X的手機殼，可贈iPhone XS的背板。
                </p>
            </div>
        </div>
        <div class="text-center a-btn-group">
            <a href="<?= WEB_ROOT ?>/news-article-index.php" class="white_btn">消息總覽</a>
            <a href="<?= WEB_ROOT ?>/news-article-triple.php" class="green_btn">下一篇</a>
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