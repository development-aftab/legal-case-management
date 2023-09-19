-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 07:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backendp_lcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountings`
--

CREATE TABLE `accountings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `total_ammount` varchar(255) DEFAULT NULL,
  `paid_ammount` varchar(255) DEFAULT NULL,
  `balance_ammount` varchar(255) DEFAULT NULL,
  `case_file_id` varchar(255) DEFAULT NULL,
  `upload_receipt` text DEFAULT NULL,
  `noti_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-01 20:43:13', '2023-02-01 20:43:13'),
(2, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-01 20:46:37', '2023-02-01 20:46:37'),
(3, 'Nero Cherry917', 'LoggedIn', 122, 'App\\User', 122, 'App\\User', '[]', '2023-02-01 20:51:15', '2023-02-01 20:51:15'),
(4, 'Rudyard Gamble306', 'LoggedIn', 123, 'App\\User', 123, 'App\\User', '[]', '2023-02-01 20:55:05', '2023-02-01 20:55:05'),
(5, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-02 12:48:47', '2023-02-02 12:48:47'),
(6, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-02 14:05:11', '2023-02-02 14:05:11'),
(7, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-02 15:39:34', '2023-02-02 15:39:34'),
(8, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-02 15:56:19', '2023-02-02 15:56:19'),
(9, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-02 16:02:48', '2023-02-02 16:02:48'),
(10, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-02 16:03:34', '2023-02-02 16:03:34'),
(11, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-02 16:04:00', '2023-02-02 16:04:00'),
(12, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-02 16:04:32', '2023-02-02 16:04:32'),
(13, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-03 11:39:55', '2023-02-03 11:39:55'),
(14, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-03 11:43:55', '2023-02-03 11:43:55'),
(15, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-03 12:06:56', '2023-02-03 12:06:56'),
(16, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-03 12:07:20', '2023-02-03 12:07:20'),
(17, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-03 13:17:24', '2023-02-03 13:17:24'),
(18, 'Lydia Ware817', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-03 13:25:48', '2023-02-03 13:25:48'),
(19, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-03 13:26:49', '2023-02-03 13:26:49'),
(20, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-03 14:56:54', '2023-02-03 14:56:54'),
(21, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-03 14:57:10', '2023-02-03 14:57:10'),
(22, 'Lydia Ware817', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-03 19:30:08', '2023-02-03 19:30:08'),
(23, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-03 19:31:50', '2023-02-03 19:31:50'),
(24, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-03 20:29:12', '2023-02-03 20:29:12'),
(25, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-06 11:26:51', '2023-02-06 11:26:51'),
(26, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-06 11:27:29', '2023-02-06 11:27:29'),
(27, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-06 12:55:51', '2023-02-06 12:55:51'),
(28, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-06 15:13:17', '2023-02-06 15:13:17'),
(29, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 16:53:41', '2023-02-06 16:53:41'),
(30, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 18:00:56', '2023-02-06 18:00:56'),
(31, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-06 18:42:31', '2023-02-06 18:42:31'),
(32, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 19:20:13', '2023-02-06 19:20:13'),
(33, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 19:20:27', '2023-02-06 19:20:27'),
(34, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 19:20:41', '2023-02-06 19:20:41'),
(35, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-06 19:20:58', '2023-02-06 19:20:58'),
(36, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-06 19:21:52', '2023-02-06 19:21:52'),
(37, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 19:37:56', '2023-02-06 19:37:56'),
(38, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-06 19:42:15', '2023-02-06 19:42:15'),
(39, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-06 19:42:26', '2023-02-06 19:42:26'),
(40, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 20:01:12', '2023-02-06 20:01:12'),
(41, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-06 20:01:23', '2023-02-06 20:01:23'),
(42, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-07 11:34:26', '2023-02-07 11:34:26'),
(43, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-07 11:34:50', '2023-02-07 11:34:50'),
(44, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-07 11:37:00', '2023-02-07 11:37:00'),
(45, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-07 12:22:59', '2023-02-07 12:22:59'),
(46, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-07 12:23:14', '2023-02-07 12:23:14'),
(47, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-07 12:25:48', '2023-02-07 12:25:48'),
(48, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-07 13:09:33', '2023-02-07 13:09:33'),
(49, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-07 13:09:45', '2023-02-07 13:09:45'),
(50, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-07 13:23:24', '2023-02-07 13:23:24'),
(51, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-07 13:36:23', '2023-02-07 13:36:23'),
(52, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-07 16:58:08', '2023-02-07 16:58:08'),
(53, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-07 17:11:35', '2023-02-07 17:11:35'),
(54, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-07 19:50:44', '2023-02-07 19:50:44'),
(55, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-08 11:52:09', '2023-02-08 11:52:09'),
(56, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-08 11:58:17', '2023-02-08 11:58:17'),
(57, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-08 13:22:38', '2023-02-08 13:22:38'),
(58, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-08 20:36:07', '2023-02-08 20:36:07'),
(59, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-08 20:36:46', '2023-02-08 20:36:46'),
(60, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-09 15:09:00', '2023-02-09 15:09:00'),
(61, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-09 15:21:39', '2023-02-09 15:21:39'),
(62, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-02-10 12:26:09', '2023-02-10 12:26:09'),
(63, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-10 15:03:05', '2023-02-10 15:03:05'),
(64, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-10 15:43:45', '2023-02-10 15:43:45'),
(65, 'Lydia Ware817', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-10 15:45:34', '2023-02-10 15:45:34'),
(66, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-10 15:45:46', '2023-02-10 15:45:46'),
(67, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-10 20:03:51', '2023-02-10 20:03:51'),
(68, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-13 16:16:16', '2023-02-13 16:16:16'),
(69, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-13 16:29:36', '2023-02-13 16:29:36'),
(70, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-13 16:39:24', '2023-02-13 16:39:24'),
(71, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-13 18:54:51', '2023-02-13 18:54:51'),
(72, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-13 20:07:49', '2023-02-13 20:07:49'),
(73, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-14 12:13:55', '2023-02-14 12:13:55'),
(74, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-14 17:44:39', '2023-02-14 17:44:39'),
(75, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-14 19:54:51', '2023-02-14 19:54:51'),
(76, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-15 11:49:41', '2023-02-15 11:49:41'),
(77, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-15 12:43:02', '2023-02-15 12:43:02'),
(78, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-16 12:52:38', '2023-02-16 12:52:38'),
(79, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-16 13:39:20', '2023-02-16 13:39:20'),
(80, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-17 11:55:50', '2023-02-17 11:55:50'),
(81, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-17 12:07:47', '2023-02-17 12:07:47'),
(82, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-20 10:50:52', '2023-02-20 10:50:52'),
(83, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-20 17:29:23', '2023-02-20 17:29:23'),
(84, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-20 18:30:28', '2023-02-20 18:30:28'),
(85, 'Lydia Ware817', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-20 18:30:32', '2023-02-20 18:30:32'),
(86, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-20 18:30:56', '2023-02-20 18:30:56'),
(87, 'Candice Colon', 'LoggedIn', 133, 'App\\User', 133, 'App\\User', '[]', '2023-02-20 18:32:33', '2023-02-20 18:32:33'),
(88, 'Violet Boyle', 'LoggedIn', 134, 'App\\User', 134, 'App\\User', '[]', '2023-02-20 18:34:52', '2023-02-20 18:34:52'),
(89, 'Candice Colon', 'LoggedOut', 133, 'App\\User', 133, 'App\\User', '[]', '2023-02-20 18:45:25', '2023-02-20 18:45:25'),
(90, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-20 18:45:34', '2023-02-20 18:45:34'),
(91, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-20 18:46:43', '2023-02-20 18:46:43'),
(92, 'Candice Colon', 'LoggedIn', 133, 'App\\User', 133, 'App\\User', '[]', '2023-02-20 18:47:21', '2023-02-20 18:47:21'),
(93, 'Candice Colon', 'LoggedOut', 133, 'App\\User', 133, 'App\\User', '[]', '2023-02-20 18:49:26', '2023-02-20 18:49:26'),
(94, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-20 18:49:37', '2023-02-20 18:49:37'),
(95, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-20 18:50:35', '2023-02-20 18:50:35'),
(96, 'Candice Colon', 'LoggedIn', 133, 'App\\User', 133, 'App\\User', '[]', '2023-02-20 18:51:00', '2023-02-20 18:51:00'),
(97, 'Candice Colon', 'LoggedOut', 133, 'App\\User', 133, 'App\\User', '[]', '2023-02-20 19:56:18', '2023-02-20 19:56:18'),
(98, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-20 19:57:43', '2023-02-20 19:57:43'),
(99, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-21 11:40:19', '2023-02-21 11:40:19'),
(100, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-21 12:23:25', '2023-02-21 12:23:25'),
(101, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-21 12:25:12', '2023-02-21 12:25:12'),
(102, 'Lacota Marks', 'LoggedIn', 136, 'App\\User', 136, 'App\\User', '[]', '2023-02-21 12:28:01', '2023-02-21 12:28:01'),
(103, 'Breanna Sherman', 'LoggedIn', 137, 'App\\User', 137, 'App\\User', '[]', '2023-02-21 12:29:30', '2023-02-21 12:29:30'),
(104, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-22 02:17:31', '2023-02-22 02:17:31'),
(105, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-22 04:40:37', '2023-02-22 04:40:37'),
(106, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-23 03:53:51', '2023-02-23 03:53:51'),
(107, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-23 03:54:29', '2023-02-23 03:54:29'),
(108, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-23 03:54:55', '2023-02-23 03:54:55'),
(109, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-23 03:55:08', '2023-02-23 03:55:08'),
(110, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-23 04:34:27', '2023-02-23 04:34:27'),
(111, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-23 04:35:01', '2023-02-23 04:35:01'),
(112, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-23 07:27:53', '2023-02-23 07:27:53'),
(113, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-23 23:27:34', '2023-02-23 23:27:34'),
(114, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-24 02:47:47', '2023-02-24 02:47:47'),
(115, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-24 03:39:09', '2023-02-24 03:39:09'),
(116, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-24 06:28:04', '2023-02-24 06:28:04'),
(117, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-24 08:03:04', '2023-02-24 08:03:04'),
(118, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-24 23:05:23', '2023-02-24 23:05:23'),
(119, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-25 00:42:04', '2023-02-25 00:42:04'),
(120, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 00:46:04', '2023-02-25 00:46:04'),
(121, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 01:59:53', '2023-02-25 01:59:53'),
(122, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 02:56:33', '2023-02-25 02:56:33'),
(123, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-25 02:57:57', '2023-02-25 02:57:57'),
(124, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 03:10:50', '2023-02-25 03:10:50'),
(125, 'Lydia Ware817', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-25 03:13:39', '2023-02-25 03:13:39'),
(126, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 03:13:47', '2023-02-25 03:13:47'),
(127, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 03:14:39', '2023-02-25 03:14:39'),
(128, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 03:36:01', '2023-02-25 03:36:01'),
(129, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 03:36:15', '2023-02-25 03:36:15'),
(130, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 04:03:48', '2023-02-25 04:03:48'),
(131, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 04:14:30', '2023-02-25 04:14:30'),
(132, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-25 05:35:49', '2023-02-25 05:35:49'),
(133, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-27 22:09:58', '2023-02-27 22:09:58'),
(134, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 00:20:48', '2023-02-28 00:20:48'),
(135, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-28 00:26:59', '2023-02-28 00:26:59'),
(136, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 02:26:54', '2023-02-28 02:26:54'),
(137, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-28 02:57:44', '2023-02-28 02:57:44'),
(138, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 05:45:42', '2023-02-28 05:45:42'),
(139, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-28 07:58:32', '2023-02-28 07:58:32'),
(140, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 22:29:33', '2023-02-28 22:29:33'),
(141, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 22:29:48', '2023-02-28 22:29:48'),
(142, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 22:29:59', '2023-02-28 22:29:59'),
(143, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 22:31:05', '2023-02-28 22:31:05'),
(144, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-28 22:31:35', '2023-02-28 22:31:35'),
(145, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-28 22:33:05', '2023-02-28 22:33:05'),
(146, 'Lydia Ware817', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-02-28 22:37:00', '2023-02-28 22:37:00'),
(147, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 22:37:05', '2023-02-28 22:37:05'),
(148, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-02-28 22:49:25', '2023-02-28 22:49:25'),
(149, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-02-28 23:14:24', '2023-02-28 23:14:24'),
(150, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-01 02:03:14', '2023-03-01 02:03:14'),
(151, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-01 02:06:43', '2023-03-01 02:06:43'),
(152, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-01 23:59:07', '2023-03-01 23:59:07'),
(153, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-02 02:50:22', '2023-03-02 02:50:22'),
(154, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-02 03:51:26', '2023-03-02 03:51:26'),
(155, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-02 05:30:00', '2023-03-02 05:30:00'),
(156, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-04 02:35:25', '2023-03-04 02:35:25'),
(157, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-05 20:56:39', '2023-03-05 20:56:39'),
(158, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-06 23:20:42', '2023-03-06 23:20:42'),
(159, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-07 07:20:11', '2023-03-07 07:20:11'),
(160, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-07 22:42:21', '2023-03-07 22:42:21'),
(161, 'Lacy Olson', 'LoggedIn', 144, 'App\\User', 144, 'App\\User', '[]', '2023-03-07 23:04:48', '2023-03-07 23:04:48'),
(162, 'Lacy Olson', 'LoggedOut', 144, 'App\\User', 144, 'App\\User', '[]', '2023-03-08 00:55:11', '2023-03-08 00:55:11'),
(163, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 03:28:54', '2023-03-09 03:28:54'),
(164, 'Lydia Ware817', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-09 04:01:17', '2023-03-09 04:01:17'),
(165, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 04:05:48', '2023-03-09 04:05:48'),
(166, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 04:09:26', '2023-03-09 04:09:26'),
(167, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 04:10:40', '2023-03-09 04:10:40'),
(168, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:20:33', '2023-03-09 05:20:33'),
(169, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:26:21', '2023-03-09 05:26:21'),
(170, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:30:07', '2023-03-09 05:30:07'),
(171, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:30:11', '2023-03-09 05:30:11'),
(172, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:31:32', '2023-03-09 05:31:32'),
(173, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:31:41', '2023-03-09 05:31:41'),
(174, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 05:37:47', '2023-03-09 05:37:47'),
(175, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 06:25:03', '2023-03-09 06:25:03'),
(176, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 22:28:49', '2023-03-09 22:28:49'),
(177, 'test', 'Registered', 146, 'App\\User', 146, 'App\\User', '[]', '2023-03-09 23:51:35', '2023-03-09 23:51:35'),
(178, 'test', 'LoggedOut', 146, 'App\\User', 146, 'App\\User', '[]', '2023-03-09 23:52:50', '2023-03-09 23:52:50'),
(179, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-09 23:53:09', '2023-03-09 23:53:09'),
(180, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 00:39:12', '2023-03-10 00:39:12'),
(181, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 01:11:30', '2023-03-10 01:11:30'),
(182, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 01:14:12', '2023-03-10 01:14:12'),
(183, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 02:17:45', '2023-03-10 02:17:45'),
(184, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 02:20:07', '2023-03-10 02:20:07'),
(185, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 02:36:59', '2023-03-10 02:36:59'),
(186, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 02:40:06', '2023-03-10 02:40:06'),
(187, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 03:02:18', '2023-03-10 03:02:18'),
(188, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 03:02:45', '2023-03-10 03:02:45'),
(189, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 03:06:08', '2023-03-10 03:06:08'),
(190, 'test att', 'LoggedIn', 151, 'App\\User', 151, 'App\\User', '[]', '2023-03-10 03:06:21', '2023-03-10 03:06:21'),
(191, 'test att', 'LoggedOut', 151, 'App\\User', 151, 'App\\User', '[]', '2023-03-10 03:17:55', '2023-03-10 03:17:55'),
(192, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 23:06:54', '2023-03-10 23:06:54'),
(193, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 23:09:35', '2023-03-10 23:09:35'),
(194, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 23:20:23', '2023-03-10 23:20:23'),
(195, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 23:36:26', '2023-03-10 23:36:26'),
(196, 'attorney 11', 'LoggedIn', 154, 'App\\User', 154, 'App\\User', '[]', '2023-03-10 23:37:09', '2023-03-10 23:37:09'),
(197, 'attorney 11', 'LoggedOut', 154, 'App\\User', 154, 'App\\User', '[]', '2023-03-10 23:39:44', '2023-03-10 23:39:44'),
(198, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-10 23:40:46', '2023-03-10 23:40:46'),
(199, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-11 01:04:59', '2023-03-11 01:04:59'),
(200, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-13 22:46:03', '2023-03-13 22:46:03'),
(201, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-13 13:43:21', '2023-03-13 13:43:21'),
(202, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-13 13:43:33', '2023-03-13 13:43:33'),
(203, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-13 13:44:28', '2023-03-13 13:44:28'),
(204, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-13 13:44:38', '2023-03-13 13:44:38'),
(205, 'Cairo Marks', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-13 13:48:44', '2023-03-13 13:48:44'),
(206, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-13 13:48:53', '2023-03-13 13:48:53'),
(207, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-13 14:06:20', '2023-03-13 14:06:20'),
(208, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-13 14:06:29', '2023-03-13 14:06:29'),
(209, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-13 14:36:10', '2023-03-13 14:36:10'),
(210, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-13 15:18:12', '2023-03-13 15:18:12'),
(211, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-13 15:18:19', '2023-03-13 15:18:19'),
(212, 'Cairo Marks', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-13 15:34:09', '2023-03-13 15:34:09'),
(213, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-13 15:34:20', '2023-03-13 15:34:20'),
(214, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-15 19:58:24', '2023-03-15 19:58:24'),
(215, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-15 20:03:49', '2023-03-15 20:03:49'),
(216, 'Cedric Mckee', 'LoggedIn', 158, 'App\\User', 158, 'App\\User', '[]', '2023-03-15 20:06:57', '2023-03-15 20:06:57'),
(217, 'Cedric Mckee', 'LoggedOut', 158, 'App\\User', 158, 'App\\User', '[]', '2023-03-15 20:23:18', '2023-03-15 20:23:18'),
(218, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-16 15:30:16', '2023-03-16 15:30:16'),
(219, 'Cedric Mckee', 'LoggedIn', 158, 'App\\User', 158, 'App\\User', '[]', '2023-03-16 15:32:40', '2023-03-16 15:32:40'),
(220, 'Cedric Mckee', 'LoggedOut', 158, 'App\\User', 158, 'App\\User', '[]', '2023-03-16 17:59:11', '2023-03-16 17:59:11'),
(221, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-17 11:35:35', '2023-03-17 11:35:35'),
(222, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-17 12:48:23', '2023-03-17 12:48:23'),
(223, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-17 16:48:10', '2023-03-17 16:48:10'),
(224, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-17 19:07:48', '2023-03-17 19:07:48'),
(225, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-20 11:07:32', '2023-03-20 11:07:32'),
(226, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-20 16:44:18', '2023-03-20 16:44:18'),
(227, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 12:19:35', '2023-03-21 12:19:35'),
(228, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-21 15:03:38', '2023-03-21 15:03:38'),
(229, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 16:49:28', '2023-03-21 16:49:28'),
(230, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 16:50:08', '2023-03-21 16:50:08'),
(231, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 16:55:52', '2023-03-21 16:55:52'),
(232, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 16:57:29', '2023-03-21 16:57:29'),
(233, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 17:00:05', '2023-03-21 17:00:05'),
(234, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 17:00:56', '2023-03-21 17:00:56'),
(235, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 17:04:44', '2023-03-21 17:04:44'),
(236, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 17:05:54', '2023-03-21 17:05:54'),
(237, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 17:10:04', '2023-03-21 17:10:04'),
(238, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-21 17:10:59', '2023-03-21 17:10:59'),
(239, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-21 17:40:02', '2023-03-21 17:40:02'),
(240, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-21 18:46:56', '2023-03-21 18:46:56'),
(241, 'Cairo Marks', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-21 19:23:38', '2023-03-21 19:23:38'),
(242, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-21 19:23:48', '2023-03-21 19:23:48'),
(243, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-21 19:35:59', '2023-03-21 19:35:59'),
(244, 'Coby Hernandez427', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-21 19:41:16', '2023-03-21 19:41:16'),
(245, 'Coby Hernandez427', 'LoggedIn', 128, 'App\\User', 128, 'App\\User', '[]', '2023-03-21 19:56:31', '2023-03-21 19:56:31'),
(246, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-22 12:32:37', '2023-03-22 12:32:37'),
(247, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-22 14:52:09', '2023-03-22 14:52:09'),
(248, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-22 15:52:18', '2023-03-22 15:52:18'),
(249, 'Cairo Marks', 'LoggedIn', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-22 15:52:27', '2023-03-22 15:52:27'),
(250, 'test att', 'LoggedIn', 151, 'App\\User', 151, 'App\\User', '[]', '2023-03-22 16:01:06', '2023-03-22 16:01:06'),
(251, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-22 16:01:41', '2023-03-22 16:01:41'),
(252, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2023-03-22 16:02:07', '2023-03-22 16:02:07'),
(253, 'test att', 'LoggedOut', 151, 'App\\User', 151, 'App\\User', '[]', '2023-03-22 16:31:51', '2023-03-22 16:31:51'),
(254, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2023-03-22 16:32:09', '2023-03-22 16:32:09'),
(255, 'Cairo Marks', 'LoggedOut', 129, 'App\\User', 129, 'App\\User', '[]', '2023-03-22 17:24:10', '2023-03-22 17:24:10'),
(256, 'test att', 'LoggedIn', 151, 'App\\User', 151, 'App\\User', '[]', '2023-03-22 17:24:20', '2023-03-22 17:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `allocaturs`
--

CREATE TABLE `allocaturs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_file_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_attorneys`
--

CREATE TABLE `assigned_attorneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `old_attorney_id` int(11) DEFAULT NULL,
  `new_attorney_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_cases`
--

CREATE TABLE `assigned_cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `new_attorney_id` int(11) DEFAULT NULL,
  `old_attorney_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_of_costs`
--

CREATE TABLE `bill_of_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `demo_1` text DEFAULT NULL,
  `demo_2` text DEFAULT NULL,
  `sub_total` varchar(191) DEFAULT NULL,
  `vat` varchar(191) DEFAULT NULL,
  `total` varchar(191) DEFAULT NULL,
  `bill_noti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_files`
--

CREATE TABLE `case_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_number` varchar(191) DEFAULT NULL,
  `name_of_parties` varchar(191) DEFAULT NULL,
  `instruction_attorney_id` int(10) UNSIGNED DEFAULT NULL,
  `junior_attorney_id` int(10) UNSIGNED DEFAULT NULL,
  `senior_counsel_id` int(10) UNSIGNED DEFAULT NULL,
  `king_counsel_id` int(10) UNSIGNED DEFAULT NULL,
  `retainer_agreement` varchar(191) DEFAULT NULL,
  `type_of_matter_id` int(10) UNSIGNED DEFAULT NULL,
  `case_condition` text DEFAULT NULL,
  `status` varchar(10) DEFAULT '1',
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `judge_name` varchar(255) DEFAULT NULL,
  `case_noti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_invoices`
--

CREATE TABLE `case_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `vat_number` varchar(191) DEFAULT NULL,
  `invoice_number` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `senior_counsel_fees` varchar(191) DEFAULT NULL,
  `junior_counsel_fees` varchar(191) DEFAULT NULL,
  `instructing_attorney_fees` varchar(191) DEFAULT NULL,
  `vat_value` varchar(191) DEFAULT NULL,
  `total` varchar(191) DEFAULT NULL,
  `case_file_id` int(11) DEFAULT NULL,
  `signature` longtext DEFAULT NULL,
  `invoice_noti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_junior_attorneys`
--

CREATE TABLE `case_junior_attorneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `junior_attorney_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_king_counsels`
--

CREATE TABLE `case_king_counsels` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `king_counsel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_originates`
--

CREATE TABLE `case_originates` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `originate_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_senior_counsels`
--

CREATE TABLE `case_senior_counsels` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `senior_counsel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_tags`
--

CREATE TABLE `case_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `case_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_type_of_matters`
--

CREATE TABLE `case_type_of_matters` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `type_of_matter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`) VALUES
(1, '2023-02-07 11:53:49', '2023-02-07 11:53:49', NULL, 'CMC'),
(2, '2023-02-07 11:54:19', '2023-02-07 11:54:19', NULL, 'PTR'),
(3, '2023-02-07 11:59:29', '2023-02-07 11:59:29', NULL, 'Trial Court hearing'),
(4, '2023-02-07 11:59:30', '2023-02-07 12:00:30', NULL, 'Judgment');

-- --------------------------------------------------------

--
-- Table structure for table `cheques`
--

CREATE TABLE `cheques` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_file_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_attitudes`
--

CREATE TABLE `client_attitudes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_attitudes`
--

INSERT INTO `client_attitudes` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, '2023-01-23 13:26:59', '2023-01-23 13:26:59', NULL, 'Humble and Co-operative'),
(2, '2023-01-23 13:27:12', '2023-01-23 13:27:12', NULL, 'Arrogant'),
(3, '2023-01-23 13:27:29', '2023-01-23 13:27:29', NULL, 'Aggressive'),
(4, '2023-01-23 13:27:41', '2023-01-23 13:27:41', NULL, 'Rude'),
(5, '2023-01-23 13:27:55', '2023-01-23 13:27:55', NULL, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `common_settings`
--

CREATE TABLE `common_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `dashboard_logo` varchar(191) DEFAULT NULL,
  `dashboard_logo_text` varchar(191) DEFAULT NULL,
  `footer_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_settings`
--

INSERT INTO `common_settings` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`, `favicon`, `dashboard_logo`, `dashboard_logo_text`, `footer_text`) VALUES
(1, '2022-11-02 12:45:04', '2022-12-01 17:08:58', NULL, 'LCM', 'LCM', 'AdminDashboard/maaA81ghz0MKURLCio9khSZbMAdwcFWhMMhNlJML.png', 'AdminDashboard/1CxcGxTOKRMNuOHBO0WPrtnBqD9OJU3tdv6IdlCj.png', 'AdminDashboard/IQXG3AYdjAQEuxvYnDxWgB7bmqgII07x9GwmxeLL.png', '2022 © lcm.');

-- --------------------------------------------------------

--
-- Table structure for table `court_attendants_notes`
--

CREATE TABLE `court_attendants_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_file_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `next_court_date` varchar(191) DEFAULT NULL,
  `check_in` varchar(191) DEFAULT NULL,
  `check_out` varchar(191) DEFAULT NULL,
  `next_court_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, '2023-01-23 13:19:37', '2023-01-23 13:19:37', NULL, 'Social Media'),
(2, '2023-01-23 13:19:55', '2023-01-23 13:19:55', NULL, 'Mr. Anand Ram Logan SC'),
(3, '2023-01-23 13:20:09', '2023-01-23 13:20:09', NULL, 'Friend/Family member'),
(4, '2023-01-23 13:20:26', '2023-01-23 13:20:26', NULL, 'Referred by other client (short answer with name of referred client)');

-- --------------------------------------------------------

--
-- Table structure for table `king_counsels`
--

CREATE TABLE `king_counsels` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `king_counsels`
--

INSERT INTO `king_counsels` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, '2023-01-23 19:37:42', '2023-01-23 19:37:42', NULL, 'Wyatt Hewitt'),
(2, '2023-01-23 19:37:51', '2023-01-23 19:37:51', NULL, 'Leroy Durham'),
(3, '2023-01-23 19:38:00', '2023-01-23 19:38:00', NULL, 'Preston Love'),
(4, '2023-02-01 20:33:37', '2023-02-01 20:33:37', NULL, 'Dylan Wood'),
(5, '2023-02-01 21:04:41', '2023-02-01 21:04:41', NULL, 'Kermit Strickland');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_file_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_193651_create_roles_permissions_tables', 1),
(4, '2018_06_15_045804_create_profiles_table', 1),
(5, '2018_06_15_092930_create_social_accounts_table', 1),
(6, '2018_06_16_054705_create_activity_log_table', 1),
(7, '2020_03_20_050141_create_failed_jobs_table', 1),
(8, '2021_10_26_005405_create_common_settings_table', 1),
(10, '2023_01_23_170056_create_payment_methods_table', 3),
(11, '2023_01_23_181750_create_firms_table', 4),
(12, '2023_01_23_182558_create_client_attitudes_table', 5),
(14, '2023_01_24_003520_create_senior_counsels_table', 7),
(15, '2023_01_24_003605_create_king_counsels_table', 8),
(16, '2023_01_24_004310_create_type_of_matters_table', 9),
(17, '2023_01_24_174042_create_case_files_table', 10),
(19, '2023_01_24_182921_create_case_tags_table', 11),
(20, '2023_01_30_223858_create_originates_table', 12),
(21, '2023_01_30_223958_create_case_originates_table', 13),
(22, '2023_02_03_195950_create_originating_processeds_table', 14),
(23, '2023_02_07_164957_create_categories_table', 15),
(24, '2023_02_07_170840_create_court_attendants_notes_table', 16),
(25, '2023_02_14_233419_create_case_invoices_table', 17),
(26, '2023_02_16_201656_create_bill_of_costs_table', 18),
(27, '2023_02_22_215715_create_accountings_table', 19),
(28, '2023_02_23_214258_create_expertises_table', 20),
(29, '2023_02_27_222759_create_case_type_of_matters_table', 21),
(30, '2023_02_27_222850_create_case_senior_counsels_table', 22),
(31, '2023_02_27_222949_create_case_king_counsels_table', 23),
(32, '2023_02_28_015913_create_case_junior_attorneys_table', 24),
(33, '2023_03_17_214916_create_orders_table', 25),
(34, '2023_03_17_224001_create_letters_table', 26),
(36, '2023_03_18_000835_create_cheques_table', 27),
(37, '2023_03_18_002757_create_allocaturs_table', 28),
(38, '2023_03_22_195510_create_assigned_attorneys_table', 29),
(39, '2023_03_22_221702_create_assigned_cases_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `case_file_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `originates`
--

CREATE TABLE `originates` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `originates`
--

INSERT INTO `originates` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, '2023-01-30 17:41:50', '2023-01-30 17:41:50', NULL, 'Originating Process 01'),
(2, '2023-01-30 17:41:54', '2023-01-30 17:41:54', NULL, 'Originating Process 02'),
(3, '2023-01-30 17:41:57', '2023-01-30 17:41:57', NULL, 'Originating Process 03');

-- --------------------------------------------------------

--
-- Table structure for table `originating_processeds`
--

CREATE TABLE `originating_processeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `originate_id` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `form_id` varchar(191) DEFAULT NULL,
  `attorney_fees` text DEFAULT NULL,
  `dibursements` text DEFAULT NULL,
  `description_workdone` text DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wejiru@mailinator.com', '$2y$10$g7r8oOiEmDq5vxhYOCCYnOaU7TkHsiaY7IatALrN52o1IXzjA6jte', '2023-03-16 15:31:35'),
('test.attorney@yopmail.com', '$2y$10$TANrKIi3LCqax/gARyT9Be9gDxl3Y8AQDMQLuLqY5D.f9lcfXP7Km', '2023-03-22 15:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `description`, `status`) VALUES
(1, '2023-01-23 12:06:15', '2023-01-23 12:06:15', NULL, 'Stripe', 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.', '1'),
(2, '2023-02-01 17:12:00', '2023-02-01 17:12:00', NULL, 'Paypal', 'Curabitur aliquet quam id dui posuere blandit. Sed porttitor lectus nibh.', '1'),
(3, '2023-02-01 21:04:05', '2023-02-01 21:04:05', NULL, 'Go Way', 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `label` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'All Permission', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(2, 'add-commonsetting', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(3, 'edit-commonsetting', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(4, 'view-commonsetting', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(5, 'delete-commonsetting', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(6, 'add-attorneyassociate', NULL, '2023-01-20 00:54:23', '2023-01-20 00:54:23'),
(7, 'edit-attorneyassociate', NULL, '2023-01-20 00:54:23', '2023-01-20 00:54:23'),
(8, 'view-attorneyassociate', NULL, '2023-01-20 00:54:23', '2023-01-20 00:54:23'),
(9, 'delete-attorneyassociate', NULL, '2023-01-20 00:54:23', '2023-01-20 00:54:23'),
(10, 'add-paymentmethod', NULL, '2023-01-23 12:00:57', '2023-01-23 12:00:57'),
(11, 'edit-paymentmethod', NULL, '2023-01-23 12:00:57', '2023-01-23 12:00:57'),
(12, 'view-paymentmethod', NULL, '2023-01-23 12:00:57', '2023-01-23 12:00:57'),
(13, 'delete-paymentmethod', NULL, '2023-01-23 12:00:57', '2023-01-23 12:00:57'),
(14, 'add-firm', NULL, '2023-01-23 13:17:50', '2023-01-23 13:17:50'),
(15, 'edit-firm', NULL, '2023-01-23 13:17:50', '2023-01-23 13:17:50'),
(16, 'view-firm', NULL, '2023-01-23 13:17:50', '2023-01-23 13:17:50'),
(17, 'delete-firm', NULL, '2023-01-23 13:17:50', '2023-01-23 13:17:50'),
(18, 'add-clientattitude', NULL, '2023-01-23 13:25:58', '2023-01-23 13:25:58'),
(19, 'edit-clientattitude', NULL, '2023-01-23 13:25:58', '2023-01-23 13:25:58'),
(20, 'view-clientattitude', NULL, '2023-01-23 13:25:58', '2023-01-23 13:25:58'),
(21, 'delete-clientattitude', NULL, '2023-01-23 13:25:58', '2023-01-23 13:25:58'),
(22, 'add-client', NULL, '2023-01-23 13:52:12', '2023-01-23 13:52:12'),
(23, 'edit-client', NULL, '2023-01-23 13:52:12', '2023-01-23 13:52:12'),
(24, 'view-client', NULL, '2023-01-23 13:52:12', '2023-01-23 13:52:12'),
(25, 'delete-client', NULL, '2023-01-23 13:52:12', '2023-01-23 13:52:12'),
(26, 'add-seniorcounsel', NULL, '2023-01-23 19:35:20', '2023-01-23 19:35:20'),
(27, 'edit-seniorcounsel', NULL, '2023-01-23 19:35:20', '2023-01-23 19:35:20'),
(28, 'view-seniorcounsel', NULL, '2023-01-23 19:35:20', '2023-01-23 19:35:20'),
(29, 'delete-seniorcounsel', NULL, '2023-01-23 19:35:20', '2023-01-23 19:35:20'),
(30, 'add-kingcounsel', NULL, '2023-01-23 19:36:06', '2023-01-23 19:36:06'),
(31, 'edit-kingcounsel', NULL, '2023-01-23 19:36:06', '2023-01-23 19:36:06'),
(32, 'view-kingcounsel', NULL, '2023-01-23 19:36:06', '2023-01-23 19:36:06'),
(33, 'delete-kingcounsel', NULL, '2023-01-23 19:36:06', '2023-01-23 19:36:06'),
(34, 'add-typeofmatter', NULL, '2023-01-23 19:43:11', '2023-01-23 19:43:11'),
(35, 'edit-typeofmatter', NULL, '2023-01-23 19:43:11', '2023-01-23 19:43:11'),
(36, 'view-typeofmatter', NULL, '2023-01-23 19:43:11', '2023-01-23 19:43:11'),
(37, 'delete-typeofmatter', NULL, '2023-01-23 19:43:11', '2023-01-23 19:43:11'),
(38, 'add-casefile', NULL, '2023-01-24 12:40:43', '2023-01-24 12:40:43'),
(39, 'edit-casefile', NULL, '2023-01-24 12:40:43', '2023-01-24 12:40:43'),
(40, 'view-casefile', NULL, '2023-01-24 12:40:43', '2023-01-24 12:40:43'),
(41, 'delete-casefile', NULL, '2023-01-24 12:40:43', '2023-01-24 12:40:43'),
(46, 'add-casetag', NULL, '2023-01-24 13:29:21', '2023-01-24 13:29:21'),
(47, 'edit-casetag', NULL, '2023-01-24 13:29:21', '2023-01-24 13:29:21'),
(48, 'view-casetag', NULL, '2023-01-24 13:29:21', '2023-01-24 13:29:21'),
(49, 'delete-casetag', NULL, '2023-01-24 13:29:21', '2023-01-24 13:29:21'),
(50, 'add-originate', NULL, '2023-01-30 17:38:58', '2023-01-30 17:38:58'),
(51, 'edit-originate', NULL, '2023-01-30 17:38:58', '2023-01-30 17:38:58'),
(52, 'view-originate', NULL, '2023-01-30 17:38:58', '2023-01-30 17:38:58'),
(53, 'delete-originate', NULL, '2023-01-30 17:38:58', '2023-01-30 17:38:58'),
(54, 'add-caseoriginate', NULL, '2023-01-30 17:39:58', '2023-01-30 17:39:58'),
(55, 'edit-caseoriginate', NULL, '2023-01-30 17:39:58', '2023-01-30 17:39:58'),
(56, 'view-caseoriginate', NULL, '2023-01-30 17:39:58', '2023-01-30 17:39:58'),
(57, 'delete-caseoriginate', NULL, '2023-01-30 17:39:58', '2023-01-30 17:39:58'),
(58, 'add-originatingprocessed', NULL, '2023-02-03 14:59:50', '2023-02-03 14:59:50'),
(59, 'edit-originatingprocessed', NULL, '2023-02-03 14:59:50', '2023-02-03 14:59:50'),
(60, 'view-originatingprocessed', NULL, '2023-02-03 14:59:50', '2023-02-03 14:59:50'),
(61, 'delete-originatingprocessed', NULL, '2023-02-03 14:59:50', '2023-02-03 14:59:50'),
(62, 'add-category', NULL, '2023-02-07 11:49:58', '2023-02-07 11:49:58'),
(63, 'edit-category', NULL, '2023-02-07 11:49:58', '2023-02-07 11:49:58'),
(64, 'view-category', NULL, '2023-02-07 11:49:58', '2023-02-07 11:49:58'),
(65, 'delete-category', NULL, '2023-02-07 11:49:58', '2023-02-07 11:49:58'),
(66, 'add-courtattendantsnote', NULL, '2023-02-07 12:08:41', '2023-02-07 12:08:41'),
(67, 'edit-courtattendantsnote', NULL, '2023-02-07 12:08:41', '2023-02-07 12:08:41'),
(68, 'view-courtattendantsnote', NULL, '2023-02-07 12:08:41', '2023-02-07 12:08:41'),
(69, 'delete-courtattendantsnote', NULL, '2023-02-07 12:08:41', '2023-02-07 12:08:41'),
(70, 'add-caseinvoice', NULL, '2023-02-14 18:34:19', '2023-02-14 18:34:19'),
(71, 'edit-caseinvoice', NULL, '2023-02-14 18:34:19', '2023-02-14 18:34:19'),
(72, 'view-caseinvoice', NULL, '2023-02-14 18:34:19', '2023-02-14 18:34:19'),
(73, 'delete-caseinvoice', NULL, '2023-02-14 18:34:19', '2023-02-14 18:34:19'),
(74, 'add-billofcost', NULL, '2023-02-16 15:16:56', '2023-02-16 15:16:56'),
(75, 'edit-billofcost', NULL, '2023-02-16 15:16:56', '2023-02-16 15:16:56'),
(76, 'view-billofcost', NULL, '2023-02-16 15:16:56', '2023-02-16 15:16:56'),
(77, 'delete-billofcost', NULL, '2023-02-16 15:16:56', '2023-02-16 15:16:56'),
(78, 'add-accounting', NULL, '2023-02-23 03:57:15', '2023-02-23 03:57:15'),
(79, 'edit-accounting', NULL, '2023-02-23 03:57:15', '2023-02-23 03:57:15'),
(80, 'view-accounting', NULL, '2023-02-23 03:57:15', '2023-02-23 03:57:15'),
(81, 'delete-accounting', NULL, '2023-02-23 03:57:15', '2023-02-23 03:57:15'),
(82, 'add-expertise', NULL, '2023-02-24 03:42:58', '2023-02-24 03:42:58'),
(83, 'edit-expertise', NULL, '2023-02-24 03:42:58', '2023-02-24 03:42:58'),
(84, 'view-expertise', NULL, '2023-02-24 03:42:58', '2023-02-24 03:42:58'),
(85, 'delete-expertise', NULL, '2023-02-24 03:42:58', '2023-02-24 03:42:58'),
(86, 'add-casetypeofmatter', NULL, '2023-02-28 04:27:59', '2023-02-28 04:27:59'),
(87, 'edit-casetypeofmatter', NULL, '2023-02-28 04:27:59', '2023-02-28 04:27:59'),
(88, 'view-casetypeofmatter', NULL, '2023-02-28 04:27:59', '2023-02-28 04:27:59'),
(89, 'delete-casetypeofmatter', NULL, '2023-02-28 04:27:59', '2023-02-28 04:27:59'),
(90, 'add-caseseniorcounsel', NULL, '2023-02-28 04:28:50', '2023-02-28 04:28:50'),
(91, 'edit-caseseniorcounsel', NULL, '2023-02-28 04:28:50', '2023-02-28 04:28:50'),
(92, 'view-caseseniorcounsel', NULL, '2023-02-28 04:28:50', '2023-02-28 04:28:50'),
(93, 'delete-caseseniorcounsel', NULL, '2023-02-28 04:28:50', '2023-02-28 04:28:50'),
(94, 'add-casekingcounsel', NULL, '2023-02-28 04:29:49', '2023-02-28 04:29:49'),
(95, 'edit-casekingcounsel', NULL, '2023-02-28 04:29:49', '2023-02-28 04:29:49'),
(96, 'view-casekingcounsel', NULL, '2023-02-28 04:29:49', '2023-02-28 04:29:49'),
(97, 'delete-casekingcounsel', NULL, '2023-02-28 04:29:49', '2023-02-28 04:29:49'),
(98, 'add-casejuniorattorney', NULL, '2023-02-28 07:59:13', '2023-02-28 07:59:13'),
(99, 'edit-casejuniorattorney', NULL, '2023-02-28 07:59:13', '2023-02-28 07:59:13'),
(100, 'view-casejuniorattorney', NULL, '2023-02-28 07:59:13', '2023-02-28 07:59:13'),
(101, 'delete-casejuniorattorney', NULL, '2023-02-28 07:59:13', '2023-02-28 07:59:13'),
(102, 'add-order', NULL, '2023-03-17 16:49:16', '2023-03-17 16:49:16'),
(103, 'edit-order', NULL, '2023-03-17 16:49:16', '2023-03-17 16:49:16'),
(104, 'view-order', NULL, '2023-03-17 16:49:16', '2023-03-17 16:49:16'),
(105, 'delete-order', NULL, '2023-03-17 16:49:16', '2023-03-17 16:49:16'),
(106, 'add-letter', NULL, '2023-03-17 17:40:01', '2023-03-17 17:40:01'),
(107, 'edit-letter', NULL, '2023-03-17 17:40:01', '2023-03-17 17:40:01'),
(108, 'view-letter', NULL, '2023-03-17 17:40:01', '2023-03-17 17:40:01'),
(109, 'delete-letter', NULL, '2023-03-17 17:40:01', '2023-03-17 17:40:01'),
(114, 'add-cheque', NULL, '2023-03-17 19:08:35', '2023-03-17 19:08:35'),
(115, 'edit-cheque', NULL, '2023-03-17 19:08:35', '2023-03-17 19:08:35'),
(116, 'view-cheque', NULL, '2023-03-17 19:08:35', '2023-03-17 19:08:35'),
(117, 'delete-cheque', NULL, '2023-03-17 19:08:35', '2023-03-17 19:08:35'),
(118, 'add-allocatur', NULL, '2023-03-17 19:27:58', '2023-03-17 19:27:58'),
(119, 'edit-allocatur', NULL, '2023-03-17 19:27:58', '2023-03-17 19:27:58'),
(120, 'view-allocatur', NULL, '2023-03-17 19:27:58', '2023-03-17 19:27:58'),
(121, 'delete-allocatur', NULL, '2023-03-17 19:27:58', '2023-03-17 19:27:58'),
(122, 'add-assignedattorney', NULL, '2023-03-22 14:55:11', '2023-03-22 14:55:11'),
(123, 'edit-assignedattorney', NULL, '2023-03-22 14:55:11', '2023-03-22 14:55:11'),
(124, 'view-assignedattorney', NULL, '2023-03-22 14:55:11', '2023-03-22 14:55:11'),
(125, 'delete-assignedattorney', NULL, '2023-03-22 14:55:11', '2023-03-22 14:55:11'),
(126, 'add-assignedcase', NULL, '2023-03-22 17:17:02', '2023-03-22 17:17:02'),
(127, 'edit-assignedcase', NULL, '2023-03-22 17:17:02', '2023-03-22 17:17:02'),
(128, 'view-assignedcase', NULL, '2023-03-22 17:17:02', '2023-03-22 17:17:02'),
(129, 'delete-assignedcase', NULL, '2023-03-22 17:17:02', '2023-03-22 17:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(3, 1),
(4, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(22, 2),
(22, 5),
(23, 1),
(23, 2),
(23, 5),
(24, 1),
(24, 2),
(24, 3),
(24, 5),
(25, 1),
(25, 5),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(61, 2),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(66, 3),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(70, 2),
(70, 5),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(72, 5),
(73, 1),
(73, 2),
(73, 5),
(74, 1),
(74, 2),
(74, 5),
(75, 1),
(76, 1),
(76, 2),
(76, 5),
(77, 1),
(77, 2),
(77, 5),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(102, 2),
(102, 5),
(103, 1),
(104, 1),
(105, 1),
(105, 2),
(105, 5),
(106, 1),
(106, 2),
(106, 5),
(107, 1),
(108, 1),
(109, 1),
(109, 2),
(109, 5),
(114, 1),
(114, 2),
(114, 5),
(115, 1),
(116, 1),
(117, 1),
(117, 2),
(117, 5),
(118, 1),
(118, 2),
(118, 5),
(119, 1),
(120, 1),
(121, 1),
(121, 2),
(121, 5),
(122, 1),
(122, 2),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(126, 2),
(127, 1),
(128, 1),
(129, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `postal` varchar(191) DEFAULT NULL,
  `next_of_kin` varchar(191) DEFAULT NULL,
  `salary` varchar(191) DEFAULT NULL,
  `marital_status` varchar(191) DEFAULT NULL,
  `id_number` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `condition` text DEFAULT NULL,
  `firm_description` text DEFAULT NULL,
  `client_attitude_description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `bio`, `gender`, `dob`, `pic`, `country`, `state`, `city`, `address`, `postal`, `next_of_kin`, `salary`, `marital_status`, `id_number`, `created_at`, `condition`, `firm_description`, `client_attitude_description`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-02 12:45:03', NULL, NULL, NULL, '2022-11-02 12:45:03'),
(2, 2, 'Quibusdam ipsa et n', 'male', '2009-12-25', 'vHjpW5Ch0W.jpg', 'Omnis consequatur C', 'Inventore dolorem in', 'Ex mollitia necessit', 'Sint nihil eu consec', '16495', NULL, NULL, NULL, NULL, '2022-11-02 12:45:04', NULL, NULL, NULL, '2023-03-13 13:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `label` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(2, 'user', NULL, '2022-11-02 12:45:04', '2022-11-02 12:45:04'),
(3, 'attorney', NULL, '2023-01-19 14:58:37', '2023-01-19 14:58:37'),
(4, 'associate', NULL, '2023-01-19 14:58:53', '2023-01-19 14:58:53'),
(5, 'secretary', NULL, '2023-01-19 15:00:02', '2023-01-19 15:00:02'),
(6, 'client', NULL, '2023-01-23 12:34:28', '2023-01-23 12:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `senior_counsels`
--

CREATE TABLE `senior_counsels` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `senior_counsels`
--

INSERT INTO `senior_counsels` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, '2023-01-23 19:37:07', '2023-01-23 19:37:07', NULL, 'Rylee Harrington'),
(2, '2023-01-23 19:37:18', '2023-01-23 19:37:18', NULL, 'Hedy Kent'),
(3, '2023-01-23 19:37:28', '2023-01-23 19:37:28', NULL, 'Nolan Keller'),
(4, '2023-02-01 21:04:22', '2023-02-01 21:04:22', NULL, 'Fatima Hester');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) NOT NULL,
  `provider` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_of_matters`
--

CREATE TABLE `type_of_matters` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_of_matters`
--

INSERT INTO `type_of_matters` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, '2023-01-23 19:44:49', '2023-01-23 19:44:49', NULL, 'Criminal Cases'),
(2, '2023-01-23 19:45:18', '2023-01-23 19:45:18', NULL, 'Civil Cases'),
(3, '2023-01-23 19:45:47', '2023-01-23 19:45:47', NULL, 'Family Cases'),
(4, '2023-02-01 20:34:01', '2023-02-01 20:34:01', NULL, 'Jena Ortega'),
(5, '2023-02-01 21:04:58', '2023-02-01 21:04:58', NULL, 'Palmer Holmes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `bar_number` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `resume` varchar(191) DEFAULT NULL,
  `certificate` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `provider_id` varchar(191) DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `attorney_associate_id` int(10) UNSIGNED DEFAULT NULL,
  `firm_id` int(10) UNSIGNED DEFAULT NULL,
  `client_attitude_id` int(10) UNSIGNED DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1-active,2-banned',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `noti_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `bar_number`, `contact`, `resume`, `certificate`, `password`, `provider_id`, `payment_method_id`, `attorney_associate_id`, `firm_id`, `client_attitude_id`, `provider`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `signature`, `noti_status`) VALUES
(1, 'Admin', 'admin@developer.com', NULL, NULL, NULL, NULL, '$2y$10$bZJpnWSPSeh8fQ0lEJuq5ecPDCTCtC.N6uuIjADC4PkJh28TEpRVm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'sk5TU0BHZpBf8aAYNinLRuFjPzOcPE8AureHchptErqYYHXGyWUBIHJs593d', '2022-11-02 12:45:03', '2022-11-02 12:45:03', NULL, NULL, NULL),
(2, 'User', 'lcm@yopmail.com', NULL, '+123 456 789', NULL, NULL, '$2y$10$y5SHP.L3pye.D3J5/kV4juclDGRpczWOKZOIHtzg/EDfQ15H6qTwO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'VOzcfkwQNfjWFH6tYqHpxhnvOS20wbQu47S9bCHqnE0zpb7qn1VqBrMshNfC', '2022-11-02 12:45:03', '2023-03-09 05:31:22', NULL, 'data:image/png;base64,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BCZOwIJezgNwR0l/knSIpNvN6BYR3BBvhNwr8XLmzT0xARMwgSIIWNCHm4abSNpB0m7heNlNJV0ldOd3ks5KVuGIuIsJmIAJmIAJzCVgQc/zcFxN0rUl7SJpJ0mXl0R+8WZBuFmJc1bcAV/yzI1bMQETMIEqCFjQ+5lGVtvbStpO0lYh2UmzJczmf5R0oqRPSzpD0k/66Y5rNQETMAETqJ2ABb2bGb6spLtJ2lXSw+dU+VNJx0k6Lwj4aZJ+0U3zrsUETMAETGDqBCzo6z0BmM0fI2mPZP87rfFdkk4JAn7mek35bhMwARMwAROYT8CCvvzTwTGym0vaTxKm9bTEPXBW3ycvX7XvMAETMAETMIHVCFjQ23G7QTCp30bSQxq3sBfOcbLDvQfeDqavMgETMAET6J6ABX1zphwnw6HtFpLuErKWzSLPavy54WhZ9zPjGk3ABEzABExgCQJTF/R9JF03eKLjtLaXpGa2shQne+InBY/0Ly/B2ZeagAmYgAmYQK8EpiToB0q6sqQd55wBn7cK5/dvkPQhm9R7fRZduQmYgAmYwBoEahV09rxvucExshTbDySdI+mrkj4ffr7lY2VrPFm+1QRMwARMICuBmgQdU/nOIZTq7nMoItgkNiGQCybz74eobQ6tmvWxc2MmYAImYAJdE6hB0ImFvmc4C75lAxACTvQ1TOYfl/S9rgG6PhMwARMwARMogcCYBf3xkh4siaNkaWG1/Q5JrysBsPtgAiZgAiZgAjkIjFXQHybpzTOE3MfIcjw1bsMETMAETKA4AmMVdEKunh4ykhHQ5f2SHFq1uMfLHTIBEzABE8hFYKyCDh9Skv4oFyi3YwImYAImYAIlExizoJfM1X0zARMwARMwgawELOhZcbsxEzABEzABE+iHgAW9H66u1QRMwARMwASyErCgZ8XtxkzABEzABEygHwIW9H64ulYTMAETMAETyErAgp4VtxszARMwARMwgX4IWND74epaTcAETMAETCArAQt6VtxuzARMwARMwAT6IWBB74erazUBEzABEzCBrAQs6FlxuzETMAETMAET6IeABb0frq7VBEzABEzABLISsKBnxe3GTMAETMAETKAfAhb0fri6VhMwARMwARPISsCCnhW3GzMBEzABEzCBfghY0Pvh6lpNwARMwARMICsBC3pW3G7MBEzABEzABPohYEHvh6trNQETMAETMIGsBCzoWXG7MRMwARMwARPoh4AFvR+urtUETMAETMAEshKwoGfF7cZMwARMwARMoB8CFvR+uLpWEzABEzABE8hKwIKeFbcbMwETMAETMIF+CFjQ++HqWk3ABEzABEwgKwELelbcbswETMAETMAE+iFgQe+Hq2s1ARMwARMwgawELOhZcbsxEzABEzABE+iHgAW9H66u1QRMwARMwASyErCgZ8XtxkzABEzABEygHwIW9H64ulYTMAETMAETyErAgp4VtxszARMwARMwgX4IWND74epaTcAETMAETCArgf8Hkvm8FNfVSw4AAAAASUVORK5CYII=', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountings`
--
ALTER TABLE `accountings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `allocaturs`
--
ALTER TABLE `allocaturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_attorneys`
--
ALTER TABLE `assigned_attorneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_cases`
--
ALTER TABLE `assigned_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_of_costs`
--
ALTER TABLE `bill_of_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_files`
--
ALTER TABLE `case_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_of_matter_id` (`type_of_matter_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `king_counsel_id` (`king_counsel_id`),
  ADD KEY `senior_counsel_id` (`senior_counsel_id`),
  ADD KEY `junior_attorney_id` (`junior_attorney_id`),
  ADD KEY `instruction_attorney_id` (`instruction_attorney_id`);

--
-- Indexes for table `case_invoices`
--
ALTER TABLE `case_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_junior_attorneys`
--
ALTER TABLE `case_junior_attorneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_king_counsels`
--
ALTER TABLE `case_king_counsels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_originates`
--
ALTER TABLE `case_originates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `originate_id` (`originate_id`);

--
-- Indexes for table `case_senior_counsels`
--
ALTER TABLE `case_senior_counsels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_tags`
--
ALTER TABLE `case_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `case_type_of_matters`
--
ALTER TABLE `case_type_of_matters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_attitudes`
--
ALTER TABLE `client_attitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_settings`
--
ALTER TABLE `common_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_attendants_notes`
--
ALTER TABLE `court_attendants_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `king_counsels`
--
ALTER TABLE `king_counsels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `originates`
--
ALTER TABLE `originates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `originating_processeds`
--
ALTER TABLE `originating_processeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `senior_counsels`
--
ALTER TABLE `senior_counsels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_matters`
--
ALTER TABLE `type_of_matters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `payment_method_id` (`payment_method_id`),
  ADD KEY `client_attitude_id` (`client_attitude_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountings`
--
ALTER TABLE `accountings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `allocaturs`
--
ALTER TABLE `allocaturs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigned_attorneys`
--
ALTER TABLE `assigned_attorneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigned_cases`
--
ALTER TABLE `assigned_cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_of_costs`
--
ALTER TABLE `bill_of_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_files`
--
ALTER TABLE `case_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_invoices`
--
ALTER TABLE `case_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_junior_attorneys`
--
ALTER TABLE `case_junior_attorneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_king_counsels`
--
ALTER TABLE `case_king_counsels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_originates`
--
ALTER TABLE `case_originates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_senior_counsels`
--
ALTER TABLE `case_senior_counsels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_tags`
--
ALTER TABLE `case_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_type_of_matters`
--
ALTER TABLE `case_type_of_matters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_attitudes`
--
ALTER TABLE `client_attitudes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `common_settings`
--
ALTER TABLE `common_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `court_attendants_notes`
--
ALTER TABLE `court_attendants_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `king_counsels`
--
ALTER TABLE `king_counsels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `originates`
--
ALTER TABLE `originates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `originating_processeds`
--
ALTER TABLE `originating_processeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `senior_counsels`
--
ALTER TABLE `senior_counsels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_of_matters`
--
ALTER TABLE `type_of_matters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_files`
--
ALTER TABLE `case_files`
  ADD CONSTRAINT `case_files_ibfk_1` FOREIGN KEY (`type_of_matter_id`) REFERENCES `type_of_matters` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `case_files_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `case_files_ibfk_3` FOREIGN KEY (`king_counsel_id`) REFERENCES `king_counsels` (`id`),
  ADD CONSTRAINT `case_files_ibfk_4` FOREIGN KEY (`senior_counsel_id`) REFERENCES `senior_counsels` (`id`),
  ADD CONSTRAINT `case_files_ibfk_5` FOREIGN KEY (`junior_attorney_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `case_files_ibfk_6` FOREIGN KEY (`instruction_attorney_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `case_originates`
--
ALTER TABLE `case_originates`
  ADD CONSTRAINT `case_originates_ibfk_1` FOREIGN KEY (`originate_id`) REFERENCES `originates` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `case_tags`
--
ALTER TABLE `case_tags`
  ADD CONSTRAINT `case_tags_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `case_files` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`client_attitude_id`) REFERENCES `client_attitudes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
