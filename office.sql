-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-03-06 15:55:22
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `office`
--

-- --------------------------------------------------------

--
-- 資料表結構 `contacts`
--

CREATE TABLE `contacts` (
  `sn` int(10) UNSIGNED NOT NULL COMMENT 'contacts_sn',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `tel` varchar(255) NOT NULL COMMENT '電話',
  `email` varchar(255) NOT NULL COMMENT '信箱',
  `content` text DEFAULT NULL COMMENT '內容',
  `date` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '建立日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='聯絡我們資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `files`
--

CREATE TABLE `files` (
  `sn` smallint(5) UNSIGNED NOT NULL COMMENT 'files_sn',
  `kind` varchar(255) NOT NULL DEFAULT '' COMMENT '分類',
  `col_sn` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '欄位編號',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `file_kind` enum('img','file') NOT NULL DEFAULT 'img' COMMENT '上傳檔案種類',
  `file_name` varchar(255) NOT NULL DEFAULT '' COMMENT '上傳檔案名稱',
  `file_type` varchar(255) NOT NULL DEFAULT '' COMMENT '上傳檔案類型',
  `file_size` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上傳檔案大小',
  `description` text DEFAULT NULL COMMENT '檔案說明',
  `counter` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '下載人次',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '檔案名稱',
  `download_name` varchar(255) NOT NULL DEFAULT '' COMMENT '下載檔案名稱',
  `sub_dir` varchar(255) NOT NULL DEFAULT '' COMMENT '檔案子路徑'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上傳檔案資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `kinds`
--

CREATE TABLE `kinds` (
  `sn` smallint(5) UNSIGNED NOT NULL COMMENT 'kinds_sn',
  `ofsn` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父類別',
  `kind` varchar(255) NOT NULL DEFAULT '' COMMENT '分類',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '標題',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '網址',
  `target` enum('1','0') NOT NULL DEFAULT '0' COMMENT '外連',
  `col_sn` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'col_sn',
  `content` text DEFAULT NULL COMMENT '內容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='類別資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `newn` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `sn` int(10) UNSIGNED NOT NULL COMMENT 'sn',
  `orders_main_sn` int(10) UNSIGNED NOT NULL COMMENT 'orders_main_sn',
  `prod_sn` int(10) UNSIGNED NOT NULL COMMENT 'prod_standard_sn',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
  `amount` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '數量',
  `price` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '售價',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='訂單明細檔';

-- --------------------------------------------------------

--
-- 資料表結構 `orders_main`
--

CREATE TABLE `orders_main` (
  `sn` int(10) UNSIGNED NOT NULL COMMENT 'sn',
  `no` varchar(255) NOT NULL DEFAULT '' COMMENT '訂單編號',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `tel` varchar(255) NOT NULL DEFAULT '' COMMENT '電話',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '電子信箱',
  `ps` text DEFAULT NULL COMMENT '備註',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '會員編號',
  `date` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '訂單日期',
  `total` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '總計',
  `kind_sn` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '桌號'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='訂單主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `prods`
--

CREATE TABLE `prods` (
  `sn` int(10) UNSIGNED NOT NULL COMMENT 'prods_sn',
  `kind_sn` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分類',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
  `content` text DEFAULT NULL COMMENT '內容',
  `price` int(10) UNSIGNED NOT NULL COMMENT '價格',
  `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態',
  `date` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '建立日期',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `counter` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '人氣'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `suppliers`
--

CREATE TABLE `suppliers` (
  `zn` smallint(5) UNSIGNED NOT NULL COMMENT 'zn_supply',
  `name` varchar(255) NOT NULL COMMENT '公司名稱',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `phone` varchar(255) NOT NULL COMMENT '電話',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `sales_represent` varchar(255) NOT NULL COMMENT '業務代表',
  `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '會員編號',
  `uname` varchar(255) NOT NULL COMMENT '帳號',
  `pass` varchar(255) NOT NULL COMMENT '密碼',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `tel` varchar(255) NOT NULL COMMENT '電話',
  `email` varchar(255) NOT NULL COMMENT '信箱',
  `kind` enum('0','1') NOT NULL DEFAULT '0' COMMENT '會員類別',
  `token` varchar(255) NOT NULL COMMENT 'token'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `kinds`
--
ALTER TABLE `kinds`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newn`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `orders_main`
--
ALTER TABLE `orders_main`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `prods`
--
ALTER TABLE `prods`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contacts`
--
ALTER TABLE `contacts`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'contacts_sn';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `files`
--
ALTER TABLE `files`
  MODIFY `sn` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'files_sn';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `kinds`
--
ALTER TABLE `kinds`
  MODIFY `sn` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'kinds_sn';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `newn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'sn';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders_main`
--
ALTER TABLE `orders_main`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'sn';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prods`
--
ALTER TABLE `prods`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'prods_sn';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `uid` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '會員編號';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
