-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-02-22 18:46:40
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(3) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publisher` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `intro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publisher`, `director`, `trailer`, `poster`, `rank`, `sh`, `intro`) VALUES
(1, '院線片01', 2, 111, '2026-02-15', 'a', 'aaa', '03B01v.mp4', '03B01.png', 1, 1, '院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介'),
(2, '222222', 2, 101, '2026-02-13', 'BBBBBB', 'b', '03B02.mp4', '03B02.png', 2, 1, '院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介'),
(3, '院線片03', 4, 90, '2026-02-16', 'c', 'ccc', '03B03.mp4', '03B03.png', 3, 1, '院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介'),
(4, '院線片04', 2, 110, '2026-02-16', 'd', 'ddd', '03B04.mp4', '03B04.png', 4, 1, '院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介'),
(5, '院線片05', 1, 160, '2026-02-14', 'e', 'eee', '03B05.mp4', '03B05.png', 5, 1, '院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介'),
(6, '院線片06', 3, 80, '2026-02-15', 'f', 'fff', '03B06.mp4', '03B06.png', 6, 1, '院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介'),
(7, '院線片07', 4, 125, '2026-02-11', 'g', 'ggg', '03B07.mp4', '03B07.png', 7, 1, '院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介'),
(8, '院線片08', 2, 111, '2026-02-12', 'h', 'hhh', '03B08.mp4', '03B08.png', 8, 1, '院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介'),
(9, '院線片09', 1, 99, '2026-02-13', 'i', 'iii', '03B09.mp4', '03B09.png', 9, 1, '院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介'),
(10, '院線片10', 4, 123, '2026-02-14', 'j', 'jjj', '03B10.mp4', '03B10.png', 10, 1, '院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES
(1, '202602160001', '院線片01', '2026-02-17', '20:00 ~ 22:00', 4, 'a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"6\";i:3;s:2:\"13\";}'),
(2, '202602160002', '院線片06', '2026-02-17', '20:00 ~ 22:00', 4, 'a:4:{i:0;s:1:\"0\";i:1;s:1:\"3\";i:2;s:1:\"6\";i:3;s:2:\"17\";}'),
(6, '202602160003', '院線片05', '2026-02-16', '22:00 ~ 24:00', 2, 'a:2:{i:0;s:1:\"6\";i:1;s:1:\"7\";}'),
(7, '202602160007', '院線片06', '2026-02-17', '20:00 ~ 22:00', 4, 'a:4:{i:0;s:1:\"4\";i:1;s:1:\"9\";i:2;s:2:\"14\";i:3;s:2:\"19\";}'),
(8, '202602170008', '院線片01', '2026-02-17', '18:00 ~ 20:00', 3, 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"6\";i:2;s:1:\"7\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `rank`, `ani`, `sh`) VALUES
(1, 'aaaaa', '03A01.jpg', 3, 3, 1),
(2, 'bbbbb', '03A02.jpg', 1, 1, 1),
(3, 'ccccc', '03A03.jpg', 2, 3, 1),
(4, '預告片4', '03A04.jpg', 4, 3, 1),
(5, '預告片5', '03A05.jpg', 5, 3, 0),
(6, '預告片6', '03A06.jpg', 6, 1, 1),
(8, '預告片8', '03A08.jpg', 8, 1, 1),
(9, '預告片9', '03A09.jpg', 9, 2, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
