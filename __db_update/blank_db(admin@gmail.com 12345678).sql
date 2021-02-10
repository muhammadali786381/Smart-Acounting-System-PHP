-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 10:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zf_accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_head`
--

CREATE TABLE `account_head` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(125) NOT NULL,
  `owner_name` varchar(125) NOT NULL,
  `cell_1` varchar(125) NOT NULL,
  `cell_2` varchar(125) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `head_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Cash\r\n2=>Bank\r\n3=>Client\r\n4=>Supplier\r\n',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active 0=>deactive',
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_head`
--

INSERT INTO `account_head` (`id`, `company_id`, `company_name`, `owner_name`, `cell_1`, `cell_2`, `address`, `head_type`, `status`, `create_on`, `update_on`) VALUES
(1, 1, 'Z-F Cash', 'Z-F Owner', '', NULL, NULL, 1, 1, '2021-02-01 16:50:07', '2021-02-01 16:54:03'),
(2, 2, 'Z-A Cash', 'Z-A Owner', '', NULL, NULL, 1, 1, '2021-02-01 16:50:07', '2021-02-01 16:54:06'),
(3, 1, 'Z-F Bank', 'Z-F Owner', '', NULL, NULL, 2, 1, '2021-02-01 16:50:07', '2021-02-01 16:50:07'),
(4, 2, 'Z-A Bank', 'Z-A Owner', '', NULL, NULL, 2, 1, '2021-02-01 16:50:07', '2021-02-01 16:50:07'),
(10, 1, 'ABC-Client', 'Muhammad Ali', '923062388261', '', 'Multan', 3, 1, '2021-02-08 22:51:01', '2021-02-08 22:51:01'),
(11, 1, 'XYZ Supplier', 'Muhammad Hassan', '923062388261', '', 'Multan', 4, 1, '2021-02-08 22:51:46', '2021-02-08 22:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(125) NOT NULL,
  `last_name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `role` tinyint(4) NOT NULL COMMENT 'Super Admin=>1 Admin=>2 Accountant=>3',
  `profile_img` varchar(225) NOT NULL,
  `password` varchar(525) NOT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete_able` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `city_id`, `role`, `profile_img`, `password`, `status`, `created_on`, `update_on`, `is_delete_able`, `is_delete`) VALUES
(1, 'Muhammad', 'Ali', 'admin@gmail.com', '923437121226', 'Male', 4, 1, '', 'gwqqttc6un62w2y9nfpqjh1nyijfm25d55ad283aa400af464c76d713c07addymbQxSy6qg4P5ci45hir9qpx9yc', 'Active', '2020-08-07 00:02:08', '2021-02-07 22:15:34', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `log_id` int(225) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `log_item` varchar(125) DEFAULT NULL,
  `logs` text NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`log_id`, `admin_id`, `log_item`, `logs`, `create_on`) VALUES
(188, 1, '127.0.0.1', 'login', '2020-12-31 19:49:30'),
(189, 1, '1', 'Update Admin Profile', '2020-12-31 19:59:57'),
(190, 1, '1', 'Update Admin Profile', '2020-12-31 20:00:06'),
(191, 1, '127.0.0.1', 'login', '2021-01-01 16:35:27'),
(192, 1, '100019', 'New member created', '2021-01-01 16:56:58'),
(193, 1, '127.0.0.1', 'logout', '2021-01-01 17:00:08'),
(194, 1, '127.0.0.1', 'login', '2021-01-02 18:07:47'),
(195, 1, '100021', 'Update Member Profile', '2021-01-02 18:09:21'),
(196, 1, '127.0.0.1', 'login', '2021-01-02 18:43:46'),
(197, 1, '127.0.0.1', 'logout', '2021-01-02 18:50:15'),
(198, 1, '::1', 'login', '2021-01-03 20:57:39'),
(199, 1, '3', 'Update City', '2021-01-03 20:58:15'),
(200, 1, '100021', 'Update Member Profile', '2021-01-03 21:05:11'),
(201, 1, '6', 'Update Post Property Status', '2021-01-03 21:54:41'),
(202, 1, '5', 'Update Post Property Status', '2021-01-03 21:56:23'),
(203, 1, '2', 'Update Post Property Status', '2021-01-03 21:57:29'),
(204, 1, '5', 'Update Post Property Status', '2021-01-03 21:58:21'),
(205, 1, '4', 'Update Post Property Status', '2021-01-03 21:58:27'),
(206, 1, '6', 'Update Post Property Status', '2021-01-03 22:19:08'),
(207, 1, '2', 'Update Post Property Status', '2021-01-03 22:21:26'),
(208, 1, '2', 'Update Post Property Status', '2021-01-03 22:21:35'),
(209, 1, '::1', 'logout', '2021-01-03 22:22:42'),
(210, 1, '127.0.0.1', 'login', '2021-01-04 17:42:12'),
(211, 1, '5', 'Update Post Property Status', '2021-01-04 17:49:07'),
(212, 1, '127.0.0.1', 'login', '2021-01-04 19:55:27'),
(213, 1, '127.0.0.1', 'login', '2021-01-05 16:06:00'),
(214, 1, '5', 'Update Offer Status', '2021-01-05 17:24:48'),
(215, 1, '5', 'Update Offer Status', '2021-01-05 17:26:41'),
(216, 1, '5', 'Update Offer Status', '2021-01-05 17:34:15'),
(217, 1, '3', 'Update Offer Status', '2021-01-05 17:36:50'),
(218, 1, '5', 'Update Offer Status', '2021-01-05 18:14:41'),
(219, 1, '5', 'Update Offer Status', '2021-01-05 18:18:02'),
(220, 1, '3', 'Update Offer Status', '2021-01-05 18:18:30'),
(221, 1, '3', 'Update Offer Status', '2021-01-05 18:19:05'),
(222, 1, '3', 'Update Offer Status', '2021-01-05 18:19:19'),
(223, 1, '5', 'Update Offer Status', '2021-01-05 18:20:25'),
(224, 1, '3', 'Update Offer Status', '2021-01-05 19:04:21'),
(225, 1, '127.0.0.1', 'login', '2021-01-05 20:19:57'),
(226, 1, '5', 'Update Offer Status', '2021-01-05 20:30:40'),
(227, 1, '5', 'Update Offer Status', '2021-01-05 20:31:58'),
(228, 1, '127.0.0.1', 'logout', '2021-01-05 21:00:21'),
(229, 1, '127.0.0.1', 'login', '2021-01-11 16:23:26'),
(230, 1, '8', 'Update Offer Status', '2021-01-11 16:24:44'),
(231, 1, '8', 'Update Offer Status', '2021-01-11 16:25:32'),
(232, 1, '127.0.0.1', 'logout', '2021-01-11 16:27:06'),
(233, 1, '127.0.0.1', 'login', '2021-01-12 11:17:42'),
(234, 1, '10', 'Update Offer Status', '2021-01-12 11:19:42'),
(235, 1, '10', 'Update Offer Status', '2021-01-12 11:20:22'),
(236, 1, '127.0.0.1', 'login', '2021-01-12 13:33:36'),
(237, 1, '127.0.0.1', 'logout', '2021-01-12 14:01:35'),
(238, 1, '127.0.0.1', 'login', '2021-01-12 15:20:23'),
(239, 1, '11', 'Update offer amount', '2021-01-12 17:01:09'),
(240, 1, '11', 'Update offer amount', '2021-01-12 17:06:06'),
(241, 1, '12', 'Update offer amount', '2021-01-12 17:31:45'),
(242, 1, '127.0.0.1', 'logout', '2021-01-12 18:58:35'),
(243, 1, '127.0.0.1', 'login', '2021-01-13 16:47:39'),
(244, 1, '2', 'Update Wanted Status.', '2021-01-13 18:28:54'),
(245, 1, '4', 'Update Wanted Status.', '2021-01-13 18:35:13'),
(246, 1, '3', 'Update Wanted Status.', '2021-01-13 18:35:18'),
(247, 1, '2', 'Update Wanted Status.', '2021-01-13 18:38:40'),
(248, 1, '2', 'Update Wanted Status.', '2021-01-13 18:39:27'),
(249, 1, '2', 'Update Wanted Status.', '2021-01-13 18:41:28'),
(250, 1, '2', 'Update Wanted Status.', '2021-01-13 18:41:50'),
(251, 1, '127.0.0.1', 'logout', '2021-01-13 18:42:34'),
(252, 1, '127.0.0.1', 'login', '2021-01-13 18:56:25'),
(253, 1, '12', 'Update offer amount', '2021-01-13 18:56:54'),
(254, 1, '127.0.0.1', 'login', '2021-01-14 12:29:53'),
(255, 1, '127.0.0.1', 'login', '2021-01-29 16:50:42'),
(256, 1, '127.0.0.1', 'logout', '2021-01-29 18:05:32'),
(257, 1, '127.0.0.1', 'login', '2021-01-29 18:05:36'),
(258, 1, '127.0.0.1', 'login', '2021-01-29 18:06:26'),
(259, 1, '127.0.0.1', 'logout', '2021-01-29 18:09:38'),
(260, 1, '127.0.0.1', 'login', '2021-01-29 18:09:46'),
(261, 1, '127.0.0.1', 'logout', '2021-01-29 18:17:39'),
(262, 1, '127.0.0.1', 'login', '2021-01-29 18:17:45'),
(263, 1, '127.0.0.1', 'logout', '2021-01-29 18:53:04'),
(264, 1, '127.0.0.1', 'login', '2021-01-29 18:53:11'),
(265, 1, '127.0.0.1', 'login', '2021-01-29 19:00:26'),
(266, 1, '127.0.0.1', 'login', '2021-01-30 17:23:52'),
(267, 1, '127.0.0.1', 'login', '2021-01-30 20:29:33'),
(268, 1, '127.0.0.1', 'logout', '2021-01-30 20:41:52'),
(269, 1, '127.0.0.1', 'login', '2021-01-30 20:44:39'),
(270, 1, '127.0.0.1', 'logout', '2021-01-30 20:44:53'),
(271, 1, '127.0.0.1', 'login', '2021-01-30 20:45:19'),
(272, 1, '127.0.0.1', 'logout', '2021-01-30 20:48:10'),
(273, 1, '127.0.0.1', 'login', '2021-01-30 20:48:15'),
(274, 1, '127.0.0.1', 'logout', '2021-01-30 20:48:48'),
(275, 1, '127.0.0.1', 'login', '2021-01-30 20:49:08'),
(276, 1, '127.0.0.1', 'logout', '2021-01-30 20:49:37'),
(277, 1, '127.0.0.1', 'login', '2021-01-31 11:47:47'),
(278, 1, '127.0.0.1', 'logout', '2021-01-31 12:45:55'),
(279, 1, '127.0.0.1', 'login', '2021-01-31 12:48:37'),
(280, 1, '127.0.0.1', 'logout', '2021-01-31 12:51:33'),
(281, 1, '127.0.0.1', 'login', '2021-01-31 12:51:37'),
(282, 1, '127.0.0.1', 'logout', '2021-01-31 13:48:26'),
(283, 1, '127.0.0.1', 'login', '2021-02-01 15:55:12'),
(284, 1, '5', 'New head created', '2021-02-01 18:31:59'),
(285, 1, '6', 'New head created', '2021-02-01 18:32:48'),
(286, 1, '7', 'New head created', '2021-02-01 18:33:38'),
(287, 1, '8', 'New head created', '2021-02-01 18:39:28'),
(288, 1, '9', 'New head created', '2021-02-01 18:40:19'),
(289, 1, '1', 'New C.R.V voucher created', '2021-02-01 18:42:01'),
(290, 1, '127.0.0.1', 'login', '2021-02-02 18:07:09'),
(291, 1, '2', 'New C.R.V voucher created', '2021-02-02 18:08:29'),
(292, 1, '3', 'New C.R.V voucher created', '2021-02-02 20:37:58'),
(293, 1, '4', 'New C.R.V voucher created', '2021-02-02 20:39:34'),
(294, 1, '5', 'New C.R.V voucher created', '2021-02-02 20:43:06'),
(295, 1, '6', 'New C.R.V voucher created', '2021-02-02 20:46:36'),
(296, 1, '7', 'New B.R.V voucher created', '2021-02-02 20:56:18'),
(297, 1, '8', 'New B.P.V voucher created', '2021-02-02 21:02:08'),
(298, 1, '9', 'New J.V voucher created', '2021-02-02 21:16:38'),
(299, 1, '10', 'New J.V voucher created', '2021-02-02 21:17:35'),
(300, 1, '127.0.0.1', 'login', '2021-02-03 21:28:25'),
(301, 1, '127.0.0.1', 'login', '2021-02-04 14:20:53'),
(302, 1, '11', 'New C.R.V voucher created', '2021-02-04 14:31:12'),
(303, 1, '127.0.0.1', 'login', '2021-02-05 12:15:14'),
(304, 1, '12', 'New C.R.V voucher created', '2021-02-05 13:07:16'),
(305, 1, '127.0.0.1', 'login', '2021-02-06 01:17:49'),
(306, 1, '100007', 'Create New User', '2021-02-06 01:43:37'),
(307, 1, '100030', 'New member created', '2021-02-06 01:48:07'),
(308, 1, '127.0.0.1', 'logout', '2021-02-06 01:58:13'),
(309, 1, '127.0.0.1', 'login', '2021-02-07 19:03:57'),
(310, 1, '52', 'New Sale created', '2021-02-07 19:23:24'),
(311, 1, '1', 'Update Admin Password', '2021-02-07 19:30:02'),
(312, 1, '127.0.0.1', 'logout', '2021-02-07 19:30:08'),
(313, 1, '127.0.0.1', 'login', '2021-02-07 19:30:21'),
(314, 1, '100007', 'Update Admin Password', '2021-02-07 19:30:44'),
(315, 1, '127.0.0.1', 'login', '2021-02-07 19:56:51'),
(316, 1, '127.0.0.1', 'login', '2021-02-07 22:15:07'),
(317, 1, '1', 'Update Admin Password', '2021-02-07 22:15:34'),
(318, 1, '127.0.0.1', 'login', '2021-02-08 21:45:42'),
(319, 1, '10', 'New head created', '2021-02-08 22:51:01'),
(320, 1, '11', 'New head created', '2021-02-08 22:51:46'),
(321, 1, '53', 'New Sale created', '2021-02-08 22:52:40'),
(322, 1, '54', 'New Sale created', '2021-02-08 22:53:56'),
(323, 1, '127.0.0.1', 'login', '2021-02-10 15:28:41'),
(324, 1, '127.0.0.1', 'logout', '2021-02-10 15:32:19'),
(325, 1, '127.0.0.1', 'login', '2021-02-10 15:32:24'),
(326, 1, '127.0.0.1', 'logout', '2021-02-10 15:33:50'),
(327, 1, '127.0.0.1', 'login', '2021-02-10 15:33:54'),
(328, 1, '127.0.0.1', 'logout', '2021-02-10 15:35:33'),
(329, 1, '127.0.0.1', 'login', '2021-02-10 15:35:39'),
(330, 1, '127.0.0.1', 'logout', '2021-02-10 15:36:28'),
(331, 1, '127.0.0.1', 'login', '2021-02-10 15:45:50'),
(332, 1, '127.0.0.1', 'login', '2021-02-10 19:55:36'),
(333, 1, '55', 'New Sale created', '2021-02-10 19:59:49'),
(334, 1, '56', 'New Sale created', '2021-02-10 20:32:43'),
(335, 1, '57', 'New Sale created', '2021-02-10 20:53:28'),
(336, 1, '58', 'New Sale created', '2021-02-10 20:53:58'),
(337, 1, '59', 'New Sale created', '2021-02-10 20:54:28'),
(338, 1, '60', 'New Sale created', '2021-02-10 20:56:07'),
(339, 1, '61', 'New Sale created', '2021-02-10 20:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `company_list`
--

CREATE TABLE `company_list` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `address` varchar(125) DEFAULT NULL,
  `phone` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `image_link` varchar(125) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Active=>1\r\nDeactive=>0',
  `create_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_list`
--

INSERT INTO `company_list` (`id`, `name`, `address`, `phone`, `email`, `image_link`, `status`, `create_on`) VALUES
(1, 'Zorawar Feeds', 'Multan', '+923000000000', 'info@ZorawarFeeds.com', 'zf_logo.png', 1, '2021-01-27 17:39:35'),
(2, 'ZA Traders', 'Multan', '+923000000000', 'info@ZATraders.com', 'za_logo.png', 1, '2021-01-27 17:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `buy_price` decimal(15,2) DEFAULT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  `file_link` varchar(225) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Active=>1\r\nDeactive=>0\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `name`, `buy_price`, `sale_price`, `file_link`, `description`, `status`) VALUES
(15, 1, 'abc', '100.00', '130.00', NULL, NULL, 1),
(16, 1, 'xyz', '400.00', '500.00', NULL, NULL, 1),
(17, 1, 'Test Product', '1000.00', '1200.00', 'bl_20210207112943.png', 'Test Note', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_price_update_logs`
--

CREATE TABLE `product_price_update_logs` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `old_buy_price` decimal(15,2) NOT NULL,
  `new_buy_price` decimal(15,2) NOT NULL,
  `old_sale_price` decimal(15,2) NOT NULL,
  `new_sale_price` decimal(15,2) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_transation`
--

CREATE TABLE `product_transation` (
  `id` int(11) NOT NULL,
  `prefix_id` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '\r\nSale=>1 \r\nPurchase=>2',
  `head_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `note` varchar(225) DEFAULT NULL,
  `sale_total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `buy_total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `admin_id` int(11) DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_transation`
--

INSERT INTO `product_transation` (`id`, `prefix_id`, `date`, `type`, `head_id`, `company_id`, `note`, `sale_total`, `buy_total`, `admin_id`, `create_on`, `update_on`) VALUES
(57, 'PURCHASE-', '2021-02-11', 2, 11, 1, 'Test Buy Entry', '15600.00', '12000.00', 1, '2021-02-10 20:53:27', '2021-02-10 20:53:28'),
(58, 'SALE-', '2021-02-11', 1, 10, 1, 'Test Sale 1', '650.00', '500.00', 1, '2021-02-10 20:53:58', '2021-02-10 20:53:58'),
(59, 'SALE-', '2021-02-11', 1, 10, 1, 'Test Sale 2', '2600.00', '2000.00', 1, '2021-02-10 20:54:28', '2021-02-10 20:54:28'),
(60, 'SALE-', '2021-02-11', 1, 10, 1, 'Test Sale 3', '700.00', '500.00', 1, '2021-02-10 20:56:07', '2021-02-10 20:56:07'),
(61, 'SALE-', '2021-02-11', 1, 10, 1, 'Test Sale final', '11700.00', '9000.00', 1, '2021-02-10 20:56:41', '2021-02-10 20:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_transation_detail`
--

CREATE TABLE `product_transation_detail` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1=> Sale 2=> Purchase',
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sale_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `buy_price` decimal(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_transation_detail`
--

INSERT INTO `product_transation_detail` (`id`, `company_id`, `invoice_id`, `date`, `type`, `product_id`, `qty`, `sale_price`, `buy_price`) VALUES
(86, 1, 57, '2021-02-11', 2, 15, 120, '100.00', '100.00'),
(87, 1, 58, '2021-02-11', 1, 15, 5, '130.00', '100.00'),
(88, 1, 59, '2021-02-11', 1, 15, 20, '130.00', '100.00'),
(89, 1, 60, '2021-02-11', 1, 15, 5, '140.00', '100.00'),
(90, 1, 61, '2021-02-11', 1, 15, 90, '130.00', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key_value` varchar(125) NOT NULL,
  `value` text NOT NULL,
  `description` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_value`, `value`, `description`) VALUES
(1, 'APP_NAME', 'Smart Accounting System', NULL),
(2, 'APP_VERSION', '1.0.0', 'Beta version'),
(3, 'APP_KEYWORD', 'Freelance Mark, Best Translator Market, High paid client ', NULL),
(4, 'APP_DES', 'Best Translator Web portal. ', NULL),
(5, 'APP_FAV_ICON', 'fav_icon.png', NULL),
(6, 'APP_SHORT_NAME', 'Smart Accounting System', NULL),
(7, 'APP_THEME', 'alpha', NULL),
(9, 'APP_MAIL_USERNAME', 'test@alphasmspk.com', NULL),
(10, 'APP_MAIL_PASS', 'noe%+C~eH2Gg', NULL),
(11, 'APP_MAIL_SERVER', 'mail.alphasmspk.com', NULL),
(12, 'APP_MAIL_PORT', '465', NULL),
(13, 'APP_MAIL_SECURITY', 'true', NULL),
(14, 'APP_MAIL', 'info@gmail.com', NULL),
(20, 'PHP_MAIL', 'Enable', 'Php Default mail function'),
(21, 'PHP_MAILER', 'Disable', 'phpmailer smtp sdk'),
(22, 'APP_CURRENCY_NAME', 'Rupees', 'Pakistani Rupess'),
(23, 'APP_CURRENCY_SYMBOL', 'Rs.', NULL),
(24, 'APP_PHONE', '(+92)347 47 76278', 'Application Phone Number for contact'),
(26, 'APP_MAIL_VERIFICATION', 'Yes', 'Yes if you want to enable or No for disable'),
(27, 'APP_MOBILE_VERIFICATION', 'Yes', 'Yes if you want to enable or No for disable'),
(29, 'SEND_SMS', 'No', 'If you want able sms service then set value Yes other wise No'),
(30, 'SMS_USER_NAME', 'Sohailtahir', NULL),
(31, 'SMS_PASSWORD', '12345678', NULL),
(32, 'SMS_MASK', 'ESTATE SOL.', NULL),
(37, 'APP_INVOICE_WEB_LINK', 'www.taxknowlegi.com', NULL),
(38, 'APP_INVOICE_MAIL', 'info@taxknowlegi.com', NULL),
(39, 'APP_INVOICE_LOGO', 'invoice_logo.png', NULL),
(40, 'APP_INVOICE_WHATSAPP_NUMBER', '(+92)321-5150-572\r\n', NULL),
(43, 'APP_DASHBOARD_NAME', 'S.A.S', NULL),
(44, 'SEND_MAIL', 'No', NULL),
(54, 'APP_APP_LOGO', 'IMAC_LOGO_FOR_WEB.png', NULL),
(55, 'APP_SIDEBAR_LOGO', '767_20210114014841.png', NULL),
(56, 'APP_COMPANY_NAME', 'ZORAWAR GROUP OF COMPANYS', NULL),
(57, 'APP_TABLE_HEAD_COLOR_CLASS', 'card-success', NULL),
(58, 'APP_MODEL_HEAD_COLOR_CLASS', 'alert-success', NULL),
(59, 'APP_SALE_INV_PREFIX', 'SALE-', NULL),
(60, 'APP_PURCHASE_INV_PREFIX', 'PURCHASE-', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile` varchar(125) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(125) NOT NULL,
  `last_name` varchar(125) NOT NULL,
  `agency_name` varchar(225) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(1200) DEFAULT NULL,
  `email_verification_code` int(11) DEFAULT NULL,
  `mobile` varchar(125) NOT NULL,
  `mobile_verification_code` int(11) DEFAULT NULL,
  `profile_img` varchar(125) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` enum('Active','Block','Delete') NOT NULL DEFAULT 'Active',
  `phone` varchar(100) DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_head_link`
--

CREATE TABLE `user_head_link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_head_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active 0=>Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_item` varchar(125) DEFAULT NULL,
  `logs` text DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `log_item`, `logs`, `create_on`) VALUES
(160, 100020, '127.0.0.1', 'login', '2021-01-01 21:51:08'),
(161, 100020, '127.0.0.1', 'logout', '2021-01-01 22:11:24'),
(162, 100020, '127.0.0.1', 'login', '2021-01-01 22:11:50'),
(163, 100020, '127.0.0.1', 'Change Password', '2021-01-01 22:14:16'),
(164, 100020, '127.0.0.1', 'logout', '2021-01-01 22:14:19'),
(165, 100020, '127.0.0.1', 'login', '2021-01-01 22:14:28'),
(166, 100020, '127.0.0.1', 'Update Profile Image', '2021-01-01 22:18:46'),
(167, 100020, '127.0.0.1', 'Change Address Information', '2021-01-01 22:25:52'),
(168, 100020, '127.0.0.1', 'logout', '2021-01-01 22:25:54'),
(169, 100020, '127.0.0.1', 'login', '2021-01-01 22:26:35'),
(170, 100020, '127.0.0.1', 'Change Address Information', '2021-01-01 22:27:14'),
(171, 100020, '127.0.0.1', 'Change Address Information', '2021-01-01 22:27:24'),
(172, 100020, '127.0.0.1', 'Update Profile Image', '2021-01-01 22:27:53'),
(173, 100020, '::1', 'login', '2021-01-02 00:08:21'),
(174, 100020, '3', 'Update Post Property Status', '2021-01-02 02:15:49'),
(175, 100020, '3', 'Update Post Property Status', '2021-01-02 02:15:59'),
(176, 100020, '3', 'Update Post Property Status', '2021-01-02 02:16:10'),
(177, 100020, '3', 'Update Post Property Status', '2021-01-02 02:16:38'),
(178, 100020, '3', 'Update Post Property Status', '2021-01-02 02:18:14'),
(179, 100020, '3', 'Update Post Property Status', '2021-01-02 02:18:24'),
(180, 100020, '2', 'Update Post Property Status', '2021-01-02 02:18:32'),
(181, 100020, '127.0.0.1', 'login', '2021-01-02 15:03:33'),
(182, 100020, '::1', 'login', '2021-01-02 16:33:17'),
(183, 100020, '2', 'Update Post Property Status', '2021-01-02 16:37:50'),
(184, 100020, '3', 'Update Post Property Status', '2021-01-02 16:39:07'),
(185, 100020, '2', 'Update Post Property Status', '2021-01-02 16:39:14'),
(186, 100020, '3', 'Update Post Property Status', '2021-01-02 17:07:56'),
(187, 100020, '2', 'Update Post Property Status', '2021-01-02 17:08:02'),
(188, 100020, '::1', 'logout', '2021-01-02 17:54:02'),
(189, 100021, '::1', 'login', '2021-01-02 17:56:15'),
(190, 100021, '6', 'Update Post Property Status', '2021-01-02 18:05:12'),
(191, 100021, '6', 'Update Post Property Status', '2021-01-02 18:05:38'),
(192, 100021, '::1', 'logout', '2021-01-02 18:07:24'),
(193, 100020, '127.0.0.1', 'logout', '2021-01-02 18:07:36'),
(194, 100021, '::1', 'login', '2021-01-02 18:09:38'),
(195, 100021, '::1', 'logout', '2021-01-02 18:10:05'),
(196, 100020, '::1', 'login', '2021-01-02 18:13:42'),
(197, 100020, '5', 'Update Post Property Status', '2021-01-02 18:40:04'),
(198, 100020, '5', 'Update Post Property Status', '2021-01-02 18:40:31'),
(199, 100020, '3', 'Update Post Property Status', '2021-01-02 18:40:48'),
(200, 100020, '::1', 'logout', '2021-01-02 18:41:37'),
(201, 100020, '::1', 'login', '2021-01-03 20:49:24'),
(202, 100020, '::1', 'logout', '2021-01-03 20:57:05'),
(203, 100020, '127.0.0.1', 'login', '2021-01-05 21:00:42'),
(204, 100020, '::1', 'login', '2021-01-06 08:37:21'),
(205, 100021, '127.0.0.1', 'login', '2021-01-10 16:41:13'),
(206, 100021, '127.0.0.1', 'logout', '2021-01-10 17:50:00'),
(207, 100021, '127.0.0.1', 'login', '2021-01-10 17:50:10'),
(208, 100021, '127.0.0.1', 'Change Address Information', '2021-01-10 18:18:27'),
(209, 100021, '127.0.0.1', 'login', '2021-01-11 13:16:22'),
(210, 100021, '127.0.0.1', 'logout', '2021-01-11 13:16:45'),
(211, 100021, '127.0.0.1', 'login', '2021-01-11 13:20:49'),
(212, 100021, '127.0.0.1', 'logout', '2021-01-11 13:31:49'),
(213, 100021, '127.0.0.1', 'login', '2021-01-11 13:32:20'),
(214, 100021, '6', 'Update Post Property Status', '2021-01-11 13:54:08'),
(215, 100021, '7', 'Post New Property', '2021-01-11 13:55:46'),
(216, 100021, '8', 'Post New Property', '2021-01-11 13:57:19'),
(217, 100021, '9', 'Post New Property', '2021-01-11 14:10:55'),
(218, 100021, '9', 'Update Post Property Status', '2021-01-11 15:49:56'),
(219, 100021, 'O.ID:6 P.ID:4', 'Send Offer On Property', '2021-01-11 16:22:29'),
(220, 100021, 'O.ID:7 P.ID:3', 'Send Offer On Property', '2021-01-11 16:22:53'),
(221, 100021, 'O.ID:8 P.ID:2', 'Send Offer On Property', '2021-01-11 16:23:02'),
(222, 100021, '127.0.0.1', 'login', '2021-01-11 16:27:34'),
(223, 100021, '127.0.0.1', 'logout', '2021-01-11 16:28:12'),
(224, 100021, '127.0.0.1', 'login', '2021-01-11 16:28:26'),
(225, 100021, '127.0.0.1', 'logout', '2021-01-11 16:28:32'),
(226, 100022, '127.0.0.1', 'login', '2021-01-11 16:30:11'),
(227, 100022, '10', 'Post New Property', '2021-01-11 16:37:32'),
(228, 100021, '127.0.0.1', 'login', '2021-01-11 17:16:43'),
(229, 100021, '127.0.0.1', 'logout', '2021-01-11 17:24:44'),
(230, 100021, '127.0.0.1', 'login', '2021-01-11 20:16:44'),
(231, 100021, 'O.ID:9 P.ID:10', 'Send Offer On Property', '2021-01-11 20:20:39'),
(232, 100021, '127.0.0.1', 'login', '2021-01-12 08:01:18'),
(233, 100021, '127.0.0.1', 'logout', '2021-01-12 08:23:26'),
(234, 100021, '127.0.0.1', 'login', '2021-01-12 08:23:57'),
(235, 100021, '6', 'Update Post Property Status', '2021-01-12 10:56:38'),
(236, 100021, 'O.ID:10 P.ID:4', 'Send Offer On Property', '2021-01-12 11:10:52'),
(237, 100021, '127.0.0.1', 'logout', '2021-01-12 12:57:55'),
(238, 100021, '127.0.0.1', 'login', '2021-01-12 14:01:48'),
(239, 100021, '127.0.0.1', 'logout', '2021-01-12 14:34:22'),
(240, 100021, '127.0.0.1', 'login', '2021-01-12 14:34:31'),
(241, 100021, '11', 'Post New Property', '2021-01-12 14:35:11'),
(242, 100021, '127.0.0.1', 'logout', '2021-01-12 14:35:27'),
(243, 100027, '127.0.0.1', 'login', '2021-01-12 14:35:43'),
(244, 100027, 'O.ID:11 P.ID:11', 'Send Offer On Property', '2021-01-12 14:36:08'),
(245, 100027, 'O.ID:12 P.ID:11', 'Send Offer On Property', '2021-01-12 14:39:34'),
(246, 100027, '127.0.0.1', 'logout', '2021-01-12 17:16:14'),
(247, 100021, '127.0.0.1', 'login', '2021-01-12 17:17:15'),
(248, 100021, '12', 'Post New Property', '2021-01-12 17:26:43'),
(249, 100021, '127.0.0.1', 'logout', '2021-01-12 17:26:57'),
(250, 100027, '127.0.0.1', 'login', '2021-01-12 17:27:29'),
(251, 100027, 'O.ID:13 P.ID:12', 'Send Offer On Property', '2021-01-12 17:27:52'),
(252, 100027, '13', 'Post New Property', '2021-01-12 17:59:51'),
(253, 100021, '127.0.0.1', 'login', '2021-01-12 18:58:46'),
(254, 100021, '::1', 'login', '2021-01-12 19:54:59'),
(255, 100021, '127.0.0.1', 'login', '2021-01-12 20:02:45'),
(256, 100021, '12', 'Update inventorty details', '2021-01-12 20:50:10'),
(257, 100021, '11', 'Update inventorty details', '2021-01-12 20:51:47'),
(258, 100021, '11', 'Update inventorty details', '2021-01-12 20:52:13'),
(259, 100021, '11', 'Update inventorty details', '2021-01-12 20:53:35'),
(260, 100021, '127.0.0.1', 'logout', '2021-01-12 21:42:08'),
(261, 100021, '127.0.0.1', 'login', '2021-01-13 08:28:58'),
(262, 100021, '1', 'New wanted add.', '2021-01-13 10:04:34'),
(263, 100021, '2', 'New wanted add.', '2021-01-13 10:06:11'),
(264, 100021, '3', 'New wanted add.', '2021-01-13 10:52:22'),
(265, 100021, '3', 'Update Wanted Status', '2021-01-13 11:47:18'),
(266, 100021, '3', 'Update Wanted Status', '2021-01-13 11:47:29'),
(267, 100021, '3', 'Update Wanted Status', '2021-01-13 11:52:11'),
(268, 100021, '127.0.0.1', 'logout', '2021-01-13 12:17:48'),
(269, 100027, '127.0.0.1', 'login', '2021-01-13 12:18:11'),
(270, 100027, '4', 'New wanted add.', '2021-01-13 13:29:11'),
(271, 100027, '4', 'Update Wanted Status', '2021-01-13 13:29:39'),
(272, 100027, '4', 'Update Wanted Status', '2021-01-13 13:30:07'),
(273, 100027, '127.0.0.1', 'logout', '2021-01-13 13:31:13'),
(274, 100021, '127.0.0.1', 'login', '2021-01-13 13:31:18'),
(275, 100021, '127.0.0.1', 'logout', '2021-01-13 16:47:31'),
(276, 100027, '127.0.0.1', 'login', '2021-01-13 18:43:53'),
(277, 100027, '4', 'Update Wanted Status', '2021-01-13 18:45:17'),
(278, 100027, '4', 'Update Wanted Status', '2021-01-13 18:45:36'),
(279, 100027, '127.0.0.1', 'logout', '2021-01-13 18:57:53'),
(280, 100021, '127.0.0.1', 'login', '2021-01-13 18:58:00'),
(281, 100021, '127.0.0.1', 'logout', '2021-01-13 18:59:55'),
(282, 100021, '127.0.0.1', 'login', '2021-01-14 10:24:40'),
(283, 100021, '127.0.0.1', 'logout', '2021-01-14 11:38:39'),
(284, 100027, '::1', 'login', '2021-01-14 12:49:50'),
(285, 100029, '127.0.0.1', 'login', '2021-01-26 16:24:37'),
(286, 100029, '127.0.0.1', 'logout', '2021-01-26 16:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `type` enum('c.r.v','c.p.v','b.p.v','b.r.v','j.v','s.v','p.v') NOT NULL,
  `date` date NOT NULL,
  `cr_head_id` int(11) NOT NULL,
  `dr_head_id` int(11) NOT NULL,
  `note` varchar(125) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `extra_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `admin_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_transaction_id` int(11) DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `type`, `date`, `cr_head_id`, `dr_head_id`, `note`, `amount`, `extra_amount`, `admin_id`, `company_id`, `product_transaction_id`, `create_on`, `file_link`) VALUES
(19, 'p.v', '2021-02-01', 1, 11, 'Test Note on Purchase 1', '1200.00', '0.00', 1, 1, 53, '2021-02-08 22:52:40', NULL),
(20, 'p.v', '2021-02-09', 1, 11, 'Test Comment', '1080.00', '0.00', 1, 1, 54, '2021-02-08 22:53:56', NULL),
(21, 'p.v', '2021-02-11', 1, 11, 'Test', '14772.00', '0.00', 1, 1, 55, '2021-02-10 19:59:49', NULL),
(22, 's.v', '2021-02-03', 10, 1, 'Test Sale Note', '9555.00', '0.00', 1, 1, 56, '2021-02-10 20:32:43', NULL),
(23, 'p.v', '2021-02-11', 1, 11, 'Test Buy Entry', '12000.00', '0.00', 1, 1, 57, '2021-02-10 20:53:28', NULL),
(24, 's.v', '2021-02-11', 10, 1, 'Test Sale 1', '650.00', '0.00', 1, 1, 58, '2021-02-10 20:53:58', NULL),
(25, 's.v', '2021-02-11', 10, 1, 'Test Sale 2', '2600.00', '0.00', 1, 1, 59, '2021-02-10 20:54:28', NULL),
(26, 's.v', '2021-02-11', 10, 1, 'Test Sale 3', '700.00', '0.00', 1, 1, 60, '2021-02-10 20:56:07', NULL),
(27, 's.v', '2021-02-11', 10, 1, 'Test Sale final', '11700.00', '0.00', 1, 1, 61, '2021-02-10 20:56:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_head`
--
ALTER TABLE `account_head`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `company_list`
--
ALTER TABLE `company_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_price_update_logs`
--
ALTER TABLE `product_price_update_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transation`
--
ALTER TABLE `product_transation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transation_detail`
--
ALTER TABLE `product_transation_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_value` (`key_value`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `user_head_link`
--
ALTER TABLE `user_head_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`account_head_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_head`
--
ALTER TABLE `account_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100008;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `company_list`
--
ALTER TABLE `company_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_price_update_logs`
--
ALTER TABLE `product_price_update_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_transation`
--
ALTER TABLE `product_transation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product_transation_detail`
--
ALTER TABLE `product_transation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100031;

--
-- AUTO_INCREMENT for table `user_head_link`
--
ALTER TABLE `user_head_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
