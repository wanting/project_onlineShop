<?php require __DIR__ . '/__connect_db.php';
$pageName = '收藏清單';


$r_sql = "SELECT * FROM `wishlist` w JOIN `products` p ON p.sid=w.products_id  WHERE member_sid=? ORDER BY w.`created_date` DESC";
$r_stmt = $pdo->prepare($r_sql);
$r_stmt->execute([
    $_SESSION['member']['sid']
]);
$r_row = $r_stmt->fetchAll();

if (empty($r_row)) {
    header('Location:wishlist-empty.php');
}
?>

<?php include __DIR__ . '/__html_head.php' ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/newarrival.css">
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

    /* ------------------menu 特效------------------*/

    .a-main-nav {
        display: flex;
        margin: 50px 0 0 0;
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
            z-index: 2;
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


    /* ------------------商品卡片------------------ */
    .a-card {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 0;
        margin-top: 50px;
        padding: 0 10px;
    }

    .a-card .a-figure {
        width: 300px;
        height: 300px;
        position: relative;
        overflow: hidden;
        /* background-color: #e8e2d4; */
    }

    .a-g-card {
        display: flex;
        /* justify-content: space-between; */
        align-items: center;
        flex-wrap: wrap;
    }

    .a-g-card ul {
        padding: 0;
    }

    .b-card .b-figure {
        width: 350px;
        height: 350px;
        position: relative;
        background-color: #e8e2d4;
    }

    .white_btn {
        /* width: 90%; */
    }

    @media screen and (max-width:576px) {
        .white_btn {
            width: 100%;
        }
    }

    .a-list-group {
        max-width: 300px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: none;
        border: 0;
    }

    .list-group-flush>.list-group-item {
        border: 0;
    }

    /* ------------------愛心收藏------------------ */
    .a-card .a-fa-heart {
        color: #465038;
        position: absolute;
        bottom: 30px;
        right: 30px;
        font-size: 1.7rem;
        z-index: 1;
    }

    @media screen and (max-width:576px) {
        .a-card .a-figure {
            width: 100%;
            height: auto;
        }
    }
</style>
<script>
    var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (!login_success) {
        location.href = 'login.php';
    };
    //判斷是否登入,未登入就跳去登入頁面,登入就載入此頁
</script>


<?php include __DIR__ . '/__navbar.php' ?>

<script>
    //確定登入成功才能繼續收藏商品
    var login_success_order = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (!login_success_order) {
        location.href = 'login.php';
    };

    // if (empty($r_row)) {
    //     header('Location: a-index.php');
    //     exit;
    // };
</script>

<section class="a-py-6">
    <div class="a-container">
        <h1 class="font1 d-flex justify-content-center" style="margin:0;">收藏清單</h1>
        <ul class="a-main-nav">
            <li id="a-item-01" class="font3 a-nav-link a-active-link">
                <a>收藏商品</a>
                <div class="a-underline"></div>
            </li>
            <li id="a-item-02" class="font3 a-nav-link">
                <a>收藏課程</a>
                <div class="a-underline"></div>
            </li>
        </ul>
        <!------------------ 手機下拉選單 ------------------>
        <div class="a-dropdown" id="a-drop-down">
            <div id="a-all-item-m" class="a-menu">
                <span>收藏清單</span>
                <i class="a-down-arrow "></i>
            </div>
            <label>
                <input type="checkbox">
                <ul>
                    <li id="a-item-m-1" val="收藏商品">收藏商品</li>
                    <li id="a-item-m-2" val="收藏課程">收藏課程</li>
                </ul>
            </label>
        </div>
        <!------------------商品卡片------------------>
        <div class="a-g-card">
            <?php foreach ($r_row as $i) : ?>
                <div class="a-card col-lg-4 col-md-6 .b-item ">
                    <figure class="a-figure">
                        <a href="<?= WEB_ROOT ?>/onlineshop-detail.php?sid=<?= $i['sid'] ?>"><img class="img-fit" src="../img/<?= $i['products_id'] ?>_0.jpg" alt=""></a>
                        <i class="fa fa-heart a-fa-heart" data-id="<?= $i['sid'] ?>" id=""></i>
                    </figure>

                    <ul class="a-list-group list-group-flush">
                        <li class="font5 list-group-item a-productName"><?= $i['products_name'] ?></li>
                        <li class="font3 list-group-item">NT$ <?= $i['price'] ?></li>
                        <a class="white_btn my-3 text-center" href="onlineshop-detail.php?sid=<?= $i['sid'] ?>">查看詳情</a>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

</section>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>



<?php include __DIR__ . '/__html_foot.php' ?>

<?php include __DIR__ . '/__scripts.php' ?>

<script>
    // ------------------手機版menu------------------
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

    // ------------------愛心----------------
    // $(".a-fa-heart").on('click', function() {
    //     const sid=$(this).attr('data-id');
    //     //刪除收藏商品
    //     console.log(sid)
    //     $.get('wishlist-api.php', {
    //         action: 'remove',
    //         sid: sid
    //     }, function(data) {
    //         sid.remove();
    //     }, 'json');
    // });

    $(".a-fa-heart").on('click', function() {
        const p_item = $(this).closest('.b-item');
        const sid = $(this).attr('data-id');
        //刪除收藏商品
        console.log(sid)
        $.get('wishlist-api.php', {
            action: 'remove',
            sid: sid
        }, function(data) {
            p_item.remove();
        }, 'json');
        window.location.reload();

    });


    $.get('wishlist-api.php', $(document.like).serialize(), function(data) {
        // p_item.attr('data-quantity', sendObj.quantity);
        console.log(data);
    }, 'json');
</script>