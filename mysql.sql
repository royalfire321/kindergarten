-- 會員資料表
CREATE TABLE `users` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '會員編號',
  `uname` varchar(255) NOT NULL COMMENT '帳號',
  `pass` varchar(255) NOT NULL COMMENT '密碼',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `tel` varchar(255) NOT NULL COMMENT '電話',
  `email` varchar(255) NOT NULL COMMENT '信箱',
  `kind` enum('0','1') NOT NULL DEFAULT '0' COMMENT '會員類別',
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='會員資料表';

-- 商品資料表
CREATE TABLE `prods` (
    `sn` int(10) unsigned NOT NULL auto_increment COMMENT 'prods_sn',
    `kind_sn` smallint(5) unsigned NOT NULL default 0 COMMENT '分類',
    `title` varchar(255) NOT NULL default '' COMMENT '名稱',
    `content` text NULL COMMENT '內容',
    `price` int(10) unsigned NOT NULL COMMENT '價格',
    `enable` enum('1','0') NOT NULL default '1' COMMENT '狀態',
    `date` int(10) unsigned NOT NULL default 0 COMMENT '建立日期',
    `sort` smallint(5) unsigned NOT NULL default 0 COMMENT '排序',
    `counter` int(10) unsigned NOT NULL default 0 COMMENT '人氣',
    PRIMARY KEY  (`sn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品資料表';

-- 類別資料表
CREATE TABLE `kinds` (
    `sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'kinds_sn',
    `ofsn` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '父類別',
    `kind` varchar(255) NOT NULL DEFAULT '' COMMENT '分類',
    `title` varchar(255) NOT NULL DEFAULT '' COMMENT '標題',
    `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
    `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態',
    `url` varchar(255) NOT NULL DEFAULT '' COMMENT '網址',
    `target` enum('1','0') NOT NULL DEFAULT '0' COMMENT '外連',
    `col_sn` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'col_sn',
    `content` text NULL COMMENT '內容',
    PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='類別資料表';

-- 上傳檔案資料表
CREATE TABLE `files` (
    `sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'files_sn',
    `kind` varchar(255) NOT NULL DEFAULT '' COMMENT '分類',
    `col_sn` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '欄位編號',
    `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
    `file_kind` enum('img','file') NOT NULL DEFAULT 'img' COMMENT '上傳檔案種類',
    `file_name` varchar(255) NOT NULL DEFAULT '' COMMENT '上傳檔案名稱',
    `file_type` varchar(255) NOT NULL DEFAULT '' COMMENT '上傳檔案類型',
    `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上傳檔案大小',
    `description` text  NULL COMMENT '檔案說明',
    `counter` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '下載人次',
    `name` varchar(255) NOT NULL DEFAULT '' COMMENT '檔案名稱',
    `download_name` varchar(255) NOT NULL DEFAULT '' COMMENT '下載檔案名稱',
    `sub_dir` varchar(255) NOT NULL DEFAULT '' COMMENT '檔案子路徑',
    PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上傳檔案資料表';

-- 訂單主檔
CREATE TABLE `orders_main` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `no` varchar(255) NOT NULL DEFAULT '' COMMENT '訂單編號',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `tel` varchar(255) NOT NULL DEFAULT '' COMMENT '電話',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '電子信箱',
  `ps` text DEFAULT NULL COMMENT '備註',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '會員編號',
  `date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '訂單日期',
  `total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '總計',
  `kind_sn` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '桌號',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='訂單主檔';

-- 訂單明細檔
CREATE TABLE `orders` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `orders_main_sn` int(10) unsigned NOT NULL COMMENT 'orders_main_sn',
  `prod_sn` int(10) unsigned NOT NULL COMMENT 'prod_standard_sn',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
  `amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '數量',
  `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '售價',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='訂單明細檔';

-- 聯絡我們資料表
CREATE TABLE `contacts` (
    `sn` int(10) unsigned NOT NULL auto_increment COMMENT 'contacts_sn',
    `name` varchar(255) NOT NULL default '' COMMENT '姓名',
    `tel` varchar(255) NOT NULL COMMENT '電話',
    `email` varchar(255) NOT NULL COMMENT '信箱',
    `content` text NULL COMMENT '內容',
    `date` int(10) unsigned NOT NULL default 0 COMMENT '建立日期',
    PRIMARY KEY  (`sn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='聯絡我們資料表';