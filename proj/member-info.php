<?php require __DIR__ . '/__connect_db.php';
$pagetitle = '會員中心';
$pageName = 'member-info.php';


$sql = "SELECT * FROM members WHERE sid=?"; //選擇表單
$stmt = $pdo->prepare($sql); //從$pdo(DB)準備執行這張表單
$stmt->execute([$_SESSION['member']['sid']]); //找到該會員的sid 然後填回表單 執行
$r = $stmt->fetch(); //找到該會員的資料填入$r的array裡

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
        align-items: stretch;
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
        min-width: 600px;
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

    .e-form_group2 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .e-form_group label {
        line-height: 30px;
        letter-spacing: 3px;
        width: 15%;
        text-align: start;
        padding: 0;
        margin: 0;
    }

    .e-form_input {
        width: 85%;
        border: 1px solid transparent;
        font-weight: 200;
        color: #465038;
        text-align: start;
    }

    .e-form_input option {
        color: #465038;
    }

    .e-form_group input {
        text-align: start;
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

        .breadcrumb {
            margin: 0;
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

        .e-card_group {
            align-items: center;
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
            min-width: 400px;
        }
    }
</style>
<main class="container d-flex justify-content-center align-items-center">

    <h1 class="title font1" data-aos="fade-down" data-aos-duration="2000">會員資訊</h1>
    <div id="info-bar" class="alert alert-success " role="alert" style="display: none">notice</div>

    <div class=" d-flex justify-content-center e-card_group ">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= WEB_ROOT ?>/member-index.php">會員中心</a></li>
                <li class="breadcrumb-item active" aria-current="page">會員資訊</li>
            </ol>
        </nav>
        <div data-aos="flip-right" data-aos-duration="2000">
            <div class="e-card_member radius_border bg_beige d-flex justify-content-center align-items-stretch">
                <div class="e-card-title">
                    <span class=" bg_green font4 radius_border">會員資料</span>
                </div>



                <div class="e-card_inside d-flex justify-content-center">
                    <form class="form_inside" name="form1" method="post" onsubmit="return formCheck()" novalidate>

                        <div class="e-form_group  justify-content-center pb-4">
                            <div class="d-flex pb-1">
                                <label for="name" class="font6">姓名</label>
                                <input type="text" class="e-form_input bg_beige" id="name" name="name" placeholder="請輸入姓名" value="<?= $r['name'] ?>">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="nameHelp" class="form-text font6"></small>
                        </div>

                        <div class="e-form_group  justify-content-center pb-4">
                            <div class="d-flex pb-1">
                                <label for="birthday" class="font6">生日</label>
                                <input type="date" class="e-form_input bg_beige" id="birthday" name="birthday" value="<?= $r['birthday'] ?>">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="birthdayHelp" class="form-text font6"></small>
                        </div>

                        <div class="e-form_group  justify-content-center pb-4">
                            <div class="d-flex pb-1">
                                <label for="gender" class="font6">性別</label>
                                <select name="gender" class="e-form_input bg_beige">
                                    　<option value="">請選擇</option>
                                    　<option value="M" <?= $r['gender'] == 'M' ? 'selected' : '' ?>>男性</option>
                                    　<option value="F" <?= $r['gender'] == 'F' ? 'selected' : '' ?>>女性</option>
                                </select>
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="genderHelp" class="form-text font6"></small>
                        </div>

                        <div class="e-form_group  justify-content-center pb-4">
                            <div class="d-flex pb-1">
                                <label for="mobile" class="font6">電話</label>
                                <input type="tel" class="e-form_input bg_beige" id="mobile" name="mobile" placeholder="0000-000-000" value="<?= $r['mobile'] ?>">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="mobileHelp" class="form-text font6"></small>
                        </div>

                        <div class="e-form_group justify-content-center pb-4">
                            <div class="d-flex pb-1">
                                <label for="address" class="font6">地址</label>
                                <input type="text" class="e-form_input bg_beige" id="address" name="address" placeholder="xx市xx區xx路xx段xx號x樓" value="<?= $r['address'] ?>">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="addressHelp" class="form-text font6"></small>
                        </div>

                        <div class="e-form_group justify-content-center">
                            <div class="d-flex pb-1">
                                <label for="password" class="font6">密碼</label>
                                <input type="password" class="e-form_input bg_beige" id="password" pattern="09\d{2}-?\d{3}-?\d{3}" name="password" placeholder="修正後請輸入密碼再送出">
                            </div>
                            <div class="e-line bg_yellow"></div>
                            <small id="passwordHelp" class="form-text font6"></small>
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
    $(".submit_btn").click(function() {
        $(".form_inside").submit();
    })

    function formCheck() {
        //將form1的資料傳送到member-info-api.php處理
        $.post('member-info-api.php', $(document.form1).serialize(), function(data) {
            console.log(data);
            if (data.success) {
                console.log('123');
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: '資料修改成功',
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
                        popup: 'pop_banner', //可以自己隨意定義變數,然後在上方CSS更改
                        title: 'pop_title',
                        cancelButton: 'pop_cancel',
                        confirmButton: 'pop_confirm',
                    }
                });
                setTimeout(function() {
                    location.href = "<?= empty($_SERVER['HTTP_REFERER']) ? WEB_ROOT . '/' . WEB_MEMBER : $_SERVER['HTTP_REFERER'] ?>";
                }, 3000);
            } else {
                console.log('456');
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: '密碼錯誤',
                    text: '修改資料失敗',
                    showConfirmButton: false,
                    timer: 1500,
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

        return false;
    }
</script>
<?php include __DIR__ . '/__html_foot.php' ?>