<?php require __DIR__ . '/__connect_db.php';
$pageName = 'onelineshop-index';






$cate_id = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$where = ' WHERE 1 ';
if (!empty($cate_id)) {
    $where .= " AND `cate_sid`=$cate_id ";
    //$qs['cate'] = $cate_id;
}
$t_sql = "SELECT COUNT(1) FROM `products` $where ";

$sql = "SELECT * FROM `products`  $where ORDER BY `sid`";

$rows = $pdo->query($sql)->fetchAll();

/*
$qs = []; // query string
$perPage = 3;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$search = isset($_GET['search']) ? $_GET['search'] : '';



// if ($search) {
//     //SQL搜尋語法 %$search%
//     $search2 = $pdo->quote("%$search%");  // avoid SQL injection
//     $where .= " AND (`author` LIKE $search2 OR `bookname` LIKE $search2 ) ";
// }

$row = [];
$totalPages = 0;


$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

if ($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);
    if ($page < 1) {
        header('Location: onelineshop-index.php');
        exit;
    }
    if ($page > $totalPages) {
        header('Location: onelineshop-index.php?page=' . $totalPages);
        exit;
    }
    $sql = sprintf("SELECT * FROM `products` %s LIMIT %s, %s", $where, ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}



*/
// --- 分類資料
$c_sql = "SELECT * FROM `categories` WHERE `parent_sid`=3";
$cates = $pdo->query($c_sql)->fetchAll();
?>
<?php include __DIR__ . '/__html_head.php' ?>

<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


<style>
    .b-main-nav-b1 {
        padding: 0;
    }

    .b-main-nav-b1 .b-line-b1 {
        /* border-bottom: 2px solid #465038;
        font-weight: bold; */
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
    .breadcrumb-2{
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
        margin-left: 20px;
        /* margin-right: 0px; */
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
        margin: 19px;
        transform: rotate(45deg);
        /* -webkit-transform: rotate(45deg); */
    }



    .b-phone-nav-b1 ul li ul .b-down-arrow-b1.up-arrow {
        transform: rotate(-135deg);
    }


    .b-list-b1 {
        color: #465038;
        margin: 0;
        padding: 10px 20px;
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
    }

    .b-phone-nav-b1 ul li .b-submenu1-b1.open {
        opacity: 1;
        max-height: 300px;
    }

    .b-submenu1-b1 li a {
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.5px;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .b-phone-nav-b1 ul li a {
        color: #465038;
        padding: 10px 20px;
        /* display: block撐開 */
        display: block;
    }

    /* ---------------------------------------- */




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
        padding-left: 50px;
    }


    .b-card {
        border: 0;
        margin-top: 58px;
        padding: 0 20px;



    }

    .b-card ul {
        list-style: none;
    }

    .b-card .b-figure-b1 {
        width: 300px;
        height: 300px;
        position: relative;
        background-color: #e8e2d4;



    }

    .b-card .b-figure-b1 .b-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .b-fa-heart {
        color: #465038;
        position: absolute;
        bottom: 34%;
        right: 18%;
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
        .breadcrumb-1{
            display: none;
        }
        .breadcrumb-2{
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
            margin-left: 35px;
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
            margin: 19px;
            transform: rotate(45deg);
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
            background-color: #ffffff;

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
<h1 class="b-h1">Online Shop</h1>
<div class="container b-main-nav">
    <ul class="d-flex justify-content-center  ">
        <li class="b-btn-n "><a class="b-sale" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a></li>
        <li class="b-btn-n  "><a class="text-nowrap " href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bags.php">Bags</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-clothes.php">Clothes</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-living.php">Living</a></li>
    </ul>
</div>

<nav class="b-phone-nav-n">
    <ul class="b-menu-n">
        <li id="b-drop-down">
            <ul class="d-flex justify-content-center  b-list-n bb-button" href="">

                <a class="b-all-n label-text">Bags </a> <i class="b-down-arrow-n "></i>
            </ul>

            <ul class="b-submenu1-n options">
                <li class="option"><a class="" href="<?= WEB_ROOT ?>/onlineshop-index.php">All</a>
                <li class="option"><a class="b-sale red" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a>
                </li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bags.php">Bags</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-clothes.php">Clothes</a></li>
                <li class="option"><a class="" href="<?= WEB_ROOT ?>/onlineshop-living.php">Living</a></li>
            </ul>
        </li>


    </ul>
</nav>


    <nav aria-label="breadcrumb" class="y-bread-list breadcrumb-2" >
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page">Bags</li>
    
            </ol>
        </nav>

<!-- <script>
    let button = document.querySelector(".bb-button");
    let label = document.querySelector(".label-text");
    let options = document.querySelector(".options");

    const NODES = ["BUTTON", "LABEL", "I"];

    window.addEventListener("click", (e) => {
        if (NODES.includes(e.target.nodeName)) return;
        button.classList.remove("active");
    });

    button.addEventListener("click", (e) => {
        button.classList.toggle("active");
    });

    options.addEventListener("click", (e) => {
        label.innerText = e.target.innerText;
        button.classList.add("selected");
        button.classList.remove("active");
    });
</script> -->


<div class="container ">
    <div class=" b-main-nav-b1">
        <ul class="d-flex justify-content-center b-cate">
            <!-- 電腦版分類連結 -->
            <?php foreach ($cates as $c) : ?>
                <li class="b-btn-b1 ">

                    <a type='button' class="btn b-line-b1 <?= $cate_id == $c['sid'] ? '' : 'outline-' ?>primary" role="button" href="?cate=<?= $c['sid'] ?>">
                        <?= $c['name'] ?>
                    </a></li>

            <?php endforeach; ?>
        </ul>
    </div>
    <h2 class="b-h2-b1">- Bags -</h2>
    <div class="d-flex  b-main-nav-g">
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb" class="y-bread-list breadcrumb-1">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">Bags</li>

        </ol>
    </nav>

        <!-- 手機板分類連結 -->

        <nav class=" b-phone-nav2-b1">
            <ul class="b-menu2-b1">
                <li>
                    <ul class="d-flex justify-content-center  b-list-b1" href="">

                        <a class="b-all2-b1">All </a> <i class="b-down-arrow2 "></i>
                    </ul>

                    <ul class="b-submenu2-b1">
                    <?php foreach ($cates as $c) : ?>
                        <li><a type='button' class="<?= $cate_id == $c['sid'] ? '' : 'outline-' ?>primary" role="button" href="?cate=<?= $c['sid'] ?>">
                        <?= $c['name'] ?></a>
                        </li>
                     

                        <?php endforeach; ?>

                    </ul>
                </li>


            </ul>
        </nav>


        <nav class="b-phone-nav-b1 ">
            <ul class="b-menu-b1">
                <li>
                    <ul class="d-flex justify-content-center  b-list-b1" href="">

                        <a class="b-all-b1">熱銷排行 </a> <i class="b-down-arrow-b1 "></i>
                    </ul>

                    <ul class="b-submenu1-b1">
                        <li><a class="sale" href="">價格由低到高</a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>

    </div>
   


    <div class="b-g-card list-array-4 row">
 <!-- 麵包屑 -->


        <?php

        foreach ($rows as $r) :
            if (in_array($r['cate_sid'], [6, 7, 8])) : ?>

                <div class=" card b-card col-lg-4 col-ms-6 " data-sid="<?= $r['sid'] ?>">

                    <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                        <div class="b-figure-b1">
                            <img class="b-cover-fit" src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="">

                        </div>
                    </a>
                    <i class="fa fa-heart-o b-fa-heart" id="<?= $r['products_id'] ?>"></i>
                    <a href="" style="color:#465038 ;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item b-productName font6"><?= $r['products_name'] ?><br>
                            </li>
                            <li class="list-group-item b-price font3">NT$ <?= $r['price'] ?></li>
                        </ul>
                    </a>
                </div>

        <?php


            endif;
        endforeach; ?>

    </div>


    <!-- <nav class="b-page" aria-label="">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link b-page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-chevron-circle-left b-arrow-b1"></i></a>
            </li>
            <li class="page-item"><a class="page-link b-page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link b-page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link b-page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link b-page-link" href="#"><i class="fas fa-chevron-circle-right b-arrow-b1"></i></a>
            </li>
        </ul>
    </nav> -->



</div>


<?php include __DIR__ . '/__scripts.php' ?>

<script>
    $(".b-menu-b1").on("click", function() {
        $(".b-submenu1-b1").toggleClass("open")
        $(".b-down-arrow-b1").toggleClass("up-arrow")
        //  console.log("123")
    })

    $(".b-menu2-b1").on("click", function() {
        $(".b-submenu2-b1").toggleClass("open")
        $(".b-down-arrow2").toggleClass("up-arrow2")

    })







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

/*

    //不刷頁jq
    const b_cate = $('.b-cate');
    const b_g_card = $('.b-g-card');


    //頁碼按鈕
    function cateBtnTpl(obj) {
        
        return `<?php foreach ($cates as $c) : ?>
                 <li class="b-btn-b1 ">

                    <a type='button' class="btn b-line-b1 <?= $cate_id == $c['sid'] ? '' : 'outline-' ?>primary" role="button" href="?cate=<?= $c['sid'] ?>">
                        <?= $c['name'] ?>
                    </a></li> 

            <?php endforeach; ?>`;
    }

    //抓到的資料
    function itemTpl(obj) {
        let s = obj.address.replace('/</gm', '&lt');
        s = s.replace('/>/gm', '&gt');
        //   '/>/gm', '&gt'  跳脫html
        return `
        <?php

        foreach ($rows as $r) :
            if (in_array($r['cate_sid'], [6, 7, 8])) : ?>

                <div class=" card b-card col-lg-4 col-ms-6 " data-sid="<?= $r['sid'] ?>">

                    <a href="" style="color:#465038 ;">
                        <div class="b-figure-b1">
                            <img class="b-cover-fit" src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="">

                        </div>
                    </a>
                    <i class="fa fa-heart-o b-fa-heart" id="<?= $r['products_id'] ?>"></i>
                    <a href="" style="color:#465038 ;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item b-productName font6"><?= $r['products_name'] ?><br>
                            </li>
                            <li class="list-group-item b-price font3">NT$ <?= $r['price'] ?></li>
                        </ul>
                    </a>
                </div>

        <?php


            endif;
        endforeach; ?>`

    }


    function handleHash() {
        let h = location.hash.slice(1);
        h = parseInt(h) || 1;
        info.innerHTML = h;

        $.get('ab-list2-api.php', {
            page: h
        }, function(data) {
            console.log(data);
            b_cate.empty();
            for (let s in data.pageBtns) {
                b_cate.append(pageBtnTpl({
                    i: data.pageBtns[s],
                    isActive: data.pageBtns[s] == data.page
                }))
            }
            b_g_card.empty(); //清空
            for (let s in data.rows) {
                b_g_card.append(itemTpl(data.rows[s]));
            }

        }, 'json');
        //抓到資料顯示在console
    }


    window.addEventListener('hashchange', handleHash);
    handleHash();

    //在網址列打#+隨意的數字,在input欄位輸入數字，頁面不會重新刷新
    // NaN ->  Not a Number
*/
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>