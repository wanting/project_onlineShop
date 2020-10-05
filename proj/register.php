<?php
require __DIR__ . '/__connect_db.php';
$pageName = 'ab-insert';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<?php include __DIR__ . '/__navbar.php' ?>
<div class="container">
    <style>
        main {
            margin: 50px 0;
        }

        .e-form_group small {
            line-height: 20px;
            color: red;
            font-weight: 100;
            text-align: end;
        }

        .e-card_member {
            max-width: 31.25rem;
            box-shadow: 0px 0px 0px 1px #465038 inset;
        }

        .e-card_banner {
            text-align: center;
        }

        .e-slogan {
            line-height: 2rem;
            font-weight: 500;
            letter-spacing: 5.4px;
            text-indent: 5.4px;
            text-align: center;
            padding: 60px;
            color: #fff;
        }

        .e-register_title {
            line-height: 2.25rem;
            font-weight: 600;
            letter-spacing: 2.4px;
            text-indent: 2.4px;
            text-align: center;
            margin: 25px 0;
        }

        .e-card_inside {
            flex-direction: column;
            flex-wrap: nowrap;
        }

        .e-form_group {
            margin: 0 100px;
            flex-direction: row;
        }

        .e-form_group label {
            line-height: 30px;
            font-size: 14px;
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
            outline: none !important;
        }

        .e-form_group input::placeholder {
            color: #909687;
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

        .e-notice a:hover {
            color: #cf7e60;
        }

        .register_btn {
            margin: 25px 0 50px 0;
            border: 0;
        }

        .register_btn.disabled,
        .register_btn:disabled {
            opacity: 0.65;
        }

        .register_btn.disabled:hover,
        .register_btn:disabled:hover {
            opacity: 0.65;
            background: #E0B872;
            color: #465038;
            cursor: default;
        }

        .e-check {
            font-weight: 200;
            padding-top: 25px;
            align-items: center;
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
        }

        .pop_cancel {
            background: #e7e1d2;
        }

        @media screen and (max-width: 576px) {
            main {
                margin: 2px 0;
                min-width: 33opx;
            }

            .e-form_group label {
                letter-spacing: 1px;
            }

            .e-slogan {
                padding: 30px 0;
            }

            .e-form_group {
                margin: 0 50px;
            }

            .e-card_member {
                border-radius: 0px;
                width: 100%;
            }

            .e-card_member {
                box-shadow: none;
            }
        }
    </style>
    <script>
    var login_success = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

    if (login_success) {
        location.href = 'member-index.php';
    };
    //判斷是否登入,未登入就跳去登入頁面,登入就載入此頁
</script>
    <main class="container">
        <div id="info-bar" class="alert alert-success" role="alert" style="display: none"></div>
        <div class="row d-flex justify-content-center">
            <div class="e-card_member radius_border">
                <div class="e-card_banner bg_green">
                    <div class="e-slogan font4">The pattern way of life !</div>
                </div>
                <div class="e-card_inside d-flex justify-content-center">
                    <span class="e-register_title font3">REGISTER</span>
                    <form class="form_inside" name="form1" method="post" onsubmit="return formCheck()" novalidate>

                        <div class="e-form_group  justify-content-center pb-3">
                            <div class="d-flex pb-1">
                                <label for="email font6">電子信箱</label>
                                <input type="email" class="e-form_input green" id="email" name="email" placeholder="example@mail.com">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="emailHelp" class="form-text font6"></small>

                        </div>

                        <div class="e-form_group  justify-content-center pb-4">
                        <div class="d-flex pb-1">
                            <label for="name font6">姓名</label>
                            <input type="text" class="e-form_input green" id="name" name="name" placeholder="請輸入姓名">
                        </div>
                        <div class="e-line bg_yellow"></div>
                            <small id="nameHelp" class="form-text font6"></small>
                        </div>

                        <div class="e-form_group justify-content-center pb-3">
                            <div class="d-flex pb-1">
                                <label for="password font6">密碼</label>
                                <input type="password" class="e-form_input green" id="password" pattern="09\d{2}-?\d{3}-?\d{3}" name="password" placeholder="請輸入密碼最少6位數">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp" class="form-text font6"></small>
                        </div>
                        <div class="e-form_group justify-content-center">
                            <div class="d-flex pb-1">
                                <label for="password2 font6">密碼確認</label>
                                <input type="password" class="e-form_input green" id="password2" name="password2" placeholder="請再次輸入密碼">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp2" class="form-text font6"></small>
                        </div>
                        <div class="d-flex justify-content-center e-check">
                            <input class="checkbox " type="checkbox"><span class="font6 ">&nbsp我已經閱讀並同意隱私權保護政策條款</span>
                        </div>
                        <p class="e-notice font6 d-flex justify-content-center">我已經是會員？ 立即<a class="font6" href="<?= WEB_ROOT ?>/login.php">登入</a></p>
                        <div class="d-flex justify-content-center">
                            <button type="button" class=" register_btn yellow_btn " id="send" disabled>註冊</button>
                            <!-- <a class="register_btn yellow_btn" >註冊</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</div>
<?php include __DIR__ . '/__scripts.php' ?>
<script>
    const email = $('#email'),
        name = $('#name'),
        password = $('#password'),
        password2 = $('#password2');
        // info_bar = $('#info-bar');
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    $(":checkbox").click(function() {
        let checked = $(this).prop("checked")
        $("#send").prop("disabled", !checked)
        $(".register_btn").toggleClass("active1")
    });

    $(".register_btn").click(function() {
        $(".form_inside").submit(); //讓register_btn變成form_inside的submit
    });

   
    email.focus(function(){
        $('#emailHelp').text('');
        email.css('border-color', 'transparent');
    });
    name.focus(function(){
        $('#nameHelp').text('');
        name.css('border-color', 'transparent');
    });
    password.focus(function(){
        $('#passwordHelp').text('');
        password.css('border-color', 'transparent');
    });
    password2.focus(function(){
        $('#passwordHelp2').text('');
        password2.css('border-color', 'transparent');
    });

    function formCheck() {
        $('#emailHelp').text('');
        $('#passwordHelp').text('');
        $('#passwordHelp2').text('');
        $('#nameHelp').text('');
        email.css('border-color', 'transparent');
        password.css('border-color', 'transparent');
        password2.css('border-color', 'transparent');
        name.css('border-color', 'transparent');
        // TODO: 檢查欄位
        let isPass = true;

        if (!email_re.test(email.val())) {
            isPass = false;
            console.log('email');
            email.css('border-color', '#cf7e60');
            $('#emailHelp').text('請填寫正確的 email 格式');
            //另外的寫法,也可以陣列ry
            // email.parent().next().text('請填寫正確的 email 格式'); 
            // email.closest('.e-form_group').find('small').text('請填寫正確的 email 格式');
        }

        if (password.val().length < 6) {
            isPass = false;
            console.log('passwordlength');
            password.css('border-color', '#cf7e60');
            $('#passwordHelp').text('密碼長度低於6個字');
        }
        if (password2.val().length < 6) {
            isPass = false;
            console.log('passwordlength');
            password2.css('border-color', '#cf7e60');
            $('#passwordHelp2').text('密碼長度低於6個字');
        }

        if (password2.val() != password.val()) {
            isPass = false;
            password2.css('border-color', '#cf7e60');
            $('#passwordHelp2').text('密碼不一致');
        }

        if(name.val().trim().length <2){
            isPass = false;
            name.css('border-color', 'red');
            $('#nameHelp').text('姓名長度太短');
        }

        if (isPass) {
            $.post('register-api.php', $(document.form1).serialize(), function(data) {
                console.log(data);
                if (data.success) {
                    email.css('border-color', 'transparent');
                    $('#emailHelp').text('');
                    Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: '註冊成功',
                            text:'請再次登入會員',
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
                        })
                    setTimeout(function() {
                        location.href = 'login.php';
                    }, 3000);
                } else {
                   
                    email.css('border-color', '#cf7e60');
                    $('#emailHelp').text('此帳號已被註冊');

                    Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: '註冊失敗',
                            text:'請再次確認輸入欄位資料是否正確',
                            buttonsStyling: false,
                            showConfirmButton: true,
                            confirmButtonText: '好',
                            // timer: 1500,
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
                        });

                }
                
            }, 'json');
        }

        return false;
    }
</script>
<?php require __DIR__ . '/__html_foot.php' ?>