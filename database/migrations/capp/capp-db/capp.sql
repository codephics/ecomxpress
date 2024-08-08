-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 08:18 AM
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
-- Database: `capp`
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

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `tags`, `author`, `category_name`, `subcategory_name`, `sub_subcategory_name`, `short_description`, `long_description`, `youtube_iframe`, `header_content`, `meta_title`, `meta_description`, `facebook_meta_title`, `facebook_meta_description`, `twitter_meta_title`, `twitter_meta_description`, `featured_image`, `featured_img_alt_text`, `og_image`, `og_img_alt_text`, `is_index`, `is_follow`, `is_featured`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Revolutionize Your Blogging Journey with BlogForge 10: A Free, SEO-Friendly Laravel 10 Solution', 'revolutionize-your-blogging-journey-with-blogforge-10-a-free-seo-friendly-laravel-10-solution', '', 'Codephics', NULL, NULL, NULL, NULL, '<p>Are you tired of wrestling with complex blogging platforms? Yearning for a solution that\'s both powerful and user-friendly? Look no further! Introducing&nbsp;<strong>BlogForge 10</strong>&nbsp;&ndash; a game-changing, SEO-friendly blog management system built on Laravel 10 and PHP 8.1.</p>\r\n<p><strong>Unleash the Power of BlogForge 10</strong></p>\r\n<p>BlogForge 10 is more than just a blogging platform; it\'s a comprehensive solution crafted to simplify and enhance your blogging experience. Imagine an intuitive admin panel where you can effortlessly create, edit, and manage blogs. With HTML5, CSS3, and Bootstrap 5.2, the user interface is not just seamless but visually stunning.</p>\r\n<p><strong>Effortless Content Management</strong></p>\r\n<p>Managing blogs, categories, tags, and comments has never been easier. BlogForge 10 provides a secure admin panel where you can add, edit, update, and delete content with a few clicks. The agility of BlogForge 10 ensures that even complex tasks are streamlined for efficiency.</p>\r\n<p><strong>SEO-Friendly Magic</strong></p>\r\n<p>In the digital age, visibility matters. BlogForge 10 is inherently SEO-friendly, with structured data, clean URLs, and meta tags that make your content more discoverable. It\'s not just a blog platform; it\'s your ticket to a higher ranking on search engines.</p>\r\n<p><strong>Join the Blogging Revolution</strong></p>\r\n<p>BlogForge 10 isn\'t just a tool; it\'s a revolution in the world of blogging. It\'s a solution crafted by developers, for developers. Join a community of innovators shaping the future of web development.</p>\r\n<p><strong>Why Download BlogForge 10?</strong></p>\r\n<ol>\r\n<li><strong>User-Friendly:</strong>&nbsp;Effortlessly manage your blog with an intuitive admin panel.</li>\r\n<li><strong>Innovative Features:</strong>&nbsp;Enjoy dynamic content creation, seamless category management, and more.</li>\r\n<li><strong>Secure:</strong>&nbsp;Manage your content securely with advanced authentication and authorization features.</li>\r\n<li><strong>SEO Optimization:</strong>&nbsp;Boost your blog\'s visibility with built-in SEO features.</li>\r\n<li><strong>Community-Driven:</strong>&nbsp;Be part of a thriving community, shaping the future of BlogForge 10.</li>\r\n</ol>\r\n<p><strong>Download Now and Transform Your Blogging Experience!</strong></p>\r\n<p>Don\'t miss out on the future of blogging. Download BlogForge 10 now and embark on a journey where innovation meets simplicity. Revolutionize your blogs, engage your audience, and enjoy the freedom to create without limits.</p>\r\n<p>Ready to experience the power of BlogForge 10?&nbsp;<a href=\"https://blogforge10.codephics.com/\" target=\"_new\">Download Now</a> and be part of the blogging revolution!</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'revolutionize-your-blogging-journey-with-blogforge-10-a-free-seo-friendly-laravel-10-solution.png', 'Revolutionize Your Blogging Journey with BlogForge 10', 'default-og-image.png', NULL, NULL, NULL, 1, 1, NULL, '2024-07-10 23:28:57', '2024-07-25 00:44:31'),
(2, 'Empower Your Content Journey with BlogForge10: Unleashing the Power of Blogging', 'empower-your-content-journey-with-blogforge10-unleashing-the-power-of-blogging', '', 'Codephics', NULL, NULL, NULL, NULL, '<p>In the ever-evolving digital landscape, establishing a robust online presence is paramount. Whether you\'re an individual blogger, a content creator, or a business looking to share your story, the right blogging management system can make all the difference. Enter&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>, a dynamic and comprehensive blog management system designed to empower your content journey like never before.</p>\r\n<h2>Intuitive Admin Panel for Seamless Control</h2>\r\n<p>At the heart of&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>&nbsp;lies its user-friendly admin panel. Navigating through the intricacies of blog management has never been easier. The intuitive design ensures that users, from beginners to seasoned bloggers, can effortlessly control every aspect of their content creation process.</p>\r\n<h2>Dynamic Blog Creation for Engaging Content</h2>\r\n<p>With&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>, creativity knows no bounds. Craft captivating blogs with ease, thanks to a dynamic and responsive interface. From text to multimedia content, the system adapts to your creative vision, allowing you to focus on what matters most&mdash;your message.</p>\r\n<h3>Effortless Category Management for Organization</h3>\r\n<p>Keeping your content organized is essential for a seamless user experience.&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>&nbsp;offers effortless category management, allowing you to neatly categorize your blogs. Whether it\'s travel, technology, or lifestyle, your readers can easily find what they\'re looking for.</p>\r\n<h3>Tag Customization for Precision</h3>\r\n<p>Precision in content organization is achieved through tag customization. Tailor tags to suit your content, enhancing searchability and ensuring that your audience discovers related posts seamlessly.</p>\r\n<h4>Secure Comment Handling for Constructive Engagement</h4>\r\n<p><a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>&nbsp;prioritizes user engagement through secure comment handling. Foster a sense of community around your content while keeping it safe from unwanted spam. Build meaningful connections with your audience through constructive discussions.</p>\r\n<h4>Social Link Integration for Seamless Sharing</h4>\r\n<p>Expand your reach by integrating social links seamlessly. With&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>, sharing your latest blog post on social media platforms becomes a breeze, maximizing exposure and driving traffic to your site.</p>\r\n<h4>SEO-Friendly Structure for Visibility</h4>\r\n<p>Enhance your blog\'s visibility with&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>\'s SEO-friendly structure. Optimize your content for search engines, ensuring that your blogs reach a wider audience organically.</p>\r\n<h5>And Much More...</h5>\r\n<p><a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>&nbsp;is more than just a blog management system; it\'s a comprehensive toolset designed to elevate your blogging experience. With features constantly evolving to meet the demands of the digital landscape,&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>&nbsp;is your ally in conquering the online content realm.</p>\r\n<p>In conclusion, if you\'re ready to unleash the power of blogging, look no further than&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a>. Seamlessly manage your content, engage with your audience, and take your online presence to new heights. The digital world is waiting&mdash;empower your content journey with&nbsp;<a title=\"BlogForge10\" href=\"https://blogforge10.codephics.com/\" target=\"_blank\" rel=\"noopener\">BlogForge10</a> today.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empower-your-content-journey-with-blogforge10-unleashing-the-power-of-blogging.png', 'Unleashing the Power of Blogging', 'default-og-image.png', NULL, NULL, NULL, 1, 1, NULL, '2024-07-10 23:31:08', '2024-07-25 00:43:51');

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
(1, 'Web Application', 'web-application', 'Web Application', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, '2024-07-10 02:20:27', '2024-07-10 23:06:44');

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
(1, 'EcomXpress - E-Commerce Solution', 'ecomxpress-ecommerce-solution', 'Web Application', 'Laravel', NULL, 'ecomxpress', '225', '500', NULL, '5.2', NULL, NULL, '1.0', 'codephics.com', 'info@codephics.com', '<p>Experience a seamless and efficient e-commerce platform tailored to meet all your online business needs. Our solution, built with cutting-edge technology and optimized for search engines, ensures you have everything you need to manage and grow your online store effortlessly.</p>', '<div class=\"col-md-9 mb-3\">\r\n<p>Experience a seamless and efficient e-commerce platform tailored to meet all your online business needs. Our solution, built with cutting-edge technology and optimized for search engines, ensures you have everything you need to manage and grow your online store effortlessly.</p>\r\n<ul>\r\n<li><strong>Manage Products:</strong>&nbsp;Easily add, update, and delete products.</li>\r\n<li><strong>Categories:</strong>&nbsp;Organize your products into categories for better navigation.</li>\r\n<li><strong>Seller Management:</strong>&nbsp;Handle multiple sellers efficiently.</li>\r\n<li><strong>Lead Management:</strong>&nbsp;Track and convert potential customers.</li>\r\n<li><strong>Blog:</strong>&nbsp;Share updates, news, and stories with your audience.</li>\r\n<li><strong>Blog Categories &amp; Tags:</strong>&nbsp;Categorize and tag your blog posts for better reach.</li>\r\n<li><strong>Slider:</strong>&nbsp;Showcase featured products and promotions.</li>\r\n<li><strong>Pages:</strong>&nbsp;Create and manage static pages like About Us, Contact Us, and more.</li>\r\n<li><strong>Contact Query:</strong>&nbsp;Handle customer inquiries effectively.</li>\r\n<li><strong>Subscriber Lead:</strong>&nbsp;Manage your email subscribers.</li>\r\n<li><strong>Settings:</strong>&nbsp;Customize your store settings to fit your needs.</li>\r\n<li><strong>User Profile:</strong> Allow users to manage their accounts and orders.</li>\r\n</ul>\r\n</div>', '<p><strong>Version 1.0:</strong></p>\r\n<ul>\r\n<li>Initial Release</li>\r\n</ul>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'https://ecomxpress.codephics.com/', 'https://ecomxpress.codephics.com/login', NULL, 'ecomxpress-ecommerce-solution.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default-og.png', NULL, NULL, NULL, 'default-file.mp3', 1, NULL, '2024-07-10 02:21:21', '2024-07-25 00:46:08'),
(2, 'BlogForge10 - Blog Management System', 'blogforge10-blog-management-system', 'Web Application', 'Laravel', NULL, 'ecomxpress', '125', '300', NULL, '5.2', NULL, NULL, '1.0', 'codephics.com', 'info@codephics.com', '<p>Elevate your blogging experience with BlogForge 10, a free, SEO-friendly Laravel 10 and PHP 8.1-powered blog management system. Seamlessly designed with HTML5, CSS3, and Bootstrap 5.2, it empowers users to effortlessly create, edit, and manage blogs, categories, tags, and more through a secure admin panel.</p>', '<h2>Unleash the Power of Blogging</h2>\r\n<ul>\r\n<li>Intuitive Admin Panel</li>\r\n<li>Dynamic Blog Creation</li>\r\n<li>Effortless Category Management</li>\r\n<li>Tag Customization</li>\r\n<li>Secure Comment Handling</li>\r\n<li>Social Link Integration</li>\r\n<li>SEO-Friendly Structure</li>\r\n<li>and much more...</li>\r\n</ul>', '<p><strong>Version 1.0:</strong></p>\r\n<ul>\r\n<li>Initial Release</li>\r\n</ul>', NULL, NULL, 'BlogForge 10 - Free Laravel 10 Blog Management System', 'Experience the future of blogging with BlogForge 10. Download our free, SEO-friendly Laravel 10 blog management system. Effortlessly create, edit, and manage content in an intuitive admin panel.', NULL, NULL, NULL, NULL, 3, 1, 'https://blogforge10.codephics.com/', 'https://blogforge10.codephics.com/login', NULL, 'blogforge10-blog-management-system-1.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default.png', NULL, 'default-og.png', NULL, NULL, NULL, 'default-file.mp3', 1, NULL, '2024-07-10 02:21:56', '2024-07-25 00:47:45');

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
(1, '94ef510b-7ae3-44ae-b4ab-33ac97c48a80', 'Name', 'a@a', '014', 'Address', '1', 50, 'EcomXpress - E-Commerce Solution', 225.00, 125.00, 50.00, 175.00, 'Note', NULL, NULL, '2024-07-14 04:06:56', '2024-07-14 04:06:56'),
(2, '82f11912-5032-4d96-aaa0-091f7500f70d', 'Name', 'a@a', '01407', 'Address', '2', 100, 'EcomXpress - E-Commerce Solution', 225.00, 450.00, 100.00, 550.00, 'Note (optional)', NULL, NULL, '2024-07-24 21:48:46', '2024-07-24 21:48:46'),
(3, '231d4c38-f232-4c80-ad80-e08957fc7fff', 'Name', 'a@a', '014', 'Address', '3', 50, 'EcomXpress - E-Commerce Solution', 225.00, 375.00, 50.00, 425.00, 'Note (optional)', NULL, NULL, '2024-07-24 22:00:01', '2024-07-24 22:00:01'),
(4, '732b0d77-1c67-406d-bac4-a1321878d613', 'Name', 'a@a', '014', 'Address', '2', 100, 'EcomXpress - E-Commerce Solution', 225.00, 450.00, 100.00, 550.00, 'Note (optional):', NULL, NULL, '2024-07-24 22:14:13', '2024-07-24 22:14:13'),
(5, '959fb3e2-e040-41b5-a1ba-64637cfd39c6', 'Name', 'a@a', '014', 'Address', '2', 100, 'BlogForge10 - Blog Management System', 125.00, 250.00, 100.00, 350.00, 'Note (optional):', NULL, NULL, '2024-07-25 00:09:12', '2024-07-25 00:09:12');

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
(1, 'Codephics', 'codephics', 'male', '+8801814445655', 'info@codephics.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'boxed-logo.png', NULL, 'boxed-logo.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 1, NULL, '2024-07-14 00:48:46', '2024-07-14 00:48:46');

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
(1, 'Laravel', 'laravel', NULL, 'Web Application', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, '2024-07-10 23:06:23', '2024-07-10 23:07:31');

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
(22, '2024_07_09_045924_add_uuid_to_pre_orders_table', 1);

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
  `facebook_meta_description` text DEFAULT NULL,
  `twitter_meta_title` varchar(255) DEFAULT NULL,
  `twitter_meta_description` text DEFAULT NULL,
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
(1, 'Homepage', 'Codephics E-Commerce Solution', 'homepage', '', '<p>Experience a seamless and efficient e-commerce platform tailored to meet all your online business needs. Our solution, built with cutting-edge technology and optimized for search engines, ensures you have everything you need to manage and grow your online store effortlessly.</p>\r\n<ul>\r\n<li><strong>Manage Products:</strong> Easily add, update, and delete products.</li>\r\n<li><strong>Categories:</strong> Organize your products into categories for better navigation.</li>\r\n<li><strong>Seller Management:</strong> Handle multiple sellers efficiently.</li>\r\n<li><strong>Lead Management:</strong> Track and convert potential customers.</li>\r\n<li><strong>Blog:</strong> Share updates, news, and stories with your audience.</li>\r\n<li><strong>Blog Categories &amp; Tags:</strong> Categorize and tag your blog posts for better reach.</li>\r\n<li><strong>Slider:</strong> Showcase featured products and promotions.</li>\r\n<li><strong>Pages:</strong> Create and manage static pages like About Us, Contact Us, and more.</li>\r\n<li><strong>Contact Query:</strong> Handle customer inquiries effectively.</li>\r\n<li><strong>Subscriber Lead:</strong> Manage your email subscribers.</li>\r\n<li><strong>Settings:</strong> Customize your store settings to fit your needs.</li>\r\n<li><strong>User Profile:</strong> Allow users to manage their accounts and orders.</li>\r\n</ul>', NULL, NULL, NULL, 'Empowering Digital Solutions | Laravel Applications', 'Elevate your web experience with our Laravel-based solutions. From blog management to technical innovations, explore a diverse range of applications.', 'BlogForge 10 - Transform Your Blogging Experience!', 'Embark on a new era of dynamic blogging with BlogForge 10! This cutting-edge Laravel 10 and PHP 8.1 application, crafted with HTML5, CSS3, and Bootstrap 5.2, offers an SEO-optimized experience. Download now to enjoy an intuitive admin panel for secure management of categories, tags, comments, and social links.', 'BlogForge 10 - Transform Your Blogging Experience!', 'Embark on a new era of dynamic blogging with BlogForge 10! This cutting-edge Laravel 10 and PHP 8.1 application, crafted with HTML5, CSS3, and Bootstrap 5.2, offers an SEO-optimized experience. Download now to enjoy an intuitive admin panel for secure management of categories, tags, comments, and social links.', 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'codephics- homepage-og.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:24:44'),
(2, 'Shop', 'Shop', 'shop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(3, 'Privacy Policy', 'Privacy Policy', 'privacy-policy', '', NULL, '<p>At Codephics, we understand the importance of privacy in today\'s digital landscape. Our Privacy Policy outlines how we collect, use, and safeguard your personal information when you engage with our digital solutions.</p>\r\n<p><strong>Our Commitment to Privacy:</strong> Your privacy is our priority. Our Privacy Policy is designed to provide transparency about the data we collect, why we collect it, and how we use it. We adhere to the highest standards to ensure your information is handled responsibly and ethically.</p>\r\n<p><strong>What Information We Collect:</strong> We collect information that is necessary for the proper functioning of our digital solutions. This may include personal information such as your name, email address, and usage data. Rest assured, we only collect data that is relevant to the services we provide.</p>\r\n<p><strong>How We Use Your Information:</strong> The information we collect is used to enhance your experience with our digital solutions. Whether it\'s personalizing your user experience or improving our services, we strive to use your data responsibly and in a manner that benefits you.</p>\r\n<p><strong>Data Security and Protection:</strong> We employ robust security measures to protect your data from unauthorized access, disclosure, alteration, and destruction. Our commitment to data security ensures that your information is safe within our digital ecosystem.</p>\r\n<p><strong>Your Rights and Choices:</strong> Our Privacy Policy empowers you with choices. You have the right to access, correct, or delete your personal information. We respect your preferences regarding communication and offer options to manage your choices.</p>', NULL, NULL, 'Your Privacy Matters - Codephics Privacy Policy', 'Discover how we prioritize and protect your data. Explore Codephics\'s Privacy Policy for transparency and trust in our digital ecosystem.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:27:48'),
(4, 'Terms of Service', 'Terms of Service', 'terms-of-service', '', NULL, '<p>Welcome to Codephics, where our commitment to transparency extends to our rules of engagement. Our Terms of Service outline the guidelines for using our digital platforms. By engaging with our solutions, you agree to abide by these terms.</p>\r\n<p><strong>User Responsibilities:</strong> As a user of Codephics\'s digital solutions, you are expected to use our platforms responsibly and ethically. This includes adhering to community guidelines, respecting intellectual property rights, and refraining from engaging in harmful activities.</p>\r\n<p><strong>Intellectual Property:</strong> All content and materials provided by Codephics are protected by intellectual property laws. Users are granted a limited, non-exclusive, and non-transferable license to use our services. Unauthorized use of our intellectual property is strictly prohibited.</p>\r\n<p><strong>Prohibited Activities:</strong> Engaging in activities that disrupt or compromise the integrity of our digital solutions is strictly prohibited. This includes but is not limited to hacking, spreading malware, and any actions that violate the privacy of other users.</p>\r\n<p><strong>Termination of Services:</strong> We reserve the right to terminate user accounts for violations of our Terms of Service. This ensures a safe and respectful digital environment for all users.</p>\r\n<p><strong>Updates and Modifications:</strong> Our Terms of Service may be updated periodically to reflect changes in our services or legal requirements. Users will be notified of any significant changes. Continued use of our services constitutes acceptance of the updated terms.</p>\r\n<p>By using Codephics\'s digital solutions, you acknowledge that you have read, understood, and agreed to our Terms of Service.</p>', NULL, NULL, 'Codephics Terms of Service - Clear Guidelines for Engagement', 'Understand the rules of engagement with Codephics. Read our Terms of Service to navigate our digital platforms responsibly and ethically.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:28:10'),
(5, 'About Us', 'About Us', 'about-us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(6, 'Overview', 'Overview', 'overview', '', NULL, '<section>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<article>\r\n<p>Welcome to our digital haven, where innovation meets simplicity. We are passionate creators, dedicated to crafting solutions that empower your digital journey. Our journey began with a vision &ndash; to provide seamless, user-friendly applications that resonate with both beginners and seasoned developers.</p>\r\n<p>At Codephics.com, we believe in the power of technology to transform lives. Our team comprises dynamic individuals who share a common goal: to revolutionize the digital landscape. Through cutting-edge technologies and a commitment to excellence, we bring you solutions that not only meet but exceed your expectations.</p>\r\n<p>Explore a world where creativity knows no bounds. Join us on this exciting adventure as we redefine what\'s possible in the digital realm.</p>\r\n</article>\r\n</div>\r\n</div>\r\n</section>\r\n<section>\r\n<div class=\"row\">\r\n<div class=\"col-12\">&nbsp;</div>\r\n</div>\r\n</section>', NULL, NULL, 'Discover Codephics - Innovators in Digital Solutions', 'Explore the journey of Codephics, where innovation meets simplicity. Join us in shaping the digital future. Learn more about our mission and vision.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:26:09'),
(7, 'Brand', 'Brand', 'brand', '', NULL, '<p>Codephics stands as a symbol of innovation, reliability, and user-centric design. Our brand ethos revolves around creating solutions that simplify complexities, ensuring that technology is not just a tool but an enabler for everyone.</p>\r\n<p><strong>Core Values:</strong></p>\r\n<ol>\r\n<li><strong>Innovation:</strong> We thrive on pushing boundaries and exploring new frontiers in technology.</li>\r\n<li><strong>User-Centric:</strong> Our designs prioritize the user experience, making our applications accessible and enjoyable.</li>\r\n<li><strong>Reliability:</strong> Trust is the foundation of our brand. We deliver what we promise, consistently.</li>\r\n<li><strong>Community:</strong> We foster a sense of community among our users and developers, believing that collective intelligence drives progress.</li>\r\n</ol>', NULL, NULL, 'Codephics - Symbolizing Innovation and Reliability', 'Unveil the essence of Codephics. We stand for innovation, reliability, and a community-driven approach. Dive into our core values and join the revolution.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:26:35'),
(8, 'License', 'License', 'license', '', NULL, '<p>At Codephics, we are committed to transparency and openness. Our applications are distributed under the MIT License. This means that you have the freedom to use, modify, and distribute our software while respecting the terms of the license agreement.</p>\r\n<p><strong>Key Points:</strong></p>\r\n<ol>\r\n<li><strong>Free to Use:</strong> Our applications are free to download and use.</li>\r\n<li><strong>Open Source:</strong> You have access to the source code, enabling customization to suit your needs.</li>\r\n<li><strong>Community Support:</strong> Join a vibrant community of users and developers for support and collaboration.</li>\r\n<li><strong>Commercial Use:</strong> The license allows for both personal and commercial use.</li>\r\n</ol>\r\n<p><strong>License Agreement Excerpt:</strong>&nbsp;</p>\r\n<p>MIT License</p>\r\n<p>Copyright (c) 2023 Codephics</p>\r\n<p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the \"Software\"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>\r\n<p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>\r\n<p>THE SOFTWARE IS PROVIDED \"AS IS,\" WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>', NULL, NULL, 'MIT Agreement - Codephics Software License', 'Understand the terms of the MIT for Codephics software. Free to use, open-source, and community-driven. View our licensing agreement for details.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:26:57'),
(9, 'Contact Us', 'Contact Us', 'contact-us', '', NULL, '<p>Connect with Codephics and take the first step on your digital journey. Whether you have questions, inquiries, or you\'re ready to discuss a project, our team is here to provide prompt and friendly assistance.</p>\r\n<p><strong>Why Contact Codephics:</strong></p>\r\n<ul>\r\n<li>\r\n<p><strong>Prompt Response:</strong> Expect timely and efficient responses to your inquiries.</p>\r\n</li>\r\n<li>\r\n<p><strong>Friendly Assistance:</strong> Our team is here to guide you with a smile, ensuring a positive experience.</p>\r\n</li>\r\n<li>\r\n<p><strong>Collaboration Opportunities:</strong> Whether you\'re a potential client, partner, or enthusiast, we welcome collaboration.</p>\r\n</li>\r\n</ul>\r\n<p>Connect with Codephics today, and let\'s explore the possibilities together!</p>', NULL, NULL, 'Connect with Codephics - Reach Out Today', 'Have questions or inquiries? Contact Codephics for prompt and friendly assistance. We\'re here to help you on your digital journey.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:28:31'),
(10, 'More Blogs', 'More Blogs', 'more-blogs', '', '<p>Welcome to our blog, where knowledge meets inspiration! Explore insightful articles, tech trends, creative ideas, and business solutions. Whether you\'re a tech enthusiast, a creative mind, or a business professional, our diverse content caters to all. Stay informed, inspired, and connected with our community. Dive into the world of innovation and ideas right here!</p>', '<p>Welcome to the Codephics&nbsp;Blog, where knowledge meets inspiration. Our blog is a curated space offering insightful articles, tips, and trends across various topics. Whether you\'re a tech enthusiast, a creative mind, or a business professional, there\'s something for everyone.</p>\r\n<p><strong>What You\'ll Find:</strong></p>\r\n<ol>\r\n<li>\r\n<p><strong>Tech Trends:</strong> Stay updated on the latest in technology, from coding insights to software developments.</p>\r\n</li>\r\n<li>\r\n<p><strong>Creative Inspiration:</strong> Explore the world of design, creativity, and innovation.</p>\r\n</li>\r\n<li>\r\n<p><strong>Business Solutions:</strong> Discover practical tips and strategies for business success.</p>\r\n</li>\r\n<li>\r\n<p><strong>Community Spotlights:</strong> Hear from our community, with features on their journeys and experiences.</p>\r\n</li>\r\n</ol>\r\n<p><strong>Why Read Codephics\'s Blog:</strong></p>\r\n<ul>\r\n<li>\r\n<p><strong>Expert Contributors:</strong> Our blog features contributions from industry experts and thought leaders.</p>\r\n</li>\r\n<li>\r\n<p><strong>Diverse Content:</strong> Whether you\'re seeking information or inspiration, our diverse content caters to various interests.</p>\r\n</li>\r\n<li>\r\n<p><strong>Interactive Community:</strong> Engage with our community through comments and discussions.</p>\r\n</li>\r\n</ul>\r\n<p>Explore the Codephics Blog and stay informed, inspired, and connected.</p>', NULL, NULL, 'Insights, Tips, and Trends - Codephics Blog', 'Explore thought-provoking articles and expert insights on Codephics\'s blog. Stay informed and inspired with our diverse content.', NULL, NULL, NULL, NULL, 'default-icon.png', NULL, 'default-thumb.png', NULL, 'default-cover.png', NULL, 'default-icon.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-07-11 03:25:34');

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
(1, 'Codephics', 'Empowering Digital Solutions | Laravel Applications', NULL, 'Dhaka, Bangladesh', 'info@codephics.com', '01400000000', 'https://facebook.com/codephics', 'https://twitter.com/codephics', 'https://instagram.com/codephics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'apple-touch-icon.png', NULL, 'favicon.png', NULL, 'favicon-32x32.png', NULL, 'favicon-16x16.png', NULL, 'logo.png', NULL, 'default-og.png', NULL, NULL, NULL, NULL, '2024-07-11 00:02:02');

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

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'a@a.a', '2024-07-24 22:03:48', '2024-07-24 22:03:48');

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
(2, 'Codephics', 'info@codephics.com', NULL, '$2y$12$zSCBluo/5X3m/Ta9DHpGOu.pQ58SN6otLMa1KUj5DahWv4e3ZZKnK', NULL, '2024-07-24 21:59:11', '2024-07-24 21:59:11');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ecommerce_pre_orders_uuid_unique` (`uuid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecommerce_leads`
--
ALTER TABLE `ecommerce_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecommerce_pre_orders`
--
ALTER TABLE `ecommerce_pre_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
