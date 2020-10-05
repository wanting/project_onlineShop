<?php require __DIR__ . '/__connect_db.php';
$pageName = 'member-orderlist';

?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="../css/all.css">
<style>
    .a-container {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0 auto;
    }

    .a-blocks {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
    }

    @media screen and (max-width: 576px) {
        .a-blocks {
            flex-direction: row;
        }
    }

    .a-blocks .a-block {
        padding-top: 50px;
        text-align: center;
    }

    @media screen and (max-width: 576px) {
        .a-blocks .a-block {
            padding-top: 30px;
            margin-left: 10px;
            margin-right: 10px;
            width: calc(33.33% - 20px);
        }
    }

    .a-blocks .addCart-sidebar {
        background-color: #465038;
        color: #fff;
        cursor: auto;
        display: block;
        height: 100%;
        overflow-y: auto;
        /* padding: 70px 20px 20px; */
        position: fixed;
        float: none;
        right: 0;
        top: 0;
        bottom: 0;
        left: auto;
        text-align: left;
        width: 100%;
        transform: translateZ(0) translateX(0) translateX(100%);
        transition: transform 0.3s ease-in-out;
        z-index: 10;
    }

    .a-blocks .addCart-sidebar {
        padding: 100px 50px 50px;
        width: 600px;
        transform: translateZ(0) translateX(0) translateX(600px);
    }

    @media screen and (max-width: 576px) {
        .a-blocks .addCart-sidebar {
            width: 100vw;
        }
    }

    .a-blocks .addCart-sidebar .close {
        cursor: pointer;
        display: inline-block;
        margin-bottom: 20px;
        position: absolute;
        top: 20px;
    }

    @media screen and (max-width: 576px) {
        .a-blocks .addCart-sidebar .close {
            padding: 8px;
            top: 36px;
        }
    }

    .a-blocks .addCart-sidebar.open {
        transform: translateZ(0) translateX(0%);
    }

    .addCart-sidebar-form th img {
        width: 60px;
        height: 60px;
    }

    .table th,
    .table td {
        border-top: none;
    }

    .table thead th {
        border-bottom: 2px solid #e0b872;
    }

    .checkOut_btn {
        margin-top: 50px;
    }
</style>
<!-- body開始 -->
<?php include __DIR__ . '/__navbar.php' ?>
<div class="a-container">
    <div class="a-blocks">
        <div class="a-block has-sidebar">
            <!-- This exists for tabbability? -->
            <button aria-expanded="false" class="b-addcar white_btn mx-2">加入購物車</button>
            <div class="addCart-sidebar">
                <button class="close">
                    <i class="fas fa-times" style="color:#fff; width:25px; height:25px;"></i>
                </button>
                <!-- 購物車項目 -->
                <table class="table col-12 addCart-sidebar-form" style="color: #fff; margin:0;">
                    <thead>
                        <tr>
                            <th class="font2" style="color:#fff;" colspan="3">SHOPPING CART</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $i) : ?>
                            <tr class="p-item" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['quantity'] ?>">
                                <th scope="row" class="align-middle">
                                    <img src="../img/<?= $i['products_id'] ?>_0.jpg" alt="">
                                </th>
                                <td class="align-middle font6 products_name" style="color:#fff;">
                                    <?= $i['products_name'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle font6" style="color:#fff;">單價</th>
                                <td class="align-middle font6 price" style="color:#fff;"><?= $i['price'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle font6" style="color:#fff;">數量</th>
                                <td class="quantity align-middle" style="color:#fff;">
                                    <?= $i['quantity'] ?>
                                </td>
                            </tr>

                            <tr style="border-bottom:2px solid #e0b872;">
                                <th scope="row" class="align-middle font6 sub-total" style="color:#fff;" >
                                    小計
                                </th>
                                <td class="align-middle font6 sub-total" colspan="2" style="color:#fff;">
                                <?= $i['price'] * $i['quantity'] ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table class="table col-12 addCart-sidebar-form">
                    <tbody>
                        <tr>
                            <td class="h_cartTitle font6" style="color:#fff;">運費</td>
                            <td class="h_cartNum font6" id="shipping" style="color:#fff;">NT$60</td>
                        </tr>
                        <tr>
                            <td class="font6" scope="" style="color:#fff;">
                                合計
                            </td>
                            <td class="h_cartNum font5" style="color:#fff;">
                                <span id="total"></span>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <div class="checkOut_btn">
                    <a class="yellow_btn text-center" id="checkOut_btn" role="button" href="<?= WEB_ROOT ?>/shoppingcart01.php">查看購物車</a>
                </div>
            </div>
        </div>
    </div>

</div>





<?php include __DIR__ . '/__scripts.php' ?>
<script>
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

    // 加入購物車彈窗
    class SidebarToggle {
        constructor() {
            this.closeSidebarOnEscape();
            this.PathwaysSidebarOnClickElement();
        }

        close() {
            $(".open").removeClass("open");
            $(".a-block button").attr("aria-expanded", "false");
            $("body").removeClass("fixedPosition");
        }

        PathwaysSidebarOnClickElement() {
            var $this = this;

            $(".a-block.has-sidebar button").on("click", function(event) {
                // remove classes from all
                $this.close();
                $this.closeSidebarOnClickClose();
                $this.closeSidebarOnDocumentClick();

                // add class to the one we clicked
                $(".addCart-sidebar", this.parentNode)
                    .addBack(this.parentNode)
                    .addClass("open");
                $(this).attr("aria-expanded", "true");
                $("body").addClass("fixedPosition");
                event.stopPropagation();
            });
        }

        closeSidebarOnClickClose() {
            var $this = this;

            $(".a-block .close").on("click", function(event) {
                $this.close();

                // setTimeout(function() {
                //     $(this)
                //         .parent()
                //         .parent()
                //         .closest("button")
                //         .focus();
                // }, 1);

                event.stopPropagation();
            });
        }

        closeSidebarOnEscape() {
            var $this = this;

            $(document).keyup(function(event) {
                if (event.key === "Escape") {
                    $this.close();
                }
            });
        }

        closeSidebarOnDocumentClick() {
            var $this = this;

            $(document).on("click", function() {
                $this.close();
            });

            $(".a-block.has-sidebar").on("click", function(event) {
                event.stopPropagation();
            });
        }
    }

    new SidebarToggle();


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
</script>
<!-- body結束 -->
<?php include __DIR__ . '/__html_foot.php' ?>
<!-- php require __DIR__. '/__html_foot.php' -->
<!-- require error後會停止執行程式 通常式資料庫讀取使用 -->
<!-- include error後還是會繼續執行下一個動作 程式不會停下 -->