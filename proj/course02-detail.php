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
    .y-container {
        max-width: 1140px;
        width: 100%;
        margin: 0 auto;
        padding: 0;
        justify-content: center;
        align-items: center;
    }
    .y-hight-2 {
        height: 50px;
    }


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


    /* .b-fa-heart:hover .b-like-d {
        z-index: 1;
    } */

    /* .b-like-d {
        display: none;
    } */

    /* .b-like-d.appear {
        display: block;
        color: #e8e2d4;
        background-color: #465038;
    } */

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

    /* .b-buy {
        border-radius: 30px;
        background-color: #cf7e60;
        border: 0;
        padding: 10px 54px;
        font-size: 18px;

    } */

    /* .b-addcar {
        border-radius: 30px;
        background-color: #ffffff;
        border: solid 1.5px #465038;
        padding: 10px 54px;
        font-size: 18px;
    } */

    /* .b-addcar:hover {
        background-color: #465038;
        color: #ffffff;
    } */

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
        padding: 50px 0;
        /* margin: 50px 0; */
    }

    .b-introduction .font3 {
        margin-bottom: 30px;
    }

    .b-introduction p {
        line-height: 40px;
        letter-spacing: 3px;
    }


    .b-h2-introduction {
        margin: 55px;
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

    .b-eval {
        max-width: 855px;
        margin: 0 auto;
    }

    .b-evalLine {
        border-bottom: solid 1.5px #eeeeee;
        padding: 29px 0;
        align-items: center;
        margin: 0;
    }

    .b-evalLine-1 {
        border-top: solid 1.5px #eeeeee;

    }

    .b-cuspic {
        width: 80px;
        height: 80px;
        border-radius: 50px;
        background-color: #e8e2d4;
        overflow: hidden;
        margin-right: 24px;

    }

    .b-cuspic img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .b-heart-2 i {
        display: none;
    }

    .b-name-d {
        /* color: #cf7e60; */
        padding-bottom: 15px;
    }

    .b-text-d {
        line-height: 24px;
        max-width: 512px;
        /* font-size: 16px; */
    }

    .b-heart {
        color: #cf7e60;
        padding: 0 5px;
        font-size: 24px;
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

<div class="y-hight-2"></div>
<h1 class="font1 d-flex justify-content-center animated fadeInDown m-0">Course</h1>
<div class="y-hight-2"></div>
<div class="y-container">
    <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="/proj_pugrace/proj/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">Course</li>
        </ol>
    </nav>
    <!-- <div>麵包屑</div> -->

    <div class=" row b-text b-item" data-sid="<?= $row['sid'] ?>" data-price="<?= $row['price'] ?>" data-quantity="<?= $row['quantity'] ?>">
        <aside class="b-product text-center col-lg-6">
            <ul class="list-unstyled b-mainpic">
                <li><img id="b-picture" src="../img/course-detail.jpg" alt=""></li>
            </ul>
            <ul class="list-unstyled d-flex ">
                <li class="b-active"><img src="../img/course-detail.jpg" alt=""></li>
                <li><img src="../img/course-detail01.jpg" alt=""></li>
                <li><img src="../img/course-card01.jpg" alt=""></li>
            </ul>
        </aside>


        <article class="b-productName col-lg-6">
            <ul class="list-unstyled d-flex">
                <li class="b-productName-li">
                    <h3 class=" b-h3-d font3">經典印花課－感光印花進階製版</h3>
                </li>
                <li>
                    <i class="fa  fa-heart-o b-fa-heart addToFavorites" id="<?= $row['products_id'] ?>"></i>
                </li>
            </ul>

            <ul class="list-unstyled ">
                <div class="b-roductNameW">
                    <li class="d-flex  py-2 b-item-d1">
                        <div class="b-item-d py-2 font4">NT $1000</div>
                        <div class="b-price-d pl-4 font3 price"></div>
                    </li>
                    <li class="d-flex  py-2 b-item-d1">
                        <div class="b-item-d font5">預約人數</div>
                        <ul class="list-unstyled d-flex pl-2">
                            <select class="form-control qty quantity">
                            </select>
                        </ul>
                    </li>
                    <li class="d-flex  py-2 b-item-d1">
                        <div class="b-item-d font5">預約時段</div>
                        <ul class="list-unstyled d-flex pl-2">
                            <select class="form-control qty quantity">
                            </select>
                        </ul>
                    </li>
                </div>

                <li class="d-flex">
                    <ul class="list-unstyled d-flex  py-2 b-addcarM">
                        <li> <a type="button" class="  red_btn mx-2 b-buy " role="button" href="">立即報名 </a></li>
                    </ul>
                </li>
            </ul>
            <div class="b-line"></div>



            <section class="b-productDetail font6">
                <ul class="list-unstyled">【課程時間】
                    <li> 3.5小時</li>
                </ul>
                <ul class="list-unstyled">【上課地點】
                    <li> 106 台北市大安區復興南路一段390號2樓
                        Pugrace 工作室-B301 </li>
                </ul>
                <ul class="list-unstyled">【適合對象】
                    <li> 10歲以上，有手作經驗者</li>
                </ul>
                <ul class="list-unstyled">【課程成品】
                    <li> 印花拖特包一個、客製圖案絹印版一個</li>
                </ul>
            </section>
        </article>
    </div>

</div>

<section style="background-color: rgba(224, 184, 114, 0.2);">
    <div class="container b-introduction">
        <h2 class="b-h2-introduction font2">- 課程內容 -</h2>
        <!-- <h4 class="font3">「荷包蛋花朵」系列，春日新色登場！</h4> -->
        <sapn class="font5" style="line-height: 40px;">
            絹印是一種將印紋透空如孔的印刷方式，<br>

            此次課程將利用感光製版的技法製作，<br>

            親手設計並刷上屬於自己獨一無二的印花，體驗絹印的樂趣。<br>

            絹版亦可重複印製，是知識充實且高完成度的印花實作課。<br>
        </sapn>
        <div class="b-linedot"></div>
        <h2 class="b-h2-introduction font2">- 報名需知 -</h2>
        <span class="font5" style="line-height: 40px;">
            1.本課程最低1人開課，最多8人，6人以上請致電預約包班（包場費用另計)。<br>
            2.報名後請備註希望的體驗時段，將為您優先預留檔期。<br>
            3.購票成功後，會收到電子票券，不另寄送實體票券。活動當日請至報到處出示電子票券後入場。<br>
            4.因教室空間有限，且兼顧教學品質，活動恕無法攜伴參與。<br>
            5. 票券使用規範與退換說明<br>

            －活動7日前取消報名，可退回全額學費；7日內恕不接受退費申請，可轉讓他人上課。<br>
            －請於預約時段內出席，預約時段外恕不提供體驗內容。若因個人因素超出時段內未出席，視同放棄票券服務，無法申請退費。<br>
            －如需更改時間或上課地點，請先退票再重新購票。<br>
            －本票券限手作體驗使用，不可轉作品牌其他消費使用。<br>
            －如因天災等不可抗力事件或主辦單位因素停課，Pugrace將主動聯繫延期或退款。<br>
        </span>
        <div class="b-linedot"></div>
        <h2 class="b-h2-introduction font2">- 開課時間 -</h2>
        <span class="font5" style="line-height: 40px;">
            梯次13：已額滿 <br>
            109/8/14(六) 下午14:30~16:00 <br>
            109/8/15(日) 下午14:30~16:00 <br>

            梯次14：開始報名中 <br>
            109/10/3(六) 下午14:30~16:00 <br>
            109/10/4(日) 下午14:30~16:00 <br>
        </span>
    </div>
</section>






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