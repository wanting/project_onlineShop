<?php
require __DIR__ . '/__connect_db.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$member_sid = isset($_SESSION['member']['sid']) ? $_SESSION['member']['sid'] : '';

$output = [
    'action' => $action,
    'code' => 0,
];

/*
 * action:
 *   add (加入商品),
 *   remove (移除商品),
 *   empty (清空購物車)
 *   (預設) (查詢內容)
 */
if (!empty($sid)) {

    switch ($action) {
        case 'add':
            $sql = "SELECT `sid`, `products_name`, `products_id`, `price` FROM `products` WHERE `sid`=$sid";
            $row = $pdo->query($sql)->fetch();
            if (empty($row)) {
                // 找不到那項商品
                $output['code'] = 240;
            } else {
                $sql = "SELECT sid FROM `wishlist` WHERE member_sid=? AND products_id=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_SESSION['member']['sid'],
                    $sid
                ]);
                if ($stmt->rowCount() > 0) {
                    // already added
                    $output['code'] = 300;
                } else {
                    $insertSql = "INSERT INTO `wishlist`(`member_sid`, `products_id`, `created_date`) VALUES (?, ?, NOW())";
                    $stmt2 = $pdo->prepare($insertSql);
                    $stmt2->execute([
                        $_SESSION['member']['sid'],
                        $sid
                    ]);

                    $output['code'] = 260;
                    $output['rowCount'] = $stmt2->rowCount();
                }
            }

            break;

        case 'remove':
            // $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
            $sql = "SELECT `sid` FROM `wishlist` WHERE `sid`=$sid AND `member_sid`= $member_sid ";
            $row = $pdo->query($sql)->fetch();
            if (!empty($sid)) {
                // $sql = "DELETE * FROM `wishlist` WHERE member_sid=$member_sid AND products_id=$sid";
                $sql = " DELETE FROM `wishlist` WHERE `wishlist`.products_id=$sid ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $sid
                ]);
                $output['code'] = 9487;
                break;
            }

            // else {
            //刪除商品

            //$sql = "DELETE * FROM `wishlist` WHERE member_sid=? AND products_id=?";
            //$stmt = $pdo->prepare($sql);
            //$stmt->execute([
            //$_SESSION['member']['sid'],
            //$sid
            //]);

            // $output['rowCount'] = $stmt->rowCount();
            //$output['code'] = 400;

            // case 'empty':
            //     $sql = "DELETE FROM `wishlist` WHERE member_sid=?";
            //     $stmt = $pdo->prepare($sql);
            //     $stmt->execute([
            //         $_SESSION['member']['sid']
            //     ]);
            //     $output['rowCount'] = $stmt->rowCount();
            //     break;
            //}
            break;
    }
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
