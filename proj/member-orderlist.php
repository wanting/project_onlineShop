<?php require __DIR__ . '/__connect_db.php';
$pageName = 'member-orderlist';

if (!empty($_SESSION['member']['sid'])) {

    $uid = intval($_SESSION['member']['sid']);
    $sql = "SELECT * FROM `orderlist` WHERE member_id=$uid ORDER BY `sid` DESC"; //選擇表單


    $rows = $pdo->query($sql)->fetchAll();
    if (!empty($rows)) {
        $order_sids = array_column($rows, 'sid');


        // print_r(  $order_sids);
        // exit;


        $d_sql = "SELECT * FROM `order_details` d JOIN `products` p ON d.products_id=p.sid WHERE d.order_number IN (" . implode(',', $order_sids) . ")";
        //implode類似矩陣中的JOIN
        // echo $d_sql;
        $details = $pdo->query($d_sql)->fetchAll();
    }

    foreach ($rows as $k => $v) {
        //$rows的key和value
        foreach ($details as $k2 => $v2) {
            //$details的key和value
            //如果$details的order_number==$rows的sid
            if ($v2['order_number'] == $v['sid']) {
                $rows[$k]['products'][] = $v2;
            }
        }
    }
    // print_r($rows);
    // exit;
}
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/newarrival.css">
<link rel="stylesheet" href="../css/all.css">
<style>
    body {
        font-family: 'Noto Sans TC', sans-serif;
    }

    .container {
        max-width: 1140px;
        padding: 0;
    }

    .f-hight {
        height: 100px;
    }

    .font1 {
        text-align: center;
        margin: 50px 0;
        letter-spacing: 3.6px;
    }

    .f-title {
        background-color: #eeeeee;
        text-align: left;
        margin: 100px auto 0;
        padding: 12px 24px;
        letter-spacing: 3px;
    }

    /*-------麵包屑-----------------------------------*/
    .y-bread-list {
        /* padding: 0 0 50px 0; */
        /* display: flex; */
        /* 文字水平基準 */
        align-items: baseline;
        list-style: none;
        justify-content: center;
    }

    .breadcrumb {
        margin: 0 0 50px 0;
    }

    .y-bread-list>li {
        margin-right: 5px;
    }

    .b-main-nav-g {
        justify-content: space-between;

    }


    .f-orderlist thead tr {
        border-bottom: 2px solid #e0b872;
    }

    .f-table-title {
        border-bottom: 2px solid #e0b872;
    }

    .f-table-head {
        border-bottom: 2px solid #e0b872;
    }

    .table thead th {
        border-top: none;
        border-bottom: 2px solid #e0b872;
    }


    .table th,
    .table td {
        padding: 16px 24px;
        letter-spacing: 3px;
        /* border-bottom: 2px solid #e0b872; */
    }

    .table td img {
        /* padding: 50.5px 24px; */
        width: 168px;
        height: 168px;
        padding: 0;
        margin: 34.5px 0;
    }

    /* --訂單明細_個資-- */
    .f-order-profile {
        border: 2px solid #eeeeee;
    }

    .f-order-profile .column-width {
        width: 80%;
    }

    .line {
        height: 2px;
        width: 1000px;
        background: #e0b872;
        margin: 5px auto 16px;
    }

    /* ---------------collapse-------------------- */
    .f-collapse {
        background-color: #e0b872;
        border-radius: 10px;
        max-width: 1140px;
        height: 150px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        box-shadow: 0 1rem 1rem rgba(0, 0, 0, .05);
    }

    .f-collapse {
        letter-spacing: 1.6px;
    }

    .drop-menu {
        width: 80%;
    }

    .y-look {
        cursor: pointer;
    }

    .y-down-arrow {
        border: solid #465038;
        border-width: 0 1px 1px 0;
        display: inline-block;
        padding: 5px;
        margin: 5px;
        transform: rotate(45deg);
    }

    .y-down-arrow.rotate {
        transform: rotate(-135deg);
    }

    .f-orderlistRwd {
        display: none;
    }

    .f-collapseRwd {
        display: none;
    }

    .rwd {
        display: none;
    }

    .f-hight-rwd {
        height: 100px;
    }


    @media screen and (max-width:576px) {


        .f-hight {
            display: none;
        }

        .b-phone-nav {
            width: 70%;
            margin: 0 auto;
            justify-content: center;
        }


        /*-------麵包屑----------------------*/
        .y-bread-list {
            padding: 0;
            display: flex;
        }


        .f-orderlist {
            display: none;
        }

        .f-collapse {
            display: none;
        }

        .table th,
        .table td {
            padding: 16px;
            border: none
        }

        .f-title {
            margin: 25px auto 0;
            padding: 14px 36px;
            width: 302px;
            text-align: center;
        }


        .f-orderlistRwd {
            display: table;
            padding: 0 36px;
            min-width: 100%;
        }

        .f-info-Rwd {
            display: table;
        }

        .line {
            height: 2px;
            width: 260px;
            background: #e0b872;
            margin: 5px auto 16px;
        }


        .f-orderlistRwd td img {
            width: 76px;
            height: 76px;
            margin: 0;
        }

        .f-order-profile {
            width: 302px;
            margin: 0 auto;
            /* border-bottom: 2px solid #e0b872; */
        }

        .f-order-profile .column-width {
            width: 80%;
        }


        .f-collapseRwd {
            display: flex;
            background-color: #e0b872;
            margin: 0 auto;
            height: 110px;
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 1rem 1rem rgba(0, 0, 0, .05);
        }

        .f-collapseRwd .drop-menu {
            width: 100%;
        }

        .rwd {
            display: flex;
            flex-direction: column;
        }

    }
</style>

<script>
    var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (!login_success) {
        location.href = 'login.php';
    };
    //判斷是否登入,未登入就跳去登入頁面,登入就載入此頁
</script>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>

<div class="container">
    <h1 class="font1">訂單記錄查詢</h1>

    <div class="d-flex  b-main-nav-g">
        <nav aria-label="breadcrumb" class="y-bread-list">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= WEB_ROOT ?>/member-index.php">會員中心</a></li>
                <li class="breadcrumb-item active" aria-current="page">訂單記錄查詢</li>
            </ol>
        </nav>
        <nav class="b-phone-nav ">
            <ul class="b-menu">
                <li>
                    <ul class="d-flex justify-content-center  b-list" href="">

                        <a class="b-all">所有訂單 </a> <i class="b-down-arrow "></i>
                    </ul>

                    <ul class="b-submenu1">
                        <li><a href="">我的商品</a></li>
                        <li><a href="">我的課程</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>

<div class="container">
    <h5 class="f-title font3">訂單紀錄</h5>
    <!-- </div> -->
    <?php foreach ($rows as $r) : ?>
        <!-- <div class="f-orderlist">
            <table class="table col-12 f-table-title">
                <thead>
                    <tr>
                        <th class="align-middle font4" scope="co1" colspan="2">商品資料</th>
                        <th class="align-middle font4" scope="col">訂單編號</th>
                        <th class="align-middl font4" scope="col">數量</th>
                        <th class="align-middle font4" scope="col">小計</th>
                    </tr>
                </thead>
            </table>
        </div> -->

        <!----------------- 隱藏訂單細節- ------------------------>


        <div class="collapse " id="f-info">
            <div class="f-orderlist">
                <table class="table col-12 f-table-head">
                    <thead>
                        <tr>
                            <th class="align-middle font4" scope="co1">商品資料</th>
                            <th class="align-middle font4" scope="co1">商品資料</th>
                            <th class="align-middle font4" scope="col">訂單編號</th>
                            <th class="align-middl font4" scope="col">數量</th>
                            <th class="align-middle font4" scope="col">小計</th>
                        </tr>
                    </thead>
                    <!-- </table> -->
                    <!-- <table class="table col-12"> -->
                    <tbody>
                        <?php foreach ($r['products'] as $p) :  ?>
                            <tr>
                                <td class="align-middle">
                                    <img src="../img/<?= $p['products_id'] ?>_0.jpg" alt="">
                                </td>
                                <td class="align-middle font5"><?= $p['products_name'] ?>
                                </td>
                                <td class="align-middle font5"><?= $r['sid'] ?></td>
                                <td class="quantity align-middle">
                                    <?= $p['quantity'] ?>
                                </td>
                                <td class="align-middle font5">NT$<?= $p['price'] * $p['quantity'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody>
                        <div class="f-wrap flex">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="font5">
                                    <span>小計</span></br>
                                    <span>運費</span></br>
                                    <span>合計</span></br>
                                </td>
                                <td class="text-right font5">
                                    <span id="total-60">NT$<?= $r['total'] - 60 ?></span></br>
                                    <span>NT$60</span></br>
                                    <span id="total" data-id="<?= $r['total'] ?>">NT$<?= $r['total'] ?></span></br>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <section>
                <div class="container">
                    <h5 class="f-title font2">收件人</h5>
                </div>
                <table class="table f-order-profile">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">姓名</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_name'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">手機</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_phone'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">電子信箱</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_email'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">捐贈發票</div>
                                    <div class="column-width font4 col-9"><?= $r['donate_invoice'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">付款方式</div>
                                    <div class="column-width font4 col-9"><?= $r['payment'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">收件地址</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_address'] ?></div>
                                    <div class="line"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
        <!-- ------------下拉選單---------------- -->

        <div class="f-collapse  my-4 flex">
            <div class="drop-menu flex row align-items-center">
                <div class="col-3">
                    <img class="member" src="../img/history-order.png" alt="">
                </div>
                <div class="col-6">
                    <div class="f-num font5">訂單編號 : <?= $r['sid'] ?></div>
                    <div class="f-time font5">訂單日期 : <?= $r['create_at'] ?></div>
                </div>
                <div class="col-3 y-look">
                    <div class="font5 text-center">查看此筆訂單<i class="y-down-arrow"></i>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<div class="f-hight"></div>
<!-- ------------訂單-1-Rwd---------------- -->
<div class="rwd">
    <?php foreach ($rows as $r) : ?>
        <div class="f-orderlistRwd">
            <table class="table col-12">
                <thead>

                    <tr>
                        <th class="font4" colspan="2">訂單編號：<?= $r['sid'] ?></th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- ------------隱藏訂單細節-1-Rwd------- -->
        <div class="collapse f-info-Rwd ">
            <div class="f-orderlistRwd">
                <table class="table col-12">
                    <tbody>
                        <?php foreach ($r['products'] as $p) :  ?>
                            <tr>
                                <td class="align-middle">
                                    <img src="../img/<?= $p['products_id'] ?>_0.jpg" alt="">
                                </td>
                                <td class="align-middle font4">
                                    <span><?= $p['products_name'] ?><br></span>
                                    <span>數量： <?= $p['quantity'] ?></span>
                                    <span>&emsp;NT$ <?= $p['price'] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle font5">小計</td>
                                <td class="text-right font5">NT$<?= $r['total'] - 60 ?></td>
                            </tr>
                            <tr>
                                <td class="align-middle font5">運費</td>
                                <td class="text-right font5">NT$60</td>
                            </tr>
                            <tr>
                                <td class="align-middle font5">合計</td>
                                <td class="text-right font5">NT$<?= $r['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <section>
                <div class="container">
                    <div class="f-title font2">收件人</div>
                </div>
                <table class="table f-order-profile mb-2">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">姓名</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_name'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">手機</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_phone'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">電子信箱</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_email'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">捐贈發票</div>
                                    <div class="column-width font4 col-9"><?= $r['donate_invoice'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">付款方式</div>
                                    <div class="column-width font4 col-9"><?= $r['payment'] ?></div>
                                    <div class="line"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="font4 col-3 text-right">收件地址</div>
                                    <div class="column-width font4 col-9"><?= $r['payee_address'] ?></div>
                                    <div class="line"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>



        <!-- ------------下拉選單-1-Rwd----------- -->

        <div class="f-collapseRwd justify-content-center my-2 ">
            <div class="drop-menu flex row align-items-center">
                <div class="col-3">
                    <img class="member" src="../img/history-order.png" alt="" style="width: 60px;">
                </div>
                <div class="col-9">
                    <div class="f-num font4">訂單編號 : <?= $r['sid'] ?></div>
                    <div class="f-time font4">訂單日期 : <?= $r['create_at'] ?></div>
                    <div class="font4">查看此筆訂單&emsp;<i class="y-down-arrow"></i></div>
                </div>
            </div>
        </div>
        <div class="f-collapse  my-2 flex">
            <div class="drop-menu flex row align-items-center">
                <div class="col-3">
                    <img class="member" src="../img/history-order.png" alt="">
                </div>
                <div class="col-9">
                    <div class="f-num font5">訂單編號 : <?= $r['sid'] ?></div>
                    <div class="f-time font5">訂單日期 : <?= $r['create_at'] ?></div>
                    <div class="font5 text-center">查看此筆訂單<i class="y-down-arrow"></i>
                    </div>
                    <!-- <div class="col-3"> -->
                    <!-- <div class="font5 text-center">查看此筆訂單<i class="b-down-arrow"></i> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="f-hight-rwd"></div>
</div>
</div>






<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>


<?php include __DIR__ . '/__scripts.php' ?>
<script>
    function toggleMenu(number) {
        // var detail = document.getElementById("f-info-" + number);
        // var $detail = $(detail);
        // if (detail.style.display == "none") {
        //     // menu.style.display = "block";
        //     $detail.slideDown();
        //     $(".b-down-arrow").css('transform', 'rotate(225deg)');

        // } else {
        //     // menu.style.display = "none";
        //     $detail.slideUp();
        //     $(".b-down-arrow").css('transform', 'rotate(45deg)');
        // }
    }

    $(".drop-menu").click(function() {
        $(this).parent().prev().slideToggle();

    })

    $(".y-down-arrow").click(function() {
        $(this).toggleClass("rotate");

    });
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->