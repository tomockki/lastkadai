-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
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
-- データベース: `chokin`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sim`
--

CREATE TABLE `sim` (
  `id` int(12) NOT NULL,
  `u_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mok` int(12) NOT NULL,
  `shu` int(12) NOT NULL,
  `life` int(12) NOT NULL,
  `enj` int(12) NOT NULL,
  `par` int(12) NOT NULL,
  `cho` varchar(12) NOT NULL,
  `kekka` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sim`
--

INSERT INTO `sim` (`id`, `u_id`, `mok`, `shu`, `life`, `enj`, `par`, `cho`, `kekka`) VALUES
(7, 'yamada', 200, 200, 20, 20, 50, '80', 3),
(9, 'テスト', 10000, 2000, 300, 500, 20, '240', 42),
(16, 'suzuki', 200, 100, 30, 20, 30, '15', 13),
(18, 'テスト', 30, 30, 20, 5, 50, '2.5', 12),
(19, 'miyawaki', 200, 200, 20, 20, 50, '80', 3),
(20, 'miyawaki', 200, 200, 20, 20, 20, '32', 6),
(21, 'yabami', 300, 30, 15, 5, 50, '5', 60),
(22, 'yabami', 300, 30, 15, 5, 50, '5', 60),
(23, 'tomoti', 1000, 30, 15, 6, 50, '4.5', 222);

-- --------------------------------------------------------

--
-- テーブルの構造 `user_login`
--

CREATE TABLE `user_login` (
  `id` int(12) NOT NULL,
  `u_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_login`
--

INSERT INTO `user_login` (`id`, `u_name`, `u_id`, `u_pw`, `life_flg`, `indate`) VALUES
(1, '宮脇', 'miyawaki', 'pass', 0, '2021-03-29 21:33:07'),
(2, '山田', 'yamada', 'pass', 0, '2021-03-29 21:34:51'),
(3, '鈴木', 'suzuki', 'pa', 0, '2021-03-29 21:35:04'),
(4, 'テスト', 'テスト', 'テスト', 0, '2021-03-30 20:46:57'),
(5, 'やばみ', 'yabami', 'yabami', 0, '2021-03-30 22:22:39'),
(6, 'ともち', 'tomoti', 'motimoti', 0, '2021-03-31 00:04:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `sim`
--
ALTER TABLE `sim`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `sim`
--
ALTER TABLE `sim`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- テーブルのAUTO_INCREMENT `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
