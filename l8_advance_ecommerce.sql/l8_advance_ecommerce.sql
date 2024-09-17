-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2023 at 04:07 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l8_advance_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$t856NPuiHwUskDxyinbjfu1PNJXYL3LiwoXD11KXJ8r/CxaIaAPMe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(9, 'Kiam', NULL, NULL, '2023-08-08 01:50:56'),
(8, 'Sony', 'upload/brand_images/475579801.laravel1.jpg', NULL, '2023-08-08 01:51:40'),
(7, 'Apple', 'upload/brand_images/91164016.blog3.jpg', NULL, '2023-08-08 01:51:51'),
(6, 'Toshiba', 'upload/brand_images/1865705820.blog2.jpg', NULL, '2023-08-08 01:52:03'),
(10, 'Buzzaz', NULL, NULL, NULL),
(11, 'Suzuki', NULL, NULL, NULL),
(12, 'Yamaha', NULL, NULL, NULL),
(13, 'Apache', NULL, NULL, NULL),
(14, 'Shorif', NULL, NULL, NULL),
(15, 'Tanin', NULL, NULL, NULL),
(16, 'RFL', NULL, NULL, NULL),
(17, 'Unileaver', NULL, NULL, NULL),
(18, 'Brothers', NULL, NULL, NULL),
(19, 'Sajid', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `created_at`, `updated_at`) VALUES
(10, 'Plastics', NULL, '2023-07-25 22:04:19', '2023-08-08 01:05:49'),
(2, 'Electronics', NULL, '2023-07-24 04:19:19', '2023-08-08 01:05:02'),
(3, 'Cosmetics', NULL, '2023-07-24 04:19:25', '2023-08-08 01:05:16'),
(4, 'Mechanics', NULL, '2023-07-24 04:19:37', '2023-08-08 01:05:28'),
(5, 'Fruit', NULL, '2023-07-24 04:19:42', '2023-08-08 01:06:01'),
(12, 'Electric', NULL, '2023-08-09 11:36:30', '2023-08-09 11:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

DROP TABLE IF EXISTS `childcategories`;
CREATE TABLE IF NOT EXISTS `childcategories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `childcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `category_id`, `subcategory_id`, `childcategory_name`, `created_at`, `updated_at`) VALUES
(7, 10, 18, 'Plastic-A2', NULL, '2023-08-08 01:12:55'),
(6, 10, 18, 'Plastic-A1', NULL, '2023-08-08 01:13:02'),
(3, 4, 8, 'Mechanics-A1', NULL, '2023-08-08 01:14:08'),
(4, 4, 8, 'Mechanics-A2', NULL, '2023-08-08 01:14:17'),
(5, 4, 8, 'Mechanics-A3', NULL, '2023-08-08 01:14:26'),
(16, 10, 20, 'Plastic-C3', NULL, '2023-08-08 01:13:15'),
(15, 10, 20, 'Plastic-C2', NULL, '2023-08-08 01:13:33'),
(14, 10, 20, 'Plastic-C1', NULL, '2023-08-08 01:13:43'),
(13, 2, 12, 'Electronics-A1', NULL, '2023-08-08 01:14:55'),
(17, 3, 24, 'Cosmetics-A1', NULL, NULL),
(18, 3, 24, 'Cosmetics-A2', NULL, NULL),
(19, 3, 24, 'Cosmetics-A3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int DEFAULT NULL,
  `amount` int NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `valid_date`, `type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mycoupon23', '2023-12-30', 1, 1000, '1', NULL, '2023-08-20 08:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_20_135248_create_admins_table', 1),
(6, '2023_07_09_044236_create_categories_table', 1),
(7, '2023_07_26_011735_create_subcategories_table', 2),
(8, '2023_07_26_024413_create_childcategories_table', 3),
(9, '2023_07_30_104400_create_brands_table', 4),
(10, '2023_07_31_145720_create_warehouses_table', 5),
(11, '2023_07_31_155825_create_coupons_table', 6),
(12, '2023_07_31_185426_create_products_table', 7),
(13, '2023_07_31_191746_create_pickuppoints_table', 8),
(14, '2023_08_01_220413_create_product_multi_images_table', 9),
(15, '2023_08_12_133824_create_reviews_table', 10),
(16, '2023_08_13_153748_create_wishlists_table', 11),
(18, '2023_08_15_110541_create_shopping_carts_table', 12),
(19, '2023_08_20_174216_create_orders_table', 13),
(20, '2023_08_20_174229_create_orderdetails_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_quantity` int NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `product_quantity`, `price`, `color`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '5000', 'red', '1', NULL, NULL),
(2, 2, 5, 1, '1000', 'red', '1', NULL, NULL),
(3, 2, 6, 1, '5000', 'red', '1', NULL, NULL),
(4, 3, 8, 6, '300', 'red', '1', NULL, NULL),
(5, 3, 9, 5, '2000', 'red', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_shipping_address` text COLLATE utf8mb4_unicode_ci,
  `c_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_extra_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `c_name`, `c_phone`, `c_country`, `c_shipping_address`, `c_email`, `c_zipcode`, `c_extra_phone`, `c_city`, `coupon_code`, `coupon_discount`, `subtotal`, `total`, `payment_type`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'user', '01306688607', 'Bangladesh', 'singra', 'rezaulmimi1991@gmail.com', 'dfasfas', '02222', 'singra', 'mycoupon23', '1000', '5000', '4000', 'hand_cash', '2023-09-12', '0', NULL, NULL),
(2, 1, 'user', '225566', 'Bangladesh', 'zgddh', 'rezaulmimi1991@gmail.com', 'dfasfas', '02222', 'singra', NULL, NULL, '6000', '6000', 'hand_cash', '2023-09-12', '0', NULL, NULL),
(3, 1, 'user', '01719475187', 'Bangladesh', 'dbcfncgn', 'rezaulmimi1991@gmail.com', 'dfasfas', '01306688607', 'singra', 'mycoupon23', '1000', '11800', '10800', 'hand_cash', '2023-09-24', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickuppoints`
--

DROP TABLE IF EXISTS `pickuppoints`;
CREATE TABLE IF NOT EXISTS `pickuppoints` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickuppoints`
--

INSERT INTO `pickuppoints` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(4, 'pickup2', 'asggsg', '6677', '2023-08-07 09:35:38', '2023-08-07 09:35:38'),
(3, 'pickup1', 'fsfgdgsdgsdgsdsd', '4364', '2023-08-07 09:35:20', '2023-08-07 09:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_id` int DEFAULT NULL,
  `childcategory_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `pickup_point_id` int DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int DEFAULT NULL,
  `today_deal` int DEFAULT NULL,
  `product_view` int NOT NULL DEFAULT '0',
  `status` int DEFAULT NULL,
  `flash_deal_id` int DEFAULT NULL,
  `cash_on_delivery` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `pickup_point_id`, `name`, `code`, `unit`, `color`, `size`, `tags`, `video`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `warehouse`, `description`, `thumbnail`, `featured`, `today_deal`, `product_view`, `status`, `flash_deal_id`, `cash_on_delivery`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 3, 11, 3, 'Suzuki Jikjar', 'suzuki123', '120', 'red', '20', 'jikjar', 'sggsdg', NULL, '200000', '1500', '20', 5, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/1489393058.mecahnic-motorcycle.jpeg', 1, 1, 20, 0, NULL, NULL, '2023-08-08 02:03:04', '2023-10-06 00:36:46'),
(2, 4, 8, 3, 11, 3, 'Private Car', 'private233', '60', 'white', NULL, 'car', 'gdh', NULL, '1500000', NULL, '20', 5, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/1533993317.mechanic-car3.jpeg', 1, 1, 16, 0, NULL, NULL, '2023-08-08 02:04:57', '2023-10-06 00:35:40'),
(3, 2, 12, 13, 8, 4, 'Monitor', 'sdgg36', '60', 'black', '20', 'monitor', 'dgh', NULL, '8000', NULL, '20', 4, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/1704672289.electronic-computer2.jpeg', 1, 1, 11, 1, NULL, NULL, '2023-08-08 02:06:54', '2023-10-06 00:35:38'),
(4, 2, 12, 13, 9, 4, 'Fan', 'fan25', '60', 'yollow', '20', 'celling-fan', NULL, NULL, '5000', NULL, '20', 3, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/2011856302.electronic-fan.png', 1, 1, 37, 1, NULL, NULL, '2023-08-08 02:08:26', '2023-10-10 05:31:22'),
(5, 3, 24, 17, 17, 3, 'Beauty cream', 'gsdgsdg85', '1000', 'white', NULL, NULL, 'sgdfhh', NULL, '1000', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/1616355880.cosmetic-cream1.jpeg', 1, 1, 23, 1, NULL, NULL, '2023-08-08 02:10:05', '2023-09-12 02:12:02'),
(6, 10, 18, 7, 14, NULL, 'Table', 'ttt123', '50', 'red', NULL, 'table', 'szgdg', NULL, '5000', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/952586876.plastic-table.jpeg', 1, 1, 7, 1, NULL, NULL, '2023-08-08 02:11:47', '2023-09-12 02:11:51'),
(7, 10, 18, 7, 14, NULL, 'Chair', 'cccc78', '60', 'blue', NULL, 'chair', NULL, NULL, '1500', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/666291317.chair.jpg', 1, 1, 12, 1, NULL, NULL, '2023-08-08 02:13:12', '2023-10-10 05:30:48'),
(8, 5, NULL, NULL, 19, 4, 'Apple', 'apple26', '60', 'red', NULL, NULL, 'fgdgdg', NULL, '300', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/2049900636.fruit1.jpeg', 1, 1, 81, 1, NULL, NULL, '2023-08-09 00:20:48', '2023-09-24 07:54:39'),
(9, 10, 20, NULL, 14, NULL, 'Chair luxury', 'dgsgsgsdg', '120', 'white', NULL, NULL, 'dgsdh', NULL, '2000', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/594037316.plastic-chair.jpeg', 1, 1, 14, 1, NULL, NULL, '2023-08-09 02:57:14', '2023-09-16 00:22:18'),
(10, 10, 20, NULL, 14, NULL, 'Chair excellent', 'sdshh', '50', 'yellow', NULL, NULL, NULL, NULL, '1800', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/1937645402.plastic-chari23jpeg.jpeg', 1, 1, 13, 1, NULL, NULL, '2023-08-09 02:58:16', '2023-09-10 00:46:10'),
(11, 10, 20, NULL, 14, NULL, 'Table hinno', 'dsgsgsg', '60', 'black', NULL, NULL, NULL, NULL, '5000', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/product_images/536366505.plastic-table3.jpeg', 1, 1, 23, 1, NULL, NULL, '2023-08-09 03:00:23', '2023-09-10 00:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_multi_images`
--

DROP TABLE IF EXISTS `product_multi_images`;
CREATE TABLE IF NOT EXISTS `product_multi_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multi_images`
--

INSERT INTO `product_multi_images` (`id`, `product_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/product_images/578003615.mechanic-motorcycle4jpeg.jpeg', '2023-08-08 02:03:04', '2023-08-08 02:03:04'),
(2, 1, 'upload/product_images/1773683733.mechanic-motorcycle3.jpeg', '2023-08-08 02:03:04', '2023-08-08 02:03:04'),
(3, 1, 'upload/product_images/1329864863.mechanic-motorcycle2.jpeg', '2023-08-08 02:03:04', '2023-08-08 02:03:04'),
(4, 2, 'upload/product_images/205748494.mechanic-car5.jpeg', '2023-08-08 02:04:57', '2023-08-08 02:04:57'),
(5, 2, 'upload/product_images/2014962544.mechanic-car2.jpeg', '2023-08-08 02:04:57', '2023-08-08 02:04:57'),
(6, 2, 'upload/product_images/1159754917.mechanic-car.jpeg', '2023-08-08 02:04:58', '2023-08-08 02:04:58'),
(7, 3, 'upload/product_images/94602041.electronic-computer1.jpeg', '2023-08-08 02:06:54', '2023-08-08 02:06:54'),
(8, 3, 'upload/product_images/1532209606.electronic-monitor.jpeg', '2023-08-08 02:06:54', '2023-08-08 02:06:54'),
(9, 4, 'upload/product_images/1013552737.electronic-fan4.jpeg', '2023-08-08 02:08:26', '2023-08-08 02:08:26'),
(10, 4, 'upload/product_images/1678833460.electronic-fan3.png', '2023-08-08 02:08:26', '2023-08-08 02:08:26'),
(11, 4, 'upload/product_images/210080506.electronic-fan2.jpeg', '2023-08-08 02:08:26', '2023-08-08 02:08:26'),
(12, 5, 'upload/product_images/309952621.cosmetic-cream2.jpeg', '2023-08-08 02:10:05', '2023-08-08 02:10:05'),
(13, 5, 'upload/product_images/1529864438.cosmetic-cream3.jpeg', '2023-08-08 02:10:06', '2023-08-08 02:10:06'),
(14, 6, 'upload/product_images/1646301583.plastic-table4.jpeg', '2023-08-08 02:11:47', '2023-08-08 02:11:47'),
(15, 6, 'upload/product_images/1388910790.plastic-table3.jpeg', '2023-08-08 02:11:47', '2023-08-08 02:11:47'),
(16, 6, 'upload/product_images/521573772.plastic-table2.jpeg', '2023-08-08 02:11:47', '2023-08-08 02:11:47'),
(17, 7, 'upload/product_images/648932825.plastic-chari2.jpeg', '2023-08-08 02:13:12', '2023-08-08 02:13:12'),
(18, 7, 'upload/product_images/1118461538.plastic-chair.jpeg', '2023-08-08 02:13:12', '2023-08-08 02:13:12'),
(19, 7, 'upload/product_images/1086513428.plastic-chari23jpeg.jpeg', '2023-08-08 02:13:12', '2023-08-08 02:13:12'),
(20, 8, 'upload/product_images/118518509.fruit4.jpeg', '2023-08-09 00:20:49', '2023-08-09 00:20:49'),
(21, 8, 'upload/product_images/1030860568.fruit2.jpeg', '2023-08-09 00:20:49', '2023-08-09 00:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_point` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `rating_point`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'This is a nice product. I am very happy to use this product.....', 4, '2023-08-12 09:14:01', NULL),
(2, 1, 4, 'Awesome service. I suggest anyone to purchase this product. Thanks a lot of this product authority....', 5, '2023-08-12 09:14:01', NULL),
(3, 1, 4, 'This product is so great that I can not describe in a word....', 5, '2023-08-12 09:14:01', NULL),
(4, 1, 4, 'This is one of the best product in our country.......', 4, '2023-08-12 09:14:01', NULL),
(5, 1, 4, 'I am using this product regulary....', 4, '2023-08-12 09:14:01', NULL),
(6, 1, 4, 'This fan product and service is pleasure to me...', 5, '2023-08-12 09:14:01', NULL),
(7, 1, 4, 'I want the red color of this product.', 3, '2023-08-12 09:45:04', NULL),
(8, 1, 5, 'I have bought this cream. This cream keep the skin cold and refresh. This is a good product.', 4, '2023-08-12 09:53:46', NULL),
(9, 2, 5, 'This is one of the best skin care product for us. Awesome....', 5, '2023-08-12 10:39:39', NULL),
(10, 1, 4, 'This is my present review. I have used this product many times. I have got good feedback from this product.', 5, '2023-08-13 09:29:11', NULL),
(11, 1, 4, 'Greatest product......', 4, '2023-08-13 09:30:43', NULL),
(12, 1, 4, 'wow', 4, '2023-08-14 05:04:56', NULL),
(13, 1, 4, 'abcd', 4, '2023-08-14 05:05:38', NULL),
(14, 3, 9, 'This is my first review of this product...', 4, '2023-08-17 23:52:06', NULL),
(15, 3, 9, 'This is second review.', 5, '2023-08-17 23:52:53', NULL),
(16, 1, 7, 'This is a comfortable product for men and women of all ages. Thats aweseome....', 4, '2023-08-18 12:32:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

DROP TABLE IF EXISTS `shopping_carts`;
CREATE TABLE IF NOT EXISTS `shopping_carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `user_id`, `product_id`, `quantity`, `color`, `size`, `created_at`, `updated_at`) VALUES
(110, 1, 4, 5, 'red', '1', NULL, '2023-10-10 05:59:41'),
(109, 1, 7, 2, 'red', '1', NULL, '2023-10-10 06:00:04'),
(83, 3, 9, 1, 'red', '1', NULL, NULL),
(80, 3, 11, 1, 'red', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(20, 10, 'Plastic-C', '2023-07-25 22:04:53', '2023-08-08 01:07:18'),
(18, 10, 'Plastic-A', '2023-07-25 22:04:40', '2023-08-08 01:06:52'),
(8, 4, 'Mechanics-A', '2023-07-25 20:02:14', '2023-08-08 01:08:41'),
(9, 4, 'Mechanics-B', '2023-07-25 20:02:23', '2023-08-08 01:08:50'),
(10, 4, 'Mechanics-C', '2023-07-25 20:02:31', '2023-08-08 01:09:02'),
(11, 4, 'Mechanics-D', '2023-07-25 20:02:40', '2023-08-08 01:09:09'),
(12, 2, 'Electronics-A', '2023-07-25 20:03:10', '2023-08-08 01:07:43'),
(13, 2, 'Electronics-B', '2023-07-25 20:03:17', '2023-08-08 01:08:00'),
(14, 2, 'Electronics-C', '2023-07-25 20:03:25', '2023-08-08 01:08:14'),
(23, 10, 'Plastic-B', '2023-08-08 01:10:07', '2023-08-08 01:10:07'),
(24, 3, 'Cosmetics-A', '2023-08-08 01:10:24', '2023-08-08 01:10:24'),
(25, 3, 'Cosmetics-B', '2023-08-08 01:10:36', '2023-08-08 01:10:36'),
(26, 3, 'Cosmetics-C', '2023-08-08 01:10:46', '2023-08-08 01:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$t856NPuiHwUskDxyinbjfu1PNJXYL3LiwoXD11KXJ8r/CxaIaAPMe', 'MXzow4apXlQqG9ZEKTpBdkDsKJcUXi9cyeQ1LaMUJ0j27iN6NPg2yoAd5xsc', '2023-07-24 04:11:53', '2023-07-24 04:11:53'),
(2, 'user2', 'user2@gmail.com', NULL, '$2y$10$rQZaTMi4LcwymwZPKBCAmOajKeIj1pA6In47npwWUpSo9Z2Cxk7Ua', NULL, '2023-08-12 07:02:57', '2023-08-12 07:02:57'),
(3, 'karim', 'karim@gmail.com', NULL, '$2y$10$IZQH/t/lH4CKXcAHyMfLs.qhfccHaXlC7wG8ern8vHNjVfWkLBppG', NULL, '2023-08-17 23:46:26', '2023-08-17 23:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(4, 'Purnima-dymon-house', 'Rajshahi, binodpur.', '8888', '2023-07-31 09:53:31', '2023-07-31 09:53:31'),
(3, 'Puspu-house', 'sherkol,singra,natore.', '6677', '2023-07-31 09:53:02', '2023-07-31 09:53:02'),
(5, 'Tisha-house-45', 'Gurudaspur,natore.', '3452523', '2023-07-31 09:54:02', '2023-07-31 09:54:02'),
(6, 'tytuy', 'gjfgkgk', '353535', '2023-08-07 13:00:48', '2023-08-07 13:00:48'),
(7, 'dgsdh', 'dfhdfhdf', '8888', '2023-08-07 13:01:23', '2023-08-07 13:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(13, 1, 11, NULL, NULL),
(14, 1, 10, NULL, NULL),
(16, 3, 11, NULL, NULL),
(11, 3, 1, NULL, NULL),
(12, 3, 2, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
