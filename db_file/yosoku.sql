-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 1 朁E13 日 05:37
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yosoku`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `aidats`
--

CREATE TABLE `aidats` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) DEFAULT NULL,
  `field` int(11) DEFAULT NULL,
  `wdat` double DEFAULT NULL,
  `bdat` double DEFAULT NULL,
  `st_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `aidats`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `channels`
--

CREATE TABLE `channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `apikey` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `channels`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dtheads`
--

CREATE TABLE `dtheads` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) DEFAULT NULL,
  `f1name` text,
  `f1valid` int(11) DEFAULT NULL,
  `f2name` text,
  `f2valid` int(11) DEFAULT NULL,
  `f3name` text,
  `f3valid` int(11) DEFAULT NULL,
  `f4name` text,
  `f4valid` int(11) DEFAULT NULL,
  `f5name` text,
  `f5valid` int(11) DEFAULT NULL,
  `f6name` text,
  `f6valid` int(11) DEFAULT NULL,
  `f7name` text,
  `f7valid` int(11) DEFAULT NULL,
  `f8name` text,
  `f8valid` int(11) DEFAULT NULL,
  `f9name` text,
  `f9valid` int(11) DEFAULT NULL,
  `f10name` text,
  `f10valid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `pages`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sensors`
--

CREATE TABLE `sensors` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) DEFAULT NULL,
  `f1` double DEFAULT NULL,
  `f2` double DEFAULT NULL,
  `f3` double DEFAULT NULL,
  `f4` double DEFAULT NULL,
  `f5` double DEFAULT NULL,
  `f6` double DEFAULT NULL,
  `f7` double DEFAULT NULL,
  `f8` double DEFAULT NULL,
  `f9` double DEFAULT NULL,
  `f10` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sensors`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `aidats`
--
ALTER TABLE `aidats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtheads`
--
ALTER TABLE `dtheads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aidats`
--
ALTER TABLE `aidats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dtheads`
--
ALTER TABLE `dtheads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
