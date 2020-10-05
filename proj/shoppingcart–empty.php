<?php require __DIR__ . '/__connect_db.php';
$pageName = '購物車';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>

<style>
    * {
        color: #465038;
    }

    h1 {
        margin: 50px;
        text-align: center;
    }

    /* 流程示意 */
    .h_step {
        text-align: center;
        position: relative;

    }

    .h_cartStep {
        width: 680px;
        margin: 0 auto 80px auto;
    }

    @media screen and (max-width: 576px) {
        h1 {
            margin: 25px;
            text-align: center;
            font-size: 24px;
        }

        .h_step {
            text-align: center;
            position: relative;
        }

        .h_cartStep {
            width: 240px;
            margin: 0 auto 50px auto;
        }
    }

    /* 狀態顯示：購物車是空的 */
    .h_row {
        max-width: 1140px;
        height: 457px;
        background-color: #eeeeee;
        text-align: center;
        position: relative;
        margin: 0 auto 50px auto;
    }

    .font5 {
        /* font-weight: 500; */
        margin: 20px auto 35px auto;
    }

    /* icon：cart */
    .h_circle {
        width: 65px;
        height: 65px;
        background-color: #465038;
        border-radius: 50%;
        display: flex;
        position: relative;
        margin: 116px auto auto auto;

    }

    .fa-shopping-cart {
        color: white;
        font-size: 35px;
        position: relative;
        margin: 35% 30%;
    }

    /* .h_icon { */
        /*四字icon固定寬度:88+60*2*/
        /* width: 208px;
        cursor: pointer;
        background-color: #e0b872;
        padding: 10px 60px;
        margin: 0 auto;
        border-radius: 50px;
        font-size: 20px; 
    } */

    @media screen and (max-width: 576px) {
        .alert {
            padding: 0;
        }

        .h_row {
            max-width: 302px;
            height: 200px;
            background-color: #eeeeee;
            text-align: center;
            position: relative;
            margin: 0 auto 50px auto;
        }

        .h_circle {
            width: 40px;
            height: 40px;
            margin: 30px auto auto auto;
        }

        .fa-shopping-cart {
            font-size: 20px;
            margin: 40% 35%;
        }

        .font5 {
            font-size: 14px;
            margin: 5px auto 20px auto;
        }

        .h_icon{
            font-size: 14px;
            margin-top: 20px;
            padding:5px 30px;
            /* padding-top: 20px; */
            /* margin-top: 20px; */
            /* width: 100%; */
        }
    }
</style>

<h1>購物車</h1>
<div class="h_step">
    <picture>
        <source class="h_cartStep" media="(min-width: 576px)" srcset="../img/cartStep0.svg" />
        <img class="h_cartStep" src="../img/cartStep0_1x.svg" alt="">
    </picture>
</div>
<div class="h_row">
    <div class="col alert-box">
        <div class="alert" role="alert">
            <div class="h_circle">
                <a class="h_button" href="" role="button">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
            <h5 class="font5">您的購物車是空的</h5>
            <div class="">
                <a class="h_icon yellow_btn" role="button" href="onlineshop-index.php">繼續購物</a>
                <!-- <a class="h_icon yellow_btn" role="button">繼續購物</a> -->
            </div>
        </div>
    </div>
</div>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->