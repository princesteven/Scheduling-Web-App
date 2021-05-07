-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 02:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'student', NULL, NULL),
(2, 'academician', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `change_request`
--

CREATE TABLE `change_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_requests`
--

CREATE TABLE `change_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proposed_schedule_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, '4', 'Bachelor of Computer Engineering', 'COE', NULL, '2019-07-11 17:11:21'),
(2, '3', 'Diploma in Mechanical Engineering', 'MEE', NULL, '2019-07-11 17:11:04'),
(3, '4', 'Bachelor in Science of Computer Science', 'BscCS', NULL, NULL),
(4, '5', 'Medicine', 'ME', NULL, '2019-04-05 05:52:11'),
(5, '4', 'Bachelor in Economics', 'BE', NULL, '2019-04-05 05:52:47'),
(6, '6', 'Bachelor of Business Administration', 'BBA', NULL, NULL),
(7, '5', 'Bachelor in Electrical Engineering', 'BEE', NULL, NULL),
(8, '1', 'Bachelor in Architecture', 'BA', NULL, NULL),
(9, '2', 'Diploma Civil Engineering', 'BCE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', NULL, NULL),
(2, 'Tuesday', NULL, NULL),
(3, 'Wednesday', NULL, NULL),
(4, 'Thursday', NULL, NULL),
(5, 'Friday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, '5', 'Architecture', 'SPDT', NULL, NULL),
(2, '5', 'Civil', 'ETE', NULL, NULL),
(3, '2', 'Meschanical', 'ETE', NULL, NULL),
(4, '1', 'Computer', 'ICT', NULL, NULL),
(5, '5', 'Electrical', 'ETE', NULL, NULL),
(6, '7', 'SBM', 'BM', NULL, '2019-07-11 17:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(171, '2014_10_12_000000_create_users_table', 1),
(172, '2014_10_12_100000_create_password_resets_table', 1),
(173, '2019_03_10_083321_create_categories_table', 1),
(174, '2019_03_10_083335_create_courses_table', 1),
(175, '2019_03_10_083344_create_venues_table', 1),
(176, '2019_03_10_083356_create_wings_table', 1),
(177, '2019_03_10_083411_create_study_levels_table', 1),
(178, '2019_03_10_083426_create_departments_table', 1),
(179, '2019_03_10_083437_create_days_table', 1),
(180, '2019_03_10_083449_create_study_years_table', 1),
(181, '2019_03_10_083500_create_semesters_table', 1),
(182, '2019_03_10_083510_create_times_table', 1),
(183, '2019_03_10_083520_create_ranks_table', 1),
(184, '2019_03_10_083533_create_subjects_table', 1),
(185, '2019_03_10_083542_create_units_table', 1),
(186, '2019_03_10_083612_create_year_semesters_table', 1),
(187, '2019_03_10_083629_create_schedules_table', 1),
(188, '2019_03_29_084143_remove_status_from_study_years_table', 2),
(189, '2019_03_29_084249_add_status_in_year_semesters_table', 2),
(190, '2019_03_29_084348_remove_day_id_from_schedules_table', 2),
(191, '2019_03_29_084433_change_capacity_to_integer', 2),
(192, '2019_04_30_113036_add_course_id_column_to_schedules_table', 3),
(193, '2019_06_19_121831_create_change_requests_table', 4),
(194, '2019_06_19_121832_add_status_column_to_schedules_table', 5),
(195, '2019_07_06_192106_create_change_request', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tutor', NULL, NULL),
(2, 'Ass. Lecture I', NULL, NULL),
(3, 'Ass. Lecture II', NULL, NULL),
(4, 'Professor', NULL, NULL),
(5, 'Doctor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_semester_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_level_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `venue_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_id`, `user_id`, `subject_id`, `course_id`, `year_semester_id`, `study_level_id`, `venue_id`, `department_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '1', '4', '1', '3', '1', '1', NULL, '2019-03-21 13:06:15', '2019-04-30 11:52:55'),
(2, '17', '8', '1', '4', '1', '3', '3', '1', NULL, '2019-03-21 13:06:15', '2019-03-21 13:06:15'),
(3, '8', '10', '4', '4', '1', '1', '2', '1', NULL, '2019-03-21 13:06:15', '2019-03-21 13:06:15'),
(4, '4', '4', '4', '4', '1', '2', '1', '1', NULL, '2019-03-21 13:06:15', '2019-03-21 13:06:15'),
(5, '5', '4', '4', '4', '1', '2', '1', '1', NULL, '2019-03-21 13:06:15', '2019-03-21 13:06:15'),
(7, '7', '2', '6', '3', '1', '2', '1', '4', NULL, '2019-03-21 13:06:15', '2019-03-21 13:06:15'),
(9, '2', '2', '2', '3', '1', '2', '1', '4', NULL, '2019-03-21 13:06:15', '2019-03-21 13:06:15'),
(14, '6', '2', '2', '3', '1', '2', '1', '4', NULL, '2019-03-21 13:06:16', '2019-03-21 13:06:16'),
(31, '12', '2', '6', '3', '1', '2', '1', '4', NULL, '2019-03-21 13:20:52', '2019-03-21 13:20:52'),
(34, '13', '2', '6', '3', '1', '2', '1', '4', NULL, '2019-03-21 13:20:52', '2019-03-21 13:20:52'),
(35, '9', '2', '2', '3', '1', '2', '2', '4', NULL, '2019-04-08 05:42:41', '2019-04-08 05:42:41'),
(36, '32', '10', '6', '3', '1', '2', '5', '4', NULL, '2019-04-10 10:53:22', '2019-04-10 10:53:22'),
(40, '8', '11', '3', '4', '1', '3', '4', '5', NULL, '2019-04-30 08:59:30', '2019-04-30 08:59:30'),
(42, '26', '11', '7', '4', '1', '3', '4', '4', NULL, '2019-04-30 08:59:30', '2019-05-23 05:57:44'),
(43, '40', '7', '1', '4', '1', '3', '4', '5', NULL, '2019-04-30 09:00:57', '2019-04-30 09:00:57'),
(44, '13', '6', '3', '4', '1', '3', '5', '5', NULL, '2019-04-30 09:02:18', '2019-04-30 09:02:18'),
(47, '21', '6', '3', '4', '1', '3', '5', '5', NULL, '2019-04-30 09:02:18', '2019-04-30 09:02:18'),
(49, '37', '6', '3', '4', '1', '3', '5', '5', NULL, '2019-04-30 09:02:19', '2019-04-30 09:02:19'),
(50, '37', '2', '2', '3', '1', '2', '1', '4', NULL, '2019-04-30 09:15:15', '2019-04-30 09:15:15'),
(51, '15', '11', '7', '4', '1', '3', '1', '4', NULL, '2019-05-23 05:59:38', '2019-05-23 05:59:38'),
(66, '10', '2', '6', '3', '1', '2', '2', '4', NULL, '2019-07-09 14:22:32', '2019-07-09 17:15:17'),
(71, '29', '2', '2', '3', '1', '2', '6', '4', NULL, '2019-07-10 06:32:40', '2019-07-10 06:34:56'),
(72, '8', '2', '6', '3', '1', '2', '1', '4', NULL, '2019-07-10 06:48:38', '2019-07-10 06:48:38'),
(74, '23', '2', '6', '3', '1', '2', '1', '4', NULL, '2019-07-10 06:49:18', '2019-07-10 06:49:18'),
(77, '1', '6', '34', '5', '1', '1', '18', '4', NULL, '2019-07-12 18:05:55', '2019-07-12 18:05:55'),
(79, '34', '6', '34', '5', '1', '1', '18', '4', NULL, '2019-07-12 18:05:55', '2019-07-12 18:05:55'),
(80, '5', '10', '35', '5', '1', '1', '20', '4', NULL, '2019-07-12 18:07:13', '2019-07-12 18:07:13'),
(81, '24', '10', '35', '5', '1', '1', '20', '4', NULL, '2019-07-12 18:07:13', '2019-07-12 18:07:13'),
(82, '22', '11', '36', '5', '1', '1', '35', '4', NULL, '2019-07-12 18:07:52', '2019-07-12 18:07:52'),
(83, '40', '11', '36', '5', '1', '1', '35', '4', NULL, '2019-07-12 18:07:52', '2019-07-12 18:07:52'),
(84, '20', '5', '37', '5', '1', '1', '29', '4', NULL, '2019-07-12 18:08:28', '2019-07-12 18:08:28'),
(85, '10', '5', '37', '5', '1', '1', '29', '4', NULL, '2019-07-12 18:08:28', '2019-07-12 18:08:28'),
(86, '19', '5', '37', '5', '1', '1', '29', '4', NULL, '2019-07-12 18:08:28', '2019-07-12 18:08:28'),
(87, '33', '10', '38', '5', '1', '1', '12', '4', NULL, '2019-07-12 18:08:59', '2019-07-12 18:08:59'),
(88, '11', '10', '38', '5', '1', '1', '12', '4', NULL, '2019-07-12 18:08:59', '2019-07-12 18:08:59'),
(89, '37', '10', '38', '5', '1', '1', '12', '4', NULL, '2019-07-12 18:08:59', '2019-07-12 18:08:59'),
(90, '38', '4', '39', '6', '1', '3', '35', '6', NULL, '2019-07-12 18:11:35', '2019-07-12 18:11:35'),
(91, '26', '4', '39', '6', '1', '3', '35', '6', NULL, '2019-07-12 18:11:35', '2019-07-12 18:11:35'),
(92, '1', '5', '40', '6', '1', '3', '32', '6', NULL, '2019-07-12 18:12:06', '2019-07-12 18:12:06'),
(93, '35', '5', '40', '6', '1', '3', '32', '6', NULL, '2019-07-12 18:12:06', '2019-07-12 18:12:06'),
(94, '11', '6', '41', '6', '1', '3', '18', '6', NULL, '2019-07-12 18:12:31', '2019-07-12 18:12:31'),
(95, '19', '6', '41', '6', '1', '3', '18', '6', NULL, '2019-07-12 18:12:31', '2019-07-12 18:12:31'),
(96, '24', '7', '42', '6', '1', '3', '3', '6', NULL, '2019-07-12 18:12:55', '2019-07-12 18:12:55'),
(97, '18', '7', '42', '6', '1', '3', '3', '6', NULL, '2019-07-12 18:12:55', '2019-07-12 18:12:55'),
(98, '22', '8', '43', '6', '1', '3', '8', '6', NULL, '2019-07-12 18:13:32', '2019-07-12 18:13:32'),
(99, '10', '8', '43', '6', '1', '3', '8', '6', NULL, '2019-07-12 18:13:33', '2019-07-12 18:13:33'),
(100, '33', '8', '43', '6', '1', '3', '8', '6', NULL, '2019-07-12 18:13:33', '2019-07-12 18:13:33'),
(101, '17', '10', '44', '6', '1', '3', '5', '6', NULL, '2019-07-12 18:14:09', '2019-07-12 18:14:09'),
(102, '16', '10', '44', '6', '1', '3', '5', '6', NULL, '2019-07-12 18:14:09', '2019-07-12 18:14:09'),
(103, '5', '11', '45', '6', '1', '3', '10', '6', NULL, '2019-07-12 18:14:41', '2019-07-12 18:14:41'),
(104, '6', '11', '45', '6', '1', '3', '10', '6', NULL, '2019-07-12 18:14:41', '2019-07-12 18:14:41'),
(105, '4', '11', '45', '6', '1', '3', '10', '6', NULL, '2019-07-12 18:14:41', '2019-07-12 18:14:41'),
(106, '26', '2', '30', '7', '1', '7', '10', '5', NULL, '2019-07-12 18:17:08', '2019-07-12 18:17:08'),
(107, '25', '2', '30', '7', '1', '7', '10', '5', NULL, '2019-07-12 18:17:08', '2019-07-12 18:17:08'),
(108, '15', '4', '31', '7', '1', '7', '6', '5', NULL, '2019-07-12 18:17:30', '2019-07-12 18:17:30'),
(109, '16', '4', '31', '7', '1', '7', '6', '5', NULL, '2019-07-12 18:17:30', '2019-07-12 18:17:30'),
(110, '29', '6', '32', '7', '1', '7', '2', '5', NULL, '2019-07-12 18:17:54', '2019-07-12 18:17:54'),
(111, '30', '6', '32', '7', '1', '7', '2', '5', NULL, '2019-07-12 18:17:54', '2019-07-12 18:17:54'),
(112, '1', '8', '33', '7', '1', '7', '29', '5', NULL, '2019-07-12 18:18:30', '2019-07-12 18:18:30'),
(113, '2', '8', '33', '7', '1', '7', '29', '5', NULL, '2019-07-12 18:18:30', '2019-07-12 18:18:30'),
(114, '34', '2', '21', '2', '1', '6', '27', '3', NULL, '2019-07-12 18:20:43', '2019-07-12 18:20:43'),
(115, '33', '2', '21', '2', '1', '6', '27', '3', NULL, '2019-07-12 18:20:43', '2019-07-12 18:20:43'),
(116, '27', '2', '22', '2', '1', '6', '13', '3', NULL, '2019-07-12 18:22:00', '2019-07-12 18:22:00'),
(117, '28', '2', '22', '2', '1', '6', '13', '3', NULL, '2019-07-12 18:22:00', '2019-07-12 18:22:00'),
(118, '1', '4', '23', '2', '1', '6', '2', '3', NULL, '2019-07-12 18:22:50', '2019-07-12 18:22:50'),
(119, '2', '4', '23', '2', '1', '6', '2', '3', NULL, '2019-07-12 18:22:50', '2019-07-12 18:22:50'),
(120, '15', '5', '24', '2', '1', '6', '10', '3', NULL, '2019-07-12 18:23:09', '2019-07-12 18:23:09'),
(121, '16', '5', '24', '2', '1', '6', '10', '3', NULL, '2019-07-12 18:23:09', '2019-07-12 18:23:09'),
(122, '35', '6', '25', '2', '1', '6', '15', '3', NULL, '2019-07-12 18:23:37', '2019-07-12 18:23:37'),
(123, '40', '6', '25', '2', '1', '6', '15', '3', NULL, '2019-07-12 18:23:37', '2019-07-12 18:23:37'),
(124, '29', '7', '26', '2', '1', '6', '3', '3', NULL, '2019-07-12 18:24:00', '2019-07-12 18:24:00'),
(125, '30', '7', '26', '2', '1', '6', '3', '3', NULL, '2019-07-12 18:24:00', '2019-07-12 18:24:00'),
(126, '3', '8', '27', '2', '1', '6', '18', '3', NULL, '2019-07-12 18:24:26', '2019-07-12 18:24:26'),
(127, '4', '8', '27', '2', '1', '6', '18', '3', NULL, '2019-07-12 18:24:26', '2019-07-12 18:24:26'),
(128, '9', '10', '28', '2', '1', '6', '16', '3', NULL, '2019-07-12 18:24:53', '2019-07-12 18:24:53'),
(129, '10', '10', '28', '2', '1', '6', '16', '3', NULL, '2019-07-12 18:24:53', '2019-07-12 18:24:53'),
(130, '23', '11', '29', '2', '1', '6', '11', '3', NULL, '2019-07-12 18:25:19', '2019-07-12 18:25:19'),
(131, '24', '11', '29', '2', '1', '6', '11', '3', NULL, '2019-07-12 18:25:19', '2019-07-12 18:25:19'),
(132, '3', '2', '14', '9', '1', '5', '11', '2', NULL, '2019-07-12 18:27:02', '2019-07-12 18:27:02'),
(133, '4', '2', '14', '9', '1', '5', '11', '2', NULL, '2019-07-12 18:27:02', '2019-07-12 18:27:02'),
(134, '29', '4', '15', '9', '1', '5', '14', '2', NULL, '2019-07-12 18:27:39', '2019-07-12 18:27:39'),
(135, '30', '4', '15', '9', '1', '5', '14', '2', NULL, '2019-07-12 18:27:39', '2019-07-12 18:27:39'),
(136, '23', '5', '16', '9', '1', '5', '16', '2', NULL, '2019-07-12 18:28:22', '2019-07-12 18:28:22'),
(137, '24', '5', '16', '9', '1', '5', '16', '2', NULL, '2019-07-12 18:28:22', '2019-07-12 18:28:22'),
(138, '22', '5', '16', '9', '1', '5', '16', '2', NULL, '2019-07-12 18:28:22', '2019-07-12 18:28:22'),
(139, '15', '6', '17', '9', '1', '5', '31', '2', NULL, '2019-07-12 18:28:47', '2019-07-12 18:28:47'),
(140, '16', '6', '17', '9', '1', '5', '31', '2', NULL, '2019-07-12 18:28:47', '2019-07-12 18:28:47'),
(141, '1', '7', '18', '9', '1', '5', '26', '2', NULL, '2019-07-12 18:29:08', '2019-07-12 18:29:08'),
(142, '2', '7', '18', '9', '1', '5', '26', '2', NULL, '2019-07-12 18:29:08', '2019-07-12 18:29:08'),
(143, '8', '8', '19', '9', '1', '5', '18', '2', NULL, '2019-07-12 18:29:44', '2019-07-12 18:29:44'),
(144, '9', '8', '19', '9', '1', '5', '18', '2', NULL, '2019-07-12 18:29:45', '2019-07-12 18:29:45'),
(145, '18', '10', '20', '9', '1', '5', '8', '2', NULL, '2019-07-12 18:30:12', '2019-07-12 18:30:12'),
(146, '19', '10', '20', '9', '1', '5', '8', '2', NULL, '2019-07-12 18:30:12', '2019-07-12 18:30:12'),
(147, '20', '10', '20', '9', '1', '5', '8', '2', NULL, '2019-07-12 18:30:12', '2019-07-12 18:30:12'),
(148, '1', '11', '9', '8', '1', '4', '17', '1', NULL, '2019-07-12 18:31:11', '2019-07-12 18:31:11'),
(149, '2', '11', '9', '8', '1', '4', '17', '1', NULL, '2019-07-12 18:31:11', '2019-07-12 18:31:11'),
(150, '3', '11', '9', '8', '1', '4', '17', '1', NULL, '2019-07-12 18:31:11', '2019-07-12 18:31:11'),
(151, '8', '6', '10', '8', '1', '4', '17', '1', NULL, '2019-07-12 18:31:38', '2019-07-12 18:31:38'),
(152, '9', '6', '10', '8', '1', '4', '17', '1', NULL, '2019-07-12 18:31:38', '2019-07-12 18:31:38'),
(153, '10', '6', '10', '8', '1', '4', '17', '1', NULL, '2019-07-12 18:31:38', '2019-07-12 18:31:38'),
(154, '16', '7', '11', '8', '1', '4', '11', '1', NULL, '2019-07-12 18:32:25', '2019-07-12 18:32:25'),
(155, '17', '7', '11', '8', '1', '4', '11', '1', NULL, '2019-07-12 18:32:25', '2019-07-12 18:32:25'),
(156, '22', '4', '12', '8', '1', '4', '4', '1', NULL, '2019-07-12 18:33:13', '2019-07-12 18:33:13'),
(157, '23', '4', '12', '8', '1', '4', '4', '1', NULL, '2019-07-12 18:33:14', '2019-07-12 18:33:14'),
(158, '24', '4', '12', '8', '1', '4', '4', '1', NULL, '2019-07-12 18:33:14', '2019-07-12 18:33:14'),
(159, '30', '2', '13', '8', '1', '4', '4', '1', NULL, '2019-07-12 18:34:54', '2019-07-12 18:34:54'),
(160, '31', '2', '13', '8', '1', '4', '4', '1', NULL, '2019-07-12 18:34:54', '2019-07-12 18:34:54'),
(161, '32', '2', '13', '8', '1', '4', '4', '1', NULL, '2019-07-12 18:34:54', '2019-07-12 18:34:54'),
(162, '18', '11', '9', '8', '1', '4', '13', '1', NULL, '2019-07-15 09:22:58', '2019-07-15 09:22:58'),
(163, '15', '2', '6', '3', '1', '2', '18', '4', NULL, '2019-07-16 17:03:12', '2019-07-17 12:25:10'),
(164, '40', '2', '2', '3', '1', '2', '19', '4', NULL, '2019-07-17 12:00:54', '2019-07-17 12:00:54'),
(165, '38', '2', '6', '3', '1', '2', '19', '4', NULL, '2019-07-17 12:20:05', '2019-07-17 12:20:05'),
(170, '22', '2', '2', '3', '1', '2', '17', '4', NULL, '2019-07-19 19:39:28', '2019-07-19 19:39:28'),
(171, '16', '2', '2', '3', '1', '2', '17', '4', NULL, '2019-07-19 19:39:28', '2019-07-19 19:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'I', NULL, NULL),
(2, 'II', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `study_levels`
--

CREATE TABLE `study_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `study_levels`
--

INSERT INTO `study_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NTA 4', NULL, NULL),
(2, 'NTA 5', NULL, NULL),
(3, 'NTA 6', NULL, NULL),
(4, 'UQF 6', NULL, NULL),
(5, 'UQF 7A', NULL, NULL),
(6, 'UQF 7B', NULL, NULL),
(7, 'UQF 8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `study_years`
--

CREATE TABLE `study_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `study_years`
--

INSERT INTO `study_years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, '2018/2019', NULL, '2019-03-21 06:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `semester_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_level_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `unit_id`, `semester_id`, `study_level_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, '4', '3', '1', '3', 'Calculus', '7', NULL, '2019-07-12 10:18:21'),
(2, '3', '1', '1', '2', 'Programming in C', '1', NULL, NULL),
(3, '4', '3', '1', '3', 'Differential Equations', '6', NULL, NULL),
(4, '3', '1', '1', '4', 'Java', '4', NULL, NULL),
(5, '1', '2', '1', '4', 'Python', '2', NULL, NULL),
(6, '3', '2', '1', '2', 'PHP', '3', NULL, NULL),
(7, '3', '3', '1', '3', 'Networking', '5', NULL, NULL),
(8, '1', '1', '2', '6', 'Object Oriented Programming', '10', '2019-07-12 10:24:37', '2019-07-12 10:24:37'),
(9, '8', '3', '1', '4', 'Architecture Module 1', 'ACM 1', NULL, NULL),
(10, '8', '1', '1', '4', 'Architecture Module 2', 'ACM 2', NULL, NULL),
(11, '8', '3', '1', '4', 'Architecture Module 3', 'ACM 3', NULL, NULL),
(12, '8', '3', '1', '4', 'Architecture Module 4', 'ACM 4', NULL, NULL),
(13, '8', '2', '1', '4', 'Architecture Module 5', 'ACM 5', NULL, NULL),
(14, '9', '3', '1', '5', 'Civil Engineering Module 1', 'DCE 1', NULL, NULL),
(15, '9', '3', '1', '5', 'Civil Engineering 2', 'DCE 2', NULL, NULL),
(16, '9', '2', '1', '5', 'Civil Engineering 3', 'DCE 3', NULL, NULL),
(17, '9', '1', '1', '5', 'Civil Engineering 4', 'DCE 4', NULL, NULL),
(18, '9', '1', '1', '5', 'Civil Engineering 5', 'DCE 5', NULL, NULL),
(19, '9', '2', '1', '5', 'Civil Engineering 6', 'DCE 6', NULL, NULL),
(20, '9', '3', '1', '5', 'Civil Engineering 7', 'DCE 7', NULL, NULL),
(21, '2', '1', '1', '6', 'Mechanical Module 1', 'EMM 1', NULL, NULL),
(22, '2', '2', '1', '6', 'Mechanical Module 2', 'EMM 2', NULL, NULL),
(23, '2', '3', '1', '6', 'Mechanical Module 3', 'EMM 3', NULL, NULL),
(24, '2', '1', '1', '6', 'Mechanical Module 4', 'EMM 4', NULL, NULL),
(25, '2', '2', '1', '6', 'Mechanical Module 5', 'EMM 5', NULL, NULL),
(26, '2', '3', '1', '6', 'Mechanical Module 6', 'EMM 6', NULL, NULL),
(27, '2', '1', '1', '6', 'Mechanical Module 7', 'EMM 7', NULL, NULL),
(28, '2', '2', '1', '6', 'Mechanical Module 8', 'EMM 8', NULL, NULL),
(29, '2', '3', '1', '6', 'Mechanical Module 9', 'EMM 9', NULL, NULL),
(30, '7', '1', '1', '7', 'Electrical Module 1', 'ECM 1', NULL, NULL),
(31, '7', '2', '1', '7', 'Electrical Module 2', 'ECM 2', NULL, NULL),
(32, '7', '3', '1', '7', 'Electrical Module 3', 'ECM 3', NULL, NULL),
(33, '7', '1', '1', '7', 'Electrical Module 4', 'ECM 4', NULL, '0000-00-00 00:00:00'),
(34, '5', '3', '1', '1', 'Economics Module 1', 'ECM 1', NULL, NULL),
(35, '5', '1', '1', '1', 'Economics Module 2', 'ECM 2', NULL, NULL),
(36, '5', '3', '1', '1', 'Economics Module 3', 'ECM 3', NULL, NULL),
(37, '5', '3', '1', '1', 'Economics Module 4', 'ECM 4', NULL, NULL),
(38, '5', '2', '1', '1', 'Economics Module 5', 'ECM 5', NULL, NULL),
(39, '6', '3', '1', '3', 'Business Module 1', 'BBA 1', NULL, NULL),
(40, '6', '3', '1', '3', 'Business Module 2', 'BBA 2', NULL, NULL),
(41, '6', '2', '1', '3', 'Business Module  3', 'BBA 3', NULL, NULL),
(42, '6', '1', '1', '3', 'Business Module 4', 'BBA 4', NULL, NULL),
(43, '6', '1', '1', '3', 'Business Module 5', 'BBA 5', NULL, NULL),
(44, '6', '2', '1', '3', 'Business Module 6', 'BBA 6', NULL, NULL),
(45, '6', '3', '1', '3', 'Business Module 7', 'BBA 7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `start_time`, `end_time`, `days`, `created_at`, `updated_at`) VALUES
(1, '07:30', '08:15', 'Monday', NULL, NULL),
(2, '08:15', '09:00', 'Monday', NULL, NULL),
(3, '09:00', '09:45', 'Monday', NULL, NULL),
(4, '09:55', '10:40', 'Monday', NULL, NULL),
(5, '10:40', '11:25', 'Monday', NULL, NULL),
(6, '11:25', '12:10', 'Monday', NULL, NULL),
(7, '13:25', '14:10', 'Monday', NULL, NULL),
(8, '07:30', '08:15', 'Tuesday', NULL, NULL),
(9, '08:15', '09:00', 'Tuesday', NULL, NULL),
(10, '09:00', '09:45', 'Tuesday', NULL, NULL),
(11, '09:55', '10:40', 'Tuesday', NULL, NULL),
(12, '10:40', '11:25', 'Tuesday', NULL, NULL),
(13, '11:25', '12:10', 'Tuesday', NULL, NULL),
(14, '13:25', '14:10', 'Tuesday', NULL, NULL),
(15, '07:30', '08:15', 'Wednesday', NULL, NULL),
(16, '08:15', '09:00', 'Wednesday', NULL, NULL),
(17, '09:00', '09:45', 'Wednesday', NULL, NULL),
(18, '09:55', '10:40', 'Wednesday', NULL, NULL),
(19, '10:40', '11:25', 'Wednesday', NULL, NULL),
(20, '11:25', '12:10', 'Wednesday', NULL, NULL),
(21, '13:25', '14:10', 'Wednesday', NULL, NULL),
(22, '07:30', '08:15', 'Thursday', NULL, NULL),
(23, '08:15', '09:00', 'Thursday', NULL, NULL),
(24, '09:00', '09:45', 'Thursday', NULL, NULL),
(25, '09:55', '10:40', 'Thursday', NULL, NULL),
(26, '10:40', '11:25', 'Thursday', NULL, NULL),
(27, '11:25', '12:10', 'Thursday', NULL, NULL),
(28, '13:25', '14:10', 'Thursday', NULL, NULL),
(29, '07:30', '08:15', 'Friday', NULL, NULL),
(30, '08:15', '09:00', 'Friday', NULL, NULL),
(31, '09:00', '09:45', 'Friday', NULL, NULL),
(32, '09:55', '10:40', 'Friday', NULL, NULL),
(33, '10:40', '11:25', 'Friday', NULL, NULL),
(34, '11:25', '12:10', 'Friday', NULL, NULL),
(35, '13:25', '14:10', 'Friday', NULL, NULL),
(36, '14:10', '14:55', 'Monday', '2019-04-03 08:31:35', '2019-04-03 08:41:34'),
(37, '14:10', '14:55', 'Tuesday', '2019-04-03 08:31:35', '2019-04-03 08:41:34'),
(38, '14:10', '14:55', 'Wednesday', '2019-04-03 08:31:36', '2019-04-03 08:41:34'),
(39, '14:10', '14:55', 'Thursday', '2019-04-03 08:31:36', '2019-04-03 08:41:34'),
(40, '14:10', '14:55', 'Friday', '2019-04-03 08:31:36', '2019-04-03 08:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `periods_per_week` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `periods_per_week`, `created_at`, `updated_at`) VALUES
(1, '12', '5', NULL, NULL),
(2, '9', '4', NULL, NULL),
(3, '6', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_level_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dpt_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rank_id`, `study_level_id`, `dpt_id`, `category_id`, `course_id`, `regno`, `name`, `email`, `mobile`, `gender`, `email_verified_at`, `password`, `privilage`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '5', '2', '4', '1', '3', 'B31611040', 'Prince E Steven', 'stephenprince19@gmail.com', '0746423983', 'Male', '2019-03-15 07:28:26', '$2y$10$wDJdCSrS/lsS73pHevrOyuwhtu.6AdbZ9JBYK.8xj2fvoUM/RGiVa', 'student', 'UcSOucYNSaoa4FaZCY8sduubQ4Mh36rPda3MRKulnrU0TJL3VCAbaU3SSI73', NULL, '2019-04-05 10:35:54'),
(2, '4', NULL, '4', '2', '4', '45', 'Jessika Stokes MD', 'stamm.holden@example.org', '5831907423', 'Female', '2019-03-15 07:28:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'faculty', 'exaPKqbvtkRZMqVeWVpuhTXuMyR2CIokx7nZ2VeGjvaUEE2zOhKOHx5R2bMs', NULL, NULL),
(3, '5', '1', '2', '1', '1', '2720557650593324', 'Mr. Carleton Kohler DVM', 'franecki.beaulah@example.net', '7423', 'Female', '2019-03-15 07:28:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'Q8gyG6nPbS', NULL, NULL),
(4, '2', '4', '2', '2', '4', '4024007147702442', 'Kellie Fisher', 'griffin80@example.com', '77532499423', 'Female', '2019-03-15 07:28:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hod', '7lfUU7syOg', NULL, NULL),
(5, '4', '6', '4', '2', '3', '4024007190806777', 'Lesley Goyette I', 'drau@example.net', '0423', 'Female', '2019-03-15 07:28:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hod', 'Qy5HN0BHcH', NULL, NULL),
(6, '4', NULL, '2', '2', '4', '5480229508286872', 'Prof. Georgianna Hane', 'jessy.batz@example.org', '2070423', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'faculty', 'OwbWgoLGMI', NULL, NULL),
(7, '4', '7', '3', '2', '3', '4485788914226663', 'Glenna Strosin', 'egoldner@example.org', '318618423', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hod', 'qFMQcUAy1X', NULL, NULL),
(8, '4', '3', '4', '2', '1', '40', 'Viviane Botsford DVM', 'kieran.kessler@example.com', '8423', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'timetable', 'VkTDLjprp4xrFxBrFW7V6kR6pL7MVmFdnCjmjc5CPcRMhXibiqwsKnzGPDoU', NULL, NULL),
(10, '5', '2', '1', '2', '2', '379267051114187', 'John Doe', 'romaguera.stan@example.net', '447699423', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'faculty', 'EseSc9sjQ8', NULL, NULL),
(11, '1', '4', '1', '2', '3', '4716569992925', 'Ms. Annette Klocko V', 'orlo10@example.org', '444234', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hod', 'R3LK7CLfi4', NULL, '2019-03-15 10:06:49'),
(12, '3', '4', '1', '1', '8', '1', 'Deogratius Kasunga', 'pcrona@example.net', '0712166021', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'D3eOJIRdxSFC0nb9VlCkzpBveOGE0sMbZJqWxPri1ULvdyZnOvf5Pk31YaUs', NULL, NULL),
(13, '3', '1', '4', '1', '5', '2', 'Beatrrice Mihambo', 'andre.hilpert@example.org', '0758182821', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'hLHdNEnA9sB3DNg9XkFD0UBWnellCYBUQdMWetw2nB6DSA3pi7ncaeSJ4wXi', NULL, NULL),
(14, '4', '5', '4', '2', '3', '4141202907628675', 'Ms. Kallie Schmidt', 'lhoeger@example.com', '86423', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'P85F7mkpGl', NULL, NULL),
(15, '2', '6', '3', '1', '2', '3', 'Baraka Mtisi 1', 'lharvey@example.net', '0657818543', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'wvQux930B81uuncBoQLXPtWqaZBazeZbVMPAj4XUhQkSxDosHqqpW5M9G41J', NULL, NULL),
(16, '1', '7', '5', '1', '7', '4', 'Baraka Mtisi 2', 'tbecker@example.com', '0758498209', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'T5GrQe6MvbLcXMGCxcmdgWdoHKO2dwUGFPiTGfCMUseVOPCr1qiGB7JSPp7O', NULL, NULL),
(17, '2', '5', '2', '1', '9', '5', 'Deogratius Kasunga 2', 'liam89@example.com', '0759861551', 'Female', '2019-03-15 07:28:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'RZDP1G2OQ6tsEIMlUQnt9M65knH6rKq5GjrvSgVw9zrLW2DXS6v2v6V48lkZ', NULL, NULL),
(18, '3', '4', '4', '2', '2', '4556786122830171', 'Arch Wintheiser MD', 'shields.anibal@example.com', '761703423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'X3RgkPKGFc', NULL, NULL),
(19, '1', '1', '1', '2', '3', '372239437445608', 'Prof. Garrett Keeling', 'jett.gislason@example.com', '864658423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'eLHLvlRCNW', NULL, NULL),
(20, '3', '6', '1', '2', '4', '2678182414143696', 'Mr. Oswald Hauck', 'jlynch@example.org', '944423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '4C2TJu82Wv', NULL, NULL),
(21, '5', '3', '6', '1', '6', '6', 'Mathias Zollo', 'zachariah49@example.com', '0743613249', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'amOF2HCakcMQojQxz45R16A2wZO9XjsswC19GGMwLtaJs2LXILanH7GCiwEY', NULL, NULL),
(22, '4', '1', '2', '2', '1', '5592414848379943', 'Camylle Jenkins', 'kaleigh02@example.org', '251636228423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'VjnHAvp7jL', NULL, NULL),
(23, '3', '4', '1', '1', '3', '371747213330746', 'Clark Graham', 'erdman.dagmar@example.net', '6955423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '7hR44pqeE8', NULL, NULL),
(24, '2', '3', '2', '2', '4', '5230006051892519', 'Melisa Schulist', 'carmelo41@example.com', '25184423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'kAHgbJFuo2', NULL, NULL),
(25, '4', '2', '3', '1', '2', '6011532585838879', 'Barrett Brakus', 'mercedes.breitenberg@example.com', '335202423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'PwX3ae0Qg4', NULL, NULL),
(26, '5', '6', '4', '1', '1', '2470116585871057', 'Mr. Lennie Lueilwitz DDS', 'monahan.haleigh@example.org', '524908392423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'A77G8puR6g', NULL, NULL),
(27, '2', '3', '2', '1', '2', '4719436769867441', 'Ms. Nicolette Conroy', 'gutmann.rod@example.org', '122041423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'SstZAHDRse', NULL, NULL),
(28, '4', '1', '2', '1', '4', '4916400806582869', 'Mrs. Brionna Runte MD', 'ezekiel.heidenreich@example.com', '948423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'VkY2VE8XIk', NULL, NULL),
(29, '5', '1', '3', '2', '3', '5292319615762077', 'Dr. Arnold Yost', 'trevor.carter@example.net', '907671423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'fg3LixGf7H', NULL, NULL),
(30, '5', '4', '1', '2', '3', '5458820673649122', 'Sonya Mann', 'bdamore@example.net', '24100777423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'zaBif6YIpd', NULL, NULL),
(31, '4', '7', '2', '1', '4', '5361102327748931', 'Mr. Jasen Osinski', 'karlie99@example.org', '6662423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'oijv73ONbW', NULL, NULL),
(32, '5', '5', '4', '2', '2', '6011295753149509', 'Randi Ernser', 'kub.lempi@example.org', '440090837423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'MujixbwhXl', NULL, NULL),
(33, '4', '7', '2', '2', '4', '4929174144846311', 'Kirk Jaskolski', 'gerlach.dan@example.com', '651423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'Jhpw3CjM1V', NULL, NULL),
(34, '2', '3', '4', '1', '2', '4024007186874284', 'Dr. Alexzander Turcotte', 'dariana.zulauf@example.org', '3919423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'NzBQTwCaLD', NULL, NULL),
(35, '3', '4', '2', '2', '1', '5517741118672298', 'Jarrod King', 'karen.christiansen@example.com', '98423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'A0VkhqJKf5', NULL, NULL),
(36, '5', '5', '3', '1', '3', '5554701688443649', 'Isaac Carter', 'oborer@example.net', '58423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'RxujhAjoNs', NULL, NULL),
(37, '3', '5', '4', '2', '1', '5537141419180537', 'Quentin Schumm DVM', 'shana.mcdermott@example.com', '6508423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'XRsUqefGmZ', NULL, NULL),
(38, '4', '5', '3', '2', '2', '2591998211378886', 'Casper Yost', 'tstiedemann@example.com', '6691724423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'yGjHP6RZ2f', NULL, NULL),
(39, '1', '6', '3', '2', '3', '4532079813374959', 'Ms. Taryn Carter', 'georgiana21@example.com', '7527106423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'QnROpfV3mA', NULL, NULL),
(40, '5', '2', '3', '2', '3', '5489876474887462', 'Eulah Greenfelder PhD', 'hand.adeline@example.com', '434769947423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'SEfiTUUPEV', NULL, NULL),
(41, '5', '1', '3', '2', '2', '4916938562039947', 'Abner Reynolds DVM', 'kennith.rohan@example.net', '204855086423', 'Female', '2019-03-15 07:28:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'bSQUXEEZwf', NULL, NULL),
(42, '1', '7', '1', '1', '3', '4556933838614', 'Brycen Spinka Jr.', 'jessyca.hamill@example.com', '4977217423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'jjZIuzncGX', NULL, NULL),
(43, '4', '3', '4', '2', '3', '375112424078814', 'Ines Medhurst', 'yfadel@example.net', '5890895423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'm6gv7dzXRt', NULL, NULL),
(44, '1', '1', '2', '1', '1', '4674232895118772', 'Prof. Marianne Kassulke DVM', 'blangosh@example.com', '54024423423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'F3g8Ulr9KY', NULL, NULL),
(45, '1', '2', '2', '1', '4', '340087418255705', 'Aubree Goodwin', 'judge50@example.net', '39055423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '5y6riQPWr9', NULL, NULL),
(46, '4', '7', '4', '1', '2', '2429207200277903', 'Dr. Presley Buckridge V', 'kim.casper@example.net', '5910104423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'X0yzqtjpCT', NULL, NULL),
(47, '1', '3', '1', '2', '4', '346332094798949', 'Prof. Payton Wiegand IV', 'abigayle.lockman@example.org', '48149423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '47D0hFkYSZ', NULL, NULL),
(48, '1', '4', '1', '1', '1', '379212414172985', 'Consuelo Daniel', 'markus.block@example.net', '203143631423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'alrTpsUCPe', NULL, NULL),
(49, '5', '1', '1', '1', '2', '5379428029685182', 'Dr. Annie Wehner Jr.', 'garry.collins@example.com', '305422248423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'u1sJwrMByn', NULL, NULL),
(50, '5', '3', '4', '1', '1', '4716803424068140', 'Aliyah O\'Reilly', 'kuphal.saul@example.com', '9423', 'Female', '2019-03-15 07:28:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 'VkmvIVKiyi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wing_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `wing_id`, `name`, `capacity`, `created_at`, `updated_at`) VALUES
(1, '1', 'A 103', 110, NULL, NULL),
(2, '1', 'A 104', 70, NULL, NULL),
(3, '1', 'A 107', 30, NULL, NULL),
(4, '1', 'A 108', 40, NULL, NULL),
(5, '1', 'A 002 HV', 40, NULL, NULL),
(6, '2', 'C 004', 50, NULL, NULL),
(7, '2', 'C 006', 70, NULL, NULL),
(8, '2', 'C 007', 50, NULL, NULL),
(9, '2', 'C 009', 110, NULL, NULL),
(10, '2', 'C 103', 60, NULL, NULL),
(11, '2', 'C 109', 70, NULL, NULL),
(12, '2', 'C 110', 110, NULL, NULL),
(13, '3', 'D 002', 40, NULL, NULL),
(14, '3', 'D 005', 110, NULL, NULL),
(15, '3', 'D 006', 110, NULL, NULL),
(16, '3', 'D 010', 40, NULL, NULL),
(17, '3', 'D 109', 70, NULL, NULL),
(18, '3', 'D 110', 70, NULL, NULL),
(19, '3', 'D 102', 60, NULL, NULL),
(20, '4', 'THEATRE TH 01', 100, NULL, NULL),
(21, '4', 'THEATRE TH 02', 100, NULL, NULL),
(22, '5', 'BASEMENT H 01', 200, NULL, NULL),
(23, '5', 'SPORTS HALL H 02', 350, NULL, NULL),
(24, '5', 'NYERERE HALL H 04', 80, NULL, NULL),
(25, '5', 'DH H 03', 150, NULL, NULL),
(26, '6', 'COMPUTER CLB 01', 50, NULL, NULL),
(27, '6', 'COMPUTER CLB 02', 50, NULL, NULL),
(28, '6', 'COMPUTER CLB 03', 40, NULL, NULL),
(29, '7', 'PHYSICS PLB 1', 69, NULL, NULL),
(30, '7', 'CHEMISTRY CLB 2', 70, NULL, NULL),
(31, '7', 'BIOLOGY BLB 3', 70, NULL, NULL),
(32, '7', 'FOOD FLB 4', 70, NULL, NULL),
(33, '8', 'COSTE CLR 01', 120, NULL, NULL),
(34, '8', 'COSTE CLR 02', 120, NULL, NULL),
(35, '8', 'COSTE CLR 03', 120, NULL, '2019-07-16 16:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `wings`
--

CREATE TABLE `wings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wings`
--

INSERT INTO `wings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electrical Wing-East', NULL, NULL),
(2, 'Meachanical Wing-South', NULL, NULL),
(3, 'Civil/Arch Wing-West', NULL, NULL),
(4, 'Theatres-North', NULL, NULL),
(5, 'Central Hall', NULL, NULL),
(6, 'Computer Laboratory', NULL, NULL),
(7, 'Science Laboratory', NULL, NULL),
(8, 'COSTE Wing-East', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `year_semesters`
--

CREATE TABLE `year_semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `study_year_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `semester_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `year_semesters`
--

INSERT INTO `year_semesters` (`id`, `study_year_id`, `semester_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_request`
--
ALTER TABLE `change_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_requests`
--
ALTER TABLE `change_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_levels`
--
ALTER TABLE `study_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_years`
--
ALTER TABLE `study_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_regno_unique` (`regno`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wings`
--
ALTER TABLE `wings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_semesters`
--
ALTER TABLE `year_semesters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `change_request`
--
ALTER TABLE `change_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_requests`
--
ALTER TABLE `change_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `study_levels`
--
ALTER TABLE `study_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `study_years`
--
ALTER TABLE `study_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wings`
--
ALTER TABLE `wings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `year_semesters`
--
ALTER TABLE `year_semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
