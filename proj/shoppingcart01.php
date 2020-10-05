<?php require __DIR__ . '/__connect_db.php';
$pageName = 'cart';
if (empty($_SESSION['cart'])) {
  header('Location: shoppingcart–empty.php');
  exit;
}
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

  /* --------------流程示意-------------- */
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
      font-size: 24px;
    }

    .h_cartStep {
      width: 240px;
      margin: 0 auto 50px auto;
    }
  }

  /* --------------狀態顯示共用項目-------------- */

  .h_row {
    position: relative;
    max-width: 1140px;
    margin: 0 auto;
  }

  .h_table-b,
  .h_row table {
    margin-bottom: 50px;
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

  /* --------------狀態顯示：訂購項目-------------- */
  .h_title {
    background-color: #eeeeee;
    text-align: left;
    font-weight: 500;
    padding: 12px 24px;
    border-color: #eeeeee;
  }

  .p-4 {
    font-weight: 700;
    margin-bottom: none;
  }

  .h_subtitle,
  .p-item {
    border-top: 2px solid #e0b872;
  }

  .h_productImg {
    padding: 50.5px 0;
    margin-right: 60px;
  }

  .h_productImg img {
    width: 168px;
    height: 168px;
  }

  .h_detail {
    text-align: center;
  }

  .h_shoppingitem {
    margin-top: 110px;
  }

  .h_productsName {
    width: 300px;
    padding: 8px 20px;
  }

  .price,
  .h_sub-total {
    padding: 8px 20px;
  }

  .quantity {
    padding: 0px 20px;
    text-align: right;
  }

  .h_remove {
    padding: 8px 50px;
  }

  .h_productDetail {
    width: 528px;
  }

  .h_productPrice,
  .price {
    width: 200px;
    text-align: right;
  }

  .h_productQuantity,
  .quantity {
    width: 100px;
  }

  .h_productSubTotal,
  .h_sub-total {
    width: 200px;
    text-align: right;
  }

  .h_productRemove {
    width: 111px;
    text-align: center;
  }

  .h_detailRWD {
    display: none;
  }

  .h_removeRWD {
    display: none;
  }

  @media screen and (max-width: 1157px) {
    .h_subtitle {
      display: none !important;
    }

    .h_productImg {
      padding: 24.5px 0;
      margin-right: 40px;
    }

    .h_productImg {
      margin-right: 10px;
    }

    .h_productImg img {
      display: flex;
      width: 80px;
      height: 80px;
    }

    .h_shoppingitem {
      margin-top: 24.5px;
      padding: 0;
    }

    .h_productsName {
      width: 200px;
      height: 80px;
      padding: 25px 0;
    }

    .h_productItem {
      flex-direction: column-reverse;
      text-align: right;
      margin-left: -90px;
      margin-top: 20px;
    }

    .h_remove {
      display: none;
    }

    .h_productItem {
      width: 300px;
      text-align: right;
    }

    .h_detailRWD {
      display: flex;
      width: 100px;
    }

    .price,
    .h_sub-total {
      width: 200px;
      text-align: right;
      align-content: center;
      padding: 0;
      line-height: 65.5px;
    }

    .quantity {
      width: 200px;
      text-align: right;
      align-content: center;
      padding: 13px 0 0 0;
      line-height: 65.5px;
    }

    .h_removeRWD {
      display: flex;
      padding: 25px 0;
      text-align: right;
    }

  }

  /* 狀態顯示：運送方式&結帳款項確認 */
  .h_table-b thead th {
    border-top: none;
    border-bottom: 2px solid #e0b872;
  }

  .h_title,
  .h_table-b th,
  .h_table-b td {
    padding: 16px 24px;
    color: #465038;
    /* border-bottom: 2px solid #e0b872; */
    font-size: 16px;
    font-weight: 700;
  }



  .h_itemsScript {
    padding: 50.5px 0;
    margin: 50.5px 60px;
  }

  /* 舊表格樣式 */

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

  a.checkOut_btn:hover {
    color: white;
  }

  @media screen and (max-width:768px) {
    .h_icon.yellow_btn {
      font-size: 16px;
      width: 100%;
    }

    a {
      font-size: 16px;
      display: block;
    }

    .h_table-m,
    .h_table-s {
      margin: 0 auto;
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
  } */

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

<script>
  //確定登入成功才能繼續結帳流程
  var login_success_order = <?= empty($_SESSION['member']) ? 'false' : 'true' ?>;

  if (!login_success_order) {
    location.href = 'login.php';
  } else {

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
  <!------------------------- 上方表格--------------->
  <form method="post" class="go_to_checkout" name="order1" onsubmit="return radioTest();">
    <div class="h_table-b">
      <div class="font4 h_title h_tableRwd">訂購項目</div>
      <div class="d-flex flex-row bd-highlight h_subtitle">
        <div class="flex-wrap bd-highlight p-4 bd-highlight font5 h_productDetail">商品資料</div>
        <div class="d-flex flex-wrap bd-highlight h_detail justify-content-center">
          <div class=" p-4 bd-highlight font5 h_productPrice">單價</div>
          <div class=" p-4 bd-highlight font5 h_productQuantity">數量</div>
          <div class=" p-4 bd-highlight font5 h_productSubTotal">小計</div>
        </div>
        <div class="h_productRemove">
          <a href="javascript:" class="remove-allItem">
            <i class="p-4 bd-highlight font5 fas fa-times"></i>
          </a>
        </div>
      </div>
      <?php foreach ($_SESSION['cart'] as $i) : ?>
        <div class="d-flex p-item flex-row bd-highlight" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['quantity'] ?>">

          <div class="bd-highlight font5 h_productImg align-middle">
            <img src="../img/<?= $i['products_id'] ?>_0.jpg" alt="">
          </div>

          <div class="d-flex flex-wrap bd-highlight h_shoppingitem">
            <div class="h_productRWD d-flex">
              <div class="d-flex bd-highlight font5 h_productsName">
                <?= $i['products_name'] ?>
              </div>
              <div class="flex-grow-5 h_removeRWD">
                <a href="javascript:" class="remove-item">
                  <i class="fas fa-times"></i>
                </a>
              </div>
            </div>

            <div class="d-flex h_productItem">
              <div class="d-flex flex-wrap bd-highlight h_detail">
                <div class=" p-4 bd-highlight font5 h_productPrice h_detailRWD">單價</div>
                <div class="bd-highlight font5 price"></div>
                <div class=" p-4 bd-highlight font5 h_productQuantity h_detailRWD">數量</div>
                <div class="bd-highlight font5 quantity">
                  <select class="form-control qty">
                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class=" p-4 bd-highlight font5 h_productSubTotal h_detailRWD">小計</div>
                <div class="bd-highlight font5 sub-total h_sub-total"></div>
              </div>

              <div class="flex-grow-5 h_remove">
                <a href="javascript:" class="remove-item">
                  <i class="fas fa-times"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </form>

  <!------------------------- 下方表格--------------->
  <div class="row h_row h_mixRow">
    <!------------------------- 下左表格--------------->
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
    <!------------------------- 下右表格--------------->
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
          <td class="h_cartNum font6" id="shipping">$60</td>
        </tr>
        <tr>
          <td class="h_cartTitle font6" scope="">合計</td>
          <td class="h_cartNum font5">
            <span id="total"></span>
          </td>
        </tr>
        <tr>
          <td class="button" colspan="2">
            <div class="h_textCenter h_icon">
              <a id="checkOut_btn" class="checkOut_btn yellow_btn" role="button">前往結帳</a>
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
<?//php endif; ?>

<?php include __DIR__ . '/__scripts.php' ?>
<!-- body結束 -->

<script>
  // 讀入購買商品的資料
  const dallorCommas = function(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };
  //prepareCartTable啟動位置? 叫購物車的資訊
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
  // }
  prepareCartTable();

  //呼叫handle-cart.php ,做了什麼事?
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

  var cart_num = "<?php echo count($_SESSION['cart']); ?>";
  cart_num = parseInt(cart_num, 10);
  console.log(cart_num);

  //移除購物車所有商品
  $('.remove-allItem').on('click', function() {
    cart_num = 0;
    // console.log(cart_num);
    // console.log(typeof(cart_num));
    Swal.fire({
      position: 'top-center',
      icon: 'warning',
      title: '是否移除所有商品?',
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
          action: 'empty',
          sid: sid
        }, function(data) {
          p_item.remove();
          prepareCartTable();
        }, 'json');
        Swal.fire({
          icon: 'success',
          title: '成功刪除!',
          text: '已成功移除商品',
          buttonsStyling: false,
          showConfirmButton: true,
          customClass: {
            popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
            title: 'pop_title',
            cancelButton: 'pop_cancel',
            confirmButton: 'pop_confirm',
          }
        }).then((result) => {
          if (result.value) {
            if (cart_num == 0) {
              // console.log("cart is empty");
              location.href = 'shoppingcart–empty.php';
              return;
            }
          }
        })
      }
    })
  });

  // 移除購物車商品-1
  $('.remove-item').on('click', function() {
    cart_num -= 1;
    console.log(cart_num);
    // console.log(typeof(cart_num));
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
          title: '成功刪除!',
          text: '已成功移除商品',
          buttonsStyling: false,
          showConfirmButton: true,
          customClass: {
            popup: 'pop_banner', //pop-go可以自己隨意定義變數,然後在上方CSS更改
            title: 'pop_title',
            cancelButton: 'pop_cancel',
            confirmButton: 'pop_confirm',
          }
        }).then((result) => {
          if (result.value) {
            if (cart_num == 0) {
              // console.log("cart is empty");
              location.href = 'shoppingcart–empty.php';
              return;
            }
          }
        })
      }
    })
  });


  //讓checkOut_btn變成go_to_checkout的submit
  $(".yellow_btn").click(function() {
    $(".go_to_checkout").submit();
    // $(".payment_radio").submit();
  });


  //radio導入付款頁面
  function radioTest() {
    // console.log("dada");
    /*
    if (radioValue == '超商取貨付款') {
      console.log(radioValue);
      location.href = 'shoppingcart02-1.php';
    }
    if (radioValue == '信用卡一次付清') {
      console.log(radioValue);
      location.href = 'shoppingcart02-3.php';
    }
    if (radioValue == 'ATM代碼繳費') {
      console.log(radioValue);
      location.href = 'shoppingcart02-2.php';
    }
    if (radioValue == '貨到付款') {
      console.log(radioValue);
      location.href = 'shoppingcart02-4.php';
    }
    */
    
    return false;
  };

  $('#checkOut_btn').click(function() {
    var radioValue = $("input[name='payment']:checked").val();
    if (radioValue == '超商取貨付款') {
      console.log(radioValue);
      location.href = 'shoppingcart02-1.php';
    } else if (radioValue == '信用卡一次付清') {
      console.log(radioValue);
      location.href = 'shoppingcart02-3.php';
    } else if (radioValue == 'ATM代碼繳費') {
      console.log(radioValue);
      location.href = 'shoppingcart02-2.php';
    } else if (radioValue == '貨到付款') {
      console.log(radioValue);
      location.href = 'shoppingcart02-4.php';
    } else {
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

        title: '請選擇付款方式'
      })
    }
  });
</script>

<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->