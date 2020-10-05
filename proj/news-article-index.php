<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>

<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<style>
    li {
        list-style: none;
    }

    .a-container {
        max-width: 1140px;
        padding: 0;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    @media screen and (max-width:576px) {
        .a-container {
            margin: 0 10%;
        }
    }

    .a-py-6 {
        padding: 3.125rem 0;
    }

    @media screen and (max-width: 576px) {
        .a-py-6 {
            padding: 3.125rem 0;
        }
    }

    /* ------------------menu 特效------------------*/

    .a-main-nav {
        display: flex;
        margin: 50px 0;
        padding: 0;
        text-align: center;
        justify-content: space-around;
    }

    .a-main-nav li a {
        color: #465038;
        text-decoration: none;
        display: inline-block;
        padding: 10px;
        transition: color 0.5s;
    }

    .a-nav-link {
        letter-spacing: 1.2px;
    }

    .a-main-nav li .a-underline {
        height: 3px;
        margin: 2px 0;
        background-color: transparent;
        width: 0%;
        transition: width 0.2s, background-color 0.5s;
        margin: 0 auto;
    }

    .a-main-nav li.a-active-link .a-underline {
        width: 100%;
        background-color: #e0b872;
    }

    .a-main-nav li:hover .a-underline {
        background-color: #e0b872;
        width: 100%;
    }


    .a-main-nav li:active a {
        transition: 0.1s;
        /* color: rgba(255, 255, 255, 0.76); */
    }

    .a-main-nav li:active .a-underline {
        transition: none;
        background-color: rgba(255, 255, 255, 0.76);
    }

    @media screen and (max-width:576px) {
        .a-main-nav {
            display: none;
        }
    }

    /* ------------------手機版下拉選單------------------ */
    .a-dropdown {
        display: none;
        z-index: 15;
    }

    @media screen and (max-width:576px) {
        .a-menu {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .a-menu span {
            margin-left: 65px;
            margin-right: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .a-dropdown {
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
        }

        .a-down-arrow {
            border: solid #465038;
            border-width: 0 1px 1px 0;
            display: inline-block;
            padding: 5px;
            margin: 19px;
            transform: rotate(45deg);
        }

        .a-up-arrow {
            transform: rotate(-135deg);
        }

        .a-dropdown>span {
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
            display: inline-block;
            color: #465038;
            cursor: pointer;
        }

        .a-dropdown input[type=checkbox] {
            position: absolute;
            display: block;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            margin: 0px;
            opacity: 0;
        }

        .a-dropdown ul {
            width: 100%;
            text-align: center;
            position: absolute;
            display: none;
            padding: 0;
            margin: 0;
            background-color: white;
        }

        .a-dropdown input[type=checkbox]:checked+ul {
            display: block;
        }

        .a-dropdown ul li {
            display: block;
            border-bottom: solid 1px #465038;
            padding: 10px 0px;
        }

        .a-dropdown ul li:hover {
            background-color: #F5F5F5;
            cursor: pointer;
        }
    }

    /* ------------------麵包屑------------------ */

    .a-bread-list {
        display: flex;
        margin-top: 50px;
    }

    @media screen and (max-width:576px) {
        .a-bread-list {
            margin: 25px 0 0 0;
            justify-content: center;
        }
    }

    /* ------------------最新消息-Banner------------------ */

    .a-news-bn {
        width: 100%;
        height: 300px;
        overflow: hidden;
        margin: 0 auto;
        background-size: cover;
    }

    @media screen and (max-width:576px) {
        .a-news-bn {
            max-width: 100%;
            height: 170px;
            margin-top: 50px;
        }
    }

    .a-news-bn>img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Slider Style
--------------------------------------*/
    .cd-slider {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
        margin-bottom: 8rem;
    }

    .cd-slider li {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        visibility: hidden;
        transition: visibility 0s 1s;
        will-change: visibility;
    }

    .image {
        position: absolute;
        top: 0;
        left: 0;
        width: 70%;
        height: 100%;
        background-size: cover;
        background-position: 50% 50%;
        clip: rect(0, 80rem, 50rem, 80rem);
        transition: clip .5s cubic-bezier(0.99, 0.01, 0.45, 0.9) .5s;
        will-change: clip;
    }

    .content {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        padding: 2rem 0 0 2rem;
        font-size: 5rem;
        text-align: right;
    }

    .content h4 {
        line-height: 2;
        margin: 0;
        text-overflow: ellipsis;
        overflow: hidden;
        transform: translateY(-30%);
        opacity: 0;
        transition: transform .5s, opacity .5s;
        will-change: transform, opacity;
    }


    /* Current Slide 
-------------------------------------*/
    li.current {
        visibility: visible;
        transition-delay: 0s;
    }

    li.current .image {
        clip: rect(0, 80rem, 50rem, 0);
    }

    li.current .content h4 {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 1s;
    }

    li.current .content a {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 1.1s;
    }

    /* Prev Slide 
------------------------------------*/
    li.prev_slide .image {
        clip: rect(0, 0, 50rem, 0);
    }

    .div_arrows {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #fff;
        z-index: 2;
    }

    .prev,
    .next,
    .counter {
        vertical-align: middle;
    }

    .prev,
    .next {
        position: relative;
        display: inline-block;
        height: 5rem;
        width: 5rem;
        border: 0;
        cursor: pointer;
        background: transparent;
    }

    .prev::before,
    .next::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        border: .8rem solid transparent;
        border-right-width: 1rem;
        border-right-color: #000;
        border-left-width: 0;
        width: 0;
        height: 0;
    }

    .prev::after,
    .next::after {
        content: '';
        position: absolute;
        top: 50%;
        transform: translateY(-50%) translateZ(0);
        left: .5rem;
        background: #000;
        height: .1rem;
        min-height: 1px;
        width: 2.5rem;
        transition: width .3s;
    }

    .next::before {
        right: 0;
        left: auto;
        border-left-width: 1rem;
        border-left-color: #000;
        border-right-width: 0;
    }

    .next::after {
        right: .5rem;
        left: auto;
    }

    .counter {
        display: inline-block;
        font-size: 3rem;
        font-family: serif;
        font-style: italic;
    }

    .counter span:last-child::before {
        content: '/';
        margin: 0 1rem;
    }

    .prev:hover::after,
    .next:hover::after {
        width: 3.5rem;
    }

    @media screen and (max-width: 576px) {
        .image {
            width: 100%;
            height: 60%;
        }

        .content h4 {
            display: none;
        }

        .div_arrows {
            display: none;
        }
    }

    /* ------------------最新消息------------------ */
    .a-news-card {
        margin-bottom: 50px;
    }

    .a-item-01 {
        display: flex;
        justify-content: center;
    }

    .a-item-02 {
        display: flex;
        justify-content: center;
    }

    .a-item-03 {
        display: flex;
        justify-content: center;
    }

    .a-hide {
        /* 隱藏項目 */
        display: none;
    }

    @media screen and (max-width:576px) {
        .a-news-card {
            margin-bottom: 25px;
        }
    }

    .a-figure>a {
        text-decoration: none;
    }

    .news-img {
        position: relative;
        background-color: #465038;
        width: 100%;
        display: block;
    }

    .a-img-more {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        opacity: 0;
        z-index: 3;
    }

    .news-img:hover {
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.3);
        transform: translate(0, -5px);
        transition: 0.5s;
    }

    .news-img:hover .a-figure-img {
        opacity: 0.3;
    }

    .news-img:hover .a-img-more {
        opacity: 1;
    }

    .a-figure-caption-s {
        margin-top: 2rem;
        letter-spacing: 2px;
        color: #465038;
    }

    @media screen and (max-width:576px) {
        .a-figure-caption-s {
            margin-top: 1rem;
        }
    }

    .a-figure-caption {
        letter-spacing: 1.2px;
        color: #465038;
    }

    .a-new-figure {
        width: 350px;
        height: 350px;
        overflow: hidden;
        margin: 0 auto;
        background-size: cover;
    }

    @media screen and (max-width:576px) {
        .a-new-figure {
            max-width: 100%;
            height: 250px;
        }
    }

    .a-newseries-figcaption {
        letter-spacing: 2px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.8);
        padding: 35px 0px 70px 0;
        text-align: center;
        color: #465038;
        transition: all 0.5s;
        transform: translateY(35px);
    }

    .a-new-figure:hover .a-newseries-figcaption {
        transform: translateY(0px);
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
</style>

</section>
<!-- 最新消息 -->
<section class="a-py-6">
    <div class="a-container">
        <h1 class="font1 d-flex justify-content-center animated fadeInDown" style="margin:0;">News</h1>
        <ul class="a-main-nav animated fadeInDown">
            <li id="a-all-item" class="font3 a-nav-link a-active-link">
                <a>所有消息</a>
                <div class="a-underline"></div>
            </li>
            <li id="a-item-01" class="font3 a-nav-link">
                <a>門市活動</a>
                <div class="a-underline"></div>
            </li>
            <li id="a-item-02" class="font3 a-nav-link">
                <a>企業合作</a>
                <div class="a-underline"></div>
            </li>
            <li id="a-item-03" class="font3 a-nav-link">
                <a>市集展會</a>
                <div class="a-underline"></div>
            </li>
        </ul>
        <!-- 手機下拉選單 -->
        <div class="a-dropdown" id="a-drop-down">
            <div id="a-all-item-m" class="a-menu">
                <span>所有消息</span>
                <i class="a-down-arrow "></i>
            </div>
            <label>
                <input type="checkbox">
                <ul>
                    <li id="a-item-m-0" val="所有消息">所有消息</li>
                    <li id="a-item-m-1" val="門市活動">門市活動</li>
                    <li id="a-item-m-2" val="企業合作">企業合作</li>
                    <li id="a-item-m-3" val="市集展會">市集展會</li>
                </ul>
            </label>
        </div>
        <!-- Banner -->
        <div class="a-news-bn">
            <div class="cd-slider">
                <ul>
                    <li>
                        <div class="image" style="background-image:url(../img/news-bn_03.jpg);"></div>
                        <div class="content">
                            <h4 class="font1">Pugrace 放大振興<br>
                                滿500送100</h4>
                        </div>
                    </li>
                    <li>
                        <div class="image" style="background-image:url(../img/news-bn_01.jpg);"></div>
                        <div class="content">
                            <h4 class="font1">Happy Weekend<br>
                                單一優惠500元閃購價</h4>
                        </div>
                    </li>
                    <li>
                        <div class="image" style="background-image:url(../img/news-bn_02firm.jpg);"></div>
                        <div class="content">
                            <h4 class="font1">Pugrace × CLINIQUE<br>倩碧推出聯名彩妝</h4>
                        </div>
                    </li>
                    <li>
                        <div class="image" style="background-image:url(../img/pentel01.jpg);"></div>
                        <div class="content">
                            <h4 class="font1">共好的跨界火花<br>
                                   Pugrace × Pentel</h4>
                        </div>
                    </li>
                    <li>
                        <div class="image" style="background-image:url(../img/ourdesign-banner01.jpg);"></div>
                        <div class="content">
                            <h4 class="font1">這個夏天<br>
                                   Pugrace陪你一起野餐</h4>
                        </div>
                    </li>
                </ul>
            </div>
            <!--/.cd-slider-->
        </div>
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb" class="a-bread-list">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page">News</li>
            </ol>
        </nav>
        <section class="row d-flex justify-content-center py-5" data-aos="fade-up" data-aos-duration="2000">
            <!-- 每則消息-GRID -->
            <div class="a-item-01 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="<?= WEB_ROOT ?>/news-article-triple.php">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-01-01.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="<?= WEB_ROOT ?>/news-article-triple.php">
                        <figcaption class="a-figure-caption-s text-center font6">
                            門市活動
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            振興三倍券優惠
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-01 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="<?= WEB_ROOT ?>/news-article-happywk.php">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-01-02.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="<?= WEB_ROOT ?>/news-article-happywk.php">
                        <figcaption class="a-figure-caption-s text-center font6">
                            門市活動
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            Happy Weekend
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-01 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-01-03.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            網路門市限定
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            指定系列8折優惠
                        </figcaption>
                    </a>
                </figure>
            </div>

            <div class="a-item-01 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-01-04.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            實習生企劃
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            實習花森種種事
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-02 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="<?= WEB_ROOT ?>/news-article-firm.php">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-02-01.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="<?= WEB_ROOT ?>/news-article-firm.php">
                        <figcaption class="a-figure-caption-s text-center font6">
                            共好的跨界火花
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            Pugrace x 倩碧
                        </figcaption>
                    </a>
                </figure>
            </div>

            <div class="a-item-02 a-news-card col-md-3 col-6 ">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-02-02.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            共好的跨界火花
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            Pugrace x Pantel
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-02 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-02-03.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            共好的跨界火花
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            Pugrace x 麥當勞
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-02 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-02-04.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            共好的跨界火花
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            Pugrace x socks
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-03 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-03-01.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            藝起逛市集
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            Light Market
                        </figcaption>
                    </a>
                </figure>
            </div>

            <div class="a-item-03 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-03-02.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            藝起逛市集
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            黃綠燈創意市集
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-03 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-03-03.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            藝起逛市集
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            四分子創意市集
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="a-item-03 a-news-card col-md-3 col-6">
                <figure class="a-figure">
                    <a class="news-img" href="">
                        <span class="font5 a-img-more text-center" href="">Read More</span>
                        <img src="../img/item-03-04.jpg" class="a-figure-img img-fluid" alt="..." />
                    </a>
                    <a href="">
                        <figcaption class="a-figure-caption-s text-center font6">
                            藝起逛市集
                        </figcaption>
                        <figcaption class="a-figure-caption text-center font3">
                            自然森活市集
                        </figcaption>
                    </a>
                </figure>
            </div>
        </section>
    </div>

</section>

<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    (function() {

        function init(item) {
            var items = item.querySelectorAll('li'),
                current = 0,
                autoUpdate = true,
                timeTrans = 4000;

            //create div
            var div = document.createElement('div');
            div.className = 'div_arrows';

            //create button prev
            var prevbtn = document.createElement('button');
            prevbtn.className = 'prev';
            prevbtn.setAttribute('aria-label', 'Prev');

            //create button next
            var nextbtn = document.createElement('button');
            nextbtn.className = 'next';
            nextbtn.setAttribute('aria-label', 'Next');

            //create counter
            var counter = document.createElement('div');
            counter.className = 'counter';
            counter.innerHTML = "<span>1</span><span>" + items.length + "</span>";

            if (items.length > 1) {
                div.appendChild(prevbtn);
                div.appendChild(counter);
                div.appendChild(nextbtn);
                item.appendChild(div);
            }

            items[current].className = "current";
            if (items.length > 1) items[items.length - 1].className = "prev_slide";

            var navigate = function(dir) {
                items[current].className = "";

                if (dir === 'right') {
                    current = current < items.length - 1 ? current + 1 : 0;
                } else {
                    current = current > 0 ? current - 1 : items.length - 1;
                }

                var nextCurrent = current < items.length - 1 ? current + 1 : 0,
                    prevCurrent = current > 0 ? current - 1 : items.length - 1;

                items[current].className = "current";
                items[prevCurrent].className = "prev_slide";
                items[nextCurrent].className = "";

                //update counter
                counter.firstChild.textContent = current + 1;
            }

            item.addEventListener('mouseenter', function() {
                autoUpdate = false;
            });

            item.addEventListener('mouseleave', function() {
                autoUpdate = true;
            });

            setInterval(function() {
                if (autoUpdate) navigate('right');
            }, timeTrans);

            prevbtn.addEventListener('click', function() {
                navigate('left');
            });

            nextbtn.addEventListener('click', function() {
                navigate('right');
            });

            //keyboard navigation
            document.addEventListener('keydown', function(ev) {
                var keyCode = ev.keyCode || ev.which;
                switch (keyCode) {
                    case 37:
                        navigate('left');
                        break;
                    case 39:
                        navigate('right');
                        break;
                }
            });

            // swipe navigation
            // from http://stackoverflow.com/a/23230280
            item.addEventListener('touchstart', handleTouchStart, false);
            item.addEventListener('touchmove', handleTouchMove, false);
            var xDown = null;
            var yDown = null;

            function handleTouchStart(evt) {
                xDown = evt.touches[0].clientX;
                yDown = evt.touches[0].clientY;
            };

            function handleTouchMove(evt) {
                if (!xDown || !yDown) {
                    return;
                }

                var xUp = evt.touches[0].clientX;
                var yUp = evt.touches[0].clientY;

                var xDiff = xDown - xUp;
                var yDiff = yDown - yUp;

                if (Math.abs(xDiff) > Math.abs(yDiff)) {
                    /*most significant*/
                    if (xDiff > 0) {
                        /* left swipe */
                        navigate('right');
                    } else {
                        navigate('left');
                    }
                }
                /* reset values */
                xDown = null;
                yDown = null;
            };


        }

        [].slice.call(document.querySelectorAll('.cd-slider')).forEach(function(item) {
            init(item);
        });

    })();
    // 頁面特效
    AOS.init();

    // 頁面切換 underline
    $('.a-nav-link').on('click', function() {
        $('.a-active-link').removeClass('a-active-link');
        $(this).addClass('a-active-link');
    });

    // menu內容切換
    $('#a-item-01').click(function() {
        console.log('門市活動')
        $(".a-item-01, .a-item-02, .a-item-03").hide();
        $(".a-item-01").show();
    });

    $('#a-item-02').click(function() {
        console.log('企業合作')
        $(".a-item-01, .a-item-02, .a-item-03").hide();
        $(".a-item-02").show();
    });

    $('#a-item-03').click(function() {
        console.log('市集展會')
        $(".a-item-01, .a-item-02, .a-item-03").hide();
        $(".a-item-03").show();
    });

    $('#a-all-item').click(function() {
        console.log('所有消息')
        $(".a-item-01, .a-item-02, .a-item-03").show();
    });
    // 手機版menu內容切換

    $('#a-item-m-1').click(function() {
        console.log('門市活動')
        $(".a-item-01, .a-item-02, .a-item-03").hide();
        $(".a-item-01").show();
    });

    $('#a-item-m-2').click(function() {
        console.log('企業合作')
        $(".a-item-01, .a-item-02, .a-item-03").hide();
        $(".a-item-02").show();
    });

    $('#a-item-m-3').click(function() {
        console.log('市集展會')
        $(".a-item-01, .a-item-02, .a-item-03").hide();
        $(".a-item-03").show();
    });

    $('#a-item-m-0, #a-all-item-m').click(function() {
        console.log('所有消息')
        $(".a-item-01, .a-item-02, .a-item-03").show();
    });

    // 手機版menu
    $(".a-dropdown, .a-dropdown ul li").on("click", function() {
        $(".a-down-arrow").toggleClass("a-up-arrow")
        //  console.log("dropdown")
    })

    $(document).ready(function() {
        $('.a-dropdown ul>li').click(function() {
            $('.a-dropdown ul>li').each(function() {
                $(this).removeClass('drop-selected');
            });
            $(this).toggleClass('drop-selected');
            $('.a-dropdown .a-menu>span').text($(this).attr("val"))
        });
    });
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->