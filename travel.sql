-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 01:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `mobile`, `is_active`) VALUES
(1, 'Pankaj Poddar', 'pankaj@gmail.com', '12345678', '9123230236', 1),
(2, 'Ankit', 'ankit@gmail.com', '12345678', '1234567891', 1),
(3, 'Ankit Das122', 'pankaj11@gmail.com', '12345678', '1234567891', 1),
(4, 'Student', 'ankitdas.sipl@gmail.com', '12345678', '9123230236', 1),
(5, 'qqqqq', 'pankaj123@gmail.com', '12345678', '7777777777', 1),
(6, 'Ankit Das2', 'pankaj1234@gmail.com', '12345678', '1234567891', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `gallery_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `post_id`, `gallery_img`) VALUES
(29, 2, 'assets/uploads/gallery_image/0_48809700_1726123005-paid-stamp2.png'),
(30, 2, 'assets/uploads/gallery_image/0_54757300_1726123005-bit.png'),
(31, 5, 'assets/uploads/gallery_image/0_39092200_1726123186-paid-stamp2.png'),
(32, 5, 'assets/uploads/gallery_image/0_46285500_1726123186-bit.png'),
(35, 1, 'assets/uploads/gallery_image/0_21341500_1726471230-5-1-1712142679-user.png'),
(36, 1, 'assets/uploads/gallery_image/0_65627900_1726471230-user2.png'),
(37, 1, 'assets/uploads/gallery_image/0_67614900_1726471230-user1.png'),
(38, 1, 'assets/uploads/gallery_image/0_69743500_1726471230-1711781418-profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `post_type` int(11) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sub_title` text NOT NULL,
  `description` text NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `publish_date` date DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `is_new` tinyint(4) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `post_type`, `banner_img`, `title`, `sub_title`, `description`, `posted_date`, `publish_date`, `event_date`, `attachment`, `is_new`, `tags`, `is_active`) VALUES
(1, 'i-am-boss-1', 2, 'assets/uploads/banner_image/0_69887800_1726144240-travel1.jpg', 'Ternate Island Travel Guide & Best Things To Do (Maluku)', 'my sub title', '<p style=\"margin-right: 0px; margin-bottom: 1rem; margin-left: 0px; padding: 0px; border: none; outline: none; position: relative; font-size: 16px; color: rgb(119, 119, 119); letter-spacing: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(49, 49, 49); font-family: Lato, sans-serif; font-size: 20px;\">Ternate is a small, cone-shaped volcanic island in the North Maluku province of Indonesia. It isn’t likely to ever become a big vacation spot for tourists, but it has some interesting sights and history.</span><br></p>', '2024-05-26 14:21:44', '2024-05-29', '2024-05-28', 'assets/uploads/attachments/0_35923400_1716734917-application-iit_bhilai.pdf', 1, 'ternate,island,travel,guide,best,things,to,do,maluku,my,sub,title', 1),
(2, 'my-title-4', 2, 'assets/uploads/banner_image/0_75418400_1726144298-travel2.jpg', 'How To Visit Ancient Corinth On A Day Trip From Athens', 'wwwwwwwwww', '<p class=\"mb-4\" style=\"color: rgb(128, 139, 141); font-family: Heebo, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p><p class=\"mb-4\" style=\"color: rgb(128, 139, 141); font-family: Heebo, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p><div class=\"row gy-2 gx-4 mb-4\" style=\"--bs-gutter-x: 1.5rem; --bs-gutter-y: .5rem; margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) / -2); margin-left: calc(var(--bs-gutter-x) / -2); color: rgb(128, 139, 141); font-family: Heebo, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><div class=\"col-sm-6\" style=\"width: 279px; padding-right: calc(var(--bs-gutter-x) / 2); padding-left: calc(var(--bs-gutter-x) / 2); margin-top: var(--bs-gutter-y);\"><p class=\"mb-0\"><span class=\"fa fa-arrow-right text-primary me-2\" style=\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; text-rendering: auto; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-weight: 900; color: rgb(134, 184, 23) !important;\"></span>First Class Flights</p></div><div class=\"col-sm-6\" style=\"width: 279px; padding-right: calc(var(--bs-gutter-x) / 2); padding-left: calc(var(--bs-gutter-x) / 2); margin-top: var(--bs-gutter-y);\"><p class=\"mb-0\"><span class=\"fa fa-arrow-right text-primary me-2\" style=\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; text-rendering: auto; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-weight: 900; color: rgb(134, 184, 23) !important;\"></span>Handpicked Hotels</p></div><div class=\"col-sm-6\" style=\"width: 279px; padding-right: calc(var(--bs-gutter-x) / 2); padding-left: calc(var(--bs-gutter-x) / 2); margin-top: var(--bs-gutter-y);\"><p class=\"mb-0\"><span class=\"fa fa-arrow-right text-primary me-2\" style=\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; text-rendering: auto; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-weight: 900; color: rgb(134, 184, 23) !important;\"></span>5 Star Accommodations</p></div><div class=\"col-sm-6\" style=\"width: 279px; padding-right: calc(var(--bs-gutter-x) / 2); padding-left: calc(var(--bs-gutter-x) / 2); margin-top: var(--bs-gutter-y);\"><p class=\"mb-0\"><span class=\"fa fa-arrow-right text-primary me-2\" style=\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; text-rendering: auto; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-weight: 900; color: rgb(134, 184, 23) !important;\"></span>Latest Model Vehicles</p></div><div class=\"col-sm-6\" style=\"width: 279px; padding-right: calc(var(--bs-gutter-x) / 2); padding-left: calc(var(--bs-gutter-x) / 2); margin-top: var(--bs-gutter-y);\"><p class=\"mb-0\"><span class=\"fa fa-arrow-right text-primary me-2\" style=\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; text-rendering: auto; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-weight: 900; color: rgb(134, 184, 23) !important;\"></span>150 Premium City Tours</p></div><div class=\"col-sm-6\" style=\"width: 279px; padding-right: calc(var(--bs-gutter-x) / 2); padding-left: calc(var(--bs-gutter-x) / 2); margin-top: var(--bs-gutter-y);\"><p class=\"mb-0\"><span class=\"fa fa-arrow-right text-primary me-2\" style=\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; text-rendering: auto; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-weight: 900; color: rgb(134, 184, 23) !important;\"></span>24/7 Service</p></div></div>', '2024-05-26 15:28:08', NULL, '2024-09-12', NULL, NULL, 'how,to,visit,ancient,corinth,on,a,day,trip,from,athens,wwwwwwwwww', 1),
(3, 'i-am-boss-3', 1, 'assets/uploads/banner_image/0_43397200_1726144327-travel3.jpg', 'How To Visit Khao Sok National Park In Thailand', 'asdsad', '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">One of the best places to see nature and animals in Thailand is at the Khao Sok National Park, which is not too far from Phuket and Krabi.</p><p data-slot-rendered-content=\"true\" style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">We spent 3 days at Khao Sok and had a blast. The turquoise lake is really nice, and it’s easy to see animals in the park. We even saw wild elephants!</p>', '2024-05-26 15:28:26', NULL, NULL, NULL, 1, 'how,to,visit,khao,sok,national,park,in,thailand,asdsad', 1),
(4, 'i-am-boss-4', 2, 'assets/uploads/banner_image/0_14098800_1726144412-travel4.jpg', 'How To Spend 1 Day In Yosemite National Park (Itinerary)', 'sadasdasd', '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">Yosemite was one of the first national parks established in the United States, and in my opinion it’s one of the most beautiful places in the world.</p><p data-slot-rendered-content=\"true\" style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">If you only have one day in Yosemite National Park, the best way to spend it is in the valley, where you can enjoy the spectacular waterfalls, viewpoints, and hikes. Most of these are located pretty close to each other.</p>', '2024-05-26 15:28:45', NULL, NULL, NULL, 1, 'how,to,spend,1,day,in,yosemite,national,park,itinerary,sadasdasd', 1),
(5, 'my-new-post-haha-5', 4, 'assets/uploads/banner_image/0_90526600_1726144463-travel5.jpg', 'How To Visit Ciletuh Geopark: Waterfall Valley In West Java', 'ni bataunga', '<h2 style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 26px; font-weight: var(--pchead-wei); font-family: var(--pchead-font); line-height: 1.3em; color: rgb(49, 49, 49); background-color: rgb(255, 255, 255);\"><span id=\"How_To_Get_To_Ciletuh_Geopark\" style=\"outline: 0px; margin: 0px; padding: 0px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; font-weight: 700;\">How To Get To Ciletuh Geopark</span></span></h2><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">The Ciletuh Geopark is located in the far southwest corner of West Java province.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">It’s not near any major cities, so you’ll have to do a bit of a road trip for this one. It’s a 2.5 hour drive from Sukabumi, 4 hours from Jakarta, or 6 hours from Bandung.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">We traveled here from Bandung, and then went to Jakarta afterwards. Either way, the roads are mostly in good condition all the way to the geopark.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">We hired a private driver from Bandung to take us to the geopark in his van, but you could also go just fine with a motorbike, and it would be cheaper.</p>', '2024-09-12 06:39:46', '2024-09-13', '2024-09-12', 'assets/uploads/attachments/0_97998900_1726123185-GBG5441621.pdf', 1, 'how,to,visit,ciletuh,geopark,waterfall,valley,in,west,java,ni,bataunga', 1),
(6, 'my-first-tour-of-digha-6', 2, 'assets/uploads/banner_image/0_01497400_1726144517-travel6.jpg', 'Fulidhoo Island Guide: Shark & Stingray Beach In Maldives', 'test', '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">Fulidhoo is a small, budget-friendly local island we visited recently in the Maldives, along with&nbsp;<a href=\"https://theworldtravelguy.com/dhigurah-island-maldives/\" style=\"outline: 0px; margin: 0px; padding: 0px; color: rgb(255, 138, 101); transition: color 0.3s; cursor: pointer;\">Dhigurah island</a>, which we loved for its beaches and sandbar.</p><p data-slot-rendered-content=\"true\" style=\"outline: 0px; margin-right: 0px; margin-bottom: 17px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.8; color: rgb(49, 49, 49); font-family: Lato, sans-serif; background-color: rgb(255, 255, 255);\">Aside from scuba diving, the prime attraction in Fulidhoo is the shark and stingray beach, where you can see nurse sharks, sea turtles, and stingrays in the shallow water and even get your picture taken with them.</p>', '2024-09-12 11:32:29', '2024-09-13', '2024-09-12', NULL, NULL, 'my,first,tour,of,digha,test,fulidhoo,island,guide,shark,stingray,beach,in,maldives', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `id` int(11) NOT NULL,
  `post_type_name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`id`, `post_type_name`, `slug`, `is_active`) VALUES
(1, 'Beaches', 'beaches', 1),
(2, 'Bucket List', 'bucket-list', 1),
(3, 'Hiking', 'hiking', 1),
(4, 'Itineraries', 'itineraries', 1),
(5, 'Monuments', 'monuments', 1),
(6, 'Geoparks', 'geoparks', 1),
(7, 'Volcanoes', 'volcanoes', 1),
(8, 'Waterfalls', 'waterfalls', 1),
(9, 'Wildlife', 'wildlife', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'application_name', 'Travel Site33', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(2, 'application_slogan', 'jio jee bhar ke12', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(3, 'application_logo', '0_52924200_1725097702-images.png', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(4, 'application_favicon', '0_58240800_1725097972-CA_LOGO.png', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(5, 'application_email', 'pankajpoddarjee@gmail.com', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(6, 'system_email', 'itsc.pankaj@gmail.com', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(7, 'address', 'Salt late sector-v ', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(8, 'country', 'India', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(9, 'state', 'West Bengal', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(10, 'city', 'Kolkata', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(11, 'zip', '700012', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(12, 'timezone', 'Asia/Kolkata', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(16, 'theme_color', '#568cae', '2024-09-11 07:48:23', '2024-09-11 11:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `is_active`) VALUES
(1, 'ankit', 'ankit@gmail.com', '12345678', '9999999999', 1),
(2, 'Hari', 'hari@gmail.com', 'india', '9999999999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'application_name', 'Travel Sit', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(2, 1, 'application_slogan', 'jio jee bhar ke12', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(3, 1, 'application_logo', '0_52924200_1725097702-images.png', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(4, 1, 'application_favicon', '0_58240800_1725097972-CA_LOGO.png', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(5, 1, 'application_email', 'pankajpoddarjee@gmail.com', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(6, 1, 'system_email', 'itsc.pankaj@gmail.com', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(7, 1, 'address', 'Salt late sector-v ', '2024-08-31 07:24:22', '2024-08-31 07:24:22'),
(8, 1, 'country', 'India', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(9, 1, 'state', 'West Bengal', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(10, 1, 'city', 'Kolkata', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(11, 1, 'zip', '700012', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(12, 1, 'timezone', 'Asia/Kolkata', '2024-08-31 07:24:27', '2024-08-31 07:24:27'),
(13, 1, 'theme_color', '#6f1f4a', '2024-09-11 08:05:33', '2024-09-11 11:35:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
