-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 12:54 PM
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
(1, 'EComXpress E-commerce Application', 'ecomxpress-e-commerce-application', 'Web Development', 'Laravel', NULL, 'ecomxpress', '25000', '55000', NULL, NULL, NULL, NULL, NULL, 'ecomxpress', 'codephics@gmail.com', '<p>Short Description</p>', '<p>Long Description</p>', '<p>Change Log</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, 'ecomxpress-ecommerce-solution.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default-og.png', NULL, NULL, NULL, 'default-file.mp3', 1, NULL, '2024-07-08 00:06:28', '2024-08-01 04:22:49'),
(2, 'BlogForge10', 'blogforge10', 'Web Development', 'Laravel', NULL, 'blogforge10', '15000', '35000', NULL, NULL, NULL, NULL, NULL, 'ecomxpress', 'codephics@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, 'blogforge10-blog-management-system-1.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default-og.png', NULL, NULL, NULL, 'default-file.mp3', 1, NULL, '2024-07-14 04:09:15', '2024-08-01 03:57:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecommerce_items`
--
ALTER TABLE `ecommerce_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecommerce_items`
--
ALTER TABLE `ecommerce_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
