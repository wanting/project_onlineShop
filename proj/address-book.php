<?php require __DIR__ . '/__connect_db.php';
$pageName = 'ab-home';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<style>
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
        margin: 10px 15px;
        outline: none;
        border: none;
    }

    .pop_confirm:focus {
        outline: none;
    }

    .pop_cancel {
        background: #e7e1d2;
    }
</style>
<div class="container">
    <h2>Hello</h2>
    <form class=".aaa pb-5" name="form1" action=""></form>
    <a class="aaa_btn yellow_btn">登入打勾按鈕</a>
    <form class=".bbb pb-5" name="form2" action=""></form>
    <a class="bbb_btn yellow_btn">迷你打勾倒數計時按鈕</a>
    <form class=".ccc pb-5" name="form3" action=""></form>
    <a class="ccc_btn yellow_btn">是否按鈕</a>
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->
<script>
    $(".aaa_btn").click(function() {
        $(".aaa").submit(); //讓register_btn變成form_inside的submit
        console.log('123');
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Your work has been saved',
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
        })

    });
    $(".bbb_btn").click(function() {
        $(".bbb").submit(); //讓register_btn變成form_inside的submit
        console.log('123');
        const Toast = Swal.mixin({
            toast: true,
            width: 550,
            height: 600,
            position: 'top-center',
            padding: '3em',
            background: '#fff',
            // backdrop: `rgba(0,0,0,0.4)`,
            customClass: {
                            popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                            title: 'pop_title',
                            cancelButton: 'pop_cancel',
                            confirmButton: 'pop_confirm',
                        },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '如果有很多字就用這個如果有很多字就用這個如果有很多字就用這個如果有很多字就用這個如果有很多字就用這個'
        })

    });
    $(".ccc_btn").click(function() {
        $(".ccc").submit(); //讓register_btn變成form_inside的submit
        console.log('123');
        Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: '是否移除所選商品?',
            buttonsStyling: false,
            showConfirmButton: true,
            confirmButtonText: '是',
            showCancelButton: true,
            cancelButtonText: '否',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            width: 550,
            padding: '3em',
            backdrop: `rgba(0,0,0,0.4)`,
            customClass: {
                popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                title: 'pop_title',
                cancelButton: 'pop_cancel',
                confirmButton: 'pop_confirm',
            }
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                     {  
                        icon: 'success',
                        title: 'Deleted!',
                        text:'已成功移除商品',
                        buttonsStyling: false,
                        showConfirmButton: true,
                        customClass: {
                            popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                            title: 'pop_title',
                            cancelButton: 'pop_cancel',
                            confirmButton: 'pop_confirm',
                        }
                    })
            }
        })

    });
</script>
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->