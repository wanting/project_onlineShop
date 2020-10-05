<?php require __DIR__ . '/__connect_db.php';
$pageName = 'onlineshop-index';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 1;
// $sql = "SELECT * FROM `products` ORDER BY RAND()";
$sql = "SELECT * FROM `products` ORDER BY `sid`";

$rows = $pdo->query($sql)->fetchAll();

if (!empty($_SESSION['member']['sid'])) {
    $w_sql = "SELECT sid FROM `wishlist` WHERE member_sid=? AND products_id=?";
    $w_stmt = $pdo->prepare($w_sql);
    $w_stmt->execute([
        $_SESSION['member']['sid'],
        $sid
    ]);

    $wishAdded = $w_stmt->rowCount();
}

/*
$qs = []; // query string
$perPage = 3;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate_id = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$search = isset($_GET['search']) ? $_GET['search'] : '';

$where = ' WHERE 1 ';
if ($cate_id) {
    $where .= " AND `parent_sid`=$cate_id ";
    //$a = $a+$b  =>  $a += $b   =>  $a .=$b  (PHP 文字字串相加用點 .)
    //AND 是 SQL語法
    // category_sid 資料庫分類名稱
    $qs['cate'] = $cate_id;
}

// if ($search) {
//     //SQL搜尋語法 %$search%
//     $search2 = $pdo->quote("%$search%");  // avoid SQL injection
//     $where .= " AND (`author` LIKE $search2 OR `bookname` LIKE $search2 ) ";
// }

$row = [];
$totalPages = 0;

$t_sql = "SELECT COUNT(1) FROM `products` $where ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

if ($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);
    if ($page < 1) {
        header('Location: onlineshop-index.php');
        exit;
    }
    if ($page > $totalPages) {
        header('Location: onlineshop-index.php?page=' . $totalPages);
        exit;
    }
    $sql = sprintf("SELECT * FROM `products` %s LIMIT %s, %s", $where, ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}
// $sql = "SELECT * FROM `categories` WHERE parent_sid=?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$_SESSION['products']['products_id']]);
// $r=$stmt->fetch();

// --- 分類資料
$c_sql = "SELECT * FROM `categories` WHERE `parent_sid`=0";
$cates = $pdo->query($c_sql)->fetchAll();
*/
?>

<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!-- <link rel="stylesheet" href="../css/newarrival.css"> -->




<!-- body開始 -->



<?php include __DIR__ . '/__navbar.php' ?>
<?php include __DIR__ . '/nav2_html.php' ?>
<style>
    .b-slidehight {
        height: 510px;
    }

    .b-h2-introduction {
        text-align: center;
        margin: 50px;
        /* margin:108px 0 49px */
    }

    .b-wrapper-ind {
        max-width: 990px;
        margin: 0 auto;
        /* margin-bottom: 380px; */

    }

    .b-wrapper {
        display: none;
    }



    .b-slideImages {
        /* 四張圖片的寬加起來800*4 */
        /* width: 4000px; */
        /* 往左移(一張照片的寬)可以看到下一張 */
        left: 0;
        transition: .5s;
    }

    .b-slideImages-con {
        margin-bottom: 180px;
    }

    .b-card {
        width: 200px;
        height: 200px;
        margin: 0 auto;
    }

    .b-card-con {
        width: 300px;
        height: 300px;
        margin: 0 auto;
        margin: 10px;
    }

    .b-slideImages li {
        /* 讓圖片跟容器一樣寬 */
        width: 270px;
        height: 270px;
        margin: 15px;
        /* padding:  30px; */
    }

    .b-slideImages img {
        /* 呈現整張圖片 */
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .b-card .b-slidecard-body {
        display: none;
        text-align: center;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .b-slideImages-con li {
        height: 300px;
        margin: 15px;
    }

    .b-slideImages-con img {
        /* 呈現整張圖片 */
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .b-slideImages-con img:hover {
        transform: scale(1.2, 1.2);
        transition: all ease-in .8s;
    }



    .b-arrow {
        color: #465038;
    }

    .b-arrow-b-btn {

        width: 80px;

        font-size: 30px;


    }

    .b-arrow-b-btn:hover {

        cursor: pointer;
    }

    .b-arrow-b-btn-g {

        padding-left: 0;

        margin: 0 -25px;
        margin-top: -390px;


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

        background: #e8e2d4;
        border: 0;

    }


    .card .b-square {
        width: 300px;
        height: 300px;
        overflow: hidden;
    }

    .card .b-card-body {
        /* display: none; */
        text-align: center;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .b-card-text {

        padding-top: 26px;
        line-height: 24px;
        letter-spacing: 1.6px;
    }

    .b-card-title {

        /* padding-top: 15px; */
        line-height: 41px;
    }


    /* .b-fa-heart {

        bottom: 55%;
        right: 10%;
        font-size: 1rem;
    } */

    .b-fa-heart {
        color: #465038;
        position: absolute;
        bottom: 10%;
        right: 10%;
        font-size: 1.7rem;
        z-index: 1;
    }

    /* .b-like {
        display: none;
    }

    .b-like.appear {
        display: block;
    } */

    .b-linedot {
        border-top: 3px dashed #465038;

        margin: 80px 0;

    }



    .slick-track {
        height: 500px;
    }

    .slick-slide * {
        outline: none;

    }

    .slick-list li {
        padding-top: 55px;
        justify-content: center;
    }

    .slick-center {
        width: 300px !important;
        transition: .5s;
        /* outline: none; */
    }

    .slick-center .b-card {

        width: 300px;
        height: 300px;
        transition: .5s;
        /* transform: scale(1.6); */

    }

    .slick-center .b-slidecard-body {
        display: block;
        transition: .5s;
    }

    .slick-list .slick-center {
        padding-top: 0;

    }

    .slick-prev {
        left: 10px;
        top: 170px;
    }

    .slick-next {
        right: 10px;
        top: 170px;
    }

    .b-cellphone {
        display: none;
    }

    @media screen and (max-width:576px) {
        .b-slidehight {
            height: 400px;
        }

        .b-wrapper-ind {
            display: none;
        }



        .b-wrapper {
            display: block;
            max-width: 300px;
            margin: 0 auto;
            margin-bottom: 250px;
            margin-top: 48.5px;
        }

        .b-slideWrapper {
            height: 500px;
        }

        .card .b-square {
            height: 146px;
            width: 146px;
        }

        .b-card-con {
            margin-top: 20px;
            padding: 0 5px;

        }



        .b-card-con .b-figure-b1 {
            width: 146px;
            height: 146px;

        }

        .b-computer {
            display: none;
        }

        .b-cellphone {
            display: block;
        }

        .b-card-cel {
            width: 146px;
            height: 146px;
        }

        .b-g-card {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;


        }

        .b-slideImages-con li {
            margin: 13px;
        }

        .b-slideImages-con {
            margin-bottom: 30px;
        }

        .b-card-text {
            padding-top: 20px;
        }

        .b-card-title {
            padding-top: 0;
        }

        .b-fa-heart {
            font-size: 1rem;
        }
    }
</style>

<div class="container">
    <div class="b-slidehight">
        <h2 class="b-h2-introduction font2" data-aos="fade-up" data-aos-duration="2000">- New Arrivals -</h2>
        <!-- 手機板 -->
        <div class="b-wrapper" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
            <div class="b-slideWrapper overflow-hidden position-relative">

                <ul id="b-slideImages-2" class="list-unstyled b-slideImages d-flex position-absolute">
                    <?php

                    foreach ($rows as $r) :
                        if (in_array($r['cate_sid'], [6, 7, 8])) : ?>
                            <li data-sid="<?= $r['sid'] ?>">
                                <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                    <div class="card b-card">
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
        <div class="b-wrapper-ind">


            <!-- 電腦版 -->
            <!-- <div class="b-slideWrapper"> -->

            <ul id="b-slideImages" class="list-unstyled b-slideImages  b-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000">

                <?php

                foreach ($rows as $r) :
                    if (in_array($r['cate_sid'], [6, 7, 8])) : ?>
                        <li data-sid="<?= $r['sid'] ?>">

                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="card b-card">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">

                                    <div class="card-body b-slidecard-body">

                                        <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                        <h5 class="b-card-title font3">NT$ <?= $r['price'] ?></h5>

                                    </div>

                                </div>
                            </a>
                        </li>
                <?php
                    endif;
                endforeach; ?>

            </ul>
        </div>

    </div>
    <div class="b-linedot"></div>
    <h2 class="b-h2-introduction font2" data-aos="fade-up" data-aos-duration="2000">- Bags -</h2>

    <div class="b-computer" data-aos="fade-up" data-aos-duration="3000">


        <ul class="d-flex justify-content-center list-unstyled b-slideImages-con ">
            <?php
            $count = 0;
            foreach ($rows as $r) :
                if (in_array($r['cate_sid'], [6, 7, 8])) : ?>
                    <li class="b-item" data-sid="<?= $r['sid'] ?>">
                        <div class="card b-card-con">
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="b-square">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                </div>
                            </a>
                            <i class="fa <?= $wishAdded ? 'fa-heart' : 'fa-heart-o' ?>  fa-heart-o b-fa-heart addToFavorites" id="<?= $r['products_id'] ?>"></i>

                            <a href="" style="color:#465038 ;">
                                <div class="card-body b-card-body">
                                    <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                    <h5 class="b-card-title font3">NT$<?= $r['price'] ?></h5>
                                </div>
                            </a>
                        </div>
                    </li>
            <?php
                    $count++;
                    if ($count >= 3) {
                        break;
                    }
                endif;
            endforeach; ?>
        </ul>

    </div>


    <div class="b-cellphone ">
        <ul class=" list-unstyled b-slideImages-con b-g-card">
            <?php
            $count = 0;
            foreach ($rows as $r) :
                if (in_array($r['cate_sid'], [6, 7, 8])) : ?>
                    <li class="b-item" data-sid="<?= $r['sid'] ?>" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card b-card-cel">
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="b-square">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                </div>
                            </a>

                            <i class="fa fa-heart-o b-fa-heart addToFavorites" id="<?= $r['products_id'] ?>"></i>
                            <a href="" style="color:#465038 ;">
                                <div class="card-body b-card-body">
                                    <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                    <h5 class="b-card-title font3">NT$<?= $r['price'] ?></h5>
                                </div>
                            </a>

                        </div>
                    </li>
            <?php
                    $count++;
                    if ($count >= 4) {
                        break;
                    }
                endif;
            endforeach; ?>
        </ul>
    </div>




    <div class="d-flex justify-content-center pb-5"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3" class=" yellow_btn b-yellow_btn b-viewmore ">查看更多</a></div>

    <h2 class="b-h2-introduction font2" data-aos="fade-up" data-aos-duration="2000">-Clothes-</h2>

    <div class="b-computer" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000">


        <ul class="d-flex justify-content-center list-unstyled b-slideImages-con ">
            <?php
            $count = 0;
            foreach ($rows as $r) :
                if (in_array($r['cate_sid'], [9, 10, 11])) : ?>
                    <li class="b-item" data-sid="<?= $r['sid'] ?>">
                        <div class="card b-card-con">
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="b-square">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                </div>

                            </a>
                            <!-- <i class="fas fa-heart b-fa-heart b-like"></i>
                        <i class="far fa-heart b-fa-heart unlike"></i> -->
                            <i class="fa  fa-heart-o b-fa-heart addToFavorites" id="<?= $r['products_id'] ?>"></i>

                            <a href="" style="color:#465038 ;">
                                <div class="card-body b-card-body">
                                    <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                    <h5 class="b-card-title font3">NT$<?= $r['price'] ?></h5>
                                </div>
                            </a>

                        </div>
                    </li>

            <?php
                    $count++;
                    if ($count >= 3) {
                        break;
                    }
                endif;
            endforeach; ?>
        </ul>

    </div>

    <div class="b-cellphone ">
        <ul class=" list-unstyled b-slideImages-con b-g-card">
            <?php
            $count = 0;
            foreach ($rows as $r) :
                if (in_array($r['cate_sid'], [9, 10, 11])) : ?>
                    <li class="b-item" data-sid="<?= $r['sid'] ?>" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card b-card-cel">
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="b-square">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                </div>
                            </a>

                            <i class="fa fa-heart-o b-fa-heart addToFavorites" id="<?= $r['products_id'] ?>"></i>
                            <a href="" style="color:#465038 ;">
                                <div class="card-body b-card-body">
                                    <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                    <h5 class="b-card-title font3">NT$<?= $r['price'] ?></h5>
                                </div>
                            </a>

                        </div>
                    </li>
            <?php
                    $count++;
                    if ($count >= 4) {
                        break;
                    }
                endif;
            endforeach; ?>
        </ul>
    </div>
    <div class="d-flex justify-content-center pb-5">
        <a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4" class="d-flex justify-content-center yellow_btn b-viewmore">查看更多</a>
    </div>


    <h2 class="b-h2-introduction font2" data-aos="fade-up" data-aos-duration="2000">-Living -</h2>
    <div class="b-computer" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
        <ul class="d-flex justify-content-center list-unstyled b-slideImages-con ">
            <?php
            $count = 0;
            foreach ($rows as $r) :
                if (in_array($r['cate_sid'], [12, 13, 14])) : ?>
                    <li class="b-item" data-sid="<?= $r['sid'] ?>">
                        <div class="card b-card-con">
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="b-square">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                </div>

                            </a>
                            <!-- <i class="fas fa-heart b-fa-heart b-like"></i>
                        <i class="far fa-heart b-fa-heart unlike"></i> -->
                            <i class="fa  fa-heart-o b-fa-heart addToFavorites" id="<?= $r['products_id'] ?>"></i>

                            <a href="" style="color:#465038 ;">
                                <div class="card-body b-card-body">
                                    <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                    <h5 class="b-card-title font3">NT$<?= $r['price'] ?></h5>
                                </div>
                            </a>

                        </div>
                    </li>

            <?php
                    $count++;
                    if ($count >= 3) {
                        break;
                    }
                endif;
            endforeach; ?>
        </ul>
    </div>

    <div class="b-cellphone ">
        <ul class=" list-unstyled b-slideImages-con b-g-card">
            <?php
            $count = 0;
            foreach ($rows as $r) :
                if (in_array($r['cate_sid'], [12, 13, 14])) : ?>
                    <li class="b-item" data-sid="<?= $r['sid'] ?>">
                        <div class="card b-card-cel" data-aos="fade-up" data-aos-duration="1000">
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="b-square">
                                    <img src="../img/<?= $r['products_id'] ?>_0.jpg" class="card-img-top" alt="...">
                                </div>
                            </a>

                            <i class="fa fa-heart-o b-fa-heart addToFavorites" id="<?= $r['products_id'] ?>"></i>
                            <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                                <div class="card-body b-card-body">
                                    <p class="b-card-text font6"><?= $r['products_name'] ?></p>
                                    <h5 class="b-card-title font3">NT$<?= $r['price'] ?></h5>
                                </div>
                            </a>

                        </div>
                    </li>
            <?php
                    $count++;
                    if ($count >= 4) {
                        break;
                    }
                endif;
            endforeach; ?>

        </ul>
    </div>
    <div class="d-flex justify-content-center pb-5">
        <a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5" class=" yellow_btn b-viewmore">查看更多</a>
    </div>
    <div id="goTop" class="top" onclick="goTop();">
        <img src="../img/TOP.svg" />
    </div>


</div>



<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    AOS.init();

    let sildeIndex = 0;
    let sildeWitdth = $(".b-slideImages li").width() + 30;
    let sildeCount = $("#b-slideImages-2 li").length;


    $("#b-slideImages-2").css("width", sildeWitdth * sildeCount)


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

        $("#b-slideImages-2").css("left", 0 - sildeIndex * sildeWitdth)


    }
</script>


<script type="text/javascript">
    $('.b-center').slick({
        centerMode: true,
        centerPadding: '20px',
        slidesToShow: 3,
        responsive: [{
                breakpoint: 576,
                settings: {
                    // arrows: false,
                    centerMode: true,
                    centerPadding: '10px',
                    slidesToShow: 1
                }
            },
            // {
            //     breakpoint: 480,
            //     settings: {
            //         arrows: false,
            //         centerMode: true,
            //         centerPadding: '40px',
            //         slidesToShow: 1
            //     }
            // }
        ]
    });
</script>

<script>
    // $(".b-fa-heart").on("click", function () {
    //     $(".b-like").toggleClass("appear")


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

    // 加入收藏按鈕
    const addToFavorites_btn = $('.addToFavorites'); //抓到按鈕
    addToFavorites_btn.click(function() {
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
</script>

<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>