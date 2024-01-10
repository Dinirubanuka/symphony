-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 08:35 AM
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
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `admin_name`, `admin_email`, `admin_contact_no`, `admin_nic`, `admin_address`, `password`) VALUES
(1, 'admin01', 'admin@gmail.com', 0, '0000000000', 'admin01', '$2y$10$.giPsKxvJSX5q2/xFa8iouS5c3P8U7hyOfX4f/Xn.4nkxOYl.bfsS'),
(2, 'admin03@gmail.com', 'admin03@gmail.com', 2147483647, '333333333333333', 'admin03@gmail.com', '$2y$10$bxkmDjVr50DKfrqQf2tEXeWRnnvP3WTgRVzXzXfkStDg4rA0m/F5C'),
(3, 'admin04@gmail.com', 'admin04@gmail.com', 2147483647, '121212121212', 'admin04@gmail.com', '$2y$10$6UJ09vjR/p8YOJbq0lLMzufUnBps9iIYItVx4TqUuGEC6jvo0pNQS'),
(4, 'admin05@gmail.com', 'admin05@gmail.com', 1234567890, 'admin05@gmail.c', 'admin05@gmail.com', '$2y$10$sOQxgV32c0sTDlLwgq6IB.ZogTav3f8oyjPAWVyt/Qkat9YC8UZkS');

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
(274, '2024-01-16', 17, 1),
(275, '2024-01-17', 17, 1),
(276, '2024-01-18', 17, 1),
(277, '2024-01-19', 17, 1),
(278, '2024-01-20', 17, 1),
(279, '2024-01-21', 17, 1),
(280, '2024-01-22', 17, 1);

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
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`moderator_id`, `moderator_name`, `moderator_email`, `moderator_contact_no`, `moderator_nic`, `moderator_address`, `password`, `type`) VALUES
(1, 'moderator01', 'moderator01@gmail.com', 100000000, '100000000', 'moderator01@gmail.com', '$2y$10$.fjzjyiF0Rg88ec0LNJGh.Aep5ScztV4nG6/9Rb0U9Uzevd7lnPUK', 'User Account Moderator'),
(2, 'moderator02', 'moderator02@gmail.com', 2000000000, '200000000', 'moderator02@gmail.com', '$2y$10$Cx.y2kQr58hwufiyxlvUuuBnTqNYb3rRKJMzxJ5e2Voa3C0iXSOiG', 'User Support Moderator'),
(3, 'moderator03@gmail.com', 'moderator03@gmail.com', 2147483647, '3333333333333', 'moderator03@gmail.com', '$2y$10$oQKMQhd8.EXbxsrSj/OAW.OKH/7iDjNPcwY0U2MCref1pT9E8Q1M2', 'Event Package Moderator'),
(4, 'moderator04@gmail.com', 'moderator04@gmail.com', 12121212, 'moderator04@gma', 'moderator04@gmail.com', '$2y$10$RoZ.MvwI4m7ItPCRFs1qDOYsEvjrGDFeie1Q7CnBmn3Gt750T8C2i', 'User Account Moderator'),
(5, 'moderator05@gmail.com', 'moderator05@gmail.com', 1234567890, 'moderator05@gma', 'moderator05@gmail.com', '$2y$10$3bWEbemGAY5JZoRTYNc6BeLEaEFzzry9Er1Sa8WErV3J2GbG1BdMm', 'User Support Moderator'),
(6, 'moderator06@gmail.com', 'moderator06@gmail.com', 1234567890, 'moderator06@gma', 'moderator06@gmail.com', '$2y$10$ifp/RMqF16m7T5R1WEK9qOdkafczxIE5y1V2GKsh66Hf91E2SoeDC', 'User Account Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sorder_id` mediumtext NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `sorder_id`, `total`) VALUES
(10, 18, '33', 28865),
(11, 18, '34,35', 98480),
(12, 18, '36', 8285),
(13, 18, '37', 18628),
(17, 18, '38', 8285);

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
  `warranty` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `created_by`, `category`, `brand`, `model`, `quantity`, `unit_price`, `photo_1`, `photo_2`, `photo_3`, `Title`, `Description`, `outOfStock`, `createdDate`, `warranty`) VALUES
(17, 14, 'Electric Guitars', 'Yamaha', 'G13', 2, 1100, 'IMG-65941e25181055.71853029.jpg', 'IMG-65941e25202227.58261776.jpg', 'IMG-65941e25281010.99267029.jpg', 'Keyboard', 'dv zsdvfaetgeag egeagaf', 0, '2024-01-02 14:31:01', '2024-01-01'),
(18, 14, 'Audio ', 'Yamaha', '2134c', 10, 300, 'IMG-659254383db6c3.64392645.jpg', 'IMG-65941e3ee8f334.28591517.jpg', 'IMG-6592543855fb02.30725840.jpg', 'Microphone', 'hrdysmey,sunsert', 0, '2024-01-02 14:31:26', '2030-01-01'),
(20, 19, 'Electric Guitars', 'Yamaha', 'G11', 3, 600, 'IMG-65925309cca440.10886502.jpg', 'IMG-65925309ccadd5.85824551.jpg', 'IMG-65925309ccb201.59047494.jpg', 'Guitar', 'this is the product description', 0, '2024-01-01 05:52:09', '2026-10-13'),
(21, 19, 'Keyboard Organs', 'Lowrey', 'K11', 3, 450, 'IMG-6592534fc88a55.88013733.jpg', 'IMG-6592534fc89692.28602216.jpg', 'IMG-65941e742d7498.42037729.jpg', 'Keyboard', 'ajevbnailubvaijokvbuia', 0, '2024-01-02 14:32:20', '2024-01-23'),
(23, 18, 'Percussion Drums', 'Bosphorus', 'D11', 1, 1300, 'IMG-659253cc68bd38.12224044.jpeg', 'IMG-659253cc68ca09.28564496.jpg', 'IMG-659253cc68ce52.56432290.jpeg', 'Drumset', 'bsrmteantatsemykae', 0, '2024-01-02 14:31:47', '2024-01-23'),
(24, 18, 'Percussion Drums', 'Bosphorus', 'D12', 2, 2100, 'IMG-659253f8b217d8.22407869.jpg', 'IMG-65941e5c0f8b54.99131092.jpg', 'IMG-659253f8b22507.42992831.jpg', 'Drumset', 'ndsethshjrshbsrehsjndshn', 0, '2024-01-02 14:31:56', '2024-01-15');

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
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `rating`, `content`, `name`, `photo`) VALUES
(12, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(13, 17, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(14, 17, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(15, 18, 18, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(16, 17, 19, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'itsaeox98@gmail.com', 'IMG-6592556e970157.07537984.png'),
(17, 18, 19, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Test 02', 'IMG-6592556e970157.07537984.png'),
(18, 18, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(19, 20, 18, 3, 'lorejkabvuiab jkbwsdfiqabwflan wjbfikabwfljan kfjbwarkf', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(20, 20, 18, 3, 'efjkhnsaiulbhfil jbweailbnfloa knbbw obndaf;wb abw bndwaknd awdbjkwavdklnadma sk bjn laknwsda bkjdbaslkna jsakndsa nwkdbkjan ma j kawh kdnjabnwdkl badhb klawbd jkwabd nanmdajlkbd', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(21, 18, 18, 3, 'rbhsgvem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus.', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(26, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(27, 17, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(28, 17, 18, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(29, 17, 18, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(30, 17, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(31, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(32, 17, 18, 4, 'egweheqwaehwahwdsg', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg'),
(33, 17, 18, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. MLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra leo ac leo luctus, et elementum nisl lacinia. Pellentesque non neque tempus, ultricies tellus eget, tempus metus. Maecenas varius hendrerit ligula, id ultricies justo dapibus ut. M', 'Gayathra Dissanayake', 'IMG-65864fca5956f6.45090781.jpeg');

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
  `verification` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serviceproviders`
--

INSERT INTO `serviceproviders` (`serviceprovider_id`, `business_name`, `business_address`, `business_contact_no`, `business_email`, `password`, `owner_name`, `owner_address`, `owner_contact_no`, `owner_nic`, `owner_email`, `about`, `profile_photo`, `verification`) VALUES
(14, 'gayathradissa@gmail.com', 'gayathradissa@gmail.com', '1234567890', 'gayathradissa@gmail.com', '$2y$10$wnKk3/23oLc/i9IZlSiae.iqt/Zx6.zjn8vMQ6I3XO9HCoriMBy7m', 'gayathradissa@gmail.com', 'gayathradissa@gmail.com', '1234567890', 'gayathradissa@g', 'gayathradissa@gmail.com', 'gayathradissa@gmail.com', 'IMG-65864b06e5a500.12264750.jpg', 162655),
(18, 'gayathradissa1@gmail.com', 'gayathradissa1@gmail.com', '1234567890', 'gayathradissa1@gmail.com', '$2y$10$vW8S4t.8UL4/gvMhUT7zPeseKUq2vXJnOQR9p/abm2ktCyqIRUgee', 'gayathradissa1@gmail.com', 'gayathradissa1@gmail.com', '1234567890', 'gayathradissa1@', 'gayathradissa1@gmail.com', 'gayathradissa1@gmail.com', 'IMG-659252651d92c6.46419557.png', 108783),
(19, 'gayathradissa2@gmail.com', 'gayathradissa2@gmail.com', '1234567890', 'gayathradissa2@gmail.com', '$2y$10$JGdsN89gcJCO7VEvUwvMB.uIOeo37z5CkBwFqRQR.WiHz3CUTuAo.', 'gayathradissa2@gmail.com', 'gayathradissa2@gmail.com', '1234567890', 'gayathradissa2@', 'gayathradissa2@gmail.com', 'gayathradissa2@gmail.com', 'IMG-659252aa449923.24623916.png', 178095);

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
(33, 18, 18, 23, 1, '2024-01-11', '2024-01-31', 21, 27300, 'Rejected', '199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219'),
(34, 18, 19, 21, 2, '2024-01-18', '2024-01-23', 6, 5400, 'Cancelled', '220,221,222,223,224,225'),
(35, 18, 18, 24, 2, '2024-01-11', '2024-01-31', 21, 88200, 'Cancelled', '220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246'),
(36, 18, 14, 17, 1, '2024-01-17', '2024-01-23', 7, 7700, 'Cancelled', '247,248,249,250,251,252,253'),
(37, 18, 19, 21, 3, '2024-01-17', '2024-01-29', 13, 17550, 'Upcoming', '254,255,256,257,258,259,260,261,262,263,264,265,266'),
(38, 18, 14, 17, 1, '2024-01-16', '2024-01-22', 7, 7700, 'Cancelled', '267,268,269,270,271,272,273'),
(39, 18, 14, 17, 1, '2024-01-16', '2024-01-22', 7, 7700, 'Pending', '274,275,276,277,278,279,280');

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
  `verification` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `TelephoneNumber`, `BirthDate`, `address`, `password`, `gender`, `profile_photo`, `verification`) VALUES
(18, 'Gayathra Dissanayake', 'gayathradissa@gmail.com', 1234565789, '2000-03-31', 'test  test  test', '$2y$10$hiFQqTomQvLBTbk52aLsoexEr19GxsrkQeT3iLm9V6WirRplc2DwW', 'male', 'IMG-65864fca5956f6.45090781.jpeg', 681741),
(19, 'Test 02', 'itsaeox98@gmail.com', 1234567890, '2024-01-23', 'itsaeox98@gmail.com', '$2y$10$iXs/M1wv31i9FmBCYwP4nOT2IJnaQ5Cf9r.zKvvYgBLtexXs8.qEW', 'male', 'IMG-6592556e970157.07537984.png', 119619);

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
  MODIFY `entry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `moderator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  MODIFY `serviceprovider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `suborder`
--
ALTER TABLE `suborder`
  MODIFY `sorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`sorder_ids`) REFERENCES `suborder` (`sorder_id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_sp` FOREIGN KEY (`created_by`) REFERENCES `serviceproviders` (`serviceprovider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suborder`
--
ALTER TABLE `suborder`
  ADD CONSTRAINT `suborder_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suborder_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suborder_ibfk_3` FOREIGN KEY (`serviceprovider_id`) REFERENCES `serviceproviders` (`serviceprovider_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
