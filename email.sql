-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 01:57 PM
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
(1, 1, 'sdfdsf', '<div style=\"color:#fefefe; display:none; font-family:\'Lato\',Helvetica,Arial,sans-serif; font-size:1px; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden\">We&#39;re thrilled to have you here! Get ready to dive into your new account.</div>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\"><!-- LOGO -->\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"border-radius:4px 4px 0px 0px; vertical-align:top\">\r\n						<h1 style=\"margin-left:0px; margin-right:0px\">Don&#39;t Leave!</h1>\r\n						<img src=\" https://img.icons8.com/clouds/100/000000/sad.png\" style=\"border:0px; display:block; height:120px; width:125px\" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<p style=\"margin-left:0px; margin-right:0px\">We&#39;re sad as we couldn&#39;t satisfy you with our service. we will try our best to make our services better for customers like you.<br />\r\n						<br />\r\n						Think once more if you want us to give one more try Just press the button below to reactivate your account</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"border-radius:3px\"><a href=\"#\" style=\"font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #3cbeb2; display: inline-block;\" target=\"_blank\">Reactivate Account</a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<!-- COPY -->\r\n					<tr>\r\n						<td>\r\n						<p style=\"margin-left:0px; margin-right:0px\">If you have any questions, just reply to this email&mdash;we&#39;re always happy to help out.</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"border-radius:0px 0px 4px 4px\">\r\n						<p style=\"margin-left:0px; margin-right:0px\">Thanks for choosing our service,<br />\r\n						BBB Team</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"border-radius:4px 4px 4px 4px\">\r\n						<h2 style=\"margin-left:0px; margin-right:0px\">Need more help?</h2>\r\n\r\n						<p style=\"margin-left:0px; margin-right:0px\"><a href=\"#\" style=\"color: #3cbeb2;\" target=\"_blank\">We&rsquo;re here to help you out</a></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;\r\n						<p style=\"margin-left:0px; margin-right:0px\">If these emails get annoying, please feel free to <a href=\"#\" style=\"color: #111111; font-weight: 700;\" target=\"_blank\">unsubscribe</a>.</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, '2020-01-07 08:10:56', '2020-01-07 08:10:56'),
(2, 1, 'sdfdsf', '<div style=\"color:#fefefe; display:none; font-family:\'Lato\',Helvetica,Arial,sans-serif; font-size:1px; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden\">We&#39;re thrilled to have you here! Get ready to dive into your new account.</div>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\"><!-- LOGO -->\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:top\">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"border-radius:4px 4px 0px 0px; vertical-align:top\">\r\n						<h1 style=\"margin-left:0px; margin-right:0px\">Don&#39;t Leave!</h1>\r\n						<img src=\" https://img.icons8.com/clouds/100/000000/sad.png\" style=\"border:0px; display:block; height:120px; width:125px\" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<p style=\"margin-left:0px; margin-right:0px\">We&#39;re sad as we couldn&#39;t satisfy you with our service. we will try our best to make our services better for customers like you.<br />\r\n						<br />\r\n						Think once more if you want us to give one more try Just press the button below to reactivate your account</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"border-radius:3px\"><a href=\"#\" style=\"font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #3cbeb2; display: inline-block;\" target=\"_blank\">Reactivate Account</a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<!-- COPY -->\r\n					<tr>\r\n						<td>\r\n						<p style=\"margin-left:0px; margin-right:0px\">If you have any questions, just reply to this email&mdash;we&#39;re always happy to help out.</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"border-radius:0px 0px 4px 4px\">\r\n						<p style=\"margin-left:0px; margin-right:0px\">Thanks for choosing our service,<br />\r\n						BBB Team</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"border-radius:4px 4px 4px 4px\">\r\n						<h2 style=\"margin-left:0px; margin-right:0px\">Need more help?</h2>\r\n\r\n						<p style=\"margin-left:0px; margin-right:0px\"><a href=\"#\" style=\"color: #3cbeb2;\" target=\"_blank\">We&rsquo;re here to help you out</a></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;\r\n						<p style=\"margin-left:0px; margin-right:0px\">If these emails get annoying, please feel free to <a href=\"#\" style=\"color: #111111; font-weight: 700;\" target=\"_blank\">unsubscribe</a>.</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, '2020-01-07 08:18:42', '2020-01-07 08:18:42'),
(3, 1, 'Good Morning', '<p><img src=\"https://images.app.goo.gl/A6s2AchhdpvBAUX1A\" /></p>', NULL, '2020-01-08 04:27:08', '2020-01-08 04:27:08'),
(4, 1, 'Good Morning', '<p><a href=\"https://images.app.goo.gl/F13HnxPy6MUocCqy5\"><img alt=\"\" src=\"https://images.app.goo.gl/F13HnxPy6MUocCqy5\" /></a></p>', NULL, '2020-01-08 04:32:31', '2020-01-08 04:32:31'),
(5, 1, 'Good Morning', '<p><img alt=\"Good morning\" src=\"https://www.birthdaywishes.expert/wp-content/uploads/2015/10/cover-photo-good-morning-images.jpg\" style=\"height:450px; width:810px\" /></p>', NULL, '2020-01-08 04:33:56', '2020-01-08 04:33:56'),
(6, 1, 'html', NULL, 'index.html', '2020-01-17 12:54:01', '2020-01-17 12:54:01');

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
(124, 77, 'umashankar.vipra@gmail.com', 'umashankar.vipra@gmail.com', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29');

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

--
-- Dumping data for table `emailrespnces`
--

INSERT INTO `emailrespnces` (`id`, `user_id`, `error`, `success`, `campaign_id`, `listing_id`, `updated_at`, `created_at`) VALUES
(10, 1, 0, 1, 1, '77', '2020-01-17 10:09:04', '2020-01-17 13:53:37');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `user_id`, `updated_at`, `created_at`) VALUES
(77, 'Vipra Team', 1, '2020-01-07 04:55:29', '2020-01-07 04:55:29');

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
(7, '2020_01_17_105112_create_jobs_table', 3);

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
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `title`, `hostname`, `port`, `username`, `password`, `driver`, `encryption`, `updated_at`, `created_at`, `status`) VALUES
(4, 'tiavik', 'mail.tiavik.com', '465', 'info@tiavik.com', '*963./8520', 'smtp', 'ssl', '2020-01-07 11:36:37', '2020-01-07 11:36:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seservers`
--

CREATE TABLE `seservers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ses_key` varchar(255) NOT NULL,
  `secret` text NOT NULL,
  `region` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'satlok', 'satlok.vipra@gmail.com', NULL, NULL, '$2y$10$betOmZHlpuXsRSfbRN50MuDzIckwFBMBzUJI.eMaD2udp7uM/lqN6', 'aWsIoJDZpEg15VDU2IzcfARyfzXIzpfNZPY4MPVnkjahv7Fz865BjcFuVbHj', '2020-01-06 01:26:54', '2020-01-06 01:26:54');

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
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seservers`
--
ALTER TABLE `seservers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emaillists`
--
ALTER TABLE `emaillists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seservers`
--
ALTER TABLE `seservers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
