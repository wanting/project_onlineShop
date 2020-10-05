<?php
require __DIR__. '/__connect_db.php';
$perPage = 20; // 每頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看的頁數
// 目前使用
$active = $_GET['active']; // 執行動作
$parent_cate_id = isset($_GET['parent_cate']) ? intval($_GET['parent_cate']) : 0; // 父類別id
$cate_id = isset($_GET['cate']) ? intval($_GET['cate']) : 0; // 子類別id
$order = isset($_GET['order']) ? intval($_GET['order']) : 0; // 排序
// Init Data
$output = [];

if ($active == "getProdList") {
    // Init Data
    $output = [
        'perPage'=> $perPage,
        'page'=> $page,
        'totalRows' => 0,
        'totalPages' => 0,
        'rows' => [], // 該頁的資料
        'pageBtns' => [],
    ];

    // Bags
    if ($parent_cate_id == 3) {
        if(empty($cate_id)){
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid IN (6,7,8)";
        } else {
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid=$cate_id";
        }
    } else if ($parent_cate_id == 4) {
        if(empty($cate_id)){
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid IN (9,10,11)";
        } else {
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid=$cate_id";
        }
    } else if ($parent_cate_id == 5) {
        if(empty($cate_id)){
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid IN (12,13,14,15)";
        } else {
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid=$cate_id";
        }
    } else {
        if(empty($cate_id)){
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid IN (6,7,8,9,10,11,12,13,14,15)";
        } else {
            $t_sql = "SELECT COUNT(sid) FROM `products` WHERE cate_sid=$cate_id";
        }
    }

    $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
    $stmt = null;
    $pageBtns = [];
    if($totalRows > 0) {
        $totalPages = ceil($totalRows / $perPage);


        if ($page < 1) $page = 1;
        if ($page > $totalPages) $page=$totalPages;

        if (empty($order)) {
            if ($parent_cate_id == 3) {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (6,7,8) ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } else if ($parent_cate_id == 4) {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (9,10,11) ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } else if ($parent_cate_id == 5) {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (12,13,14,15) ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } else {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (6,7,8,9,10,11,12,13,14,15) ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } 
        } else if ($order == 1) {
            if ($parent_cate_id == 3) {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (6,7,8) ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } else if ($parent_cate_id == 4) {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (9,10,11) ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } else if ($parent_cate_id == 5) {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (12,13,14,15) ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } else {
                if(empty($cate_id)){
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid IN (6,7,8,9,10,11,12,13,14,15) ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                } else {
                    $sql = sprintf("SELECT * FROM products  WHERE cate_sid=$cate_id ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
                }
            } 
        }
        
        
        $stmt = $pdo->query($sql);


        if($totalPages<=5){
            for($i=1; $i<=$totalPages; $i++){
                $pageBtns[] = $i;
            }
        } else {
            $tmpAr1 = [];
            for($i=$page-2; $i<=$totalPages; $i++){
                if($i>=1) {
                    $tmpAr1[] = $i;  // array push
                }
                if(count($tmpAr1)>=5){
                    break;
                }
            }
            $tmpAr2 = [];
            for($i=$page+2; $i>=1; $i--){
                if($i<=$totalPages) {
                    array_unshift($tmpAr2, $i);
                }
                if(count($tmpAr2)>=5){
                    break;
                }
            }
            $pageBtns = (count($tmpAr1) > count($tmpAr2)) ? $tmpAr1 : $tmpAr2;

        }

        $output['page'] = $page;
        $output['totalRows'] = $totalRows;
        $output['totalPages'] = $totalPages;
        $output['rows'] = $stmt->fetchAll();
        $output['pageBtns'] = $pageBtns;
    }
} else if ($active == "getSubCateList"){
    // Init Data
    $output = [
        'list' => [],
    ];

    $sql = sprintf("SELECT * FROM categories  WHERE parent_sid=$parent_cate_id ORDER BY `sid`");
    $stmt = $pdo->query($sql);
    
    $output['list'] = $stmt->fetchAll();
}

header('Content-Type: application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);
