-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-17 13:04:10
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `團務`
--

-- --------------------------------------------------------

--
-- 資料表結構 `團務`
--

CREATE TABLE `團務` (
  `品項` varchar(255) NOT NULL COMMENT '團名',
  `數量` varchar(20) NOT NULL COMMENT '數量',
  `貨況` varchar(50) NOT NULL COMMENT '貨況',
  `官方預計發售日` varchar(50) NOT NULL COMMENT '發售日',
  `金額` int(20) DEFAULT NULL,
  `金額2` int(20) DEFAULT NULL,
  `金額3` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `團務`
--

INSERT INTO `團務` (`品項`, `數量`, `貨況`, `官方預計發售日`, `金額`, `金額2`, `金額3`) VALUES
('磁鐵', '各一盒', '已寄出', '12/21', 200, 360, NULL),
('團二', '三盒', '已下單', '12/5', 250, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
