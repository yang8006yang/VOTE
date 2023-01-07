-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-28 09:21:53
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `music_spot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `survey_log`
--

CREATE TABLE `survey_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(10) NOT NULL,
  `ip` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subject_id` int(10) NOT NULL,
  `option_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `survey_options`
--

CREATE TABLE `survey_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `opt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `vote` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `survey_options`
--

INSERT INTO `survey_options` (`id`, `subject_id`, `opt`, `vote`, `created_at`, `update_at`) VALUES
(9, 2, '1', 0, '2022-12-20 07:24:43', '2022-12-20 07:24:43'),
(10, 2, '2', 0, '2022-12-20 07:24:43', '2022-12-20 07:24:43'),
(13, 5, '33333', 0, '2022-12-21 03:33:34', '2022-12-21 03:33:34'),
(14, 6, '4', 0, '2022-12-22 08:03:24', '2022-12-22 08:03:24'),
(15, 6, '44', 0, '2022-12-22 08:03:24', '2022-12-22 08:03:24'),
(16, 5, '21212', 0, '2022-12-28 06:36:44', '2022-12-28 06:36:44'),
(17, 5, '21212', 0, '2022-12-28 06:36:51', '2022-12-28 06:36:51'),
(18, 0, '1321321', 0, '2022-12-28 08:19:56', '2022-12-28 08:19:56');

-- --------------------------------------------------------

--
-- 資料表結構 `survey_subjects`
--

CREATE TABLE `survey_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `vote` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `survey_subjects`
--

INSERT INTO `survey_subjects` (`id`, `subject`, `type`, `content`, `active`, `vote`, `created_at`, `update_at`) VALUES
(0, 'test', 4, '123132132132131313', 1, 0, '2022-12-20 07:23:34', '2022-12-21 03:15:38'),
(5, '3', 4, '1221221', 0, 0, '2022-12-21 03:33:34', '2022-12-28 06:34:25'),
(6, '4', 2, '44445555555857999999', 0, 0, '2022-12-22 08:03:24', '2022-12-22 08:03:24');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(24) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pw` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(16) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `level` tinyint(2) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`, `email`, `last_login`, `name`, `level`) VALUES
(1, 'acc', 'pw', '123@gmail.com', '0000-00-00 00:00:00', 'test', 1),
(2, 'admin', 'admin', 'admin', '0000-00-00 00:00:00', 'admin', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `survey_log`
--
ALTER TABLE `survey_log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `survey_options`
--
ALTER TABLE `survey_options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `survey_subjects`
--
ALTER TABLE `survey_subjects`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_log`
--
ALTER TABLE `survey_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_options`
--
ALTER TABLE `survey_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_subjects`
--
ALTER TABLE `survey_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
