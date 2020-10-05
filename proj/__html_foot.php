<style>
a{
    text-decoration: none;
}

.footer{
    width: 100%;
    background: #e7e1d2;
    height: 250px;
    font-size: 13px;
    font-weight: 100;
    letter-spacing: 0.3px;
    white-space: nowrap;
}
.f-box1{
    align-items: center;
}
.f-box2{
    display: flex;
    border-left: 1px solid #465038;
    border-right: 1px solid #465038;
}
.f-box3{
    display: flex;
    font-size: 16px;
    font-weight: 300;
    padding-left: 100px;
}
.f-box3 a{
    color: #465038;
}
.ct-box2,.ct-box3,.ct-box4,.l-box{
    padding-top: 15px;
}
.footer-icon{
    width: 25px;
    /* height: 25px; */
    margin:0 15px 0 0;
}
.logo_sign{
    width: 138px;   
}
@media screen and (max-width: 768px){
    .f-box,.ct-box1,.ct-box2,.ct-box3,.ct-box4{
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }
    .f-box1{
        display: flex;
        flex-direction: column;
}
    .f-box2,.f-box3{
        display: none;
    }
}
</style>
</div>
<footer class="footer d-flex justify-content-center align-items-center ">
<div class="container f-box">
    <div class="row ">


        <div class="f-box1 col-md-4">
            <div class="col ct-box1">
            <a href="#"><img class="footer-icon" src="../img/icon_ig.svg" alt=""></a>
            <a href="#"><img class="footer-icon" src="../img/icon_fb.svg" alt=""></a>
            <a href="#"><img class="footer-icon" src="../img/icon_line.svg" alt=""></a>
            <a href="#"><img class="footer-icon" src="../img/icon_youtube.svg" alt=""></a>
            </div>
            <div class="col ct-box2"><span>0800-000-000</span></div>
            <div class="col ct-box3"><span>service@pugrace.com.tw</span></div>
            <div class="col ct-box4"><span>© Pugrace 2020 All Rights Reserved</span></div>
        </div>

        <div class="f-box2 col-md-4  justify-content-center align-items-center ">
        <a href="<?= WEB_ROOT ?>/a-index.php"><img class="logo_sign" src="../img/pugrace_logo_sign.png" alt=""></a>
        </div>

        <div class="f-box3 col-md-4  justify-content-end align-items-center">
            <div class="row ">
                <div class="col-6 ">
                    <a href="<?= WEB_ROOT ?>/a-index.php">
                        <sapn>Home</sapn>
                    </a>
                </div>
                <div class="col-6 pl-3">
                    <a href="<?= WEB_ROOT ?>/ourdesign-index.php">
                        <sapn>Our Design</sapn>
                    </a>
                </div>
                <div class="col-6 l-box">
                    <a href="<?= WEB_ROOT ?>/news-article-index.php">
                        <sapn>News</sapn>
                    </a>
                </div>
                <div class="col-6 l-box pl-3">
                    <a href="<?= WEB_ROOT ?>/onlineshop-index.php">
                        <sapn>Online Shop</sapn>
                    </a>
                </div>
                <div class="col-6 l-box">
                    <a href="<?= WEB_ROOT ?>/aboutus-index.php">
                        <sapn>About Us</sapn>
                    </a>
                </div>
                <div class="col-6 l-box pl-3">
                    <a href="<?= WEB_ROOT ?>/course_index.php">
                        <sapn>Course</sapn>
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>
</footer>
<!-- 共用按鈕 -->

</body>
</html>