-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 07:27 AM
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
(33, 'App 1', '500', NULL, '2021-09-27 04:53:19', NULL),
(34, 'App 2', '1000', NULL, '2021-09-27 04:53:24', NULL),
(35, 'App 3', '1500', NULL, '2021-09-27 04:53:31', NULL);

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
(22, 2, 2, 'HI admin', 'image/1712029596097871.png', NULL, NULL, NULL),
(24, 1, 2, 'hi user', 'image/1712030654791978.jpg', NULL, NULL, NULL);

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
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` int(11) NOT NULL,
  `employee_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `position_id`, `employee_name`, `created_at`, `updated_at`) VALUES
(37, 26, '2', NULL, NULL),
(41, 25, '3', NULL, NULL),
(42, 25, '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`id`, `employee_name`, `employee_email`, `employee_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rihan', 'rihan@gmail.com', '12345', NULL, NULL, NULL),
(2, 'Shojib', 'shojib@gmail.com', '12345', NULL, NULL, NULL),
(3, 'Sabbir', 'sabbir@gmail.com', '12345', NULL, NULL, NULL),
(4, 'Shofiq', 'shofiq@gmail.com', '12345', NULL, NULL, NULL),
(5, 'Protty', 'protty@gmail.com', '12345', NULL, NULL, NULL),
(6, 'Toriqul', 'toriqul@gmail.com', '12345', NULL, NULL, NULL);

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
(19, '2021_09_19_110257_employee', 11),
(20, '2021_09_21_102517_send_file', 12),
(22, '2021_09_22_112220_workflow', 14),
(28, '2021_09_24_115612_position_name', 18),
(29, '2021_09_24_115639_employee_name', 19),
(30, '2021_09_24_145351_position_details', 20),
(31, '2021_09_24_145406_employee_details', 20),
(33, '2021_09_21_104045_employee_login', 22),
(35, '2021_09_24_193138_sendfileemployee', 23);

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
-- Table structure for table `position_details`
--

CREATE TABLE `position_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_details`
--

INSERT INTO `position_details` (`id`, `position_name`, `created_at`, `updated_at`) VALUES
(25, 'Senior Dev', NULL, NULL),
(26, 'Junior Dev', NULL, NULL),
(27, 'Marketing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sendfileemployee`
--

CREATE TABLE `sendfileemployee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `employee_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sendfileemployee`
--

INSERT INTO `sendfileemployee` (`id`, `application_id`, `position_id`, `employee_name`, `created_at`, `updated_at`) VALUES
(3, 2, 25, '3', NULL, NULL),
(4, 33, 25, '5', NULL, NULL),
(5, 33, 26, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `send_file`
--

CREATE TABLE `send_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_price` int(11) NOT NULL,
  `application_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_land` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` int(11) NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `send_file`
--

INSERT INTO `send_file` (`id`, `position_type`, `name`, `application_type`, `application_price`, `application_number`, `father_name`, `mother_name`, `amount_land`, `nid_number`, `pdf`, `mobile_number`, `description`, `comment`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '4', '7', '26', 1000, '1711507521407528', 'MD. Maruful ISlam', 'Naznin Akther', '100', 1234567890, 'pdf/1711491149967228.pdf', '01992632069', 'acasc', 'ascas', NULL, NULL, NULL),
(2, '5', '8', '26', 1500, '1711511862311683', 'MD. Maruful ISlam', 'Naznin Akther', '200', 1234567890, 'pdf/1711491302262049.pdf', '01992632069', 'first', 'marketing', NULL, NULL, NULL),
(3, '5', '8', '26', 2500, '1711512093990505', 'Prokash Chandra Saha', 'Shema Rani Saha', '200', 1234567890, 'pdf/1711491395625694.pdf', '01992632069', '2nd', '3rd', NULL, NULL, NULL),
(4, '4', '6', '26', 1000, '1711512714427878', 'MD. Maruful ISlam', 'Naznin Akther', '100', 1234567890, 'pdf/1711512561963297.pdf', '01992632069', 'sdvsdv', '1st', NULL, NULL, NULL),
(5, '5', '8', '26', 2000, '1711512789150211', 'Prokash Chandra Saha', 'Shema Rani Saha', '100', 1234567890, 'pdf/1711512615619363.pdf', '01992632069', 'vsvsd', 'marketing', NULL, NULL, NULL);

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
(20, 'Shakib', 'shakib6610@gmail.com', NULL, '$2y$10$PSi4qit2JqNHesesIwDnzeczxJmKUkR56xaQUj4ZIRlOrweBcLwha', '886fe85eeec58ef42b41d4fa253a58c773c756a0', 1, NULL, '2021-09-15 00:10:36', '2021-09-26 21:36:36'),
(43, 'Sakib', 'sakib6610@gmail.com', NULL, '$2y$10$1Acjce16bMSytJEymg6yuOUvZFH6tAH4nZkmHApUjW3XWR12UuY0K', '242d64bb65f25f79d26070a02aa49438cb8880ce', 1, NULL, '2021-09-26 22:50:43', '2021-09-26 22:58:26');

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
(1, 20, '27', 1000, '1711859467644803', 'MD. Maruful ISlam', 'Naznin Akther', '100', 1234567890, 'image/1711859467644836.jpg', 'pdf/1711859467646154.pdf', 'file/1711859467648595.jpg,file/1711859467650365.jpg', '01992632069', 'caca', 1, NULL, '2021-09-25 07:53:27', NULL),
(2, 43, '33', 500, '1712029562015307', 'MD. Maruful ISlam(Edit)', 'Naznin Akther(Edit)', '100', 1234567890, 'image/1712029562015336.jpg', 'pdf/1712029562016415.pdf', 'file/1712029562017429.jpeg,file/1712029562018293.jpg', '01992632069', 'first(edit)', 0, NULL, '2021-09-27 04:55:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
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
-- Indexes for table `position_details`
--
ALTER TABLE `position_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sendfileemployee`
--
ALTER TABLE `sendfileemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_file`
--
ALTER TABLE `send_file`
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
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `employee_login`
--
ALTER TABLE `employee_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position_details`
--
ALTER TABLE `position_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sendfileemployee`
--
ALTER TABLE `sendfileemployee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `send_file`
--
ALTER TABLE `send_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
