-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-01-18 08:58:17
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
(2, 'hello', '123', 1, '2023-01-03 07:51:29', '2023-01-03 07:51:29'),
(3, '', '', 1, '2023-01-03 07:52:25', '2023-01-03 07:52:25');

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
  `singer` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `yt_link` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cover` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `type` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `songs`
--

INSERT INTO `songs` (`id`, `song_name`, `singer`, `description`, `yt_link`, `cover`, `active`, `type`, `created_at`, `update_at`) VALUES
(3, 'i can\'t', '吳卓源', '人生就是不停的對抗還是無解，接受了，才是自由的開始。會懷疑／否定／疑惑／快樂／糾結，為什麼我這樣想？為什麼我這樣做？為什麼我有這樣的情緒？為什麼我做這樣的決定？？I DON\'T FUCKING KNOW, BUT IT\'S OK！抓住當下的情緒化成歌，只想要允許情緒流過、記錄情緒，讓《IDFK》專輯中的每一首歌，陪伴著你的每一種心情。', '2Bb24adoGNek1rlRSe7HDQ?utm_source=generator', '20230112094855.jpg', 1, '華語/節奏藍調', '2023-01-12 01:48:55', '2023-01-12 01:48:55'),
(4, 'Attention', 'NewJeans', 'OFFICIAL WEBSITE https://newjeans.kr/\r\n\r\nProducer: MIN HEE JIN\r\nMusic Video Director: Heewon Shin', '2pIUpMhHL6L9Z5lnKxJJr9?utm_source=generator', '20230112103125.jpg', 1, 'K-POP', '2023-01-12 02:31:25', '2023-01-12 02:31:25'),
(5, 'Music', 'Music Spot', 'test', '', '20230112103243.jpg', 1, '', '2023-01-12 02:32:43', '2023-01-12 02:32:43'),
(6, 'New York (ft. mazie)', 'Steve Aoki & Regard', '', '0WdkklLlHI5SdulAdk32wE?utm_source=generator', '20230112103510.jpg', 1, '舞曲', '2023-01-12 02:35:10', '2023-01-12 02:35:10');

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
(18, 0, '1321321', 1, '2022-12-28 08:19:56', '2023-01-03 06:02:24'),
(20, 7, '愛情你比我想的閣較偉大 茄子蛋', 20, '2023-01-12 05:16:44', '2023-01-18 07:16:21'),
(21, 7, '如果可以 - 韋禮安', 25, '2023-01-12 05:16:44', '2023-01-12 05:21:27'),
(22, 7, '玻璃心 - 黃明志、陳芳語', 30, '2023-01-12 05:16:44', '2023-01-18 07:16:17'),
(23, 7, 'Bluebirds - 蔡健雅', 25, '2023-01-12 05:16:44', '2023-01-12 05:21:34'),
(24, 8, 'Karencici', 0, '2023-01-13 01:34:04', '2023-01-13 01:34:04'),
(25, 8, '蔡健雅', 0, '2023-01-13 01:34:04', '2023-01-13 01:34:04'),
(26, 8, '吳卓源', 0, '2023-01-13 01:34:04', '2023-01-13 01:34:04'),
(27, 8, '魏如萱', 0, '2023-01-13 01:34:04', '2023-01-13 01:34:04'),
(28, 8, 'Faye詹雯婷', 0, '2023-01-13 01:34:04', '2023-01-13 01:34:04'),
(29, 8, 'Karencici', 0, '2023-01-13 01:34:40', '2023-01-13 01:34:40'),
(30, 11, '盧廣仲', 0, '2023-01-13 01:45:42', '2023-01-13 01:45:42'),
(31, 11, 'YELLOW黃宣', 0, '2023-01-13 01:45:42', '2023-01-13 01:45:42'),
(32, 11, '崔健', 0, '2023-01-13 01:45:42', '2023-01-13 01:45:42'),
(33, 11, '許鈞', 0, '2023-01-13 01:45:42', '2023-01-13 01:45:42'),
(34, 12, '美秀集團（狗柏、修齊、冠佑、婷文、鍾錡）', 0, '2023-01-13 01:47:42', '2023-01-13 01:47:42'),
(35, 12, '無妄合作社（林玉湛、郭力瑋、謝碩元）', 0, '2023-01-13 01:47:42', '2023-01-13 01:47:42'),
(36, 12, 'Flesh Juicer 血肉果汁機（童仲宇（GIGO）、許主携（Matt）、劉宗霖（ZERO）、陳彥文（彥文）、陳佑祥（sionC））', 0, '2023-01-13 01:47:42', '2023-01-13 01:47:42'),
(37, 12, 'TRASH', 0, '2023-01-13 01:47:42', '2023-01-13 01:47:42'),
(38, 12, '13月終了', 0, '2023-01-13 01:47:42', '2023-01-13 01:47:42'),
(39, 13, '2020', 0, '2023-01-13 05:22:09', '2023-01-13 05:22:09'),
(40, 13, '2021', 0, '2023-01-13 05:22:09', '2023-01-13 05:22:09'),
(41, 13, '2022', 0, '2023-01-13 05:22:09', '2023-01-13 05:22:09'),
(42, 13, '2023', 0, '2023-01-13 05:22:09', '2023-01-13 05:22:09'),
(43, 14, '12歲以下', 25, '2023-01-13 08:06:56', '2023-01-13 08:11:23'),
(44, 14, '12-20歲', 50, '2023-01-13 08:06:56', '2023-01-13 08:11:32'),
(45, 14, '21-35歲', 75, '2023-01-13 08:06:56', '2023-01-13 08:11:51'),
(46, 14, '36-65歲', 25, '2023-01-13 08:06:56', '2023-01-13 08:11:39'),
(47, 14, '65歲以上', 25, '2023-01-13 08:06:56', '2023-01-13 08:11:44');

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
  `chart` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `vote` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `survey_subjects`
--

INSERT INTO `survey_subjects` (`id`, `subject`, `type`, `content`, `active`, `chart`, `vote`, `created_at`, `update_at`) VALUES
(0, 'test', 4, '123132132132131313', 0, 1, 1, '2022-12-20 07:23:34', '2023-01-03 06:02:24'),
(5, '3', 4, '1221221', 0, 1, 0, '2022-12-21 03:33:34', '2022-12-28 06:34:25'),
(7, '2022年度華語歌曲', 1, '來票選出你2022最喜歡的華語歌曲吧!!', 1, 1, 100, '2023-01-12 05:16:44', '2023-01-12 05:21:10'),
(8, '最喜愛華語女歌手', 2, '你最喜愛華語女歌手是誰呢?', 1, 1, 0, '2023-01-13 01:34:04', '2023-01-13 01:34:04'),
(11, '最喜愛華語男歌手獎', 2, '你最喜愛華語男歌手是誰呢?', 1, 1, 0, '2023-01-13 01:45:42', '2023-01-13 01:45:42'),
(12, '最喜愛樂團', 2, '你最喜愛樂團是誰呢?', 1, 1, 0, '2023-01-13 01:47:42', '2023-01-13 01:47:42'),
(13, '加入Music Spot的時間', 3, '你是什麼時候加入Music Spot的呢?', 0, 3, 0, '2023-01-13 05:22:09', '2023-01-18 07:52:56'),
(14, '使用者年齡', 3, '了解Music Spot的使用者族群，幫助我們提供更好的服務 :)', 1, 2, 200, '2023-01-13 08:06:56', '2023-01-18 07:53:00');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(24) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pw` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `level` tinyint(2) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `name`, `email`, `pw`, `last_login`, `level`) VALUES
(1, 'acc', 'test', '123@gmial.com', 'pw', '0000-00-00 00:00:00', 1),
(2, 'admin', 'admin', 'aa@mail.com', 'admin', '0000-00-00 00:00:00', 0);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_log`
--
ALTER TABLE `survey_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_options`
--
ALTER TABLE `survey_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `survey_subjects`
--
ALTER TABLE `survey_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
