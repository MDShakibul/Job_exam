-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 08:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakib', 'shakib6610@gmail.com', '54321', '01955806205', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_type`
--

CREATE TABLE `application_type` (
  `id` int(20) UNSIGNED NOT NULL,
  `application_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_type`
--

INSERT INTO `application_type` (`id`, `application_type`, `application_price`, `remember_token`, `created_at`, `updated_at`) VALUES
(26, 'App 1', '500', NULL, '2021-09-15 08:11:51', NULL),
(27, 'App 2', '1000', NULL, '2021-09-15 08:11:56', NULL),
(30, 'App 3', '1500', NULL, '2021-09-21 03:57:40', NULL),
(31, 'App 4', '2000', NULL, '2021-09-21 03:57:48', NULL),
(32, 'App 5', '2500', NULL, '2021-09-21 04:03:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_to` int(11) NOT NULL,
  `comment_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_by`, `comment_to`, `comment_description`, `comment_file`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 10, 10, 'Hi admin', 'image/1710954821256005.jpg', NULL, NULL, NULL),
(21, 1, 10, 'hlw User', 'image/1710954933756158.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `position_type`, `employee_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '2', 'Polas', NULL, '2021-09-19 11:13:37', NULL),
(3, '2', 'Sabbir', NULL, '2021-09-19 11:13:48', NULL),
(4, '3', 'Turjoy', NULL, '2021-09-19 11:14:06', NULL),
(5, '3', 'Sharif', NULL, '2021-09-19 11:14:46', NULL),
(6, '4', 'Toriqul', NULL, '2021-09-19 11:15:00', NULL),
(7, '4', 'Protty', NULL, '2021-09-19 11:15:13', NULL),
(8, '5', 'Rohan', NULL, '2021-09-21 06:24:33', NULL),
(9, '5', 'Shofik', NULL, '2021-09-21 06:24:40', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_09_05_033839_admin_login', 3),
(7, '2021_09_05_110852_application_type', 4),
(10, '2021_09_06_074003_admin_comment', 5),
(11, '2014_10_12_000000_create_users_table', 6),
(13, '2021_09_08_032942_user_comment', 7),
(14, '2021_09_10_100902_comments', 8),
(16, '2021_09_04_062445_user_details', 9),
(18, '2021_09_19_103426_position', 10),
(19, '2021_09_19_110257_employee', 11);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Junior Developer', NULL, NULL, NULL),
(3, 'Senior Developer', NULL, NULL, NULL),
(4, 'Android Developer', NULL, NULL, NULL),
(5, 'marketing', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `verification_code`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 'Shakib', 'shakib6610@gmail.com', NULL, '$2y$10$DSJFGZb/N69o33StXpTCv.4tl7cjOmHlW2Akqf0.mWF2H3oA/7.yG', '886fe85eeec58ef42b41d4fa253a58c773c756a0', 1, NULL, '2021-09-15 00:10:36', '2021-09-15 21:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE `user_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_price` int(11) NOT NULL,
  `application_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_land` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `application_type`, `application_price`, `application_number`, `father_name`, `mother_name`, `amount_land`, `nid_number`, `image`, `pdf`, `file`, `mobile_number`, `description`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(75, 20, '27', 1000, '1711491149966057', 'MD. Maruful ISlam', 'Naznin Akther', '100', 1234567890, 'image/1711491149966087.jpg', 'pdf/1711491149967228.pdf', 'file/1711491149968271.jpg,file/1711491149969174.jpg', '01992632069', 'acasc', 0, NULL, '2021-09-21 06:19:12', NULL),
(76, 20, '30', 1500, '1711491302259143', 'MD. Maruful ISlam', 'Naznin Akther', '200', 1234567890, 'image/1711491302259173.jpg,image/1711491302260391.jpg,image/1711491302261269.jpeg', 'pdf/1711491302262049.pdf', 'file/1711491302263043.jpg,file/1711491302264339.jpg', '01992632069', 'first', 0, NULL, '2021-09-21 06:21:37', NULL),
(77, 20, '32', 2500, '1711491395623772', 'Prokash Chandra Saha', 'Shema Rani Saha', '200', 1234567890, 'image/1711491395623802.jpg,image/1711491395624803.jpeg', 'pdf/1711491395625694.pdf', 'file/1711491395626590.jpg,file/1711491395627419.jpg', '01992632069', '2nd', 0, NULL, '2021-09-21 06:23:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_type`
--
ALTER TABLE `application_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_type`
--
ALTER TABLE `application_type`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
