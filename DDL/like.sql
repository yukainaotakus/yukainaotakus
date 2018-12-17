-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2018-12-17 03:52:03
-- 服务器版本： 10.1.36-MariaDB
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `yutaku`
--

-- --------------------------------------------------------

--
-- 表的结构 `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL COMMENT 'user id',
  `game_id` int(12) NOT NULL COMMENT 'game id',
  `user_iine` int(12) NOT NULL COMMENT 'user iine',
  `user_noiine` int(12) NOT NULL COMMENT 'user noiine',
  `user_ip` varchar(20) NOT NULL COMMENT 'user ip',
  `created_user` varchar(12) DEFAULT 'System' COMMENT '作成者 ',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '作成時間 ',
  `updated_user` varchar(12) DEFAULT 'System' COMMENT '更新者 ',
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時 '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


--
-- 表的索引 `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `buchongfuShoucang` (`user_id`,`game_id`) USING BTREE COMMENT '不重复收藏';

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
