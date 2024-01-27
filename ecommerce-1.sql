-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 10:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `slider` varchar(255) DEFAULT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `blog` varchar(255) DEFAULT NULL,
  `setting` varchar(255) DEFAULT NULL,
  `orders` varchar(255) DEFAULT NULL,
  `returnorder` varchar(255) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `reports` varchar(255) DEFAULT NULL,
  `alluser` varchar(255) DEFAULT NULL,
  `adminuserrole` varchar(255) DEFAULT NULL,
  `type` int(25) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `product`, `slider`, `coupon`, `shipping`, `blog`, `setting`, `orders`, `returnorder`, `stock`, `review`, `reports`, `alluser`, `adminuserrole`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$i8Pu/HtFLYICuBz2UOaefuUrL8aIwVl2.yt8x9.0b/M7EckgT1/eK', '565656565', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '5gwc8gAt09v1cu7KCqOEVzvFTMWGwM8SpOLAPCA5T7JbTPy31klJHG0DNeAH', NULL, 'upload/admin_images/admin_profile-1648375551.jpg', NULL, '2023-04-01 12:56:53'),
(7, 'Test', 'test@gmail.com', NULL, '$2y$10$4QZ4MYiKHF6M266OSuY8v.osyudKY8V.6DFzf4Oj6hYgaI9fykTT.', '123654', '', '', '1', '', '1', '1', '', '', '1', '', '', '', '', '1', '', 2, NULL, NULL, 'upload/admin_images/admin_profile-1656525325508.png', '2022-06-29 11:55:25', '2022-06-29 12:48:36'),
(8, 'Demo', 'demo@gmail.com', NULL, '$2y$10$4QZ4MYiKHF6M266OSuY8v.osyudKY8V.6DFzf4Oj6hYgaI9fykTT.', '45654654756', '', '1', '', '1', '', '', '1', '', '', '', '', '1', '', '', '', 2, NULL, NULL, 'upload/admin_images/admin_profile-1656527828573.png', '2022-06-29 11:57:16', '2022-06-29 12:47:53'),
(11, 'ABC', 'abc@gmail.com', NULL, '$2y$10$uH0.RwxDFXWYwePZ7YrSCeFNmTJKNh1ieDaTHopxQBAPfEQh1Nts.', '+1 (933) 657-4933', '', '1', '', '1', '', '', '', '', '', '', '1', '1', '', '', '', 2, NULL, NULL, 'upload/admin_images/admin_profile-1656532926684.png', '2022-06-29 14:00:26', '2022-06-29 14:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_name_bn` varchar(255) NOT NULL,
  `blog_category_name_en` varchar(255) NOT NULL,
  `blog_category_slug_en` varchar(255) NOT NULL,
  `blog_category_slug_bn` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category_name_bn`, `blog_category_name_en`, `blog_category_slug_en`, `blog_category_slug_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'প্রযুক্তি', 'Tech', 'tech', 'প্রযুক্তি', 0, '2022-06-18 15:09:28', '2022-06-18 15:31:18'),
(3, 'ইলেকট্রনিক্স', 'Electronics', 'electronics', 'ইলেকট্রনিক্স', 1, '2022-06-18 16:02:03', '2022-06-18 16:02:03'),
(4, 'ফ্যাশন', 'Fashion', 'fashion', 'ফ্যাশন', 1, '2022-06-19 14:27:21', '2022-06-19 14:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blogcategory_id` int(11) NOT NULL,
  `blogsubcategory_id` int(11) DEFAULT NULL,
  `post_title_en` varchar(255) NOT NULL,
  `post_title_bn` varchar(255) NOT NULL,
  `post_slug_en` varchar(255) NOT NULL,
  `post_slug_bn` varchar(255) NOT NULL,
  `post_details_en` text NOT NULL,
  `post_details_bn` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcategory_id`, `blogsubcategory_id`, `post_title_en`, `post_title_bn`, `post_slug_en`, `post_slug_bn`, `post_details_en`, `post_details_bn`, `post_image`, `author`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur', 'কেননা কেউ আনন্দকে প্রত্যাখ্যান করে না কারণ এটি আনন্দ', 'nemo_enim_ipsam_voluptatem_quia_voluptas_sit_aspernatur', 'কেননা_কেউ_আনন্দকে_প্রত্যাখ্যান_করে_না_কারণ_এটি_আনন্দ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. যাতে বেশিরভাগ অংশের জন্য, আমাদের মধ্যে যে কেউ এটি থেকে উদ্দেশ্যগুলির সুবিধা নেওয়া ব্যতীত যে কোনও ধরণের কর্মসংস্থানের অনুশীলনে আসবে। কিন্তু ফিল্মে বেদনা নিন্দায় ইরারে, আনন্দে বেদনায় সিলুম হওয়ার যন্ত্রণা থেকে বাঁচতে চায়, কোন ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. যাতে বেশিরভাগ অংশের জন্য, আমাদের মধ্যে যে কেউ এটি থেকে উদ্দেশ্যগুলির সুবিধা নেওয়া ব্যতীত যে কোনও ধরণের কর্মসংস্থানের অনুশীলনে আসবে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. যাতে বেশিরভাগ অংশের জন্য, আমাদের মধ্যে যে কেউ এটি থেকে উদ্দেশ্যগুলির সুবিধা নেওয়া ব্যতীত যে কোনও ধরণের কর্মসংস্থানের অনুশীলনে আসবে। কিন্তু ফিল্মে বেদনা নিন্দায় ইরারে, আনন্দে বেদনায় সিলুম হওয়ার যন্ত্রণা থেকে বাঁচতে চায়, কোন ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. যাতে বেশিরভাগ অংশের জন্য, আমাদের মধ্যে যে কেউ এটি থেকে উদ্দেশ্যগুলির সুবিধা নেওয়া ব্যতীত যে কোনও ধরণের কর্মসংস্থানের অনুশীলনে আসবে।</p>\r\n\r\n<p>কিন্তু ফিল্মে বেদনা নিন্দায় ইরারে, আনন্দে বেদনায় সিলুম হওয়ার যন্ত্রণা থেকে বাঁচতে চায়, কোন ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. যাতে বেশিরভাগ অংশের জন্য, আমাদের মধ্যে যে কেউ এটি থেকে উদ্দেশ্যগুলির সুবিধা নেওয়া ব্যতীত যে কোনও ধরণের কর্মসংস্থানের অনুশীলনে আসবে। কিন্তু ফিল্মে বেদনা নিন্দায় ইরারে, আনন্দে বেদনায় সিলুম হওয়ার যন্ত্রণা থেকে বাঁচতে চায়, কোন ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. যাতে বেশিরভাগ অংশের জন্য, আমাদের মধ্যে যে কেউ এটি থেকে উদ্দেশ্যগুলির সুবিধা নেওয়া ব্যতীত যে কোনও ধরণের কর্মসংস্থানের অনুশীলনে আসবে।</p>', 'upload/blog-images/post_image-1655652947424.jpg', 'John Deo', 1, '2022-06-19 08:34:10', '2022-06-19 09:40:23'),
(4, 1, NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'কিন্তু ফিল্মে যন্ত্রণার নিন্দা করতে অরুচি হয়, আনন্দে বেদনায় বেদনার হাত থেকে বাঁচতে চায়, কোনো ফল হয় না।', 'duis_aute_irure_dolor_in_reprehenderit_in_voluptate_velit_esse_cillum_dolore_eu_fugiat_nulla_pariatur.', 'কিন্তু_ফিল্মে_যন্ত্রণার_নিন্দা_করতে_অরুচি_হয়,_আনন্দে_বেদনায়_বেদনার_হাত_থেকে_বাঁচতে_চায়,_কোনো_ফল_হয়_না।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. একটি ন্যূনতম আসার উদ্দেশ্যে, আমাদের মধ্যে কার কোন কর্মসংস্থান অনুশীলন করা উচিত তা থেকে ফলাফলের সুবিধা নেওয়া ছাড়া। কিন্তু ফিল্মে যন্ত্রণার নিন্দা করতে অরুচি হয়, আনন্দে বেদনায় বেদনার হাত থেকে বাঁচতে চায়, কোনো ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. একটি ন্যূনতম আসার উদ্দেশ্যে, আমাদের মধ্যে কার কোন কর্মসংস্থান অনুশীলন করা উচিত তা থেকে ফলাফলের সুবিধা নেওয়া ছাড়া। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. একটি ন্যূনতম আসার উদ্দেশ্যে, আমাদের মধ্যে কার কোন কর্মসংস্থান অনুশীলন করা উচিত তা থেকে ফলাফলের সুবিধা নেওয়া ছাড়া। কিন্তু ফিল্মে যন্ত্রণার নিন্দা করতে অরুচি হয়, আনন্দে বেদনায় বেদনার হাত থেকে বাঁচতে চায়, কোনো ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. একটি ন্যূনতম আসার উদ্দেশ্যে, আমাদের মধ্যে কার কোন কর্মসংস্থান অনুশীলন করা উচিত তা থেকে ফলাফলের সুবিধা নেওয়া ছাড়া।</p>\r\n\r\n<p>কিন্তু ফিল্মে যন্ত্রণার নিন্দা করতে অরুচি হয়, আনন্দে বেদনায় বেদনার হাত থেকে বাঁচতে চায়, কোনো ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. একটি ন্যূনতম আসার উদ্দেশ্যে, আমাদের মধ্যে কার কোন কর্মসংস্থান অনুশীলন করা উচিত তা থেকে ফলাফলের সুবিধা নেওয়া ছাড়া। কিন্তু ফিল্মে যন্ত্রণার নিন্দা করতে অরুচি হয়, আনন্দে বেদনায় বেদনার হাত থেকে বাঁচতে চায়, কোনো ফল হয় না। অন্ধরা যে ব্যতিক্রমগুলির জন্য আকাঙ্ক্ষা করে, তারা দেখতে পায় না, তারাই সেই দোষের প্রতি তাদের দায়িত্ব ত্যাগ করে যা আত্মার কষ্টকে প্রশমিত করে। যন্ত্রণা নিজেই প্রেমের ব্যথা, প্রধান বাস্তুসংস্থান সমস্যা, কিন্তু আমি এই ধরনের সময় নিচে পড়ে, যাতে কিছু মহান ব্যথা এবং ব্যথা. একটি ন্যূনতম আসার উদ্দেশ্যে, আমাদের মধ্যে কার কোন কর্মসংস্থান অনুশীলন করা উচিত তা থেকে ফলাফলের সুবিধা নেওয়া ছাড়া।</p>', 'upload/blog-images/post_image-1655653425100.jpg', 'Siam', 0, '2022-06-19 09:43:45', '2022-06-19 09:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `blog_sub_categories`
--

CREATE TABLE IF NOT EXISTS `blog_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blogcategory_id` int(11) NOT NULL,
  `blog_subcategory_name_en` varchar(255) NOT NULL,
  `blog_subcategory_name_bn` varchar(255) NOT NULL,
  `blog_subcategory_slug_en` varchar(255) NOT NULL,
  `blog_subcategory_slug_bn` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_sub_categories`
--

INSERT INTO `blog_sub_categories` (`id`, `blogcategory_id`, `blog_subcategory_name_en`, `blog_subcategory_name_bn`, `blog_subcategory_slug_en`, `blog_subcategory_slug_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobile Phone', 'মোবাইল ফোন', 'mobile-phone', 'মোবাইল-ফোন', 0, '2022-06-18 16:12:17', '2022-06-18 16:57:53'),
(2, 3, 'Laptop', 'ল্যাপটপ', 'laptop', 'ল্যাপটপ', 1, '2022-06-18 16:13:18', '2022-06-18 16:13:18'),
(4, 3, 'Camera', 'ক্যামেরা', 'camera', 'ক্যামেরা', 1, '2022-06-19 14:25:19', '2022-06-19 14:25:19'),
(5, 4, 'Men\'s Fashion', 'পুরুষদের ফ্যাশন', 'men\'s-fashion', 'পুরুষদের-ফ্যাশন', 1, '2022-06-19 14:28:55', '2022-06-19 14:28:55'),
(6, 4, 'Women\'s Fashion', 'মহিলাদের ফ্যাশন', 'women\'s-fashion', 'মহিলাদের-ফ্যাশন', 1, '2022-06-19 14:29:43', '2022-06-19 14:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_en` varchar(255) NOT NULL,
  `brand_name_bn` varchar(255) NOT NULL,
  `brand_slug_en` varchar(255) NOT NULL,
  `brand_slug_bn` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_bn`, `brand_slug_en`, `brand_slug_bn`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'আপেল', 'apple', 'আপেল', 'upload/brand-images/brand_image-1649009528294.png', '1', '2022-04-03 12:12:10', '2022-04-03 12:12:10'),
(2, 'Huawei', 'হুয়াওয়ে', 'huawei', 'হুয়াওয়ে', 'upload/brand-images/brand_image-1649009633682.png', '1', '2022-04-03 12:13:53', '2022-04-03 12:13:53'),
(3, 'Oppo', 'অপো', 'oppo', 'অপো', 'upload/brand-images/brand_image-1649009652402.png', '1', '2022-04-03 12:14:13', '2022-04-03 12:14:13'),
(4, 'Samsung', 'স্যামসাং', 'samsung', 'স্যামসাং', 'upload/brand-images/brand_image-1649009671973.png', '1', '2022-04-03 12:14:32', '2022-04-03 12:14:32'),
(5, 'Vivo', 'ভিভো', 'vivo', 'ভিভো', 'upload/brand-images/brand_image-1649009724812.png', '1', '2022-04-03 12:15:25', '2022-04-03 12:15:25'),
(6, 'Xiaomi', 'শাওমি', 'xiaomi', 'শাওমি', 'upload/brand-images/brand_image-1649009798577.png', '1', '2022-04-03 12:16:38', '2022-04-03 12:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(255) NOT NULL,
  `category_name_bn` varchar(255) NOT NULL,
  `category_slug_en` varchar(255) NOT NULL,
  `category_slug_bn` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_bn`, `category_slug_en`, `category_slug_bn`, `category_icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'ফ্যাশন', 'fashion', 'ফ্যাশন', 'fa fa-shopping-bag', '1', '2022-04-03 12:23:13', '2022-04-09 03:52:45'),
(2, 'Electronics', 'ইলেকট্রনিক্স', 'electronics', 'ইলেকট্রনিক্স', 'fa fa-laptop', '1', '2022-04-03 12:24:17', '2022-04-09 03:50:57'),
(3, 'Sweet Home', 'সুইট হোম', 'sweet-home', 'সুইট-হোম', 'fa fa-envira', '1', '2022-04-03 12:24:50', '2022-04-09 03:52:02'),
(4, 'Appliances', 'যন্ত্রপাতি', 'appliances', 'যন্ত্রপাতি', 'fa fa-clock-o', '1', '2022-04-03 12:25:19', '2022-04-09 03:53:52'),
(5, 'Beauty', 'সৌন্দর্য', 'beauty', 'সৌন্দর্য', 'fa fa-heartbeat', '1', '2022-04-03 12:25:59', '2022-04-09 03:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HAPPY NEW YEAR', 10, '2022-06-30', 1, '2022-04-20 16:58:23', '2022-04-20 16:58:23'),
(2, 'TEST', 20, '2021-05-01', 1, '2022-04-20 17:10:13', '2022-04-20 17:10:13'),
(3, 'BLACK FRIDAY', 50, '2022-12-31', 1, '2022-04-20 17:21:06', '2022-04-20 17:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_02_203839_create_sessions_table', 1),
(7, '2021_02_02_212221_create_admins_table', 1),
(8, '2022_03_25_122749_add_phone_to_users_table', 1),
(9, '2022_03_27_095602_create_brands_table', 1),
(10, '2022_03_28_120449_create_categories_table', 2),
(11, '2022_03_28_153247_create_sub_categories_table', 3),
(12, '2022_03_28_160006_create_sub_categories_table', 4),
(16, '2022_03_29_122316_create_sub_sub_categories_table', 5),
(17, '2022_03_31_190906_create_products_table', 5),
(18, '2022_03_31_221037_create_multi_imgs_table', 5),
(19, '2022_04_07_185326_create_sliders_table', 6),
(20, '2022_04_18_102716_create_wishlists_table', 7),
(21, '2022_04_20_212113_create_coupons_table', 8),
(23, '2022_04_21_190858_create_ship_divisions_table', 9),
(24, '2022_04_21_203522_create_ship_districts_table', 10),
(25, '2022_04_21_213653_create_ship_states_table', 11),
(26, '2022_04_27_110514_create_shippings_table', 12),
(27, '2022_05_26_191151_create_orders_table', 13),
(28, '2022_05_26_192008_create_order_items_table', 13),
(29, '2022_06_18_193753_create_blog_categories_table', 14),
(30, '2022_06_18_213312_create_blog_sub_categories_table', 15),
(31, '2022_06_18_231807_create_blog_posts_table', 16),
(32, '2022_06_22_190338_create_site_settings_table', 17),
(33, '2022_06_22_203715_create_seo_settings_table', 18),
(34, '2022_06_26_141658_create_reviews_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE IF NOT EXISTS `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(8, 3, 'upload/product-images/multi-images/multi_img-1649499176801.jpeg', '2022-04-09 04:12:56', '2022-04-09 04:12:56'),
(9, 3, 'upload/product-images/multi-images/multi_img-16494991779.jpeg', '2022-04-09 04:12:57', '2022-04-09 04:12:57'),
(10, 3, 'upload/product-images/multi-images/multi_img-1649499177838.jpeg', '2022-04-09 04:12:57', '2022-04-09 04:12:57'),
(11, 5, 'upload/product-images/multi-images/multi_img-1649499780865.jpeg', '2022-04-09 04:23:00', '2022-04-09 04:23:00'),
(12, 5, 'upload/product-images/multi-images/multi_img-1649499780902.jpeg', '2022-04-09 04:23:00', '2022-04-09 04:23:00'),
(13, 6, 'upload/product-images/multi-images/multi_img-164950003349.jpeg', '2022-04-09 04:27:13', '2022-04-09 04:27:13'),
(14, 6, 'upload/product-images/multi-images/multi_img-1649500033527.jpeg', '2022-04-09 04:27:13', '2022-04-09 04:27:13'),
(15, 6, 'upload/product-images/multi-images/multi_img-1649500033435.jpeg', '2022-04-09 04:27:13', '2022-04-09 04:27:13'),
(16, 7, 'upload/product-images/multi-images/multi_img-1649500501828.jpeg', '2022-04-09 04:35:01', '2022-04-09 04:35:01'),
(17, 7, 'upload/product-images/multi-images/multi_img-1649500501109.jpeg', '2022-04-09 04:35:02', '2022-04-09 04:35:02'),
(18, 8, 'upload/product-images/multi-images/multi_img-1649500665425.jpeg', '2022-04-09 04:37:45', '2022-04-09 04:37:45'),
(19, 8, 'upload/product-images/multi-images/multi_img-1649500665725.jpeg', '2022-04-09 04:37:45', '2022-04-09 04:37:45'),
(20, 9, 'upload/product-images/multi-images/multi_img-1649501239752.jpeg', '2022-04-09 04:47:19', '2022-04-09 04:47:19'),
(21, 9, 'upload/product-images/multi-images/multi_img-1649501240634.jpeg', '2022-04-09 04:47:20', '2022-04-09 04:47:20'),
(22, 10, 'upload/product-images/multi-images/multi_img-1649501427754.jpeg', '2022-04-09 04:50:28', '2022-04-09 04:50:28'),
(23, 11, 'upload/product-images/multi-images/multi_img-1649501620172.jpeg', '2022-04-09 04:53:41', '2022-04-09 04:53:41'),
(24, 11, 'upload/product-images/multi-images/multi_img-1649501621844.jpeg', '2022-04-09 04:53:41', '2022-04-09 04:53:41'),
(25, 11, 'upload/product-images/multi-images/multi_img-1649501621935.jpeg', '2022-04-09 04:53:42', '2022-04-09 04:53:42'),
(26, 12, 'upload/product-images/multi-images/multi_img-1649502166399.jpeg', '2022-04-09 05:02:47', '2022-04-09 05:02:47'),
(27, 12, 'upload/product-images/multi-images/multi_img-164950216779.jpeg', '2022-04-09 05:02:47', '2022-04-09 05:02:47'),
(28, 12, 'upload/product-images/multi-images/multi_img-1649502167632.jpeg', '2022-04-09 05:02:47', '2022-04-09 05:02:47'),
(29, 12, 'upload/product-images/multi-images/multi_img-1649502167573.jpeg', '2022-04-09 05:02:48', '2022-04-09 05:02:48'),
(30, 13, 'upload/product-images/multi-images/multi_img-1649503883294.jpeg', '2022-04-09 05:31:24', '2022-04-09 05:31:24'),
(31, 13, 'upload/product-images/multi-images/multi_img-1660736505893.png', '2022-04-09 05:31:24', '2022-08-17 05:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processing_date` varchar(255) DEFAULT NULL,
  `picked_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_order` int(11) NOT NULL DEFAULT 0,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_order`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(12, 1, 1, 2, 1, 'User', 'user@gmail.com', '01768553823', 8020, NULL, 'card_1LAYRWKdjtHDQMO1dVgiYBFN', 'Stripe', 'txn_3LAYRbKdjtHDQMO10NuuVxqJ', 'usd', 5796.00, '62a878b8db59c', 'EOS20172515', '14 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'pending', '2022-06-14 06:02:09', '2022-06-14 06:02:09'),
(14, 1, 2, 4, 5, 'User', 'user@gmail.com', '01768553823', 8222, 'DDDDDDDDDD', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 8800.00, NULL, 'EOS55558330', '14 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'confirm', '2022-06-14 06:12:14', '2022-06-16 05:34:57'),
(15, 1, 1, 1, 6, 'User', 'user@gmail.com', '01768553823', 8555, 'SSSSSSSSSS', 'card_1LAYfJKdjtHDQMO1a1U7QRDY', 'Stripe', 'txn_3LAYfTKdjtHDQMO10Gb5mCTG', 'usd', 14670.00, '62a87c16120d7', 'EOS10329412', '14 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'cancel', '2022-06-14 06:16:25', '2022-06-15 14:15:17'),
(16, 1, 1, 2, 2, 'User', 'user@gmail.com', '01768553823', 6220, 'FFFFFFFFFFF', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 8640.00, NULL, 'EOS51861466', '14 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, '14 June 2022', 1, 'Wrong Product', 'delivered', '2022-06-14 06:17:55', '2022-06-24 14:25:18'),
(17, 1, 1, 1, 6, 'User', 'user@gmail.com', '01768553823', 6565, 'DDDDDDDDDDDD', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 4000.00, NULL, 'EOS11138383', '16 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'delivered', '2022-06-16 05:33:34', '2022-06-28 07:01:10'),
(18, 1, 1, 2, 2, 'User', 'user@gmail.com', '01768553823', 6565, 'gggggggggggggggg', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 15000.00, NULL, 'EOS33662604', '03 July 2022', 'July', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'pending', '2022-07-03 08:38:56', '2022-07-03 08:38:56'),
(19, 1, 1, 2, 2, 'User', 'user@gmail.com', '01768553823', 6565, 'gggggggggggggggg', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 15000.00, NULL, 'EOS77123569', '03 July 2022', 'July', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'pending', '2022-07-03 08:39:52', '2022-07-03 08:39:52'),
(20, 1, 1, 2, 2, 'User', 'user@gmail.com', '01768553823', 6565, 'gggggggggggggggg', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 15000.00, NULL, 'EOS96462587', '03 July 2022', 'July', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'processing', '2022-07-03 08:41:11', '2022-07-03 08:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 12, 13, 'Red', 'Large', '2', 320.00, '2022-06-14 06:02:23', '2022-06-14 06:02:23'),
(2, 12, 11, 'Green', 'Medium', '3', 600.00, '2022-06-14 06:02:23', '2022-06-14 06:02:23'),
(3, 12, 8, 'Red', 'Medium', '1', 4000.00, '2022-06-14 06:02:23', '2022-06-14 06:02:23'),
(4, 14, 8, 'Red', NULL, '1', 4000.00, '2022-06-14 06:12:46', '2022-06-14 06:12:46'),
(5, 14, 6, 'Red', 'Large', '1', 4800.00, '2022-06-14 06:12:46', '2022-06-14 06:12:46'),
(6, 15, 8, 'Red', NULL, '1', 4000.00, '2022-06-14 06:16:43', '2022-06-14 06:16:43'),
(7, 15, 6, 'Red', 'Large', '1', 4800.00, '2022-06-14 06:16:43', '2022-06-14 06:16:43'),
(8, 15, 3, 'Red', 'Large', '1', 7500.00, '2022-06-14 06:16:43', '2022-06-14 06:16:43'),
(9, 16, 6, 'Red', 'Large', '2', 4800.00, '2022-06-14 06:18:03', '2022-06-14 06:18:03'),
(10, 17, 8, 'Red', NULL, '1', 4000.00, '2022-06-16 05:34:25', '2022-06-16 05:34:25'),
(11, 20, 3, 'Red', 'Large', '2', 7500.00, '2022-07-03 08:41:25', '2022-07-03 08:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_name_bn` varchar(255) NOT NULL,
  `product_slug_en` varchar(255) NOT NULL,
  `product_slug_bn` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_tags_en` varchar(255) NOT NULL,
  `product_tags_bn` varchar(255) NOT NULL,
  `product_size_en` varchar(255) DEFAULT NULL,
  `product_size_bn` varchar(255) DEFAULT NULL,
  `product_color_en` varchar(255) NOT NULL,
  `product_color_bn` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_descp_en` varchar(255) NOT NULL,
  `short_descp_bn` varchar(255) NOT NULL,
  `long_descp_en` text NOT NULL,
  `long_descp_bn` text NOT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_bn`, `long_descp_en`, `long_descp_bn`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 2, 5, 14, 'Samsung Monitor', 'স্যামসাং মনিটর', 'samsung_monitor', 'স্যামসাং_মনিটর', '11111111111', '20', 'Monitor', 'Monitor', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '8000', '7500', 'aaaaaaaaaaaaa', 'bbbbbbbbbbb', '<p>AAAAAAAAAAAAAAAA</p>', '<p>BBBBBBBBBBBBBBBBBBB</p>', 'upload/product-images/thambnail/product_thambnail-1649499172511.jpeg', 0, 1, 1, 0, 1, '2022-04-09 04:12:56', '2022-04-10 14:35:53'),
(5, 6, 2, 7, 20, 'Xiaomi Gaming Keyboard', 'শাওমি গেমিং কীবোর্ড', 'xiaomi_gaming_keyboard', 'শাওমি_গেমিং_কীবোর্ড', '222222222', '50', 'test,', 'test,', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '1200', '1000', 'aaaaaaaaaa', 'bbbbbbbbb', '<p>AAAAAAAAAA</p>', '<p>BBBBBBBBBBB</p>', 'upload/product-images/thambnail/product_thambnail-1649499779872.jpeg', 1, 0, 1, 1, 1, '2022-04-09 04:23:00', '2022-04-10 14:41:39'),
(6, 2, 2, 5, 14, 'Huawei Non LED Monitor', 'হুয়াওয়ে নন এলইডি মনিটর', 'huawei_non_led_monitor', 'হুয়াওয়ে_নন_এলইডি_মনিটর', '333333333', '30', 'Monitor', 'Monitor', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '5000', '4800', 'wwwwwwwwwww', 'qqqqqqqqqqqq', '<p>WWWWWWWWW</p>', '<p>QQQQQQQQQQQQ</p>', 'upload/product-images/thambnail/product_thambnail-1649500032835.jpeg', 1, 1, 0, 1, 1, '2022-04-09 04:27:12', '2022-04-10 14:35:31'),
(7, 1, 2, 5, 13, 'Canon Printer', 'ক্যানন প্রিন্টার', 'canon_printer', 'ক্যানন_প্রিন্টার', 'Aut alias alias accu', '15', 'Printer', 'Printer', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '4500', '4200', 'cccccccccc', 'ooooooooo', '<p>CCCCCCCCCCCCC</p>', '<p>OOOOOOOOOOOO</p>', 'upload/product-images/thambnail/product_thambnail-1649500501351.jpeg', 0, 0, 0, 1, 1, '2022-04-09 04:35:01', '2022-04-10 14:34:01'),
(8, 4, 2, 5, 13, 'Epson Printer', 'এপসন প্রিন্টার', 'epson_printer', 'এপসন_প্রিন্টার', '555555555', '99', 'Printer,abc', 'Printer,abc', NULL, NULL, 'Red', 'Red', '4000', NULL, 'eeeeeeeee', 'rrrrrrrrrrrrrr', '<p>EEEEEEEEEE</p>', '<p>RRRRRRRRR</p>', 'upload/product-images/thambnail/product_thambnail-1649500664283.jpeg', 1, 1, 1, 0, 1, '2022-04-09 04:37:45', '2022-06-28 07:01:10'),
(9, 3, 1, 3, 8, 'Running Shoes For Men', 'পুরুষদের জন্য চলমান জুতা', 'running_shoes_for_men', 'পুরুষদের_জন্য_চলমান_জুতা', '666666666', '200', 'test,', 'test,', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '2600', '2500', 'ssssssssssss', 'hhhhhhhhhh', '<p>SSSSSSSSSS</p>', '<p>HHHHHHHHHH</p>', 'upload/product-images/thambnail/product_thambnail-1649501239804.jpeg', 0, 0, 0, 0, 1, '2022-04-09 04:47:19', '2022-04-10 08:34:39'),
(10, 4, 1, 1, 2, 'Stripped T-shirt', 'ডোরাকাটা টি-শার্ট', 'stripped_t-shirt', 'ডোরাকাটা_টি-শার্ট', '777777777', '400', 'T-Shirt', 'T-Shirt', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '450', '400', 'dddddddddd', 'sssssssssss', '<p>DDDDDDDDDD</p>', '<p>SSSSSSSSSSSS</p>', 'upload/product-images/thambnail/product_thambnail-1649501427908.jpeg', 1, 0, 0, 0, 1, '2022-04-09 04:50:27', '2022-04-10 14:32:19'),
(11, 3, 1, 1, 1, 'Hoddie Fom Men', 'পুরুষদের জন্য হুডি', 'hoddie_fom_men', 'পুরুষদের_জন্য_হুডি', '888888888', '300', 'test,', 'test,', 'Large,Medium,Small', 'Large,Medium,Small', 'Red,Green,Blue', 'Red,Green,Blue', '700', '600', 'hhhhhhhhh', 'fffffffffffff', '<p>HHHHHHHHHHH</p>', '<p>FFFFFFFFFF</p>', 'upload/product-images/thambnail/product_thambnail-1649501620618.jpeg', 1, 1, NULL, NULL, 1, '2022-04-09 04:53:40', '2022-04-09 12:10:28'),
(12, 4, 1, 1, 1, 'Printed T-Shirt White', 'প্রিন্ট করা টি-শার্ট সাদা', 'printed_t-shirt_white', 'প্রিন্ট_করা_টি-শার্ট_সাদা', '9999999999', '450', 'T-Shirt', 'T-Shirt', 'Large,Medium,Small', 'Large,Medium,Small,Nulla tempore omnis', 'Red,Green,Blue,Quia cupiditate blan', 'Red,Green,Blue,Consequatur sit ut', '350', '320', 'pppppppppp', 'eeeeeeeeee', '<p>PPPPPPPPPPPP</p>', '<p>EEEEEEEEEE</p>', 'upload/product-images/thambnail/product_thambnail-1649502166770.jpeg', 0, 0, 1, 0, 1, '2022-04-09 05:02:46', '2022-04-10 14:51:30'),
(13, 1, 1, 1, 1, 'Printed T-Shirt Black', 'প্রিন্ট করা টি-শার্ট কালো', 'printed_t-shirt_black', 'প্রিন্ট_করা_টি-শার্ট_কালো', '10000000', '300', 'T-Shirt,abc', 'T-Shirt,abc', 'Large,Medium', 'বড়,মধ্যম', 'Red,Blue,black', 'লাল,নীল,কালো', '320', NULL, 'bbbbb', 'lllllllllllllll', '<p>BBBBBBBB</p>', '<p>LLLLLLLLLL</p>', 'upload/product-images/thambnail/product_thambnail-1649503883788.jpeg', 0, 1, 0, 0, 1, '2022-04-09 05:31:23', '2022-04-14 05:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quality_rating` tinyint(4) NOT NULL,
  `price_rating` tinyint(4) NOT NULL,
  `value_rating` tinyint(4) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `quality_rating`, `price_rating`, `value_rating`, `summary`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 3, 5, 3, 'Nice Product', 'Huawei Non LED Monitor - very nice product', 1, '2022-06-26 09:18:08', '2022-06-27 13:42:17'),
(3, 11, 1, 4, 3, 2, 'Nice Hoddie', 'Hoddie Fom Men -  is very nice hoddie', 1, '2022-06-27 14:40:16', '2022-06-27 14:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE IF NOT EXISTS `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `meta_title`, `meta_author`, `meta_keywords`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'meta_title', 'meta_author', 'meta_keywords', 'meta_description', 'google_analytics', NULL, '2022-06-22 14:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('30iZv0BhomGyZMYVRGVPnTRu4PnnE3xKTZBidtOo', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVzB4aXFiTVRDZGk4Nmdib0RmVUthdFVzM0o3YlFYdmVRRVlsQXZ1WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7TjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO047czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1661287343),
('9TZr3uz1Pn7OjVMUL3QNaAEitHL6t9hoh10vkuON', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0JuYlZqNjNqTElPd1lpSU9JT21peGxJaGpCYnNvVHVjbkpOZGRmUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1680519884),
('c7jmVeFvFmfUFtKdjA2ge515NCsieX2oiINPMaXg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTE3UmVkRmZwNGpENXR3MzN6STRERHNxR0FUTVFLbG40N1BESFNZaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1661259147),
('casScs7GqpA2e056YpOeDCUOhLmeaNc48ByoRvPy', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQlhYWDRHZkZLSmVSQjFwRDJiS2hkWWRzQ2JiYlRxcWRGUmFYeEFaeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYwOiJodHRwOi8vbG9jYWxob3N0L0xhcmF2ZWwvZWNvbW1lcmNlL3B1YmxpYy9hZG1pbi9wcm9maWxlL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1680362086),
('G3UY7wod10ok5hVcAKY5d4758j5JT8zQicOlR1Rm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1RSR05nd3NXcTFJdE9ia0tadTlCMEhjZnRKcnVORVAzR3ZMa3JIbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9icmFuZC9hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1661256770),
('HVEWehZD4XHRHDAKM56SpOFKBZW0w5f482kX3lvX', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZUVyMW1VbjZ4UUppclFqQW9xVjNtYk9GTUh3WW14UzBMWjRla3hjViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbC9lY29tbWVyY2UvcHVibGljL2FkbWluL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1680385170),
('kbo7TuyXPCjsd8AdaoR6jYr3czBG9l9DmLkvBq8s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTDRuSHVTcGF6amo2RUt1OGc4SjJwUUc3YWpFSll4bFNmcHBiVXFlZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkNFFaNE1ZaUtIRjZNMjY2T1N1WTh2Lm9zeXVkS1k4Vi42REZ6ZjRPajZoWWdhSTlmeWtUVC4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDRRWjRNWWlLSEY2TTI2Nk9TdVk4di5vc3l1ZEtZOFYuNkRGemY0T2o2aFlnYUk5ZnlrVFQuIjt9', 1661527214),
('lHLMGyKABeRgwqqz19zJ7muNBQZ4e6TVJKYoAuRr', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWk2UjkwMmtvRTBIUm8yUTdGNlZhR3NKdTI2bTJlWnVoQ1ZXZ2RGQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbC9lY29tbWVyY2UvcHVibGljL2FkbWluL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1680351102),
('TM75Ti1jp7UHqOse3sziAlkbUvwJ2KZ2JziTzd0f', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlNIc0c4ODR5NFZIRGQzRWJodmpTaU5vZzJKT3BTOTNyTktEWlpVOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1661256745),
('VxdeKEmXXd6QSwRTz2675797DtP1uaoS2gXks8vm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWTZrYnhqd0paUTlJd0c3Nk8zdVc2TXhVazVsU000RzM2UlE1bDNKViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkNFFaNE1ZaUtIRjZNMjY2T1N1WTh2Lm9zeXVkS1k4Vi42REZ6ZjRPajZoWWdhSTlmeWtUVC4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDRRWjRNWWlLSEY2TTI2Nk9TdVk4di5vc3l1ZEtZOFYuNkRGemY0T2o2aFlnYUk5ZnlrVFQuIjtzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvd2lzaGxpc3QvdmlldyI7fX0=', 1661179290),
('VxYUQTH1t6NYEAL9SAaZDV1hA4ZQsXiG8Yq5hils', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRzR5VGZzM04xdlFPbmZuaUtyY25vYmtuQXJRNEdkbXNzY3Y0UW1LaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1661256772),
('ya1sUWzFRZZs9aDbtPTB92Pxz5pdrP4ofz51BaxI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXc5RlYwUWFHb0YxWVdGSzNJeHU3TzJJWGNsWVlRamdoNU1DcGh2TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1680422401),
('ZfWAuaXhQ6aVejdlIpe5aSVtYRHS3EVLvb1IWTZk', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYzhlYUxaSlZaRktERklrTmE5dDVSWlZNZFp6VW1RT1ZmTThUZWgwMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4vZ2l0aHViL2NhbGxiYWNrP2NvZGU9OGQ3NDAxYTdlMWE4YmYyMmIxNTAmc3RhdGU9anQ3VDdSMWl2bFFlQUx5V1h0R2VoWXhJb3lMUGtlZ0dRVmhuckNwUCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtOO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7TjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1661287106),
('zgs6Aa8cgmpkGnkSaZMFoAyaFIlBSLoeZhi8bKuH', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoicEd1bHZkQkhJNHp3ODF4SVhDdWdwRWQxUTJUVFN0UjFjRmVIWkJ6aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zbGlkZXIvYWxsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGk4UHUvSHRGTFlJQ3VCejJVT2FlZnVVckw4YUl3VmwyLnl0OHg5LjBiL003RWNrZ1QxL2VLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRpOFB1L0h0RkxZSUN1QnoyVU9hZWZ1VXJMOGFJd1ZsMi55dDh4OS4wYi9NN0Vja2dUMS9lSyI7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTk6InBhc3N3b3JkX2hhc2hfYWRtaW4iO3M6NjA6IiQyeSQxMCRpOFB1L0h0RkxZSUN1QnoyVU9hZWZ1VXJMOGFJd1ZsMi55dDh4OS4wYi9NN0Vja2dUMS9lSyI7fQ==', 1706216583);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE IF NOT EXISTS `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rajbari', 1, '2022-04-21 14:59:45', '2022-04-21 15:28:08'),
(2, 1, 'Shariatpur', 1, '2022-04-21 15:00:23', '2022-04-21 15:00:23'),
(3, 2, 'Barguna', 0, '2022-04-21 15:00:41', '2022-04-21 15:27:48'),
(4, 2, 'Vhola', 1, '2022-04-21 15:00:53', '2022-04-21 15:00:53'),
(5, 3, 'habigonj', 0, '2022-04-21 15:01:12', '2022-04-21 15:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE IF NOT EXISTS `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2022-04-21 13:27:06', '2022-04-21 14:28:32'),
(2, 'Barishal', 1, '2022-04-21 13:38:33', '2022-04-21 14:15:36'),
(3, 'sylhet', 0, '2022-04-21 14:16:22', '2022-04-21 14:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE IF NOT EXISTS `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'naria', 1, '2022-04-21 16:46:23', '2022-04-21 16:46:23'),
(2, 1, 2, 'goshairhat', 1, '2022-04-21 17:02:45', '2022-04-21 17:02:45'),
(4, 1, 2, 'damudda', 0, '2022-04-21 17:14:12', '2022-04-21 17:20:31'),
(5, 2, 4, 'goal nodi', 1, '2022-04-21 17:14:49', '2022-04-21 17:14:49'),
(6, 1, 1, 'pangsha', 1, '2022-04-21 17:15:11', '2022-04-21 17:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `phone_one` varchar(255) DEFAULT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `company_name`, `company_address`, `phone_one`, `phone_two`, `email`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/logo-1655928322167.png', 'ThemesGround', '789 Main rd, Anytown, CA 12345 USA', '+(888) 123-4567', '+(888) 456-7890', 'flipmart@themesground.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', NULL, '2022-06-22 14:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) DEFAULT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `slider_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_en`, `title_bn`, `description_en`, `description_bn`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Slider One', 'স্লাইডার ওয়ান', 'Slider Description Text One', 'স্লাইডার বর্ণনা পাঠ্য এক', 'upload/slider-images/slider_image-1649362932880.jpg', 1, '2022-04-07 13:44:15', '2022-04-08 04:41:58'),
(4, 'Slider Two', 'স্লাইডার দুই', 'Slider Description Text Two', 'স্লাইডার বর্ণনা পাঠ্য দুই', 'upload/slider-images/slider_image-1649414442807.jpg', 1, '2022-04-08 04:40:43', '2022-04-08 04:40:43'),
(5, 'Slider Three', 'স্লাইডার তিন', 'Slider Description Text Three', 'স্লাইডার বর্ণনা পাঠ্য তিন', 'upload/slider-images/slider_image-1649414462446.jpg', 0, '2022-04-08 04:41:02', '2022-04-08 04:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) NOT NULL,
  `subcategory_name_bn` varchar(255) NOT NULL,
  `subcategory_slug_en` varchar(255) NOT NULL,
  `subcategory_slug_bn` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_bn`, `subcategory_slug_en`, `subcategory_slug_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mans Top Ware', 'মানস টপ ওয়্যার', 'mans-top-ware', 'মানস-টপ-ওয়্যার', '1', '2022-04-03 12:50:51', '2022-04-03 13:03:44'),
(2, 1, 'Mans Bottom Ware', 'ম্যানস বটম ওয়ার', 'mans-bottom-ware', 'ম্যানস-বটম-ওয়ার', '1', '2022-04-03 12:51:41', '2022-04-03 12:51:41'),
(3, 1, 'Mans Footwear', 'মানস পাদুকা', 'mans-footwear', 'মানস-পাদুকা', '1', '2022-04-03 12:52:13', '2022-04-03 12:52:13'),
(4, 1, 'Women Footwear', 'মহিলাদের পাদুকা', 'women-footwear', 'মহিলাদের-পাদুকা', '1', '2022-04-03 12:52:44', '2022-04-03 12:52:44'),
(5, 2, 'Computer Peripherals', 'কম্পিউটার পেরিফেরাল', 'computer-peripherals', 'কম্পিউটার-পেরিফেরাল', '1', '2022-04-03 12:54:39', '2022-04-03 12:54:39'),
(6, 2, 'Mobile Accessory', 'মোবাইল অ্যাকসেসরি', 'mobile-accessory', 'মোবাইল-অ্যাকসেসরি', '1', '2022-04-03 12:55:01', '2022-04-03 12:55:01'),
(7, 2, 'Gaming', 'গেমিং', 'gaming', 'গেমিং', '1', '2022-04-03 12:55:21', '2022-04-03 12:55:21'),
(8, 3, 'Home Furnishings', 'বাড়ির আসবাবপত্র', 'home-furnishings', 'বাড়ির-আসবাবপত্র', '1', '2022-04-03 12:55:48', '2022-04-03 12:55:48'),
(9, 3, 'Living Room', 'বসার ঘর', 'living-room', 'বসার-ঘর', '1', '2022-04-03 12:56:10', '2022-04-03 12:56:10'),
(10, 3, 'Home Decor', 'বাড়ির সাজসজ্জা', 'home-decor', 'বাড়ির-সাজসজ্জা', '1', '2022-04-03 12:56:31', '2022-04-03 12:56:31'),
(11, 4, 'Televisions', 'টেলিভিশন', 'televisions', 'টেলিভিশন', '1', '2022-04-03 12:57:04', '2022-04-03 12:57:04'),
(12, 4, 'Washing Machines', 'ওয়াশিং মেশিন', 'washing-machines', 'ওয়াশিং-মেশিন', '1', '2022-04-03 12:57:24', '2022-04-03 12:57:24'),
(13, 4, 'Refrigerators', 'রেফ্রিজারেটর', 'refrigerators', 'রেফ্রিজারেটর', '1', '2022-04-03 12:57:40', '2022-04-03 13:02:26'),
(14, 5, 'Beauty and Personal Care', 'সৌন্দর্য এবং ব্যক্তিগত যত্ন', 'beauty-and-personal-care', 'সৌন্দর্য-এবং-ব্যক্তিগত-যত্ন', '1', '2022-04-03 12:58:01', '2022-04-03 12:58:01'),
(15, 5, 'Food and Drinks', 'খাদ্য ও পানীয়', 'food-and-drinks', 'খাদ্য-ও-পানীয়', '1', '2022-04-03 12:58:25', '2022-04-03 12:58:25'),
(16, 5, 'Baby Care', 'শিশুর যত্ন', 'baby-care', 'শিশুর-যত্ন', '1', '2022-04-03 12:59:00', '2022-04-03 12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(255) NOT NULL,
  `subsubcategory_name_bn` varchar(255) NOT NULL,
  `subsubcategory_slug_en` varchar(255) NOT NULL,
  `subsubcategory_slug_bn` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_bn`, `subsubcategory_slug_en`, `subsubcategory_slug_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mans T-shirt', 'ম্যানস টি-শার্ট', 'mans-t-shirt', 'ম্যানস-টি-শার্ট', '1', '2022-04-03 13:05:00', '2022-04-03 13:05:00'),
(2, 1, 1, 'Mans Casual Shirts', 'ম্যানস ক্যাজুয়াল শার্ট', 'mans-casual-shirts', 'ম্যানস-ক্যাজুয়াল-শার্ট', '1', '2022-04-03 13:05:32', '2022-04-03 13:05:32'),
(3, 1, 1, 'Mans Kurtas', 'মানস কুর্তা', 'mans-kurtas', 'মানস-কুর্তা', '1', '2022-04-03 13:05:56', '2022-04-03 13:05:56'),
(4, 1, 2, 'Mans Jeans', 'ম্যানস জিন্স', 'mans-jeans', 'ম্যানস-জিন্স', '1', '2022-04-03 13:06:13', '2022-04-03 13:06:13'),
(5, 1, 2, 'Mans Trousers', 'মানস ট্রাউজার্স', 'mans-trousers', 'মানস-ট্রাউজার্স', '1', '2022-04-03 13:06:32', '2022-04-03 13:06:32'),
(6, 1, 2, 'Mans Cargos', 'ম্যানস কার্গোস', 'mans-cargos', 'ম্যানস-কার্গোস', '1', '2022-04-03 13:06:51', '2022-04-03 13:06:51'),
(7, 1, 3, 'Mans Sports Shoes', 'মানস ক্রীড়া জুতা', 'mans-sports-shoes', 'মানস-ক্রীড়া-জুতা', '1', '2022-04-03 13:07:13', '2022-04-03 13:07:13'),
(8, 1, 3, 'Mans Casual Shoes', 'ম্যানস ক্যাজুয়াল জুতা', 'mans-casual-shoes', 'ম্যানস-ক্যাজুয়াল-জুতা', '1', '2022-04-03 13:07:30', '2022-04-03 13:07:30'),
(9, 1, 3, 'Mans Formal Shoes', 'মানস ফরমাল জুতা', 'mans-formal-shoes', 'মানস-ফরমাল-জুতা', '1', '2022-04-03 13:08:49', '2022-04-03 13:08:49'),
(10, 1, 4, 'Women Flats', 'মহিলা ফ্ল্যাট', 'women-flats', 'মহিলা-ফ্ল্যাট', '1', '2022-04-03 13:09:19', '2022-04-03 13:09:19'),
(11, 1, 4, 'Women Heels', 'মহিলাদের হিল', 'women-heels', 'মহিলাদের-হিল', '1', '2022-04-03 13:09:32', '2022-04-03 13:09:32'),
(12, 1, 4, 'Woman Sneakers', 'মহিলা স্নিকার্স', 'woman-sneakers', 'মহিলা-স্নিকার্স', '1', '2022-04-03 13:10:39', '2022-04-03 13:10:39'),
(13, 2, 5, 'Printers', 'প্রিন্টার', 'printers', 'প্রিন্টার', '1', '2022-04-03 13:11:09', '2022-04-03 13:11:09'),
(14, 2, 5, 'Monitors', 'মনিটর', 'monitors', 'মনিটর', '1', '2022-04-03 13:11:24', '2022-04-03 13:11:24'),
(15, 2, 5, 'Projectors', 'প্রজেক্টর', 'projectors', 'প্রজেক্টর', '1', '2022-04-03 13:11:40', '2022-04-03 13:11:40'),
(16, 2, 6, 'Plain Cases', 'প্লেইন কেস', 'plain-cases', 'প্লেইন-কেস', '1', '2022-04-03 13:12:00', '2022-04-03 13:12:00'),
(17, 2, 6, 'Designer Cases', 'ডিজাইনার কেস', 'designer-cases', 'ডিজাইনার-কেস', '1', '2022-04-03 13:12:15', '2022-04-03 13:12:15'),
(18, 2, 6, 'Screen Guards', 'স্ক্রিন গার্ড', 'screen-guards', 'স্ক্রিন-গার্ড', '1', '2022-04-03 13:12:31', '2022-04-03 13:12:31'),
(19, 2, 7, 'Gaming Mouse', 'গেমিং মাউস', 'gaming-mouse', 'গেমিং-মাউস', '1', '2022-04-03 13:12:47', '2022-04-03 13:12:47'),
(20, 2, 7, 'Gaming Keyboards', 'গেমিং কীবোর্ড', 'gaming-keyboards', 'গেমিং-কীবোর্ড', '1', '2022-04-03 13:13:15', '2022-04-03 13:13:15'),
(21, 2, 7, 'Gaming Mousepads', 'গেমিং মাউসপ্যাড', 'gaming-mousepads', 'গেমিং-মাউসপ্যাড', '1', '2022-04-03 13:13:38', '2022-04-03 13:13:38'),
(22, 3, 8, 'Bed Liners', 'বিছানা লাইনার', 'bed-liners', 'বিছানা-লাইনার', '1', '2022-04-03 13:14:07', '2022-04-03 13:14:07'),
(23, 3, 8, 'Bedsheets', 'বিছানার চাদর', 'bedsheets', 'বিছানার-চাদর', '1', '2022-04-03 13:14:25', '2022-04-03 13:14:25'),
(24, 3, 8, 'Blankets', 'কম্বল', 'blankets', 'কম্বল', '1', '2022-04-03 13:14:39', '2022-04-03 13:14:39'),
(25, 3, 9, 'Tv Units', 'টিভি ইউনিট', 'tv-units', 'টিভি-ইউনিট', '1', '2022-04-03 13:14:54', '2022-04-03 13:14:54'),
(26, 3, 9, 'Dining Sets', 'ডাইনিং সেট', 'dining-sets', 'ডাইনিং-সেট', '1', '2022-04-03 13:15:20', '2022-04-03 13:15:20'),
(27, 3, 9, 'Coffee Tables', 'কফি টেবিল', 'coffee-tables', 'কফি-টেবিল', '1', '2022-04-03 13:15:46', '2022-04-03 13:15:46'),
(28, 3, 10, 'Lightings', 'আলো', 'lightings', 'আলো', '1', '2022-04-03 13:17:08', '2022-04-03 13:17:08'),
(29, 3, 10, 'Clocks', 'ঘড়ি', 'clocks', 'ঘড়ি', '1', '2022-04-03 13:17:39', '2022-04-03 13:17:39'),
(30, 3, 10, 'Wall Decor', 'দেয়াল সজ্জা', 'wall-decor', 'দেয়াল-সজ্জা', '1', '2022-04-03 13:18:20', '2022-04-03 13:18:20'),
(31, 4, 11, 'Big Screen TVs', 'বড় পর্দার টিভি', 'big-screen-tvs', 'বড়-পর্দার-টিভি', '1', '2022-04-03 13:19:05', '2022-04-03 13:19:05'),
(32, 4, 11, 'Smart TVs', 'স্মার্ট টিভি', 'smart-tvs', 'স্মার্ট-টিভি', '1', '2022-04-03 13:19:21', '2022-04-03 13:19:21'),
(33, 4, 11, 'LED TVs', 'এলইডি টিভি', 'led-tvs', 'এলইডি-টিভি', '1', '2022-04-03 13:19:41', '2022-04-03 13:19:41'),
(34, 4, 12, 'Washer Dryers', 'ওয়াশার ড্রায়ার', 'washer-dryers', 'ওয়াশার-ড্রায়ার', '1', '2022-04-03 13:20:02', '2022-04-03 13:20:02'),
(35, 4, 12, 'Washer Only', 'শুধুমাত্র ধোয়ার', 'washer-only', 'শুধুমাত্র-ধোয়ার', '1', '2022-04-03 13:20:22', '2022-04-03 13:20:22'),
(36, 4, 12, 'Energy Efficient', 'শক্তি দক্ষ', 'energy-efficient', 'শক্তি-দক্ষ', '1', '2022-04-03 13:20:51', '2022-04-03 13:20:51'),
(37, 4, 13, 'Single Door', 'একক দরজা', 'single-door', 'একক-দরজা', '1', '2022-04-03 13:21:17', '2022-04-03 13:21:17'),
(38, 4, 13, 'Double Door', 'ডবল দরজা', 'double-door', 'ডবল-দরজা', '1', '2022-04-03 13:21:33', '2022-04-03 13:21:33'),
(39, 4, 13, 'Mini Rerigerators', 'মিনি রেরিজারেটর', 'mini-rerigerators', 'মিনি-রেরিজারেটর', '1', '2022-04-03 13:21:50', '2022-04-03 13:28:45'),
(40, 5, 14, 'Eyes Makeup', 'চোখের মেকআপ', 'eyes-makeup', 'চোখের-মেকআপ', '1', '2022-04-03 13:22:26', '2022-04-03 13:22:26'),
(41, 5, 14, 'Lip Makeup', 'ঠোঁটের মেকআপ', 'lip-makeup', 'ঠোঁটের-মেকআপ', '1', '2022-04-03 13:22:48', '2022-04-03 13:22:48'),
(42, 5, 14, 'Hair Care', 'চুলের যত্ন', 'hair-care', 'চুলের-যত্ন', '1', '2022-04-03 13:23:20', '2022-04-03 13:23:20'),
(43, 5, 15, 'Beverages', 'পানীয়', 'beverages', 'পানীয়', '1', '2022-04-03 13:23:38', '2022-04-03 13:23:38'),
(44, 5, 15, 'Chocolates', 'চকলেট', 'chocolates', 'চকলেট', '1', '2022-04-03 13:23:56', '2022-04-03 13:23:56'),
(45, 5, 15, 'Snacks', 'স্ন্যাকস', 'snacks', 'স্ন্যাকস', '1', '2022-04-03 13:24:17', '2022-04-03 13:24:17'),
(46, 5, 16, 'Baby Diapers', 'শিশুর ডায়াপার', 'baby-diapers', 'শিশুর-ডায়াপার', '1', '2022-04-03 13:24:43', '2022-04-03 13:24:43'),
(47, 5, 16, 'Baby Wipes', 'বেবি ওয়াইপস', 'baby-wipes', 'বেবি-ওয়াইপস', '1', '2022-04-03 13:25:16', '2022-04-03 13:25:16'),
(48, 5, 16, 'Baby Food', 'শিশুর খাদ্য', 'baby-food', 'শিশুর-খাদ্য', '1', '2022-04-03 13:25:43', '2022-04-03 13:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `provider_id`, `avatar`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '01768553823', NULL, NULL, NULL, '$2y$10$4QZ4MYiKHF6M266OSuY8v.osyudKY8V.6DFzf4Oj6hYgaI9fykTT.', NULL, NULL, 'hSVH37KBmWZ7IOevuu9XbgCSTyLisfJ76WdGq21ex3cuZ4hptUSoWvkWF0at', NULL, NULL, '2022-03-27 04:02:51', '2022-03-27 04:02:51'),
(2, 'Siam', 'siam@gmail.com', '01571767287', NULL, NULL, NULL, '$2y$10$Qte/F1/suk6SMExro3mlVu6D/aE/qJ2g7BZO2/UCEhr0JrxI9rNfW', NULL, NULL, 'w316wHRbzyRFx4oTsrNnnWV0nidDlUPkMNTk6y2BuJpY7qbxGtb4Cq1ZCx7R', NULL, NULL, '2022-03-27 04:24:46', '2022-03-27 04:24:46'),
(5, 'Raju', 'rajusheikh061@gmail.com', '01760540420', NULL, NULL, NULL, '$2y$10$i8Pu/HtFLYICuBz2UOaefuUrL8aIwVl2.yt8x9.0b/M7EckgT1/eK', NULL, NULL, NULL, NULL, NULL, '2024-01-25 15:00:05', '2024-01-25 15:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(11, 1, 11, '2022-08-22 05:20:36', '2022-08-22 05:20:36'),
(12, 1, 6, '2022-08-22 05:20:53', '2022-08-22 05:20:53'),
(13, 1, 8, '2022-08-22 05:38:04', '2022-08-22 05:38:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
