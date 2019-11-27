-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 07:27 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libroserviceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ls_categories`
--

CREATE TABLE `ls_categories` (
  `cid` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityId` bigint(20) UNSIGNED NOT NULL,
  `cat_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'category Image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_categories`
--

INSERT INTO `ls_categories` (`cid`, `cname`, `cityId`, `cat_description`, `cat_img`, `created_at`, `updated_at`) VALUES
(1, 'other', 1, 'You can change sides by logging into the Libreservice. Here\'s how. 1. Log in to the Libreservice. From the Libreservice drop-down menu, select Mobile Services. Scroll to the bottom of the page and select On. Select the type of phone you are using. Select the sides of your choice, then Confirm. Check the changes and select Submit. ', 'https://image.flaticon.com/icons/svg/2226/2226098.svg', NULL, NULL),
(2, 'Other@', 4, 'Koodo does not take privacy and personal information lightly. That\'s why it adheres to strict privacy and security policies to protect your information.', 'https://image.flaticon.com/icons/svg/2226/2226098.svg', '2019-11-17 16:33:04', '2019-11-17 16:33:04'),
(3, 'Toyota', 3, 'If you have activated your phone online, you have already registered for the Prepaid Libreservice. All you have to do is log in using the username and password you have chosen when you activate your phone. ', 'https://image.flaticon.com/icons/svg/2226/2226098.svg', '2019-11-17 18:59:49', '2019-11-17 18:59:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ls_categories`
--
ALTER TABLE `ls_categories`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `ls_categories_cityid_foreign` (`cityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ls_categories`
--
ALTER TABLE `ls_categories`
  MODIFY `cid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ls_categories`
--
ALTER TABLE `ls_categories`
  ADD CONSTRAINT `ls_categories_cityid_foreign` FOREIGN KEY (`cityId`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
