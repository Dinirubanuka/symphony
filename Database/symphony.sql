-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 12:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symphony`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_contact_no` int(10) NOT NULL,
  `admin_nic` varchar(15) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `admin_name`, `admin_email`, `admin_contact_no`, `admin_nic`, `admin_address`, `password`, `status`) VALUES
(1, 'Kavindu Hansaja', 'admin@gmail.com', 784593211, '200034658219', 'No 55/A Delkanda junction, Nugegoda.', '$2y$10$.giPsKxvJSX5q2/xFa8iouS5c3P8U7hyOfX4f/Xn.4nkxOYl.bfsS', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `entry_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`entry_id`, `date`, `product_id`, `qty`, `type`) VALUES
(424, '2024-05-02', 27, 3, 'Equipment'),
(425, '2024-05-03', 27, 3, 'Equipment'),
(426, '2024-05-04', 27, 3, 'Equipment'),
(427, '2024-05-05', 27, 3, 'Equipment'),
(428, '2024-05-06', 27, 3, 'Equipment'),
(429, '2024-05-07', 27, 3, 'Equipment'),
(430, '2024-05-08', 27, 3, 'Equipment'),
(431, '2024-04-30', 33, 1, 'Equipment'),
(432, '2024-05-01', 33, 1, 'Equipment'),
(433, '2024-05-02', 33, 1, 'Equipment'),
(434, '2024-05-03', 33, 1, 'Equipment'),
(435, '2024-05-04', 33, 1, 'Equipment'),
(436, '2024-05-05', 33, 1, 'Equipment'),
(437, '2024-05-06', 33, 1, 'Equipment'),
(438, '2024-05-02', 25, 3, 'Equipment'),
(439, '2024-05-03', 25, 3, 'Equipment'),
(440, '2024-05-04', 25, 3, 'Equipment'),
(441, '2024-05-02', 29, 1, 'Equipment'),
(442, '2024-05-03', 29, 1, 'Equipment'),
(443, '2024-05-04', 29, 1, 'Equipment'),
(444, '2024-05-05', 29, 1, 'Equipment'),
(445, '2024-05-06', 29, 1, 'Equipment'),
(446, '2024-05-07', 29, 1, 'Equipment'),
(447, '2024-05-08', 29, 1, 'Equipment'),
(448, '2024-05-09', 29, 1, 'Equipment'),
(449, '2024-05-10', 29, 1, 'Equipment'),
(450, '2024-05-11', 29, 1, 'Equipment'),
(451, '2024-05-01', 6, 1, 'Studio'),
(452, '2024-05-02', 6, 1, 'Studio');

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(20) NOT NULL DEFAULT 'Band',
  `brand` varchar(20) NOT NULL DEFAULT 'no brand',
  `model` varchar(20) NOT NULL DEFAULT 'no model',
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `photo_1` varchar(200) NOT NULL,
  `photo_2` varchar(200) NOT NULL,
  `photo_3` varchar(200) NOT NULL,
  `Title` varchar(100) NOT NULL DEFAULT 'Band',
  `Description` varchar(255) NOT NULL,
  `outOfStock` int(2) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warranty` timestamp NULL DEFAULT NULL,
  `videoLink` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephoneNumber` int(11) NOT NULL,
  `memberCount` int(11) NOT NULL,
  `leaderPhoto` varchar(255) NOT NULL,
  `bandPhoto` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `leaderName` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`product_id`, `created_by`, `category`, `brand`, `model`, `unit_price`, `quantity`, `photo_1`, `photo_2`, `photo_3`, `Title`, `Description`, `outOfStock`, `createdDate`, `warranty`, `videoLink`, `instrument`, `email`, `telephoneNumber`, `memberCount`, `leaderPhoto`, `bandPhoto`, `location`, `leaderName`, `status`) VALUES
(7, 51, 'Band', 'no brand', 'no model', 60000, 1, 'IMG-662ac0538d2ae1.78889923.jpg', 'IMG-662ac0538d8d22.25937356.jpg', 'IMG-662ac0538dd314.06854658.jpg', 'Echo Syndicate', 'Professional band with 2 years expirience,', 1, '2024-04-26 06:06:15', NULL, 'Warning:  Undefined array key', 'DrumSet ElectricGuitar Guitar Synthesizer', 'peneloperichardson@gmail.com', 2147483647, 4, 'IMG-662ac0538e14e2.09060024.jpg', 'IMG-662ac0538e59c6.77504697.jpg', 'Colombo', 'Penelope Richardson', 'Active'),
(8, 51, 'Band', 'no brand', 'no model', 24000, 1, 'IMG-662ac17c9aaaa3.56238813.jpg', 'IMG-662ac17c9aefb3.22009074.jpg', 'IMG-662ac17c9b3685.49283238.jpg', 'Crimson Crescendo', 'three piece band , highly recommend for small area parties', 1, '2024-04-26 06:06:17', NULL, 'Warning:  Undefined array key', 'Accordion Cajon Guitar', 'harperreed@gmail.com', 2147483647, 3, 'IMG-662ac17c9b9b73.87029560.jpg', 'IMG-662ac17c9c0251.98337306.jpg', 'Gampaha', 'Harper Reed', 'Active'),
(9, 51, 'Band', 'no brand', 'no model', 120000, 1, 'IMG-662ac2a5072f09.99820188.jpg', 'IMG-662ac2a5078477.53868086.jpg', 'IMG-662ac2a507e226.53477823.jpg', 'Stardust Symphony', 'professional full band for any occation', 1, '2024-04-26 06:06:18', NULL, 'Warning:  Undefined array key', 'DigitalPiano DrumSet ElectricGuitar Guitar Organ Synthesizer', 'sadiewashington@gmail.com', 2147483647, 6, 'IMG-662ac2a50845d1.30516676.jpg', 'IMG-662ac2a508b2d0.52770322.jpg', 'Colombo', 'Sadie Washington', 'Active'),
(10, 51, 'Band', 'no brand', 'no model', 24000, 1, 'IMG-662ac55b65ef27.67829011.jpg', 'IMG-662ac55b663892.42557641.jpg', 'IMG-662ac55b667ff8.47430201.jpg', 'Sapphire Soul', 'mostly for small parties like birthday parties', 1, '2024-04-26 06:06:23', NULL, 'Warning:  Undefined array key', 'DrumSet ElectricGuitar Synthesizer', 'zacharyhughes@gmail.com', 2147483647, 3, 'IMG-662ac55b66cab6.31311350.jpg', 'IMG-662ac55b671a20.11020654.jpg', 'Kandy', 'Zachary Hughes', 'Active'),
(11, 52, 'Band', 'no brand', 'no model', 50000, 1, 'IMG-662ac8a9024af0.07903571.jpg', 'IMG-662ac8a902a061.06965968.jpg', 'IMG-662ac8a902ebc1.41920014.jpg', 'Electric Echoes', 'highly recommend for weddings', 1, '2024-04-26 06:06:24', NULL, 'Warning:  Undefined array key', 'DigitalPiano DrumSet ElectricGuitar Guitar Synthesizer', 'cameronramirez@gmail.com', 2147483647, 5, 'IMG-662ac8a9032cd1.41067060.jpg', 'IMG-662ac8a90aa412.17872801.jpg', 'Kandy', 'Cameron Ramirez', 'Active'),
(12, 52, 'Band', 'no brand', 'no model', 30000, 1, 'IMG-662acae5b94c22.76251529.jpg', 'IMG-662acae5b9a627.16696165.jpg', 'IMG-662acae5b9fb01.88026897.jpg', 'Neon Harmony', 'mostly for weddings , get-togethers etc.', 1, '2024-04-26 06:06:26', NULL, 'Warning:  Undefined array key', 'DrumSet ElectricGuitar Synthesizer', 'brooklyndiaz@gmail.com', 2147483647, 3, 'IMG-662acae5ba3b25.08460889.jpg', 'IMG-662acae5ba8d18.30314583.jpg', 'Nuwara Eliya', 'Brooklyn Diaz', 'Active'),
(13, 52, 'Band', 'no brand', 'no model', 40000, 1, 'IMG-662acc8532ed61.62390553.jpg', 'IMG-662acc85332956.91901821.jpg', 'IMG-662acc85338f05.25673310.jpg', 'Prism Pulse', 'professional band for functions such ad weddings', 1, '2024-04-26 06:06:28', NULL, 'Warning:  Undefined array key', 'DrumSet ElectricGuitar Guitar Synthesizer', 'wyattmorgan@gmail.com', 2147483647, 4, 'IMG-662acc8533ce51.27466578.jpg', 'IMG-662acc85340a75.79284724.jpg', 'Galle', 'Wyatt Morgan', 'Active'),
(14, 53, 'Band', 'no brand', 'no model', 1260000, 1, 'IMG-662ad0322975a7.14053727.jpg', 'IMG-662ad03229f8c5.54884498.jpg', 'IMG-662ad0322a5f31.11682378.jpg', 'Lunar Lullaby', 'professional band for any occation', 1, '2024-04-26 06:06:29', NULL, 'Warning:  Undefined array key', 'DigitalPiano DrumSet ElectricGuitar Guitar Organ Synthesizer', 'zacharyhughes@gmail.com', 2147483647, 6, 'IMG-662ad0322ab8b1.06211990.jpg', 'IMG-662ad0322c0cd2.72134317.jpg', 'Kegalle', 'Zachary Hughes', 'Active'),
(15, 53, 'Band', 'no brand', 'no model', 15000, 1, 'IMG-662ad1a59088c6.78218374.jpg', 'IMG-662ad1a590c795.59029838.jpg', 'IMG-662ad1a59119b9.21003760.jpg', 'Sonic Spectrum', 'play for small functions like birthday parties', 1, '2024-04-26 06:06:31', NULL, 'Warning:  Undefined array key', 'Accordion Cajon Guitar', 'noahbailey@gmail.com', 2147483647, 3, 'IMG-656bdc23223334.62765635.png', 'IMG-662ad1a5916e27.79412993.jpg', 'Colombo', 'Noah Bailey', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmark_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` text NOT NULL,
  `days` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `extra` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_mod_user`
--

CREATE TABLE `chat_mod_user` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `chat_data` text NOT NULL,
  `chat_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inquiryType` text NOT NULL,
  `field_1` text NOT NULL,
  `field_2` text NOT NULL,
  `field_3` text NOT NULL,
  `field_4` text NOT NULL,
  `field_5` text NOT NULL,
  `photo_1` varchar(255) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `placed_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `user_id`, `inquiryType`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `photo_1`, `photo_2`, `photo_3`, `status`, `moderator_id`, `placed_on`) VALUES
(6, 18, 'Billing Issue', 'dyfj', 'hello', '', '', '', 'IMG-656bdc23223334.62765635.png', '', '', 'In-Progress', 1, '2024-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `inq_chat`
--

CREATE TABLE `inq_chat` (
  `inq_chat_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `inquiry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_type`, `user_id`, `date_and_time`, `log_type`, `data`) VALUES
(44, 'Customer', 19, '2024-02-19 15:04:36', 'Logout', 'User logged out'),
(45, 'Customer', 19, '2024-02-20 06:24:28', 'Login', 'User logged in'),
(46, 'Customer', 19, '2024-02-20 06:24:33', 'View Profile', 'User viewed their profile'),
(47, 'Customer', 19, '2024-02-20 06:24:54', 'Password Change', 'User changed their password using change password'),
(48, 'Customer', 19, '2024-02-20 06:24:54', 'Logout', 'User logged out'),
(49, 'Customer', 18, '2024-02-20 06:25:26', 'Login', 'User logged in'),
(50, 'Customer', 18, '2024-02-20 06:25:28', 'View Profile', 'User viewed their profile'),
(51, 'Customer', 18, '2024-02-20 06:26:06', 'Password Change', 'User changed their password using change password'),
(52, 'Customer', 18, '2024-02-20 06:26:06', 'Logout', 'User logged out'),
(53, 'Customer', 18, '2024-02-20 06:26:10', 'Login', 'User logged in'),
(54, 'Customer', 18, '2024-02-20 06:32:12', 'Logout', 'User logged out'),
(55, 'Customer', 19, '2024-02-20 06:32:19', 'Login', 'User logged in'),
(56, 'Customer', 19, '2024-02-20 06:32:34', 'View Profile', 'User viewed their profile'),
(57, 'Customer', 19, '2024-02-20 06:33:01', 'Password Change', 'User changed their password using change password'),
(58, 'Customer', 19, '2024-02-20 06:33:01', 'Logout', 'User logged out'),
(59, 'Customer', 19, '2024-02-20 06:33:04', 'Login', 'User logged in'),
(60, 'Customer', 18, '2024-02-22 20:11:30', 'Login', 'User logged in'),
(61, 'Customer', 18, '2024-02-22 20:11:45', 'View Instruments', 'User viewed the instruments available'),
(62, 'Customer', 18, '2024-02-22 20:11:48', 'View Instrument', 'User viewed an instrument with product id 24'),
(63, 'Customer', 18, '2024-02-22 20:11:57', 'Check Availability', 'User checked the availability of an Equipment  with product id 24'),
(64, 'Customer', 18, '2024-02-22 20:11:59', 'Add to Cart', 'User added an Instrument to the cart with the id of 24'),
(65, 'Customer', 18, '2024-02-22 20:11:59', 'View Instrument', 'User viewed an instrument with product id 24'),
(66, 'Customer', 18, '2024-02-22 20:12:00', 'View Cart', 'User viewed their cart'),
(67, 'Customer', 18, '2024-02-22 20:12:02', 'View Instrument', 'User viewed an instrument with product id 24'),
(68, 'Customer', 18, '2024-02-22 20:12:05', 'View Profile', 'User viewed their profile'),
(69, 'Customer', 18, '2024-02-22 20:12:10', 'View Orders', 'User viewed their orders'),
(70, 'Customer', 18, '2024-02-22 20:12:10', 'View Instruments', 'User viewed the instruments available'),
(71, 'Customer', 18, '2024-02-22 20:12:14', 'View Orders', 'User viewed their orders'),
(72, 'Customer', 18, '2024-02-22 20:12:14', 'View Instruments', 'User viewed the instruments available'),
(73, 'Customer', 18, '2024-02-22 20:12:16', 'View Orders', 'User viewed their orders'),
(74, 'Customer', 18, '2024-02-22 20:12:16', 'View Instruments', 'User viewed the instruments available'),
(75, 'Customer', 18, '2024-02-22 20:12:20', 'View Inquiries', 'User viewed their inquiries'),
(76, 'Customer', 18, '2024-02-22 20:12:58', 'View Instruments', 'User viewed the instruments available'),
(77, 'Customer', 18, '2024-02-22 20:12:59', 'View Instrument', 'User viewed an instrument with product id 18'),
(78, 'Customer', 18, '2024-02-22 20:13:08', 'View Singers', 'User viewed the singers available'),
(79, 'Customer', 18, '2024-02-22 20:13:58', 'View Instruments', 'User viewed the instruments available'),
(80, 'Customer', 18, '2024-02-22 20:14:38', 'View Instrument', 'User viewed an instrument with product id 17'),
(81, 'Customer', 18, '2024-02-22 20:15:29', 'View Instruments', 'User viewed the instruments available'),
(82, 'Customer', 18, '2024-02-22 20:15:30', 'View Instrument', 'User viewed an instrument with product id 18'),
(83, 'Customer', 18, '2024-02-22 20:16:05', 'View Singers', 'User viewed the singers available'),
(84, 'Customer', 18, '2024-02-22 20:16:14', 'View Profile', 'User viewed their profile'),
(85, 'Customer', 18, '2024-02-22 20:17:23', 'View Orders', 'User viewed their orders'),
(86, 'Customer', 18, '2024-02-22 20:17:24', 'View Instruments', 'User viewed the instruments available'),
(87, 'Customer', 18, '2024-02-22 20:17:28', 'View Instruments', 'User viewed the instruments available'),
(88, 'Customer', 18, '2024-02-22 20:17:32', 'View Cart', 'User viewed their cart'),
(89, 'Customer', 18, '2024-02-22 20:17:35', 'View Instruments', 'User viewed the instruments available'),
(90, 'Customer', 18, '2024-02-22 20:17:53', 'View Instruments', 'User viewed the instruments available'),
(91, 'Customer', 18, '2024-02-22 20:18:17', 'View Musicians', 'User viewed the musicians available'),
(92, 'Customer', 18, '2024-02-22 20:18:24', 'View Bands', 'User viewed the bands available'),
(93, 'Customer', 18, '2024-02-22 20:18:30', 'View Studios', 'User viewed the studios available'),
(94, 'Customer', 18, '2024-02-22 20:18:46', 'View Studios', 'User viewed the studios available'),
(95, 'Customer', 18, '2024-02-22 20:18:49', 'View Studio', 'User viewed an studio with product id 3'),
(96, 'Customer', 18, '2024-02-22 20:20:00', 'View Profile', 'User viewed their profile'),
(97, 'Customer', 18, '2024-02-22 20:20:19', 'View Orders', 'User viewed their orders'),
(98, 'Customer', 18, '2024-02-22 20:20:20', 'View Instruments', 'User viewed the instruments available'),
(99, 'Customer', 18, '2024-02-23 06:12:33', 'Login', 'User logged in'),
(100, 'Customer', 18, '2024-02-23 06:12:35', 'View Orders', 'User viewed their orders'),
(101, 'Customer', 18, '2024-02-23 06:12:36', 'View Instruments', 'User viewed the instruments available'),
(102, 'Customer', 18, '2024-02-23 06:12:42', 'Order Cancel', 'User cancelled an order with order id: 24 and sub order id: 48'),
(103, 'Customer', 18, '2024-02-23 06:12:42', 'View Orders', 'User viewed their orders'),
(104, 'Customer', 18, '2024-02-23 06:12:42', 'View Instruments', 'User viewed the instruments available'),
(105, 'Customer', 18, '2024-02-23 06:13:14', 'Manage Cart', 'User viewed their cart'),
(106, 'Customer', 18, '2024-02-23 06:13:18', 'Place Order', 'User placed an order'),
(107, 'Customer', 18, '2024-02-23 06:13:20', 'Logout', 'User logged out'),
(108, 'Service Provider', 14, '2024-02-23 06:13:28', 'View Orders', 'Service Provider has viewed their orders'),
(109, 'Service Provider', 14, '2024-02-23 06:13:34', 'Logout', 'Service Provider has logged out'),
(110, 'Service Provider', 18, '2024-02-23 06:13:43', 'View Orders', 'Service Provider has viewed their orders'),
(111, 'Service Provider', 18, '2024-02-23 06:13:48', 'View Orders', 'Service Provider has viewed their orders'),
(112, 'Customer', 18, '2024-02-24 03:35:56', 'Login', 'User logged in'),
(113, 'Customer', 18, '2024-02-24 03:35:59', 'View Instruments', 'User viewed the instruments available'),
(114, 'Customer', 18, '2024-02-24 03:36:22', 'View Instrument', 'User viewed an instrument with product id 17'),
(115, 'Customer', 18, '2024-02-24 03:36:29', 'Check Availability', 'User checked the availability of an Equipment  with product id 17'),
(116, 'Customer', 18, '2024-02-24 03:36:31', 'Manage Cart', 'User added an Instrument to the cart with the id of 17'),
(117, 'Customer', 18, '2024-02-24 03:36:31', 'View Instrument', 'User viewed an instrument with product id 17'),
(118, 'Customer', 18, '2024-02-24 03:36:44', 'View Instruments', 'User viewed the instruments available'),
(119, 'Customer', 18, '2024-02-24 03:36:47', 'View Instrument', 'User viewed an instrument with product id 20'),
(120, 'Customer', 18, '2024-02-24 03:36:55', 'Check Availability', 'User checked the availability of an Equipment  with product id 20'),
(121, 'Customer', 18, '2024-02-24 03:36:57', 'Manage Cart', 'User added an Instrument to the cart with the id of 20'),
(122, 'Customer', 18, '2024-02-24 03:36:57', 'View Instrument', 'User viewed an instrument with product id 20'),
(123, 'Customer', 18, '2024-02-24 03:36:58', 'Manage Cart', 'User viewed their cart'),
(124, 'Customer', 18, '2024-02-24 03:37:01', 'Place Order', 'User placed an order'),
(125, 'Customer', 18, '2024-02-24 03:37:12', 'View Orders', 'User viewed their orders'),
(126, 'Customer', 18, '2024-02-24 03:37:12', 'View Instruments', 'User viewed the instruments available'),
(127, 'Customer', 18, '2024-02-24 03:37:30', 'Order Cancel', 'User cancelled an order with order id: 26 and sub order id: 50'),
(128, 'Customer', 18, '2024-02-24 03:37:30', 'View Orders', 'User viewed their orders'),
(129, 'Customer', 18, '2024-02-24 03:37:30', 'View Instruments', 'User viewed the instruments available'),
(130, 'Service Provider', 14, '2024-02-24 03:41:26', 'View Orders', 'Service Provider has viewed their orders'),
(131, 'Service Provider', 14, '2024-02-24 03:48:06', 'View Orders', 'Service Provider has viewed their orders'),
(132, 'Service Provider', 14, '2024-02-24 03:48:11', 'View Orders', 'Service Provider has viewed their orders'),
(133, 'Service Provider', 14, '2024-02-24 03:48:32', 'View Orders', 'Service Provider has viewed their orders'),
(134, 'Service Provider', 14, '2024-02-24 03:50:13', 'View Orders', 'Service Provider has viewed their orders'),
(135, 'Service Provider', 14, '2024-02-24 03:50:16', 'View Orders', 'Service Provider has viewed their orders'),
(136, 'Service Provider', 14, '2024-02-24 03:50:36', 'View Orders', 'Service Provider has viewed their orders'),
(137, 'Service Provider', 14, '2024-02-24 03:50:37', 'View Orders', 'Service Provider has viewed their orders'),
(138, 'Service Provider', 14, '2024-02-24 03:50:39', 'View Orders', 'Service Provider has viewed their orders'),
(139, 'Service Provider', 14, '2024-02-24 03:51:06', 'View Orders', 'Service Provider has viewed their orders'),
(140, 'Service Provider', 14, '2024-02-24 04:57:46', 'Reject Order', 'Service Provider has rejected an order with the ID 52'),
(141, 'Service Provider', 14, '2024-02-24 04:57:46', 'View Orders', 'Service Provider has viewed their orders'),
(142, 'Service Provider', 14, '2024-02-24 04:59:30', 'View Orders', 'Service Provider has viewed their orders'),
(143, 'Service Provider', 14, '2024-02-24 05:04:29', 'Reject Order', 'Service Provider has rejected an order with the ID 52'),
(144, 'Service Provider', 14, '2024-02-24 05:04:34', 'Reject Order', 'Service Provider has rejected an order with the ID 52'),
(145, 'Service Provider', 14, '2024-02-24 05:04:34', 'View Orders', 'Service Provider has viewed their orders'),
(146, 'Customer', 18, '2024-02-24 05:28:33', 'Logout', 'User logged out'),
(147, 'Customer', 18, '2024-02-24 05:28:42', 'Login', 'User logged in'),
(148, 'Customer', 18, '2024-02-24 05:28:44', 'View Orders', 'User viewed their orders'),
(149, 'Customer', 18, '2024-02-24 05:28:45', 'View Instruments', 'User viewed the instruments available'),
(150, 'Customer', 18, '2024-02-24 05:29:04', 'Order Cancel', 'User cancelled an order with order id: 27 and sub order id: 53'),
(151, 'Customer', 18, '2024-02-24 05:29:04', 'View Orders', 'User viewed their orders'),
(152, 'Customer', 18, '2024-02-24 05:29:04', 'View Instruments', 'User viewed the instruments available'),
(153, 'Customer', 18, '2024-02-24 05:38:43', 'Logout', 'User logged out'),
(154, 'Customer', 26, '2024-02-24 05:59:38', 'Registration', 'User registered - Waiting for verification'),
(155, 'Customer', 26, '2024-02-24 06:00:12', 'Login', 'User logged in'),
(156, 'Customer', 26, '2024-02-24 06:00:15', 'Logout', 'User logged out'),
(157, 'Service Provider', 14, '2024-02-24 06:07:59', 'Logout', 'Service Provider has logged out'),
(158, 'Moderator', 1, '2024-02-24 06:08:11', 'Login', 'Moderator logged in'),
(159, 'Moderator', 1, '2024-02-24 06:08:18', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(160, 'Moderator', 1, '2024-02-24 06:18:07', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(161, 'Moderator', 1, '2024-02-24 06:20:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(162, 'Moderator', 1, '2024-02-24 06:27:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(163, 'Moderator', 1, '2024-02-24 06:28:03', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(164, 'Moderator', 1, '2024-02-24 06:28:41', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(165, 'Moderator', 1, '2024-02-24 06:29:22', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(166, 'Moderator', 1, '2024-02-24 06:30:01', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(167, 'Moderator', 1, '2024-02-24 06:30:02', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(168, 'Moderator', 1, '2024-02-24 06:30:02', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(169, 'Moderator', 1, '2024-02-24 06:30:02', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(170, 'Moderator', 1, '2024-02-24 06:30:02', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(171, 'Moderator', 1, '2024-02-24 06:30:03', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(172, 'Moderator', 1, '2024-02-24 06:30:24', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(173, 'Moderator', 1, '2024-02-24 06:30:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(174, 'Moderator', 1, '2024-02-24 06:30:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(175, 'Moderator', 1, '2024-02-24 06:30:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(176, 'Moderator', 1, '2024-02-24 06:35:19', 'Login', 'Moderator logged in'),
(177, 'Moderator', 1, '2024-02-24 06:35:22', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(178, 'Moderator', 1, '2024-02-24 06:36:06', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(179, 'Moderator', 1, '2024-02-24 06:37:13', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(180, 'Moderator', 1, '2024-02-24 06:39:24', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(181, 'Moderator', 1, '2024-02-24 06:39:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(182, 'Moderator', 1, '2024-02-24 06:39:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(183, 'Moderator', 1, '2024-02-24 06:39:25', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(184, 'Moderator', 1, '2024-02-24 06:39:26', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(185, 'Moderator', 1, '2024-02-24 06:39:26', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(186, 'Moderator', 1, '2024-02-24 06:44:00', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(187, 'Moderator', 1, '2024-02-24 06:44:26', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(188, 'Moderator', 1, '2024-02-24 06:46:17', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(189, 'Moderator', 1, '2024-02-24 06:46:18', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(190, 'Moderator', 1, '2024-02-24 06:46:43', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(191, 'Moderator', 1, '2024-02-25 05:02:19', 'Login', 'Moderator logged in'),
(192, 'Moderator', 1, '2024-02-25 05:02:21', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(193, 'Moderator', 1, '2024-02-25 05:02:22', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(194, 'Moderator', 1, '2024-02-25 05:02:43', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(195, 'Moderator', 1, '2024-02-25 05:26:02', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(196, 'Moderator', 1, '2024-02-25 05:26:32', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(197, 'Moderator', 1, '2024-02-25 05:31:43', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(198, 'Moderator', 1, '2024-02-25 05:31:59', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(199, 'Moderator', 1, '2024-02-25 05:37:32', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(200, 'Moderator', 1, '2024-02-25 05:38:50', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(201, 'Moderator', 1, '2024-02-25 05:40:22', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(202, 'Moderator', 1, '2024-02-25 05:42:23', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(203, 'Moderator', 1, '2024-02-25 05:49:16', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(204, 'Moderator', 1, '2024-02-25 05:49:32', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(205, 'Moderator', 1, '2024-02-25 06:03:38', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(206, 'Moderator', 1, '2024-02-25 06:04:57', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(207, 'Moderator', 1, '2024-02-25 06:11:28', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(208, 'Moderator', 1, '2024-02-25 06:16:44', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(209, 'Moderator', 1, '2024-02-25 06:18:02', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(210, 'Moderator', 1, '2024-02-25 06:18:21', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(211, 'Moderator', 1, '2024-02-25 06:20:11', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(212, 'Moderator', 1, '2024-02-25 06:22:02', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(213, 'Moderator', 1, '2024-02-25 06:23:01', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(214, 'Moderator', 1, '2024-02-25 06:23:52', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(215, 'Moderator', 1, '2024-02-25 06:24:32', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(216, 'Moderator', 1, '2024-02-25 06:25:51', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(217, 'Moderator', 1, '2024-02-25 06:26:09', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(218, 'Moderator', 1, '2024-02-25 06:28:22', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(219, 'Moderator', 1, '2024-02-25 06:29:39', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(220, 'Moderator', 1, '2024-02-25 06:30:27', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(221, 'Moderator', 1, '2024-02-25 06:30:27', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(222, 'Moderator', 1, '2024-02-25 06:30:27', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(223, 'Moderator', 1, '2024-02-25 06:32:33', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(224, 'Moderator', 1, '2024-02-25 06:32:34', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(225, 'Moderator', 1, '2024-02-25 06:32:34', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(226, 'Moderator', 1, '2024-02-25 06:32:34', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(227, 'Moderator', 1, '2024-02-25 06:33:50', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(228, 'Moderator', 1, '2024-02-25 06:36:59', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(229, 'Moderator', 1, '2024-02-25 06:36:59', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(230, 'Moderator', 1, '2024-02-25 06:36:59', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(231, 'Moderator', 1, '2024-02-25 06:36:59', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(232, 'Moderator', 1, '2024-02-25 06:40:44', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(233, 'Moderator', 1, '2024-02-25 06:40:44', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(234, 'Moderator', 1, '2024-02-25 06:40:44', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(235, 'Moderator', 1, '2024-02-25 06:43:49', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(236, 'Moderator', 1, '2024-02-25 06:43:50', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(237, 'Moderator', 1, '2024-02-25 06:43:50', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(238, 'Moderator', 1, '2024-02-25 06:44:10', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(239, 'Moderator', 1, '2024-02-25 07:05:25', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(240, 'Moderator', 1, '2024-02-25 07:05:27', 'Manage Recover Requests', 'Moderator viewed recover request 6 details'),
(241, 'Moderator', 1, '2024-02-25 07:07:05', 'Manage Recover Requests', 'Moderator viewed recover request 6 details'),
(242, 'Moderator', 1, '2024-02-25 07:07:07', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(243, 'Moderator', 1, '2024-02-25 07:07:09', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(244, 'Moderator', 1, '2024-02-25 07:09:59', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(245, 'Moderator', 1, '2024-02-25 07:10:14', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(246, 'Moderator', 1, '2024-02-25 07:11:19', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(247, 'Moderator', 1, '2024-02-25 07:11:57', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(248, 'Moderator', 1, '2024-02-25 07:13:10', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(249, 'Moderator', 1, '2024-02-25 07:15:18', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(250, 'Moderator', 1, '2024-02-25 07:16:13', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(251, 'Moderator', 1, '2024-02-25 07:17:08', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(252, 'Moderator', 1, '2024-02-25 07:17:23', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(253, 'Moderator', 1, '2024-02-25 07:17:50', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(254, 'Moderator', 1, '2024-02-25 08:49:24', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(255, 'Moderator', 1, '2024-02-25 08:51:41', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(256, 'Moderator', 1, '2024-02-25 08:51:43', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(257, 'Moderator', 1, '2024-02-25 08:51:43', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(258, 'Moderator', 1, '2024-02-25 08:51:54', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(259, 'Moderator', 1, '2024-02-25 08:53:13', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(260, 'Moderator', 1, '2024-02-25 08:53:14', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(261, 'Moderator', 1, '2024-02-25 08:53:20', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(262, 'Moderator', 1, '2024-02-25 08:53:30', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(263, 'Moderator', 1, '2024-02-25 08:53:30', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(264, 'Moderator', 1, '2024-02-25 08:53:39', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(265, 'Moderator', 1, '2024-02-25 09:20:17', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(266, 'Moderator', 1, '2024-02-25 09:20:20', 'View Service Providers', 'Moderator viewed active service providers'),
(267, 'Moderator', 1, '2024-02-25 09:20:21', 'View Users', 'Moderator viewed active users'),
(268, 'Moderator', 1, '2024-02-25 09:20:26', 'Manage Users', 'Moderator viewed user 18 details'),
(269, 'Moderator', 1, '2024-02-25 09:20:38', 'Ban User', 'Moderator banned user 18'),
(270, 'Moderator', 1, '2024-02-25 09:20:38', 'View Users', 'Moderator viewed banned users'),
(271, 'Moderator', 1, '2024-02-25 09:20:53', 'Manage Users', 'Moderator viewed user 18 details'),
(272, 'Moderator', 1, '2024-02-25 09:20:58', 'Unban User', 'Moderator lifted the ban on user 18'),
(273, 'Moderator', 1, '2024-02-25 09:20:58', 'View Users', 'Moderator viewed active users'),
(274, 'Moderator', 1, '2024-02-25 09:21:33', 'View Service Providers', 'Moderator viewed active service providers'),
(275, 'Moderator', 1, '2024-02-25 09:21:35', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(276, 'Moderator', 1, '2024-02-25 09:22:32', 'Ban Service Provider', 'Moderator banned service provider 14 with reason ban reason'),
(277, 'Moderator', 1, '2024-02-25 09:22:32', 'View Service Providers', 'Moderator viewed banned service providers'),
(278, 'Moderator', 1, '2024-02-25 09:23:03', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(279, 'Moderator', 1, '2024-02-25 09:23:31', 'Unban Service Provider', 'Moderator lifted the ban on service provider 14'),
(280, 'Moderator', 1, '2024-02-25 09:23:31', 'View Service Providers', 'Moderator viewed active service providers'),
(281, 'Moderator', 1, '2024-02-25 09:23:47', 'View Users', 'Moderator viewed banned users'),
(282, 'Moderator', 1, '2024-02-25 09:23:48', 'View Users', 'Moderator viewed deactivated users'),
(283, 'Moderator', 1, '2024-02-25 09:23:49', 'View Service Providers', 'Moderator viewed banned service providers'),
(284, 'Moderator', 1, '2024-02-25 09:23:50', 'View Service Providers', 'Moderator viewed deactivated service providers'),
(285, 'Moderator', 1, '2024-02-25 09:23:51', 'View Service Providers', 'Moderator viewed banned service providers'),
(286, 'Moderator', 1, '2024-02-25 09:24:14', 'Manage Recover Requests', 'Moderator viewed rejected recover requests'),
(287, 'Moderator', 1, '2024-02-25 09:24:26', 'Manage Recover Requests', 'Moderator viewed recover request 4 details'),
(288, 'Moderator', 1, '2024-02-25 09:24:33', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(289, 'Moderator', 1, '2024-02-25 09:24:35', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(290, 'Moderator', 1, '2024-02-25 09:24:40', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(291, 'Moderator', 1, '2024-02-25 09:24:42', 'Manage Recover Requests', 'Moderator viewed recover request 6 details'),
(292, 'Moderator', 1, '2024-02-25 09:24:47', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(293, 'Moderator', 1, '2024-02-25 09:24:48', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(294, 'Moderator', 1, '2024-02-25 09:25:28', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(295, 'Moderator', 1, '2024-02-25 09:25:29', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(296, 'Moderator', 1, '2024-02-25 09:25:51', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(297, 'Moderator', 1, '2024-02-25 09:25:52', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(298, 'Moderator', 1, '2024-02-25 09:26:09', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(299, 'Moderator', 1, '2024-02-25 09:26:12', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(300, 'Customer', 18, '2024-02-27 06:03:26', 'Login', 'User logged in'),
(301, 'Customer', 18, '2024-02-27 06:03:30', 'View Instruments', 'User viewed the instruments available'),
(302, 'Customer', 18, '2024-02-27 06:03:46', 'Manage Cart', 'User viewed their cart'),
(303, 'Customer', 18, '2024-02-27 06:04:53', 'Manage Cart', 'User viewed their cart'),
(304, 'Customer', 18, '2024-02-27 06:05:49', 'Manage Cart', 'User viewed their cart'),
(305, 'Customer', 18, '2024-02-27 06:05:54', 'View Instruments', 'User viewed the instruments available'),
(306, 'Customer', 18, '2024-02-27 06:05:56', 'View Instrument', 'User viewed an instrument with product id 17'),
(307, 'Customer', 18, '2024-02-27 06:06:01', 'View Instruments', 'User viewed the instruments available'),
(308, 'Customer', 18, '2024-02-27 06:06:06', 'View Orders', 'User viewed their orders'),
(309, 'Customer', 18, '2024-02-27 06:06:07', 'View Instruments', 'User viewed the instruments available'),
(310, 'Customer', 18, '2024-02-27 06:07:21', 'Manage Cart', 'User viewed their cart'),
(311, 'Customer', 18, '2024-02-27 06:07:32', 'View Instruments', 'User viewed the instruments available'),
(312, 'Customer', 18, '2024-02-27 06:08:10', 'View Instruments', 'User viewed the instruments available'),
(313, 'Customer', 18, '2024-02-27 06:08:18', 'View Instruments', 'User viewed the instruments available'),
(314, 'Customer', 18, '2024-02-27 06:08:18', 'View Instruments', 'User viewed the instruments available'),
(315, 'Customer', 18, '2024-02-27 06:08:20', 'View Instrument', 'User viewed an instrument with product id 18'),
(316, 'Customer', 18, '2024-02-27 06:08:22', 'View Instruments', 'User viewed the instruments available'),
(317, 'Customer', 18, '2024-02-27 06:08:30', 'Manage Cart', 'User viewed their cart'),
(318, 'Customer', 18, '2024-02-27 06:08:36', 'View Instruments', 'User viewed the instruments available'),
(319, 'Customer', 18, '2024-02-27 06:08:38', 'View Instrument', 'User viewed an instrument with product id 17'),
(320, 'Customer', 18, '2024-02-27 06:08:48', 'Check Availability', 'User checked the availability of an Equipment  with product id 17'),
(321, 'Customer', 18, '2024-02-27 06:09:00', 'Check Availability', 'User checked the availability of an Equipment  with product id 17'),
(322, 'Customer', 18, '2024-02-27 06:09:07', 'Manage Cart', 'User added an Instrument to the cart with the id of 17'),
(323, 'Customer', 18, '2024-02-27 06:09:07', 'View Instrument', 'User viewed an instrument with product id 17'),
(324, 'Customer', 18, '2024-02-27 06:09:09', 'Manage Cart', 'User viewed their cart'),
(325, 'Customer', 18, '2024-02-27 06:09:20', 'View Studios', 'User viewed the studios available'),
(326, 'Customer', 18, '2024-02-27 06:09:21', 'View Studio', 'User viewed an studio with product id 3'),
(327, 'Customer', 18, '2024-02-27 06:09:27', 'Check Availability', 'User checked the availability of an Studio  with product id 3'),
(328, 'Customer', 18, '2024-02-27 06:09:28', 'Manage Cart', 'User added a Studio to the cart with the id of 3'),
(329, 'Customer', 18, '2024-02-27 06:09:28', 'View Studio', 'User viewed an studio with product id 3'),
(330, 'Customer', 18, '2024-02-27 06:09:30', 'Manage Cart', 'User viewed their cart'),
(331, 'Customer', 18, '2024-02-27 06:16:32', 'Manage Cart', 'User viewed their cart'),
(332, 'Customer', 18, '2024-02-27 06:16:34', 'Manage Cart', 'User viewed their cart'),
(333, 'Customer', 18, '2024-02-27 06:16:35', 'Manage Cart', 'User viewed their cart'),
(334, 'Customer', 18, '2024-02-27 06:16:59', 'Place Order', 'User placed an order'),
(335, 'Customer', 18, '2024-02-27 06:17:33', 'View Orders', 'User viewed their orders'),
(336, 'Customer', 18, '2024-02-27 06:17:34', 'View Instruments', 'User viewed the instruments available'),
(337, 'Customer', 18, '2024-02-27 06:17:37', 'View Orders', 'User viewed their orders'),
(338, 'Customer', 18, '2024-02-27 06:17:37', 'View Instruments', 'User viewed the instruments available'),
(339, 'Customer', 18, '2024-02-27 06:22:02', 'View Orders', 'User viewed their orders'),
(340, 'Customer', 18, '2024-02-27 06:22:03', 'View Instruments', 'User viewed the instruments available'),
(341, 'Customer', 18, '2024-02-27 06:22:03', 'View Orders', 'User viewed their orders'),
(342, 'Customer', 18, '2024-02-27 06:22:03', 'View Instruments', 'User viewed the instruments available'),
(343, 'Customer', 18, '2024-02-27 06:22:20', 'View Orders', 'User viewed their orders'),
(344, 'Customer', 18, '2024-02-27 06:22:20', 'View Instruments', 'User viewed the instruments available'),
(345, 'Customer', 18, '2024-02-27 06:22:21', 'View Orders', 'User viewed their orders'),
(346, 'Customer', 18, '2024-02-27 06:22:21', 'View Instruments', 'User viewed the instruments available'),
(347, 'Customer', 18, '2024-02-27 06:22:21', 'View Orders', 'User viewed their orders'),
(348, 'Customer', 18, '2024-02-27 06:22:22', 'View Instruments', 'User viewed the instruments available'),
(349, 'Customer', 18, '2024-02-27 06:22:22', 'View Orders', 'User viewed their orders'),
(350, 'Customer', 18, '2024-02-27 06:22:22', 'View Instruments', 'User viewed the instruments available'),
(351, 'Customer', 18, '2024-02-27 06:22:24', 'View Orders', 'User viewed their orders'),
(352, 'Customer', 18, '2024-02-27 06:22:24', 'View Instruments', 'User viewed the instruments available'),
(353, 'Customer', 18, '2024-02-27 06:27:48', 'View Orders', 'User viewed their orders'),
(354, 'Customer', 18, '2024-02-27 06:27:57', 'View Orders', 'User viewed their orders'),
(355, 'Customer', 18, '2024-02-27 06:27:58', 'View Orders', 'User viewed their orders'),
(356, 'Customer', 18, '2024-02-27 06:28:29', 'View Orders', 'User viewed their orders'),
(357, 'Customer', 18, '2024-02-27 06:28:30', 'View Instruments', 'User viewed the instruments available'),
(358, 'Customer', 18, '2024-02-27 06:31:03', 'View Orders', 'User viewed their orders'),
(359, 'Customer', 18, '2024-02-27 06:31:03', 'View Instruments', 'User viewed the instruments available'),
(360, 'Customer', 18, '2024-02-27 06:34:32', 'View Orders', 'User viewed their orders'),
(361, 'Customer', 18, '2024-02-27 06:34:33', 'View Instruments', 'User viewed the instruments available'),
(362, 'Customer', 18, '2024-02-27 06:40:41', 'View Orders', 'User viewed their orders'),
(363, 'Customer', 18, '2024-02-27 06:40:41', 'View Instruments', 'User viewed the instruments available'),
(364, 'Customer', 18, '2024-02-27 06:42:25', 'View Orders', 'User viewed their orders'),
(365, 'Customer', 18, '2024-02-27 06:42:25', 'View Instruments', 'User viewed the instruments available'),
(366, 'Customer', 18, '2024-02-27 06:43:25', 'View Orders', 'User viewed their orders'),
(367, 'Customer', 18, '2024-02-27 06:43:25', 'View Instruments', 'User viewed the instruments available'),
(368, 'Customer', 18, '2024-02-27 06:44:08', 'View Orders', 'User viewed their orders'),
(369, 'Customer', 18, '2024-02-27 06:44:08', 'View Instruments', 'User viewed the instruments available'),
(370, 'Customer', 18, '2024-02-27 06:44:22', 'View Orders', 'User viewed their orders'),
(371, 'Customer', 18, '2024-02-27 06:44:22', 'View Instruments', 'User viewed the instruments available'),
(372, 'Customer', 18, '2024-02-27 06:54:53', 'View Orders', 'User viewed their orders'),
(373, 'Customer', 18, '2024-02-27 06:54:54', 'View Instruments', 'User viewed the instruments available'),
(374, 'Customer', 18, '2024-02-27 06:56:33', 'View Orders', 'User viewed their orders'),
(375, 'Customer', 18, '2024-02-27 06:56:33', 'View Instruments', 'User viewed the instruments available'),
(376, 'Customer', 18, '2024-02-27 06:56:54', 'View Instruments', 'User viewed the instruments available'),
(377, 'Customer', 18, '2024-02-27 06:56:55', 'View Instrument', 'User viewed an instrument with product id 18'),
(378, 'Customer', 18, '2024-02-27 06:57:00', 'View Instruments', 'User viewed the instruments available'),
(379, 'Customer', 18, '2024-02-27 06:57:01', 'View Instrument', 'User viewed an instrument with product id 20'),
(380, 'Customer', 18, '2024-02-27 06:57:05', 'View Instruments', 'User viewed the instruments available'),
(381, 'Customer', 18, '2024-02-27 07:00:39', 'View Instruments', 'User viewed the instruments available'),
(382, 'Customer', 18, '2024-02-27 07:00:39', 'View Orders', 'User viewed their orders'),
(383, 'Customer', 18, '2024-02-27 07:00:39', 'View Instruments', 'User viewed the instruments available'),
(384, 'Customer', 18, '2024-02-27 07:00:41', 'View Instrument', 'User viewed an instrument with product id 23'),
(385, 'Customer', 18, '2024-02-27 07:00:43', 'View Orders', 'User viewed their orders'),
(386, 'Customer', 18, '2024-02-27 07:00:43', 'View Instruments', 'User viewed the instruments available'),
(387, 'Customer', 18, '2024-02-27 07:00:46', 'View Instrument', 'User viewed an instrument with product id 21'),
(388, 'Customer', 18, '2024-02-27 07:00:48', 'View Orders', 'User viewed their orders'),
(389, 'Customer', 18, '2024-02-27 07:00:48', 'View Instruments', 'User viewed the instruments available'),
(390, 'Customer', 18, '2024-02-27 07:00:54', 'View Instrument', 'User viewed an instrument with product id 17'),
(391, 'Customer', 18, '2024-02-27 07:00:57', 'View Orders', 'User viewed their orders'),
(392, 'Customer', 18, '2024-02-27 07:00:57', 'View Instruments', 'User viewed the instruments available'),
(393, 'Customer', 18, '2024-02-27 07:03:29', 'View Orders', 'User viewed their orders'),
(394, 'Customer', 18, '2024-02-27 07:03:30', 'View Instruments', 'User viewed the instruments available'),
(395, 'Customer', 18, '2024-02-27 07:14:47', 'Logout', 'User logged out'),
(396, 'Service Provider', 14, '2024-02-27 07:14:54', 'View Orders', 'Service Provider has viewed their orders'),
(397, 'Service Provider', 14, '2024-02-27 07:15:42', 'View Orders', 'Service Provider has viewed their orders'),
(398, 'Service Provider', 14, '2024-02-27 07:17:21', 'View Orders', 'Service Provider has viewed their orders'),
(399, 'Service Provider', 14, '2024-02-27 07:18:02', 'View Orders', 'Service Provider has viewed their orders'),
(400, 'Service Provider', 14, '2024-02-27 07:19:09', 'View Orders', 'Service Provider has viewed their orders'),
(401, 'Service Provider', 14, '2024-02-27 07:21:12', 'View Orders', 'Service Provider has viewed their orders'),
(402, 'Service Provider', 14, '2024-02-27 07:21:15', 'View Orders', 'Service Provider has viewed their orders'),
(403, 'Service Provider', 14, '2024-02-27 07:21:19', 'View Orders', 'Service Provider has viewed their orders'),
(404, 'Service Provider', 14, '2024-02-27 07:21:42', 'View Orders', 'Service Provider has viewed their orders'),
(405, 'Service Provider', 14, '2024-02-27 07:21:57', 'View Orders', 'Service Provider has viewed their orders'),
(406, 'Service Provider', 14, '2024-02-27 07:21:59', 'Manage Profile', 'Service Provider has viewed their profile'),
(407, 'Service Provider', 14, '2024-02-27 07:22:02', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(408, 'Service Provider', 14, '2024-02-27 07:22:02', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(409, 'Service Provider', 14, '2024-02-27 07:22:06', 'View Musician', 'Service Provider has viewed the details of a Musician with th ID 15'),
(410, 'Service Provider', 14, '2024-02-27 07:22:06', 'View Musician', 'Service Provider has failed to view the details of a Musician with th ID app.js'),
(411, 'Service Provider', 14, '2024-02-27 07:22:10', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(412, 'Service Provider', 14, '2024-02-27 07:22:10', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(413, 'Service Provider', 14, '2024-02-27 07:22:23', 'Logout', 'Service Provider has logged out'),
(414, 'Moderator', 1, '2024-02-27 07:22:30', 'Login', 'Moderator logged in'),
(415, 'Moderator', 1, '2024-02-27 07:22:35', 'View Service Providers', 'Moderator viewed active service providers'),
(416, 'Moderator', 1, '2024-02-27 07:22:36', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(417, 'Moderator', 1, '2024-02-27 07:22:37', 'View Service Provider Orders', 'Moderator viewed service provider 14 orders'),
(418, 'Moderator', 1, '2024-02-27 07:23:10', 'View Users', 'Moderator viewed active users'),
(419, 'Moderator', 1, '2024-02-27 07:23:11', 'Manage Users', 'Moderator viewed user 18 details'),
(420, 'Moderator', 1, '2024-02-27 07:23:12', 'View User Orders', 'Moderator viewed user 18 orders'),
(421, 'Moderator', 1, '2024-02-27 07:24:28', 'Manage Service Provider Requests', 'Moderator viewed pending service provider requests'),
(422, 'Moderator', 1, '2024-02-27 07:24:30', 'View Users', 'Moderator viewed active users'),
(423, 'Moderator', 1, '2024-02-27 07:24:37', 'View Users', 'Moderator viewed deactivated users'),
(424, 'Moderator', 1, '2024-02-27 07:24:42', 'Manage Recover Requests', 'Moderator viewed rejected recover requests'),
(425, 'Moderator', 1, '2024-02-27 07:24:45', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(426, 'Moderator', 1, '2024-02-27 07:24:48', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(427, 'Moderator', 1, '2024-02-27 07:24:57', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(428, 'Moderator', 1, '2024-02-27 07:24:58', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(429, 'Moderator', 1, '2024-02-27 10:18:32', 'View Service Providers', 'Moderator viewed active service providers'),
(430, 'Moderator', 1, '2024-02-27 10:18:35', 'View Service Providers', 'Moderator viewed rejected service providers'),
(431, 'Moderator', 1, '2024-02-27 10:18:37', 'View Service Providers', 'Moderator viewed deactivated service providers'),
(432, 'Moderator', 1, '2024-02-27 10:18:37', 'View Service Providers', 'Moderator viewed banned service providers'),
(433, 'Moderator', 1, '2024-02-27 10:18:38', 'View Users', 'Moderator viewed deactivated users'),
(434, 'Moderator', 1, '2024-02-27 10:18:39', 'View Inquiries', 'Moderator viewed pending inquiries'),
(435, 'Moderator', 1, '2024-02-27 10:18:44', 'View Service Providers', 'Moderator viewed active service providers'),
(436, 'Moderator', 1, '2024-02-27 10:35:21', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(437, 'Service Provider', 14, '2024-02-27 10:36:32', 'Logout', 'Service Provider has logged out'),
(438, 'Service Provider', 14, '2024-02-27 10:36:57', 'Login', 'Service Provider has logged in'),
(439, 'Moderator', 1, '2024-02-27 10:38:41', 'Login', 'Moderator logged in'),
(440, 'Customer', 18, '2024-02-27 11:12:08', 'Login', 'User logged in'),
(441, 'Customer', 18, '2024-02-27 11:12:09', 'Logout', 'User logged out'),
(442, 'Customer', 18, '2024-02-27 11:12:13', 'Login', 'User logged in'),
(443, 'Customer', 18, '2024-02-27 11:12:14', 'Logout', 'User logged out'),
(444, 'Customer', 18, '2024-02-27 11:12:17', 'Login', 'User logged in'),
(445, 'Customer', 18, '2024-02-27 11:12:19', 'Logout', 'User logged out'),
(446, 'Moderator', 1, '2024-02-27 11:12:32', 'Login', 'Moderator logged in'),
(447, 'Moderator', 1, '2024-02-27 12:00:17', 'View Users', 'Moderator viewed active users'),
(448, 'Moderator', 1, '2024-02-27 12:00:25', 'Manage Users', 'Moderator viewed user 24 details'),
(449, 'Moderator', 1, '2024-02-27 12:00:55', 'Manage Users', 'Moderator viewed user 24 details'),
(450, 'Moderator', 1, '2024-02-27 12:00:58', 'View Users', 'Moderator viewed active users'),
(451, 'Moderator', 1, '2024-02-27 12:00:59', 'View Users', 'Moderator viewed deactivated users'),
(452, 'Moderator', 1, '2024-02-27 12:01:00', 'View Users', 'Moderator viewed banned users'),
(453, 'Moderator', 1, '2024-02-27 12:01:12', 'View Users', 'Moderator viewed banned users'),
(454, 'Moderator', 1, '2024-02-27 12:01:13', 'View Users', 'Moderator viewed deactivated users'),
(455, 'Moderator', 1, '2024-02-27 12:01:14', 'View Users', 'Moderator viewed active users'),
(456, 'Moderator', 1, '2024-02-27 12:01:14', 'View Users', 'Moderator viewed deactivated users'),
(457, 'Moderator', 1, '2024-02-27 12:01:15', 'View Users', 'Moderator viewed deactivated users'),
(458, 'Moderator', 1, '2024-02-27 12:01:16', 'Manage Users', 'Moderator viewed user 21 details'),
(459, 'Moderator', 1, '2024-02-27 12:14:14', 'View Inquiries', 'Moderator viewed pending inquiries'),
(460, 'Moderator', 1, '2024-02-27 12:14:15', 'View Inquiry', 'Moderator viewed pending inquiry 2 details'),
(461, 'Moderator', 1, '2024-02-27 12:14:21', 'Manage Recover Requests', 'Moderator viewed accepted recover requests'),
(462, 'Moderator', 1, '2024-02-27 12:14:23', 'Manage Recover Requests', 'Moderator viewed recover request 3 details'),
(463, 'Moderator', 1, '2024-02-27 12:14:26', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(464, 'Moderator', 1, '2024-02-27 12:14:28', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(465, 'Moderator', 1, '2024-02-27 12:14:41', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(466, 'Moderator', 1, '2024-02-27 12:14:43', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(467, 'Moderator', 1, '2024-02-27 12:15:03', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(468, 'Moderator', 1, '2024-02-27 12:15:04', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(469, 'Moderator', 1, '2024-02-27 12:15:20', 'View Users', 'Moderator viewed deactivated users'),
(470, 'Moderator', 1, '2024-02-27 12:15:21', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(471, 'Customer', 18, '2024-03-22 20:18:37', 'Login', 'User logged in'),
(472, 'Customer', 18, '2024-03-22 20:18:48', 'View Instruments', 'User viewed the instruments available'),
(473, 'Customer', 18, '2024-03-22 20:18:51', 'View Instrument', 'User viewed an instrument with product id 20'),
(474, 'Customer', 18, '2024-03-22 20:18:57', 'Add Review', 'User added a review to an Instrument with the id of 20'),
(475, 'Customer', 18, '2024-03-22 20:18:57', 'View Instrument', 'User viewed an instrument with product id 20'),
(476, 'Customer', 18, '2024-03-22 20:19:28', 'Check Availability', 'User checked the availability of an Equipment  with product id 20'),
(477, 'Customer', 18, '2024-03-22 20:19:29', 'Manage Cart', 'User added an Instrument to the cart with the id of 20'),
(478, 'Customer', 18, '2024-03-22 20:19:29', 'View Instrument', 'User viewed an instrument with product id 20'),
(479, 'Customer', 18, '2024-03-22 20:19:31', 'Manage Cart', 'User viewed their cart'),
(480, 'Customer', 18, '2024-03-22 20:19:34', 'Manage Cart', 'User viewed their cart'),
(481, 'Customer', 18, '2024-03-22 20:19:36', 'View Studios', 'User viewed the studios available'),
(482, 'Customer', 18, '2024-03-22 20:19:39', 'View Singers', 'User viewed the singers available'),
(483, 'Customer', 18, '2024-03-22 20:19:42', 'View Orders', 'User viewed their orders'),
(484, 'Customer', 18, '2024-03-22 20:19:43', 'View Instruments', 'User viewed the instruments available'),
(485, 'Customer', 18, '2024-03-22 20:19:57', 'View Inquiries', 'User viewed their inquiries'),
(486, 'Customer', 18, '2024-03-22 20:20:06', 'Manage Profile', 'User viewed their profile'),
(487, 'Customer', 18, '2024-03-22 20:20:24', 'Logout', 'User logged out'),
(488, 'Service Provider', 14, '2024-03-22 20:20:32', 'Login', 'Service Provider has logged in'),
(489, 'Service Provider', 14, '2024-03-22 20:20:36', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(490, 'Service Provider', 14, '2024-03-22 20:20:42', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(491, 'Service Provider', 14, '2024-03-22 20:20:45', 'View Orders', 'Service Provider has viewed their orders'),
(492, 'Service Provider', 14, '2024-03-22 20:21:32', 'Manage Profile', 'Service Provider has viewed their profile'),
(493, 'Service Provider', 14, '2024-03-22 20:21:36', 'Logout', 'Service Provider has logged out'),
(494, 'Moderator', 1, '2024-03-22 20:21:47', 'Login', 'Moderator logged in'),
(495, 'Moderator', 1, '2024-03-22 20:22:10', 'View Service Providers', 'Moderator viewed active service providers'),
(496, 'Moderator', 1, '2024-03-22 20:22:11', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(497, 'Moderator', 1, '2024-03-22 20:22:15', 'View Service Providers', 'Moderator viewed active service providers'),
(498, 'Moderator', 1, '2024-03-22 20:22:16', 'View Service Providers', 'Moderator viewed rejected service providers'),
(499, 'Moderator', 1, '2024-03-22 20:22:17', 'View Service Providers', 'Moderator viewed deactivated service providers'),
(500, 'Moderator', 1, '2024-03-22 20:22:17', 'View Service Providers', 'Moderator viewed banned service providers'),
(501, 'Moderator', 1, '2024-03-22 20:22:18', 'View Users', 'Moderator viewed active users'),
(502, 'Moderator', 1, '2024-03-22 20:22:20', 'Manage Service Provider Requests', 'Moderator viewed pending service provider requests'),
(503, 'Moderator', 1, '2024-03-22 20:22:26', 'View Service Providers', 'Moderator viewed active service providers'),
(504, 'Moderator', 1, '2024-03-22 20:23:04', 'View Service Providers', 'Moderator viewed active service providers'),
(505, 'Moderator', 1, '2024-03-22 20:23:05', 'Manage Service Provider Requests', 'Moderator viewed pending service provider requests'),
(506, 'Moderator', 1, '2024-03-22 20:23:08', 'Manage Service Provider Requests', 'Moderator viewed pending service provider request 19 details'),
(507, 'Moderator', 1, '2024-03-22 20:23:22', 'Manage Service Provider Requests', 'Moderator accepted service provider request 19'),
(508, 'Moderator', 1, '2024-03-22 20:23:22', 'Manage Service Provider Requests', 'Moderator viewed pending service provider requests'),
(509, 'Moderator', 1, '2024-03-22 20:23:25', 'View Inquiries', 'Moderator viewed pending inquiries'),
(510, 'Moderator', 1, '2024-03-22 20:23:41', 'View Inquiries', 'Moderator viewed pending inquiries'),
(511, 'Moderator', 1, '2024-03-22 20:23:42', 'View Inquiries', 'Moderator viewed active inquiries'),
(512, 'Moderator', 1, '2024-03-22 20:23:43', 'View Inquiries', 'Moderator viewed pending inquiries'),
(513, 'Moderator', 1, '2024-03-22 20:23:44', 'View Inquiry', 'Moderator viewed pending inquiry 3 details'),
(514, 'Moderator', 1, '2024-03-22 20:23:47', 'Approve Inquiry', 'Moderator approved inquiry 3 and assign to self'),
(515, 'Moderator', 1, '2024-03-22 20:23:47', 'View Inquiries', 'Moderator viewed pending inquiries'),
(516, 'Moderator', 1, '2024-03-22 20:23:49', 'View Inquiries', 'Moderator viewed pending inquiries'),
(517, 'Moderator', 1, '2024-03-22 20:23:53', 'View Inquiries', 'Moderator viewed active inquiries');
INSERT INTO `logs` (`log_id`, `user_type`, `user_id`, `date_and_time`, `log_type`, `data`) VALUES
(518, 'Moderator', 1, '2024-03-22 20:23:58', 'View Inquiry', 'Moderator viewed inquiry 4 details'),
(519, 'Moderator', 1, '2024-03-22 20:24:03', 'Send Message', 'Moderator sent a message to user 18 regarding inquiry 4'),
(520, 'Moderator', 1, '2024-03-22 20:24:03', 'View Inquiry', 'Moderator viewed inquiry 4 details'),
(521, 'Moderator', 1, '2024-03-22 20:24:58', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(522, 'Moderator', 1, '2024-03-22 20:25:10', 'Manage Recover Requests', 'Moderator viewed recover request 5 details'),
(523, 'Moderator', 1, '2024-03-22 20:25:39', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(524, 'Moderator', 1, '2024-03-22 20:25:41', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(525, 'Moderator', 1, '2024-03-22 20:26:30', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(526, 'Moderator', 1, '2024-03-22 20:27:41', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(527, 'Moderator', 1, '2024-03-22 20:27:42', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(528, 'Moderator', 1, '2024-03-22 20:27:43', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(529, 'Moderator', 1, '2024-03-22 20:27:46', 'View Service Providers', 'Moderator viewed banned service providers'),
(530, 'Moderator', 1, '2024-03-22 20:27:47', 'Manage Service Providers', 'Moderator viewed service provider 20 details'),
(531, 'Moderator', 1, '2024-03-22 20:27:52', 'View Service Provider Orders', 'Moderator viewed service provider 20 orders'),
(532, 'Moderator', 1, '2024-03-22 20:27:55', 'View Service Providers', 'Moderator viewed active service providers'),
(533, 'Moderator', 1, '2024-03-22 20:27:56', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(534, 'Moderator', 1, '2024-03-22 20:27:57', 'View Service Provider Orders', 'Moderator viewed service provider 14 orders'),
(535, 'Moderator', 1, '2024-03-22 20:28:03', 'View Service Provider Orders', 'Moderator viewed service provider 14 orders'),
(536, 'Moderator', 1, '2024-03-22 20:28:12', 'View Service Providers', 'Moderator viewed active service providers'),
(537, 'Moderator', 1, '2024-03-22 20:28:14', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(538, 'Moderator', 1, '2024-03-22 20:28:25', 'View Service Provider Orders', 'Moderator viewed service provider 14 orders'),
(539, 'Moderator', 1, '2024-03-22 20:28:26', 'View Product', 'Moderator viewed product 17 details of type Equipment'),
(540, 'Moderator', 1, '2024-03-22 20:28:29', 'View Users', 'Moderator viewed active users'),
(541, 'Customer', 18, '2024-04-06 11:24:31', 'Login', 'User logged in'),
(542, 'Moderator', 1, '2024-04-12 07:25:31', 'Manage Recover Requests', 'Moderator viewed accepted recover requests'),
(543, 'Moderator', 1, '2024-04-12 07:25:37', 'Manage Recover Requests', 'Moderator viewed recover request 3 details'),
(544, 'Moderator', 1, '2024-04-12 07:25:37', 'Manage Recover Requests', 'Moderator viewed recover request logo.png details'),
(545, 'Moderator', 1, '2024-04-12 07:25:48', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(546, 'Moderator', 1, '2024-04-12 07:25:50', 'Manage Recover Requests', 'Moderator viewed recover request 7 details'),
(547, 'Moderator', 1, '2024-04-12 07:25:50', 'Manage Recover Requests', 'Moderator viewed recover request logo.png details'),
(548, 'Moderator', 1, '2024-04-12 07:25:57', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(549, 'Moderator', 1, '2024-04-12 07:26:04', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(550, 'Administrator', 1, '2024-04-12 07:36:35', 'Manage Recover Requests', 'Administrator viewed pending recover requests'),
(551, 'Administrator', 1, '2024-04-12 07:37:17', 'View Service Providers', 'Administrator viewed active service providers'),
(552, 'Administrator', 1, '2024-04-12 07:37:31', 'View Service Providers', 'Administrator viewed rejected service providers'),
(553, 'Administrator', 1, '2024-04-12 07:37:32', 'View Service Providers', 'Administrator viewed deactivated service providers'),
(554, 'Administrator', 1, '2024-04-12 07:37:34', 'View Service Providers', 'Administrator viewed banned service providers'),
(555, 'Administrator', 1, '2024-04-12 07:37:48', 'View Users', 'Administrator viewed active users'),
(556, 'Moderator', 1, '2024-04-12 07:39:42', 'Login', 'Moderator logged in'),
(557, 'Moderator', 1, '2024-04-12 07:39:44', 'View Service Providers', 'Moderator viewed active service providers'),
(558, 'Moderator', 1, '2024-04-12 07:39:49', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(559, 'Moderator', 1, '2024-04-12 07:39:56', 'View Service Providers', 'Moderator viewed rejected service providers'),
(560, 'Moderator', 1, '2024-04-12 07:39:58', 'View Service Providers', 'Moderator viewed banned service providers'),
(561, 'Moderator', 1, '2024-04-12 07:39:59', 'Manage Service Providers', 'Moderator viewed service provider 20 details'),
(562, 'Administrator', 1, '2024-04-12 07:40:10', 'View Service Providers', 'Administrator viewed active service providers'),
(563, 'Administrator', 1, '2024-04-12 07:40:34', 'View Service Providers', 'Administrator viewed active service providers'),
(564, 'Administrator', 1, '2024-04-12 07:44:39', 'View Service Providers', 'Administrator viewed active service providers'),
(565, 'Administrator', 1, '2024-04-12 07:47:04', 'Manage Service Providers', 'Administrator viewed service provider 18 details'),
(566, 'Administrator', 1, '2024-04-12 07:47:04', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(567, 'Administrator', 1, '2024-04-12 07:47:10', 'View Service Providers', 'Administrator viewed active service providers'),
(568, 'Administrator', 1, '2024-04-12 07:47:11', 'Manage Service Providers', 'Administrator viewed service provider 14 details'),
(569, 'Administrator', 1, '2024-04-12 07:47:11', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(570, 'Administrator', 1, '2024-04-12 07:47:24', 'Ban Service Provider', 'Administrator banned service provider 14 with reason this is a ban request'),
(571, 'Administrator', 1, '2024-04-12 07:47:24', 'View Service Providers', 'Administrator viewed banned service providers'),
(572, 'Administrator', 1, '2024-04-12 07:47:35', 'Manage Service Providers', 'Administrator viewed service provider 14 details'),
(573, 'Administrator', 1, '2024-04-12 07:47:35', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(574, 'Administrator', 1, '2024-04-12 07:47:42', 'Unban Service Provider', 'Administrator lifted the ban on service provider 14'),
(575, 'Administrator', 1, '2024-04-12 07:47:42', 'View Service Providers', 'Administrator viewed active service providers'),
(576, 'Administrator', 1, '2024-04-12 07:47:57', 'View Service Providers', 'Administrator viewed active service providers'),
(577, 'Administrator', 1, '2024-04-12 07:47:59', 'Manage Service Providers', 'Administrator viewed service provider 14 details'),
(578, 'Administrator', 1, '2024-04-12 07:47:59', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(579, 'Administrator', 1, '2024-04-12 07:48:00', 'View Service Providers', 'Administrator viewed active service providers'),
(580, 'Administrator', 1, '2024-04-12 07:48:02', 'View Users', 'Administrator viewed active users'),
(581, 'Administrator', 1, '2024-04-12 07:48:03', 'Manage Users', 'Administrator viewed user 18 details'),
(582, 'Administrator', 1, '2024-04-12 07:48:04', 'Manage Users', 'Administrator viewed user logo.png details'),
(583, 'Administrator', 1, '2024-04-12 07:48:06', 'View User Orders', 'Administrator viewed user 18 orders'),
(584, 'Administrator', 1, '2024-04-12 07:48:07', 'View User Orders', 'Administrator viewed user logo.png orders'),
(585, 'Administrator', 1, '2024-04-12 07:48:08', 'Manage Users', 'Administrator viewed user 18 details'),
(586, 'Administrator', 1, '2024-04-12 07:48:08', 'Manage Users', 'Administrator viewed user logo.png details'),
(587, 'Administrator', 1, '2024-04-12 07:48:09', 'View User Orders', 'Administrator viewed user 18 orders'),
(588, 'Administrator', 1, '2024-04-12 07:48:10', 'View User Orders', 'Administrator viewed user logo.png orders'),
(589, 'Administrator', 1, '2024-04-12 07:48:12', 'View User Orders', 'Administrator viewed user 18 orders'),
(590, 'Administrator', 1, '2024-04-12 07:48:12', 'View User Orders', 'Administrator viewed user logo.png orders'),
(591, 'Administrator', 1, '2024-04-12 07:48:14', 'Manage Recover Requests', 'Administrator viewed pending recover requests'),
(592, 'Administrator', 1, '2024-04-12 07:48:19', 'Manage Recover Requests', 'Administrator viewed rejected recover requests'),
(593, 'Administrator', 1, '2024-04-12 07:48:20', 'View Users', 'Administrator viewed deactivated users'),
(594, 'Customer', 18, '2024-04-17 06:09:03', 'Login', 'User logged in'),
(595, 'Customer', 18, '2024-04-17 06:09:05', 'View Instruments', 'User viewed the instruments available'),
(596, 'Customer', 18, '2024-04-17 06:09:06', 'View Instrument', 'User viewed an instrument with product id 18'),
(597, 'Customer', 18, '2024-04-17 06:17:04', 'View Instrument', 'User viewed an instrument with product id 18'),
(598, 'Customer', 18, '2024-04-17 06:17:18', 'View Instruments', 'User viewed the instruments available'),
(599, 'Customer', 18, '2024-04-17 06:17:19', 'View Instrument', 'User viewed an instrument with product id 21'),
(600, 'Customer', 18, '2024-04-17 06:17:33', 'View Instruments', 'User viewed the instruments available'),
(601, 'Customer', 18, '2024-04-17 06:17:35', 'View Instrument', 'User viewed an instrument with product id 17'),
(602, 'Customer', 18, '2024-04-17 06:17:36', 'View Instruments', 'User viewed the instruments available'),
(603, 'Customer', 18, '2024-04-17 06:17:37', 'View Instrument', 'User viewed an instrument with product id 18'),
(604, 'Customer', 18, '2024-04-17 06:17:38', 'View Instruments', 'User viewed the instruments available'),
(605, 'Customer', 18, '2024-04-17 06:17:39', 'View Instrument', 'User viewed an instrument with product id 20'),
(606, 'Customer', 18, '2024-04-17 06:17:41', 'View Instruments', 'User viewed the instruments available'),
(607, 'Customer', 18, '2024-04-17 06:17:42', 'View Instrument', 'User viewed an instrument with product id 21'),
(608, 'Customer', 18, '2024-04-17 06:17:46', 'View Instruments', 'User viewed the instruments available'),
(609, 'Customer', 18, '2024-04-17 06:17:48', 'View Instrument', 'User viewed an instrument with product id 23'),
(610, 'Customer', 18, '2024-04-17 06:17:51', 'View Instruments', 'User viewed the instruments available'),
(611, 'Customer', 18, '2024-04-17 06:17:52', 'View Instrument', 'User viewed an instrument with product id 24'),
(612, 'Customer', 18, '2024-04-17 06:18:00', 'View Instruments', 'User viewed the instruments available'),
(613, 'Customer', 18, '2024-04-17 06:18:03', 'View Bands', 'User viewed the bands available'),
(614, 'Customer', 18, '2024-04-17 06:18:04', 'View Band', 'User viewed a band with product id 2'),
(615, 'Customer', 18, '2024-04-17 06:18:10', 'Add Review', 'User added a review to a Band with the id of 2'),
(616, 'Customer', 18, '2024-04-17 06:18:10', 'View Band', 'User viewed a band with product id 2'),
(617, 'Customer', 18, '2024-04-17 06:18:40', 'View Band', 'User viewed a band with product id 2'),
(618, 'Customer', 18, '2024-04-17 06:20:25', 'View Band', 'User viewed a band with product id 2'),
(619, 'Customer', 18, '2024-04-17 06:20:46', 'Add Review', 'User added a review to a Band with the id of 2'),
(620, 'Customer', 18, '2024-04-17 06:20:46', 'View Band', 'User viewed a band with product id 2'),
(621, 'Customer', 18, '2024-04-17 06:21:49', 'View Band', 'User viewed a band with product id 2'),
(622, 'Customer', 18, '2024-04-17 06:21:54', 'View Band', 'User viewed a band with product id 2'),
(623, 'Customer', 18, '2024-04-17 06:21:55', 'View Band', 'User viewed a band with product id 2'),
(624, 'Customer', 18, '2024-04-17 06:21:55', 'View Bands', 'User viewed the bands available'),
(625, 'Customer', 18, '2024-04-17 06:21:59', 'View Instruments', 'User viewed the instruments available'),
(626, 'Customer', 18, '2024-04-17 06:22:00', 'View Instrument', 'User viewed an instrument with product id 18'),
(627, 'Customer', 18, '2024-04-17 06:22:03', 'View Instruments', 'User viewed the instruments available'),
(628, 'Customer', 18, '2024-04-17 06:22:09', 'View Musicians', 'User viewed the musicians available'),
(629, 'Customer', 18, '2024-04-17 06:22:10', 'View Musician', 'User viewed a musician with product id 15'),
(630, 'Customer', 18, '2024-04-17 06:23:56', 'Logout', 'User logged out'),
(631, 'Administrator', 1, '2024-04-17 06:26:45', 'Generate Reports', 'Administrator viewed reports'),
(632, 'Administrator', 1, '2024-04-17 06:33:39', 'View Service Providers', 'Administrator viewed active service providers'),
(633, 'Administrator', 1, '2024-04-17 06:33:40', 'View Service Providers', 'Administrator viewed rejected service providers'),
(634, 'Administrator', 1, '2024-04-17 06:33:40', 'View Service Providers', 'Administrator viewed deactivated service providers'),
(635, 'Administrator', 1, '2024-04-17 06:33:41', 'View Service Providers', 'Administrator viewed banned service providers'),
(636, 'Administrator', 1, '2024-04-17 06:33:43', 'Manage Service Provider Requests', 'Administrator viewed pending service provider requests'),
(637, 'Administrator', 1, '2024-04-17 06:39:38', 'Generate Reports', 'Administrator viewed reports'),
(638, 'Administrator', 1, '2024-04-17 06:39:42', 'Generate Reports', 'Administrator viewed reports'),
(639, 'Administrator', 1, '2024-04-17 06:52:21', 'Generate Reports', 'Administrator viewed reports'),
(640, 'Administrator', 1, '2024-04-17 06:53:30', 'View Service Providers', 'Administrator viewed active service providers'),
(641, 'Administrator', 1, '2024-04-17 06:53:35', 'View Users', 'Administrator viewed active users'),
(642, 'Administrator', 1, '2024-04-17 06:53:51', 'View Users', 'Administrator viewed active users'),
(643, 'Administrator', 1, '2024-04-17 07:12:47', 'View Service Providers', 'Administrator viewed active service providers'),
(644, 'Administrator', 1, '2024-04-17 07:12:48', 'View Service Providers', 'Administrator viewed rejected service providers'),
(645, 'Administrator', 1, '2024-04-17 07:12:49', 'View Service Providers', 'Administrator viewed deactivated service providers'),
(646, 'Administrator', 1, '2024-04-17 07:12:50', 'View Service Providers', 'Administrator viewed banned service providers'),
(647, 'Administrator', 1, '2024-04-17 07:12:55', 'View Users', 'Administrator viewed active users'),
(648, 'Administrator', 1, '2024-04-17 07:17:25', 'Generate Reports', 'Administrator viewed reports'),
(649, 'Administrator', 1, '2024-04-17 07:18:34', 'View Service Providers', 'Administrator viewed active service providers'),
(650, 'Administrator', 1, '2024-04-17 07:20:01', 'View Service Providers', 'Administrator viewed active service providers'),
(651, 'Administrator', 1, '2024-04-17 07:20:02', 'Manage Service Providers', 'Administrator viewed service provider 14 details'),
(652, 'Administrator', 1, '2024-04-17 07:20:02', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(653, 'Administrator', 1, '2024-04-17 07:20:07', 'View Users', 'Administrator viewed active users'),
(654, 'Administrator', 1, '2024-04-17 07:20:08', 'Manage Users', 'Administrator viewed user 22 details'),
(655, 'Administrator', 1, '2024-04-17 07:20:08', 'Manage Users', 'Administrator viewed user logo.png details'),
(656, 'Administrator', 1, '2024-04-17 07:20:11', 'View User Orders', 'Administrator viewed user 22 orders'),
(657, 'Administrator', 1, '2024-04-17 07:20:11', 'View User Orders', 'Administrator viewed user logo.png orders'),
(658, 'Administrator', 1, '2024-04-17 07:20:16', 'Generate Reports', 'Administrator viewed reports'),
(659, 'Customer', 18, '2024-04-18 19:41:39', 'Login', 'User logged in'),
(660, 'Administrator', 1, '2024-04-19 07:02:06', 'Login', 'Administrator logged in'),
(661, 'Administrator', 1, '2024-04-19 07:02:10', 'Generate Reports', 'Administrator viewed reports'),
(662, 'Administrator', 1, '2024-04-19 08:00:10', 'Generate Reports', 'Administrator viewed reports'),
(663, 'Customer', 18, '2024-04-19 10:28:49', 'Login', 'User logged in'),
(664, 'Customer', 18, '2024-04-19 10:28:51', 'Logout', 'User logged out'),
(665, 'Administrator', 1, '2024-04-19 10:29:00', 'Login', 'Administrator logged in'),
(666, 'Administrator', 1, '2024-04-19 10:29:20', 'Generate Reports', 'Administrator viewed reports'),
(667, 'Administrator', 1, '2024-04-19 10:56:34', 'Generate Reports', 'Administrator viewed reports'),
(668, 'Administrator', 1, '2024-04-19 11:19:02', 'Generate Reports', 'Administrator viewed reports'),
(669, 'Administrator', 1, '2024-04-19 11:22:53', 'Generate Reports', 'Administrator viewed reports'),
(670, 'Administrator', 1, '2024-04-19 11:40:41', 'View Service Providers', 'Administrator viewed active service providers'),
(671, 'Administrator', 1, '2024-04-19 11:40:48', 'Generate Reports', 'Administrator viewed reports'),
(672, 'Administrator', 1, '2024-04-19 11:40:57', 'Generate Reports', 'Administrator viewed reports'),
(673, 'Administrator', 1, '2024-04-19 11:41:57', 'Generate Reports', 'Administrator viewed reports'),
(674, 'Administrator', 1, '2024-04-19 11:42:33', 'Generate Reports', 'Administrator viewed reports'),
(675, 'Administrator', 1, '2024-04-19 11:43:20', 'Manage Service Provider Requests', 'Administrator viewed pending service provider requests'),
(676, 'Administrator', 1, '2024-04-19 11:43:21', 'Manage Recover Requests', 'Administrator viewed pending recover requests'),
(677, 'Administrator', 1, '2024-04-19 11:43:25', 'Manage Recover Requests', 'Administrator viewed recover request 5 details'),
(678, 'Administrator', 1, '2024-04-19 11:43:25', 'Manage Recover Requests', 'Administrator viewed recover request logo.png details'),
(679, 'Administrator', 1, '2024-04-19 11:43:26', 'View Users', 'Administrator viewed active users'),
(680, 'Administrator', 1, '2024-04-19 11:43:28', 'Manage Users', 'Administrator viewed user 18 details'),
(681, 'Administrator', 1, '2024-04-19 11:43:28', 'Manage Users', 'Administrator viewed user logo.png details'),
(682, 'Administrator', 1, '2024-04-19 11:43:29', 'Manage Recover Requests', 'Administrator viewed pending recover requests'),
(683, 'Administrator', 1, '2024-04-19 11:43:30', 'Manage Recover Requests', 'Administrator viewed recover request 5 details'),
(684, 'Administrator', 1, '2024-04-19 11:43:30', 'Manage Recover Requests', 'Administrator viewed recover request logo.png details'),
(685, 'Administrator', 1, '2024-04-19 11:43:44', 'Generate Reports', 'Administrator viewed reports'),
(686, 'Administrator', 1, '2024-04-19 11:44:04', 'Generate Reports', 'Administrator viewed reports'),
(687, 'Administrator', 1, '2024-04-19 11:44:16', 'Generate Reports', 'Administrator viewed reports'),
(688, 'Administrator', 1, '2024-04-19 11:44:54', 'View Users', 'Administrator viewed active users'),
(689, 'Administrator', 1, '2024-04-19 11:44:55', 'Manage Users', 'Administrator viewed user 18 details'),
(690, 'Administrator', 1, '2024-04-19 11:44:55', 'Manage Users', 'Administrator viewed user logo.png details'),
(691, 'Administrator', 1, '2024-04-19 11:44:56', 'View User Orders', 'Administrator viewed user 18 orders'),
(692, 'Administrator', 1, '2024-04-19 11:44:56', 'View User Orders', 'Administrator viewed user logo.png orders'),
(693, 'Administrator', 1, '2024-04-19 11:45:05', 'View User Orders', 'Administrator viewed user 18 orders'),
(694, 'Administrator', 1, '2024-04-19 11:45:06', 'View User Orders', 'Administrator viewed user logo.png orders'),
(695, 'Administrator', 1, '2024-04-19 11:45:07', 'Manage Users', 'Administrator viewed user 18 details'),
(696, 'Administrator', 1, '2024-04-19 11:45:07', 'Manage Users', 'Administrator viewed user logo.png details'),
(697, 'Service Provider', 14, '2024-04-19 11:46:08', 'Login', 'Service Provider has logged in'),
(698, 'Service Provider', 14, '2024-04-19 11:46:24', 'View Orders', 'Service Provider has viewed their orders'),
(699, 'Service Provider', 14, '2024-04-19 11:48:13', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(700, 'Service Provider', 14, '2024-04-19 11:53:22', 'Logout', 'Service Provider has logged out'),
(701, 'Customer', 18, '2024-04-19 11:53:27', 'Login', 'User logged in'),
(702, 'Customer', 18, '2024-04-19 11:53:29', 'View Orders', 'User viewed their orders'),
(703, 'Customer', 18, '2024-04-19 11:53:30', 'View Instruments', 'User viewed the instruments available'),
(704, 'Administrator', 1, '2024-04-19 11:56:31', 'Login', 'Administrator logged in'),
(705, 'Administrator', 1, '2024-04-19 11:56:36', 'Logout', 'Administrator logged out'),
(706, 'Administrator', 1, '2024-04-19 12:06:29', 'Login', 'Administrator logged in'),
(707, 'Administrator', 1, '2024-04-19 12:06:31', 'View Users', 'Administrator viewed active users'),
(708, 'Administrator', 1, '2024-04-19 12:06:31', 'View Users', 'Administrator viewed deactivated users'),
(709, 'Administrator', 1, '2024-04-19 12:06:33', 'Manage Users', 'Administrator viewed user 21 details'),
(710, 'Administrator', 1, '2024-04-19 12:06:34', 'Manage Users', 'Administrator viewed user logo.png details'),
(711, 'Administrator', 1, '2024-04-19 12:06:37', 'Manage Recover Requests', 'Administrator viewed pending recover requests'),
(712, 'Administrator', 1, '2024-04-19 12:06:40', 'Manage Recover Requests', 'Administrator viewed recover request 5 details'),
(713, 'Administrator', 1, '2024-04-19 12:06:40', 'Manage Recover Requests', 'Administrator viewed recover request logo.png details'),
(714, 'Administrator', 1, '2024-04-19 12:06:45', 'Generate Reports', 'Administrator viewed reports'),
(715, 'Administrator', 1, '2024-04-19 12:06:55', 'Manage Recover Requests', 'Administrator viewed recover request 5 details'),
(716, 'Administrator', 1, '2024-04-19 12:06:55', 'Manage Recover Requests', 'Administrator viewed recover request logo.png details'),
(717, 'Administrator', 1, '2024-04-19 12:06:56', 'Manage Recover Requests', 'Administrator viewed pending recover requests'),
(718, 'Administrator', 1, '2024-04-19 12:06:57', 'Logout', 'Administrator logged out'),
(719, 'Customer', 18, '2024-04-19 12:07:05', 'Login', 'User logged in'),
(720, 'Customer', 18, '2024-04-19 12:07:07', 'View Orders', 'User viewed their orders'),
(721, 'Customer', 18, '2024-04-19 12:07:07', 'View Instruments', 'User viewed the instruments available'),
(722, 'Customer', 18, '2024-04-19 12:07:11', 'View Singers', 'User viewed the singers available'),
(723, 'Customer', 18, '2024-04-19 12:07:13', 'View Singer', 'User viewed a singer with product id 8'),
(724, 'Customer', 18, '2024-04-19 12:07:23', 'View Instruments', 'User viewed the instruments available'),
(725, 'Customer', 18, '2024-04-19 12:07:25', 'View Singer', 'User viewed a singer with product id 8'),
(726, 'Customer', 18, '2024-04-19 12:07:27', 'View Singers', 'User viewed the singers available'),
(727, 'Customer', 18, '2024-04-19 12:07:35', 'View Bands', 'User viewed the bands available'),
(728, 'Customer', 18, '2024-04-19 12:07:37', 'View Band', 'User viewed a band with product id 2'),
(729, 'Customer', 18, '2024-04-19 12:07:38', 'View Instruments', 'User viewed the instruments available'),
(730, 'Customer', 18, '2024-04-19 12:08:13', 'View Instrument', 'User viewed an instrument with product id 17'),
(731, 'Customer', 18, '2024-04-19 12:08:19', 'View Instruments', 'User viewed the instruments available'),
(732, 'Customer', 18, '2024-04-19 12:08:22', 'View Band', 'User viewed a band with product id 2'),
(733, 'Customer', 18, '2024-04-19 12:08:27', 'View Bands', 'User viewed the bands available'),
(734, 'Customer', 18, '2024-04-19 12:08:28', 'View Band', 'User viewed a band with product id 2'),
(735, 'Moderator', 1, '2024-04-19 12:11:36', 'Login', 'Moderator logged in'),
(736, 'Moderator', 1, '2024-04-19 12:13:07', 'Logout', 'Moderator logged out'),
(737, 'Customer', 18, '2024-04-19 12:13:14', 'Login', 'User logged in'),
(738, 'Customer', 18, '2024-04-19 12:14:20', 'View Bands', 'User viewed the bands available'),
(739, 'Customer', 18, '2024-04-19 12:15:09', 'View Band', 'User viewed a band with product id 2'),
(740, 'Administrator', 1, '2024-04-21 09:31:51', 'Login', 'Administrator logged in'),
(741, 'Administrator', 1, '2024-04-21 09:31:54', 'Generate Reports', 'Administrator viewed reports'),
(742, 'Administrator', 1, '2024-04-21 12:10:13', 'Generate Reports', 'Administrator viewed reports'),
(743, 'Administrator', 1, '2024-04-21 12:16:47', 'Generate Reports', 'Administrator viewed reports'),
(744, 'Administrator', 1, '2024-04-21 12:17:06', 'Generate Reports', 'Administrator viewed reports'),
(745, 'Administrator', 1, '2024-04-21 12:17:11', 'Generate Reports', 'Administrator viewed reports'),
(746, 'Administrator', 1, '2024-04-21 12:21:32', 'Generate Reports', 'Administrator viewed reports'),
(747, 'Administrator', 1, '2024-04-21 12:21:36', 'Generate Reports', 'Administrator viewed reports'),
(748, 'Administrator', 1, '2024-04-21 12:21:40', 'Generate Reports', 'Administrator viewed reports'),
(749, 'Administrator', 1, '2024-04-21 13:09:03', 'Generate Reports', 'Administrator viewed reports'),
(750, 'Administrator', 1, '2024-04-21 13:13:10', 'Generate Reports', 'Administrator viewed reports'),
(751, 'Administrator', 1, '2024-04-21 13:30:36', 'Generate Reports', 'Administrator viewed reports'),
(752, 'Customer', 18, '2024-04-23 07:09:55', 'Login', 'User logged in'),
(753, 'Customer', 18, '2024-04-23 07:09:58', 'View Bands', 'User viewed the bands available'),
(754, 'Customer', 18, '2024-04-23 07:10:31', 'View Bands', 'User viewed the bands available'),
(755, 'Customer', 18, '2024-04-23 07:10:42', 'View Bands', 'User viewed the bands available'),
(756, 'Customer', 18, '2024-04-23 07:11:34', 'View Bands', 'User viewed the bands available'),
(757, 'Customer', 18, '2024-04-23 07:11:44', 'View Bands', 'User viewed the bands available'),
(758, 'Customer', 18, '2024-04-23 07:12:05', 'View Bands', 'User viewed the bands available'),
(759, 'Customer', 18, '2024-04-23 07:12:24', 'View Bands', 'User viewed the bands available'),
(760, 'Customer', 18, '2024-04-23 07:12:53', 'View Instruments', 'User viewed the instruments available'),
(761, 'Customer', 18, '2024-04-23 07:12:59', 'View Bands', 'User viewed the bands available'),
(762, 'Customer', 18, '2024-04-23 07:13:10', 'View Orders', 'User viewed their orders'),
(763, 'Customer', 18, '2024-04-23 07:13:10', 'View Instruments', 'User viewed the instruments available'),
(764, 'Customer', 18, '2024-04-23 07:13:19', 'View Bands', 'User viewed the bands available'),
(765, 'Customer', 18, '2024-04-23 10:58:51', 'Logout', 'User logged out'),
(766, 'Moderator', 1, '2024-04-23 10:59:03', 'Login', 'Moderator logged in'),
(767, 'Moderator', 1, '2024-04-23 10:59:07', 'View Inquiries', 'Moderator viewed pending inquiries'),
(768, 'Moderator', 1, '2024-04-23 10:59:09', 'View Inquiry', 'Moderator viewed pending inquiry 2 details'),
(769, 'Moderator', 1, '2024-04-23 10:59:12', 'Approve Inquiry', 'Moderator approved inquiry 2 and assign to self'),
(770, 'Moderator', 1, '2024-04-23 10:59:12', 'View Inquiries', 'Moderator viewed pending inquiries'),
(771, 'Moderator', 1, '2024-04-23 10:59:14', 'View Inquiries', 'Moderator viewed active inquiries'),
(772, 'Moderator', 1, '2024-04-23 10:59:16', 'View Inquiry', 'Moderator viewed inquiry 2 details'),
(773, 'Moderator', 1, '2024-04-23 11:01:06', 'View Inquiry', 'Moderator viewed inquiry 2 details'),
(774, 'Moderator', 1, '2024-04-23 11:01:11', 'Send Message', 'Moderator sent a message to user 18 regarding inquiry 2'),
(775, 'Moderator', 1, '2024-04-23 11:01:11', 'View Inquiry', 'Moderator viewed inquiry 2 details'),
(776, 'Moderator', 1, '2024-04-23 11:01:28', 'Send Message', 'Moderator sent a message to user 18 regarding inquiry 2'),
(777, 'Moderator', 1, '2024-04-23 11:01:28', 'View Inquiry', 'Moderator viewed inquiry 2 details'),
(778, 'Moderator', 1, '2024-04-23 11:02:02', 'Logout', 'Moderator logged out'),
(779, 'Customer', 18, '2024-04-23 11:02:10', 'Login', 'User logged in'),
(780, 'Customer', 18, '2024-04-23 11:02:12', 'View Instruments', 'User viewed the instruments available'),
(781, 'Customer', 18, '2024-04-23 11:02:20', 'View Studios', 'User viewed the studios available'),
(782, 'Customer', 18, '2024-04-23 11:02:25', 'View Studio', 'User viewed an studio with product id 3'),
(783, 'Customer', 18, '2024-04-23 11:02:32', 'Manage Cart', 'User viewed their cart'),
(784, 'Customer', 18, '2024-04-23 11:02:33', 'View Studio', 'User viewed an studio with product id 3'),
(785, 'Customer', 18, '2024-04-23 11:02:35', 'View Studios', 'User viewed the studios available'),
(786, 'Customer', 18, '2024-04-23 11:03:06', 'View Instruments', 'User viewed the instruments available'),
(787, 'Customer', 18, '2024-04-23 11:03:09', 'View Singers', 'User viewed the singers available'),
(788, 'Customer', 18, '2024-04-23 11:03:12', 'View Bands', 'User viewed the bands available'),
(789, 'Customer', 18, '2024-04-23 11:03:14', 'View Musicians', 'User viewed the musicians available'),
(790, 'Customer', 18, '2024-04-23 11:05:22', 'View Musicians', 'User viewed the musicians available'),
(791, 'Customer', 18, '2024-04-23 11:05:28', 'View Studios', 'User viewed the studios available'),
(792, 'Customer', 18, '2024-04-23 11:07:12', 'View Studios', 'User viewed the studios available'),
(793, 'Customer', 18, '2024-04-23 11:07:13', 'View Studios', 'User viewed the studios available'),
(794, 'Customer', 18, '2024-04-23 11:14:55', 'View Studios', 'User viewed the studios available'),
(795, 'Customer', 18, '2024-04-23 11:16:28', 'View Studios', 'User viewed the studios available'),
(796, 'Customer', 18, '2024-04-23 11:18:05', 'View Studios', 'User viewed the studios available'),
(797, 'Customer', 18, '2024-04-23 11:18:20', 'View Studios', 'User viewed the studios available'),
(798, 'Customer', 18, '2024-04-23 11:18:21', 'View Studios', 'User viewed the studios available'),
(799, 'Customer', 18, '2024-04-23 11:18:21', 'View Studios', 'User viewed the studios available'),
(800, 'Customer', 18, '2024-04-23 11:18:21', 'View Studios', 'User viewed the studios available'),
(801, 'Customer', 18, '2024-04-23 11:18:21', 'View Studios', 'User viewed the studios available'),
(802, 'Customer', 18, '2024-04-23 11:19:59', 'View Studios', 'User viewed the studios available'),
(803, 'Customer', 18, '2024-04-23 11:20:00', 'Manage Cart', 'User viewed their cart'),
(804, 'Customer', 18, '2024-04-23 11:20:02', 'View Studios', 'User viewed the studios available'),
(805, 'Customer', 18, '2024-04-23 11:32:39', 'View Studios', 'User viewed the studios available'),
(806, 'Customer', 18, '2024-04-23 11:36:07', 'View Studios', 'User viewed the studios available'),
(807, 'Customer', 18, '2024-04-23 11:37:28', 'View Studios', 'User viewed the studios available'),
(808, 'Customer', 18, '2024-04-23 11:37:59', 'View Studios', 'User viewed the studios available'),
(809, 'Customer', 18, '2024-04-23 11:38:12', 'View Studios', 'User viewed the studios available'),
(810, 'Customer', 18, '2024-04-23 11:38:13', 'View Studios', 'User viewed the studios available'),
(811, 'Customer', 18, '2024-04-23 11:38:26', 'View Studios', 'User viewed the studios available'),
(812, 'Customer', 18, '2024-04-23 11:38:43', 'View Studios', 'User viewed the studios available'),
(813, 'Customer', 18, '2024-04-23 11:38:51', 'View Studios', 'User viewed the studios available'),
(814, 'Customer', 18, '2024-04-23 11:39:22', 'View Studios', 'User viewed the studios available'),
(815, 'Customer', 18, '2024-04-23 11:41:44', 'View Studios', 'User viewed the studios available'),
(816, 'Customer', 18, '2024-04-23 11:42:00', 'View Studios', 'User viewed the studios available'),
(817, 'Customer', 18, '2024-04-23 11:42:06', 'View Studios', 'User viewed the studios available'),
(818, 'Customer', 18, '2024-04-23 11:42:32', 'View Studios', 'User viewed the studios available'),
(819, 'Customer', 18, '2024-04-23 11:42:42', 'View Studios', 'User viewed the studios available'),
(820, 'Customer', 18, '2024-04-23 11:44:41', 'View Studios', 'User viewed the studios available'),
(821, 'Customer', 18, '2024-04-23 11:44:52', 'View Studios', 'User viewed the studios available'),
(822, 'Customer', 18, '2024-04-23 11:45:01', 'View Studios', 'User viewed the studios available'),
(823, 'Customer', 18, '2024-04-23 11:45:07', 'View Studios', 'User viewed the studios available'),
(824, 'Customer', 18, '2024-04-23 11:45:29', 'View Studios', 'User viewed the studios available'),
(825, 'Customer', 18, '2024-04-23 11:45:37', 'View Studios', 'User viewed the studios available'),
(826, 'Customer', 18, '2024-04-23 11:45:46', 'View Studios', 'User viewed the studios available'),
(827, 'Customer', 18, '2024-04-23 11:45:53', 'View Studios', 'User viewed the studios available'),
(828, 'Customer', 18, '2024-04-23 11:45:59', 'Manage Cart', 'User viewed their cart'),
(829, 'Customer', 18, '2024-04-23 11:46:01', 'View Studios', 'User viewed the studios available'),
(830, 'Customer', 18, '2024-04-23 11:46:05', 'View Studios', 'User viewed the studios available'),
(831, 'Customer', 18, '2024-04-23 11:46:05', 'View Studios', 'User viewed the studios available'),
(832, 'Customer', 18, '2024-04-23 11:49:27', 'View Studios', 'User viewed the studios available'),
(833, 'Customer', 18, '2024-04-23 11:49:28', 'View Studios', 'User viewed the studios available'),
(834, 'Customer', 18, '2024-04-23 11:49:28', 'View Studios', 'User viewed the studios available'),
(835, 'Customer', 18, '2024-04-23 11:50:12', 'View Studios', 'User viewed the studios available'),
(836, 'Customer', 18, '2024-04-23 11:51:10', 'View Studios', 'User viewed the studios available'),
(837, 'Customer', 18, '2024-04-23 11:51:21', 'View Studios', 'User viewed the studios available'),
(838, 'Customer', 18, '2024-04-23 11:51:21', 'View Studios', 'User viewed the studios available'),
(839, 'Customer', 18, '2024-04-23 11:51:22', 'View Studios', 'User viewed the studios available'),
(840, 'Customer', 18, '2024-04-23 11:51:22', 'View Studios', 'User viewed the studios available'),
(841, 'Customer', 18, '2024-04-23 11:51:39', 'View Studios', 'User viewed the studios available'),
(842, 'Customer', 18, '2024-04-23 11:51:40', 'View Studios', 'User viewed the studios available'),
(843, 'Customer', 18, '2024-04-23 11:52:10', 'View Studios', 'User viewed the studios available'),
(844, 'Customer', 18, '2024-04-23 11:52:11', 'View Studios', 'User viewed the studios available'),
(845, 'Customer', 18, '2024-04-23 11:56:58', 'View Studios', 'User viewed the studios available'),
(846, 'Customer', 18, '2024-04-23 11:57:29', 'View Studios', 'User viewed the studios available'),
(847, 'Customer', 18, '2024-04-23 11:58:04', 'View Studios', 'User viewed the studios available'),
(848, 'Customer', 18, '2024-04-23 11:59:49', 'View Studios', 'User viewed the studios available'),
(849, 'Customer', 18, '2024-04-23 11:59:51', 'View Studios', 'User viewed the studios available'),
(850, 'Customer', 18, '2024-04-23 11:59:51', 'View Studios', 'User viewed the studios available'),
(851, 'Customer', 18, '2024-04-23 12:00:07', 'View Studios', 'User viewed the studios available'),
(852, 'Customer', 18, '2024-04-23 12:00:35', 'View Studios', 'User viewed the studios available'),
(853, 'Customer', 18, '2024-04-23 12:01:06', 'View Studios', 'User viewed the studios available'),
(854, 'Customer', 18, '2024-04-23 12:01:10', 'View Studios', 'User viewed the studios available'),
(855, 'Customer', 18, '2024-04-23 12:01:11', 'View Studios', 'User viewed the studios available'),
(856, 'Customer', 18, '2024-04-23 12:01:31', 'View Studios', 'User viewed the studios available'),
(857, 'Customer', 18, '2024-04-23 12:01:37', 'View Studios', 'User viewed the studios available'),
(858, 'Customer', 18, '2024-04-23 12:01:44', 'View Studios', 'User viewed the studios available'),
(859, 'Customer', 18, '2024-04-23 12:01:52', 'View Studios', 'User viewed the studios available'),
(860, 'Customer', 18, '2024-04-23 12:01:57', 'View Studios', 'User viewed the studios available'),
(861, 'Customer', 18, '2024-04-23 12:02:05', 'View Studios', 'User viewed the studios available'),
(862, 'Customer', 18, '2024-04-23 12:02:13', 'View Studios', 'User viewed the studios available'),
(863, 'Customer', 18, '2024-04-23 12:02:35', 'View Studios', 'User viewed the studios available'),
(864, 'Customer', 18, '2024-04-23 12:02:42', 'View Studios', 'User viewed the studios available'),
(865, 'Customer', 18, '2024-04-23 12:02:48', 'View Studios', 'User viewed the studios available'),
(866, 'Customer', 18, '2024-04-23 12:02:59', 'View Studios', 'User viewed the studios available'),
(867, 'Customer', 18, '2024-04-23 12:03:07', 'View Studios', 'User viewed the studios available'),
(868, 'Customer', 18, '2024-04-23 12:03:15', 'View Studios', 'User viewed the studios available'),
(869, 'Customer', 18, '2024-04-23 12:03:27', 'View Studios', 'User viewed the studios available'),
(870, 'Customer', 18, '2024-04-23 12:03:37', 'View Studios', 'User viewed the studios available'),
(871, 'Customer', 18, '2024-04-23 12:03:50', 'View Studios', 'User viewed the studios available'),
(872, 'Customer', 18, '2024-04-23 12:04:08', 'View Studios', 'User viewed the studios available'),
(873, 'Customer', 18, '2024-04-23 12:06:14', 'View Studios', 'User viewed the studios available'),
(874, 'Customer', 18, '2024-04-23 12:16:45', 'Manage Cart', 'User viewed their cart'),
(875, 'Customer', 18, '2024-04-23 12:16:47', 'Place Order', 'User placed an order'),
(876, 'Customer', 18, '2024-04-23 12:16:50', 'View Orders', 'User viewed their orders'),
(877, 'Customer', 18, '2024-04-23 12:16:50', 'View Instruments', 'User viewed the instruments available'),
(878, 'Customer', 18, '2024-04-23 12:25:51', 'Order Complete', 'User completed an order with order id: 24 and sub order id: 48'),
(879, 'Customer', 18, '2024-04-23 12:25:51', 'View Orders', 'User viewed their orders'),
(880, 'Customer', 18, '2024-04-23 12:25:52', 'View Instruments', 'User viewed the instruments available'),
(881, 'Customer', 18, '2024-04-23 12:26:42', 'View Instruments', 'User viewed the instruments available'),
(882, 'Customer', 18, '2024-04-23 12:26:44', 'View Instrument', 'User viewed an instrument with product id 20'),
(883, 'Customer', 18, '2024-04-23 12:27:00', 'Logout', 'User logged out'),
(884, 'Service Provider', 19, '2024-04-23 12:27:29', 'Login', 'Service Provider has logged in'),
(885, 'Service Provider', 19, '2024-04-23 12:27:31', 'View Orders', 'Service Provider has viewed their orders'),
(886, 'Service Provider', 19, '2024-04-23 12:27:35', 'Accept Order', 'Service Provider has accepted an order with the ID 58'),
(887, 'Service Provider', 19, '2024-04-23 12:27:35', 'View Orders', 'Service Provider has viewed their orders'),
(888, 'Service Provider', 19, '2024-04-23 12:27:45', 'Logout', 'Service Provider has logged out'),
(889, 'Customer', 18, '2024-04-23 12:27:50', 'Login', 'User logged in'),
(890, 'Customer', 18, '2024-04-23 12:27:59', 'View Orders', 'User viewed their orders'),
(891, 'Customer', 18, '2024-04-23 12:28:00', 'View Instruments', 'User viewed the instruments available'),
(892, 'Customer', 18, '2024-04-23 12:30:13', 'Order Cancel', 'User cancelled an order with order id: 28 and sub order id: 54'),
(893, 'Customer', 18, '2024-04-23 12:30:13', 'View Orders', 'User viewed their orders'),
(894, 'Customer', 18, '2024-04-23 12:30:14', 'View Instruments', 'User viewed the instruments available'),
(895, 'Customer', 18, '2024-04-25 20:43:46', 'View Studios', 'User viewed the studios available'),
(896, 'Customer', 18, '2024-04-25 20:43:58', 'View Studios', 'User viewed the studios available'),
(897, 'Customer', 18, '2024-04-25 20:43:59', 'View Studios', 'User viewed the studios available'),
(898, 'Customer', 18, '2024-04-25 20:44:17', 'Manage Profile', 'User viewed their profile'),
(899, 'Customer', 18, '2024-04-25 20:44:22', 'View Studios', 'User viewed the studios available'),
(900, 'Customer', 18, '2024-04-25 20:46:28', 'View Studios', 'User viewed the studios available'),
(901, 'Customer', 18, '2024-04-25 20:46:29', 'View Studios', 'User viewed the studios available'),
(902, 'Customer', 18, '2024-04-25 20:46:30', 'View Studios', 'User viewed the studios available'),
(903, 'Customer', 18, '2024-04-25 20:46:31', 'View Studios', 'User viewed the studios available'),
(904, 'Customer', 18, '2024-04-25 20:46:33', 'View Studios', 'User viewed the studios available'),
(905, 'Customer', 18, '2024-04-25 20:46:37', 'Manage Profile', 'User viewed their profile'),
(906, 'Customer', 18, '2024-04-25 20:46:38', 'Logout', 'User logged out'),
(907, 'Customer', 18, '2024-04-25 20:46:44', 'Login', 'User logged in'),
(908, 'Customer', 18, '2024-04-25 20:46:47', 'View Studios', 'User viewed the studios available'),
(909, 'Customer', 18, '2024-04-25 20:47:16', 'View Studios', 'User viewed the studios available'),
(910, 'Service Provider', 14, '2024-04-25 21:08:00', 'Login', 'Service Provider has logged in'),
(911, 'Service Provider', 14, '2024-04-25 21:08:20', 'Manage Inventory', 'Service Provider has viewed their Band inventory'),
(912, 'Service Provider', 14, '2024-04-25 21:08:20', 'Manage Inventory', 'Service Provider has viewed their Band Inventory'),
(913, 'Service Provider', 14, '2024-04-25 21:09:28', 'Add Band', 'Service Provider has added a new band to their inventory'),
(914, 'Service Provider', 14, '2024-04-25 21:09:28', 'Manage Inventory', 'Service Provider has viewed their Band inventory'),
(915, 'Service Provider', 14, '2024-04-25 21:09:28', 'Manage Inventory', 'Service Provider has viewed their Band Inventory'),
(916, 'Customer', 18, '2024-04-26 02:32:29', 'Login', 'User logged in'),
(917, 'Customer', 18, '2024-04-26 02:32:32', 'View Studios', 'User viewed the studios available'),
(918, 'Customer', 18, '2024-04-26 02:32:34', 'Manage Cart', 'User viewed their cart'),
(919, 'Customer', 18, '2024-04-26 02:32:44', 'Logout', 'User logged out'),
(920, 'Customer', 18, '2024-04-26 03:00:35', 'Login', 'User logged in'),
(921, 'Customer', 18, '2024-04-26 03:00:46', 'View Singers', 'User viewed the singers available'),
(922, 'Customer', 18, '2024-04-26 03:00:54', 'View Bands', 'User viewed the bands available'),
(923, 'Customer', 18, '2024-04-26 03:00:57', 'View Musicians', 'User viewed the musicians available'),
(924, 'Customer', 18, '2024-04-26 03:01:02', 'View Singers', 'User viewed the singers available'),
(925, 'Customer', 18, '2024-04-26 03:01:07', 'View Studios', 'User viewed the studios available'),
(926, 'Customer', 18, '2024-04-26 03:01:12', 'View Musicians', 'User viewed the musicians available'),
(927, 'Customer', 18, '2024-04-26 03:01:15', 'View Bands', 'User viewed the bands available'),
(928, 'Customer', 18, '2024-04-26 03:02:04', 'Manage Profile', 'User viewed their profile'),
(929, 'Customer', 18, '2024-04-26 03:02:06', 'Logout', 'User logged out'),
(930, 'Administrator', 1, '2024-04-26 03:02:17', 'Login', 'Administrator logged in'),
(931, 'Administrator', 1, '2024-04-26 03:09:56', 'Manage Service Provider Requests', 'Administrator viewed pending service provider requests'),
(932, 'Administrator', 1, '2024-04-26 03:10:00', 'Manage Service Provider Requests', 'Administrator viewed pending service provider request 43 details'),
(933, 'Administrator', 1, '2024-04-26 03:10:00', 'Manage Service Provider Requests', 'Administrator viewed pending service provider request logo.png details'),
(934, 'Administrator', 1, '2024-04-26 03:10:05', 'View Users', 'Administrator viewed active users'),
(935, 'Administrator', 1, '2024-04-26 03:10:09', 'Manage Users', 'Administrator viewed user 39 details'),
(936, 'Administrator', 1, '2024-04-26 03:10:09', 'Manage Users', 'Administrator viewed user logo.png details'),
(937, 'Administrator', 1, '2024-04-26 03:10:17', 'Generate Reports', 'Administrator viewed reports'),
(938, 'Administrator', 1, '2024-04-26 03:11:00', 'Logout', 'Administrator logged out'),
(939, 'Customer', 18, '2024-04-26 03:11:14', 'Login', 'User logged in'),
(940, 'Customer', 18, '2024-04-26 03:11:16', 'View Instruments', 'User viewed the instruments available'),
(941, 'Customer', 18, '2024-04-26 03:11:54', 'View Instruments', 'User viewed the instruments available'),
(942, 'Customer', 18, '2024-04-26 03:12:03', 'View Singers', 'User viewed the singers available'),
(943, 'Customer', 18, '2024-04-26 03:12:06', 'View Bands', 'User viewed the bands available'),
(944, 'Customer', 18, '2024-04-26 03:20:52', 'View Instruments', 'User viewed the instruments available'),
(945, 'Customer', 18, '2024-04-26 03:20:53', 'View Orders', 'User viewed their orders'),
(946, 'Customer', 18, '2024-04-26 03:20:53', 'View Instruments', 'User viewed the instruments available'),
(947, 'Customer', 18, '2024-04-26 03:20:56', 'View Instruments', 'User viewed the instruments available'),
(948, 'Customer', 18, '2024-04-26 04:13:12', 'Logout', 'User logged out'),
(949, 'Customer', 18, '2024-04-26 04:13:19', 'Login', 'User logged in'),
(950, 'Customer', 18, '2024-04-26 04:22:07', 'Manage Profile', 'User viewed their profile'),
(951, 'Customer', 18, '2024-04-26 04:22:26', 'Manage Profile', 'User viewed their profile'),
(952, 'Customer', 18, '2024-04-26 04:22:29', 'Manage Profile', 'User viewed their profile'),
(953, 'Customer', 18, '2024-04-26 04:22:32', 'View Instruments', 'User viewed the instruments available'),
(954, 'Customer', 18, '2024-04-26 04:22:33', 'View Orders', 'User viewed their orders'),
(955, 'Customer', 18, '2024-04-26 04:22:33', 'View Instruments', 'User viewed the instruments available'),
(956, 'Customer', 18, '2024-04-26 04:22:42', 'View Instruments', 'User viewed the instruments available'),
(957, 'Customer', 18, '2024-04-26 04:42:57', 'View Instruments', 'User viewed the instruments available'),
(958, 'Customer', 18, '2024-04-26 04:58:36', 'Manage Profile', 'User viewed their profile'),
(959, 'Customer', 18, '2024-04-26 05:05:09', 'View Orders', 'User viewed their orders'),
(960, 'Customer', 18, '2024-04-26 05:05:09', 'View Instruments', 'User viewed the instruments available'),
(961, 'Customer', 18, '2024-04-26 05:07:19', 'View Orders', 'User viewed their orders'),
(962, 'Customer', 18, '2024-04-26 05:07:19', 'View Instruments', 'User viewed the instruments available'),
(963, 'Customer', 18, '2024-04-26 05:10:04', 'View Instruments', 'User viewed the instruments available'),
(964, 'Customer', 18, '2024-04-26 05:10:10', 'Manage Cart', 'User viewed their cart'),
(965, 'Customer', 18, '2024-04-26 05:10:15', 'View Instruments', 'User viewed the instruments available'),
(966, 'Customer', 18, '2024-04-26 05:10:30', 'View Instruments', 'User viewed the instruments available'),
(967, 'Customer', 18, '2024-04-26 05:10:31', 'View Instruments', 'User viewed the instruments available'),
(968, 'Customer', 18, '2024-04-26 05:10:31', 'View Instruments', 'User viewed the instruments available'),
(969, 'Customer', 18, '2024-04-26 05:10:31', 'View Instruments', 'User viewed the instruments available'),
(970, 'Customer', 18, '2024-04-26 05:10:31', 'View Instruments', 'User viewed the instruments available'),
(971, 'Customer', 18, '2024-04-26 05:10:32', 'View Instruments', 'User viewed the instruments available'),
(972, 'Customer', 18, '2024-04-26 05:14:12', 'View Instruments', 'User viewed the instruments available'),
(973, 'Customer', 18, '2024-04-26 05:14:18', 'View Instruments', 'User viewed the instruments available'),
(974, 'Customer', 18, '2024-04-26 05:15:11', 'View Instruments', 'User viewed the instruments available'),
(975, 'Customer', 18, '2024-04-26 05:16:20', 'View Instruments', 'User viewed the instruments available'),
(976, 'Customer', 18, '2024-04-26 05:17:19', 'View Instruments', 'User viewed the instruments available'),
(977, 'Customer', 18, '2024-04-26 05:18:44', 'Logout', 'User logged out'),
(978, 'Service Provider', 14, '2024-04-26 05:18:52', 'Login', 'Service Provider has logged in'),
(979, 'Service Provider', 14, '2024-04-26 05:20:04', 'Manage Inventory', 'Service Provider has viewed their Studio inventory'),
(980, 'Service Provider', 14, '2024-04-26 05:20:04', 'Manage Inventory', 'Service Provider has viewed their Studio Inventory'),
(981, 'Service Provider', 14, '2024-04-26 05:20:13', 'Manage Profile', 'Service Provider has viewed their profile'),
(982, 'Service Provider', 14, '2024-04-26 05:20:50', 'View Orders', 'Service Provider has viewed their orders'),
(983, 'Service Provider', 14, '2024-04-26 05:21:22', 'View Orders', 'Service Provider has viewed their orders'),
(984, 'Service Provider', 14, '2024-04-26 05:21:23', 'View Orders', 'Service Provider has viewed their orders'),
(985, 'Service Provider', 14, '2024-04-26 05:21:24', 'View Orders', 'Service Provider has viewed their orders'),
(986, 'Service Provider', 14, '2024-04-26 05:21:44', 'Manage Profile', 'Service Provider has viewed their profile'),
(987, 'Service Provider', 14, '2024-04-26 05:22:50', 'Manage Profile', 'Service Provider has viewed their profile'),
(988, 'Service Provider', 14, '2024-04-26 05:22:55', 'Manage Profile', 'Service Provider has viewed their profile'),
(989, 'Service Provider', 14, '2024-04-26 05:23:02', 'Manage Profile', 'Service Provider has viewed their profile'),
(990, 'Service Provider', 14, '2024-04-26 05:23:09', 'Manage Profile', 'Service Provider has viewed their profile'),
(991, 'Service Provider', 14, '2024-04-26 05:23:12', 'Manage Profile', 'Service Provider has viewed the page to edit their details'),
(992, 'Service Provider', 14, '2024-04-26 05:23:16', 'Manage Profile', 'Service Provider has viewed their profile'),
(993, 'Service Provider', 14, '2024-04-26 05:30:49', 'View Orders', 'Service Provider has viewed their orders'),
(994, 'Service Provider', 14, '2024-04-26 05:43:43', 'Manage Profile', 'Service Provider has viewed their profile'),
(995, 'Service Provider', 14, '2024-04-26 05:43:46', 'Logout', 'Service Provider has logged out'),
(996, 'Customer', 18, '2024-04-26 05:43:50', 'Login', 'User logged in'),
(997, 'Customer', 18, '2024-04-26 05:43:52', 'View Instruments', 'User viewed the instruments available'),
(998, 'Customer', 18, '2024-04-26 05:44:10', 'Logout', 'User logged out'),
(999, 'Service Provider', 14, '2024-04-26 05:44:17', 'Login', 'Service Provider has logged in');
INSERT INTO `logs` (`log_id`, `user_type`, `user_id`, `date_and_time`, `log_type`, `data`) VALUES
(1000, 'Service Provider', 14, '2024-04-26 05:44:20', 'Manage Profile', 'Service Provider has viewed their profile'),
(1001, 'Service Provider', 14, '2024-04-26 05:44:28', 'Manage Inventory', 'Service Provider has viewed their Singer inventory'),
(1002, 'Service Provider', 14, '2024-04-26 05:44:28', 'Manage Inventory', 'Service Provider has viewed their Singer Inventory'),
(1003, 'Service Provider', 14, '2024-04-26 05:47:50', 'Manage Profile', 'Service Provider has viewed their profile'),
(1004, 'Service Provider', 14, '2024-04-26 05:47:53', 'Manage Profile', 'Service Provider has viewed their profile'),
(1005, 'Service Provider', 14, '2024-04-26 05:47:54', 'Logout', 'Service Provider has logged out'),
(1006, 'Customer', 18, '2024-04-26 05:50:30', 'Login', 'User logged in'),
(1007, 'Customer', 18, '2024-04-26 05:50:32', 'View Instruments', 'User viewed the instruments available'),
(1008, 'Customer', 18, '2024-04-26 05:50:36', 'Logout', 'User logged out'),
(1009, 'Service Provider', 14, '2024-04-26 05:50:39', 'Login', 'Service Provider has logged in'),
(1010, 'Service Provider', 14, '2024-04-26 05:50:51', 'Manage Profile', 'Service Provider has viewed their profile'),
(1011, 'Service Provider', 14, '2024-04-26 05:50:54', 'Logout', 'Service Provider has logged out'),
(1012, 'Service Provider', 27, '2024-04-26 05:51:01', 'Login', 'Service Provider has logged in'),
(1013, 'Service Provider', 27, '2024-04-26 05:51:10', 'View Orders', 'Service Provider has viewed their orders'),
(1014, 'Service Provider', 27, '2024-04-26 05:51:11', 'Manage Profile', 'Service Provider has viewed their profile'),
(1015, 'Service Provider', 27, '2024-04-26 05:51:25', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1016, 'Service Provider', 27, '2024-04-26 05:51:37', 'Manage Profile', 'Service Provider has viewed their profile'),
(1017, 'Service Provider', 27, '2024-04-26 05:51:39', 'Logout', 'Service Provider has logged out'),
(1018, 'Customer', 18, '2024-04-26 07:51:18', 'View Instruments', 'User viewed the instruments available'),
(1019, 'Customer', 18, '2024-04-26 07:51:23', 'Manage Cart', 'User viewed their cart'),
(1020, 'Customer', 18, '2024-04-26 07:52:14', 'View Bands', 'User viewed the bands available'),
(1021, 'Customer', 18, '2024-04-26 07:54:31', 'View Instruments', 'User viewed the instruments available'),
(1022, 'Customer', 18, '2024-04-26 07:54:32', 'Manage Cart', 'User viewed their cart'),
(1023, 'Customer', 18, '2024-04-26 07:59:50', 'Login', 'User logged in'),
(1024, 'Customer', 18, '2024-04-26 07:59:52', 'View Instruments', 'User viewed the instruments available'),
(1025, 'Customer', 18, '2024-04-26 07:59:53', 'Manage Cart', 'User viewed their cart'),
(1026, 'Customer', 18, '2024-04-26 08:00:43', 'Login', 'User logged in'),
(1027, 'Customer', 18, '2024-04-26 08:00:45', 'View Instruments', 'User viewed the instruments available'),
(1028, 'Customer', 18, '2024-04-26 08:00:47', 'Manage Cart', 'User viewed their cart'),
(1029, 'Customer', 18, '2024-04-26 08:00:55', 'View Studios', 'User viewed the studios available'),
(1030, 'Customer', 18, '2024-04-26 08:00:56', 'View Orders', 'User viewed their orders'),
(1031, 'Customer', 18, '2024-04-26 08:00:57', 'View Instruments', 'User viewed the instruments available'),
(1032, 'Customer', 18, '2024-04-26 08:01:00', 'View Bands', 'User viewed the bands available'),
(1033, 'Customer', 18, '2024-04-26 08:01:03', 'View Musicians', 'User viewed the musicians available'),
(1034, 'Customer', 18, '2024-04-26 08:01:06', 'View Musicians', 'User viewed the musicians available'),
(1035, 'Customer', 18, '2024-04-26 08:02:22', 'View Musicians', 'User viewed the musicians available'),
(1036, 'Customer', 18, '2024-04-26 08:02:26', 'View Musicians', 'User viewed the musicians available'),
(1037, 'Customer', 18, '2024-04-26 08:03:29', 'View Musicians', 'User viewed the musicians available'),
(1038, 'Customer', 18, '2024-04-26 08:03:33', 'View Musicians', 'User viewed the musicians available'),
(1039, 'Customer', 18, '2024-04-26 08:05:56', 'View Musician', 'User viewed a musician with product id 17'),
(1040, 'Customer', 18, '2024-04-26 08:05:56', 'View Musician', 'User viewed a musician with product id 17'),
(1041, 'Customer', 18, '2024-04-26 08:06:00', 'View Musicians', 'User viewed the musicians available'),
(1042, 'Customer', 18, '2024-04-26 08:06:04', 'View Bands', 'User viewed the bands available'),
(1043, 'Customer', 18, '2024-04-26 08:06:35', 'View Bands', 'User viewed the bands available'),
(1044, 'Customer', 18, '2024-04-26 08:06:36', 'View Band', 'User viewed a band with product id 9'),
(1045, 'Customer', 18, '2024-04-26 08:12:42', 'Logout', 'User logged out'),
(1046, 'Service Provider', 14, '2024-04-26 08:12:49', 'Login', 'Service Provider has logged in'),
(1047, 'Service Provider', 14, '2024-04-26 08:12:53', 'Logout', 'Service Provider has logged out'),
(1048, 'Customer', 18, '2024-04-26 08:13:20', 'Login', 'User logged in'),
(1049, 'Customer', 18, '2024-04-26 08:13:59', 'View Instruments', 'User viewed the instruments available'),
(1050, 'Customer', 18, '2024-04-26 08:14:07', 'View Studios', 'User viewed the studios available'),
(1051, 'Customer', 18, '2024-04-26 08:14:11', 'View Bands', 'User viewed the bands available'),
(1052, 'Customer', 18, '2024-04-26 08:14:17', 'View Musicians', 'User viewed the musicians available'),
(1053, 'Customer', 18, '2024-04-26 08:14:18', 'View Musician', 'User viewed a musician with product id 20'),
(1054, 'Customer', 18, '2024-04-26 08:14:44', 'Manage Cart', 'User viewed their cart'),
(1055, 'Customer', 18, '2024-04-26 08:14:53', 'View Studios', 'User viewed the studios available'),
(1056, 'Customer', 18, '2024-04-26 08:15:04', 'View Bands', 'User viewed the bands available'),
(1057, 'Customer', 18, '2024-04-26 08:15:09', 'View Singers', 'User viewed the singers available'),
(1058, 'Customer', 18, '2024-04-26 08:15:19', 'View Singers', 'User viewed the singers available'),
(1059, 'Customer', 18, '2024-04-26 08:15:25', 'View Singer', 'User viewed a singer with product id 13'),
(1060, 'Customer', 18, '2024-04-26 08:15:29', 'View Singers', 'User viewed the singers available'),
(1061, 'Customer', 18, '2024-04-26 08:16:35', 'View Singer', 'User viewed a singer with product id 25'),
(1062, 'Customer', 18, '2024-04-26 08:16:43', 'View Singers', 'User viewed the singers available'),
(1063, 'Customer', 18, '2024-04-26 08:16:45', 'View Singer', 'User viewed a singer with product id 25'),
(1064, 'Customer', 18, '2024-04-26 08:16:58', 'View Singers', 'User viewed the singers available'),
(1065, 'Customer', 18, '2024-04-26 08:17:01', 'View Singer', 'User viewed a singer with product id 14'),
(1066, 'Customer', 18, '2024-04-26 08:17:02', 'View Singers', 'User viewed the singers available'),
(1067, 'Customer', 18, '2024-04-26 08:17:07', 'View Studios', 'User viewed the studios available'),
(1068, 'Customer', 18, '2024-04-26 08:17:09', 'View Studio', 'User viewed an studio with product id 4'),
(1069, 'Customer', 18, '2024-04-26 08:17:11', 'View Studios', 'User viewed the studios available'),
(1070, 'Customer', 18, '2024-04-26 08:17:15', 'View Bands', 'User viewed the bands available'),
(1071, 'Customer', 18, '2024-04-26 08:17:16', 'View Band', 'User viewed a band with product id 9'),
(1072, 'Customer', 18, '2024-04-26 08:17:46', 'View Bands', 'User viewed the bands available'),
(1073, 'Customer', 18, '2024-04-26 08:18:00', 'View Bands', 'User viewed the bands available'),
(1074, 'Customer', 18, '2024-04-26 08:18:04', 'View Singers', 'User viewed the singers available'),
(1075, 'Customer', 18, '2024-04-26 08:20:33', 'View Singer', 'User viewed a singer with product id 13'),
(1076, 'Customer', 18, '2024-04-26 08:20:42', 'View Singers', 'User viewed the singers available'),
(1077, 'Customer', 18, '2024-04-26 08:20:46', 'View Singer', 'User viewed a singer with product id 25'),
(1078, 'Customer', 18, '2024-04-26 08:22:22', 'View Singers', 'User viewed the singers available'),
(1079, 'Customer', 18, '2024-04-26 08:22:35', 'View Instruments', 'User viewed the instruments available'),
(1080, 'Customer', 18, '2024-04-26 08:22:38', 'View Instrument', 'User viewed an instrument with product id 25'),
(1081, 'Customer', 18, '2024-04-26 08:22:42', 'View Instruments', 'User viewed the instruments available'),
(1082, 'Customer', 18, '2024-04-26 08:22:50', 'View Instrument', 'User viewed an instrument with product id 25'),
(1083, 'Customer', 18, '2024-04-26 08:22:51', 'View Instruments', 'User viewed the instruments available'),
(1084, 'Customer', 18, '2024-04-26 08:22:55', 'View Singers', 'User viewed the singers available'),
(1085, 'Customer', 18, '2024-04-26 08:23:06', 'View Singer', 'User viewed a singer with product id 13'),
(1086, 'Customer', 18, '2024-04-26 08:23:11', 'View Singers', 'User viewed the singers available'),
(1087, 'Customer', 18, '2024-04-26 08:23:18', 'View Singer', 'User viewed a singer with product id 13'),
(1088, 'Customer', 18, '2024-04-26 08:23:20', 'View Singers', 'User viewed the singers available'),
(1089, 'Customer', 18, '2024-04-26 08:23:30', 'View Instruments', 'User viewed the instruments available'),
(1090, 'Customer', 18, '2024-04-26 08:23:43', 'View Studios', 'User viewed the studios available'),
(1091, 'Customer', 18, '2024-04-26 08:24:08', 'View Bands', 'User viewed the bands available'),
(1092, 'Customer', 18, '2024-04-26 08:24:24', 'View Bands', 'User viewed the bands available'),
(1093, 'Customer', 18, '2024-04-26 08:26:56', 'View Instruments', 'User viewed the instruments available'),
(1094, 'Customer', 18, '2024-04-26 08:27:10', 'Logout', 'User logged out'),
(1095, 'Administrator', 1, '2024-04-26 08:27:20', 'Login', 'Administrator logged in'),
(1096, 'Administrator', 1, '2024-04-26 08:27:25', 'Generate Reports', 'Administrator viewed reports'),
(1097, 'Administrator', 1, '2024-04-26 08:27:48', 'Generate Reports', 'Administrator viewed reports'),
(1098, 'Administrator', 1, '2024-04-26 08:30:39', 'View Service Providers', 'Administrator viewed active service providers'),
(1099, 'Administrator', 1, '2024-04-26 08:30:43', 'Manage Service Providers', 'Administrator viewed service provider 26 details'),
(1100, 'Administrator', 1, '2024-04-26 08:30:43', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1101, 'Administrator', 1, '2024-04-26 08:30:48', 'Manage Service Providers', 'Administrator viewed service provider 26 details'),
(1102, 'Administrator', 1, '2024-04-26 08:30:48', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1103, 'Administrator', 1, '2024-04-26 08:30:49', 'View Service Provider Orders', 'Administrator viewed service provider 26 orders'),
(1104, 'Administrator', 1, '2024-04-26 08:30:49', 'View Service Provider Orders', 'Administrator viewed service provider logo.png orders'),
(1105, 'Administrator', 1, '2024-04-26 08:30:54', 'Manage Service Providers', 'Administrator viewed service provider 26 details'),
(1106, 'Administrator', 1, '2024-04-26 08:30:54', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1107, 'Administrator', 1, '2024-04-26 08:31:21', 'Manage Service Provider Requests', 'Administrator viewed pending service provider requests'),
(1108, 'Administrator', 1, '2024-04-26 08:31:25', 'Manage Service Provider Requests', 'Administrator viewed pending service provider request 45 details'),
(1109, 'Administrator', 1, '2024-04-26 08:31:25', 'Manage Service Provider Requests', 'Administrator viewed pending service provider request logo.png details'),
(1110, 'Administrator', 1, '2024-04-26 08:31:38', 'View Service Providers', 'Administrator viewed active service providers'),
(1111, 'Administrator', 1, '2024-04-26 08:31:43', 'Manage Service Providers', 'Administrator viewed service provider 28 details'),
(1112, 'Administrator', 1, '2024-04-26 08:31:43', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1113, 'Administrator', 1, '2024-04-26 08:32:01', 'View Service Providers', 'Administrator viewed active service providers'),
(1114, 'Administrator', 1, '2024-04-26 08:32:03', 'Manage Service Providers', 'Administrator viewed service provider 33 details'),
(1115, 'Administrator', 1, '2024-04-26 08:32:03', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1116, 'Administrator', 1, '2024-04-26 08:32:06', 'View Service Providers', 'Administrator viewed active service providers'),
(1117, 'Administrator', 1, '2024-04-26 08:32:09', 'Manage Service Providers', 'Administrator viewed service provider 38 details'),
(1118, 'Administrator', 1, '2024-04-26 08:32:09', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1119, 'Administrator', 1, '2024-04-26 08:32:36', 'Logout', 'Administrator logged out'),
(1120, 'Customer', 18, '2024-04-26 08:48:54', 'Login', 'User logged in'),
(1121, 'Customer', 18, '2024-04-26 08:49:03', 'View Instruments', 'User viewed the instruments available'),
(1122, 'Customer', 18, '2024-04-26 08:49:04', 'View Instrument', 'User viewed an instrument with product id 27'),
(1123, 'Customer', 18, '2024-04-26 08:49:35', 'Check Availability', 'User checked the availability of an Equipment  with product id 27'),
(1124, 'Customer', 18, '2024-04-26 08:49:40', 'Manage Cart', 'User added an Instrument to the cart with the id of 27'),
(1125, 'Customer', 18, '2024-04-26 08:49:40', 'View Instrument', 'User viewed an instrument with product id 27'),
(1126, 'Customer', 18, '2024-04-26 08:49:47', 'Manage Cart', 'User viewed their cart'),
(1127, 'Customer', 18, '2024-04-26 08:50:06', 'Place Order', 'User placed an order'),
(1128, 'Customer', 18, '2024-04-26 08:50:13', 'View Orders', 'User viewed their orders'),
(1129, 'Customer', 18, '2024-04-26 08:50:16', 'View Instruments', 'User viewed the instruments available'),
(1130, 'Customer', 18, '2024-04-26 08:51:01', 'Logout', 'User logged out'),
(1131, 'Service Provider', 26, '2024-04-26 08:51:10', 'Login', 'Service Provider has logged in'),
(1132, 'Service Provider', 26, '2024-04-26 08:51:13', 'View Orders', 'Service Provider has viewed their orders'),
(1133, 'Service Provider', 26, '2024-04-26 08:51:30', 'Accept Order', 'Service Provider has accepted the order with the ID 59'),
(1134, 'Service Provider', 26, '2024-04-26 08:51:30', 'View Orders', 'Service Provider has viewed their orders'),
(1135, 'Service Provider', 26, '2024-04-26 08:51:34', 'Manage Profile', 'Service Provider has viewed their profile'),
(1136, 'Service Provider', 26, '2024-04-26 08:51:37', 'Logout', 'Service Provider has logged out'),
(1137, 'Customer', 18, '2024-04-26 08:51:47', 'Login', 'User logged in'),
(1138, 'Customer', 18, '2024-04-26 08:51:57', 'View Instruments', 'User viewed the instruments available'),
(1139, 'Customer', 18, '2024-04-26 08:52:42', 'View Instruments', 'User viewed the instruments available'),
(1140, 'Customer', 18, '2024-04-26 08:52:48', 'View Orders', 'User viewed their orders'),
(1141, 'Customer', 18, '2024-04-26 08:52:48', 'View Instruments', 'User viewed the instruments available'),
(1142, 'Customer', 18, '2024-04-26 08:52:55', 'View Instruments', 'User viewed the instruments available'),
(1143, 'Customer', 18, '2024-04-26 08:53:03', 'Manage Profile', 'User viewed their profile'),
(1144, 'Customer', 18, '2024-04-26 08:53:06', 'Logout', 'User logged out'),
(1145, 'Moderator', 1, '2024-04-26 08:56:07', 'Login', 'Moderator logged in'),
(1146, 'Moderator', 1, '2024-04-26 08:56:10', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1147, 'Moderator', 1, '2024-04-26 08:56:13', 'Manage Recover Requests', 'Moderator viewed recover request 8 details'),
(1148, 'Moderator', 1, '2024-04-26 08:56:33', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1149, 'Moderator', 1, '2024-04-26 08:56:45', 'Manage Recover Requests', 'Moderator viewed recover request 8 details'),
(1150, 'Moderator', 1, '2024-04-26 08:57:03', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1151, 'Moderator', 1, '2024-04-26 08:58:59', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1152, 'Moderator', 1, '2024-04-26 08:59:00', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1153, 'Moderator', 1, '2024-04-26 08:59:00', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1154, 'Moderator', 1, '2024-04-26 08:59:02', 'Manage Recover Requests', 'Moderator viewed recover request 8 details'),
(1155, 'Moderator', 1, '2024-04-26 08:59:31', 'Login', 'Moderator logged in'),
(1156, 'Moderator', 1, '2024-04-26 08:59:35', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1157, 'Moderator', 1, '2024-04-26 08:59:38', 'Manage Recover Requests', 'Moderator viewed recover request 8 details'),
(1158, 'Moderator', 1, '2024-04-26 09:00:03', 'Logout', 'Moderator logged out'),
(1159, 'Customer', 18, '2024-04-26 09:26:17', 'Login', 'User logged in'),
(1160, 'Customer', 18, '2024-04-26 09:26:54', 'View Instruments', 'User viewed the instruments available'),
(1161, 'Customer', 18, '2024-04-26 09:27:41', 'View Instrument', 'User viewed an instrument with product id 33'),
(1162, 'Customer', 18, '2024-04-26 09:29:45', 'Check Availability', 'User checked the availability of an Equipment  with product id 33'),
(1163, 'Customer', 18, '2024-04-26 09:30:02', 'Manage Cart', 'User added an Instrument to the cart with the id of 33'),
(1164, 'Customer', 18, '2024-04-26 09:30:02', 'View Instrument', 'User viewed an instrument with product id 33'),
(1165, 'Customer', 18, '2024-04-26 09:30:30', 'Manage Cart', 'User viewed their cart'),
(1166, 'Customer', 18, '2024-04-26 09:32:01', 'Manage Profile', 'User viewed their profile'),
(1167, 'Customer', 18, '2024-04-26 09:32:06', 'View Instruments', 'User viewed the instruments available'),
(1168, 'Customer', 18, '2024-04-26 09:32:59', 'View Instruments', 'User viewed the instruments available'),
(1169, 'Customer', 18, '2024-04-26 09:33:20', 'Logout', 'User logged out'),
(1170, 'Administrator', 1, '2024-04-26 09:40:31', 'Login', 'Administrator logged in'),
(1171, 'Administrator', 1, '2024-04-26 09:40:37', 'View Service Providers', 'Administrator viewed active service providers'),
(1172, 'Administrator', 1, '2024-04-26 09:40:41', 'Manage Service Providers', 'Administrator viewed service provider 14 details'),
(1173, 'Administrator', 1, '2024-04-26 09:40:41', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1174, 'Administrator', 1, '2024-04-26 09:40:45', 'View Service Providers', 'Administrator viewed active service providers'),
(1175, 'Administrator', 1, '2024-04-26 09:40:49', 'Manage Service Providers', 'Administrator viewed service provider 42 details'),
(1176, 'Administrator', 1, '2024-04-26 09:40:49', 'Manage Service Providers', 'Administrator viewed service provider logo.png details'),
(1177, 'Administrator', 1, '2024-04-26 09:40:53', 'View Service Providers', 'Administrator viewed active service providers'),
(1178, 'Administrator', 1, '2024-04-26 09:40:58', 'Generate Reports', 'Administrator viewed reports'),
(1179, 'Administrator', 1, '2024-04-26 09:41:33', 'Logout', 'Administrator logged out'),
(1180, 'Service Provider', 26, '2024-04-26 10:12:28', 'Login', 'Service Provider has logged in'),
(1181, 'Service Provider', 26, '2024-04-26 10:12:31', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1182, 'Service Provider', 26, '2024-04-26 10:14:52', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1183, 'Service Provider', 26, '2024-04-26 10:14:52', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1184, 'Service Provider', 26, '2024-04-26 10:15:21', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1185, 'Service Provider', 26, '2024-04-26 10:26:30', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1186, 'Service Provider', 26, '2024-04-26 10:27:20', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1187, 'Service Provider', 26, '2024-04-26 10:30:13', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1188, 'Service Provider', 26, '2024-04-26 10:36:31', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1189, 'Service Provider', 26, '2024-04-26 10:36:37', 'Manage Inventory', 'Service Provider has viewed their Band inventory'),
(1190, 'Service Provider', 26, '2024-04-26 10:36:37', 'Manage Inventory', 'Service Provider has viewed their Band Inventory'),
(1191, 'Service Provider', 26, '2024-04-26 10:36:47', 'Manage Profile', 'Service Provider has viewed their profile'),
(1192, 'Service Provider', 26, '2024-04-26 10:36:50', 'Logout', 'Service Provider has logged out'),
(1193, 'Customer', 18, '2024-04-26 10:36:55', 'Login', 'User logged in'),
(1194, 'Customer', 18, '2024-04-26 10:36:58', 'View Instruments', 'User viewed the instruments available'),
(1195, 'Customer', 18, '2024-04-26 10:48:22', 'Manage Profile', 'User viewed their profile'),
(1196, 'Customer', 18, '2024-04-26 10:48:25', 'Logout', 'User logged out'),
(1197, 'Customer', 18, '2024-04-26 10:48:49', 'Login', 'User logged in'),
(1198, 'Customer', 18, '2024-04-26 10:49:29', 'View Instruments', 'User viewed the instruments available'),
(1199, 'Customer', 18, '2024-04-26 10:49:41', 'View Instrument', 'User viewed an instrument with product id 25'),
(1200, 'Customer', 18, '2024-04-26 10:50:26', 'Check Availability', 'User checked the availability of an Equipment  with product id 25'),
(1201, 'Customer', 18, '2024-04-26 10:50:32', 'Manage Cart', 'User added an Instrument to the cart with the id of 25'),
(1202, 'Customer', 18, '2024-04-26 10:50:32', 'View Instrument', 'User viewed an instrument with product id 25'),
(1203, 'Customer', 18, '2024-04-26 10:50:35', 'Manage Cart', 'User viewed their cart'),
(1204, 'Customer', 18, '2024-04-26 10:50:43', 'Place Order', 'User placed an order'),
(1205, 'Customer', 18, '2024-04-26 10:50:48', 'View Instruments', 'User viewed the instruments available'),
(1206, 'Customer', 18, '2024-04-26 10:50:50', 'View Orders', 'User viewed their orders'),
(1207, 'Customer', 18, '2024-04-26 10:50:50', 'View Instruments', 'User viewed the instruments available'),
(1208, 'Customer', 18, '2024-04-26 10:51:22', 'View Instruments', 'User viewed the instruments available'),
(1209, 'Customer', 18, '2024-04-26 10:51:25', 'View Instrument', 'User viewed an instrument with product id 26'),
(1210, 'Customer', 18, '2024-04-26 10:51:38', 'Manage Profile', 'User viewed their profile'),
(1211, 'Customer', 18, '2024-04-26 10:51:41', 'Logout', 'User logged out'),
(1212, 'Service Provider', 26, '2024-04-26 10:51:53', 'Login', 'Service Provider has logged in'),
(1213, 'Service Provider', 26, '2024-04-26 10:51:57', 'View Orders', 'Service Provider has viewed their orders'),
(1214, 'Service Provider', 26, '2024-04-26 10:52:06', 'Accept Order', 'Service Provider has accepted the order with the ID 61'),
(1215, 'Service Provider', 26, '2024-04-26 10:52:06', 'View Orders', 'Service Provider has viewed their orders'),
(1216, 'Service Provider', 26, '2024-04-26 10:53:00', 'View Orders', 'Service Provider has viewed their orders'),
(1217, 'Service Provider', 26, '2024-04-26 10:53:04', 'Manage Profile', 'Service Provider has viewed their profile'),
(1218, 'Service Provider', 26, '2024-04-26 10:53:21', 'Logout', 'Service Provider has logged out'),
(1219, 'Customer', 18, '2024-04-26 10:53:29', 'Login', 'User logged in'),
(1220, 'Customer', 18, '2024-04-26 10:53:32', 'View Instruments', 'User viewed the instruments available'),
(1221, 'Customer', 18, '2024-04-26 10:53:57', 'View Orders', 'User viewed their orders'),
(1222, 'Customer', 18, '2024-04-26 10:53:57', 'View Instruments', 'User viewed the instruments available'),
(1223, 'Customer', 18, '2024-04-26 10:54:23', 'View Instruments', 'User viewed the instruments available'),
(1224, 'Customer', 18, '2024-04-26 10:54:35', 'Manage Profile', 'User viewed their profile'),
(1225, 'Customer', 18, '2024-04-26 10:54:39', 'Manage Profile', 'User viewed the profile update page'),
(1226, 'Customer', 18, '2024-04-26 10:54:50', 'Manage Profile', 'User updated their profile information'),
(1227, 'Customer', 18, '2024-04-26 10:54:50', 'Manage Profile', 'User viewed their profile'),
(1228, 'Customer', 18, '2024-04-26 10:54:55', 'View Instruments', 'User viewed the instruments available'),
(1229, 'Customer', 18, '2024-04-26 10:55:06', 'View Inquiries', 'User viewed their inquiries'),
(1230, 'Customer', 18, '2024-04-26 10:55:52', 'Add Inquiry', 'User made an inquiry with inquiry type: billingIssue'),
(1231, 'Customer', 18, '2024-04-26 10:55:52', 'View Inquiries', 'User viewed their inquiries'),
(1232, 'Customer', 18, '2024-04-26 10:55:57', 'Logout', 'User logged out'),
(1233, 'Moderator', 1, '2024-04-26 10:56:20', 'Login', 'Moderator logged in'),
(1234, 'Moderator', 1, '2024-04-26 10:56:39', 'View Service Providers', 'Moderator viewed active service providers'),
(1235, 'Moderator', 1, '2024-04-26 10:56:43', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(1236, 'Moderator', 1, '2024-04-26 10:56:47', 'View Service Providers', 'Moderator viewed active service providers'),
(1237, 'Moderator', 1, '2024-04-26 10:57:08', 'Manage Service Providers', 'Moderator viewed service provider 14 details'),
(1238, 'Moderator', 1, '2024-04-26 10:57:10', 'View Service Providers', 'Moderator viewed active service providers'),
(1239, 'Moderator', 1, '2024-04-26 10:57:13', 'Manage Service Providers', 'Moderator viewed service provider 28 details'),
(1240, 'Moderator', 1, '2024-04-26 10:57:26', 'Manage Service Provider Requests', 'Moderator viewed pending service provider requests'),
(1241, 'Moderator', 1, '2024-04-26 10:57:29', 'Manage Service Provider Requests', 'Moderator viewed pending service provider request 43 details'),
(1242, 'Moderator', 1, '2024-04-26 10:57:33', 'Manage Service Provider Requests', 'Moderator viewed pending service provider requests'),
(1243, 'Moderator', 1, '2024-04-26 10:57:36', 'Manage Service Provider Requests', 'Moderator viewed pending service provider request 45 details'),
(1244, 'Moderator', 1, '2024-04-26 10:58:45', 'View Service Providers', 'Moderator viewed active service providers'),
(1245, 'Moderator', 1, '2024-04-26 10:58:46', 'View Service Providers', 'Moderator viewed rejected service providers'),
(1246, 'Moderator', 1, '2024-04-26 10:58:47', 'View Service Providers', 'Moderator viewed active service providers'),
(1247, 'Moderator', 1, '2024-04-26 10:58:50', 'Manage Service Providers', 'Moderator viewed service provider 34 details'),
(1248, 'Moderator', 1, '2024-04-26 10:59:04', 'View Service Provider Orders', 'Moderator viewed service provider 34 orders'),
(1249, 'Moderator', 1, '2024-04-26 10:59:07', 'Manage Service Providers', 'Moderator viewed service provider 34 details'),
(1250, 'Moderator', 1, '2024-04-26 10:59:08', 'View Service Providers', 'Moderator viewed active service providers'),
(1251, 'Moderator', 1, '2024-04-26 10:59:12', 'Manage Service Providers', 'Moderator viewed service provider 26 details'),
(1252, 'Moderator', 1, '2024-04-26 10:59:13', 'View Service Provider Orders', 'Moderator viewed service provider 26 orders'),
(1253, 'Moderator', 1, '2024-04-26 10:59:18', 'Manage Users', 'Moderator viewed user 18 details'),
(1254, 'Moderator', 1, '2024-04-26 10:59:21', 'View Service Provider Orders', 'Moderator viewed service provider 26 orders'),
(1255, 'Moderator', 1, '2024-04-26 10:59:25', 'View Service Provider Orders', 'Moderator viewed service provider 26 orders'),
(1256, 'Moderator', 1, '2024-04-26 10:59:27', 'View Product', 'Moderator viewed product 27 details of type Equipment'),
(1257, 'Moderator', 1, '2024-04-26 10:59:32', 'View Service Provider Orders', 'Moderator viewed service provider 26 orders'),
(1258, 'Moderator', 1, '2024-04-26 10:59:35', 'Manage Service Providers', 'Moderator viewed service provider 26 details'),
(1259, 'Moderator', 1, '2024-04-26 11:00:34', 'Login', 'Moderator logged in'),
(1260, 'Moderator', 1, '2024-04-26 11:00:36', 'View Users', 'Moderator viewed active users'),
(1261, 'Moderator', 1, '2024-04-26 11:00:47', 'View Users', 'Moderator viewed banned users'),
(1262, 'Moderator', 1, '2024-04-26 11:00:54', 'Manage Recover Requests', 'Moderator viewed pending recover requests'),
(1263, 'Moderator', 1, '2024-04-26 11:01:31', 'Manage Recover Requests', 'Moderator viewed recover request 8 details'),
(1264, 'Moderator', 1, '2024-04-26 11:02:45', 'View Inquiries', 'Moderator viewed pending inquiries'),
(1265, 'Moderator', 1, '2024-04-26 11:02:55', 'View Inquiry', 'Moderator viewed pending inquiry 6 details'),
(1266, 'Moderator', 1, '2024-04-26 11:02:58', 'Approve Inquiry', 'Moderator approved inquiry 6 and assign to self'),
(1267, 'Moderator', 1, '2024-04-26 11:02:58', 'View Inquiries', 'Moderator viewed pending inquiries'),
(1268, 'Moderator', 1, '2024-04-26 11:03:01', 'View Inquiries', 'Moderator viewed active inquiries'),
(1269, 'Moderator', 1, '2024-04-26 11:03:05', 'View Inquiry', 'Moderator viewed inquiry 6 details'),
(1270, 'Moderator', 1, '2024-04-26 11:03:25', 'Logout', 'Moderator logged out'),
(1271, 'Administrator', 1, '2024-04-26 11:03:38', 'Login', 'Administrator logged in'),
(1272, 'Administrator', 1, '2024-04-26 11:03:46', 'Generate Reports', 'Administrator viewed reports'),
(1273, 'Administrator', 1, '2024-04-26 11:04:20', 'Generate Reports', 'Administrator viewed reports'),
(1274, 'Administrator', 1, '2024-04-26 11:04:40', 'Generate Reports', 'Administrator viewed reports'),
(1275, 'Administrator', 1, '2024-04-26 11:05:14', 'Logout', 'Administrator logged out'),
(1276, 'Customer', 18, '2024-04-26 11:06:37', 'Login', 'User logged in'),
(1277, 'Customer', 18, '2024-04-26 11:06:40', 'View Orders', 'User viewed their orders'),
(1278, 'Customer', 18, '2024-04-26 11:06:41', 'View Instruments', 'User viewed the instruments available'),
(1279, 'Customer', 18, '2024-04-26 11:14:17', 'Logout', 'User logged out'),
(1280, 'Customer', 18, '2024-04-26 11:17:43', 'Login', 'User logged in'),
(1281, 'Customer', 18, '2024-04-26 11:17:51', 'View Studios', 'User viewed the studios available'),
(1282, 'Customer', 18, '2024-04-26 11:18:06', 'View Singers', 'User viewed the singers available'),
(1283, 'Customer', 18, '2024-04-26 11:18:14', 'View Bands', 'User viewed the bands available'),
(1284, 'Customer', 18, '2024-04-26 11:18:21', 'View Instruments', 'User viewed the instruments available'),
(1285, 'Customer', 18, '2024-04-26 11:18:23', 'View Orders', 'User viewed their orders'),
(1286, 'Customer', 18, '2024-04-26 11:18:23', 'View Instruments', 'User viewed the instruments available'),
(1287, 'Customer', 18, '2024-04-26 11:18:31', 'View Instruments', 'User viewed the instruments available'),
(1288, 'Customer', 18, '2024-04-26 11:19:07', 'View Instruments', 'User viewed the instruments available'),
(1289, 'Customer', 18, '2024-04-26 11:19:09', 'View Instrument', 'User viewed an instrument with product id 29'),
(1290, 'Customer', 18, '2024-04-26 11:19:20', 'Check Availability', 'User checked the availability of an Equipment  with product id 29'),
(1291, 'Customer', 18, '2024-04-26 11:19:21', 'Manage Cart', 'User added an Instrument to the cart with the id of 29'),
(1292, 'Customer', 18, '2024-04-26 11:19:21', 'View Instrument', 'User viewed an instrument with product id 29'),
(1293, 'Customer', 18, '2024-04-26 11:19:24', 'Manage Cart', 'User viewed their cart'),
(1294, 'Customer', 18, '2024-04-26 11:20:05', 'Place Order', 'User placed an order'),
(1295, 'Customer', 18, '2024-04-26 11:20:08', 'View Orders', 'User viewed their orders'),
(1296, 'Customer', 18, '2024-04-26 11:20:09', 'View Instruments', 'User viewed the instruments available'),
(1297, 'Customer', 18, '2024-04-26 11:22:08', 'Manage Cart', 'User viewed their cart'),
(1298, 'Customer', 18, '2024-04-26 11:22:14', 'View Studios', 'User viewed the studios available'),
(1299, 'Customer', 18, '2024-04-26 11:22:15', 'View Studio', 'User viewed an studio with product id 6'),
(1300, 'Customer', 18, '2024-04-26 11:22:25', 'Check Availability', 'User checked the availability of an Studio  with product id 6'),
(1301, 'Customer', 18, '2024-04-26 11:22:26', 'Manage Cart', 'User added a Studio to the cart with the id of 6'),
(1302, 'Customer', 18, '2024-04-26 11:22:26', 'View Studio', 'User viewed an studio with product id 6'),
(1303, 'Customer', 18, '2024-04-26 11:22:40', 'Manage Cart', 'User viewed their cart'),
(1304, 'Customer', 18, '2024-04-26 11:24:07', 'Place Order', 'User placed an order'),
(1305, 'Customer', 18, '2024-04-26 11:24:10', 'View Orders', 'User viewed their orders'),
(1306, 'Customer', 18, '2024-04-26 11:24:11', 'View Instruments', 'User viewed the instruments available'),
(1307, 'Customer', 18, '2024-04-26 11:28:07', 'View Instruments', 'User viewed the instruments available'),
(1308, 'Customer', 18, '2024-04-26 11:28:53', 'View Instruments', 'User viewed the instruments available'),
(1309, 'Customer', 18, '2024-04-26 11:29:06', 'View Instruments', 'User viewed the instruments available'),
(1310, 'Customer', 18, '2024-04-26 11:29:12', 'View Instruments', 'User viewed the instruments available'),
(1311, 'Customer', 18, '2024-04-26 11:33:31', 'View Instruments', 'User viewed the instruments available'),
(1312, 'Customer', 18, '2024-04-26 11:34:12', 'Logout', 'User logged out'),
(1313, 'Service Provider', 26, '2024-04-26 11:34:23', 'Login', 'Service Provider has logged in'),
(1314, 'Service Provider', 26, '2024-04-26 11:35:01', 'View Orders', 'Service Provider has viewed their orders'),
(1315, 'Service Provider', 26, '2024-04-26 11:45:34', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1316, 'Service Provider', 26, '2024-04-26 11:46:12', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1317, 'Service Provider', 26, '2024-04-26 11:46:35', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1318, 'Service Provider', 26, '2024-04-26 11:49:24', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1319, 'Service Provider', 26, '2024-04-26 11:50:15', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1320, 'Service Provider', 26, '2024-04-26 11:50:22', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1321, 'Service Provider', 26, '2024-04-26 11:50:23', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1322, 'Service Provider', 26, '2024-04-26 11:51:16', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1323, 'Service Provider', 26, '2024-04-26 11:51:51', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1324, 'Service Provider', 26, '2024-04-26 11:51:52', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1325, 'Service Provider', 26, '2024-04-26 11:51:52', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1326, 'Service Provider', 26, '2024-04-26 11:53:56', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1327, 'Service Provider', 26, '2024-04-26 11:54:08', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1328, 'Service Provider', 26, '2024-04-26 11:54:30', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1329, 'Service Provider', 26, '2024-04-26 11:54:50', 'Manage Inventory', 'Service Provider has deleted an item from their inventory with the ID 25'),
(1330, 'Service Provider', 26, '2024-04-26 11:55:10', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1331, 'Service Provider', 26, '2024-04-26 11:55:22', 'View Orders', 'Service Provider has viewed their orders'),
(1332, 'Service Provider', 26, '2024-04-26 11:55:33', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1333, 'Service Provider', 26, '2024-04-26 12:05:18', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1334, 'Service Provider', 26, '2024-04-26 12:05:37', 'Login', 'Service Provider has logged in'),
(1335, 'Service Provider', 26, '2024-04-26 12:05:40', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1336, 'Service Provider', 26, '2024-04-26 12:07:58', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1337, 'Service Provider', 26, '2024-04-26 12:08:42', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1338, 'Service Provider', 26, '2024-04-26 12:09:05', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1339, 'Service Provider', 26, '2024-04-26 12:09:20', 'Login', 'Service Provider has logged in'),
(1340, 'Service Provider', 26, '2024-04-26 12:09:27', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1341, 'Service Provider', 26, '2024-04-26 12:10:23', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1342, 'Service Provider', 26, '2024-04-26 12:13:11', 'Manage Inventory', 'Service Provider has viewed their Instrument inventory'),
(1343, 'Service Provider', 26, '2024-04-26 12:13:21', 'Manage Inventory', 'Service Provider has viewed their Band inventory'),
(1344, 'Service Provider', 26, '2024-04-26 12:13:21', 'Manage Inventory', 'Service Provider has viewed their Band Inventory'),
(1345, 'Service Provider', 26, '2024-04-26 12:16:39', 'Manage Inventory', 'Service Provider has viewed their Band inventory'),
(1346, 'Service Provider', 26, '2024-04-26 12:16:39', 'Manage Inventory', 'Service Provider has viewed their Band Inventory'),
(1347, 'Service Provider', 26, '2024-04-26 12:16:49', 'Manage Inventory', 'Service Provider has viewed their Singer inventory'),
(1348, 'Service Provider', 26, '2024-04-26 12:16:49', 'Manage Inventory', 'Service Provider has viewed their Singer Inventory'),
(1349, 'Service Provider', 26, '2024-04-26 12:17:11', 'Manage Inventory', 'Service Provider has viewed their Studio inventory'),
(1350, 'Service Provider', 26, '2024-04-26 12:17:11', 'Manage Inventory', 'Service Provider has viewed their Studio Inventory'),
(1351, 'Service Provider', 26, '2024-04-26 12:17:17', 'Manage Inventory', 'Service Provider has viewed their Singer inventory'),
(1352, 'Service Provider', 26, '2024-04-26 12:17:17', 'Manage Inventory', 'Service Provider has viewed their Singer Inventory'),
(1353, 'Service Provider', 26, '2024-04-26 12:17:24', 'Manage Inventory', 'Service Provider has viewed their Band inventory'),
(1354, 'Service Provider', 26, '2024-04-26 12:17:24', 'Manage Inventory', 'Service Provider has viewed their Band Inventory'),
(1355, 'Service Provider', 26, '2024-04-26 12:17:28', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(1356, 'Service Provider', 26, '2024-04-26 12:17:28', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(1357, 'Service Provider', 26, '2024-04-26 12:19:20', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(1358, 'Service Provider', 26, '2024-04-26 12:19:20', 'Manage Inventory', 'Service Provider has viewed their Musician Inventory'),
(1359, 'Service Provider', 26, '2024-04-26 12:19:36', 'View Orders', 'Service Provider has viewed their orders'),
(1360, 'Service Provider', 26, '2024-04-26 12:19:40', 'Manage Profile', 'Service Provider has viewed their profile');

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `moderator_id` int(10) NOT NULL,
  `moderator_name` varchar(255) NOT NULL,
  `moderator_email` varchar(255) NOT NULL,
  `moderator_contact_no` int(10) NOT NULL,
  `moderator_nic` varchar(15) NOT NULL,
  `moderator_address` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`moderator_id`, `moderator_name`, `moderator_email`, `moderator_contact_no`, `moderator_nic`, `moderator_address`, `password`, `type`, `status`) VALUES
(1, 'Nethsara Sandeepa', 'moderator01@gmail.com', 716229573, '98347716V', '04/C Hospital road, Jayawardhanapura.', '$2y$10$.fjzjyiF0Rg88ec0LNJGh.Aep5ScztV4nG6/9Rb0U9Uzevd7lnPUK', 'User Account Moderator', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `musician`
--

CREATE TABLE `musician` (
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(10) NOT NULL DEFAULT 'Musician',
  `brand` varchar(10) NOT NULL DEFAULT 'no brand',
  `model` varchar(10) NOT NULL DEFAULT 'no model',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` int(11) NOT NULL,
  `photo_1` varchar(100) NOT NULL,
  `photo_2` varchar(100) NOT NULL,
  `photo_3` varchar(100) NOT NULL,
  `Title` varchar(10) NOT NULL DEFAULT 'Musician',
  `Description` varchar(255) NOT NULL,
  `outOfStock` int(2) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warranty` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `nickName` varchar(100) NOT NULL,
  `telephoneNumber` int(11) NOT NULL,
  `videoLink` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL DEFAULT 'selectedNo',
  `singerPhoto` varchar(100) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musician`
--

INSERT INTO `musician` (`product_id`, `created_by`, `category`, `brand`, `model`, `quantity`, `unit_price`, `photo_1`, `photo_2`, `photo_3`, `Title`, `Description`, `outOfStock`, `createdDate`, `warranty`, `name`, `nickName`, `telephoneNumber`, `videoLink`, `location`, `instrument`, `singerPhoto`, `email`, `status`) VALUES
(16, 54, 'Musician', 'no brand', 'no model', 1, 10000, 'IMG-662adf20081fb8.19648333.jpg', 'IMG-662adf20085eb5.91403017.jpg', 'IMG-662adf2008b9f3.55852771.jpg', 'Musician', 'professional lead guitarist', 1, '2024-04-26 06:05:12', '2024-04-26 04:24:24', 'Asher Silva', 'Asher Silva', 2147483647, 'Warning:  Undefined array key', 'Colombo', 'ElectricGuitar', 'IMG-662adf2008fee1.49985089.jpg', 'asher.silva@example.com', 'Active'),
(17, 55, 'Musician', 'no brand', 'no model', 1, 8000, 'IMG-662adf8f85f0d2.23814295.jpg', 'IMG-662adf8f861ef5.39964117.jpg', 'IMG-662adf8f865436.60087132.jpg', 'Musician', 'professional keyboardist', 1, '2024-04-26 06:05:17', '2024-04-26 04:26:15', 'Isla Fernando', 'Isla Fernando', 2147483647, 'Warning:  Undefined array key', 'Gampaha', 'SnareDrum', 'IMG-662adf8f86a287.77480961.jpg', 'isla.fernando@example.com', 'Active'),
(18, 46, 'Musician', 'no brand', 'no model', 1, 10000, 'IMG-662ae049555949.94284118.jpg', 'IMG-662ae04955c5c8.89562544.jpg', 'IMG-662ae049562e85.75615068.jpg', 'Musician', 'professional drummer', 1, '2024-04-26 06:05:19', '2024-04-26 04:29:21', 'Liam Perera', 'Liam Perera', 2147483647, 'Warning:  Undefined array key', 'Kandy', 'DrumSet', 'IMG-662ae04956bde9.14584590.jpg', 'liam.perera@example.com', 'Active'),
(19, 46, 'Musician', 'no brand', 'no model', 1, 10000, 'IMG-662ae11de57709.46907534.jpg', 'IMG-662ae11de5c0e5.56863781.jpg', 'IMG-662ae11de639f5.26548233.jpg', 'Musician', 'Professional bass guitarist', 1, '2024-04-26 06:05:20', '2024-04-26 04:32:53', 'Harper Bandara', 'Harper Bandara', 2147483647, 'Warning:  Undefined array key', 'Kegalle', 'ElectricGuitar', 'IMG-662ae11de68181.17076811.jpg', 'harper.bandara@example.com', 'Active'),
(20, 50, 'Musician', 'no brand', 'no model', 1, 8000, 'IMG-662ae2700fe6f3.27695684.jpg', 'IMG-662ae270108752.47829602.jpg', 'IMG-662ae27010d0e3.47315011.jpg', 'Musician', 'professional saxaphone player', 1, '2024-04-26 06:05:23', '2024-04-26 04:38:32', 'Noah Silva', 'Noah Silva', 2147483647, 'Warning:  Undefined array key', 'Matara', 'Saxophone', 'IMG-662ae270110900.55213161.jpg', 'noah.silva@example.com', 'Active'),
(21, 50, 'Musician', 'no brand', 'no model', 1, 8000, 'IMG-662ae30e140157.04222342.jpg', 'IMG-662ae30e143859.85197772.jpg', 'IMG-662ae30e1469a7.40640062.jpg', 'Musician', 'Professional violine player', 1, '2024-04-26 06:05:25', '2024-04-26 04:41:10', 'Mia Perera', 'Mia Perera', 2147483647, 'Warning:  Undefined array key', 'Kurunegala', 'Violin', 'IMG-662ae30e14a0d0.41520948.jpg', 'mia.perera@example.com', 'Active'),
(22, 50, 'Musician', 'no brand', 'no model', 1, 10000, 'IMG-662ae3b9261704.97666377.jpg', 'IMG-662ae3b9266162.29686538.jpg', 'IMG-662ae3b926a2d7.69018099.jpg', 'Musician', 'professional classical guitar player', 1, '2024-04-26 06:05:27', '2024-04-26 04:44:01', 'Liam Rajapakse', 'Liam Rajapakse', 2147483647, 'Warning:  Undefined array key', 'Colombo', 'Guitar', 'IMG-662ae3b926f164.18279560.jpg', 'liam.rajapakse@example.com', 'Active'),
(23, 50, 'Musician', 'no brand', 'no model', 1, 15000, 'IMG-662ae478d65155.31477246.jpg', 'IMG-662ae478d6aea9.60355837.jpg', 'IMG-662ae478d74875.07231771.jpg', 'Musician', 'Professional keyboadist', 1, '2024-04-26 06:05:29', '2024-04-26 04:47:12', 'Olivia Fonseka', 'Olivia Fonseka', 2147483647, 'Warning:  Undefined array key', 'Colombo', 'Synthesizer', 'IMG-662ae478d7afd0.50037405.jpg', 'olivia.fonseka@example.com', 'Active'),
(24, 50, 'Musician', 'no brand', 'no model', 1, 10000, 'IMG-662ae5000f7a69.55354831.jpg', 'IMG-662ae5000fcef2.06518050.jpg', 'IMG-662ae5001032f0.88500195.jpg', 'Musician', 'Professional drummer', 1, '2024-04-26 06:05:31', '2024-04-26 04:49:28', 'Ethan Perera', 'Ethan Perera', 2147483647, 'Warning:  Undefined array key', 'Gampaha', 'NULL', 'IMG-662ae500107894.89099053.jpg', 'ethan.perera@example.com', 'Active'),
(25, 50, 'Musician', 'no brand', 'no model', 1, 20000, 'IMG-662ae5bc9674c6.49610099.jpg', 'IMG-662ae5bc96ce80.13591870.jpg', 'IMG-662ae5bc971c02.34498898.jpg', 'Musician', 'professional pianist', 1, '2024-04-26 06:05:33', '2024-04-26 04:52:36', 'Ava Silva', 'Ava Silva', 2147483647, 'Warning:  Undefined array key', 'Kandy', 'Piano', 'IMG-662ae5bc97b2c4.07173961.jpg', 'ava.silva@example.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_type`, `user_id`, `date_time`, `status`, `data`) VALUES
(17, 'ServiceProvider', 26, '2024-04-26 08:50:06', 'Unread', 'You have a new order request from Gayathra Dissanayake for '),
(18, 'Customer', 18, '2024-04-26 08:51:30', 'Read', 'Your order containing the sub order with the ID 59 has been accepted by the service provider'),
(19, 'ServiceProvider', 26, '2024-04-26 08:51:30', 'Unread', 'You have successfully accepted an order with the ID 59'),
(20, 'ServiceProvider', 26, '2024-05-01 22:00:00', 'Unread', 'You have an upcoming order with the sub order ID 59 starting at 2024-05-02 and ending at 2024-05-08'),
(21, 'ServiceProvider', 26, '2024-05-02 00:00:00', 'Unread', 'You have an upcoming order with the sub order ID 59 starting at 2024-05-02 and ending at 2024-05-08'),
(22, 'ServiceProvider', 26, '2024-05-08 22:00:00', 'Unread', 'Your order with the sub order ID 59 is about to end in 2 hours'),
(23, 'ServiceProvider', 26, '2024-05-09 00:00:00', 'Unread', 'Your order with the sub order ID 59 has ended'),
(24, 'Customer', 18, '2024-05-01 22:00:00', 'Unread', 'You have an upcoming order with the sub order ID 59 starting at 2024-05-02 and ending at 2024-05-08'),
(25, 'Customer', 18, '2024-05-02 00:00:00', 'Unread', 'You have an upcoming order with the sub order ID 59 starting at 2024-05-02 and ending at 2024-05-08'),
(26, 'Customer', 18, '2024-05-08 22:00:00', 'Unread', 'Your order with the sub order ID 59 is about to end in 2 hours. Please make sure to end the order on time to avoid any penalties.'),
(27, 'Customer', 18, '2024-05-09 00:00:00', 'Unread', 'Your order with the sub order ID 59 has ended. Please make sure to end the order on time to avoid any penalties.'),
(28, 'ServiceProvider', 27, '2024-04-26 10:50:43', 'Unread', 'You have a new order request from Gayathra Dissanayake for '),
(29, 'ServiceProvider', 26, '2024-04-26 10:50:43', 'Unread', 'You have a new order request from Gayathra Dissanayake for '),
(30, 'Customer', 18, '2024-04-26 10:52:06', 'Read', 'Your order containing the sub order with the ID 61 has been accepted by the service provider'),
(31, 'ServiceProvider', 26, '2024-04-26 10:52:06', 'Unread', 'You have successfully accepted an order with the ID 61'),
(32, 'ServiceProvider', 26, '2024-05-01 22:00:00', 'Unread', 'You have an upcoming order with the sub order ID 61 starting at 2024-05-02 and ending at 2024-05-04'),
(33, 'ServiceProvider', 26, '2024-05-02 00:00:00', 'Unread', 'You have an upcoming order with the sub order ID 61 starting at 2024-05-02 and ending at 2024-05-04'),
(34, 'ServiceProvider', 26, '2024-05-04 22:00:00', 'Unread', 'Your order with the sub order ID 61 is about to end in 2 hours'),
(35, 'ServiceProvider', 26, '2024-05-05 00:00:00', 'Unread', 'Your order with the sub order ID 61 has ended'),
(36, 'Customer', 18, '2024-05-01 22:00:00', 'Unread', 'You have an upcoming order with the sub order ID 61 starting at 2024-05-02 and ending at 2024-05-04'),
(37, 'Customer', 18, '2024-05-02 00:00:00', 'Unread', 'You have an upcoming order with the sub order ID 61 starting at 2024-05-02 and ending at 2024-05-04'),
(38, 'Customer', 18, '2024-05-04 22:00:00', 'Unread', 'Your order with the sub order ID 61 is about to end in 2 hours. Please make sure to end the order on time to avoid any penalties.'),
(39, 'Customer', 18, '2024-05-05 00:00:00', 'Unread', 'Your order with the sub order ID 61 has ended. Please make sure to end the order on time to avoid any penalties.'),
(40, 'Customer', 18, '2024-04-26 10:54:50', 'Read', 'Your profile information has been updated'),
(41, 'User', 18, '2024-04-26 11:02:58', 'Unread', 'Moderator with ID 1 has accepted your inquiry and will be assisting you'),
(42, 'ServiceProvider', 27, '2024-04-26 11:20:05', 'Unread', 'You have a new order request from Gayathra Dissanayake1 for '),
(43, 'ServiceProvider', 36, '2024-04-26 11:24:07', 'Unread', 'You have a new order request from Gayathra Dissanayake1 for '),
(44, 'ServiceProvider', 26, '2024-04-26 11:54:50', 'Unread', 'You have successfully deleted an item from your inventory');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sorder_id` mediumtext NOT NULL,
  `total` int(10) NOT NULL,
  `order_placed_on` date NOT NULL,
  `deposit` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `sorder_id`, `total`, `order_placed_on`, `deposit`) VALUES
(30, 18, '59', 126200, '2024-04-26', 15000),
(31, 18, '60,61', 136700, '2024-04-26', 36000),
(32, 18, '62', 95750, '2024-04-26', 21000),
(33, 18, '63', 3350, '2024-04-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_price` double NOT NULL,
  `photo_1` varchar(255) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `outOfStock` int(2) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warranty` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `created_by`, `category`, `brand`, `model`, `quantity`, `unit_price`, `photo_1`, `photo_2`, `photo_3`, `Title`, `Description`, `outOfStock`, `createdDate`, `warranty`, `status`) VALUES
(25, 26, 'Acoustic Guitars', 'Yamaha', 'Fender Squier SA-150', 5, 5000, 'IMG-662763e3df09e5.79897803.jpg', 'IMG-662763e3df9bb0.93679760.jpg', 'IMG-662763e3dfbaa8.61902064.jpg', 'Fender acoustic guitar', 'natural color Fender Squier SA-150 for rent', 0, '2024-04-26 09:55:08', '2026-06-16', 'Active'),
(26, 26, 'Acoustic Guitars', 'Yamaha', 'Yamaha F310', 3, 3000, 'IMG-6627675fbacb59.32610934.jpg', 'IMG-6627675fbaf3e4.80720735.jpg', 'IMG-6627675fbb2b64.58016462.jpg', 'Yamaha acoustic guitar', 'yamaha f310 for rent', 0, '2024-04-23 02:16:39', '2025-03-12', 'Active'),
(27, 26, 'Acoustic Guitars', 'Yamaha', 'Yamaha C40', 4, 5000, 'IMG-66277b8f33d9f1.75542121.jpg', 'IMG-66277b8f33fd65.21211951.jpg', 'IMG-66277b8f341ef7.99126530.jpg', 'Yamaha classical guitar', 'yamaha c40 classical guitar for rent', 0, '2024-04-23 03:42:47', '2025-07-17', 'Active'),
(28, 26, 'Acoustic Guitars', 'Yamaha', 'Yamaha C70', 4, 6000, 'IMG-66277f680dfbc1.98127888.jpg', 'IMG-66277f680e3010.74572238.jpg', 'IMG-66277f680e7037.22807167.jpg', 'yamaha classical guitar', 'Yamaha c70 for rent', 0, '2024-04-23 03:59:12', '2027-06-15', 'Active'),
(29, 27, 'Keyboard Piano', 'Yamaha', 'Yamaha G2 grand piano', 1, 7000, 'IMG-66290be07ecfd6.79092679.jpg', 'IMG-66290be07fddf6.21596167.jpg', 'IMG-66290be0805ab0.73708281.jpeg', 'yamaha piano', 'brand new yamaha G2 grand piano', 0, '2024-04-24 08:10:48', '2028-06-06', 'Active'),
(30, 27, 'Keyboard Piano', 'Kawai', 'Kawai KU2 Piano', 2, 5000, 'IMG-66290d8ca1e406.31241559.jpg', 'IMG-66290d8ca24661.66309893.jpg', 'IMG-66290d8ca2d3e2.24965934.jpg', 'kawai piano', 'brand new kawai KU2 piano', 0, '2024-04-24 08:17:56', '2027-09-13', 'Active'),
(31, 27, 'Keyboard Piano', 'Yamaha', 'Roland FP-30X', 3, 6000, 'IMG-662913d5d970a3.10986147.jpg', 'IMG-662913d5d9d670.20146610.jpg', 'IMG-662913d5da68c1.38861645.jpg', 'Roland piano', 'Roland digital piano with speakers', 0, '2024-04-24 10:03:29', '2028-07-05', 'Active'),
(32, 27, 'Band_And_Orchestra String Violins', 'Rozannas Violins', 'cremono SV-1240', 3, 5000, 'IMG-662922f8aee0d4.15939478.jpg', 'IMG-662922f8af10b9.22972240.jpg', 'IMG-662922f8af5c85.00316391.jpg', 'cremoni violin', 'brand new cremono violine', 0, '2024-04-24 09:49:20', '2028-06-24', 'Active'),
(33, 27, 'Band_And_Orchestra String Cellos', 'D Z Strad', 'DZ strad model 101', 1, 7000, 'IMG-662925d3b31215.36543688.jpg', 'IMG-662925d3b36b24.61520988.jpg', 'IMG-662925d3b761e8.71804797.jpg', 'DZ strad cello', 'DZ strad cello', 0, '2024-04-24 10:01:31', '2028-11-24', 'Active'),
(34, 27, 'Keyboard Organs', 'Roland', 'Roland-xps-30', 4, 3000, 'IMG-6629286ca672c6.19132441.jpg', 'IMG-6629286ca6abc5.10059599.jpg', 'IMG-6629286ca6e897.14820817.jpg', 'roland keyboard', 'brand new roland keyboard', 0, '2024-04-24 10:12:36', '2028-11-24', 'Active'),
(35, 27, 'Keyboard Organs', 'Roland', 'Roland FANTOM-6', 3, 4500, 'IMG-662929fb7689f0.46232835.jpg', 'IMG-662929fb76ded5.41410364.jpg', 'IMG-662929fb771333.74360315.jpg', 'roland synthesizer keyboard', 'brand new synthesizert', 0, '2024-04-24 10:19:15', '2027-11-24', 'Active'),
(36, 26, 'Acoustic Guitars', 'Ibanez', 'Ibanez AAD100', 4, 3500, 'IMG-662a0293e78140.13033415.png', 'IMG-662a0293e83940.90328425.jpg', 'IMG-662a0293e8abc3.56178054.jpg', 'ibanez acoustic guitar', 'brand new Ibanez guitar', 0, '2024-04-25 01:43:23', '2026-10-20', 'Active'),
(37, 26, 'Acoustic Guitars', 'Gibson', 'Gibson J-45', 3, 4000, 'IMG-662a03a337c621.27118250.jpg', 'IMG-662a03a3382755.94425899.jpg', 'IMG-662a03a3388783.50859615.jpg', 'Gibson acoustic guitar', 'gibson acoustic guitar', 0, '2024-04-25 01:47:55', '2027-06-15', 'Active'),
(38, 28, 'Percussion Drums', 'Bosphorus', 'Pearl EXX EXX 705/c', 1, 7000, 'IMG-662a0562a4c421.94608718.jpg', 'IMG-662a0562a51bc5.70154431.jpg', 'IMG-662a0562a594e9.53688464.jpg', 'Peaarl accoustic drumset', 'Blue pearl Drum set', 0, '2024-04-25 01:55:22', '2027-11-18', 'Active'),
(39, 28, 'Percussion Drums', 'Bosphorus', 'dw DWe', 1, 8000, 'IMG-662a06935c6544.05089821.jpg', 'IMG-662a06935cc6a5.41476668.jpg', 'IMG-662a06935d4a67.90494805.jpg', 'DW drum set', 'brand new dw drumset', 0, '2024-04-25 02:00:27', '2027-07-07', 'Active'),
(40, 28, 'Percussion Drums', 'Pergamon', 'Toca 2300RR', 1, 6000, 'IMG-662a07a352f545.92455382.jpg', 'IMG-662a07a3535f37.94498949.jpg', 'IMG-662a07a3540382.75369678.jpg', 'conga', 'toca red conga', 0, '2024-04-25 02:04:59', '2027-06-09', 'Active'),
(41, 28, 'Percussion Drums', 'Sabian', 'Artist EDK260', 1, 7000, 'IMG-662a0929b26b54.37864628.jpg', 'IMG-662a0929b2d329.53054653.jpg', 'IMG-662a0929b33f48.40082622.jpg', 'Electric drum set', 'Brand new electric Drum set', 0, '2024-04-25 02:11:29', '2027-07-08', 'Active'),
(42, 28, 'Percussion Cymbals', 'Istanbul Agop', 'ERINGOGO', 1, 2500, 'IMG-662a0a0b1ff632.95645481.jpg', 'IMG-662a0a0b205060.04598154.jpg', 'IMG-662a0a0b20dd54.35073735.jpg', 'cymbls', 'ERINGOGO 2 ps cymbals', 0, '2024-04-25 02:15:15', '2025-06-11', 'Active'),
(43, 29, 'Keyboard Organs', 'Roland', 'Roland EX-20', 3, 4500, 'IMG-662a0c072b7560.36188110.jpg', 'IMG-662a0c072be9e9.51402532.jpg', 'IMG-662a0c072c7f12.28251925.jpg', 'Roland keyboard', 'brand new roland keyboard', 0, '2024-04-25 02:23:43', '2027-06-09', 'Active'),
(44, 29, 'Keyboard Organs', 'Baldwin', 'Baldwin EX-10', 1, 3500, 'IMG-662a0d4d8f9224.94046976.jpg', 'IMG-662a0d4d900033.00436360.jpg', 'IMG-662a0d4d906ca8.70205493.jpg', 'Baldwin keyboard', 'Brand new Baldwin keyboard', 0, '2024-04-25 02:29:09', '2026-06-09', 'Active'),
(45, 29, 'Keyboard Organs', 'Roland', 'Roland E-A7', 2, 5000, 'IMG-662a0e3d0cd2f1.72718337.jpg', 'IMG-662a0e3d0d46d4.18906363.jpg', 'IMG-662a0e3d0df153.80554613.jpg', 'Roland Keyboard', 'brand new Roland keyboard', 0, '2024-04-25 02:33:09', '2028-07-05', 'Active'),
(46, 29, 'Keyboard Organs', 'Gulbransen', 'Yamaha PSR-E473', 2, 5500, 'IMG-662a0f7290a397.30059436.jpg', 'IMG-662a0f72911275.25441079.jpg', 'IMG-662a0f72917802.28580946.jpg', 'Yamaha keyboard', 'beand new yamaha keyboard', 0, '2024-04-25 02:38:18', '2026-10-13', 'Active'),
(47, 29, 'Keyboard Organs', 'Conn', 'Casio CTK-7200', 1, 6400, 'IMG-662a10d7287a87.52488231.jpg', 'IMG-662a10d728db69.37539536.jpg', 'IMG-662a10d7295bc6.24512912.jpg', 'Casio keyboard', 'Casio keyboard', 0, '2024-04-25 02:44:15', '2026-08-14', 'Active'),
(48, 30, 'Electric Guitars', 'Ibanez', 'Ibanez GSR180', 3, 4500, 'IMG-662a1833bc6656.42898101.jpg', 'IMG-662a1833bcd7e6.70934945.jpg', 'IMG-662a1833bd6280.64796920.jpg', 'Ibanez bass guitar', 'Ibanez bass guitar', 0, '2024-04-25 03:15:39', '2025-11-12', 'Active'),
(49, 30, 'Acoustic Guitars', 'Yamaha', 'Yamaha FG820', 1, 5000, 'IMG-662a19316e2228.12454870.jpg', 'IMG-662a19316e7e07.17730154.jpg', 'IMG-662a19316ee5c2.51577934.jpg', 'Yamaha 12 string guitat', 'Yamaha 12 string guitar', 0, '2024-04-25 03:19:53', '2027-11-25', 'Active'),
(50, 30, 'Acoustic Guitars', 'Yamaha', 'Kremona Fiesta F65CW-7S', 2, 4500, 'IMG-662a1a807d6fd3.79668609.jpg', 'IMG-662a1a807ddce5.78847410.jpg', 'IMG-662a1a807e7584.07475831.jpg', 'Kremona acoustic guitar', 'kremona acoustic guitar', 0, '2024-04-25 03:25:28', '2024-11-13', 'Active'),
(51, 30, 'Audio Amplifiers', 'Yamaha', 'Yamaha GA 15', 4, 3000, 'IMG-662a1b4ecb2975.71730754.jpg', 'IMG-662a1b4ecb9f24.12603834.jpg', 'IMG-662a1b4ecc3019.57774214.jpg', 'Yamaha amplifier', 'Yamaha lead guitar amplifier', 0, '2024-04-25 03:28:54', '2026-07-09', 'Active'),
(52, 30, 'Audio Microphones', 'AKG', 'AKG D90s', 3, 2500, 'IMG-662a1c50065706.14757500.jpg', 'IMG-662a1c5006d0f3.22422754.png', 'IMG-662a1c50076241.84487169.jpg', 'AKG microphone', 'high quality microphone', 0, '2024-04-25 03:33:12', '2027-10-12', 'Active'),
(53, 31, 'Audio Headphones', 'Yamaha', 'Yamaha HPH-MT 7', 3, 3000, 'IMG-662a20bc2141c1.86551772.jpg', 'IMG-662a20bc21bac9.54568369.jpg', 'IMG-662a20bc221951.30675485.jpg', 'Yamaha head phone', 'High quality head phones', 0, '2024-04-25 03:52:04', '2026-11-26', 'Active'),
(54, 31, 'Audio Mixers', 'Yamaha', 'Yamaha MG20XU', 1, 7000, 'IMG-662a2187583820.23666212.jpg', 'IMG-662a218758a052.80685057.jpg', 'IMG-662a2187592f30.23660156.jpg', 'Yamaha mixer', 'Yamaha mixer', 0, '2024-04-25 03:55:27', '2027-11-17', 'Active'),
(55, 31, 'Audio Amplifiers', 'Powell', 'Marshall MG50GX', 2, 4500, 'IMG-662a22a44cf486.33904981.jpg', 'IMG-662a22a44d5b18.90300263.jpg', 'IMG-662a22a44dc563.91273617.jpg', 'Marshal amplifier', 'marshall guitar amplifier', 0, '2024-04-25 04:00:12', '2027-10-13', 'Active'),
(56, 31, 'Audio Amplifiers', 'Armstrong', 'Fender Rumble 40 V3', 2, 5000, 'IMG-662a239f6040e0.62146188.jpg', 'IMG-662a239f60a9b2.39698000.jpg', 'IMG-662a239f613eb2.43216018.jpg', 'Bass guitar amplifier', 'Bass guitar amplifier', 0, '2024-04-25 04:04:23', '2027-08-13', 'Active'),
(57, 32, 'Band_And_Orchestra Woodwind Flutes', 'Yamaha', 'Yamaha YFL-222', 4, 5000, 'IMG-662a2c3e9bb989.72699940.jpg', 'IMG-662a2c3e9c1720.72830309.jpg', 'IMG-662a2c3e9c7e96.62670828.jpg', 'Yamaha Flute', 'Yamaha flute', 0, '2024-04-25 04:41:10', '2027-09-12', 'Active'),
(58, 32, 'Band_And_Orchestra Woodwind Flutes', 'Armstrong', 'Jupiter 700E', 5, 2000, 'IMG-662a2d7758c0d8.29978485.jpg', 'IMG-662a2d7758eab2.71306570.jpg', 'IMG-662a2d77591571.57739590.jpg', 'Armstrong Flute', 'Jupiter student flute', 0, '2024-04-25 04:46:23', '2028-11-15', 'Active'),
(59, 32, 'Band_And_Orchestra Woodwind Clarinets', 'Buffet Crampon', 'Buffet Crmpon E-11C', 2, 4000, 'IMG-662a2ecfd764d4.24846665.jpg', 'IMG-662a2ecfd7f445.62920202.jpg', 'IMG-662a2ecfd89da6.01430072.jpg', 'Buffet Crampon Clarinet', 'Brand new clarinet', 0, '2024-04-25 04:52:07', '2027-11-18', 'Active'),
(60, 32, 'Band_And_Orchestra Woodwind Saxophones', 'Yamaha', 'Yamaha YAS-280', 2, 8000, 'IMG-662a2f6a307ee9.80095863.jpg', 'IMG-662a2f6a30e971.03497912.jpg', 'IMG-662a2f6a315163.91862280.jpg', 'Yamaha Saxophone', 'Brand new saxophone', 0, '2024-04-25 04:54:42', '2027-11-25', 'Active'),
(61, 32, 'Band_And_Orchestra Woodwind Saxophones', 'Selmer', 'Selmer series III tenor', 4, 7500, 'IMG-662a3008a4c2e3.94642840.jpg', 'IMG-662a3008a54094.91150585.jpg', 'IMG-662a3008a5cd71.98055218.jpg', 'Selmer Saxophone', 'Brand new saxophone', 0, '2024-04-25 04:57:20', '2027-08-20', 'Active'),
(62, 33, 'Acoustic Guitars', 'Yamaha', 'Yamaha F310', 5, 2500, 'IMG-662a3185d5d9e8.15264614.jpg', 'IMG-662a3185d66321.36760276.jpg', 'IMG-662a3185d70488.71950715.jpg', 'Yamaha acoustic guitar', 'Brand new Yamaha acoustic guitar', 0, '2024-04-25 05:03:41', '2026-11-19', 'Active'),
(63, 33, 'Band_And_Orchestra String Violins', 'Suzuki', 'Suzuki NS-20', 2, 3000, 'IMG-662a35e0219de9.01385709.jpg', 'IMG-662a35e0220169.52739153.jpg', 'IMG-662a35e02275c3.31360245.jpg', 'Suzuki ciolin', 'Suzuki brand new violin', 0, '2024-04-25 05:22:16', '2027-12-24', 'Active'),
(64, 33, 'Band_And_Orchestra String Cellos', 'D Z Strad', 'DZ strad model 250', 1, 6000, 'IMG-662a379ed01917.85492343.jpg', 'IMG-662a379ed09e44.38532248.jpg', 'IMG-662a379ed14475.80507127.jpg', 'Cello', 'Brand new cello', 0, '2024-04-25 05:29:42', '2027-10-19', 'Active'),
(65, 33, 'Percussion Drums', 'Pergamon', 'Acrylic DDAC2215CL', 1, 8000, 'IMG-662a38c8aec559.62102181.jpg', 'IMG-662a38c8af5b88.09116078.jpg', 'IMG-662a38c8afce01.20738809.jpg', 'Acoustic drum set', 'Brand new acoustic drum set', 0, '2024-04-25 05:34:40', '2027-11-18', 'Active'),
(66, 34, 'Electric Guitars', 'Gibson', 'Gibson ES-330TD', 2, 4500, 'IMG-662a3a5a80fc33.46408383.jpg', 'IMG-662a3a5a8162a2.14933158.jpg', 'IMG-662a3a5a81ec01.42915199.jpg', 'Gibson electic guitar', 'Brand new gibson electic guitar', 0, '2024-04-25 05:41:22', '2027-10-12', 'Active'),
(67, 34, 'Electric Guitars', 'PRS', 'PRS CE 24', 2, 5000, 'IMG-662a3b300ecc71.75072071.jpg', 'IMG-662a3b300f5239.92113542.jpg', 'IMG-662a3b30101625.02845182.jpg', 'PRS electric guitar', 'Brand new PES guitar', 0, '2024-04-25 05:44:56', '2024-12-20', 'Active'),
(68, 34, 'Electric Guitars', 'PRS', 'PRS SE Standard 24', 5, 7000, 'IMG-662a3c0ab2aad3.46383548.jpg', 'IMG-662a3c0ab30ca9.80986690.jpg', 'IMG-662a3c0ab38730.40466386.jpg', 'PRS electirc guitar', 'Brand new PRS electric guitar', 0, '2024-04-25 05:48:34', '2027-11-17', 'Active'),
(69, 34, 'Electric Guitars', 'Epiphone', 'Epiphone  ES-335', 3, 5000, 'IMG-662a3e700454c6.50099609.jpg', 'IMG-662a3e7004e288.14454614.jpg', 'IMG-662a3e70052c94.02974325.jpg', 'Epiphone electric guitar', 'Brand new electric guitar', 0, '2024-04-25 05:58:48', '2027-07-15', 'Active'),
(70, 34, 'Electric Guitars', 'ESP', 'ESP LTD EC-1000', 2, 2500, 'IMG-662a406257e949.39054809.png', 'IMG-662a4062586e89.28793419.jpg', 'IMG-662a4062590e24.99093201.jpg', 'Esp Electric guitar', 'ESP electric guitar', 0, '2024-04-25 06:07:06', '2027-11-18', 'Active'),
(71, 35, 'Band_And_Orchestra Brass ', 'Bach', 'Yamaha YTR - 2330', 4, 2500, 'IMG-662a42884c3ad2.06097869.jpg', 'IMG-662a42884ca4f7.54985387.jpg', 'IMG-662a42884d4854.47794779.jpg', 'Yamaha Trumpet', 'Student trumpet', 0, '2024-04-25 06:16:16', '2026-06-09', 'Active'),
(72, 35, 'Band_And_Orchestra Brass ', 'Bach', 'Bach 190M37X', 7, 4500, 'IMG-662a434ccb37a7.56250138.jpg', 'IMG-662a434ccbb2d9.85409810.jpg', 'IMG-662a434ccc6768.01477700.jpg', 'Bach Trumpet', 'Brandnew Bach Trumpet', 0, '2024-04-25 06:19:32', '2027-07-15', 'Active'),
(73, 35, 'Band_And_Orchestra Brass ', 'Jupiter', 'Jupiter JR606MR', 2, 5000, 'IMG-662a43fd80d0f6.47036597.jpg', 'IMG-662a43fd815451.42396255.jpg', 'IMG-662a43fd81ca44.91678217.jpg', 'Jupiter Trumpet', 'Brand new Jupiter trumpet', 0, '2024-04-25 06:22:29', '2028-11-16', 'Active'),
(74, 35, 'Band_And_Orchestra Brass ', 'Bach', 'Yamaha YSL-354C', 3, 6000, 'IMG-662a44c2eb3697.57558354.jpg', 'IMG-662a44c2ebb218.67675384.jpg', 'IMG-662a44c2ec4a24.62992900.jpg', 'Yamaha Trombone', 'Brand new Yamaha Trombone', 0, '2024-04-25 06:25:46', '2027-08-20', 'Active'),
(75, 35, 'Band_And_Orchestra Brass ', 'Yamaha', 'Yamaha YHR 314', 2, 5000, 'IMG-662a45a75f8698.18270801.jpg', 'IMG-662a45a75ff650.14620024.jpg', 'IMG-662a45a7606fb2.29635494.jpg', 'French Horn', 'Brand new French Horne', 0, '2024-04-25 06:29:35', '2027-11-18', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `recover_account_user`
--

CREATE TABLE `recover_account_user` (
  `recover_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL DEFAULT 'Not Given',
  `first_purchase_date` date NOT NULL DEFAULT '1400-01-01',
  `first_purchase_item` varchar(255) NOT NULL DEFAULT 'Not Given',
  `last_purchase_date` date NOT NULL DEFAULT '1400-01-01',
  `last_purchase_item` varchar(255) NOT NULL DEFAULT 'Not Given',
  `account_created_on` date DEFAULT '1400-01-01',
  `mobile_number` int(13) NOT NULL DEFAULT 0,
  `address` text NOT NULL DEFAULT 'Not Given',
  `dob` date NOT NULL DEFAULT '1400-01-01',
  `gender` varchar(255) NOT NULL DEFAULT 'Not Given',
  `other` text NOT NULL DEFAULT 'Not Given',
  `status` varchar(255) NOT NULL,
  `placed_on` date NOT NULL,
  `contactEmail` varchar(255) DEFAULT 'Not Given',
  `securityQuestion` varchar(255) NOT NULL DEFAULT 'Not Given',
  `securityAnswer` varchar(255) NOT NULL DEFAULT 'Not Given'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recover_account_user`
--

INSERT INTO `recover_account_user` (`recover_id`, `user_name`, `first_purchase_date`, `first_purchase_item`, `last_purchase_date`, `last_purchase_item`, `account_created_on`, `mobile_number`, `address`, `dob`, `gender`, `other`, `status`, `placed_on`, `contactEmail`, `securityQuestion`, `securityAnswer`) VALUES
(8, 'Gayathra Dissanayake', '0000-00-00', '', '0000-00-00', '', '2023-12-13', 702604647, 'No 05 Kottawa Pannipitiya', '2000-03-31', 'male', '', 'Pending', '2024-04-26', 'itsaeox98@gmail.com', 'What is your mother\'s maiden name?', 'eroshini');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rating` int(10) NOT NULL,
  `content` mediumtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `placed_on` date DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sec_queation`
--

CREATE TABLE `sec_queation` (
  `sec_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sec_queation`
--

INSERT INTO `sec_queation` (`sec_id`, `user_type`, `user_id`, `question`, `answer`) VALUES
(1, 'Customer', 26, 'What is the model of your first car', 'onmi'),
(2, 'Customer', 27, 'In which city were you born?', 'anuradhapura'),
(3, 'Customer', 28, 'In which city were you born?', 'colombo'),
(4, 'Customer', 29, 'In which city were you born?', 'Homagama'),
(5, 'Customer', 30, 'What is your mother&#39;s maiden name?', 'Kumari'),
(6, 'Customer', 31, 'What is the name of your first pet?', 'tom'),
(7, 'Customer', 32, 'What is your favorite childhood book?', 'sherlock Holmes'),
(8, 'Customer', 33, 'What is the model of your first car?', 'toyota'),
(9, 'Customer', 34, 'What is your mother&#39;s maiden name?', 'uma'),
(10, 'Customer', 35, 'In which city were you born?', 'colombo'),
(11, 'Customer', 36, 'What is the name of your first pet?', 'jambo'),
(12, 'Customer', 37, 'What is your favorite childhood book?', 'beauty and the beast'),
(13, 'Customer', 38, 'What is the model of your first car?', 'tesla'),
(14, 'Customer', 39, 'What is your mother&#39;s maiden name?', 'pooja'),
(15, 'Customer', 40, 'In which city were you born?', 'kandy'),
(16, 'Customer', 41, 'What is the name of your first pet?', 'sindy'),
(17, 'Customer', 42, 'What is your favorite childhood book?', 'harry potter'),
(18, 'Customer', 43, 'What is the model of your first car?', 'honda civic'),
(19, 'Customer', 44, 'What is your mother&#39;s maiden name?', 'madu');

-- --------------------------------------------------------

--
-- Table structure for table `serviceproviders`
--

CREATE TABLE `serviceproviders` (
  `serviceprovider_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_contact_no` varchar(13) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_address` varchar(255) NOT NULL,
  `owner_contact_no` varchar(13) NOT NULL,
  `owner_nic` varchar(15) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `verification` int(10) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `photo_R1` varchar(255) NOT NULL,
  `photo_R2` varchar(255) NOT NULL,
  `photo_R3` varchar(255) NOT NULL,
  `photo_R4` varchar(255) NOT NULL,
  `photo_R5` varchar(255) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serviceproviders`
--

INSERT INTO `serviceproviders` (`serviceprovider_id`, `business_name`, `business_address`, `business_contact_no`, `business_email`, `password`, `owner_name`, `owner_address`, `owner_contact_no`, `owner_nic`, `owner_email`, `about`, `profile_photo`, `verification`, `status`, `photo_R1`, `photo_R2`, `photo_R3`, `photo_R4`, `photo_R5`, `registration_date`) VALUES
(14, 'Aeox Studios', '23/1B, Kottawa, Pannipitiya', '0717345366', 'gayathradissa@gmail.com', '$2y$10$wnKk3/23oLc/i9IZlSiae.iqt/Zx6.zjn8vMQ6I3XO9HCoriMBy7m', 'Gayathra Dissanayake', 'No 05, Kottawa Pannipitiya', '0702604647', '200009102897', 'gayathradissa@gmail.com', 'about Aeox Studios', 'IMG-65864b06e5a500.12264750.jpg', 162655, 'Active', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2023-11-01'),
(26, 'Melody Mart', '25A, Palm Grove, Colombo 03', '1234567890', 'melodymart@gmail.com', '$2y$10$4Yq2hAMpm1NEZ790gSMsKOnIzmkeIfcAdqvSl/mUwlAi9ZVvz0FOS', 'Emily Johnson', '10B, Jasmine Lane, Kandy', '2345678901', '123456789012345', 'emilyjohnson@gmail.com', 'about melody mart', 'IMG-6627616b0532c4.16165502.jpg', 222684, 'Active', 'IMG-66262a2ad4bf40.19996905.jpg', 'IMG-66262a2ad4ea99.37831850.jpg', 'IMG-66262a2ad53029.27396713.jpg', 'IMG-66262a2ad56c24.09708517.jpg', 'IMG-66262a2ad5a743.83917572.jpg', '2024-04-22'),
(27, 'Harmony Haven', '45, Ocean View Road, Galle', '3456789012', 'harmonyhaven@gmail.com', '$2y$10$mWZKH02kkI7TXEOscgXTgeYR8XKJzqL9CbrG2XSHq6P/MvPyQNTpe', 'Daniel Martinez', '7/2, Lotus Avenue, Negombo', '4567890123', '234567890123456', 'danielmartinez@gmail.com', 'about harmony haven', 'IMG-66262b543f8ad4.59753967.png', 224201, 'Active', 'IMG-66262b543e9d74.47294772.jpg', 'IMG-66262b543ebd17.10801180.jpg', 'IMG-66262b543ee848.35768548.jpg', 'IMG-66262b543f1592.89971184.jpg', 'IMG-66262b543f51f5.27615260.jpg', '2024-04-22'),
(28, 'Tempo Trading', '14, Hillside Drive, Nuwara Eliya', '5678901234', 'tempotrading@gmail.com', '$2y$10$qZN6tsu98aBEyKsshVjwyeul3NWKvKhnZM6vrgge9ISkyNXXw838O', 'Chloe Brown', '32, Coconut Gardens, Jaffna', '6789012345', '567890123456789', 'chloebrown@gmail.com', 'about tempo trading', 'IMG-66262cc1bf4e75.65336557.jpg', 227427, 'Active', 'IMG-66262cc1be1735.39028696.jpg', 'IMG-66262cc1be5eb1.56054691.jpg', 'IMG-66262cc1bebb51.25399206.jpg', 'IMG-66262cc1beeeb2.35804302.jpg', 'IMG-66262cc1bf1c84.35309770.jpg', '2024-04-22'),
(29, 'Rhythm Retail', '6A, Sunset Street, Matara', '7890123456', 'rhythmretail@gmail.com', '$2y$10$9WQFLCRj9EwsqtyI.Tt1YeIQ//TAFyAlMNj6txKqGGiDRAeeJOKaO', 'Ethan Anderson', '18/1, River Bank, Trincomalee', '8901234567', '456789012345678', 'ethananderson@gmail.com', 'about rhythm retail', 'IMG-662a0ada79b402.89805769.jpg', 321762, 'Active', 'IMG-66262ebc8518e8.65976844.jpg', 'IMG-66262ebc855901.84756511.jpg', 'IMG-66262ebc858534.70747609.jpg', 'IMG-66262ebc85b0e5.35814121.jpg', 'IMG-66262ebc85eda7.84767113.jpg', '2024-04-22'),
(30, 'Crescendo Corner', '22, Paradise Road, Batticaloa', '9012345678', 'crescendocorner@gamil.com', '$2y$10$SnDa2.pyn1CEB4nz3L7ok..V38QOqwKgJfJpeZgb5T0LIV1RncmlO', 'Olivia Wilson', '3, Coral Crescent, Anuradhapura', '0123456789', '567890123456789', 'oliviawilson@gmail.com', 'about Crescendo Corner', 'IMG-66263180cd7b40.87930576.png', 207027, 'Active', 'IMG-66263180cc4102.90208100.jpg', 'IMG-66263180cc6fc6.62054073.jpg', 'IMG-66263180cc9ce6.93427251.jpg', 'IMG-66263180ccd1b5.94119569.jpg', 'IMG-66263180cd2493.59129914.jpg', '2024-04-22'),
(31, 'Sonic Supplies', '8, Pearl Avenue, Ratnapura', '1352463579', 'sonicsupplies@gmail.com', '$2y$10$FsL2aGqZEKFUgtZJPLjMzO2aJJjMTQ0LIlhVmLDLrlzfjWlbn/0py', 'Alexander Taylor', '11/5, Starlight Lane, Polonnaruwa', '2463574680', '678901234567890', 'alexandertaylor@gmail.com', 'about sonic suppies', 'IMG-662634d87a81a8.60777547.png', 196046, 'Active', 'IMG-662634d878f119.31083490.jpg', 'IMG-662634d8794878.81302655.jpg', 'IMG-662634d8798782.13185177.jpg', 'IMG-662634d879d273.95726824.jpg', 'IMG-662634d87a3694.24688128.jpg', '2024-04-22'),
(32, 'Note Nexus', '29, Moonbeam Road, Hambantota', '3574685791', 'notenexus@gmail.com', '$2y$10$14Jm/Xr/ubvAEQEwroruH.FQe.EZMb.YM8jROoQKJMRMBu17SYW4.', 'Sophia Thompson', '17, Sapphire Street, Ampara', '4685796802', '789012345678901', 'sophiathompson@gmail.com', 'about note nexus', 'IMG-66263b97cebad0.98016700.png', 655054, 'Active', 'IMG-66263b97cd7334.24644603.jpg', 'IMG-66263b97cdc109.29437380.jpg', 'IMG-66263b97cdfb83.26788368.jpg', 'IMG-66263b97ce4004.89866015.jpg', 'IMG-66263b97ce8f41.17654169.jpg', '2024-04-22'),
(33, 'Acoustic Avenue', '5, Emerald Close, Badulla', '5796807913', 'acousticavenue@gmail.com', '$2y$10$nb35jSNLRyuR5yVQYS6B1e4NhrETgOJs1UJuhfpgP4E9NJ8aCtm3O', 'Mason Harris', '42, Ruby Lane, Kurunegala', '6807918024', '890123456789012', 'masonharris@gmail.com', 'about acoustic avenue', 'IMG-662641300428d5.49071232.jpg', 122620, 'Active', 'IMG-662641300308b6.80116826.jpg', 'IMG-66264130032b77.03745579.jpg', 'IMG-66264130035655.32435004.jpg', 'IMG-662641300397b7.04896067.jpg', 'IMG-6626413003e5f5.08633875.jpg', '2024-04-22'),
(34, 'String Emporium', '9A, Gold View Terrace, Gampaha', '7918029135', 'stringemporium@gmail.com', '$2y$10$0gSvup/J3SD6zJaocvAH4.ax/7uC8g0yuIVnkrrdiudZPP.loNwZm', 'Ava Clark', '20, Diamond Drive, Kalutara', '8029130246', '802567890234567', 'avaclark@gmail.com', 'about String Emporium', 'IMG-6626448552c541.72696355.jpg', 267588, 'Active', 'IMG-66264485517759.76883441.jpg', 'IMG-6626448551ad14.98440390.jpg', 'IMG-6626448551ef03.88053504.jpg', 'IMG-66264485522794.35027445.jpg', 'IMG-66264485527604.22628214.jpg', '2024-04-22'),
(35, 'Brass Bazaar', '12/3, Silver Crescent, Matale', '9130241357', 'brassbazaar@gmail.com', '$2y$10$sin89NpftTcX7G35rQMp/uuKT6Uoj0dyd5hd6yq0n82zNbLbay6PS', 'William Lewis', '33, Platinum Park, Bentota', '0241352468', '012345678901234', 'williamlewis@gmail.com', 'about Brass Bazaar', 'IMG-66264699d915c8.84395177.jpg', 271306, 'Active', 'IMG-66264699d338e1.68397206.jpg', 'IMG-66264699d36075.22558464.jpg', 'IMG-66264699d87c20.83895585.jpg', 'IMG-66264699d8ae74.25407603.jpg', 'IMG-66264699d8ea03.69640597.jpg', '2024-04-22'),
(36, 'SoundScape Studios', '6, Crystal Gardens, Dambulla', '1472583690', 'soundscapestudios@gmail.com', '$2y$10$EtlBKfR4SU54CNHt0t1BluHVmJpSc4TfLpmQUXCemFAYCRvaxC.sm', 'Isabella Robinson', '15/1, Topaz Street, Beruwala', '2583694801', '135792468012345', 'isabellarobinson@gmail.com', 'about SoundScape Studios', 'IMG-66264e6961ccd4.32512582.png', 108595, 'Active', 'IMG-66264e696146a3.19471744.jpeg', 'IMG-66264e69616c73.27083571.jpg', 'IMG-66264e69619d12.09128703.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(37, 'NoteCraft Music', '27, Amethyst Lane, Gampola', '3694805912', 'notecraftmusic@gmail.com', '$2y$10$/LvY.vlkvdAKl.fME6ytxOQVXW4Amnb9H/NKDj.eOS45586GmO7Ke', 'Michael Hall', '4B, Garnet Avenue, Vavuniya', '3694805912', '246801357923456', 'michaelhall@gmai.com', 'about NoteCraft Music', 'IMG-6626523ee550f7.70380855.jpg', 556283, 'Active', 'IMG-6626523ee50374.76440543.jpg', 'IMG-6626523ee526c2.52923451.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(38, 'Harmony House Studios', '19, Opal Road, Chilaw', '5916027134', 'harmonyhousestudios@gmail.com', '$2y$10$hMObLypUSnpcY85KIXjsUeWIYFhM7lUvVYrHFBAQ9W/96.0F7uZWG', 'Charlotte Green', '14/2, Quartz Lane, Bandarawela', '6027138245', '357912346834567', 'charlottegreen@gmail.com', 'about harmony house', 'IMG-6626572cb3a299.40436752.png', 146815, 'Active', 'IMG-6626572cb2e148.91463048.jpg', 'IMG-6626572cb334c3.38059196.jpg', 'IMG-6626572cb371d3.77203459.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(39, 'Tempo Tower', '28, Tanzanite Terrace, Polonnaruwa', '7138249356', 'tempotower@gmail.com', '$2y$10$/Fy.3z01NUWc1fGj841O0O.fQrwhNgzcD.7ae.OpwXNjdMNyYcgjC', 'James Carter', '22, Topaz Gardens, Ratnapura', '8249350467', '468123457895678', 'jamescarter@gmail.com', 'about temp tower', 'IMG-66265ae039e649.65783954.jpg', 215991, 'Active', 'IMG-66265ae0395684.72614028.jpg', 'IMG-66265ae03982a8.82350288.jpg', 'IMG-66265ae039b713.34697865.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(40, 'Melody Mill', '7, Moonstone Avenue, Trincomalee', '9350461578', 'melodymill@gmail.com', '$2y$10$rL5xZdp.UcAx8zY67liYjO4TVBqHV0itbeKuG3WVSD1wkn93sqCgi', 'Amelia Wright', '36, Peridot Place, Anuradhapura', '0461572689', '579234568901234', 'ameliawright@gmail.com', 'about Melody Mill', 'IMG-66266036465074.31785479.png', 301546, 'Active', 'IMG-6626603645ccf4.78584588.jpg', 'IMG-66266036462223.62091829.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(41, 'Sonic Sanctuary', '9/1, Aquamarine Street, Matale', '1592703814', 'sonicsanctuary@gmail.com', '$2y$10$pxP/6QWDq9aFcLS1kKxsIeuIYDOPMpxudn5MVxd2RKtFPyJZU7jqi', 'Benjamin King', '24, Zircon Lane, Kurunegala', '2703814925', '680345679012345', 'benjaminking@gmail.com', 'about Sonic Sanctuary', 'IMG-662663cf9e8300.99745763.jpg', 760047, 'Active', 'IMG-662663cf9de498.47560106.jpg', 'IMG-662663cf9e3c76.81958180.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(42, 'Rhythm Room Records', '11, Emerald Drive, Matara', '3814925036', 'rhythmroomrecords@gmail.com', '$2y$10$YUoY9m4u5LVEc.MjufrDieAKLyFyFZoOP1NY1Z0GUsQrvHISnH4Y2', 'Mia Rodriguez', '35/2, Sapphire Street, Hambantota', '4925036147', '791456780123456', 'miarodriguez@gmail.com', 'about Rhythm Room Records', 'IMG-6626659abf5be6.99766920.png', 278719, 'Active', 'IMG-6626659abf0c49.86216801.jpg', 'IMG-6626659abf3426.46775099.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-22'),
(43, 'Crescendo Creations', '18, Ruby Road, Nuwara Eliya', '5036147258', 'crescendocreations@gmail.com', '$2y$10$FMTFaRbmrtxuRFaVAzhl1eGvlo0EIFeKPdg2WFuBlZ7Q6ifrobW5.', 'Jacob Adams', '5A, Diamond Lane, Galle', '6147258369', '802567890234567', 'jacobadams@gmail.com', 'about Crescendo Creations', 'IMG-662759757d6860.16632629.png', 158388, 'Pending', 'IMG-662759757c8d01.10290675.jpg', 'IMG-662759757d2161.89737828.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-23'),
(44, 'Tune Town Studios', '30, Coral Crescent, Negombo', '7258369470', 'tunetownstudios@gmail.com', '$2y$10$Dsm4Arnuq.UEld05QRaskubZf3U9gRbr5YHG2NBajMaP5hJBuXbhm', 'Harper Lee', '23, Pearl Gardens, Kandy', '8369470581', '913678901345678', 'harperlee@gmail.com', 'about Tune Town Studios', 'IMG-66275cd9547f00.35661918.jpg', 347554, 'Pending', 'IMG-66275cd9544000.01817302.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-23'),
(45, 'Acoustic Alcove', '16/3, Gold View Terrace, Colombo 05', '9470581692', 'acousticalcove@gmail.com', '$2y$10$lzmKXB47A8QI3CdyH.Mi4.v5sUaYcCi9IQXQ7vQkeE.PxofB3KXL.', 'Alexander White', '38, Platinum Park, Gampaha', '0581692703', '024789012456789', 'alexanderwhite@gmail.com', 'about Acoustic Alcove', 'IMG-66275ed7144546.48276940.jpg', 353319, 'Pending', 'IMG-66275ed7138912.92321253.jpeg', 'IMG-66275ed7140be2.43390326.jpeg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-23'),
(46, 'Melo Maestro', '12, Crystal Close, Kalutara', '3694805912', 'melomaestro@gmail.com', '$2y$10$xLtWICOGm7dHTgnac6bsmOf0fKltaan.iVeFfort/DG9QzLpk98tG', 'Aiden Nelson', '25/1, Amethyst Avenue, Beruwala', '4805916023', '258369012345678', 'aidennelson@gmail.com', 'about Aiden Nelson', 'IMG-6627da75233b46.45225001.jpg', 182933, 'Active', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-23'),
(47, 'Vocal Virtuoso', '10, Garnet Gardens, Ratnapura', '5916027134', 'vocalvirtuoso@gmail.com', '$2y$10$dWq6StqauN/aH8oy51BN6.5vTNZoDK2U9LKZsY7ur2YwEkMCG3NtW', 'Zoe Garcia', '10, Garnet Gardens, Ratnapura', '5916027134', '046789012345678', 'zoegarcia@gmail.com', 'about Vocal Virtuoso', 'IMG-6627e684ad98b9.14725766.jpg', 185134, 'Active', 'IMG-6627e684acae11.39451631.png', 'IMG-6627e684ad5031.33391341.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-23'),
(50, 'Songbird Supreme', '10B, Garnet Avenue, Colombo 05', '9350461578', 'songbirdsupreme@gmail.com', '$2y$10$uPic1/PALbCnDO9bHDggHO/2UW0WsCkB5jFQo9OogAU4NPyNKXRZK', 'Valentina Perry', '10B, Garnet Avenue, Colombo 05', '9350461578', '480123456789012', 'valentinaperry@gmail.com', 'about Valentina Perry', 'IMG-662a72dd5bc740.07713822.jpg', 995417, 'Active', 'IMG-662a72dd5b2132.72315530.png', 'IMG-662a72dd5b6a77.18183428.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-25'),
(51, 'Velvet Horizon', '41, Opal Lane, Kalutara', '8249350467', 'velvethorizon@gmail.com', '$2y$10$0m2IMh/uxE/X.eV7MwivDubNZBHZgig.9.ykz.vocVM70JsJHj/Q.', 'Hannah Wood', '41, Opal Lane, Kalutara', '4805916023', '268901234567890', 'hannahwood@gmail.com', 'about  velvet horizon', 'IMG-662a86d60a2c76.36961393.jpg', 251242, 'Active', 'IMG-662a86d60894a7.24090565.jpg', 'IMG-662a86d608bd99.38767770.jpg', 'IMG-662a86d608f451.50180899.jpg', 'IMG-662a86d6092a79.42965416.jpg', 'IMG-662a86d6099e65.99767598.jpg', '2024-04-25'),
(52, 'Midnight Mirage', '9, Aquamarine Gardens, Bandarawela', '6027138245', 'midnightmirage@gmail.com', '$2y$10$ucPA5cNdbP2ZA6IHkXgu/eh1./C6viKz68DsfbnKp74OAPmkDqLhm', 'Skylar Brooks', '9, Aquamarine Gardens, Bandarawela', '6027138245', '602345678901234', 'skylarbrooks@gmail.com', 'about Midnight Mirage', 'IMG-653fd611dd2445.48951448.png', 251244, 'Active', 'IMG-662a893cd35249.53156172.jpg', 'IMG-662a893cd38ae9.14985054.jpg', 'IMG-662a893cd3bef0.62317025.jpg', 'IMG-662a893cd42111.56988484.jpg', 'IMG-662a893cd460b2.45405029.jpg', '2024-04-25'),
(53, 'Solar Serenade', '16/3, Gold View Terrace, Colombo 05', '6027138245', 'solarserenade@gmail.com', '$2y$10$qYho8vLRSyeqTsYlMDPImOvUkvBHU41X3eEANWk0nJshur66Fbeja', 'Dominic Brooks', '16/3, Gold View Terrace, Colombo 05', '6027138245', '713456789012345', 'bominicbrooks@gmail.com', 'about Solar Serenade', 'IMG-662a8aa88e7876.11196437.jpg', 654945, 'Active', 'IMG-662a8aa88d9282.34066099.jpg', 'IMG-662a8aa88dbc49.80389955.jpg', 'IMG-662a8aa88dea30.98313533.jpg', 'IMG-662a8aa88e1ed5.93427758.jpg', 'IMG-662a8aa88e4d06.84895788.jpg', '2024-04-25'),
(54, 'Asher Silva', '25A, Palm Grove, Colombo 03, Sri Lanka', '94761234567', 'asher.silva@example.com', '$2y$10$LoDikFpcL39k3i20AQr7Zumqiu0GdHp1RdeOD0delAHoH3MhFiNIK', 'Asher Silva', '25A, Palm Grove, Colombo 03, Sri Lanka', '94761234567', '961234567V', 'asher.silva@example.com', 'about Asher Silva', 'IMG-653fd611dd2445.48951448.png', 217292, 'Active', 'IMG-662ad6c0da5256.21619412.jpg', 'IMG-662ad6c0da9e27.77460545.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-26'),
(55, 'Isla Fernando', '10B, Jasmine Lane, Kandy, Sri Lanka', '94772345678', 'isla.fernando@example.com', '$2y$10$SHpuZXMmQhXJnL4C7q/ZA.StD0HJnYByDfS53bknH40Xtmw0mxSBC', 'Isla Fernando', '10B, Jasmine Lane, Kandy, Sri Lanka', '94772345678', '975432109V', 'isla.fernando@example.com', 'about  Isla Fernando', 'IMG-662ad79f6e9887.60446932.jpg', 224894, 'Active', 'IMG-662ad79f6db506.62379296.jpg', 'IMG-662ad79f6dfe87.43011055.jpg', 'IMG-662ad79f6e4ce7.56095102.jpg', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2024-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(10) NOT NULL DEFAULT 'Singer',
  `brand` varchar(10) NOT NULL DEFAULT 'no brand',
  `model` varchar(10) NOT NULL DEFAULT 'no model',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` int(11) NOT NULL,
  `photo_1` varchar(100) NOT NULL,
  `photo_2` varchar(100) NOT NULL,
  `photo_3` varchar(100) NOT NULL,
  `Title` varchar(10) NOT NULL DEFAULT 'Singer',
  `Description` varchar(255) NOT NULL,
  `outOfStock` int(2) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warranty` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `nickName` varchar(100) NOT NULL,
  `telephoneNumber` int(11) NOT NULL,
  `videoLink` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL DEFAULT 'selectedNo',
  `singerPhoto` varchar(100) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`product_id`, `created_by`, `category`, `brand`, `model`, `quantity`, `unit_price`, `photo_1`, `photo_2`, `photo_3`, `Title`, `Description`, `outOfStock`, `createdDate`, `warranty`, `name`, `nickName`, `telephoneNumber`, `videoLink`, `location`, `instrument`, `singerPhoto`, `email`, `status`) VALUES
(12, 46, 'Singer', 'no brand', 'no model', 1, 15000, 'IMG-662a74acdacd66.68662314.jpg', 'IMG-662a74acdcd3b6.20048081.jpg', 'IMG-662a74acdcf186.77972026.jpg', 'Singer', 'Professional singer with a diploma in western music', 1, '2024-04-25 15:20:53', '2024-04-25 20:50:12', 'Aiden Nelson', 'Melo Maestro', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Piano', 'IMG-662a74acdd0be5.78929977.jpg', 'melomaestro@gmail.com', 'Deactive'),
(13, 46, 'Singer', 'no brand', 'no model', 1, 15000, 'IMG-662a75a9112901.88098496.jpg', 'IMG-662a75a91148f1.38569079.jpg', 'IMG-662a75a91158f1.14222179.jpg', 'Singer', 'Professional singer with a digree in western music', 1, '2024-04-25 15:24:25', '2024-04-25 20:54:25', 'Aiden Nelson', 'Melo Maestro', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Piano', 'IMG-662a75a9116d08.73315334.jpg', 'melomaestro@gmail.com', 'Active'),
(14, 46, 'Singer', 'no brand', 'no model', 1, 12500, 'IMG-662a7a34465c75.45021446.jpg', 'IMG-662a7a3446e6e2.80958419.jpg', 'IMG-662a7a34472182.35341217.jpg', 'Singer', 'Professional Singer with a Digree in eastern music', 1, '2024-04-25 15:43:48', '2024-04-25 21:13:48', 'Violet Cox', 'Harmony Hero', 2147483647, 'Warning:  Undefined array key', 'NULL', 'NULL', 'IMG-662a7a34475b69.53544167.jpg', 'harmonyhero@gmail.com', 'Active'),
(15, 46, 'Singer', 'no brand', 'no model', 1, 14000, 'IMG-662a7ad8780089.37905422.jpg', 'IMG-662a7ad8786d29.60581952.jpg', 'IMG-662a7ad878a4e0.16565663.jpg', 'Singer', 'professional singer with a digree', 1, '2024-04-25 15:46:32', '2024-04-25 21:16:32', 'Elijah Price', 'Croon King', 2147483647, 'Warning:  Undefined array key', 'NULL', 'NULL', 'IMG-662a7ad878e1c7.84030072.jpg', 'croonking@gmail.com', 'Active'),
(16, 46, 'Singer', 'no brand', 'no model', 1, 15000, 'IMG-662a7b8ee14b39.50432920.jpg', 'IMG-662a7b8ee1a903.92001474.jpg', 'IMG-662a7b8ee1df61.85906597.jpg', 'Singer', 'Professional singer with a music digree', 1, '2024-04-25 15:49:34', '2024-04-25 21:19:34', 'Sebastian Cox', 'Tune Titan', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Guitar', 'IMG-662a7b8ee21353.86466774.jpg', 'tunetitan@gmail.com', 'Active'),
(17, 46, 'Singer', 'no brand', 'no model', 1, 16000, 'IMG-662a7c401a4239.31182034.jpg', 'IMG-662a7c401a9212.19224817.jpg', 'IMG-662a7c401acd57.62458943.jpg', 'Singer', 'Professional singer with a digree', 1, '2024-04-25 15:52:32', '2024-04-25 21:22:32', 'Naomi Ramirez', 'Melody Maven', 1572683790, 'Warning:  Undefined array key', 'NULL', 'Guitar', 'IMG-662a7c401b0716.09181894.jpg', 'melodymaven@gmail.com', 'Active'),
(18, 46, 'Singer', 'no brand', 'no model', 1, 13000, 'IMG-662a7cc0abb458.70722207.jpg', 'IMG-662a7cc0ac0fd4.95999737.jpg', 'IMG-662a7cc0ac4672.92804304.jpg', 'Singer', 'professional singer with a digree', 1, '2024-04-25 15:54:40', '2024-04-25 21:24:40', 'Audrey Bennett', 'Serenade Sensation', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Piano', 'IMG-662a7cc0ac7970.49501832.jpg', 'serenadesensation@gmail.com', 'Active'),
(19, 47, 'Singer', 'no brand', 'no model', 1, 11000, 'IMG-662a7d91ed7434.44504275.jpg', 'IMG-662a7d91edcc98.25242616.jpg', 'IMG-662a7d91ee0357.19098377.jpg', 'Singer', 'professional singer with a digree in music', 1, '2024-04-25 15:58:09', '2024-04-25 21:28:09', 'Joshua Sanders', 'Midnight Serenade', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Guitar', 'IMG-662a7d91ee3764.94634536.jpg', 'midnightserenade@gmail.com', 'Active'),
(20, 47, 'Singer', 'no brand', 'no model', 1, 14000, 'IMG-662a7e188956f1.25617786.jpg', 'IMG-662a7e1889acc5.64588739.jpg', 'IMG-662a7e1889e780.77264698.jpg', 'Singer', 'professional singer with a music sigree in music', 1, '2024-04-25 16:00:24', '2024-04-25 21:30:24', 'Colton Brooks', 'Phoenix Crescendo', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Piano', 'IMG-662a7e188a2561.05876054.jpg', 'phoenixcrescendo@gmail.com', 'Active'),
(21, 47, 'Singer', 'no brand', 'no model', 1, 14000, 'IMG-662a7f6dd2fc75.04052663.jpg', 'IMG-662a7f6dd350b0.95036453.jpg', 'IMG-662a7f6dd386c1.28277227.jpg', 'Singer', 'Professional singer with a music digree', 1, '2024-04-25 16:06:05', '2024-04-25 21:36:05', 'Nathan Cook', 'Harmony Rivers', 1572683790, 'Warning:  Undefined array key', 'NULL', 'Guitar', 'IMG-662a7f6dd3b920.44068888.jpg', 'harmonyrivers@gmail.com', 'Active'),
(22, 47, 'Singer', 'no brand', 'no model', 1, 13500, 'IMG-662a801f18a767.88143995.jpg', 'IMG-662a801f1908d0.04057764.jpg', 'IMG-662a801f193f14.36483252.jpg', 'Singer', 'professional singer with a digree in music', 1, '2024-04-25 16:09:03', '2024-04-25 21:39:03', 'Ariana Perry', 'Echo Velvet', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Piano', 'IMG-662a801f197305.62571059.jpg', 'echovelvet@gmail.com', 'Active'),
(23, 47, 'Singer', 'no brand', 'no model', 1, 14500, 'IMG-662a80afaa9627.06241736.jpg', 'IMG-662a80afaaf644.97293025.jpg', 'IMG-662a80afab2d03.96614565.jpg', 'Singer', 'professional singer with a music digree', 1, '2024-04-25 16:11:27', '2024-04-25 21:41:27', 'Dylan Foster', 'Solstice Sonata', 2147483647, 'Warning:  Undefined array key', 'NULL', 'Guitar', 'IMG-662a80afab6818.69355340.jpg', 'solsticesonata@gmail.com', 'Active'),
(24, 47, 'Singer', 'no brand', 'no model', 1, 11500, 'IMG-662a813c1adbc1.10768741.jpg', 'IMG-662a813c1b4326.26548222.jpg', 'IMG-662a813c1b7ef5.76182329.jpg', 'Singer', 'professional singer with a digree in music', 1, '2024-04-25 16:29:22', '2024-04-25 21:43:48', 'Alexis Nguyen', 'Luna Starlight', 1572683790, 'Warning:  Undefined array key', 'NULL', 'NULL', 'IMG-662a84e26a2982.83961041.jpg', 'lunastarlight@gmail.com', 'Active'),
(25, 47, 'Singer', 'no brand', 'no model', 1, 16000, 'IMG-662a84bc33cfc3.14264097.jpg', 'IMG-662a84bc345c21.64830677.jpg', 'IMG-662a84bc34c6b0.20453639.jpg', 'Singer', 'professional singer with a digree in music', 1, '2024-04-25 16:28:44', '2024-04-25 21:58:44', 'Christopher Bell', 'Blaze Harmony', 2147483647, 'Warning:  Undefined array key', 'NULL', 'NULL', 'IMG-662a84bc354703.99568717.jpg', 'blazeharmony@gmail.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'Studio',
  `brand` varchar(50) NOT NULL DEFAULT 'no brand',
  `model` varchar(50) NOT NULL DEFAULT 'no model',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` double NOT NULL,
  `photo_1` varchar(100) NOT NULL,
  `photo_2` varchar(100) NOT NULL,
  `photo_3` varchar(100) NOT NULL,
  `Title` text NOT NULL DEFAULT 'Studio',
  `Description` varchar(255) NOT NULL DEFAULT 'no description',
  `outOfStock` int(2) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warranty` date NOT NULL DEFAULT current_timestamp(),
  `location` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `descriptionSounds` varchar(255) NOT NULL,
  `descriptionStudio` varchar(255) NOT NULL,
  `telephoneNumber` int(11) NOT NULL,
  `videoLink` varchar(255) NOT NULL,
  `airCondition` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`product_id`, `created_by`, `category`, `brand`, `model`, `quantity`, `unit_price`, `photo_1`, `photo_2`, `photo_3`, `Title`, `Description`, `outOfStock`, `createdDate`, `warranty`, `location`, `instrument`, `descriptionSounds`, `descriptionStudio`, `telephoneNumber`, `videoLink`, `airCondition`, `status`) VALUES
(4, 36, 'Studio', 'no brand', 'no model', 1, 1500, 'IMG-662a6472809024.07662667.jpg', 'IMG-662a6472810312.78876025.jpg', 'IMG-662a6472812fd9.38167887.jpg', 'Harmony Hall', 'no description', 1, '2024-04-25 14:10:58', '2024-04-25', 'NULL', 'Cajon Chime DigitalPiano DrumSet ElectricGuitar Guitar', 'Sound mixer and guitar amps, microphones are available', 'Fully air conditioned Sound proof studio hall', 0, '', 'yes', 'Active'),
(5, 36, 'Studio', 'no brand', 'no model', 1, 2000, 'IMG-662a652f9725c4.24932812.jpg', 'IMG-662a652f978946.96601945.jpg', 'IMG-662a652f97f747.32859263.jpg', 'Melody Lounge', 'no description', 1, '2024-04-25 14:14:07', '2024-04-25', 'NULL', 'DigitalPiano DrumSet ElectricGuitar Guitar', 'Mixer, bass bins, monitors, guitar amplifiers are available with mentioned instruments', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(6, 36, 'Studio', 'no brand', 'no model', 1, 1500, 'IMG-662a65f432e2b4.40442215.jpg', 'IMG-662a65f4330e66.56752598.jpg', 'IMG-662a65f4334e16.25157236.jpg', 'Rhythm Retreat', 'no description', 1, '2024-04-25 14:17:24', '2024-04-25', 'NULL', 'DrumSet ElectricGuitar Guitar Organ Piano', 'Mixer , speakers, Monitors, and microphones are available with the instruments', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(7, 37, 'Studio', 'no brand', 'no model', 1, 1700, 'IMG-662a66ef1aebb3.85319674.jpg', 'IMG-662a66ef1b27b0.21261480.jpg', 'IMG-662a66ef1b78d3.93600641.jpg', 'Crescendo Chamber', 'no description', 1, '2024-04-25 14:21:35', '2024-04-25', 'NULL', 'DrumSet Organ Piano Synthesizer', 'Mixer, Speakers, Microphones are available with the instruments', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(8, 38, 'Studio', 'no brand', 'no model', 1, 1800, 'IMG-662a67b1bc6c33.06972019.jpg', 'IMG-662a67b1bc9154.07528885.jpg', 'IMG-662a67b1bcbfe1.66569358.jpg', 'Beat Box', 'no description', 1, '2024-04-25 14:24:49', '2024-04-25', 'NULL', 'DigitalPiano DrumSet ElectricGuitar Guiro Organ Piccolo Recorder', 'Mixer, Speakers, Microphones are available  with the instruments', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(9, 38, 'Studio', 'no brand', 'no model', 1, 1400, 'IMG-662a68617a2864.51948269.jpg', 'IMG-662a68617a5380.38733281.jpg', 'IMG-662a68617a8717.17457814.jpg', 'Echo Chamber', 'no description', 1, '2024-04-25 14:27:45', '2024-04-25', 'NULL', 'DigitalPiano DrumSet ElectricGuitar Guitar Organ Piano Recorder Synthesizer', 'Mixer , Speakers, Microphones and in ears are available with the instruments', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(10, 39, 'Studio', 'no brand', 'no model', 1, 2000, 'IMG-662a6920553313.43288727.jpg', 'IMG-662a6920557088.06760743.jpg', 'IMG-662a692055c268.09129001.jpg', 'Serenade Suite', 'no description', 1, '2024-04-25 14:30:56', '2024-04-25', 'NULL', 'DigitalPiano DrumSet ElectricGuitar Guitar Organ Piano Recorder Synthesizer', 'Mixer , speaker , microphones and in ears are available with instruments', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(11, 40, 'Studio', 'no brand', 'no model', 1, 1600, 'IMG-662a6a60bbedd1.38621443.jpg', 'IMG-662a6a60bc2d63.74574368.jpg', 'IMG-662a6a60bc6e68.04391085.jpg', 'Cadence Cove', 'no description', 1, '2024-04-25 14:36:16', '2024-04-25', 'NULL', 'DrumSet ElectricGuitar Guitar Organ Piano Synthesizer', 'Mixer, Speakers, Monitors, Guitar amplifiers and Microphones are available', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(12, 40, 'Studio', 'no brand', 'no model', 1, 1900, 'IMG-662a6ae8c056a2.42256576.jpg', 'IMG-662a6ae8c09362.67262755.jpg', 'IMG-662a6ae8c10678.16937883.jpg', 'Acoustic Annex', 'no description', 1, '2024-04-25 14:38:32', '2024-04-25', 'NULL', 'DrumSet ElectricGuitar Guitar Organ Piano Synthesizer', 'Mixer, speakers, monitors and guitar amplifiers are available', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active'),
(13, 41, 'Studio', 'no brand', 'no model', 1, 1800, 'IMG-662a6ba80c4fb3.75332261.jpg', 'IMG-662a6ba80c7848.70664643.jpg', 'IMG-662a6ba80cb8a8.39991437.jpg', 'Vibrato Vault', 'no description', 1, '2024-04-25 14:41:44', '2024-04-25', 'NULL', 'DrumSet ElectricGuitar Organ Synthesizer', 'Mixer, Speaker, Microphones And guitar amplifiers are available', 'Fully air conditoned and sound proof', 0, '', 'yes', 'Active'),
(14, 42, 'Studio', 'no brand', 'no model', 1, 1900, 'IMG-662a6ca63561e1.32149985.jpg', 'IMG-662a6ca6358be6.14739140.jpg', 'IMG-662a6ca635e1f5.11921439.jpg', 'Groove Gallery', 'no description', 1, '2024-04-25 14:45:58', '2024-04-25', 'NULL', 'DrumSet ElectricGuitar Guitar Organ Piano Synthesizer', 'Mixer , Speakers ,Monitors , Guitar amplifiers  and in ears are available', 'Fully air conditioned and sound proof', 0, '', 'yes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `suborder`
--

CREATE TABLE `suborder` (
  `sorder_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `serviceprovider_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `avail` mediumtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `order_placed_on` date DEFAULT NULL,
  `extra` int(255) NOT NULL DEFAULT 0,
  `fine` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suborder`
--

INSERT INTO `suborder` (`sorder_id`, `user_id`, `serviceprovider_id`, `product_id`, `qty`, `start_date`, `end_date`, `days`, `total`, `status`, `avail`, `type`, `order_placed_on`, `extra`, `fine`) VALUES
(59, 18, 26, 27, 3, '2024-05-02', '2024-05-08', 7, 105000, 'Upcoming', '424,425,426,427,428,429,430', 'Equipment', '2024-04-26', 15000, 0),
(60, 18, 27, 33, 1, '2024-04-30', '2024-05-06', 7, 49000, 'Pending', '431,432,433,434,435,436,437', 'Equipment', '2024-04-26', 21000, 0),
(61, 18, 26, 25, 3, '2024-05-02', '2024-05-04', 3, 45000, 'Upcoming', '431,432,433,434,435,436,437,438,439,440', 'Equipment', '2024-04-26', 15000, 0),
(62, 18, 27, 29, 1, '2024-05-02', '2024-05-11', 10, 70000, 'Pending', '441,442,443,444,445,446,447,448,449,450', 'Equipment', '2024-04-26', 21000, 0),
(63, 18, 36, 6, 1, '2024-05-01', '2024-05-02', 2, 3000, 'Pending', '451,452', 'Studio', '2024-04-26', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `TelephoneNumber` int(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `verification` int(10) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `TelephoneNumber`, `BirthDate`, `address`, `password`, `gender`, `profile_photo`, `verification`, `status`, `registration_date`) VALUES
(18, 'Gayathra Dissanayake1', 'gayathradissa@gmail.com', 702604647, '2000-03-31', 'No 05, Kottawa, Pannipitiya', '$2y$10$rGgNvX/xlY1X2uRCVSWUl.UnyP4sWCA8xfdu2vNSXZf9SpStWwioq', 'male', 'IMG-65864fca5956f6.45090781.jpeg', 681741, 'Active', '2023-11-01'),
(29, 'John Doe', 'johndoe@example.com', 770123456, '1985-07-12', '25/1A, Main Street, Colombo 05', '$2y$10$QZYj.RKWCqfp4GVmmDrNt.eKKkcjS58.Ji0Xn1/I/37w3TjbX9qQi', 'male', 'IMG-662277f14f9309.47741094.png', 152120, 'Active', '2024-04-19'),
(30, 'Jane Smith', 'janesmith@example.com', 770234567, '1988-05-20', '15/2B, Galle Road, Dehiwala', '$2y$10$w0Sll05PbuGGsNpiJ08z3.QzzkBYjDZpozwdB2A1gGmolgMWJUyx6', 'female', 'IMG-653fd611dd2445.48951448.png', 183156, 'Active', '2024-04-20'),
(31, 'Michael Johnson', 'michaeljohnson@example.com', 770345678, '1982-09-03', '12/3C, Nawala Road, Rajagiriya', '$2y$10$LiU1Vu5S0n5RADnfl4tZkuI68/ZTlRmu9hijE7HuYjktkKVVf1id6', 'male', 'IMG-653fd611dd2445.48951448.png', 233366, 'Active', '2024-04-21'),
(32, 'Emily Brown', 'emilybrown@example.com', 770456789, '1990-11-15', '8/4D, Duplication Road, Bambal', '$2y$10$2gla7K9PGzaCNPrujHoJP.e23Uqwq9rz0c7fyv4E5uSuTpDYrDyC2', 'female', 'IMG-653fd611dd2445.48951448.png', 319412, 'Active', '2024-04-22'),
(33, 'David Wilson', 'davidwilson@example.com', 770567890, '1979-03-28', '17/5E, Castle Street, Colombo ', '$2y$10$CCEUnfsnxN1VTEzJ2nZYSOOlQ0BfeREtcjQKxIdaLDMUGkGoa6dUu', 'male', 'IMG-653fd611dd2445.48951448.png', 230442, 'Active', '2024-04-23'),
(34, 'Sarah Taylor', 'sarahtaylor@example.com', 770678901, '1987-12-05', '22/6F, Elvitigala Mawatha, Col', '$2y$10$bfzUBnBUJURMJz6HLmyePOyRl1Lr/niZaYnlKYppfNoqPY8.HAGJu', 'female', 'IMG-653fd611dd2445.48951448.png', 106046, 'Active', '2024-04-24'),
(35, 'Daniel Martinez', 'danielmartinez@example.com', 770789012, '1983-06-18', '9/7G, High Level Road, Nugegod', '$2y$10$5Km6KkEnqb9VZVkfVSQJI.vEtEnAEFnKNz7DnEKPbZ.LPoiBF6jvC', 'male', 'IMG-653fd611dd2445.48951448.png', 238806, 'Active', '2024-04-25'),
(36, 'Olivia Garcia', 'oliviagarcia@example.com', 770890123, '1992-04-30', '6/8H, Horton Place, Colombo 07', '$2y$10$tifc4HiC1rCcLOa.zmGkjuVQ9zlM.sMoH6HMJ3SY/GmYTfVUdGFlO', 'female', 'IMG-653fd611dd2445.48951448.png', 260927, 'Active', '2024-04-26'),
(37, 'Matthew Rodriguez', 'matthewrodriguez@example.com', 770901234, '1981-08-22', '33/9I, R.A. De Mel Mawatha, Co', '$2y$10$mLISwyAJoGRQB87hmjP4..awwU5u9Db1NolvGPd8sdH7QC.meoDCa', 'male', 'IMG-653fd611dd2445.48951448.png', 138080, 'Active', '2024-04-27'),
(38, 'Ava Hernandez', 'avahernandez@example.com', 770012345, '1986-10-14', '45/10J, Maligakanda Road, Colo', '$2y$10$oRrhXSWBxtOsa7RotRdHdekD472X22L09sDYjzNK48BiBxlo2AqKO', 'female', 'IMG-653fd611dd2445.48951448.png', 178836, 'Active', '2024-04-28'),
(39, 'Alexander Martinez', 'alexandermartinez@example.com', 770123456, '1984-02-09', '19/11K, Horton Place, Colombo ', '$2y$10$3kpB26dt.8Ujv7NPkzDpUultaSrF66zMovWTyXKCUJl55GNYrLVLa', 'male', 'IMG-653fd611dd2445.48951448.png', 361458, 'Active', '2024-04-29'),
(40, 'Sophia Torres', 'sophiatorres@example.com', 770234567, '1989-09-27', '7/12L, High Level Road, Mahara', '$2y$10$TR4NdIBLkgnt/dj5fXTVLO0mKPnMXnNgXQjYxmRRukXM67s91rloS', 'female', 'IMG-653fd611dd2445.48951448.png', 298478, 'Active', '2024-04-30'),
(41, 'William Lopez', 'williamlopez@example.com', 770345678, '1980-11-03', '11/13M, Galle Road, Mount Lavi', '$2y$10$YwowrA6qqSKupWrqwse0v.9F6fBc4K5jtdJ4Us77VAH19ExoIOxWi', 'male', 'IMG-653fd611dd2445.48951448.png', 234804, 'Active', '2024-05-01'),
(42, 'Isabella Gonzales', 'isabellagonzales@example.com', 770456789, '1993-03-17', '3/14N, Nawala Road, Nugegoda', '$2y$10$1SS5w4l3NcclVpSN7d8ywuExgwvS7djMIpfBDITTyOjRmJ4Au7nhS', 'female', 'IMG-653fd611dd2445.48951448.png', 168952, 'Active', '2024-05-02'),
(43, 'Ethan Perez', 'ethanperez@example.com', 770567890, '1982-07-25', '28/15O, Jawatte Road, Colombo ', '$2y$10$poyPGbH75NGK9bdqDLVKZ.m4fGUbCRy5NVhbqEQvrj7HZsgJItBKS', 'male', 'IMG-653fd611dd2445.48951448.png', 269801, 'Active', '2024-05-03'),
(44, 'Mia Sanchez', 'miasanchez@example.com', 770678901, '1995-01-10', '5/16P, De Alwis Place, Colombo', '$2y$10$MeVc22zcOQT9XLXBP3MnCudRUIKn923zYlueE6r18duUuV1URPv6O', 'female', 'IMG-653fd611dd2445.48951448.png', 255280, 'Active', '2024-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_passwords`
--

CREATE TABLE `user_passwords` (
  `user_pw_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `availability_ibfk_1` (`product_id`);

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `chat_mod_user`
--
ALTER TABLE `chat_mod_user`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `inq_chat`
--
ALTER TABLE `inq_chat`
  ADD PRIMARY KEY (`inq_chat_id`),
  ADD KEY `inq_chat_chat` (`chat_id`),
  ADD KEY `inq_chat_inq` (`inquiry_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`moderator_id`);

--
-- Indexes for table `musician`
--
ALTER TABLE `musician`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `recover_account_user`
--
ALTER TABLE `recover_account_user`
  ADD PRIMARY KEY (`recover_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `sec_queation`
--
ALTER TABLE `sec_queation`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  ADD PRIMARY KEY (`serviceprovider_id`);

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `suborder`
--
ALTER TABLE `suborder`
  ADD PRIMARY KEY (`sorder_id`),
  ADD KEY `serviceprovider_id` (`serviceprovider_id`),
  ADD KEY `suborder_ibfk_1` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_passwords`
--
ALTER TABLE `user_passwords`
  ADD PRIMARY KEY (`user_pw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `entry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `chat_mod_user`
--
ALTER TABLE `chat_mod_user`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inq_chat`
--
ALTER TABLE `inq_chat`
  MODIFY `inq_chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1361;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `moderator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `musician`
--
ALTER TABLE `musician`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `recover_account_user`
--
ALTER TABLE `recover_account_user`
  MODIFY `recover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sec_queation`
--
ALTER TABLE `sec_queation`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  MODIFY `serviceprovider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suborder`
--
ALTER TABLE `suborder`
  MODIFY `sorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_passwords`
--
ALTER TABLE `user_passwords`
  MODIFY `user_pw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
