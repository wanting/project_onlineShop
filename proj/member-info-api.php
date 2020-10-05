<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['name']) or empty($_POST['birthday'])  
or empty($_POST['gender']) or empty($_POST['mobile'])
or empty($_POST['address'])or empty($_POST['password'])
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
    $output['error'] = '未輸入密碼';    //檢查密碼是否空值
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$stmt->closeCursor();

//$email = strtolower(trim($_POST['email']));//email大小寫

                                                
$sql = "UPDATE `members` SET `name` = ?, `birthday` = ?, `gender` = ?, `mobile` = ?,`address` = ? WHERE sid=? ";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['birthday'],
    $_POST['gender'],
    $_POST['mobile'],  
    $_POST['address'],
    $_SESSION['member']['sid'],
]);
    //立即刷新資訊,navbar秀出
    $_SESSION['member']['name'] = $_POST['name'];

    $output['success'] = true;


    // 要自動登入寫在這裡

echo json_encode($output, JSON_UNESCAPED_UNICODE);
