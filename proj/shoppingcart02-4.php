<?php require __DIR__ . '/__connect_db.php';
$pageName = 'buy-start';
if (empty($_SESSION['cart']) or empty($_SESSION['member'])) {
    header('Location: a-index.php');
    exit;
}
  
// *** 抓到當下資料庫最新的價格資訊 *** begin
$sids = array_column($_SESSION['cart'], 'sid');
$sql = "SELECT * FROM `products` WHERE `sid` IN (" . implode(',', $sids) . ")";
$productData = [];
$stmt = $pdo->query($sql);
while ($r = $stmt->fetch()) {
$productData[$r['sid']] = $r;
}

foreach ($_SESSION['cart'] as $k => $v) {
$_SESSION['cart'][$k]['price'] = $productData[$v['sid']]['price'];
}

// new
$m_sql = "SELECT * FROM members WHERE `sid` = ?";
$m_stml = $pdo->prepare($m_sql);
$m_stml->execute([$_SESSION['member']['sid']]);
$r = $m_stml->fetch();
//存入SESSION
$_SESSION['member']['mobile'] = $r['mobile'];

?>
<?php include __DIR__ . '/__html_head.php' ?>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>

<style>
    * {
        color: #465038;
    }

    h1 {
        margin: 50px;
        text-align: center;
    }

    /* 流程示意 */
    .h_step {
        text-align: center;
        position: relative;

    }

    .h_cartStep {
        width: 680px;
        margin: 0 auto 80px auto;
    }

    @media screen and (max-width: 576px) {
        h1 {
            margin: 25px;
            text-align: center;
            font-size: 24px;
        }

        .h_step {
            text-align: center;
            position: relative;
        }

        .h_cartStep {
            width: 240px;
            margin: 0 auto 50px auto;
        }
    }

    /* 狀態顯示：訂單成立 */
    .h_row {
        position: relative;
        max-width: 1140px;
        margin: 0 auto;
    }

    @media screen and (max-width:576px) {
        .h_row {
            position: relative;
            max-width: 302px;
            margin: 0 auto;
        }

        /* 所有table在RWD時都滿版 */
        .h_row7,
        .h_row4 {
            min-width: 100%;
        }

        .h_tableRwd {
            padding: 0
        }
    }

    .h_mixRow {
        justify-content: space-between;
    }

    /* 左右表格間距設定 */
    .h_row7 {
        margin: 0 0 0 auto;
    }

    .h_row4 {
        margin: 0 auto 0 0;
    }

    /* 表格共同設定:表頭 */
    .h_table-m,
    .h_table-s {
        border: 2px solid #eeeeee;
        margin: 0 auto 50px auto;
    }

    .h_table-m thead th,
    .h_table-s thead th {
        padding: 16px 24px;
        background-color: #eeeeee;
        border: 2px solid #eeeeee;
    }

    /* .h_table-m thead .h_table-s thead {
    background-color: #eeeeee;
  } */

    /* 左邊表格內容設定 */
    .h_table-m tbody td {
        border-top: none;
        border-bottom: none;
        padding: 28px 24px;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 2px solid #e0b872;
    }

    .h-line {
        height: 2px;
        background: #e0b872;
        margin: 0 0 16px 0;
    }

    .form-control {
        font-weight: 250;
        color: #909687;
        border: 1px solid transparent;
    }

    /* 右邊表格細項設定 */
    .h_table-s tbody td {
        border-top: none;
        border-bottom: none;
        padding: 21.5px 24px;
    }

    .h_table-s td img {
        width: 100px;
        height: 100px;
    }

    .h_cartNum {
        text-align: right;
    }

    table tbody.h_cartitem {
        border-bottom: 2px solid #e0b872;
    }


    /* 前往結帳button */
    .h_textCenter {
        text-align: center;
        margin: auto;
    }

    .h_icon {
        width: 208px;
        /*四字icon固定寬度:88+60*2*/
        cursor: pointer;
        font-size: 20px;
    }

    .h_icon.green_btn a,
    .h_icon.red_btn a {
        color: white;
    }

    @media screen and (max-width: 576px) {
        .h_table-s td img {
            width: 60px;
            height: 60px;
        }

        .h_icon.green_btn,
        .h_icon.red_btn {
            font-size: 16px;
            width: 100%;
        }

        a {
            font-size: 16px;
        }
    }
    /* --------------top-------------------- */
    /* .top {
        position: fixed;
        bottom: 30px;
        right: 30px;
    }

    .top>img {
        height: 50px;
        width: 50px;
    }     */

    /* 談窗用的CSS */
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

<h1>購物車</h1>
<div class="h_step">
    <picture>
        <source class="h_cartStep" media="(min-width: 576px)" srcset="../img/cartStep2.svg" />
        <img class="h_cartStep" src="../img/cartStep2_1x.svg" alt="">
    </picture>
</div>
<div class="row h_row h_mixRow">
    <div class="col-7 h_row7 h_tableRwd">
       <form action="shopping-api.php" method="post" id="h_formlist" class="" name="order1" onsubmit="return formCheck()">
            <table class="table h_table-m">
                <thead>
                    <tr>
                        <th scope="">付款方式</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="radio" id="h_cod" name="payment" value="貨到付款" checked>
                            <label class="h_cartTitle font5" for="h_cod">　貨到付款</label>
                            <hr>
                            <div class="form-group row">
                                <label for="h_inputName" class="col-sm-3 col-form-label font5">寄件地址</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control font5" id="h_inputName" placeholder="請輸入詳細地址" value="<?= $r['address'] ?>" name="payee_addr">
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table h_table-m">
                <thead>
                    <tr>
                        <th scope="">訂購人資訊</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="p-member" data-name="<?= $r['name'] ?>" data-mobile="<?= $r['mobile'] ?>" data-email="<?= $r['email'] ?>">
                    <td>
                    <!-- <div class="form-group"> -->
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label font5" for="gridCheck">同會員資料</label>
                        </div> -->
                    <!-- </div> -->
                        <div class="form-group row">
                            <label for="h_inputNameBuyer" class="col-sm-3 col-form-label font5">姓名</label>
                            <div class="col-sm-6">
                                <input type="text" id="h_inputNameBuyer" readonly class="form-control-plaintext font5" value="<?= $r['name'] ?>">
                                </div>
                            </div>
                            <div class="h-line"></div>
                            <div class="form-group row">
                                <label for="h_inputPhoneBuyer" class="col-sm-3 col-form-label font5">手機</label>
                                <div class="col-sm-6">
                                    <input type="phone" id="h_inputPhoneBuyer" readonly class="form-control-plaintext font5" value="<?= $r['mobile'] ?>">
                                </div>
                            </div>
                            <div class="h-line"></div>

                            <div class="form-group row">
                                <label for="h_inputEmailBuyer" class="col-sm-3 col-form-label font5">電子信箱</label>
                                <div class="col-sm-6">
                                    <input type="email" id="h_inputEmailBuyer" readonly class="form-control-plaintext font5" value="<?= $r['email'] ?>">
                                </div>
                            </div>
                            <div class="h-line"></div>
                            <div class="form-group row">
                                <label for="h_receipt" class="col-sm-3 col-form-label font5">捐贈發票</label>
                                <div class="col-sm-6">
                                    <input type="radio" id="h_yes" name="h_receipt" value="是">
                                    <label class="h_cartTitle font5" for="h_yes">是　</label>

                                    <input type="radio" id="h_no" name="h_receipt" value="否" checked>
                                    <label class="h_cartTitle font5" for="h_no">否</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="h_inputDonate" class="col-sm-12 col-form-label font5">指定受捐贈機關或團體</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control font5" id="h_donate" name="h_donate" placeholder="請填寫捐贈碼">
                                </div>
                            </div>
                            <div class="h-line"></div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck1" required>
                                    <label class="form-check-label font5 col-sm-8" for="invalidCheck1">我已經閱讀並同意隱私權保護政策條款</label>
                                    <small id="h_chbWarning" class="col-sm-4 font6"></small>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table h_table-m">
                <thead>
                    <tr>
                        <th scope="">收件人資訊</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="form-check">
                                    <input id="sameBuyer" class="form-check-input" type="checkbox" onclick="OmitText()">
                                    <label class="form-check-label font5" for="sameBuyer">同訂購人資料</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="h_inputNameRecipient" class="col-sm-3 col-form-label font5">姓名</label>
                                <div class="col-sm-6">
                                    <input type="text" id="h_inputNameRecipient" name="payee_name" class="form-control font5" placeholder="請輸入真實姓名">
                                </div>
                                <small id="h_nameWarning" class="col-sm-3 font6">
                                </small>
                            </div>
                            <div class="h-line"></div>
                            <div class="form-group row">
                                <label for="h_inputPhoneRecipient" class="col-sm-3 col-form-label font5">手機</label>
                                <div class="col-sm-6">
                                    <input type="phone" id="h_inputPhoneRecipient" class="form-control font5" name="payee_phone" placeholder="請輸入聯絡號碼">
                                </div>
                                <small id="h_phoneWarning" class="col-sm-3 font6">
                                </small>
                            </div>
                            <div class="h-line"></div>

                            <div class="form-group row">
                                <label for="h_inputEmailRecipient" class="col-sm-3 col-form-label font5">電子信箱</label>
                                <div class="col-sm-6">
                                    <input type="email" id="h_inputEmailRecipient" class="form-control font5" name="payee_email" placeholder="請輸入聯絡E-mail">
                                </div>
                                <small id="h_mailWarning" class="col-sm-3 font6">
                                </small>
                            </div>
                            <div class="h-line"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table h_table-m">
                <thead>
                    <tr>
                        <th scope="">備註</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <textarea class="form-control font5" id="exampleFormControlTextarea1" rows="3" name="memo" placeholder="若有購買上的特別需求，請填寫備註"></textarea>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4 h_row4 h_tableRwd">
            <table class="table h_table-s">
                <thead>
                    <tr>
                        <th scope="" colspan="2">訂單資訊</th>
                    </tr>
                </thead>
                <tbody class="h_cartitem">
                    <?php foreach ($_SESSION['cart'] as $i) : ?>
                    <div>
                        <tr class="p-item" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['quantity'] ?>">
                            <td class="align-middle">
                               <img src="../img/<?= $i['products_id'] ?>_0.jpg" alt="">
                            </td>
                            <td class="align-middle font6 products_name" colspan="2">
                                <?= $i['products_name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle font6">單價</td>
                            <td class="align-middle font6 h_cartNum price" colspan="2">
                                $ <?= $i['price'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle font6">數量</td>
                            <td class="quantity align-middle h_cartNum" colspan="2">
                               <?= $i['quantity'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle font6">小計</td>
                            <td class="align-middle font6 h_cartNum sub-total" colspan="2">
                                $<?= $i['quantity'] *  $i['price'] ?>
                            </td>
                        </tr>
                    </div>
                    <?php endforeach; ?>
                </tbody>
                <tbody>
                    <tr>
                        <td class="h_cartTitle font6 sub-total">小計</td>
                        <td class="h_cartNum font6" colspan="2"><span id="subtotal"></span></td>
                    </tr>
                    <tr>
                        <td class="h_cartTitle font6">運費</td>
                        <td class="h_cartNum font6" id="shipping" colspan="2">$60</td>
                    </tr>
                    <tr>
                        <td class="h_cartTitle font6" scope="">合計</td>
                        <td class="h_cartNum font4" colspan="2"><span id="total" name="total"></span></td>
                    </tr>
                    <tr>
                        <td class="button" colspan="3">
                            <div class="h_textCenter h_icon green_btn">
                                <a class="h_send" role="button" href="shoppingcart01.php">回上一頁</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="button" colspan="3">
                            <div class="h_textCenter h_icon red_btn">
                                <a id="h_send" class="h_send h_submitbtn " role="button">提交訂單</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<div id="goTop" class="top" onclick="goTop();">
    <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->
<script>

  //讀取資料來自members
  function prepareCartTable() {
    const $p_member = $('.p-member');
    $p_member.each(function() {
      const name = $(this).attr('data-name');
      // const mobile = $(this).attr('data-mobile');
      const email = $(this).attr('data-email');
    })
  }

  // const memberData = <//?= json_encode($_SESSION['member']) ?>;

  //h_submitbtn送出前，確認invalidCheck1是否勾取
  $("#h_send").click(function(e) {
    $("#h_formlist").submit();
    e.preventDefault;
  })

  let cb = $("#invalidCheck1");    
  const name = $('#h_inputNameRecipient'),
    phone = $('#h_inputPhoneRecipient'),
    email = $('#h_inputEmailRecipient');
  // info_bar = $('#info-bar');
  const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
//   const phone_re = /^09[0-9]{8}$/i;
  const phone_re = /^09\d{2}-?\d{3}-?\d{3}$/i;

  cb.focus(function() {
    $('#h_chbWarning').text('');
    cb.css('color', 'null');
  });

  name.focus(function(){
    $('#h_nameWarning').text('');
    name.css('border-color', 'transparent');
  });

  phone.focus(function(){
    $('#h_phoneWarning').text('');
    phone.css('border-color', 'transparent');
  });

  email.focus(function(){
    $('#h_mailWarning').text('');
    email.css('border-color', 'transparent');
  });

  //設定收件人資訊不可為空值
  function formCheck() {
    $('#h_nameWarning').text('');
    $('#h_phoneWarning').text('');
    $('#h_mailWarning').text('');    
    name.css('border-color', 'transparent');
    phone.css('border-color', 'transparent');
    email.css('border-color', 'transparent');

    let isPass = true;
    // check checkbox
    if (!cb.prop('checked')) {
      isPass = false;
      $('#h_chbWarning').text('必勾選').css('color', '#FF0000');
    }

    if (name.val().length == 0) {
      isPass = false;
      name.css('border-color', '#FF0000');
      // name.next().text('請填寫收件人名字');
      $('#h_nameWarning').text('請填寫收件人名字').css('color', '#FF0000');
    }

    if (!phone_re.test(phone.val())) {
      isPass = false;
      phone.css('border-color', '#FF0000');
      // phone.next().text('請填寫收件手機');
      $('#h_phoneWarning').text('請填寫收件手機').css('color', '#FF0000');
    }

    if (!email_re.test(email.val())) {
      isPass = false;
      email.css('border-color', '#FF0000');
      // email.next().text('請填寫正確的 email 格式');
      $('#h_mailWarning').text('請填寫正確的 email 格式').css('color', '#FF0000');
    }

    if (isPass) {

        $("#h_send").on('click',function() {
        Swal.fire({
          position: 'top-center',
          icon: 'warning',
          title: '是否確認送出訂單?',
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
        console.log('result123:', result);
        // action="shopping-api.php" 
          if (result.value) {

              $.post("shopping-api.php", $(document.order1).serialize(), function(data){
                  Swal.fire({  
                  icon: 'success',
                  title: '訂單送出!',
                  text:'已成功送出訂單',
                  buttonsStyling: false,
                  showConfirmButton: true,
                  customClass: {
                    popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
                    title: 'pop_title',
                    cancelButton: 'pop_cancel',
                    confirmButton: 'pop_confirm',
                  }
                }).then((result) => {
                  location.href = 'shoppingcart03.php';
                })
                /*
                setTimeout((location).href('shoppingcart03.php'),1000)
                */
              });


          }
      })
    })
    return false;

    // alert("pass");
    //   $.post('shopping-api.php', $(document.order1).serialize(), function(data) {
    //     // console.log(data);
    //   }, 'json');

      //return true; //提交表單
    } else {
      // console.log($_POST);
      // alert("您尚未勾選「同意隱私權保護政策條款」");
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
        timer: 1500,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'warning',
        // title: '您尚未勾選「同意隱私權保護政策條款」'
        title: '您尚有資料未填寫'
      })
      return false; //不要提交表單
    }
  }

  // 同訂購人的核取方塊
  function OmitText() {
    var name = document.getElementById('h_inputNameBuyer').value;
    document.getElementById('h_inputNameRecipient').value = name;
    $(document.getElementById('h_inputNameRecipient')).focus();

    var phone = document.getElementById('h_inputPhoneBuyer').value;
    document.getElementById('h_inputPhoneRecipient').value = phone;
    $(document.getElementById('h_inputPhoneRecipient')).focus();

    var email = document.getElementById('h_inputEmailBuyer').value;
    document.getElementById('h_inputEmailRecipient').value = email;
    $(document.getElementById('h_inputEmailRecipient')).focus();

  }

  // 讀入購買商品的資料
  const dallorCommas = function(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };

  function prepareCartTable() {
    const $p_items = $('.p-item');

    if (!$p_items.length && $('#total-price').length) {
      // location.href = location.href;
      location.reload();
      return;
    }
    let subtotal = 0;
    // if ($p_items.length == 0) {
    //     location.href="product-list.php";
    // } else {
    $p_items.each(function() {
      const sid = $(this).attr('data-sid');
      const price = $(this).attr('data-price');
      const quantity = $(this).attr('data-quantity');

      $(this).find('.price').text('$ ' + dallorCommas(price));
      $(this).find('.qty').val(quantity);
      $(this).find('.sub-total').text('$ ' + dallorCommas(quantity * price));
      subtotal += quantity * price;
      $('#subtotal').text('$ ' + dallorCommas(subtotal));
      total = subtotal + 60;
      $('#total').text('NT$ ' + dallorCommas(total));
    })
  }
//   }
  prepareCartTable();


  const qty_sel = $('.qty');
  qty_sel.on('change', function() {
    const p_item = $(this).closest('.p-item');
    const sid = p_item.attr('data-sid');
    // alert(sid +', '+ $(this).val() )
    const sendObj = {
      action: 'add',
      sid: sid,
      quantity: $(this).val()
    }
    $.get('handle-cart.php', sendObj, function(data) {
      // setCartCount(data); // navbar
      p_item.attr('data-quantity', sendObj.quantity);
      prepareCartTable();
    }, 'json');
  });
  
</script>
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->