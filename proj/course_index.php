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

    .a-linedot {
        max-width: 1140px;
        width: 100%;
        border: 1.5px dashed #465038;
        margin: 0 0 50px 0;
    }

    @media screen and (max-width:576px) {
        .a-linedot {
            margin: 0;
        }
    }

    .a-container {
        max-width: 1140px;
        padding: 0;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
    }

    .a-cover-fit {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media screen and (max-width:576px) {
        .a-container {
            margin: 0 10%;
        }
    }

    .a-py-6 {
        padding: 3.125rem 0;
    }



    /* ------------------menu 特效------------------*/

    .a-main-nav {
        width: 100%;
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
        z-index: 3;
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
            width: 100%;
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
            margin-top: 50px;
        }
    }

    .a-bn-container {
        max-width: 1140px;
        padding: 0;
        margin: 0 auto;
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

    /* ------------------before after------------------ */
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

    /* ------------------課程nav------------------ */

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

    /* ------------------課程資訊------------------ */
    .a-course-box {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 3.5rem;
        background: rgba(255, 255, 255, 0.8);
        ;
        position: absolute;
        width: 50%;
        margin: 15px;
        height: 320px;
    }

    .a-course-box a {
        max-width: 250px;
        width: 100%;
        text-align: center;
    }

    @media screen and (max-width:576px) {
        .a-course-box {
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            margin: 0;
            text-align: center;
        }

        .a-course-box a {
            width: 80%;
        }
    }

    .a-course-box>.font6 {
        line-height: 2;
    }

    .a-course-info {
        width: 100%;
        margin: 50px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .a-course-info>span {
        text-align: center;
    }

    .a-figure-group {
        padding: 0 100px;
    }

    .a-course-img {
        position: relative;

        height: 350px;
        margin: 4rem 0;
    }

    @media screen and (max-width:576px) {
        .a-course-img {
            max-width: 100%;
        }
        .a-figure-group {
        padding: 0 ;
    }
    }

    .a-course-figure {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
        /* background-size: cover; */
    }

    .a-course-figure img {
        transform: scale(1, 1);
        transition: all 1s ease-out;
    }

    .a-course-figure img:hover {
        transform: scale(1.2, 1.2);
    }

    /* ------------------課程預約------------------ */

    .a-silkscreen-l {
        max-width: 100%;
        height: auto;
    }

    .a-silkscreen-r {
        width: 570px;
        height: 350px;
        background-color: #e8e2d4;
    }

    @media screen and (max-width:576px) {
        .a-silkscreen-l {
            max-width: 100%;
            height: auto;
        }

        .a-silkscreen-r {
            width: 100%;
            height: 240px;
        }
    }

    /* ------------------活動案例------------------ */
    .a-event-card {
        padding: 0 35px;
    }

    .a-event-figure {
        width: 500px;
        height: 245px;
        overflow: hidden;
        margin: 0 0 3.5rem 0;
        background-size: cover;
        position: relative;
    }

    .a-event-figure img {
        transform: scale(1, 1);
        transition: all 1s ease-out;
    }

    .a-event-figure img:hover {
        transform: scale(1.2, 1.2);
    }

    @media screen and (max-width:576px) {
        .a-event-figure {
            width: 100%;
            height: auto;
        }

        .a-event-card {
            padding: 0;
        }
    }

    .a-event-p {
        background: #465038;
        position: absolute;
        opacity: 0.7;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px 0;

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
<!-- 課程nav -->
<section class="a-py-6">
    <div class="a-container">
        <h1 class="font1 animated fadeInDown" style="margin:0;">Course</h1>
        <ul class="a-main-nav">
            <li id="a-all-item" class="font3 a-nav-link a-active-link animated fadeInDown">
                <a href="#a-s1">課程資訊</a>
                <div class="a-underline"></div>
            </li>
            <li id="a-item-01" class="font3 a-nav-link animated fadeInDown">
                <a href="#a-s2">課程預約</a>
                <div class="a-underline"></div>
            </li>
            <li id="a-item-02" class="font3 a-nav-link animated fadeInDown">
                <a href="#a-s3">活動案例</a>
                <div class="a-underline"></div>
            </li>
        </ul>
        <!-- 手機下拉選單 -->
        <div class="a-dropdown animated fadeInDown" id="a-drop-down">
            <div class="a-menu">
                <span>課程資訊</span>
                <i class="a-down-arrow "></i>
            </div>
            <label>
                <input type="checkbox">
                <ul>
                    <li val="課程資訊"><a href="#a-s1">課程資訊</a></li>
                    <li val="課程預約"><a href="#a-s2">課程預約</a></li>
                    <li val="活動案例"><a href="#a-s3">活動案例</a></li>
                </ul>
            </label>
        </div>
    </div>
    <div class="a-bn-container">
        <!-- Banner -->
        <div class="a-course-bn">
            <div class="ba-slider" data-aos="fade-up" data-aos-duration="2000">
                <img src="../img/class-before.jpg" alt="">
                <div class="resize">
                    <img src="../img/class-after.jpg" alt="">
                </div>
                <span class="handle"></span>
            </div>
        </div>
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb" class="a-bread-list">
            <ol class="breadcrumb">
                <li class="font5 breadcrumb-item"><a href="<?= WEB_ROOT ?>/a-index.php">Home</a></li>
                <li class="font5 breadcrumb-item active" aria-current="page">Course</li>
            </ol>
        </nav>
    </div>
</section>
<!-- 課程資訊 -->
<section id="a-s1">
    <div class="a-container">
        <h2 class="font2 d-flex justify-content-center">- 課程資訊 -</h2>
        <div class="a-course-info" data-aos="fade-up" data-aos-duration="2000">
            <span class="font4 d-flex justify-content-center" style="letter-spacing: 10px;">每堂課程都會有基礎介紹，和大家一起認識材料、工具，<br>
                所以第一次接觸體驗的同學們不用擔心，<br>
                老師會帶領我們一步一步循序製作唷！</span>
            <div class="a-course-img">
                <div class="a-course-box">
                    <h3 class="font2">絹印手作課程</h3>
                    <h6 class="font6">經典印花課、手工藝作坊，與不定期的品牌小聚、門市活
                        動，北中南三地都有教室，無論是個人興趣或團體包班，
                        都能提供輕鬆、趣味的印花體驗。快來和我們分享絹印的手感溫度吧！</h6>
                    <a class="yellow_btn" href="<?= WEB_ROOT ?>/course02.php">了解更多</a>
                </div>
                <img class="a-cover-fit" src="../img/course01.jpg" alt="" >
            </div>
            <div class="d-flex row a-figure-group">
                <div class="col-md-4 col-12" style="margin-bottom: 1.5rem;">
                    <figure class="a-course-figure">
                        <img src="../img/course-figure01.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    </figure>
                    <figcaption class="text-center font4" style="margin-top:1rem;">個人手作</figcaption>
                </div>
                <div class="col-md-4 col-12" style="margin-bottom: 1.5rem;">
                    <figure class="a-course-figure">
                        <img src="../img/course-figure02.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    </figure>
                    <figcaption class="text-center font4" style="margin-top:1rem;">親子手作</figcaption>
                </div>
                <div class="col-md-4 col-12">
                    <figure class="a-course-figure">
                        <img src="../img/course-figure03.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    </figure>
                    <figcaption class="text-center font4" style="margin-top:1rem;">團體包班</figcaption>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="a-container">
    <div class="a-linedot"></div>
</div>
<!-- 課程預約 -->
<section id="a-s2" class="a-py-6">
    <div class="a-container">
        <h2 class="text-center font2" style="letter-spacing:2px; ">- 課程預約 -</h2>
        <div class="d-flex row justify-content-center align-items-center a-py-6" data-aos="fade-up" data-aos-duration="2000">
            <a href="a-silkscreen-l ">
                <img src="../img/class-reserve.jpg" class="a-silkscreen-l" alt="" />
            </a>
            <div class="a-silkscreen-r d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center font2" style="margin-bottom: 1rem; letter-spacing:3px; line-height: 1.5;">
                    Silk Screen Studio
                </h2>
                <h6 class="text-center font6" style="line-height: 2; letter-spacing:2px;">
                    這裡是Pugrace與網版印刷故事發生的地方，<br>透過課程與手作，深度啟發創力，豐富美感生活。<br>大人的美術課，讓人重拾創作的療癒樂趣!
                </h6>
                <div class="text-center" style="margin-top: 1.5rem;">
                    <a href="<?= WEB_ROOT ?>/course02.php" class="yellow_btn">預約體驗課程</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 活動案例 -->
<section id="a-s3" class="a-py-6" style="background-color: rgba(224, 184, 114, 0.2);">
    <div class="a-container">
        <h2 class="font2">- 在絹印中融入美感練習 -</h2>
        <div class="d-flex row justify-content-center" style="margin-top:50px;"  data-aos="fade-up" data-aos-duration="2000">
            <div class="col-md-6 col-12 a-event-card">
                <div class="a-event-figure">
                    <img src="../img/event-figure01.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    <div class="a-event-p">
                        <h4 class="text-center font4" style="color:#fff; margin:0;">創意發想：將生活記憶轉化為設計元素</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 a-event-card">
                <div class="a-event-figure">
                    <img src="../img/event-figure02.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    <div class="a-event-p">
                        <h4 class="text-center font4" style="color:#fff; margin:0;">調色指引：學習混色、調色並實作渲彩</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 a-event-card">
                <div class="a-event-figure">
                    <img src="../img/event-figure03.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    <div class="a-event-p">
                        <h4 class="text-center font4" style="color:#fff; margin:0;">創意發想：將生活記憶轉化為設計元素</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 a-event-card">
                <div class="a-event-figure">
                    <img src="../img/event-figure04.jpg" class="a-cover-fit" alt="A generic square placeholder image with rounded corners in a figure.">
                    <div class="a-event-p">
                        <h4 class="text-center font4" style="color:#fff; margin:0;">調色指引：學習混色、調色並實作渲彩</h4>
                    </div>
                </div>
            </div>
        </div>
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
    // smooth效果
    $('a[href*="#"]').click(function (event) {
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
    // 頁面特效
    AOS.init();

    //before after
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
    // 頁面切換 underline
    $('.a-nav-link').on('click', function() {
        $('.a-active-link').removeClass('a-active-link');
        $(this).addClass('a-active-link');
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