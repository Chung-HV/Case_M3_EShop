-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 14, 2021 lúc 05:58 AM
-- Phiên bản máy phục vụ: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPORTSWEAR', 0, 'sportswear', '2021-06-08 07:00:42', '2021-06-08 07:00:42', NULL),
(2, 'MENS', 3, 'mens', '2021-06-08 07:01:02', '2021-06-09 03:32:41', NULL),
(3, 'WOMENS', 0, 'womens', '2021-06-08 07:01:12', '2021-06-08 07:01:12', NULL),
(4, 'KIDS', 0, 'kids', '2021-06-08 07:01:25', '2021-06-08 07:01:25', NULL),
(5, 'FASHION', 0, 'fashion', '2021-06-08 07:01:36', '2021-06-08 07:01:36', NULL),
(6, 'HOUSEHOLDS', 0, 'households', '2021-06-08 07:01:46', '2021-06-08 07:01:46', NULL),
(7, 'INTERIORS', 0, 'interiors', '2021-06-08 07:01:59', '2021-06-08 07:01:59', NULL),
(8, 'CLOTHING', 0, 'clothing', '2021-06-08 07:02:12', '2021-06-08 07:02:12', NULL),
(9, 'BAGS', 0, 'bags', '2021-06-08 07:02:22', '2021-06-08 07:02:22', NULL),
(10, 'SHOES', 0, 'shoes', '2021-06-08 07:02:32', '2021-06-08 07:02:32', NULL),
(11, 'SPORTSWEAR China', 2, 'sportswear-china', '2021-06-09 03:21:44', '2021-06-09 03:31:52', NULL),
(12, 'con thu 3', 11, 'con-thu-3', '2021-06-09 03:30:05', '2021-06-09 03:30:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(1, 'Menu1', 0, '2021-05-26 02:39:48', '2021-06-01 19:17:41', '', '2021-06-01 19:17:41'),
(2, 'Menu2', 0, '2021-05-26 02:39:48', '2021-06-06 06:47:06', '', '2021-06-06 06:47:06'),
(3, 'Menu3', 0, '2021-05-26 02:39:48', '2021-06-06 09:21:02', 'menu3', NULL),
(4, 'Menu 1.1', 1, '2021-05-26 02:39:48', '2021-06-06 04:46:06', '', '2021-06-06 04:46:06'),
(5, 'Menu 1.2', 1, '2021-05-26 02:39:48', '2021-06-06 04:46:03', '', '2021-06-06 04:46:03'),
(6, 'Menu 1.3', 1, '2021-05-26 02:39:48', '2021-06-06 04:46:01', '', '2021-06-06 04:46:01'),
(7, 'Menu 1.1.1', 4, '2021-05-26 02:39:48', '2021-06-06 04:45:58', 'menu-111', '2021-06-06 04:45:58'),
(8, 'Menu2.1', 2, '2021-05-26 02:39:48', '2021-05-26 02:39:48', '', NULL),
(9, 'Menu3.1', 2, '2021-05-26 02:39:48', '2021-05-26 02:39:48', '', NULL),
(10, 'menu1.1.1.1', 7, '2021-05-26 03:21:20', '2021-05-26 05:49:05', 'menu1111', '2021-05-26 05:49:05'),
(11, 'Menu3.1', 3, '2021-05-26 03:29:27', '2021-05-26 03:29:27', '', NULL),
(12, 'Menu3.1.1', 11, '2021-05-26 03:42:50', '2021-05-26 03:42:50', 'menu311', NULL),
(13, 'menu4', 0, '2021-05-26 03:43:40', '2021-05-26 03:43:40', 'menu4', NULL),
(14, 'menu 4.1', 13, '2021-05-26 03:44:18', '2021-05-26 04:22:39', 'menu-41', '2021-05-26 04:22:39'),
(15, 'Menu1', 0, '2021-06-06 04:46:27', '2021-06-06 04:46:27', 'menu1', NULL),
(16, 'Menu1.1', 15, '2021-06-06 04:46:49', '2021-06-06 09:20:11', 'menu11', '2021-06-06 09:20:11'),
(17, 'menu4.1', 13, '2021-06-06 06:45:35', '2021-06-06 08:19:40', 'menu41', '2021-06-06 08:19:40'),
(18, 'Menu 1.1.1', 16, '2021-06-06 07:08:51', '2021-06-06 08:19:35', 'menu-111', '2021-06-06 08:19:35'),
(19, 'menu5', 0, '2021-06-06 07:30:57', '2021-06-06 08:16:46', 'menu5', '2021-06-06 08:16:46'),
(20, 'menu 5.1', 19, '2021-06-06 07:33:24', '2021-06-06 07:50:59', 'menu-51', '2021-06-06 07:50:59'),
(21, 'menu5.2', 20, '2021-06-06 07:33:57', '2021-06-06 07:50:56', 'menu52', '2021-06-06 07:50:56'),
(22, 'menu5.3', 19, '2021-06-06 07:41:45', '2021-06-06 07:50:54', 'menu53', '2021-06-06 07:50:54'),
(23, 'menu 1.2', 15, '2021-06-06 07:42:55', '2021-06-06 07:50:50', 'menu-12', '2021-06-06 07:50:50'),
(24, 'menu 5.1', 19, '2021-06-06 07:51:12', '2021-06-06 08:15:35', 'menu-51', '2021-06-06 08:15:35'),
(25, 'menu 5.2', 19, '2021-06-06 07:58:10', '2021-06-06 08:01:00', 'menu-52', '2021-06-06 08:01:00'),
(26, 'Menu1.1', 15, '2021-06-06 09:20:26', '2021-06-06 09:20:26', 'menu11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2021_05_25_184904_create_categories_table', 1),
(17, '2021_05_26_044926_add_col_deleted_at_categories', 2),
(18, '2021_05_26_090814_create_menus_table', 3),
(19, '2021_05_26_103621_add_slug_menu_t_b', 4),
(20, '2021_05_26_112056_add_delete_at_menu_tablr', 5),
(21, '2021_05_26_152144_create_products_table', 6),
(22, '2021_05_26_152708_create_product_images_table', 6),
(23, '2021_05_26_153119_create_tags_table', 6),
(24, '2021_05_26_153427_create_product_tags_table', 6),
(25, '2021_05_27_110119_add_colum_feature_image_name', 7),
(26, '2021_05_28_084823_add_colum_image_name_to_table__product_img', 8),
(27, '2021_05_28_155209_add_colum_delete_at_table_product', 9),
(28, '2021_05_28_170310_create_sliders_table', 10),
(29, '2021_05_28_191339_add_colum_delete_at_table_sliders', 11),
(30, '2021_05_29_094534_create_settings_table', 12),
(31, '2021_05_29_112623_add_colum_type_settings_table', 13),
(32, '2021_05_29_120603_create_roles_table', 14),
(33, '2021_05_29_120629_create_permissions_table', 14),
(34, '2021_05_29_120815_create_user_role_table', 14),
(35, '2021_05_29_120845_create_permission_role_table', 14),
(36, '2021_05_29_154942_add_delete_at_to_usertable', 15),
(37, '2021_05_29_164408_add_colum_parent_id_permission', 16),
(38, '2021_05_29_174829_add_col_key_permission_table', 17),
(39, '2021_05_29_184402_add_delete_at__role', 18),
(40, '2021_05_30_175410_add_colum_view_product', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'category', 'category', '2021-05-30 02:32:01', '2021-05-30 02:32:01', 0, ''),
(2, 'list', 'list', '2021-05-30 02:32:01', '2021-05-30 02:32:01', 1, 'list_category'),
(3, 'add', 'add', '2021-05-30 02:32:01', '2021-05-30 02:32:01', 1, 'add_category'),
(4, 'edit', 'edit', '2021-05-30 02:32:01', '2021-05-30 02:32:01', 1, 'edit_category'),
(5, 'delete', 'delete', '2021-05-30 02:32:01', '2021-05-30 02:32:01', 1, 'delete_category'),
(6, 'menu', 'menu', '2021-05-30 02:32:19', '2021-05-30 02:32:19', 0, ''),
(7, 'list', 'list', '2021-05-30 02:32:19', '2021-05-30 02:32:19', 6, 'list_menu'),
(8, 'add', 'add', '2021-05-30 02:32:19', '2021-05-30 02:32:19', 6, 'add_menu'),
(9, 'edit', 'edit', '2021-05-30 02:32:19', '2021-05-30 02:32:19', 6, 'edit_menu'),
(10, 'delete', 'delete', '2021-05-30 02:32:19', '2021-05-30 02:32:19', 6, 'delete_menu'),
(11, 'slider', 'slider', '2021-05-30 02:32:30', '2021-05-30 02:32:30', 0, ''),
(12, 'list', 'list', '2021-05-30 02:32:30', '2021-05-30 02:32:30', 11, 'list_slider'),
(13, 'add', 'add', '2021-05-30 02:32:30', '2021-05-30 02:32:30', 11, 'add_slider'),
(14, 'edit', 'edit', '2021-05-30 02:32:30', '2021-05-30 02:32:30', 11, 'edit_slider'),
(15, 'delete', 'delete', '2021-05-30 02:32:30', '2021-05-30 02:32:30', 11, 'delete_slider'),
(16, 'product', 'product', '2021-05-30 02:33:04', '2021-05-30 02:33:04', 0, ''),
(17, 'list', 'list', '2021-05-30 02:33:04', '2021-05-30 02:33:04', 16, 'list_product'),
(18, 'add', 'add', '2021-05-30 02:33:04', '2021-05-30 02:33:04', 16, 'add_product'),
(19, 'edit', 'edit', '2021-05-30 02:33:04', '2021-05-30 02:33:04', 16, 'edit_product'),
(20, 'delete', 'delete', '2021-05-30 02:33:04', '2021-05-30 02:33:04', 16, 'delete_product'),
(21, 'setting', 'setting', '2021-05-30 02:33:08', '2021-05-30 02:33:08', 0, ''),
(22, 'list', 'list', '2021-05-30 02:33:08', '2021-05-30 02:33:08', 21, 'list_setting'),
(23, 'add', 'add', '2021-05-30 02:33:08', '2021-05-30 02:33:08', 21, 'add_setting'),
(24, 'edit', 'edit', '2021-05-30 02:33:08', '2021-05-30 02:33:08', 21, 'edit_setting'),
(25, 'delete', 'delete', '2021-05-30 02:33:08', '2021-05-30 02:33:08', 21, 'delete_setting'),
(26, 'user', 'user', '2021-05-30 02:33:12', '2021-05-30 02:33:12', 0, ''),
(27, 'list', 'list', '2021-05-30 02:33:12', '2021-05-30 02:33:12', 26, 'list_user'),
(28, 'add', 'add', '2021-05-30 02:33:12', '2021-05-30 02:33:12', 26, 'add_user'),
(29, 'edit', 'edit', '2021-05-30 02:33:12', '2021-05-30 02:33:12', 26, 'edit_user'),
(30, 'delete', 'delete', '2021-05-30 02:33:12', '2021-05-30 02:33:12', 26, 'delete_user'),
(31, 'role', 'role', '2021-05-30 02:33:16', '2021-05-30 02:33:16', 0, ''),
(32, 'list', 'list', '2021-05-30 02:33:16', '2021-05-30 02:33:16', 31, 'list_role'),
(33, 'add', 'add', '2021-05-30 02:33:16', '2021-05-30 02:33:16', 31, 'add_role'),
(34, 'edit', 'edit', '2021-05-30 02:33:16', '2021-05-30 02:33:16', 31, 'edit_role'),
(35, 'delete', 'delete', '2021-05-30 02:33:16', '2021-05-30 02:33:16', 31, 'delete_role');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(7, 7, 2, NULL, NULL),
(8, 7, 3, NULL, NULL),
(9, 7, 4, NULL, NULL),
(10, 7, 5, NULL, NULL),
(11, 7, 7, NULL, NULL),
(12, 7, 8, NULL, NULL),
(13, 7, 9, NULL, NULL),
(14, 7, 10, NULL, NULL),
(15, 7, 12, NULL, NULL),
(16, 7, 13, NULL, NULL),
(17, 7, 14, NULL, NULL),
(18, 7, 15, NULL, NULL),
(19, 7, 17, NULL, NULL),
(20, 7, 18, NULL, NULL),
(21, 7, 19, NULL, NULL),
(22, 7, 20, NULL, NULL),
(23, 7, 22, NULL, NULL),
(24, 7, 23, NULL, NULL),
(25, 7, 24, NULL, NULL),
(26, 7, 25, NULL, NULL),
(27, 7, 27, NULL, NULL),
(28, 7, 28, NULL, NULL),
(29, 7, 29, NULL, NULL),
(30, 7, 30, NULL, NULL),
(31, 7, 32, NULL, NULL),
(32, 7, 33, NULL, NULL),
(33, 7, 34, NULL, NULL),
(34, 7, 35, NULL, NULL),
(35, 8, 2, NULL, NULL),
(36, 8, 3, NULL, NULL),
(37, 8, 4, NULL, NULL),
(38, 8, 5, NULL, NULL),
(39, 8, 7, NULL, NULL),
(40, 8, 8, NULL, NULL),
(41, 8, 9, NULL, NULL),
(42, 8, 10, NULL, NULL),
(43, 8, 12, NULL, NULL),
(44, 8, 13, NULL, NULL),
(45, 8, 14, NULL, NULL),
(46, 8, 15, NULL, NULL),
(47, 8, 17, NULL, NULL),
(48, 8, 18, NULL, NULL),
(49, 8, 19, NULL, NULL),
(50, 8, 20, NULL, NULL),
(51, 8, 22, NULL, NULL),
(52, 8, 23, NULL, NULL),
(53, 8, 24, NULL, NULL),
(54, 8, 25, NULL, NULL),
(60, 10, 2, NULL, NULL),
(61, 10, 3, NULL, NULL),
(62, 10, 4, NULL, NULL),
(63, 10, 5, NULL, NULL),
(64, 10, 17, NULL, NULL),
(65, 10, 18, NULL, NULL),
(66, 10, 19, NULL, NULL),
(67, 10, 20, NULL, NULL),
(73, 9, 7, NULL, NULL),
(74, 9, 2, NULL, NULL),
(78, 9, 19, NULL, NULL),
(81, 9, 17, NULL, NULL),
(82, 9, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featue_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `featue_image_name`, `deleted_at`, `view_count`) VALUES
(1, 'T-shirt Nike', '32', '/storage/product/12/Product1.jpeg', '<p>new fashion</p>', 12, 1, '2021-06-08 07:18:50', '2021-06-08 07:18:50', 'Product1.jpeg', NULL, 0),
(2, 'T-shirt nike white', '32', '/storage/product/12/product2.jpeg', '<p>new fashion</p>', 12, 1, '2021-06-08 07:20:03', '2021-06-08 07:20:03', 'product2.jpeg', NULL, 0),
(3, 'sports pants', '18', '/storage/product/12/product3.jpeg', '<p>new fashion</p>', 12, 1, '2021-06-08 07:21:39', '2021-06-08 07:21:39', 'product3.jpeg', NULL, 0),
(4, 'PSG coat', '45', '/storage/product/12/product4.jpeg', '<p>PSG coat new fhasion</p>', 12, 2, '2021-06-08 07:24:00', '2021-06-08 07:24:00', 'product4.jpeg', NULL, 0),
(5, 'China trousers', '10', '/storage/product/12/product5.jpeg', '<p>new trousers from china</p>', 12, 2, '2021-06-08 07:25:12', '2021-06-08 07:27:23', 'product5.jpeg', NULL, 0),
(6, 'USA trousers', '50', '/storage/product/12/product8.2.png', '<p>new fashion from USA</p>', 12, 3, '2021-06-08 07:27:01', '2021-06-08 07:27:01', 'product8.2.png', NULL, 0),
(7, 'Africa  coat', '36', '/storage/product/12/product10.jpeg', '<p>new fashion from africa</p>', 12, 5, '2021-06-08 07:28:47', '2021-06-08 07:28:47', 'product10.jpeg', NULL, 0),
(8, 'Nike Sportswear Essential', '65', '/storage/product/12/product11.jpeg', '<p>Nike Dress</p>', 12, 8, '2021-06-08 07:30:18', '2021-06-08 07:30:18', 'product11.jpeg', NULL, 0),
(9, 'Nine Kid1', '23', '/storage/product/12/kid1.jpeg', '<p>fashion for kid</p>', 12, 4, '2021-06-08 07:35:35', '2021-06-08 07:35:35', 'kid1.jpeg', NULL, 0),
(10, 'nike kid2', '25', '/storage/product/12/kid2.jpeg', '<p>fashion for kid</p>', 12, 4, '2021-06-08 07:37:11', '2021-06-08 07:37:11', 'kid2.jpeg', NULL, 0),
(11, 'fashion kid', '25', '/storage/product/12/kid3.jpeg', '<p>fashion for kid</p>', 12, 4, '2021-06-08 07:38:03', '2021-06-08 07:38:03', 'kid3.jpeg', NULL, 0),
(12, 'coat kid', '23', '/storage/product/12/kid4.jpeg', '<p>fashion coat for kid</p>', 12, 4, '2021-06-08 07:38:47', '2021-06-08 07:38:47', 'kid4.jpeg', NULL, 0),
(13, 'new coat China', '10000000', '/storage/product/12/product2.jpeg', '<p>new fashion</p>', 12, 2, '2021-06-09 03:19:39', '2021-06-09 03:20:17', 'product2.jpeg', '2021-06-09 03:20:17', 0),
(14, 'Honda Civic', '10000000', '/storage/product/17/product5.jpeg', '<p>new</p>', 17, 2, '2021-06-09 03:25:08', '2021-06-09 03:25:19', 'product5.jpeg', '2021-06-09 03:25:19', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`, `image_name`) VALUES
(1, '/storage/product/12/product1detail.png', 1, '2021-06-08 07:18:50', '2021-06-08 07:18:50', 'product1detail.png'),
(2, '/storage/product/12/Product1.jpeg', 1, '2021-06-08 07:18:50', '2021-06-08 07:18:50', 'Product1.jpeg'),
(3, '/storage/product/12/product2.jpeg', 2, '2021-06-08 07:20:03', '2021-06-08 07:20:03', 'product2.jpeg'),
(4, '/storage/product/12/product2detail2.png', 2, '2021-06-08 07:20:03', '2021-06-08 07:20:03', 'product2detail2.png'),
(5, '/storage/product/12/product3.jpeg', 3, '2021-06-08 07:21:39', '2021-06-08 07:21:39', 'product3.jpeg'),
(6, '/storage/product/12/product4.jpeg', 4, '2021-06-08 07:24:00', '2021-06-08 07:24:00', 'product4.jpeg'),
(7, '/storage/product/12/product5.jpeg', 5, '2021-06-08 07:25:12', '2021-06-08 07:25:12', 'product5.jpeg'),
(8, '/storage/product/12/product8.1.png', 6, '2021-06-08 07:27:01', '2021-06-08 07:27:01', 'product8.1.png'),
(9, '/storage/product/12/product8.3.png', 6, '2021-06-08 07:27:01', '2021-06-08 07:27:01', 'product8.3.png'),
(10, '/storage/product/12/product8.jpeg', 6, '2021-06-08 07:27:01', '2021-06-08 07:27:01', 'product8.jpeg'),
(11, '/storage/product/12/product10.jpeg', 7, '2021-06-08 07:28:47', '2021-06-08 07:28:47', 'product10.jpeg'),
(12, '/storage/product/12/product11.jpeg', 8, '2021-06-08 07:30:18', '2021-06-08 07:30:18', 'product11.jpeg'),
(13, '/storage/product/12/kid1.jpeg', 9, '2021-06-08 07:35:35', '2021-06-08 07:35:35', 'kid1.jpeg'),
(14, '/storage/product/12/kid2.jpeg', 10, '2021-06-08 07:37:11', '2021-06-08 07:37:11', 'kid2.jpeg'),
(15, '/storage/product/12/kid3.jpeg', 11, '2021-06-08 07:38:03', '2021-06-08 07:38:03', 'kid3.jpeg'),
(16, '/storage/product/12/kid4.jpeg', 13, '2021-06-09 03:19:39', '2021-06-09 03:19:39', 'kid4.jpeg'),
(17, '/storage/product/12/produc2detail.png', 13, '2021-06-09 03:19:39', '2021-06-09 03:19:39', 'produc2detail.png'),
(18, '/storage/product/12/product1detail.png', 13, '2021-06-09 03:19:39', '2021-06-09 03:19:39', 'product1detail.png'),
(19, '/storage/product/17/product1detail.png', 14, '2021-06-09 03:25:08', '2021-06-09 03:25:08', 'product1detail.png'),
(20, '/storage/product/17/product1detail2.png', 14, '2021-06-09 03:25:08', '2021-06-09 03:25:08', 'product1detail2.png'),
(21, '/storage/product/17/product2.jpeg', 14, '2021-06-09 03:25:09', '2021-06-09 03:25:09', 'product2.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `tag_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-06-08 07:18:50', '2021-06-08 07:18:50'),
(2, 2, 1, '2021-06-08 07:18:50', '2021-06-08 07:18:50'),
(3, 1, 2, '2021-06-08 07:20:03', '2021-06-08 07:20:03'),
(4, 3, 2, '2021-06-08 07:20:03', '2021-06-08 07:20:03'),
(5, 4, 3, '2021-06-08 07:21:39', '2021-06-08 07:21:39'),
(6, 1, 3, '2021-06-08 07:21:39', '2021-06-08 07:21:39'),
(7, 5, 4, '2021-06-08 07:24:00', '2021-06-08 07:24:00'),
(8, 6, 4, '2021-06-08 07:24:00', '2021-06-08 07:24:00'),
(9, 7, 5, '2021-06-08 07:25:12', '2021-06-08 07:25:12'),
(10, 8, 5, '2021-06-08 07:25:12', '2021-06-08 07:25:12'),
(11, 7, 6, '2021-06-08 07:27:01', '2021-06-08 07:27:01'),
(12, 9, 6, '2021-06-08 07:27:01', '2021-06-08 07:27:01'),
(13, 10, 6, '2021-06-08 07:27:01', '2021-06-08 07:27:01'),
(14, 5, 7, '2021-06-08 07:28:47', '2021-06-08 07:28:47'),
(15, 1, 8, '2021-06-08 07:30:18', '2021-06-08 07:30:18'),
(16, 11, 8, '2021-06-08 07:30:18', '2021-06-08 07:30:18'),
(17, 1, 9, '2021-06-08 07:35:35', '2021-06-08 07:35:35'),
(18, 12, 9, '2021-06-08 07:35:35', '2021-06-08 07:35:35'),
(19, 1, 10, '2021-06-08 07:37:11', '2021-06-08 07:37:11'),
(20, 12, 10, '2021-06-08 07:37:11', '2021-06-08 07:37:11'),
(21, 13, 10, '2021-06-08 07:37:11', '2021-06-08 07:37:11'),
(22, 3, 11, '2021-06-08 07:38:03', '2021-06-08 07:38:03'),
(23, 12, 11, '2021-06-08 07:38:03', '2021-06-08 07:38:03'),
(24, 12, 12, '2021-06-08 07:38:47', '2021-06-08 07:38:47'),
(25, 5, 12, '2021-06-08 07:38:47', '2021-06-08 07:38:47'),
(26, 3, 12, '2021-06-08 07:38:47', '2021-06-08 07:38:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'admin', 'Quản trị hệ thống', '2021-05-29 11:24:34', '2021-05-29 11:24:34', NULL),
(8, 'developer', 'Phát triển hệ thống', '2021-05-29 11:25:18', '2021-05-29 11:25:18', NULL),
(9, 'guest', 'Khách hàng', '2021-05-29 11:26:18', '2021-05-29 11:26:18', NULL),
(10, 'content', 'Quản lý nội dung', '2021-05-29 11:27:40', '2021-05-29 11:47:35', '2021-05-29 11:47:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 14, 1, NULL, NULL),
(4, 14, 3, NULL, NULL),
(14, 12, 7, NULL, NULL),
(16, 17, 9, NULL, NULL),
(17, 24, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `type`) VALUES
(13, 'phone contac', '0123456789', '2021-06-02 02:12:36', '2021-06-02 02:12:36', 'Text'),
(14, 'Email', 'chunghv@gmail.com', '2021-06-02 02:13:20', '2021-06-02 02:13:20', 'Text'),
(15, 'facebook link', 'facekook.com/chung', '2021-06-02 02:14:44', '2021-06-02 02:14:44', 'Text'),
(16, 'twiter', 'twiter/chung', '2021-06-02 02:15:22', '2021-06-02 02:15:22', 'Text'),
(17, 'footer infomation', '<p class=\"pull-left\">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>\r\n                <p class=\"pull-right\">Designed by <span><a target=\"_blank\"\r\n                                                           href=\"http://www.themeum.com\">Themeum</a></span></p>', '2021-06-02 02:17:22', '2021-06-02 02:44:48', 'Textarea');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Free E-Commerce Template', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/storage/slider/12/girl1.jpg', 'girl1.jpg', '2021-05-30 08:46:54', '2021-05-30 08:46:54', NULL),
(5, 'Free Ecommerce Template', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/storage/slider/12/girl3.jpg', 'girl3.jpg', '2021-05-30 08:50:19', '2021-05-30 08:50:19', NULL),
(6, '100% Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/storage/slider/12/girl2.jpg', 'girl2.jpg', '2021-05-30 08:51:17', '2021-05-30 08:51:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'nike', '2021-06-08 07:18:50', '2021-06-08 07:18:50'),
(2, 'tshirt', '2021-06-08 07:18:50', '2021-06-08 07:18:50'),
(3, 'fashion', '2021-06-08 07:20:03', '2021-06-08 07:20:03'),
(4, 'sports pants', '2021-06-08 07:21:39', '2021-06-08 07:21:39'),
(5, 'coat', '2021-06-08 07:24:00', '2021-06-08 07:24:00'),
(6, 'PSG', '2021-06-08 07:24:00', '2021-06-08 07:24:00'),
(7, 'trousers', '2021-06-08 07:25:12', '2021-06-08 07:25:12'),
(8, 'china', '2021-06-08 07:25:12', '2021-06-08 07:25:12'),
(9, 'sport', '2021-06-08 07:27:01', '2021-06-08 07:27:01'),
(10, 'women', '2021-06-08 07:27:01', '2021-06-08 07:27:01'),
(11, 'dress', '2021-06-08 07:30:18', '2021-06-08 07:30:18'),
(12, 'kid', '2021-06-08 07:35:35', '2021-06-08 07:35:35'),
(13, 'asia', '2021-06-08 07:37:11', '2021-06-08 07:37:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'ChungDzaii', 'chunghv.tny@gmail.com', NULL, '$2y$10$1MWO2C0jhN/M8krUbvh7Re2H9F05XVSEuivyLgbPyRXuhfgQQiDAy', 'MbN0bKjYjoXBTsyT0oG9uABhg6OW7H26VpFNTOsIioafpbtb0jEaeCGoHMgm', '2021-05-29 06:20:03', '2021-05-31 19:05:18', NULL),
(14, 'ChungHV', 'Chunghv.tny91@gmail.com', NULL, '$2y$10$jRKUi/XOzMBvnqVpkA443urfOPPDjYKNG8h5H2qBQ./E.EkwnSPfO', NULL, '2021-05-29 06:26:07', '2021-05-29 08:55:29', '2021-05-29 08:55:29'),
(17, 'Anh Nguyet Xinh gai', 'anhnguyet@gmail.com', NULL, '$2y$10$hDlVZsXdWlOjr7hEWvih/ODrFFCOqcmAkL8zhpPgIOWOi.0DTAHti', '5QlRndtncnquOHtozflDHii2BVnroh5DZumAp6LFcR2iFp8D0JNJpflGhhnS', '2021-05-29 08:40:24', '2021-06-09 00:07:15', NULL),
(24, 'ChungHV', 'chunghv.tny@codegym.com', NULL, '$2y$10$uDZOCRWwfDi50383WpZbM.W2wHkDX/iPgFg97O6cD0eAUY06s5Wim', 'ULZmD1xgofWOO0dzQ6VhbVshNHZij4rAtZVEfEUBBGq7yX41ZWLHGu8rI7K2', '2021-06-09 00:30:40', '2021-06-09 00:32:49', NULL),
(25, 'SonND', 'sonnd@codegym.com', NULL, '$2y$10$3J8xiIhWHVi3zqm1629C5eo4JSsUftiTbGh6JCEEMfwZClwd.wDa.', NULL, '2021-06-09 01:33:43', '2021-06-09 01:33:43', NULL),
(26, 'thaotrinhminh', 'thaotm@codegym.com', NULL, '$2y$10$PVKMF/aL19SsGUNFTJ0aV.OmCoOY1lZ2e8BeBnN1kQeDMsANx.QA2', NULL, '2021-06-09 03:17:25', '2021-06-09 03:17:25', NULL),
(27, 'chung', 'chung1@gmail.com', NULL, '$2y$10$2aJSt/Aeaa6iA3FtTx8YB.kiyEQCnZiC4T35SGJ94UWz0WcSlpb2y', NULL, '2021-06-20 14:48:30', '2021-06-20 14:48:30', NULL),
(28, 'vupa', 'vupa@gmail.com', NULL, '$2y$10$ad627XOBecZlPrH/2wQj/.4BVftJEDN.vx1ykIg1ZPRHEmpvtX3FK', NULL, '2021-06-20 15:16:28', '2021-06-20 15:16:28', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
