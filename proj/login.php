<?php
require __DIR__ . '/__connect_db.php';
$pageName = '會員登入';

//$goto = empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'];
// PHP判斷
if(!empty($_SESSION['member'])){     
    header('Location: '.WEB_ROOT. '/'. WEB_MEMBER);     
    exit; 
};
?>
<?php include __DIR__ . '/__html_head.php' ?>
<?php include __DIR__ . '/__navbar.php' ?>
<style>
    main {
        margin: 50px 0;
    }
    .box{
    min-height: calc(100vh - 360px);
    }
    .e-form_group small {
        line-height: 20px;
        color: red;
        font-weight: 100;
        text-align:end;
    }
    .e-card_member {
        max-width: 31.25rem;
        box-shadow: 0px 0px 0px 1px #465038 inset;
    }

    .e-card_banner {
        background: #e0b872;
        text-align: center;
    }

    .e-slogan {
        line-height: 2rem;
        font-weight: 500;
        letter-spacing: 5.4px;
        text-indent: 5.4px;
        text-align: center;
        padding: 60px;
    }

    .e-signIn_title {
        line-height: 2.25rem;
        font-weight: 600;
        letter-spacing: 5.4px;
        text-indent: 5.4px;
        text-align: center;
        margin: 25px 0;
    }

    .e-card_inside {
        flex-direction: column;
        flex-wrap: nowrap;
    }

    .e-form_group {
        margin:0 100px;
        flex-direction: row;
    }
    .e-form_group label {
        line-height: 30px;
        letter-spacing: 3px;
        width: 30%;
        text-align: start;
        padding: 0;
        margin: 0;
    }

    .e-form_input {
        width: 70%;
        border: 1px solid transparent;
        font-weight: 200;
        color:#465038;
        outline: none !important;
    }
    .e-form_group input::placeholder{
        color:#909687;
    }

    .form_inside {
        flex-flow: column nowrap;
        display: flex;
        justify-content: center;
    }

    .e-line {
        height: 2px;
    }

    .e-notice {
        margin: 25px 0;
        letter-spacing: 2.4px;
        line-height: 20px;
    }

    .e-notice a:hover{
        color: #cf7e60;
    }
    .signIn_btn{
        margin:25px 0 50px 0 ;
    }
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
    /* 彈窗 */
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
    }

    .pop_cancel {
        background: #e7e1d2;
    }
    @media screen and (max-width: 576px){
        main {
        margin: 2px 0;
        min-width: 33opx;
        }
        .e-form_group label{
            letter-spacing: 1px;
        }
        .e-slogan{
            padding:30px 0;
        }
        .e-form_group{
            margin:0 50px;
        }
        .e-card_member{
            border-radius: 0px;
            width: 100%;
        }
        .e-card_member{
            box-shadow: none;
        }
    }
</style>
<main class="container">
    <div id="info-bar" class="alert alert-success " role="alert" style="display: none">notice</div>
    <div class="row d-flex justify-content-center">
        <div class="e-card_member radius_border">
            <div class="e-card_banner">
                <div class="e-slogan font4">The pattern way of life !</div>
            </div>
            <div class="e-card_inside d-flex justify-content-center">
                <span class="e-signIn_title font3">SIGN IN</span>
                <form class="form_inside" name="form1" method="post" onsubmit="return formCheck()" novalidate>

                    <div class="e-form_group  justify-content-center pb-3">
                        <div class="d-flex pb-1">
                            <label for="email " class="font6">電子信箱</label>
                            <input type="email" class="e-form_input" id="email" name="email"  placeholder="example@mail.com">                       
                        </div>
                        <div class="e-line bg_yellow"></div>
                        <small id="emailHelp" class="form-text font6"></small>

                    </div>
                    <div class="e-form_group justify-content-center">
                        <div class="d-flex pb-1">
                            <label for="password" class="font6">密碼</label>
                            <input type="password" class="e-form_input" id="password" pattern="09\d{2}-?\d{3}-?\d{3}" name="password" placeholder="輸入密碼最少6位數">
                        </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp" class="form-text font6"></small>

                    </div>
                    <p class="e-notice font6 d-flex justify-content-center">還不是會員嗎？ 立即<a class="font6" href="<?= WEB_ROOT ?>/register.php">註冊</a></p>
                    <div class="d-flex justify-content-center">
                        <a class="signIn_btn yellow_btn">登入</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include __DIR__ . '/__scripts.php' ?>
<script>
    const email = $('#email'),
        password = $('#password'),
        email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    $(".signIn_btn").click(function() {
        $(".form_inside").submit(); //讓signIn_btn變成form_inside的submit
    })

    //focus欄位時清空警示提示
    email.focus(function(){
        $('#emailHelp').text('');
        email.css('border-color', 'transparent');
    });
    password.focus(function(){
        $('#passwordHelp').text('');
        password.css('border-color', 'transparent');
    });

    function formCheck() {
        $('#emailHelp').text('');//每進次來都要清空
        $('#passwordHelp').text('');//每進次來都要清空
        email.css('border-color', 'transparent');
        password.css('border-color', 'transparent');

        // TODO: 檢查欄位
        let isPass = true;

        if (!email_re.test(email.val())) {
            isPass = false;
            email.css('border-color', '#cf7e60');
            $('#emailHelp').text('請填寫正確的 email 格式');
            //另外的寫法,也可以陣列ry
            // email.parent().next().text('請填寫正確的 email 格式'); 
            // email.closest('.e-form_group').find('small').text('請填寫正確的 email 格式');
        }

        if (password.val().length < 6) {
            isPass = false;
            password.css('border-color', '#cf7e60');
            $('#passwordHelp').text('密碼長度低於6個字');
        }

        if (isPass) {
            $.post('login-api.php', $(document.form1).serialize(), function(data) {
                console.log(data);
                if (data.success) {
                    Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: '登入成功',
                            showConfirmButton: false,
                            timer: 2500,
                            // title: 'Custom animation with Animate.css',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            width: 550,
                            padding: '3em',
                            background: '#fff',
                            backdrop: `rgba(0,0,0,0.4)`,
                            customClass: {
                                popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                                title: 'pop_title',
                                cancelButton: 'pop_cancel',
                                confirmButton: 'pop_confirm',
                            }
                        }),
                    setTimeout(function() {
                        location.href="<?= empty($_SERVER['HTTP_REFERER']) ? WEB_ROOT. '/'. WEB_MEMBER : $_SERVER['HTTP_REFERER'] ?>";
                    }, 3000);
                } else {
                    Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: '登入失敗',
                            showConfirmButton: false,
                            timer: 1500,
                            text:'帳號或密碼錯誤',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            width: 550,
                            padding: '3em',
                            background: '#fff',
                            backdrop: `rgba(0,0,0,0.4)`,
                            customClass: {
                                popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                                title: 'pop_title',
                                cancelButton: 'pop_cancel',
                                confirmButton: 'pop_confirm',
                            }
                        });
                }

            }, 'json');
        }


        return false;
    }
</script>
<?php require __DIR__ . '/__html_foot.php' ?>