<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['email']) or empty($_POST['password'])){
    $output['error'] = '資料不夠';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$email = strtolower(trim(($_POST['email'])));

$sql = "SELECT `sid`, `email`, `name`  FROM members WHERE email=? AND password=SHA1(?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $email,
    $_POST['password'],
]);

$row = $stmt->fetch();

if(! empty($row)){
    $output['success'] = true;
    unset($row['password']);
    $_SESSION['member'] = $row;
    //登入的話取得帳戶的name
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);