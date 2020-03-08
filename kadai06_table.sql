-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 2 月 23 日 15:24
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai06_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai06_table`
--

CREATE TABLE `kadai06_table` (
  `id` int(12) NOT NULL,
  `project` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `date` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `kadai06_table`
--

INSERT INTO `kadai06_table` (`id`, `project`, `content`, `month`, `date`) VALUES
(35, '更新１', 'こうしん1', 9, 10),
(36, '案件２', 'ないよう２', 4, 20),
(37, '案件３', 'ないよう３', 3, 4),
(38, '案件４', 'ないよう４', 4, 5),
(39, '案件５', 'ないよう５', 6, 10),
(61, 'テスト', '削除のテスト', 12, 22),
(63, '案件７', 'ないよう７', 10, 30),
(64, '案件８', 'ないよう８', 12, 20);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai06_table`
--
ALTER TABLE `kadai06_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kadai06_table`
--
ALTER TABLE `kadai06_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
