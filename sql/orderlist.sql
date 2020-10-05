-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-13 09:49:45
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `proj_pugrace`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orderlist`
--

CREATE TABLE `orderlist` (
  `sid` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `donate_invoice` varchar(255) NOT NULL,
  `donation_agency` varchar(255) DEFAULT NULL,
  `payee_name` varchar(255) NOT NULL,
  `payee_phone` varchar(255) NOT NULL,
  `payee_email` varchar(255) NOT NULL,
  `payee_address` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orderlist`
--

INSERT INTO `orderlist` (`sid`, `member_id`, `shipping`, `total`, `payment`, `donate_invoice`, `donation_agency`, `payee_name`, `payee_phone`, `payee_email`, `payee_address`, `memo`, `create_at`) VALUES
(1, 1, 60, 4460, '超商取貨付款', '否', '', 'admin', '0912345678', 'admin@mail.com', NULL, '', '2020-08-13 15:37:58'),
(2, 1, 60, 4460, '超商取貨付款', '否', '', 'admin', '0912345678', 'admin@mail.com', NULL, '', '2020-08-13 15:42:22'),
(3, 1, 60, 4460, '超商取貨付款', '否', '', 'admin', '0912345678', 'admin@mail.com', NULL, '', '2020-08-13 15:42:30'),
(4, 1, 60, 4460, '超商取貨付款', '否', '', 'admin', '0912345678', 'admin@mail.com', NULL, '', '2020-08-13 15:42:30'),
(5, 1, 60, 4460, '超商取貨付款', '否', '', 'admin', '0912345678', 'admin@mail.com', NULL, '', '2020-08-13 15:43:50');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
