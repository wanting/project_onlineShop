<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<style>
    main {
        margin: 50px 0;
        flex-flow: column nowrap;
    }

    main h1 {
        text-align: center;
    }

    .e-card_group {
        flex-flow: column nowrap;
    }

    .breadcrumb {
        max-width: 800px;
        margin: 35px 0;
    }

    .e-form_group small {
        line-height: 20px;
        color: red;
        font-weight: 100;
        text-align: end;
    }

    .e-card_member {
        max-width: 800px;
        flex-flow: column nowrap;
        transition: .5s;
    }

    .e-card_member:hover {
        transform: translateY(-0.5rem) scale(1.0125);
        box-shadow: 5px 10px 20px #eeee;
    }

    .e-card-title {
        margin: 50px 100px 70px 100px;
        text-align: center;
    }

    .e-card-title span {
        padding: 10px 60px;
        color: #ffffff;
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
        margin: 0 100px;
        flex-direction: row;
    }

    .e-form_group label {
        line-height: 30px;
        letter-spacing: 3px;
        width: 40%;
        text-align: start;
        padding: 0;
        margin: 0;
    }

    .e-form_input {
        width: 60%;
        border: 1px solid transparent;
        font-weight: 200;
        color: #465038;
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

    .submit_btn {
        margin: 50px 0;
    }

    @media screen and (max-width: 576px) {
        main {
            margin: 2px 0;
            min-width: 330px;
            background: #e7e1d2;
        }
        main h1 {
            margin: 25px 0;
        }
        .e-form_group label{
            width: 35%;
        }
        .e-form_input {
        width: 65%;
        }
        .breadcrumb {
            margin: 0;
            justify-content: center;
        }
        .e-card-title {
            margin: 50px 0 70px 0;
            text-align: center;
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

        .e-card_member:hover {
            transform: none;
            box-shadow: 0px 0px 0px;
        }

        .e-card_member {
            box-shadow: none;
        }
    }
</style>
<main class="container d-flex justify-content-center align-items-center">

    <h1 class="title font1" data-aos="fade-down" data-aos-duration="2000">會員資訊</h1>
    <div id="info-bar" class="alert alert-success " role="alert" style="display: none">notice</div>

    <div class=" d-flex justify-content-center align-items-stretch  e-card_group ">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= WEB_ROOT ?>/member-index.php">會員中心</a></li>
                <li class="breadcrumb-item active" aria-current="page">會員資訊</li>
            </ol>
        </nav>
        <div data-aos="flip-right" data-aos-duration="2000">
            <div class="e-card_member radius_border bg_beige d-flex justify-content-center align-items-stretch">
                <div class="e-card-title">
                    <span class=" bg_green font4 radius_border">修改密碼</span>
                </div>

                <div class="e-card_inside d-flex justify-content-center">
                    <form class="form_inside" name="form1" method="post" onsubmit="return formCheck()" novalidate>

                        <div class="e-form_group justify-content-center pb-3">
                            <div class="d-flex pb-1">
                                <label for="password" class="font6">請輸入舊密碼</label>
                                <input type="password" class="e-form_input green bg_beige" id="password" 2 pattern="09\d{2}-?\d{3}-?\d{3}" name="password" placeholder="請輸入密碼最少6位數">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp" class="form-text font6"></small>
                        </div>
                        <div class="e-form_group justify-content-center pb-3">
                            <div class="d-flex pb-1">
                                <label for="password2" class="font6">請輸入新密碼</label>
                                <input type="password" class="e-form_input green bg_beige" id="password2" pattern="09\d{2}-?\d{3}-?\d{3}" name="password2" placeholder="請輸入密碼最少6位數">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp2" class="form-text font6"></small>
                        </div>
                        <div class="e-form_group justify-content-center">
                            <div class="d-flex pb-1">
                                <label for="password3" class="font6">請確認新密碼</label>
                                <input type="password" class="e-form_input green bg_beige" id="password3" name="password3" placeholder="請再次輸入密碼">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp3" class="form-text font6"></small>
                        </div>

                </div>
                <div class="d-flex justify-content-center">
                    <a class="submit_btn yellow_btn">確定修改</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->
<script>
    const password = $('#password'),
        password2 = $('#password2'),
        password3 = $('#password3');


    $(".submit_btn").click(function() {
        $(".form_inside").submit();
    });

    password.focus(function() {
        $('#passwordHelp').text('');
        password.css('border-color', 'transparent');
    });
    password2.focus(function() {
        $('#passwordHelp2').text('');
        password2.css('border-color', 'transparent');
    });
    password3.focus(function() {
        $('#passwordHelp3').text('');
        password3.css('border-color', 'transparent');
    });

    function formCheck() {
        password.css('border-color', 'transparent');
        password2.css('border-color', 'transparent');
        password3.css('border-color', 'transparent');
        $('#passwordHelp').text(''); //每進次來都要清空
        $('#passwordHelp2').text(''); //每進次來都要清空
        $('#passwordHelp3').text(''); //每進次來都要清空

        let isPass = true; //一定要寫

        if (password3.val() != password2.val()) {
            isPass = false;
            password3.css('border-color', '#cf7e60');
            $('#passwordHelp3').text('新密碼不一致');
        };

        if (password.val().length < 6) {
            isPass = false;
            password.css('border-color', '#cf7e60');
            $('#passwordHelp').text('密碼長度低於6個字');
        };
        if (password2.val().length < 6) {
            isPass = false;
            password2.css('border-color', '#cf7e60');
            $('#passwordHelp2').text('密碼長度低於6個字');
        };
        if (password3.val().length < 6) {
            isPass = false;
            password3.css('border-color', '#cf7e60');
            $('#passwordHelp3').text('密碼長度低於6個字');
        };

        if (isPass) {
            //將form1的資料傳送到member-info-api.php處理
            $.post('member-password-api.php', $(document.form1).serialize(), function(data) {
                console.log(JSON.stringify(data));
                console.log(data);
                if (data.success) {
                    Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: '密碼修改成功',
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
                        setTimeout(function() { //未調整要記得改
                            location.href = "<?= empty($_SERVER['HTTP_REFERER']) ?  $_SERVER['HTTP_REFERER'] : $_SERVER['HTTP_REFERER'] ?>";
                        }, 3000);
                } else {

                    password.css('border-color', '#cf7e60');
                    $('#passwordHelp').text('密碼錯誤');
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: '密碼修改失敗',
                        showConfirmButton: false,
                        timer: 1500,
                        text: '舊密碼錯誤',
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
        };


        return false;
    }
</script>
<?php include __DIR__ . '/__html_foot.php' ?>