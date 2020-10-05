<?php require __DIR__ . '/__connect_db.php';
$pageName = 'onelineshop-index';


// --- 分類資料
$cate_id = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$par_c_sql = "SELECT * FROM `categories` WHERE `parent_sid`=0 ORDER BY sid";
$par_cates = $pdo->query($par_c_sql)->fetchAll();

$par_tar_c_sql = "SELECT * FROM `categories` WHERE `sid`=$cate_id ORDER BY sid";
$par_target_cate = $pdo->query($par_tar_c_sql)->fetchAll();

$init_c_sql = "SELECT * FROM `categories` WHERE `parent_sid`=$cate_id ORDER BY sid";
$cates = $pdo->query($init_c_sql)->fetchAll();

$myWishes = [];
if (!empty($_SESSION['member']['sid'])) {
    $w_sql = "SELECT products_id FROM `wishlist` WHERE member_sid=?";
    $w_stmt = $pdo->prepare($w_sql);
    $w_stmt->execute([
        $_SESSION['member']['sid'],
    ]);

    $wishAdded = $w_stmt->rowCount();
    $myWishes = array_column($w_stmt->fetchAll(), 'products_id');
}


?>
<?php include __DIR__ . '/__html_head.php' ?>

<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



<style>
    .b-main-nav-b1 {
        padding: 0;
    }

    .b-btn-b1 {

        list-style: none;
        margin: 10px;
        font-family: 'Noto Sans TC', sans-serif;
        /* font-weight: 400; */
        letter-spacing: 2.7px;
        font-size: 18px;
    }

    .b-btn-b1 a {
        text-decoration: none;
        color: #465038;
        border: 0;
        padding: 10px;

    }

    .b-h2-b1 {
        font-weight: bold;
        text-align: center;
        margin: 25px 0;
    }

    .b-phone-nav2-b1 {
        display: none;
    }

    .breadcrumb-2 {
        display: none;
    }


    /* ---------------------------------------- */
    .b-menu-b1 {
        flex-direction: column;
        margin-bottom: 0;
        /* margin: 0 36px; */
        width: 175px;

    }

    .b-menu-b1 li {
        position: relative;
    }

    .b-all-b1 {
        margin-left: 10px;
        margin-right: -30px;
        font-size: 16px;
        font-weight: 500;
        color: #465038;
        font-family: 'Noto Sans TC', sans-serif;
    }


    .b-down-arrow-b1 {
        border: solid #465038;
        border-width: 0 1px 1px 0;
        display: inline-block;
        padding: 5px;
        margin: 17px;
        transform: translateX(30px) rotate(45deg);
        transition: .5s;
        /* -webkit-transform: rotate(45deg); */
    }



    .b-phone-nav-b1 ul li ul .b-down-arrow-b1.up-arrow {
        transform: translateX(30px) rotate(-135deg);
    }


    .b-list-b1 {
        color: #465038;
        margin: 0;
        padding: 10px 0;
        border-top: solid 1px #465038;

    }

    .b-phone-nav-b1 {
        display: block;

    }

    .b-phone-nav-b1 .b-wrapper-b1 {
        display: flex;
        width: 100%;
        text-align: center;


    }

    .b-phone-nav-b1 ul {
        list-style: none;
        padding: 0;
        margin-top: 0;
        margin-bottom: 0;
    }

    .b-phone-nav-b1 ul li {
        position: relative;
        border-bottom: solid 1px #465038;

    }

    .b-submenu1-b1 {

        position: absolute;
        transition: .5s;
        /* opacity: 0; */
        /* 加hidden才能把空間隱藏 */
        overflow: hidden;
        max-height: 0;
        /* width: 100%讓寬度跟上層一樣 */
        width: 100%;
        text-align: center;
        border-radius: 0;
        /* border: solid 1px #465038; */
        z-index: 1;
        border-top: solid 1px #465038;
        background-color: #ffffff;
    }

    .b-phone-nav-b1 ul li .b-submenu1-b1.open {

        opacity: 1;
        max-height: 300px;
        background-color: #ffffffe3;
    }

    .b-submenu1-b1 li a {
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.5px;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .b-phone-nav-b1 ul li a {
        color: #465038;
        padding: 10px 0px;
        /* display: block撐開 */
        display: block;
    }

    /* ---------------------------------------- */

    .b-btn-b1 .b-line-b1 {
        border-radius: 0;
        border-bottom: 2px solid transparent;
    }

    .b-line-b1:hover {
        border-bottom: 2px solid #E0B872;
        border-radius: 0;
        transition: .5s;
    }

    .b-line-b1.active {
        border-bottom: 2px solid #E0B872;
        border-radius: 0;
    }


    /* ......................................... */

    .b-main-nav-g {
        /* padding: 70px 0 50px 0; */
        justify-content: space-between;

    }

    .b-g-card {
        /* margin: 0 auto; */
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
        margin-bottom: 100px;
        /* align-content: center; */
        /* padding-left: 50px; */
    }


    .b-card {
        border: 0;
        margin-top: 58px;
        padding: 0 20px;



    }
    .b-card a{
        margin: 0 auto;
    }

    .b-card ul {
        list-style: none;
    }

    .b-card .b-figure-b1 {
        width: 300px;
        height: 300px;
        position: relative;
        background-color: #e8e2d4;
        overflow: hidden;



    }

    .b-card .b-figure-b1 .b-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .b-card .b-figure-b1 .b-cover-fit:hover{
        transform: scale(1.2, 1.2);
        transition: all ease-in .8s;
    }

    .b-fa-heart {
        color: #465038;
        position: absolute;
        bottom: 33%;
        /* right: 18%; */
        margin-left: 270px;
        font-size: 1.7rem;
    }

    /* .b-like {
        display: none;
    }

    .b-like.appear {
        display: block;
    } */

    .b-card ul li {
        /* color: #465038; */
        /* font-family: 'Noto Sans TC', sans-serif; */
        letter-spacing: 1.6px;
        text-align: center;
        border: 0;
        /* font-size: 16px; */
    }

    .b-productName {
        padding-top: 39px;
        padding-bottom: 0;
    }

    .b-card ul .b-price {
        /* font-size: 28px;
        font-weight: 600; */
        letter-spacing: 2.8px;
        padding-top: 26px;
    }

    .b-page-link {
        color: #465038 !important;
        /* border-radius: 50%; */
        border: 0;
        font-family: 'Noto Sans TC', sans-serif;
        background-color: #ffffff !important;
        font-size: 20px;
        padding: 0 20px;

    }

    .b-page {
        margin: 0 auto;
    }

    .b-productName {
        padding-top: 20px;
        padding-bottom: 0;
    }

    .b-arrow-b1 {
        font-size: 30px;
    }



    @media screen and (max-width:576px) {
        .b-h2-b1 {
            display: none;
        }

        .breadcrumb-1 {
            display: none;
        }

        .breadcrumb-2 {
            display: block;
            margin-top: 30px;
            margin-left: 25px;
        }

        .b-main-nav-g {
            padding: 30px 0 50px 0;
            justify-content: space-around;

        }

        .b-main-nav-b1 {
            display: none;
        }

        .b-card ul li {
            letter-spacing: 0.96px;
            /* font-size: 1px; */
        }

        .b-card ul .b-price {
            padding: 5px;
            max-width: 146px;
        }

        .b-braedCrumb {
            display: none;
        }

        /* -------------------------- */
        .b-all-b1 {
            margin-left: -2px;
            margin-right: -20px;
        }

        .b-menu-b1 {
            width: 147px;
        }

        .b-menu2-b1 {
            flex-direction: column;
            margin-bottom: 0;
            /* margin: 0 36px; */
            width: 175px;

        }

        .b-menu2-b1 li {
            position: relative;
        }

        .b-all2-b1 {
            margin-left: 42px;
            /* margin-right: 0px; */
            font-size: 16px;
            font-weight: 500;
            color: #465038;
            font-family: 'Noto Sans TC', sans-serif;

        }

        .b-down-arrow2 {
            border: solid #465038;
            border-width: 0 1px 1px 0;
            display: inline-block;
            padding: 5px;
            margin: 17px;
            transform: rotate(45deg);
            transition: .5s;
            /* -webkit-transform: rotate(45deg); */
        }

        .b-phone-nav2-b1 ul li ul .b-down-arrow2.up-arrow2 {
            transform: rotate(-135deg);
        }

        .b-phone-nav2-b1 {
            display: block;
        }

        .b-phone-nav2-b1 .b-wrapper-b1 {
            display: flex;
            width: 100%;
            text-align: center;
        }

        .b-phone-nav2-b1 ul {
            list-style: none;
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .b-phone-nav2-b1 ul li {
            position: relative;
            border-bottom: solid 1px #465038;
        }

        .b-submenu2-b1 {

            position: absolute;
            transition: .5s;
            /* opacity: 0; */
            /* 加hidden才能把空間隱藏 */
            overflow: hidden;
            max-height: 0;
            /* width: 100%讓寬度跟上層一樣 */
            width: 100%;
            text-align: center;
            border-radius: 0;
            /* border: solid 1px #465038; */
            z-index: 1;
            border-top: solid 1px #465038;
            background-color: #ffffffe3;

        }

        .b-phone-nav2-b1 ul li .b-submenu2-b1.open {
            opacity: 1;
            max-height: 300px;
        }

        .b-submenu2-b1 li a {
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.5px;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .b-phone-nav2-b1 ul li a {
            color: #465038;
            padding: 10px 20px;
            /* display: block撐開 */
            display: block;
        }

        /* ...................................... */
        .b-card {
            margin-top: 20px;
            padding: 0 10px;
        }


        .b-card .b-figure-b1 {
            width: 146px;
            height: 146px;

        }

        .b-fa-heart {

            bottom: 44%;
            right: 11%;
            font-size: 1rem;
        }

        .b-g-card {
            /* margin-bottom: 50px; */
            padding-left: 0;
            margin: 0 auto 50px auto;
            max-width: 330px;
        }

        .b-card {
            max-width: 165px;
        }

        .b-productName {
            height: 55px;
            max-width: 146px;
            /* padding-top: 20px; */
            padding-bottom: 0;
        }

    }
</style>


<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>

<div class="b-hight"></div>
<h1 class="b-h1 green font1"><a href="<?= WEB_ROOT ?>/onlineshop-index.php">Online Shop</a></h1>
<div class="container b-main-nav">
    <!-- 父類別 -->
    <ul class="d-flex justify-content-center" id="parent_Cate_List">
        <?php foreach ($par_cates as $p_c) : ?>
            <li class="b-btn-n <?= $p_c['sid'] == $cate_id ? 'active' : '' ?>">
                <a class="<?= $p_c['sid'] == '1' ? 'b-sale' : '' ?>" data-type="<?= $p_c['sid'] ?>" href="#"> <?= $p_c['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<nav class="b-phone-nav-n">
    <ul class="b-menu-n">
        <li id="b-drop-down">
            <ul class="d-flex justify-content-center  b-list-n bb-button" href="">
                <a class="b-all-n label-text" id="parent_Cate_Now"></a>
                <i class="b-down-arrow-n "></i>
            </ul>
            <ul class="b-submenu1-n options" id="parent_Cate_List_Mobile">
                <?php foreach ($par_cates as $p_c) : ?>
                    <li class="option">
                        <a class="<?= $p_c['sid'] == '1' ? 'b-sale' : '' ?>" data-type="<?= $p_c['sid'] ?>" href="#"> <?= $p_c['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>


    </ul>
</nav>

<div class="d-flex justify-content-center">
    <nav aria-label="breadcrumb" class="y-bread-list breadcrumb-2">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
            <li class="font5 breadcrumb-item active breadCrumbLast" aria-current="page"></li>
    
        </ol>
    </nav>
</div>

<div class="container ">
    <!-- 子類別 sub Cate List -->
    <div class="b-main-nav-b1">
        <ul class="d-flex justify-content-center b-cate" id="sub_Cate_List"></ul>
    </div>
    <!-- parent target title -->
    <h2 class="b-h2-b1 green" id="parent_target_title"></h2>
    <div class="d-flex  b-main-nav-g">
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb" class="y-bread-list breadcrumb-1">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
                <li class="font5 breadcrumb-item active breadCrumbLast" aria-current="page"></li>

            </ol>
        </nav>

        <!-- 手機板分類連結 -->
        <nav class=" b-phone-nav2-b1">
            <ul class="b-menu2-b1">
                <li>
                    <ul class="d-flex justify-content-center  b-list-b1" href="">
                        <a class="b-all2-b1" id="sub_Cate_Now"></a> <i class="b-down-arrow2 "></i>
                    </ul>
                    <ul class="b-submenu2-b1" id="sub_Cate_List_Mobile"></ul>
                </li>
            </ul>
        </nav>


        <nav class="b-phone-nav-b1 ">
            <ul class="b-menu-b1">
                <li>
                    <ul class="d-flex justify-content-center  b-list-b1" href="">
                        <a class="b-all-b1" id="sort_Now">熱銷排行 </a> <i class="b-down-arrow-b1 "></i>
                    </ul>
                    <ul class="b-submenu1-b1">
                        <li><a class="sale" href="#" data-sort="hot-sort">熱銷排行</a></li>
                        <li><a class="sale" href="#" data-sort="price-sort">價格由低到高</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <div class="b-g-card list-array-4 row"></div>

</div>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>


<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    AOS.init();

    // PHP變數轉到JS
    let target_cate = <?= json_encode($cate_id, JSON_UNESCAPED_UNICODE); ?>;
    const par_target_cate = <?= json_encode($par_target_cate, JSON_UNESCAPED_UNICODE); ?>;
    const cates = <?= json_encode($cates, JSON_UNESCAPED_UNICODE); ?>;
    const myWishes = <?= json_encode($myWishes) ?>;
    // JQ物件
    const $sub_Cate_List = $('#sub_Cate_List');
    const $sub_Cate_List_Mobile = $('#sub_Cate_List_Mobile');
    const $parent_target_title = $('#parent_target_title');
    const $parent_Cate_Now = $('#parent_Cate_Now');
    const $sub_Cate_Now = $('#sub_Cate_Now');
    const $sort_Now = $('#sort_Now');
    const $b_g_card = $('.b-g-card');
    const $breadCrumbLast = $('.breadCrumbLast');
    // 全域變數
    let targetSid = 'All';

    // 頁面初始
    $(document).ready(function() {
        // 初始化頁面
        var targetName = par_target_cate[0].name;
        // 長出子項目清單 & 標題
        renderCateList(target_cate, targetName);
        // 長出商品清單
        renderProdList(target_cate, "");
        // 綁定點擊事件
        clickEventInit();
    });

    function clickEventInit() {
        $(".b-btn-n").on("click", function() {
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
        });

        $(".b-menu-b1").on("click", function() {
            $(".b-submenu1-b1").toggleClass("open");
            $(".b-down-arrow-b1").toggleClass("up-arrow");
        });

        $(".b-menu2-b1").on("click", function() {
            $(".b-submenu2-b1").toggleClass("open");
            $(".b-down-arrow2").toggleClass("up-arrow2");
        });

        // 父類別清單 a 不置頂 (網頁)
        $(".b-btn-n a").on("click", function(e) {
            e.preventDefault();
        });

        // 父類別清單 a 不置頂 (mobile)
        $(".option a").on("click", function(e) {
            e.preventDefault();
        });

        // 排序下拉選單 a 不置頂
        $(".b-submenu1-b1 li a").on("click", function(e) {
            e.preventDefault();
        });

        // 父類別清單 點擊事件綁定 (網頁)
        $("#parent_Cate_List li").on("click", function() {
            var targetList = ['3', '4', '5'];
            var parent_cate_id = $(this).find('a').attr('data-type');
            target_cate = parent_cate_id;
            targetSid = 'All';
            var targetName = $(this).find('a').text();
            if (targetList.indexOf(parent_cate_id) != -1) {
                // Bags / Clothes / Living - Rerender
                renderCateList(parent_cate_id, targetName);
                renderProdList(parent_cate_id, "");
            } else if (parent_cate_id == '1') {
                // Sale 
                window.location.href = '/proj_pugrace/proj/onlineshop-sale.php';
            } else if (parent_cate_id == '2') {
                // New Arrivals
                window.location.href = '/proj_pugrace/proj/onlineshop-newarrivals.php';
            }
        });

        // 父類別清單 點擊事件綁定 (mobile)
        $("#parent_Cate_List_Mobile li").on("click", function() {
            var targetList = ['3', '4', '5'];
            var parent_cate_id = $(this).find('a').attr('data-type');
            target_cate = parent_cate_id;
            targetSid = 'All';
            var targetName = $(this).find('a').text();
            if (targetList.indexOf(parent_cate_id) != -1) {
                // Bags / Clothes / Living - Rerender
                renderCateList(parent_cate_id, targetName);
                renderProdList(parent_cate_id, "");
            } else if (parent_cate_id == '1') {
                // Sale 
                window.location.href = '/proj_pugrace/proj/onlineshop-sale.php';
            } else if (parent_cate_id == '2') {
                // New Arrivals
                window.location.href = '/proj_pugrace/proj/onlineshop-newarrivals.php';
            }
        });

        // 排序下拉選單 點擊事件綁定
        $(".b-submenu1-b1 li").on("click", function() {
            $sort_Now.text($(this).find('a').text());
            var sortType = $(this).find('a').attr('data-sort');
            if (sortType == 'price-sort') {
                renderProdList(target_cate, "", '1');
            } else {
                renderProdList(target_cate, "");
            }
        });

    }

    // 子類別清單 點擊事件綁定 (After Ajax Callback)
    function clickEventSubCate() {

        $(".b-line-b1").click(function() {
            // 處理class
            $(".b-line-b1").removeClass("active");
            $(this).addClass("active");
            // 取得要顯示的子項目
            targetSid = $(this).parent().attr('data-sid');
            if (targetSid == 'All') {
                $b_g_card.find('div.b-card').show();
            } else {
                $b_g_card.find('div.b-card').hide();
                $b_g_card.find('.cateSid_' + targetSid).show();
            }
        });

        $("a.b-line-b1").on("click", function(e) {
            e.preventDefault();
        });

        $(".b-submenu2-b1 li").on("click", function() {
            // 更新選單目前文字
            $sub_Cate_Now.text($(this).find('a').text());
            targetSid = $(this).attr('data-sid');
            if (targetSid == 'All') {
                $b_g_card.find('div.b-card').show();
            } else {
                $b_g_card.find('div.b-card').hide();
                $b_g_card.find('.cateSid_' + targetSid).show();
            }
        });

        $(".b-submenu2-b1 li a").on("click", function(e) {
            e.preventDefault();
        });

    }

    // 商品清單 點擊事件綁定 (After Ajax Callback)
    function clickEventProd() {
        // 加入收藏按鈕
        const addToFavorites_btn = $('.addToFavorites'); //抓到按鈕
        addToFavorites_btn.click(function() {
            if ($(this).hasClass('fa-heart-o')) {
                $(this).removeClass('fa-heart-o');
                $(this).addClass('fa-heart');
            } else {
                $(this).removeClass('fa-heart');
                $(this).addClass('fa-heart-o');
            }
            const b_item = $(this).closest('.b-item') //closest()往外層找到class: b-item
            const sid = b_item.attr('data-sid'); //得到data-sid的值  (產品編號)
            // const qty = b_item.find('select').val() //find()往內層找到select  (購買數量)
            const sendObj = {
                action: 'add',
                sid,
            }
            $.get('wishlist-api.php', sendObj, function(data) {
                console.log(data);
            }, 'json');
        });
    }

    //抓到的資料 Prod
    function itemTpl(obj) {
        const isLiked = myWishes.indexOf(obj.sid)<0 ? 'fa-heart-o' : '';
        return `
        <div class=" card b-card b-item col-lg-4 col-ms-6 cateSid_${obj.cate_sid} " data-sid="${obj.sid}" >
            <a href="onlineshop-detail.php?sid=${obj.sid}" style="color:#465038 ;">
                <div class="b-figure-b1">
                    <img class="b-cover-fit" src="../img/${obj.products_id}_0.jpg" class="card-img-top" alt="">
                </div>
            </a>
            <i class="fa fa-heart ${isLiked} b-fa-heart addToFavorites" id="${obj.products_id}" onclick="sendWish(event)"></i>
            <a href="onlineshop-detail.php?sid=${obj.sid}" style="color:#465038 ;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item b-productName font6">${obj.products_name}<br></li>
                    <li class="list-group-item b-price font3">NT$ ${obj.price}</li>
                </ul>
            </a>
        </div>
        `
    }

    //sub cate List (網頁)
    function subCateListTpl(obj, active) {
        if (active == undefined) {
            active = '';
        }
        return `
        <li class="b-btn-b1" data-sid="${obj.sid}">
            <a type='button' class="btn b-line-b1 primary ${active}" role="button" href="#">
                ${obj.name}
            </a>
        </li>
        `
    }

    //sub cate List (mobile)
    function subCateListMobileTpl(obj) {
        return `
        <li data-sid="${obj.sid}">
            <a type='button' class="outline-primary" role="button" href="#">${obj.name}</a>
        </li>
        `
    }


    // 顯示子類別清單 及 頁面Title & 麵包屑
    function renderCateList(parent_cate_id, targetName) {
        // 中間標題 & 麵包屑 (網頁)
        $parent_target_title.text(targetName);
        $breadCrumbLast.text(targetName);
        // 下拉選單Target (mobile)
        $parent_Cate_Now.text(targetName);

        var param = {
            active: "getSubCateList",
            parent_cate: parent_cate_id,
        }
        // Ajax getSubCateList
        $.get('onlineshop_bcl_api.php', param,
            function(data) {
                console.log(data);

                // render sub cate list (網頁)
                $sub_Cate_List.empty();
                $sub_Cate_List.append(subCateListTpl({
                    name: 'All',
                    sid: 'All'
                }, 'active'));
                for (let s in data.list) {
                    $sub_Cate_List.append(subCateListTpl(data.list[s]));
                }
                // render sub cate list (mobile)
                $sub_Cate_Now.text('All');
                $sub_Cate_List_Mobile.empty();
                $sub_Cate_List_Mobile.append(subCateListMobileTpl({
                    name: 'All',
                    sid: 'All'
                }));
                for (let s in data.list) {
                    $sub_Cate_List_Mobile.append(subCateListMobileTpl(data.list[s]));
                }

                // 點擊事件綁定
                clickEventSubCate();

            }, 'json');
    }

    // 顯示下方商品清單
    function renderProdList(parent_cate_id, sub_cate_id, orderType) {
        if (!orderType) { orderType = ''; }
        var param = {
            active: "getProdList",
            parent_cate: parent_cate_id,
            cate: sub_cate_id,
            order: orderType,
        }
        $.get('onlineshop_bcl_api.php', param,
            function(data) {
                console.log(data);

                // render prod data
                $b_g_card.empty(); //清空
                for (let s in data.rows) {
                    $b_g_card.append(itemTpl(data.rows[s]));
                }
                // 點擊事件綁定
                clickEventProd();

                // 子類別顯示選項
                if (targetSid == 'All') {
                    $b_g_card.find('div.b-card').show();
                } else {
                    $b_g_card.find('div.b-card').hide();
                    $b_g_card.find('.cateSid_' + targetSid).show();
                }
                // 排序選單回覆熱銷排行
                if (orderType.length == 0) {
                    $sort_Now.text('熱銷排行');
                }
            }, 'json');
    }

    function sendWish(event){
        const t = $(event.target); // heart
        const sid = t.closest('.b-item').attr('data-sid');
        const o = t.hasClass('fa-heart-o');

        console.log(sid, o);
        //如果是空心就add，如果是實心就remove
    }
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>