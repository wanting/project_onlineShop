<?php
if (empty($pageName)) {
    $pageName = '';
}
?>
<style>
    body {
        overflow-x: hidden;
    }

    .f-nav {
        background-color: #E0B872;
        box-shadow: 0 6px 15px rgba(0,0,0,.15);
        z-index: 999;
    }

    .navbar-header {
        display: flex;
        height: 60px;
        padding: 0;
    }

    .logo {
        position: relative;
        display: flex;
        justify-content: flex-start;
        flex-direction: row;
        margin: auto 0;
    }

    .logo img {
        width: 140px;
    }

    .nav-links {
        display: flex;
        justify-content: flex-end;
        margin: auto 0;
    }

    .nav-links li {
        list-style: none;
    }

    .nav-links .nav-items>a {
        padding: 0 15px;
    }

    .nav-links .nav-items>a:hover {
        font-size: 18px;
    }

    .nav-links img {
        height: 20px;
    }

    /*------------- searchbar-web------------------ */
    .f-searchbarRwd {
        display: none;
    }

    .f-searchbar-w {
        display: flex;
        justify-content: center;
    }

    .f-input-w {
        width: 100px;
        background-color: transparent;
        border: none;
        border-bottom: 1.5px solid #465038;
        color: #465038;
        box-sizing: border-box;
        position: relative;
    }

    input[type="search"]:focus {
        border-color: none;
        box-shadow: none;
        outline: 0;
    }

    .f-input-w:focus+.f-underline-w {
        transform: scale(1);
    }


    .btn:focus,
    .btn:active {
        outline: none !important;
        box-shadow: none;
    }

    /* --------------member dropdown-------------- */
    .f-background {
        position: absolute;
        min-width: 145px;
        top: 45px;
        display: none;
        transition: 1s;
        z-index: 3;
    }

    .f-background.drop {
        display: flex;

    }

    .member-submenu {
        position: absolute;
        padding: 15px 0;
        opacity: 0;
        /* overflow: hidden; */
        width: auto;
        transition: .5s;
        max-height: 0;
        /* margin: 25px 0 0 0; */
    }

    .member-submenu .f-member-links {
        /* padding: 20px 0; */
    }

    .f-member-links-m>a {
        display: none;
    }

    @media screen and (max-width: 576px) {
        .f-member-links-m>a {
            display: block;
            padding: 10px 0 10px 50px;
        }
    }

    .member-submenu.drop {
        height: auto;
        width: auto;
        opacity: 1;
        /* background-color: #E0B872; */
        z-index: 2;
    }

    .member-submenu .greet p {
        padding: 0;
        margin: 0;
    }

    .member-submenu li {
        background-color: #ffffffe3;
        border-bottom: 1px solid #465038;
        padding: 5px;
        white-space: nowrap;
    }

    .member-submenu a {
        color: #465038;
        text-align: center;
        list-style: none;
        font-size: 16px;
    }

    /* --------------cart-count------------- */
    .badge {
        color: #fff;
        background-color: #465038;
    }

    /* ------------burger按鈕-------------- */

    .burger {
        cursor: pointer;
        padding: 0 15px;
    }

    .burger div {
        width: 25px;
        height: 3px;
        background-color: #465038;
        margin: 5px;
        transition: all 0.3s ease;
    }

    .toggle .line1 {
        transform: rotate(-45deg) translate(-5px, 6px);
    }

    .toggle .line2 {
        opacity: 0;
    }

    .toggle .line3 {
        transform: rotate(45deg) translate(-5px, -6px);
    }


    /* -------------cate---------------- */

    .cate {
        /* position: fixed; */
        position: absolute;
        width: 100%;
        margin: 0 auto;
        left: 0;
        top: 60px;
        right: 0;
        bottom: 0;
        z-index: 10;
        background-color: #465038e7;
        display: none;
        justify-content: center;
        /* opacity: 0; */
        transition: .5s;
        overflow: hidden;
        letter-spacing: 2.4px;
    }

    .cate.show {
        display: flex;
        /* opacity: 1; */
        max-height: 100%;
        z-index: 1000;
    }

    .cate-parents {
        text-align: center;
        padding: 100px 0;
        font-size: 20px;
    }

    .cate-parents .d-flex {
        flex-direction: column;
    }

    .cate-parents a {
        padding-bottom: 10px;
        display: block;
    }

    /* -----------greetRwd------------------ */
    .greetRwd {
        display: none;
    }

    /* -----------burger-menu--------------- */
    .burger-menu {
        z-index: 15;
        max-height: 0;
        flex-direction: row;
        justify-content: center;
        position: absolute;
        display: flex;
        opacity: 0;
        transition: .5s;
        overflow: auto;
        margin: 0;
    }

    .burger-menu.show {
        opacity: 1;
        max-height: 100%;
        /* height: 100%; */
    }

    .burger-menu a,
    .burger-menu a:not([href]) {
        color: #FFFFFF;
    }

    /* ----------------  a底線特效   --------------------- */

    .burger-menu a:hover {
        text-decoration: underline;
    }

    /* .cate-parents>a {
        text-decoration: none;
        position: relative;
    }

    .cate-parents>a:after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0%;
        border-bottom: 2px solid #fff;
        transition: .5s;
    }

    .cate-parents>a:hover:after {
        width: 80%;
    }  */

    .cate-items {
        font-size: 16px;
        padding: 0;
        cursor: pointer;
    }

    /* -----------------third-menu------------ */

    .cate-items-p .third-menu {
        transition: 1s;
        height: 0;
        opacity: 0;
        overflow: hidden;
        font-size: 16px;
    }

    .cate-items-p.active .third-menu {
        height: auto;
        opacity: 1;
    }


    .f-mobile-fix {
        display: none;
    }



    @media screen and (max-width: 576px) {

        .logo img {
            width: 90px;
        }

        .nav-items {
            display: none;
        }

        .burger div {
            width: 24px;
            height: 2px;
            margin: 6px;
        }

        .f-input-w {
            display: none;
        }



        /* --------searchbar------------- */

        .f-searchbarRwd {
            display: flex;
            justify-content: center;
            margin: 24px 0;
        }

        .f-search-icon {
            width: 30px;
            height: auto;
            margin: 0 0 0 10px;
        }

        .f-input {
            width: 200px;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #465038;
            color: #fff;
            box-sizing: border-box;
            position: relative;
            height: 40px;
        }

        input[type="text"]:focus {
            border-color: none;
            box-shadow: none;
            outline: 0;
        }

        .f-input:focus+.f-underline {
            transform: scale(1);
        }

        .f-underline {
            background-color: #fff;
            display: inline-block;
            height: 2px;
            width: 202px;
            margin-top: 45px;
            position: absolute;
            -webkit-transform: scale(0, 1);
            transform: scale(0, 1);
            -webkit-transition: all 0.5s linear;
            transition: all 0.5s linear;
        }

        /* -----------cate--------------- */

        .cate {
            left: 0;
            top: 60px;
            right: 0;
            bottom: 0;
            z-index: 9;
            /* height: 100%; */
        }

        /* ------------------------------ */
        .greetRwd {
            display: block;
            color: #fff;
            padding: 2px 0 2px 50px;

        }

        /* ---------.burger-menu--------- */

        .burger-menu {
            flex-direction: column;
            justify-content: flex-start;
            overflow: auto;
            /* 手機選單加滾輪overflow: auto,最大高度不能用100% */
        }

        .burger-menu.show {
            max-height: calc(100%-60px);
        }

        .cate-parents {
            padding: 2px 0 2px 50px;
            text-align: left;
        }

        .cate-parents .d-flex {
            transition: .5s;
            height: 0;
            overflow: hidden;
        }

        .cate-parents.active .d-flex {
            height: auto;
        }

        .cate-items {
            padding: 0 0 0 30px;
        }

        .third-menu {
            padding: 0 0 0 40px;
        }

        /* ----------------mobileNav-fix---------------------- */
        .f-mobile-fix {
            display: flex;
            background-color: #465038;
            width: 100%;
            height: 60px;
            position: fixed;
            bottom: 0;
            z-index: 999;
        }

        .f-mobile-links {
            width: 100%;
            margin: auto 0;
        }

        .f-link-space {
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
            width: 100%;
            justify-content: space-evenly;
        }

        .f-mobile-links li {
            list-style: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .f-mobile-links img {
            height: 25px;
            /* vertical-align: middle */
        }

        .nav-items-m p {
            color: #fff;
            text-align: center;
            margin: 0;
        }




    }

    .nav-active {
        transform: translateX(0%);
    }

    @keyframes navLinkFade {
        from {
            opacity: 0;
            transform: translateX(50px)
        }

        to {
            opacity: 1;
            transform: translateX(0px)
        }

    }
</style>

<nav class="f-nav">
    <div class="container navbar-header">
        <div class="logo col-4 ">
            <a href="<?= WEB_ROOT ?>/a-index.php"><img src="../img/pugrace_logo03.png" alt=""></a>
        </div>
        <ul class="nav-links col-8 ">
            <!-- <div class="f-searchbar-w d-flex column">
                <input class="f-input-w font4" type="search">
                <span class="f-underline-w"></span>
            </div> -->
            <li class="nav-items"><a href="<?= WEB_ROOT ?>/search.php">
                    <img src="../img/icon_search.svg" alt=""></a></li>


            <li class="nav-items"><a href="<?= WEB_ROOT ?>/wishlist-web.php"><img src="../img/icon_love.svg" alt=""></a></li>

            <li class="nav-items"><a href="javascript:"><img class="member" src="../img/icon_member.svg" alt=""></a>
                <div class="f-background">
                    <ul class="member-submenu">
                        <li class="greet">
                            <span id="f-member_login"><?= $_SESSION['member']['name'] ?></span>
                            <span id="f-visiter">訪客</span>
                            <span>，您好</span>
                        </li>
                        <li class="f-member-links"><a href="<?= WEB_ROOT ?>/member-index.php">會員中心</a></li>
                        <li class="f-member-links" id="login_flag"><a href="<?= WEB_ROOT ?>/login.php">登入</a></li>
                        <li class="f-member-links" id="logout_flag"><a href="<?= WEB_ROOT ?>/logout.php">登出</a></li>
                        <li class="f-member-links" id="f-register"><a href="<?= WEB_ROOT ?>/register.php">註冊</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-items "><a href="<?= WEB_ROOT ?>/shoppingcart01.php"><img src="../img/icon_cart.svg" alt="">
                    <span class="badge badge-pill cart-count">0</span>
                </a></li>
            <li class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </li>
        </ul>
</nav>
<div class="cate">
    <ul class="burger-menu list-unstyled container">
        <div class="f-searchbarRwd">
            <div class="d-flex flex-column">
                <input class="f-input font4" placeholder="Search" type="text">
                <span class="f-underline"></span>
            </div>
            <div>
            <a href="<?= WEB_ROOT ?>/search.php">
                <img class="f-search-icon" src="../img/icon_search_white.svg" alt=""></a>
            </div>
        </div>
        <li class="greetRwd">
            <span id="f-member_login-m"><?= $_SESSION['member']['name'] ?></span>
            <span id="f-visiter-m">訪客</span>
            <span>，您好</span>
        </li>
        <li class="f-member-links-m" id="logout_flag-m"><a href="<?= WEB_ROOT ?>/logout.php">登出</a></li>
        <li class="cate-parents col-sm-2 col-xs-12"><a href="<?= WEB_ROOT ?>/a-index.php">Home
                <div class="d-flex home-content">
                    <a class="cate-items" href="<?= WEB_ROOT ?>/a-index.php">最新消息</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/a-index.php">優惠活動</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/a-index.php">新品上市</a>
                </div>
            </a></li>
        <li class="cate-parents col-sm-2 col-xs-12"><a href="<?= WEB_ROOT ?>/news-article-index.php">News
                <div class="d-flex news-content">
                    <a class="cate-items" href="<?= WEB_ROOT ?>/news-article-index.php">所有消息</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/news-article-index.php">門市活動</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/news-article-index.php">企業合作</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/news-article-index.php">市集展會</a>
                </div>
            </a></li>
        <li class="cate-parents col-sm-2 col-xs-12"><a href="<?= WEB_ROOT ?>/aboutus-index.php">About Us
                <div class="d-flex about-content">
                    <a class="cate-items" href="<?= WEB_ROOT ?>/aboutus-index.php">品牌介紹</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/aboutus-index.php">團隊介紹</a>
                </div>
            </a></li>
        <li class="cate-parents col-sm-2 col-xs-12"><a href="<?= WEB_ROOT ?>/ourdesign-index.php">Our Design
                <div class="d-flex our-content">
                    <a class="cate-items" href="<?= WEB_ROOT ?>/ourdesign03-article.php">聯名商品</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/ourdesign02-article.php">主題商品</a>
                </div>
            </a></li>
        <li class="cate-parents col-sm-2 col-xs-12"><a href="<?= WEB_ROOT ?>/onlineshop-index.php">Online Shop
                <div class="d-flex shop-content">
                    <a class="cate-items" style="color: #E0B872;" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/onlineshop-index.php">All</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrival</a>


                    <div class="cate-items-p">
                        <a class="cate-items">+Bags</a>
                        <div class="third-menu">
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">ALL</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">手提包</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">側背包</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">電腦包</a>
                        </div>
                    </div>
                    <div class="cate-items-p">
                        <a class="cate-items">+Clothings</a>
                        <div class="third-menu">
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">ALL</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">大人</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">小孩</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">帽子</a>
                        </div>
                    </div>
                    <div class="cate-items-p">
                        <a class="cate-items">+Living</a>
                        <div class="third-menu">
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">ALL</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">文具</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">收納袋</a>
                            <a class="cate-items-child" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">便當包巾</a>
                        </div>
                    </div>
                </div>
            </a></li>
        <li class="cate-parents col-sm-2 col-xs-12"><a href="<?= WEB_ROOT ?>/course_index.php">Course
                <div class="d-flex course-content">
                    <a class="cate-items" href="<?= WEB_ROOT ?>/course02.php">課程資訊</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/course02.php">預約課程</a>
                    <a class="cate-items" href="<?= WEB_ROOT ?>/course_index.php">活動案例</a>
                </div>
            </a></li>
    </ul>
</div>
<!-- ----手機下方固定選單--- -->
<div class="f-mobile-fix">
    <div class="f-mobile-links">
        <ul class="row f-link-space ">
            <li class="nav-items-m"><a href="<?= WEB_ROOT ?>/onlineshop-index.php"><img src="../img/shop.svg" alt="" style="height: 32px;"></a>
                <p class="font6 p-1">商店</p>
            </li>
            <li class="nav-items-m"><a href="<?= WEB_ROOT ?>/login.php"><img src="../img/icon_member_w.svg" alt=""></a>
                <p class="font6 p-1">會員</p></a>
            </li>
            <li class="nav-items-m"><a href="<?= WEB_ROOT ?>/wishlist-web.php"><img src="../img/icon_love_w.svg" alt=""></a>
                <p class="font6 p-1">收藏清單</p>
            </li>
            <li class="nav-items-m"><a href="<?= WEB_ROOT ?>/shoppingcart01.php"><img src="../img/icon_cart_w.svg" alt=""></a>
                <p class="font6 p-1">購物車</p>
            </li>
        </ul>
    </div>
</div>
<div class="box">