-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2022 at 12:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_class_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` text DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `causer_id` varchar(255) DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `properties`, `causer_id`, `causer_type`, `description`, `updated_at`, `created_at`) VALUES
(4, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-17 09:25:34', '2022-02-17 09:25:34'),
(5, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos-live/online-meeting', '2022-02-17 09:34:25', '2022-02-17 09:34:25'),
(6, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos-live/online-meeting', '2022-02-17 09:36:01', '2022-02-17 09:36:01'),
(7, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-17 09:36:26', '2022-02-17 09:36:26'),
(8, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos-live/online-meeting', '2022-02-17 09:39:44', '2022-02-17 09:39:44'),
(9, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-22 09:45:35', '2022-02-22 09:45:35'),
(10, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-22 09:45:55', '2022-02-22 09:45:55'),
(11, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-22 09:46:14', '2022-02-22 09:46:14'),
(12, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-24 10:38:39', '2022-02-24 10:38:39'),
(13, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-24 10:39:40', '2022-02-24 10:39:40'),
(14, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 04:18:30', '2022-02-25 04:18:30'),
(15, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 04:19:27', '2022-02-25 04:19:27'),
(16, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 04:26:13', '2022-02-25 04:26:13'),
(17, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/my-account', '2022-02-25 04:38:54', '2022-02-25 04:38:54'),
(18, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/my-account', '2022-02-25 04:48:07', '2022-02-25 04:48:07'),
(19, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/my-account', '2022-02-25 04:51:27', '2022-02-25 04:51:27'),
(20, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/my-account', '2022-02-25 04:52:32', '2022-02-25 04:52:32'),
(21, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/my-account', '2022-02-25 04:53:01', '2022-02-25 04:53:01'),
(22, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/my-account', '2022-02-25 05:52:24', '2022-02-25 05:52:24'),
(23, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 06:23:14', '2022-02-25 06:23:14'),
(24, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:26:06', '2022-02-25 09:26:06'),
(25, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:29:48', '2022-02-25 09:29:48'),
(26, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:36:55', '2022-02-25 09:36:55'),
(27, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:41:19', '2022-02-25 09:41:19'),
(28, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:47:07', '2022-02-25 09:47:07'),
(29, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:47:42', '2022-02-25 09:47:42'),
(30, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:55:42', '2022-02-25 09:55:42'),
(31, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos/video-cat-three/26', '2022-02-25 09:55:42', '2022-02-25 09:55:42'),
(32, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:56:05', '2022-02-25 09:56:05'),
(33, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 09:56:26', '2022-02-25 09:56:26'),
(34, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 10:02:20', '2022-02-25 10:02:20'),
(35, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-25 10:04:57', '2022-02-25 10:04:57'),
(36, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos/video-cat-one/22', '2022-02-25 10:34:41', '2022-02-25 10:34:41'),
(37, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos/video-cat-one/22', '2022-02-25 10:35:11', '2022-02-25 10:35:11'),
(38, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos/video-cat-one/22', '2022-02-25 10:35:20', '2022-02-25 10:35:20'),
(39, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos/video-cat-one/22', '2022-02-25 10:35:23', '2022-02-25 10:35:23'),
(40, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-26 05:45:05', '2022-02-26 05:45:05'),
(41, 'default', '[]', '1', 'App\\Models\\User', 'http://127.0.0.1:8000/videos', '2022-02-26 05:45:14', '2022-02-26 05:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `app_name`, `title`, `sub_title`, `app_url`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Sr Edu', NULL, NULL, 'http://192.168.29.249/', 'logo', '2022-02-04 17:39:19', '2022-02-04 17:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_cat_id` int(11) DEFAULT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_data` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `category_type`, `created_at`, `updated_at`) VALUES
(1, 'main_menu', NULL, NULL),
(4, 'dashboard_menu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interactive_online_classes`
--

CREATE TABLE `interactive_online_classes` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_by` int(11) NOT NULL,
  `additional_teachers` int(11) DEFAULT NULL,
  `alert` int(11) DEFAULT NULL,
  `class_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(61, 'App\\Models\\User', 1, '59326c8f-68b9-4607-8ef1-06b8219c8956', 'avatars', 'med64DE', '1644998635.png', 'image/png', 'public', 'public', 652479, '[]', '{\"status\":\"processing\"}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-02-16 08:03:55', '2022-02-16 08:04:32'),
(62, 'App\\Models\\User', 1, 'ff718200-f3dc-4e4c-b8a5-b968cc66b0d1', 'avatars', 'medB1D0', '1644998786.png', 'image/png', 'public', 'public', 66723, '[]', '{\"status\":\"processing\"}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 2, '2022-02-16 08:06:26', '2022-02-16 08:06:53'),
(66, 'App\\Models\\plan', 7, 'bfcd608f-95d1-4cd3-ad1e-6a20612aeed9', 'avatars', 'med636', '1645094665.png', 'image/png', 'public', 'public', 448026, '[]', '{\"status\":\"processing\"}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 4, '2022-02-17 10:44:25', '2022-02-17 10:44:31'),
(67, 'App\\Models\\videoCategory', 1, '74bea6b7-25ae-4e55-ab40-10bedab404fe', 'avatars', 'med3A6E', '1645785611.png', 'image/png', 'public', 'public', 66451, '[]', '{\"status\":\"processing\"}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 5, '2022-02-25 10:40:12', '2022-02-25 10:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_slug`, `menu_parent_id`, `link`, `menu_type`, `user_id`, `order_by`, `created_at`, `updated_at`) VALUES
(9, 'dashboard', 'dashboard', NULL, 'dashboard', 'main_menu', 1, 0, '2022-02-23 09:50:49', '2022-02-25 11:34:11'),
(10, 'portal', 'portal', NULL, 'videos', 'main_menu', 1, 0, '2022-02-23 09:51:45', '2022-02-25 11:34:18');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_02_11_114130_create_permission_tables', 1),
(3, '2022_02_12_152721_create_web_pages_table', 2),
(4, '2022_02_12_160518_create_category_types_table', 2),
(9, '2020_06_03_131044_create_temporary_files_table', 7),
(10, '2022_02_13_153310_create_media_table', 8),
(11, '2020_01_01_000001_create_plans_table', 9),
(12, '2020_01_01_000002_create_plan_features_table', 10),
(13, '2020_01_01_000003_create_plan_subscriptions_table', 11),
(14, '2020_01_01_000004_create_plan_subscription_usage_table', 12),
(15, '2022_02_15_155527_create_temp_files_table', 13),
(16, '2022_02_15_172813_create_video_libraries_table', 14),
(17, '2022_02_16_002932_create_video_categories_table', 15),
(18, '2022_02_16_204635_create_views_table', 16),
(19, '2022_02_22_154357_create_purchase_histories_table', 17),
(20, '2022_02_23_115015_create_menus_table', 18),
(21, '2022_02_24_162850_create_premium_video_categories_table', 19),
(22, '2022_02_26_095721_add_social_login_field', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 100),
(3, 'App\\Models\\User', 123),
(9, 'App\\Models\\User', 92),
(9, 'App\\Models\\User', 97),
(9, 'App\\Models\\User', 98),
(9, 'App\\Models\\User', 99),
(9, 'App\\Models\\User', 101),
(9, 'App\\Models\\User', 102),
(9, 'App\\Models\\User', 103),
(9, 'App\\Models\\User', 104),
(9, 'App\\Models\\User', 105),
(9, 'App\\Models\\User', 106),
(9, 'App\\Models\\User', 107),
(9, 'App\\Models\\User', 115),
(9, 'App\\Models\\User', 118),
(9, 'App\\Models\\User', 119),
(9, 'App\\Models\\User', 120),
(9, 'App\\Models\\User', 121),
(9, 'App\\Models\\User', 124),
(9, 'App\\Models\\User', 125),
(9, 'App\\Models\\User', 127);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_device` int(11) NOT NULL COMMENT '1=mobile_number,2=email',
  `otp_expired` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `user_id`, `otp`, `otp_type`, `otp_device`, `otp_expired`, `link`, `otp_status`, `created_at`, `updated_at`) VALUES
(80, 105, 'rowPl8vz', 'new_register', 2, '30', 'vzZUrmxfSHPymGa5nmcjkW7H8gXfQg4qMWnyCAdhs8bYmrwPR7dlw1TvEbVKqp3p5qu9oalsk0Rlv6ke1u1rLTWQg6rFqctmQp4A', 'pending', '2022-02-25 11:09:33', '2022-02-25 11:09:33'),
(84, 123, '6dCXUyeK', 'for_got_password', 2, '30', '0EsE5AeR8trZLXOyuDAUYxEhOQIoTr7aw4zPpnRxtWoCv6YSPlmJd1MPRCOpuscVgejs5IWcQ5HbM76G4x8mV1ZUTpIzt56axzQT', 'pending', '2022-02-26 10:25:10', '2022-02-26 10:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'dashboard', 'web', '2022-02-09 22:47:47', '2022-02-09 22:47:47'),
(19, 'categories', 'web', '2022-02-10 05:29:40', '2022-02-10 05:29:40'),
(20, 'edit_categories', 'web', '2022-02-10 05:30:02', '2022-02-10 05:30:02'),
(21, 'delete_categories', 'web', '2022-02-10 05:30:22', '2022-02-10 05:30:22'),
(22, 'categories_update_status', 'web', '2022-02-10 05:30:55', '2022-02-10 05:30:55'),
(23, 'online_classes', 'web', '2022-02-10 05:51:39', '2022-02-10 05:51:58'),
(24, 'create_class', 'web', '2022-02-10 05:52:23', '2022-02-10 05:52:23'),
(25, 'online_classes_edit', 'web', '2022-02-10 05:52:59', '2022-02-10 05:52:59'),
(26, 'online_classes_delete', 'web', '2022-02-10 05:53:26', '2022-02-10 05:53:26'),
(27, 'online_class_status_update', 'web', '2022-02-10 05:54:11', '2022-02-10 05:54:11'),
(28, 'users', 'web', '2022-02-10 05:54:31', '2022-02-10 05:54:31'),
(29, 'create_users', 'web', '2022-02-10 05:54:49', '2022-02-10 05:54:49'),
(30, 'update_user', 'web', '2022-02-10 05:54:59', '2022-02-10 05:54:59'),
(31, 'delete_user', 'web', '2022-02-10 05:55:11', '2022-02-10 05:55:11'),
(32, 'roles_and_permissions', 'web', '2022-02-10 05:56:06', '2022-02-10 05:56:06'),
(33, 'create_roles', 'web', '2022-02-10 05:56:37', '2022-02-11 17:06:25'),
(34, 'permissions', 'web', '2022-02-10 05:56:53', '2022-02-10 05:56:53'),
(35, 'edit_permissions', 'web', '2022-02-10 05:59:15', '2022-02-10 05:59:15'),
(36, 'delete_permissions', 'web', '2022-02-10 05:59:22', '2022-02-10 05:59:22'),
(37, 'update_permissions', 'web', '2022-02-10 05:59:35', '2022-02-10 05:59:35'),
(38, 'edit_roles', 'web', '2022-02-10 06:00:16', '2022-02-11 16:54:32'),
(39, 'delete_roles', 'web', '2022-02-10 06:00:36', '2022-02-11 16:55:32'),
(40, 'top_navigation_part', 'web', '2022-02-11 09:17:10', '2022-02-11 09:17:10'),
(41, 'left_side_navigation', 'web', '2022-02-11 09:17:51', '2022-02-11 09:17:51'),
(42, 'footer', 'web', '2022-02-11 09:18:05', '2022-02-11 09:18:05'),
(43, 'join_meeting', 'web', '2022-02-11 17:01:30', '2022-02-11 17:01:30'),
(44, 'web_site', 'web', '2022-02-12 11:40:45', '2022-02-12 11:42:36'),
(45, 'media', 'web', '2022-02-13 09:51:57', '2022-02-13 09:51:57'),
(46, 'manage_files', 'web', '2022-02-13 09:56:39', '2022-02-13 09:56:39'),
(47, 'packages', 'web', '2022-02-14 07:18:28', '2022-02-14 07:18:28'),
(48, 'create_plan', 'web', '2022-02-14 18:06:44', '2022-02-14 18:06:44'),
(49, 'create_plan_features', 'web', '2022-02-14 18:07:54', '2022-02-14 18:07:54'),
(50, 'videos', 'web', '2022-02-15 18:11:48', '2022-02-15 18:11:48'),
(51, 'video_category', 'web', '2022-02-15 19:06:58', '2022-02-15 19:06:58'),
(52, 'manage_video_category', 'web', '2022-02-16 05:53:24', '2022-02-16 05:53:24'),
(53, 'edit_video', 'web', '2022-02-16 06:51:50', '2022-02-16 06:51:50'),
(55, 'upload_media', 'web', '2022-02-16 12:20:14', '2022-02-16 12:20:14'),
(56, 'create_page', 'web', '2022-02-23 06:23:18', '2022-02-23 06:23:18'),
(57, 'create_menu', 'web', '2022-02-23 06:24:28', '2022-02-23 06:24:28'),
(58, 'menu', 'web', '2022-02-23 06:38:11', '2022-02-23 06:38:11'),
(59, 'edit_menu', 'web', '2022-02-23 06:52:48', '2022-02-23 06:52:48'),
(60, 'delete_menu', 'web', '2022-02-23 07:40:42', '2022-02-23 07:40:42'),
(61, 'config_video_premium', 'web', '2022-02-24 11:03:21', '2022-02-24 11:03:21'),
(62, 'my_videos', 'web', '2022-02-25 04:21:26', '2022-02-25 04:21:26'),
(63, 'app_notifications', 'web', '2022-02-26 10:57:06', '2022-02-26 10:57:06'),
(64, 'notifications', 'web', '2022-02-26 11:04:00', '2022-02-26 11:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `signup_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trial_period` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `trial_interval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'day',
  `invoice_period` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `invoice_interval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'month',
  `grace_period` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `grace_interval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'day',
  `prorate_day` tinyint(3) UNSIGNED DEFAULT NULL,
  `prorate_period` tinyint(3) UNSIGNED DEFAULT NULL,
  `prorate_extend_due` tinyint(3) UNSIGNED DEFAULT NULL,
  `active_subscribers_limit` smallint(5) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `is_pop_up` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE `plan_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resettable_period` smallint(5) UNSIGNED DEFAULT 0,
  `resettable_interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'month',
  `sort_order` mediumint(8) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_subscriptions`
--

CREATE TABLE `plan_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscriber_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `cancels_at` datetime DEFAULT NULL,
  `canceled_at` datetime DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_subscription_usage`
--

CREATE TABLE `plan_subscription_usage` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscription_id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `used` smallint(5) UNSIGNED NOT NULL,
  `valid_until` datetime DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premium_video_categories`
--

CREATE TABLE `premium_video_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_cat_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premium_video_categories`
--

INSERT INTO `premium_video_categories` (`id`, `video_cat_id`, `package_id`, `created_at`, `updated_at`) VALUES
(44, 4, 8, '2022-02-25 10:24:59', '2022-02-25 10:24:59'),
(45, 4, 9, '2022-02-25 10:24:59', '2022-02-25 10:24:59'),
(48, 1, 8, '2022-02-25 10:35:18', '2022-02-25 10:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_histories`
--

CREATE TABLE `purchase_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `international` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_refunded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `captured` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_histories`
--

INSERT INTO `purchase_histories` (`id`, `plan_slug`, `user_id`, `payment_id`, `entity`, `amount`, `currency`, `status`, `order_id`, `invoice_id`, `international`, `method`, `amount_refunded`, `refund_status`, `captured`, `description`, `act_token`, `card_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(52, 'abacus plan no one', 1, 'pay_J08mvaCf1LUSMf', 'payment', 300, 'INR', 'captured', '6RE5Z411645769997', NULL, '0', 'card', '0', NULL, 1, NULL, '', 'card_J08mvbcqtLMRhC', 'success', '2022-02-25 06:18:38', '2022-02-25 06:19:57'),
(53, 'abacus plan no one', 106, 'pay_J0EMuEuyi3ryJR', 'payment', 300, 'INR', 'captured', 'B7PYHJ1061645789646', NULL, '0', 'card', '0', NULL, 1, NULL, '', 'card_J0EMuGMTimhp12', 'success', '2022-02-25 11:46:28', '2022-02-25 11:47:26'),
(54, 'abacus plan no one', 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-02-25 11:55:24', '2022-02-25 11:55:24'),
(55, 'abacus plan no one', 106, 'pay_J0EbcwZe8qWWVK', 'payment', 300, 'INR', 'captured', 'K5VLI01061645790482', NULL, '0', 'card', '0', NULL, 1, NULL, '', 'card_J0Ebcy41Il1rxx', 'success', '2022-02-25 12:00:43', '2022-02-25 12:01:22'),
(56, 'abacus plan no one', 114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-02-26 06:56:58', '2022-02-26 06:56:58'),
(57, 'abacus plan no one', 117, 'pay_J0YIkkhFvJ06am', 'payment', 300, 'INR', 'captured', 'U7BYFH1171645859849', NULL, '0', 'card', '0', NULL, 1, NULL, '', 'card_J0YIkm6ukwXW4Z', 'success', '2022-02-26 07:16:55', '2022-02-26 07:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'super_admin', 'web', '2022-02-11 07:10:42', '2022-02-11 07:10:42'),
(9, 'user', 'web', '2022-02-11 14:43:48', '2022-02-11 14:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 3),
(4, 9),
(19, 3),
(19, 9),
(20, 3),
(20, 9),
(21, 3),
(21, 9),
(22, 3),
(22, 9),
(23, 3),
(23, 9),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(34, 9),
(35, 3),
(35, 9),
(36, 3),
(36, 9),
(37, 3),
(37, 9),
(38, 3),
(39, 3),
(40, 3),
(40, 9),
(41, 3),
(41, 9),
(42, 3),
(42, 9),
(43, 3),
(43, 9),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(50, 9),
(51, 3),
(52, 3),
(53, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_files`
--

CREATE TABLE `temp_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` int(1) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `mobile_number`, `email_verified_at`, `mobile_verified_at`, `is_email_verified`, `user_type`, `password`, `g_password`, `remember_token`, `user_status`, `created_at`, `updated_at`, `social_id`, `social_type`) VALUES
(97, 'mahesh', NULL, 'maheshm.kyc@gmail.com', NULL, '2022-02-13 13:26:04', NULL, 1, 'super_admin', '$2y$10$LQN.ioSgx8L7vlUS7SE9zO3ldsOTLIb0j/YmrkficryMh8FaKpD2q', '', 'xSRwtHfgsSXmfKc6SMmtalobjFbnac7AlNtVgpThcW8jGm04vHO3q6Gz1INN', 1, '2022-02-09 06:14:39', '2022-02-13 13:26:04', NULL, NULL),
(105, 'sai', NULL, 'saidhanya.srgroup@gmail.com', '9502959895', NULL, NULL, NULL, 'user', '$2y$10$LQN.ioSgx8L7vlUS7SE9zO3ldsOTLIb0j/YmrkficryMh8FaKpD2q', '', NULL, NULL, '2022-02-25 11:09:27', '2022-02-25 11:09:27', NULL, NULL),
(107, 'srinivas katta', NULL, 'kattasrinu73@gmail.com', '9618433697', '2022-02-25 11:54:41', NULL, NULL, 'user', '$2y$10$LQN.ioSgx8L7vlUS7SE9zO3ldsOTLIb0j/YmrkficryMh8FaKpD2q', '', NULL, 1, '2022-02-25 11:53:46', '2022-02-25 11:54:41', NULL, NULL),
(123, 'Sai Pavan', NULL, 'spvn81@gmail.com', NULL, '2022-02-26 10:10:50', NULL, 1, 'super_admin', '$2y$10$XY2PFiBOo5BOz8CsO61Uguqjehacs2PfqMTe1xhYiNfKgf1umnUua', NULL, NULL, 1, '2022-02-26 10:10:50', '2022-02-26 10:56:17', '118172929407320054645', 'google'),
(125, 'sai', NULL, 'sredutechnologie@gmail.com', '9502959895', '2022-02-26 10:39:03', NULL, 1, 'user', '$2y$10$WWEvdGSFN7n4VjI3xjJWF.rD3FsirMMJTJ9qQUTT4MVu.FnflGEY.', NULL, NULL, 1, '2022-02-26 10:38:50', '2022-02-26 10:53:13', '115182068022579341111', NULL),
(127, 'sredu technologies', NULL, 'sredutechnologies.contact@gmail.com', NULL, '2022-02-26 10:51:28', NULL, NULL, 'user', 'eyJpdiI6ImRvOGtFQy9wSHU0cVVkMzRGUkVYUGc9PSIsInZhbHVlIjoiMWZoNWdpb25IUGhKczduKysrb2lWdTBUTTJ5VmFuL1czditEcHhURzhrST0iLCJtYWMiOiJkYzcyMWYwMGQ5OTA3ZjI1ZTRmZGYwODk0ODk1MmJhYjkxMDk2NWE3MThhMGU2OTUxNjYyYmMzY2YzMDA3ZDBjIiwidGFnIjoiIn0=', NULL, NULL, 1, '2022-02-26 10:51:28', '2022-02-26 10:54:00', '103519748773677271805', 'google');

-- --------------------------------------------------------

--
-- Table structure for table `user_create_data`
--

CREATE TABLE `user_create_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id_created_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_request` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_create_data`
--

INSERT INTO `user_create_data` (`id`, `user_id_created_by`, `role`, `email_request`, `created_user_id`, `created_at`, `updated_at`) VALUES
(1, 'self', '3', NULL, 70, '2022-02-08 07:16:02', '2022-02-08 07:16:02'),
(2, 'self', '3', NULL, 71, '2022-02-08 09:00:17', '2022-02-08 09:00:17'),
(3, 'self', '3', NULL, 72, '2022-02-08 09:55:32', '2022-02-08 09:55:32'),
(4, '1', '0', 'no', 73, '2022-02-08 10:03:33', '2022-02-08 10:03:33'),
(5, '1', '0', 'no', 74, '2022-02-08 10:06:19', '2022-02-08 10:06:19'),
(6, '1', '1', NULL, 75, '2022-02-08 10:17:42', '2022-02-08 10:17:42'),
(7, 'self', '3', NULL, 76, '2022-02-08 10:19:52', '2022-02-08 10:19:52'),
(8, 'self', '3', NULL, 77, '2022-02-08 10:27:34', '2022-02-08 10:27:34'),
(9, 'self', '3', NULL, 78, '2022-02-08 10:28:51', '2022-02-08 10:28:51'),
(10, 'self', '3', NULL, 79, '2022-02-08 10:29:41', '2022-02-08 10:29:41'),
(11, 'self', '3', NULL, 80, '2022-02-08 10:30:26', '2022-02-08 10:30:26'),
(12, 'self', '3', NULL, 81, '2022-02-08 10:31:48', '2022-02-08 10:31:48'),
(13, 'self', '3', NULL, 82, '2022-02-08 10:32:21', '2022-02-08 10:32:21'),
(14, 'self', '3', NULL, 83, '2022-02-08 10:33:31', '2022-02-08 10:33:31'),
(15, 'self', '3', NULL, 84, '2022-02-08 10:34:34', '2022-02-08 10:34:34'),
(16, 'self', '3', NULL, 85, '2022-02-08 10:40:12', '2022-02-08 10:40:12'),
(17, 'self', '3', NULL, 86, '2022-02-08 10:43:04', '2022-02-08 10:43:04'),
(18, 'self', '3', NULL, 87, '2022-02-08 10:44:05', '2022-02-08 10:44:05'),
(19, 'self', '3', NULL, 88, '2022-02-08 10:45:41', '2022-02-08 10:45:41'),
(20, 'self', '3', NULL, 89, '2022-02-08 10:47:00', '2022-02-08 10:47:00'),
(21, '1', '1', NULL, 90, '2022-02-08 10:54:13', '2022-02-08 10:54:13'),
(22, '1', '1', NULL, 91, '2022-02-08 10:55:58', '2022-02-08 10:55:58'),
(23, '1', '1', 'no', 92, '2022-02-08 10:59:47', '2022-02-08 10:59:47'),
(24, '1', '1', NULL, 93, '2022-02-08 11:38:27', '2022-02-08 11:38:27'),
(25, '1', '1', 'no', 94, '2022-02-08 17:54:25', '2022-02-08 17:54:25'),
(26, '1', '1', NULL, 94, '2022-02-08 18:08:50', '2022-02-08 18:08:50'),
(27, '1', '1', 'no', 94, '2022-02-08 18:10:03', '2022-02-08 18:10:03'),
(28, '1', '2', 'no', 93, '2022-02-09 04:40:47', '2022-02-09 04:40:47'),
(29, '1', '2', 'no', 93, '2022-02-09 04:40:58', '2022-02-09 04:40:58'),
(30, '1', '1', 'no', 91, '2022-02-09 05:04:41', '2022-02-09 05:04:41'),
(31, '1', '2', 'no', 93, '2022-02-09 05:05:07', '2022-02-09 05:05:07'),
(32, '1', '1', 'no', 1, '2022-02-09 05:08:48', '2022-02-09 05:08:48'),
(33, 'self', '3', NULL, 95, '2022-02-09 05:10:11', '2022-02-09 05:10:11'),
(34, 'self', '3', NULL, 96, '2022-02-09 05:32:07', '2022-02-09 05:32:07'),
(35, 'self', '3', NULL, 97, '2022-02-09 06:14:39', '2022-02-09 06:14:39'),
(36, 'self', '3', NULL, 98, '2022-02-09 09:03:56', '2022-02-09 09:03:56'),
(37, '1', 'super_adminss', 'no', 1, '2022-02-11 08:40:03', '2022-02-11 08:40:03'),
(38, '1', 'super_admin', 'no', 1, '2022-02-11 08:44:22', '2022-02-11 08:44:22'),
(39, '1', 'writer', 'no', 97, '2022-02-11 08:46:27', '2022-02-11 08:46:27'),
(40, '1', 'writer', 'no', 97, '2022-02-11 08:46:42', '2022-02-11 08:46:42'),
(41, '1', 'user', 'no', 97, '2022-02-11 09:12:10', '2022-02-11 09:12:10'),
(42, '1', 'user', 'no', 92, '2022-02-11 11:41:03', '2022-02-11 11:41:03'),
(43, '1', 'user', 'no', 97, '2022-02-11 11:43:31', '2022-02-11 11:43:31'),
(44, '1', 'user', 'no', 99, '2022-02-11 14:44:34', '2022-02-11 14:44:34'),
(45, '1', 'super_admin', 'no', 100, '2022-02-11 16:38:09', '2022-02-11 16:38:09'),
(46, '1', 'user', 'no', 98, '2022-02-11 16:41:17', '2022-02-11 16:41:17'),
(47, '98', 'user', 'no', 97, '2022-02-11 16:42:44', '2022-02-11 16:42:44'),
(48, '98', 'user', 'no', 99, '2022-02-11 16:43:23', '2022-02-11 16:43:23'),
(49, '98', 'user', 'no', 99, '2022-02-11 16:43:41', '2022-02-11 16:43:41'),
(50, '1', 'user', 'no', 98, '2022-02-11 17:14:26', '2022-02-11 17:14:26'),
(51, '98', 'user', 'no', 99, '2022-02-11 17:16:21', '2022-02-11 17:16:21'),
(52, 'self', 'user', NULL, 101, '2022-02-12 09:34:44', '2022-02-12 09:34:44'),
(53, 'self', 'user', NULL, 102, '2022-02-12 09:40:30', '2022-02-12 09:40:30'),
(54, 'self', 'user', NULL, 103, '2022-02-12 09:59:28', '2022-02-12 09:59:28'),
(55, 'self', 'user', NULL, 104, '2022-02-12 10:03:13', '2022-02-12 10:03:13'),
(56, '1', 'super_admin', 'no', 1, '2022-02-13 13:03:16', '2022-02-13 13:03:16'),
(57, '1', 'user', 'no', 92, '2022-02-13 13:03:47', '2022-02-13 13:03:47'),
(58, '1', 'user', 'no', 92, '2022-02-13 13:20:56', '2022-02-13 13:20:56'),
(59, '1', 'user', 'no', 92, '2022-02-13 13:22:23', '2022-02-13 13:22:23'),
(60, '1', 'user', 'no', 97, '2022-02-13 13:26:04', '2022-02-13 13:26:04'),
(61, '1', 'user', 'no', 92, '2022-02-13 13:28:01', '2022-02-13 13:28:01'),
(62, '1', 'user', 'no', 92, '2022-02-13 14:28:49', '2022-02-13 14:28:49'),
(63, '1', 'user', 'no', 92, '2022-02-13 14:30:41', '2022-02-13 14:30:41'),
(64, '1', 'user', 'no', 92, '2022-02-13 14:31:23', '2022-02-13 14:31:23'),
(65, '1', 'user', 'no', 92, '2022-02-13 14:31:44', '2022-02-13 14:31:44'),
(66, '1', 'user', 'no', 92, '2022-02-13 14:33:38', '2022-02-13 14:33:38'),
(67, '1', 'user', 'no', 92, '2022-02-13 14:35:49', '2022-02-13 14:35:49'),
(68, '1', 'super_admin', 'no', 1, '2022-02-14 10:16:35', '2022-02-14 10:16:35'),
(69, '1', 'super_admin', 'no', 1, '2022-02-14 10:51:41', '2022-02-14 10:51:41'),
(70, '1', 'super_admin', 'no', 1, '2022-02-14 17:25:44', '2022-02-14 17:25:44'),
(71, '1', 'super_admin', 'no', 1, '2022-02-14 17:35:36', '2022-02-14 17:35:36'),
(72, '1', 'user', 'no', 103, '2022-02-16 08:02:36', '2022-02-16 08:02:36'),
(73, '1', 'super_admin', 'no', 1, '2022-02-16 08:04:32', '2022-02-16 08:04:32'),
(74, '1', 'super_admin', 'no', 1, '2022-02-16 08:06:53', '2022-02-16 08:06:53'),
(75, 'self', 'user', NULL, 105, '2022-02-25 11:09:27', '2022-02-25 11:09:27'),
(76, 'self', 'user', NULL, 106, '2022-02-25 11:39:32', '2022-02-25 11:39:32'),
(77, 'self', 'user', NULL, 107, '2022-02-25 11:53:46', '2022-02-25 11:53:46'),
(78, 'self', 'user', NULL, 115, '2022-02-26 06:06:51', '2022-02-26 06:06:51'),
(79, '1', 'user', 'no', 119, '2022-02-26 07:36:00', '2022-02-26 07:36:00'),
(80, '1', 'user', 'no', 118, '2022-02-26 07:36:45', '2022-02-26 07:36:45'),
(81, 'self', 'user', NULL, 124, '2022-02-26 10:35:35', '2022-02-26 10:35:35'),
(82, 'self', 'user', NULL, 125, '2022-02-26 10:38:50', '2022-02-26 10:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vod_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vod_category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vod_category_status` tinyint(1) NOT NULL DEFAULT 1,
  `is_premium` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_libraries`
--

CREATE TABLE `video_libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_format` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_premium` int(1) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `video_views_count` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `viewable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `visitor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `viewable_type`, `viewable_id`, `visitor`, `collection`, `viewed_at`) VALUES
(121, 'App\\Models\\videoLibrary', 22, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 05:52:24'),
(122, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 06:23:14'),
(123, 'App\\Models\\videoLibrary', 25, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:26:06'),
(124, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:29:48'),
(125, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:36:55'),
(126, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:41:19'),
(127, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:47:07'),
(128, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:47:42'),
(129, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:55:42'),
(130, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:55:42'),
(131, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:56:05'),
(132, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 09:56:26'),
(133, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 10:02:19'),
(134, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 10:04:56'),
(135, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 10:34:41'),
(136, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 10:35:11'),
(137, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 10:35:20'),
(138, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-25 10:35:23'),
(139, 'App\\Models\\videoLibrary', 26, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-26 05:45:05'),
(140, 'App\\Models\\videoLibrary', 24, 'HiV2MZ9MzHif0isj2H4OP6yMIDeQUflk7cJ5Y2ZFgGofXWvtlJ2DCWban320Tcv6R5cs7SJTYC8YGRuT', NULL, '2022-02-26 05:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_types_category_type_unique` (`category_type`);

--
-- Indexes for table `interactive_online_classes`
--
ALTER TABLE `interactive_online_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_slug_unique` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_features_plan_id_slug_unique` (`plan_id`,`slug`);

--
-- Indexes for table `plan_subscriptions`
--
ALTER TABLE `plan_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_subscriptions_subscriber_type_subscriber_id_index` (`subscriber_type`,`subscriber_id`),
  ADD KEY `plan_subscriptions_plan_id_foreign` (`plan_id`),
  ADD KEY `uid` (`subscriber_id`);

--
-- Indexes for table `plan_subscription_usage`
--
ALTER TABLE `plan_subscription_usage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_subscription_usage_subscription_id_feature_id_unique` (`subscription_id`,`feature_id`),
  ADD KEY `plan_subscription_usage_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `premium_video_categories`
--
ALTER TABLE `premium_video_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_histories`
--
ALTER TABLE `purchase_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_files`
--
ALTER TABLE `temp_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_create_data`
--
ALTER TABLE `user_create_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `video_libraries`
--
ALTER TABLE `video_libraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_libraries_user_id_foreign` (`user_id`),
  ADD KEY `video_category_id` (`video_category_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `interactive_online_classes`
--
ALTER TABLE `interactive_online_classes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plan_subscriptions`
--
ALTER TABLE `plan_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `plan_subscription_usage`
--
ALTER TABLE `plan_subscription_usage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `premium_video_categories`
--
ALTER TABLE `premium_video_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchase_histories`
--
ALTER TABLE `purchase_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `temp_files`
--
ALTER TABLE `temp_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `user_create_data`
--
ALTER TABLE `user_create_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video_libraries`
--
ALTER TABLE `video_libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `web_pages`
--
ALTER TABLE `web_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interactive_online_classes`
--
ALTER TABLE `interactive_online_classes`
  ADD CONSTRAINT `interactive_online_classes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interactive_online_classes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD CONSTRAINT `plan_features_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_subscriptions`
--
ALTER TABLE `plan_subscriptions`
  ADD CONSTRAINT `plan_subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uid` FOREIGN KEY (`subscriber_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_subscription_usage`
--
ALTER TABLE `plan_subscription_usage`
  ADD CONSTRAINT `plan_subscription_usage_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `plan_features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_subscription_usage_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `plan_subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD CONSTRAINT `video_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_libraries`
--
ALTER TABLE `video_libraries`
  ADD CONSTRAINT `video_libraries_ibfk_1` FOREIGN KEY (`video_category_id`) REFERENCES `video_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_libraries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
