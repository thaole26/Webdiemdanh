-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 09:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydiemdanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `attendance_time` datetime DEFAULT NULL,
  `change_attendance_time` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `study_session_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `status`, `attendance_time`, `change_attendance_time`, `note`, `created_at`, `updated_at`, `study_session_id`, `user_id`) VALUES
(1, '0', '2024-06-03 11:32:20', NULL, NULL, NULL, NULL, 1, 2),
(2, '0', '2024-06-03 21:58:53', '2024-06-03 22:50:53', NULL, NULL, NULL, 1, 3),
(3, '', NULL, NULL, NULL, NULL, NULL, 2, 2),
(4, '0', '2024-06-04 10:28:27', NULL, NULL, NULL, NULL, 2, 3),
(5, '', NULL, NULL, NULL, NULL, NULL, 3, 2),
(6, '', NULL, NULL, NULL, NULL, NULL, 3, 3),
(7, '', NULL, NULL, NULL, NULL, NULL, 4, 2),
(8, '', NULL, NULL, NULL, NULL, NULL, 4, 3),
(9, '', NULL, NULL, NULL, NULL, NULL, 5, 2),
(10, '', NULL, NULL, NULL, NULL, NULL, 5, 3),
(11, '', NULL, NULL, NULL, NULL, NULL, 6, 2),
(12, '', NULL, NULL, NULL, NULL, NULL, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `number_of_members` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `class_name`, `number_of_members`, `created_at`, `updated_at`, `subject_id`) VALUES
(1, '12DHTH01', 56, NULL, NULL, 'S001'),
(2, '12DHTH02', 52, NULL, NULL, 'S002'),
(3, '12DHTH01', 60, NULL, NULL, 'S003'),
(4, '12DHTH01', 0, '2024-06-04 04:23:44', '2024-06-04 07:55:30', 'S005'),
(5, '12DHTH07', 0, '2024-06-04 07:48:00', '2024-06-04 07:55:23', 'S004');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(63, '0001_01_01_000000_create_users_table', 1),
(64, '0001_01_01_000001_create_cache_table', 1),
(65, '0001_01_01_000002_create_jobs_table', 1),
(66, '2024_05_19_121958_create_subject_table', 1),
(67, '2024_05_19_122047_create_schedule_table', 1),
(68, '2024_05_19_122056_create_attendance_table', 1),
(69, '2024_05_19_141721_create_classroom_table', 1),
(70, '2024_05_19_144614_create_study_session_table', 1),
(71, '2024_05_19_150509_alter_classroom_table', 1),
(72, '2024_05_19_150634_alter_schedule_table', 1),
(73, '2024_05_19_151059_alter_session_table', 1),
(74, '2024_05_19_151346_alter_attendance_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL,
  `number_of_sessions` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `start_time`, `end_time`, `start_day`, `end_day`, `number_of_sessions`, `feedback`, `created_at`, `updated_at`, `user_id`, `class_id`) VALUES
('SCHE001', '07:00:00', '09:15:00', '2024-05-06', '2024-05-27', 4, NULL, NULL, NULL, 6, 1),
('SCHE002', '12:30:00', '16:15:00', '2024-05-02', '2024-05-30', 5, NULL, NULL, NULL, 6, 3),
('SCHE003', '12:30:00', '16:15:00', '2024-05-02', '2024-05-30', 5, NULL, NULL, NULL, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RoYMxR15kIEi0PgOvgUh7Oyz3sAPb8taOFvR2CcX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnR1eW16MmVOT3k0RnFrUVZTaHJNVHZ3WDJiSXVnRVhuUVZneUVjMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoidXNlciI7Tzo4OiJzdGRDbGFzcyI6MTc6e3M6NzoidXNlcl9pZCI7aTozO3M6ODoidXNlcm5hbWUiO3M6MToiYSI7czo4OiJwYXNzd29yZCI7czoxOiJhIjtzOjEyOiJ0eXBlX29mX3VzZXIiO3M6MjoiU1YiO3M6NzoiZmFjdWx0eSI7czo0OiJDTlRUIjtzOjY6ImF2YXRhciI7czoxMDoiYXZhdGFyLnBuZyI7czo5OiJmdWxsX25hbWUiO3M6MTI6IlNpbmggVmnDqm4gQSI7czo1OiJlbWFpbCI7czoxMToiYUBnbWFpbC5jb20iO3M6MTI6InBob25lX251bWJlciI7czoxMDoiMDEyMzQ1Njc4NyI7czo3OiJhZGRyZXNzIjtzOjExOiLEkMOgIE7hurVuZyI7czoxMzoiZGF0ZV9vZl9iaXJ0aCI7czoxOToiMjAwNC0wMS0yOCAwMDowMDowMCI7czoxNzoiZW1haWxfdmVyaWZpZWRfYXQiO047czoxNDoicmVtZW1iZXJfdG9rZW4iO047czo4OiJsb2dpbl9hdCI7TjtzOjE3OiJjaGFnZV9wYXNzd29yZF9hdCI7TjtzOjEwOiJjcmVhdGVkX2F0IjtOO3M6MTA6InVwZGF0ZWRfYXQiO047fX0=', 1717489498);

-- --------------------------------------------------------

--
-- Table structure for table `study_session`
--

CREATE TABLE `study_session` (
  `study_session_id` bigint(20) UNSIGNED NOT NULL,
  `frametime` datetime NOT NULL,
  `study_address` varchar(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_session`
--

INSERT INTO `study_session` (`study_session_id`, `frametime`, `study_address`, `room_name`, `created_at`, `updated_at`, `schedule_id`) VALUES
(1, '2024-05-06 00:00:00', '140 Lê Trọng Tấn', 'A.1.06', NULL, NULL, 'SCHE001'),
(2, '2024-05-13 00:00:00', '140 Lê Trọng Tấn', 'A.1.06', NULL, NULL, 'SCHE001'),
(3, '2024-05-20 00:00:00', '140 Lê Trọng Tấn', 'A.1.06', NULL, NULL, 'SCHE001'),
(4, '2024-05-27 00:00:00', '140 Lê Trọng Tấn', 'A.1.06', NULL, NULL, 'SCHE001'),
(5, '2024-05-02 00:00:00', '140 Lê Trọng Tấn', 'A.2.04', NULL, NULL, 'SCHE002'),
(6, '2024-05-09 00:00:00', '140 Lê Trọng Tấn', 'A.2.04', NULL, NULL, 'SCHE002'),
(7, '2024-05-16 00:00:00', '140 Lê Trọng Tấn', 'A.2.04', NULL, NULL, 'SCHE002'),
(8, '2024-05-23 00:00:00', '140 Lê Trọng Tấn', 'A.2.04', NULL, NULL, 'SCHE002'),
(9, '2024-05-30 00:00:00', '140 Lê Trọng Tấn', 'A.2.04', NULL, NULL, 'SCHE002'),
(10, '2024-05-02 00:00:00', '140 Lê Trọng Tấn', 'A.2.08', NULL, NULL, 'SCHE003'),
(11, '2024-05-09 00:00:00', '140 Lê Trọng Tấn', 'A.2.08', NULL, NULL, 'SCHE003'),
(12, '2024-05-16 00:00:00', '140 Lê Trọng Tấn', 'A.2.08', NULL, NULL, 'SCHE003'),
(13, '2024-05-23 00:00:00', '140 Lê Trọng Tấn', 'A.2.08', NULL, NULL, 'SCHE003'),
(14, '2024-05-30 00:00:00', '140 Lê Trọng Tấn', 'A.2.08', NULL, NULL, 'SCHE003');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `descriptions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `descriptions`, `created_at`, `updated_at`) VALUES
('S001', 'Toán Cao Cấp', NULL, NULL, '2024-06-03 19:32:55'),
('S002', 'Lập Trình Mã Nguồn Mở', NULL, NULL, NULL),
('S003', 'Lập Trình Hướng Đối Tượng', NULL, NULL, NULL),
('S004', 'Hệ Quản Trị Cơ Sở Dữ Liệu', NULL, NULL, NULL),
('S005', 'Ngôn Ngữ Lập Trình Hiện Đại', 'Sử dụng Python làm ngôn ngữ lập trình chính', '2024-06-03 18:39:17', '2024-06-03 18:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type_of_user` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `chage_password_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `type_of_user`, `faculty`, `avatar`, `full_name`, `email`, `phone_number`, `address`, `date_of_birth`, `email_verified_at`, `remember_token`, `login_at`, `chage_password_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'QT', 'Management', 'avatar.png', 'Adminstrator', 'admin@gmail.com', '0000000000', 'Hồ Chí Minh', '2003-02-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'b', 'b', 'SV', 'CNTT', 'avatar.png', 'Sinh Viên B', 'b@gmail.com', '0123456788', 'Lâm Đồng', '2003-10-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'a', 'a', 'SV', 'CNTT', 'avatar.png', 'Sinh Viên A', 'a@gmail.com', '0123456787', 'Đà Nẵng', '2004-01-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'gv001', 'gv001', 'GV', 'CNTT', 'avatar.png', 'Trần Văn Hùng', 'tranvanhung@gmail.com', '0123456777', 'Hồ Chí Minh', '1980-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'gv002', 'gv002', 'GV', 'CNTT', 'avatar.png', 'Trần Trương Tuấn Phát', 'trantruongtuanphat@gmail.com', '0123456778', 'Hồ Chí Minh', '1990-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendance_study_session_id` (`study_session_id`),
  ADD KEY `attendance_user_id` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `classroom_subject_id` (`subject_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `schedule_user_id` (`user_id`),
  ADD KEY `schedule_class_id` (`class_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `study_session`
--
ALTER TABLE `study_session`
  ADD PRIMARY KEY (`study_session_id`),
  ADD KEY `study_session_schedule_id` (`schedule_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `study_session`
--
ALTER TABLE `study_session`
  MODIFY `study_session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_study_session_id` FOREIGN KEY (`study_session_id`) REFERENCES `study_session` (`study_session_id`),
  ADD CONSTRAINT `attendance_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_class_id` FOREIGN KEY (`class_id`) REFERENCES `classroom` (`class_id`),
  ADD CONSTRAINT `schedule_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `study_session`
--
ALTER TABLE `study_session`
  ADD CONSTRAINT `study_session_schedule_id` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
