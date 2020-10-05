<?php require __DIR__ . '/__connect_db.php';
$pageName = '購物車';
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

  /* 狀態顯示：訂購項目 */

  .h_row {
    position: relative;
    max-width: 1140px;
    margin: 0 auto;
  }

  .h_row table {
    margin-bottom: 50px;
  }

  .h_title {
    background-color: #eeeeee;
    text-align: left;
    font-weight: 500;
    padding: 12px 24px;
    border-color: #eeeeee;
  }

  .h_table-bRwd {
    display: none;
  }

  @media screen and (max-width:756px) {

    .h_title,
    .h_table-b {
      display: none;
    }

    .h_table-bRwd {
      display: table;
    }
  }

  .h_table-b thead th {
    border-top: none;
    border-bottom: 2px solid #e0b872;
  }

  .h_table-b th,
  .h_table-b td {
    color: #465038;
  }

  @media screen and (max-width: 576px) {
    .h_row {
      position: relative;
      max-width: 302px;
      margin: 0 auto;
    }

    /* 所有table在RWD時都滿版 */
    .h_tableRwd {
      min-width: 100%;
    }
  }

  /* 狀態顯示：運送方式&結帳款項確認 */
  .h_table-b thead th,
  .h_table-bRwd thead th {
    border-top: none;
    border-bottom: 2px solid #e0b872;
  }

  .h_table-b th,
  .h_table-b td {
    padding: 16px 24px;
    color: #465038;
    border-bottom: 2px solid #e0b872;
  }

  .h_table-b td img {
    padding: 50.5px 24px;
    width: 168px;
    height: 168px;
    padding: 0;
    margin: 34.5px 0;
  }

  .h_table-bRwd td img {
    width: 60px;
    height: 60px;
  }

  .h_table-bRwd tbody td {
    border-top: none;
    border-bottom: none;
  }

  .h_table-bRwd thead,
  .h_table-bRwd tbody {
    border-bottom: 2px solid #e0b872;
  }

  .h_mixRow {
    justify-content: space-between;
  }

  .h_table-m {
    border: 2px solid #eeeeee;
    margin: 0 15px 0 auto;
  }

  .h_table-s {
    border: 2px solid #eeeeee;
    margin: 0 auto 0 15px;
  }

  .h_table-bRwd thead th,
  .h_table-m thead th,
  .h_table-s thead th {
    padding: 16px 24px;
    background-color: #eeeeee;
  }

  .h_table-m thead th,
  .h_table-s thead th {
    border: 2px solid #eeeeee;
  }

  .h_table-m tbody td {
    padding: 30px 24px;
  }

  .h_table-bRwd thead th,
  .h_table-m tbody td {
    border-top: none;
  }

  hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 2px solid #e0b872;
  }

  .h_table-s tbody td {
    border-top: none;
    border-bottom: none;
    padding: 19.2px 24px;
  }

  .h_cartTitle {
    margin: 0;
  }

  .h_cartNum {
    text-align: right;
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

  @media screen and (max-width:768px) {
    .h_icon.yellow_btn {
      font-size: 16px;
      width: 100%;
      color: #ffffff;
    }

    a {
      font-size: 16px;
      color: #ffffff;
    }

    .h_table-m,
    .h_table-s {
      margin: 0 auto;
    }
  }

  /* --------------top-------------------- */
  .top {
    position: fixed;
    bottom: 30px;
    right: 30px;
  }

  .top>img {
    height: 50px;
    width: 50px;
  }

  /* ---------------彈跳視窗------------------ */
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
</style>
<script>
  //如果購物車是空的連到shoppingcart-empty
  // var cart_empty = <?= empty($_SESSION['cart']) ? 'false' : 'true' ?>;

  // if (!cart_empty ) {

  // } else {
  //   location.href = 'shoppingcart-empty.php';
  // };
</script>
<script>
  //確定登入成功才能繼續結帳流程
  var login_success_order = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

  if (!login_success_order) {
    location.href = 'login.php';
  } else {
    // location.href = 'shoppingcart01.php';
  };
</script>

<h1>購物車</h1>
<div class="h_step">
  <picture>
    <source class="h_cartStep" media="(min-width: 576px)" srcset="../img/cartStep1.svg" />
    <img class="h_cartStep" src="../img/cartStep1_1x.svg" alt="">
  </picture>
</div>
<div class="h_row">
  <!-- <div class="font4 h_title">
    訂購項目
  </div> -->
  <form method="post" class="go_to_checkout" name="order1" onsubmit="return radioTest();">
    <table class="table col-12 h_table-b">
      <thead>
        <tr>
          <th class="font4 h_title" colspan="6">訂購項目</th>
        </tr>
        <tr>
          <th class="align-middle font5" scope="col" colspan="2">商品資料</th>
          <th class="align-middle font5" scope="col">單價</th>
          <th class="align-middle font5" scope="col">數量</th>
          <th class="align-middle font5" scope="col">小計</th>
          <th class="align-middle" scope="col">
            <i class="fas fa-times"></i>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['cart'] as $i) : ?>
          <tr class="p-item" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['quantity'] ?>">
            <td class="align-middle">
              <img src="../img/<?= $i['products_id'] ?>_0.jpg" alt=""></td>
            <td class="align-middle font5 products_name"><?= $i['products_name'] ?></td>
            <td class="align-middle font5 price"></td>
            <td class="quantity align-middle font5">
              <select class="form-control qty quantity">
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
              </select>
            </td>
            <td class="align-middle font5 sub-total"></td>
            <td class="align-middle font5">
              <a href="javascript:" class="remove-item"><i class="fas fa-times"></i></a>
              <!-- <i class="fas fa-times"></i> -->
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </form>
  <!----------------------- mobile---------- -->
  <table class="table col-12 h_table-bRwd">
    <thead>
      <tr>
        <th colspan="3">訂購項目</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="align-middle">
          <img src="../img/c_bag01_0.jpg" alt="">
        </td>
        <td class="align-middle font6">
          15.5吋筆電收納包-<br>
          差旅款/荷包蛋花朵/粉色
        </td>
        <td class="align-middle font6">
          <i class="fas fa-times"></i>
        </td>
      </tr>
      <tr>
        <td class="align-middle font6">單價</td>
        <td class="align-middle font6 h_cartNum" colspan="2">[`price`]</td>
      </tr>
      <tr>
        <td class="align-middle font6">數量</td>
        <td class="quantity align-middle h_cartNum" colspan="2">
          <select class="form-control qty font6">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
              <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="align-middle font6 sub-total">小計</td>
        <td class="align-middle font6 h_cartNum " colspan="2">$小計金額</td>
      </tr>
    </tbody>
  </table>
  <div class="row h_row h_mixRow">
    <table class="table h_table-m col-7 h_tableRwd">
      <thead>
        <tr>
          <th scope="">付款方式</th>
        </tr>
      </thead>
        <tbody>
          <tr>
            <td>
              <input type="radio" id="h_convenienceStore" name="payment" value="超商取貨付款">
              <label class="h_cartTitle font6" for="h_convenienceStore">　超商取貨付款</label>
              <hr>
              <input type="radio" id="h_credit" name="payment" value="信用卡一次付清">
              <label class="h_cartTitle font6" for="h_credit">　信用卡一次付清</label>
              <hr>
              <input type="radio" id="h_atm" name="payment" value="ATM代碼繳費">
              <label class="h_cartTitle font6" for="h_atm">　ATM代碼繳費</label>
              <hr>
              <input type="radio" id="h_cod" name="payment" value="貨到付款">
              <label class="h_cartTitle font6" for="h_cod">　貨到付款</label>
            </td>
          </tr>
        </tbody>
    </table>
    <table class="table h_table-s col-4 h_tableRwd">
      <thead>
        <tr>
          <th scope="" colspan="2">訂單資訊</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="h_cartTitle font6 sub-total">小計</td>
          <td class="h_cartNum font6"><span id="subtotal"></span></td>
        </tr>
        <tr>
          <td class="h_cartTitle font6">運費</td>
          <td class="h_cartNum font6" id="shipping">NT$60</td>
        </tr>
        <tr>
          <td class="h_cartTitle font6" scope="">合計</td>
          <td class="h_cartNum font5">
            <span id="total"></span>
          </td>
        </tr>
        <tr>
          <td class="button" colspan="2">
            <div class="h_textCenter h_icon yellow_btn">
              <a class="checkOut_btn" id="convenienceStore_c" role="button">前往結帳</a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</div>
<div id="goTop" class="top" onclick="goTop();">
  <img src="../img/TOP.svg" />
</div>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script>
  //lazyout
  lazyload();

  function checkFields() {

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
      $('#total').text('$ ' + dallorCommas(total));
    })
  }
  //}



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

  // 移除購物車商品-1
  $('.remove-item').on('click', function() {
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
        const p_item = $(this).closest('.p-item');
        const sid = p_item.attr('data-sid');
        $.get('handle-cart.php', {
          action: 'remove',
          sid: sid
        }, function(data) {
          p_item.remove();
          prepareCartTable();
        }, 'json');
        Swal.fire({
          icon: 'success',
          title: 'Deleted!',
          text: '已成功移除商品',
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



  
  // };

  //讓checkOut_btn變成go_to_checkout的submit
  $(".checkOut_btn").click(function() {
    $(".go_to_checkout").submit();
    $(".payment_radio").submit();
  });

  //radio導入付款頁面

  function radioTest() {
    console.log("dada");

    var radioValue = $("input[name='payment']:checked"). val();
    if(radioValue =='超商取貨付款')
    {
      location.href = 'shoppingcart02-1.php';
    }
    if(radioValue =='信用卡一次付清')
    {
      location.href = 'shoppingcart02-3.php';
    }
    if(radioValue =='ATM代碼繳費')
    {
      location.href = 'shoppingcart02-2.php';
    }
    if(radioValue =='貨到付款')
    {
      location.href = 'shoppingcart02-4.php';
    }
if(radioValue){
alert("val=" + radioValue);
}

  };
</script>

<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->