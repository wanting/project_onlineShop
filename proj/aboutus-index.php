<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>

<style>
    .y-hight-1 {
        height: 100px;
    }

    .y-hight-2 {
        height: 50px;
    }

    .y-hight-3 {
        height: 25px;
    }

    .font5 {
        text-align: center;
        line-height: 50px;
    }

    .y-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .y-container {
        max-width: 1140px;
        width: 100%;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    /* 頁面滑動特效 */
    /* *,
    html,
    body {
        margin: 0px;
        padding: 0px;
        scroll-behavior: smooth;
    } */

    @media screen and (max-width:576px) {
        .y-container {
            max-width: 500px;
        }

        .y-hight-1 {
            height: 50px;
        }

    }

    @media screen and (max-width:414px) {
        .y-container {
            max-width: 300px;
        }
    }

    /* ----------------menu 特效------------------------------- */

    .y-menu {
        padding: 0;
        display: flex;

    }

    .y-main-nav {
        margin-top: 25px;
    }

    .y-main-nav ul {
        margin: 0;
        padding: 0;
        text-align: right;
        display: inline-block;
        vertical-align: middle;
    }

    .y-main-nav ul li a {
        color: #465038;
        text-decoration: none;
        display: inline-block;
        padding: 10px;
        transition: color 0.5s;
    }

    .y-main-nav ul li .y-underline {
        height: 3px;
        margin: 2px 0;
        background-color: transparent;
        width: 0%;
        transition: width 0.2s, background-color 0.5s;
        margin: 0 auto;
    }

    .y-main-nav ul li.y-active-link .y-underline {
        width: 100%;
        background-color: #e0b872;
    }

    .y-main-nav ul li:hover .y-underline {
        background-color: #e0b872;
        width: 100%;
    }

    .y-main-nav ul li:hover a {}

    .y-main-nav ul li:active a {
        transition: 0.1s;
        /* color: rgba(255, 255, 255, 0.76); */
    }

    .y-main-nav ul li:active .y-underline {
        transition: none;
        background-color: rgba(255, 255, 255, 0.76);
    }

    /* ----------手機下拉選單----------------------------- */

    .y-btn {
        list-style: none;
        margin: 10px;
        font-family: 'Noto Sans TC', sans-serif;
        /* font-weight: 400; */
        letter-spacing: 1.2px;
        font-size: 18px;
    }

    .y-dropdown {
        display: none;
    }

    @media screen and (max-width:576px) {
        .y-main-nav {
            display: none;
        }

        .y-menu {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .y-menu span {
            margin-left: 65px;
            margin-right: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .y-dropdown {
            display: flex;
            flex-direction: column;
            height: 50px;
            position: relative;
            font-size: 16px;
            text-align: center;
            color: #465038;
            margin: 50px 0 0 0;
            border-top: solid 1px #465038;
            border-bottom: solid 1px #465038;
            z-index: 10;
        }

        .y-down-arrow {
            border: solid #465038;
            border-width: 0 1px 1px 0;
            display: inline-block;
            padding: 5px;
            margin: 19px;
            transform: rotate(45deg);
        }

        .y-up-arrow {
            transform: rotate(-135deg);
        }

        .y-dropdown>span {
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
            display: inline-block;
            color: #465038;
            cursor: pointer;
        }

        .y-dropdown input[type=checkbox] {
            position: absolute;
            display: block;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            margin: 0px;
            opacity: 0;
        }

        .y-dropdown ul {
            width: 100%;
            text-align: center;
            position: absolute;
            display: none;
            padding: 0;
            margin: 0;
            background-color: white;
            z-index: 0;
        }

        .y-dropdown input[type=checkbox]:checked+ul {
            display: block;
        }

        .y-dropdown ul li {
            display: block;
            border-bottom: solid 1px #465038;
            padding: 10px 0px;
        }

        .y-dropdown ul li:hover {
            background-color: #F5F5F5;
            cursor: pointer;
        }
    }


    /* ------banner------------------------------------------------ */

    .y-banner {
        max-width: 1140px;
        height: 300px;
        position: relative;
        /* height: 350px; */
        /* border: 1px solid #465038; */
    }

    .banner-insid {
        /* position: fixed; */
        /* opacity: 0.8; */
        /* background: #e7e1d2; */
        padding: 30px;
        position: absolute;
        display: flex;
        align-items: center;
        margin-top: 120px;
    }

    .y-banlogo {
        opacity: 1;
        width: 100px;
        margin-right: 25px;
    }

    .y-banslogan {
        opacity: 1;
        font-weight: 800;
        letter-spacing: 20px;
    }

    @media screen and (max-width:576px) {
        .y-banner {
            /* width: 300px; */
            height: 200px;
            margin: 0 auto;
        }

        .banner-insid {
            margin-top: 30px;
            padding: 40px 35px;
        }

        .y-banslogan {
            text-align: center;
            letter-spacing: 9px;

        }
    }

    @media screen and (max-width:414px) {

        .banner-insid {
            margin-top: 10px;
        }

        .y-banslogan {
            letter-spacing: 5px;
            line-height: 40px;
        }
    }


    /*-------麵包屑-----------------------------------*/
    .y-bread-list {
        display: flex;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    @media screen and (max-width:576px) {
        .y-bread-list {
            margin-top: 25px;
            justify-content: center;
        }
    }

    /*-------brand----------------------*/

    .y-logo {
        padding: 20px;
        width: 150px;
    }

    .y-brand {
        padding: 50px 25px;
        margin: 0 auto;
    }

    .y-brand>span {
        margin-top: 20px;
    }

    .y-brand.y-parallax {
        /* 視差滾動 */
        background-image: url('../img/aboutus-bg.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: repeat;
    }


    @media screen and (max-width:576px) {
        .y-banner {
            max-width: 100%;

        }
    }

    @media screen and (max-width:414px) {
        .y-brand.y-parallax {
            /* margin: 21px; */
        }

        .y-brand {
            padding: 25px 20px;
        }

        /* .y-team-pic {
            width: 80%;
        } */

        .y-logo {
            width: 120px;
        }

    }

    /* -----團隊介紹----------------------- */

    .y-team {
        padding-bottom: 50px;
    }

    .y-team>span {}

    .y-team-pic {
        margin: 0 auto;
        width: 800px;
        height: 350px;
        /* background: cornsilk; */
    }

    @media screen and (max-width:576px) {
        .y-team-pic {
            max-width: 100%;
        }

        .y-team>span {
            margin: 0 10px;
        }

    }

    @media screen and (max-width:414px) {
        .y-team-pic {
            max-width: 100%;
            height: 200px;
        }

        .font5 {
            line-height: 40px;
        }
    }

    /* ----------contactus-------------------------------------- */

    .y-contactUnderline {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border-radius: 0%;
        border: none;
        border-bottom: 2px solid #e0b872;
    }

    .textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #e0b872;
        border-radius: 4px;
        /* background-color: #f8f8f8; */
        font-size: 16px;
        resize: none;
    }

    .y-contact-pic {
        width: 100%;
        height: 90%;
        /* border: 1px solid #ebbb; */
    }

    /* 提示錯誤文字 */
    .form-group small {
        color: #cf7e60;
    }

    @media screen and (max-width:576px) {
        .y-contact {
            flex-direction: column;
        }

        .y-contact-pic {
            width: 90%;
            /* height: 400px; */
            margin: 0 auto;

        }

        .y-contact-form {
            width: 90%;
            padding-top: 25px;
            margin: 0 auto;
        }

        .y-sub-btn {
            width: 90%;
            text-align: center;
        }

    }

    @media screen and (max-width:414px) {
        /* .y-contact {
            flex-direction: column;
        } */

        .y-contact-pic {
            width: 300px;
            height: 375px;
            margin: 0 auto;
        }

        .y-contact-form {
            /* margin: 50px 21px; */
        }

        .y-sub-btn {
            width: 300px;
            text-align: center;
            font-size: 14px;
        }

    }



    /* ---------頁面特效---------------------------*/
    .animated {
        visibility: visible;
        animation-fill-mode: both;
        animation-duration: 2s;
        animation-play-state: running;
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }


    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }


    .animated.fadeInDown {
        animation-name: fadeInDown;
    }

    .animated.fadeInUp {
        animation-name: fadeInUp;
    }

    /* 彈窗 */
    .pop_title {
        color: #465038;
        font-size: 24px;
        font-weight: 400;
        letter-spacing: 2.4px;
    }

    .pop_banner {
        /* background: #000; */
        border-radius: 30px;

    }

    .pop_cancel,
    .pop_confirm {
        padding: 10px 60px;
        background: #E0B872;
        border-radius: 30px;
        font-size: 20px;
        letter-spacing: 2px;
        line-height: 20px;
        color: #465038;
        margin: 0 15px;
        outline: none;
        border: none;
    }

    .pop_confirm:focus {
        outline: none;
        /* background-color: #e0b872; */
    }

    /* .pop_cancel {
        background: #e7e1d2;
    } */
</style>


<div class="y-hight-1"></div>
<h1 class="font1 d-flex justify-content-center animated fadeInDown">About Us</h1>
<div class="y-container y-main-nav animated fadeInDown">

    <ul class="d-flex justify-content-around">
        <li class="y-btn y-nav-link y-active-link">
            <a class="font3" href="#y-s1">品牌介紹</a>
            <div class="y-underline"></div>
        </li>
        <li class="y-btn y-nav-link ">
            <a class="font3" href="#y-s2">團隊介紹</a>
            <div class="y-underline"></div>
        </li>
        <li class="y-btn y-nav-link ">
            <a class="font3" href="#y-s3">聯絡我們</a>
            <div class="y-underline"></div>
        </li>
    </ul>
</div>
<!-- 手機下拉選單 -->
<div class="y-container">
    <div class="y-dropdown" id="y-drop-down">
        <div id="y-all-item-m" class="y-menu">
            <a href="#y-s1"><span id="y-all-item-m" class="font3">品牌介紹</span></a>
            <i class="y-down-arrow "></i>
        </div>
        <label>
            <input type="checkbox">
            <ul>
                <a href="#y-s2">
                    <li id="y-topic-item-m" val="主題商品" class="font3">團隊介紹</li>
                </a>
                <a href="#y-s3">
                    <li id="y-brand-item-m" val="聯名商品" class="font3">聯絡我們</li>
                </a>
            </ul>
        </label>
    </div>
</div>
<div class="y-container">
    <div class="y-hight-2"> </div>
    <!------banner----------------------------------------------------------------->
    <div class=" y-banner d-flex justify-content-center">
        <img class="y-cover-fit" src="../img/aboutus-banner.jpg" alt="" data-aos="fade-up" data-aos-duration="1000">
        <div class="banner-insid" style="background:hsl(38, 64%, 66%,0.7)">
            <!-- <img class="y-banlogo" src="../img/pugrace_logo06.png" alt="" data-aos="fade-right" data-aos-duration="2000"> -->
            <p class="y-banslogan green font3" data-aos="fade-right" data-aos-duration="3000">The pattern way of life !</p>
        </div>

    </div>
    <!------麵包屑----------------------------------------------------------------->
    <nav aria-label="breadcrumb" class="y-bread-list">
        <ol class="breadcrumb">
            <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/a-index.php">Home</a></li>
            <li class="font5 breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>
    <!------品牌介紹----------------------------------------------------------------->
    <section id="y-s1" class="y-brand y-parallax ">
        <h3 class="font2  d-flex justify-content-center animated fadeInDown">- 品牌介紹 -</h3>
        <span class="font5 d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
            Pugrace
            是一個以大自然為主題的印花品牌。<br>
            Pure是木芙蓉的花語：純潔、純淨的； <br>
            Grace是尤加利葉的花語：恩賜、恩典。<br>
            設計靈感取自人與大自然共依存的關係，<br>
            將花草植物、動物或水果作為創作元素，<br>
            不斷開發每期精選的主題，<br>
            製作出各式美觀而實用的印花商品。<br>
            我們希望傳達的是一種清新簡單，<br>
            實現人與自然間和諧的⽣活風格。<br>
            我們希望透過我們的設計，<br>
            滿足人與大自然親近的想望。<br>
        </span>
        <div class="d-flex justify-content-center">
            <img class="y-logo" src="../img/pugrace_logo06.png" alt="" data-aos="fade-up" data-aos-duration="3000">
        </div>


    </section>
</div>
<div class="y-hight-2"> </div>
<!------團隊介紹--------->
<section id="y-s2" class="y-container y-team" style="width: 100%; background: hsl(38, 64%, 66%,0.2);">
    <div style="padding: 50px 0;">
        <h3 class="font2  d-flex justify-content-center animated fadeInDown">- 團隊介紹 -</h3>
        <span class="font5 d-flex justify-content-center " data-aos="fade-up" data-aos-duration="2000">
            你對印花的認識還停留在傳統印花嗎?<br> 有鑒於台灣印花設計產業日漸重要與發達，<br>
            圖像設計的靈感和專業與數位印花相輔相成，展現出布花設計的多面向與其藝術涵量。<br>
            我們的slogan，「The pattern way of life ! 」<br>期望將印花融入生活，藉由自然元素的印花設計，拉近人與大自然共依存的關係。<br> 我們希望傳達的是一種清新簡單，實現人與自然間和諧的⽣活風格。<br>
            透過我們的設計，滿足人與大自然親近的想望。

        </span>
    </div>
    <div class="y-team-pic">
        <img class="y-cover-fit" src="../img/mountain03.jpg" alt="" data-aos="fade-up" data-aos-duration="3000">
    </div>
</section>

<div class="y-hight-2"> </div>

<section id="y-s3" class="y-container">
    <h3 class="font2  d-flex justify-content-center animated fadeInDown">- 聯絡我們 -</h3>
    <div class="row mt-5 y-contact">
        <div class="col d-flex justify-content-start">
            <div class="y-contact-pic ">
                <img class="y-cover-fit" src="../img/Aboutus-contact.jpg" alt="" data-aos="fade-right" data-aos-duration="2000">
            </div>
        </div>
        <div class="col .aaa">
            <form class="y-contact-form " name="form1" method="post" onsubmit="return formCheck()" novalidate data-aos="fade-up" data-aos-duration="2000">

                <div class="form-group">
                    <label class="font4 " for="nickname">您的姓名：（必填）</label>
                    <input type="text" class="y-contactUnderline form-control green" id="nickname" name="nickname" placeholder="">
                    <small id="nicknamelHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label class="font4" for="email">您的電子郵件：（必填）</label>
                    <input type="email" class="y-contactUnderline form-control green" id="email" name="email" placeholder="">
                    <small id="emailHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label class="font4" for="phone">您的電話：（必填）</label>
                    <input type="tel" class="y-contactUnderline form-control green" id="phone" name="phone" placeholder="">
                    <small id="phonelHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label class="font4" for="t-area">想告訴我們 :</label><br>
                    <textarea class="textarea green" id="t-area" name="t-area" placeholder="Write something.."></textarea>
                </div>

            </form>
            <div class="d-flex justify-content-center">

                <a class="y-sub-btn yellow_btn aaa_btn" href="javascript:formCheck()">送出</a>
                <!-- document.form1.submit() -->
            </div>

        </div>
    </div>

    <div class="y-hight-2"> </div>
</section>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    // 頁面特效
    AOS.init();

    // smooth效果
    $('a[href*="#"]').click(function(event) {
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 750);
            }
        }
    });

    // 
    $(".y-menu").on("click", function() {
        $(".y-submenu1").toggleClass("open")
        $(".y-down-arrow").toggleClass("up-arrow")
        //  console.log("123")
    })

    // 頁面切換 underline
    $('.y-nav-link').on('click', function() {
        $('.y-active-link').removeClass('y-active-link');
        $(this).addClass('y-active-link');
    });


    // 
    const nickname = $('#nickname'),
        email = $('#email'),
        phone = $('#phone'),
        t_area = $('#t-area')
    // info_bar = $('#info-bar');
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;


    function formCheck() {

        $('#nicknameHelp').text('');
        $('#emailHelp').text('');
        $('#phoneHelp').text('');
        // nickname.next().text('');
        // email.next().text('');
        // phone.next().text('');
        nickname.css('border-color', '#CCCCCC');
        email.css('border-color', '#CCCCCC');
        phone.css('border-color', '#CCCCCC');
        // TODO: 檢查欄位
        let isPass = true;

        if (!email_re.test(email.val())) {
            isPass = false;
            email.css('border-color', '#cf7e60');
            email.next().text('請填寫正確的 email 格式');
        }
        if (nickname.val().trim().length < 1) {
            console.log(nickname.val().trim().length);
            isPass = false;
            nickname.css('border-color', '#cf7e60');
            nickname.next().text('姓名長度太短了');
        }
        if (phone.val().trim().length < 8) {

            isPass = false;
            phone.css('border-color', '#cf7e60');
            phone.next().text('請輸入正確電話格式');
        }

        if (isPass) {
            $.post('aboutus-index-api.php', $(document.form1).serialize(), function(data) {
                console.log(data);

                setTimeout(function() {
                    nickname.val('');
                    email.val('');
                    phone.val('');
                    t_area.val('');

                }, 2000);
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: '感謝您的回覆 :)',
                    buttonsStyling: false,
                    showConfirmButton: true,
                    confirmButtonText: 'ok!',
                    // timer: 5000,
                    // title: 'Custom animation with Animate.css',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    width: 550,
                    padding: '3em',
                    // background: '#e7e1d2',
                    backdrop: `rgba(0,0,0,0.4)`,
                    customClass: {
                        popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                        title: 'pop_title',
                        cancelButton: 'pop_cancel',
                        confirmButton: 'pop_confirm',
                    }
                })


            }, 'json');



        }
        return false;

    }


    // 手機版menu
    $(".y-dropdown, .y-dropdown ul li").on("click", function() {
        $(".y-down-arrow").toggleClass("y-up-arrow")
        //  console.log("dropdown")
    })

    $(document).ready(function() {
        $('.y-dropdown ul>li').click(function() {
            $('.y-dropdown ul>li').each(function() {
                $(this).removeClass('drop-selected');
            });
            $(this).toggleClass('drop-selected');
            $('.y-dropdown .y-menu>span').text($(this).attr("val"))
        });
    });
</script>



<!-- body結束 -->

<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->