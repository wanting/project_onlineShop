<?php
//連結資料庫
$db_host = 'localhost';
$db_name = 'proj_pugrace'; //看你的資料庫名稱叫什麼
$db_user = 'root'; //預設帳密
$db_pass = '';

$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',$db_host, $db_name);
               //裡面不能有空格

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       
    //發生錯誤的時候要以什麼模式呈現 例外exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //讀取資料使用"關聯式陣列"
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"  
    //連線後要做的第一個指令-->SQL語法:傳送資料進出要用utf8 
    //很容易忘記直接copy
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
// $pdo->query("USE `proj58`"); // 選擇使用的資料庫

if(! isset($_SESSION)){
    session_start();
}

define('WEB_ROOT','/project_onlineShop/proj'); //網址縮短用變數

define('WEB_INDEX', 'a-index.php');
define('WEB_MEMBER', 'member-index.php');