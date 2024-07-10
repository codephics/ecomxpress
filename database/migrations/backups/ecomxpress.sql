-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 12:55 PM
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
-- Database: `ecomxpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Codephics',
  `category_name` varchar(255) DEFAULT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `sub_subcategory_name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) NOT NULL DEFAULT 'default-featured-image.png',
  `featured_img_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-og-image.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_subcategories`
--

CREATE TABLE `blog_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_sub_subcategories`
--

CREATE TABLE `blog_sub_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_subcategory_name` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-thumb.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-cover.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_categories`
--

CREATE TABLE `ecommerce_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_categories`
--

INSERT INTO `ecommerce_categories` (`id`, `category_name`, `slug`, `title`, `description`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `icon`, `icon_alt_text`, `thumb`, `thumb_alt_text`, `cover`, `cover_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `is_featured`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'laravel', 'Laravel', '<p>Description</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, '2024-07-07 23:37:16', '2024-07-07 23:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_items`
--

CREATE TABLE `ecommerce_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `sub_subcategory_name` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `sale_price` varchar(255) DEFAULT NULL,
  `regular_price` varchar(255) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `bootstrap_v` varchar(255) DEFAULT NULL,
  `released` varchar(255) DEFAULT NULL,
  `updated` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `seller_name` varchar(255) DEFAULT NULL,
  `seller_email` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `change_log` text DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `order_type` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `live_preview_link` text DEFAULT NULL,
  `admin_link` text DEFAULT NULL,
  `downloadable_link` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `img_alt_text` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-og.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `file` varchar(255) NOT NULL DEFAULT 'default-file.mp3',
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_items`
--

INSERT INTO `ecommerce_items` (`id`, `name`, `slug`, `category_name`, `subcategory_name`, `sub_subcategory_name`, `sku`, `sale_price`, `regular_price`, `commission`, `bootstrap_v`, `released`, `updated`, `version`, `seller_name`, `seller_email`, `short_description`, `long_description`, `change_log`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `order_type`, `is_featured`, `live_preview_link`, `admin_link`, `downloadable_link`, `image`, `img_alt_text`, `icon`, `icon_alt_text`, `thumb`, `thumb_alt_text`, `cover`, `cover_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `file`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'EComXpress E-commerce Application', 'ecomxpress-e-commerce-application', 'Laravel', 'E-commerce Application', 'EComXpress', 'ecomxpress', '25000', '55000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Short Description</p>', '<p>Long Description</p>', '<p>Change Log</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, 'default.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default-og.png', NULL, NULL, NULL, 'default-file.mp3', 0, NULL, '2024-07-08 00:06:28', '2024-07-08 00:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_leads`
--

CREATE TABLE `ecommerce_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_leads`
--

INSERT INTO `ecommerce_leads` (`id`, `name`, `email`, `mobile`, `address`, `note`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Demo', 'info@mail.com', '01400000000', 'Address', NULL, NULL, NULL, '2024-07-09 03:03:20', '2024-07-09 03:03:20'),
(2, 'Demo', 'info@mail.com', '01400000000', 'Address', NULL, NULL, NULL, '2024-07-09 03:03:45', '2024-07-09 03:03:45'),
(3, 'Demo', 'info@codephics.com', '01400000000', 'Dhaka, Bangladesh', 'Note', 1, '<p>Comment</p>', '2024-07-09 04:38:10', '2024-07-09 04:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_pre_orders`
--

CREATE TABLE `ecommerce_pre_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `quantity` text DEFAULT NULL,
  `shipping_method` tinyint(4) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(8,2) DEFAULT NULL,
  `sub_total` decimal(8,2) DEFAULT NULL,
  `delivery_charge` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `order_note` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_pre_orders`
--

INSERT INTO `ecommerce_pre_orders` (`id`, `uuid`, `name`, `email`, `mobile`, `address`, `quantity`, `shipping_method`, `product_name`, `product_price`, `sub_total`, `delivery_charge`, `total`, `order_note`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', NULL, '1', 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 00:23:40', '2024-07-08 00:23:40'),
(2, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', NULL, '1', 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 03:09:51', '2024-07-08 03:09:51'),
(3, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '1', 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 03:10:56', '2024-07-08 03:10:56'),
(4, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '1', 50, 'EComXpress E-commerce Application', 25000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 04:14:57', '2024-07-08 04:14:57'),
(5, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '2', 100, 'EComXpress E-commerce Application', 25000.00, NULL, NULL, NULL, 'Order Note (optional):', NULL, NULL, '2024-07-08 04:16:28', '2024-07-08 04:16:28'),
(6, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '2', 100, 'EComXpress E-commerce Application', 25000.00, 50000.00, 100.00, 50100.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 04:24:52', '2024-07-08 04:24:52'),
(7, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '3', NULL, 'EComXpress E-commerce Application', 25000.00, 75000.00, 0.00, 75000.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 04:28:09', '2024-07-08 04:28:09'),
(8, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '4', 50, 'EComXpress E-commerce Application', 25000.00, 100000.00, 50.00, 100050.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 04:30:25', '2024-07-08 04:30:25'),
(9, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 04:33:32', '2024-07-08 04:33:32'),
(10, '', 'ecomxpress', 'codephics@gmail.com', '01705723616', 'Address', '3', 50, 'EComXpress E-commerce Application', 25000.00, 75000.00, 50.00, 75050.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 04:50:33', '2024-07-08 04:50:33'),
(11, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '2', 100, 'EComXpress E-commerce Application', 25000.00, 50000.00, 100.00, 50100.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 21:41:48', '2024-07-08 21:41:48'),
(12, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '2', 100, 'EComXpress E-commerce Application', 25000.00, 50000.00, 100.00, 50100.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 22:50:00', '2024-07-08 22:50:00'),
(13, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '2', 100, 'EComXpress E-commerce Application', 25000.00, 50000.00, 100.00, 50100.00, 'Order Note (optional):', NULL, NULL, '2024-07-08 22:50:32', '2024-07-08 22:50:32'),
(14, '', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 22:51:04', '2024-07-08 22:51:04'),
(15, '', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 22:51:46', '2024-07-08 22:51:46'),
(16, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '1', 100, 'EComXpress E-commerce Application', 25000.00, 25000.00, 100.00, 25100.00, NULL, NULL, NULL, '2024-07-08 22:54:03', '2024-07-08 22:54:03'),
(17, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '1', 100, 'EComXpress E-commerce Application', 25000.00, 25000.00, 100.00, 25100.00, NULL, NULL, NULL, '2024-07-08 22:56:29', '2024-07-08 22:56:29'),
(18, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '1', 100, 'EComXpress E-commerce Application', 25000.00, 25000.00, 100.00, 25100.00, NULL, NULL, NULL, '2024-07-08 22:56:38', '2024-07-08 22:56:38'),
(19, '', 'Demo', 'info@mail.com', '01400000000', 'Address', '1', 100, 'EComXpress E-commerce Application', 25000.00, 25000.00, 100.00, 25100.00, NULL, NULL, NULL, '2024-07-08 22:56:43', '2024-07-08 22:56:43'),
(20, '', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 22:56:55', '2024-07-08 22:56:55'),
(21, '', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 22:57:19', '2024-07-08 22:57:19'),
(22, '', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 22:57:30', '2024-07-08 22:57:30'),
(23, '', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 22:57:43', '2024-07-08 22:57:43'),
(24, '5aafae52-e652-4b8d-be0c-82b15038935e', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 23:34:33', '2024-07-08 23:34:33'),
(25, '20b2336d-f529-4596-8da1-8d4e45b86a7b', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 23:34:50', '2024-07-08 23:34:50'),
(26, 'df32e0e6-2d58-4951-9400-5c53898957ff', 'Demo', 'info@mail.com', '01400000000', NULL, '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, NULL, NULL, NULL, '2024-07-08 23:35:07', '2024-07-08 23:35:07'),
(27, 'ea836a6e-6181-43e0-8fd2-22adbe85daed', 'Demo', 'info@mail.com', '01400000000', 'Address', '3', 50, 'EComXpress E-commerce Application', 25000.00, 75000.00, 50.00, 75050.00, 'Delivery charges may vary based on weight. Consequently, the total amount may change. We will notify you of the final total charge.', NULL, NULL, '2024-07-08 23:47:04', '2024-07-08 23:47:04'),
(28, '670c6103-e884-4bb9-b7a5-cad44ea318e1', 'Demo', 'info@mail.com', '01400000000', 'Address', '1', 50, 'EComXpress E-commerce Application', 25000.00, 25000.00, 50.00, 25050.00, 'Delivery charges may vary based on weight. Consequently, the total amount may change. We will notify you of the final total charge.', NULL, NULL, '2024-07-09 00:14:43', '2024-07-09 00:14:43'),
(29, '1664de6d-bff9-45de-b359-c5a7d5ca7324', 'Demo', 'info@mail.com', '01400000000', 'Address', '3', 50, 'EComXpress E-commerce Application', 25000.00, 75000.00, 50.00, 75050.00, 'Delivery charges may vary based on weight. Consequently, the total amount may change. We will notify you of the final total charge.', NULL, NULL, '2024-07-09 02:47:58', '2024-07-09 02:47:58'),
(30, 'b5454cf3-e598-454a-8077-3bf7cf9440d3', 'Demo', 'info@mail.com', '01400000000', 'Address', '1', 100, 'EComXpress E-commerce Application', 25000.00, 25000.00, 100.00, 25100.00, 'Delivery charges may vary based on weight. Consequently, the total amount may change. We will notify you of the final total charge.', NULL, NULL, '2024-07-09 03:04:02', '2024-07-09 03:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_sellers`
--

CREATE TABLE `ecommerce_sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-thumb.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-cover.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_sellers`
--

INSERT INTO `ecommerce_sellers` (`id`, `name`, `slug`, `gender`, `mobile`, `email`, `bio`, `address`, `description`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `icon`, `icon_alt_text`, `thumb`, `thumb_alt_text`, `cover`, `cover_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `is_featured`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'ecomxpress', 'ecomxpress', 'male', '01705723616', 'codephics@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, '2024-07-07 23:36:25', '2024-07-07 23:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_subcategories`
--

CREATE TABLE `ecommerce_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_subcategories`
--

INSERT INTO `ecommerce_subcategories` (`id`, `subcategory_name`, `slug`, `title`, `category_name`, `description`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `icon`, `icon_alt_text`, `thumb`, `thumb_alt_text`, `cover`, `cover_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `is_featured`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'E-commerce Application', 'e-commerce-application', NULL, 'Laravel', '<p>Description</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, '2024-07-07 23:37:56', '2024-07-07 23:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce_sub_subcategories`
--

CREATE TABLE `ecommerce_sub_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_subcategory_name` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecommerce_sub_subcategories`
--

INSERT INTO `ecommerce_sub_subcategories` (`id`, `sub_subcategory_name`, `subcategory_name`, `slug`, `title`, `description`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `icon`, `icon_alt_text`, `thumb`, `thumb_alt_text`, `cover`, `cover_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `is_featured`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'EComXpress', 'E-commerce Application', 'ecomxpress', NULL, '<p>Description</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, '2024-07-07 23:38:35', '2024-07-07 23:38:35');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_15_083955_create_ecommerce_items', 1),
(6, '2023_08_05_064542_create_ecommerce_categories', 1),
(7, '2023_08_05_064744_create_ecommerce_subcategories', 1),
(8, '2023_08_05_064752_create_ecommerce_sub_subcategories', 1),
(9, '2023_08_07_050635_create_ecommerce_pre_orders', 1),
(10, '2023_08_07_050636_create_ecommerce_leads', 1),
(11, '2023_08_07_050637_create_ecommerce_sellers', 1),
(12, '2023_08_10_095107_create_sliders', 1),
(13, '2023_08_10_095108_create_subscribers', 1),
(14, '2023_08_10_095109_create_contacts', 1),
(15, '2023_11_11_085543_create_blogs', 1),
(16, '2023_11_11_085544_create_blog_categories', 1),
(17, '2023_11_11_085555_create_blog_subcategories', 1),
(18, '2023_11_11_085605_create_blog_sub_subcategories', 1),
(19, '2023_11_15_095336_create_blog_tags', 1),
(20, '2023_12_12_060508_create_pages', 1),
(21, '2023_12_12_060509_create_settings', 1),
(22, '2024_07_09_045924_add_uuid_to_pre_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `youtube_iframe` text DEFAULT NULL,
  `header_content` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `facebook_meta_title` varchar(255) DEFAULT NULL,
  `facebook_meta_description` varchar(255) DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default-thumb.png',
  `thumb_alt_text` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'default-cover.png',
  `cover_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-icon.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `slug`, `keywords`, `short_description`, `long_description`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `icon`, `icon_alt_text`, `thumb`, `thumb_alt_text`, `cover`, `cover_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `is_featured`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Homepage', 'EcomXpress', 'homepage', '', NULL, NULL, NULL, NULL, 'More Blogs | Insights, Updates & Stories from Codephics', 'Stay updated with the latest insights, news, and stories from Codephics. Explore our blog for valuable information on e-commerce, technology trends, and business growth strategies.', 'More Blogs | Latest Updates from Codephics', 'Discover the latest insights and updates from Codephics. Our blog covers e-commerce trends, technology innovations, and business growth strategies to help you stay ahead.', 'More Blogs | Insights & Updates from Codephics', 'Get the latest insights and updates from Codephics. Explore our blog for valuable information on e-commerce, tech trends, and business growth strategies. #Codephics #Blog', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:30:14'),
(2, 'Shop', 'Shop', 'shop', '', '<p>Discover a diverse range of high-quality products curated to meet your needs. From the latest tech gadgets to everyday essentials, our shop offers something for everyone. Enjoy a seamless shopping experience with easy navigation and great deals.</p>', NULL, NULL, NULL, 'Shop | Explore a Wide Range of Products at Codephics', 'Browse our extensive collection of high-quality products at Codephics. Find everything you need, from the latest tech gadgets to everyday essentials, all in one place.', 'Shop | Discover Top Products at Codephics', 'Explore a diverse selection of products at Codephics. Shop for the latest tech, fashion, and more. Enjoy a seamless shopping experience with great deals and offers.', 'Shop | Wide Range of Products at Codephics', 'Discover and shop for a variety of products at Codephics. From tech gadgets to daily essentials, find everything you need in one place. #Codephics #Shop #Ecommerce', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:46:26'),
(3, 'Privacy Policy', 'Privacy Policy', 'privacy-policy', '', NULL, NULL, NULL, NULL, 'Privacy Policy | Codephics', 'Read the Codephics Privacy Policy to understand how we collect, use, and protect your personal information. Your privacy is our top priority.', 'Privacy Policy | Codephics', 'At Codephics, your privacy is our priority. Learn about our policies on data collection, usage, and protection by reading our Privacy Policy.', 'Privacy Policy | Codephics', 'Your privacy matters to us at Codephics. Discover how we handle your data with care by reading our Privacy Policy. #Privacy #Codephics', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:38:45'),
(4, 'Terms of Service', 'Terms of Service', 'terms-of-service', '', NULL, NULL, NULL, NULL, 'Terms of Service | Codephics', 'Review the terms of service for using Codephics e-commerce platform. Understand your rights and responsibilities as a user to ensure a smooth and secure experience.', 'Terms of Service | Codephics', 'Read the terms of service for using Codephics e-commerce platform. Ensure a smooth and secure experience by understanding your rights and responsibilities as a user.', 'Terms of Service | Codephics', 'Understand the terms of service for using Codephics e-commerce platform. Know your rights and responsibilities as a user. #Codephics #TermsOfService', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:39:45'),
(5, 'About Us', 'About Us', 'about-us', '', NULL, NULL, NULL, NULL, 'About Us | Codephics - Innovating E-Commerce Solutions', 'Learn more about Codephics, our mission, and our team. We are dedicated to providing innovative e-commerce solutions to help businesses thrive online. Discover our story and values.', 'About Us | Codephics - Our Mission & Team', 'Get to know Codephics! Learn about our mission, team, and the innovative e-commerce solutions we provide to help businesses succeed online. Discover our story and values.', 'About Us | Codephics - Innovating E-Commerce', 'Discover Codephics, our mission, and our team. We create innovative e-commerce solutions to help businesses thrive. Learn more about our story and values. #Codephics #AboutUs', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:40:35'),
(6, 'Overview', 'Overview', 'overview', '', NULL, NULL, NULL, NULL, 'About Us | Overview of Codephics', 'Learn about Codephics, a leader in e-commerce solutions. Discover our mission, values, and the innovative technologies we use to help businesses thrive online.', 'About Us | Codephics Overview', 'Get to know Codephics, a pioneering company in e-commerce solutions. Explore our mission, values, and the cutting-edge technologies that drive our success.', 'About Us | Codephics Overview', 'Discover Codephics, a leader in e-commerce solutions. Learn about our mission, values, and the innovative technologies we use to empower businesses online. #Codephics #AboutUs', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:41:26'),
(7, 'Brand', 'Brand', 'brand', '', NULL, NULL, NULL, NULL, 'About Us | The Codephics Brand Story', 'Learn about the Codephics brand, our mission, vision, and values. Discover how we are committed to delivering innovative e-commerce solutions and helping businesses thrive online.', 'About Us | The Codephics Brand Story', 'Discover the story behind the Codephics brand. Learn about our mission, vision, and values, and how we are dedicated to providing innovative e-commerce solutions to help businesses succeed.', 'About Us | The Codephics Brand Story', 'Explore the Codephics brand story. Learn about our mission, vision, and values, and how we deliver innovative e-commerce solutions for business success. #Codephics #AboutUs', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:42:29'),
(8, 'License', 'License', 'license', '', NULL, NULL, NULL, NULL, 'License | Codephics E-Commerce Solution', 'Understand the licensing terms and conditions for using the Codephics E-Commerce Solution. Learn about user rights, restrictions, and compliance requirements.', 'License | Codephics E-Commerce Solution', 'Review the licensing terms and conditions for the Codephics E-Commerce Solution. Ensure compliance with our guidelines and understand your user rights and restrictions.', 'License | Codephics E-Commerce Solution', 'Get informed about the licensing terms and conditions for the Codephics E-Commerce Solution. Know your rights and compliance requirements. #Codephics #License', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:43:19'),
(9, 'Contact Us', 'Contact Us', 'contact-us', '', NULL, NULL, NULL, NULL, 'Contact Us | Get in Touch with Codephics', 'Have questions or need assistance? Contact Codephics for support and inquiries. We\'re here to help with all your e-commerce and technical needs.', 'Contact Us | Connect with Codephics', 'Need help or have questions? Reach out to Codephics for support and inquiries. Our team is here to assist you with all your e-commerce and technical needs.', 'Contact Us | Get Support from Codephics', 'Have questions or need assistance? Contact Codephics for support and inquiries. We\'re here to help with all your e-commerce and technical needs. #Codephics #Support', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:44:05'),
(10, 'More Blogs', 'More Blogs', 'more-blogs', '', NULL, NULL, NULL, NULL, 'Blog | Latest Articles & Insights from Codephics', 'Dive into the Codephics blog for the latest articles and insights on e-commerce, technology, and business growth. Stay informed with expert advice and industry news.', 'Blog | Codephics Latest Articles & Insights', 'Explore the Codephics blog for the latest articles and insights on e-commerce, technology, and business growth. Stay updated with expert advice and industry news.', 'Blog | Codephics Latest Articles & Insights', 'Stay informed with the latest articles and insights from the Codephics blog. Get expert advice on e-commerce, tech trends, and business growth. #Codephics #Blog', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-08 02:37:33');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `about_in_short` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `linkedIn_url` varchar(255) DEFAULT NULL,
  `pinterest_url` varchar(255) DEFAULT NULL,
  `reddit_url` varchar(255) DEFAULT NULL,
  `tiktok_url` varchar(255) DEFAULT NULL,
  `whatsapp_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `quora_url` varchar(255) DEFAULT NULL,
  `snapchat_url` varchar(255) DEFAULT NULL,
  `telegram_url` varchar(255) DEFAULT NULL,
  `tumblr_url` varchar(255) DEFAULT NULL,
  `wechat_url` varchar(255) DEFAULT NULL,
  `favicon_apple_alt_text` varchar(255) DEFAULT NULL,
  `favicon_apple` varchar(255) NOT NULL DEFAULT 'apple-touch-icon.png',
  `favicon_alt_text` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) NOT NULL DEFAULT 'favicon.png',
  `favicon_32_alt_text` varchar(255) DEFAULT NULL,
  `favicon_32` varchar(255) DEFAULT 'favicon-32x32.png',
  `favicon_16_alt_text` varchar(255) DEFAULT NULL,
  `favicon_16` varchar(255) NOT NULL DEFAULT 'favicon-16x16.png',
  `logo_alt_text` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'logo.png',
  `og_img_alt_text` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'default-og.png',
  `is_index` tinyint(4) DEFAULT 0,
  `is_follow` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `tagline`, `about_in_short`, `address`, `email`, `mobile`, `facebook_url`, `twitter_url`, `instagram_url`, `linkedIn_url`, `pinterest_url`, `reddit_url`, `tiktok_url`, `whatsapp_url`, `youtube_url`, `quora_url`, `snapchat_url`, `telegram_url`, `tumblr_url`, `wechat_url`, `favicon_apple_alt_text`, `favicon_apple`, `favicon_alt_text`, `favicon`, `favicon_32_alt_text`, `favicon_32`, `favicon_16_alt_text`, `favicon_16`, `logo_alt_text`, `logo`, `og_img_alt_text`, `og_image`, `is_index`, `is_follow`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'EcomXpress', 'Welcome to Codephics E-Commerce Solution', '<p>Experience a seamless and efficient e-commerce platform tailored to meet all your online business needs. Our solution, built with cutting-edge technology and optimized for search engines, ensures you have everything you need to manage and grow your online store effortlessly.</p>\r\n<ul>\r\n<li><strong>Manage Products:</strong> Easily add, update, and delete products.</li>\r\n<li><strong>Categories:</strong> Organize your products into categories for better navigation.</li>\r\n<li><strong>Seller Management:</strong> Handle multiple sellers efficiently.</li>\r\n<li><strong>Lead Management:</strong> Track and convert potential customers.</li>\r\n<li><strong>Blog:</strong> Share updates, news, and stories with your audience.</li>\r\n<li><strong>Blog Categories &amp; Tags:</strong> Categorize and tag your blog posts for better reach.</li>\r\n<li><strong>Slider:</strong> Showcase featured products and promotions.</li>\r\n<li><strong>Pages:</strong> Create and manage static pages like About Us, Contact Us, and more.</li>\r\n<li><strong>Contact Query:</strong> Handle customer inquiries effectively.</li>\r\n<li><strong>Subscriber Lead:</strong> Manage your email subscribers.</li>\r\n<li><strong>Settings:</strong> Customize your store settings to fit your needs.</li>\r\n<li><strong>User Profile:</strong> Allow users to manage their accounts and orders.</li>\r\n</ul>', 'Dhaka, Bangladesh', 'info@codephics.com', '01705723616', 'https://facebook.com/codephics', 'https://twitter.com/codephics', 'https://instagram.com/codephics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'apple-touch-icon.png', NULL, 'favicon.png', NULL, 'favicon-32x32.png', NULL, 'favicon-16x16.png', NULL, 'logo.png', NULL, 'default-og.png', NULL, NULL, NULL, NULL, '2024-07-08 03:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default-slider.png',
  `image_alt_text` varchar(255) DEFAULT NULL,
  `button_text_1` varchar(255) DEFAULT NULL,
  `button_text_2` varchar(255) DEFAULT NULL,
  `button_link_1` varchar(255) DEFAULT NULL,
  `button_link_2` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Demo', 'demo@codephics.com', NULL, '$2y$12$awNAug0.SnSDY98wiDgcYe2/1P6qnsbZ8Au9VE0jDGSRe38CpXOZe', NULL, '2024-07-06 04:54:03', '2024-07-06 04:54:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_subcategories`
--
ALTER TABLE `blog_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_sub_subcategories`
--
ALTER TABLE `blog_sub_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_categories`
--
ALTER TABLE `ecommerce_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_items`
--
ALTER TABLE `ecommerce_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_leads`
--
ALTER TABLE `ecommerce_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_pre_orders`
--
ALTER TABLE `ecommerce_pre_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_sellers`
--
ALTER TABLE `ecommerce_sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_subcategories`
--
ALTER TABLE `ecommerce_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecommerce_sub_subcategories`
--
ALTER TABLE `ecommerce_sub_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_subcategories`
--
ALTER TABLE `blog_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_sub_subcategories`
--
ALTER TABLE `blog_sub_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecommerce_categories`
--
ALTER TABLE `ecommerce_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecommerce_items`
--
ALTER TABLE `ecommerce_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecommerce_leads`
--
ALTER TABLE `ecommerce_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ecommerce_pre_orders`
--
ALTER TABLE `ecommerce_pre_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ecommerce_sellers`
--
ALTER TABLE `ecommerce_sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecommerce_subcategories`
--
ALTER TABLE `ecommerce_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecommerce_sub_subcategories`
--
ALTER TABLE `ecommerce_sub_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
