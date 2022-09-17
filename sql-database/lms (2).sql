-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 09:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assesments`
--

CREATE TABLE `assesments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assesments`
--

INSERT INTO `assesments` (`id`, `course_batch_id`, `assessment_id`, `assessment_desc`, `created_by`, `created_at`, `updated_at`) VALUES
(4, '2022_104', '2022_104_javascript', 'JavaScript basics', '26', '2022-05-19 11:52:48', '2022-05-19 11:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `assesment_details`
--

CREATE TABLE `assesment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assesment_details`
--

INSERT INTO `assesment_details` (`id`, `assessment_id`, `question`, `op1`, `op2`, `op3`, `op4`, `answer`, `created_at`, `updated_at`) VALUES
(14, '2022_104_javascript', 'What is JavaScript?', 'JavaScript is a scripting language used to make the website interactive', 'JavaScript is an assembly language used to make the website interactive', 'JavaScript is a compiled language used to make the website interactive', 'None of the mentioned', 'JavaScript is a scripting language used to make the website interactive', '2022-05-19 11:52:48', '2022-05-19 11:52:48'),
(15, '2022_104_javascript', 'Which of the following is correct about JavaScript?', 'JavaScript is an Object-Based language', 'JavaScript is Assembly-language', 'JavaScript is an Object-Oriented language', 'JavaScript is a High-level language', 'JavaScript is an Object-Based language', '2022-05-19 11:52:48', '2022-05-19 11:52:48'),
(16, '2022_104_javascript', 'Arrays in JavaScript are defined by which of the following statements?', 'It is an ordered list of values', 'It is an ordered list of objects', 'It is an ordered list of string', 'It is an ordered list of function', 'It is an ordered list of values', '2022-05-19 11:52:48', '2022-05-19 11:52:48'),
(17, '2022_104_javascript', 'Which of the following is not javascript data types?', 'Null type', 'Undefined type', 'Number type', 'All of the mentioned', 'All of the mentioned', '2022-05-19 11:52:48', '2022-05-19 11:52:48'),
(18, '2022_104_javascript', 'Where is Client-side JavaScript code is embedded within HTML documents?', 'A URL that uses the special javascript:code', 'A URL that uses the special javascript:protocol', 'A URL that uses the special javascript:encoding', 'A URL that uses the special javascript:stack', 'A URL that uses the special javascript:protocol', '2022-05-19 11:52:48', '2022-05-19 11:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `assesment_marks`
--

CREATE TABLE `assesment_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obtained_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_schedules_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `training_schedules_id`, `trainee_id`, `created_at`, `updated_at`) VALUES
(1, '22', '2', '2022-05-20 00:10:47', '2022-05-20 00:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE `auth_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`id`, `email`, `user_type`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 'kakone5587@royins.com', 'Trainer', NULL, NULL, '2022-04-13 06:15:12'),
(3, 'meetagrawal39@gmail.com', 'Trainee', '2022', NULL, '2022-05-20 00:07:38'),
(4, 'chiraggajipara22@gmail.com', 'Trainee', '2022', NULL, NULL),
(5, 'dhruvkapadia786@gmail.com', 'Trainee', '2022', NULL, NULL),
(7, 'bjiruwala@gmail.com', 'Trainee', '2022', '2022-04-20 02:24:40', '2022-04-20 02:24:40'),
(8, 'maharshi3n333@gmail.com', 'Trainee', '2022', '2022-04-23 03:23:42', '2022-04-23 03:23:42'),
(10, 'deepak.rj.dr@gmail.com', 'Trainee', '2022', '2022-05-16 13:12:30', '2022-05-16 13:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `date`, `created_at`, `updated_at`) VALUES
('2018', '2018-freshers', '2018-01-09 18:30:00', '2022-04-19 03:44:13', '2022-05-16 11:03:37'),
('2019', '2019-freshers', '2019-01-09 18:30:00', '2022-04-19 03:45:03', '2022-04-19 03:51:22'),
('2020', '2020-freshers', '2020-01-09 18:30:00', '2022-04-19 03:45:40', '2022-04-26 10:53:18'),
('2021', '2021-freshers', '2021-01-09 18:30:00', '2022-04-19 03:46:01', '2022-04-19 03:46:01'),
('2022', '2022-freshers', '2022-01-09 18:30:00', '2022-04-19 03:46:15', '2022-04-26 10:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `status`, `description`, `start_date`, `created_at`, `updated_at`) VALUES
('102', 'CSS', 'active', 'cascading style sheet', '2022-01-09 18:30:00', '2022-04-19 03:38:20', '2022-04-19 03:38:20'),
('104', 'JAVASCRIPT', 'active', 'javascript overview', '2022-01-09 18:30:00', '2022-04-19 03:39:44', '2022-04-19 03:39:44'),
('105', 'SQL', 'active', 'Structure Query Language', '2022-01-09 18:30:00', '2022-04-19 03:40:50', '2022-04-19 03:40:50'),
('106', 'PHP', 'active', 'Preprocessor hypertext', '2022-01-09 18:30:00', '2022-04-19 03:41:22', '2022-04-19 03:41:22'),
('107', 'REACT JS', 'active', 'Fundamentals of React', '2022-01-09 18:30:00', '2022-04-19 03:41:55', '2022-04-19 03:41:55'),
('101', 'Freshers', 'inactive', 'cascading style sheet', '2022-05-15 18:30:00', '2022-05-16 11:27:13', '2022-05-16 11:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `course_batches`
--

CREATE TABLE `course_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_batches`
--

INSERT INTO `course_batches` (`id`, `batch_course_id`, `course_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(155, '2022_102', '102', '2022', '2022-04-26 10:47:58', '2022-04-26 10:47:58'),
(156, '2022_104', '104', '2022', '2022-04-26 10:47:58', '2022-04-26 10:47:58'),
(157, '2022_105', '105', '2022', '2022-04-26 10:47:59', '2022-04-26 10:47:59'),
(159, '2020_106', '106', '2020', '2022-04-26 10:53:18', '2022-04-26 10:53:18'),
(160, '2024_102', '102', '2024', '2022-05-16 11:03:59', '2022-05-16 11:03:59'),
(161, '2024_104', '104', '2024', '2022-05-16 11:03:59', '2022-05-16 11:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `course_pdfs`
--

CREATE TABLE `course_pdfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_pdfs`
--

INSERT INTO `course_pdfs` (`id`, `course_id`, `pdf`, `created_at`, `updated_at`) VALUES
(36, '102', 'Media/PDFs/1650359300_1.pdf', '2022-04-19 03:38:20', '2022-04-19 03:38:20'),
(37, '103', 'Media/PDFs/1650359333_1.pdf', '2022-04-19 03:38:53', '2022-04-19 03:38:53'),
(38, '104', 'Media/PDFs/1650359384_1.pdf', '2022-04-19 03:39:44', '2022-04-19 03:39:44'),
(39, '105', 'Media/PDFs/1650359450_1.pdf', '2022-04-19 03:40:50', '2022-04-19 03:40:50'),
(40, '106', 'Media/PDFs/1650359482_1.pdf', '2022-04-19 03:41:22', '2022-04-19 03:41:22'),
(41, '107', 'Media/PDFs/1650359515_1.pdf', '2022-04-19 03:41:55', '2022-04-19 03:41:55'),
(45, '103', 'Media/PDFs/1_RISE Courses for Students - March 2022.pdf.pdf', '2022-04-26 01:09:55', '2022-04-26 01:09:55'),
(47, '101', 'Media/PDFs/1_PAR-7.pdf.pdf', '2022-05-16 11:27:13', '2022-05-16 11:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(17, '2022_03_19_130215_create_auth_users_table', 2),
(21, '2022_03_19_132151_update_auth_users_table_add_new_column', 3),
(23, '2022_04_12_162923_create_batches_table', 4),
(25, '2022_04_13_051638_create_admins_table', 5),
(26, '2022_04_17_085659_create_courses_table', 6),
(27, '2022_04_17_101222_update_courses_table_remove_pdf', 7),
(28, '2022_04_17_101555_create_course_pdfs_table', 8),
(29, '2022_04_17_111311_create_course_batches_table', 9),
(39, '2022_04_20_084434_create_training_schedules_table', 10),
(41, '2022_04_26_121611_update_course_batches_table_add_new_column', 11),
(45, '2022_04_27_053357_create_attendances_table', 12),
(46, '2022_04_27_173423_update_training_schedules_table_add_new_column', 12),
(55, '2022_05_03_094105_create_assesments_table', 13),
(56, '2022_05_09_162133_create_assesment_marks_table', 13),
(57, '2022_05_10_173011_create_assesment_details_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_schedules`
--

CREATE TABLE `training_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_schedules`
--

INSERT INTO `training_schedules` (`id`, `course_batch_id`, `date`, `start_time`, `end_time`, `venue`, `trainer_id`, `attendance_status`, `created_at`, `updated_at`) VALUES
(22, '2022_102', '2022-05-19 18:30:00', '10:00:00', '12:00:00', 'takshsila', '26', 'done', '2022-05-19 11:45:00', '2022-05-20 00:10:47'),
(23, '2022_104', '2022-05-18 18:30:00', '12:00:00', '15:45:00', 'Vishakapatnam', '26', 'pending', '2022-05-19 11:45:41', '2022-05-19 11:45:41'),
(24, '2022_104', '2022-05-19 18:30:00', '15:00:00', '16:00:00', 'Nalanda', '26', 'pending', '2022-05-19 11:46:26', '2022-05-19 11:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `phone_no`, `address`, `user_type`, `status`, `profile_pic`, `batch_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Meet Agrawal', 'meetagrawal39@gmail.com', '1234', 'male', '7521454512', 'vadodara', 'Trainee', '0', 'Media/Profile_pics/1650183670_1.jpg', '2022', NULL, '2022-04-11 00:48:57', '2022-04-11 00:48:57'),
(3, 'chirag gajipara', 'chiraggajipara22@gmail.com', '1234', 'male', '88888999990', 'rajkot', 'Trainer', '0', 'Media/Profile_pics/1650183670_1.jpg', NULL, NULL, '2022-04-11 00:51:36', '2022-04-11 00:51:36'),
(9, 'DHRUV KAPADIA', 'dhruvkapadia786@gmail.com', '1234', 'male', '7265041254', 'bharuch', 'Trainee', '1', 'Media/Profile_pics/1650183670_1.jpg', '2022', NULL, '2022-04-12 00:34:00', '2022-04-12 00:34:00'),
(26, 'Burhan Jiruwala', 'bjiruwala@gmail.com', '1234', 'male', '5852547852', 'dahod', 'Trainer', '0', 'Media/Profile_pics/1650441434_1.jpg', '', NULL, '2022-04-20 02:27:14', '2022-04-20 02:27:14'),
(27, 'Maharshi Updhayay', 'maharshi3n333@gmail.com', '1234', 'male', '8882212454', 'Subhan Pura', 'Trainee', '0', 'Media/Profile_pics/1650704111_1.jpg', '2022', NULL, '2022-04-23 03:25:11', '2022-04-23 03:25:11'),
(28, 'DEEPAK RATHORE', 'deepak.rj.dr@gmail.com', '1234', 'male', '7567422168', 'anandvan society', 'Trainee', '0', 'Media/Profile_pics/1652726737_1.jpg', '2022', NULL, '2022-05-16 13:15:37', '2022-05-16 13:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assesments`
--
ALTER TABLE `assesments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assesment_details`
--
ALTER TABLE `assesment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assesment_marks`
--
ALTER TABLE `assesment_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD KEY `batches_id_index` (`id`);

--
-- Indexes for table `course_batches`
--
ALTER TABLE `course_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_pdfs`
--
ALTER TABLE `course_pdfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `training_schedules`
--
ALTER TABLE `training_schedules`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assesments`
--
ALTER TABLE `assesments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assesment_details`
--
ALTER TABLE `assesment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `assesment_marks`
--
ALTER TABLE `assesment_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_batches`
--
ALTER TABLE `course_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `course_pdfs`
--
ALTER TABLE `course_pdfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_schedules`
--
ALTER TABLE `training_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
