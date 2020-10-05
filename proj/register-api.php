<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['email']) or empty($_POST['password'])  or empty($_POST['password2'])){
    $output['error'] = '資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if($_POST['password']!=$_POST['password2'])
{
    $output['error'] = '密碼輸入錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$email = strtolower(trim($_POST['email']));

$sql = "SELECT `sid`, `email`, `name`  FROM members WHERE email=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $email ]);
$row = $stmt->fetch();
if(!empty($row)){
    $output['error'] = '此 Email 已經註冊過了';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$stmt->closeCursor();

$hash = md5($email. rand());

$sql = "INSERT INTO `members`(
            `email`, `password`,`name`, `create_at`
            ) VALUES (
            ?, SHA1(?),?, NOW()
            )";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $email,
    $_POST['password'],
    $_POST['name'],
]);


if($stmt->rowCount()==1){
    $output['success'] = true;
    $output['id'] = $pdo->lastInsertId();
    // 要自動登入寫在這裡
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
