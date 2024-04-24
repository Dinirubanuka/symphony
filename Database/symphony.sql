-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 04:41 AM
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
(1, 'admin01', 'admin@gmail.com', 0, '0000000000', 'admin01', '$2y$10$.giPsKxvJSX5q2/xFa8iouS5c3P8U7hyOfX4f/Xn.4nkxOYl.bfsS', 'Active'),
(2, 'admin03@gmail.com', 'admin03@gmail.com', 2147483647, '333333333333333', 'admin03@gmail.com', '$2y$10$bxkmDjVr50DKfrqQf2tEXeWRnnvP3WTgRVzXzXfkStDg4rA0m/F5C', 'Active'),
(3, 'admin04@gmail.com', 'admin04@gmail.com', 2147483647, '121212121212', 'admin04@gmail.com', '$2y$10$6UJ09vjR/p8YOJbq0lLMzufUnBps9iIYItVx4TqUuGEC6jvo0pNQS', 'Active'),
(4, 'admin05@gmail.com', 'admin05@gmail.com', 1234567890, 'admin05@gmail.c', 'admin05@gmail.com', '$2y$10$sOQxgV32c0sTDlLwgq6IB.ZogTav3f8oyjPAWVyt/Qkat9YC8UZkS', 'Active');

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
(254, '2024-01-17', 21, 3, 'Equipment'),
(255, '2024-01-18', 21, 3, 'Equipment'),
(256, '2024-01-19', 21, 3, 'Equipment'),
(257, '2024-01-20', 21, 3, 'Equipment'),
(258, '2024-01-21', 21, 3, 'Equipment'),
(259, '2024-01-22', 21, 3, 'Equipment'),
(260, '2024-01-23', 21, 3, 'Equipment'),
(261, '2024-01-24', 21, 3, 'Equipment'),
(262, '2024-01-25', 21, 3, 'Equipment'),
(263, '2024-01-26', 21, 3, 'Equipment'),
(264, '2024-01-27', 21, 3, 'Equipment'),
(265, '2024-01-28', 21, 3, 'Equipment'),
(266, '2024-01-29', 21, 3, 'Equipment'),
(281, '2024-01-14', 23, 1, 'Equipment'),
(282, '2024-01-15', 23, 1, 'Equipment'),
(283, '2024-01-16', 23, 1, 'Equipment'),
(284, '2024-01-17', 23, 1, 'Equipment'),
(285, '2024-01-18', 23, 1, 'Equipment'),
(286, '2024-01-19', 23, 1, 'Equipment'),
(287, '2024-01-20', 23, 1, 'Equipment'),
(288, '2024-01-21', 23, 1, 'Equipment'),
(289, '2024-01-22', 23, 1, 'Equipment'),
(290, '2024-01-23', 23, 1, 'Equipment'),
(291, '2024-01-13', 18, 8, 'Equipment'),
(292, '2024-01-14', 18, 8, 'Equipment'),
(293, '2024-01-15', 18, 8, ''),
(294, '2024-01-16', 18, 8, ''),
(295, '2024-01-17', 18, 8, ''),
(296, '2024-01-18', 18, 8, ''),
(297, '2024-01-19', 18, 8, ''),
(298, '2024-01-20', 18, 8, ''),
(299, '2024-01-21', 18, 8, ''),
(300, '2024-01-22', 18, 8, ''),
(301, '2024-01-23', 18, 8, ''),
(302, '2024-01-24', 18, 8, ''),
(303, '2024-01-25', 18, 8, ''),
(304, '2024-01-26', 18, 8, ''),
(305, '2024-01-27', 18, 8, ''),
(306, '2024-01-28', 18, 8, ''),
(307, '2024-01-29', 18, 8, ''),
(308, '2024-01-30', 18, 8, ''),
(309, '2024-01-31', 18, 8, ''),
(323, '2024-02-05', 23, 1, ''),
(324, '2024-02-06', 23, 1, ''),
(325, '2024-02-07', 23, 1, ''),
(326, '2024-02-08', 23, 1, ''),
(327, '2024-02-09', 23, 1, ''),
(328, '2024-02-10', 23, 1, ''),
(329, '2024-02-11', 23, 1, ''),
(330, '2024-02-12', 23, 1, ''),
(331, '2024-02-13', 23, 1, ''),
(332, '2024-02-14', 23, 1, ''),
(333, '2024-02-15', 23, 1, ''),
(334, '2024-02-16', 23, 1, ''),
(335, '2024-02-17', 23, 1, ''),
(336, '2024-02-18', 23, 1, ''),
(337, '2024-02-19', 23, 1, ''),
(338, '2024-02-20', 23, 1, ''),
(339, '2024-02-21', 23, 1, ''),
(340, '2024-02-22', 23, 1, ''),
(341, '2024-02-23', 23, 1, ''),
(342, '2024-01-17', 20, 2, ''),
(343, '2024-01-18', 20, 2, ''),
(344, '2024-01-19', 20, 2, ''),
(345, '2024-01-20', 20, 2, ''),
(346, '2024-01-21', 20, 2, ''),
(347, '2024-01-22', 20, 2, ''),
(348, '2024-01-23', 20, 2, ''),
(349, '2024-01-24', 20, 2, ''),
(350, '2024-01-25', 20, 2, ''),
(351, '2024-01-26', 20, 2, ''),
(352, '2024-01-27', 20, 2, ''),
(353, '2024-01-28', 20, 2, ''),
(354, '2024-01-29', 20, 2, ''),
(355, '2024-01-30', 20, 2, ''),
(356, '2024-02-14', 17, 1, ''),
(357, '2024-02-15', 17, 1, ''),
(358, '2024-02-16', 17, 1, ''),
(359, '2024-02-17', 17, 1, ''),
(360, '2024-02-18', 17, 1, ''),
(361, '2024-02-19', 17, 1, ''),
(362, '2024-02-20', 17, 1, ''),
(363, '2024-02-29', 18, 4, ''),
(364, '2024-03-01', 18, 4, ''),
(365, '2024-03-02', 18, 4, ''),
(366, '2024-03-03', 18, 4, ''),
(367, '2024-03-04', 18, 4, ''),
(368, '2024-03-05', 18, 4, ''),
(369, '2024-03-06', 18, 4, ''),
(370, '2024-03-07', 18, 4, ''),
(371, '2024-03-08', 18, 4, ''),
(381, '2024-02-22', 11, 1, 'Singer'),
(382, '2024-02-23', 11, 1, 'Singer'),
(390, '2024-03-14', 24, 2, 'Equipment'),
(391, '2024-03-15', 24, 2, 'Equipment'),
(392, '2024-03-16', 24, 2, 'Equipment'),
(393, '2024-03-17', 24, 2, 'Equipment'),
(394, '2024-03-18', 24, 2, 'Equipment'),
(395, '2024-03-19', 24, 2, 'Equipment'),
(396, '2024-03-20', 24, 2, 'Equipment'),
(397, '2024-03-21', 24, 2, 'Equipment'),
(411, '2024-04-25', 3, 1, 'Studio'),
(412, '2024-04-26', 3, 1, 'Studio'),
(413, '2024-04-18', 17, 1, 'Equipment'),
(414, '2024-04-19', 17, 1, 'Equipment'),
(415, '2024-04-20', 17, 1, 'Equipment'),
(416, '2024-04-25', 3, 1, 'Studio'),
(417, '2024-04-26', 3, 1, 'Studio'),
(418, '2024-03-29', 20, 2, 'Equipment'),
(419, '2024-03-30', 20, 2, 'Equipment'),
(420, '2024-03-31', 20, 2, 'Equipment'),
(421, '2024-04-01', 20, 2, 'Equipment'),
(422, '2024-04-02', 20, 2, 'Equipment'),
(423, '2024-04-03', 20, 2, 'Equipment');

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
(2, 14, 'band', 'no brand', 'no model', 23, 1, 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'Band', 'test2', 1, '2024-02-18 06:59:42', '2024-02-22 09:27:47', 'https://www.youtube.com/embed/qUH5I_jKRB0?si=utDfZHOERWmNqFRy', 'Accordion Bansuri BassDrum', 'imacbanu@gmail.com', 768836682, 43, 'IMG-65bdecb57b2fa6.98038302.jpg', 'IMG-65be1dddb6e8e7.50561916.jpg', 'Colombo Galle', 'banuka', 'Active');

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

--
-- Dumping data for table `chat_mod_user`
--

INSERT INTO `chat_mod_user` (`chat_id`, `user_id`, `moderator_id`, `created_by`, `chat_data`, `chat_date`) VALUES
(3, 18, 1, 'moderator', 'hrllo', '12:25:04 PM | February 6 2024'),
(4, 18, 1, 'moderator', 'ewsb gew gqweg', '12:25:07 PM | February 6 2024'),
(5, 18, 1, 'moderator', 'jhterjh3 j5k4ik5wd FWGW G', '12:25:09 PM | February 6 2024'),
(6, 18, 1, 'user', 'BGETR', '12:25:29 PM | February 6 2024'),
(7, 18, 1, 'user', 'rgbbe', '12:25:33 PM | February 6 2024'),
(8, 18, 1, 'user', 'hello', '7:09:47 PM | February 19 2024'),
(9, 18, 1, 'user', 'hi', '7:29:20 PM | February 19 2024'),
(10, 18, 1, 'moderator', 'hewsh', '12:54:03 AM | March 23 2024'),
(11, 18, 1, 'moderator', 'hi', '2:31:11 PM | April 23 2024'),
(12, 18, 1, 'moderator', 'what is the issue', '2:31:28 PM | April 23 2024');

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
(1, 18, 'Technical Issue', 'egwsjhedrje', 'h4rwhg4wg', '', '', '', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'Completed', 1, NULL),
(2, 18, 'Technical Issue', 'nwsr', 'j,truf,m', '', '', '', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'In-Progress', 1, NULL),
(3, 18, 'Technical Issue', 'gbwrsvsloj kbqweuikfhq', 'wrhw fqefwf', '', '', '', 'IMG-65c1e3564de106.71069130.jpg', 'IMG-65c1e3564df517.77863469.jpg', 'IMG-65c1e3564df998.02290386.jpg', 'In-Progress', 1, NULL),
(4, 18, 'Other', 'f bqknecl; qnhilofh q', 'qilo;bekhq vwhvf', '', '', '', 'IMG-65c1e36d67d473.29055626.jpeg', 'IMG-65c1e36d67df29.80862974.png', 'IMG-65c1e36d67e355.60262304.jpeg', 'In-Progress', 1, NULL),
(5, 18, 'Recover Account', '', '', '', '', '', 'IMG-656bdc23223334.62765635.png', '', '', 'In-Progress', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inq_chat`
--

CREATE TABLE `inq_chat` (
  `inq_chat_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `inquiry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inq_chat`
--

INSERT INTO `inq_chat` (`inq_chat_id`, `chat_id`, `inquiry_id`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 5, 1),
(4, 6, 1),
(5, 7, 1),
(6, 8, 4),
(7, 9, 4),
(8, 10, 4),
(9, 11, 2),
(10, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_logout_logs`
--

CREATE TABLE `login_logout_logs` (
  `login_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logout_logs`
--

INSERT INTO `login_logout_logs` (`login_id`, `type`, `date_time`, `id`) VALUES
(1, 'User - Login', '2024-02-11 12:11:00', 18),
(2, 'User - Logout', '2024-02-11 12:11:02', 18),
(3, 'User - Login', '2024-02-11 12:14:55', 19),
(4, 'User - Logout', '2024-02-11 12:14:56', 19),
(5, 'Service Provider - Login', '2024-02-11 12:15:07', 18),
(6, 'Service Provider - Logout', '2024-02-11 12:15:28', 18),
(7, 'User - Login', '2024-02-11 12:20:42', 18),
(8, 'User - Logout', '2024-02-11 12:20:44', 18),
(9, 'User - Login', '2024-02-17 10:29:42', 18),
(10, 'User - Logout', '2024-02-17 10:30:26', 18),
(11, 'Service Provider - Login', '2024-02-17 10:30:32', 14),
(12, 'User - Login', '2024-02-17 10:37:36', 18),
(13, 'User - Logout', '2024-02-17 11:33:27', 18),
(14, 'User - Login', '2024-02-17 11:33:33', 18),
(15, 'User - Logout', '2024-02-17 11:33:45', 18),
(16, 'Service Provider - Login', '2024-02-17 12:07:15', 14),
(17, 'User - Login', '2024-02-17 12:23:54', 18),
(18, 'User - Logout', '2024-02-18 04:21:52', 18),
(19, 'User - Login', '2024-02-18 04:21:57', 18),
(20, 'User - Logout', '2024-02-18 05:32:14', 18),
(21, 'User - Login', '2024-02-18 05:32:20', 18),
(22, 'User - Logout', '2024-02-18 08:05:35', 18),
(23, 'User - Login', '2024-02-18 08:05:41', 18),
(24, 'User - Logout', '2024-02-18 09:40:06', 18),
(25, 'User - Login', '2024-02-18 09:40:11', 18),
(26, 'User - Logout', '2024-02-19 06:46:41', 18),
(27, 'User - Login', '2024-02-19 06:46:56', 18),
(28, 'User - Logout', '2024-02-19 07:30:31', 18),
(29, 'Service Provider - Login', '2024-02-19 07:30:38', 14),
(30, 'Service Provider - Logout', '2024-02-19 07:30:51', 14),
(31, 'User - Login', '2024-02-19 07:30:56', 18),
(32, 'User - Logout', '2024-02-19 07:47:56', 18),
(33, 'Service Provider - Login', '2024-02-19 07:48:03', 14),
(34, 'Service Provider - Logout', '2024-02-19 07:54:05', 14),
(35, 'User - Login', '2024-02-19 07:54:12', 18),
(36, 'User - Logout', '2024-02-19 07:55:00', 18),
(37, 'Service Provider - Login', '2024-02-19 07:55:06', 14),
(38, 'Service Provider - Logout', '2024-02-19 07:59:51', 14),
(39, 'User - Login', '2024-02-19 14:12:49', 18);

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
(894, 'Customer', 18, '2024-04-23 12:30:14', 'View Instruments', 'User viewed the instruments available');

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
(1, 'moderator01', 'moderator01@gmail.com', 100000000, '100000000', 'moderator01@gmail.com', '$2y$10$.fjzjyiF0Rg88ec0LNJGh.Aep5ScztV4nG6/9Rb0U9Uzevd7lnPUK', 'User Account Moderator', 'Active'),
(2, 'moderator02', 'moderator02@gmail.com', 2000000000, '200000000', 'moderator02@gmail.com', '$2y$10$Cx.y2kQr58hwufiyxlvUuuBnTqNYb3rRKJMzxJ5e2Voa3C0iXSOiG', 'User Support Moderator', 'Active'),
(3, 'moderator03@gmail.com', 'moderator03@gmail.com', 2147483647, '3333333333333', 'moderator03@gmail.com', '$2y$10$oQKMQhd8.EXbxsrSj/OAW.OKH/7iDjNPcwY0U2MCref1pT9E8Q1M2', 'Event Package Moderator', 'Active'),
(4, 'moderator04@gmail.com', 'moderator04@gmail.com', 12121212, 'moderator04@gma', 'moderator04@gmail.com', '$2y$10$RoZ.MvwI4m7ItPCRFs1qDOYsEvjrGDFeie1Q7CnBmn3Gt750T8C2i', 'User Account Moderator', 'Active'),
(5, 'moderator05@gmail.com', 'moderator05@gmail.com', 1234567890, 'moderator05@gma', 'moderator05@gmail.com', '$2y$10$3bWEbemGAY5JZoRTYNc6BeLEaEFzzry9Er1Sa8WErV3J2GbG1BdMm', 'User Support Moderator', 'Active'),
(6, 'moderator06@gmail.com', 'moderator06@gmail.com', 1234567890, 'moderator06@gma', 'moderator06@gmail.com', '$2y$10$ifp/RMqF16m7T5R1WEK9qOdkafczxIE5y1V2GKsh66Hf91E2SoeDC', 'User Account Moderator', 'Active');

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
(14, 14, 'musician', 'no brand', 'no model', 1, 33, 'IMG-65c7a15b8b66b3.00228537.heic', 'IMG-65c7a15b8c2dd0.09977782.heic', 'IMG-65c7a15b8c4be9.60353733.heic', 'Musician', 'awe', 1, '2024-02-18 06:59:49', '2024-02-10 21:46:27', 'test', 'SDcsDcd', 768836682, 'https://www.youtube.com/embed/pxjZM-d_ShI?si=vKm0OdkPl6DDBqLE', 'Colombo Kandy Jaffna Jaffna', 'Accordion Bansuri BassDrum', 'IMG-65c7a15b8c62a7.69532636.heic', 'imacbanu@gmai.com', 'Active'),
(15, 14, 'musician', 'no brand', 'no model', 1, 3000, 'IMG-65d07d14e8b591.45765267.jpg', 'IMG-65d07d14e8c891.96080093.jpeg', 'IMG-65d07d14e8d4e4.86739829.jpg', 'Musician', 'this is a test', 1, '2024-02-18 06:59:52', '2024-02-17 15:02:04', 'Aeox', 'aeox', 1234567890, 'https://www.youtube.com/watch?v=mtv8WkYyK0s', 'Colombo', 'Bansuri BassDrum Sarod Saxophone Tuba', 'IMG-65d07d14e8e069.39777040.jpeg', 'aeox@gmail.com', 'Active');

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
(1, 'User', 18, '2024-04-23 10:59:12', 'Unread', 'Moderator with ID 1 has accepted your inquiry and will be assisting you'),
(2, 'User', 18, '2024-04-23 11:01:11', 'Unread', 'Moderator sent a message to you regarding inquiry 2'),
(3, 'User', 18, '2024-04-23 11:01:28', 'Unread', 'Moderator sent a message to you regarding inquiry 2'),
(4, 'ServiceProvider', 19, '2024-04-23 12:16:46', 'Unread', 'You have a new order request from Gayathra Dissanayake for '),
(5, 'Customer', 18, '2024-04-24 22:00:00', 'Unread', 'Please make sure to leave a review for item you rented with order id: 24 and sub order id: 48'),
(6, 'Customer', 18, '2024-04-23 12:27:35', 'unread', 'Your order containing the sub order with the ID 58 has been accepted by the service provider'),
(7, 'ServiceProvider', 19, '2024-04-23 12:27:35', 'unread', 'You have successfully accepted an order with the ID 58'),
(8, 'ServiceProvider', 19, '2024-03-28 22:00:00', 'unread', 'You have an upcoming order with the sub order ID 58 starting at 2024-03-29 and ending at 2024-04-03'),
(9, 'ServiceProvider', 19, '2024-03-29 00:00:00', 'unread', 'You have an upcoming order with the sub order ID 58 starting at 2024-03-29 and ending at 2024-04-03'),
(10, 'ServiceProvider', 19, '2024-04-02 22:00:00', 'unread', 'Your order with the sub order ID 58 is about to end in 2 hours'),
(11, 'ServiceProvider', 19, '2024-04-03 00:00:00', 'unread', 'Your order with the sub order ID 58 has ended'),
(12, 'Customer', 18, '2024-03-28 22:00:00', 'unread', 'You have an upcoming order with the sub order ID 58 starting at 2024-03-29 and ending at 2024-04-03'),
(13, 'Customer', 18, '2024-03-29 00:00:00', 'unread', 'You have an upcoming order with the sub order ID 58 starting at 2024-03-29 and ending at 2024-04-03'),
(14, 'Customer', 18, '2024-04-02 22:00:00', 'unread', 'Your order with the sub order ID 58 is about to end in 2 hours. Please make sure to end the order on time to avoid any penalties.'),
(15, 'Customer', 18, '2024-04-03 00:00:00', 'unread', 'Your order with the sub order ID 58 has ended. Please make sure to end the order on time to avoid any penalties.');

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
(10, 18, '33', 28865, '2024-02-01', 0),
(11, 18, '34,35', 98480, '2024-02-01', 0),
(12, 18, '36', 8285, '2024-02-01', 0),
(13, 18, '37', 18628, '2024-02-01', 0),
(17, 18, '38', 8285, '2024-02-01', 0),
(18, 18, '40', 13850, '2024-02-01', 0),
(19, 18, '41', 48080, '2024-02-01', 0),
(20, 18, '42,43', 32278, '2024-02-01', 0),
(21, 18, '44', 17840, '2024-02-01', 0),
(22, 18, '45', 8285, '2024-02-01', 0),
(23, 18, '46', 11540, '2024-02-17', 0),
(24, 18, '47,48', 24070, '2024-02-19', 0),
(25, 18, '49', 2930, '2024-02-19', 0),
(26, 18, '50,51', 35515, '2024-02-23', 0),
(27, 18, '52,53', 200, '2024-02-24', 0),
(28, 18, '54,55', 4040, '2024-02-27', 3300),
(29, 18, '58', 9650, '2024-04-23', 1800);

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
(17, 14, 'Electric Guitars', 'Yamaha', 'G13', 2, 1100, 'IMG-65941e25181055.71853029.jpg', 'IMG-65941e25202227.58261776.jpg', 'IMG-65941e25281010.99267029.jpg', 'Keyboard', 'dv zsdvfaetgeag egeagaf', 0, '2024-02-06 06:45:37', '2024-01-01', 'Active'),
(18, 14, 'Audio ', 'Yamaha', '2134c', 10, 300, 'IMG-659254383db6c3.64392645.jpg', 'IMG-65941e3ee8f334.28591517.jpg', 'IMG-6592543855fb02.30725840.jpg', 'Microphone', 'hrdysmey,sunsert', 0, '2024-02-06 06:45:37', '2030-01-01', 'Active'),
(20, 19, 'Electric Guitars', 'Yamaha', 'G11', 3, 600, 'IMG-65925309cca440.10886502.jpg', 'IMG-65925309ccadd5.85824551.jpg', 'IMG-65925309ccb201.59047494.jpg', 'Guitar', 'this is the product description', 0, '2024-02-06 06:45:38', '2026-10-13', 'Active'),
(21, 19, 'Keyboard Organs', 'Lowrey', 'K11', 3, 450, 'IMG-6592534fc88a55.88013733.jpg', 'IMG-6592534fc89692.28602216.jpg', 'IMG-65941e742d7498.42037729.jpg', 'Keyboard', 'ajevbnailubvaijokvbuia', 0, '2024-02-06 06:45:38', '2024-01-23', 'Active'),
(23, 18, 'Percussion Drums', 'Bosphorus', 'D11', 1, 1300, 'IMG-659253cc68bd38.12224044.jpeg', 'IMG-659253cc68ca09.28564496.jpg', 'IMG-659253cc68ce52.56432290.jpeg', 'Drumset', 'bsrmteantatsemykae', 0, '2024-02-06 06:45:38', '2024-01-23', 'Active'),
(24, 18, 'Percussion Drums', 'Bosphorus', 'D12', 2, 2100, 'IMG-659253f8b217d8.22407869.jpg', 'IMG-65941e5c0f8b54.99131092.jpg', 'IMG-659253f8b22507.42992831.jpg', 'Drumset', 'ndsethshjrshbsrehsjndshn', 0, '2024-02-06 06:45:38', '2024-01-15', 'Active');

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
(3, 'test', '2024-02-22', 'gfqag', '2024-02-07', 'hello', '2024-02-07', 0, 'gtest', '2024-02-22', 'male', 'thetheh', 'Accepted', '2024-02-20', 'gayathradissa@gmail.com', 'Not Given', 'Not Given'),
(4, 'test', '2024-02-22', 'gfqag', '2024-02-07', 'hello', '2024-02-07', 0, 'gtest', '2024-02-22', 'male', 'thetheh', 'Rejected', '2024-02-20', 'gayathradissa@gmail.com', 'Not Given', 'Not Given'),
(5, 'Gayathra', '0000-00-00', 'gfqag', '2021-02-03', 'test 23', '0000-00-00', 712056046, 'hg g hwsb gwgwgwe', '2000-03-31', 'male', '', 'Pending', '2024-02-20', 'itsaeox98@gmail.com', 'Not Given', 'Not Given'),
(6, 'user_05', '0000-00-00', '', '0000-00-00', '', '2024-02-24', 722899088, 'user_05@gmail.com', '2000-03-31', 'male', '', 'Pending', '2024-02-25', 'gayathradissa@gmail.com', 'What is your mother\'s maiden name?', 'Eroshini'),
(7, 'user_09', '0000-00-00', '', '0000-00-00', '', '2024-02-24', 1234567890, 'user_09@gmail.com', '2024-02-08', 'male', '', 'Pending', '2024-02-25', 'thedarksoul776@gmail.com', 'What is the model of your first car?', 'onmi');

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `rating`, `content`, `name`, `photo`, `placed_on`, `type`) VALUES
(36, 20, 18, 3, 'gqagaeg', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-02-18', 'Equipment'),
(37, 8, 18, 4, 'uewshwsg4e', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-02-18', 'Singer'),
(38, 8, 18, 5, 'g gbwsrhwgw', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-02-18', 'Singer'),
(39, 2, 18, 3, 'hello', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-02-18', 'Band'),
(40, 20, 18, 4, 'vnjezavlk', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-03-22', 'Equipment'),
(41, 2, 18, 3, 'jr6yttr', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-04-17', 'Band'),
(42, 2, 18, 3, 'herllo', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-04-17', 'Band');

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
(1, 'Customer', 26, 'What is the model of your first car', 'onmi');

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
(14, 'gayathradissa@gmail.com', 'gayathradissa@gmail.com', '1234567890', 'gayathradissa@gmail.com', '$2y$10$wnKk3/23oLc/i9IZlSiae.iqt/Zx6.zjn8vMQ6I3XO9HCoriMBy7m', 'gayathradissa@gmail.com', 'gayathradissa@gmail.com', '1234567890', 'gayathradissa@g', 'gayathradissa@gmail.com', 'gayathradissa@gmail.com', 'IMG-65864b06e5a500.12264750.jpg', 162655, 'Active', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2023-11-01'),
(18, 'gayathradissa1@gmail.com', 'gayathradissa1@gmail.com', '1234567890', 'gayathradissa1@gmail.com', '$2y$10$vW8S4t.8UL4/gvMhUT7zPeseKUq2vXJnOQR9p/abm2ktCyqIRUgee', 'gayathradissa1@gmail.com', 'gayathradissa1@gmail.com', '1234567890', 'gayathradissa1@', 'gayathradissa1@gmail.com', 'gayathradissa1@gmail.com', 'IMG-659252651d92c6.46419557.png', 108783, 'Active', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2023-11-01'),
(19, 'gayathradissa2@gmail.com', 'gayathradissa2@gmail.com', '1234567890', 'gayathradissa2@gmail.com', '$2y$10$JGdsN89gcJCO7VEvUwvMB.uIOeo37z5CkBwFqRQR.WiHz3CUTuAo.', 'gayathradissa2@gmail.com', 'gayathradissa2@gmail.com', '1234567890', 'gayathradissa2@', 'gayathradissa2@gmail.com', 'gayathradissa2@gmail.com', 'IMG-659252aa449923.24623916.png', 178095, 'Active', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', '2023-11-01'),
(20, 'sp_05@gmail.com', 'sp_05@gmail.com', '1234567890', 'sp_05@gmail.com', '$2y$10$zijEDgbokOHrsgu3oSnM8.85IWrUg1YBRn2sRRKBfy7h37gGogoYy', 'sp_05@gmail.com', 'sp_05@gmail.com', '1234567890', 'sp_05@gmail.com', 'sp_05@gmail.com', 'sp_05@gmail.com', 'IMG-65c1ea6b060084.30240957.jpg', 238863, 'Banned', 'IMG-65c1ea6b05e658.53252507.png', 'IMG-65c1ea6b05f091.87700728.jpeg', 'IMG-65c1ea6b05f4f4.87778616.jpeg', 'IMG-65c1ea6b05f874.66097781.png', 'IMG-656bdc23223334.62765635.png', '2023-11-01');

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
(7, 1, 'singer', 'no brand', 'no model', 1, 34, 'IMG-65b75a30f1e127.01170410.jpg', 'IMG-65b75a30f20226.47881022.jpg', 'IMG-65b75a30f21619.91493291.jpeg', 'Singer', '40,144,013 views  Aug 19, 2006\r\nBeatin Down Yo Block Now Streaming', 1, '2024-02-18 07:00:08', '2024-01-29 13:26:32', 'imac banu', 'dassa', 768836682, 'https://www.youtube.com/embed/qUH5I_jKRB0?si=ZkOSBMSeuVGS2FuW', 'Gampaha Mannar Mullaitivu Vavuniya Batticola', 'Guiro Guzheng Marimba Ney Oboe', 'IMG-65b75a30f21e68.38378178.jpeg', 'imacbanu@gmail.com', 'Active'),
(8, 1, 'singer', 'no brand', 'no model', 1, 67000, 'IMG-65b77d6bca24e1.24492751.jpg', 'IMG-65b77d6bcb6942.33579196.jpg', 'IMG-65b77d6bcb7581.65685958.png', 'Singer', 'earff', 1, '2024-02-18 07:00:11', '2024-01-29 15:56:51', 'imac banu', 'pini', 768836682, 'https://www.youtube.com/embed/pxjZM-d_ShI?si=vKm0OdkPl6DDBqLE', 'Colombo Gampaha Kurunegala Puttalam', 'Accordion Bansuri BassDrum Bassoon TalkingDrum Theremin Timpani', 'IMG-65b7816e1c8c92.83734193.', 'imacbanu@gmail.com', 'Active'),
(11, 14, 'Singer', 'no brand', 'no model', 1, 1300, 'IMG-65bb3aad9c83b9.97097280.jpg', 'IMG-65bb3aad9ca352.46560085.jpg', 'IMG-65bb3aad9cb9c5.08242150.jpg', 'Singer', 'test 01test 01test 01test 01', 1, '2024-02-19 06:58:46', '2024-02-01 12:01:09', 'test', 'test 03', 702604647, 'test 01test 01test 01', 'Colombo Gampaha', 'Accordion', 'IMG-65d07db1e6baf5.88913690.', 'test 01test 01test 01', 'Active');

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
(3, 1, 'studio', 'no brand', 'no model', 1, 100, 'IMG-65b7864392bd60.65283221.', 'IMG-65b78643933f31.29459990.', 'IMG-65b78643936246.72403522.', 'Studio', 'no description', 1, '2024-02-18 05:54:09', '2024-01-29', 'Colombo Gampaha Kandy', 'Colombo Gampaha Kandy Accordion Bansuri BassDrum Bassoon', 'aredf', 'awsefcwe', 122312, 'https://www.youtube.com/embed/pxjZM-d_ShI?si=vKm0OdkPl6DDBqLE', 'yes', 'Active');

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
(33, 18, 18, 23, 1, '2024-01-11', '2024-01-31', 21, 27300, 'Completed', '199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219', 'Equipment', '2024-02-19', 0, 0),
(34, 18, 19, 21, 2, '2024-01-18', '2024-01-23', 6, 5400, 'Completed', '220,221,222,223,224,225', 'Equipment', '2024-02-12', 0, 0),
(35, 18, 18, 24, 2, '2024-01-11', '2024-01-31', 21, 88200, 'Completed', '220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246', 'Equipment', '2024-02-19', 0, 0),
(36, 18, 14, 17, 1, '2024-01-17', '2024-01-23', 7, 7700, 'Completed', '247,248,249,250,251,252,253', 'Equipment', '2024-02-19', 0, 0),
(37, 18, 19, 21, 3, '2024-01-17', '2024-01-29', 13, 17550, 'Completed', '254,255,256,257,258,259,260,261,262,263,264,265,266', 'Equipment', '2024-02-19', 0, 0),
(38, 18, 14, 17, 1, '2024-01-16', '2024-01-22', 7, 7700, 'Completed', '267,268,269,270,271,272,273', 'Equipment', '2024-02-19', 0, 0),
(39, 18, 14, 17, 1, '2024-01-16', '2024-01-22', 7, 7700, 'Completed', '274,275,276,277,278,279,280', 'Equipment', '2024-02-19', 0, 0),
(40, 18, 18, 23, 1, '2024-01-14', '2024-01-23', 10, 13000, 'Completed', '281,282,283,284,285,286,287,288,289,290', 'Equipment', '2024-02-19', 0, 0),
(41, 18, 14, 18, 8, '2024-01-13', '2024-01-31', 19, 45600, 'Completed', '291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309', 'Equipment', '2024-02-19', 0, 0),
(42, 18, 19, 21, 1, '2024-02-15', '2024-02-27', 13, 5850, 'Cancelled', '310,311,312,313,314,315,316,317,318,319,320,321,322', 'Equipment', '2024-02-19', 0, 0),
(43, 18, 18, 23, 1, '2024-02-05', '2024-02-23', 19, 24700, 'Completed', '310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341', 'Equipment', '2024-02-19', 0, 0),
(44, 18, 19, 20, 2, '2024-01-17', '2024-01-30', 14, 16800, 'Completed', '342,343,344,345,346,347,348,349,350,351,352,353,354,355', 'Equipment', '2024-02-19', 0, 0),
(45, 18, 14, 17, 1, '2024-02-14', '2024-02-20', 7, 7700, 'Completed', '356,357,358,359,360,361,362', 'Equipment', '2024-02-19', 0, 0),
(46, 18, 14, 18, 4, '2024-02-29', '2024-03-08', 9, 10800, 'Upcoming', '363,364,365,366,367,368,369,370,371', 'Equipment', '2024-02-19', 0, 0),
(47, 18, 18, 24, 2, '2024-02-28', '2024-02-29', 2, 8400, 'Cancelled', '372,373', 'Equipment', '2024-02-19', 0, 0),
(48, 18, 1, 8, 1, '2024-02-22', '2024-02-28', 7, 469000, 'Completed', '372,373,374,375,376,377,378,379,380', 'Singer', '2024-02-19', 0, 0),
(49, 18, 14, 11, 1, '2024-02-22', '2024-02-23', 2, 2600, 'Completed', '381,382', 'Singer', '2024-02-19', 0, 0),
(50, 18, 1, 3, 1, '2024-02-23', '2024-02-29', 7, 700, 'Cancelled', '383,384,385,386,387,388,389', 'Studio', '2024-02-23', 0, 0),
(51, 18, 18, 24, 2, '2024-03-14', '2024-03-21', 8, 33600, 'Upcoming', '383,384,385,386,387,388,389,390,391,392,393,394,395,396,397', 'Equipment', '2024-02-23', 0, 0),
(52, 18, 14, 17, 1, '2024-02-29', '2024-03-02', 3, 3300, 'Rejected', '398,399,400', 'Equipment', '2024-02-24', 0, 0),
(53, 18, 19, 20, 2, '2024-03-14', '2024-03-20', 7, 8400, 'Cancelled', '398,399,400,401,402,403,404,405,406,407', 'Equipment', '2024-02-24', 0, 0),
(54, 18, 14, 17, 1, '2024-04-18', '2024-04-20', 3, 3300, 'Cancelled', '408,409,410', 'Equipment', '2024-02-27', 3300, 0),
(55, 18, 1, 3, 1, '2024-04-25', '2024-04-26', 2, 200, 'Pending', '408,409,410,411,412', 'Studio', '2024-02-27', 0, 0),
(56, 18, 14, 17, 1, '2024-04-18', '2024-04-20', 3, 3300, 'Pending', '413,414,415', 'Equipment', '2024-02-27', 3300, 0),
(57, 18, 1, 3, 1, '2024-04-25', '2024-04-26', 2, 200, 'Pending', '413,414,415,416,417', 'Studio', '2024-02-27', 0, 0),
(58, 18, 19, 20, 2, '2024-03-29', '2024-04-03', 6, 7200, 'Upcoming', '418,419,420,421,422,423', 'Equipment', '2024-04-23', 1800, 0);

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
(18, 'Gayathra Dissanayake', 'gayathradissa@gmail.com', 1234565789, '2000-03-31', 'test  test  test', '$2y$10$rGgNvX/xlY1X2uRCVSWUl.UnyP4sWCA8xfdu2vNSXZf9SpStWwioq', 'male', 'IMG-65864fca5956f6.45090781.jpeg', 681741, 'Active', '2023-11-01'),
(19, 'Test 02', 'itsaeox98@gmail.com', 1234567890, '2024-01-23', 'itsaeox98@gmail.com', '$2y$10$QkEmYPYl5TQMk76hUkvS1uSGRz7GnEJYszq0uOdl5jLonz9HRomvC', 'male', 'IMG-6592556e970157.07537984.png', 119619, 'Active', '2023-11-01'),
(20, 'user_03', 'user_03@gmail.com', 722899088, '2000-03-31', 'user_03@gmail.com', '$2y$10$GCrNihZkcSpEzS.b6Nt3Ou26jMenS.l6v9abYqYZzc6QeJdfc3b4e', 'male', 'IMG-65d97578a84687.85209747.jpeg', 218512, 'Active', '2024-02-24'),
(21, 'user_04', 'user_04@gmail.com', 722899088, '2000-03-31', 'user_04@gmail.com', '$2y$10$4Gui65HDHyCVnsuG7fCj2.kGi.4yosNRkSR.4Vtu5bOI7MnJhoG9e', 'male', 'IMG-653fd611dd2445.48951448.png', 242995, 'Deactivated', '2024-02-24'),
(22, 'user_05', 'user_05@gmail.com', 722899088, '2000-03-31', 'user_04@gmail.com', '$2y$10$FZazLReP3w52NeURN8qP8.4dhdueye77d7rTYvqNeUuHly7bCwmMC', 'male', 'IMG-653fd611dd2445.48951448.png', 158828, 'Active', '2024-02-24'),
(23, 'user_06', 'user_06@gmail.com', 1234567890, '2024-02-08', 'user_06@gmail.com', '$2y$10$n0vIHJOUZDw8xX9B6U1c0eqaavPxctnuHos/nHqeJfvptH5Ym5b4m', 'male', 'IMG-65d976dfdb7643.92903837.jpg', 281179, 'Active', '2024-02-24'),
(24, 'user_07', 'user_07@gmail.com', 1234567890, '2024-02-08', 'user_06@gmail.com', '$2y$10$LBbMysvUMMAC7uNSD/cete7SXUN.9x17yIziOEaFYfCqK8zotrXky', 'male', 'IMG-653fd611dd2445.48951448.png', 130625, 'Banned', '2024-02-24'),
(25, 'user_08', 'user_08@gmail.com', 1234567890, '2024-02-08', 'user_06@gmail.com', '$2y$10$z4nYaVJIQXchnam4fkfWQ.ra1iIW.gq/oSKfYx/2q.33Xyz3NX0I2', 'male', 'IMG-653fd611dd2445.48951448.png', 599546, 'Banned', '2024-02-24'),
(26, 'user_09', 'user_09@gmail.com', 1234567890, '2024-02-08', 'user_09@gmail.com', '$2y$10$9cgQ9cpE0O7i7KZ3VZFTYefw5DSCPZtCu0CQndWNoFApILBdaScVe', 'male', 'IMG-653fd611dd2445.48951448.png', 356274, 'Active', '2024-02-24');

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
-- Dumping data for table `user_passwords`
--

INSERT INTO `user_passwords` (`user_pw_id`, `user_id`, `password`) VALUES
(1, 18, '$2y$10$hkSH/wYeUySbtSotZgYu/Oic5SP/ULTNupKXFtdDecNG/gVIPrmNS'),
(2, 18, '$2y$10$/AB6mGXXQhvl3VCUqZknyeh6NazYa/7tV6peZcJV1CmaxUkNC4aAm'),
(3, 18, '$2y$10$PZbxoBJHeppTTcdRi2hzG.LRdcpS1rPsNoO4S372/umbFiCH.KRI2'),
(4, 18, '$2y$10$dC5dIi.OzMmnFWRdm.ooKOzm73JDRA.LmVt5lFpj/3c.hjdjj1w.O'),
(5, 19, '$2y$10$iXs/M1wv31i9FmBCYwP4nOT2IJnaQ5Cf9r.zKvvYgBLtexXs8.qEW'),
(6, 18, '$2y$10$iXs/M1wv31i9FmBCYwP4nOT2IJnaQ5Cf9r.zKvvYgBLtexXs8.qEW'),
(7, 19, '$2y$10$jGEsBANDB6kp6rACb4rPu.gwJ2gvDPoMINZgCxR.z9VVkR9yPzIEa');

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
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_product_cart` (`product_id`),
  ADD KEY `fk_user_cart` (`user_id`);

--
-- Indexes for table `chat_mod_user`
--
ALTER TABLE `chat_mod_user`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `mod_user_chat_user` (`user_id`),
  ADD KEY `mod_user_chat_mod` (`moderator_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `inq_user` (`user_id`);

--
-- Indexes for table `inq_chat`
--
ALTER TABLE `inq_chat`
  ADD PRIMARY KEY (`inq_chat_id`),
  ADD KEY `inq_chat_chat` (`chat_id`),
  ADD KEY `inq_chat_inq` (`inquiry_id`);

--
-- Indexes for table `login_logout_logs`
--
ALTER TABLE `login_logout_logs`
  ADD PRIMARY KEY (`login_id`);

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
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_sp` (`created_by`);

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
  ADD KEY `fk_product` (`product_id`),
  ADD KEY `fk_user` (`user_id`);

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
  ADD KEY `user_id` (`user_id`),
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
  MODIFY `entry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `chat_mod_user`
--
ALTER TABLE `chat_mod_user`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inq_chat`
--
ALTER TABLE `inq_chat`
  MODIFY `inq_chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_logout_logs`
--
ALTER TABLE `login_logout_logs`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `moderator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `musician`
--
ALTER TABLE `musician`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `recover_account_user`
--
ALTER TABLE `recover_account_user`
  MODIFY `recover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sec_queation`
--
ALTER TABLE `sec_queation`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  MODIFY `serviceprovider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suborder`
--
ALTER TABLE `suborder`
  MODIFY `sorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_passwords`
--
ALTER TABLE `user_passwords`
  MODIFY `user_pw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_sp` FOREIGN KEY (`created_by`) REFERENCES `serviceproviders` (`serviceprovider_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
