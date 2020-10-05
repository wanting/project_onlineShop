<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['nickname']) or empty($_POST['email'])  or empty($_POST['phone'])){
    $output['error'] = '資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


$email = strtolower(trim($_POST['email']));
$nickname = $_POST['nickname'];

$sql = "INSERT INTO `contact`(
     `nickname`, `email`, `phone`, `t-area`, `creat_date`
     ) VALUES (
         ?, ?, ?, ?, NOW()
     )";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['nickname'],
    $email,
    $_POST['phone'],
    $_POST['t-area'],

]);


if($stmt->rowCount()==1){
    $output['success'] = true;
    $output['id'] = $pdo->lastInsertId();
    // 要自動登入寫在這裡
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
