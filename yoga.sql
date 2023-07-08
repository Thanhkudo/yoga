-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 08, 2023 lúc 12:56 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yoga`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `json_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_information`)),
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `json_information`, `is_super_admin`, `status`, `remember_token`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Thắng Nguyễn', 'huuthangb2k50@gmail.com', '$2y$10$7gxfGSFLfg1BwfRZfsBCL.UNBLgP/R.c87SeIelNhACtfyVYACjoe', 2, NULL, 1, 'active', NULL, NULL, NULL, '2021-09-24 08:48:18', '2022-12-08 03:56:38'),
(2, 'Test', 'test@gmail.com', '$2y$10$7gxfGSFLfg1BwfRZfsBCL.UNBLgP/R.c87SeIelNhACtfyVYACjoe', 2, NULL, 0, 'active', NULL, NULL, NULL, '2022-07-08 11:13:53', '2023-03-03 08:49:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_21_090133_create_admins_table', 1),
(5, '2021_09_29_090019_create_tb_options_table', 1),
(6, '2021_09_29_090048_create_tb_logs_table', 1),
(7, '2021_09_29_090107_create_tb_admin_menus_table', 1),
(8, '2021_09_29_090214_create_tb_modules_table', 1),
(9, '2021_09_29_090233_create_tb_module_functions_table', 1),
(10, '2021_09_29_090301_create_tb_roles_table', 1),
(11, '2021_09_29_090402_create_tb_menus_table', 1),
(12, '2021_09_29_090455_create_tb_blocks_table', 1),
(13, '2021_09_29_090509_create_tb_block_contents_table', 1),
(14, '2021_09_29_090709_create_tb_cms_taxonomys_table', 1),
(15, '2021_09_29_090743_create_tb_cms_posts_table', 1),
(16, '2021_10_09_013236_create_tb_pages_table', 1),
(17, '2021_10_26_210129_change_tb_users_table', 1),
(24, '2022_04_25_163138_create_tb_widgets_table', 3),
(25, '2022_04_25_163922_create_tb_components_table', 3),
(26, '2022_04_26_155008_create_tb_widget_configs_table', 4),
(27, '2022_04_26_155035_create_tb_component_configs_table', 4),
(28, '2022_06_02_102255_create_tb_bookings_table', 5),
(29, '2022_02_14_165457_create_tb_contacts_table', 6),
(30, '2022_02_14_170033_create_tb_orders_table', 6),
(31, '2022_02_14_170056_create_tb_order_details_table', 6),
(32, '2022_06_27_162451_create_tb_popups_table', 7),
(33, '2022_06_29_095757_change_users_table', 8),
(35, '2022_07_07_144844_create_tb_affiliate_payments_table', 9),
(36, '2022_07_12_210520_create_tb_affiliate_historys_table', 10),
(37, '2022_12_02_162806_create_tb_branchs_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin_menus`
--

CREATE TABLE `tb_admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `toolbar` varchar(255) DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_admin_menus`
--

INSERT INTO `tb_admin_menus` (`id`, `parent_id`, `name`, `icon`, `url_link`, `iorder`, `status`, `toolbar`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(3, 10, 'Quản lý người dùng', 'fa fa-user-plus', 'admins', 3, 'active', 'deactive', 1, 1, '2021-09-30 07:38:46', '2022-03-02 19:25:15'),
(5, 10, 'Quản lý nhóm quyền', 'fa fa-users', 'roles', 4, 'active', 'active', 1, 1, '2021-09-30 09:57:11', '2022-03-02 19:25:00'),
(6, 10, 'Quản lý Menu Admin', 'fa fa-tasks', 'admin_menus', 5, 'active', 'deactive', 1, 1, '2021-09-30 21:41:45', '2022-03-02 19:26:32'),
(10, NULL, 'Quản lý hệ thống', 'fa fa-server', NULL, 99, 'active', 'deactive', 1, 1, '2021-10-01 17:10:06', '2022-03-02 19:35:52'),
(13, NULL, 'Quản lý cấu hình', 'fa fa-home', NULL, 98, 'active', 'deactive', 1, 1, '2021-10-02 10:26:41', '2022-03-02 19:35:45'),
(17, 71, 'Quản lý Khối nội dung', 'fa fa-object-group', 'block_contents', 999, 'active', 'deactive', 1, 1, '2021-10-07 09:08:48', '2022-08-06 08:30:21'),
(41, 71, 'Quản lý Pages - Trang', 'fa fa-clone', 'pages', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:15:57', '2022-08-06 08:30:18'),
(42, 71, 'Quản lý Menu Website', 'fa fa-bars', 'menus', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:19:53', '2022-08-06 08:30:15'),
(44, 70, 'Quản lý hình ảnh hệ thống', 'fa fa-picture-o', 'web_image', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:23:03', '2022-08-06 08:29:09'),
(45, 70, 'Quản lý thông tin Website', 'fa fa-globe', 'web_information', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:23:28', '2022-08-06 08:29:06'),
(46, 70, 'Quản lý liên kết MXH', 'fa fa-share-alt-square', 'web_social', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:23:43', '2022-08-06 08:29:03'),
(51, NULL, 'Quản lý nội dung', 'fa fa-folder', NULL, 2, 'active', NULL, 1, 1, '2022-05-30 08:46:23', '2022-08-06 08:32:52'),
(52, 51, 'Quản lý danh mục - thể loại', NULL, 'cms_taxonomys', 1, 'active', NULL, 1, 1, '2022-05-30 08:46:51', '2022-05-30 08:46:51'),
(53, 51, 'Quản lý bài viết', NULL, 'cms_posts', 2, 'active', NULL, 1, 1, '2022-05-30 09:56:47', '2022-05-30 09:56:47'),
(58, 71, 'Quản lý mã nhúng CSS - JS', NULL, 'web_source', NULL, 'active', NULL, 1, 1, '2022-06-07 02:41:52', '2022-08-06 08:30:12'),
(59, 72, 'Quản lý liên hệ', NULL, 'contacts', 3, 'active', NULL, 1, 1, '2022-06-08 03:16:46', '2022-08-06 08:35:02'),
(62, 72, 'Quản lý tư vấn', NULL, 'call_request', 2, 'active', NULL, 1, 1, '2022-06-10 03:01:44', '2023-07-08 03:50:09'),
(70, 13, 'Cấu hình thông tin chung', 'fa fa-bars', '#', 1, 'active', NULL, 1, 1, '2022-08-06 08:28:32', '2022-08-06 08:31:29'),
(71, 13, 'Cấu hình Website', 'fa fa-object-group', '#', 2, 'active', NULL, 1, 1, '2022-08-06 08:29:55', '2022-08-06 08:31:10'),
(72, NULL, 'Quản lý khách hàng', 'fa fa-opencart', '#', 1, 'active', NULL, 1, 1, '2022-08-06 08:32:30', '2022-08-06 08:34:15'),
(73, 51, 'Quản lý khóa học', NULL, 'cms_products', 4, 'active', NULL, 1, 1, '2022-10-08 03:23:29', '2023-07-04 07:43:05'),
(76, NULL, 'fordev', 'fa fa-deviantart', NULL, 100, 'active', NULL, 1, 1, '2022-12-29 01:57:40', '2023-01-06 07:29:37'),
(77, 76, 'Module Functions', NULL, 'module_functions', 1, 'active', NULL, 1, 1, '2022-12-29 01:58:43', '2022-12-29 01:58:43'),
(78, 76, 'Modules', NULL, 'modules', 2, 'active', NULL, 1, 1, '2022-12-29 01:59:03', '2022-12-29 01:59:03'),
(79, 76, 'Blocks', NULL, 'blocks', 2, 'active', NULL, 1, 1, '2022-12-29 01:59:20', '2022-12-29 01:59:20'),
(80, 76, 'param', NULL, 'options', 3, 'active', NULL, 1, 1, '2022-12-29 02:00:42', '2022-12-29 02:00:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_affiliate_historys`
--

CREATE TABLE `tb_affiliate_historys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `order_total_money` double(20,2) NOT NULL DEFAULT 0.00,
  `affiliate_percent` double(20,2) NOT NULL DEFAULT 0.00,
  `affiliate_point` double(20,2) DEFAULT NULL,
  `affiliate_money` double(20,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_affiliate_historys`
--

INSERT INTO `tb_affiliate_historys` (`id`, `is_type`, `user_id`, `order_id`, `order_total_money`, `affiliate_percent`, `affiliate_point`, `affiliate_money`, `description`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'product', 3, 9, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 17:51:21', '2022-07-12 18:52:58'),
(3, 'product', 2, 9, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 18:18:05', '2022-07-12 18:52:58'),
(4, 'service', 3, 14, 0.00, 3.00, 0.00, 0.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 18:53:27', '2022-07-12 18:53:27'),
(5, 'service', 2, 14, 0.00, 2.50, 0.00, 0.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 18:53:27', '2022-07-12 18:53:27'),
(6, 'product', 3, 11, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-13 08:11:45', '2022-07-13 08:11:54'),
(7, 'product', 2, 11, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-13 08:11:45', '2022-07-13 08:11:54'),
(8, 'product', 3, 16, 5350000.00, 1.50, 80250.00, 80250.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:08:05', '2022-07-14 04:08:05'),
(9, 'product', 2, 16, 5350000.00, 1.50, 80250.00, 80250.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:08:05', '2022-07-14 04:08:05'),
(10, 'service', 3, 15, 450000.00, 3.00, 13500.00, 13500.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:28:17', '2022-07-14 04:28:17'),
(11, 'service', 2, 15, 450000.00, 2.50, 11250.00, 11250.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:28:17', '2022-07-14 04:28:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_affiliate_payments`
--

CREATE TABLE `tb_affiliate_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `money` double(20,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_affiliate_payments`
--

INSERT INTO `tb_affiliate_payments` (`id`, `user_id`, `money`, `description`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5000000.00, 'Số tài khoản: 1122335789\r\nChủ tài khoản: Nguyễn Hữu Thắng\r\nTên ngân hàng: Vietcombank Hà Tây', NULL, 'new', NULL, NULL, '2022-07-13 08:29:49', '2022-07-13 08:29:49'),
(2, 3, 15000000.00, 'Số tài khoản: 1122335789\nChủ tài khoản: Nguyễn Hữu Thắng\nTên ngân hàng: MB Bank', '{\"admin_note\":\"ThangNH \\u0111ang x\\u1eed l\\u00fd \\u0111\\u1ec1 ngh\\u1ecb thanh to\\u00e1n n\\u00e0y\"}', 'processing', NULL, 1, '2022-07-13 08:33:09', '2022-07-13 10:40:49'),
(3, 3, 50000.00, NULL, NULL, 'new', NULL, NULL, '2022-07-13 09:01:39', '2022-07-13 09:01:39'),
(4, 3, 5350000.00, NULL, '{\"admin_note\":\"Payment for orders by affiliate wallet\",\"order_id\":16}', 'processed', NULL, NULL, '2022-07-14 04:08:05', '2022-07-14 04:08:05'),
(5, 3, 450000.00, NULL, '{\"admin_note\":\"Payment for orders by affiliate wallet\",\"order_id\":15}', 'processed', NULL, NULL, '2022-07-14 04:28:17', '2022-07-14 04:28:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_blocks`
--

CREATE TABLE `tb_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `block_code` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_config` tinyint(1) NOT NULL DEFAULT 1,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_blocks`
--

INSERT INTO `tb_blocks` (`id`, `name`, `description`, `block_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Khối hình ảnh quảng cáo', 'Block used for displaying banner advertising images, with or without additional content', 'banner', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n                \"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n                \"aboutus.primary\",\r\n		\"branch.default\"\r\n	],\r\n	\"layout\":[\r\n		\"slide\",\r\n                \"banner_image\",\r\n                \"video\",\r\n                 \"video_social\"\r\n	]\r\n}', 1, 2, 'active', 1, 1, '2021-10-07 04:49:19', '2023-07-05 02:20:45'),
(11, 'Khối nội dung tùy chọn', 'Blocks are used for optional content and styled accordingly', 'custom', '{\r\n	\"template\":[\r\n		\"home.primary\", \r\n                 \"contact.default\",\r\n                \"aboutus.primary\",\r\n                 \"page.default\"\r\n	],\r\n	\"layout\":[\r\n		\"about_us\",\r\n		\"about_vision\",\r\n		\"core_value\",\r\n		\"about_development\",\r\n		\"about_client\"\r\n	],\r\n        \"style\":[\r\n                 \"flex-lg-row-reverse\"\r\n         ]\r\n}', 1, 3, 'active', 1, 1, '2021-10-11 16:44:15', '2023-07-06 03:35:14'),
(20, 'Khối nội dung đầu trang', NULL, 'header', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n                \"aboutus.primary\",\r\n		\"branch.default\"\r\n	],\r\n	\"layout\":[\r\n		\"default\"\r\n	]\r\n}', 1, 1, 'active', 1, 1, '2022-05-30 03:05:17', '2023-02-03 07:05:17'),
(21, 'Khối nội dung chân trang', NULL, 'footer', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n                \"aboutus.primary\",\r\n		\"branch.default\"\r\n	]\r\n}', 1, 99, 'active', 1, 1, '2022-05-30 03:06:28', '2023-02-03 07:06:31'),
(22, 'Khối danh sách dịch vụ nổi bật', NULL, 'cms_service', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"page.default\"\r\n	]\r\n}', 1, 5, 'active', 1, 1, '2022-05-31 07:25:43', '2023-07-08 07:59:13'),
(23, 'Khối danh sách bài viết nổi bật', NULL, 'cms_post', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n                \"aboutus.primary\",\r\n                 \"page.default\"\r\n	]\r\n}', 1, 7, 'active', 1, 1, '2022-05-31 09:53:32', '2023-07-06 07:36:53'),
(24, 'Khối danh sách dự án nổi bật', NULL, 'cms_resource', '{\r\n	\"template\":[\r\n		\"home.primary\"\r\n	]\r\n}', 0, 6, 'deactive', 1, 1, '2022-06-01 08:38:54', '2023-04-12 02:01:37'),
(27, 'Khối hiển thị nội dung chính', 'Khối hiển thị nội dung theo từng chức năng cụ thể', 'main', '{\r\n	\"template\":[\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n		\"page.price\",\r\n		\"page.content\",\r\n		\"branch.default\",\r\n		\"page.default\",\r\n                \"cart.default\"\r\n	]\r\n}', 1, 4, 'active', 1, 1, '2022-06-02 11:23:39', '2023-01-06 03:35:40'),
(35, 'Khối nội dung form đăng ký', NULL, 'form', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n                 \"contact.default\"\r\n	],\r\n	\"layout\":[\r\n		\"booking\"\r\n	]\r\n}', 1, 8, 'active', 1, 1, '2022-09-13 09:23:28', '2023-07-05 04:08:58'),
(36, 'Khối danh sách sản phẩm nổi bật', NULL, 'cms_product', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"page.default\",\r\n                \"aboutus.primary\"\r\n	]\r\n}', 1, 4, 'active', 1, 1, '2022-10-08 03:22:14', '2023-07-05 02:08:16'),
(37, 'Khối danh sách câu hỏi thường gặp - FAQs', NULL, 'faq', '{\r\n	\"template\":[\r\n		\"home.primary\"\r\n	],\r\n	\"layout\":[\r\n		\"default\"\r\n	]\r\n}', 1, 98, 'deactive', 1, 1, '2022-10-17 04:36:18', '2023-01-09 08:51:19'),
(39, 'Khối tìm kiếm', NULL, 'cms_search', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n                 \"product.category\",\r\n		\"page.default\"\r\n	]\r\n}', 1, 5, 'deactive', 1, 1, '2023-01-09 03:45:12', '2023-04-12 02:01:29'),
(40, 'Khối danh sách danh mục sản phẩm nổi bật', NULL, 'cms_taxonomy_product', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"page.default\"\r\n	]\r\n}', 1, 4, 'deactive', 1, 1, '2023-04-06 09:38:41', '2023-07-08 07:59:39'),
(42, 'Khối banner video', NULL, 'banner_video', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n                \"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"page.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n                \"aboutus.primary\",\r\n		\"branch.default\"\r\n	],\r\n	\"layout\":[\r\n		\"slide\",\r\n                \"slick\"\r\n       \r\n	]\r\n}', 1, 2, 'active', 1, 1, '2023-07-03 09:15:28', '2023-07-06 04:42:38'),
(43, 'Khối nội dung nhiều link điều hướng', NULL, 'custom_link', '{\r\n	\"template\":[\r\n		\"home.primary\"\r\n	],\r\n	\"layout\":[\r\n		\"default\"\r\n	]\r\n}', 1, 5, 'active', 1, 1, '2023-07-04 02:13:35', '2023-07-04 02:14:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_block_contents`
--

CREATE TABLE `tb_block_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `brief` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `block_code` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) DEFAULT NULL,
  `image_background` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `url_link_title` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `system_code` varchar(255) DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_block_contents`
--

INSERT INTO `tb_block_contents` (`id`, `parent_id`, `title`, `brief`, `content`, `block_code`, `json_params`, `image`, `image_background`, `icon`, `url_link`, `url_link_title`, `position`, `system_code`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(19, NULL, 'Giới thiệu', 'Authoritatively communicate world-class alignments before low-risk high-yield growth strategies. Synergistically envisioneer transparent niches after dynamic \"outside the box\" thinking. Uniquely implement cutting-edge partnerships before synergistic niche markets.', NULL, 'custom', '{\"layout\":\"about_us\",\"style\":null}', '/data/cms-image/1/Screenshot_14.png', '/data/cms-image/1/sign.png', NULL, NULL, NULL, NULL, NULL, 6, 'delete', 1, 1, '2021-10-12 10:29:41', '2023-01-09 09:06:36'),
(21, 19, 'img1', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/1 (2).jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2021-10-12 10:31:50', '2022-12-29 04:32:07'),
(22, 19, 'img2', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/2.jpg', NULL, NULL, NULL, 'learn more', NULL, NULL, 2, 'delete', 1, 1, '2021-10-12 10:32:50', '2022-12-29 04:32:35'),
(74, NULL, 'Khối hình ảnh banner đầu trang chủ', NULL, NULL, 'banner_video', '{\"layout\":\"slide\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-03-18 17:50:28', '2023-07-03 09:50:03'),
(79, NULL, 'Điều chúng tôi làm', NULL, NULL, 'custom', '{\"layout\":\"about_vision\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'delete', 1, 1, '2022-05-31 07:26:33', '2023-01-09 09:06:42'),
(82, NULL, 'BẢNG GIÁ DỊCH VỤ', NULL, NULL, 'custom', '{\"layout\":\"core_value\",\"style\":null}', '/data/cms-image/1/Frame.png', '/data/cms-image/1/3.jpg', NULL, NULL, NULL, NULL, NULL, 6, 'delete', 1, 1, '2022-06-01 08:39:42', '2023-01-09 09:06:28'),
(94, NULL, 'Khối hiển thị nội dung chính', NULL, NULL, 'main', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-06-02 11:24:21', '2023-07-04 09:19:41'),
(96, 241, '#2', 'COO - FHM Agency', NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', '/data/cms-image/demo/1233.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2022-08-05 08:58:04', '2022-09-13 07:35:29'),
(97, 241, '#1', NULL, NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', '/data/cms-image/demo/demo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-08-05 08:58:04', '2022-09-13 07:36:29'),
(103, 241, '#4', NULL, NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', '/data/cms-image/demo/demo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-08-05 09:17:04', '2022-09-13 07:36:51'),
(104, 241, '#3', NULL, NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', '/data/cms-image/demo/1233.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2022-08-05 09:17:04', '2022-09-13 07:35:32'),
(286, 74, '#2', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', 'https://cms.mars-ways.com/uploads/photos/banner/252439177_368170538389309_1938840243787974099_n.jpg', 'https://cms.mars-ways.com/uploads/photos/banner/252439177_368170538389309_1938840243787974099_n.jpg', NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-11-07 15:54:33', '2022-12-29 03:01:18'),
(287, 74, '#1', NULL, 'Digital Agency <span>Solutions</span>', 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/logo_new_light.png', '/data/cms-image/1/hero.jpg', NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-11-07 15:54:33', '2022-12-29 03:57:50'),
(289, 79, 'ĐỘI NGŨ CHUYÊN NGHIỆP', 'Proactively matrix go forward manufactured products before premium innovation. Collaboratively fashion.', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/Screenshot_20.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-11-15 07:55:34', '2022-12-29 04:50:29'),
(290, 79, 'SẢN PHẨM THƯƠNG HIỆU', 'Distinctively initiate alternative information with bricks-and-clicks e-commerce. Quickly evolve superior.', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/Screenshot_17.png', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2022-11-15 07:56:51', '2022-12-29 04:51:23'),
(291, 79, 'GIÀU KINH NGHIỆM', 'Dynamically transition seamless metrics after premium e-business. Phosfluorescently parallel task distinctive.', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/Screenshot_18.png', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-11-15 07:56:53', '2022-12-29 04:50:54'),
(292, 293, 'Chính trực', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/icon/i-sec-3-1.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-11-15 07:56:54', '2022-12-29 06:55:38'),
(293, NULL, 'Dịch vụ nổi bật', NULL, NULL, 'cms_service', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'delete', 1, 1, '2022-11-15 07:57:15', '2023-04-06 09:42:59'),
(294, 293, 'Tuân thủ', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/icon/i-sec-3-4.png', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'delete', 1, 1, '2022-11-15 07:59:00', '2022-12-29 06:55:26'),
(295, 293, 'Công bằng', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/icon/i-sec-3-3.png', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2022-11-15 07:59:02', '2022-12-29 06:55:30'),
(296, 293, 'Tôn trọng', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/icon/i-sec-3-2.png', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-11-15 07:59:03', '2022-12-29 06:55:34'),
(297, 293, 'Đạo đức', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/icon/i-sec-3-5.png', NULL, NULL, NULL, NULL, NULL, NULL, 5, 'delete', 1, 1, '2022-11-15 07:59:05', '2022-12-29 06:55:15'),
(299, NULL, 'KHÁCH HÀNG HÀI LÒNG', NULL, NULL, 'custom', '{\"layout\":\"about_development\",\"style\":null}', '/data/cms-image/1/Group 3.png', '/data/cms-image/1/bg2.jpg', NULL, NULL, NULL, NULL, NULL, 8, 'delete', 1, 1, '2022-11-15 10:36:53', '2023-01-09 09:06:48'),
(300, 299, 'Top 500 doanh nghiệp', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/client/logo-02-(2).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2022-11-15 10:39:21', '2022-12-29 09:10:40'),
(301, 320, 'JOHN DOE', 'XYZ Inc.', 'Compellingly engage multimedia based niche markets via value-added manufactured products. Competently formulate goal-oriented content for installed base users. Uniquely leverage other\'s granular ROI without 24/365 collaboration and idea-sharing.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-11-15 10:39:23', '2022-12-29 10:13:23'),
(302, 320, 'COLLIS TA\'EED', 'Envato Inc.', 'Intrinsicly synergize excellent content whereas user friendly action items. Rapidiously transition multimedia based information after top-line alignments. Proactively e-enable front-end e-commerce without mission-critical customer service.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2022-11-15 10:39:25', '2022-12-29 10:13:22'),
(303, 320, 'Steve Jobs', 'Apple Inc.', 'Collaboratively enhance intermandated innovation via cutting-edge core competencies. Professionally extend covalent e-markets and mission-critical communities. Dramatically communicate revolutionary web services for interactive synergy. Synergistically.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2022-11-15 10:39:27', '2022-12-29 10:13:20'),
(304, 79, 'THỜI GIAN TIẾT KIỆM', 'Holisticly fashion cooperative ROI without unique intellectual capital. Synergistically engage orthogonal.', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/Screenshot_16.png', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'delete', 1, 1, '2022-12-29 04:51:59', '2022-12-29 05:00:57'),
(305, 79, 'DỊCH VỤ CHU ĐÁO', 'Monotonectally evisculate high standards in best practices before exceptional web-readiness. Competently.', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/Screenshot_15.png', NULL, NULL, NULL, NULL, NULL, NULL, 5, 'delete', 1, 1, '2022-12-29 04:52:36', '2022-12-29 05:01:09'),
(306, 82, 'Cắt tóc', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:46:58'),
(307, 82, 'Gội đầu', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:49:13'),
(308, 82, 'Cạo râu', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:49:09'),
(309, 82, 'Nhuộm tóc', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:49:07'),
(310, 82, 'Tỉa râu', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:49:05'),
(311, 82, 'Tỉa ria', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:49:03'),
(312, 82, 'Làm sạch da', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:49:01'),
(313, 82, 'Massage đầu', '$39', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum officia eaque nobis ut.', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 'delete', 1, 1, '2022-12-29 07:43:12', '2022-12-29 07:48:55'),
(314, NULL, 'Sản phẩm', NULL, NULL, 'cms_product', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, '/san-pham', 'Xem tất cả', NULL, NULL, 5, 'delete', 1, 1, '2022-12-29 08:12:42', '2023-07-03 17:26:07'),
(315, 299, 'Khối hình ảnh', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-12-29 09:40:51', '2022-12-29 10:13:38'),
(316, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 09:44:50', '2022-12-29 09:45:03'),
(317, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl2.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:08:25', '2022-12-29 10:08:25'),
(318, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:08:46', '2022-12-29 10:08:46'),
(319, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:09:08', '2022-12-29 10:36:26'),
(320, 299, 'Nhóm ý kiến', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-12-29 10:12:50', '2022-12-29 10:13:54'),
(321, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:25:25', '2022-12-29 10:25:25'),
(322, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl5.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:25:27', '2022-12-29 10:25:27'),
(323, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:25:31', '2022-12-29 10:25:31'),
(324, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl7.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:25:35', '2022-12-29 10:25:35'),
(325, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl8.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:25:37', '2022-12-29 10:25:37'),
(326, 315, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/cl9.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-12-29 10:25:39', '2022-12-29 10:25:39'),
(327, NULL, 'ĐỘI NGŨ CHUYÊN NGHIỆP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, esse eum doloremque deleniti nam voluptatem.', NULL, 'custom', '{\"layout\":\"about_client\",\"style\":null}', '/data/cms-image/1/S_15.png', NULL, NULL, NULL, NULL, NULL, NULL, 9, 'delete', 1, 1, '2022-12-29 10:39:15', '2023-01-09 09:06:56'),
(328, 327, 'JOHN DOE', 'Expert', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/bb1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2022-12-29 10:41:05', '2022-12-29 13:22:38'),
(329, 327, 'MARY JANE', 'Junior Barber', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/bb3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2022-12-29 13:22:19', '2022-12-29 13:22:19'),
(330, 327, 'JOSH THOMPSON', 'Barber', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/bb2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2022-12-29 13:22:20', '2022-12-29 13:22:20'),
(331, NULL, '2222', '5252', '252', 'banner', '{\"layout\":\"slide\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-07 01:22:19', '2023-01-07 02:13:17'),
(332, 74, 'Chào mừng tới', '<span>YOGA</span> STUDIO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'banner', '{\"layout\":null,\"style\":null,\"video\":\"https:\\/\\/www.youtube.com\\/watch?v=PiLjubTovcs\"}', '/data/cms-image/Images/banner_mb.png', '/data/cms-image/Images/banner.png', 'far  fa-play-circle', NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-01-07 02:16:13', '2023-07-03 15:32:30'),
(333, 74, 'img', NULL, NULL, 'banner', '{\"layout\":\"slide\",\"style\":null}', '/data/cms-image/Images/slider_2.png', '/data/cms-image/Images/slider_2.png', NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2023-01-07 02:17:00', '2023-07-03 03:39:48'),
(334, 74, 'img', NULL, NULL, 'banner', '{\"layout\":\"slide\",\"style\":null}', '/data/cms-image/Images/slider_3.png', '/data/cms-image/Images/slider_3.png', NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2023-01-07 02:17:37', '2023-07-03 03:39:42'),
(335, NULL, 'Thuộc tính tìm kiếm', NULL, NULL, 'cms_search', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2023-01-09 03:51:01', '2023-04-06 09:42:55'),
(336, NULL, 'Ưu đãi đặc biệt cho hợp đồng thuê và cho thuê biệt thự dài hạn', NULL, NULL, 'banner', '{\"layout\":\"contact\",\"style\":null}', NULL, NULL, NULL, '/lien-he', 'Liên hệ ngay', NULL, NULL, 6, 'delete', 1, 1, '2023-01-09 08:26:45', '2023-04-06 09:42:45'),
(337, NULL, 'Địa điểm nổi bật', NULL, NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'delete', 1, 1, '2023-01-09 09:06:12', '2023-04-06 09:43:12'),
(338, NULL, 'NHỮNG CỘNG SỰ CỦA CHÚNG TA', 'Chúng tôi mong muốn tạo 1 nơi làm việc để từng CÁ NHÂN được phát triển TỐT NHẤT CÓ THỂ theo bản sắc riêng biệt và tạo ra những giá trị nuôi dưỡng cho nhau thành 1 HỆ SINH THÁI', NULL, 'banner', '{\"layout\":\"branch\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 'delete', 1, 1, '2023-01-09 10:45:14', '2023-04-06 09:43:32'),
(339, 338, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 10:48:17', '2023-02-03 08:37:57'),
(340, 338, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 10:48:23', '2023-02-03 08:37:59'),
(341, 338, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt2.png', NULL, NULL, '#', NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 10:48:26', '2023-02-18 01:47:08'),
(342, 338, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt1.png', NULL, NULL, '#', NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 10:48:28', '2023-02-18 01:47:08'),
(343, 338, 'img', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt4.png', NULL, NULL, '#', NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 13:40:37', '2023-02-18 01:47:09'),
(344, 338, 'img', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt3.png', NULL, NULL, '#', NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 13:41:51', '2023-02-18 01:47:10'),
(345, 338, 'img', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt2.png', NULL, NULL, '#', NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 13:41:54', '2023-02-18 01:47:11'),
(346, 338, 'img', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/dt1.png', NULL, NULL, '#', NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-01-09 13:41:56', '2023-02-18 01:46:22'),
(347, NULL, 'Về chúng tôi', NULL, NULL, 'banner', '{\"layout\":\"image\",\"style\":null}', '/data/cms-image/1/bg_about.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 8, 'delete', 1, 1, '2023-02-03 07:41:29', '2023-04-06 09:43:24'),
(348, NULL, 'Tin tức', NULL, NULL, 'cms_post', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 'delete', 1, 1, '2023-02-03 08:01:26', '2023-07-03 17:26:10'),
(349, NULL, 'CHÚNG TA LÀM GÌ', NULL, NULL, 'custom', '{\"layout\":\"about_us\",\"style\":null}', '/data/cms-image/1/bg_about1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 10, 'delete', 1, 1, '2023-02-03 09:01:30', '2023-04-06 09:43:30'),
(350, 349, 'Cách chúng tôi trả lời', NULL, 'Hỗ trợ khách hàng mọi lúc, mọi nơi 24/7', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2023-02-03 09:09:03', '2023-02-18 02:27:26'),
(351, 349, 'Thuê nhà', NULL, 'Thông tin thuê, mua đa dạng, phù hợp với mọi đối tượng có nhu cầu về chỗ ở', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2023-02-03 09:09:30', '2023-02-18 02:28:39'),
(352, 349, 'Cần một không gian văn phòng', NULL, 'Cung cấp văn phòng thên toàn quốc, đảm bảo nhu cầu thuê, mua văn phòng của các cty, doanh nghiệp lớn và nhỏ', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2023-02-03 09:10:58', '2023-02-18 02:30:03'),
(353, 349, 'Bán nhà', NULL, 'Dịch vụ bán nhà trên toàn quốc với thủ tục pháp lý nhang gọn, uy tín', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'delete', 1, 1, '2023-02-03 09:11:00', '2023-02-18 02:31:05'),
(354, 349, 'Giá của chúng tôi', NULL, 'Cam kết giá phù hợp với nhu cầu, khả năng của người đi thuê, mua và người cho thuê, bán', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'delete', 1, 1, '2023-02-03 09:11:02', '2023-02-18 02:33:08'),
(355, NULL, 'ĐỘI CỦA CHÚNG TÔI', 'Làm việc nhóm là khả năng làm việc cùng nhau hướng đến tầm nhìn chung. Là khả năng dẫn dắt những thành tích cá nhân vì các mục tiêu của tổ chức. Đây là nguồn nhiên liệu giúp những người bình thường có thể đạt được những kết quả phi thường.', NULL, 'custom', '{\"layout\":\"about_client\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 'delete', 1, 1, '2023-02-03 09:26:28', '2023-04-06 09:43:27'),
(356, 355, 'PELICAN STEVE', 'Quản trị văn phòng', 'Xóa bỏ đầu tư trung thực lý thuyết khả năng tiếp cận nhân quyền về thay đổi xã hội.', 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/u4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'delete', 1, 1, '2023-02-03 09:30:01', '2023-02-03 09:30:01'),
(357, 355, 'PIFF JENKINS', 'Quản lý tài sản cao cấp', 'Giảm lượng khí thải carbon mang lại, hợp pháp hóa khuếch đại Aga Khan phi đảng phái. Chuyên gia đánh giá đối thoại chính sách.', 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/u3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2023-02-03 09:30:03', '2023-02-03 09:30:03'),
(358, 355, 'NIX MAXWELL', 'Giám đốc / Giấy phép', 'Xóa bỏ đầu tư trung thực lý thuyết khả năng tiếp cận nhân quyền về thay đổi xã hội. Đa dạng kinh nghiệm trong lĩnh vực nhân ái, truyền cảm hứng đột phá lên kế hoạch.', 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/u2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2023-02-03 09:30:05', '2023-02-03 09:30:05'),
(359, 355, 'WEIR DOE', 'Tư vấn bất động sản', 'Giảm lượng khí thải carbon mang lại, hợp pháp hóa khuếch đại Aga Khan phi đảng phái. Đối thoại chính sách đánh giá tự do ngôn luận nền tảng tự do của chuyên gia.', 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/u1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2023-02-03 09:30:08', '2023-02-03 09:30:08'),
(360, NULL, 'Liên hệ', NULL, NULL, 'banner', '{\"layout\":\"image\",\"style\":null}', '/data/cms-image/1/bg_lh.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 8, 'delete', 1, 1, '2023-02-04 01:29:03', '2023-04-06 09:43:20'),
(361, NULL, 'Khối hình ảnh nội dung liên hệ', NULL, NULL, 'banner', '{\"layout\":\"contactImg\",\"style\":null}', '/data/cms-image/1/img_contact.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 7, 'delete', 1, 1, '2023-02-04 01:40:24', '2023-04-06 09:45:26'),
(362, NULL, 'Tìm kiếm', NULL, NULL, 'banner', '{\"layout\":\"search\",\"style\":null}', '/data/cms-image/1/bg_sp.jpg', '/data/cms-image/1/bg_sp.jpg', NULL, NULL, NULL, NULL, NULL, 8, 'delete', 1, 1, '2023-02-09 03:04:28', '2023-04-06 09:43:16'),
(363, NULL, 'Danh mục sản phẩm nổi bật', NULL, NULL, 'cms_taxonomy_product', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2023-04-06 09:46:40', '2023-07-03 09:43:59'),
(364, NULL, 'Banner', NULL, NULL, 'banner', '{\"layout\":\"image\",\"style\":null}', '/data/cms-image/Images/bg_feedback.png', NULL, NULL, NULL, NULL, NULL, NULL, 6, 'delete', 1, 1, '2023-04-07 02:16:49', '2023-07-03 09:43:47'),
(365, NULL, 'Tìm hiểu thêm', 'Theo dõi Yoga Studio trên Instagram, Facebook, Youtube', NULL, 'banner', '{\"layout\":\"video_social\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'active', 1, 1, '2023-04-07 02:58:21', '2023-07-03 17:23:35'),
(366, 365, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/Images/img_intro_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2023-04-07 02:59:14', '2023-07-03 15:51:56'),
(367, 365, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/Images/img_intro_2.png', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2023-04-07 03:01:03', '2023-07-03 15:52:04'),
(368, 365, 'img', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/Images/img_intro_3.png', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2023-04-07 03:01:21', '2023-07-03 15:53:37'),
(369, NULL, 'MAISON LUXURY - GIỚI THIỆU THƯƠNG HIỆU', NULL, '<p><strong>THE BEST VIETNAM\'S PRODUCTS - NHỮNG SẢN PHẨM TỐT NHẤT ĐẾN TỪ VIỆT NAM</strong></p>\r\n\r\n<p>MAISON LUXURY - QUÀ TẾT SANG TRỌNG, Ý NGHĨA VÀ SỨC KHỎE Maison Luxury, thương hiệu quà tặng được thành lập và hoạt động dựa theo những tiêu chí: “Quà Tết Độc Đáo – Nội Dung Ý Nghĩa – Sản Phẩm Sức Khỏe”. Chúng tôi dành rất nhiều thời gian cho công việc tìm hiều, nghiên cứu các sản phẩm mới, lê ý tưởng cũng như chăm chút tỉ mỉ cho từng đường nét thiết kế trên mỗi hộp quà để đưa tới thị trường những bộ sản phẩm độc đáo, tạo khác biệt nhưng vẫn đảm bảo chất lượng và nội dung ý nghĩa.</p>\r\n\r\n<p><img data-thumb=\"original\" original-height=\"459\" original-width=\"2048\" src=\"https://bizweb.dktcdn.net/100/421/095/files/banner-trung-thu-banh-32173698405244e5b6d9a203326c10ac.jpg?v=1665722173127\" /></p>\r\n\r\n<p>Tại Maison Luxury, mỗi một sản phẩm quà tết với khách hàng là thành quả của sự chăm chỉ trong suốt 365 ngày lao động. Với mong muốn xây dựng thương hiệu quà tết đậm đà bản sắc Việt Nam, chúng tôi lựa chọn tạo ra các sản phẩm được làm từ nông sản Việt. Chúng tôi tin rằng với lợi thế về địa lý, tự nhiên và sự đa dạng trong các sản vật nông sản, bộ sản phẩm Maison Luxury sẽ là món quà độc đáo và ý nghĩa gửi đến khách hàng.</p>\r\n\r\n<p>Bên cạnh những sản phẩm đã được cam kết về chất lượng, những thiết kế bao bì cũng được chúng tôi dành nhiều thời gian để chăm sóc và hoàn thiện. Toàn bộ các sản phẩm Maison Luxury từ hộp quà, túi quà cho đến các sản phẩm bên trong đều được chúng tôi thiết kế để tạo sự khác biệt, đồng bộ so với thị trường, các hiệu ứng in ấn cũng được sử dung tinh tế, nghệ thuật để làm nổi bật nét sang trọng trên mỗi hộp quà. Với hơn 40 thiết kế, Maison đã vẽ nên 1 bức tranh về mùa xuân với những hình ảnh đa dạng và sống động về ngày tết trên mọi miền Tổ quốc. Mỗi bức tranh sẽ là một câu chuyện ý nghĩa mà chúng tôi gửi gắm để trao tặng đến mọi người.</p>\r\n\r\n<p><img data-thumb=\"original\" original-height=\"450\" original-width=\"600\" src=\"https://bizweb.dktcdn.net/100/421/095/files/qua-tet-doanh-nghiep-maison-luxury-03-1.jpg?v=1665983135677\" /></p>\r\n\r\n<p>Đặc biệt, Maison Luxury cũng cung cấp,&nbsp;hỗ trợ những dịch vụ đặc biệt, những giải pháp quà tặng phù hợp với mọi yêu cầu cho khách hàng doanh nghiệp:</p>\r\n\r\n<p>- Thiết kế, in ấn hộp quà theo logo, màu sắc nhận diện thương hiêu khách hàng</p>\r\n\r\n<p>- Quà tặng thiệp, lì xì có logo khách hàng doanh nghiệp</p>\r\n\r\n<p>- Dịch vụ giao hàng toàn quốc</p>\r\n\r\n<p>- Đa dạng những giải pháp quà tặng được “cá nhân hoá” phù hợp với yêu cầu khách hàng</p>\r\n\r\n<p>Maison Luxury tin rằng, mỗi sản phẩm của chúng tôi sẽ là món quà, là lời chúc ý nghĩa để trao tặng đế khách hàng.</p>\r\n\r\n<section>\r\n<p><img data-thumb=\"original\" original-height=\"1200\" original-width=\"1200\" src=\"https://bizweb.dktcdn.net/100/421/095/products/hop-qua-mua-xuan-luxyry-3.jpg?v=1665481435667\" /></p>\r\n</section>\r\n\r\n<footer>\r\n<section>\r\n<p>&nbsp;</p>\r\n</section>\r\n</footer>', 'custom', '{\"layout\":\"about_us\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 'delete', 1, 1, '2023-04-10 09:22:10', '2023-07-03 09:43:51'),
(370, NULL, '<span class=\"font-playball\">Đến</span>  <span class=\"green\"> YOGA</span> STUDIO', NULL, 'Chúng tôi cung cấp các lớp học Yoga lợi ích toàn diện với phương pháp luyện tập hiệu quả, dễ dàng. Tại yoga studio mọi người có thể tiếp cận và sở hữu Yoga như một công cụ nuôi dưỡng và kết nối&nbsp;<span style=\"color:#25ab75;\">THÂN – TÂM – TRÍ.</span>', 'custom_link', '{\"layout\":\"default\",\"style\":null,\"url_link\":\"\\/gioi-thieu\",\"url_link_title\":\"T\\u00ecm hi\\u1ec3u th\\u00eam\"}', '/data/cms-image/Images/anh_doi.png', '/data/cms-image/Images/bg_nguoi.png', NULL, '/khoa-hoc', 'Đăng ký tập thử', NULL, NULL, 2, 'active', 1, 1, '2023-07-03 09:55:14', '2023-07-08 02:45:14'),
(371, 74, 'alo44412312', '12313', '123123', 'banner_video', '{\"video\":\"123123\"}', '/data/cms-image/Images/banner2_mb.png', NULL, '213', '1231', '123132123123', NULL, NULL, 3, 'delete', 1, 1, '2023-07-03 10:44:35', '2023-07-03 15:34:51'),
(372, 74, '221', '123123', '123123', 'banner_video', NULL, '/data/cms-image/Images/banner4.png', '/data/cms-image/Images/banner.png', 'fa', '1213', '#ffff', NULL, NULL, 1, 'delete', 1, 1, '2023-07-03 10:55:40', '2023-07-03 15:35:06'),
(373, 365, 'Instagram', '<span class\"green\">YOGA</span> STYDIO', NULL, 'banner', '{\"video\":null}', '/data/cms-image/icon/logo_intagram.png', NULL, NULL, '/lien-ket', 'Xem tiếp', NULL, NULL, 1, 'active', 1, 1, '2023-07-03 15:55:46', '2023-07-08 02:48:21'),
(374, 365, 'Facebook', '<span class\"green\">YOGA</span> STYDIO', NULL, 'banner', '{\"video\":null}', '/data/cms-image/icon/logo_facebook.png', NULL, NULL, '/lien-ket', 'Xem tiếp', NULL, NULL, 3, 'active', 1, 1, '2023-07-03 15:57:05', '2023-07-08 02:48:37'),
(375, 365, 'Youtube', '<span class\"green\">YOGA</span> STYDIO', NULL, 'banner', '{\"video\":null}', '/data/cms-image/icon/logo_youtube.png', NULL, NULL, '/lien-ket', 'Xem tiếp', NULL, NULL, 2, 'active', 1, 1, '2023-07-03 15:57:32', '2023-07-08 02:48:29'),
(376, 373, 'video Ins', NULL, NULL, 'banner', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fZZo2nq8UlY\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2023-07-03 16:01:10', '2023-07-03 16:03:15'),
(377, 373, 'video ins', NULL, NULL, 'banner', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fZZo2nq8UlY\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-03 16:01:26', '2023-07-03 16:03:15'),
(378, 374, 'video f', NULL, NULL, 'banner', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fZZo2nq8UlY\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2023-07-03 16:01:45', '2023-07-03 16:03:15'),
(379, 374, 'video f', NULL, NULL, 'banner', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fZZo2nq8UlY\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-03 16:01:55', '2023-07-03 16:03:15'),
(380, 375, 'video y', NULL, NULL, 'banner', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fZZo2nq8UlY\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2023-07-03 16:02:06', '2023-07-03 16:03:15'),
(381, 375, 'video y', NULL, NULL, 'banner', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fZZo2nq8UlY\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-03 16:02:15', '2023-07-03 16:03:15'),
(382, NULL, 'Khối dịch vụ', NULL, NULL, 'custom', '{\"layout\":\"core_value\",\"style\":null}', '/data/cms-image/Images/ngoi_thien.png', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2023-07-03 16:23:08', '2023-07-03 16:23:28'),
(383, 382, 'Giáo trình giảng dạy', NULL, NULL, 'custom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2023-07-03 16:23:45', '2023-07-03 16:25:33'),
(384, 382, 'Dịch vụ chất lượng', NULL, NULL, 'custom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-03 16:23:57', '2023-07-03 16:25:33'),
(385, 382, 'Thời gian linh hoạt', NULL, NULL, 'custom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2023-07-03 16:24:44', '2023-07-03 16:25:33'),
(386, 382, 'Học phí hợp lý tiết kiệm', NULL, NULL, 'custom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2023-07-03 16:25:01', '2023-07-03 16:25:33'),
(387, NULL, 'Cảm  nhận từ học viên', '<span class\"green\">YOGA</span> STUDIO luôn là lựa chọn hàng đầu của bạn', NULL, 'banner', '{\"layout\":\"video\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'active', 1, 1, '2023-07-03 17:25:49', '2023-07-03 17:46:29'),
(388, 387, 'video', NULL, NULL, 'banner', '{\"video\":\"<iframe loading=\\\"lazy\\\" width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/pyfqENlmSQs\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, '/lien-ket', 'Xem tiếp', NULL, NULL, NULL, 'active', 1, 1, '2023-07-03 17:34:42', '2023-07-08 02:47:41'),
(389, 387, 'video', NULL, NULL, 'banner', '{\"video\":\"<iframe loading=\\\"lazy\\\" width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/pyfqENlmSQs\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', NULL, NULL, NULL, '/lien-ket', 'Xem tiếp', NULL, NULL, NULL, 'active', 1, 1, '2023-07-03 17:34:51', '2023-07-08 02:47:51'),
(390, NULL, 'Một chút trải nghiệm', 'Hãy gửi cho chúng tôi các thông tin câu hỏi cần tư vấn', 'Hãy để lại tên và số điện thoại của bạn để chúng tôi thông báo đến bạn nhanh nhất', 'form', '{\"layout\":\"booking\",\"style\":null}', NULL, '/data/cms-image/Images/bg_trainghiem.png', NULL, NULL, NULL, NULL, NULL, 6, 'active', 1, 1, '2023-07-04 02:32:03', '2023-07-04 03:11:37'),
(391, NULL, 'Các khóa học', 'Lựa chọn gói tập luyện phù hợp với nhu cầu, địa điểm và ngân sách của bạn', NULL, 'cms_product', '{\"layout\":null,\"style\":null}', NULL, '/data/cms-image/Images/bg_nui.png', NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2023-07-04 07:48:29', '2023-07-04 08:04:50'),
(392, NULL, 'Khối nội dung chính', NULL, NULL, 'main', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 1, 1, '2023-07-04 08:56:24', '2023-07-04 08:57:26'),
(393, NULL, 'Giới thiệu', '<span class=\"font-playball white\">Giới thiệu</span>\r\n<span class=\"white\">YOGA</span> STUDIO', NULL, 'banner', '{\"layout\":\"banner_image\",\"style\":null}', '/data/cms-image/Images/banner2_mb.png', '/data/cms-image/Images/banner2.png', NULL, NULL, NULL, NULL, NULL, 10, 'active', 1, 1, '2023-07-05 02:21:35', '2023-07-05 02:21:51'),
(394, NULL, 'Khối nội dung dưới slide', NULL, NULL, 'custom', '{\"layout\":\"about_us\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 'active', 1, 1, '2023-07-05 02:27:43', '2023-07-05 03:10:17'),
(395, 394, 'Block 1', 'CHÚNG TÔI LUÔN LÀM\r\n<span class=\"font-playball green\">Hài lòng Khách hàng</span>', 'Chúng tôi tạo một thiên đường Yoga đích thực với sự chuyên nghiệp cùng chất lượng, dịch vụ vượt trội giúp bạn loại bỏ căng thẳng, tăng cường sức khoẻ và cải thiện chất lượng cuộc sống mỗi ngày!\r\n\r\nYoga studio là trung tâm Yoga uy tín, mang đến năng lượng tích cực cho người tập. không gian lớp học thư giãn ấm cúng và giáo viên thân thiện. Bạn sẽ được thư giãn gắn kết sau một ngày dài làm việc.', 'custom', '{\"style\":null}', '/data/cms-image/Images/img_gt1.png', '/data/cms-image/Images/bg_gt1.png', NULL, NULL, '/data/cms-image/Images/bg_gt1.png', NULL, NULL, 1, 'active', 1, 1, '2023-07-05 02:47:18', '2023-07-05 03:35:06'),
(397, 394, 'Block 2', 'LỚP HỌC\r\n<span class=\"green\">YOGA STUDIO</span>', 'Lớp học yoga studio thoáng mát, rộng rãi, được thiết kế với những lớp tập đa dạng, phù hợp với mọi lứa tuổi học viên.', 'custom', '{\"style\":\"flex-lg-row-reverse\"}', '/data/cms-image/Images/img_gt2.png', '/data/cms-image/Images/bg_gt2.png', NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-05 03:19:50', '2023-07-05 03:33:35'),
(398, 394, 'Block 3', 'KHÔNG GIAN\r\n<span class=\"green\">YOGA STUDIO</span>', 'Không gian yoga studio được thiết kế theo phong cách mộc mang đậm hơi thở thiên nhiên đem lại cảm giác thư giãn, thoải mái.', 'custom', '{\"style\":null}', '/data/cms-image/Images/img_gt3.png', '/data/cms-image/Images/bg_gt3.png', NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2023-07-05 03:22:32', '2023-07-05 03:33:53'),
(399, NULL, 'LIÊN HỆ', 'Bạn cần hỗ trợ liên hệ Yoga Studio ngay!', NULL, 'custom', '{\"layout\":\"about_client\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 'active', 1, 1, '2023-07-05 09:48:19', '2023-07-05 09:48:19'),
(400, 399, 'Facebook', '8:00 - 21:00', 'Mon - Sun', 'custom', '{\"style\":null}', '/data/cms-image/icon/ic_contact_mess.png', NULL, NULL, '#', 'Inbox', NULL, NULL, 1, 'active', 1, 1, '2023-07-05 10:00:18', '2023-07-05 10:27:07'),
(401, 399, 'Zalo', '8:00 - 21:00', 'Mon - Sun', 'custom', '{\"style\":null}', '/data/cms-image/icon/ic_contact_zalo.png', NULL, NULL, 'tel:0963 636 363', '0963 636 363', NULL, NULL, 2, 'active', 1, 1, '2023-07-05 10:05:43', '2023-07-05 10:27:17'),
(402, 399, 'Hotline', '8:00 - 21:00', 'Mon - Sun', 'custom', '{\"style\":null}', '/data/cms-image/icon/ic_contact_phone.png', NULL, NULL, 'tel:0963 636 363', '0963 636 363', NULL, NULL, 3, 'active', 1, 1, '2023-07-05 10:11:10', '2023-07-05 10:27:26'),
(403, NULL, 'CẢM NHẬN TỪ HỌC VIÊN', '<span class=\"green\">YOGA</span> STUDIO luôn là lựa chọn hàng đầu của bạn', NULL, 'custom', '{\"layout\":\"about_vision\",\"style\":null}', '/data/cms-image/Images/connect_img.png', '/data/cms-image/Images/connect_img2.png', NULL, NULL, NULL, NULL, NULL, 20, 'active', 1, 1, '2023-07-06 03:29:31', '2023-07-06 03:29:31'),
(404, 403, 'Nguyen Jessica', 'Perfect, very good job! Thank you for the amazing design and work. Really impressed with the high quality and quick turnaround time. Highly recommend.', NULL, 'custom', '{\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2023-07-06 03:30:42', '2023-07-06 03:31:16'),
(405, 403, 'Mạnh Nguyễn', 'Perfect, very good job! Thank you for the amazing design and work. Really impressed with the high quality and quick turnaround time. Highly recommend.', NULL, 'custom', '{\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-06 03:30:59', '2023-07-06 03:31:16'),
(406, 403, 'Tưởng Nguyễn', 'Perfect, very good job! Thank you for the amazing design and work. Really impressed with the high quality and quick turnaround time. Highly recommend.', NULL, 'custom', '{\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2023-07-06 03:31:10', '2023-07-06 03:31:16'),
(407, NULL, 'VIDEO HỌC VIÊN CHIA SẺ', NULL, NULL, 'banner_video', '{\"layout\":\"slick\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 'active', 1, 1, '2023-07-06 04:42:52', '2023-07-06 04:43:03'),
(408, 407, 'Video 1', NULL, NULL, 'banner_video', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/l-eexsgIJYg\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', '/data/cms-image/Images/img_video1.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2023-07-06 04:49:27', '2023-07-06 07:13:54'),
(409, 407, 'Video 2', NULL, NULL, 'banner_video', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/AKclJ0s_VdQ\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', '/data/cms-image/Images/img_video2.png', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2023-07-06 04:50:01', '2023-07-06 04:58:17'),
(410, 407, 'Video 3', NULL, NULL, 'banner_video', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/ftR31O_j8CA\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', '/data/cms-image/Images/img_video3.png', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2023-07-06 04:50:30', '2023-07-06 04:58:17'),
(411, 407, 'Video 4', NULL, NULL, 'banner_video', '{\"video\":\"<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/XUGR0q89qug\\\" title=\\\"YouTube video player\\\" frameborder=\\\"0\\\" allow=\\\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\\\" allowfullscreen><\\/iframe>\"}', '/data/cms-image/Images/img_video2.png', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2023-07-06 04:58:11', '2023-07-06 04:58:17'),
(412, NULL, 'Blog', NULL, NULL, 'cms_post', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2023-07-06 07:31:26', '2023-07-06 07:31:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_bookings`
--

CREATE TABLE `tb_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `customer_note` text DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(255) DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_branchs`
--

CREATE TABLE `tb_branchs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_branchs`
--

INSERT INTO `tb_branchs` (`id`, `is_type`, `name`, `city`, `district`, `address`, `phone`, `fax`, `map`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'FHM Agency', '5', '825', 'Số 16 Trần Quốc Vượng, Cầu Giấy, Hà nội', '098 226 9600', '098 226 9611', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29792.14029028318!2d105.7910779951155!3d21.03198432079961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab398a2a3667%3A0x24328ecb439376f!2sFHM%20Agency!5e0!3m2!1svi!2sus!4v1670225754820!5m2!1svi!2sus\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 'active', 1, 1, '2022-12-05 07:47:15', '2022-12-05 09:41:38'),
(2, NULL, 'Công ty cổ phần FHM Agency Hà Nội', '5', '825', '2/25 Thọ Tháp, Cầu Giấy, Hà Nội', '0393004567', '0393004567', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29792.155949030785!2d105.791078!3d21.031906!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0905b6cacd304da!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gdGjGsMahbmcgbeG6oWkgRkhNIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1670225430705!5m2!1svi!2sus\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 'active', 1, 1, '2022-12-05 07:49:39', '2022-12-05 07:49:39'),
(3, NULL, 'Barber Hà Nội', '5', '824', 'Hà Nội', '0332792626', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6635.445327656514!2d105.7836173817835!3d21.031991107438525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ade7a42a41c7%3A0xd0905b6cacd304da!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gdGjGsMahbmcgbeG6oWkgRkhNIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1672714918910!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 'active', 1, 1, '2023-01-03 03:02:32', '2023-01-03 03:02:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cms_posts`
--

CREATE TABLE `tb_cms_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_type` varchar(255) DEFAULT 'post',
  `title` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) DEFAULT NULL,
  `image_thumb` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `count_visited` int(11) NOT NULL DEFAULT 0,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_cms_posts`
--

INSERT INTO `tb_cms_posts` (`id`, `taxonomy_id`, `is_type`, `title`, `json_params`, `image`, `image_thumb`, `is_featured`, `count_visited`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`, `alias`) VALUES
(81, 37, 'service', 'THỦ TỤC GIẤY TỜ NHANH GỌN', '{\"icon\":\"icon-realestate-doc\",\"brief\":{\"vi\":\"\\u0110\\u1ed9i ng\\u0169 chuy\\u00ean nghi\\u1ec7p s\\u1ebd gi\\u1ea3i quy\\u1ebft th\\u1ee7 t\\u1ee5c gi\\u1ea5y t\\u1edd c\\u1ee7a b\\u1ea1n m\\u1ed9t c\\u00e1ch nhanh g\\u1ecdn v\\u00e0 \\u0111\\u00fang quy tr\\u00ecnh\"},\"content\":{\"vi\":\"\\u0110\\u1ed9i ng\\u0169 chuy\\u00ean nghi\\u1ec7p s\\u1ebd gi\\u1ea3i quy\\u1ebft th\\u1ee7 t\\u1ee5c gi\\u1ea5y t\\u1edd c\\u1ee7a b\\u1ea1n m\\u1ed9t c\\u00e1ch nhanh g\\u1ecdn v\\u00e0 \\u0111\\u00fang quy tr\\u00ecnh\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', NULL, NULL, 1, 0, 6, 'active', 1, 1, '2023-01-09 07:04:55', '2023-02-18 01:39:13', 'thu-tuc-giay-to-nhanh-gon'),
(82, 37, 'service', 'TÀI CHÍNH DỄ DÀNG', '{\"icon\":\"icon-realestate-credit\",\"brief\":{\"vi\":\"Hi\\u1ec3n th\\u1ecb N\\u1ed9i dung c\\u1ee7a b\\u1ea1n m\\u1ed9t c\\u00e1ch h\\u1ea5p d\\u1eabn, c\\u00f3 c\\u00e1c v\\u00f9ng t\\u00f9y ch\\u1ec9nh kh\\u00f4ng gi\\u1edbi h\\u1ea1n.\"},\"content\":{\"vi\":\"Hi\\u1ec3n th\\u1ecb N\\u1ed9i dung c\\u1ee7a b\\u1ea1n m\\u1ed9t c\\u00e1ch h\\u1ea5p d\\u1eabn, c\\u00f3 c\\u00e1c v\\u00f9ng t\\u00f9y ch\\u1ec9nh kh\\u00f4ng gi\\u1edbi h\\u1ea1n.\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', NULL, NULL, 1, 0, 5, 'active', 1, 1, '2023-01-09 07:04:57', '2023-02-18 13:13:24', 'tai-chinh-de-dang'),
(83, 37, 'service', 'CHO THUÊ LINH HOẠT', '{\"icon\":\"icon-realestate-rent\",\"brief\":{\"vi\":\"Cung c\\u1ea5p th\\u00f4ng tin tra c\\u1ee9u kh\\u00e1ch quan, trung th\\u1ef1c v\\u1ebf c\\u00e1c t\\u00f2a nh\\u00e0 c\\u0103n h\\u1ed9 c\\u01b0 d\\u00e2n to\\u00e0n qu\\u1ed1c.\"},\"content\":{\"vi\":\"Cung c\\u1ea5p th\\u00f4ng tin tra c\\u1ee9u kh\\u00e1ch quan, trung th\\u1ef1c v\\u1ebf c\\u00e1c t\\u00f2a nh\\u00e0 c\\u0103n h\\u1ed9 c\\u01b0 d\\u00e2n to\\u00e0n qu\\u1ed1c\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', NULL, NULL, 1, 0, 5, 'active', 1, 1, '2023-01-09 07:04:59', '2023-02-18 01:40:00', 'cho-thue-linh-hoat'),
(84, 37, 'service', 'TIỆN ÍCH MIỄN PHÍ', '{\"icon\":\"icon-realestate-garage\",\"brief\":{\"vi\":\"B\\u1ea1n c\\u00f3 to\\u00e0n quy\\u1ec1n ki\\u1ec3m so\\u00e1t d\\u1ec5 d\\u00e0ng \\u0111\\u1ed1i v\\u1edbi t\\u1eebng & m\\u1ecdi y\\u1ebfu t\\u1ed1 cung c\\u1ea5p kh\\u1ea3 n\\u0103ng t\\u00f9y ch\\u1ec9nh v\\u00f4 t\\u1eadn.\"},\"content\":{\"vi\":\"B\\u1ea1n c\\u00f3 to\\u00e0n quy\\u1ec1n ki\\u1ec3m so\\u00e1t d\\u1ec5 d\\u00e0ng \\u0111\\u1ed1i v\\u1edbi t\\u1eebng &amp; m\\u1ecdi y\\u1ebfu t\\u1ed1 cung c\\u1ea5p kh\\u1ea3 n\\u0103ng t\\u00f9y ch\\u1ec9nh v\\u00f4 t\\u1eadn.\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', NULL, NULL, 1, 0, 3, 'active', 1, 1, '2023-01-09 07:05:01', '2023-02-03 10:10:17', 'tien-ich-mien-phi'),
(85, 37, 'service', 'ĐƯỢC XÂY DỰNG TỐT', '{\"icon\":\"icon-realestate-hammer\",\"brief\":{\"vi\":\"T\\u00edch h\\u1ee3p t\\u1ea5t c\\u1ea3 c\\u00e1c d\\u1ecbch v\\u1ee5 trong m\\u1ed9t gi\\u00fap kh\\u00e1ch h\\u00e0ng tr\\u1ea3i nghi\\u1ec7m v\\u00e0 ti\\u1ec7n d\\u1ee5ng.\"},\"content\":{\"vi\":\"T\\u00edch h\\u1ee3p t\\u1ea5t c\\u1ea3 c\\u00e1c d\\u1ecbch v\\u1ee5 trong m\\u1ed9t gi\\u00fap kh\\u00e1ch h\\u00e0ng tr\\u1ea3i nghi\\u1ec7m v\\u00e0 ti\\u1ec7n d\\u1ee5ng.\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', NULL, NULL, 1, 2, 2, 'active', 1, 1, '2023-01-09 07:05:03', '2023-02-18 01:41:00', 'duoc-xay-dung-tot'),
(86, 37, 'service', 'ĐẢM BẢO AN TOÀN', '{\"icon\":\"icon-realestate-my-house\",\"brief\":{\"vi\":\"\\u0110\\u1ea3m b\\u1ea3o b\\u1ed9 b\\u1ea3o m\\u1eadt v\\u00e0 danh t\\u00ednh c\\u1ee7a b\\u1ea1n tr\\u00ean trang web\"},\"content\":{\"vi\":\"\\u0110\\u1ea3m b\\u1ea3o b\\u1ed9 b\\u1ea3o m\\u1eadt v\\u00e0 danh t\\u00ednh c\\u1ee7a b\\u1ea1n tr\\u00ean trang web\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bv3.jpg', NULL, 1, 5, 1, 'active', 1, 1, '2023-01-09 07:05:06', '2023-02-18 01:42:01', 'dam-bao-an-toan'),
(87, 17, 'resource', 'Hà Nội', '{\"price\":null,\"price_old\":null,\"place\":null,\"area\":null,\"scale\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/dv_1.jpg', NULL, 1, 1, 1, 'active', 1, 1, '2023-01-09 09:22:02', '2023-02-18 01:42:48', 'ha-noi'),
(88, 17, 'resource', 'TP Hồ Chí Minh', '{\"price\":null,\"price_old\":null,\"place\":null,\"area\":null,\"scale\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/dv_2.jpg', NULL, 1, 0, 2, 'active', 1, 1, '2023-01-09 09:23:40', '2023-02-18 01:43:04', 'tp-ho-chi-minh'),
(89, 17, 'resource', 'Đà Nẵng', '{\"price\":null,\"price_old\":null,\"place\":null,\"area\":null,\"scale\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/dv_3.jpg', NULL, 1, 0, 3, 'active', 1, 1, '2023-01-09 09:24:02', '2023-02-18 01:43:18', 'da-nang'),
(90, 17, 'resource', 'Hải Phòng', '{\"price\":null,\"price_old\":null,\"place\":null,\"area\":null,\"scale\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/dv_4.jpg', NULL, 1, 0, 4, 'active', 1, 1, '2023-01-09 09:24:27', '2023-02-18 01:43:32', 'hai-phong'),
(91, 17, 'resource', 'Thái Nguyên', '{\"price\":null,\"price_old\":null,\"place\":null,\"area\":null,\"scale\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/dv_5.jpg', NULL, 1, 0, 5, 'active', 1, 1, '2023-01-09 09:24:49', '2023-02-18 01:45:34', 'thai-nguyen'),
(134, 1, 'post', 'Hơi thở bị lãng quên ?', '{\"brief\":{\"vi\":\"Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.\\u00a0T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.\"},\"content\":{\"vi\":\"<p><span style=\\\"font-size:var(--h2_typography-font-size)\\\"><span style=\\\"box-sizing:border-box\\\"><span style=\\\"font-family:var(--h2_typography-font-family)\\\"><span style=\\\"font-weight:var(--h2_typography-font-weight)\\\"><span style=\\\"line-height:var(--h2_typography-line-height)\\\"><span style=\\\"letter-spacing:var(--h2_typography-letter-spacing)\\\"><span style=\\\"font-style:normal\\\"><span style=\\\"color:var(--h2_typography-color)\\\"><span style=\\\"font-variant-ligatures:normal\\\"><span style=\\\"white-space:normal\\\"><span style=\\\"background-color:#ffffff\\\"><span style=\\\"text-decoration-thickness:initial\\\"><span style=\\\"text-decoration-style:initial\\\"><span style=\\\"text-decoration-color:initial\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.&nbsp;<\\/font><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.<\\/font><\\/font><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/Tin-tuc/blog1.png', NULL, 1, 2, 1, 'active', 1, 1, '2023-04-07 01:54:23', '2023-07-08 03:36:06', 'hoi-tho-bi-lang-quen'),
(135, 1, 'post', 'Inside Flow Yoga là gì?', '{\"brief\":{\"vi\":\"Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.\\u00a0T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.\"},\"content\":{\"vi\":\"<p><span style=\\\"font-size:var(--h2_typography-font-size)\\\"><span style=\\\"box-sizing:border-box\\\"><span style=\\\"font-family:var(--h2_typography-font-family)\\\"><span style=\\\"font-weight:var(--h2_typography-font-weight)\\\"><span style=\\\"line-height:var(--h2_typography-line-height)\\\"><span style=\\\"letter-spacing:var(--h2_typography-letter-spacing)\\\"><span style=\\\"font-style:normal\\\"><span style=\\\"color:var(--h2_typography-color)\\\"><span style=\\\"font-variant-ligatures:normal\\\"><span style=\\\"white-space:normal\\\"><span style=\\\"background-color:#ffffff\\\"><span style=\\\"text-decoration-thickness:initial\\\"><span style=\\\"text-decoration-style:initial\\\"><span style=\\\"text-decoration-color:initial\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.&nbsp;<\\/font><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.<\\/font><\\/font><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/Tin-tuc/blog2.png', NULL, 1, 15, 2, 'active', 1, 1, '2023-04-07 01:57:48', '2023-07-08 03:36:32', 'inside-flow-yoga-la-gi'),
(136, 1, 'post', 'Sự khác biệt của Inside Flow Yoga?', '{\"brief\":{\"vi\":\"Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.\\u00a0T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.\"},\"content\":{\"vi\":\"<p><span style=\\\"font-size:var(--h2_typography-font-size)\\\"><span style=\\\"box-sizing:border-box\\\"><span style=\\\"font-family:var(--h2_typography-font-family)\\\"><span style=\\\"font-weight:var(--h2_typography-font-weight)\\\"><span style=\\\"line-height:var(--h2_typography-line-height)\\\"><span style=\\\"letter-spacing:var(--h2_typography-letter-spacing)\\\"><span style=\\\"font-style:normal\\\"><span style=\\\"color:var(--h2_typography-color)\\\"><span style=\\\"font-variant-ligatures:normal\\\"><span style=\\\"white-space:normal\\\"><span style=\\\"background-color:#ffffff\\\"><span style=\\\"text-decoration-thickness:initial\\\"><span style=\\\"text-decoration-style:initial\\\"><span style=\\\"text-decoration-color:initial\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.&nbsp;<\\/font><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.<\\/font><\\/font><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/Tin-tuc/blog3.png', NULL, 1, 0, 3, 'active', 1, 1, '2023-04-07 01:59:20', '2023-07-08 03:36:51', 'su-khac-biet-cua-inside-flow-yoga'),
(137, 1, 'post', 'Suy nghĩ về việc rèn luyện?', '{\"brief\":{\"vi\":\"Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.\\u00a0T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.\"},\"content\":{\"vi\":\"<p><span style=\\\"font-size:var(--h2_typography-font-size)\\\"><span style=\\\"box-sizing:border-box\\\"><span style=\\\"font-family:var(--h2_typography-font-family)\\\"><span style=\\\"font-weight:var(--h2_typography-font-weight)\\\"><span style=\\\"line-height:var(--h2_typography-line-height)\\\"><span style=\\\"letter-spacing:var(--h2_typography-letter-spacing)\\\"><span style=\\\"font-style:normal\\\"><span style=\\\"color:var(--h2_typography-color)\\\"><span style=\\\"font-variant-ligatures:normal\\\"><span style=\\\"white-space:normal\\\"><span style=\\\"background-color:#ffffff\\\"><span style=\\\"text-decoration-thickness:initial\\\"><span style=\\\"text-decoration-style:initial\\\"><span style=\\\"text-decoration-color:initial\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.&nbsp;<\\/font><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.<\\/font><\\/font><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/Tin-tuc/blog4.png', NULL, 0, 1, 4, 'active', 1, 1, '2023-04-07 02:00:26', '2023-07-08 03:37:31', 'suy-nghi-ve-viec-ren-luyen'),
(138, 1, 'post', 'Yoga tăng sức mạnh', '{\"brief\":{\"vi\":\"Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.\\u00a0T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.\"},\"content\":{\"vi\":\"<p><span style=\\\"font-size:var(--h2_typography-font-size)\\\"><span style=\\\"box-sizing:border-box\\\"><span style=\\\"font-family:var(--h2_typography-font-family)\\\"><span style=\\\"font-weight:var(--h2_typography-font-weight)\\\"><span style=\\\"line-height:var(--h2_typography-line-height)\\\"><span style=\\\"letter-spacing:var(--h2_typography-letter-spacing)\\\"><span style=\\\"font-style:normal\\\"><span style=\\\"color:var(--h2_typography-color)\\\"><span style=\\\"font-variant-ligatures:normal\\\"><span style=\\\"white-space:normal\\\"><span style=\\\"background-color:#ffffff\\\"><span style=\\\"text-decoration-thickness:initial\\\"><span style=\\\"text-decoration-style:initial\\\"><span style=\\\"text-decoration-color:initial\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.&nbsp;<\\/font><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.<\\/font><\\/font><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/Tin-tuc/blog5.png', NULL, 0, 0, 5, 'active', 1, 1, '2023-04-07 02:01:29', '2023-07-08 03:37:54', 'yoga-tang-suc-manh'),
(139, 1, 'post', 'Yoga và 6 giá trị lợi ích cho trẻ ở độ tuổi đi học', '{\"brief\":{\"vi\":\"Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.\\u00a0T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.\"},\"content\":{\"vi\":\"<p><span style=\\\"font-size:var(--h2_typography-font-size)\\\"><span style=\\\"box-sizing:border-box\\\"><span style=\\\"font-family:var(--h2_typography-font-family)\\\"><span style=\\\"font-weight:var(--h2_typography-font-weight)\\\"><span style=\\\"line-height:var(--h2_typography-line-height)\\\"><span style=\\\"letter-spacing:var(--h2_typography-letter-spacing)\\\"><span style=\\\"font-style:normal\\\"><span style=\\\"color:var(--h2_typography-color)\\\"><span style=\\\"font-variant-ligatures:normal\\\"><span style=\\\"white-space:normal\\\"><span style=\\\"background-color:#ffffff\\\"><span style=\\\"text-decoration-thickness:initial\\\"><span style=\\\"text-decoration-style:initial\\\"><span style=\\\"text-decoration-color:initial\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\"><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">Tr\\u1edf th\\u00e0nh th\\u00e0nh vi\\u00ean Yoga Studio \\u0111\\u1ec3 t\\u1eadp yoga t\\u1ea1i ng\\u00f4i nh\\u00e0 \\u0111\\u00edch th\\u1ef1c.&nbsp;<\\/font><font style=\\\"box-sizing:border-box; vertical-align:inherit\\\">T\\u1eadn h\\u01b0\\u1edfng m\\u1ee9c gi\\u00e1 \\u0111\\u1eb7c bi\\u1ec7t v\\u00e0 ti\\u1ebfp c\\u1eadn ch\\u01b0\\u01a1ng tr\\u00ecnh yoga Iyengar phong ph\\u00fa c\\u1ee7a ch\\u00fang t\\u00f4i, v\\u1edbi nh\\u1eefng gi\\u00e1o vi\\u00ean tuy\\u1ec7t v\\u1eddi v\\u00e0 nh\\u1eefng ng\\u01b0\\u1eddi c\\u00f3 c\\u00f9ng ch\\u00ed h\\u01b0\\u1edbng.<\\/font><\\/font><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/Tin-tuc/blog6.png', NULL, 0, 0, 6, 'active', 1, 1, '2023-04-07 02:03:20', '2023-07-08 03:38:10', 'yoga-va-6-gia-tri-loi-ich-cho-tre-o-do-tuoi-di-hoc'),
(147, 45, 'product', 'Gói tập 1 tháng', '{\"price\":\"50\",\"brand\":\"Maison\",\"brief\":{\"vi\":\"<ul>\\r\\n\\t<li>D\\u00e0nh cho ng\\u01b0\\u1eddi b\\u1eadn r\\u1ed9n<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>Tr\\u1ea3i nghi\\u1ec7m luy\\u1ec7n t\\u1eadp an to\\u00e0n v\\u00e0 vui v\\u1ebb<\\/li>\\r\\n\\t<li>Chi ph\\u00ed th\\u1ea5p<\\/li>\\r\\n<\\/ul>\"},\"content\":{\"vi\":\"<p>B\\u1ea1n l\\u00e0 ng\\u01b0\\u1eddi m\\u1edbi v\\u00e0 c\\u00f2n b\\u1ee1 ng\\u1ee1 v\\u1edbi b\\u1ed9 m\\u00f4n Yoga ho\\u1eb7c ch\\u01b0a bao gi\\u1edd tham gia l\\u1edbp h\\u1ecdc yoga tr\\u01b0\\u1edbc \\u0111\\u00e2y th\\u00ec g\\u00f3i t\\u1eadp 12 bu\\u1ed5i l\\u00e0 l\\u1ef1a ch\\u1ecdn cho b\\u1ea1n.<\\/p>\\r\\n\\r\\n<p>Hi\\u1ec3u \\u0111\\u01b0\\u1ee3c c\\u00e1c kh\\u00e1i ni\\u1ec7m c\\u01a1 b\\u1ea3n v\\u1ec1 yoga v\\u00e0 th\\u1ef1c h\\u00e0nh t\\u1eadp luy\\u1ec7n \\u0111\\u1ec3 c\\u00f3 c\\u01a1 th\\u1ec3 d\\u1ebbo dai kho\\u1ebb m\\u1ea1nh.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"gallery_image\":{\"1680838448453\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-2.png\",\"1680838455163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-5.png\",\"1680838475163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-4.png\",\"1680838480689\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-1.png\",\"1680838491049\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-3.png\"}}', NULL, NULL, 1, 85, 1, 'active', 1, 1, '2023-02-08 03:17:46', '2023-07-04 07:19:51', 'goi-tap-1-thang'),
(150, 45, 'product', 'Gói tập 12 buổi', '{\"price\":\"20\",\"brand\":\"Maison\",\"brief\":{\"vi\":\"<ul>\\r\\n\\t<li>D\\u00e0nh cho ng\\u01b0\\u1eddi b\\u1eadn r\\u1ed9n<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>Tr\\u1ea3i nghi\\u1ec7m luy\\u1ec7n t\\u1eadp an to\\u00e0n v\\u00e0 vui v\\u1ebb<\\/li>\\r\\n\\t<li>Chi ph\\u00ed th\\u1ea5p<\\/li>\\r\\n<\\/ul>\"},\"content\":{\"vi\":\"<p>B\\u1ea1n l\\u00e0 ng\\u01b0\\u1eddi m\\u1edbi v\\u00e0 c\\u00f2n b\\u1ee1 ng\\u1ee1 v\\u1edbi b\\u1ed9 m\\u00f4n Yoga ho\\u1eb7c ch\\u01b0a bao gi\\u1edd tham gia l\\u1edbp h\\u1ecdc yoga tr\\u01b0\\u1edbc \\u0111\\u00e2y th\\u00ec g\\u00f3i t\\u1eadp 12 bu\\u1ed5i l\\u00e0 l\\u1ef1a ch\\u1ecdn cho b\\u1ea1n.<\\/p>\\r\\n\\r\\n<p>Hi\\u1ec3u \\u0111\\u01b0\\u1ee3c c\\u00e1c kh\\u00e1i ni\\u1ec7m c\\u01a1 b\\u1ea3n v\\u1ec1 yoga v\\u00e0 th\\u1ef1c h\\u00e0nh t\\u1eadp luy\\u1ec7n \\u0111\\u1ec3 c\\u00f3 c\\u01a1 th\\u1ec3 d\\u1ebbo dai kho\\u1ebb m\\u1ea1nh.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"gallery_image\":{\"1680838448453\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-2.png\",\"1680838455163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-5.png\",\"1680838475163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-4.png\",\"1680838480689\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-1.png\",\"1680838491049\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-3.png\"},\"related_post\":[\"147\"]}', NULL, NULL, 1, 169, 1, 'active', 1, 1, '2023-02-08 03:17:46', '2023-07-07 01:50:19', 'goi-tap-12-buoi'),
(153, 45, 'product', 'Gói tập 12 buổi', '{\"price\":\"20\",\"brand\":\"Maison\",\"brief\":{\"vi\":\"<ul>\\r\\n\\t<li>D\\u00e0nh cho ng\\u01b0\\u1eddi b\\u1eadn r\\u1ed9n<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>Tr\\u1ea3i nghi\\u1ec7m luy\\u1ec7n t\\u1eadp an to\\u00e0n v\\u00e0 vui v\\u1ebb<\\/li>\\r\\n\\t<li>Chi ph\\u00ed th\\u1ea5p<\\/li>\\r\\n<\\/ul>\"},\"content\":{\"vi\":\"<p>B\\u1ea1n l\\u00e0 ng\\u01b0\\u1eddi m\\u1edbi v\\u00e0 c\\u00f2n b\\u1ee1 ng\\u1ee1 v\\u1edbi b\\u1ed9 m\\u00f4n Yoga ho\\u1eb7c ch\\u01b0a bao gi\\u1edd tham gia l\\u1edbp h\\u1ecdc yoga tr\\u01b0\\u1edbc \\u0111\\u00e2y th\\u00ec g\\u00f3i t\\u1eadp 12 bu\\u1ed5i l\\u00e0 l\\u1ef1a ch\\u1ecdn cho b\\u1ea1n.<\\/p>\\r\\n\\r\\n<p>Hi\\u1ec3u \\u0111\\u01b0\\u1ee3c c\\u00e1c kh\\u00e1i ni\\u1ec7m c\\u01a1 b\\u1ea3n v\\u1ec1 yoga v\\u00e0 th\\u1ef1c h\\u00e0nh t\\u1eadp luy\\u1ec7n \\u0111\\u1ec3 c\\u00f3 c\\u01a1 th\\u1ec3 d\\u1ebbo dai kho\\u1ebb m\\u1ea1nh.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"gallery_image\":{\"1680838448453\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-2.png\",\"1680838455163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-5.png\",\"1680838475163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-4.png\",\"1680838480689\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-1.png\",\"1680838491049\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-3.png\"},\"related_post\":[\"147\"]}', NULL, NULL, 1, 186, 1, 'active', 1, 1, '2023-02-08 03:17:46', '2023-07-06 09:32:42', 'goi-tap-10-buoi'),
(154, 45, 'product', 'Gói tập 2 tháng', '{\"price\":\"50\",\"brand\":\"Maison\",\"brief\":{\"vi\":\"<ul>\\r\\n\\t<li>D\\u00e0nh cho ng\\u01b0\\u1eddi b\\u1eadn r\\u1ed9n<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>C\\u00f3 ki\\u1ebfn th\\u1ee9c v\\u1ec1 Yoga<\\/li>\\r\\n\\t<li>Tr\\u1ea3i nghi\\u1ec7m luy\\u1ec7n t\\u1eadp an to\\u00e0n v\\u00e0 vui v\\u1ebb<\\/li>\\r\\n\\t<li>Chi ph\\u00ed th\\u1ea5p<\\/li>\\r\\n<\\/ul>\"},\"content\":{\"vi\":\"<p>B\\u1ea1n l\\u00e0 ng\\u01b0\\u1eddi m\\u1edbi v\\u00e0 c\\u00f2n b\\u1ee1 ng\\u1ee1 v\\u1edbi b\\u1ed9 m\\u00f4n Yoga ho\\u1eb7c ch\\u01b0a bao gi\\u1edd tham gia l\\u1edbp h\\u1ecdc yoga tr\\u01b0\\u1edbc \\u0111\\u00e2y th\\u00ec g\\u00f3i t\\u1eadp 12 bu\\u1ed5i l\\u00e0 l\\u1ef1a ch\\u1ecdn cho b\\u1ea1n.<\\/p>\\r\\n\\r\\n<p>Hi\\u1ec3u \\u0111\\u01b0\\u1ee3c c\\u00e1c kh\\u00e1i ni\\u1ec7m c\\u01a1 b\\u1ea3n v\\u1ec1 yoga v\\u00e0 th\\u1ef1c h\\u00e0nh t\\u1eadp luy\\u1ec7n \\u0111\\u1ec3 c\\u00f3 c\\u01a1 th\\u1ec3 d\\u1ebbo dai kho\\u1ebb m\\u1ea1nh.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"gallery_image\":{\"1680838448453\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-2.png\",\"1680838455163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-5.png\",\"1680838475163\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-4.png\",\"1680838480689\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-1.png\",\"1680838491049\":\"\\/data\\/cms-image\\/San-pham\\/binh-an-1808-3.png\"}}', NULL, NULL, 1, 101, 1, 'active', 1, 1, '2023-02-08 03:17:46', '2023-07-05 18:43:10', 'goi-tap-2-thang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cms_taxonomys`
--

CREATE TABLE `tb_cms_taxonomys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_cms_taxonomys`
--

INSERT INTO `tb_cms_taxonomys` (`id`, `taxonomy`, `parent_id`, `title`, `json_params`, `is_featured`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'post', NULL, 'Tin tức', '{\"image\":\"\\/data\\/cms-image\\/Images\\/banner3_mb.png\",\"image_background\":\"\\/data\\/cms-image\\/Images\\/banner3.png\",\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, NULL, 'active', 1, 1, '2021-10-15 03:19:10', '2023-07-06 07:59:17', 'tin-tuc'),
(30, 'product', 45, 'Luxury', '{\"image\":\"\\/data\\/cms-image\\/Images\\/maison-luxyry.png\",\"image_background\":null,\"brief\":{\"vi\":\"H\\u1ed9p qu\\u00e0 t\\u1ebft Maison Luxury - Th\\u01b0\\u01a1ng hi\\u1ec7u Maison\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 1, 'delete', 1, 1, '2022-11-21 09:29:34', '2023-07-04 07:15:32', 'luxury'),
(40, 'product', 45, 'Maison', '{\"image\":\"\\/data\\/cms-image\\/Images\\/bo-logo-09.png\",\"image_background\":null,\"brief\":{\"vi\":\"H\\u1ed9p qu\\u00e0 t\\u1ebft Maison - Sang tr\\u1ecdng \\u00fd ngh\\u0129a cho Doanh nghi\\u1ec7p\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 2, 'delete', 1, 1, '2023-04-06 09:29:15', '2023-07-04 07:15:30', 'maison'),
(41, 'product', 45, 'Roselle', '{\"image\":\"\\/data\\/cms-image\\/Images\\/roselle-logo-png-03.png\",\"image_background\":null,\"brief\":{\"vi\":\"H\\u1ed9p qu\\u00e0 t\\u1ebft Roselle - Th\\u01b0\\u01a1ng hi\\u1ec7u Maison\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 3, 'delete', 1, 1, '2023-04-06 09:30:01', '2023-07-04 07:15:29', 'roselle'),
(42, 'product', 45, 'Robin', '{\"image\":\"\\/data\\/cms-image\\/Images\\/mat-hop-qua-robin-do-02.png\",\"image_background\":null,\"brief\":{\"vi\":\"H\\u1ed9p qu\\u00e0 t\\u1ebft Robin - Th\\u01b0\\u01a1ng Hi\\u1ec7u Maison Gourmet\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 4, 'delete', 1, 1, '2023-04-06 09:30:36', '2023-07-04 07:15:27', 'robin'),
(43, 'product', 42, 'Hộp quà Robin đỏ', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":\"Qu\\u00e0 t\\u1ebft Robin \\u0111\\u1ecf\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 1, 'delete', 1, 1, '2023-04-06 09:31:57', '2023-07-04 07:15:27', 'hop-qua-robin-do'),
(44, 'product', NULL, 'Sản phẩm', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":\"T\\u1ea5t c\\u1ea3 s\\u1ea3n ph\\u1ea9m\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 1, 'delete', 1, 1, '2023-04-10 01:51:01', '2023-04-10 02:49:08', 'san-pham'),
(45, 'product', NULL, 'Khóa học', '{\"image\":\"\\/data\\/cms-image\\/Images\\/banner3_mb.png\",\"image_background\":\"\\/data\\/cms-image\\/Images\\/banner3.png\",\"brief\":{\"vi\":\"C\\u00e1c g\\u00f3i t\\u1eadp luy\\u1ec7n\"},\"content\":{\"vi\":\"L\\u1ef1a ch\\u1ecdn g\\u00f3i t\\u1eadp luy\\u1ec7n ph\\u00f9 h\\u1ee3p v\\u1edbi nhu c\\u1ea7u, \\u0111\\u1ecba \\u0111i\\u1ec3m v\\u00e0 ng\\u00e2n s\\u00e1ch c\\u1ee7a b\\u1ea1n\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 1, 'active', 1, 1, '2023-04-12 02:07:54', '2023-07-04 09:01:28', 'khoa-hoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_components`
--

CREATE TABLE `tb_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_code` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `brief` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) DEFAULT NULL,
  `image_background` varchar(255) DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_components`
--

INSERT INTO `tb_components` (`id`, `component_code`, `parent_id`, `title`, `brief`, `content`, `json_params`, `image`, `image_background`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'menu', NULL, 'Main menu', NULL, NULL, '{\"menu_id\":\"24\"}', NULL, NULL, 1, 'active', 1, 1, '2022-05-04 08:23:05', '2022-05-20 01:38:02'),
(2, 'banner_image', NULL, 'Adv banner', NULL, NULL, NULL, '/data/cms-image/banner/no-banner.jpg', NULL, 2, 'active', 1, 1, '2022-05-04 10:25:30', '2022-05-04 10:25:30'),
(3, 'menu', NULL, 'Primary sidebar', 'Primary sidebar section', NULL, '{\"menu_id\":\"33\"}', NULL, NULL, 3, 'active', 1, 1, '2022-05-19 07:24:44', '2022-05-20 01:38:15'),
(4, 'custom', NULL, 'Footer content', NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-05-19 15:21:27', '2022-05-19 15:21:27'),
(5, NULL, 2, 'Right banner 1', 'Description to this banner', NULL, '{\"url_link\":\"#\",\"url_link_title\":\"Show now\",\"target\":\"_self\"}', '/data/cms-image/meta-logo-favicon.png', NULL, 5, 'delete', 1, 1, '2022-05-20 04:24:40', '2022-05-20 06:23:36'),
(6, NULL, 2, 'Right banner 1', 'Description to this banner', NULL, '{\"url_link\":\"#\",\"url_link_title\":\"Show now\",\"target\":\"_self\"}', '/data/cms-image/meta-logo-favicon.png', NULL, 1, 'active', 1, 1, '2022-05-20 04:27:07', '2022-05-20 04:27:07'),
(7, NULL, 2, 'Right banner 2', NULL, NULL, '{\"url_link\":\"#\",\"url_link_title\":\"View more\",\"target\":\"_self\"}', '/data/banner/architektura-5.jpg', NULL, 2, 'active', 1, 1, '2022-05-20 06:25:03', '2022-05-20 06:25:03'),
(8, NULL, 2, 'Right banner 3', NULL, NULL, '{\"url_link\":null,\"url_link_title\":null,\"target\":\"_self\"}', '/data/banner/ewx_cslxkaio8su.jpg', NULL, 3, 'active', 1, 1, '2022-05-20 06:27:24', '2022-05-20 06:27:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_component_configs`
--

CREATE TABLE `tb_component_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `component_code` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_config` tinyint(1) NOT NULL DEFAULT 1,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_component_configs`
--

INSERT INTO `tb_component_configs` (`id`, `name`, `description`, `component_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Menu', NULL, 'menu', NULL, 1, 1, 'active', 1, 1, '2022-04-26 09:53:00', '2022-04-26 09:53:00'),
(2, 'Custom', NULL, 'custom', NULL, 1, 2, 'active', 1, 1, '2022-04-26 09:53:17', '2022-04-26 09:53:17'),
(3, 'Banner / Image', NULL, 'banner_image', NULL, 1, 3, 'active', 1, 1, '2022-04-26 09:53:50', '2022-04-26 09:53:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) DEFAULT 'contact',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_contacts`
--

INSERT INTO `tb_contacts` (`id`, `is_type`, `name`, `email`, `phone`, `subject`, `content`, `admin_note`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'newsletter', NULL, 'huuthangb2k50@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '2022-06-02 08:02:36', '2022-06-02 08:02:36'),
(16, 'newsletter', NULL, 'thangnh.edu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '2022-09-13 09:54:38', '2022-09-13 09:54:38'),
(19, 'call_request', 'Thắng Nguyễn 2', 'thangnh.edu@gmail.com', '0912 568 999', NULL, 'Thử chức năng trên fhm', NULL, NULL, NULL, 'new', NULL, NULL, '2022-10-08 07:14:54', '2022-10-08 07:14:54'),
(22, 'contact', 'Thắng Nguyễn 2', 'huuthangb2k50@gmail.com', '0912 568 999', NULL, 'Liên hệ lại cho tôi nhé', NULL, NULL, NULL, 'new', NULL, NULL, '2022-10-11 07:07:33', '2022-10-11 07:07:33'),
(56, 'contact', 'Đỗ Như Thanh', 'thanhkudo1011998@gmail.com', '0355820911', NULL, NULL, NULL, '{\"product\":\"150\",\"payment\":\"direct\"}', NULL, 'new', NULL, NULL, '2023-07-08 08:06:08', '2023-07-08 08:06:08'),
(58, 'call_request', 'Thanh Kudo', NULL, '0355820911', NULL, NULL, NULL, '{\"height\":\"165\",\"weight\":\"65\",\"gender\":\"male\",\"year\":\"1998\",\"studied\":\"no\",\"is_injury\":\"no\",\"is_sick\":\"no\",\"time\":\"yes\"}', NULL, 'new', NULL, NULL, '2023-07-08 09:39:24', '2023-07-08 09:39:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_logs`
--

CREATE TABLE `tb_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url_referer` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `params` text DEFAULT NULL,
  `logged_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_menus`
--

CREATE TABLE `tb_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `menu_type` varchar(255) DEFAULT NULL,
  `system_code` varchar(255) DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_menus`
--

INSERT INTO `tb_menus` (`id`, `parent_id`, `name`, `description`, `url_link`, `menu_type`, `system_code`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(24, NULL, 'Menu đầu trang', 'Menu link for main navbar', NULL, 'header', NULL, '{\"image\":null}', 1, 'active', 1, 1, '2022-05-10 10:29:01', '2023-07-03 03:23:46'),
(26, 24, 'Liên kết', NULL, '/lien-ket', 'main', 'public', '{\"target\":\"_self\"}', 4, 'active', 1, 1, '2021-12-08 02:51:06', '2023-07-03 03:23:37'),
(27, 24, 'Khóa học', NULL, '/khoa-hoc', 'main', 'public', '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2021-12-08 02:51:06', '2023-07-03 03:23:07'),
(31, 24, 'Liên hệ', NULL, '/lien-he', NULL, NULL, '{\"target\":\"_self\"}', 5, 'active', 1, 1, '2022-05-18 16:52:41', '2023-04-06 05:14:41'),
(33, NULL, 'LIÊN KẾT NHANH', 'Hiển thị liên kết cuối chân trang', NULL, 'footer', NULL, NULL, 3, 'delete', 1, 1, '2022-05-18 18:47:23', '2023-01-09 09:58:03'),
(34, 33, 'Điều khoản dịch vụ', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-05-18 18:49:06', '2022-08-18 04:34:19'),
(35, 33, 'Chính sách bảo mật', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2022-05-18 18:49:24', '2022-08-18 04:34:32'),
(36, NULL, 'Menu cuối trang #2', NULL, NULL, 'footer', NULL, NULL, 3, 'delete', 1, 1, '2022-06-02 07:25:15', '2022-08-05 10:14:07'),
(37, 36, 'Chính sách bảo mật thông tin', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-06-02 07:25:33', '2022-06-02 07:25:33'),
(38, 36, 'Hướng dẫn tra cứu', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2022-06-02 07:25:44', '2022-06-02 07:25:44'),
(46, 33, 'Câu hỏi thường gặp', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2022-08-05 10:15:12', '2022-08-18 04:34:42'),
(58, 24, 'Trang chủ', NULL, '/', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-08-17 09:34:50', '2023-04-06 05:14:41'),
(64, NULL, 'Về chúng tôi', NULL, NULL, 'footer', NULL, '{\"image\":null}', 2, 'delete', 1, 1, '2022-10-17 07:19:46', '2023-07-03 03:20:06'),
(68, NULL, 'SẢN PHẨM', NULL, NULL, 'footer', NULL, NULL, 3, 'delete', 1, 1, '2022-11-30 07:30:01', '2022-11-30 07:41:17'),
(74, NULL, 'Menu home', 'Menu home', NULL, 'header', NULL, NULL, 4, 'delete', 1, 1, '2022-12-29 02:05:46', '2022-12-29 03:41:06'),
(75, 74, 'Trang chủ', NULL, '#slider', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-12-29 02:08:46', '2022-12-29 02:09:36'),
(76, 74, 'Dịch vụ', NULL, '#service', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2022-12-29 02:09:57', '2022-12-29 02:09:57'),
(77, 74, 'Bảng giá', NULL, '#price', NULL, NULL, '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2022-12-29 02:10:12', '2022-12-29 02:10:12'),
(78, 74, 'Sản phẩm', NULL, '#shop', NULL, NULL, '{\"target\":\"_self\"}', 4, 'active', 1, 1, '2022-12-29 02:10:47', '2022-12-29 02:10:47'),
(79, 74, 'Blog', NULL, '#testimonial', NULL, NULL, '{\"target\":\"_self\"}', 5, 'active', 1, 1, '2022-12-29 02:11:23', '2022-12-29 02:11:23'),
(80, 74, 'Liên hệ', NULL, '#contact', NULL, NULL, '{\"target\":\"_self\"}', 6, 'active', 1, 1, '2022-12-29 02:14:10', '2022-12-29 02:14:10'),
(82, NULL, 'test', NULL, NULL, 'header', NULL, NULL, 4, 'delete', 1, 1, '2023-01-04 10:28:09', '2023-01-07 02:02:07'),
(83, 82, 'www', NULL, 'wwww', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2023-01-04 10:28:20', '2023-01-04 10:28:20'),
(84, 24, 'Giới thiệu', NULL, '/gioi-thieu', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2023-01-07 02:03:23', '2023-04-06 05:14:41'),
(86, NULL, 'Thông tin', 'Chúng tôi tin tưởng vào các Tiêu chuẩn thiết kế đơn giản, sáng tạo và linh hoạt với cách tiếp cận Retina & Responsive. Duyệt qua các Tính năng tuyệt vời mà mẫu này cung cấp.', NULL, 'footer', NULL, NULL, 3, 'delete', 1, 1, '2023-01-09 10:31:44', '2023-01-09 10:41:12'),
(93, 64, 'Trang chủ', NULL, 'trang-chu', NULL, NULL, NULL, 1, 'active', 1, 1, '2023-04-06 08:08:22', '2023-04-06 08:10:14'),
(94, 64, 'Giới thiệu', NULL, '/gioi-thieu', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2023-04-06 08:08:22', '2023-04-10 01:48:22'),
(95, 64, 'Tin tức', NULL, 'tin-tuc', NULL, NULL, '{\"target\":\"_self\"}', 4, 'active', 1, 1, '2023-04-06 08:08:22', '2023-04-06 08:10:15'),
(96, 64, 'Quà tết', NULL, 'san-pham', NULL, NULL, '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2023-04-06 08:08:22', '2023-04-06 08:13:06'),
(97, 64, 'Liên hệ', NULL, 'lien-he', NULL, NULL, NULL, 5, 'active', 1, 1, '2023-04-06 08:08:23', '2023-04-06 08:10:15'),
(98, NULL, 'Các thông tin cần thiết', NULL, NULL, 'footer', NULL, '{\"image\":null}', 3, 'active', 1, 1, '2023-04-06 08:11:43', '2023-07-03 04:08:15'),
(99, 98, 'Giới thiệu', NULL, '/gioi-thieu', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2023-04-06 08:11:57', '2023-07-03 04:54:01'),
(100, 98, 'Khóa học', NULL, '/khoa-hoc', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2023-04-06 08:11:57', '2023-07-08 09:49:18'),
(101, 98, 'Liên kết', NULL, '/lien-ket', NULL, NULL, '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2023-04-06 08:11:57', '2023-07-08 09:49:33'),
(102, 98, 'Liên hệ', NULL, '/lien-he', NULL, NULL, '{\"target\":\"_self\"}', 4, 'active', 1, 1, '2023-07-03 04:53:56', '2023-07-08 09:49:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_modules`
--

CREATE TABLE `tb_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_modules`
--

INSERT INTO `tb_modules` (`id`, `module_code`, `name`, `description`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'admins', 'Quản lý người dùng', 'Chức năng quản lý người dùng hệ thống', 100, 'active', 1, 1, '2021-10-01 12:35:15', '2022-08-08 06:47:54'),
(5, 'admin_menus', 'Quản lý Menu Admin', NULL, 102, 'active', 1, 1, '2022-03-04 05:19:37', '2022-08-08 06:47:53'),
(6, 'roles', 'Quản lý nhóm quyền', NULL, 101, 'active', 1, 1, '2022-03-04 05:20:18', '2022-08-08 06:47:54'),
(7, 'menus', 'Quản lý Menu Website Public', NULL, 94, 'active', 1, 1, '2022-03-04 05:20:46', '2022-08-08 06:49:15'),
(8, 'block_contents', 'Quản lý Khối nội dung', NULL, 96, 'active', 1, 1, '2022-03-04 05:21:07', '2022-08-08 06:49:14'),
(9, 'pages', 'Quản lý Pages - Trang', NULL, 95, 'active', 1, 1, '2022-03-04 05:21:19', '2022-08-08 06:49:15'),
(10, 'cms_taxonomys', 'Quản lý danh mục - thể loại', NULL, 3, 'active', 1, 1, '2022-03-04 05:21:40', '2022-03-04 05:29:06'),
(11, 'cms_posts', 'Quản lý bài viết', NULL, 4, 'active', 1, 1, '2022-03-04 05:22:17', '2022-03-04 05:29:11'),
(13, 'cms_products', 'Quản lý khóa học', NULL, 6, 'active', 1, 1, '2022-03-04 05:22:52', '2023-07-08 08:01:06'),
(16, 'web_information', 'Quản lý thông tin website', NULL, 91, 'active', 1, 1, '2022-03-04 05:24:37', '2022-08-08 06:49:17'),
(17, 'web_image', 'Quản lý hình ảnh hệ thống', NULL, 92, 'active', 1, 1, '2022-03-04 05:25:38', '2022-08-08 06:49:17'),
(18, 'web_social', 'Quản lý liên kết MXH', NULL, 90, 'active', 1, 1, '2022-03-04 05:25:53', '2022-08-08 06:49:18'),
(19, 'contacts', 'Quản lý liên hệ', NULL, 1, 'active', 1, 1, '2022-03-04 05:26:39', '2022-08-08 06:44:47'),
(20, 'call_request', 'Quản lý tư vấn', NULL, 5, 'active', 1, 1, '2022-08-08 06:42:19', '2023-07-08 07:58:43'),
(21, 'web_source', 'Quản lý mã nhúng CSS - JS', NULL, 93, 'active', 1, 1, '2022-08-08 06:46:02', '2022-08-08 06:49:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_module_functions`
--

CREATE TABLE `tb_module_functions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `function_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_module_functions`
--

INSERT INTO `tb_module_functions` (`id`, `module_id`, `function_code`, `name`, `description`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(7, 19, 'contacts.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 05:32:15', '2022-03-04 05:35:40'),
(8, 19, 'contacts.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 05:35:45', '2022-03-04 05:35:45'),
(9, 19, 'contacts.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 05:35:48', '2022-03-04 05:35:48'),
(10, 19, 'contacts.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 05:35:51', '2022-03-04 05:35:51'),
(11, 19, 'contacts.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 05:35:55', '2022-03-04 05:35:55'),
(12, 19, 'contacts.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 05:35:58', '2022-03-04 05:35:58'),
(27, 1, 'admins.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(28, 1, 'admins.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(29, 1, 'admins.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(30, 1, 'admins.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(31, 1, 'admins.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(32, 1, 'admins.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(39, 5, 'admin_menus.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(40, 5, 'admin_menus.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(41, 5, 'admin_menus.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(42, 5, 'admin_menus.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(43, 5, 'admin_menus.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(44, 5, 'admin_menus.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(45, 6, 'roles.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(46, 6, 'roles.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(47, 6, 'roles.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(48, 6, 'roles.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(49, 6, 'roles.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(50, 6, 'roles.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(51, 7, 'menus.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(52, 7, 'menus.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(53, 7, 'menus.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(54, 7, 'menus.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(55, 7, 'menus.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(56, 7, 'menus.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(57, 8, 'block_contents.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(58, 8, 'block_contents.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(59, 8, 'block_contents.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(60, 8, 'block_contents.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(61, 8, 'block_contents.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(62, 8, 'block_contents.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(63, 9, 'pages.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(64, 9, 'pages.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(65, 9, 'pages.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(66, 9, 'pages.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(67, 9, 'pages.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(68, 9, 'pages.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(75, 10, 'cms_taxonomys.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(76, 10, 'cms_taxonomys.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(77, 10, 'cms_taxonomys.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(78, 10, 'cms_taxonomys.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(79, 10, 'cms_taxonomys.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(80, 10, 'cms_taxonomys.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(81, 11, 'cms_posts.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(82, 11, 'cms_posts.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(83, 11, 'cms_posts.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(84, 11, 'cms_posts.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(85, 11, 'cms_posts.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(86, 11, 'cms_posts.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(87, 12, 'cms_services.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(88, 12, 'cms_services.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(89, 12, 'cms_services.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(90, 12, 'cms_services.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(91, 12, 'cms_services.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(92, 12, 'cms_services.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(93, 13, 'cms_products.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-11-06 09:15:42'),
(94, 13, 'cms_products.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-11-06 09:15:42'),
(95, 13, 'cms_products.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-11-06 09:15:41'),
(96, 13, 'cms_products.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-11-06 09:15:41'),
(97, 13, 'cms_products.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-11-06 09:15:40'),
(98, 13, 'cms_products.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-11-06 09:15:40'),
(117, 16, 'web.information', 'Xem thông tin website', NULL, 1, 'active', 1, 1, '2022-03-04 07:24:06', '2022-03-04 07:24:06'),
(118, 16, 'web.information.update', 'Cập nhật thông tin website', NULL, 2, 'active', 1, 1, '2022-03-04 07:24:24', '2022-03-04 07:24:24'),
(119, 17, 'web.image', 'Xem hình ảnh hệ thống', NULL, 1, 'active', 1, 1, '2022-03-04 07:25:11', '2022-03-04 07:25:11'),
(120, 17, 'web.image.update', 'Cập nhật hình ảnh hệ thống', NULL, 2, 'active', 1, 1, '2022-03-04 07:25:34', '2022-03-04 07:25:34'),
(121, 18, 'web.social', 'Xem liên kết MXH', NULL, 1, 'active', 1, 1, '2022-03-04 07:26:03', '2022-03-04 07:26:03'),
(122, 18, 'web.social.update', 'Cập nhật liên kết MXH', NULL, 2, 'active', 1, 1, '2022-03-04 07:26:23', '2022-03-04 07:26:23'),
(123, 20, 'call_request.destroy', 'Xóa', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:30', '2022-08-08 06:44:30'),
(124, 20, 'call_request.update', 'Sửa thông tin (Lưu thông tin)', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:30', '2022-08-08 06:44:30'),
(125, 20, 'call_request.show', 'Sửa thông tin (Form nhập)', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:31', '2022-08-08 06:44:31'),
(126, 20, 'call_request.index', 'Xem danh sách', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:31', '2022-08-08 06:44:31'),
(127, 21, 'web.source.update', 'Cập nhật mã', NULL, NULL, 'active', 1, 1, '2022-08-08 06:46:40', '2022-08-08 06:46:40'),
(128, 21, 'web.source', 'Xem chi tiết mã', NULL, NULL, 'active', 1, 1, '2022-08-08 06:46:40', '2022-08-08 06:46:40'),
(129, 22, 'order_services.destroy', 'Xóa', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:30', '2022-08-08 06:51:30'),
(130, 22, 'order_services.update', 'Sửa thông tin (Lưu thông tin)', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:30', '2022-08-08 06:51:30'),
(131, 22, 'order_services.edit', 'Sửa thông tin (Form nhập)', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:31', '2022-08-08 06:51:31'),
(132, 22, 'order_services.index', 'Xem danh sách', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:31', '2022-08-08 06:51:31'),
(133, 23, 'order_products.edit', 'Sửa thông tin (Form nhập)', NULL, 1, 'active', 1, 1, '2023-02-09 10:51:44', '2023-02-09 10:53:20'),
(134, 23, 'order_products.index', 'Xem danh sách', NULL, 2, 'active', 1, 1, '2023-02-09 10:52:07', '2023-02-09 10:53:33'),
(135, 23, 'order_products.update', 'Sửa thông tin (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2023-02-09 10:52:34', '2023-02-09 10:53:40'),
(136, 23, 'order_products.destroy', 'Xóa', NULL, 4, 'active', 1, 1, '2023-02-09 10:52:58', '2023-02-09 10:53:47'),
(137, 24, 'reviews.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2023-02-15 04:43:28', '2023-02-15 04:43:28'),
(139, 24, 'reviews.edit', 'Sửa thông tin (Form nhập)', NULL, 2, 'active', 1, 1, '2023-02-15 04:45:50', '2023-02-15 04:45:50'),
(140, 24, 'reviews.update', 'Sửa thông tin (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2023-02-15 04:45:58', '2023-02-15 04:45:58'),
(141, 24, 'reviews.destroy', 'Xóa', NULL, 4, 'active', 1, 1, '2023-02-15 04:46:17', '2023-02-15 04:46:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_options`
--

CREATE TABLE `tb_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  `description` text DEFAULT NULL,
  `is_system_param` tinyint(1) DEFAULT 1,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_options`
--

INSERT INTO `tb_options` (`id`, `option_name`, `option_value`, `description`, `is_system_param`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(2, 'information', '{\"site_name\":\"YOGA STUDIO\",\"brief\":\"Cung c\\u1ea5p c\\u00e1c l\\u1edbp h\\u1ecdc Yoga l\\u1ee3i \\u00edch to\\u00e0n di\\u1ec7n v\\u1edbi ph\\u01b0\\u01a1ng ph\\u00e1p luy\\u1ec7n t\\u1eadp hi\\u1ec7u qu\\u1ea3, d\\u1ec5 d\\u00e0ng\",\"phone\":\"0963 636 363\",\"hotline\":\"0963 636 363\",\"appointment\":\"8:00 - 21:00 Mon - Sun\",\"email\":\"yoga@gmail.com\",\"address\":\"S\\u1ed1 12 BT1 Vinaconex3, Trung V\\u0103n, Ph\\u01b0\\u1eddng Trung V\\u0103n, Qu\\u1eadn Nam T\\u1eeb Li\\u00eam, Th\\u00e0nh ph\\u1ed1 H\\u00e0 N\\u1ed9i, Vi\\u1ec7t Nam\",\"footer\":\"TR\\u1ede TH\\u00c0NH H\\u1ed8I VI\\u00caN & H\\u01af\\u1edeNG \\u01afU \\u0110\\u00c3I 20%\",\"link_footer\":\"\\/lien-he\",\"copyright\":\"\\u00a9 2023 yoga studio, All Rights Reserved\",\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'Các dữ liệu cấu trúc liên quan đến thông tin liên hệ của hệ thống website', 0, 1, 1, '2021-10-02 05:06:00', '2023-07-08 09:48:28'),
(5, 'image', '{\"logo_header\":\"\\/data\\/cms-image\\/Logo\\/logo.png\",\"logo_footer\":\"\\/data\\/cms-image\\/Logo\\/logo.png\",\"favicon\":\"\\/data\\/cms-image\\/Logo\\/logo.png\",\"background_breadcrumbs\":\"\\/data\\/cms-image\\/Images\\/banner4.png\",\"seo_og_image\":\"\\/data\\/cms-image\\/Logo\\/logo.png\",\"image_paymen\":\"\"}', 'Danh sách các hình ảnh cấu hình trên hệ thống tại các vị trí', 0, 1, 1, '2021-10-11 09:22:56', '2023-07-05 07:23:39'),
(6, 'social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/thaiever.vn\",\"youtube\":\"#\",\"instagram\":\"#\",\"tiktok\":\"#\",\"call_now\":\"0963 636 363\",\"zalo\":\"https:\\/\\/zalo.me\\/0904606102\"}', 'Danh sách các Social network của hệ thống', 0, 1, 1, '2022-02-14 10:35:40', '2023-07-04 03:22:14'),
(7, 'page', '{\r\n\"frontend.home\":  1\r\n}', NULL, 0, 1, 1, '2022-05-26 11:03:52', '2022-06-09 04:03:39'),
(8, 'source_code', '{\"header\":null,\"footer\":null,\"map\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3724.0195064744694!2d105.78888961576648!3d21.03190548599662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ade7a42a41c7%3A0xd0905b6cacd304da!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gdGjGsMahbmcgbeG6oWkgRkhNIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1681177457701!5m2!1svi!2s\\\" width=\\\"100%\\\" height=\\\"500\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\"}', NULL, 0, 1, 1, '2022-06-07 02:24:11', '2023-07-05 04:49:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_orders`
--

CREATE TABLE `tb_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) NOT NULL DEFAULT 'product',
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_note` text DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_orders`
--

INSERT INTO `tb_orders` (`id`, `is_type`, `customer_id`, `name`, `email`, `phone`, `address`, `product_id`, `customer_note`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'service', NULL, 'Quản lý đăng ký sự kiện', 'thangnh.edu@gmail.com', '0912 568 999', NULL, NULL, NULL, NULL, NULL, 'new', NULL, NULL, '2022-10-31 09:46:37', '2022-10-31 09:46:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order_details`
--

CREATE TABLE `tb_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL,
  `customer_note` text DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_order_details`
--

INSERT INTO `tb_order_details` (`id`, `order_id`, `item_id`, `quantity`, `price`, `discount`, `customer_note`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 1, 44, 1, 5000000.00, NULL, NULL, NULL, '{\"post_type\":\"product\",\"post_link\":\"http:\\/\\/fhmvn.test\\/kho-giao-dien\\/ban-hang\\/mau-website-ban-hang-01-44.html\"}', NULL, NULL, NULL, '2022-10-31 09:46:38', '2022-10-31 09:46:38'),
(2, 2, 44, 1, 5000000.00, NULL, NULL, NULL, '{\"post_type\":\"product\",\"post_link\":\"http:\\/\\/fhmvn.test\\/kho-giao-dien\\/ban-hang\\/mau-website-ban-hang-01-44.html\"}', NULL, NULL, NULL, '2022-10-31 10:02:12', '2022-10-31 10:02:12'),
(7, 5, 54, 2, 21.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 5, 57, 1, 12.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 10, 54, 1, 21.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 11, 61, 1, 21.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, 147, 3, 1059000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_pages`
--

CREATE TABLE `tb_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `route_name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_page` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_pages`
--

INSERT INTO `tb_pages` (`id`, `name`, `title`, `keyword`, `description`, `content`, `route_name`, `alias`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`, `is_page`) VALUES
(1, 'Trang chủ', NULL, NULL, NULL, NULL, 'frontend.home', 'trang-chu', '{\"og_image\":null,\"template\":\"home.primary\",\"block_content\":[74,370,382,391,387,390,365]}', 1, 'active', 1, 1, '2022-03-23 09:35:33', '2023-07-04 07:50:01', 1),
(33, 'Giới thiệu', 'Giới thiệu', NULL, NULL, NULL, 'frontend.aboutus', 'gioi-thieu', '{\"og_image\":null,\"template\":\"aboutus.primary\",\"block_content\":[393,394,391,365]}', 2, 'active', 1, 1, '2023-02-03 07:08:31', '2023-07-05 09:44:09', 1),
(38, 'Danh mục', 'Danh mục', NULL, NULL, NULL, 'frontend.cms.taxonomy', 'danh-muc', '{\"og_image\":null,\"template\":\"post.default\",\"block_content\":[94]}', 99, 'active', 1, 1, '2023-04-10 10:24:06', '2023-07-04 10:22:38', 1),
(39, 'Chi tiết', NULL, NULL, NULL, NULL, 'frontend.cms.detail', 'chi-tiet', '{\"og_image\":null,\"template\":\"post.detail\",\"block_content\":[94]}', 99, 'active', 1, 1, '2023-04-10 10:24:29', '2023-07-05 18:22:48', 1),
(47, 'Liên kết', 'Liên kết', NULL, NULL, NULL, 'frontend.page', 'lien-ket', '{\"og_image\":null,\"template\":\"page.default\",\"block_content\":[403,407,412]}', 4, 'active', 1, 1, '2023-07-06 02:58:35', '2023-07-07 01:49:51', 1),
(48, 'Liên hệ', 'Liên hệ', NULL, NULL, NULL, 'frontend.contact', 'lien-he', '{\"og_image\":null,\"template\":\"contact.default\",\"block_content\":[399,94]}', 3, 'active', 1, 1, '2023-07-06 03:02:54', '2023-07-07 01:50:03', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_popups`
--

CREATE TABLE `tb_popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_popups`
--

INSERT INTO `tb_popups` (`id`, `title`, `content`, `image`, `json_params`, `start_time`, `end_time`, `duration`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Home Popup', '<p>Nullam mollis ultrices est. Nulla in justo lacinia, scelerisque purus et, semper tortor. Donec bibendum leo vitae commodo porttitor. Proin tempus sollicitudin odio in feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices vitae nisl tristique commodo. Phasellus porttitor metus at mattis ultricies. In imperdiet nec nunc in tincidunt.</p>\r\n\r\n<p>Curabitur faucibus dolor at dui lobortis, eget dictum nisi mattis. Fusce risus dui, fringilla non elit sit amet, lobortis interdum eros. Donec mattis lectus quis elit fermentum lacinia. Nullam at ligula semper ante mollis pretium. Nam euismod velit ut quam accumsan vestibulum. Etiam diam augue, dapibus ac placerat nec, accumsan eget nibh. Cras sodales, leo ut volutpat laoreet, velit enim pharetra magna, at dapibus lacus elit vel mi. Nullam a massa ac ligula scelerisque maximus. Quisque dictum quis lorem ut sodales. Duis at semper odio. Morbi in sapien vel lacus posuere mattis ac eget ante. Etiam viverra accumsan rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '/data/cms-image/banner/no-banner.jpg', '{\"page\":[\"1\",\"3\",\"4\"]}', '2022-06-27 00:00:00', '2022-06-28 00:00:00', 5, 'active', 1, 1, '2022-06-27 15:22:00', '2022-06-27 18:01:38'),
(2, 'Thông báo bảo trì hệ thống', NULL, '/data/cms-image/banner/1.jpg', '{\"page\":[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"13\",\"14\",\"15\",\"16\"]}', '2022-06-28 00:00:00', '2022-06-28 00:00:00', NULL, 'deactive', 1, 1, '2022-06-27 15:42:38', '2022-06-27 18:10:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_product_detail`
--

CREATE TABLE `tb_product_detail` (
  `id` int(11) NOT NULL,
  `type` int(3) NOT NULL DEFAULT 1 COMMENT 'thuê:1 hoặc mua:2',
  `city` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL COMMENT 'giá',
  `type_price` int(3) DEFAULT 0 COMMENT 'thuê theo ngày:1 tuần:2 tháng:3 năm:4',
  `bedrooom` int(11) DEFAULT NULL COMMENT 'p ngủ',
  `bathrooom` int(11) DEFAULT NULL COMMENT 'p tắm',
  `spft` int(11) DEFAULT NULL COMMENT 'diện tích',
  `json_user` longtext DEFAULT NULL,
  `json_product` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_product_detail`
--

INSERT INTO `tb_product_detail` (`id`, `type`, `city`, `price`, `type_price`, `bedrooom`, `bathrooom`, `spft`, `json_user`, `json_product`, `updated_at`, `created_at`) VALUES
(118, 1, 5, 1808000, 3, 5, 5, 500, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-04-07 03:35:04', '2023-02-08 03:17:46'),
(119, 1, 7, 7000000, 3, 3, 3, 300, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-08 07:33:11', '2023-02-08 03:19:58'),
(120, 1, NULL, 30000, 1, 1, 333, NULL, '{\"name\":\"wfwfw\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-08 03:20:50', '2023-02-08 03:20:50'),
(121, 2, 5, 300000000, 0, 6, 6, 500, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-08 07:33:12', '2023-02-08 04:00:31'),
(122, 1, 101, 91000000, 4, 8, 8, 333, '{\"name\":null}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:50:17', '2023-02-13 07:53:16'),
(123, 1, 5, 60000000, 4, 5, 5, 200, '{\"name\":null}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-04-06 10:34:43', '2023-02-13 07:53:25'),
(124, 2, 3, 900000000, 0, 4, 4, 300, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:50:14', '2023-02-13 07:54:54'),
(125, 2, 3, 700000000, 0, 5, 5, 50, '{\"name\":null}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-04-06 10:35:05', '2023-02-13 08:03:04'),
(126, 1, 9, 6000000, 3, 1, 1, 60, '{\"name\":\"Kudo2\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:50:09', '2023-02-13 08:08:49'),
(127, 2, 125, 1200000000, 0, 3, 3, 120, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:50:04', '2023-02-13 08:13:55'),
(128, 1, 105, 6000000, 3, 1, 1, 50, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-04-06 10:35:15', '2023-02-13 08:16:00'),
(129, 1, 114, 7000000, 1, 2, 2, 80, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:50:00', '2023-02-13 08:16:54'),
(130, 2, 5, 2000000000, 0, 4, 4, 150, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:50:02', '2023-02-13 08:18:26'),
(131, 2, 5, 900000000, 0, 4, 4, 145, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-04-06 10:35:27', '2023-02-13 08:19:40'),
(132, 1, 7, 6500000, 1, 3, 3, 80, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:49:57', '2023-02-13 08:20:30'),
(133, 2, 3, 800000000, 0, 8, 8, 200, '{\"name\":\"Kudo\"}', '{\"space\":[\"N\\u0103m x\\u00e2y d\\u1ef1ng: 2021\",\"Di\\u1ec7n t\\u00edch h\\u00ecnh vu\\u00f4ng: 1401\",\"Ph\\u00f2ng kh\\u00e1ch: 12\",\"Ph\\u00f2ng t\\u1eafm: 2\",\"Ph\\u00f2ng ng\\u1ee7: 3\",\"Ban c\\u00f4ng: 3\",\"Ch\\u1ed7 \\u0111\\u1eadu xe h\\u01a1i: 5\",\"T\\u1ed5ng s\\u1ed1 t\\u1ea7ng: 25\",\"B\\u1ebfp: 1\",\"Nh\\u00e0 \\u0111\\u1ec3 xe: 1\",\"H\\u1ed3 b\\u01a1i: 2\",\"B\\u1ea3o hi\\u1ec3m: C\\u00f3\"],\"convenient\":{\"icon\":[\"icon-realestate-garage2\",\"icon-realestate-balcony\",\"icon-realestate-wood\",\"icon-realestate-realtor\",\"icon-realestate-fireplace\",\"icon-realestate-barrow\",\"icon-realestate-air-conditioning\",\"icon-realestate-restaurant\",\"icon-realestate-vacuum-cleaner\",\"icon-realestate-washing-machine\",\"icon-realestate-ventilation\",\"icon-realestate-phone2\",\"icon-realestate-tv\",\"icon-realestate-shower\",\"icon-realestate-parking\"],\"name\":[\"Gara \\u0111\\u1ed7 xe\",\"Ban c\\u00f4ng\",\"V\\u01b0\\u1eddn\",\"B\\u1ea3o v\\u1ec7\",\"l\\u00f2 s\\u01b0\\u1edfi\",\"N\\u00f4ng th\\u00f4n\",\"\\u0110i\\u1ec1u h\\u00f2a\",\"Th\\u1ecbt n\\u01b0\\u1edbng\",\"L\\u00f2 vi s\\u00f3ng\",\"M\\u00e1y gi\\u1eb7t\",\"Th\\u00f4ng gi\\u00f3\",\"\\u0110i\\u1ec7n tho\\u1ea1i\",\"Tivi\",\"V\\u00f2i t\\u1eafm\",\"B\\u00e3i \\u0111\\u1eadu xe\"]}}', '2023-02-13 08:49:49', '2023-02-13 08:21:30'),
(140, 1, NULL, 1059000, 0, NULL, NULL, NULL, NULL, NULL, '2023-04-07 04:16:39', '2023-04-07 04:16:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_reviews`
--

CREATE TABLE `tb_reviews` (
  `id` bigint(20) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_reviews`
--

INSERT INTO `tb_reviews` (`id`, `id_product`, `name`, `email`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(6, 118, 'manh2', 'manh22@gmail.com', 'KHÓ nhỉ22', 2, 'delete', '2023-01-04 10:37:14', '2023-03-01 03:02:16'),
(7, 118, 'Ẩn danh boy', 'andanh@gmail.com', 'Đợt em gom dòg dưỡg 3ce khách em khen nhiều lắm, kiểu bóng như tiêm filler í! Yêu lắm! Đợt này toàn màu xinh hot trend nhìn mê thật  Đợt em gom dòg dưỡg 3ce khách em khen nhiều lắm, kiểu bóng như tiêm filler í! Yêu lắm! Đợt này toàn màu xinh hot trend nhìn mê thật  Đợt em gom dòg dưỡg 3ce khách em khen nhiều lắm, kiểu bóng như tiêm filler í! Yêu lắm! Đợt này toàn màu xinh hot trend nhìn mê thật  Đợt em gom dòg dưỡg 3ce khách em khen nhiều lắm, kiểu bóng như tiêm filler í! Yêu lắm! Đợt này toàn màu xinh hot trend nhìn mê thật  Đợt em gom dòg dưỡg 3ce khách em khen nhiều lắm, kiểu bóng như tiêm filler í! Yêu lắm! Đợt này toàn màu xinh hot trend nhìn mê thật', 5, 'delete', '2023-01-04 10:42:40', '2023-02-15 04:35:12'),
(8, 118, 'Thah', 'rg@mail.com', 'Đánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giáĐánh giá', 5, 'new', '2023-01-04 10:48:09', NULL),
(9, 118, 'Manh', 'djsfkl@gmail.com', 'dsadsa', 5, 'new', '2023-01-05 03:51:26', NULL),
(10, 118, 'thanh test', 'test@gmail.com', 'dfd', 1, 'new', '2023-01-06 02:47:08', NULL),
(11, 118, 'thanh', 'thanh@gmail.com', 'ddđ', 4, 'new', '2023-02-07 02:45:04', NULL),
(12, 118, 'Thanh Kduo', 'thanh@gmail.com', 'Đây là đánh giá tổng quan về chung cư cao cấp hiện đại, ns chung là cũng nên mua', 5, 'new', '2023-02-15 02:41:52', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `json_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_access`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `name`, `description`, `json_access`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Quyền quản trị nội dung', 'Dành cho nhân viên thiết kế và cập nhật nội dung', '{\"menu_id\":[\"72\",\"62\",\"59\",\"51\",\"52\",\"53\",\"73\",\"13\",\"70\",\"46\",\"45\",\"44\",\"71\",\"58\",\"42\",\"41\",\"17\"],\"function_code\":[\"contacts.index\",\"contacts.create\",\"contacts.store\",\"contacts.edit\",\"contacts.update\",\"cms_taxonomys.index\",\"cms_taxonomys.create\",\"cms_taxonomys.store\",\"cms_taxonomys.edit\",\"cms_taxonomys.update\",\"cms_posts.index\",\"cms_posts.create\",\"cms_posts.store\",\"cms_posts.edit\",\"cms_posts.update\",\"call_request.index\",\"call_request.show\",\"call_request.update\",\"cms_products.index\",\"cms_products.create\",\"cms_products.store\",\"cms_products.edit\",\"cms_products.update\",\"web.social\",\"web.social.update\",\"web.information\",\"web.information.update\",\"web.image\",\"web.image.update\",\"web.source\",\"web.source.update\",\"menus.index\",\"menus.create\",\"menus.store\",\"menus.edit\",\"menus.update\",\"pages.index\",\"pages.create\",\"pages.store\",\"pages.edit\",\"pages.update\",\"block_contents.index\",\"block_contents.create\",\"block_contents.store\",\"block_contents.edit\",\"block_contents.update\",\"admins.index\",\"admins.create\",\"admins.store\",\"admins.edit\",\"admins.update\"]}', 1, 'active', 1, 1, '2021-10-02 10:59:48', '2023-07-08 08:04:35'),
(2, 'Quản trị hệ thống', 'Quyền dành cho người quản trị hệ thống', '{\"menu_id\":[\"72\",\"62\",\"59\",\"51\",\"52\",\"53\",\"73\",\"13\",\"70\",\"46\",\"45\",\"44\",\"71\",\"58\",\"42\",\"41\",\"17\",\"10\",\"3\",\"5\",\"6\",\"76\",\"77\",\"79\",\"78\",\"80\"],\"function_code\":[\"contacts.index\",\"contacts.create\",\"contacts.store\",\"contacts.edit\",\"contacts.update\",\"contacts.destroy\",\"cms_taxonomys.index\",\"cms_taxonomys.create\",\"cms_taxonomys.store\",\"cms_taxonomys.edit\",\"cms_taxonomys.update\",\"cms_taxonomys.destroy\",\"cms_posts.index\",\"cms_posts.create\",\"cms_posts.store\",\"cms_posts.edit\",\"cms_posts.update\",\"cms_posts.destroy\",\"call_request.index\",\"call_request.show\",\"call_request.update\",\"call_request.destroy\",\"cms_products.index\",\"cms_products.create\",\"cms_products.store\",\"cms_products.edit\",\"cms_products.update\",\"cms_products.destroy\",\"web.social\",\"web.social.update\",\"web.information\",\"web.information.update\",\"web.image\",\"web.image.update\",\"web.source\",\"web.source.update\",\"menus.index\",\"menus.create\",\"menus.store\",\"menus.edit\",\"menus.update\",\"menus.destroy\",\"pages.index\",\"pages.create\",\"pages.store\",\"pages.edit\",\"pages.update\",\"pages.destroy\",\"block_contents.index\",\"block_contents.create\",\"block_contents.store\",\"block_contents.edit\",\"block_contents.update\",\"block_contents.destroy\",\"admins.index\",\"admins.create\",\"admins.store\",\"admins.edit\",\"admins.update\",\"admins.destroy\",\"roles.index\",\"roles.create\",\"roles.store\",\"roles.edit\",\"roles.update\",\"roles.destroy\",\"admin_menus.index\",\"admin_menus.create\",\"admin_menus.store\",\"admin_menus.edit\",\"admin_menus.update\",\"admin_menus.destroy\"]}', 2, 'active', 1, 1, '2021-10-02 11:28:09', '2023-07-08 08:03:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_widgets`
--

CREATE TABLE `tb_widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_code` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `brief` text DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_widgets`
--

INSERT INTO `tb_widgets` (`id`, `widget_code`, `title`, `brief`, `json_params`, `image`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'header', 'Header Style 1', 'Header 1 brief content', '{\"layout\":null,\"style\":null,\"component\":[\"1\",\"2\"]}', NULL, 10, 'active', 1, 1, '2022-05-04 14:59:07', '2022-05-10 07:29:20'),
(2, 'footer', 'Footer Style 1', NULL, '{\"layout\":null,\"style\":null,\"component\":[\"2\",\"1\"]}', NULL, 20, 'active', 1, 1, '2022-05-10 07:29:03', '2022-05-10 07:29:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_widget_configs`
--

CREATE TABLE `tb_widget_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `widget_code` varchar(255) NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_config` tinyint(1) NOT NULL DEFAULT 1,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_widget_configs`
--

INSERT INTO `tb_widget_configs` (`id`, `name`, `description`, `widget_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Header', NULL, 'header', NULL, 1, 1, 'active', 1, 1, '2022-04-26 09:40:39', '2022-04-26 09:40:39'),
(2, 'Footer', NULL, 'footer', NULL, 1, 2, 'active', 1, 1, '2022-04-26 09:42:09', '2022-04-26 09:42:09'),
(3, 'Left Sidebar', NULL, 'left_sidebar', NULL, 1, 3, 'active', 1, 1, '2022-04-26 09:42:46', '2022-04-26 09:42:46'),
(4, 'Right Sidebar', NULL, 'right_sidebar', NULL, 1, 4, 'active', 1, 1, '2022-04-26 09:43:02', '2022-04-26 09:43:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `affiliate_code` varchar(255) DEFAULT NULL,
  `total_score` double NOT NULL DEFAULT 0,
  `total_money` double NOT NULL DEFAULT 0,
  `total_payment` double NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verification_code` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `is_super_user` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `count_view_info` int(11) NOT NULL DEFAULT 0,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `json_profiles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_profiles`)),
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `affiliate_id`, `affiliate_code`, `total_score`, `total_money`, `total_payment`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `email_verified`, `email_verification_code`, `status`, `is_super_user`, `avatar`, `birthday`, `sex`, `phone`, `count_view_info`, `country_id`, `city_id`, `district_id`, `json_params`, `json_profiles`, `admin_updated_id`) VALUES
(2, NULL, '2', 105091500, 105091500, 0, 'Thắng Nguyễn', 'meta_thangnh', NULL, '$2y$10$V78sbM3Ny/Tvd/bWOLjCLeDDSgLmwlds8tWQh/nhXWCcQheYbtcQy', NULL, '2022-07-11 02:33:03', '2022-07-14 04:28:17', NULL, 0, NULL, 'active', 0, NULL, NULL, 'male', '098 226 9600', 0, NULL, NULL, NULL, NULL, NULL, 1),
(3, 2, 'mRpdEly6Bx3', 79243750, 79243750, 25850000, 'Thắng Nguyễn EDU', 'huuthangb2k50@gmail.com', NULL, '$2y$10$FLuZlM/WTtFZPKJW4PyC0efVJeTFeWSzichj1d/55v7Qe0aoEKVJu', NULL, '2022-07-11 03:04:45', '2022-07-14 04:28:17', NULL, 0, NULL, 'active', 0, NULL, NULL, 'male', '096 220 92 11', 0, NULL, NULL, NULL, NULL, NULL, 1),
(4, 3, 'qBmtRsfkwH4', 0, 0, 0, 'Thắng Nguyễn 2', 'meta_test', NULL, '$2y$10$SGOy7paQ82Pt8lbIg1Z0nuAhCR04yxYTIhXbqbK.3HoSSO/FIrumy', NULL, '2022-07-11 03:20:37', '2022-07-11 03:20:37', NULL, 0, NULL, 'active', 0, NULL, NULL, 'female', '1900 1570', 0, NULL, NULL, NULL, NULL, NULL, 1),
(5, 4, 'U7fj3GtOb95', 0, 0, 0, 'Nguyễn Hữu Thắng', 'meta_thangnguyen', NULL, '$2y$10$qb4Y74yT4dQhwk3ER8Cyq.qZBbif//5SLb3JK7PWysraIQ43Gnu/y', NULL, '2022-07-11 03:53:11', '2022-07-11 03:53:11', NULL, 0, NULL, 'active', 0, NULL, NULL, 'male', '0936.267.568', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'lM2Z3vEmFM6', 0, 0, 0, 'Bắc Hà AFL', 'meta_bacha', NULL, '$2y$10$36l5V8DsEp7rWar78gGaZe2XvrtKfg6qD/XvB/n/DFj7cg8iwF18y', NULL, '2022-07-11 18:08:34', '2022-07-11 18:08:34', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '0936.267.568', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'ajXYJMQwtg7', 0, 0, 0, 'Lịch sử Apply', 'test_lai@gmail.com', NULL, '$2y$10$h2VUcj4EumZJHqG/ERzGDex59lR0qff6gkqD/9G4k8NlgE0ASaBEC', NULL, '2022-07-11 18:11:04', '2022-07-11 18:11:04', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '0912 568 999', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, '1mQVhkwtR38', 0, 0, 0, 'Đặt lại mật khẩu', 'huuthangb2k250@gmail.com', NULL, '$2y$10$h2VUcj4EumZJHqG/ERzGDex59lR0qff6gkqD/9G4k8NlgE0ASaBEC', NULL, '2022-07-11 18:13:20', '2022-07-11 18:13:20', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '098 226 9600', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 4, 'mLu1qHUYPF9', 0, 0, 0, 'Tags', 'test2@gmail.com', NULL, '$2y$10$g5hcIFbN9zr37wiikne1CuEmLMUC9JMUDfjvyu1URsUGCTLV5h5FK', NULL, '2022-07-11 18:25:50', '2022-07-11 18:30:37', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '1900 1570', 0, NULL, NULL, NULL, NULL, NULL, 1),
(10, NULL, NULL, 0, 0, 0, 'thahtht', 'huuthsssangb2k50@gmail.com', NULL, '$2y$10$.GBS7UiUSPUQlXVgU5gtc.9vTuVC8l840g6sMth25Sq0bxwlIHkg6', NULL, '2023-02-13 10:37:32', '2023-02-13 10:37:32', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '452525234234', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, 0, 0, 0, 'ssssss', 'huutssshangb2k50@gmail.com', NULL, '$2y$10$ddNjLDQbO6nFvrAeiMfSXuYBPodeeKGvA9Q9DZb0PnEsn7kUD7Fq6', NULL, '2023-02-13 10:39:16', '2023-02-13 10:39:16', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '0332792626', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, 0, 0, 0, 'dd', 'duonddghiepit@gmail.com', NULL, '$2y$10$hYiXDY37aWD5E1tP3EEmUueovgP.W6R/HqlShTpix4MaNRiV5jd3q', NULL, '2023-02-13 10:52:41', '2023-02-13 10:52:41', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '0332792626', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 0, 0, 0, 'Thanh Kudo', 'donhuthanhxom@gmail.com', NULL, '$2y$10$FPnMMkSu9rX81JiVqASqquSM6KI7btlY7/zjlRxIRonCTBf.0tG7u', NULL, '2023-02-14 08:06:57', '2023-02-14 08:06:57', NULL, 0, 'I8vroWc2YHpO', 'pending', 0, NULL, NULL, NULL, '0355820911', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, 0, 0, 0, 'huuthangb2k50@gmail.com', 'huutdddddhangb2k50@gmail.com', NULL, '$2y$10$Ukt6lh7SvCJb8J7ngJK8D.bP3LYZ9LiHfEer6C9rKPgoum6CwpVDS', NULL, '2023-02-14 08:53:52', '2023-02-14 08:53:52', NULL, 0, 'P4NLF8TaEGM8', 'pending', 0, NULL, NULL, NULL, '0332792626', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, 0, 0, 0, 'huuthangb2k50@gmail.com', 'huuthdangb2k50@gmail.com', NULL, '$2y$10$.ZbeYbDhfVSepkvdodzTfeKnitYiP2JchgkzVIYZsaiTQTqNpdXf2', NULL, '2023-02-14 09:11:47', '2023-02-14 09:11:47', NULL, 0, '8EsEtdWb5SqJ', 'pending', 0, NULL, NULL, NULL, '0332792626', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, 0, 0, 0, 'manh', 's@gmail.com', NULL, '$2y$10$VsEclPXcuQ60J9wKp78KFOFsPaJWSfHz.ISdQuS9yV6g.UUPC/p6q', NULL, '2023-02-16 03:23:37', '2023-02-16 03:23:37', NULL, 0, 'GAAm3kEKBCwq', 'pending', 0, NULL, NULL, NULL, 'd', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, 0, 0, 0, 'Lê Mạnh Tưởng', 'tuonglee1001@gmail.com', NULL, '$2y$10$PJz16v3c3dyLzllqy5doN.TTBDrciLNnv5dKvawSoXXlt6HadRfum', NULL, '2023-03-17 03:52:00', '2023-03-17 03:52:00', NULL, 0, '7vNVSA0z2fUk', 'pending', 0, NULL, NULL, NULL, '0388830059', 0, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `admins_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Chỉ mục cho bảng `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_admin_menus_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_admin_menus_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_affiliate_historys`
--
ALTER TABLE `tb_affiliate_historys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_affiliate_historys_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_affiliate_historys_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_affiliate_payments`
--
ALTER TABLE `tb_affiliate_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_affiliate_payments_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_affiliate_payments_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_blocks`
--
ALTER TABLE `tb_blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_blocks_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_blocks_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_block_contents_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_block_contents_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_bookings_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_bookings_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_branchs`
--
ALTER TABLE `tb_branchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_branchs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_branchs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cms_posts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_cms_posts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cms_taxonomys_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_cms_taxonomys_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_components`
--
ALTER TABLE `tb_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_components_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_components_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_component_configs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_component_configs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_contacts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_contacts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_menus_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_menus_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_modules`
--
ALTER TABLE `tb_modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_modules_module_code_unique` (`module_code`),
  ADD KEY `tb_modules_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_modules_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_module_functions_function_code_unique` (`function_code`),
  ADD KEY `tb_module_functions_module_id_foreign` (`module_id`),
  ADD KEY `tb_module_functions_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_module_functions_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_options`
--
ALTER TABLE `tb_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_options_option_name_unique` (`option_name`),
  ADD KEY `tb_options_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_options_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `tb_orders_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_orders_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_order_details_order_id_foreign` (`order_id`),
  ADD KEY `tb_order_details_item_id_foreign` (`item_id`),
  ADD KEY `tb_order_details_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_order_details_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pages_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_pages_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_popups`
--
ALTER TABLE `tb_popups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_popups_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_popups_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_product_detail`
--
ALTER TABLE `tb_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_roles_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_roles_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_widgets`
--
ALTER TABLE `tb_widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_widgets_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_widgets_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_widget_configs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_widget_configs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_admin_updated_id_foreign` (`admin_updated_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `tb_affiliate_historys`
--
ALTER TABLE `tb_affiliate_historys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tb_affiliate_payments`
--
ALTER TABLE `tb_affiliate_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tb_blocks`
--
ALTER TABLE `tb_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT cho bảng `tb_bookings`
--
ALTER TABLE `tb_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_branchs`
--
ALTER TABLE `tb_branchs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT cho bảng `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tb_components`
--
ALTER TABLE `tb_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_menus`
--
ALTER TABLE `tb_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `tb_modules`
--
ALTER TABLE `tb_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `tb_options`
--
ALTER TABLE `tb_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tb_order_details`
--
ALTER TABLE `tb_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tb_pages`
--
ALTER TABLE `tb_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tb_popups`
--
ALTER TABLE `tb_popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_reviews`
--
ALTER TABLE `tb_reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_widgets`
--
ALTER TABLE `tb_widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `admins_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  ADD CONSTRAINT `tb_admin_menus_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_admin_menus_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_affiliate_historys`
--
ALTER TABLE `tb_affiliate_historys`
  ADD CONSTRAINT `tb_affiliate_historys_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_affiliate_historys_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_affiliate_payments`
--
ALTER TABLE `tb_affiliate_payments`
  ADD CONSTRAINT `tb_affiliate_payments_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_affiliate_payments_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_blocks`
--
ALTER TABLE `tb_blocks`
  ADD CONSTRAINT `tb_blocks_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_blocks_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  ADD CONSTRAINT `tb_block_contents_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_block_contents_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD CONSTRAINT `tb_bookings_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_bookings_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_branchs`
--
ALTER TABLE `tb_branchs`
  ADD CONSTRAINT `tb_branchs_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_branchs_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  ADD CONSTRAINT `tb_cms_posts_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_cms_posts_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  ADD CONSTRAINT `tb_cms_taxonomys_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_cms_taxonomys_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_components`
--
ALTER TABLE `tb_components`
  ADD CONSTRAINT `tb_components_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_components_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  ADD CONSTRAINT `tb_component_configs_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_component_configs_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD CONSTRAINT `tb_contacts_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_contacts_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD CONSTRAINT `tb_menus_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_menus_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_modules`
--
ALTER TABLE `tb_modules`
  ADD CONSTRAINT `tb_modules_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_modules_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  ADD CONSTRAINT `tb_module_functions_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_module_functions_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_options`
--
ALTER TABLE `tb_options`
  ADD CONSTRAINT `tb_options_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_options_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_orders_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD CONSTRAINT `tb_order_details_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_order_details_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD CONSTRAINT `tb_pages_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_pages_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_popups`
--
ALTER TABLE `tb_popups`
  ADD CONSTRAINT `tb_popups_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_popups_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD CONSTRAINT `tb_roles_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_roles_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_widgets`
--
ALTER TABLE `tb_widgets`
  ADD CONSTRAINT `tb_widgets_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_widgets_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  ADD CONSTRAINT `tb_widget_configs_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_widget_configs_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
