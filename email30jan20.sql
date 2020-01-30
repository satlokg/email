-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 08:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@app.com', '$2y$10$674dD4KdwVjbxpcd1Lfr3u96GszGxp/YCJSPKWR0BzwQTxW5XCk9m', 0, 'J1Ly8rTVQFJCzdfrjrqiXsR3SFV8RupjDFagtiEBabN9X94CaxKlSBPdbN0V', '2020-01-06 02:27:46', '2020-01-06 02:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `templates` longtext DEFAULT NULL,
  `template_url` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `subject`, `templates`, `template_url`, `updated_at`, `created_at`) VALUES
(32, 7, 'welcome', '<p>welcome</p>', NULL, '2020-01-30 07:18:37', '2020-01-30 07:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `driver` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `server_key` text DEFAULT NULL,
  `secret` text NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emaillists`
--

CREATE TABLE `emaillists` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emaillists`
--

INSERT INTO `emaillists` (`id`, `listing_id`, `name`, `email`, `status`, `updated_at`, `created_at`) VALUES
(114, 77, 'ankitpaliwal.vipra@gmail.com', 'ankitpaliwal.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(115, 77, 'anubhav.vipra@gmail.com', 'anubhav.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(116, 77, 'avinash01vipra@gmail.com', 'avinash01vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(117, 77, 'neha1.vipra@gmail.com', 'neha1.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(118, 77, 'sanjaypratap.vipra@gmail.com', 'sanjaypratap.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(119, 77, 'satlok.vipra@gmail.com', 'satlok.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(120, 77, 'saurabhs.vipra@gmail.com', 'saurabhs.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(121, 77, 'shivani.vipra@gmail.com', 'shivani.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(122, 77, 'soumadeep.vipra@gmail.com', 'soumadeep.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(123, 77, 'sushantchaudhary.vipra@gmail.com', 'sushantchaudhary.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(124, 77, 'umashankar.vipra@gmail.com', 'umashankar.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29'),
(127, 78, 'raghavendra1.vipra@gmail.com', 'raghavendra1.vipra@gmail.com', 1, '2020-01-30 06:43:53', '2020-01-30 06:43:53'),
(128, 78, 'rajkumarsaini.vipra@gmail.com', 'rajkumarsaini.vipra@gmail.com', 1, '2020-01-30 06:43:53', '2020-01-30 06:43:53'),
(129, 78, 'chaitali.vipra@gmail.com', 'chaitali.vipra@gmail.com', 1, '2020-01-30 06:43:53', '2020-01-30 06:43:53'),
(140, 79, 'raghavendra1.vipra@gmail.com', 'raghavendra1.vipra@gmail.com', 1, '2020-01-30 06:44:57', '2020-01-30 06:44:57'),
(141, 79, 'rajkumarsaini.vipra@gmail.com', 'rajkumarsaini.vipra@gmail.com', 1, '2020-01-30 06:44:57', '2020-01-30 06:44:57'),
(142, 79, 'chaitali.vipra@gmail.com', 'chaitali.vipra@gmail.com', 1, '2020-01-30 06:44:57', '2020-01-30 06:44:57'),
(153, 80, 'raghavendra1.vipra@gmail.com', 'raghavendra1.vipra@gmail.com', 1, '2020-01-30 07:08:42', '2020-01-30 07:08:42'),
(154, 80, 'rajkumarsaini.vipra@gmail.com', 'rajkumarsaini.vipra@gmail.com', 1, '2020-01-30 07:08:42', '2020-01-30 07:08:42'),
(155, 80, 'chaitali.vipra@gmail.com', 'chaitali.vipra@gmail.com', 1, '2020-01-30 07:08:42', '2020-01-30 07:08:42'),
(166, 81, 'raghavendra1.vipra@gmail.com', 'raghavendra1.vipra@gmail.com', 1, '2020-01-30 07:18:05', '2020-01-30 07:18:05'),
(167, 81, 'rajkumarsaini.vipra@gmail.com', 'rajkumarsaini.vipra@gmail.com', 1, '2020-01-30 07:18:05', '2020-01-30 07:18:05'),
(168, 81, 'chaitali.vipra@gmail.com', 'chaitali.vipra@gmail.com', 1, '2020-01-30 07:18:05', '2020-01-30 07:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `emailrespnces`
--

CREATE TABLE `emailrespnces` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `error` int(11) NOT NULL,
  `success` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `listing_id` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `user_id`, `created_by`, `updated_at`, `created_at`) VALUES
(81, 'First List', 1, 7, '2020-01-30 07:18:04', '2020-01-30 07:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `mailguns`
--

CREATE TABLE `mailguns` (
  `id` int(11) NOT NULL,
  `driver` varchar(112) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `secret` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_06_074020_create_admins_table', 2),
(5, '2019_08_14_102438_create_notifications_table', 3),
(6, '2019_11_01_071050_create_messages_table', 3),
(7, '2020_01_17_105112_create_jobs_table', 3),
(8, '2020_01_28_170825_create_roles_table', 4),
(9, '2020_01_28_171105_create_role_user_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('satlok.vipra@gmail.com', '$2y$10$3FYs00O3iUHPB7nSi0IK6uMVIH50DEMZq2pFNF3UZokWOpFl.a4/6', '2020-01-27 12:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '', '2020-01-27 18:30:00', NULL),
(2, 'Co-admin', '', '2020-01-27 18:30:00', NULL),
(3, 'Contributor', 'Contributor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 2, 7, NULL, NULL),
(5, 3, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `title`, `hostname`, `port`, `username`, `password`, `driver`, `encryption`, `updated_at`, `created_at`, `status`, `user_id`) VALUES
(4, 'tiavik', 'mail.tiavik.com', '465', 'info@tiavik.com', '*963./8520', 'smtp', 'ssl', '2020-01-28 10:05:29', '2020-01-07 11:36:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teamname` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `teamname`, `created_by`, `updated_at`, `created_at`) VALUES
(8, 1, 'Vipra Team', 7, '2020-01-30 07:16:48', '2020-01-30 07:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `team_campaign`
--

CREATE TABLE `team_campaign` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_campaign`
--

INSERT INTO `team_campaign` (`id`, `team_id`, `campaign_id`, `status`) VALUES
(2, 8, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_listing`
--

CREATE TABLE `team_listing` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_listing`
--

INSERT INTO `team_listing` (`id`, `team_id`, `listing_id`, `status`) VALUES
(4, 8, 81, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'satlok', 'satlok.vipra@gmail.com', NULL, 1, '$2y$10$betOmZHlpuXsRSfbRN50MuDzIckwFBMBzUJI.eMaD2udp7uM/lqN6', 'fW2KTDhBH5PbV0sjOXqLOLy4q47QH7YKJSPQS01zgXSSuawOsRRlJoGrjSqw', NULL, '2020-01-06 01:26:54', '2020-01-06 01:26:54'),
(7, 'anubhav kumar', 'anubhav.vipra@gmail.com', NULL, NULL, '$2y$10$auNXEvdwHuAXOtsm.GOtk.xUKJ9NN45hPY304M/VuPn0nroheXTFG', 'pgblP2a2oT1NDyDjzPY6eI8AWrw5L5rs47afyDbCEn7zIo3ezo6nyJvSWKoI', 1, '2020-01-28 12:40:36', '2020-01-28 12:40:36'),
(8, 'Avinash', 'avinash.vipra@gmail.com', NULL, NULL, '$2y$10$i4QiutlcKx3/.Sm8agX2gegh2CsOkodnznzKiP7fG7xIfwWEs0EE6', NULL, 1, '2020-01-28 12:41:16', '2020-01-28 12:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_campaign`
--

CREATE TABLE `user_campaign` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_campaign`
--

INSERT INTO `user_campaign` (`id`, `user_id`, `campaign_id`, `status`) VALUES
(7, 7, 32, 1),
(8, 8, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_listing`
--

CREATE TABLE `user_listing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_listing`
--

INSERT INTO `user_listing` (`id`, `user_id`, `listing_id`, `status`) VALUES
(7, 7, 81, 1),
(8, 8, 81, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_team`
--

CREATE TABLE `user_team` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_team`
--

INSERT INTO `user_team` (`id`, `user_id`, `team_id`, `status`) VALUES
(3, 7, 8, 1),
(4, 8, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emaillists`
--
ALTER TABLE `emaillists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailrespnces`
--
ALTER TABLE `emailrespnces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailguns`
--
ALTER TABLE `mailguns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_campaign`
--
ALTER TABLE `team_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_listing`
--
ALTER TABLE `team_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_campaign`
--
ALTER TABLE `user_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_listing`
--
ALTER TABLE `user_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_team`
--
ALTER TABLE `user_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emaillists`
--
ALTER TABLE `emaillists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `emailrespnces`
--
ALTER TABLE `emailrespnces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `mailguns`
--
ALTER TABLE `mailguns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team_campaign`
--
ALTER TABLE `team_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_listing`
--
ALTER TABLE `team_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_campaign`
--
ALTER TABLE `user_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_listing`
--
ALTER TABLE `user_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_team`
--
ALTER TABLE `user_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
