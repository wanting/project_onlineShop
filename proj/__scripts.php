<script src="../lib/jquery-3.5.1.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="text/javascript" src="../slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    // 頁面特效
    AOS.init();
    // -------------------header-start------------------------------
    $('.burger').on('click', function() {
        // console.log("click")
        $(".cate").toggleClass("show"),
            $(".burger-menu").toggleClass("show");
        $("body").toggleClass("overflow-hidden")
    });

    $('.member').on('click', function() {
        // console.log("click")
        $(".member-submenu").toggleClass("drop");
        $(".f-background").toggleClass("drop");

    });

    const navSlide = () => {
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav-links');
        const navLinks = document.querySelectorAll('.nav-links li');
        //togle nav
        burger.addEventListener('click', () => {
            nav.classList.toggle('nav-active');

            navLinks.forEach((link, index) => {
                if (link.style.animation) {
                    link.style.animation = '';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + .3}s`;
                }
            });

            burger.classList.toggle('toggle');
        });
    };
    navSlide();

    $(".cate-parents").click(function() {
        $(this).addClass("active").siblings().removeClass("active")
    });

    $(".cate-items-p").click(function() {
        $(this).addClass("active").siblings().removeClass("active")
    });

    // 訪客招呼語
    var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (!login_success) {
        $('#f-welcome').text('訪客，您好');
    } else {
        //$('#f-welcome').text(' ，您好');
    };


    // -------------------header-end------------------------------

    //onelineshop nav2
    $(".b-menu-n").on("click", function() {
        $(".b-submenu1-n").toggleClass("open")
        $(".b-down-arrow-n").toggleClass("b-up-arrow-n")
        //  console.log("123")
    })

    $(".b-menu").on("click", function() {
        $(".b-submenu1").toggleClass("open")
        $(".b-down-arrow").toggleClass("b-up-arrow")
        //  console.log("123")
    })

    $(".b-menu2").on("click", function() {
        $(".b-submenu2").toggleClass("open")
        $(".b-down-arrow2").toggleClass("b-up-arrow2")

    })

    $(".fa-heart").on("click", function() {
        $(".like").toggleClass("appear")

    })

    //navbar顯示登入或登出
    var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (!login_success) {
        $("#login_flag").show();
        $("#logout_flag").hide();
        $("#logout_flag-m").hide();
        $("#f-member_login").hide();
        $("#f-member_login-m").hide();
        $("#f-visiter").show();
        $("#f-visiter-m").show();
        $("#f-register").show();
    } else {
        $("#login_flag").hide();
        $("#logout_flag").show();
        $("#logout_flag-m").show();
        $("#f-member_login").show();
        $("#f-visiter").hide();
        $("#f-visiter-m").hide();
        $("#f-register").hide();
    }

    // 從購物車取得資料

    const cart_count = $('.cart-count'); // span tag 抓到購物車class ->navbar cart旁邊的購物車數量

    // const cart_short_list = $('.cart-short-list'); //navbar的快速檢視

    $.get('handle-cart.php', function(data) {
        setCartCount(data);
    }, 'json');

    function setCartCount(data) {
        let count = 0;
        // cart_short_list.empty();
        if (data && data.cart && data.cart.length) {
            for (let i in data.cart) {
                let item = data.cart[i];
                count += item.quantity;
                // cart_short_list.append(`<a class="dropdown-item" href="#">${item.bookname} ${item.quantity}</a>`)
            }
            cart_count.text(count);
        }
    }





    $("#goTop").click(function() {
        // $("html").scrollTop(0); //沒有漸變時間
        //animate有動畫秒數
        $("html").animate({
            scrollTop: 0,
        });
    });
</script>