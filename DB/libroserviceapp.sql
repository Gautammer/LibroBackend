-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 10:39 AM
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
-- Table structure for table `ls_adharcards`
--

CREATE TABLE `ls_adharcards` (
  `aacid` bigint(20) UNSIGNED NOT NULL,
  `aaimage_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aaimage_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_advertises`
--

CREATE TABLE `ls_advertises` (
  `adv_id` bigint(20) UNSIGNED NOT NULL,
  `adv_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_bank_details`
--

CREATE TABLE `ls_bank_details` (
  `bdid` bigint(20) UNSIGNED NOT NULL,
  `bd_bankname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bd_accountno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bd_ifscCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bd_uid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'here uid is primary id of user,partner or SalesExecutive ids',
  `bd_userstatus` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-User,1-Partner,2-SalesExecutive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_categories`
--

CREATE TABLE `ls_categories` (
  `cid` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_cities`
--

CREATE TABLE `ls_cities` (
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `cityname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_cities`
--

INSERT INTO `ls_cities` (`cityid`, `cityname`, `stateid`, `created_at`, `updated_at`) VALUES
(1, 'Surat', 1, NULL, NULL),
(2, 'Ahmedabad', 1, NULL, NULL),
(3, 'Baroda', 1, NULL, NULL),
(4, 'Mumbai', 2, NULL, NULL),
(5, 'Puna', 2, NULL, NULL),
(6, 'Lundhiyana', 3, NULL, NULL),
(7, 'Chittorgadh', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ls_hardware`
--

CREATE TABLE `ls_hardware` (
  `hid` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `hname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hprice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `himg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_localities`
--

CREATE TABLE `ls_localities` (
  `localitie_id` bigint(20) UNSIGNED NOT NULL,
  `localitie_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_offers`
--

CREATE TABLE `ls_offers` (
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - City, 1 - Festival, 2 - Cities',
  `offer_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 - Deactive,1 - Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_offer_services`
--

CREATE TABLE `ls_offer_services` (
  `osid` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_offers table offer_id',
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_orders`
--

CREATE TABLE `ls_orders` (
  `oid` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `orderDescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oPaymentMode` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-COD,1-Online',
  `oTransectionKey` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'if paymentMode Online then TransectionKey Genrate',
  `oPromocode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oPromocodeId` int(11) DEFAULT NULL COMMENT 'promoid of ls_promo_codes',
  `oTotalAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oSubTotalAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oDiscountAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oPincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uaid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user_address',
  `oUniqueId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderSpecialIns` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Order Special Instructions',
  `isOrderEdited` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes',
  `ostatus` enum('0','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-Pending,1-Accept,2-Descline,3-Process,4-Assign,5-Complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_order_hardware`
--

CREATE TABLE `ls_order_hardware` (
  `ohid` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `hardware_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_order_images`
--

CREATE TABLE `ls_order_images` (
  `oiid` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 - Active,0 - Descline',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_order_ratings`
--

CREATE TABLE `ls_order_ratings` (
  `orderratingid` bigint(20) UNSIGNED NOT NULL,
  `oid` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_order_services`
--

CREATE TABLE `ls_order_services` (
  `osid` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_partners`
--

CREATE TABLE `ls_partners` (
  `pid` bigint(20) UNSIGNED NOT NULL,
  `pname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmobileno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno_verified_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '6-Digit Number',
  `pgender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `pemail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `usertype` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0-MasterAdmin,1-User,2-SubAdmin',
  `pAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pPincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uprofilepic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pExperiance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pExpartise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-Not Active User,1-Active User (Mobile Number is Verified)',
  `forget_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_partner_adharcards`
--

CREATE TABLE `ls_partner_adharcards` (
  `paid` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_partners table pid',
  `aacid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_partner_category_and_prices`
--

CREATE TABLE `ls_partner_category_and_prices` (
  `partner_cat_nd_price_id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_partners table pid',
  `cid` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_partner_earnings`
--

CREATE TABLE `ls_partner_earnings` (
  `earningid` bigint(20) UNSIGNED NOT NULL,
  `oid` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `earning_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_partner_ratings`
--

CREATE TABLE `ls_partner_ratings` (
  `ratingid` bigint(20) UNSIGNED NOT NULL,
  `oid` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_permissions`
--

CREATE TABLE `ls_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_product_categories`
--

CREATE TABLE `ls_product_categories` (
  `pcid` bigint(20) UNSIGNED NOT NULL,
  `pcname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_promo_codes`
--

CREATE TABLE `ls_promo_codes` (
  `promoid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 - Deactive,1 - Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_promo_code_cities`
--

CREATE TABLE `ls_promo_code_cities` (
  `promo_cities_id` bigint(20) UNSIGNED NOT NULL,
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `promoid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_roles`
--

CREATE TABLE `ls_roles` (
  `roleid` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_sales_executives`
--

CREATE TABLE `ls_sales_executives` (
  `seid` bigint(20) UNSIGNED NOT NULL,
  `seName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seMobileno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `sePassword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seProfilePic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_services`
--

CREATE TABLE `ls_services` (
  `sid` bigint(20) UNSIGNED NOT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_categories table cid',
  `scid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'subCategory_id',
  `pcid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'productCategory_id',
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `sdetails` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Special Price does not exist in table LS_SpecialPrice,1 - Exists',
  `uid` bigint(20) UNSIGNED NOT NULL COMMENT 'uid means userid of subadmins',
  `updateuid` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'updateuid means userid of subadmins',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 - Deactive,1 - Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_service_cities`
--

CREATE TABLE `ls_service_cities` (
  `scityid` bigint(20) UNSIGNED NOT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `cityname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_service_images`
--

CREATE TABLE `ls_service_images` (
  `siid` bigint(20) UNSIGNED NOT NULL,
  `siImage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_service_localities`
--

CREATE TABLE `ls_service_localities` (
  `slocalitie_id` bigint(20) UNSIGNED NOT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `localitieid` bigint(20) UNSIGNED NOT NULL,
  `localitie_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_service_prices`
--

CREATE TABLE `ls_service_prices` (
  `spid` bigint(20) UNSIGNED NOT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `sprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updateuid` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'updateuid means userid of subadmins',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_service_specialprices`
--

CREATE TABLE `ls_service_specialprices` (
  `sp_priceid` bigint(20) UNSIGNED NOT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL COMMENT 'ls_services table sid',
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `sp_specialprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updateuid` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'updateuid means userid of subadmins',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_states`
--

CREATE TABLE `ls_states` (
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `statename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_states`
--

INSERT INTO `ls_states` (`stateid`, `statename`, `created_at`, `updated_at`) VALUES
(1, 'Gujrat', NULL, NULL),
(2, 'Maharastra', NULL, NULL),
(3, 'Punjab', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ls_subadmin_permissions`
--

CREATE TABLE `ls_subadmin_permissions` (
  `subadmin_pid` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL COMMENT 'here uid is subadmin_id of ls_user_registrations',
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_sub_categories`
--

CREATE TABLE `ls_sub_categories` (
  `scid` bigint(20) UNSIGNED NOT NULL,
  `scname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_user_addresses`
--

CREATE TABLE `ls_user_addresses` (
  `uaid` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `uaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uatype` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-Home,1-Work,2-Other',
  `ustateid` bigint(20) UNSIGNED NOT NULL,
  `ucityid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_user_registrations`
--

CREATE TABLE `ls_user_registrations` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umobileno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno_verified_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '6-Digit Number',
  `ugender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `uemail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uprofilepic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urefferalCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `cityid` bigint(20) UNSIGNED NOT NULL,
  `usertype` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0-MasterAdmin,1-User,2-SubAdmin',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-Not Active User,1-Active User (Mobile Number is Verified)',
  `forget_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_user_registrations`
--

INSERT INTO `ls_user_registrations` (`uid`, `uname`, `umobileno`, `mobileno_verified_at`, `otp`, `ugender`, `uemail`, `email_verified_at`, `password`, `uprofilepic`, `urefferalCode`, `stateid`, `cityid`, `usertype`, `is_active`, `forget_password_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'keyur d vamja', '9512247271', NULL, '715422', 'Male', 'keyur@yopmail.com', NULL, '$2y$10$O5dD9ASQvT9VFrqq/YrDROT0o.2ZSp.zOGygW7WAuwqn/3fEDPiee', NULL, NULL, 1, 1, '1', '1', NULL, NULL, '2019-11-11 16:43:24', '2019-11-11 17:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `ls_videos`
--

CREATE TABLE `ls_videos` (
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isServiceVideo` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0- Home Screen Advertise,1-Service Video',
  `sid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(48, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(49, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(50, '2016_06_01_000004_create_oauth_clients_table', 1),
(51, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(52, '2019_10_31_114438_create_ls_states_table', 1),
(53, '2019_10_31_114935_create_ls_cities_table', 1),
(54, '2019_10_31_115456_create_ls_roles_table', 1),
(55, '2019_10_31_115757_create_ls_user_registrations_table', 1),
(56, '2019_11_01_090210_create_ls_user_addresses_table', 1),
(57, '2019_11_01_091844_create_ls_bank_details_table', 1),
(58, '2019_11_01_093032_create_ls_categories_table', 1),
(59, '2019_11_01_093249_create_ls_sub_categories_table', 1),
(60, '2019_11_01_093527_create_ls_product_categories_table', 1),
(61, '2019_11_01_094021_create_ls_sales_executives_table', 1),
(62, '2019_11_01_101608_create_ls_localities_table', 1),
(63, '2019_11_01_102046_create_ls_services_table', 1),
(64, '2019_11_01_103317_create_ls_service_images_table', 1),
(65, '2019_11_01_103633_create_ls_service_cities_table', 1),
(66, '2019_11_01_104231_create_ls_service_localities_table', 1),
(67, '2019_11_01_104539_create_ls_service_prices_table', 1),
(68, '2019_11_01_105026_create_ls_service_specialprices_table', 1),
(69, '2019_11_01_110733_create_ls_offers_table', 1),
(70, '2019_11_01_111309_create_ls_offer_services_table', 1),
(71, '2019_11_01_112032_create_ls_promo_codes_table', 1),
(72, '2019_11_01_112357_create_ls_promo_code_cities_table', 1),
(73, '2019_11_01_113203_create_ls_videos_table', 1),
(74, '2019_11_01_114051_create_ls_partners_table', 1),
(75, '2019_11_01_115318_create_ls_adharcards_table', 1),
(76, '2019_11_01_115637_create_ls_partner_adharcards_table', 1),
(77, '2019_11_01_120055_create_ls_partner_category_and_prices_table', 1),
(78, '2019_11_01_120608_create_ls_orders_table', 1),
(79, '2019_11_01_122227_create_ls_order_images_table', 1),
(80, '2019_11_01_122909_create_ls_order_services_table', 1),
(81, '2019_11_01_123744_create_ls_hardware_table', 1),
(82, '2019_11_01_123800_create_ls_order_hardware_table', 1),
(83, '2019_11_01_124407_create_ls_order_ratings_table', 1),
(84, '2019_11_01_124832_create_ls_partner_ratings_table', 1),
(85, '2019_11_01_125104_create_ls_partner_earnings_table', 1),
(86, '2019_11_01_125514_create_ls_permissions_table', 1),
(87, '2019_11_01_130513_create_ls_subadmin_permissions_table', 1),
(88, '2019_11_01_130839_create_ls_advertises_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0c366e2a762f2080b11fac25ca38bf3c29ba04aea5099a34a6f6c211ee4cf26367992a0004ef52b4', 20, 2, NULL, '[]', 0, '2019-11-11 15:30:08', '2019-11-11 15:30:08', '2019-11-26 07:30:07'),
('0dae4d5561b958d1d792d8d9f5f0a5895c5f379ea00ac5bf187edeab1ff918ab8071f0d9681c9ff6', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:26:34', '2019-11-11 15:26:34', '2019-11-26 07:26:34'),
('0f920061ee155e7e61497b719e309854f6d2e69226a394d6a3dd809f72bcaa5200bc2d245718ed6e', 1, 2, NULL, '[]', 1, '2019-11-11 17:11:01', '2019-11-11 17:11:01', '2019-11-26 09:11:01'),
('1d4e280e06e27fa3a4ed01717f2017cd0eef56b149f85d35ea0884238e8f9df99eeff63d555a2429', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:09:54', '2019-11-11 15:09:54', '2019-11-26 07:09:53'),
('2c766ab0a608b1d50f1e72229334c14db90bfed206d0d874ef5f57f3aee38ada575fae0747ad1194', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:21:50', '2019-11-11 15:21:50', '2019-11-26 07:21:49'),
('3837214bfb0b1216a6dc9fc34f2d206da7395f0c633d0a5e628eb2f46c9f20172034a8b22a879e91', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:10:40', '2019-11-11 15:10:40', '2019-11-26 07:10:40'),
('3cf551dd1cddb3398bd57d6e5cf0e0018efc9eaca937844e68c60b58db409bd94bd7d54c686afdc1', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:48:58', '2019-11-11 14:48:58', '2019-11-26 06:48:58'),
('453fa550268713c45e0367b62847892f3906dde514fec1fac4c47339b914f97c26abbd5b930ff84c', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:51:25', '2019-11-11 14:51:25', '2019-11-26 06:51:25'),
('45e65d4ea8e6f87ac4aef87507f9037349a90b4bbd809886f8366b890c51256c49009366a9d16462', 20, 2, NULL, '[]', 0, '2019-11-11 14:49:58', '2019-11-11 14:49:58', '2019-11-26 06:49:57'),
('47eeaf8b911a7d52b94b62d5ab235f8c2e4a8fee5da9fcd6845638b46c5b998b7510d2cf2c0512d7', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:07:34', '2019-11-11 14:07:34', '2020-11-11 06:07:34'),
('4cb6db5f9012e86300f32a37992515b3d48539470099406d550271970a97c9bcd0fc4a0a6940a202', 20, 2, NULL, '[]', 0, '2019-11-11 14:51:04', '2019-11-11 14:51:04', '2019-11-26 06:51:04'),
('4f7885c209af62118c8b18be0871feac830afc0c3dac11ba4b509c259a59bcd90a6657856aae9e02', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:24:43', '2019-11-11 15:24:43', '2019-11-26 07:24:43'),
('51562e718d3503b1c35bf73f779ec99795e6bb3bac009e431fc0d9787894d7f85f1e6c516a7d588c', 20, 2, NULL, '[]', 0, '2019-11-11 16:07:18', '2019-11-11 16:07:18', '2019-11-26 08:07:18'),
('5a4d41e54d70a142ad5c5aa57d8d8ff5dc2e2f99106ed6806e96efacd96e0d493a05c64e49d2753a', 20, 2, NULL, '[]', 0, '2019-11-11 16:27:43', '2019-11-11 16:27:43', '2019-11-26 08:27:43'),
('5b95b0713d3e4b8f03747ab3aeeeaaa87ac63b125035591dbaec7921ff7af386938a96a267ed3357', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:34:12', '2019-11-11 14:34:12', '2019-11-26 06:34:12'),
('72fb06fcb6fb7245a76d3d0e2f4c5ea83fa8b7bb90d6943c526e04517a3756537c0fb21739477088', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:29:25', '2019-11-11 15:29:25', '2019-11-26 07:29:24'),
('777cc6104c754e07e3101ad53ebb9f4dee64d180f7d1177ca5a737d314bb7f54385cd12df0a463c5', 20, 2, NULL, '[]', 0, '2019-11-11 16:19:17', '2019-11-11 16:19:17', '2019-11-26 08:19:03'),
('7fb35e7c67f0f7bf1f7c0857dba3932b88de542726492ab6a8ff322167002f2e7c001a7f5d1bc66c', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:23:21', '2019-11-11 15:23:21', '2019-11-26 07:23:21'),
('83beb35bb1764961e88f0a6a337eb04207c6e9967993572d5ccf5545a5d30b4620b52b5fc236559e', 20, 2, NULL, '[]', 0, '2019-11-11 16:07:33', '2019-11-11 16:07:33', '2019-11-26 08:07:33'),
('882c1727f5294c1f44c6d77d6d9dbb23ab1e761874e97f782cccdae669607970b86173f09b3b5e3b', 20, 2, NULL, '[]', 0, '2019-11-11 16:07:03', '2019-11-11 16:07:03', '2019-11-26 08:07:03'),
('88ea3c896e9e22ebd227a95fc8e1fa1b07a2bb0c27d903895acbf3932327bbb6843f955ca763d436', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:22:59', '2019-11-11 15:22:59', '2019-11-26 07:22:59'),
('898a8ce1a778b31070e6fc53a1670932ac57a30262c39e2f752a40f08a38048a466ff949302e79e7', 1, 2, NULL, '[]', 1, '2019-11-11 17:01:14', '2019-11-11 17:01:14', '2019-11-26 09:01:13'),
('8c14d6d8599d2b11245c76031f71a26818e84c03e074e5b22e7c5272cfb48cafaf5601c391ffe758', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:26:27', '2019-11-11 14:26:27', '2020-11-11 06:26:27'),
('8cbd388278fdd35d26e81f7a13bc5b58d8f4296fa0a47e7693865e27726fd2fa0a8ae30f99c95d6a', 20, 2, NULL, '[]', 0, '2019-11-11 14:36:19', '2019-11-11 14:36:19', '2019-11-26 06:36:19'),
('909ff981893baa3ae8821da50ded3a7a5e18e1aac96c612d9e6d0f0f2515cc64007e42ea1ba95b21', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:25:47', '2019-11-11 14:25:47', '2020-11-11 06:25:47'),
('91fe11b1634052a44f500e290df8cf5a1a6b84e6413bfb853b06873555de038dd9bdb55f59452f1c', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:10:24', '2019-11-11 15:10:24', '2019-11-26 07:10:24'),
('956ca1f6452d7bfdeafe646c407c65437d733390d73e4d992eef900879ca867eff4fd1c569925758', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:10:48', '2019-11-11 15:10:48', '2019-11-26 07:10:48'),
('9a6677ddfbb0e1e7563c4da0261a184f86eb9db4849825a81954a092607afb222b4f6907d8a55194', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:25:40', '2019-11-11 15:25:40', '2019-11-26 07:25:40'),
('9fa999e5851e0405009bb7227a7f83d3d42460a439bf270b67bf405a0d036536e1e30257e3b5ea15', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:24:59', '2019-11-11 15:24:59', '2019-11-26 07:24:59'),
('a1dd0f2bec091217f30523b329abbbfed0223f0c46a1bb88b56fd512191ea7b67994fa859be3eb90', 1, 2, NULL, '[]', 0, '2019-11-11 17:06:35', '2019-11-11 17:06:35', '2019-11-26 09:06:35'),
('a4863a1f4bf9bf66be54ac9fabad663dfe0401f0862f1d5b2cf2cceb03aaefd7099f5e3d40b9fd34', 20, 1, 'AppName', '[]', 0, '2019-11-11 14:00:33', '2019-11-11 14:00:33', '2020-11-11 06:00:33'),
('b154b7681bf0c5330670236acc662328fdcb090102d62efadb680cf61d0fd7b27e0b3804fea9ea07', 20, 2, NULL, '[]', 1, '2019-11-11 16:27:19', '2019-11-11 16:27:19', '2019-11-26 08:27:14'),
('b285618a08abeb9ee54fcf32faaff23026fe6f4a9b85568681ebe6bc0e360b43b6a7b6cd5cbd7638', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:24:22', '2019-11-11 15:24:22', '2019-11-26 07:24:22'),
('b4086bde6e808656bd0c26a8ddbeed8328a4b113879c04c1c1010048b4fda1483d8bf86d49d70b9e', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:25:06', '2019-11-11 14:25:06', '2020-11-11 06:25:06'),
('b6a988a1ec3dc32420f3400ec524c969a7dc2da8a39161847a50936f2ddf60d15d12160b965dfb05', 20, 2, NULL, '[]', 1, '2019-11-11 16:08:11', '2019-11-11 16:08:11', '2019-11-26 08:08:11'),
('b927c52aba2868f26300b7344a518125eea04e3dea6783e71ea410ae355f0c06bd9c6bbf796ba066', 20, 2, NULL, '[]', 0, '2019-11-11 16:06:31', '2019-11-11 16:06:31', '2019-11-26 08:06:31'),
('c7a805cded425ebefc668bfeeffeac4ef63f09db67f4db0694210611a90b0fd120ab5b8dc474ba2f', 20, 2, NULL, '[]', 0, '2019-11-11 16:07:45', '2019-11-11 16:07:45', '2019-11-26 08:07:45'),
('c8c562924cdb688a40e3311ee20910eaa2cfd69cd8ab2597a41af6e3d6bc97a7ffd90223254964c3', 20, 2, NULL, '[]', 0, '2019-11-11 16:06:08', '2019-11-11 16:06:08', '2019-11-26 08:06:08'),
('d284796d2a664c25965ae8614745f5b3c39d6714723e0786ed2972ecb0399fccde7e07936097faef', 20, 2, NULL, '[]', 0, '2019-11-11 14:50:23', '2019-11-11 14:50:23', '2019-11-26 06:50:22'),
('e1d86b8a932d4af5d1d35318db7c8a123eb8201f455d45ff5ffd0f9246a406cd31d8eb5a95346542', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:09:02', '2019-11-11 15:09:02', '2019-11-26 07:09:01'),
('f2e31b12dc33ca4b719d0e226ab7692f2eef3576d079a10bdbecaba9f709148a6bdb21fb66904f85', 20, 2, NULL, '[]', 1, '2019-11-11 16:31:34', '2019-11-11 16:31:34', '2019-11-26 08:31:33'),
('f995df46578c50968b44f03284bc1f26616f5dea7d9a655acaf72cf9e73df6aa5b5a75c6c4f5ed83', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 15:28:48', '2019-11-11 15:28:48', '2019-11-26 07:28:48'),
('f99e168896b7c378a13f04a972bfb99d4f561a4d27f031c78adc47396ebae7ba5b30264366c465a0', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:27:16', '2019-11-11 14:27:16', '2020-11-11 06:27:16'),
('fb8348713cf415ea00c6ae5a8173fac10f8cff9c2b5cee17034a4a28e7884481e40e1ac9b91d58ba', 20, 2, NULL, '[\"*\"]', 0, '2019-11-11 14:48:42', '2019-11-11 14:48:42', '2019-11-26 06:48:40'),
('fc1d9d2790f329059fb001e7e75faf7802809b5665f227fce27a7fce4a6a530498685945c2f4e5ff', 1, 2, NULL, '[]', 0, '2019-11-11 17:11:10', '2019-11-11 17:11:10', '2019-11-26 09:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'V9ylEjymrI781W0tZJgT08RWb7MYweNlBJjp2nFq', 'http://localhost', 1, 0, 0, '2019-11-09 16:10:39', '2019-11-09 16:10:39'),
(2, NULL, 'Laravel Password Grant Client', 'VuzXKaVgD7aU5kmu9kkmQB4gTNToQ7Gut36yk4iB', 'http://localhost', 0, 1, 0, '2019-11-09 16:10:40', '2019-11-09 16:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-11-09 16:10:40', '2019-11-09 16:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('06b981ea1088c76c1afa9edce281d9f612606739d31743857d23ef5f86f574e044cc6f6ef933a45e', '5b95b0713d3e4b8f03747ab3aeeeaaa87ac63b125035591dbaec7921ff7af386938a96a267ed3357', 0, '2019-12-11 06:34:12'),
('1108b19199d2565bf645a6e5a7a921b741f8dfdf635eee6f4727b64b6a5a628eddcf96da04c0e188', '882c1727f5294c1f44c6d77d6d9dbb23ab1e761874e97f782cccdae669607970b86173f09b3b5e3b', 0, '2019-12-11 08:07:03'),
('1d8c32eab8f754836b62cc039083628476c6bc9ef811f55fa3b1549c4ab1824b6b862ccf49378045', '4f7885c209af62118c8b18be0871feac830afc0c3dac11ba4b509c259a59bcd90a6657856aae9e02', 0, '2019-12-11 07:24:43'),
('29123e47a7fce693271fee6dd5f8ed1e26ca178e657ce6bfc20f714b5298cdb9c913311d1cf35754', '0c366e2a762f2080b11fac25ca38bf3c29ba04aea5099a34a6f6c211ee4cf26367992a0004ef52b4', 0, '2019-12-11 07:30:08'),
('2cbbfb3bee333d11d9c1226723eab8772dceeceea95ac47b5c486d1e8371eb365247c0551565d3b9', 'c8c562924cdb688a40e3311ee20910eaa2cfd69cd8ab2597a41af6e3d6bc97a7ffd90223254964c3', 0, '2019-12-11 08:06:08'),
('2ddd1b0721ff48f897d0572a201b98fd5ae8e14fef19d2b991eec723e21220a7d072228ea3528d2e', '47eeaf8b911a7d52b94b62d5ab235f8c2e4a8fee5da9fcd6845638b46c5b998b7510d2cf2c0512d7', 0, '2020-11-11 06:07:34'),
('2e3c3cbab875343ef8fcb417bb935d27cae1c59080c72f2cec3b9e5e392286df4cd558bc4b21f85d', '0dae4d5561b958d1d792d8d9f5f0a5895c5f379ea00ac5bf187edeab1ff918ab8071f0d9681c9ff6', 0, '2019-12-11 07:26:34'),
('34404de150f8f84651ffbad2bf4ab1b84e2488d7c06f84a0793134672ede25dbc6b965c9c0c00a64', '777cc6104c754e07e3101ad53ebb9f4dee64d180f7d1177ca5a737d314bb7f54385cd12df0a463c5', 0, '2019-12-11 08:19:05'),
('35c3bb293c9f709ee21d07879a26a0cc02139cce97a6aee1c861c6dcabd692c8d8381d6f06c3390a', '88ea3c896e9e22ebd227a95fc8e1fa1b07a2bb0c27d903895acbf3932327bbb6843f955ca763d436', 0, '2019-12-11 07:22:59'),
('36259eec8bb7304ef57ed9e2ac9d46667f619286c9f46c05d66974732f869816bc48d927b813535c', '83beb35bb1764961e88f0a6a337eb04207c6e9967993572d5ccf5545a5d30b4620b52b5fc236559e', 0, '2019-12-11 08:07:33'),
('36ea372dd45dbd5e3f596632d9d7eb64617c8ca3792498eb69761f6bac83a67363483225f12dc1c7', '3cf551dd1cddb3398bd57d6e5cf0e0018efc9eaca937844e68c60b58db409bd94bd7d54c686afdc1', 0, '2019-12-11 06:48:58'),
('377b9e0a8ce0d83b745b68fd896e021d0bfd0a5f46576552f20022fe3345db3c481cc51ca4e87e11', '2c766ab0a608b1d50f1e72229334c14db90bfed206d0d874ef5f57f3aee38ada575fae0747ad1194', 0, '2019-12-11 07:21:49'),
('38126a758e1b2f60175f735ea7854c5e95365a5c7f88b496c564d69efaf52fe8dbcc5a944c8000f0', 'fb8348713cf415ea00c6ae5a8173fac10f8cff9c2b5cee17034a4a28e7884481e40e1ac9b91d58ba', 0, '2019-12-11 06:48:40'),
('3a24ee85fad007a6f3d11c7c34735890285cb1cda9fd729617e43696db60a2ac0301efde3f797a10', '72fb06fcb6fb7245a76d3d0e2f4c5ea83fa8b7bb90d6943c526e04517a3756537c0fb21739477088', 0, '2019-12-11 07:29:25'),
('42bd4acc598b2e4a9da49775ee449161f36db2a61ad7f6249f9f245975121355815c335f8b0e4b4d', '91fe11b1634052a44f500e290df8cf5a1a6b84e6413bfb853b06873555de038dd9bdb55f59452f1c', 0, '2019-12-11 07:10:24'),
('4472b2407af4c2753dc56b673eb47fae1153a98f2704e847f206784c1997bba6741879514b8802fc', '45e65d4ea8e6f87ac4aef87507f9037349a90b4bbd809886f8366b890c51256c49009366a9d16462', 0, '2019-12-11 06:49:57'),
('47377acf8be7bb6fc0b6ba2483e55f0bdedc6c31238b8c60eb8b8619b90f314162a9a84384791381', '3837214bfb0b1216a6dc9fc34f2d206da7395f0c633d0a5e628eb2f46c9f20172034a8b22a879e91', 0, '2019-12-11 07:10:40'),
('49751f656b942e0147eb14a2fee910057c178f3be1f26288b504327aec21af73b095bd997216b5c6', '7fb35e7c67f0f7bf1f7c0857dba3932b88de542726492ab6a8ff322167002f2e7c001a7f5d1bc66c', 0, '2019-12-11 07:23:21'),
('4ad405ac5292fa465877d43102eb1c233aa61eb44e8e16a21042ef8f9f5214f84e2a7caeca9f8ddd', '9fa999e5851e0405009bb7227a7f83d3d42460a439bf270b67bf405a0d036536e1e30257e3b5ea15', 0, '2019-12-11 07:24:59'),
('4b2f8b25aab853c7167970b414262dac64170af4726b413754fcceff70e7ca28a58fb0bc23084531', 'b927c52aba2868f26300b7344a518125eea04e3dea6783e71ea410ae355f0c06bd9c6bbf796ba066', 0, '2019-12-11 08:06:31'),
('50f23e98b561c28371af2bbc8af72bd93e42cf29fb24f455082fe090ec07f3c911a039166f13edee', '9a6677ddfbb0e1e7563c4da0261a184f86eb9db4849825a81954a092607afb222b4f6907d8a55194', 0, '2019-12-11 07:25:40'),
('54f01335c368f554b2df85764e56c6947adb31a7131f403dee85be135cec3dc0f60bc023dbbf1fa9', '51562e718d3503b1c35bf73f779ec99795e6bb3bac009e431fc0d9787894d7f85f1e6c516a7d588c', 0, '2019-12-11 08:07:18'),
('71bb6a8b1a14cb9557427d7a7b8789eed00a9b2a77a7a3555f22139ecfd5ebf9d4ad6406cc9d3a26', 'f99e168896b7c378a13f04a972bfb99d4f561a4d27f031c78adc47396ebae7ba5b30264366c465a0', 0, '2020-11-11 06:27:17'),
('78f4f023d4ffa062b05bc2fd03efe98ff4242536192d8eb92cb75d13195f9a6704fe695f244a9fe4', '8cbd388278fdd35d26e81f7a13bc5b58d8f4296fa0a47e7693865e27726fd2fa0a8ae30f99c95d6a', 0, '2019-12-11 06:36:19'),
('7a10abb04b015615a45775bf07102344c37a02b1beac8a84e8c30d4f48327aa784073c83b3398bef', '956ca1f6452d7bfdeafe646c407c65437d733390d73e4d992eef900879ca867eff4fd1c569925758', 0, '2019-12-11 07:10:48'),
('815abd268a6580487933c75e50cb4313b13b978abfb73bfc4706edb4ac6829832d4a3993cfca175a', 'a1dd0f2bec091217f30523b329abbbfed0223f0c46a1bb88b56fd512191ea7b67994fa859be3eb90', 0, '2019-12-11 09:06:35'),
('823b0f0d59daeb7fcb249608801ec896cf6dfa642b0040de93a497f881958e408ec5cfa8cdb09dfc', 'b285618a08abeb9ee54fcf32faaff23026fe6f4a9b85568681ebe6bc0e360b43b6a7b6cd5cbd7638', 0, '2019-12-11 07:24:22'),
('85eef14e839e88307ad74eab821127a5d7c3b3bc7a2af8ef1b180ee974b9cbd2b38eab4262db1111', 'b4086bde6e808656bd0c26a8ddbeed8328a4b113879c04c1c1010048b4fda1483d8bf86d49d70b9e', 0, '2020-11-11 06:25:06'),
('8a3f5c1b9a59cdb4b11da90d7b3663cbbfb233988b2c09b291b12ce3101f8be667d55f56553fdbf9', 'c7a805cded425ebefc668bfeeffeac4ef63f09db67f4db0694210611a90b0fd120ab5b8dc474ba2f', 0, '2019-12-11 08:07:45'),
('8b08ccc53ba30319fa4163eeb550e908808ffa0bc65036539901c8e69bc5ea68f0b27ac2a352bf29', 'e1d86b8a932d4af5d1d35318db7c8a123eb8201f455d45ff5ffd0f9246a406cd31d8eb5a95346542', 0, '2019-12-11 07:09:01'),
('8b331715368b2cf9c70bc4be8f6e8dcf4342d8c60d7322939446f112c099f3c73ed024d8d725857e', 'f995df46578c50968b44f03284bc1f26616f5dea7d9a655acaf72cf9e73df6aa5b5a75c6c4f5ed83', 0, '2019-12-11 07:28:48'),
('929b2062d615ac98a5a1eeb55c42a1ee2718a07c95c66752f243df6af7998730b30240e4d47b0f45', '5a4d41e54d70a142ad5c5aa57d8d8ff5dc2e2f99106ed6806e96efacd96e0d493a05c64e49d2753a', 0, '2019-12-11 08:27:43'),
('9c27f0c07a506fe29d1304f9e777688846528ea3a2dddaa88df94110148b6c09295bf983b1a92f3d', 'f2e31b12dc33ca4b719d0e226ab7692f2eef3576d079a10bdbecaba9f709148a6bdb21fb66904f85', 1, '2019-12-11 08:31:33'),
('a6b661436ae3644dce457ce9af8f57a6902d28e6d1dc8d6088e93f81c71a22044e2b8b771ca4cba4', 'b154b7681bf0c5330670236acc662328fdcb090102d62efadb680cf61d0fd7b27e0b3804fea9ea07', 1, '2019-12-11 08:27:15'),
('afa780b3b8de864280bcaaf8617234db11d0edf2797a57df36bdb865375f741a63fe9fac55c2437c', 'd284796d2a664c25965ae8614745f5b3c39d6714723e0786ed2972ecb0399fccde7e07936097faef', 0, '2019-12-11 06:50:22'),
('bed49bde38a6d8ac765b370c7338ec7c7b0c6ba803c2fac48cb1d39e98f1739ae57aaf99d77a7034', 'b6a988a1ec3dc32420f3400ec524c969a7dc2da8a39161847a50936f2ddf60d15d12160b965dfb05', 1, '2019-12-11 08:08:11'),
('bfb07ad27fccb8b4e6c0136e9bd6e6edf5393f0df80b1d93979e1c047f8a2eab98e97dc807d1e609', '0f920061ee155e7e61497b719e309854f6d2e69226a394d6a3dd809f72bcaa5200bc2d245718ed6e', 1, '2019-12-11 09:11:01'),
('c83dd5790fcbf644c73aa719ab1511995dd2c54d6fb9fb1762dea5ea3599b4898e72fc733bb1f3cd', '898a8ce1a778b31070e6fc53a1670932ac57a30262c39e2f752a40f08a38048a466ff949302e79e7', 1, '2019-12-11 09:01:14'),
('ce563c90c987abb57050694e551ef35ba092b744b3dde4d4323c85a7b44e249ede9bad48eae10504', '453fa550268713c45e0367b62847892f3906dde514fec1fac4c47339b914f97c26abbd5b930ff84c', 0, '2019-12-11 06:51:25'),
('dd2fe643023cd950dddacfb1cf0eb54b572b0930afad26594d9015538f95eb0138fbc7f1ffe94437', '909ff981893baa3ae8821da50ded3a7a5e18e1aac96c612d9e6d0f0f2515cc64007e42ea1ba95b21', 0, '2020-11-11 06:25:47'),
('de721e7c3d6d502b7305741ccfb54eb1003862aa0ec950b7c5c70ad74f9a999703dc2d411f692975', '4cb6db5f9012e86300f32a37992515b3d48539470099406d550271970a97c9bcd0fc4a0a6940a202', 0, '2019-12-11 06:51:04'),
('eabcf31d30cb6dc1d1b1ddfe0b339c158f1cd36e92003804f1e7e85dd40e43d5c9e0b457c0b54268', '1d4e280e06e27fa3a4ed01717f2017cd0eef56b149f85d35ea0884238e8f9df99eeff63d555a2429', 0, '2019-12-11 07:09:53'),
('f17bbbc99eeb85d9a5794a5cffe26caf6e46f638bbba333917b1b050bb373d2d80b88f623b33efc8', '8c14d6d8599d2b11245c76031f71a26818e84c03e074e5b22e7c5272cfb48cafaf5601c391ffe758', 0, '2020-11-11 06:26:27'),
('fff012e447c10c355212bfc73c50d0975b19675306735101ff4ce7540b07967c270eec965bf582cb', 'fc1d9d2790f329059fb001e7e75faf7802809b5665f227fce27a7fce4a6a530498685945c2f4e5ff', 0, '2019-12-11 09:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ls_adharcards`
--
ALTER TABLE `ls_adharcards`
  ADD PRIMARY KEY (`aacid`),
  ADD KEY `ls_adharcards_pid_foreign` (`pid`);

--
-- Indexes for table `ls_advertises`
--
ALTER TABLE `ls_advertises`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `ls_bank_details`
--
ALTER TABLE `ls_bank_details`
  ADD PRIMARY KEY (`bdid`);

--
-- Indexes for table `ls_categories`
--
ALTER TABLE `ls_categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ls_cities`
--
ALTER TABLE `ls_cities`
  ADD PRIMARY KEY (`cityid`),
  ADD KEY `ls_cities_stateid_foreign` (`stateid`);

--
-- Indexes for table `ls_hardware`
--
ALTER TABLE `ls_hardware`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `ls_hardware_order_id_foreign` (`order_id`);

--
-- Indexes for table `ls_localities`
--
ALTER TABLE `ls_localities`
  ADD PRIMARY KEY (`localitie_id`),
  ADD KEY `ls_localities_cityid_foreign` (`cityid`);

--
-- Indexes for table `ls_offers`
--
ALTER TABLE `ls_offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `ls_offer_services`
--
ALTER TABLE `ls_offer_services`
  ADD PRIMARY KEY (`osid`),
  ADD KEY `ls_offer_services_offer_id_foreign` (`offer_id`),
  ADD KEY `ls_offer_services_sid_foreign` (`sid`);

--
-- Indexes for table `ls_orders`
--
ALTER TABLE `ls_orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `ls_orders_uid_foreign` (`uid`);

--
-- Indexes for table `ls_order_hardware`
--
ALTER TABLE `ls_order_hardware`
  ADD PRIMARY KEY (`ohid`),
  ADD KEY `ls_order_hardware_order_id_foreign` (`order_id`),
  ADD KEY `ls_order_hardware_hardware_id_foreign` (`hardware_id`);

--
-- Indexes for table `ls_order_images`
--
ALTER TABLE `ls_order_images`
  ADD PRIMARY KEY (`oiid`),
  ADD KEY `ls_order_images_userid_foreign` (`userid`),
  ADD KEY `ls_order_images_order_id_foreign` (`order_id`);

--
-- Indexes for table `ls_order_ratings`
--
ALTER TABLE `ls_order_ratings`
  ADD PRIMARY KEY (`orderratingid`),
  ADD KEY `ls_order_ratings_oid_foreign` (`oid`),
  ADD KEY `ls_order_ratings_uid_foreign` (`uid`);

--
-- Indexes for table `ls_order_services`
--
ALTER TABLE `ls_order_services`
  ADD PRIMARY KEY (`osid`),
  ADD KEY `ls_order_services_order_id_foreign` (`order_id`),
  ADD KEY `ls_order_services_sid_foreign` (`sid`);

--
-- Indexes for table `ls_partners`
--
ALTER TABLE `ls_partners`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `ls_partners_pmobileno_unique` (`pmobileno`),
  ADD UNIQUE KEY `ls_partners_pemail_unique` (`pemail`),
  ADD KEY `ls_partners_stateid_foreign` (`stateid`),
  ADD KEY `ls_partners_cityid_foreign` (`cityid`);

--
-- Indexes for table `ls_partner_adharcards`
--
ALTER TABLE `ls_partner_adharcards`
  ADD PRIMARY KEY (`paid`),
  ADD KEY `ls_partner_adharcards_partner_id_foreign` (`partner_id`),
  ADD KEY `ls_partner_adharcards_aacid_foreign` (`aacid`);

--
-- Indexes for table `ls_partner_category_and_prices`
--
ALTER TABLE `ls_partner_category_and_prices`
  ADD PRIMARY KEY (`partner_cat_nd_price_id`),
  ADD KEY `ls_partner_category_and_prices_partner_id_foreign` (`partner_id`),
  ADD KEY `ls_partner_category_and_prices_cid_foreign` (`cid`);

--
-- Indexes for table `ls_partner_earnings`
--
ALTER TABLE `ls_partner_earnings`
  ADD PRIMARY KEY (`earningid`),
  ADD KEY `ls_partner_earnings_oid_foreign` (`oid`),
  ADD KEY `ls_partner_earnings_pid_foreign` (`pid`);

--
-- Indexes for table `ls_partner_ratings`
--
ALTER TABLE `ls_partner_ratings`
  ADD PRIMARY KEY (`ratingid`),
  ADD KEY `ls_partner_ratings_oid_foreign` (`oid`),
  ADD KEY `ls_partner_ratings_pid_foreign` (`pid`);

--
-- Indexes for table `ls_permissions`
--
ALTER TABLE `ls_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `ls_product_categories`
--
ALTER TABLE `ls_product_categories`
  ADD PRIMARY KEY (`pcid`),
  ADD KEY `ls_product_categories_scid_foreign` (`scid`);

--
-- Indexes for table `ls_promo_codes`
--
ALTER TABLE `ls_promo_codes`
  ADD PRIMARY KEY (`promoid`);

--
-- Indexes for table `ls_promo_code_cities`
--
ALTER TABLE `ls_promo_code_cities`
  ADD PRIMARY KEY (`promo_cities_id`),
  ADD KEY `ls_promo_code_cities_cityid_foreign` (`cityid`),
  ADD KEY `ls_promo_code_cities_promoid_foreign` (`promoid`);

--
-- Indexes for table `ls_roles`
--
ALTER TABLE `ls_roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `ls_sales_executives`
--
ALTER TABLE `ls_sales_executives`
  ADD PRIMARY KEY (`seid`),
  ADD KEY `ls_sales_executives_stateid_foreign` (`stateid`),
  ADD KEY `ls_sales_executives_cityid_foreign` (`cityid`);

--
-- Indexes for table `ls_services`
--
ALTER TABLE `ls_services`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `ls_services_cid_foreign` (`cid`),
  ADD KEY `ls_services_stateid_foreign` (`stateid`),
  ADD KEY `ls_services_uid_foreign` (`uid`),
  ADD KEY `ls_services_updateuid_foreign` (`updateuid`);

--
-- Indexes for table `ls_service_cities`
--
ALTER TABLE `ls_service_cities`
  ADD PRIMARY KEY (`scityid`),
  ADD KEY `ls_service_cities_sid_foreign` (`sid`),
  ADD KEY `ls_service_cities_cityid_foreign` (`cityid`);

--
-- Indexes for table `ls_service_images`
--
ALTER TABLE `ls_service_images`
  ADD PRIMARY KEY (`siid`),
  ADD KEY `ls_service_images_sid_foreign` (`sid`);

--
-- Indexes for table `ls_service_localities`
--
ALTER TABLE `ls_service_localities`
  ADD PRIMARY KEY (`slocalitie_id`),
  ADD KEY `ls_service_localities_sid_foreign` (`sid`),
  ADD KEY `ls_service_localities_localitieid_foreign` (`localitieid`);

--
-- Indexes for table `ls_service_prices`
--
ALTER TABLE `ls_service_prices`
  ADD PRIMARY KEY (`spid`),
  ADD KEY `ls_service_prices_sid_foreign` (`sid`),
  ADD KEY `ls_service_prices_cityid_foreign` (`cityid`),
  ADD KEY `ls_service_prices_updateuid_foreign` (`updateuid`);

--
-- Indexes for table `ls_service_specialprices`
--
ALTER TABLE `ls_service_specialprices`
  ADD PRIMARY KEY (`sp_priceid`),
  ADD KEY `ls_service_specialprices_sid_foreign` (`sid`),
  ADD KEY `ls_service_specialprices_cityid_foreign` (`cityid`),
  ADD KEY `ls_service_specialprices_updateuid_foreign` (`updateuid`);

--
-- Indexes for table `ls_states`
--
ALTER TABLE `ls_states`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `ls_subadmin_permissions`
--
ALTER TABLE `ls_subadmin_permissions`
  ADD PRIMARY KEY (`subadmin_pid`),
  ADD KEY `ls_subadmin_permissions_uid_foreign` (`uid`),
  ADD KEY `ls_subadmin_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `ls_sub_categories`
--
ALTER TABLE `ls_sub_categories`
  ADD PRIMARY KEY (`scid`),
  ADD KEY `ls_sub_categories_cid_foreign` (`cid`);

--
-- Indexes for table `ls_user_addresses`
--
ALTER TABLE `ls_user_addresses`
  ADD PRIMARY KEY (`uaid`),
  ADD KEY `ls_user_addresses_uid_foreign` (`uid`),
  ADD KEY `ls_user_addresses_ustateid_foreign` (`ustateid`),
  ADD KEY `ls_user_addresses_ucityid_foreign` (`ucityid`);

--
-- Indexes for table `ls_user_registrations`
--
ALTER TABLE `ls_user_registrations`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `ls_user_registrations_umobileno_unique` (`umobileno`),
  ADD UNIQUE KEY `ls_user_registrations_uemail_unique` (`uemail`),
  ADD KEY `ls_user_registrations_stateid_foreign` (`stateid`),
  ADD KEY `ls_user_registrations_cityid_foreign` (`cityid`);

--
-- Indexes for table `ls_videos`
--
ALTER TABLE `ls_videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `ls_adharcards`
--
ALTER TABLE `ls_adharcards`
  MODIFY `aacid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_advertises`
--
ALTER TABLE `ls_advertises`
  MODIFY `adv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_bank_details`
--
ALTER TABLE `ls_bank_details`
  MODIFY `bdid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_categories`
--
ALTER TABLE `ls_categories`
  MODIFY `cid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_cities`
--
ALTER TABLE `ls_cities`
  MODIFY `cityid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ls_hardware`
--
ALTER TABLE `ls_hardware`
  MODIFY `hid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_localities`
--
ALTER TABLE `ls_localities`
  MODIFY `localitie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_offers`
--
ALTER TABLE `ls_offers`
  MODIFY `offer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_offer_services`
--
ALTER TABLE `ls_offer_services`
  MODIFY `osid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_orders`
--
ALTER TABLE `ls_orders`
  MODIFY `oid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_order_hardware`
--
ALTER TABLE `ls_order_hardware`
  MODIFY `ohid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_order_images`
--
ALTER TABLE `ls_order_images`
  MODIFY `oiid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_order_ratings`
--
ALTER TABLE `ls_order_ratings`
  MODIFY `orderratingid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_order_services`
--
ALTER TABLE `ls_order_services`
  MODIFY `osid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_partners`
--
ALTER TABLE `ls_partners`
  MODIFY `pid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_partner_adharcards`
--
ALTER TABLE `ls_partner_adharcards`
  MODIFY `paid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_partner_category_and_prices`
--
ALTER TABLE `ls_partner_category_and_prices`
  MODIFY `partner_cat_nd_price_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_partner_earnings`
--
ALTER TABLE `ls_partner_earnings`
  MODIFY `earningid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_partner_ratings`
--
ALTER TABLE `ls_partner_ratings`
  MODIFY `ratingid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_permissions`
--
ALTER TABLE `ls_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_product_categories`
--
ALTER TABLE `ls_product_categories`
  MODIFY `pcid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_promo_codes`
--
ALTER TABLE `ls_promo_codes`
  MODIFY `promoid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_promo_code_cities`
--
ALTER TABLE `ls_promo_code_cities`
  MODIFY `promo_cities_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_roles`
--
ALTER TABLE `ls_roles`
  MODIFY `roleid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_sales_executives`
--
ALTER TABLE `ls_sales_executives`
  MODIFY `seid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_services`
--
ALTER TABLE `ls_services`
  MODIFY `sid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_service_cities`
--
ALTER TABLE `ls_service_cities`
  MODIFY `scityid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_service_images`
--
ALTER TABLE `ls_service_images`
  MODIFY `siid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_service_localities`
--
ALTER TABLE `ls_service_localities`
  MODIFY `slocalitie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_service_prices`
--
ALTER TABLE `ls_service_prices`
  MODIFY `spid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_service_specialprices`
--
ALTER TABLE `ls_service_specialprices`
  MODIFY `sp_priceid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_states`
--
ALTER TABLE `ls_states`
  MODIFY `stateid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ls_subadmin_permissions`
--
ALTER TABLE `ls_subadmin_permissions`
  MODIFY `subadmin_pid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_sub_categories`
--
ALTER TABLE `ls_sub_categories`
  MODIFY `scid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_user_addresses`
--
ALTER TABLE `ls_user_addresses`
  MODIFY `uaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_user_registrations`
--
ALTER TABLE `ls_user_registrations`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ls_videos`
--
ALTER TABLE `ls_videos`
  MODIFY `video_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ls_adharcards`
--
ALTER TABLE `ls_adharcards`
  ADD CONSTRAINT `ls_adharcards_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `ls_partners` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_cities`
--
ALTER TABLE `ls_cities`
  ADD CONSTRAINT `ls_cities_stateid_foreign` FOREIGN KEY (`stateid`) REFERENCES `ls_states` (`stateid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_hardware`
--
ALTER TABLE `ls_hardware`
  ADD CONSTRAINT `ls_hardware_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_localities`
--
ALTER TABLE `ls_localities`
  ADD CONSTRAINT `ls_localities_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_offer_services`
--
ALTER TABLE `ls_offer_services`
  ADD CONSTRAINT `ls_offer_services_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `ls_offers` (`offer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_offer_services_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_orders`
--
ALTER TABLE `ls_orders`
  ADD CONSTRAINT `ls_orders_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_order_hardware`
--
ALTER TABLE `ls_order_hardware`
  ADD CONSTRAINT `ls_order_hardware_hardware_id_foreign` FOREIGN KEY (`hardware_id`) REFERENCES `ls_hardware` (`hid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_order_hardware_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_order_images`
--
ALTER TABLE `ls_order_images`
  ADD CONSTRAINT `ls_order_images_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_order_images_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_order_ratings`
--
ALTER TABLE `ls_order_ratings`
  ADD CONSTRAINT `ls_order_ratings_oid_foreign` FOREIGN KEY (`oid`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_order_ratings_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_order_services`
--
ALTER TABLE `ls_order_services`
  ADD CONSTRAINT `ls_order_services_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_order_services_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_partners`
--
ALTER TABLE `ls_partners`
  ADD CONSTRAINT `ls_partners_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_partners_stateid_foreign` FOREIGN KEY (`stateid`) REFERENCES `ls_states` (`stateid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_partner_adharcards`
--
ALTER TABLE `ls_partner_adharcards`
  ADD CONSTRAINT `ls_partner_adharcards_aacid_foreign` FOREIGN KEY (`aacid`) REFERENCES `ls_adharcards` (`aacid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_partner_adharcards_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `ls_partners` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_partner_category_and_prices`
--
ALTER TABLE `ls_partner_category_and_prices`
  ADD CONSTRAINT `ls_partner_category_and_prices_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `ls_categories` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_partner_category_and_prices_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `ls_partners` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_partner_earnings`
--
ALTER TABLE `ls_partner_earnings`
  ADD CONSTRAINT `ls_partner_earnings_oid_foreign` FOREIGN KEY (`oid`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_partner_earnings_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `ls_partners` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_partner_ratings`
--
ALTER TABLE `ls_partner_ratings`
  ADD CONSTRAINT `ls_partner_ratings_oid_foreign` FOREIGN KEY (`oid`) REFERENCES `ls_orders` (`oid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_partner_ratings_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `ls_partners` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_product_categories`
--
ALTER TABLE `ls_product_categories`
  ADD CONSTRAINT `ls_product_categories_scid_foreign` FOREIGN KEY (`scid`) REFERENCES `ls_sub_categories` (`scid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_promo_code_cities`
--
ALTER TABLE `ls_promo_code_cities`
  ADD CONSTRAINT `ls_promo_code_cities_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_promo_code_cities_promoid_foreign` FOREIGN KEY (`promoid`) REFERENCES `ls_promo_codes` (`promoid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_sales_executives`
--
ALTER TABLE `ls_sales_executives`
  ADD CONSTRAINT `ls_sales_executives_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_sales_executives_stateid_foreign` FOREIGN KEY (`stateid`) REFERENCES `ls_states` (`stateid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_services`
--
ALTER TABLE `ls_services`
  ADD CONSTRAINT `ls_services_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `ls_categories` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_services_stateid_foreign` FOREIGN KEY (`stateid`) REFERENCES `ls_states` (`stateid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_services_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_services_updateuid_foreign` FOREIGN KEY (`updateuid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_service_cities`
--
ALTER TABLE `ls_service_cities`
  ADD CONSTRAINT `ls_service_cities_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_service_cities_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_service_images`
--
ALTER TABLE `ls_service_images`
  ADD CONSTRAINT `ls_service_images_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_service_localities`
--
ALTER TABLE `ls_service_localities`
  ADD CONSTRAINT `ls_service_localities_localitieid_foreign` FOREIGN KEY (`localitieid`) REFERENCES `ls_localities` (`localitie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_service_localities_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_service_prices`
--
ALTER TABLE `ls_service_prices`
  ADD CONSTRAINT `ls_service_prices_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_service_prices_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_service_prices_updateuid_foreign` FOREIGN KEY (`updateuid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_service_specialprices`
--
ALTER TABLE `ls_service_specialprices`
  ADD CONSTRAINT `ls_service_specialprices_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_service_specialprices_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `ls_services` (`sid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_service_specialprices_updateuid_foreign` FOREIGN KEY (`updateuid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_subadmin_permissions`
--
ALTER TABLE `ls_subadmin_permissions`
  ADD CONSTRAINT `ls_subadmin_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `ls_permissions` (`permission_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_subadmin_permissions_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_sub_categories`
--
ALTER TABLE `ls_sub_categories`
  ADD CONSTRAINT `ls_sub_categories_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `ls_categories` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_user_addresses`
--
ALTER TABLE `ls_user_addresses`
  ADD CONSTRAINT `ls_user_addresses_ucityid_foreign` FOREIGN KEY (`ucityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_user_addresses_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `ls_user_registrations` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_user_addresses_ustateid_foreign` FOREIGN KEY (`ustateid`) REFERENCES `ls_states` (`stateid`) ON DELETE CASCADE;

--
-- Constraints for table `ls_user_registrations`
--
ALTER TABLE `ls_user_registrations`
  ADD CONSTRAINT `ls_user_registrations_cityid_foreign` FOREIGN KEY (`cityid`) REFERENCES `ls_cities` (`cityid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ls_user_registrations_stateid_foreign` FOREIGN KEY (`stateid`) REFERENCES `ls_states` (`stateid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
