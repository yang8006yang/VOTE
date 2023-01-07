-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-01-07 15:55:11
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 8.1.10

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
-- 資料表結構 `playlists`
--

CREATE TABLE `playlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `playlists`
--

INSERT INTO `playlists` (`id`, `list_name`, `description`, `user_id`, `created_at`, `update_at`) VALUES
(1, 'hello', '123', 1, '2023-01-03 07:50:50', '2023-01-03 07:50:50'),
(2, 'hello', '123', 1, '2023-01-03 07:51:29', '2023-01-03 07:51:29');

-- --------------------------------------------------------

--
-- 資料表結構 `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_id` int(10) UNSIGNED NOT NULL,
  `song_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `songs`
--

CREATE TABLE `songs` (
  `id` int(10) UNSIGNED NOT NULL,
  `song_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `singer` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `yt_link` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cover` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '未分類',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `songs`
--

INSERT INTO `songs` (`id`, `song_name`, `description`, `singer`, `yt_link`, `cover`, `type`, `active`, `created_at`, `update_at`) VALUES
(2, 'hoodie', '', 'Hey!violet', 'GNtIvGrqAZE', '20230104013533.gif', 'POP', 0, '2023-01-04 05:35:33', '2023-01-07 12:30:23'),
(3, 'strawberry moon', 'strawberry moon', 'IU(아이유)', 'sqgxcCjD04s', '20230107083513.jpg', 'K-POP', 0, '2023-01-07 12:35:13', '2023-01-07 12:35:13');

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

--
-- 傾印資料表的資料 `survey_log`
--

INSERT INTO `survey_log` (`id`, `user`, `ip`, `subject_id`, `option_id`, `created_at`) VALUES
(1, 1, '::1', 0, 18, '2023-01-03 06:02:24');

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
(16, 5, '21212', 0, '2022-12-28 06:36:44', '2022-12-28 06:36:44'),
(17, 5, '21212', 0, '2022-12-28 06:36:51', '2022-12-28 06:36:51'),
(18, 0, '1321321', 1, '2022-12-28 08:19:56', '2023-01-03 06:02:24');

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
(0, 'test', 4, '123132132132131313', 1, 1, '2022-12-20 07:23:34', '2023-01-03 06:02:24'),
(5, '3', 4, '1221221', 0, 0, '2022-12-21 03:33:34', '2022-12-28 06:34:25');

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
-- 資料表索引 `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `playlist_songs`
--
ALTER TABLE `playlist_songs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_log`
--
ALTER TABLE `survey_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
