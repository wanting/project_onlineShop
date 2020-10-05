<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>

<?php include __DIR__ . '/__html_head.php' ?>

<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<style>
  .f-nav,
  .cate,
  .burger-menu {
    display: none;
  }

  @media screen and (max-width: 576px) {

    .f-nav,
    .burger-menu {
      display: block;
    }
  }

  .a-logo-mobile {
    display: none;
  }

  @media screen and (max-width: 576px) {
    .a-logo-mobile {
      display: block;
    }

    .a-logo-mobile>img {
      width: 150px;
    }
  }


  li {
    list-style: none;
  }

  .a-bg-attachment {
    background-attachment: fixed;
  }

  /* ------------------Navbar------------------ */
  .a-nav {
    max-width: 1140px;
    display: flex;
  }

  @media screen and (max-width:576px) {
    .a-nav {
      display: none;
    }
  }

  .a-nav-menu {
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    position: relative;
  }

  .a-nav-submenu {
    margin: 30px 0 0 0;
    display: none;
  }

  .a-nav-item {
    display: flex;
    justify-content: center;
    margin: 10px 20px;
    letter-spacing: 2px;
  }

  .a-nav-menu li {
    padding: 10px;
    text-align: center;
  }

  .a-nav-item:hover>.a-nav-submenu {
    display: block;
  }

  .a-nav-submenu {
    width: 120px;
    position: absolute;
    padding: 0;
  }

  .a-nav-submenu li {
    padding: 10px 0;
    border-bottom: 1px solid #465038;
  }

  .a-nav-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0;
  }

  .a-nav-icon>a {
    width: 20px;
    margin: 0 10px;
  }

  .a-logo>img {
    width: 100px;
    margin: 0 10px;
  }

  .a-nav-item img {
    width: 20px;
    margin: 10px 0;
  }

  .a-nav-item>a:hover {
    text-decoration: none;
    color: #cf7e60;
    border: 0;
    transition: 0.3s;
  }

  /* ---------------------overlay--------------------- */
  .overlay {
    z-index: 5;
    position: absolute;
    width: 100%;
    height: 100vh;
    background: #fff;
    top: 0%;
  }

  .overlay .font3 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-weight: bolder;
    letter-spacing: 12px;
  }


  /* -----------------slider--------------------- */
  .slider-container {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
    height: 100vh;
    /* width: 100vw; */
  }

  .slide {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    height: 100%;
    width: 100%;
    transform: scale(1.1);
    transition: opacity 0.6s ease;
  }

  .slide.active {
    animation: grow 4s linear forwards;
    opacity: 1;
  }

  @keyframes grow {

    0%,
    20% {
      transform: scale(1);
    }

    75%,
    100% {
      transform: scale(1.15);
    }
  }

  .controls-container {
    position: absolute;
    top: 50%;
    right: 10px;
    display: flex;
    flex-direction: column;
    transform: translateY(-50%);
    z-index: 2;
  }

  .control {
    background-color: #fff;
    cursor: pointer;
    opacity: 0.5;
    margin: 6px;
    height: 40px;
    width: 5px;
    transition: opacity 0.3s, background-color 0.3s, transform 0.3s;
  }

  .control.active,
  .control:hover {
    background-color: #fff;
    opacity: 1;
    transform: scale(1.2);
  }

  .a-kv-container {
    /* width: 100%; */
    height: 100vh;
    max-width: 1140px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: column;
    padding: 3rem 0 0 0;
    margin: 0 auto;
    z-index: 2;
  }

  @media screen and (max-width: 576px) {
    .a-kv-container {
      padding: 2rem 0 7rem 0;
    }

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
    padding: 5rem 0;
  }

  @media screen and (max-width: 576px) {
    .a-py-6 {
      padding: 3rem 0;
    }
  }

  /* ------------------search------------------ */
  /* .a-search-icon {
    width: 30px;
    height: auto;
    margin: 0 0 0 10px;
  }

  .a-searchbar {
    display: flex;
    align-items: center;
    margin-bottom: 15%;
  }

  @media screen and (max-width:576px) {
    .a-searchbar {
      display: none;
    }
  }

  .a-input {
    width: 200px;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #465038;
    color: #465038;
    box-sizing: border-box;
    height: 50px;
    padding: 10px;
    position: relative;
  }

  input::-webkit-input-placeholder {
    color: #465038;
  }

  input:focus::-webkit-input-placeholder {
    color: #465038;
  }

  .a-input:focus+.a-underline {
    transform: scale(1);
  }

  .a-underline {
    background-color: #465038;
    display: inline-block;
    height: 2px;
    width: 202px;
    margin-top: 60px;
    position: absolute;
    -webkit-transform: scale(0, 1);
    transform: scale(0, 1);
    -webkit-transition: all 0.5s linear;
    transition: all 0.5s linear;
  } */
  /* ------------------Scroll mouse---------------- */
  @keyframes scroll-inner {
    from {
      margin-top: 15%;
    }

    to {
      margin-top: 50%;
    }
  }

  @keyframes scroll-mouse {
    from {
      margin-top: 0;
    }

    to {
      margin-top: 15px;
    }
  }

  div.mouse-container {
    position: relative;
    display: block;
    height: 100px;
  }

  div.mouse {
    position: relative;
    margin: 0 auto;
    display: block;
    width: 30px;
    height: 55px;
    border: solid 2px #fff;
    border-radius: 25px;
    animation: scroll-mouse 1.5s;
    animation-iteration-count: infinite;
  }

  div.mouse span.scroll-down {
    display: block;
    width: 10px;
    height: 10px;
    background: #fff;
    border-radius: 50%;
    margin: 15% auto auto auto;
    animation: scroll-inner 1.5s;
    animation-iteration-count: infinite;
    animation-timing-function: ease;
  }

  /* ------------------Go Store------------------ */
  .navbtn-group {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  /* ------------------最新消息------------------ */
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

  .news-img:hover .a-figure-img {
    opacity: 0.3;
    transition: 0.5s;
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

  /* ------------------優惠活動------------------ */
  .a-promotion-l {
    max-width: 100%;
    height: auto;
  }

  .a-promotion-r {
    width: 570px;
    height: 350px;
    background-color: #e0b872;
  }

  @media screen and (max-width:576px) {
    .a-promotion-l {
      max-width: 100%;
      height: auto;
    }

    .a-promotion-r {
      width: 100%;
      height: 240px;
    }
  }

  /* ------------------新品上市------------------ */
  .a-new-figure>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* ------------------門市位置------------------ */
  .a-location-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  @media screen and (max-width:576px) {
    .a-location-info {
      flex-direction: column;
    }
  }

  .a-store-pic {
    width: 300px;
    height: auto;
  }

  @media screen and (max-width:576px) {
    .a-store-pic {
      width: 100%;
    }

    .a-location-info>img {
      margin-top: 1rem;
    }
  }

  .a-location-btn {
    color: #465038;
    margin: 0;
    padding: 1rem 0;
    max-width: 100%;
    border-top: solid 0.5px #465038;
  }

  .a-location-menu {
    color: #465038;
    background-color: #fff;
    padding: 2rem;
    margin: 0;
  }

  @media screen and (max-width:576px) {
    .a-map {
      width: 80vw;
    }
  }

  /* fadeInUp */
  .animatable {
    /* initially hide animatable objects */
    visibility: hidden;

  }

  /* show objects being animated */
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

  /* ------------------Course-Banner------------------ */
  .a-course-bn {
    max-width: 1140px;
    width: 100%;
    height: 400px;
    overflow: hidden;
    margin: 0 auto;
    background-size: cover;
  }

  @media screen and (max-width:576px) {
    .a-course-bn {
      max-width: 80%;
      height: auto;
    }
  }

  .a-bn-container {
    max-width: 1140px;
    padding: 0;
    margin: 0 auto;
  }

  /* ------------------before after------------------ */

  .a-bn-container {
    max-width: 1140px;
    padding: 0;
    margin: 0 auto;
  }

  .ba-slider {
    position: relative;
    overflow: hidden;
  }

  .ba-slider img {
    max-width: 1140px;
    width: 100%;
    display: block;
  }

  .resize {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 50%;
    overflow: hidden;
  }

  .handle {
    /* Thin line seperator */
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 4px;
    margin-left: -2px;
    background: rgba(0, 0, 0, 0.5);
    cursor: ew-resize;
  }

  .handle:after {
    /* Big orange knob  */
    position: absolute;
    top: 35%;
    width: 50px;
    height: 50px;
    margin: -25px 0 0 -25px;
    content: '\21d4';
    color: white;
    font-weight: bold;
    font-size: 30px;
    text-align: center;
    background: #ffb800;
    /* @orange */
    border: 1px solid #e6a600;
    /* darken(@orange, 5%) */
    border-radius: 50%;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3), inset 0 2px 0 rgba(255, 255, 255, 0.5), inset 0 60px 50px -30px #ffd466;
    /* lighten(@orange, 20%)*/
  }

  @media screen and (max-width:576px) {
    .handle:after {
      top: 50%;
    }
  }

  .draggable:after {
    width: 36px;
    height: 36px;
    margin: -18px 0 0 -18px;
    font-size: 22px;
  }
</style>

<!-- KV -->
<div class="overlay">
  <h3 class="font3">The pattern way of life !</h3>
</div>

<div class="slider-container">
  <div class="slide" style="background-image: url(../img/cover1.jpg);"></div>
  <div class="slide" style="background-image: url(../img/cover2.jpg);"></div>
  <div class="slide" style="background-image: url(../img/cover3.jpg);"></div>
  <div class="slide" style="background-image: url(../img/cover4.jpg);"></div>
  <div class="controls-container">
    <div class="control"></div>
    <div class="control"></div>
    <div class="control"></div>
    <div class="control"></div>
  </div>

  <div class="a-kv-container">
    <!-- navbar -->
    <div class="a-logo-mobile">
      <img src="../img/pugrace_logo_sign.png" alt="">
    </div>
    <div class="a-nav">
      <ul class="a-nav-menu">
        <li class="a-nav-item font4">
          <a href="<?= WEB_ROOT ?>/news-article-index.php">News</a>
          <ul class="a-nav-submenu">
            <li class="font6"><a href="<?= WEB_ROOT ?>/news-article-index.php">所有消息</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/news-article-index.php">門市活動</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/news-article-index.php">企業合作</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/news-article-index.php">市集展會</a></li>
          </ul>
        </li>
        <li class="a-nav-item font4">
          <a href="<?= WEB_ROOT ?>/aboutus-index.php">About Us</a>
          <ul class="a-nav-submenu">
            <li class="font6"><a href="<?= WEB_ROOT ?>/aboutus-index.php">品牌介紹</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/aboutus-index.php">團隊介紹</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/aboutus-index.php">聯絡我們</a></li>
          </ul>
        </li>
        <li class="a-nav-item font4">
          <a href="<?= WEB_ROOT ?>/ourdesign-index.php">Our Design</a>
          <ul class="a-nav-submenu">
            <li class="font6"><a href="<?= WEB_ROOT ?>/ourdesign02-article.php">主題商品</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/ourdesign03-article.php">聯名商品</a></li>
          </ul>
        </li>
        <li class="a-logo"><img src="../img/logo.png" alt="" /></li>
        <li class="a-nav-item font4">
          <a class="text-nowrap" href="<?= WEB_ROOT ?>/onlineshop-index.php">Online Shop</a>
          <ul class="a-nav-submenu">
            <li class="font6"><a href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrival</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
          </ul>
        </li>
        <li class="a-nav-item font4">
          <a href="<?= WEB_ROOT ?>/course_index.php">Course</a>
          <ul class="a-nav-submenu">
            <li class="font6"><a href="<?= WEB_ROOT ?>/course02.php">課程資訊</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/course02.php">預約課程</a></li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/course_index.php">活動案例</a></li>
          </ul>
        </li>
      </ul>
      <ul class="a-nav-icon ">
        <a href="<?= WEB_ROOT ?>/wishlist-web.php">
          <img src="../img/icon_love.svg" alt="" />
        </a>
        <div class="a-nav-item">
          <a href="<?= WEB_ROOT ?>/member-index.php">
            <img src="../img/icon_member.svg" alt="" />
          </a>

          <ul class="a-nav-submenu text-center">
            <li class="font6">
              <span id="a-member_login">
                <?= $_SESSION['member']['name'] ?>
              </span>
              <span id="a-visiter">訪客</span>
              <span>，您好</span>
            </li>
            <li class="font6"><a href="<?= WEB_ROOT ?>/member-index.php">會員中心</a></li>
            <li class="font6" id="a-login_flag"><a href="<?= WEB_ROOT ?>/login.php">登入</a></li>
            <li class="font6" id="a-logout_flag"><a href="<?= WEB_ROOT ?>/logout.php">登出</a></li>
            <li class="font6" id="a-register"><a href="<?= WEB_ROOT ?>/register.php">註冊</a></li>
          </ul>
        </div>
        <a href="<?= WEB_ROOT ?>/shoppingcart01.php">
          <img src="../img/icon_cart.svg" alt="">
        </a>
        <span class="badge badge-pill cart-count" style="margin-top:5px;">0</span>
      </ul>
    </div>
    <div class="navbtn-group">
      <!-- 搜尋bar -->
      <!-- <div class="a-searchbar">
        <div class="d-flex flex-column">
          <input class="a-input font4" placeholder="Search" type="search">
          <span class="a-underline"></span>
        </div>
        <a href="">
          <img class="a-search-icon" src="../img/icon_search.svg" alt="">
        </a>
      </div> -->

      <!-- Go Store -->
      <a href="<?= WEB_ROOT ?>/onlineshop-index.php" class="green_btn text-center" style="margin-bottom:25px;">Go Store</a>

      <!-- Scroll mouse -->
      <div class='mouse-container'>
        <div class='mouse'>
          <span class='scroll-down'></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 最新消息 -->
<section class="a-py-6">
  <div class="a-container">
    <h2 class="text-center font2 animatable fadeInDown" style="letter-spacing:2px; ">- 最新消息 -</h2>
    <div class="row d-flex justify-content-center a-py-6 animatable fadeInUp">
      <div class="col-md-3 col-6 d-flex justify-content-center">
        <figure class="a-figure">
          <a class="news-img" href="<?= WEB_ROOT ?>/news-article-firm.php">
            <span class="font5 a-img-more text-center" href="">Read More</span>
            <img src="../img/news-img_01.jpg" class="a-figure-img img-fluid" alt="..." />
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

      <div class="col-md-3 col-6 d-flex justify-content-center">
        <figure class="a-figure">
          <a class="news-img" href="<?= WEB_ROOT ?>/ourdesign03-article.php">
            <span class="font5 a-img-more text-center" href="">Read More</span>
            <img src="../img/news-img_02.jpg" class="a-figure-img img-fluid" alt="..." />
          </a>
          <a href="<?= WEB_ROOT ?>/ourdesign03-article.php">
            <figcaption class="a-figure-caption-s text-center font6">
              共好的跨界火花
            </figcaption>
            <figcaption class="a-figure-caption text-center font3">
              Pugrace x Pantel
            </figcaption>
          </a>
        </figure>
      </div>
      <div class="col-md-3 col-6 d-flex justify-content-center">
        <figure class="a-figure">
          <a class="news-img" href="">
            <span class="font5 a-img-more text-center" href="">Read More</span>
            <img src="../img/news-img_03.jpg" class="a-figure-img img-fluid" alt="..." />
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
      <div class="col-md-3 col-6 d-flex justify-content-center">
        <figure class="a-figure">
          <a class="news-img" href="">
            <span class="font5 a-img-more text-center" href="">Read More</span>
            <img src="../img/news-img_04.jpg" class="a-figure-img img-fluid" alt="..." />
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
    </div>
    <div class="text-center">
      <a href="<?= WEB_ROOT ?>/news-article-index.php" class="green_btn">閱讀更多</a>
    </div>
  </div>
</section>
<!-- 優惠活動 -->
<section class="a-py-6" style="background-color: rgba(224, 184, 114, 0.2);">
  <div class="a-container">
    <h2 class="text-center font2 animatable fadeInDown" style="letter-spacing:2px; ">- 優惠活動 -</h2>
    <div class=" animatable fadeInUp row d-flex justify-content-center align-items-center a-py-6">
      <a href="a-promotion-l ">
        <img src="../img/sale-img.jpg" class="a-promotion-l" alt="" />
      </a>
      <div class="a-promotion-r d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-center font2" style="margin-bottom: 1rem; letter-spacing:3px; line-height: 1.5;">
          Summer Sale
        </h2>
        <h6 class="text-center font6" style="line-height: 2; letter-spacing:2px;">
          UP TO 50% OFF<br />
          Fachion & HOME ITEMS
        </h6>
        <div class="text-center" style="margin-top: 1.5rem;">
          <a href="<?= WEB_ROOT ?>/onlineshop-sale.php" class="green_btn">去逛逛</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 新品上市 -->
<section class="a-py-6">
  <div class="a-container">
    <h2 class="text-center font2 animatable fadeInDown" style="letter-spacing:2px; ">- 新品上市 -</h2>
    <div class=" animatable fadeInUp row d-flex justify-content-center a-py-6">
      <div class="col-md-4 col-12" style="margin-bottom: 1.5rem;">
        <a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">
          <figure class="a-new-figure">
            <figcaption class="a-newseries-figcaption font4">
              《花草森林系》系列
            </figcaption>
            <img src="../img/new_01.jpg" class="" alt="..." />
          </figure>
        </a>
      </div>
      <div class="col-md-4 col-12" style="margin-bottom: 1.5rem;">
        <a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">
          <figure class="a-new-figure">
            <figcaption class="a-newseries-figcaption font4">
              《動物之森系》系列
            </figcaption>
            <img src="../img/new_02.jpg" class="" alt="..." />
          </figure>
        </a>
      </div>
      <div class="col-md-4 col-12" style="margin-bottom: 1.5rem;">
        <a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">
          <figure class="a-new-figure">
            <figcaption class="a-newseries-figcaption font4">
              《幾何療育系》系列
            </figcaption>
            <img src="../img/new_03.jpg" alt="" />
          </figure>
        </a>
      </div>
    </div>
    <div class="text-center">
      <a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php" class="green_btn">閱讀更多</a>
    </div>
  </div>
</section>
<section class="a-py-6" style="background-color: rgba(224, 184, 114, 0.2);">
  <!-- Banner -->
  <h2 class="text-center font2 animatable fadeInDown" style="letter-spacing:2px; ">- 課程資訊 - </h2>
  <div class="py-5 a-course-bn animatable fadeInUp">
    <div class="ba-slider" data-aos="fade-up" data-aos-duration="2000">
      <img src="../img/class-before.jpg" alt="">
      <div class="resize">
        <img src="../img/class-after.jpg" alt="">
      </div>
      <span class="handle"></span>
    </div>
  </div>
  <div class="text-center" style="margin-top:50px;">
      <a href="<?= WEB_ROOT ?>/course_index.php" class="green_btn">閱讀更多</a>
    </div>
</section>
<!-- 門市位置 -->
<section class="a-py-6">
  <h2 class="text-center font2 animatable fadeInDown" style="letter-spacing:2px;">- 門市位置 -</h2>
  <div class="py-5">
    <div class="a-container animatable fadeInUp">
      <!-- 北部 -->
      <div onclick="toggleMenu(1);" class="text-center a-location-btn font3">
        <div class="d-flex justify-content-center align-items-center">
          <div class="mr-3">
            北部
          </div>
          <div style="width: 40px">
            <img class="a-menu-icon-1 img-fluid" src="../img/icon_add.svg">
          </div>
        </div>

      </div>
      <ul id="menu-1" class="a-location-menu " style="display: none">
        <li>
          <div class="a-location-info">
            <div class="d-flex flex-column justify-content-center align-items-start">
              <h4 class="font4" style="margin-bottom: 1rem;">Pugrace 旗艦店</h4>
              <h6 class="font6" style="text-align: left; letter-spacing: 1.5px; line-height: 2;margin-bottom:0;">地址｜106 台北市大安區復興南路一段390號3樓<br>
                電話｜(02)2959-5971<br>
                營業時間｜上午11:00 - 晚上10:00
              </h6>
            </div>
            <img class="a-store-pic" src="../img/store-tpe.jpg" alt="">
          </div>
        </li>
      </ul>

      <!-- 中部 -->
      <div onclick="toggleMenu(2);" class="text-center a-location-btn font3">
        <div class="d-flex justify-content-center align-items-center">
          <div class="mr-3">
            中部
          </div>
          <div style="width: 40px">
            <img class="a-menu-icon-2 img-fluid" src="../img/icon_add.svg">
          </div>
        </div>
      </div>
      <ul id="menu-2" class="a-location-menu" style="display: none">
        <li>
          <div class="a-location-info">
            <div class="d-flex flex-column justify-content-center align-items-start h-100">
              <h4 class="font4" style="margin-bottom: 1rem;">Pugrace 台中店</h4>
              <h6 class="font6" style="text-align: left; letter-spacing: 1.5px; line-height: 2;margin-bottom:0;">地址｜407台中市西屯區台灣大道三段251號3樓<br>電話｜(04)04 2254-4159<br>營業時間｜上午11:00 - 晚上10:00
              </h6>
            </div>
            <img class="a-store-pic" src="../img/store-txg.jpg" alt="">
          </div>
        </li>
      </ul>


      <!-- 南部 -->
      <div onclick="toggleMenu(3);" class="text-center a-location-btn font3">
        <div class="d-flex justify-content-center align-items-center">
          <div class="mr-3">
            南部
          </div>
          <div style="width: 40px">
            <img class="a-menu-icon-3 img-fluid" src="../img/icon_add.svg">
          </div>
        </div>
      </div>

      <ul id="menu-3" class="a-location-menu" style="display: none">
        <li>
          <div class="a-location-info">
            <div class="d-flex flex-column justify-content-center align-items-start">
              <h4 class="font4" style="margin-bottom: 1rem;">Pugrace 台南店</h4>
              <h6 class="font6" style="text-align: left; letter-spacing: 1.5px; line-height: 2;margin-bottom:0;">地址｜701台南市東區中華東路一段366號1樓<br>電話｜(06) 208-1765<br>營業時間｜上午11:00 - 晚上10:00
              </h6>
            </div>
            <img class="a-store-pic" src="../img/store-tnn.jpg" alt="">
          </div>
        </li>
      </ul>
      <div class="text-center a-location-btn"></div>
      <iframe class="a-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.0112910777298!2d121.54038681484174!3d25.033690883972515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abd4825ecdf1%3A0xa9479a36fc6b99d0!2sDigital%20Education%20Institute%2C%20III!5e0!3m2!1szh-TW!2stw!4v1592732222387!5m2!1szh-TW!2stw" width="1140" height="300" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>
</section>

<div id="goTop" class="top" onclick="goTop();">
  <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script>
  // fadeInUp
  jQuery(function($) {
    // Function which adds the 'animated' class to any '.animatable' in view
    var doAnimations = function() {
      // Calc current offset and get all animatables
      var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $(".animatable");

      // Unbind scroll handler if we have no animatables
      if ($animatables.length == 0) {
        $(window).off("scroll", doAnimations);
      }

      // Check all animatables and animate them if necessary
      $animatables.each(function(i) {
        var $animatable = $(this);
        // if ($animatable.offset().top + $animatable.height() - 20 < offset) {
        if ($animatable.offset().top - 20 < offset) {
          $animatable.removeClass("animatable").addClass("animated");
        }
      });
    };

    // Hook doAnimations on scroll, and trigger a scroll
    $(window).on("scroll", doAnimations);
    $(window).trigger("scroll");
  });
  // --------------------------greensock--------------------------
  TweenMax.to(".overlay .font3", 2, {
    opacity: 0,
    y: -60,
    ease: Expo.easeInOut,
  });

  TweenMax.to(".overlay", 2, {
    delay: 1,
    top: "-100%",
    ease: Expo.easeInOut,
  });
  TweenMax.from(".a-nav, .navbtn-group", 1, {
    delay: 2,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut,
  });
  TweenMax.from(".a-logo-mobile", 1, {
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut,
  });

  // --------------------------slider--------------------------
  const slides = document.querySelectorAll(".slide");
  const controls = document.querySelectorAll(".control");
  let activeSlide = 0;
  let prevActive = 0;

  changeSlides();
  let int = setInterval(changeSlides, 5000);

  function changeSlides() {
    slides[prevActive].classList.remove("active");
    controls[prevActive].classList.remove("active");

    slides[activeSlide].classList.add("active");
    controls[activeSlide].classList.add("active");

    prevActive = activeSlide++;

    if (activeSlide >= slides.length) {
      activeSlide = 0;
    }

    console.log(prevActive, activeSlide);
  }

  controls.forEach((control) => {
    control.addEventListener("click", () => {
      let idx = [...controls].findIndex((c) => c === control);
      activeSlide = idx;

      changeSlides();

      clearInterval(int);
      int = setInterval(changeSlides, 4000);
    });
  });
  // -----------------------before after----------------------------

  // Call & init
  $(document).ready(function() {
    $('.ba-slider').each(function() {
      var cur = $(this);
      // Adjust the slider
      var width = cur.width() + 'px';
      cur.find('.resize img').css('width', width);
      // Bind dragging events
      drags(cur.find('.handle'), cur.find('.resize'), cur);
    });
  });

  // Update sliders on resize. 
  // Because we all do this: i.imgur.com/YkbaV.gif
  $(window).resize(function() {
    $('.ba-slider').each(function() {
      var cur = $(this);
      var width = cur.width() + 'px';
      cur.find('.resize img').css('width', width);
    });
  });

  function drags(dragElement, resizeElement, container) {

    // Initialize the dragging event on mousedown.
    dragElement.on('mousedown touchstart', function(e) {

      dragElement.addClass('draggable');
      resizeElement.addClass('resizable');

      // Check if it's a mouse or touch event and pass along the correct value
      var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

      // Get the initial position
      var dragWidth = dragElement.outerWidth(),
        posX = dragElement.offset().left + dragWidth - startX,
        containerOffset = container.offset().left,
        containerWidth = container.outerWidth();

      // Set limits
      minLeft = containerOffset + 10;
      maxLeft = containerOffset + containerWidth - dragWidth - 10;

      // Calculate the dragging distance on mousemove.
      dragElement.parents().on("mousemove touchmove", function(e) {

        // Check if it's a mouse or touch event and pass along the correct value
        var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

        leftValue = moveX + posX - dragWidth;

        // Prevent going off limits
        if (leftValue < minLeft) {
          leftValue = minLeft;
        } else if (leftValue > maxLeft) {
          leftValue = maxLeft;
        }

        // Translate the handle's left value to masked divs width.
        widthValue = (leftValue + dragWidth / 2 - containerOffset) * 100 / containerWidth + '%';

        // Set the new values for the slider and the handle. 
        // Bind mouseup events to stop dragging.
        $('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function() {
          $(this).removeClass('draggable');
          resizeElement.removeClass('resizable');
        });
        $('.resizable').css('width', widthValue);
      }).on('mouseup touchend touchcancel', function() {
        dragElement.removeClass('draggable');
        resizeElement.removeClass('resizable');
      });
      e.preventDefault();
    }).on('mouseup touchend touchcancel', function(e) {
      dragElement.removeClass('draggable');
      resizeElement.removeClass('resizable');
    });
  }
  // --------------------------location--------------------------
  function toggleMenu(number) {
    var menu = $("#menu-" + number)
    var icon = $(`.a-menu-icon-${number}`) // 先抓到html element，用jQuery或DOM操作
    var $menu = $(menu);
    if (menu.css('display') == "none") {
      icon.attr('src', '../img/icon_remove.svg'); // 改變element的attribute，去替換它的圖片路徑
      $menu.slideDown();

    } else {
      icon.attr('src', '../img/icon_add.svg');
      $menu.slideUp();
    }
  }


  //navbar顯示登入或登出
  var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

  if (!login_success) {
    $("#a-login_flag").show();
    $("#a-logout_flag").hide();
    $("#a-member_login").hide();
    $("#a-visiter").show();
    $("#a-register").show();
  } else {
    $("#a-login_flag").hide();
    $("#a-logout_flag").show();
    $("#a-member_login").show();
    $("#a-visiter").hide();
    $("#a-register").hide();
  }
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->