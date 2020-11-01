-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2020 at 07:44 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `createVideos`
--

CREATE TABLE `createVideos` (
  `videoId` int(11) NOT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `hasThumbnail` tinyint(1) NOT NULL,
  `videoName` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1603870427),
('m130524_201442_init', 1603870431),
('m190124_110200_add_verification_token_column_to_user_table', 1603870431),
('m201029_082014_create_videos_table', 1603960797);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'test', 'b6S7VKaSEBwllGy7BJLCNDd1hhGwwNO7', '$2y$13$.rI2oouEz6jYsm01oYObqOdbvbqaEI2yZflN.KGI.w9M/a6z9g0T6', NULL, 'test@gmail.com', 10, 1603870658, 1603871093, 'wEsxVYy8mZu6X_W1jP-Yh9Kbrp6ug8ii_1603870658'),
(2, 'coder', 'C-qu3S8SZcMQcrucq7H71T6clJ--sHlI', '$2y$13$keuSPBfQ42eNA7qHTmtl8.O7e1UTBFPiAMPgrdIfgmT0643wZG4P.', NULL, 'coder@example.com', 10, 1604030107, 1604030107, '_aleQ1uVTiY1BI_njnFB9GDECc6Je8zk_1604030107');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `has_thumbnail` tinyint(1) DEFAULT NULL,
  `video_name` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `title`, `description`, `tags`, `status`, `has_thumbnail`, `video_name`, `created_at`, `updated_at`, `created_by`) VALUES
('8ltwdXRH', 'rabbit.mp4', '', '', 1, 1, 'rabbit.mp4', 1603980681, 1603980751, 1),
('fIgE0Pxb', 'rabbit.mp4', '', '', 0, 1, 'rabbit.mp4', 1603978258, 1603979397, 1),
('L812HFfE', 'SampleVideo_1280x720_2mb.mp4', NULL, NULL, 0, 0, 'SampleVideo_1280x720_2mb.mp4', 1603980367, 1603980367, 1),
('w-ZhGmmm', 'Scary Rabbit', '', '#petertherabbit ,bigrabbit,drawing', 1, 1, 'videosg5GjwKYu (1).mp4', 1604037093, 1604037223, 2),
('YcAi8RD5', 'videosg5GjwKYu.mp4', NULL, NULL, 0, 0, 'videosg5GjwKYu.mp4', 1603980065, 1603980065, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createVideos`
--
ALTER TABLE `createVideos`
  ADD PRIMARY KEY (`videoId`),
  ADD KEY `createdBy` (`createdBy`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `idx-videos-created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createVideos`
--
ALTER TABLE `createVideos`
  MODIFY `videoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `createVideos`
--
ALTER TABLE `createVideos`
  ADD CONSTRAINT `createdBy` FOREIGN KEY (`createdBy`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk-videos-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
