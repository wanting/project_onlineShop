<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
$sql = "SELECT * FROM `products` ORDER BY `sid`";

$rows = $pdo->query($sql)->fetchAll();
?>

<?php include __DIR__ . '/__html_head.php' ?>

<link rel="stylesheet" href="../css/newarrival.css">
<link rel="stylesheet" href="../css/nav2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



<?php include __DIR__ . '/__navbar.php' ?>
<div class="b-hight"></div>
<h1 class="b-h1 green font1"><a href="<?= WEB_ROOT ?>/onlineshop-index.php">Online Shop</a></h1>
<div class="container b-main-nav">
    <ul class="d-flex justify-content-center  ">
        <li class="b-btn-n "><a class="b-sale" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a></li>
        <li class="b-btn-n  active"><a class="text-nowrap " href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
    </ul>
</div>
<nav class="b-phone-nav-n">
    <ul class="b-menu-n">
        <li id="b-drop-down">
            <ul class="d-flex justify-content-center  b-list-n bb-button" href="">

                <a class="b-all-n label-text">New Arrivals </a> <i class="b-down-arrow-n "></i>
            </ul>

            <ul class="b-submenu1-n options">
                <li class="option"><a class="b-sale red" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a>
                </li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
                <li class="option"><a class="" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
            </ul>
        </li>


    </ul>
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

    <h2 class="b-h2 green" data-aos="fade-up" data-aos-duration="2000">- New Arrivals -</h2>

    <!-- slider----------------- -->

    <div class="b-wrapper" data-aos="fade-up" data-aos-duration="3000">
        <div class="b-slideWrapper overflow-hidden position-relative">

            <ul id="b-slideImages" class="list-unstyled b-slideImages d-flex position-absolute">
                <li><img src="../img/newArrival01.jpg" alt="">
                </li>
                <li><img src="../img/newArrival02.jpg" alt="">
                </li>
                <li><img src="../img/d_living01_0.jpg" alt="">
                <li><img src="../img/cover3.jpg" alt="">
                </li>
                </li>
                <li><img src="../img/a_living01_3.jpg" alt="">
                </li>
                <!-- <li><img src="images/we-bare-bears.jpg" alt="">
                    </li> -->

            </ul>



        </div>

        <ul id="b-slideDots" class="list-unstyled b-slideDots position-absolute d-flex justify-content-center">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <!-- <li></li> -->


        </ul>
        <ul class="d-flex justify-content-between b-arrow-b-btn-g">
            <a id="goNext" class="b-arrow-b-btn b-arrow-b-btn-l d-flex justify-content-center align-items-center ">
                <i class="fas fa-chevron-circle-left b-arrow"></i>
            </a>

            <a id="goPrev" class="b-arrow-b-btn b-arrow-b-btn-r d-flex justify-content-center align-items-center ">
                <i class="fas fa-chevron-circle-right  b-arrow"></i>

            </a>

        </ul>


    </div>



    <!-- slider-------------------------- -->


    <div class=" b-main-nav-g ">
        <!-- <p class="braedCrumb">麵包屑</p> -->
        <nav aria-label="breadcrumb" class="y-bread-list breadcrumb-1">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page">New Arrivals</li>
            </ol>
        </nav>
        <div>

        </div>
        <nav aria-label="breadcrumb " class="y-bread-list breadcrumb-2">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page"><a href="/proj_pugrace/proj/onlineshop-index.php">Online Shop</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page">New Arrivals</li>
            </ol>
        </nav>
        <nav class="b-phone-nav ">
            <ul class="b-menu">
                <li>
                    <ul class="d-flex justify-content-center  b-list" href="">

                        <a class="b-all">熱銷排行 </a> <i class="b-down-arrow "></i>
                    </ul>

                    <ul class="b-submenu1">
                        <li><a class="sale" href="">價格由低到高</a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>
     

    </div>


    <div class="b-g-card list-array-4 ">
        <?php

        foreach ($rows as $r) :
            if (in_array($r['cate_sid'], [9, 11, 13])) : ?>
                <div class=" card b-card col-lg-4 col-ms-6" data-sid="<?= $r['sid'] ?>" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">

                    <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                        <figure class="b-figure">
                            <img class="cover-fit card-img-top" src="../img/<?= $r['products_id'] ?>_0.jpg" alt="">

                        </figure>
                    </a>
                    <i class="fa  fa-heart-o b-fa-heart" id="<?= $r['products_id'] ?>"></i>

                    <a href="onlineshop-detail.php?sid=<?= $r['sid'] ?>" style="color:#465038 ;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item b-productName font6"><?= $r['products_name'] ?></li>
                            <li class="list-group-item price font3">NT$ <?= $r['price'] ?></li>
                        </ul>
                    </a>
                </div>

        <?php

            endif;
        endforeach; ?>

    </div>



    <!-- <nav class="page" aria-label="">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i
                            class="fas fa-chevron-circle-left b-arrow"></i></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-circle-right b-arrow"></i></a>
                </li>
            </ul>
        </nav> -->



</div>




<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__html_foot.php' ?>




<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    AOS.init();

    let sildeIndex = 0;
    let sildeWitdth = $(".b-slideWrapper ").width();
    let sildeCount = $("#b-slideImages li").length;
    $("#b-slideImages").css("width", sildeWitdth * sildeCount)

    $("#b-slideDots li").mouseenter(function() {

        sildeIndex = $(this).index();
        console.log(sildeIndex)
        $("#b-slideImages").css("left", 0 - sildeIndex * sildeWitdth)

        goSlider()

    })

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

        $("#b-slideDots li").eq(sildeIndex).addClass("active")
            .siblings().removeClass("active")

    }

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
</script>