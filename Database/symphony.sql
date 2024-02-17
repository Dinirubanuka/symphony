-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 12:54 AM
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
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`entry_id`, `date`, `product_id`, `qty`) VALUES
(254, '2024-01-17', 21, 3),
(255, '2024-01-18', 21, 3),
(256, '2024-01-19', 21, 3),
(257, '2024-01-20', 21, 3),
(258, '2024-01-21', 21, 3),
(259, '2024-01-22', 21, 3),
(260, '2024-01-23', 21, 3),
(261, '2024-01-24', 21, 3),
(262, '2024-01-25', 21, 3),
(263, '2024-01-26', 21, 3),
(264, '2024-01-27', 21, 3),
(265, '2024-01-28', 21, 3),
(266, '2024-01-29', 21, 3),
(281, '2024-01-14', 23, 1),
(282, '2024-01-15', 23, 1),
(283, '2024-01-16', 23, 1),
(284, '2024-01-17', 23, 1),
(285, '2024-01-18', 23, 1),
(286, '2024-01-19', 23, 1),
(287, '2024-01-20', 23, 1),
(288, '2024-01-21', 23, 1),
(289, '2024-01-22', 23, 1),
(290, '2024-01-23', 23, 1),
(291, '2024-01-13', 18, 8),
(292, '2024-01-14', 18, 8),
(293, '2024-01-15', 18, 8),
(294, '2024-01-16', 18, 8),
(295, '2024-01-17', 18, 8),
(296, '2024-01-18', 18, 8),
(297, '2024-01-19', 18, 8),
(298, '2024-01-20', 18, 8),
(299, '2024-01-21', 18, 8),
(300, '2024-01-22', 18, 8),
(301, '2024-01-23', 18, 8),
(302, '2024-01-24', 18, 8),
(303, '2024-01-25', 18, 8),
(304, '2024-01-26', 18, 8),
(305, '2024-01-27', 18, 8),
(306, '2024-01-28', 18, 8),
(307, '2024-01-29', 18, 8),
(308, '2024-01-30', 18, 8),
(309, '2024-01-31', 18, 8),
(323, '2024-02-05', 23, 1),
(324, '2024-02-06', 23, 1),
(325, '2024-02-07', 23, 1),
(326, '2024-02-08', 23, 1),
(327, '2024-02-09', 23, 1),
(328, '2024-02-10', 23, 1),
(329, '2024-02-11', 23, 1),
(330, '2024-02-12', 23, 1),
(331, '2024-02-13', 23, 1),
(332, '2024-02-14', 23, 1),
(333, '2024-02-15', 23, 1),
(334, '2024-02-16', 23, 1),
(335, '2024-02-17', 23, 1),
(336, '2024-02-18', 23, 1),
(337, '2024-02-19', 23, 1),
(338, '2024-02-20', 23, 1),
(339, '2024-02-21', 23, 1),
(340, '2024-02-22', 23, 1),
(341, '2024-02-23', 23, 1),
(342, '2024-01-17', 20, 2),
(343, '2024-01-18', 20, 2),
(344, '2024-01-19', 20, 2),
(345, '2024-01-20', 20, 2),
(346, '2024-01-21', 20, 2),
(347, '2024-01-22', 20, 2),
(348, '2024-01-23', 20, 2),
(349, '2024-01-24', 20, 2),
(350, '2024-01-25', 20, 2),
(351, '2024-01-26', 20, 2),
(352, '2024-01-27', 20, 2),
(353, '2024-01-28', 20, 2),
(354, '2024-01-29', 20, 2),
(355, '2024-01-30', 20, 2),
(356, '2024-02-14', 17, 1),
(357, '2024-02-15', 17, 1),
(358, '2024-02-16', 17, 1),
(359, '2024-02-17', 17, 1),
(360, '2024-02-18', 17, 1),
(361, '2024-02-19', 17, 1),
(362, '2024-02-20', 17, 1);

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
  `availability` varchar(255) NOT NULL
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
(7, 18, 1, 'user', 'rgbbe', '12:25:33 PM | February 6 2024');

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
(2, 18, 'Technical Issue', 'nwsr', 'j,truf,m', '', '', '', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'IMG-656bdc23223334.62765635.png', 'Pending', 0, NULL),
(3, 18, 'Technical Issue', 'gbwrsvsloj kbqweuikfhq', 'wrhw fqefwf', '', '', '', 'IMG-65c1e3564de106.71069130.jpg', 'IMG-65c1e3564df517.77863469.jpg', 'IMG-65c1e3564df998.02290386.jpg', 'Pending', 0, NULL),
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
(5, 7, 1);

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
(8, 'User - Logout', '2024-02-11 12:20:44', 18);

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sorder_id` mediumtext NOT NULL,
  `total` int(10) NOT NULL,
  `order_placed_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `sorder_id`, `total`, `order_placed_on`) VALUES
(10, 18, '33', 28865, '2024-02-01'),
(11, 18, '34,35', 98480, '2024-02-01'),
(12, 18, '36', 8285, '2024-02-01'),
(13, 18, '37', 18628, '2024-02-01'),
(17, 18, '38', 8285, '2024-02-01'),
(18, 18, '40', 13850, '2024-02-01'),
(19, 18, '41', 48080, '2024-02-01'),
(20, 18, '42,43', 32278, '2024-02-01'),
(21, 18, '44', 17840, '2024-02-01'),
(22, 18, '45', 8285, '2024-02-01');

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
  `user_name` varchar(255) NOT NULL,
  `first_purchase_date` date NOT NULL,
  `first_purchase_item` varchar(255) NOT NULL,
  `last_purchase_date` date NOT NULL,
  `last_purchase_item` varchar(255) NOT NULL,
  `mobile_number` int(13) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `other` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `placed_on` date DEFAULT NULL,
  `contactEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recover_account_user`
--

INSERT INTO `recover_account_user` (`recover_id`, `user_name`, `first_purchase_date`, `first_purchase_item`, `last_purchase_date`, `last_purchase_item`, `mobile_number`, `address`, `dob`, `gender`, `other`, `status`, `placed_on`, `contactEmail`) VALUES
(1, 'test', '2024-02-14', 'gfqag', '2023-06-13', 'hello', 0, 'gtest', '2024-02-01', 'male', 'geqwagev', 'Pending', NULL, NULL),
(2, 'test', '2024-02-14', 'gfqag', '2023-06-13', 'hello', 0, 'gtest', '2024-02-01', 'male', 'geqwagev', 'Pending', NULL, NULL);

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
  `placed_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `rating`, `content`, `name`, `photo`, `placed_on`) VALUES
(12, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(13, 17, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(14, 17, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(15, 18, 18, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(16, 17, 19, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'itsaeox98@gmail.com', 'IMG-6592556e970157.07537984.png', NULL),
(17, 18, 19, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Test 02', 'IMG-6592556e970157.07537984.png', NULL),
(18, 18, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(19, 20, 18, 3, 'lorejkabvuiab jkbwsdfiqabwflan wjbfikabwfljan kfjbwarkf', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(20, 20, 18, 3, 'efjkhnsaiulbhfil jbweailbnfloa knbbw obndaf;wb abw bndwaknd awdbjkwavdklnadma sk bjn laknwsda bkjdbaslkna jsakndsa nwkdbkjan ma j kawh kdnjabnwdkl badhb klawbd jkwabd nanmdajlkbd', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(21, 18, 18, 3, 'rbhsgvem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus.', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(26, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(27, 17, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(28, 17, 18, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(29, 17, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(30, 17, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(31, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(32, 17, 18, 4, 'egweheqwaehwahwdsg', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(33, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(34, 21, 18, 3, 'huiyguy', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', NULL),
(35, 18, 18, 4, 'b4wrh24h 42gf2gt 2gf23 r3', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg', '2024-02-11');

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
  `category` varchar(10) NOT NULL DEFAULT 'singer',
  `brand` varchar(10) NOT NULL DEFAULT 'no brand',
  `model` varchar(10) NOT NULL DEFAULT 'no model',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` int(11) NOT NULL,
  `photo_1` varchar(100) NOT NULL,
  `photo_2` varchar(100) NOT NULL,
  `photo_3` varchar(100) NOT NULL,
  `Title` varchar(10) NOT NULL DEFAULT 'noTitile',
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
(7, 1, 'singer', 'no brand', 'no model', 0, 34, 'IMG-65b75a30f1e127.01170410.jpg', 'IMG-65b75a30f20226.47881022.jpg', 'IMG-65b75a30f21619.91493291.jpeg', 'noTitile', '40,144,013 views  Aug 19, 2006\r\nBeatin Down Yo Block Now Streaming', 1, '2024-02-06 06:46:17', '2024-01-29 13:26:32', 'imac banu', 'dassa', 768836682, 'https://www.youtube.com/embed/qUH5I_jKRB0?si=ZkOSBMSeuVGS2FuW', 'Gampaha Mannar Mullaitivu Vavuniya Batticola', 'Guiro Guzheng Marimba Ney Oboe', 'IMG-65b75a30f21e68.38378178.jpeg', 'imacbanu@gmail.com', 'Active'),
(8, 1, 'singer', 'no brand', 'no model', 0, 67000, 'IMG-65b77d6bca24e1.24492751.jpg', 'IMG-65b77d6bcb6942.33579196.jpg', 'IMG-65b77d6bcb7581.65685958.png', 'noTitile', 'earff', 1, '2024-02-06 06:46:17', '2024-01-29 15:56:51', 'imac banu', 'pini', 768836682, 'https://www.youtube.com/embed/pxjZM-d_ShI?si=vKm0OdkPl6DDBqLE', 'Colombo Gampaha Kurunegala Puttalam', 'Accordion Bansuri BassDrum Bassoon TalkingDrum Theremin Timpani', 'IMG-65b7816e1c8c92.83734193.', 'imacbanu@gmail.com', 'Active'),
(11, 14, 'singer', 'no brand', 'no model', 0, 1300, 'IMG-65bb3aad9c83b9.97097280.jpg', 'IMG-65bb3aad9ca352.46560085.jpg', 'IMG-65bb3aad9cb9c5.08242150.jpg', 'noTitile', 'test 01test 01test 01test 01', 1, '2024-02-06 06:46:17', '2024-02-01 12:01:09', 'test 01test 01', 'test 01', 702604647, 'test 01test 01test 01', 'Colombo Gampaha', 'Accordion', 'IMG-65bb3aad9ccec4.66470917.jpg', 'test 01test 01test 01', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'studio',
  `brand` varchar(50) NOT NULL DEFAULT 'no brand',
  `model` varchar(50) NOT NULL DEFAULT 'no model',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` double NOT NULL,
  `photo_1` varchar(100) NOT NULL,
  `photo_2` varchar(100) NOT NULL,
  `photo_3` varchar(100) NOT NULL,
  `Title` text NOT NULL,
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
(3, 1, 'studio', 'no brand', 'no model', 1, 100, 'IMG-65b7864392bd60.65283221.', 'IMG-65b78643933f31.29459990.', 'IMG-65b78643936246.72403522.', 'nabhsd', 'no description', 1, '2024-02-06 06:46:28', '2024-01-29', 'Colombo Gampaha Kandy', 'Colombo Gampaha Kandy Accordion Bansuri BassDrum Bassoon', 'aredf', 'awsefcwe', 122312, 'https://www.youtube.com/embed/pxjZM-d_ShI?si=vKm0OdkPl6DDBqLE', 'yes', 'Active');

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
  `avail` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suborder`
--

INSERT INTO `suborder` (`sorder_id`, `user_id`, `serviceprovider_id`, `product_id`, `qty`, `start_date`, `end_date`, `days`, `total`, `status`, `avail`) VALUES
(33, 18, 18, 23, 1, '2024-01-11', '2024-01-31', 21, 27300, 'Completed', '199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219'),
(34, 18, 19, 21, 2, '2024-01-18', '2024-01-23', 6, 5400, 'Completed', '220,221,222,223,224,225'),
(35, 18, 18, 24, 2, '2024-01-11', '2024-01-31', 21, 88200, 'Completed', '220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246'),
(36, 18, 14, 17, 1, '2024-01-17', '2024-01-23', 7, 7700, 'Completed', '247,248,249,250,251,252,253'),
(37, 18, 19, 21, 3, '2024-01-17', '2024-01-29', 13, 17550, 'Completed', '254,255,256,257,258,259,260,261,262,263,264,265,266'),
(38, 18, 14, 17, 1, '2024-01-16', '2024-01-22', 7, 7700, 'Completed', '267,268,269,270,271,272,273'),
(39, 18, 14, 17, 1, '2024-01-16', '2024-01-22', 7, 7700, 'Completed', '274,275,276,277,278,279,280'),
(40, 18, 18, 23, 1, '2024-01-14', '2024-01-23', 10, 13000, 'Completed', '281,282,283,284,285,286,287,288,289,290'),
(41, 18, 14, 18, 8, '2024-01-13', '2024-01-31', 19, 45600, 'Completed', '291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309'),
(42, 18, 19, 21, 1, '2024-02-15', '2024-02-27', 13, 5850, 'Cancelled', '310,311,312,313,314,315,316,317,318,319,320,321,322'),
(43, 18, 18, 23, 1, '2024-02-05', '2024-02-23', 19, 24700, 'In-Progress', '310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341'),
(44, 18, 19, 20, 2, '2024-01-17', '2024-01-30', 14, 16800, 'Completed', '342,343,344,345,346,347,348,349,350,351,352,353,354,355'),
(45, 18, 14, 17, 1, '2024-02-14', '2024-02-20', 7, 7700, 'Pending', '356,357,358,359,360,361,362');

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
(18, 'Gayathra Dissanayake', 'gayathradissa@gmail.com', 1234565789, '2000-03-31', 'test  test  test', '$2y$10$HDBV2E9OySy5aBFMrKQgxukavzsiyYVlQGGWez8TTAKHr43bieE1i', 'male', 'IMG-65864fca5956f6.45090781.jpeg', 681741, 'Active', '2023-11-01'),
(19, 'Test 02', 'itsaeox98@gmail.com', 1234567890, '2024-01-23', 'itsaeox98@gmail.com', '$2y$10$iXs/M1wv31i9FmBCYwP4nOT2IJnaQ5Cf9r.zKvvYgBLtexXs8.qEW', 'male', 'IMG-6592556e970157.07537984.png', 119619, 'Active', '2023-11-01');

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
(4, 18, '$2y$10$dC5dIi.OzMmnFWRdm.ooKOzm73JDRA.LmVt5lFpj/3c.hjdjj1w.O');

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
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`moderator_id`);

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
  MODIFY `entry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `chat_mod_user`
--
ALTER TABLE `chat_mod_user`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inq_chat`
--
ALTER TABLE `inq_chat`
  MODIFY `inq_chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_logout_logs`
--
ALTER TABLE `login_logout_logs`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `moderator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `recover_account_user`
--
ALTER TABLE `recover_account_user`
  MODIFY `recover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `sorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_passwords`
--
ALTER TABLE `user_passwords`
  MODIFY `user_pw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product_cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
