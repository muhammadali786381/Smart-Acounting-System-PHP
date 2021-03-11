-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2021 at 03:58 PM
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
-- Database: `alphasmspk_sas_db`
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
(2, 2, 'Z-A Cash', 'Z-A Owner', '', NULL, NULL, 1, 0.00, 10409.00, 1, '2021-02-01 16:50:07', '2021-03-08 12:02:22'),
(3, 1, 'Z-F Bank', 'Z-F Owner', '', NULL, NULL, 2, 0.00, 0.00, 1, '2021-02-01 16:50:07', '2021-02-01 16:50:07'),
(4, 2, 'Z-A Bank', 'Z-A Owner', '', NULL, NULL, 2, 0.00, 0.00, 1, '2021-02-01 16:50:07', '2021-02-01 16:50:07'),
(10, 2, 'Ya Razzaq Trader', 'Allah Pak', '923017155110', '', 'ABC', 4, 18893.00, 0.00, 1, '2021-02-09 15:04:55', '2021-03-04 14:03:55'),
(11, 2, 'Asif Bhutta BMS', 'Asif Bhutta', '923006232719', '', 'Pera ghaib Road Multan', 3, 0.00, 6900.00, 1, '2021-02-09 15:06:32', '2021-03-04 14:14:19'),
(12, 2, 'AFU Enterprise Multan', 'Muhammad Farooq Sb | Umair Hassan Sb', '923016120707', '923017424753', 'BWP bypass Multan', 4, 674263.00, 0.00, 1, '2021-02-09 15:14:01', '2021-03-08 09:05:38'),
(13, 2, 'shiraz bhuta  paint stor', 'shiraz bhuta', '923017576171', '', 'suraj kund road multan', 3, 0.00, 23000.00, 1, '2021-02-09 15:30:58', '2021-03-08 08:15:10'),
(14, 2, 'sartaj paint store', 'akram sb', '923006345467', '', 'samejha abad near uonian consal multan', 3, 0.00, 7500.00, 1, '2021-02-09 15:32:54', '2021-03-04 14:14:43'),
(15, 2, 'khawaja bms', 'zeshan sb', '903008142296', '', 'Pera ghaib Road Multan', 3, 0.00, 0.00, 1, '2021-02-09 15:34:12', '2021-02-09 15:34:12'),
(16, 2, 'Subhan sentri and tile shop', 'Nazim sb', '923036554373', '923052660875', 'Dera ada multan', 3, 0.00, 0.00, 1, '2021-02-10 14:06:13', '2021-02-10 14:06:13'),
(17, 2, 'Al khair hardware&santri store', 'Khan muhammad', '923070656290', '923027326381', 'gose azam road waream chok multan', 3, 0.00, 1200.00, 1, '2021-02-10 14:10:06', '2021-03-08 08:50:39'),
(18, 2, 'Bajwa sanitary store', 'Muhammad Arshad sb', '923008608306', '', 'Dara ada multan', 3, 0.00, 10500.00, 1, '2021-02-10 15:14:11', '2021-03-08 08:03:45'),
(19, 2, 'Malik bilding material store', 'Malik muhammad Zafar sb', '923036633769', '923013238213', 'Goseazam road near shwara chok multan', 3, 0.00, 7405.00, 1, '2021-02-10 15:18:32', '2021-03-08 09:11:31'),
(20, 2, 'MUMBARAK SONS', 'mubarak sb', '923009637980', '923008737980', '41 husan parwana road dera ada multan', 3, 0.00, 13000.00, 1, '2021-02-10 15:21:18', '2021-03-08 09:04:32'),
(21, 2, 'Fahad tile store', 'FAHAD JAMEL SB', '923077470369', '923087826095', '17-B MEHRAN PALAZA DERA ADA MULTAN', 3, 0.00, 12600.00, 1, '2021-02-10 15:23:20', '2021-03-08 08:04:36'),
(22, 2, 'Shafeh building material store', 'm Imran sb', '923027499533', '923026540842', 'Satwan meel near pso pump shar shah road multan', 3, 0.00, 32175.00, 1, '2021-02-10 15:26:27', '2021-03-08 08:29:15'),
(23, 2, 'Thaheem enterprises', 'M shahid sb', '923007319456', '923156319456', 'Hassan parwana road dera ada multan', 3, 0.00, 12000.00, 1, '2021-02-10 15:28:22', '2021-03-08 08:03:27'),
(24, 2, 'Fazain_e Madina building material store', 'Malik Imran ahmad sb', '923009631376', '923028632326', 'Nawab pur road chungi no 5 multan', 3, 0.00, 20419.00, 1, '2021-02-10 15:31:12', '2021-03-08 09:01:07'),
(25, 2, 'Mughal hardware store', 'Rehan sb', '923027372319', '923116267786', 'gose azam road shwara chok multan', 3, 0.00, 15227.00, 1, '2021-02-10 15:34:02', '2021-03-08 08:49:32'),
(26, 2, 'Butt building material store', 'Fakhar sb', '923122044481', '', 'shop no 1 ma jinah road mda multan', 3, 0.00, 1487.00, 1, '2021-02-10 15:39:17', '2021-03-08 09:02:50'),
(27, 2, 'AL_Ahmad enterprises', 'Hafize arif Aziz sb', '923006304009', '923136230666', '26_ hasan parwana dera ada multan', 3, 0.00, 2600.00, 1, '2021-02-10 15:43:12', '2021-03-08 08:00:57'),
(28, 2, 'Rana Asif Traders', 'Rana Asif sb', '923007357492', '923446209057', 'Bosan road near toyota showroom multan', 3, 0.00, 3600.00, 1, '2021-02-10 15:46:03', '2021-03-08 09:04:13'),
(29, 2, 'AL_Madina building material store', 'M. Saleem sb', '923009638148', '923022162493', 'Suraj miani road near aisha masjid multan', 3, 0.00, 13000.00, 1, '2021-02-10 15:48:52', '2021-03-08 08:57:20'),
(30, 2, 'M. Maaz tile store', 'Maaz iqbal sb', '923012917739', '923015777706', 'hasan parwana dera ada multan', 3, 0.00, 29500.00, 1, '2021-02-10 15:51:02', '2021-03-08 08:04:11'),
(31, 2, 'UNIQE TILES STORE', 'ABDULHAMEED SB', '923030284260', '923130015234', '21_HASAN PARWANA  NEAR DASTAGEER TOWAR DERA ADA MULTAN', 3, 0.00, 29426.00, 1, '2021-02-10 15:54:02', '2021-03-08 08:02:13'),
(32, 2, 'Tile nugar', 'Shaiq Ali raza sb', '923236181246', '', 'hasan parwana dera ada multan', 3, 0.00, 0.00, 1, '2021-02-10 15:56:23', '2021-02-10 15:56:23'),
(33, 2, 'Tariq building material store', 'Dilawar sb', '923087534651', '923049358725', 'chok pul wasil new air port multan', 3, 0.00, 9779.00, 1, '2021-02-10 16:07:36', '2021-03-08 08:54:40'),
(34, 2, 'Punjab sentri store', 'Choudhry Khlid sb', '923216387459', '923317661363', 'hasan parwana dera ada multan', 3, 0.00, 22020.00, 1, '2021-02-10 16:10:20', '2021-03-08 08:03:07'),
(35, 2, 'Dubai sanitary store', 'm Imran sb', '923044440799', '923182189767', 'BWP ROAD MULTAN', 3, 0.00, 5579.00, 1, '2021-02-10 16:12:35', '2021-03-08 08:43:56'),
(36, 2, 'Fuji sentry store', 'M asif sb', '923036564614', '', 'vehari road 19 kasi multan', 3, 221.00, 0.00, 1, '2021-02-10 16:14:20', '2021-03-08 08:46:07'),
(37, 2, 'Malik building store', 'Malik Osama sb', '923407276478', '923011097473', 'billal chok multan', 3, 0.00, 815.00, 1, '2021-02-10 16:17:15', '2021-03-08 08:50:04'),
(38, 2, 'Khawja Building Meterial Store', 'Khawja Zeeshan Haider', '923008142926', '923126305616', 'Peeran ghaib road 40 Futty near jafri Hospital Multan.', 3, 0.00, 12965.00, 1, '2021-02-10 16:20:01', '2021-03-04 14:16:28'),
(39, 2, 'Prime Paint&Sanitary Store', 'Salman and Abdul rehman', '923087999916', '923018635556', 'Opp.Oldbakar mandi hazuri bagh road multan', 3, 0.00, 9400.00, 1, '2021-02-11 13:05:53', '2021-03-08 09:01:25'),
(40, 2, 'Multan sanitary &hardware store', 'muhammad Arif khurshid sb', '923076320267', '', 'usman ghani road near khad factory khanewal road multan', 3, 0.00, 3427.00, 1, '2021-02-11 13:09:12', '2021-03-04 14:16:53'),
(41, 2, 'Dawn Tiles store', 'MUHAMMAD Arif sb', '903047812380', '923218566632', 'hasan parwana dera ada multan', 3, 0.00, 13870.00, 1, '2021-02-11 13:11:19', '2021-03-08 08:02:43'),
(42, 2, 'Junaid cement store', 'Choudhry  m Anwar sb', '923006305332', '923116308555', 'Shar shah road bijli ghar chok multan', 3, 0.00, 11811.00, 1, '2021-02-11 13:13:50', '2021-03-08 08:14:23'),
(43, 2, 'Arslan marble store', 'Zafar billal', '903002291310', '923126448251', 'Khanewal road hasan abad gate no 2 near usman ghani chok multan', 3, 0.00, 11500.00, 1, '2021-02-11 13:22:55', '2021-03-04 14:17:21'),
(44, 2, 'Baloch brothers cement store', 'Hafiz  abukhalil sb', '923006332027', '', 'Ada razabad near buch welaz bosan road multan', 3, 0.00, 42000.00, 1, '2021-02-11 13:34:29', '2021-03-08 08:14:47'),
(45, 2, 'Qureshi brothers brakes store', 'Shaiq M Maqbool sb', '923006371764', '923138701764', 'MA Jinnah road qasori chok bodla twan multan', 3, 0.00, 14814.00, 1, '2021-02-11 13:37:57', '2021-03-04 14:18:02'),
(46, 2, 'Ejaz sentry srore', 'M.Rizwan sb', '923017507768', '923216317608', 'hazori bagh road near chungi no9 multan', 3, 0.00, 7800.00, 1, '2021-02-11 13:43:25', '2021-03-08 09:00:36'),
(47, 2, 'Hadi paint store', 'Zahid ali sb', '923008403074', '923358403074', 'nawab pur road sedan wali khoi multan', 3, 0.00, 12740.00, 1, '2021-02-11 13:46:10', '2021-03-08 09:03:29'),
(48, 2, 'Shaiq Asghar building material store', 'Asghar sb', '923017547397', '', 'bodla towan multan', 3, 0.00, 10500.00, 1, '2021-02-11 13:49:33', '2021-03-04 14:20:50'),
(49, 2, 'Hamid painte store', 'hamid sb', '923056643667', '', 'budhla road near stadium chok multan', 3, 0.00, 9740.00, 1, '2021-02-11 13:51:33', '2021-03-04 14:21:09'),
(50, 2, 'Attar paint store', 'mazhar sb', '923017574641', '', 'ada bund bosan multan', 3, 0.00, 14000.00, 1, '2021-02-11 13:53:13', '2021-03-04 14:30:23'),
(51, 2, 'Aitiq trader', 'saeed sb', '923056904849', '', 'Dera ada multan', 3, 0.00, 17000.00, 1, '2021-02-11 13:54:53', '2021-03-08 08:08:41'),
(52, 2, 'Sadiqi sanitary store', 'sadiqi sb', '923156307616', '', 'Dera ada multan', 3, 0.00, 9000.00, 1, '2021-02-11 13:56:38', '2021-03-08 08:10:50'),
(53, 2, 'Madni building store', 'm Imran sb', '923027870873', '', 'MA Jinnah road  basti shor kot multan', 3, 0.00, 16778.00, 1, '2021-02-11 13:58:58', '2021-03-08 08:11:30'),
(54, 2, 'Waqar brothers', 'Waqar sb', '923047366090', '', 'qasim bela multan', 3, 0.00, 13000.00, 1, '2021-02-13 14:18:31', '2021-03-08 09:22:03'),
(55, 2, 'Noman and brothers', 'Noman sb', '923027366625', '', 'qasim bela multan', 3, 0.00, 13000.00, 1, '2021-02-13 14:22:35', '2021-03-08 09:21:44'),
(56, 2, 'SH TREDAER', 'SAJID .C/O ATEEQ SB', '923312008157', '', 'JATOI CITY', 3, 0.00, 20000.00, 1, '2021-02-13 14:27:18', '2021-03-08 09:21:12'),
(57, 2, 'Rana G building material store', 'rana imran sb', '923072925377', '', 'muzafar  ghrah road multan', 3, 0.00, 3000.00, 1, '2021-02-13 14:44:20', '2021-03-08 09:12:35'),
(58, 2, 'Shahmeer building material store', 'shah g', '923044886132', '', 'raza abad chok multan', 3, 0.00, 57600.00, 1, '2021-02-13 14:46:24', '2021-03-08 09:12:09'),
(60, 2, 'Madni building', 'ahmad sb', '923036500538', '', 'billal chok multan', 3, 0.00, 2600.00, 1, '2021-02-13 14:57:24', '2021-03-08 09:10:35'),
(61, 2, 'Farooq building material store', 'Umar faroq sb', '923006371107', '', 'mati tal road near chah kekar wala multan', 3, 0.00, 8000.00, 1, '2021-02-13 15:00:12', '2021-03-08 09:09:53'),
(62, 2, 'Usman sanitary store', 'Abdulghafar sb', '923007316248', '', 'dhare chok dhare market  multan', 3, 0.00, 6500.00, 1, '2021-02-13 15:03:06', '2021-03-08 09:09:29'),
(63, 2, 'Akram sons', 'Fayyaz akram sb', '923006331316', '', 'multan public school road multan', 3, 0.00, 5390.00, 1, '2021-02-13 15:07:52', '2021-03-08 09:09:04'),
(64, 2, 'Dildar cement store', 'dildar sb', '923027460672', '', 'ganda nala chok multan', 3, 0.00, 609.00, 1, '2021-02-13 15:11:33', '2021-03-08 09:08:45'),
(65, 2, 'Al.qadri traders', 'Babar sb', '923027340537', '', 't chok  shah rukne alam multan', 3, 0.00, 43580.00, 1, '2021-02-13 15:14:16', '2021-03-08 09:08:07'),
(66, 2, 'Bukhri paint store', 'rashid sb', '923027340537', '', 'Pera ghaib Road Multan', 3, 0.00, 0.00, 1, '2021-02-13 15:15:53', '2021-02-13 15:15:53'),
(67, 2, 'Shalimar sentry store', 'ameen sb', '923070652379', '', 'hazori bagh road near chungi no9 multan', 3, 0.00, 28500.00, 1, '2021-02-13 15:17:31', '2021-03-08 09:07:34'),
(68, 2, 'Khan building material store', 'mehtab sb', '923006331316', '', 'multan public school road multan', 3, 0.00, 20000.00, 1, '2021-02-13 15:19:59', '2021-03-08 09:07:13'),
(69, 2, 'Rana ali shar BMS', 'ALI SB', '923027461764', '', 'KHANWAL ROAD NEAR RAWAN MOOR', 3, 0.00, 0.00, 1, '2021-02-13 15:21:40', '2021-02-13 15:21:40'),
(70, 2, 'National sanitary store', 'siqandar sb', '923000761546', '', 'taty pur road rawan', 3, 0.00, 19200.00, 1, '2021-02-13 15:23:45', '2021-03-08 09:06:44'),
(71, 2, 'Hafiz khan bahadur  cement', 'bhadar khan', '923006326642', '', 'masom shah road multan', 3, 0.00, 935.00, 1, '2021-02-13 15:25:42', '2021-03-08 09:06:06'),
(72, 2, 'Raja building material  store', 'keani sb', '923012767979', '', 'samejha abad near  sabzi mandi multan', 3, 0.00, 18758.00, 1, '2021-02-13 15:28:03', '2021-03-08 09:05:03'),
(73, 2, 'My tiles and sanitary store', 'hashim sb', '923030702270', '', 'qasori chok multan', 3, 0.00, 2000.00, 1, '2021-02-13 15:30:42', '2021-03-08 09:03:48'),
(74, 2, 'Bundo brakes', 'asif sb', '923077469931', '', 'rasheed abad multan', 3, 218.00, 0.00, 1, '2021-02-13 15:33:15', '2021-03-08 09:02:30'),
(75, 2, 'Itfaq  brakes', 'azeem sb', '923006382717', '', 'rasheed abad multan', 3, 0.00, 13824.00, 1, '2021-02-13 15:34:33', '2021-03-08 09:01:52'),
(76, 2, 'Waheed sanitary store', 'waheed sb', '923088423650', '', 'suraj kund road multan', 3, 0.00, 9000.00, 1, '2021-02-13 15:36:53', '2021-03-08 09:00:16'),
(77, 2, 'AL.Madina hardware', 'faroq sb', '923008778839', '', 'KHANWAL ROAD NEAR  raja pur  multan', 3, 0.00, 3258.00, 1, '2021-02-13 15:39:07', '2021-03-08 08:59:54'),
(78, 2, 'Rehan hardware store', 'rehan sb', '923007361906', '', 'mati tal road  multan', 3, 0.00, 4100.00, 1, '2021-02-13 15:40:54', '2021-03-08 08:38:53'),
(79, 2, 'Mashaallha building material store', 'imran sb', '923007192376', '', 'khanwal road near nadran by pas multan', 3, 0.00, 2500.00, 1, '2021-02-13 15:42:45', '2021-03-08 08:58:07'),
(80, 2, 'Ghori cement store', 'nana bhai', '923006321012', '', 'pul wasal chok multan', 3, 0.00, 28909.00, 1, '2021-02-13 15:48:30', '2021-03-08 08:52:23'),
(81, 2, 'AL Madina building', 'shaiq sb', '923066188423', '', 'walit husaain college  masoom shah road multan', 3, 0.00, 10400.00, 1, '2021-02-13 16:07:34', '2021-03-08 08:49:09'),
(82, 2, 'Malik rashid  cement store', 'rashid sb', '923006364120', '', 'naaz canima vehari road multan', 3, 0.00, 13000.00, 1, '2021-02-13 16:09:27', '2021-03-08 08:46:34'),
(83, 2, 'Malik paint store', 'haji sb', '923037363168', '', 'kot rabnwaz multan', 3, 0.00, 15682.00, 1, '2021-02-13 16:28:24', '2021-03-08 08:44:50'),
(84, 2, 'Abdula paint store', 'Nadeem sb', '923017493408', '', 'rana dal factory road multan', 3, 0.00, 17595.00, 1, '2021-02-13 16:30:00', '2021-03-08 08:44:23'),
(85, 2, 'qureshi building store', 'qureshi  sb', '923004386168', '', 'coca cola factory multan', 3, 0.00, 6439.00, 1, '2021-02-13 16:32:18', '2021-03-08 08:43:12'),
(86, 2, 'Rehmat sanitary store', 'owas sb', '923004371415', '', 'suraj kund road multan', 3, 0.00, 3370.00, 1, '2021-02-13 16:33:42', '2021-03-08 08:40:39'),
(87, 2, 'Ustad wajid ali', 'wajid sb', '923055159015', '', 'budhla road multan', 3, 0.00, 8000.00, 1, '2021-02-13 16:35:16', '2021-03-08 08:40:18'),
(88, 2, 'New star building material store', 'waqas sb', '923008636360', '', 'pc road multan', 3, 0.00, 13000.00, 1, '2021-02-13 16:37:37', '2021-03-08 08:39:57'),
(89, 2, 'Aamir tiles', 'aamir sb', '923226138818', '', 'rasheed abad multan', 3, 0.00, 16960.00, 1, '2021-02-13 16:45:34', '2021-03-08 08:39:36'),
(90, 2, 'Abdulbasit  brakes', 'muneer sb', '923006379329', '', 'shah chok multan', 3, 0.00, 23035.00, 1, '2021-02-13 16:47:15', '2021-03-08 08:39:18'),
(91, 2, 'rehan building material store', 'rehan sb', '923027601201', '', 'kayanpur chok multan', 3, 0.00, 3000.00, 1, '2021-02-13 16:49:01', '2021-03-08 08:58:33'),
(92, 2, 'MUDASIR SHATRING', 'MUZAMIL SB', '923041218964', '', 'NAG SHAH CHOK MULTAN', 3, 0.00, 5060.00, 1, '2021-02-13 16:50:32', '2021-03-08 08:37:34'),
(93, 2, 'Usman cement store', 'usman sb', '923008375929', '', 'pak gate multan', 3, 0.00, 13200.00, 1, '2021-02-13 16:51:55', '2021-03-08 08:36:12'),
(94, 2, 'Adil abas cement store', 'abbas bhai', '923006393127', '', 'Nawab pur road  multan', 3, 0.00, 21000.00, 1, '2021-02-13 16:53:16', '2021-03-08 08:35:07'),
(95, 2, 'Al hafiz hardware', 'raza sb', '923006372857', '', 'raza abad chok multan', 3, 0.00, 3400.00, 1, '2021-02-13 16:56:20', '2021-03-08 08:34:24'),
(96, 2, 'Al rehman building material store', 'rehman sb', '923016953329', '', 'shuja abad road multan', 3, 0.00, 2000.00, 1, '2021-02-13 16:57:58', '2021-03-08 08:37:11'),
(97, 2, 'Rana azhar cement', 'azhar sb', '923068155690', '', 'sabzwari towan multan', 3, 0.00, 26000.00, 1, '2021-02-13 16:59:05', '2021-03-08 08:36:35'),
(98, 2, 'Merza asghar building material store', 'adnan sb', '923017515138', '', 'bahar chok masoom shah road multan', 3, 0.00, 41492.00, 1, '2021-02-13 17:01:04', '2021-03-08 08:33:57'),
(99, 2, 'Al madina paint store', 'sami sb', '923006130323', '', 'nishat school nawab pur road multan', 3, 0.00, 1040.00, 1, '2021-02-13 17:02:22', '2021-03-08 08:33:27'),
(100, 2, 'Kazmi building material store', 'kazmi sb', '923027358364', '', 'raja pur multan', 3, 0.00, 4000.00, 1, '2021-02-13 17:04:00', '2021-03-08 08:32:58'),
(101, 2, 'M shreef cement', 'shreef sb', '923027376315', '', 'basti shor kot road multan', 3, 0.00, 13658.00, 1, '2021-02-13 17:05:57', '2021-03-08 08:32:38'),
(102, 2, 'Rana mehmood naiaz cement', 'mehmood sb', '923027362654', '', 'qasim pur nehar multan', 3, 0.00, 12349.00, 1, '2021-02-13 17:07:14', '2021-03-08 08:32:03'),
(103, 2, 'Burkat traders', 'nasir sb', '923007731422', '', 'vehari', 3, 0.00, 110830.00, 1, '2021-02-13 17:08:20', '2021-03-08 08:31:28'),
(104, 2, 'Tamoor traders', 'temoor sb', '923046590003', '', 'nehar stop multan', 3, 0.00, 0.00, 1, '2021-02-13 17:10:17', '2021-02-13 17:10:17'),
(105, 2, 'Malik yaseen cement', 'yaseen sb', '923007347225', '', 'khera chok multan', 3, 0.00, 2600.00, 1, '2021-02-13 17:11:43', '2021-03-08 08:30:38'),
(106, 2, 'Zikrea brakes', 'zubair sb', '923071313263', '', '6 no chungi bosan road multan', 3, 0.00, 16405.00, 1, '2021-02-13 17:13:30', '2021-03-08 08:30:13'),
(108, 2, 'MALIK BULDING KW', 'yaseen sb', '923068949105', '', 'korey wala multan', 3, 0.00, 9397.00, 1, '2021-02-13 17:16:20', '2021-03-08 08:29:47'),
(109, 2, 'Mashaallha building material store BUDHLA', 'MERZA ASGAR', '923074580265', '', 'budhla road multan', 3, 0.00, 4900.00, 1, '2021-02-13 17:18:13', '2021-03-08 08:26:46'),
(110, 2, 'Jamshad cement', 'dilshad sb', '923042783089', '', 'zarat university multan', 3, 0.00, 7160.00, 1, '2021-02-13 17:19:47', '2021-03-08 08:26:19'),
(111, 2, 'Almakha building material store', 'sajjad sb', '923077994583', '', 'shwra chok multan', 3, 0.00, 9355.00, 1, '2021-02-13 17:21:09', '2021-03-08 08:25:54'),
(112, 2, 'Al Lateef BMS', 'LATEEF SB', '923048297218', '', 'qasim bela multan', 3, 0.00, 8173.00, 1, '2021-02-13 17:22:08', '2021-03-08 08:25:17'),
(113, 2, 'Chohan cement store', 'manan sb', '923087884438', '', 'qasim bela multan', 3, 0.00, 1300.00, 1, '2021-02-13 17:23:23', '2021-03-08 08:16:53'),
(114, 2, 'Malik safdar cement', 'safdar sb', '923017460945', '', 'qasim bela multan', 3, 0.00, 1500.00, 1, '2021-02-13 17:24:21', '2021-03-08 08:15:37'),
(115, 2, 'Shaiq zaman cement', 'zaman sb', '923006304786', '', 'BWP bypass Multan', 3, 0.00, 24940.00, 1, '2021-02-13 17:26:20', '2021-03-08 08:13:54'),
(116, 2, 'Rana shahid cement', 'rana shahid sb', '923022284549', '', 'BWP bypass Multan', 3, 0.00, 4167.00, 1, '2021-02-13 17:27:28', '2021-03-08 08:13:31'),
(117, 2, 'Azeem steel', 'azeem sb', '923009891865', '', 'basti shor kot road multan', 3, 0.00, 0.00, 1, '2021-02-13 17:28:41', '2021-02-13 17:28:41'),
(118, 2, 'Rajoot paint store', 'aftab sb', '923326058853', '', 'madal towan chok multan', 3, 0.00, 23600.00, 1, '2021-02-13 17:30:05', '2021-03-08 08:12:50'),
(119, 2, 'JUGNU CEMENT STORE', 'JUGNU SB', '923036553642', '', 'KHAN VILGE MULTAN', 3, 0.00, 48619.00, 1, '2021-02-13 17:31:08', '2021-03-08 08:12:24'),
(120, 2, 'Hashmi paint store', 'hashmi sb', '923009631285', '', 'gulshan  markeet multan', 3, 0.00, 1906.00, 1, '2021-02-13 17:32:26', '2021-03-08 08:12:03'),
(121, 1, 'Ya Razzaq Trader 2', 'Allah Pak', '923017155110', '', 'ABC', 4, 0.00, 0.00, 1, '2021-02-10 01:04:55', '2021-02-11 07:13:02'),
(122, 2, 'scheem account', 'aaaa', '000000000000', '', 'bbbbbb', 4, 100000.00, 0.00, 1, '2021-03-04 14:05:47', '2021-03-04 14:06:51'),
(123, 2, 'Nadir ali bhati sb captil', 'nadir ali sb', '923007735090', '', 'vehari', 4, 979000.00, 0.00, 1, '2021-03-04 14:10:28', '2021-03-04 14:11:05'),
(124, 2, 'Meraj center', 'ab sb', '000000000000', '', 'Pera ghaib Road Multan', 3, 1000.00, 0.00, 1, '2021-03-04 14:13:00', '2021-03-04 14:13:39'),
(125, 2, 'Zahoor brother', 'zahoor sb', '923077438508', '', 'shah rukne alam t chok', 3, 0.00, 780.00, 1, '2021-03-04 14:27:37', '2021-03-04 14:27:57'),
(126, 2, 'Shkeel bms pak gate', 'shkeel sb', '920000000000', '', 'pak gate multan', 3, 0.00, 3901.00, 1, '2021-03-08 09:16:20', '2021-03-08 09:18:48'),
(127, 2, 'Printing account', 'self', '000000000000', '', 'BWP bypass Multan', 3, 0.00, 15900.00, 1, '2021-03-08 09:20:05', '2021-03-08 09:20:32'),
(128, 2, 'Misslenes account', 'self', '000000000000', '', 'BWP bypass Multan', 3, 12000.00, 17981.00, 1, '2021-03-08 09:24:23', '2021-03-08 12:38:22'),
(129, 2, 'Abduljabbar sb', 'jabbar sb', '923017050808', '', 'Pera ghaib Road Multan', 3, 0.00, 5100.00, 1, '2021-03-08 09:26:10', '2021-03-08 09:26:44'),
(130, 2, 'Office esats', 'self', '000000000000', '', 'BWP bypass Multan', 3, 0.00, 88250.00, 1, '2021-03-08 09:28:20', '2021-03-08 09:30:14'),
(131, 0, 'A Q QARAZ  HASNA', 'A Q', '000000000000', '', 'BWP bypass Multan', 3, 0.00, 0.00, 1, '2021-03-08 11:30:49', '2021-03-08 11:30:49'),
(136, 2, 'Q A KARAZ E HASNA', 'QULB AHMAD', '923017155110', '923346015910', 'BWP bypass Multan', 3, 0.00, 32000.00, 1, '2021-03-08 11:46:43', '2021-03-08 11:47:22'),
(137, 2, 'BHATI SB (PARSNAL)', 'BHATI SB', '923007735090', '', 'vehari', 3, 89258.00, 113555.00, 1, '2021-03-08 11:48:51', '2021-03-08 12:33:02'),
(138, 2, 'Malik Ahmad Faraz (parsnal)', 'malik ahmad faraz', '923346015910', '', 'multan', 3, 19126.00, 45149.00, 1, '2021-03-08 11:51:18', '2021-03-08 12:36:37'),
(139, 2, 'Qalb hussain awan', 'qalb hussain', '923017155110', '', 'multan', 3, 19126.00, 35232.00, 1, '2021-03-08 11:52:09', '2021-03-08 12:35:39'),
(140, 2, 'billal employ', 'billal sb', '923007980024', '', 'multan', 3, 0.00, 64100.00, 1, '2021-03-08 11:53:23', '2021-03-08 12:00:49'),
(141, 2, 'Software account', 'ali sb', '000000000000', '', 'multan', 3, 0.00, 9000.00, 1, '2021-03-08 11:54:09', '2021-03-08 12:01:11'),
(142, 2, 'Iqbal paint store', 'ramzan sb', '923070708810', '', 'suraj kund road multan', 3, 0.00, 13000.00, 1, '2021-03-08 11:55:43', '2021-03-08 12:01:31'),
(143, 2, 'Masood aslam tile vehari', 'masood sb', '923437272029', '', 'vehari', 3, 0.00, 88880.00, 1, '2021-03-08 11:56:48', '2021-03-08 12:01:51'),
(144, 2, 'GROSS PROFIT', 'ZA', '000000000000', '', 'multan', 4, 138510.00, 138510.00, 1, '2021-03-08 12:03:58', '2021-03-08 12:39:22'),
(145, 2, 'Sespence account', 'za', '000000000000', '', 'multan', 3, 1000.00, 1000.00, 1, '2021-03-08 12:05:34', '2021-03-08 12:40:08'),
(146, 2, 'Token account', 'za', '000000000000', '', 'multan', 3, 0.00, 0.00, 1, '2021-03-08 12:06:11', '2021-03-08 12:06:11'),
(148, 1, 'GROSS PROFIT ZF', 'ZF', '000000000000', '', 'multan', 4, 138510.00, 138510.00, 1, '2021-03-08 12:03:58', '2021-03-11 15:46:23'),
(149, 2, 'Stock Account ZA', 'ZA OWNER', '000000000000', '', 'multan', 4, 138510.00, 138510.00, 1, '2021-03-08 12:03:58', '2021-03-11 15:46:23'),
(150, 1, 'Stock Account ZF', 'ZF OWNER', '000000000000', '', 'multan', 4, 138510.00, 138510.00, 1, '2021-03-08 12:03:58', '2021-03-11 15:46:23');

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
(705, 1, '119.73.122.247', 'login', '2021-03-11 14:42:55');

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
(55, 'PURCHASE-', '2021-02-21', 2, 12, 2, 'purchase form  afu enterprises', 293800.00, 248600.00, 1, '2021-03-08 13:03:55', '2021-03-08 13:03:55'),
(56, 'PURCHASE-', '2021-02-21', 2, 12, 2, 'purchase from afu enterprises', 35700.00, 28900.00, 1, '2021-03-08 13:05:18', '2021-03-08 13:05:18'),
(57, 'SALE-', '2021-02-21', 1, 80, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:06:41', '2021-03-08 13:06:41'),
(58, 'SALE-', '2021-02-21', 1, 108, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:07:40', '2021-03-08 13:07:40'),
(59, 'SALE-', '2021-02-22', 1, 51, 2, 'maple tile bound tl', 24200.00, 18700.00, 1, '2021-03-08 13:09:08', '2021-03-08 13:09:08'),
(60, 'SALE-', '2021-02-23', 1, 98, 2, 'maple tile bound', 26000.00, 22000.00, 1, '2021-03-08 13:10:28', '2021-03-08 13:10:28'),
(61, 'SALE-', '2021-02-23', 1, 120, 2, 'maple tile bound', 6500.00, 5500.00, 1, '2021-03-08 13:11:14', '2021-03-08 13:11:14'),
(62, 'SALE-', '2021-02-23', 1, 45, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:12:12', '2021-03-08 13:12:12'),
(63, 'SALE-', '2021-02-23', 1, 85, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:12:55', '2021-03-08 13:12:55'),
(64, 'SALE-', '2021-02-23', 1, 65, 2, 'maple tile bound', 26000.00, 22000.00, 1, '2021-03-08 13:15:18', '2021-03-08 13:15:18'),
(65, 'SALE-', '2021-02-23', 1, 51, 2, 'maple tile bound', 13200.00, 10200.00, 1, '2021-03-08 13:16:11', '2021-03-08 13:16:11'),
(66, 'SALE-', '2021-02-24', 1, 22, 2, 'maple tile bound', 26000.00, 22000.00, 1, '2021-03-08 13:17:02', '2021-03-08 13:17:02'),
(67, 'SALE-', '2021-02-24', 1, 116, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:17:40', '2021-03-08 13:17:40'),
(68, 'SALE-', '2021-02-24', 1, 86, 2, 'maple tile bound', 15600.00, 13200.00, 1, '2021-03-08 13:18:23', '2021-03-08 13:18:23'),
(69, 'SALE-', '2021-02-24', 1, 102, 2, 'maple tile bound', 19500.00, 16500.00, 1, '2021-03-08 13:19:23', '2021-03-08 13:19:23'),
(70, 'SALE-', '2021-02-25', 1, 100, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:20:04', '2021-03-08 13:20:04'),
(71, 'SALE-', '2021-02-25', 1, 65, 2, 'maple tile bound', 18200.00, 15400.00, 1, '2021-03-08 13:20:57', '2021-03-08 13:20:57'),
(72, 'SALE-', '2021-02-25', 1, 70, 2, 'maple tile bound', 18200.00, 15400.00, 1, '2021-03-08 13:21:42', '2021-03-08 13:21:42'),
(73, 'SALE-', '2021-02-25', 1, 43, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:45:01', '2021-03-08 13:45:01'),
(74, 'SALE-', '2021-02-27', 1, 22, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 13:46:16', '2021-03-08 13:46:16'),
(75, 'SALE-', '2021-02-27', 1, 65, 2, 'maple tile bound', 33800.00, 28600.00, 1, '2021-03-08 13:47:00', '2021-03-08 13:47:00'),
(76, 'PURCHASE-', '2021-02-27', 2, 12, 2, 'perches from afu enterprises', 195000.00, 165000.00, 1, '2021-03-08 14:08:03', '2021-03-08 14:08:03'),
(77, 'PURCHASE-', '2021-02-27', 2, 12, 2, 'perches from afu enterprises', 10500.00, 8500.00, 1, '2021-03-08 14:09:17', '2021-03-08 14:09:17'),
(78, 'SALE-', '2021-02-27', 1, 23, 2, 'maple tile bound (TL)', 10500.00, 8500.00, 1, '2021-03-08 14:10:47', '2021-03-08 14:10:47'),
(79, 'SALE-', '2021-02-28', 1, 108, 2, 'Maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 14:11:32', '2021-03-08 14:11:32'),
(80, 'SALE-', '2021-03-01', 1, 94, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 14:12:14', '2021-03-08 14:12:14'),
(81, 'SALE-', '2021-03-01', 1, 63, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 14:12:51', '2021-03-08 14:12:51'),
(82, 'SALE-', '2021-03-01', 1, 24, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 14:13:43', '2021-03-08 14:13:43'),
(83, 'SALE-', '2021-03-02', 1, 33, 2, 'maple tile bound', 13000.00, 11000.00, 1, '2021-03-08 14:14:33', '2021-03-08 14:14:33'),
(84, 'SALE-', '2021-03-04', 1, 143, 2, 'maple tile bound vechle number  mnc 5788 biltey number 828 al rehman goods vehari road multan', 130000.00, 110000.00, 1, '2021-03-08 14:18:54', '2021-03-08 14:18:54');

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
(84, 2, 55, '2021-02-21', 2, 15, 1130, 220.00, 220.00),
(85, 2, 56, '2021-02-21', 2, 16, 170, 170.00, 170.00),
(86, 2, 57, '2021-02-21', 1, 15, 50, 260.00, 220.00),
(87, 2, 58, '2021-02-21', 1, 15, 50, 260.00, 220.00),
(88, 2, 59, '2021-02-22', 1, 16, 110, 220.00, 170.00),
(89, 2, 60, '2021-02-23', 1, 15, 100, 260.00, 220.00),
(90, 2, 61, '2021-02-23', 1, 15, 25, 260.00, 220.00),
(91, 2, 62, '2021-02-23', 1, 15, 50, 260.00, 220.00),
(92, 2, 63, '2021-02-23', 1, 15, 50, 260.00, 220.00),
(93, 2, 64, '2021-02-23', 1, 15, 100, 260.00, 220.00),
(94, 2, 65, '2021-02-23', 1, 16, 60, 220.00, 170.00),
(95, 2, 66, '2021-02-24', 1, 15, 100, 260.00, 220.00),
(96, 2, 67, '2021-02-24', 1, 15, 50, 260.00, 220.00),
(97, 2, 68, '2021-02-24', 1, 15, 60, 260.00, 220.00),
(98, 2, 69, '2021-02-24', 1, 15, 75, 260.00, 220.00),
(99, 2, 70, '2021-02-25', 1, 15, 50, 260.00, 220.00),
(100, 2, 71, '2021-02-25', 1, 15, 70, 260.00, 220.00),
(101, 2, 72, '2021-02-25', 1, 15, 70, 260.00, 220.00),
(102, 2, 73, '2021-02-25', 1, 15, 50, 260.00, 220.00),
(103, 2, 74, '2021-02-27', 1, 15, 50, 260.00, 220.00),
(104, 2, 75, '2021-02-27', 1, 15, 130, 260.00, 220.00),
(105, 2, 76, '2021-02-27', 2, 15, 750, 220.00, 220.00),
(106, 2, 77, '2021-02-27', 2, 16, 50, 170.00, 170.00),
(107, 2, 78, '2021-02-27', 1, 16, 50, 210.00, 170.00),
(108, 2, 79, '2021-02-28', 1, 15, 50, 260.00, 220.00),
(109, 2, 80, '2021-03-01', 1, 15, 50, 260.00, 220.00),
(110, 2, 81, '2021-03-01', 1, 15, 50, 260.00, 220.00),
(111, 2, 82, '2021-03-01', 1, 15, 50, 260.00, 220.00),
(112, 2, 83, '2021-03-02', 1, 15, 50, 260.00, 220.00),
(113, 2, 84, '2021-03-04', 1, 15, 500, 260.00, 220.00);

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
(21, 'p.v', '2021-02-21', 12, 2, 'purchase form  afu enterprises', 248600.00, 0.00, 1, 2, 55, '2021-03-08 13:03:55', NULL),
(22, 'p.v', '2021-02-21', 12, 2, 'purchase from afu enterprises', 28900.00, 0.00, 1, 2, 56, '2021-03-08 13:05:18', NULL),
(23, 's.v', '2021-02-21', 2, 80, 'maple tile bound', 13000.00, 0.00, 1, 2, 57, '2021-03-08 13:06:41', NULL),
(24, 'y.r.v', '2021-02-21', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 57, '2021-03-08 13:06:41', NULL),
(25, 's.v', '2021-02-21', 2, 108, 'maple tile bound', 13000.00, 0.00, 1, 2, 58, '2021-03-08 13:07:40', NULL),
(26, 'y.r.v', '2021-02-21', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 58, '2021-03-08 13:07:40', NULL),
(27, 's.v', '2021-02-22', 2, 51, 'maple tile bound tl', 24200.00, 0.00, 1, 2, 59, '2021-03-08 13:09:08', NULL),
(28, 'y.r.v', '2021-02-22', 2, 10, 'maple tile bound tl  [YR-10%]', 550.00, 0.00, 1, 2, 59, '2021-03-08 13:09:08', NULL),
(29, 's.v', '2021-02-23', 2, 98, 'maple tile bound', 26000.00, 0.00, 1, 2, 60, '2021-03-08 13:10:28', NULL),
(30, 'y.r.v', '2021-02-23', 2, 10, 'maple tile bound [YR-10%]', 400.00, 0.00, 1, 2, 60, '2021-03-08 13:10:28', NULL),
(31, 's.v', '2021-02-23', 2, 120, 'maple tile bound', 6500.00, 0.00, 1, 2, 61, '2021-03-08 13:11:14', NULL),
(32, 'y.r.v', '2021-02-23', 2, 10, 'maple tile bound [YR-10%]', 100.00, 0.00, 1, 2, 61, '2021-03-08 13:11:14', NULL),
(33, 's.v', '2021-02-23', 2, 45, 'maple tile bound', 13000.00, 0.00, 1, 2, 62, '2021-03-08 13:12:12', NULL),
(34, 'y.r.v', '2021-02-23', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 62, '2021-03-08 13:12:12', NULL),
(35, 's.v', '2021-02-23', 2, 85, 'maple tile bound', 13000.00, 0.00, 1, 2, 63, '2021-03-08 13:12:55', NULL),
(36, 'y.r.v', '2021-02-23', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 63, '2021-03-08 13:12:55', NULL),
(37, 's.v', '2021-02-23', 2, 65, 'maple tile bound', 26000.00, 0.00, 1, 2, 64, '2021-03-08 13:15:18', NULL),
(38, 'y.r.v', '2021-02-23', 2, 10, 'maple tile bound [YR-10%]', 400.00, 0.00, 1, 2, 64, '2021-03-08 13:15:18', NULL),
(39, 's.v', '2021-02-23', 2, 51, 'maple tile bound', 13200.00, 0.00, 1, 2, 65, '2021-03-08 13:16:11', NULL),
(40, 'y.r.v', '2021-02-23', 2, 10, 'maple tile bound [YR-10%]', 300.00, 0.00, 1, 2, 65, '2021-03-08 13:16:11', NULL),
(41, 's.v', '2021-02-24', 2, 22, 'maple tile bound', 26000.00, 0.00, 1, 2, 66, '2021-03-08 13:17:02', NULL),
(42, 'y.r.v', '2021-02-24', 2, 10, 'maple tile bound [YR-10%]', 400.00, 0.00, 1, 2, 66, '2021-03-08 13:17:02', NULL),
(43, 's.v', '2021-02-24', 2, 116, 'maple tile bound', 13000.00, 0.00, 1, 2, 67, '2021-03-08 13:17:40', NULL),
(44, 'y.r.v', '2021-02-24', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 67, '2021-03-08 13:17:40', NULL),
(45, 's.v', '2021-02-24', 2, 86, 'maple tile bound', 15600.00, 0.00, 1, 2, 68, '2021-03-08 13:18:23', NULL),
(46, 'y.r.v', '2021-02-24', 2, 10, 'maple tile bound [YR-10%]', 240.00, 0.00, 1, 2, 68, '2021-03-08 13:18:23', NULL),
(47, 's.v', '2021-02-24', 2, 102, 'maple tile bound', 19500.00, 0.00, 1, 2, 69, '2021-03-08 13:19:23', NULL),
(48, 'y.r.v', '2021-02-24', 2, 10, 'maple tile bound [YR-10%]', 300.00, 0.00, 1, 2, 69, '2021-03-08 13:19:23', NULL),
(49, 's.v', '2021-02-25', 2, 100, 'maple tile bound', 13000.00, 0.00, 1, 2, 70, '2021-03-08 13:20:04', NULL),
(50, 'y.r.v', '2021-02-25', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 70, '2021-03-08 13:20:04', NULL),
(51, 's.v', '2021-02-25', 2, 65, 'maple tile bound', 18200.00, 0.00, 1, 2, 71, '2021-03-08 13:20:57', NULL),
(52, 'y.r.v', '2021-02-25', 2, 10, 'maple tile bound [YR-10%]', 280.00, 0.00, 1, 2, 71, '2021-03-08 13:20:57', NULL),
(53, 's.v', '2021-02-25', 2, 70, 'maple tile bound', 18200.00, 0.00, 1, 2, 72, '2021-03-08 13:21:42', NULL),
(54, 'y.r.v', '2021-02-25', 2, 10, 'maple tile bound [YR-10%]', 280.00, 0.00, 1, 2, 72, '2021-03-08 13:21:42', NULL),
(55, 's.v', '2021-02-25', 2, 43, 'maple tile bound', 13000.00, 0.00, 1, 2, 73, '2021-03-08 13:45:01', NULL),
(56, 'y.r.v', '2021-02-25', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 73, '2021-03-08 13:45:01', NULL),
(57, 's.v', '2021-02-27', 2, 22, 'maple tile bound', 13000.00, 0.00, 1, 2, 74, '2021-03-08 13:46:16', NULL),
(58, 'y.r.v', '2021-02-27', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 74, '2021-03-08 13:46:16', NULL),
(59, 's.v', '2021-02-27', 2, 65, 'maple tile bound', 33800.00, 0.00, 1, 2, 75, '2021-03-08 13:47:00', NULL),
(60, 'y.r.v', '2021-02-27', 2, 10, 'maple tile bound [YR-10%]', 520.00, 0.00, 1, 2, 75, '2021-03-08 13:47:00', NULL),
(61, 'p.v', '2021-02-27', 12, 2, 'perches from afu enterprises', 165000.00, 0.00, 1, 2, 76, '2021-03-08 14:08:03', NULL),
(62, 'p.v', '2021-02-27', 12, 2, 'perches from afu enterprises', 8500.00, 0.00, 1, 2, 77, '2021-03-08 14:09:17', NULL),
(63, 's.v', '2021-02-27', 2, 23, 'maple tile bound (TL)', 10500.00, 0.00, 1, 2, 78, '2021-03-08 14:10:47', NULL),
(64, 'y.r.v', '2021-02-27', 2, 10, 'maple tile bound (TL) [YR-10%]', 200.00, 0.00, 1, 2, 78, '2021-03-08 14:10:47', NULL),
(65, 's.v', '2021-02-28', 2, 108, 'Maple tile bound', 13000.00, 0.00, 1, 2, 79, '2021-03-08 14:11:32', NULL),
(66, 'y.r.v', '2021-02-28', 2, 10, 'Maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 79, '2021-03-08 14:11:32', NULL),
(67, 's.v', '2021-03-01', 2, 94, 'maple tile bound', 13000.00, 0.00, 1, 2, 80, '2021-03-08 14:12:14', NULL),
(68, 'y.r.v', '2021-03-01', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 80, '2021-03-08 14:12:14', NULL),
(69, 's.v', '2021-03-01', 2, 63, 'maple tile bound', 13000.00, 0.00, 1, 2, 81, '2021-03-08 14:12:51', NULL),
(70, 'y.r.v', '2021-03-01', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 81, '2021-03-08 14:12:51', NULL),
(71, 's.v', '2021-03-01', 2, 24, 'maple tile bound', 13000.00, 0.00, 1, 2, 82, '2021-03-08 14:13:43', NULL),
(72, 'y.r.v', '2021-03-01', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 82, '2021-03-08 14:13:43', NULL),
(73, 's.v', '2021-03-02', 2, 33, 'maple tile bound', 13000.00, 0.00, 1, 2, 83, '2021-03-08 14:14:33', NULL),
(74, 'y.r.v', '2021-03-02', 2, 10, 'maple tile bound [YR-10%]', 200.00, 0.00, 1, 2, 83, '2021-03-08 14:14:33', NULL),
(75, 's.v', '2021-03-04', 2, 143, 'maple tile bound vechle number  mnc 5788 biltey number 828 al rehman goods vehari road multan', 130000.00, 0.00, 1, 2, 84, '2021-03-08 14:18:54', NULL),
(76, 'y.r.v', '2021-03-04', 2, 10, 'maple tile bound vechle number  mnc 5788 biltey number 828 al rehman goods vehari road multan [YR-10%]', 2000.00, 0.00, 1, 2, 84, '2021-03-08 14:18:54', NULL),
(77, 'j.v', '2021-02-27', 22, 12, 'token deference', 2000.00, 0.00, 1, 2, NULL, '2021-03-08 14:27:18', ''),
(78, 'j.v', '2021-02-17', 10, 22, 'rate deference', 700.00, 0.00, 1, 2, NULL, '2021-03-08 14:29:44', ''),
(79, 'j.v', '2021-02-20', 28, 146, 'token redivide from rana asif', 770.00, 0.00, 1, 2, NULL, '2021-03-08 14:41:01', ''),
(80, 'j.v', '2021-02-20', 119, 146, 'token redivide from jugnu through recpt # 520', 2079.00, 0.00, 1, 2, NULL, '2021-03-08 14:42:45', ''),
(81, 'j.v', '2021-02-20', 118, 146, 'token redivide through  recpt # 522', 1584.00, 0.00, 1, 2, NULL, '2021-03-08 14:44:24', ''),
(82, 'j.v', '2021-02-20', 26, 146, 'token redivide through  recpt # 523', 220.00, 0.00, 1, 2, NULL, '2021-03-08 14:45:34', ''),
(83, 'j.v', '2021-02-20', 45, 146, 'token redivide through  recpt # 525', 1496.00, 0.00, 1, 2, NULL, '2021-03-08 14:46:46', ''),
(84, 'c.r.v', '2021-02-20', 119, 2, 'cash received through recpt#519', 5000.00, 0.00, 1, 2, NULL, '2021-03-08 14:49:52', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100008;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `product_transation_detail`
--
ALTER TABLE `product_transation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
