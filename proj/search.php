<?php
require __DIR__ . '/__connect_db.php';
$pageName = 'onlineshop-detail';
$cate_id = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$search = isset($_GET['search']) ? $_GET['search'] : '';

$where = ' WHERE 1 ';
/*if ($cate_id) {
    $where .= " AND `cate_sid`=$cate_id ";
    //$a = $a+$b  =>  $a += $b   =>  $a .=$b  (PHP 文字字串相加用點 .)
    //AND 是 SQL語法
    // category_sid 資料庫分類名稱
    $qs['cate'] = $cate_id;
}*/
if ($search) {
    //SQL搜尋語法 %$search%
    $search2 = $pdo->quote("%$search%");  // avoid SQL injection
    $where .= " AND (`intro_information` LIKE $search2 OR `products_name` LIKE $search2 ) ";
}


$sql = "SELECT * FROM `products`  $where ORDER BY `sid`";

$rows = $pdo->query($sql)->fetchAll();

$t_sql = "SELECT COUNT(1) FROM `products` $where ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// $sql_c = "SELECT * FROM `products` WHERE `sid`";
// $cate = $pdo->query($sql_c)->fetchAll();




?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    /* ---------------------- */
    input {
        color: #465038;
        /* background-color: transparent !important ; */
    }

    input[type=text]:focus {
        background-color: transparent !important;
    }

    .y-container {
        max-width: 1140px;
        width: 100%;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    .y-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .y-cover-fit:hover {
        transform: scale(1.2, 1.2);
        transition: all ease-in .8s;
    }

    .f-input-w2 {
        width: 100px;
        background-color: transparent;
        border: none;
        /* border-bottom: 1.5px solid #465038; */
        color: #465038;
        box-sizing: border-box;
        position: relative;
    }

    input[type="search"]:focus {
        border-color: none;
        box-shadow: none;
        outline: 0;
    }


    .f-input-w2:focus+.f-underline-w {
        transform: scale(1);
    }

    .font5 {
        margin: 0 auto;
    }

    @media screen and (max-width:576px) {
        .y-container {
            max-width: 500px;
        }
    }

    @media screen and (max-width:375px) {
        .y-container {
            max-width: 200px;
        }
    }

    /* --------------------------------- */
    .search_btn {
        background-color: #ffffff;
        border: 0;
        padding: 0;
    }

    .b-product .b-mainpic li {
        height: 460px;
        width: 460px;
        background: #e8e2d4;

        /* overflow: hidden; */

    }

    .b-figure {
        width: 300px;
        height: 300px;
        margin: 0 auto;
        overflow: hidden;
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
        bottom: 26%;
        /* right: 18%; */
        margin-left: 280px;
        font-size: 1.7rem;
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

    .b-mar {
        /* margin: 0 auto; */
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
        margin-bottom: 200px;
        /* align-content: center; */
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

    .form-inline {
        margin-left: 60px;
    }

    @media screen and (max-width:576px) {
        .b-mar {
            margin: 0 auto 200px auto;
            padding-left: 0;
            max-width: 360px;
            flex-wrap: wrap;
            display: flex;

        }

        .b-fa-heart {
            /* margin-left: 100px;
            margin-top: 100px; */
            bottom: 35%;
            /* right: 11%; */
            margin-left: 110px;
            font-size: 1rem;
        }
    }

    @media screen and (max-width:576px) {
        .form-inline {
            margin-left: 40px;
        }

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

        .b-productName .b-productName-li h3 {
            max-width: 280px;
            text-align: center;
            padding-left: 50px;
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

    /* .row {
        margin-bottom: 50px;
    } */

    .y-search {
        margin: 50px 0;

    }

    .y-product {
        margin-top: 58px;
        margin-bottom: 50px;
        /* border: 1px solid #eeee; */
    }

    .y-product ul li {
        list-style: none;
        text-align: center;
        margin: 5px;
    }

    .y-product>img {
        width: 300px;
        height: 300px;
        margin: 0;
    }

    .y-productName {
        /* margin-top: 40px; */
        height: 55px;
        max-width: 250px;
        /* padding-top: 20px; */
        /* padding-bottom: 0; */
        padding: 0;
        margin: 25px auto 0 auto;
    }

    .y-productName li {
        padding: 10px 0;
    }

    @media screen and (max-width:576px) {
        .b-figure {
            width: 146px;
            height: 146px;
        }

        .y-container {
            max-width: 500px;
            /* margin: 0 20px; */
        }

        .y-search {
            margin: 20px 0;
        }

        .y-search>p {
            letter-spacing: 5px;
            margin-left: 22%;
        }

        .y-product {
            max-width: 180px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .y-product>img {
            width: 146px;
            height: 146px;
            margin: 0 auto;
        }

        .y-productName {
            margin: 0 auto;
            padding: 0;
        }

        .f-input-w2 {
            display: block;
        }
    }

    @media screen and (max-width:375px) {
        .y-search>p {
            letter-spacing: 5px;
            margin-left: 75px;
        }

        .y-product>img {
            width: 146px;
            height: 146px;
            margin: 0 auto;
        }
    }
</style>


<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<?php include __DIR__ . '/nav2_html.php' ?>


<div class="y-container">

    <!-- <div class="d-flex justify-content-center">
        <div class="f-searchbar-w d-flex column">
            <input class="f-input-w font4" type="search" placeholder="Search" name="search" aria-label="Search">
            <span class="f-underline-w"></span>
        </div>
        <li class="nav-items nav-links">
            <button class="search_btn btn btn-outline-success" type="submit">
                <img src="../img/icon_search.svg" alt="">
            </button>
        </li>
    </div> -->


    <div class="d-flex justify-content-center">
        <div class="">
            <div class="col d-flex justify-content-end">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 f-input-w2  font4" type="search" placeholder="Search" name="search" id="search" aria-label="Search" style="width:100px ;border-radius:0;" value="<?= htmlentities($search) ?>">
                    <button class="btn  my-2 my-sm-0" id="b-search" type="submit">
                        <figure style="width: 20px;">
                            <img src="../img/icon_search.svg" alt="">
                        </figure>
                    </button>
                </form>
            </div>
        </div>
    </div>


    <?php /*if ($totalRows < 1) : ?>
                        <div class="alert alert-info" role="alert">
                            查詢不到資料
                        </div>
                    <?php endif; */ ?>



    <div class="y-search d-flex  justify-content-start" id="b-result">

        <!-- <p class="font5">搜索關鍵詞：[ 共   件商品 ]</p> -->

    </div>
    <div class="row d-flex b-mar">
        <?php foreach ($rows as $r) : ?>
            <div class="col-lg-4 col-6 y-product" data-sid="<?= $r['sid'] ?>">
                <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                    <figure class="b-figure">
                        <img class="y-cover-fit" src="../img/<?= $r['products_id'] ?>_0.jpg" alt="">
                    </figure>
                </a>
                <i class="fa fa-heart-o b-fa-heart" id="<?= $r['products_id'] ?>"></i>
                <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                    <ul class="y-productName">
                        <li class="font6"><?= $r['products_name'] ?></li>
                        <li class="font3">NT$ <?= $r['price'] ?></li>
                    </ul>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>



<?php include __DIR__ . '/__scripts.php' ?>
<script>
    const search_name = <?= json_encode($search, JSON_UNESCAPED_UNICODE); ?>;

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

    // $(".b-fa-heart-d").on("click", function() {
    //     $(".b-like-d").toggleClass("appear")


    // })

    // ------------------愛心----------------

    $(".b-fa-heart").click(function() {

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



    //搜尋顯示
    $(document).ready(function() {
        if (search_name.length == 0) {
            let result = `<p class="font5"style="margin: 0 auto;letter-spacing: 3px;">所有商品</p>
            `;
            $("#b-result").append(result);
        } else {
            let search_total = $('.y-product').length
            let result = `
        <p class="font5" style="letter-spacing: 3px;">搜索關鍵詞：${search_name}  [ 共 ${search_total}  件商品 ]</p>
            `;
            $("#b-result").append(result);
        }
    });
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>