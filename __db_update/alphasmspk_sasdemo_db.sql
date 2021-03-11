-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2021 at 05:16 PM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphasmspk_sasdemo_db`
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
  `opening_cr_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `opening_dr_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active 0=>deactive',
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_head`
--

INSERT INTO `account_head` (`id`, `company_id`, `company_name`, `owner_name`, `cell_1`, `cell_2`, `address`, `head_type`, `opening_cr_balance`, `opening_dr_balance`, `status`, `create_on`, `update_on`) VALUES
(1, 1, 'Z-F Cash', 'Z-F Owner', '', NULL, NULL, 1, 0.00, 0.00, 1, '2021-02-01 16:50:07', '2021-02-01 16:54:03'),
(2, 2, 'Z-A Cash', 'Z-A Owner', '', NULL, NULL, 1, 0.00, 0.00, 1, '2021-02-01 16:50:07', '2021-03-11 21:18:46'),
(10, 2, 'Ya Razzaq Trader', 'Allah Pak', '923017155110', '', 'ABC', 4, 0.00, 0.00, 1, '2021-02-09 15:04:55', '2021-03-11 21:18:39'),
(121, 1, 'Ya Razzaq Trader 2', 'Allah Pak', '923017155110', '', 'ABC', 4, 0.00, 0.00, 1, '2021-02-10 01:04:55', '2021-02-11 07:13:02'),
(144, 2, 'GROSS PROFIT', 'ZA', '000000000000', '', 'multan', 4, 0.00, 0.00, 1, '2021-03-08 12:03:58', '2021-03-11 21:16:33'),
(148, 1, 'GROSS PROFIT ZF', 'ZF', '000000000000', '', 'multan', 4, 138510.00, 138510.00, 1, '2021-03-08 12:03:58', '2021-03-11 15:46:23'),
(149, 2, 'Stock Account ZA', 'ZA OWNER', '000000000000', '', 'multan', 4, 0.00, 0.00, 1, '2021-03-08 12:03:58', '2021-03-11 21:16:24'),
(150, 1, 'Stock Account ZF', 'ZF OWNER', '000000000000', '', 'multan', 4, 138510.00, 138510.00, 1, '2021-03-08 12:03:58', '2021-03-11 15:46:23'),
(151, 2, 'Test Supplier Account', 'Supplier Account', '923062388261', '923062388261', 'Multan', 4, 0.00, 0.00, 1, '2021-03-11 21:19:40', '2021-03-11 21:19:40'),
(152, 2, 'Test Client Account', 'Client Account', '923062384261', '923062384261', 'Testttstst', 3, 0.00, 0.00, 1, '2021-03-11 21:20:21', '2021-03-11 21:20:21');

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
(1, 'Hussain', 'Awan', 'admin@gmail.com', '923017155110', 'Male', 0, 1, '', 'gwqqttc6un62w2y9nfpqjh1nyijfm25f9e794323b453885f5181f1b624d0bdymbQxSy6qg4P5ci45hir9qpx9yc', 'Active', '2020-08-07 00:02:08', '2021-02-07 23:01:30', 0, 0);

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
(316, 1, '111.119.187.32', 'login', '2021-02-07 22:59:09'),
(317, 1, '1', 'Update Admin Profile', '2021-02-07 23:01:30'),
(318, 1, '111.119.187.32', 'logout', '2021-02-07 23:10:08'),
(319, 1, '111.119.187.32', 'login', '2021-02-07 23:11:28'),
(320, 1, '111.119.187.32', 'logout', '2021-02-07 23:15:10'),
(321, 1, '119.73.112.245', 'login', '2021-02-09 14:52:02'),
(322, 1, '10', 'New head created', '2021-02-09 15:04:55'),
(323, 1, '11', 'New head created', '2021-02-09 15:06:32'),
(324, 1, '12', 'New head created', '2021-02-09 15:14:01'),
(325, 1, '119.73.112.245', 'logout', '2021-02-09 15:18:41'),
(326, 1, '119.73.112.245', 'login', '2021-02-09 15:19:04'),
(327, 1, '119.73.112.245', 'logout', '2021-02-09 15:21:39'),
(328, 1, '119.73.112.245', 'login', '2021-02-09 15:23:34'),
(329, 1, '119.73.112.245', 'login', '2021-02-09 15:24:42'),
(330, 1, '119.73.112.245', 'login', '2021-02-09 15:27:33'),
(331, 1, '13', 'New head created', '2021-02-09 15:30:58'),
(332, 1, '14', 'New head created', '2021-02-09 15:32:54'),
(333, 1, '15', 'New head created', '2021-02-09 15:34:12'),
(334, 1, '119.73.112.245', 'login', '2021-02-09 15:38:42'),
(335, 1, '111.119.187.57', 'login', '2021-02-09 15:46:56'),
(336, 1, '119.73.112.245', 'login', '2021-02-09 15:57:57'),
(337, 1, '119.73.122.238', 'login', '2021-02-10 07:41:04'),
(338, 1, '119.73.122.192', 'login', '2021-02-10 14:03:31'),
(339, 1, '16', 'New head created', '2021-02-10 14:06:13'),
(340, 1, '17', 'New head created', '2021-02-10 14:10:06'),
(341, 1, '119.73.122.192', 'login', '2021-02-10 15:11:54'),
(342, 1, '18', 'New head created', '2021-02-10 15:14:11'),
(343, 1, '19', 'New head created', '2021-02-10 15:18:32'),
(344, 1, '20', 'New head created', '2021-02-10 15:21:18'),
(345, 1, '21', 'New head created', '2021-02-10 15:23:20'),
(346, 1, '22', 'New head created', '2021-02-10 15:26:27'),
(347, 1, '23', 'New head created', '2021-02-10 15:28:22'),
(348, 1, '24', 'New head created', '2021-02-10 15:31:12'),
(349, 1, '25', 'New head created', '2021-02-10 15:34:02'),
(350, 1, '26', 'New head created', '2021-02-10 15:39:17'),
(351, 1, '27', 'New head created', '2021-02-10 15:43:12'),
(352, 1, '28', 'New head created', '2021-02-10 15:46:03'),
(353, 1, '29', 'New head created', '2021-02-10 15:48:52'),
(354, 1, '30', 'New head created', '2021-02-10 15:51:02'),
(355, 1, '31', 'New head created', '2021-02-10 15:54:02'),
(356, 1, '32', 'New head created', '2021-02-10 15:56:23'),
(357, 1, '33', 'New head created', '2021-02-10 16:07:36'),
(358, 1, '34', 'New head created', '2021-02-10 16:10:20'),
(359, 1, '35', 'New head created', '2021-02-10 16:12:35'),
(360, 1, '36', 'New head created', '2021-02-10 16:14:20'),
(361, 1, '37', 'New head created', '2021-02-10 16:17:15'),
(362, 1, '38', 'New head created', '2021-02-10 16:20:01'),
(363, 1, '111.119.187.21', 'login', '2021-02-10 21:18:23'),
(364, 1, '111.119.187.21', 'logout', '2021-02-10 21:20:22'),
(365, 1, '119.73.112.59', 'login', '2021-02-11 13:01:54'),
(366, 1, '39', 'New head created', '2021-02-11 13:05:53'),
(367, 1, '40', 'New head created', '2021-02-11 13:09:12'),
(368, 1, '41', 'New head created', '2021-02-11 13:11:19'),
(369, 1, '42', 'New head created', '2021-02-11 13:13:50'),
(370, 1, '43', 'New head created', '2021-02-11 13:22:55'),
(371, 1, '44', 'New head created', '2021-02-11 13:34:29'),
(372, 1, '45', 'New head created', '2021-02-11 13:37:57'),
(373, 1, '46', 'New head created', '2021-02-11 13:43:25'),
(374, 1, '47', 'New head created', '2021-02-11 13:46:10'),
(375, 1, '48', 'New head created', '2021-02-11 13:49:33'),
(376, 1, '49', 'New head created', '2021-02-11 13:51:33'),
(377, 1, '50', 'New head created', '2021-02-11 13:53:13'),
(378, 1, '51', 'New head created', '2021-02-11 13:54:53'),
(379, 1, '52', 'New head created', '2021-02-11 13:56:38'),
(380, 1, '53', 'New head created', '2021-02-11 13:58:58'),
(381, 1, '119.73.112.59', 'logout', '2021-02-11 13:59:51'),
(382, 1, '119.73.112.59', 'login', '2021-02-11 14:00:03'),
(383, 1, '37.111.130.126', 'login', '2021-02-12 13:04:20'),
(384, 1, '37.111.130.126', 'login', '2021-02-12 13:11:15'),
(385, 1, '37.111.136.31', 'login', '2021-02-13 09:07:26'),
(386, 1, '37.111.136.31', 'login', '2021-02-13 09:07:27'),
(387, 1, '119.73.112.135', 'login', '2021-02-13 14:17:07'),
(388, 1, '54', 'New head created', '2021-02-13 14:18:31'),
(389, 1, '55', 'New head created', '2021-02-13 14:22:35'),
(390, 1, '56', 'New head created', '2021-02-13 14:27:18'),
(391, 1, '57', 'New head created', '2021-02-13 14:44:20'),
(392, 1, '58', 'New head created', '2021-02-13 14:46:24'),
(393, 1, '60', 'New head created', '2021-02-13 14:57:24'),
(394, 1, '61', 'New head created', '2021-02-13 15:00:12'),
(395, 1, '62', 'New head created', '2021-02-13 15:03:06'),
(396, 1, '63', 'New head created', '2021-02-13 15:07:52'),
(397, 1, '64', 'New head created', '2021-02-13 15:11:33'),
(398, 1, '65', 'New head created', '2021-02-13 15:14:16'),
(399, 1, '66', 'New head created', '2021-02-13 15:15:53'),
(400, 1, '67', 'New head created', '2021-02-13 15:17:31'),
(401, 1, '68', 'New head created', '2021-02-13 15:19:59'),
(402, 1, '69', 'New head created', '2021-02-13 15:21:40'),
(403, 1, '70', 'New head created', '2021-02-13 15:23:45'),
(404, 1, '71', 'New head created', '2021-02-13 15:25:42'),
(405, 1, '72', 'New head created', '2021-02-13 15:28:03'),
(406, 1, '73', 'New head created', '2021-02-13 15:30:42'),
(407, 1, '74', 'New head created', '2021-02-13 15:33:15'),
(408, 1, '75', 'New head created', '2021-02-13 15:34:33'),
(409, 1, '76', 'New head created', '2021-02-13 15:36:53'),
(410, 1, '77', 'New head created', '2021-02-13 15:39:07'),
(411, 1, '78', 'New head created', '2021-02-13 15:40:54'),
(412, 1, '79', 'New head created', '2021-02-13 15:42:45'),
(413, 1, '80', 'New head created', '2021-02-13 15:48:30'),
(414, 1, '119.73.112.135', 'logout', '2021-02-13 16:01:13'),
(415, 1, '119.73.112.135', 'login', '2021-02-13 16:01:38'),
(416, 1, '81', 'New head created', '2021-02-13 16:07:34'),
(417, 1, '82', 'New head created', '2021-02-13 16:09:27'),
(418, 1, '83', 'New head created', '2021-02-13 16:28:24'),
(419, 1, '84', 'New head created', '2021-02-13 16:30:00'),
(420, 1, '85', 'New head created', '2021-02-13 16:32:18'),
(421, 1, '86', 'New head created', '2021-02-13 16:33:42'),
(422, 1, '87', 'New head created', '2021-02-13 16:35:16'),
(423, 1, '88', 'New head created', '2021-02-13 16:37:37'),
(424, 1, '89', 'New head created', '2021-02-13 16:45:34'),
(425, 1, '90', 'New head created', '2021-02-13 16:47:15'),
(426, 1, '91', 'New head created', '2021-02-13 16:49:01'),
(427, 1, '92', 'New head created', '2021-02-13 16:50:32'),
(428, 1, '93', 'New head created', '2021-02-13 16:51:55'),
(429, 1, '94', 'New head created', '2021-02-13 16:53:16'),
(430, 1, '95', 'New head created', '2021-02-13 16:56:20'),
(431, 1, '96', 'New head created', '2021-02-13 16:57:58'),
(432, 1, '97', 'New head created', '2021-02-13 16:59:05'),
(433, 1, '98', 'New head created', '2021-02-13 17:01:04'),
(434, 1, '99', 'New head created', '2021-02-13 17:02:22'),
(435, 1, '100', 'New head created', '2021-02-13 17:04:00'),
(436, 1, '101', 'New head created', '2021-02-13 17:05:57'),
(437, 1, '102', 'New head created', '2021-02-13 17:07:14'),
(438, 1, '103', 'New head created', '2021-02-13 17:08:20'),
(439, 1, '104', 'New head created', '2021-02-13 17:10:17'),
(440, 1, '105', 'New head created', '2021-02-13 17:11:43'),
(441, 1, '106', 'New head created', '2021-02-13 17:13:30'),
(442, 1, '108', 'New head created', '2021-02-13 17:16:20'),
(443, 1, '109', 'New head created', '2021-02-13 17:18:13'),
(444, 1, '110', 'New head created', '2021-02-13 17:19:47'),
(445, 1, '111', 'New head created', '2021-02-13 17:21:09'),
(446, 1, '112', 'New head created', '2021-02-13 17:22:08'),
(447, 1, '113', 'New head created', '2021-02-13 17:23:23'),
(448, 1, '114', 'New head created', '2021-02-13 17:24:21'),
(449, 1, '115', 'New head created', '2021-02-13 17:26:20'),
(450, 1, '116', 'New head created', '2021-02-13 17:27:28'),
(451, 1, '117', 'New head created', '2021-02-13 17:28:41'),
(452, 1, '118', 'New head created', '2021-02-13 17:30:05'),
(453, 1, '119', 'New head created', '2021-02-13 17:31:08'),
(454, 1, '120', 'New head created', '2021-02-13 17:32:26'),
(455, 1, '119.63.138.209', 'login', '2021-02-16 07:04:01'),
(456, 1, '119.63.138.209', 'login', '2021-02-16 11:04:15'),
(457, 1, '103.7.77.66', 'login', '2021-02-16 15:25:53'),
(458, 1, '119.63.138.71', 'login', '2021-02-17 07:38:33'),
(459, 1, '119.63.138.222', 'login', '2021-02-17 12:30:56'),
(460, 1, '119.73.112.35', 'login', '2021-02-21 09:39:22'),
(461, 1, '119.73.112.35', 'logout', '2021-02-21 09:40:40'),
(462, 1, '119.73.112.35', 'login', '2021-02-21 09:40:47'),
(463, 1, '119.73.112.140', 'login', '2021-02-22 14:35:03'),
(464, 1, '119.73.112.140', 'login', '2021-02-22 15:43:42'),
(465, 1, '111.119.187.1', 'login', '2021-02-23 22:32:27'),
(466, 1, '111.119.187.1', 'logout', '2021-02-23 22:33:15'),
(467, 1, '119.63.138.122', 'login', '2021-02-24 06:09:27'),
(468, 1, '98', 'Update Head Opening Balance', '2021-02-24 06:13:27'),
(469, 1, '11', 'Update Head Opening Balance', '2021-02-24 06:23:54'),
(470, 1, '16', 'New Product Added', '2021-02-24 06:43:09'),
(471, 1, '53', 'New Sale created', '2021-02-24 06:46:28'),
(472, 1, '54', 'New Sale created', '2021-02-24 06:51:59'),
(473, 1, '51', 'Update Head Opening Balance', '2021-02-24 06:58:04'),
(474, 1, '119.73.112.213', 'login', '2021-02-24 14:02:07'),
(475, 1, '98', 'Update Head Opening Balance', '2021-02-24 14:09:19'),
(476, 1, '119.73.112.181', 'login', '2021-02-25 13:58:11'),
(477, 1, '119.73.112.181', 'login', '2021-02-25 14:05:17'),
(478, 1, '119.73.112.181', 'logout', '2021-02-25 14:07:15'),
(479, 1, '119.73.112.181', 'login', '2021-02-25 14:07:43'),
(480, 1, '119.73.122.138', 'login', '2021-02-27 12:35:21'),
(481, 1, '119.63.138.192', 'login', '2021-02-28 22:11:01'),
(482, 1, '98', 'Update Head Opening Balance', '2021-02-28 22:11:54'),
(483, 1, '51', 'Update Head Opening Balance', '2021-02-28 22:12:06'),
(484, 1, '11', 'Update Head Opening Balance', '2021-02-28 22:12:17'),
(485, 1, '119.73.112.181', 'login', '2021-03-01 06:43:53'),
(486, 1, '119.73.112.181', 'login', '2021-03-01 06:56:15'),
(487, 1, '119.73.112.181', 'login', '2021-03-01 07:07:13'),
(488, 1, '111.119.187.41', 'login', '2021-03-01 08:06:44'),
(489, 1, '111.119.187.41', 'logout', '2021-03-01 08:07:00'),
(490, 1, '119.63.138.47', 'login', '2021-03-02 06:07:05'),
(491, 1, '119.73.122.228', 'login', '2021-03-04 06:11:10'),
(492, 1, '119.73.122.228', 'login', '2021-03-04 06:13:26'),
(493, 1, '119.73.112.66', 'login', '2021-03-04 13:49:11'),
(494, 1, '10', 'Update Head Opening Balance', '2021-03-04 14:03:55'),
(495, 1, '122', 'New head created', '2021-03-04 14:05:47'),
(496, 1, '122', 'Update Head Opening Balance', '2021-03-04 14:06:51'),
(497, 1, '123', 'New head created', '2021-03-04 14:10:28'),
(498, 1, '123', 'Update Head Opening Balance', '2021-03-04 14:11:05'),
(499, 1, '124', 'New head created', '2021-03-04 14:13:00'),
(500, 1, '124', 'Update Head Opening Balance', '2021-03-04 14:13:39'),
(501, 1, '11', 'Update Head Opening Balance', '2021-03-04 14:14:19'),
(502, 1, '14', 'Update Head Opening Balance', '2021-03-04 14:14:43'),
(503, 1, '38', 'Update Head Opening Balance', '2021-03-04 14:16:28'),
(504, 1, '40', 'Update Head Opening Balance', '2021-03-04 14:16:53'),
(505, 1, '43', 'Update Head Opening Balance', '2021-03-04 14:17:21'),
(506, 1, '45', 'Update Head Opening Balance', '2021-03-04 14:18:02'),
(507, 1, '48', 'Update Head Opening Balance', '2021-03-04 14:20:50'),
(508, 1, '49', 'Update Head Opening Balance', '2021-03-04 14:21:09'),
(509, 1, '125', 'New head created', '2021-03-04 14:27:37'),
(510, 1, '125', 'Update Head Opening Balance', '2021-03-04 14:27:57'),
(511, 1, '50', 'Update Head Opening Balance', '2021-03-04 14:30:23'),
(512, 1, '119.63.138.53', 'login', '2021-03-06 10:23:53'),
(513, 1, '119.63.138.53', 'login', '2021-03-06 10:26:07'),
(514, 1, '119.73.112.233', 'login', '2021-03-08 07:36:48'),
(515, 1, '27', 'Update Head Opening Balance', '2021-03-08 08:00:57'),
(516, 1, '31', 'Update Head Opening Balance', '2021-03-08 08:02:13'),
(517, 1, '41', 'Update Head Opening Balance', '2021-03-08 08:02:43'),
(518, 1, '34', 'Update Head Opening Balance', '2021-03-08 08:03:07'),
(519, 1, '23', 'Update Head Opening Balance', '2021-03-08 08:03:27'),
(520, 1, '18', 'Update Head Opening Balance', '2021-03-08 08:03:45'),
(521, 1, '30', 'Update Head Opening Balance', '2021-03-08 08:04:11'),
(522, 1, '21', 'Update Head Opening Balance', '2021-03-08 08:04:36'),
(523, 1, '16', 'Update Head Opening Balance', '2021-03-08 08:04:56'),
(524, 1, '51', 'Update Head Opening Balance', '2021-03-08 08:08:41'),
(525, 1, '32', 'Update Head Opening Balance', '2021-03-08 08:10:08'),
(526, 1, '52', 'Update Head Opening Balance', '2021-03-08 08:10:50'),
(527, 1, '53', 'Update Head Opening Balance', '2021-03-08 08:11:30'),
(528, 1, '120', 'Update Head Opening Balance', '2021-03-08 08:12:03'),
(529, 1, '119', 'Update Head Opening Balance', '2021-03-08 08:12:24'),
(530, 1, '118', 'Update Head Opening Balance', '2021-03-08 08:12:50'),
(531, 1, '117', 'Update Head Opening Balance', '2021-03-08 08:13:10'),
(532, 1, '116', 'Update Head Opening Balance', '2021-03-08 08:13:31'),
(533, 1, '115', 'Update Head Opening Balance', '2021-03-08 08:13:54'),
(534, 1, '42', 'Update Head Opening Balance', '2021-03-08 08:14:23'),
(535, 1, '44', 'Update Head Opening Balance', '2021-03-08 08:14:47'),
(536, 1, '13', 'Update Head Opening Balance', '2021-03-08 08:15:10'),
(537, 1, '114', 'Update Head Opening Balance', '2021-03-08 08:15:37'),
(538, 1, '113', 'Update Head Opening Balance', '2021-03-08 08:16:53'),
(539, 1, '112', 'Update Head Opening Balance', '2021-03-08 08:25:17'),
(540, 1, '111', 'Update Head Opening Balance', '2021-03-08 08:25:54'),
(541, 1, '110', 'Update Head Opening Balance', '2021-03-08 08:26:19'),
(542, 1, '109', 'Update Head Opening Balance', '2021-03-08 08:26:46'),
(543, 1, '22', 'Update Head Opening Balance', '2021-03-08 08:29:15'),
(544, 1, '108', 'Update Head Opening Balance', '2021-03-08 08:29:47'),
(545, 1, '106', 'Update Head Opening Balance', '2021-03-08 08:30:13'),
(546, 1, '105', 'Update Head Opening Balance', '2021-03-08 08:30:38'),
(547, 1, '103', 'Update Head Opening Balance', '2021-03-08 08:31:28'),
(548, 1, '102', 'Update Head Opening Balance', '2021-03-08 08:32:03'),
(549, 1, '101', 'Update Head Opening Balance', '2021-03-08 08:32:38'),
(550, 1, '100', 'Update Head Opening Balance', '2021-03-08 08:32:58'),
(551, 1, '99', 'Update Head Opening Balance', '2021-03-08 08:33:27'),
(552, 1, '98', 'Update Head Opening Balance', '2021-03-08 08:33:57'),
(553, 1, '95', 'Update Head Opening Balance', '2021-03-08 08:34:24'),
(554, 1, '94', 'Update Head Opening Balance', '2021-03-08 08:35:07'),
(555, 1, '93', 'Update Head Opening Balance', '2021-03-08 08:36:12'),
(556, 1, '97', 'Update Head Opening Balance', '2021-03-08 08:36:35'),
(557, 1, '96', 'Update Head Opening Balance', '2021-03-08 08:37:11'),
(558, 1, '92', 'Update Head Opening Balance', '2021-03-08 08:37:34'),
(559, 1, '78', 'Update Head Opening Balance', '2021-03-08 08:38:53'),
(560, 1, '90', 'Update Head Opening Balance', '2021-03-08 08:39:18'),
(561, 1, '89', 'Update Head Opening Balance', '2021-03-08 08:39:36'),
(562, 1, '88', 'Update Head Opening Balance', '2021-03-08 08:39:57'),
(563, 1, '87', 'Update Head Opening Balance', '2021-03-08 08:40:18'),
(564, 1, '86', 'Update Head Opening Balance', '2021-03-08 08:40:39'),
(565, 1, '85', 'Update Head Opening Balance', '2021-03-08 08:43:12'),
(566, 1, '35', 'Update Head Opening Balance', '2021-03-08 08:43:56'),
(567, 1, '84', 'Update Head Opening Balance', '2021-03-08 08:44:23'),
(568, 1, '83', 'Update Head Opening Balance', '2021-03-08 08:44:50'),
(569, 1, '119.73.112.233', 'login', '2021-03-08 08:45:00'),
(570, 1, '36', 'Update Head Opening Balance', '2021-03-08 08:46:07'),
(571, 1, '82', 'Update Head Opening Balance', '2021-03-08 08:46:34'),
(572, 1, '81', 'Update Head Opening Balance', '2021-03-08 08:49:09'),
(573, 1, '25', 'Update Head Opening Balance', '2021-03-08 08:49:32'),
(574, 1, '37', 'Update Head Opening Balance', '2021-03-08 08:50:04'),
(575, 1, '17', 'Update Head Opening Balance', '2021-03-08 08:50:39'),
(576, 1, '80', 'Update Head Opening Balance', '2021-03-08 08:52:23'),
(577, 1, '33', 'Update Head Opening Balance', '2021-03-08 08:54:40'),
(578, 1, '29', 'Update Head Opening Balance', '2021-03-08 08:57:20'),
(579, 1, '79', 'Update Head Opening Balance', '2021-03-08 08:58:07'),
(580, 1, '91', 'Update Head Opening Balance', '2021-03-08 08:58:33'),
(581, 1, '77', 'Update Head Opening Balance', '2021-03-08 08:59:54'),
(582, 1, '76', 'Update Head Opening Balance', '2021-03-08 09:00:16'),
(583, 1, '46', 'Update Head Opening Balance', '2021-03-08 09:00:36'),
(584, 1, '24', 'Update Head Opening Balance', '2021-03-08 09:01:07'),
(585, 1, '39', 'Update Head Opening Balance', '2021-03-08 09:01:25'),
(586, 1, '75', 'Update Head Opening Balance', '2021-03-08 09:01:52'),
(587, 1, '74', 'Update Head Opening Balance', '2021-03-08 09:02:30'),
(588, 1, '26', 'Update Head Opening Balance', '2021-03-08 09:02:50'),
(589, 1, '47', 'Update Head Opening Balance', '2021-03-08 09:03:29'),
(590, 1, '73', 'Update Head Opening Balance', '2021-03-08 09:03:48'),
(591, 1, '28', 'Update Head Opening Balance', '2021-03-08 09:04:13'),
(592, 1, '20', 'Update Head Opening Balance', '2021-03-08 09:04:32'),
(593, 1, '72', 'Update Head Opening Balance', '2021-03-08 09:05:03'),
(594, 1, '12', 'Update Head Opening Balance', '2021-03-08 09:05:38'),
(595, 1, '71', 'Update Head Opening Balance', '2021-03-08 09:06:06'),
(596, 1, '70', 'Update Head Opening Balance', '2021-03-08 09:06:44'),
(597, 1, '68', 'Update Head Opening Balance', '2021-03-08 09:07:13'),
(598, 1, '67', 'Update Head Opening Balance', '2021-03-08 09:07:34'),
(599, 1, '65', 'Update Head Opening Balance', '2021-03-08 09:08:07'),
(600, 1, '64', 'Update Head Opening Balance', '2021-03-08 09:08:45'),
(601, 1, '63', 'Update Head Opening Balance', '2021-03-08 09:09:04'),
(602, 1, '62', 'Update Head Opening Balance', '2021-03-08 09:09:29'),
(603, 1, '61', 'Update Head Opening Balance', '2021-03-08 09:09:53'),
(604, 1, '60', 'Update Head Opening Balance', '2021-03-08 09:10:35'),
(605, 1, '19', 'Update Head Opening Balance', '2021-03-08 09:11:31'),
(606, 1, '58', 'Update Head Opening Balance', '2021-03-08 09:12:09'),
(607, 1, '57', 'Update Head Opening Balance', '2021-03-08 09:12:35'),
(608, 1, '126', 'New head created', '2021-03-08 09:16:20'),
(609, 1, '126', 'Update Head Opening Balance', '2021-03-08 09:18:48'),
(610, 1, '127', 'New head created', '2021-03-08 09:20:05'),
(611, 1, '127', 'Update Head Opening Balance', '2021-03-08 09:20:32'),
(612, 1, '56', 'Update Head Opening Balance', '2021-03-08 09:21:12'),
(613, 1, '55', 'Update Head Opening Balance', '2021-03-08 09:21:44'),
(614, 1, '54', 'Update Head Opening Balance', '2021-03-08 09:22:03'),
(615, 1, '128', 'New head created', '2021-03-08 09:24:23'),
(616, 1, '128', 'Update Head Opening Balance', '2021-03-08 09:24:51'),
(617, 1, '129', 'New head created', '2021-03-08 09:26:10'),
(618, 1, '129', 'Update Head Opening Balance', '2021-03-08 09:26:44'),
(619, 1, '130', 'New head created', '2021-03-08 09:28:20'),
(620, 1, '130', 'Update Head Opening Balance', '2021-03-08 09:30:14'),
(621, 1, '111.119.187.27', 'login', '2021-03-08 11:22:07'),
(622, 1, '119.73.112.233', 'login', '2021-03-08 11:30:54'),
(623, 1, '136', 'New head created', '2021-03-08 11:46:43'),
(624, 1, '136', 'Update Head Opening Balance', '2021-03-08 11:47:22'),
(625, 1, '137', 'New head created', '2021-03-08 11:48:51'),
(626, 1, '137', 'Update Head Opening Balance', '2021-03-08 11:49:21'),
(627, 1, '138', 'New head created', '2021-03-08 11:51:18'),
(628, 1, '139', 'New head created', '2021-03-08 11:52:09'),
(629, 1, '140', 'New head created', '2021-03-08 11:53:23'),
(630, 1, '141', 'New head created', '2021-03-08 11:54:09'),
(631, 1, '142', 'New head created', '2021-03-08 11:55:43'),
(632, 1, '143', 'New head created', '2021-03-08 11:56:48'),
(633, 1, '138', 'Update Head Opening Balance', '2021-03-08 11:59:57'),
(634, 1, '139', 'Update Head Opening Balance', '2021-03-08 12:00:18'),
(635, 1, '140', 'Update Head Opening Balance', '2021-03-08 12:00:49'),
(636, 1, '141', 'Update Head Opening Balance', '2021-03-08 12:01:11'),
(637, 1, '142', 'Update Head Opening Balance', '2021-03-08 12:01:31'),
(638, 1, '143', 'Update Head Opening Balance', '2021-03-08 12:01:51'),
(639, 1, '2', 'Update Head Opening Balance', '2021-03-08 12:02:22'),
(640, 1, '144', 'New head created', '2021-03-08 12:03:58'),
(641, 1, '144', 'Update Head Opening Balance', '2021-03-08 12:04:23'),
(642, 1, '145', 'New head created', '2021-03-08 12:05:34'),
(643, 1, '146', 'New head created', '2021-03-08 12:06:11'),
(644, 1, '145', 'Update Head Opening Balance', '2021-03-08 12:06:34'),
(645, 1, '119.73.112.233', 'logout', '2021-03-08 12:09:50'),
(646, 1, '119.73.112.233', 'login', '2021-03-08 12:10:00'),
(647, 1, '119.63.138.251', 'login', '2021-03-08 12:27:08'),
(648, 1, '137', 'Update Head Opening Balance', '2021-03-08 12:33:02'),
(649, 1, '139', 'Update Head Opening Balance', '2021-03-08 12:35:39'),
(650, 1, '138', 'Update Head Opening Balance', '2021-03-08 12:36:37'),
(651, 1, '128', 'Update Head Opening Balance', '2021-03-08 12:38:22'),
(652, 1, '144', 'Update Head Opening Balance', '2021-03-08 12:39:22'),
(653, 1, '145', 'Update Head Opening Balance', '2021-03-08 12:40:08'),
(654, 1, '119.63.138.251', 'login', '2021-03-08 12:49:07'),
(655, 1, '119.63.138.251', 'login', '2021-03-08 13:01:52'),
(656, 1, '55', 'New Sale created', '2021-03-08 13:03:55'),
(657, 1, '56', 'New Sale created', '2021-03-08 13:05:18'),
(658, 1, '57', 'New Sale created', '2021-03-08 13:06:41'),
(659, 1, '58', 'New Sale created', '2021-03-08 13:07:40'),
(660, 1, '59', 'New Sale created', '2021-03-08 13:09:08'),
(661, 1, '60', 'New Sale created', '2021-03-08 13:10:28'),
(662, 1, '61', 'New Sale created', '2021-03-08 13:11:14'),
(663, 1, '62', 'New Sale created', '2021-03-08 13:12:12'),
(664, 1, '63', 'New Sale created', '2021-03-08 13:12:55'),
(665, 1, '64', 'New Sale created', '2021-03-08 13:15:18'),
(666, 1, '65', 'New Sale created', '2021-03-08 13:16:11'),
(667, 1, '66', 'New Sale created', '2021-03-08 13:17:02'),
(668, 1, '67', 'New Sale created', '2021-03-08 13:17:40'),
(669, 1, '68', 'New Sale created', '2021-03-08 13:18:23'),
(670, 1, '69', 'New Sale created', '2021-03-08 13:19:23'),
(671, 1, '70', 'New Sale created', '2021-03-08 13:20:04'),
(672, 1, '71', 'New Sale created', '2021-03-08 13:20:57'),
(673, 1, '72', 'New Sale created', '2021-03-08 13:21:42'),
(674, 1, '73', 'New Sale created', '2021-03-08 13:45:01'),
(675, 1, '74', 'New Sale created', '2021-03-08 13:46:16'),
(676, 1, '75', 'New Sale created', '2021-03-08 13:47:00'),
(677, 1, '76', 'New Sale created', '2021-03-08 14:08:03'),
(678, 1, '77', 'New Sale created', '2021-03-08 14:09:17'),
(679, 1, '78', 'New Sale created', '2021-03-08 14:10:47'),
(680, 1, '79', 'New Sale created', '2021-03-08 14:11:32'),
(681, 1, '80', 'New Sale created', '2021-03-08 14:12:14'),
(682, 1, '81', 'New Sale created', '2021-03-08 14:12:51'),
(683, 1, '82', 'New Sale created', '2021-03-08 14:13:43'),
(684, 1, '83', 'New Sale created', '2021-03-08 14:14:33'),
(685, 1, '84', 'New Sale created', '2021-03-08 14:18:54'),
(686, 1, '77', 'New J.V voucher created', '2021-03-08 14:27:18'),
(687, 1, '78', 'New J.V voucher created', '2021-03-08 14:29:44'),
(688, 1, '79', 'New J.V voucher created', '2021-03-08 14:41:01'),
(689, 1, '80', 'New J.V voucher created', '2021-03-08 14:42:45'),
(690, 1, '81', 'New J.V voucher created', '2021-03-08 14:44:24'),
(691, 1, '82', 'New J.V voucher created', '2021-03-08 14:45:34'),
(692, 1, '83', 'New J.V voucher created', '2021-03-08 14:46:46'),
(693, 1, '84', 'New C.R.V voucher created', '2021-03-08 14:49:52'),
(694, 1, '119.63.138.251', 'logout', '2021-03-08 15:18:04'),
(695, 1, '111.119.187.2', 'login', '2021-03-08 15:29:11'),
(696, 1, '119.63.138.251', 'login', '2021-03-08 16:06:07'),
(697, 1, '119.63.138.251', 'logout', '2021-03-08 16:14:26'),
(698, 1, '119.63.138.251', 'login', '2021-03-08 16:55:45'),
(699, 1, '119.63.138.251', 'logout', '2021-03-08 17:00:47'),
(700, 1, '119.63.138.35', 'login', '2021-03-09 07:07:37'),
(701, 1, '119.63.138.127', 'login', '2021-03-11 06:40:27'),
(702, 1, '119.63.138.127', 'login', '2021-03-11 06:45:58'),
(703, 1, '119.63.138.127', 'logout', '2021-03-11 06:48:00'),
(704, 1, '119.63.138.127', 'login', '2021-03-11 06:48:03'),
(705, 1, '119.73.122.247', 'login', '2021-03-11 14:42:55'),
(706, 1, '111.119.187.20', 'login', '2021-03-11 21:15:43'),
(707, 1, '149', 'Update Head Opening Balance', '2021-03-11 21:16:24'),
(708, 1, '144', 'Update Head Opening Balance', '2021-03-11 21:16:33'),
(709, 1, '10', 'Update Head Opening Balance', '2021-03-11 21:18:39'),
(710, 1, '2', 'Update Head Opening Balance', '2021-03-11 21:18:46'),
(711, 1, '151', 'New head created', '2021-03-11 21:19:40'),
(712, 1, '152', 'New head created', '2021-03-11 21:20:21'),
(713, 1, '85', 'New Sale created', '2021-03-11 21:21:15'),
(714, 1, '86', 'New Sale created', '2021-03-11 21:27:11'),
(715, 1, '87', 'New Sale created', '2021-03-11 21:29:19'),
(716, 1, '92', 'New C.R.V voucher created', '2021-03-11 21:50:43'),
(717, 1, '93', 'New C.R.V voucher created', '2021-03-11 21:54:10'),
(718, 1, '94', 'New C.P.V voucher created', '2021-03-11 22:03:29'),
(719, 1, '111.119.187.20', 'login', '2021-03-11 22:10:26'),
(720, 1, '111.119.187.20', 'logout', '2021-03-11 22:13:29');

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
(15, 2, 'New Maple Tile Bound', 220.00, 260.00, 'placeholderproduct.png', '', 1),
(16, 2, 'New Maple Tile Bound(TL)', 170.00, 210.00, 'placeholderproduct.png', 'TOKEN LESS', 1);

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
(85, 'PURCHASE-', '2021-03-12', 2, 151, 2, 'Test Purchase Note', 52000.00, 44000.00, 1, '2021-03-11 21:21:15', '2021-03-11 21:21:15'),
(86, 'SALE-', '2021-03-12', 1, 152, 2, 'Test Sale', 26000.00, 22000.00, 1, '2021-03-11 21:27:11', '2021-03-11 21:27:11'),
(87, 'SALE-', '2021-03-12', 1, 152, 2, 'Test Sale', 26000.00, 22000.00, 1, '2021-03-11 21:29:19', '2021-03-11 21:29:19');

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
(114, 2, 85, '2021-03-12', 2, 15, 200, 220.00, 220.00),
(115, 2, 86, '2021-03-12', 1, 15, 100, 260.00, 220.00),
(116, 2, 87, '2021-03-12', 1, 15, 100, 260.00, 220.00);

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
(60, 'APP_PURCHASE_INV_PREFIX', 'PURCHASE-', NULL),
(61, 'APP_YA_RAZZAQ_PERCENT', '10', NULL);

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
  `type` enum('c.r.v','c.p.v','b.p.v','b.r.v','j.v','s.v','p.v','y.r.v','g.p.v') NOT NULL COMMENT 'y.r.v=> ya Razzaq voucher',
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
(85, 'p.v', '2021-03-12', 151, 149, 'Test Purchase Note', 44000.00, 0.00, 1, 2, 85, '2021-03-11 21:21:15', NULL),
(86, 's.v', '2021-03-12', 149, 152, 'Test Sale', 26000.00, 0.00, 1, 2, 86, '2021-03-11 21:27:11', NULL),
(87, 'y.r.v', '2021-03-12', 10, 152, 'Test Sale [YR-10%]', 400.00, 0.00, 1, 2, 86, '2021-03-11 21:27:11', NULL),
(88, 'g.p.v', '2021-03-12', 144, 152, 'Test Sale [GP]', 3600.00, 0.00, 1, 2, 86, '2021-03-11 21:27:11', NULL),
(89, 's.v', '2021-03-12', 149, 152, 'Test Sale', 26000.00, 0.00, 1, 2, 87, '2021-03-11 21:29:19', NULL),
(90, 'y.r.v', '2021-03-12', 10, 152, 'Test Sale [YR-10%]', 400.00, 0.00, 1, 2, 87, '2021-03-11 21:29:19', NULL),
(91, 'g.p.v', '2021-03-12', 144, 152, 'Test Sale [GP]', 3600.00, 0.00, 1, 2, 87, '2021-03-11 21:29:19', NULL),
(92, 'c.r.v', '2021-03-12', 152, 2, 'CA Near about abc', 26000.00, 0.00, 1, 2, NULL, '2021-03-11 21:50:43', ''),
(93, 'c.r.v', '2021-03-12', 152, 2, 'Test Payment Voucher', 26000.00, 0.00, 1, 2, NULL, '2021-03-11 21:54:10', ''),
(94, 'c.p.v', '2021-03-12', 2, 151, 'Test Voucher', 20000.00, 0.00, 1, 2, NULL, '2021-03-11 22:03:29', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100008;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- AUTO_INCREMENT for table `company_list`
--
ALTER TABLE `company_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_price_update_logs`
--
ALTER TABLE `product_price_update_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_transation`
--
ALTER TABLE `product_transation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product_transation_detail`
--
ALTER TABLE `product_transation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
