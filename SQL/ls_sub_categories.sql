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
-- Table structure for table `ls_sub_categories`
--

CREATE TABLE `ls_sub_categories` (
  `scid` bigint(20) UNSIGNED NOT NULL,
  `scname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` bigint(20) UNSIGNED NOT NULL,
  `sucat_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'subCategory Image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_sub_categories`
--

INSERT INTO `ls_sub_categories` (`scid`, `scname`, `cid`, `sucat_description`, `sub_img`, `created_at`, `updated_at`) VALUES
(1, 'SubCatogry !', 1, 'This is the nice sub category', 'https://image.flaticon.com/icons/svg/148/148715.svg', '2019-11-22 08:00:00', NULL),
(2, 'SubCategory 2', 1, 'This is also nice', 'https://image.flaticon.com/icons/svg/148/148715.svg', NULL, NULL),
(3, 'SubCategory 3', 1, 'This is also nice 1', 'https://image.flaticon.com/icons/svg/148/148715.svg', NULL, NULL),
(4, 'Subcategory 11', 3, 'this is the toyota', 'https://image.flaticon.com/icons/svg/148/148715.svg', '2019-11-22 08:00:00', NULL),
(5, 'Subcategory 22', 3, 'this is the toyota', 'https://image.flaticon.com/icons/svg/148/148715.svg', NULL, NULL),
(6, 'subcategory 33', 3, 'this is the toyota', 'https://image.flaticon.com/icons/svg/148/148715.svg', '2019-11-22 08:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ls_sub_categories`
--
ALTER TABLE `ls_sub_categories`
  ADD PRIMARY KEY (`scid`),
  ADD KEY `ls_sub_categories_cid_foreign` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ls_sub_categories`
--
ALTER TABLE `ls_sub_categories`
  MODIFY `scid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ls_sub_categories`
--
ALTER TABLE `ls_sub_categories`
  ADD CONSTRAINT `ls_sub_categories_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `ls_categories` (`cid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
