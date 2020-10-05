<?php
require __DIR__ . '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

// $order_sql = "INSERT INTO `orderlist`(`member_id`, `product_details`, `quantity`, `subtotal`, `shipping`,`total`, `payment`, `payer_name`, `payer_phone`, `payer_email`, `donate_invoice`, `donation_agency`, `payee_name`, `payee_phone`, `payee_email`, `payee_address`, `memo`, `create_at`) VALUES (
// ?, ?, ?, ?, 60, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?
// )";
$order_sql = "INSERT INTO `orderlist`(
    `member_id`, `shipping`, `total`, `payment`, `donate_invoice`,
    `donation_agency`, `payee_name`, `payee_phone`, `payee_email`, `payee_address`,
    `memo`, `create_at`) VALUES (
        ?, 60, ?, ?, ?,
        ?, ?, ?, ?, ?,
        ?, NOW()
    )";

// set donate_invoice value according to h_receipt
$donate_invoice = ($_POST['h_receipt'] == "是") ? "是" : "否" ;

// sum up subtotal to get total
$order_length = count($_SESSION['cart']);
$total = 0;
for($i = 0; $i < $order_length; $i++){
    $total += $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['quantity'];
}
$total += 60;

$order_stmt = $pdo->prepare($order_sql);
$order_stmt->execute([
    $_SESSION['member']['sid'],
    $total,
    $_POST['payment'],
    $donate_invoice,

    $_POST['h_donate'],
    $_POST['payee_name'],
    $_POST['payee_phone'],
    $_POST['payee_email'],
    $_POST['payee_addr'],

    $_POST['memo']
]);

$order_sid = $pdo->lastInsertId();

$detail_sql = "INSERT INTO `order_details`(`order_number`, `products_id`, `price`, `quantity`) VALUES (?, ?, ?, ?)";
$detail_stmt = $pdo->prepare($detail_sql);

for($i = 0; $i < $order_length; $i++){
    $detail_stmt->execute([
       $order_sid,
       $_SESSION['cart'][$i]['sid'],
       $_SESSION['cart'][$i]['price'],
       $_SESSION['cart'][$i]['quantity']
    ]);
}

$_SESSION['order_sid'] = $order_sid;
unset($_SESSION['cart']);
// echo json_encode($output, JSON_UNESCAPED_UNICODE);
//header('Location: shoppingcart03.php');

