<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['password']) or empty($_POST['password2'])  
 ){
    $output['error'] = '資料不足';    //判斷會員資料是否空值
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



$sql = "SELECT `sid`, `password` FROM members WHERE sid=? AND password=SHA1(?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $_SESSION['member']['sid'], $_POST['password']]);
$row = $stmt->fetch();
if(empty($row)){
    $output['error'] = '密碼錯誤';    //檢查密碼是否空值
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$stmt->closeCursor();


                                                
$sql = "UPDATE `members` SET `password` = SHA1(?) WHERE sid=? ";
// UPDATE `members` SET `password` = SHA1('111111'), `create_at` = '2020-08-07 14:42:25' WHERE `members`.`sid` = 5;
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['password2'],
    $_SESSION['member']['sid'],
]);



$output['success'] = true;

    // 要自動登入寫在這裡

echo json_encode($output, JSON_UNESCAPED_UNICODE);
