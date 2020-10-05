<?php
require __DIR__ . '/__connect_db.php';
$pageName = 'onlineshop-detail';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 1;
$sql = "SELECT * FROM `products` WHERE `sid`= $sid";
$row = $pdo->query($sql)->fetch();



$sql_c = "SELECT * FROM `products` WHERE `sid`";
$cate = $pdo->query($sql_c)->fetchAll();


?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    /* ---------------------- */



    .b-product .b-mainpic li {
        height: 460px;
        width: 460px;
        background: #e8e2d4;

        /* overflow: hidden; */

    }

    .b-mainpic .b-picture {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #e8e2d4;

    }


    .b-product ul li {
        border: 2px solid transparent;
        height: 96px;
        width: 96px;
        margin: 10px;
        background: #e8e2d4;

    }

    .b-product ul li.b-active {
        border: 4px solid #465038;
    }

    .b-product ul li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #e8e2d4;

    }



    .b-fa-heart {
        color: #465038;
        position: absolute;
        font-size: 1rem;
        background-color: #eeeeee;
        padding: 15px;
        border-radius: 50px;
        margin-left: 20px;
        margin-top: 5px;
    }


    .b-fa-heart:hover {
        background-color: #465038;
        color: #e8e2d4;

    }

    .b-h3-d {
        /* word-break: break-all */
    }

    .b-productName .b-productName-li h3 {
        margin: 0;
        padding: 10px 0;
        max-width: 450px;
        word-break: break-all;

    }

    .b-productName ul .b-item-d1 {
        margin: 16px 0;
    }


    .b-item-d {
        display: flex;
        /* font-size: 20px; */
        align-items: center;
        /* margin: 10px 0; */
    }

    .b-flower {
        height: 40px;
        width: 40px;
        border-radius: 50px;
        background: #e8e2d4;
        overflow: hidden;
        margin: 0 10px;

    }

    .b-flower .b-flower-p {
        width: 100px;
        height: 100%;
        object-fit: cover;


    }


    .b-price-d {
        /* font-size: 24px;
        font-weight: bold; */
        display: flex;
        align-items: center;
        margin-left: 25px;
    }


    .b-buttom-q {
        border: 1px solid;
        width: 40px;
        height: 40px;
        color: #eeeeee;
        transition: color .25s;
        position: relative;
        border-radius: 50%;
        margin: 0 28px;
        transition: .3s;


    }

    .b-add::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 18px;
        margin-left: -8.3px;
        margin-top: -2px;
        border-top: 3px solid;
        color: #465038;
        border-radius: 10px;
        transition: .3s;
    }

    .b-add::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        height: 18px;
        margin-left: -0.3px;
        margin-top: -9px;
        border-left: 3px solid;
        color: #465038;
        border-radius: 10px;
        transition: .3s;

    }


    .b-less::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 18px;
        margin-left: -9.5px;
        margin-top: -2px;
        border-top: 3px solid;
        color: #465038;
        border-radius: 10px;
        transition: .3s;

    }

    .b-less:hover {
        background: #465038;

    }

    .b-less:hover.b-less::before {
        color: #ffffff;
    }

    .b-add:hover {
        background: #465038;

    }

    .b-add:hover.b-add::after {
        color: #ffffff;
    }

    .b-add:hover.b-add::before {
        color: #ffffff;
    }


    .b-quantity {
        display: flex;
        align-items: center;
        /* font-size: 21px; */
    }

    .b-lquan {
        display: flex;
        align-items: center;
        width: 150px;
        margin-left: 10px;
        /* color: #cf7e60;
        font-size: 16px; */
    }

    .b-addcar:focus {
        outline: none;
    }


    .b-line {
        height: 2px;
        /* border:solid 1px #ffffff; */
        background-color: #e8e2d4;
        margin: 45px 0;
    }

    .b-productDetail {
        line-height: 30px;
        letter-spacing: 0.96px;
    }

    .b-linedot {
        border-top: 3px dashed #465038;
        /* height: 1px; */
        /* padding: 10px; */
        margin: 80px 0;
        /* overflow:hidden */


    }

    .b-introduction {
        text-align: center;
    }

    .b-introduction .font3 {
        margin-bottom: 30px;
    }

    .b-introduction p {
        line-height: 40px;
        letter-spacing: 3px;
    }


    .b-h2-introduction {
        margin: 55px 0;
        padding-top: 50px;
        text-align: center;
    }

    .b-introduction-li {
        width: 600px;
        height: 600px;
        background: #e8e2d4;
        margin: 90px auto;


    }

    .b-introduction-li .b-introduction-img {
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .b-text {
        /* align-items:center */
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


    @media screen and (max-width:576px) {
        .b-menu-n {
            display: none;
        }

        .b-product {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .b-product .b-mainpic li {
            height: 225px;
            width: 225px;
        }

        .b-product ul li {
            height: 50px;
            width: 50px;
            margin: 2px;
        }

        .b-productName {
            /* margin: 0 auto; */
        }

        .b-productName .b-productName-li h3 {
            max-width: 280px;
            text-align: center;
            padding-left: 50px;
        }

        .b-fa-heart {
            padding: 10px;
        }

        .b-roductNameW {
            padding-left: 60px;
        }

        .b-addcarM {
            margin: 0 auto;
        }

        .b-addcar {
            width: 300px;

        }

        .b-buy {
            display: none;
        }

        .b-line {
            width: 296px;
            margin: 18px auto;
        }

        .b-productDetail {
            text-align: center;
            width: 297px;
            margin: 0 auto;
        }

        .b-linedot {
            width: 296px;
            margin: 18px auto;
        }

        .b-introduction li {
            width: 250px;
            height: 250px;
        }

        .b-heart {
            font-size: 16px;
            padding: 0 2px;


        }

        .b-heart-2 i {
            display: block;
            margin-bottom: 10px;
        }

        .b-heart-1 i {
            display: none;
        }

        .b-234 {
            width: 234px;
        }

        .b-card {
            width: 285px;
            height: 285px;
        }

        .b-wrapper {
            max-width: 315px;
            /* margin: 0 auto; */
            /* margin-bottom: 380px; */

        }

        .b-arrow-b-btn-g {
            padding-left: 0;
            margin: 0 -25px;
            margin-top: -350px;
        }

    }
</style>


<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<?php include __DIR__ . '/nav2_html.php' ?>


<div class="container">
    <!-- <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 green breadcrumb-item active" aria-current="page">Online Shop</li>
        </ol>
    </nav> -->
    <!-- <div>麵包屑</div> -->
    <div class="y-search d-flex  justify-content-center">
        <p class="font5">搜索關鍵詞：西瓜[ 共 0 件商品 ]</p>
    </div>
</div>
<div class="y-bgcolor" style="height:650px; background-color: rgba(224, 184, 114, 0.2);">
    <div class="container">
        <!-- 你可能也會喜歡 -->

        <div class="b-wrapper">
            <h2 class="b-h2-introduction font2">- 你可能也會喜歡 -</h2>
            <div class="b-slideWrapper overflow-hidden position-relative">

                <ul id="b-slideImages" class="list-unstyled b-slideImages d-flex position-absolute">
                    <?php
                    foreach ($cate as $r) :
                        if (in_array($r['cate_sid'], [6, 7, 8])) :
                            if ($r['sid'] != $sid) :
                    ?>
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
</div>




<?php include __DIR__ . '/__scripts.php' ?>
<script>
    $(".b-product ul li").click(function() {

        // $(this).css("border","4px solid yellow")
        // .siblings().css("border","4px solid transparent")
        //.siblings()其他的


        $(this).addClass("b-active")
            .siblings().removeClass("b-active")

        let picture = $(this).find("img").attr("src")
        // console.log(picture)
        $("#b-picture").attr("src", picture)

    })
</script>

<script>
    // $(".b-fa-heart-d").on("click", function() {
    //     $(".b-like-d").toggleClass("appear")


    // })

    // ------------------愛心----------------

    $(".b-fa-heart").click(function() {

        // $(this).addClass('fa-heart');
        // $(this).removeClass('fa-heart-o');


        // $(this).addClass('fa-heart-o');
        // $(this).removeClass('fa-heart');

        if ($(this).hasClass('fa-heart')) {
            $(this).addClass('fa-heart-o');
            $(this).removeClass('fa-heart');
            console.log('yes');
        } else {
            $(this).addClass('fa-heart');
            $(this).removeClass('fa-heart-o');
            console.log('no');
        }
    });

    //登入才能收藏商品

    $(".b-fa-heart").click(function() {
        var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;
        if (!login_success) {
            location.href = 'login.php';
        }
    });
</script>

<script>
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
</script>

<script>
    // 讀入金額，計算
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    function prepareCartTable() {
        const $p_items = $('.p-item');

        if (!$p_items.length && $('#total-price').length) {
            // location.href = location.href;
            location.reload();
            return;
        }
        let total = 0;
        // if ($p_items.length == 0) {
        //     location.href="product-list.php";
        // } else {
        $p_items.each(function() {
            const sid = $(this).attr('data-sid');
            const price = $(this).attr('data-price');
            const quantity = $(this).attr('data-quantity');

            $(this).find('.price').text(' $' + dallorCommas(price));
            $(this).find('.qty').val(quantity);
            $(this).find('.sub-total').text('$ ' + dallorCommas(quantity * price));
            total += quantity * price;
            $('#total-price').text('$ ' + dallorCommas(total));
        })
    }
    // }
    prepareCartTable();

    // 加入購物車按鈕
    const addcar_btn = $('.b-addcar'); //抓到按鈕
    addcar_btn.click(function() {
        const b_item = $(this).closest('.b-item') //closest()往外層找到class: b-item
        const sid = b_item.attr('data-sid'); //得到data-sid的值  (產品編號)
        const qty = b_item.find('select').val() //find()往內層找到select  (購買數量)
        const sendObj = {
            action: 'add',
            sid,
            quantity: qty
        }
        $.get('handle-cart.php', sendObj, function(data) {
            console.log(data);
            setCartCount(data); //呼叫_scripts.php裡的function
        }, 'json');
        // navbar的快速檢視
    });

    // 加入收藏按鈕
    const addToFavorites_btn = $('.addToFavorites'); //抓到按鈕
    addToFavorites_btn.click(function() {
        const b_item = $(this).closest('.b-item') //closest()往外層找到class: b-item
        const sid = b_item.attr('data-sid'); //得到data-sid的值  (產品編號)
        const qty = b_item.find('select').val() //find()往內層找到select  (購買數量)
        const sendObj = {
            action: 'add',
            sid,
            quantity: qty
        }
        $.get('wishlist-api.php', sendObj, function(data) {
            console.log(data);
        }, 'json');
    });
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>