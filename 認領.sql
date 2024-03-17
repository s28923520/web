-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-17 13:04:52
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
-- 資料庫： `認領`
--

-- --------------------------------------------------------

--
-- 資料表結構 `團二`
--

CREATE TABLE `團二` (
  `id` int(11) NOT NULL,
  `角色` varchar(255) NOT NULL,
  `認領人(all)` varchar(255) DEFAULT NULL,
  `認領人(組)` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `團二`
--

INSERT INTO `團二` (`id`, `角色`, `認領人(all)`, `認領人(組)`) VALUES
(1, '一織', 'aaaa', NULL),
(2, '大和', 'bbb', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `磁鐵`
--

CREATE TABLE `磁鐵` (
  `id` int(11) NOT NULL,
  `角色` varchar(255) NOT NULL,
  `認領人(all)` varchar(255) DEFAULT NULL,
  `認領人(組)` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `磁鐵`
--

INSERT INTO `磁鐵` (`id`, `角色`, `認領人(all)`, `認領人(組)`) VALUES
(1, '一織', 'AAA', NULL),
(2, '大和', 'BBB', NULL),
(3, '三月', 'CCC', NULL),
(4, '環', 'DDD', NULL),
(5, '壯五', '自留', NULL),
(6, '凪', 'EEE', NULL),
(7, '陸', 'FFF', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `團二`
--
ALTER TABLE `團二`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `磁鐵`
--
ALTER TABLE `磁鐵`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `團二`
--
ALTER TABLE `團二`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `磁鐵`
--
ALTER TABLE `磁鐵`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
