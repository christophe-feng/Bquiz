-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-02-11 09:30:13
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
(1, '院線片01', 2, 111, '2026-02-10', 'a', 'aaa', '03B01v.mp4', '03B01.png', 1, 1, '院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介院線片01簡介'),
(2, '222222', 2, 101, '2026-02-11', 'BBBBBB', 'b', '03B02.mp4', '03B02.png', 2, 1, '院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介院線片02簡介'),
(3, '院線片03', 4, 90, '2026-02-11', 'c', 'ccc', '03B03.mp4', '03B03.png', 3, 1, '院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介院線片03簡介'),
(4, '院線片04', 2, 110, '2026-02-10', 'd', 'ddd', '03B04.mp4', '03B04.png', 4, 1, '院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介院線片04簡介'),
(5, '院線片05', 1, 160, '2026-02-11', 'e', 'eee', '03B05.mp4', '03B05.png', 5, 1, '院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介院線片05簡介'),
(6, '院線片06', 3, 80, '2026-02-09', 'f', 'fff', '03B06.mp4', '03B06.png', 6, 1, '院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介院線片06簡介'),
(7, '院線片07', 4, 125, '2026-02-11', 'g', 'ggg', '03B07.mp4', '03B07.png', 7, 1, '院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介院線片07簡介'),
(8, '院線片08', 2, 111, '2026-02-12', 'h', 'hhh', '03B08.mp4', '03B08.png', 8, 1, '院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介院線片08簡介'),
(9, '院線片09', 1, 99, '2026-02-13', 'i', 'iii', '03B09.mp4', '03B09.png', 9, 1, '院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介院線片09簡介'),
(10, '院線片10', 4, 123, '2026-02-11', 'j', 'jjj', '03B10.mp4', '03B10.png', 10, 1, '院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介院線片10簡介');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
