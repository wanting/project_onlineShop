<?php require __DIR__ . '/__connect_db.php';
$pageName = 'buy-finish';
if (empty($_SESSION['member'])) {
    header('Location: a-index.php');
    exit;
}


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

    /* 狀態顯示：訂單成立 */
    .h_row {
        max-width: 1140px;
        height: 457px;
        background-color: #eeeeee;
        text-align: center;
        position: relative;
        margin: 0 auto 50px auto;
    }

    .font5 {
        font-weight: 500;
        margin: 20px auto 35px auto;
    }

    /* icon：checked */
    .h_circle {
        width: 65px;
        height: 65px;
        background-color: #465038;
        border-radius: 50%;
        display: flex;
        position: relative;
        margin: 116px auto auto auto;

    }

    .fa-check {
        color: white;
        font-size: 35px;
        position: relative;
        margin: 50% 40%;
    }


    .h_icon {
        cursor: pointer;
        margin: 20px 0;
        font-weight: 500;
    }

    /* .h_button {
        border: 20px auto;
    } */

    .h_toOrder {
        color: #CF7E60;
    }

    .h_toOrder:hover {
        color: #465038;
    }

    .d-flex {
        /* display: flex; */
        justify-content:center
    }

    .h_btnItem {
        margin:0 10px;
    }

    .h_btnItemRWD{
        display:none;
    }


    .fa-home:hover {
        color:#CF7E60;
    }


    @media screen and (max-width:576px) {
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
            margin: 20px auto auto auto;
        }

        .fa-check {
            font-size: 20px;
            margin: 50% 50%;
        }

        .font5 {
            /* font-size: 16px; */
            /* font-weight: 700; */
            margin: 15px auto 0px auto;
        }

        .font6 {
            /* font-size: 16px; */
            margin: 0 10px;
            font-weight: 500;
        }

        .h_btnItem {
            display: none;
        }

        .h_btnItemRWD {
            display:block;
        }
        
    }

    /* --------------top-------------------- */
    /* .top {
        position: fixed;
        bottom: 30px;
        right: 30px;
    }

    .top>img {
        height: 50px;
        width: 50px;
    } */

</style>

<h1>購物車</h1>
<div class="h_step">
    <picture>
        <source class="h_cartStep" media="(min-width: 576px)" srcset="../img/cartStep3.svg" />
        <img class="h_cartStep" src="../img/cartStep3_1x.svg" alt="">
    </picture>
</div>
<div class="h_row">
    <div class="col alert-box">
        <div class="alert" role="alert">
            <div class="h_circle">
                <a class="h_button" href="" role="button">
                    <i class="fas fa-check"></i>
                </a>
            </div>
            <p class="font5">
                謝謝您！您的訂單已經成立！<br>
                訂單編號：<?= $_SESSION['order_sid'] ?>
            </p>

            <div class="h_btnItemRWD">
                <a class="h_icon font6 h_toOrder" role="button" href="member-orderlist.php">前往我的訂單詳情
                    <i class="fas fa-angle-right green"></i>
                </a>
                <br>
                <!-- <a href="a-index.php"></a> -->
                <a class="h_icon font6 h_goHome" role="button" href="a-index.php">
                    <i class="fas fa-home h_goHome"> 回首頁</i>
                </a>
            </div>

            <div class="d-flex">
                <div class="h_btnItem">
                    <a class="h_icon green_btn" role="button" href="member-orderlist.php">前往我的訂單詳情</a>
                </div>
                <div class="h_btnItem">
                    <a class="h_icon yellow_btn" role="button" href="a-index.php">回首頁</a>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php unset($_SESSION['cart']); ?>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->