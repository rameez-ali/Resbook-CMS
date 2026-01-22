-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2026 at 10:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `id` int(11) NOT NULL,
  `guests` tinyint(4) DEFAULT NULL,
  `sleeps_details` text DEFAULT NULL,
  `beds` tinyint(4) DEFAULT NULL,
  `bathrooms` tinyint(4) DEFAULT NULL,
  `bedroom_details` text DEFAULT NULL,
  `room_size` int(11) DEFAULT NULL,
  `deck_size` int(11) DEFAULT NULL,
  `from_price` decimal(10,2) DEFAULT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `is_featured` enum('Y','N') DEFAULT 'N',
  `from_price_caption` varchar(50) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `services` text DEFAULT NULL,
  `floor_plan_image` varchar(255) DEFAULT NULL,
  `booking_url` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  `room_resbook_id` varchar(45) DEFAULT NULL,
  `show_poa` enum('Y','N') DEFAULT 'N',
  `type` enum('Room','Villa','Bures') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`id`, `guests`, `sleeps_details`, `beds`, `bathrooms`, `bedroom_details`, `room_size`, `deck_size`, `from_price`, `currency_code`, `is_featured`, `from_price_caption`, `features`, `amenities`, `services`, `floor_plan_image`, `booking_url`, `button_text`, `page_meta_data_id`, `room_resbook_id`, `show_poa`, `type`) VALUES
(1, 4, NULL, 2, 2, NULL, 60, NULL, 510.00, 'NZD', 'Y', 'Per night', '<ul><li>Mountain views</li><li>Super king bed</li><li>Fine natural-fiber linens and towels</li><li>Tea and coffee facilities</li><li>Heated floors</li><li>Walk-in rain showers</li><li>Free toiletries</li><li>Local NZ artworks</li><li>Keycard entry and locking</li><li>Blinds and shutters</li><li>Desk and chair</li><li>Luggage rack</li><li>Wardrobe</li><li>Free wifi</li><li>Free car parking</li><li>BBQ facilities</li></ul>', NULL, NULL, NULL, 'https://stleonards.thebookingengine.net/room-booking/346?/adult=2&amp;child=0&amp;apiKey=413hngqsddwh55njwd9h0ke3wj&amp;', NULL, 14, NULL, 'N', 'Room'),
(2, 3, NULL, 1, 1, NULL, 500, NULL, NULL, NULL, 'Y', NULL, '<h2>Inclusions</h2><ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', '<h2>Inclusions</h2><ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', '<h2>Inclusions</h2><ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', '/library/images/Accommodation/beachfront-450x250.jpg', NULL, 'Button Label', 15, NULL, 'Y', 'Villa'),
(3, 5, NULL, 5, 1, NULL, 10, NULL, 240.00, 'NZD', 'Y', 'Per night', '<ul><li>Triple glazed windows and sound-proof walls</li><li>Keycard entry and locking</li><li>Blinds and shutters</li><li>Desk and chair</li><li>Luggage rack</li><li>Wardrobe</li><li>Wheelchair accessible</li><li>Free wifi</li><li>Free car parking</li><li>Covered outdoor campfire shelter</li><li>BBQ facilities</li></ul>', NULL, NULL, NULL, 'https://www.example.com', 'Find Out More', 16, NULL, 'N', 'Room'),
(4, 4, NULL, 4, 1, NULL, NULL, NULL, 347.00, 'NZD', 'Y', 'Per person', '<ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci Eeget Efficitur</li><li>Massa finibus ve</li></ul>', NULL, NULL, NULL, NULL, NULL, 17, NULL, 'N', 'Room'),
(5, 4, NULL, 2, NULL, NULL, NULL, NULL, 350.00, 'NZD', 'Y', 'For 2 people', '<p>Shared facilities with private shower and toilet rooms</p><p>Fully equipped modern kitchen with cookware, coffee, tea, dishes and cutlery</p><p>Beautiful view dining room</p><p>Commercial-grade fridges and freezers</p><p>Cosy lounge area with board games and books&nbsp;</p><p>Storage lockers</p><p>Self-serve on-site laundry and dry room facilities</p><p>Covered outdoor campfire shelter</p><p>BBQ facilities</p><p>On-site dump station and fresh water refill station</p><p>Bicycle rentals</p><p>5-minute walk to Mrs Woolly\'s General Store for groceries, supplies and gifts</p><p>Restaurants, pubs, shops, lagoon walk and the wharf just 5-10 minute walk away</p><p>Track transport easily arranged by Camp Hosts upon request</p><p>Close to Routeburn Track, a wide array of hiking trails, and other stellar track options such as the Rees-Dart Track and Greenstone-Caples Track</p>', NULL, NULL, NULL, NULL, NULL, 43, NULL, 'N', NULL),
(6, 5, NULL, 5, NULL, NULL, NULL, NULL, 850.00, 'NZD', 'Y', 'For 2 nights', '<ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', NULL, NULL, NULL, NULL, NULL, 44, NULL, 'N', NULL),
(7, 10, NULL, 10, NULL, NULL, 100, NULL, 100.00, 'NZD', 'Y', 'Per Night', '<ul><li>Lorem ipsum</li><li>dolor sit amet</li><li>consectetur adipiscing elit.</li><li>In non tellus ac</li><li>ipsum malesuada scelerisque</li><li>quis vel nisl.</li><li>Ut nec arcu in urna auctor volutpat.</li></ul>', NULL, NULL, NULL, 'https://www.example.com', 'Find out more', 98, '128', 'N', NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, '/library/images/Accommodation/beachfront-450x250.jpg', NULL, NULL, 100, NULL, 'N', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, '/library/images/Accommodation/beachfront-450x250.jpg', NULL, NULL, 101, NULL, 'N', NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, '/library/images/Accommodation/beachfront-450x250.jpg', NULL, NULL, 102, NULL, 'N', NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', NULL, '<ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', NULL, NULL, '/library/images/Accommodation/beachfront-450x250.jpg', 'https://www.example.com?yellow-house', NULL, 111, NULL, 'Y', 'Room'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, '/library/images/Accommodation/beachfront-450x250.jpg', NULL, NULL, 132, NULL, 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_category`
--

CREATE TABLE `accommodation_category` (
  `id` int(11) NOT NULL,
  `from_price` decimal(10,2) DEFAULT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `is_featured` enum('Y','N') DEFAULT 'N',
  `from_price_caption` varchar(50) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `booking_url` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  `iframe_code_accomm` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accommodation_category`
--

INSERT INTO `accommodation_category` (`id`, `from_price`, `currency_code`, `is_featured`, `from_price_caption`, `features`, `booking_url`, `button_text`, `page_meta_data_id`, `iframe_code_accomm`) VALUES
(1, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 120, NULL),
(2, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 128, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_has_category`
--

CREATE TABLE `accommodation_has_category` (
  `accommodation_id` int(11) NOT NULL,
  `accommodation_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accommodation_has_category`
--

INSERT INTO `accommodation_has_category` (`accommodation_id`, `accommodation_category_id`) VALUES
(1, 2),
(2, 2),
(3, 1),
(4, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `page_meta_data_id`) VALUES
(1, 19),
(2, 20),
(3, 21),
(4, 22),
(5, 23),
(6, 96);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `is_featured` enum('Y','N') DEFAULT 'N',
  `date_posted` datetime DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `is_featured`, `date_posted`, `page_meta_data_id`) VALUES
(1, 'Y', '2019-08-01 00:00:00', 18),
(2, 'Y', '2019-09-08 00:00:00', 24),
(3, 'Y', '2019-08-06 00:00:00', 25),
(4, 'N', '2019-08-07 00:00:00', 26),
(5, 'N', '2018-06-24 00:00:00', 27),
(6, 'Y', '2021-10-12 00:00:00', 78),
(7, 'Y', '2019-10-10 00:00:00', 79),
(8, 'Y', '2019-11-01 00:00:00', 97),
(9, 'N', NULL, 130);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_has_category`
--

CREATE TABLE `blog_post_has_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_post_has_category`
--

INSERT INTO `blog_post_has_category` (`post_id`, `category_id`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 5),
(3, 2),
(3, 3),
(3, 5),
(4, 1),
(4, 4),
(4, 5),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 2),
(7, 4),
(8, 2),
(8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cms_accessgroups`
--

CREATE TABLE `cms_accessgroups` (
  `access_id` int(11) NOT NULL,
  `access_name` varchar(100) NOT NULL,
  `access_users` char(1) NOT NULL DEFAULT 'N',
  `access_userpasswords` char(1) NOT NULL DEFAULT 'N',
  `access_useraccesslevel` char(1) NOT NULL DEFAULT 'N',
  `access_accessgroups` char(1) NOT NULL DEFAULT 'N',
  `access_cmssettings` char(1) NOT NULL DEFAULT 'N',
  `access_settings` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_accessgroups`
--

INSERT INTO `cms_accessgroups` (`access_id`, `access_name`, `access_users`, `access_userpasswords`, `access_useraccesslevel`, `access_accessgroups`, `access_cmssettings`, `access_settings`) VALUES
(1, 'Super Administrator', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(2, 'General Editor', 'N', 'N', 'N', 'N', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `cms_blacklist_user`
--

CREATE TABLE `cms_blacklist_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_failed_attempt_on` datetime DEFAULT NULL,
  `failed_login_attempt_count` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `disabled_on` datetime DEFAULT NULL,
  `recent_login_attempt_on` datetime DEFAULT NULL,
  `failed_hour_count` int(11) NOT NULL DEFAULT 0,
  `total_failed_attempt` int(11) DEFAULT NULL,
  `is_notified` tinyint(1) NOT NULL DEFAULT 0,
  `ip_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_blacklist_user`
--

INSERT INTO `cms_blacklist_user` (`id`, `username`, `first_failed_attempt_on`, `failed_login_attempt_count`, `date_updated`, `is_disabled`, `disabled_on`, `recent_login_attempt_on`, `failed_hour_count`, `total_failed_attempt`, `is_notified`, `ip_address`) VALUES
(1, 'alan@tomahawk.co.nz', '2019-11-18 11:35:52', 1, '2019-11-17 22:35:52', 0, NULL, '2019-11-18 11:35:52', 0, 1, 0, '114.23.241.67'),
(3, 'info@atomictravel.co.nz', '2021-01-18 10:19:52', 4, '2021-02-08 22:18:48', 0, NULL, '2021-02-08 22:18:48', 1, 8, 0, '114.23.241.67'),
(4, 'stay@holidaynelson.com', '2021-06-29 12:27:50', 1, '2021-06-29 00:27:50', 0, NULL, '2021-06-29 12:27:50', 0, 1, 0, '114.23.241.67'),
(7, 'inspiretheme@tomahawk.co.nz', '2024-08-16 14:46:47', 1, '2024-08-16 02:46:47', 0, NULL, '2024-08-16 14:46:47', 0, 1, 0, '172.68.144.146');

-- --------------------------------------------------------

--
-- Table structure for table `cms_login_attempt`
--

CREATE TABLE `cms_login_attempt` (
  `id` int(11) NOT NULL,
  `username` tinyblob NOT NULL,
  `access_key` tinyblob DEFAULT NULL,
  `is_successful` enum('N','Y') NOT NULL DEFAULT 'N',
  `ip_address` varchar(255) NOT NULL,
  `record_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_login_attempt`
--

INSERT INTO `cms_login_attempt` (`id`, `username`, `access_key`, `is_successful`, `ip_address`, `record_date`) VALUES
(1, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-06-19 09:19:09'),
(2, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-06-21 08:21:38'),
(3, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-06-22 14:28:32'),
(4, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-06-25 12:35:57'),
(5, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-06-29 10:32:32'),
(6, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d3075746e61696e, 'N', '127.0.0.1', '2018-07-30 11:56:05'),
(7, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-07-30 11:56:15'),
(8, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-01 08:20:18'),
(9, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e74696e, 'N', '127.0.0.1', '2018-08-01 08:38:25'),
(10, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-01 08:38:30'),
(11, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-02 10:26:02'),
(12, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e6174696e, 'N', '127.0.0.1', '2018-08-06 14:39:10'),
(13, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-06 14:39:17'),
(14, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-07 10:05:36'),
(15, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-08 08:45:22'),
(16, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-09 07:47:00'),
(17, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-10 10:49:58'),
(18, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d3075746e61696e, 'N', '127.0.0.1', '2018-08-17 11:28:48'),
(19, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-17 11:28:55'),
(20, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-20 08:15:24'),
(21, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-08-20 14:30:44'),
(22, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30757461696e, 'N', '127.0.0.1', '2018-09-14 09:10:57'),
(23, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-14 09:11:08'),
(24, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-18 09:14:25'),
(25, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-19 07:51:23'),
(26, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-19 11:34:31'),
(27, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-20 09:30:24'),
(28, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-21 07:38:59'),
(29, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-24 08:11:01'),
(30, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-25 07:47:36'),
(31, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-26 07:59:14'),
(32, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-27 08:53:33'),
(33, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-09-28 15:33:21'),
(34, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-04 07:41:43'),
(35, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-05 08:42:09'),
(36, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-17 10:06:39'),
(37, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-19 12:30:50'),
(38, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-23 15:28:16'),
(39, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-24 09:19:55'),
(40, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-10-25 15:07:00'),
(41, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-11-01 11:55:33'),
(42, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d3075746e61696e, 'N', '127.0.0.1', '2018-11-02 09:03:40'),
(43, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-11-02 09:07:30'),
(44, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d3075746e61696e, 'N', '127.0.0.1', '2018-11-08 12:58:57'),
(45, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-11-08 12:59:09'),
(46, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-11-09 15:07:35'),
(47, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-11-12 09:43:35'),
(48, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2018-11-13 07:46:39'),
(49, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 10:43:52'),
(50, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 14:44:10'),
(51, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 15:54:47'),
(52, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 15:57:53'),
(53, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 16:05:14'),
(54, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 16:13:32'),
(55, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-14 16:18:40'),
(56, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-15 09:22:00'),
(57, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-15 09:23:02'),
(58, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-15 09:41:18'),
(59, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-15 12:31:42'),
(60, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-15 12:34:13'),
(61, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-15 13:45:21'),
(62, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 09:12:18'),
(63, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 09:15:09'),
(64, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 09:27:18'),
(65, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 10:30:40'),
(66, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 13:36:58'),
(67, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 14:33:24'),
(68, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-16 15:23:05'),
(69, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-19 08:55:18'),
(70, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-19 10:08:20'),
(71, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-19 14:18:59'),
(72, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-20 09:47:41'),
(73, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x4d30756e7461696e, 'N', '114.23.241.67', '2018-11-20 11:40:21'),
(74, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-20 11:40:33'),
(75, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-21 15:45:11'),
(76, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-26 10:35:01'),
(77, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.171.72', '2018-11-27 21:20:26'),
(78, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-28 14:54:19'),
(79, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-29 09:08:35'),
(80, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-29 09:32:49'),
(81, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-29 10:48:49'),
(82, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-29 11:57:59'),
(83, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-29 12:58:06'),
(84, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 08:54:13'),
(85, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 09:44:30'),
(86, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 10:56:15'),
(87, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 13:34:12'),
(88, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 13:48:37'),
(89, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 14:13:32'),
(90, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-11-30 15:11:48'),
(91, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.171.72', '2018-11-30 17:58:42'),
(92, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-03 09:08:41'),
(93, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-03 09:49:01'),
(94, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-03 11:37:17'),
(95, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-03 12:24:00'),
(96, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-03 15:59:34'),
(97, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.171.72', '2018-12-03 23:01:26'),
(98, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 09:09:32'),
(99, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 09:47:59'),
(100, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 10:22:50'),
(101, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 10:23:33'),
(102, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 11:24:11'),
(103, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 12:03:55'),
(104, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-04 13:21:17'),
(105, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-05 09:15:34'),
(106, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-05 14:10:48'),
(107, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-06 09:41:47'),
(108, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-06 12:15:25'),
(109, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-06 13:25:41'),
(110, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-06 15:59:30'),
(111, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-07 08:35:27'),
(112, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-07 13:58:19'),
(113, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-14 11:09:21'),
(114, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-17 13:49:45'),
(115, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2018-12-21 11:18:46'),
(116, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-08 13:07:23'),
(117, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-09 09:29:18'),
(118, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-09 10:33:40'),
(119, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-10 11:55:58'),
(120, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-10 14:42:03'),
(121, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-10 15:39:06'),
(122, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-10 15:53:36'),
(123, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-11 09:16:23'),
(124, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-11 11:23:32'),
(125, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-11 12:00:08'),
(126, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-11 13:45:12'),
(127, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-11 15:15:59'),
(128, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-14 16:27:23'),
(129, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-15 07:59:00'),
(130, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-15 12:50:16'),
(131, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-15 12:53:46'),
(132, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-15 13:46:19'),
(133, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 09:29:48'),
(134, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 09:37:49'),
(135, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 09:47:49'),
(136, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 11:01:02'),
(137, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 13:12:50'),
(138, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 13:15:25'),
(139, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 14:42:11'),
(140, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 15:14:22'),
(141, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 15:39:52'),
(142, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 16:04:59'),
(143, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d756e7461696e, 'N', '114.23.241.67', '2019-01-16 16:08:47'),
(144, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 16:08:55'),
(145, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-16 16:17:33'),
(146, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 09:22:28'),
(147, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 09:48:21'),
(148, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 10:50:38'),
(149, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 11:04:50'),
(150, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 12:11:52'),
(151, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 13:16:23'),
(152, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 13:18:26'),
(153, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 13:19:07'),
(154, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 13:19:26'),
(155, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 15:52:05'),
(156, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-17 16:07:12'),
(157, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 09:14:44'),
(158, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 10:40:43'),
(159, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 10:55:30'),
(160, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 12:39:35'),
(161, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 12:41:59'),
(162, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 13:25:03'),
(163, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 13:58:06'),
(164, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 14:18:45'),
(165, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 14:20:45'),
(166, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 14:34:57'),
(167, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 15:18:06'),
(168, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 15:19:35'),
(169, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 15:29:30'),
(170, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-18 16:14:38'),
(171, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 08:59:33'),
(172, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 09:49:07'),
(173, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 10:30:42'),
(174, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 10:36:35'),
(175, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 10:41:22'),
(176, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 11:15:47'),
(177, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 11:19:09'),
(178, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 11:28:41'),
(179, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 11:30:33'),
(180, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 11:50:35'),
(181, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 13:43:43'),
(182, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 14:51:02'),
(183, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 15:01:12'),
(184, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 15:09:27'),
(185, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 15:49:36'),
(186, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-21 16:18:36'),
(187, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 08:48:42'),
(188, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 09:27:57'),
(189, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 10:25:00'),
(190, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 11:58:35'),
(191, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 13:18:57'),
(192, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 13:35:17'),
(193, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 14:12:34'),
(194, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 15:19:42'),
(195, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 15:21:48'),
(196, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-22 16:02:42'),
(197, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 09:07:45'),
(198, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 09:25:28'),
(199, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 10:10:07'),
(200, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 10:25:16'),
(201, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 10:26:46'),
(202, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 10:28:13'),
(203, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 10:31:12'),
(204, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 10:33:56'),
(205, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 11:17:39'),
(206, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 12:46:15'),
(207, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-23 13:16:15'),
(208, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-24 09:38:42'),
(209, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-24 11:39:49'),
(210, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-24 12:18:53'),
(211, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-24 12:30:17'),
(212, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-24 13:48:36'),
(213, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-24 15:47:10'),
(214, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 09:19:06'),
(215, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 11:30:36'),
(216, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 13:45:46'),
(217, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 14:01:41'),
(218, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 14:05:25'),
(219, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 14:06:00'),
(220, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 15:47:28'),
(221, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-25 15:51:10'),
(222, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 08:19:59'),
(223, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 09:24:06'),
(224, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 11:20:32'),
(225, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 12:51:13'),
(226, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 14:30:46'),
(227, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 15:08:14'),
(228, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 15:31:34'),
(229, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 15:36:15'),
(230, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 15:49:19'),
(231, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 15:55:11'),
(232, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 15:56:29'),
(233, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-29 16:05:20'),
(234, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.160.69', '2019-01-30 00:18:15'),
(235, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-30 08:31:48'),
(236, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-30 09:15:16'),
(237, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-30 10:20:03'),
(238, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-30 13:01:28'),
(239, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-30 14:48:01'),
(240, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-30 16:57:12'),
(241, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 09:34:35'),
(242, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 09:41:24'),
(243, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 09:42:21'),
(244, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 10:47:52'),
(245, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 11:40:24'),
(246, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 13:00:57'),
(247, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 13:24:08'),
(248, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 13:33:40'),
(249, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 13:35:44'),
(250, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 14:15:33'),
(251, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 14:39:36'),
(252, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 15:32:07'),
(253, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 15:32:45'),
(254, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 16:09:39'),
(255, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-01-31 16:22:12'),
(256, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.160.69', '2019-01-31 16:57:54'),
(257, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 08:19:15'),
(258, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 09:14:27'),
(259, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.99.176.18', '2019-02-01 09:18:20'),
(260, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 09:37:02'),
(261, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.99.176.18', '2019-02-01 10:40:08'),
(262, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 11:46:19'),
(263, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 11:54:42'),
(264, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 12:03:17'),
(265, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 12:58:34'),
(266, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 13:24:07'),
(267, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-01 16:06:46'),
(268, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.160.69', '2019-02-01 20:16:49'),
(269, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 08:16:55'),
(270, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 08:36:52'),
(271, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 09:20:31'),
(272, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 09:29:01'),
(273, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 09:32:18'),
(274, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 10:17:03'),
(275, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 10:43:55'),
(276, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 10:58:29'),
(277, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 11:07:26'),
(278, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 13:48:50'),
(279, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 15:05:11'),
(280, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 15:09:49'),
(281, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 15:19:35'),
(282, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.160.69', '2019-02-04 17:30:06'),
(283, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-04 17:44:13'),
(284, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 08:05:07'),
(285, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 08:50:50'),
(286, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 08:52:10'),
(287, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 08:55:11'),
(288, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 09:29:08'),
(289, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 10:46:12'),
(290, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 11:19:32'),
(291, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 12:06:46'),
(292, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 12:07:26'),
(293, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 12:25:26'),
(294, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 13:20:18'),
(295, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-05 16:15:31'),
(296, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 09:18:16'),
(297, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 09:28:41'),
(298, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 09:32:14'),
(299, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 09:46:26'),
(300, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 09:47:30'),
(301, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 09:48:18'),
(302, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 14:13:45'),
(303, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x74306d616834776b, 'N', '114.23.241.67', '2019-02-07 14:34:41'),
(304, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 14:35:03'),
(305, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 15:39:39'),
(306, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 15:59:25'),
(307, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 16:54:15'),
(308, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 17:01:10'),
(309, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-07 17:09:00'),
(310, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:13:13'),
(311, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:16:28'),
(312, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:17:49'),
(313, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:49:22'),
(314, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:50:33'),
(315, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:52:09'),
(316, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 09:53:48'),
(317, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 10:10:46'),
(318, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 10:45:54'),
(319, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 10:46:47'),
(320, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 11:32:28'),
(321, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 14:07:50'),
(322, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-08 14:14:09'),
(323, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.239.152.207', '2019-02-09 06:55:05'),
(324, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-11 09:29:54'),
(325, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-11 11:43:08'),
(326, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x4d30554e5441494e, 'N', '114.23.241.67', '2019-02-11 11:49:45'),
(327, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-11 11:50:03'),
(328, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-11 13:44:08'),
(329, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-11 14:20:18'),
(330, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.239.152.207', '2019-02-11 21:13:55'),
(331, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-12 13:08:24'),
(332, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.239.152.207', '2019-02-12 22:23:52'),
(333, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 08:59:34'),
(334, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 09:27:35'),
(335, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 09:37:23'),
(336, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 10:05:24'),
(337, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 11:19:26'),
(338, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 13:27:13'),
(339, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 13:37:38'),
(340, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-13 15:32:38'),
(341, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-14 13:13:25'),
(342, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 09:10:05'),
(343, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 09:16:18'),
(344, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 10:10:25'),
(345, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 11:45:03'),
(346, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 13:27:35'),
(347, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 14:51:55'),
(348, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-15 15:20:25'),
(349, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 10:03:45'),
(350, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 13:02:45'),
(351, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 13:07:18'),
(352, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 13:53:04'),
(353, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 14:27:01'),
(354, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 15:27:36'),
(355, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-18 16:07:32'),
(356, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-19 11:01:23'),
(357, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-19 14:39:20'),
(358, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-20 09:21:55'),
(359, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-20 09:43:24'),
(360, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-20 10:41:55'),
(361, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-20 11:40:34'),
(362, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-20 14:24:38'),
(363, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-21 12:23:18'),
(364, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-21 15:31:16'),
(365, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.239.152.207', '2019-02-21 20:48:56'),
(366, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-22 09:16:37'),
(367, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-22 13:25:44'),
(368, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-22 14:14:24'),
(369, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-22 14:18:02'),
(370, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-22 16:09:46'),
(371, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-25 09:52:52'),
(372, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-25 11:25:36'),
(373, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-25 15:42:51'),
(374, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 09:31:45'),
(375, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 09:49:11'),
(376, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 10:30:44'),
(377, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.99.176.18', '2019-02-26 11:08:39'),
(378, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 11:19:58'),
(379, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 11:53:36'),
(380, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 13:17:28'),
(381, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 13:55:31'),
(382, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 15:05:07'),
(383, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 15:26:19'),
(384, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 15:32:19'),
(385, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-02-26 15:33:13'),
(386, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-02-27 10:05:57'),
(387, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-02-28 08:20:42'),
(388, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-03-04 07:41:50'),
(389, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-03-05 10:03:11'),
(390, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d303975746e61696e, 'N', '127.0.0.1', '2019-03-07 07:47:46'),
(391, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-03-07 07:47:57'),
(392, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-03-08 12:40:45'),
(393, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-05-21 12:46:43'),
(394, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-05-24 14:31:25'),
(395, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-06-04 10:31:03'),
(396, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-12 14:36:19'),
(397, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-13 10:27:06'),
(398, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-13 12:31:33'),
(399, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-13 13:45:00'),
(400, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-13 14:46:44'),
(401, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-13 14:51:59'),
(402, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-13 14:53:57'),
(403, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-14 09:16:25'),
(404, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-14 10:52:48'),
(405, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-14 11:57:52'),
(406, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-14 12:06:39'),
(407, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-14 12:54:05'),
(408, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-17 08:21:22'),
(409, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-17 14:06:52'),
(410, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-17 14:08:10'),
(411, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-18 13:57:39'),
(412, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-18 16:07:29'),
(413, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-19 08:54:50'),
(414, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-20 16:05:23'),
(415, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-21 08:33:49'),
(416, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-21 10:15:08'),
(417, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-21 11:36:56'),
(418, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-21 16:04:49'),
(419, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-24 15:49:45'),
(420, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-25 08:39:11'),
(421, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-25 08:54:53'),
(422, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-25 09:55:52'),
(423, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-25 10:30:30'),
(424, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-25 15:09:23'),
(425, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-26 11:10:52'),
(426, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-26 11:22:03'),
(427, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-27 15:15:19'),
(428, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-06-28 14:31:32'),
(429, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-01 10:33:21'),
(430, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-01 12:16:41'),
(431, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-01 13:37:42'),
(432, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-01 13:56:23'),
(433, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-01 14:46:03'),
(434, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-01 15:39:27'),
(435, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-02 08:37:18'),
(436, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-02 09:19:56'),
(437, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-02 12:48:37'),
(438, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-03 09:30:40'),
(439, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-03 15:43:40'),
(440, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 07:52:49'),
(441, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 09:33:54'),
(442, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 10:36:15'),
(443, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 11:28:03'),
(444, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 12:45:49'),
(445, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 12:46:49'),
(446, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-04 15:26:51'),
(447, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-05 09:24:36'),
(448, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-05 10:20:02'),
(449, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-05 10:29:35'),
(450, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-05 11:33:51'),
(451, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-05 13:24:05'),
(452, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-05 15:23:45'),
(453, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-08 09:52:39'),
(454, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-08 11:33:43'),
(455, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-08 12:20:52'),
(456, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-08 13:21:36'),
(457, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-09 10:46:42'),
(458, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-09 12:19:54'),
(459, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-09 13:28:27'),
(460, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-09 14:48:28'),
(461, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-09 15:38:11'),
(462, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-10 09:16:15'),
(463, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-10 12:32:27'),
(464, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-10 12:51:36'),
(465, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-11 11:21:20'),
(466, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-11 12:36:27'),
(467, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-11 13:53:00'),
(468, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-11 15:05:28'),
(469, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-11 15:15:09'),
(470, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-12 07:59:16'),
(471, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-12 09:18:40'),
(472, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-12 10:24:30'),
(473, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-12 12:47:13'),
(474, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-12 14:35:59'),
(475, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-12 15:20:43'),
(476, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-15 09:26:36'),
(477, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-15 11:27:27'),
(478, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-15 14:55:03'),
(479, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-15 16:04:30'),
(480, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 09:30:12'),
(481, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 10:04:00'),
(482, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 12:01:42'),
(483, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 13:26:45'),
(484, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 13:53:04'),
(485, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 14:08:35'),
(486, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 15:06:39'),
(487, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 15:28:29'),
(488, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 15:58:13'),
(489, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-16 16:26:49'),
(490, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-17 09:24:33');
INSERT INTO `cms_login_attempt` (`id`, `username`, `access_key`, `is_successful`, `ip_address`, `record_date`) VALUES
(491, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-17 10:02:59'),
(492, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-17 10:32:07'),
(493, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-17 12:32:42'),
(494, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-17 14:57:31'),
(495, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 07:51:14'),
(496, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 09:51:37'),
(497, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 10:52:13'),
(498, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 11:40:10'),
(499, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 11:47:11'),
(500, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 13:37:16'),
(501, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-18 15:12:21'),
(502, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 09:18:45'),
(503, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 09:43:58'),
(504, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 10:12:47'),
(505, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 11:18:17'),
(506, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 12:35:47'),
(507, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 13:45:47'),
(508, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 14:48:37'),
(509, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-19 15:43:03'),
(510, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-22 07:57:06'),
(511, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-22 08:18:59'),
(512, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-22 08:48:26'),
(513, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-22 12:44:49'),
(514, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-22 13:02:57'),
(515, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-22 13:32:49'),
(516, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.167.103', '2019-07-22 21:32:24'),
(517, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-23 09:22:27'),
(518, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-23 09:38:54'),
(519, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-23 09:40:42'),
(520, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-23 09:48:36'),
(521, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-23 10:59:34'),
(522, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-24 09:42:07'),
(523, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-24 09:48:41'),
(524, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-24 11:32:40'),
(525, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-25 09:19:32'),
(526, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-25 09:30:32'),
(527, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-25 09:34:59'),
(528, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-25 12:38:02'),
(529, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-25 14:52:49'),
(530, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-25 16:05:07'),
(531, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-26 10:15:36'),
(532, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-26 12:35:01'),
(533, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-26 12:51:31'),
(534, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-26 12:56:57'),
(535, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-26 14:02:56'),
(536, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-26 14:13:22'),
(537, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 08:48:20'),
(538, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 08:56:38'),
(539, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 10:50:30'),
(540, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 12:09:51'),
(541, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 12:28:12'),
(542, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 13:18:47'),
(543, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 13:26:52'),
(544, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 15:14:43'),
(545, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-29 15:39:30'),
(546, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 07:54:54'),
(547, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 08:19:11'),
(548, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 09:47:36'),
(549, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 11:10:48'),
(550, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 11:24:09'),
(551, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 12:27:55'),
(552, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 12:47:09'),
(553, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 13:44:06'),
(554, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '114.23.241.67', '2019-07-30 14:52:07'),
(555, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 14:52:55'),
(556, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-30 15:44:40'),
(557, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-31 08:19:18'),
(558, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-31 09:21:45'),
(559, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-31 09:38:50'),
(560, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-31 10:25:15'),
(561, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-31 11:07:20'),
(562, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-07-31 14:37:38'),
(563, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 09:16:34'),
(564, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 10:10:11'),
(565, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 10:37:25'),
(566, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 10:56:51'),
(567, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 11:10:49'),
(568, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 12:06:23'),
(569, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-01 14:36:02'),
(570, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 09:51:28'),
(571, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 11:22:37'),
(572, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 12:21:22'),
(573, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 13:11:29'),
(574, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 14:37:08'),
(575, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 15:19:05'),
(576, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-02 16:00:30'),
(577, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-05 08:52:47'),
(578, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-05 10:34:16'),
(579, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-05 14:21:48'),
(580, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-05 14:35:05'),
(581, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-05 14:45:36'),
(582, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.167.103', '2019-08-05 23:45:56'),
(583, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-06 10:39:07'),
(584, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-06 12:21:37'),
(585, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-06 13:30:41'),
(586, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-07 09:32:14'),
(587, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-07 11:46:59'),
(588, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-07 12:31:14'),
(589, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-07 13:08:23'),
(590, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-07 14:05:58'),
(591, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-07 15:59:00'),
(592, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-08 11:11:50'),
(593, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-08 12:20:08'),
(594, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-08 14:12:35'),
(595, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-08 15:11:25'),
(596, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-08 15:29:19'),
(597, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-08 15:36:22'),
(598, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-09 07:50:02'),
(599, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-09 09:17:40'),
(600, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-09 13:55:27'),
(601, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-13 09:19:59'),
(602, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-13 09:33:02'),
(603, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-13 10:19:29'),
(604, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-13 11:28:15'),
(605, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-13 13:30:07'),
(606, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-13 15:24:11'),
(607, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-15 14:24:16'),
(608, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-15 15:17:15'),
(609, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 08:09:07'),
(610, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 08:27:46'),
(611, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 10:29:41'),
(612, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 10:42:22'),
(613, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 12:04:37'),
(614, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 12:33:38'),
(615, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-16 15:35:32'),
(616, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-19 09:19:23'),
(617, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-19 13:11:05'),
(618, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-19 13:24:14'),
(619, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-19 14:25:01'),
(620, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-20 09:50:07'),
(621, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-20 11:26:45'),
(622, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-20 15:01:44'),
(623, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-21 08:40:51'),
(624, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-22 10:02:28'),
(625, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-22 10:30:23'),
(626, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-22 12:22:04'),
(627, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-23 07:59:12'),
(628, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-23 09:42:03'),
(629, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-23 11:20:39'),
(630, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-23 12:11:36'),
(631, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-23 12:58:35'),
(632, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-23 14:07:30'),
(633, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-26 11:22:06'),
(634, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-26 14:43:53'),
(635, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-27 09:51:06'),
(636, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-27 12:33:26'),
(637, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-27 13:20:02'),
(638, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-27 16:23:26'),
(639, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-28 15:49:51'),
(640, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-29 07:46:46'),
(641, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-08-29 08:22:20'),
(642, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-08-29 09:40:29'),
(643, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-30 10:17:48'),
(644, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-30 11:04:32'),
(645, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-08-30 12:10:19'),
(646, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-02 09:17:11'),
(647, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-02 09:35:58'),
(648, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-02 10:10:39'),
(649, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.199.54', '2019-09-02 11:46:35'),
(650, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '49.224.243.61', '2019-09-02 12:14:58'),
(651, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.199.54', '2019-09-02 12:31:33'),
(652, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-02 12:42:34'),
(653, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-02 14:36:30'),
(654, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.199.54', '2019-09-02 15:22:43'),
(655, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '111.69.142.39', '2019-09-03 09:28:07'),
(656, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-04 08:15:50'),
(657, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-04 09:40:01'),
(658, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-04 09:57:40'),
(659, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-04 12:03:02'),
(660, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-05 07:27:37'),
(661, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-05 09:25:40'),
(662, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-05 11:20:04'),
(663, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-05 17:00:18'),
(664, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-06 11:55:22'),
(665, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-06 13:44:42'),
(666, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-06 14:10:44'),
(667, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-06 18:10:46'),
(668, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 06:36:55'),
(669, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 09:08:16'),
(670, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-09 10:59:28'),
(671, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-09 11:14:28'),
(672, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 11:35:28'),
(673, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 12:02:13'),
(674, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 12:05:31'),
(675, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 12:57:47'),
(676, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-09 13:11:11'),
(677, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 13:38:34'),
(678, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 15:12:08'),
(679, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-09 15:14:14'),
(680, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-10 06:43:58'),
(681, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-10 08:47:34'),
(682, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-10 11:02:21'),
(683, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-10 16:26:46'),
(684, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-11 06:13:33'),
(685, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-11 09:38:54'),
(686, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-11 09:43:47'),
(687, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-11 09:58:32'),
(688, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-11 10:11:54'),
(689, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-11 11:25:40'),
(690, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-11 14:11:04'),
(691, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-11 14:57:50'),
(692, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-11 15:44:59'),
(693, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-12 06:18:22'),
(694, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-12 11:11:46'),
(695, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-12 13:24:32'),
(696, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-12 14:09:46'),
(697, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-12 14:44:24'),
(698, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-12 15:23:21'),
(699, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-12 19:53:24'),
(700, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-13 16:31:39'),
(701, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-13 17:07:47'),
(702, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-15 17:04:11'),
(703, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-16 06:12:50'),
(704, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-16 11:09:27'),
(705, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-16 13:01:09'),
(706, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-16 14:37:20'),
(707, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-16 15:54:36'),
(708, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.45', '2019-09-17 13:25:17'),
(709, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-17 20:52:59'),
(710, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-18 05:41:48'),
(711, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-18 10:24:22'),
(712, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-18 13:05:21'),
(713, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-18 13:52:25'),
(714, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-18 16:39:59'),
(715, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-18 21:33:26'),
(716, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-19 09:03:05'),
(717, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-19 09:06:26'),
(718, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-19 10:09:49'),
(719, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-19 12:05:16'),
(720, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.251', '2019-09-19 13:42:35'),
(721, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-19 14:29:22'),
(722, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-19 14:38:41'),
(723, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-19 15:10:11'),
(724, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-19 16:01:40'),
(725, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.251', '2019-09-19 16:48:14'),
(726, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-20 09:04:33'),
(727, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-20 10:04:31'),
(728, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-20 10:12:20'),
(729, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.45', '2019-09-20 13:13:44'),
(730, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-20 14:05:37'),
(731, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-20 14:12:34'),
(732, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-20 15:10:35'),
(733, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-20 16:07:39'),
(734, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-20 16:11:26'),
(735, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.45', '2019-09-20 16:57:56'),
(736, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-23 10:12:41'),
(737, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-23 10:57:52'),
(738, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-23 11:02:39'),
(739, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '49.224.96.255', '2019-09-23 11:19:42'),
(740, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.47.15', '2019-09-23 14:30:35'),
(741, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-23 17:11:38'),
(742, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-24 10:07:21'),
(743, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-24 11:08:56'),
(744, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-24 12:20:22'),
(745, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.75.83.33', '2019-09-24 14:40:26'),
(746, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-24 15:04:09'),
(747, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-24 15:04:56'),
(748, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '219.89.118.172', '2019-09-24 16:17:23'),
(749, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-24 16:21:21'),
(750, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-24 17:12:16'),
(751, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-24 18:18:15'),
(752, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '115.189.103.151', '2019-09-25 10:16:10'),
(753, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-25 10:29:12'),
(754, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-25 12:05:45'),
(755, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-25 12:53:25'),
(756, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-25 13:01:08'),
(757, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-25 15:24:45'),
(758, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-25 16:03:58'),
(759, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-25 18:31:19'),
(760, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-26 11:14:31'),
(761, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.45', '2019-09-26 11:50:56'),
(762, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-09-26 14:35:13'),
(763, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.56.201.248', '2019-09-26 15:41:16'),
(764, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.56.201.248', '2019-09-26 16:47:06'),
(765, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.45', '2019-09-27 09:15:06'),
(766, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.43', '2019-09-27 12:23:06'),
(767, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-27 12:49:03'),
(768, 0x6c75616e6140746865686561647761746572732e636f2e6e7a, '', 'Y', '103.240.152.45', '2019-09-27 13:53:42'),
(769, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-27 13:56:12'),
(770, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-27 14:46:54'),
(771, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-27 14:54:10'),
(772, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '115.189.81.63', '2019-09-29 17:33:37'),
(773, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '115.189.81.63', '2019-09-29 18:13:28'),
(774, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-30 09:58:46'),
(775, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-30 10:03:59'),
(776, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-30 10:17:53'),
(777, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '115.189.130.190', '2019-09-30 10:31:45'),
(778, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '118.92.113.37', '2019-09-30 11:19:43'),
(779, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-09-30 14:41:54'),
(780, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '118.92.113.37', '2019-09-30 18:54:39'),
(781, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '118.149.17.115', '2019-09-30 19:04:31'),
(782, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-02 08:28:57'),
(783, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-02 08:43:01'),
(784, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-02 11:19:56'),
(785, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-02 11:48:26'),
(786, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-10-07 16:02:53'),
(787, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-08 13:26:08'),
(788, 0x656d696c7940766f6c6f6d2e636f6d, '', 'Y', '122.60.4.59', '2019-10-21 17:47:25'),
(789, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-25 09:33:17'),
(790, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-10-29 10:48:51'),
(791, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-10-30 08:41:01'),
(792, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-11-05 09:59:55'),
(793, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-11-08 09:18:21'),
(794, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-11-11 09:38:43'),
(795, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-11-12 08:44:20'),
(796, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-11-13 08:57:34'),
(797, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2019-11-14 08:26:20'),
(798, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-14 13:18:29'),
(799, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-14 15:09:40'),
(800, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-15 08:07:27'),
(801, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-15 08:41:55'),
(802, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-15 11:55:07'),
(803, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-15 15:32:03'),
(804, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-15 15:49:05'),
(805, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-15 16:06:39'),
(806, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-18 09:46:49'),
(807, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-18 09:56:02'),
(808, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-18 10:24:12'),
(809, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-18 11:29:16'),
(810, 0x616c616e40746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-18 11:35:01'),
(811, 0x616c616e40746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '114.23.241.67', '2019-11-18 11:35:52'),
(812, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 08:23:21'),
(813, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 11:26:21'),
(814, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 11:57:56'),
(815, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 12:27:54'),
(816, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 12:38:22'),
(817, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 13:07:33'),
(818, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 13:23:24'),
(819, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-19 14:18:15'),
(820, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 08:07:04'),
(821, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 09:18:54'),
(822, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 09:22:52'),
(823, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 10:34:54'),
(824, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 11:11:50'),
(825, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 13:35:11'),
(826, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 14:52:27'),
(827, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-20 15:20:58'),
(828, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 09:26:57'),
(829, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 11:31:17'),
(830, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 12:01:28'),
(831, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 12:15:16'),
(832, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 13:46:12'),
(833, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 14:10:42'),
(834, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 15:17:12'),
(835, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 17:07:31'),
(836, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-21 17:11:08'),
(837, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 08:19:42'),
(838, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 09:47:19'),
(839, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 10:51:56'),
(840, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 13:54:10'),
(841, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 13:59:26'),
(842, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 14:19:40'),
(843, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 15:14:59'),
(844, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 15:39:25'),
(845, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 15:55:06'),
(846, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-22 17:01:39'),
(847, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.98.69.248', '2019-11-25 00:01:29'),
(848, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-25 08:21:33'),
(849, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-25 09:34:12'),
(850, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-25 10:19:55'),
(851, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-25 13:16:49'),
(852, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-25 14:16:48'),
(853, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-25 15:07:26'),
(854, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-26 09:46:44'),
(855, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-11-29 15:52:49'),
(856, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-12-13 08:33:38'),
(857, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-12-13 15:53:55'),
(858, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-12-16 09:50:46'),
(859, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-12-18 13:22:05'),
(860, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-12-18 15:27:56'),
(861, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2019-12-20 08:42:15'),
(862, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-07 10:32:26'),
(863, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-07 10:55:03'),
(864, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-07 11:12:30'),
(865, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-07 13:12:39'),
(866, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-10 14:45:00'),
(867, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-16 13:51:21'),
(868, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-17 11:59:02'),
(869, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-20 12:21:25'),
(870, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-20 13:20:23'),
(871, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-20 15:04:25'),
(872, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-20 15:34:20'),
(873, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-21 08:46:40'),
(874, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-21 14:25:25'),
(875, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-23 09:33:03'),
(876, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-23 16:08:27'),
(877, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-24 08:50:03'),
(878, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-24 09:51:00'),
(879, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-24 12:13:16'),
(880, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-24 13:54:32'),
(881, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-28 10:36:09'),
(882, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-30 09:29:19'),
(883, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-30 11:24:16'),
(884, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-30 14:46:49'),
(885, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-01-31 15:21:45'),
(886, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-02-03 11:41:13'),
(887, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-02-03 15:41:41'),
(888, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-02-10 15:20:38'),
(889, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-02-25 10:12:53'),
(890, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-02-28 14:19:04'),
(891, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-03-03 11:55:44'),
(892, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-03-12 10:13:54'),
(893, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '203.88.157.74', '2020-03-19 01:07:23'),
(894, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '203.88.157.74', '2020-03-19 18:07:55'),
(895, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '203.88.157.74', '2020-03-19 18:28:08'),
(896, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.90.153', '2020-03-24 10:30:43'),
(897, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.94.9', '2020-03-24 21:15:58'),
(898, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.94.9', '2020-03-25 09:09:26'),
(899, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.98.69.248', '2020-03-30 12:34:37'),
(900, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '119.224.89.210', '2020-03-30 13:39:03'),
(901, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '121.98.69.248', '2020-03-30 14:59:40'),
(902, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-04-03 10:35:52'),
(903, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.94.95', '2020-04-05 14:57:51'),
(904, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.94.95', '2020-04-05 16:37:21'),
(905, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-04-06 14:19:30'),
(906, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-04-06 15:17:06'),
(907, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.92.173', '2020-04-07 07:09:25'),
(908, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.92.173', '2020-04-07 08:17:23'),
(909, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '115.189.92.173', '2020-04-07 11:56:40'),
(910, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-04-24 12:30:39'),
(911, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-04-27 06:36:03'),
(912, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-05-06 11:40:40'),
(913, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-05-07 10:12:35'),
(914, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-05-08 12:46:37'),
(915, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '119.224.89.210', '2020-05-17 12:34:35'),
(916, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '119.224.89.210', '2020-05-20 12:04:01'),
(917, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.154.12.19', '2020-05-29 11:31:07'),
(918, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6e30756e7461696e, 'N', '114.23.241.67', '2020-05-29 11:31:31'),
(919, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.42.128', '2020-05-29 11:31:46'),
(920, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-05-29 11:32:04'),
(921, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '111.69.209.77', '2020-05-29 13:22:23'),
(922, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-04 09:49:39'),
(923, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.170.231', '2020-06-12 08:35:23'),
(924, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-15 10:19:41'),
(925, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-19 08:46:58'),
(926, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-22 09:23:25'),
(927, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-22 11:09:13'),
(928, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d2d756e7461696e, 'N', '122.60.164.220', '2020-06-22 13:38:37'),
(929, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.164.220', '2020-06-22 13:38:44'),
(930, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-24 09:27:29'),
(931, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-26 15:54:53'),
(932, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-29 05:05:43'),
(933, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-29 09:20:44'),
(934, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-06-30 10:28:58'),
(935, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.60.164.220', '2020-07-03 14:43:01'),
(936, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '49.227.254.165', '2020-07-03 16:22:51'),
(937, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '49.227.254.165', '2020-07-06 14:21:14'),
(938, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-07-07 09:25:40'),
(939, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-07-07 13:24:07'),
(940, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.223.37', '2020-07-14 12:54:12'),
(941, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.223.37', '2020-07-17 09:55:47'),
(942, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '49.225.215.199', '2020-07-22 13:32:10'),
(943, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-07-29 15:23:37'),
(944, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.223.37', '2020-07-31 14:08:52'),
(945, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '222.152.223.37', '2020-07-31 15:59:28'),
(946, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-08-10 10:25:04'),
(947, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-08-10 10:46:07'),
(948, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2020-08-10 11:31:39'),
(949, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.238.252.52', '2020-08-13 10:37:39'),
(950, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.238.252.52', '2020-08-13 11:37:59'),
(951, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.237.151.16', '2020-08-14 14:36:32'),
(952, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-08-28 08:38:12'),
(953, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-02 16:13:03'),
(954, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-07 15:01:26'),
(955, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-07 21:06:28'),
(956, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-09 16:05:05'),
(957, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-09 16:16:15'),
(958, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-09 17:11:10'),
(959, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-09 17:12:08'),
(960, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-09 18:34:16'),
(961, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-10 13:12:08'),
(962, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '125.236.142.78', '2020-09-11 13:08:13'),
(963, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e746174696e, 'N', '198.41.238.111', '2020-09-14 11:31:36'),
(964, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2020-09-14 11:31:43'),
(965, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2020-09-14 11:36:18'),
(966, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.134.30', '2020-09-15 12:25:08'),
(967, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2020-09-18 15:37:42'),
(968, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.166.134', '2020-09-18 15:37:49'),
(969, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-11-05 14:29:10'),
(970, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-11-24 16:48:41'),
(971, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-11-27 13:43:07'),
(972, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-12-04 13:30:11'),
(973, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2020-12-08 11:13:41'),
(974, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x4c65746d65696e313233, 'N', '198.41.238.129', '2020-12-08 11:27:17'),
(975, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e21, 'N', '198.41.238.129', '2020-12-08 11:28:13'),
(976, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-08 11:28:45'),
(977, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-08 11:46:55'),
(978, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-08 11:47:11'),
(979, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-08 11:48:17'),
(980, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-08 11:49:14'),
(981, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-08 11:50:07'),
(982, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.117', '2020-12-08 12:48:09'),
(983, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-12-08 14:13:16'),
(984, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2020-12-09 10:45:17');
INSERT INTO `cms_login_attempt` (`id`, `username`, `access_key`, `is_successful`, `ip_address`, `record_date`) VALUES
(985, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.117', '2020-12-09 11:58:34'),
(986, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.117', '2020-12-09 11:58:56'),
(987, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.117', '2020-12-09 12:01:56'),
(988, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2020-12-10 11:17:04'),
(989, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.117', '2020-12-11 12:11:47'),
(990, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.117', '2020-12-15 09:06:10'),
(991, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.117', '2020-12-15 10:49:56'),
(992, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-12-15 15:37:58'),
(993, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2020-12-16 11:08:12'),
(994, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-12-17 11:57:02'),
(995, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2020-12-21 11:47:58'),
(996, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-08 15:18:55'),
(997, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-08 15:29:29'),
(998, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-11 08:59:42'),
(999, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '198.41.238.129', '2021-01-13 14:09:42'),
(1000, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, 0x45615a71434035797836235870, 'N', '198.41.238.129', '2021-01-13 14:10:22'),
(1001, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-13 14:10:55'),
(1002, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2021-01-13 14:43:58'),
(1003, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-14 11:53:15'),
(1004, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2021-01-14 14:30:30'),
(1005, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2021-01-15 13:39:46'),
(1006, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x2a2a2a2a2a2a2a2a, 'N', '198.41.238.129', '2021-01-18 10:19:52'),
(1007, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-18 10:20:01'),
(1008, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.117', '2021-01-18 14:22:52'),
(1009, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-18 15:56:15'),
(1010, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-19 10:37:02'),
(1011, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2021-01-19 14:15:44'),
(1012, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.111', '2021-01-20 10:15:16'),
(1013, 0x6573636170657468656d6540746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.129', '2021-01-20 14:58:29'),
(1014, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '114.23.241.67', '2021-01-20 15:44:43'),
(1015, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '114.23.241.67', '2021-01-20 15:44:50'),
(1016, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e, 'N', '114.23.241.67', '2021-01-20 15:44:58'),
(1017, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-01-20 15:47:28'),
(1018, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-01-21 16:03:57'),
(1019, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '161.65.223.214', '2021-01-27 08:35:16'),
(1020, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '161.65.223.214', '2021-01-27 08:35:24'),
(1021, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '161.65.223.214', '2021-01-27 08:35:39'),
(1022, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '161.65.223.214', '2021-01-27 08:58:30'),
(1023, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '161.65.223.214', '2021-01-27 08:59:03'),
(1024, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '161.65.223.214', '2021-01-28 14:01:18'),
(1025, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-01-29 13:47:52'),
(1026, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-02-09 11:02:14'),
(1027, 0x696e666f4061746f6d696374726176656c2e636f2e6e7a, 0x41746f6d696374726176656c313233, 'N', '114.23.241.67', '2021-02-09 11:18:48'),
(1028, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-02-09 11:18:55'),
(1029, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-02-09 16:26:04'),
(1030, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e313233, 'N', '114.23.241.67', '2021-02-24 13:36:31'),
(1031, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-02-24 13:36:52'),
(1032, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-03-02 11:28:23'),
(1033, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-03-02 14:30:12'),
(1034, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-03-19 14:24:27'),
(1035, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-07 13:59:53'),
(1036, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-09 10:34:10'),
(1037, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-09 14:15:51'),
(1038, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-09 14:30:46'),
(1039, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-09 16:13:42'),
(1040, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-12 07:46:34'),
(1041, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-13 13:36:06'),
(1042, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-13 13:36:40'),
(1043, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-19 15:45:25'),
(1044, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.62.139.39', '2021-04-20 11:29:40'),
(1045, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.62.139.39', '2021-04-20 14:06:41'),
(1046, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.62.139.39', '2021-04-20 14:50:59'),
(1047, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.62.139.39', '2021-04-20 18:36:19'),
(1048, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-22 15:44:18'),
(1049, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-04-28 14:54:34'),
(1050, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-03 13:39:37'),
(1051, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-04 08:21:53'),
(1052, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-04 11:50:52'),
(1053, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-04 14:27:56'),
(1054, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-05 12:39:05'),
(1055, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-05 13:17:18'),
(1056, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-06 13:51:09'),
(1057, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-17 14:29:07'),
(1058, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-20 16:15:07'),
(1059, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-20 16:16:42'),
(1060, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-05-27 09:06:04'),
(1061, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-01 17:30:16'),
(1062, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-15 12:39:34'),
(1063, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-18 08:34:34'),
(1064, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-23 09:25:47'),
(1065, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-29 12:23:32'),
(1066, 0x7374617940686f6c696461796e656c736f6e2e636f6d, 0x434d5373746167696e67313233, 'N', '114.23.241.67', '2021-06-29 12:27:50'),
(1067, 0x7374617940686f6c696461796e656c736f6e2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-29 12:28:07'),
(1068, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-29 12:28:19'),
(1069, 0x7374617940686f6c696461796e656c736f6e2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-30 08:30:58'),
(1070, 0x7374617940686f6c696461796e656c736f6e2e636f2e6e7a, '', 'Y', '158.140.195.167', '2021-06-30 09:54:50'),
(1071, 0x7374617940686f6c696461796e656c736f6e2e636f2e6e7a, '', 'Y', '158.140.195.167', '2021-06-30 11:07:29'),
(1072, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-06-30 11:52:45'),
(1073, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-07-05 13:49:39'),
(1074, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-07-05 14:02:52'),
(1075, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-07-16 14:15:28'),
(1076, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-07-23 12:48:36'),
(1077, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-07-23 14:46:50'),
(1078, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-07-27 12:21:46'),
(1079, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '114.23.241.67', '2021-08-12 08:48:17'),
(1080, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '202.92.218.108', '2021-10-06 12:16:54'),
(1081, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '202.92.218.108', '2021-10-06 14:29:46'),
(1082, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.58.18.252', '2021-10-06 15:04:27'),
(1083, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '202.92.218.108', '2021-10-06 15:17:53'),
(1084, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '122.62.139.69', '2021-10-27 08:34:26'),
(1085, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2021-11-05 10:52:27'),
(1086, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2021-12-02 10:08:43'),
(1087, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2021-12-03 10:04:31'),
(1088, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2021-12-03 13:36:14'),
(1089, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2021-12-22 14:08:20'),
(1090, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2021-12-23 10:31:06'),
(1091, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-01-06 16:59:03'),
(1092, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-01-18 09:22:26'),
(1093, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-01-21 15:21:42'),
(1094, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-01-24 15:37:37'),
(1095, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-01-27 10:42:26'),
(1096, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-01-28 10:09:27'),
(1097, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-02-03 10:44:49'),
(1098, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-02-08 16:50:45'),
(1099, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-02-10 11:42:17'),
(1100, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-02-18 12:08:37'),
(1101, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-03-30 12:33:48'),
(1102, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-04-05 12:50:41'),
(1103, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-04-07 15:13:15'),
(1104, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-04-08 14:18:14'),
(1105, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-04-11 12:39:19'),
(1106, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-04-12 14:31:46'),
(1107, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-05 10:32:21'),
(1108, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-12 14:58:14'),
(1109, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-13 16:22:12'),
(1110, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-16 16:16:20'),
(1111, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-17 10:53:01'),
(1112, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-18 11:36:32'),
(1113, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-05-27 10:58:01'),
(1114, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-06-13 16:06:50'),
(1115, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-06-14 11:28:55'),
(1116, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-06-17 15:12:43'),
(1117, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-06-21 12:45:46'),
(1118, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-07-06 15:16:02'),
(1119, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-07-22 11:20:17'),
(1120, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-07-25 11:49:28'),
(1121, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-07-26 16:12:32'),
(1122, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-07-29 09:53:51'),
(1123, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-08-05 10:12:23'),
(1124, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-08-12 10:58:53'),
(1125, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-08-16 16:45:50'),
(1126, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-08-19 11:24:52'),
(1127, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-09-06 15:13:43'),
(1128, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-09-08 10:04:18'),
(1129, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-09-16 14:10:10'),
(1130, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-10-07 12:06:56'),
(1131, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-10-13 12:09:16'),
(1132, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-11-01 12:17:13'),
(1133, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-11-02 10:58:53'),
(1134, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-11-02 16:23:42'),
(1135, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-11-03 13:05:01'),
(1136, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2022-11-03 15:18:40'),
(1137, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2023-01-23 13:47:19'),
(1138, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2023-02-03 15:07:50'),
(1139, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2023-02-07 15:42:07'),
(1140, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2023-02-08 13:04:24'),
(1141, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-03-15 14:10:15'),
(1142, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.10', '2023-04-11 12:17:54'),
(1143, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-04-11 14:58:15'),
(1144, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-04-12 08:44:08'),
(1145, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.24', '2023-04-13 12:48:20'),
(1146, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.25', '2023-04-13 14:42:17'),
(1147, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.11', '2023-04-13 16:40:27'),
(1148, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-04-14 11:55:32'),
(1149, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.24', '2023-04-14 13:08:28'),
(1150, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-04-17 08:56:40'),
(1151, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-04-17 15:21:32'),
(1152, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.24', '2023-04-17 17:05:19'),
(1153, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-04-18 09:35:13'),
(1154, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-04-19 11:35:08'),
(1155, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-04-19 16:03:38'),
(1156, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.9', '2023-04-28 13:08:30'),
(1157, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.18', '2023-05-18 14:46:17'),
(1158, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-05-18 15:16:24'),
(1159, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.19', '2023-05-22 10:17:18'),
(1160, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.18', '2023-05-22 11:32:15'),
(1161, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-05-22 13:05:30'),
(1162, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.97', '2023-05-22 15:03:09'),
(1163, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.5', '2023-05-22 15:26:22'),
(1164, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.96', '2023-05-22 15:58:34'),
(1165, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.97', '2023-05-23 13:22:42'),
(1166, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.4', '2023-05-23 15:43:49'),
(1167, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.24', '2023-05-24 09:31:45'),
(1168, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.4', '2023-05-24 12:41:42'),
(1169, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-05-24 14:41:44'),
(1170, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.7', '2023-05-24 16:32:54'),
(1171, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.7', '2023-05-24 17:05:48'),
(1172, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.7', '2023-05-25 11:00:01'),
(1173, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.10', '2023-05-25 11:00:53'),
(1174, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.5', '2023-05-25 11:05:24'),
(1175, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.4', '2023-05-25 11:12:04'),
(1176, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.19', '2023-05-25 11:14:47'),
(1177, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.97', '2023-05-25 12:17:51'),
(1178, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.25', '2023-05-25 13:31:20'),
(1179, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.10', '2023-05-25 15:20:15'),
(1180, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.9', '2023-05-25 15:30:39'),
(1181, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-05-25 15:57:24'),
(1182, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.6', '2023-05-25 16:01:21'),
(1183, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-05-25 18:30:08'),
(1184, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-05-26 10:23:52'),
(1185, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.4', '2023-05-26 12:06:30'),
(1186, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.44', '2023-05-26 13:17:08'),
(1187, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-05-26 15:14:16'),
(1188, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.21', '2023-05-26 16:05:01'),
(1189, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-05-26 18:50:18'),
(1190, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.11', '2023-05-29 14:40:54'),
(1191, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-05-29 14:52:55'),
(1192, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-05-29 16:11:32'),
(1193, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-05-31 11:21:00'),
(1194, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.11', '2023-06-01 11:20:44'),
(1195, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-06-01 14:30:08'),
(1196, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.11', '2023-06-02 10:00:40'),
(1197, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-06-02 13:28:43'),
(1198, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.9', '2023-06-08 08:13:14'),
(1199, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-06-08 08:35:01'),
(1200, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.11', '2023-06-08 10:25:27'),
(1201, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.44', '2023-06-08 11:41:46'),
(1202, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.44', '2023-06-08 13:03:51'),
(1203, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.45', '2023-06-08 15:52:50'),
(1204, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-06-12 13:56:34'),
(1205, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.25', '2023-06-12 17:25:43'),
(1206, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.5', '2023-06-13 13:35:16'),
(1207, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.10', '2023-06-13 13:49:15'),
(1208, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.5', '2023-06-13 15:48:47'),
(1209, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.22', '2023-06-14 11:56:27'),
(1210, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.34', '2023-06-14 12:42:53'),
(1211, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.34', '2023-06-14 13:36:53'),
(1212, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-06-14 15:44:39'),
(1213, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.65', '2023-06-14 16:09:31'),
(1214, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.34', '2023-06-14 18:51:49'),
(1215, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.49', '2023-06-22 16:20:58'),
(1216, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.23', '2023-06-23 10:46:29'),
(1217, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.34', '2023-06-23 15:19:39'),
(1218, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.64', '2023-06-27 11:40:46'),
(1219, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.33', '2023-06-27 13:20:40'),
(1220, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.65', '2023-06-27 15:27:33'),
(1221, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.65', '2023-06-28 11:30:46'),
(1222, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.164', '2023-06-28 13:29:27'),
(1223, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.194', '2023-06-28 15:27:39'),
(1224, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.200', '2023-06-28 15:33:57'),
(1225, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.199', '2023-06-28 17:49:34'),
(1226, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.65', '2023-06-28 20:40:02'),
(1227, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.64', '2023-06-29 12:17:13'),
(1228, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.194', '2023-06-29 13:45:10'),
(1229, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.198', '2023-06-29 15:13:45'),
(1230, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.162', '2023-06-29 22:27:01'),
(1231, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.78', '2023-06-30 11:42:30'),
(1232, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.64', '2023-06-30 15:06:11'),
(1233, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.22', '2023-07-03 10:32:42'),
(1234, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.27', '2023-07-03 14:12:33'),
(1235, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.27', '2023-07-03 16:12:11'),
(1236, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-07-04 10:06:01'),
(1237, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.48', '2023-07-04 10:09:16'),
(1238, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.23', '2023-07-04 16:26:54'),
(1239, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.68', '2023-07-05 08:56:52'),
(1240, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.61', '2023-07-06 10:57:41'),
(1241, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.48', '2023-07-06 12:14:57'),
(1242, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.49', '2023-07-06 13:55:13'),
(1243, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.40', '2023-07-06 13:56:58'),
(1244, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.80', '2023-07-06 15:25:56'),
(1245, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.60', '2023-07-06 16:03:34'),
(1246, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.35', '2023-07-06 22:09:10'),
(1247, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.25', '2023-07-07 09:47:18'),
(1248, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-07-07 09:53:02'),
(1249, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.61', '2023-07-10 15:55:08'),
(1250, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.79', '2023-07-11 14:33:15'),
(1251, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.27', '2023-07-12 11:14:26'),
(1252, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.22', '2023-07-12 11:20:11'),
(1253, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-07-12 11:21:40'),
(1254, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-07-12 14:08:37'),
(1255, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.27', '2023-07-17 14:07:58'),
(1256, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.64', '2023-07-17 14:54:17'),
(1257, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.69', '2023-07-19 10:39:15'),
(1258, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.163', '2023-07-19 11:53:52'),
(1259, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.40', '2023-07-19 13:48:31'),
(1260, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.79', '2023-07-19 16:40:59'),
(1261, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.61', '2023-07-25 11:17:08'),
(1262, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.77', '2023-07-25 13:11:08'),
(1263, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.16', '2023-07-26 18:00:46'),
(1264, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.186', '2023-07-27 09:42:18'),
(1265, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.64', '2023-07-27 10:40:14'),
(1266, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.65', '2023-07-27 13:46:23'),
(1267, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.164', '2023-07-27 14:25:24'),
(1268, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.163', '2023-07-27 15:43:59'),
(1269, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.64', '2023-07-27 16:44:14'),
(1270, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.30', '2023-07-27 16:47:16'),
(1271, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '127.0.0.1', '2023-08-01 10:42:49'),
(1272, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.5', '2023-08-07 10:44:28'),
(1273, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.88', '2023-08-07 13:54:52'),
(1274, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.88', '2023-08-07 17:52:53'),
(1275, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.25', '2023-08-07 20:23:18'),
(1276, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.34', '2023-08-08 09:25:55'),
(1277, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.56', '2023-08-08 11:18:25'),
(1278, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.47', '2023-08-08 13:11:13'),
(1279, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.34', '2023-08-08 15:24:25'),
(1280, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.39', '2023-08-09 10:59:27'),
(1281, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.88', '2023-08-09 12:03:50'),
(1282, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.103', '2023-08-09 13:56:59'),
(1283, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.47', '2023-08-10 11:55:57'),
(1284, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.56', '2023-08-10 12:09:40'),
(1285, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.35', '2023-08-10 12:34:21'),
(1286, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.9', '2023-08-10 13:19:23'),
(1287, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.20', '2023-08-10 15:26:36'),
(1288, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.66', '2023-08-10 23:05:20'),
(1289, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.66', '2023-08-14 10:51:25'),
(1290, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.35', '2023-08-14 11:38:53'),
(1291, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.61', '2023-08-14 13:11:30'),
(1292, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.76', '2023-08-15 12:06:57'),
(1293, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.77', '2023-08-15 14:05:53'),
(1294, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.66', '2023-08-15 17:31:19'),
(1295, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.58', '2023-08-16 08:54:12'),
(1296, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.4', '2023-08-16 11:14:28'),
(1297, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.63', '2023-08-16 12:42:00'),
(1298, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.79', '2023-08-16 13:43:49'),
(1299, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-08-16 14:58:53'),
(1300, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.63', '2023-08-16 15:35:35'),
(1301, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.64', '2023-08-16 17:46:07'),
(1302, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.30', '2023-08-16 18:11:12'),
(1303, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.14', '2023-08-17 09:02:42'),
(1304, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-08-17 09:42:57'),
(1305, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-08-17 10:03:20'),
(1306, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.17', '2023-08-17 10:58:49'),
(1307, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.4', '2023-08-17 12:54:52'),
(1308, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.76', '2023-08-17 13:48:07'),
(1309, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.15', '2023-08-17 13:50:25'),
(1310, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.30', '2023-08-17 14:30:44'),
(1311, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.14', '2023-08-17 14:42:59'),
(1312, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.69', '2023-08-17 16:12:42'),
(1313, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-08-18 17:37:09'),
(1314, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.26', '2023-08-18 21:22:18'),
(1315, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.33', '2023-08-21 08:42:07'),
(1316, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.58', '2023-08-21 08:55:34'),
(1317, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.27', '2023-08-21 09:25:13'),
(1318, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.4', '2023-08-21 09:42:46'),
(1319, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.16', '2023-08-21 11:50:57'),
(1320, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.16', '2023-08-21 11:51:32'),
(1321, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.62', '2023-08-21 14:21:39'),
(1322, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-08-21 14:28:41'),
(1323, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.29', '2023-08-21 14:32:25'),
(1324, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.78', '2023-08-21 14:35:18'),
(1325, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.91', '2023-08-21 16:11:00'),
(1326, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.79', '2023-08-21 16:42:25'),
(1327, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.63', '2023-08-21 20:03:44'),
(1328, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.5', '2023-08-22 09:05:42'),
(1329, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.155', '2023-08-22 14:26:16'),
(1330, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.27', '2023-08-22 16:30:36'),
(1331, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.32', '2023-08-22 17:44:03'),
(1332, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-08-23 13:05:14'),
(1333, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.4', '2023-08-23 14:18:47'),
(1334, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.68', '2023-08-23 17:46:35'),
(1335, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.26', '2023-08-24 12:50:18'),
(1336, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.193', '2023-08-24 13:42:07'),
(1337, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.26', '2023-08-24 15:14:02'),
(1338, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.69', '2023-08-25 12:57:02'),
(1339, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-08-28 09:56:03'),
(1340, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.73', '2023-08-28 11:39:03'),
(1341, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.58', '2023-08-28 15:39:52'),
(1342, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.65', '2023-08-29 12:05:01'),
(1343, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.68', '2023-08-29 12:57:06'),
(1344, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.90', '2023-08-29 14:10:17'),
(1345, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.91', '2023-08-29 14:43:51'),
(1346, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.58', '2023-08-30 07:50:24'),
(1347, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.5', '2023-08-30 09:43:39'),
(1348, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.4', '2023-08-30 11:29:20'),
(1349, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.63', '2023-08-30 14:01:57'),
(1350, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.15', '2023-08-30 14:11:19'),
(1351, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.76', '2023-08-30 14:31:43'),
(1352, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.40', '2023-08-30 15:49:30'),
(1353, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.52', '2023-08-31 11:44:36'),
(1354, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.26', '2023-08-31 14:58:15'),
(1355, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.32', '2023-09-04 10:31:27'),
(1356, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.17', '2023-09-04 13:37:43'),
(1357, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.17', '2023-09-04 13:39:54'),
(1358, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.16', '2023-09-04 16:28:23'),
(1359, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.53', '2023-09-05 13:40:57'),
(1360, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.16', '2023-09-05 18:44:03'),
(1361, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.43', '2023-09-05 20:26:24'),
(1362, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.27', '2023-09-08 14:19:49'),
(1363, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.131', '2023-09-11 09:53:21'),
(1364, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.93', '2023-09-12 10:29:57'),
(1365, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.27', '2023-09-12 17:39:59'),
(1366, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.26', '2023-09-13 11:32:34'),
(1367, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.53', '2023-09-13 12:45:23'),
(1368, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.27', '2023-09-13 13:12:14'),
(1369, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.6', '2023-09-13 16:25:29'),
(1370, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.5', '2023-09-13 17:22:14'),
(1371, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.44', '2023-09-14 11:17:49'),
(1372, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.5', '2023-09-14 17:04:56'),
(1373, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.4', '2023-09-15 09:50:42'),
(1374, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.27', '2023-09-15 17:01:10'),
(1375, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.145', '2023-09-18 09:05:56'),
(1376, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.130', '2023-09-18 11:26:05'),
(1377, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.5', '2023-09-18 15:33:04'),
(1378, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.130', '2023-09-18 16:32:28'),
(1379, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.26', '2023-09-19 11:06:55'),
(1380, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.119', '2023-09-19 13:54:05'),
(1381, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.27', '2023-09-19 16:52:31'),
(1382, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-09-20 08:45:26'),
(1383, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.131', '2023-09-20 10:28:46'),
(1384, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.118', '2023-09-20 11:58:19'),
(1385, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-09-20 14:28:17'),
(1386, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.130', '2023-09-20 14:50:43'),
(1387, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.118', '2023-09-20 16:15:45'),
(1388, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.238.59', '2023-09-20 16:42:47'),
(1389, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.61', '2023-09-21 11:05:41'),
(1390, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.11', '2023-09-21 16:59:26'),
(1391, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.149', '2023-09-25 10:56:03'),
(1392, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.27', '2023-09-25 14:19:55'),
(1393, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.51', '2023-09-25 15:09:10'),
(1394, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.25', '2023-09-25 15:25:13'),
(1395, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.26', '2023-09-25 15:57:58'),
(1396, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.177', '2023-09-25 16:39:17'),
(1397, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.160', '2023-09-26 08:55:15'),
(1398, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.148', '2023-09-26 10:27:57'),
(1399, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.149', '2023-09-26 11:39:39'),
(1400, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.185', '2023-09-26 12:18:33'),
(1401, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.176', '2023-09-26 14:01:32'),
(1402, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.148', '2023-09-26 14:13:11'),
(1403, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.31', '2023-09-26 16:13:39'),
(1404, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.160', '2023-09-27 08:56:52'),
(1405, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.160', '2023-09-27 09:58:02'),
(1406, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.176', '2023-09-27 10:17:22'),
(1407, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.161', '2023-09-27 11:40:02'),
(1408, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.176', '2023-09-27 13:10:27'),
(1409, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.177', '2023-09-27 14:41:31'),
(1410, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.161', '2023-09-27 17:09:31'),
(1411, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.161', '2023-09-28 11:09:57'),
(1412, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.93', '2023-09-28 11:22:52'),
(1413, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.160', '2023-09-28 12:36:56'),
(1414, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.185', '2023-09-29 09:39:52'),
(1415, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.149', '2023-10-02 15:39:58'),
(1416, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.93', '2023-10-02 16:46:26'),
(1417, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.53', '2023-10-02 18:06:55'),
(1418, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.37', '2023-10-03 10:05:44'),
(1419, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.84.142', '2023-10-03 13:58:48'),
(1420, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.27', '2023-10-03 18:00:25'),
(1421, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.28', '2023-10-03 18:51:31'),
(1422, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.48', '2023-10-03 19:44:47'),
(1423, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.177', '2023-10-04 12:32:27'),
(1424, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.177', '2023-10-04 12:45:50'),
(1425, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.73', '2023-10-05 12:17:09'),
(1426, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.52', '2023-10-05 13:38:38'),
(1427, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.30', '2023-10-05 15:11:20'),
(1428, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.52', '2023-10-05 16:03:53'),
(1429, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.185', '2023-10-06 12:32:54'),
(1430, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.60', '2023-10-09 08:49:21'),
(1431, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.149', '2023-10-09 11:11:23'),
(1432, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.49', '2023-10-10 10:06:33'),
(1433, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.58', '2023-10-10 12:44:39'),
(1434, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.31', '2023-10-10 14:56:23'),
(1435, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.146', '2023-10-10 16:51:09'),
(1436, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-10-11 12:15:37'),
(1437, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.141', '2023-10-11 15:01:02'),
(1438, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.141', '2023-10-12 09:09:18'),
(1439, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.146.91', '2023-10-12 14:44:16'),
(1440, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.192', '2023-10-12 15:09:28'),
(1441, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.192', '2023-10-16 09:59:45'),
(1442, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.66.41', '2023-10-17 11:37:36'),
(1443, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.5', '2023-10-17 13:50:46'),
(1444, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.140', '2023-10-19 13:29:46'),
(1445, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.141', '2023-10-20 09:03:15'),
(1446, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.67', '2023-10-25 12:16:06'),
(1447, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.140', '2023-10-27 19:54:50'),
(1448, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.83', '2023-11-02 14:21:34'),
(1449, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.61', '2023-11-06 15:31:58'),
(1450, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.151', '2023-11-07 13:12:59'),
(1451, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.82', '2023-11-09 13:11:30'),
(1452, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.61', '2023-11-13 10:04:26'),
(1453, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.170', '2023-11-13 12:41:30'),
(1454, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.170', '2023-11-13 12:59:28'),
(1455, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.164', '2023-11-13 14:16:07'),
(1456, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.168', '2023-11-13 15:07:31'),
(1457, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.229.48', '2023-11-13 15:39:34'),
(1458, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.229.49', '2023-11-13 15:40:27'),
(1459, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.229.48', '2023-11-13 15:47:07'),
(1460, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.229.48', '2023-11-13 15:47:17'),
(1461, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e31323132, 'N', '172.68.210.67', '2023-11-13 16:17:14'),
(1462, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e31323132, 'N', '172.68.210.90', '2023-11-13 16:18:08'),
(1463, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e3332333234, 'N', '172.68.210.91', '2023-11-13 16:18:25'),
(1464, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.90', '2023-11-13 16:18:37');
INSERT INTO `cms_login_attempt` (`id`, `username`, `access_key`, `is_successful`, `ip_address`, `record_date`) VALUES
(1465, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.181', '2023-11-14 08:54:50'),
(1466, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.62.102', '2023-11-16 11:57:51'),
(1467, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2023-11-20 08:34:37'),
(1468, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2023-11-20 17:59:48'),
(1469, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.152', '2023-11-21 12:14:24'),
(1470, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2023-11-22 12:03:07'),
(1471, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.217', '2023-11-23 14:31:46'),
(1472, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.172', '2023-12-12 10:35:12'),
(1473, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.172', '2023-12-13 15:28:38'),
(1474, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.172', '2023-12-14 08:51:45'),
(1475, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2023-12-14 10:34:01'),
(1476, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.173', '2023-12-15 08:38:59'),
(1477, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.151', '2023-12-15 10:29:22'),
(1478, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2024-01-12 14:26:03'),
(1479, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.153', '2024-01-16 14:41:40'),
(1480, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2024-01-17 11:58:27'),
(1481, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.130', '2024-01-18 08:23:23'),
(1482, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.152', '2024-01-18 11:55:20'),
(1483, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.152', '2024-01-18 13:15:59'),
(1484, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.131', '2024-01-19 10:35:25'),
(1485, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.153', '2024-01-19 15:10:47'),
(1486, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.152', '2024-01-26 12:16:23'),
(1487, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.153', '2024-02-02 14:06:51'),
(1488, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.131', '2024-02-09 15:57:55'),
(1489, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.153', '2024-02-15 09:56:49'),
(1490, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.156', '2024-02-15 10:27:23'),
(1491, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.29', '2024-02-16 10:09:08'),
(1492, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.172', '2024-02-16 13:44:39'),
(1493, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.131', '2024-03-01 12:04:01'),
(1494, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.88', '2024-04-04 14:28:26'),
(1495, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.194', '2024-04-12 07:55:21'),
(1496, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.227', '2024-04-12 13:18:36'),
(1497, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.156', '2024-04-24 11:25:08'),
(1498, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.159', '2024-04-29 09:21:05'),
(1499, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.186', '2024-05-01 12:13:52'),
(1500, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-05-06 10:48:59'),
(1501, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-05-28 12:24:55'),
(1502, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.186', '2024-05-31 16:01:45'),
(1503, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.158', '2024-06-10 14:55:42'),
(1504, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.140', '2024-06-18 10:12:23'),
(1505, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.141', '2024-06-18 10:45:58'),
(1506, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.146', '2024-06-26 15:28:28'),
(1507, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.156', '2024-07-01 13:58:07'),
(1508, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.66', '2024-07-01 14:43:42'),
(1509, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.156', '2024-07-01 15:47:22'),
(1510, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.157', '2024-07-05 11:01:20'),
(1511, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.147', '2024-07-09 13:09:19'),
(1512, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.141', '2024-07-11 09:25:09'),
(1513, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.154', '2024-07-12 23:46:05'),
(1514, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.157', '2024-07-15 12:29:03'),
(1515, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.186', '2024-07-15 12:42:28'),
(1516, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.158', '2024-07-15 15:06:05'),
(1517, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.187', '2024-07-16 14:19:41'),
(1518, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.89', '2024-07-16 16:20:43'),
(1519, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.156', '2024-07-17 09:35:50'),
(1520, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-07-17 12:00:51'),
(1521, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.147', '2024-07-17 12:57:51'),
(1522, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.140', '2024-07-22 10:46:09'),
(1523, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.21', '2024-07-24 11:13:18'),
(1524, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.192.173', '2024-07-25 19:25:59'),
(1525, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-07-26 09:52:31'),
(1526, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.140', '2024-07-26 10:24:47'),
(1527, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.157', '2024-07-26 15:37:14'),
(1528, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.192.178', '2024-07-26 23:25:52'),
(1529, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.192.132', '2024-07-29 19:58:33'),
(1530, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.188', '2024-08-08 14:51:31'),
(1531, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x54306d616834776b, 'N', '172.68.64.187', '2024-08-16 09:24:09'),
(1532, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x54306d616834776b21, 'N', '172.68.64.156', '2024-08-16 09:24:53'),
(1533, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x54306d616834776b21, 'N', '172.68.64.157', '2024-08-16 09:25:46'),
(1534, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-08-16 09:26:49'),
(1535, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.157', '2024-08-16 12:23:15'),
(1536, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.234.167', '2024-08-16 13:41:38'),
(1537, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.186', '2024-08-16 13:57:07'),
(1538, 0x696e73706972657468656d6540746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.68.144.146', '2024-08-16 14:46:47'),
(1539, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.159', '2024-08-16 14:48:06'),
(1540, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.173', '2024-08-16 14:55:15'),
(1541, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.173', '2024-08-16 14:55:34'),
(1542, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.173', '2024-08-22 12:46:53'),
(1543, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.156', '2024-08-23 08:56:30'),
(1544, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.250.175', '2024-08-23 10:30:43'),
(1545, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.187', '2024-08-23 12:17:51'),
(1546, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.68.64.158', '2024-08-26 11:37:50'),
(1547, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.68.64.158', '2024-08-26 11:37:59'),
(1548, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-08-26 11:38:11'),
(1549, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.68.64.158', '2024-08-28 09:05:32'),
(1550, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-08-28 09:05:41'),
(1551, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.66', '2024-08-29 08:53:40'),
(1552, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.137', '2024-09-03 12:43:47'),
(1553, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.2.52', '2024-09-03 14:07:40'),
(1554, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.170.79', '2024-09-03 18:36:50'),
(1555, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.173', '2024-09-05 12:56:59'),
(1556, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.53', '2024-09-05 13:45:54'),
(1557, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.52', '2024-09-05 13:47:01'),
(1558, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.62', '2024-09-06 12:00:02'),
(1559, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.53', '2024-09-09 08:38:14'),
(1560, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.210.53', '2024-09-09 08:38:18'),
(1561, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.216', '2024-09-10 13:55:21'),
(1562, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '108.162.249.5', '2024-09-17 13:57:37'),
(1563, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.68.144.234', '2024-09-17 14:06:13'),
(1564, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.234', '2024-09-17 14:06:23'),
(1565, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '198.41.236.150', '2024-09-18 09:48:09'),
(1566, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.69.0.146', '2024-09-18 09:49:00'),
(1567, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.147', '2024-09-18 09:49:21'),
(1568, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6758446b47654e4466483556, 'N', '172.69.0.147', '2024-09-18 13:38:48'),
(1569, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.147', '2024-09-18 13:39:16'),
(1570, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.192', '2024-09-23 11:23:55'),
(1571, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.177', '2024-09-24 11:32:01'),
(1572, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.146', '2024-09-25 09:53:22'),
(1573, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.154', '2024-09-25 12:34:59'),
(1574, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.192', '2024-09-27 09:26:27'),
(1575, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.176', '2024-10-02 12:31:35'),
(1576, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.144.235', '2024-10-08 14:10:29'),
(1577, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.71.167.49', '2024-10-09 08:33:48'),
(1578, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.71.122.22', '2024-10-09 08:45:50'),
(1579, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.146', '2024-10-09 10:43:21'),
(1580, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.60.207', '2024-10-10 00:51:21'),
(1581, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.111.155', '2024-10-10 02:06:49'),
(1582, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.71.211.50', '2024-10-10 07:21:38'),
(1583, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.159', '2024-10-10 11:44:27'),
(1584, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.150', '2024-10-10 13:26:32'),
(1585, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.64.157', '2024-10-10 15:34:38'),
(1586, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.140', '2024-10-15 10:39:44'),
(1587, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.140', '2024-10-15 12:03:26'),
(1588, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.138', '2024-10-15 13:00:19'),
(1589, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.182', '2024-10-17 11:26:16'),
(1590, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.183', '2024-10-17 11:44:12'),
(1591, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x74306d616834776b, 'N', '198.41.236.131', '2024-10-25 10:39:38'),
(1592, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696e6d, 'N', '198.41.236.130', '2024-10-25 10:40:03'),
(1593, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.130', '2024-10-25 10:40:22'),
(1594, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.131', '2024-11-18 10:07:36'),
(1595, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.162', '2024-11-20 12:53:51'),
(1596, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.153', '2024-11-21 08:59:12'),
(1597, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.164', '2025-01-08 15:01:42'),
(1598, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.69.0.153', '2025-01-20 13:06:52'),
(1599, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.131', '2025-01-23 11:22:50'),
(1600, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '198.41.236.131', '2025-01-24 14:58:03'),
(1601, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '162.158.168.148', '2025-02-12 10:43:43'),
(1602, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '104.23.198.100', '2026-01-12 12:49:12'),
(1603, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '104.23.198.101', '2026-01-13 11:26:48'),
(1604, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '104.23.198.101', '2026-01-13 12:10:54'),
(1605, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696ec2a0, 'N', '172.69.176.33', '2026-01-13 12:45:11'),
(1606, 0x737570706f727440746f6d616861776b2e636f2e6e7a, 0x6d30756e7461696ec2a0, 'N', '172.69.176.33', '2026-01-13 12:45:39'),
(1607, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '172.68.164.100', '2026-01-13 12:54:39'),
(1608, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '104.23.198.100', '2026-01-14 11:12:53'),
(1609, 0x737570706f727440746f6d616861776b2e636f2e6e7a, '', 'Y', '::1', '2026-01-23 09:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `cmsset_id` int(11) NOT NULL,
  `cmsset_name` varchar(100) NOT NULL,
  `cmsset_label` varchar(50) NOT NULL,
  `cmsset_explanation` varchar(255) NOT NULL,
  `cmsset_status` char(1) NOT NULL DEFAULT 'I',
  `cmsset_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`cmsset_id`, `cmsset_name`, `cmsset_label`, `cmsset_explanation`, `cmsset_status`, `cmsset_value`) VALUES
(2, 'pages_generations', 'Page Generation Limit', 'The number of levels of children pages that are allowed to be made.', 'A', '2'),
(10, 'pages_maximum', 'Page Limit', '', 'I', '12');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `user_id` int(11) NOT NULL COMMENT 'Primary key for user',
  `user_fname` varchar(45) NOT NULL COMMENT 'User''s firstname',
  `user_lname` varchar(45) DEFAULT NULL COMMENT 'User''s lastname',
  `user_pass` varchar(255) DEFAULT NULL COMMENT 'User''s password (recommended as being sha256)',
  `user_email` varchar(100) DEFAULT NULL COMMENT 'User''s email address',
  `last_login_date` datetime DEFAULT NULL,
  `access_id` int(11) DEFAULT 1 COMMENT 'User''s rights - whether they are admin, banned, general user etc. This is totally customisable and is up to the programmer.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `user_fname`, `user_lname`, `user_pass`, `user_email`, `last_login_date`, `access_id`) VALUES
(1, 'Tomahawk', 'Support', '9bc129f7a46381be15f1329c4479e02c70d10d19', 'support@tomahawk.co.nz', '2026-01-23 09:38:11', 1),
(25, 'New User', 'asd', '9bc129f7a46381be15f1329c4479e02c70d10d19', 'daniyar@tomahawk.co.nz', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_column`
--

CREATE TABLE `content_column` (
  `content` mediumtext NOT NULL,
  `css_class` varchar(255) NOT NULL,
  `span` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `content_row_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `content_column`
--

INSERT INTO `content_column` (`content`, `css_class`, `span`, `rank`, `content_row_id`) VALUES
('<p>Donec a est vitae quam dapibus lobortis. Maecenas imperdiet at risus ac consequat. Curabitur euismod elit nec erat viverra, ut facilisis elit varius. Praesent quis hendrerit diam. Ut commodo dui nec porta suscipit. Maecenas tempus feugiat purus, eget sagittis justo. Vestibulum sit amet lacus dolor. Integer aliquam neque nec neque dapibus efficitur. Vivamus tincidunt tellus ac arcu condimentum, a congue nunc tincidunt. Etiam id metus justo. Morbi auctor neque elit.</p>', 'col-xs-12 col-12', NULL, 1, 17),
('<p>Mauris a nulla lectus. Sed ut erat ut ex lacinia molestie. Aenean sed pulvinar leo. Nam pharetra aliquet urna, lacinia ultricies enim molestie vitae. Etiam vel ante eget diam consequat posuere. Aliquam est est, maximus vitae feugiat in, malesuada et nibh. Aenean sapien enim, sagittis et velit ut, aliquam pellentesque lectus</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 18),
('<p>Quisque velit lorem, ullamcorper eget nulla nec, rhoncus imperdiet purus. Nulla eget finibus mauris. Cras vitae neque tempus, ultricies enim ac, sollicitudin mi. Phasellus egestas velit lectus, ultrices mattis quam gravida quis. Curabitur tempus tincidunt augue non aliquam.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 18),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 121),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 122),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 123),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 125),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 126),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 127),
('<p>Column 1</p>', 'col-xs-12 col-12', NULL, 1, 360),
('<p>Column 1</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 361),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 361),
('<p>Column 1</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 1, 362),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 2, 362),
('<p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 3, 362),
('', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 1, 363),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 2, 363),
('<p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 3, 363),
('<p>Column 4</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 4, 363),
('<p>Column 1</p>', 'col-xs-12 col-12', NULL, 1, 380),
('<p>Column 1</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 381),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 381),
('<p>Column 1</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 1, 382),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 2, 382),
('<p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 3, 382),
('', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 1, 383),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 2, 383),
('<p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 3, 383),
('<p>Column 4</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 4, 383),
('<p>Praesent semper, metus id mollis bibendum, elit est tincidunt enim, sollicitudin mattis nisl ex nec diam. Nam dapibus ligula tincidunt consectetur vestibulum. Nulla quis erat aliquet mi venenatis varius non nec ipsum. Integer elementum vitae nisi id volutpat. Maecenas ullamcorper facilisis neque quis gravida. Cras ipsum nulla, imperdiet id orci id, dapibus congue mi. Nullam mollis nunc sit amet laoreet sodales.&nbsp;</p>', 'col-xs-12 col-12', NULL, 1, 493),
('<p>Phasellus vulputate mauris non ex imperdiet suscipit. Praesent laoreet enim vitae nisl tempus, quis faucibus diam dignissim. Donec vel magna lacus.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 494),
('<p>Fusce cursus accumsan nibh, nec lacinia est consequat eu. Ut facilisis id nunc a euismod. Sed massa magna, sagittis id vehicula quis, egestas in magna.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 494),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12', NULL, 1, 530),
('<h2><i><s><strong><u>Te</u></strong></s></i>xt<br>H2</h2><h3>H3</h3><h4>H4</h4><h5>H5</h5><h6>H6</h6><p><a href=\"justalink.com\">Link</a></p><div class=\"content-button\"><a href=\"http://www.whatthefuckshouldimakefordinner.com\" target=\"_blank\" rel=\"noopener noreferrer\">Button</a></div><p>Blah</p><blockquote><p>Blahblah</p></blockquote><p>blah</p><p>&nbsp;</p><div class=\"content-button\"><a href=\"/library/files/pdf-test/dummy.pdf\">File Link</a></div><figure class=\"image\"><img src=\"/library/images/balis-best-restaurants.jpg\"></figure>', 'col-xs-12 col-12', NULL, 1, 922),
('<figure class=\"image\"><img src=\"/library/images/balis-best-restaurants.jpg\"></figure>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 923),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 923),
('<figure class=\"image\"><img src=\"/library/images/balis-best-restaurants.jpg\"></figure>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 1, 924),
('<p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 2, 924),
('<p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 3, 924),
('<figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>blah</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>blahblahblahblahblahblahblahblah</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', 'col-xs-12 col-12', NULL, 1, 925),
('<figure class=\"image\"><img src=\"/library/images/balis-best-restaurants.jpg\"><figcaption>Caption</figcaption></figure>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 1, 926),
('<p>Column 4</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 2, 926),
('<p>Column 2</p><p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 3, 926),
('Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column <figure class=\"image\"><img src=\"/library/images/cape-kidnappers_evening-shot-b3unt.jpg\"></figure>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 973),
('Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column Column <figure class=\"image\"><img src=\"/library/images/cape-kidnappers_evening-shot-b3unt.jpg\"></figure>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 973),
('Column <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate .</p>', 'col-xs-12 col-12', NULL, 1, 1494),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1545),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1545),
('<p>Integer pharetra tellus ut posuere porta. Vestibulum euismod eget sem fermentum venenatis. Mauris elementum aliquet orci id convallis. Quisque finibus lectus eu libero posuere sollicitudin.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1550),
('<p>Integer pharetra tellus ut posuere porta. Vestibulum euismod eget sem fermentum venenatis. Mauris elementum aliquet orci id convallis. Quisque finibus lectus eu libero posuere sollicitudin.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1550),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p><p> </p><p> </p>', 'col-xs-12 col-12', NULL, 1, 1728),
('<div class=\"container bg-lightgrey\"><div class=\"row align-items-center mb-4\"><div class=\"col-12 col-lg-3 p-0\"><div class=\"img-fluid tile-image\"><img src=\"/library/images/Team/team-1.jpg\" alt=\"Paul\"></div></div><div class=\"col-12 col-lg-9 p-4 pl-lg-5 pl-2\"><h3 class=\"text-left\">Paul Anderson</h3><p class=\"main__content-intro\">General Manager</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p></div></div></div>', 'col-xs-12 col-12', NULL, 1, 1729),
('<div class=\"container bg-lightgrey tile-right\"><div class=\"row align-items-center mb-4\"><div class=\"col-12 col-lg-9 p-4 pl-lg-5 pl-2 order-lg-1 order-2\"><h3 class=\"text-left\">Beula Sommers</h3><p class=\"main__content-intro\">Restuarant Manager</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequa</p></div><div class=\"col-12 col-lg-3 p-0 order-lg-2 order-1\"><div class=\"img-fluid tile-image\"><img src=\"/library/images/Team/xteam-2.jpg.pagespeed.ic.SmUQA4LE_q.webp\" alt=\"Beula\" data-pagespeed-url-hash=\"2496375597\"></div></div></div></div>', 'col-xs-12 col-12', NULL, 1, 1730),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1731),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1731),
('<div class=\"container bg-lightgrey\"><div class=\"row align-items-center\"><div class=\"col-12 col-lg-6 p-0\"><div class=\"img-fluid cover-image\"><img src=\"/library/images/Quicklinks/cover-wedding-700x450.jpg\"></div></div><div class=\"col-12 col-lg-6 text-center p-4 p-lg-0\"><h3 class=\"ql-cover__heading\">Wedding</h3><p class=\"ql-cover__text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p><p><a class=\"btn btn-primary\" href=\"/occasions/weddings\">Find Out More<span contenteditable=\"false\"> <svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></svg></span></a></p></div></div></div>', 'col-xs-12 col-12', NULL, 1, 1732),
('<div class=\"container bg-lightgrey cover-right\"><div class=\"row align-items-center\"><div class=\"col-12 col-lg-6 text-center p-4 p-lg-0 order-lg-1 order-2\"><h3 class=\"ql-cover__heading\">Conferences</h3><p class=\"ql-cover__text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p><p><a class=\"btn btn-primary\" href=\"/contact-us\">Contact Us<span contenteditable=\"false\">&nbsp;<svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></svg></span></a></p></div><div class=\"col-12 col-lg-6 p-0 order-lg-2 order-1\"><div class=\"img-fluid cover-image\"><img src=\"/library/images/Quicklinks/xxcover-conference-700x450.jpg,Mic.NYEhMro-QK.webp.pagespeed.ic.4pXaQwzmCt.webp\" data-pagespeed-url-hash=\"2933569519\"></div></div></div></div>', 'col-xs-12 col-12', NULL, 1, 1733),
('<div class=\"container bg-lightgrey\"><div class=\"row align-items-center\"><div class=\"col-12 col-lg-6 p-0\"><div class=\"img-fluid cover-image\"><img src=\"/library/images/Quicklinks/xcover-birthday-700x450.jpg.pagespeed.ic.ik5F70RKHE.webp\" data-pagespeed-url-hash=\"1476431444\"></div></div><div class=\"col-12 col-lg-6 text-center p-4 p-lg-0\"><h3 class=\"ql-cover__heading\">Birthdays & Events</h3><p class=\"ql-cover__text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><p><a class=\"btn btn-primary\" href=\"/contact-us\">Contact Us<span contenteditable=\"false\"> <svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></svg></span></a></p></div></div></div>', 'col-xs-12 col-12', NULL, 1, 1734),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1735),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1735),
('<p>Primary button</p><p> </p><p><a class=\"btn btn-primary\" href=\"#\">Primary Button<span contenteditable=\"false\"><svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#fff\"></path></svg></span></a></p><p> </p><p>Sesondary</p><p><a class=\"btn inspireButtonSecondary\" href=\"#\">Scondary Button<span contenteditable=\"false\"><svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></svg></span></a></p>', 'col-xs-12 col-12', NULL, 1, 1768),
('', 'col-xs-12 col-12', NULL, 1, 1769),
('<h5 style=\"text-align:center;\"><span class=\"text-big\"><strong>Open Daily From 9:00 Am To 10:00 Pm</strong></span></h5><p style=\"text-align:center;\"> </p>', 'col-xs-12 col-12', NULL, 1, 1785),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p><p> </p><p style=\"text-align:right;\"><a class=\"btn btn-primary\" href=\"href=\" https:=\"\">Book Now<span contenteditable=\"false\"><svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#fff\"></path></svg></span></a></p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1786),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p><p> </p><p><a class=\"btn inspireButtonSecondary\" href=\"/library/files/menu.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Download Menu<span contenteditable=\"false\"><svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></svg></span></a></p><p> </p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1786),
('<h2>Heading 2</h2><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p><a href=\"link here\" target=\"_blank\" rel=\"noopener noreferrer\">Lets make a link here </a>ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p style=\"margin-left:1em;\"><i>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</i></p><p> </p><h3>Heading 3</h3><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. </p><blockquote><p>Block quote cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p></blockquote><p><strong>Bulleted list</strong></p><ul><li>Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. </li><li>Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. </li><li>Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec. <br> </li></ul><p><a href=\"link here\" target=\"_blank\" rel=\"noopener noreferrer\">Lets make a link here </a>mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p><strong>Numberrdd list</strong></p><ol><li>Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. </li><li>Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. </li><li>Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</li></ol><p> </p><p> </p><h4>Heading 4</h4><p><img class=\"image-style-align-left\" src=\"/library/images/Quicklinks/xxgrounds-autumn-450x550.jpg,Mic.URa3fh66Wx.webp.pagespeed.ic.ivbWEmcF54.webp\" alt=\"alt here\" data-pagespeed-url-hash=\"2505645853\">Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p> </p><h5>Heading 5</h5><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><h6>Heading 6</h6><p><img class=\"image-style-align-right\" src=\"/library/images/Quicklinks/xxgrounds-autumn-450x550.jpg,Mic.URa3fh66Wx.webp.pagespeed.ic.ivbWEmcF54.webp\" alt=\"jhjg\" data-pagespeed-url-hash=\"2505645853\">Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p>Donec ac magna ac quam mattis efficitur quis a massa. Suspendisse iaculis felis in velit pulvinar, eu tempus nunc bibendum. Ut congue nisi felis, at imperdiet sapien lobortis et. Nunc quis tortor ligula. Sed commodo urna risus, sed vestibulum velit bibendum ut. Suspendisse potenti. Phasellus cursus sem a nunc lacinia, at ultricies velit ultricies. Donec mollis commodo lorem eget posuere. Nam sodales nisl purus, a sollicitudin urna congue nec.</p><p> </p>', 'col-xs-12 col-12', NULL, 1, 1801),
('Column <p>Column Column</p><p>Column 1</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1802),
('Column <p>Column Column</p><p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1802),
('Column <p>Column Column</p><p>Column 1</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 1, 1803),
('Column <p>Column Column</p><p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 2, 1803),
('Column <p>Column Column</p><p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-4', NULL, 3, 1803),
('Column <p>Column Column</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 1, 1804),
('Column <p>Column Column</p><p>Column 2</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 2, 1804),
('Column <p>Column Column</p><p>Column 3</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 3, 1804),
('Column <p>Column Column</p><p>Column 4</p>', 'col-xs-12 col-12 col-sm-6 col-md-3', NULL, 4, 1804),
('Column <p>Column Column</p><h2>Heading 2</h2><h3>Heading 3</h3><h4>Heading 4</h4><h5>Heading 5</h5><h6>Heading 6</h6><div class=\"content-div\">Stuff</div><address>Address</address>', 'col-xs-12 col-12', NULL, 1, 1805),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br> </p><blockquote><p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris.</p></blockquote>', 'col-xs-12 col-12', NULL, 1, 1815),
('<div class=\"container bg-lightgrey\"><div class=\"row align-items-center\"><div class=\"col-12 col-lg-6 p-0\"><div class=\"img-fluid cover-image\"><img src=\"/library/images/Team/team-700x450.jpg\" alt=\"Team photo\"></div></div><div class=\"col-12 col-lg-6 text-center p-4 p-lg-0\"><h3 class=\"ql-cover__heading\">Our Team</h3><p class=\"ql-cover__text\">Proin in finibus odio. Nam erat erat, eleifend vitae dictum nec, laoreet nec tortor. Nunc eget lectus odio. Duis porta finibus nisl, in viverra tellus aliquet non.</p><p><a class=\"btn btn-primary\" href=\"/about-us/team\">Read More<span contenteditable=\"false\"> <svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></svg></span></a></p></div></div></div>', 'col-xs-12 col-12', NULL, 1, 1816),
('<p style=\"text-align:center;\"><a class=\"btn inspireButtonSecondary\" href=\"/accommodation\">Find out more<span class=\"btn-arrow-icon\" contenteditable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewbox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#11BBB4\"></path></span></a></p>', 'col-xs-12 col-12', NULL, 1, 1824),
('<p>Sed a consequat justo. Integer tellus lorem, bibendum et tristique faucibus, pulvinar et ante. Quisque consequat sagittis ante quis consequat. Integer eu tellus aliquet, sodales</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1827),
('<p>Sed a consequat justo. Integer tellus lorem, bibendum et tristique faucibus, pulvinar et ante. Quisque consequat sagittis ante quis consequat. Integer eu tellus aliquet, sodales</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1827),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1829),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1829),
('<p>Lorem ipsum dolor sit amet, in nam denique suavitate repudiandae, homero dictas omnesque duo et. Novum dignissim consectetuer ei mel. Ne patrioque consequat persequeris...</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1831),
('<p>Lorem ipsum dolor sit amet, in nam denique suavitate repudiandae, homero dictas omnesque duo et. Novum dignissim consectetuer ei mel. Ne patrioque consequat persequeris...</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1831),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1832),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1832),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1835),
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1835),
('<p style=\"text-align:center;\"><a class=\"btn btn-primary\" target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.booking.com\">Book Now<span contenteditable=\"false\"><svg class=\"btn-arrow-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"17.88\" height=\"11.88\" viewBox=\"0 0 29.117 29.117\"><path id=\"arrow_forward_FILL0_wght400_GRAD0_opsz48\" d=\"M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z\" transform=\"translate(-160 -256)\" fill=\"#fff\"></path></svg></span></a></p>', 'col-xs-12 col-12', NULL, 1, 1836),
('<p>Curabitur auctor vitae ante elementum laoreet. Donec ut ex ac nibh cursus tempor. Mauris tempor consequat odio ac hendrerit. Donec sit amet lectus fermentum, volutpat enim non, blandit risus.</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1838),
('<p>Looking for less? Wellness is high on the agenda at many resorts and day spas. Relax and get pampered on almost any budget. Hideaway in a private villa, retreat to regional Bali, indulge in room service, or live the high life with butler service – the choice is yours! The ever popular Waterbom park is on many travellers’ to-do lists. The Bali institution spans 3.8 hectares, just south of Kuta and is home to an array of pools, water-slides and dining outlets. Suits families with kids and the young at heart!</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1838),
('<p>Sed a consequat justo. Integer tellus lorem, bibendum et tristique faucibus, pulvinar et ante. Quisque consequat sagittis ante quis consequat. Integer eu tellus aliquet, sodales</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 1, 1839),
('<p>Sed a consequat justo. Integer tellus lorem, bibendum et tristique faucibus, pulvinar et ante. Quisque consequat sagittis ante quis consequat. Integer eu tellus aliquet, sodales</p>', 'col-xs-12 col-12 col-sm-6 col-md-6', NULL, 2, 1839);

-- --------------------------------------------------------

--
-- Table structure for table `content_row`
--

CREATE TABLE `content_row` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

--
-- Dumping data for table `content_row`
--

INSERT INTO `content_row` (`id`, `rank`, `page_meta_data_id`) VALUES
(17, 1, 28),
(18, 2, 28),
(121, 1, 80),
(122, 1, 81),
(123, 1, 82),
(125, 1, 84),
(126, 1, 85),
(127, 1, 86),
(360, 1, 98),
(361, 2, 98),
(362, 3, 98),
(363, 4, 98),
(380, 1, 99),
(381, 2, 99),
(382, 3, 99),
(383, 4, 99),
(493, 1, 40),
(494, 2, 40),
(530, 1, 83),
(922, 1, 109),
(923, 2, 109),
(924, 3, 109),
(925, 4, 109),
(926, 5, 109),
(973, 1, 119),
(1494, 1, 42),
(1545, 1, 126),
(1550, 1, 8),
(1728, 1, 125),
(1729, 4, 125),
(1730, 5, 125),
(1731, 1, 123),
(1732, 2, 123),
(1733, 3, 123),
(1734, 4, 123),
(1735, 1, 41),
(1768, 1, 127),
(1769, 1, 131),
(1785, 1, 124),
(1786, 3, 124),
(1801, 1, 95),
(1802, 2, 95),
(1803, 3, 95),
(1804, 4, 95),
(1805, 5, 95),
(1815, 1, 4),
(1816, 2, 4),
(1824, 4, 1),
(1827, 1, 16),
(1829, 1, 17),
(1831, 1, 111),
(1832, 1, 2),
(1835, 1, 38),
(1836, 2, 38),
(1838, 2, 15),
(1839, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('A','H','D') NOT NULL DEFAULT 'H',
  `date_of_enquiry` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `first_name`, `last_name`, `email_address`, `contact_number`, `subject`, `comments`, `status`, `date_of_enquiry`, `ip_address`) VALUES
(1, 'Chrome', 'Test', 'alan@tomahawk.co.nz', '1234', 'Test Subject', 'Test. Please ignore.', 'D', '2019-11-17 21:13:28', '114.23.241.67'),
(2, 'John', 'Doe', 'louie@tomahawk.co.nz', '2222222', 'This is a test', 'test', 'D', '2019-11-19 19:09:23', '114.23.241.67'),
(3, 'John', 'Doe', 'louie@tomahawk.co.nz', '2222222', 'Test', 'terst', 'D', '2019-11-19 19:13:15', '114.23.241.67'),
(4, 'John', 'Doe', 'louie@tomahawk.co.nz', '2222222', 'This is a test', 'test', 'A', '2019-11-19 19:15:05', '114.23.241.67'),
(5, 'John', 'Doe', 'johnDoe@yahoo.com', '2222222', 'This is a test', 'test', 'A', '2019-11-19 19:15:55', '114.23.241.67'),
(6, 'John', 'Doe', 'johnDoe@yahoo.com', '2222222', 'This is a test', 'test', 'A', '2019-11-19 19:17:08', '114.23.241.67'),
(7, 'Firefox', 'Test', 'alan@tomahawk.co.nz', '1234', 'Enquiry for the accommodation Luxury Accommodation', 'Test', 'D', '2019-11-19 22:32:58', '114.23.241.67'),
(8, 'Edge', 'Test', 'alan@tomahawk.co.nz', '1234', 'Enquiry for the accommodation Luxury Accommodation', 'Test', 'D', '2019-11-19 22:45:58', '114.23.241.67'),
(9, 'Safari', 'Test', 'alan@tomahawk.co.nz', '1234', 'Enquiry for the accommodation Luxury Accommodation', 'Test', 'D', '2019-11-19 22:58:27', '114.23.241.67'),
(10, 'Chrome', 'Test', 'alan@tomahawk.co.nz', '1234', 'Enquiry for the accommodation Luxury Accommodation', 'Test', 'D', '2019-11-19 23:05:10', '114.23.241.67'),
(11, 'Safari', 'Test', 'alan@tomahawk.co.nz', '1234', 'Enquiry for the accommodation Luxury Accommodation', 'Test', 'D', '2019-11-20 00:21:06', '114.23.241.67'),
(12, 'Chrome', 'Test', 'alan@tomahawk.co.nz', '1234', 'Enquiry for the accommodation Luxury Accommodation', 'Test', 'D', '2019-11-20 00:29:00', '114.23.241.67'),
(13, 'Chrome', 'Test', 'alan@tomahawk.co.nz', '1234', 'You have received a new enquiry from website.', 'Test', 'D', '2019-11-20 02:05:06', '114.23.241.67'),
(14, 'Test', 'Alina', 'alina@tomahawk.co.nz', '+64000000000', 'You have received a new enquiry from website.', 'Test', 'A', '2019-11-20 23:00:09', '114.23.241.67'),
(15, 'Chrome', 'Test', 'alan@tomahawk.co.nz', '1234', 'Test', 'Test. Please ignore.', 'A', '2020-02-10 02:22:42', '114.23.241.67'),
(16, 'Test', 'Alina', 'alina@tomahawk.co.nz', '+64000000000', 'You have received a new enquiry from website.', 'Test', 'A', '2020-09-09 06:37:13', '125.236.142.78'),
(17, 'Test', 'Alina', 'alina@tomahawk.co.nz', '+64000000000', 'You have received a new enquiry from website.', 'Test', 'A', '2020-09-09 06:40:05', '125.236.142.78'),
(18, 'Sonia', 'Zhao', 'sonia@tomahawk.co.nz', '021565666', 'You have received a new enquiry from website.', 'test', 'A', '2020-11-05 01:42:23', '198.41.238.129'),
(19, 'shivangi', 'maheshvari', 'shivangi@tomahawk.co.nz', '0224658655', 'This is just a demo', 'This is test', 'A', '2021-04-28 02:53:48', '114.23.241.67'),
(20, 'shivangi', 'maheshvari', 'shivangi@tomahawk.co.nz', '0224658655', 'This is just a demo', 'Test', 'A', '2021-04-28 02:55:05', '114.23.241.67'),
(21, 'Test', 'Alina', 'alina@tomahawk.co.nz', '+6400000000', 'You have received a new enquiry from website.', 'test', 'A', '2021-05-03 20:22:14', '114.23.241.67'),
(22, 'Test', 'Test Alina', 'alina@tomahawk.co.nz', '+6400000000', 'You have received a new enquiry from website.', 'jgfhycmjguhy', 'A', '2021-07-16 02:56:30', '114.23.241.67'),
(23, 'test', 'test', 'test@gmail.com', '1234', 'e', 'te', 'A', '2021-07-23 00:49:17', '114.23.241.67');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `features` text DEFAULT NULL,
  `from_price` decimal(10,2) DEFAULT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `caption` varchar(45) DEFAULT NULL,
  `is_featured` enum('Y','N') DEFAULT 'N',
  `booking_url` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  `price_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `features`, `from_price`, `currency_code`, `caption`, `is_featured`, `booking_url`, `button_text`, `page_meta_data_id`, `price_description`) VALUES
(1, NULL, 450.00, 'NZD', 'per person', 'Y', NULL, NULL, 39, NULL),
(2, '<ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', 160.00, 'NZD', 'per person', 'Y', 'https://example.com', 'Discover More', 40, NULL),
(3, '<h2 style=\"text-align:center;\">Package Inclusions</h2><ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li></ul>', 310.00, 'NZD', 'per night', 'Y', 'https://www.google.com', NULL, 41, '2 Nights | Two Adults'),
(4, NULL, 450.00, 'NZD', 'per person', 'Y', NULL, NULL, 42, '2 Nights | Two Adults & Two Kids'),
(5, NULL, 200.00, 'NZD', 'per person', 'Y', NULL, 'Learn More', 59, '2 Nights | 2 Adults'),
(6, NULL, NULL, NULL, NULL, 'Y', NULL, NULL, 77, NULL),
(7, '<ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>Lorem ipsum dolor sit amet,</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum</li><li>Lorem ipsum dolor</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum</li></ul>', 500.00, 'NZD', 'Per Person', 'Y', 'https://example.com', 'Find out more', 99, NULL),
(8, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 110, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `status` enum('A','D','H') NOT NULL DEFAULT 'H',
  `rank` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `rank`, `date_created`, `date_updated`, `date_deleted`, `created_by`, `updated_by`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit?', '<p>Testfgbdhvkjdhvkhvkjdvn</p>', 'A', 1, '2018-08-08 15:46:37', '2026-01-14 11:18:53', NULL, 1, 1),
(2, 'Nam lacinia, augue nec scelerisque egestas?', '<p>Nam lacinia, augue nec scelerisque egestas, libero neque semper tellus, et accumsan nunc n<a href=\"www.google.com\">isi nec dolor. Nulla</a>m dapibus sem eu lobortis dapibus. Curabitur vel risus ut sapien ullamcorper luctus sed ut mauris. Proin semper ac ligula sollicitudin molestie. Nullam malesuada in erat in eleifend. Proin porta felis eu arcu blandit, nec pulvinar turpis tempus. Etiam porttitor massa at aliquet euismod. Nulla facilisi. Vivamus purus sapien, ultrices et purus eu, venenatis pretium dolor.</p>', 'A', 2, '2018-08-08 15:50:53', '2023-08-07 21:33:20', NULL, 1, 1),
(3, 'Duis cursus congue urna. Quisque ullamcorper rhoncus facilisis?', 'Duis cursus congue urna. Quisque ullamcorper rhoncus facilisis. Sed bibendum felis justo, non tincidunt justo fermentum vel. Nullam faucibus sit amet dui in porta. Pellentesque risus ipsum, scelerisque ac rutrum vel, hendrerit et ipsum. Nulla vitae mauris sapien. Etiam sodales, metus sed sagittis facilisis, lacus elit auctor nisi, sed congue arcu dolor vitae lectus. Donec dapibus finibus nulla, eu malesuada mauris placerat quis. Aenean tempus orci malesuada pretium aliquam. In vitae ex elit. Aenean quis massa dignissim arcu lobortis sodales. Ut tincidunt fringilla porta. Sed fringilla eu dolor vel aliquam. Proin gravida massa urna, et pretium sapien sagittis vitae. Aenean porta pharetra est, sit amet consequat eros.', 'A', 3, '2018-08-08 15:51:07', '2018-08-08 15:51:07', NULL, 1, 1),
(4, 'Vestibulum quis ligula quis sapien auctor hendrerit?', 'Vestibulum quis ligula quis sapien auctor hendrerit. Nam egestas libero dolor, ut consequat mauris ultrices at. Nulla id est dapibus, hendrerit leo in, consectetur urna. Fusce dignissim orci mi. Mauris vehicula pretium finibus. Ut tincidunt condimentum auctor. Vivamus id aliquam metus. Sed cursus posuere auctor. Aenean sapien urna, lobortis quis eleifend at, iaculis in est. Aliquam tempus bibendum turpis, vitae semper eros tincidunt sed. Etiam convallis in ligula nec semper. Vestibulum convallis nisi eros, eget rhoncus leo sollicitudin in.', 'A', 4, '2018-08-08 15:51:22', '2018-08-08 15:51:22', NULL, 1, 1),
(5, 'Maecenas felis libero, consequat at eros a, iaculis faucibus quam?', 'Maecenas felis libero, consequat at eros a, iaculis faucibus quam. Mauris convallis, ex vitae hendrerit consectetur, lorem mi accumsan tellus, in tempus metus nisl in nunc. Suspendisse ac vestibulum nibh, tincidunt faucibus ipsum. Quisque ac mauris vulputate, vestibulum risus sit amet, laoreet urna. In accumsan dui non magna eleifend, sit amet aliquet velit suscipit. Sed egestas eleifend facilisis. Mauris accumsan vestibulum purus tincidunt gravida. Proin eget ipsum a lorem auctor aliquet non vitae ex. Phasellus sem neque, vehicula ac mollis ut, congue sit amet ipsum. Nunc consequat laoreet mauris, non varius nibh feugiat quis. Morbi suscipit elit sit amet justo sagittis ullamcorper. Etiam eget ornare magna. Mauris ultrices id augue quis dignissim. In in nulla ac justo lobortis ultrices et et neque. Nunc lobortis tortor et tincidunt imperdiet. Sed interdum facilisis consequat.', 'A', 5, '2018-08-08 15:51:38', '2018-08-08 15:51:38', NULL, 1, 1),
(6, 'What is Lorem ipsum dolor sit amet, consectetur adipiscing elit?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel faucibus diam sapien ac tellus. Suspendisse eleifend mauris id auctor lacinia. Nam luctus, nunc sed molestie accumsan, velit purus vestibulum metus, viverra dapibus ligula eros sit amet justo. Sed tempor ipsum magna, eget imperdiet tellus gravida eu. Maecenas quis ex vitae enim consectetur pellentesque sed at arcu. Donec pellentesque eu eros ac interdum. Nam faucibus, sapien sed porttitor convallis, ante leo egestas felis, dapibus vestibulum velit tellus vitae mauris. Suspendisse congue vitae velit eget consequat. Pellentesque eros justo, imperdiet eu nulla in, euismod gravida enim. Nunc diam ante, maximus ut maximus sed, vehicula nec risus. Pellentesque mollis libero quis sagittis posuere.', 'H', 10, '2019-11-18 10:41:49', '2019-11-18 10:41:49', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `public_token` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_subject` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `success_message` text DEFAULT NULL,
  `mailchimp_list_id` varchar(255) DEFAULT NULL,
  `terms_and_conditions` text DEFAULT NULL,
  `xml_data` longtext DEFAULT NULL,
  `json_data` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` enum('A','H','D') NOT NULL DEFAULT 'H'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `public_token`, `name`, `email_subject`, `email_address`, `success_message`, `mailchimp_list_id`, `terms_and_conditions`, `xml_data`, `json_data`, `date_created`, `date_updated`, `date_deleted`, `status`) VALUES
(1, '0b2d3b1e84', 'Contact Form', 'Contact Enquiry from website', 'www@netzone.website;bakhtiyar@tomahawk.co.nz;Daniyar@tomahawk.co.nz;', 'Your enquiry has successfully been sent.', NULL, '<p>Terms in conditions can be added here for the form if you need it. Or leave blank to remove check</p>', '<form-template>\n	<fields>\n		<field type=\"header\" subtype=\"h3\" label=\"Send Us Your Enquiry\"></field>\n		<field type=\"text\" required=\"true\" label=\"First Name\" class=\"form-control\" name=\"first-name\" subtype=\"text\"></field>\n		<field type=\"text\" required=\"true\" label=\"Last Name\" class=\"form-control\" name=\"last-name\" subtype=\"text\"></field>\n		<field type=\"text\" subtype=\"email\" required=\"true\" label=\"Email Address\" class=\"form-control\" name=\"email-address\"></field>\n		<field type=\"text\" label=\"Phone / Mobile\" class=\"form-control\" name=\"text-1691358701074\" subtype=\"text\"></field>\n		<field type=\"text\" required=\"true\" label=\"Subject\" class=\"form-control\" name=\"subject\" subtype=\"text\"></field>\n		<field type=\"textarea\" required=\"true\" label=\"Message\" class=\"form-control\" name=\"textarea-1691358662949\"></field>\n	</fields>\n</form-template>', '[{\"type\":\"header\",\"subtype\":\"h3\",\"label\":\"Send Us Your Enquiry\"},{\"type\":\"text\",\"required\":true,\"label\":\"First Name\",\"className\":\"form-control\",\"name\":\"first-name\",\"subtype\":\"text\"},{\"type\":\"text\",\"required\":true,\"label\":\"Last Name\",\"className\":\"form-control\",\"name\":\"last-name\",\"subtype\":\"text\"},{\"type\":\"text\",\"subtype\":\"email\",\"required\":true,\"label\":\"Email Address\",\"className\":\"form-control\",\"name\":\"email-address\"},{\"type\":\"text\",\"label\":\"Phone / Mobile\",\"className\":\"form-control\",\"name\":\"text-1691358701074\",\"subtype\":\"text\"},{\"type\":\"text\",\"required\":true,\"label\":\"Subject\",\"className\":\"form-control\",\"name\":\"subject\",\"subtype\":\"text\"},{\"type\":\"textarea\",\"required\":true,\"label\":\"Message\",\"className\":\"form-control\",\"name\":\"textarea-1691358662949\"}]', '2021-04-09 10:35:05', '2024-10-15 12:16:11', NULL, 'A'),
(2, '27190c744d', 'Untitled', NULL, NULL, NULL, '', '', '<form-template>\n	<fields>\n		<field type=\"text\" required=\"true\" label=\"First Name\" description=\"Your first name\" class=\"form-control\" name=\"first-name\" subtype=\"text\"></field>\n		<field type=\"text\" required=\"true\" label=\"Last Name\" description=\"Your last name\" class=\"form-control\" name=\"last-name\" subtype=\"text\"></field>\n		<field type=\"text\" required=\"true\" label=\"Email Address\" description=\"Your email address\" class=\"form-control\" name=\"email-address\" subtype=\"text\"></field>\n		<field type=\"header\" subtype=\"h2\" label=\"Header\"></field>\n		<field type=\"date\" label=\"Date Field$!@$%^&amp;amp;()_*^%$#$%^\" class=\"form-control\" name=\"date-1625010846078\"></field>\n	</fields>\n</form-template>', '[{\"type\":\"text\",\"required\":true,\"label\":\"First Name\",\"description\":\"Your first name\",\"className\":\"form-control\",\"name\":\"first-name\",\"subtype\":\"text\"},{\"type\":\"text\",\"required\":true,\"label\":\"Last Name\",\"description\":\"Your last name\",\"className\":\"form-control\",\"name\":\"last-name\",\"subtype\":\"text\"},{\"type\":\"text\",\"required\":true,\"label\":\"Email Address\",\"description\":\"Your email address\",\"className\":\"form-control\",\"name\":\"email-address\",\"subtype\":\"text\"},{\"type\":\"header\",\"subtype\":\"h2\",\"label\":\"Header\"},{\"type\":\"date\",\"label\":\"Date Field$!@$%^&amp;()_*^%$#$%^\",\"className\":\"form-control\",\"name\":\"date-1625010846078\"}]', '2021-06-30 11:53:03', '2021-06-30 11:53:24', NULL, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `form_entry`
--

CREATE TABLE `form_entry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `form_id` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form_entry`
--

INSERT INTO `form_entry` (`id`, `first_name`, `last_name`, `full_name`, `email_address`, `ip_address`, `date_added`, `form_id`, `subject`) VALUES
(1, 'teset', 'te', 'teset te', 'hardik@tomahawk.co.nz', '127.0.0.1', '2022-04-05 12:52:07', 1, NULL),
(2, 'testfname', 'testlnsme', 'testfname testlnsme', 'hardik@tomahawk.co.nz', '198.41.238.21', '2023-05-26 16:06:31', 1, NULL),
(3, 'rina', 'Transom', 'rina Transom', 'rina@tomahawk.co.nz', '172.68.66.4', '2023-06-08 13:33:45', 1, NULL),
(4, 'fffff', 'fff', 'fffff fff', 'rina@tomahawk.co.nz', '172.68.66.10', '2023-06-08 13:37:56', 1, NULL),
(5, 'rqwerq', 'rqwerqwer', 'rqwerq rqwerqwer', 'rina@tomahawk.co.nz', '172.68.210.64', '2023-06-27 11:57:27', 1, NULL),
(6, 'MYNAME', 'MYLastname', 'MYNAME MYLastname', 'rina@tomahawk.co.nz', '172.68.66.102', '2023-08-21 20:12:55', 1, NULL),
(7, 'qwqwq', 'eeqeqw', 'qwqwq eeqeqw', 'test@gmail.com', '172.69.0.147', '2024-09-18 13:40:50', 1, NULL),
(8, 'test', 'test', 'test test', 'test@gmail.co.nz', '172.69.0.176', '2024-10-10 13:27:29', 1, NULL),
(9, 'ResBook', 'Test', 'ResBook Test', 'aprilann@resbook.com', '172.69.0.140', '2024-10-15 12:06:44', 1, NULL),
(10, 'April', 'Test', 'April Test', 'aprilannhayagan@icloud.com', '172.69.0.141', '2024-10-15 12:13:57', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_entry_data`
--

CREATE TABLE `form_entry_data` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `form_id` int(11) NOT NULL,
  `form_entry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form_entry_data`
--

INSERT INTO `form_entry_data` (`id`, `label`, `value`, `form_id`, `form_entry_id`) VALUES
(1, '#$@#$@#$Text Field&nbsp;', 'tesf', 1, 1),
(2, '&amp;First Name&nbsp;', 'teset', 1, 1),
(3, 'Last Name', 'te', 1, 1),
(4, 'Email Address', 'hardik@tomahawk.co.nz', 1, 1),
(5, 'Checkbox Group', 'option-1, ', 1, 1),
(6, 'Checkbox Group', '', 1, 1),
(7, 'Text Area', 'asdf', 1, 1),
(8, 'Select!@#$%^&amp;*(_)(*&amp;^%@#$%^&amp;*()_)(*&amp;^%$#@}{\":&gt;L\"?&gt;', 'option-1', 1, 1),
(9, 'This is the form Header', '', 1, 2),
(10, 'First Name', 'testfname', 1, 2),
(11, 'Last Name', 'testlnsme', 1, 2),
(12, 'Email Address', 'hardik@tomahawk.co.nz', 1, 2),
(13, 'Text Area', 'this is text area', 1, 2),
(14, 'Select Tours', 'option-1', 1, 2),
(15, 'Select Accommodation', 'option-1, ', 1, 2),
(16, 'Date Field', '31/05/2023', 1, 2),
(17, 'Checkbox Group', 'option-1, ', 1, 2),
(18, 'This is the form Header', '', 1, 3),
(19, 'First Name', 'rina', 1, 3),
(20, 'Last Name', 'Transom', 1, 3),
(21, 'Email Address', 'rina@tomahawk.co.nz', 1, 3),
(22, 'Text Area', 'dfasdfsa\r\nasd\r\nfas\r\ndf\r\nasd\r\nf\r\nasd\r\nf\r\nasdf', 1, 3),
(23, 'Select Tours', 'option-1- adventure', 1, 3),
(24, 'Select Accommodation', 'super-delux, ', 1, 3),
(25, 'Date Field', '', 1, 3),
(26, 'Do you want us to call you?', 'No-DoNotCall, ', 1, 3),
(27, 'This is the form Header', '', 1, 4),
(28, 'First Name', 'fffff', 1, 4),
(29, 'Last Name', 'fff', 1, 4),
(30, 'Email Address', 'rina@tomahawk.co.nz', 1, 4),
(31, 'Text Area', 'ewdqwedwed \r\nsecond line\r\n', 1, 4),
(32, 'Select Tours', 'option-1- adventure', 1, 4),
(33, 'Select Accommodation', 'super-delux, ', 1, 4),
(34, 'Date Field', '29/06/2023', 1, 4),
(35, 'Do you want us to call you?', 'Yes-Call, ', 1, 4),
(36, 'This is the form Header', '', 1, 5),
(37, 'First Name', 'rqwerq', 1, 5),
(38, 'Last Name', 'rqwerqwer', 1, 5),
(39, 'Email Address', 'rina@tomahawk.co.nz', 1, 5),
(40, 'Text Area', '3e23e', 1, 5),
(41, 'Select Tours', 'option-2-general', 1, 5),
(42, 'Select Accommodation', 'luxury, ', 1, 5),
(43, 'Date Field', '30/06/2023', 1, 5),
(44, 'Do you want us to call you?', 'Yes-Call, ', 1, 5),
(45, 'Send Us Your Enquiry', '', 1, 6),
(46, 'First Name', 'MYNAME', 1, 6),
(47, 'Last Name', 'MYLastname', 1, 6),
(48, 'Email Address', 'rina@tomahawk.co.nz', 1, 6),
(49, 'Phone / Mobile', '3523462456', 1, 6),
(50, 'Subject', 'Subject test', 1, 6),
(51, 'Message', 'My message', 1, 6),
(52, 'Send Us Your Enquiry', '', 1, 7),
(53, 'First Name', 'qwqwq', 1, 7),
(54, 'Last Name', 'eeqeqw', 1, 7),
(55, 'Email Address', 'test@gmail.com', 1, 7),
(56, 'Phone / Mobile', '0224545', 1, 7),
(57, 'Subject', 'qwqwqwdsdsd', 1, 7),
(58, 'Message', 'sdsdsds dsdsd cvv cxv xcvxdsaf ewr dvc vc ', 1, 7),
(59, 'Send Us Your Enquiry', '', 1, 8),
(60, 'First Name', 'test', 1, 8),
(61, 'Last Name', 'test', 1, 8),
(62, 'Email Address', 'test@gmail.co.nz', 1, 8),
(63, 'Phone / Mobile', '322323', 1, 8),
(64, 'Subject', 'wqwqweqwe', 1, 8),
(65, 'Message', 'adfxcsdfsdf', 1, 8),
(66, 'Send Us Your Enquiry', '', 1, 9),
(67, 'First Name', 'ResBook', 1, 9),
(68, 'Last Name', 'Test', 1, 9),
(69, 'Email Address', 'aprilann@resbook.com', 1, 9),
(70, 'Phone / Mobile', '123456789', 1, 9),
(71, 'Subject', 'Test', 1, 9),
(72, 'Message', 'Test', 1, 9),
(73, 'Send Us Your Enquiry', '', 1, 10),
(74, 'First Name', 'April', 1, 10),
(75, 'Last Name', 'Test', 1, 10),
(76, 'Email Address', 'aprilannhayagan@icloud.com', 1, 10),
(77, 'Phone / Mobile', '123456789', 1, 10),
(78, 'Subject', 'Test', 1, 10),
(79, 'Message', 'Test', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

CREATE TABLE `form_field` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `default_value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `is_required` enum('N','Y') NOT NULL DEFAULT 'N',
  `is_multiple` enum('Y','N') DEFAULT 'N',
  `is_toggle` enum('Y','N') NOT NULL DEFAULT 'N',
  `class` varchar(255) DEFAULT NULL,
  `help_text` varchar(255) DEFAULT NULL,
  `subtype` varchar(255) DEFAULT NULL,
  `options_json` text DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form_field`
--

INSERT INTO `form_field` (`id`, `label`, `name`, `placeholder`, `default_value`, `type`, `is_required`, `is_multiple`, `is_toggle`, `class`, `help_text`, `subtype`, `options_json`, `rank`, `form_id`) VALUES
(4, 'First Name', 'first-name', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', 'Your first name', 'text', '[]', 1, 2),
(5, 'Last Name', 'last-name', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', 'Your last name', 'text', '[]', 2, 2),
(6, 'Email Address', 'email-address', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', 'Your email address', 'text', '[]', 3, 2),
(7, 'Header', NULL, NULL, NULL, 'header', 'N', 'N', 'N', NULL, NULL, 'h2', '[]', 4, 2),
(8, 'Date Field$!@$%^&amp;()_*^%$#$%^', 'date-1625010846078', NULL, NULL, 'date', 'N', 'N', 'N', 'form-control', NULL, NULL, '[]', 5, 2),
(275, 'Send Us Your Enquiry', NULL, NULL, NULL, 'header', 'N', 'N', 'N', NULL, NULL, 'h3', '[]', 1, 1),
(276, 'First Name', 'first-name', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', NULL, 'text', '[]', 2, 1),
(277, 'Last Name', 'last-name', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', NULL, 'text', '[]', 3, 1),
(278, 'Email Address', 'email-address', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', NULL, 'email', '[]', 4, 1),
(279, 'Phone / Mobile', 'text-1691358701074', NULL, NULL, 'text', 'N', 'N', 'N', 'form-control', NULL, 'text', '[]', 5, 1),
(280, 'Subject', 'subject', NULL, NULL, 'text', 'Y', 'N', 'N', 'form-control', NULL, 'text', '[]', 6, 1),
(281, 'Message', 'textarea-1691358662949', NULL, NULL, 'textarea', 'Y', 'N', 'N', 'form-control', NULL, NULL, '[]', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  `show_on_gallery_page` enum('N','Y') DEFAULT 'N',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `menu_label`, `show_on_gallery_page`, `rank`) VALUES
(7, 'Accommodation', 'Rooms', 'Y', NULL),
(8, 'Restaurant', 'Restaurant', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photo`
--

CREATE TABLE `gallery_photo` (
  `id` int(11) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `thumb_photo_path` varchar(255) DEFAULT NULL,
  `photo_width` smallint(6) DEFAULT NULL,
  `photo_height` smallint(6) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `video_id` varchar(20) DEFAULT NULL,
  `rank` tinyint(4) DEFAULT NULL,
  `gallery_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gallery_photo`
--

INSERT INTO `gallery_photo` (`id`, `photo_path`, `thumb_photo_path`, `photo_width`, `photo_height`, `caption`, `alt_text`, `video_id`, `rank`, `gallery_id`) VALUES
(43, '/library/images/Accommodation/condominium-living-woman-on-the-balcony-2022-11-15-20-55-53-utc.jpg', '/uploads/condominium-living-woman-on-the-balcony-2022-11-15-20-55-53-utc-ej250.webp', 1440, 1080, 'qwqwqwqwqw', '', '', NULL, '7'),
(44, '/library/images/Accommodation/highlights-featured.jpg', '/uploads/highlights-featured-udzis.webp', 1002, 600, '', '', '', NULL, '7'),
(45, '/library/images/Accommodation/luxury-villa-accommodation-with-sea-views-of-the-t-2022-03-10-08-27-02-utc.jpg', '/uploads/luxury-villa-accommodation-with-sea-views-of-the-t-2022-03-10-08-27-02-utc-5370c.webp', 1618, 1080, '', '', '', NULL, '7'),
(46, '/library/images/Accommodation/luxury-villa-accommodation-with-sea-views-of-the-t-2022-03-11-00-13-09-utc.jpg', '/uploads/luxury-villa-accommodation-with-sea-views-of-the-t-2022-03-11-00-13-09-utc-4ex8w.webp', 1618, 1080, '', '', '', NULL, '7'),
(47, '/library/images/Accommodation/pexels-max-rahubovskiy-11701119.jpg', '/uploads/pexels-max-rahubovskiy-11701119-xhatu.webp', 1620, 1080, '', '', '', NULL, '7'),
(48, '/library/images/Accommodation/pexels-max-rahubovskiy-8143707.jpg', '/uploads/pexels-max-rahubovskiy-8143707-s4pbx.webp', 1618, 1080, '', '', '', NULL, '7'),
(50, '/library/images/Accommodation/travel-2022-11-08-05-25-24-utc.jpg', '/uploads/travel-2022-11-08-05-25-24-utc-n1kru.webp', 1440, 1080, '', '', '', NULL, '7'),
(51, '/library/images/Accommodation/tropical-island-of-rarotonga-seen-from-the-beautif-2022-03-10-08-12-52-utc.jpg', '/uploads/tropical-island-of-rarotonga-seen-from-the-beautif-2022-03-10-08-12-52-utc-tsgg9.webp', 1618, 1080, '', '', '', NULL, '7'),
(52, '/library/images/Highlights/tile-desserts-420x250.jpg', '/uploads/tile-desserts-420x250-1zynu.webp', 420, 250, '', '', '', NULL, '8'),
(53, '/library/images/Highlights/woman-eating-pizza-and-drinking-beer-at-the-restau-2022-11-14-13-03-20-utc.jpg', '/uploads/woman-eating-pizza-and-drinking-beer-at-the-restau-2022-11-14-13-03-20-utc-7si1w.webp', 550, 561, '', '', '', NULL, '8'),
(54, '/library/images/Highlights/tile-chef-420x250.jpg', '/uploads/tile-chef-420x250-tt9fn.webp', 420, 250, '', '', '', NULL, '8'),
(55, '/library/images/Highlights/restaurant-feature-1045x600.jpg', '/uploads/restaurant-feature-1045x600-ojkdb.webp', 1045, 600, '', '', '', NULL, '8'),
(56, '/library/images/Highlights/tile-roomservice-420x250.jpg', '/uploads/tile-roomservice-420x250-4c4bl.webp', 420, 250, '', '', '', NULL, '8');

-- --------------------------------------------------------

--
-- Table structure for table `general_importantpages`
--

CREATE TABLE `general_importantpages` (
  `imppage_id` int(11) NOT NULL,
  `imppage_name` varchar(150) NOT NULL,
  `imppage_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `page_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `general_importantpages`
--

INSERT INTO `general_importantpages` (`imppage_id`, `imppage_name`, `imppage_showincms`, `page_id`) VALUES
(1, 'Home', 'N', 1),
(2, '404', 'Y', 13),
(3, 'Contact', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_pages`
--

CREATE TABLE `general_pages` (
  `id` int(11) NOT NULL COMMENT 'Primary key for pages',
  `access_level` enum('P','L') NOT NULL DEFAULT 'P' COMMENT 'P = Public, L = Private',
  `meta_cache` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `general_pages`
--

INSERT INTO `general_pages` (`id`, `access_level`, `meta_cache`, `parent_id`, `page_meta_data_id`, `form_id`) VALUES
(1, 'P', 1, NULL, 1, NULL),
(2, 'P', 1, NULL, 2, NULL),
(4, 'P', 1, NULL, 4, NULL),
(6, 'P', 1, 4, 6, NULL),
(8, 'P', 1, 4, 8, NULL),
(9, 'P', 1, 4, 9, NULL),
(10, 'P', 1, 4, 10, NULL),
(11, 'P', 1, NULL, 11, 1),
(12, 'P', 1, NULL, 12, NULL),
(13, 'P', 1, NULL, 13, NULL),
(14, 'P', 1, NULL, 38, NULL),
(17, 'P', 1, NULL, 47, NULL),
(31, 'P', 1, NULL, 74, NULL),
(35, 'P', 1, 4, 83, NULL),
(36, 'P', 1, 4, 84, NULL),
(47, 'P', 1, 4, 95, 1),
(48, 'P', 1, 1, 103, NULL),
(49, 'P', 1, 4, 104, NULL),
(50, 'P', 1, NULL, 108, NULL),
(51, 'P', 1, 2, 109, 1),
(52, 'P', 1, NULL, 112, NULL),
(53, 'P', 1, 4, 113, NULL),
(54, 'P', 1, NULL, 114, NULL),
(55, 'P', 1, NULL, 115, NULL),
(56, 'P', 1, NULL, 116, NULL),
(57, 'P', 1, NULL, 117, NULL),
(58, 'P', 1, NULL, 118, NULL),
(59, 'P', 1, NULL, 119, NULL),
(60, 'P', 1, 2, 121, NULL),
(61, 'P', 1, 4, 122, NULL),
(62, 'P', 1, NULL, 123, NULL),
(63, 'P', 1, NULL, 124, NULL),
(64, 'P', 1, 4, 125, NULL),
(65, 'P', 1, 62, 126, NULL),
(66, 'P', 1, 4, 127, NULL),
(67, 'P', 1, NULL, 129, NULL),
(68, 'P', 1, NULL, 131, NULL),
(69, 'P', 1, NULL, 133, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL COMMENT 'Company/Business/Website name	',
  `start_year` int(11) DEFAULT NULL,
  `email_address` mediumtext DEFAULT NULL COMMENT 'Email Address',
  `phone_number` varchar(100) DEFAULT NULL,
  `free_phone_number` varchar(100) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `resbook_id` varchar(45) DEFAULT NULL,
  `booking_url` varchar(255) DEFAULT NULL,
  `robot_meta_tag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `set_sitemapupdated` timestamp NULL DEFAULT NULL,
  `set_sitemapstatus` char(1) DEFAULT NULL,
  `rptoken` mediumtext DEFAULT NULL,
  `rptoken_createdat` timestamp NULL DEFAULT NULL,
  `is_resbook_calendar` enum('Y','N') DEFAULT 'N',
  `rb_check_personal_widget` mediumtext DEFAULT NULL,
  `rb_checkin_widget` mediumtext DEFAULT NULL,
  `rb_property_manager_widget` mediumtext DEFAULT NULL,
  `fax_number` varchar(100) DEFAULT NULL,
  `fcontact_heading` varchar(100) DEFAULT NULL,
  `fcontact_short_description` varchar(200) DEFAULT NULL,
  `fcontact_imp_page` varchar(45) DEFAULT NULL,
  `fcontact_btntext` varchar(45) DEFAULT NULL,
  `fcontact_btnurl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `company_name`, `start_year`, `email_address`, `phone_number`, `free_phone_number`, `address`, `resbook_id`, `booking_url`, `robot_meta_tag`, `set_sitemapupdated`, `set_sitemapstatus`, `rptoken`, `rptoken_createdat`, `is_resbook_calendar`, `rb_check_personal_widget`, `rb_checkin_widget`, `rb_property_manager_widget`, `fax_number`, `fcontact_heading`, `fcontact_short_description`, `fcontact_imp_page`, `fcontact_btntext`, `fcontact_btnurl`) VALUES
(1, 'Jean-Michel Cousteau Resort', 2025, 'inspireislandbeachresort@gmail.com; daniyar@tomahawk.co.nz', 'USA &amp; Canada Toll-free&nbsp;(800) 246 3454\r\nFiji&nbsp;+679 8850 174', 'WhatsApp&nbsp;+679 992 8280', '1 Beach Side Lane\r\nInspire Island\r\nHawaii\r\nUnited States', NULL, NULL, 'Y', '2026-01-23 05:40:57', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTE0OWQ2M2I4NTVjYjI4MTBkM2IxZWJiYjIxYzAxNGYxMjUxNmJmZWE1OWUxOGI3MjljZjJlMGUxYjA4MDVmMTk3NWI1MTkxMzU4M2NmOGUiLCJpYXQiOjE3MjUzMjgyMzguNjY1NTIsIm5iZiI6MTcyNTMyODIzOC42NjU1MjQsImV4cCI6MTc1Njg2NDIzOC4wOTcwMDUsInN1YiI6IiIsInNjb3BlcyI6WyIqIl19.UZxEc9yVEuwfkViuLvru1WkAkD-Pp9NupPamnuDJOvqQYHBteT6MuJFuwR7pvL6bIW3IlXvJVWbkUsfx0c8Jh9wP43K0XPRy0JmGhVRh7ODQOQLuVWuvvU6bEJ7Atoi9UOnqJejVfHMNXXj6fZ1zauO0gHkT-ZwTFpDn5BwrcQmxaX_FR6VBK2ErW7zr_jX6BcECKDj1bIv-6y5B_G-qv_Z25T18SoFKPjUMjcYPY08doioNAw6mXqX2T_joXWPPsCruyM5JrnUvg_h4uZwqQjSw7I_xpeWfX0Z888shnG9zF91IUKYrRB_VC0GGxTP6zguF3IYYWG73GND3m4GY4X_f-U_Qw5LXj_6h-YxcFrgmXWhUQJ21C9DUugeynYkoyNbxeLuBdr1OFSA-bwrgL7DKfkAKseiP56WMxIncO1wVbaYFcPfjj_m4Bnzon3P3XvGGOBXVuyj-K6M1fvaSp247yqYui6dJUyOhTQtt-LHdZ-gvNCvx29T0m2R-LQ2SVY0XNAgYvAGGY2B02DpT28GLgQzpC738inHZ3jqpi1KBz4SAVfSb7UuWm1AxGQaBAa6K8ayDhxq3lHCoC1eh2VvKSwCcr4ZAx5kNatwZ588_L627dVCpXWsgk8dhSgoMD2UJnpT7zBveEIsVffPal22PISja8UJ4foCRBl7dGNs', '2024-09-03 13:50:37', NULL, '<script type=\"module\"> (function (w, d, s, o, f, js, fjs) { w[\'JS-CheckInPersonWidget\'] = o; w[o] = w[o] || function () { (w[o].q = w[o].q || []).push(arguments) }; js = d.createElement(s), fjs = d.getElementsByTagName(s)[0]; js.id = o; js.src = f; js.async = 1; fjs.parentNode.insertBefore(js, fjs); }(window, document, \'script\', \'cpw\', \'https://inspiretheme.thebookingengine.net/BookingEngine.Web/scripts/CheckInPersonWidget.bundle.min.js\')); cpw(\'init\', { baseUrl:\'https://inspiretheme.thebookingengine.net\', serviceProvider: \'ResBook\', pid: 128, widgetType:\'CheckInPersonWidget\', widgetId: \'a34525aceb9943f790e547785cf07cee\'}); cpw(\'apidata\', \'4jyx9858f42cv518h8p2znczm7\'); </script> <div id=\"a34525aceb9943f790e547785cf07cee\" class=\"CheckInPersonWidget\"> </div>', NULL, NULL, NULL, 'Get in Touch', NULL, '11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `googlemap_account`
--

CREATE TABLE `googlemap_account` (
  `id` int(11) NOT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `is_production_mode` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `googlemap_account`
--

INSERT INTO `googlemap_account` (`id`, `api_key`, `is_production_mode`) VALUES
(1, 'AIzaSyAZXD5oPWAUD5QPFAFd_X2GPjxLKS4JhL8', 'N'),
(2, 'AIzaSyDMrzQ3PGeoxJaM2rOMuFqCpGGVkEuvKW4', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `googlemap_location`
--

CREATE TABLE `googlemap_location` (
  `id` int(11) NOT NULL,
  `map_heading` varchar(255) DEFAULT NULL,
  `map_description` mediumtext DEFAULT NULL,
  `map_address` mediumtext DEFAULT NULL,
  `map_latitude` float(10,6) DEFAULT NULL,
  `map_longitude` float(10,6) DEFAULT NULL,
  `map_marker_latitude` float(10,6) DEFAULT NULL,
  `map_marker_longitude` float(10,6) DEFAULT NULL,
  `map_zoom_level` tinyint(4) DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `googlemap_location`
--

INSERT INTO `googlemap_location` (`id`, `map_heading`, `map_description`, `map_address`, `map_latitude`, `map_longitude`, `map_marker_latitude`, `map_marker_longitude`, `map_zoom_level`) VALUES
(1, 'Map Marker Heading', 'Lorem ipsum dolor sit amet, \r\nconsectetur adipiscing elit. \r\nEtiam consectetur\r\nConsequat sagittis.', '17 Constellation Drive, Rosedale, Auckland 0632, New Zealand', -36.746300, 174.736526, -36.746300, 174.736526, 12);

-- --------------------------------------------------------

--
-- Table structure for table `hero_banner`
--

CREATE TABLE `hero_banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slideshow_speed` int(11) NOT NULL DEFAULT 4000,
  `active_type` enum('H','S','V') NOT NULL DEFAULT 'H' COMMENT 'H - Heroshot,  S - Slideshow, V - Video',
  `photo` mediumtext DEFAULT NULL,
  `thumb_photo` mediumtext DEFAULT NULL,
  `is_gallery` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hero_banner`
--

INSERT INTO `hero_banner` (`id`, `name`, `slideshow_speed`, `active_type`, `photo`, `thumb_photo`, `is_gallery`) VALUES
(27, 'Home Slide', 5000, 'H', '/library/images/Highlights/700x450.jpg', '', 1),
(29, 'Home Banner Image', 3000, 'H', NULL, '', 0),
(30, 'Wedding', 3000, 'H', NULL, '', 0),
(31, 'Restaurant', 3000, 'H', NULL, '', 0),
(33, 'About Us', 3000, 'H', NULL, '', 0),
(34, 'Generic', 3000, 'H', NULL, '', 0),
(35, 'Packages', 3000, 'H', NULL, '', 0),
(36, 'Banner Inner Slide', 3000, 'S', NULL, '', 0),
(37, 'Inner Banner with text and button', 3000, 'H', NULL, '', 0),
(38, 'Home Video Banner', 3000, 'V', NULL, '', 0),
(39, 'Gallery Banner', 3000, 'S', NULL, '', 1),
(40, 'Gallery Banner home', 3000, 'S', NULL, '', 1),
(41, 'Stay', 3000, 'H', '/library/bures/Stay0.png', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hero_banner_item`
--

CREATE TABLE `hero_banner_item` (
  `id` int(11) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `thumb_photo_path` varchar(255) DEFAULT NULL,
  `photo_width` smallint(6) NOT NULL,
  `photo_height` smallint(6) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `button_target` varchar(50) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `video_id` varchar(20) DEFAULT NULL,
  `type` enum('H','S','V') NOT NULL COMMENT 'H - Heroshot,  S - Slideshow, V - Video',
  `rank` int(11) DEFAULT NULL,
  `hero_banner_id` int(11) NOT NULL,
  `hero_bunner_header` varchar(50) DEFAULT NULL,
  `hero_cta_bunner_url` varchar(50) DEFAULT NULL,
  `hero_cta_bunner_text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hero_banner_item`
--

INSERT INTO `hero_banner_item` (`id`, `photo_path`, `thumb_photo_path`, `photo_width`, `photo_height`, `title`, `sub_title`, `alt_text`, `button_text`, `button_target`, `button_url`, `video_id`, `type`, `rank`, `hero_banner_id`, `hero_bunner_header`, `hero_cta_bunner_url`, `hero_cta_bunner_text`) VALUES
(379, '/library/images/cape-kidnappers_evening-shot-b3unt.jpg', '/uploads/cape-kidnappers_evening-shot-b3unt-lrvkb.webp', 625, 420, 'Premium Comfort With Great Attention to detail.', NULL, 'swimming pool', 'Discover More', NULL, '/accommodation', NULL, 'H', NULL, 27, NULL, NULL, NULL),
(398, '/library/images/Banners/banner-home-1920x1080.jpg', '/uploads/banner-home-1920x1080-9d729.webp', 1920, 1080, 'Banner Image heading', 'Banner Subtitle', 'Alt text', 'Find out more', NULL, '/accommodation', NULL, 'H', NULL, 29, NULL, NULL, NULL),
(399, '/library/images/Banners/banner-wedding.jpg', '/uploads/banner-wedding-94a43.webp', 1920, 560, NULL, NULL, 'wedding', NULL, NULL, NULL, NULL, 'H', NULL, 30, NULL, NULL, NULL),
(400, '/library/images/Highlights/restaurant-feature-1045x600.jpg', '/uploads/restaurant-feature-1045x600-rp6ab.webp', 1045, 600, NULL, NULL, 'Restaurant', NULL, NULL, NULL, NULL, 'H', NULL, 31, NULL, NULL, NULL),
(401, '/library/images/Banners/banner-about-us.jpg', '/uploads/banner-about-us-q6f5f.webp', 1920, 560, NULL, NULL, 'House', NULL, NULL, NULL, NULL, 'H', NULL, 33, NULL, NULL, NULL),
(402, '/library/images/Banners/banner-inner-1920x560.jpg', '/uploads/banner-inner-1920x560-f0g0l.webp', 1920, 560, NULL, NULL, 'nice', NULL, NULL, NULL, NULL, 'H', NULL, 34, NULL, NULL, NULL),
(403, '/library/images/Banners/banner-packages.jpg', '/uploads/banner-packages-lpfxb.webp', 1920, 560, NULL, NULL, 'Packages', NULL, NULL, NULL, NULL, 'H', NULL, 35, NULL, NULL, NULL),
(404, '/library/images/Banners/banner-hut.jpg', '/uploads/banner-hut-rgtrr.webp', 1920, 560, NULL, NULL, 'hut', NULL, NULL, NULL, NULL, 'H', NULL, 36, NULL, NULL, NULL),
(405, '/library/images/Banners/banner-inner-1920x560.jpg', '/uploads/banner-inner-1920x560-kgcrm.webp', 1920, 560, 'My Banner Title', 'Sub title of banner', 'Hut image', 'Book Now', NULL, 'https://www/booking.com', NULL, 'H', NULL, 37, NULL, NULL, NULL),
(406, '/library/images/Banners/banner-home-template-1920x1080.jpg', '/uploads/banner-home-template-1920x1080-rpv0k.webp', 1920, 1080, 'Tile of video banner', 'Subtitle of banner', 'Hero Banner Video Alt Text', 'My Button Text', NULL, 'https://www.booking.com', 't8xOfh4a1IY', 'V', NULL, 38, NULL, NULL, NULL),
(440, '/library/images/accommodation/chi-m-R1uiDu8vBh0-unsplash.jpg', '/uploads/chi-m-R1uiDu8vBh0-unsplash-t14ru.webp', 4272, 2848, '', '', '', '', NULL, '', NULL, 'S', 1, 39, NULL, NULL, NULL),
(441, '/library/images/accommodation/evan-dvorkin-YWDVrk4C6F0-unsplash.jpg', '/uploads/evan-dvorkin-YWDVrk4C6F0-unsplash-ds65s.webp', 4048, 2272, '', '', '', '', NULL, '', NULL, 'S', 2, 39, NULL, NULL, NULL),
(442, '/library/images/accommodation/ialicante-mediterranean-homes-2d4lAQAlbDA-unsplash.jpg', '/uploads/ialicante-mediterranean-homes-2d4lAQAlbDA-unsplash-xsrjs.webp', 5566, 3711, '', '', '', '', NULL, '', NULL, 'S', 3, 39, NULL, NULL, NULL),
(443, '/library/images/accommodation/jean-carlo-emer-v0BeWfENFaQ-unsplash.jpg', '/uploads/jean-carlo-emer-v0BeWfENFaQ-unsplash-746ch.webp', 5952, 3968, '', '', '', '', NULL, '', NULL, 'S', 4, 39, NULL, NULL, NULL),
(444, '/library/images/accommodation/rowan-heuvel-bjej8BY1JYQ-unsplash.jpg', '/uploads/rowan-heuvel-bjej8BY1JYQ-unsplash-8hw4r.webp', 5616, 3744, '', '', '', '', NULL, '', NULL, 'S', 5, 39, NULL, NULL, NULL),
(445, '/library/images/accommodation/vidar-nordli-mathisen-JkMkp2qL1vc-unsplash.jpg', '/uploads/vidar-nordli-mathisen-JkMkp2qL1vc-unsplash-mk3ov.webp', 2880, 1890, '', '', '', '', NULL, '', NULL, 'S', 6, 39, NULL, NULL, NULL),
(446, '/library/images/escape/pexels-ahmad-syahrir-758744.jpg', '/uploads/pexels-ahmad-syahrir-758744-qqctz.webp', 1626, 1080, '', '', '', '', NULL, '', NULL, 'S', 1, 40, NULL, NULL, NULL),
(447, '/library/images/escape/pexels-dominika-roseclay-4490183.jpg', '/uploads/pexels-dominika-roseclay-4490183-zyuzb.webp', 1535, 1080, '', '', '', '', NULL, '', NULL, 'S', 2, 40, NULL, NULL, NULL),
(448, '/library/images/escape/pexels-ian-beckley-2440021.jpg', '/uploads/pexels-ian-beckley-2440021-ysy4h.webp', 1619, 1080, '', '', '', '', NULL, '', NULL, 'S', 3, 40, NULL, NULL, NULL),
(449, '/library/images/escape/pexels-life-of-pix-7640.jpg', '/uploads/pexels-life-of-pix-7640-224iq.webp', 1620, 1080, '', '', '', '', NULL, '', NULL, 'S', 4, 40, NULL, NULL, NULL),
(450, '/library/images/escape/pexels-vladimir-kudinov-36372.jpg', '/uploads/pexels-vladimir-kudinov-36372-nqnvl.webp', 1620, 1080, '', '', '', '', NULL, '', NULL, 'S', 5, 40, NULL, NULL, NULL),
(451, '/library/images/escape/pexels-nubia-navarro-nubikini-386007.jpg', '/uploads/pexels-nubia-navarro-nubikini-386007-f5t44.webp', 1620, 1080, '', '', '', '', NULL, '', NULL, 'S', 6, 40, NULL, NULL, NULL),
(455, '/library/images/Highlights/tile-chef-420x250.jpg', '/uploads/tile-chef-420x250-mukex.webp', 420, 250, '', '', '', '', NULL, '', NULL, 'S', 1, 31, NULL, NULL, NULL),
(456, '/library/images/Highlights/woman-eating-pizza-and-drinking-beer-at-the-restau-2022-11-14-13-03-20-utc.jpg', '/uploads/woman-eating-pizza-and-drinking-beer-at-the-restau-2022-11-14-13-03-20-utc-gbqau.webp', 550, 561, '', '', '', '', NULL, '', NULL, 'S', 2, 31, NULL, NULL, NULL),
(457, '/library/images/Highlights/restaurant-feature-1045x600.jpg', '/uploads/restaurant-feature-1045x600-pgx5d.webp', 1045, 600, '', '', '', '', NULL, '', NULL, 'S', 3, 31, NULL, NULL, NULL),
(464, '/library/images/Banners/banner-about-us.jpg', '/uploads/banner-about-us-1l0ls.webp', 1920, 560, '', '', 'sasdd', '', NULL, '', NULL, 'S', 1, 36, NULL, NULL, NULL),
(465, '/library/images/Banners/banner-restaurant.jpg', '/uploads/banner-restaurant-sud10.webp', 1920, 560, '', '', 'sadasd', '', NULL, '', NULL, 'S', 2, 36, NULL, NULL, NULL),
(466, '/library/images/Banners/banner-packages.jpg', '/uploads/banner-packages-kw2v9.webp', 1920, 560, '', '', '', '', NULL, '', NULL, 'S', 3, 36, NULL, NULL, NULL),
(473, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'LAQZfeETFbg', 'V', NULL, 27, NULL, NULL, NULL),
(477, '/library/images/balis-best-restaurants.jpg', '/uploads/balis-best-restaurants-jsmn8.webp', 940, 395, '', '', '', '', NULL, '', NULL, 'S', 1, 27, NULL, NULL, NULL),
(478, '/library/images/cape-kidnappers_evening-shot-b3unt.jpg', '/uploads/cape-kidnappers_evening-shot-b3unt-kffdv.webp', 625, 420, '', '', '', '', NULL, '', NULL, 'S', 2, 27, NULL, NULL, NULL),
(479, '/library/images/dsc_0288.jpg', '/uploads/dsc_0288-xdidn.webp', 1626, 1080, '', '', '', '', NULL, '', NULL, 'S', 3, 27, NULL, NULL, NULL),
(480, '/library/bures/Stay0.png', '/uploads/dsc_0288-xdidn.webp', 1626, 1080, '', '', '', '', NULL, '', NULL, 'H', 1, 41, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `highlight`
--

CREATE TABLE `highlight` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `thumb_image_path` varchar(255) DEFAULT NULL,
  `image_alt_txt` varchar(255) DEFAULT NULL,
  `status` enum('A','D','H') NOT NULL DEFAULT 'H',
  `rank` int(11) DEFAULT 0,
  `page_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `highlight`
--

INSERT INTO `highlight` (`id`, `name`, `short_description`, `image_path`, `thumb_image_path`, `image_alt_txt`, `status`, `rank`, `page_id`, `url`, `button_text`) VALUES
(1, 'Highlight 01 with a long heading to test what can we add until for a 100 characters with spaces stop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel volutpat tortor, quis consequat ligula. Mauris consequat tellus ac dui vestibul', '/library/images/general/aerial-view-1149621_1920.jpg', '/uploads/aerial-view-1149621_1920-rqcy6.jpg', 'Local Expert Guides Alt text', 'D', 5, NULL, NULL, NULL),
(2, 'Highlight 01 with a long heading to test what can we add until for a 100 characters with spaces stop add more than 00 chard', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel volutpat tortor, quis consequat ligula. Mauris consequat tellus ac dui vestibul', '/library/images/general/johannes-ludwig-348591-unsplash.jpg', '/uploads/johannes-ludwig-348591-unsplash-xvjc5.jpg', 'Flexibility Alt Text', 'D', 3, NULL, NULL, NULL),
(3, 'Highlight 05 with a long heading to test what can we add until for a 100 characters with spaces stop add more and see', 'Highlight 01 with a long heading to test what can we add until for a 100 characters with spaces stopHighlight 01 with a long heading to test what can', '/library/images/general/kace-rodriguez-OgB2ZHA49bU-unsplash.jpg', '/uploads/kace-rodriguez-OgB2ZHA49bU-unsplash-7damx.jpg', 'Hidden Trails Alt text', 'D', 2, NULL, NULL, NULL),
(4, 'Highlight 01 with a long heading to test what can we add until for a 100 characters with spaces stop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel volutpat tortor, quis consequat ligula. Mauris consequat tellus ac dui vestibul', '/library/images/general/jesse-gardner-4esAX0n8dOA-unsplash.jpg', '/uploads/jesse-gardner-4esAX0n8dOA-unsplash-ssyqp.jpg', 'Curabitur ac', 'D', 0, NULL, NULL, NULL),
(5, 'Highlight 01 with a long heading to test what can we add until for a 100 characters with spaces stop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel volutpat tortor, quis consequat ligula. Mauris consequat tellus ac dui ves stop', '/library/images/general/laura-smetsers-cievKSNSmac-unsplash.jpg', '/uploads/laura-smetsers-cievKSNSmac-unsplash-62vyi.jpg', 'Highlight 01 Alt Text', 'D', 6, 2, NULL, 'qwer'),
(6, 'Enjoy Free Wi-Fi', 'We Believe That When A Hotel Advertises Free Wifi, They Should Provide Travelers With A Fast And Reliable Connection.', '/library/images/Icons/tree.png', '/uploads/tree-s74yq.webp', 'tick', 'A', 1, 62, NULL, NULL),
(7, 'Concierge Service', 'Top-Tier Hotels Have A Lot To Recommend Them: Luxurious Spas, Twice-Daily Room Service And Superb On-Site Restaurants.', '/library/images/Icons/icon-tick.png', '/uploads/icon-tick-3mcdd.webp', 'tick', 'A', 2, NULL, NULL, NULL),
(8, 'Pool Access', 'Hotel Has Pool Room, In Particular, Hotels Based In Big Cities Might Require Keycard Access To Get Into The Pool. Spa, And Amenity Access.', '/library/images/Icons/icon-tick.png', '/uploads/icon-tick-6sc9f.webp', 'tick', 'A', 3, NULL, NULL, NULL),
(9, 'Our Restaurant', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Lorem ipsum dolor sit STOP', '/library/images/Highlights/woman-eating-pizza-and-drinking-beer-at-the-restau-2022-11-14-13-03-20-utc.jpg', '/uploads/woman-eating-pizza-and-drinking-beer-at-the-restau-2022-11-14-13-03-20-utc-d3nus.webp', 'image', 'A', 4, 63, NULL, NULL),
(10, 'Our Pool', NULL, '/library/images/Highlights/highlight-ourpool-420x250.jpg', '/uploads/highlight-ourpool-420x250-8xcvr.webp', 'pool', 'A', 0, NULL, NULL, NULL),
(11, 'Room Service1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimddddd STOP', '/library/images/Highlights/tile-roomservice-420x250.jpg', '/uploads/tile-roomservice-420x250-x8z3u.webp', 'room', 'A', 0, NULL, NULL, NULL),
(12, 'Heaven', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '/library/images/Accommodation/highlights-featured.jpg', '/uploads/highlights-featured-ygh6t.webp', NULL, 'A', 0, 2, NULL, NULL),
(13, 'Cover-Restaurant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/library/images/Highlights/700x450.jpg', '/uploads/700x450-7vi0m.webp', 'Cover700x450', 'D', 0, NULL, '/restaurant', NULL),
(14, 'Cover-Wedding', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q', '/library/images/Highlights/700x450.jpg', '/uploads/700x450-7y475.webp', 'edasfasdf', 'D', 0, 2, NULL, NULL),
(15, 'Cover-Conference', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q', '/library/images/Highlights/pexels-pixabay-271639.jpg', '/uploads/pexels-pixabay-271639-197m6.webp', NULL, 'D', 0, NULL, NULL, NULL),
(16, 'Tile 420 x250', 'Lorem ipsum dolor sit amet, in nam denique suavitate repudiandae, homero dictas omnesque duo et. Novum dignissim consectetuer ei mel. Ne patrioque con', '/library/images/Accommodation/family-450x250.jpg', '/uploads/family-450x250-x2ujd.webp', NULL, 'A', 0, NULL, NULL, NULL),
(17, 'Our Location', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/library/images/Highlights/highlight-location-420x250.jpg', '/uploads/highlight-location-420x250-lgsjz.webp', 'location', 'A', 0, 11, NULL, NULL),
(18, 'Our Chef', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/library/images/Highlights/tile-chef-420x250.jpg', '/uploads/tile-chef-420x250-b6717.webp', 'chef', 'A', 0, NULL, NULL, NULL),
(19, 'Desserts', 'Daboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptatem. sed do eiusmod tempor incididunt ut labore.', '/library/images/Highlights/tile-desserts-420x250.jpg', '/uploads/tile-desserts-420x250-sy5yw.webp', 'Desserts', 'A', 0, NULL, NULL, NULL),
(20, 'Interiors', 'Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '/library/images/Highlights/tile-interiors420x250.jpg', '/uploads/tile-interiors420x250-fb6rp.webp', 'Interiors', 'A', 0, NULL, NULL, NULL),
(21, 'Our Featured Restaurant', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam...', '/library/images/Highlights/restaurant-feature-1045x600.jpg', '/uploads/restaurant-feature-1045x600-7987e.webp', 'restaurant pic', 'A', 0, 63, NULL, NULL),
(22, 'No link highlight', 'Short description', '/library/images/Highlights/highlight-location-420x250.jpg', '/uploads/highlight-location-420x250-ipk3k.webp', NULL, 'A', 0, NULL, NULL, NULL),
(23, 'SVG Added', 'gsdfasdcasd asdfasdfasdfasdfasdfasdfasdfasdf', '/library/images/icons/fork-and-knife.svg', '/uploads/fork-and-knife-6s6n4.webp', NULL, 'A', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `highlight_style`
--

CREATE TABLE `highlight_style` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `thumb_path` varchar(255) DEFAULT NULL,
  `is_default` enum('Y','N') DEFAULT 'N',
  `status` enum('A','D','H') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `highlight_style`
--

INSERT INTO `highlight_style` (`id`, `title`, `thumb_path`, `is_default`, `status`, `rank`) VALUES
(1, 'Default', 'modules/highlights/graphics/style-gallery.png', 'Y', 'A', 1),
(2, 'Tile', 'modules/highlights/graphics/style-tiles.png', 'N', 'A', 2),
(3, 'Icon', 'modules/highlights/graphics/style-icon-left.png', 'N', 'A', 3);

-- --------------------------------------------------------

--
-- Table structure for table `instagram_accounts`
--

CREATE TABLE `instagram_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `client_id` varchar(100) DEFAULT NULL,
  `client_secret` varchar(255) DEFAULT NULL,
  `access_token` mediumtext DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_production_mode` enum('Y','N') DEFAULT 'N',
  `refresh_token_time` datetime DEFAULT NULL,
  `create_token_time` datetime DEFAULT NULL,
  `last_feed_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `instagram_accounts`
--

INSERT INTO `instagram_accounts` (`id`, `username`, `client_id`, `client_secret`, `access_token`, `url`, `is_production_mode`, `refresh_token_time`, `create_token_time`, `last_feed_datetime`) VALUES
(1, 'hugo.the.hawk', '192740112056189', 'a2cb76906cce811b1f3e7a4b18f18493', 'IGQVJXcG4wSkY1RXpfTnNhXzBkeDYyREs0Rk1nb3NoVEtxY21xNVFKYV9MTmRyOHoxNEh5WTZAySEFPbG8wbXF6cXJSbExkek9IXzdHM1JGd0hsRFFJMVNRc3o1SXFQSzRSUDUyNVFSOTJzRDNKeWkyQgZDZD', 'https://www.instagram.com/hugo.the.hawk', 'Y', '2023-06-23 15:25:16', '2023-06-23 15:25:16', '2023-06-23 11:25:16'),
(2, 'hugo.the.hawk', '192740112056189', 'a2cb76906cce811b1f3e7a4b18f18493', NULL, 'https://www.instagram.com/hugo.the.hawk', 'N', '2025-01-20 13:07:24', '2023-06-23 15:25:16', '2024-11-01 08:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_feeds`
--

CREATE TABLE `instagram_feeds` (
  `id` int(11) NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `media_type` varchar(100) DEFAULT NULL,
  `media_url` mediumtext DEFAULT NULL,
  `media_thumb_url` varchar(255) DEFAULT NULL,
  `thumbnail_url` mediumtext DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `caption` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailchimp_account`
--

CREATE TABLE `mailchimp_account` (
  `id` int(11) NOT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `is_production_mode` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mailchimp_account`
--

INSERT INTO `mailchimp_account` (`id`, `api_key`, `is_production_mode`) VALUES
(1, '6577a17dd0a66458981c0b4126a86b45-us15', 'N'),
(2, '6577a17dd0a66458981c0b4126a86b45-us15', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mailchimp_lists`
--

CREATE TABLE `mailchimp_lists` (
  `id` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `option_key` varchar(100) DEFAULT NULL,
  `option_value` varchar(50) DEFAULT NULL,
  `mailchimp_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mailchimp_lists`
--

INSERT INTO `mailchimp_lists` (`id`, `label`, `option_key`, `option_value`, `mailchimp_account_id`) VALUES
(1, 'Primary List Id', 'primary_list_id', 'd48467a322', 1),
(2, 'Primary List Id', 'primary_list_id', 'd48467a322', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `mod_id` int(11) NOT NULL COMMENT 'Primary key for include',
  `mod_name` varchar(255) NOT NULL COMMENT 'Include name',
  `mod_path` varchar(255) NOT NULL COMMENT 'Include URL/file path (exclude the extension)',
  `mod_showincms` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_path`, `mod_showincms`) VALUES
(1, 'Hero Banner', 'herobanner', 'N'),
(2, 'Gallery', 'gallery', 'N'),
(3, 'Contact', 'contact', 'N'),
(4, 'Newsletter', 'newsletter', 'N'),
(5, 'Quicklinks', 'quicklinks', 'Y'),
(6, 'Reviews', 'reviews', 'Y'),
(7, 'Blog', 'blog', 'Y'),
(8, 'Google Map', 'map', 'Y'),
(9, 'FAQs', 'faq', 'Y'),
(11, 'Social Media', 'socialmedia', 'N'),
(12, 'Highlights', 'highlights', 'Y'),
(13, 'Partners', 'partners', 'Y'),
(14, 'Accommodation', 'accommodation', 'Y'),
(15, 'Content', 'content', 'N'),
(16, 'Experience', 'experience', 'Y'),
(18, 'Instagram', 'instagram', 'Y'),
(20, 'Voucher', 'voucher', 'N'),
(21, 'Form', 'form', 'N'),
(22, 'Showcase', 'showcase', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `module_pages`
--

CREATE TABLE `module_pages` (
  `modpages_id` int(11) NOT NULL,
  `modpages_rank` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `module_pages`
--

INSERT INTO `module_pages` (`modpages_id`, `modpages_rank`, `mod_id`, `page_id`) VALUES
(29, 1, 8, 36),
(144, 7, 3, 47),
(269, 1, 8, 35),
(319, 1, 14, 48),
(320, 3, 8, 48),
(321, 2, 12, 48),
(750, 1, 16, 17),
(751, 2, 6, 17),
(757, 8, 14, 51),
(758, 2, 7, 51),
(759, 3, 16, 51),
(760, 4, 9, 51),
(761, 5, 8, 51),
(762, 6, 12, 51),
(763, 7, 18, 51),
(764, 1, 13, 51),
(822, 7, 9, 61),
(823, 6, 8, 61),
(824, 4, 18, 61),
(825, 3, 13, 61),
(826, 1, 6, 61),
(1574, 1, 18, 8),
(1575, 8, 13, 8),
(1619, 1, 8, 11),
(1620, 2, 13, 11),
(1791, 1, 9, 6),
(1792, 4, 12, 6),
(1793, 2, 5, 6),
(1825, 1, 7, 9),
(1826, 4, 5, 9),
(1884, 10, 13, 64),
(1920, 1, 14, 60),
(1976, 15, 13, 66),
(1977, 8, 5, 66),
(1978, 10, 6, 66),
(1985, 2, 12, 10),
(1986, 3, 5, 10),
(1987, 1, 6, 10),
(2036, 1, 14, 63),
(2037, 8, 13, 63),
(2038, 2, 5, 63),
(2039, 6, 6, 63),
(2069, 8, 12, 47),
(2116, 2, 12, 4),
(2117, 5, 13, 4),
(2118, 3, 5, 4),
(2146, 8, 6, 1),
(2147, 1, 22, 1),
(2150, 1, 14, 2),
(2151, 3, 12, 2),
(2152, 10, 13, 2),
(2153, 5, 5, 2),
(2154, 8, 6, 2),
(2161, 1, 16, 14),
(2162, 5, 12, 14),
(2163, 12, 13, 14),
(2164, 10, 5, 14),
(2166, 1, 14, 69);

-- --------------------------------------------------------

--
-- Table structure for table `module_settings`
--

CREATE TABLE `module_settings` (
  `id` int(11) NOT NULL,
  `option_name` varchar(100) DEFAULT NULL,
  `option_value` text DEFAULT NULL,
  `module_key` varchar(50) DEFAULT NULL,
  `language_id` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `module_settings`
--

INSERT INTO `module_settings` (`id`, `option_name`, `option_value`, `module_key`, `language_id`) VALUES
(1, 'imp_page', '2', 'Accommodation', 1),
(2, 'heading', 'Featured Posts', 'Blog', 1),
(3, 'description', 'Donec molestie et purus in finibus. Praesent dignissim consequat accumsan. Donec varius dolor massa, ut ornare nulla viverra non.', 'Blog', 1),
(4, 'button_text', 'View All Posts', 'Blog', 1),
(5, 'imp_page', '9', 'Blog', 1),
(6, 'heading', 'Get in Touch', 'Contact', 1),
(7, 'description', 'Have any questions? Contact us by clicking on the button below', 'Contact', 1),
(8, 'form_heading', 'Send us an email', 'Contact', 1),
(9, 'contact_email_address', 'hardik@tomahawk.co.nz', 'Contact', 1),
(10, 'imp_page', '11', 'Contact', 1),
(11, 'heading', 'Featured Events', 'Event', 1),
(12, 'description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a tortor dignissim, ultrices tellus vitae, venenatis purus.', 'Event', 1),
(13, 'button_text', 'View All Events', 'Event', 1),
(14, 'imp_page', '3', 'Event', 1),
(19, 'heading', NULL, 'FAQ', 1),
(20, 'description', NULL, 'FAQ', 1),
(21, 'button_text', NULL, 'FAQ', 1),
(22, 'type', 'A', 'FAQ', 1),
(23, 'default_state', 'E', 'FAQ', 1),
(24, 'icon_expand', 'fa-angle-down', 'FAQ', 1),
(25, 'icon_collapse', 'fa-angle-up', 'FAQ', 1),
(26, 'imp_page', NULL, 'FAQ', 1),
(27, 'imp_page', '8', 'Gallery', 1),
(28, 'cover_photo_path', '/library/images/accommodation/vidar-nordli-mathisen-JkMkp2qL1vc-unsplash.jpg', 'Google Map', 1),
(29, 'button_text', 'View Map', 'Google Map', 1),
(30, 'heading', 'Featured Articles', 'Media Article', 1),
(31, 'description', 'Aliquam malesuada arcu vitae placerat fringilla.', 'Media Article', 1),
(32, 'button_text', 'View All Articles', 'Media Article', 1),
(33, 'imp_page', '7', 'Media Article', 1),
(34, 'heading', 'Our Newsletter', 'Newsletter', 1),
(35, 'description', 'Description asdasdasdasd', 'Newsletter', 1),
(36, 'heading', 'What our customers say', 'Review', 1),
(37, 'button_text', 'Read More', 'Review', 1),
(38, 'background_photo', NULL, 'Review', 1),
(39, 'limit', '3', 'Review', 1),
(40, 'order_by', 'A', 'Review', 1),
(41, 'speed', '5', 'Review', 1),
(42, 'autoplay', 'Y', 'Review', 1),
(43, 'navigation', 'D', 'Review', 1),
(44, 'imp_page', '10', 'Review', 1),
(45, 'heading', 'Look at our package deals', 'Experience', 1),
(46, 'description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'Experience', 1),
(47, 'button_text', 'Find out more', 'Experience', 1),
(48, 'imp_page', '14', 'Experience', 1),
(49, 'button_text', 'Find out more', 'Accommodation', 1),
(50, 'heading', 'Featured Accommodation', 'Accommodation', 1),
(51, 'description', 'Content Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', 'Accommodation', 1),
(52, 'heading', 'Here&#039;s what makes our tours so special and ca stop', 'Highlight', 1),
(53, 'heading', 'Connect with us', 'Social Media Account', 1),
(54, 'description', 'Check us out on Social Media', 'Social Media Account', 1),
(56, 'experince_heading', 'Explore Other Experiences', 'Experience', 1),
(57, 'accommodation_heading', 'Explore Other Accommodations', 'Accommodation', 1),
(58, 'imp_page', '49', 'Voucher', 1),
(59, 'colormap', 'G', 'Google Map', 1),
(60, 'page_id', NULL, 'Highlight', 1),
(61, 'url', 'https://www.google.com/', 'Highlight', 1),
(62, 'button_text', 'BUTTON HERE', 'Highlight', 1),
(63, 'accom_bookctaheading', 'Accomodation Settings CTA Banner', 'Accommodation', 1),
(64, 'imp_page', NULL, 'Accommodation Category', 1),
(65, 'description', NULL, 'Accommodation Category', 1),
(66, 'button_text', NULL, 'Accommodation Category', 1),
(67, 'heading', NULL, 'Accommodation Category', 1),
(68, 'list_accommodationcategory_heading', 'Accommodation Category Listing Heading', 'Accommodation Category', 1),
(69, 'slideshow_speed', '2000', 'Accommodation Category', 1),
(70, 'module_display', 'Acc', 'Accommodation', 1),
(71, 'menu_display', 'AcCat', 'Accommodation', 1),
(72, 'enquiry_btntxt', 'Enquire Now', 'Accommodation', 1),
(73, 'enquiry_btnurl', '/contact-us', 'Accommodation', 1),
(74, 'show_moreaccom', 'Y', 'Accommodation', 1),
(75, 'allaccomfiltertext', 'All Villas', 'Accommodation Category', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_templates`
--

CREATE TABLE `module_templates` (
  `tmplmod_id` int(11) NOT NULL,
  `tmplmod_rank` int(11) NOT NULL,
  `tmpl_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `module_templates`
--

INSERT INTO `module_templates` (`tmplmod_id`, `tmplmod_rank`, `tmpl_id`, `mod_id`) VALUES
(1, 26, 1, 1),
(2, 24, 1, 2),
(3, 6, 1, 4),
(4, 23, 1, 5),
(8, 21, 1, 11),
(9, 22, 1, 3),
(10, 23, 1, 15),
(13, 20, 1, 20),
(14, 11, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `page_has_highlight`
--

CREATE TABLE `page_has_highlight` (
  `item_key` varchar(50) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `highlight_id` int(11) DEFAULT NULL,
  `rank` tinyint(4) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_has_highlight`
--

INSERT INTO `page_has_highlight` (`item_key`, `item_id`, `highlight_id`, `rank`, `is_featured`) VALUES
('experience_id', 4, 17, NULL, 0),
('experience_id', 4, 10, NULL, 0),
('experience_id', 4, 11, NULL, 0),
('experience_id', 5, 17, 1, 0),
('experience_id', 5, 10, 2, 0),
('experience_id', 5, 11, 3, 0),
('page_id', 6, 22, 1, 0),
('page_id', 6, 18, NULL, 0),
('page_id', 6, 17, NULL, 0),
('experience_id', 3, 17, 1, 0),
('experience_id', 3, 10, 2, 0),
('experience_id', 3, 11, 3, 0),
('page_id', 10, 17, NULL, 0),
('page_id', 10, 10, NULL, 0),
('page_id', 10, 9, NULL, 0),
('page_id', 63, 19, 2, 0),
('page_id', 63, 20, 3, 0),
('page_id', 63, 18, 1, 0),
('page_id', 4, 22, 1, 0),
('page_id', 4, 17, 2, 0),
('page_id', 4, 10, 3, 0),
('page_id', 4, 9, NULL, 0),
('page_id', 4, 21, NULL, 1),
('page_id', 1, 23, NULL, 0),
('page_id', 1, 6, NULL, 0),
('page_id', 1, 7, NULL, 0),
('page_id', 1, 8, NULL, 0),
('page_id', 1, 19, NULL, 1),
('page_id', 1, 12, NULL, 1),
('page_id', 1, 20, NULL, 1),
('page_id', 1, 21, NULL, 1),
('accommodation_id', 11, 17, NULL, 0),
('accommodation_id', 11, 10, NULL, 0),
('accommodation_id', 11, 11, NULL, 0),
('accommodation_id', 2, 19, NULL, 0),
('accommodation_id', 2, 12, NULL, 0),
('accommodation_id', 2, 20, NULL, 0),
('accommodation_id', 2, 18, NULL, 1),
('accommodation_id', 2, 21, NULL, 1),
('accommodation_id', 1, 17, 1, 0),
('accommodation_id', 1, 10, 2, 0),
('accommodation_id', 1, 11, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_has_quicklinks`
--

CREATE TABLE `page_has_quicklinks` (
  `item_key` varchar(50) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quicklink_id` int(11) DEFAULT NULL,
  `rank` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `page_has_quicklinks`
--

INSERT INTO `page_has_quicklinks` (`item_key`, `item_id`, `quicklink_id`, `rank`) VALUES
('page_id', 15, 3, NULL),
('media_article_id', 1, 2, 1),
('media_article_id', 1, 4, 3),
('media_article_id', 1, 3, 2),
('post_category_id', 6, 2, 1),
('post_category_id', 6, 1, 2),
('post_category_id', 6, 6, 3),
('accommodation_id', 7, 2, 1),
('accommodation_id', 7, 1, 2),
('accommodation_id', 7, 6, 3),
('experience_id', 7, 2, 1),
('experience_id', 7, 1, 2),
('experience_id', 7, 6, 3),
('blog_post_id', 8, 2, 1),
('blog_post_id', 8, 1, 2),
('blog_post_id', 8, 6, 3),
('page_id', 48, 2, 1),
('page_id', 48, 6, 2),
('page_id', 50, 7, NULL),
('post_category_id', 1, 2, NULL),
('post_category_id', 1, 1, NULL),
('post_category_id', 1, 4, NULL),
('post_category_id', 1, 3, NULL),
('post_category_id', 2, 2, NULL),
('post_category_id', 2, 1, NULL),
('page_id', 53, 11, 1),
('page_id', 53, 12, 4),
('page_id', 53, 13, 2),
('page_id', 53, 10, 10),
('page_id', 53, 9, NULL),
('page_id', 51, 7, 1),
('page_id', 51, 8, NULL),
('page_id', 51, 2, 3),
('page_id', 51, 6, 2),
('page_id', 61, 7, 1),
('page_id', 61, 8, 3),
('page_id', 61, 2, 4),
('page_id', 61, 1, 2),
('experience_id', 4, 27, 3),
('experience_id', 4, 26, 1),
('experience_id', 4, 15, 2),
('page_id', 65, 27, 3),
('page_id', 65, 26, 1),
('page_id', 65, 15, 2),
('page_id', 49, 16, NULL),
('page_id', 49, 17, NULL),
('page_id', 49, 22, NULL),
('page_id', 6, 23, NULL),
('page_id', 6, 24, NULL),
('page_id', 6, 25, NULL),
('page_id', 6, 18, NULL),
('page_id', 9, 21, NULL),
('page_id', 9, 19, NULL),
('page_id', 62, 27, 3),
('page_id', 62, 26, 1),
('page_id', 62, 15, 2),
('experience_id', 3, 27, 3),
('experience_id', 3, 26, 1),
('experience_id', 3, 15, 2),
('page_id', 60, 27, NULL),
('page_id', 60, 26, NULL),
('page_id', 60, 15, NULL),
('page_id', 66, 27, NULL),
('page_id', 66, 26, NULL),
('page_id', 66, 15, NULL),
('page_id', 10, 16, NULL),
('page_id', 10, 22, NULL),
('page_id', 10, 17, NULL),
('page_id', 63, 27, 3),
('page_id', 63, 26, 1),
('page_id', 63, 15, 2),
('page_id', 4, 27, 3),
('page_id', 4, 26, 1),
('page_id', 4, 15, 2),
('page_id', 1, 27, 3),
('page_id', 1, 14, NULL),
('page_id', 1, 26, 1),
('page_id', 1, 15, 2),
('page_id', 1, 18, NULL),
('accommodation_id', 3, 27, NULL),
('accommodation_id', 3, 26, NULL),
('accommodation_id', 3, 15, NULL),
('accommodation_id', 4, 27, NULL),
('accommodation_id', 4, 26, NULL),
('accommodation_id', 4, 15, NULL),
('accommodation_id', 11, 27, NULL),
('accommodation_id', 11, 26, NULL),
('accommodation_id', 11, 15, NULL),
('page_id', 2, 27, 2),
('page_id', 2, 26, 1),
('page_id', 2, 15, 3),
('page_id', 14, 27, 3),
('page_id', 14, 26, 1),
('page_id', 14, 15, 2),
('page_id', 69, 16, NULL),
('page_id', 69, 27, NULL),
('page_id', 69, 22, NULL),
('accommodation_id', 2, 16, NULL),
('accommodation_id', 2, 14, NULL),
('accommodation_id', 2, 15, NULL),
('accommodation_id', 1, 27, NULL),
('accommodation_id', 1, 26, NULL),
('accommodation_id', 1, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_highlight_section`
--

CREATE TABLE `page_highlight_section` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `highlight_style_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_key` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `buttontext` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_highlight_section`
--

INSERT INTO `page_highlight_section` (`id`, `heading`, `description`, `highlight_style_id`, `item_id`, `item_key`, `url`, `buttontext`) VALUES
(1, '', '', NULL, 59, 'page_id', '', ''),
(2, '', '', 3, 1, 'page_id', '', ''),
(3, '', '', 1, 9, 'page_id', '', ''),
(4, '', '', 2, 14, 'page_id', '', ''),
(5, '', '', 1, 47, 'page_id', '', ''),
(6, 'My Heading', 'My Description', 2, 4, 'page_id', '', ''),
(7, '', '', 3, 62, 'page_id', '', ''),
(8, '', '', 1, 11, 'page_id', '', ''),
(9, '', '', 3, 2, 'page_id', '', ''),
(10, '', '', 1, 8, 'page_id', '', ''),
(11, 'Property Features', 'Description for properties', 2, 3, 'experience_id', '', ''),
(12, 'Highlight Introduction', 'fasdfasdf asadfsdfsfsdsdfgsdfgfg', 2, 2, 'accommodation_id', '', ''),
(13, 'Restaurant Features', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 2, 63, 'page_id', '', ''),
(14, '', '', 1, 6, 'page_id', '', ''),
(15, 'Property Features', '', 2, 4, 'experience_id', '', ''),
(16, 'Property Features', '', 2, 5, 'experience_id', '', ''),
(17, '', '', 1, 1, 'experience_id', '', ''),
(18, '', '', 1, 64, 'page_id', '', ''),
(19, '', '', 1, 65, 'page_id', '', ''),
(20, '', '', 1, 66, 'page_id', '', ''),
(21, '', '', 1, 49, 'page_id', '', ''),
(22, 'Hotel Features', '', 2, 1, 'accommodation_id', '', ''),
(23, '', '', 1, 3, 'accommodation_id', '', ''),
(24, '', '', 1, 4, 'accommodation_id', '', ''),
(25, 'Hotel Features', '', 2, 11, 'accommodation_id', '', ''),
(26, 'My Heading', 'My Description', 2, 10, 'page_id', '', ''),
(27, '', '', 1, 60, 'page_id', '', ''),
(28, '', '', 1, 67, 'page_id', '', ''),
(29, '', '', 1, 13, 'page_id', '', ''),
(30, '', '', 1, 68, 'page_id', '', ''),
(31, '', '', 1, 12, 'accommodation_id', '', ''),
(32, '', '', 1, 69, 'page_id', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_data`
--

CREATE TABLE `page_meta_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  `footer_menu` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `full_url` varchar(255) DEFAULT NULL,
  `introduction` mediumtext DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `thumb_photo_path` varchar(255) DEFAULT NULL,
  `photo_alt_text` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `thumb_cover_photo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_meta_description` mediumtext DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `page_code_head_close` mediumtext DEFAULT NULL,
  `page_code_body_open` mediumtext DEFAULT NULL,
  `page_code_body_close` mediumtext DEFAULT NULL,
  `page_structure_data_markup` mediumtext DEFAULT NULL,
  `item_key` varchar(50) DEFAULT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('A','H','D') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `slideshow_id` int(11) DEFAULT NULL,
  `template_id` int(11) NOT NULL,
  `page_meta_index_id` int(11) DEFAULT 1,
  `page_custom_code` mediumtext DEFAULT NULL,
  `valid_for` int(11) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `cta_bunner_title` varchar(255) DEFAULT NULL,
  `cta_bunner_description` varchar(255) DEFAULT NULL,
  `cta_bunner_primary_url` varchar(255) DEFAULT NULL,
  `cta_bunner_primary_external_url` varchar(255) DEFAULT NULL,
  `cta_bunner_primary_button_text` varchar(45) DEFAULT NULL,
  `cta_bunner_secondary_url` varchar(255) DEFAULT NULL,
  `cta_bunner_secondary_external_url` varchar(255) DEFAULT NULL,
  `cta_bunner_secondary_button_text` varchar(45) DEFAULT NULL,
  `reservation_banner_title` varchar(255) DEFAULT NULL,
  `reservation_banner_button_text` varchar(255) DEFAULT NULL,
  `reservation_banner_button_url` varchar(255) DEFAULT NULL,
  `cta_heading` varchar(255) DEFAULT NULL,
  `cta_btn1` varchar(45) DEFAULT NULL,
  `cta_btn1_url` varchar(100) DEFAULT NULL,
  `cta_btn2` varchar(45) DEFAULT NULL,
  `cta_btn2_url` varchar(100) DEFAULT NULL,
  `slideshow_page_id` int(11) DEFAULT NULL,
  `prefilter_catid` int(11) DEFAULT NULL,
  `prefilter_catname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `page_meta_data`
--

INSERT INTO `page_meta_data` (`id`, `name`, `menu_label`, `footer_menu`, `heading`, `sub_heading`, `url`, `full_url`, `introduction`, `short_description`, `description`, `photo_path`, `thumb_photo_path`, `photo_alt_text`, `cover_photo`, `thumb_cover_photo`, `title`, `meta_description`, `og_title`, `og_meta_description`, `og_image`, `page_code_head_close`, `page_code_body_open`, `page_code_body_close`, `page_structure_data_markup`, `item_key`, `is_locked`, `status`, `rank`, `date_created`, `date_updated`, `date_deleted`, `created_by`, `updated_by`, `gallery_id`, `slideshow_id`, `template_id`, `page_meta_index_id`, `page_custom_code`, `valid_for`, `external_url`, `features`, `cta_bunner_title`, `cta_bunner_description`, `cta_bunner_primary_url`, `cta_bunner_primary_external_url`, `cta_bunner_primary_button_text`, `cta_bunner_secondary_url`, `cta_bunner_secondary_external_url`, `cta_bunner_secondary_button_text`, `reservation_banner_title`, `reservation_banner_button_text`, `reservation_banner_button_url`, `cta_heading`, `cta_btn1`, `cta_btn1_url`, `cta_btn2`, `cta_btn2_url`, `slideshow_page_id`, `prefilter_catid`, `prefilter_catname`) VALUES
(1, 'Home', NULL, 'Home', 'Welcome To Inspire Island Beach Resort', NULL, 'home', '/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.</p>', NULL, NULL, NULL, NULL, '', 'My Meta Title Lorem ipsum dolor sit amet', 'My Meta description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec arcu massa, egestas non nisl volutpat, tincidunt malesuada ligula. Donec lobortis turpis tempor est porta vulputate at non nisi.', 'My OG Title Lorem ipsum dolor sit amet', 'OG Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec arcu massa, egestas non nisl volutpat, tincidunt', '/library/images/general/casey-horner-DXu4o-QI1VY-unsplash.jpg', '', '', '', '', 'page_id', 1, 'A', 1, NULL, '2026-01-14 11:16:30', NULL, NULL, 1, NULL, 27, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Accommodation', 'Accommodation', NULL, 'Our Rooms', NULL, 'accommodation', '/accommodation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'H', 2, '2019-08-29 10:16:22', '2026-01-23 03:14:03', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, '<ul><li>Mountain views</li><li>Super king bed</li><li>Fine natural-fiber linens and towels</li><li>Tea and coffee facilities</li><li>Heated floors</li><li>Walk-in rain showers</li><li>Free toiletries</li><li>Local NZ artworks</li><li>Keycard entry and locking</li><li>Blinds and shutters</li><li>Desk and chair</li><li>Luggage rack</li><li>Wardrobe</li><li>Free wifi</li><li>Free car parking</li><li>BBQ facilities</li></ul>', 'Accomodation Page Cta Banner', 'fdsafasdfasdfasdfasd', '/contact-us', NULL, 'Find more', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(4, 'About Us', 'About', NULL, 'About Us', NULL, 'about-us', '/about-us', 'Proin in finibus odio. Nam erat erat, eleifend vitae dictum nec, laoreet nec tortor. Nunc eget lectus odio. Duis porta finibus nisl, in viverra tellus aliquet non.', NULL, NULL, NULL, NULL, NULL, NULL, '', 'About us | Sunair', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 8, '2019-08-29 10:17:48', '2024-11-18 10:08:13', NULL, 1, 1, NULL, 33, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, NULL, NULL),
(6, 'FAQs', 'FAQs', NULL, 'FAQs', NULL, 'faqs', '/about-us/faqs', 'Duis eget nunc iaculis dui gravida pharetra sed vitae nulla. Pellentesque eu gravida purus. Ut non felis nisi. Proin magna sapien, luctus at pellentesque convallis, hendrerit a tortor.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 3, '2019-08-29 10:18:55', '2023-09-20 10:32:36', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Gallery', 'Gallery', NULL, 'Gallery', NULL, 'gallery', '/about-us/gallery', 'Integer pharetra tellus ut posuere porta. Vestibulum euismod eget sem fermentum venenatis. Mauris elementum aliquet orci id convallis. Quisque finibus lectus eu libero posuere sollicitudin.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'Glenorchy is blessed with beautiful views and vistas but to really appreciate it you need to visit!', '', '', '', '', '', '', '', 'page_id', 0, 'A', 5, '2019-08-29 10:20:47', '2023-08-30 11:30:26', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Blog', 'Blog', NULL, 'Our Blog', NULL, 'blog', '/about-us/blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 2, '2019-08-29 10:21:50', '2023-09-21 17:00:16', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Reviews', 'Reviews', NULL, 'Reviews', NULL, 'reviews', '/about-us/reviews', 'Curabitur accumsan nec velit eget iaculis. Morbi quis semper mi, vel vehicula est. Maecenas aliquam tristique ultrices. Cras pharetra, nibh tempor malesuada placerat, purus lorem convallis elit, et lacinia urna sem quis neque. Nam nunc justo, vestibulum molestie tristique a, accumsan sit amet eros.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 4, '2019-08-29 10:22:56', '2023-11-21 12:17:11', NULL, 1, 1, NULL, 37, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Contact Us', 'Contact', NULL, 'Contact Us', NULL, 'contact-us', '/contact-us', 'Proin in finibus odio. Nam erat erat, eleifend vitae dictum nec, laoreet nec tortor. Nunc eget lectus odio. Duis porta finibus nisl, in viverra tellus aliquet non. Aenean ex odio, lobortis id viverra eu, maximus sed enim. Vestibulum fermentum, libero a faucibus vestibulum, nibh tortor condimentum dolor, sed faucibus elit lacus vel neque.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 9, '2019-08-29 10:23:50', '2023-08-30 16:47:18', NULL, 1, 1, NULL, 36, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Terms and Conditions', NULL, 'Terms and Conditions', 'Terms and Conditions', NULL, 'terms-and-conditions', '/terms-and-conditions', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 9, '2019-08-29 10:24:39', '2021-07-23 15:25:08', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '404', NULL, NULL, '404', NULL, '404-page', '/404-page', 'The page you where looking for does not exist. Please use the header navigation to find the correct page.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 11, '2019-08-29 10:25:08', '2023-11-13 14:16:27', NULL, 1, 1, NULL, NULL, 1, 4, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Gardenview Bures', 'Gardenview Bures', NULL, 'Gardenview Bures', NULL, 'gardenview-bures', '/gardenview-bures', 'The Gardenview Bures invite you to embrace island bliss. Imagine unwinding on your private deck, swaying in a hammock, or gathering with loved ones under the dappled sunlight.', 'Morbi auctor hendrerit tortor sed commodo. Proin scelerisque a quam et convallis', NULL, '/library/bures/Stay2.png', NULL, 'Accommodation Lorem ipsum', NULL, NULL, 'Superior Suite', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'A', 2, '2019-08-29 10:32:02', '2026-01-23 10:49:42', NULL, 1, 1, NULL, 36, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Premier Oceanfront 2 Bedroom Pool &amp; Spa Tub Villa', 'Premier Oceanfront 2 Bedroom Pool &amp; Spa Tub Villa', NULL, 'Premier Oceanfront 2 Bedroom Pool &amp; Spa Tub Villa', NULL, 'deluxe-twin-room', '/deluxe-twin-room', 'This is more than a Villa, it&rsquo;s an experience. Extend your summer and soak up paradise in Fiji&rsquo;s most exquisite retreat.&nbsp;Nestled within a private, walled garden at the peninsula&rsquo;s secluded tip, our award-winning villa promises an unparalleled escape.', 'Short Lorem ipsum dolor sit amet, consectetur adipiscing elit, so=', NULL, '/library/bures/Stay1.png', NULL, 'Accommodation Mauris tortor', NULL, NULL, 'Deluxe Twin Room Accommodation', 'Lovely Deluxe Twin Room for a couple', '', '', '', '', '', '', '', 'accommodation_id', 0, 'A', 1, '2019-08-29 10:33:38', '2026-01-23 10:46:12', NULL, 1, 1, 7, 39, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Garden View Room', 'Garden View Room', NULL, 'Garden View Room', NULL, 'garden-view-room', '/garden-view-room', 'Curabitur ac volutpat erat, eget blandit augue. Sed imperdiet laoreet massa. Mauris nibh arcu, semper in enim non, iaculis convallis lectus. Sed ullamcorper euismod velit, sit amet placerat enim rutrum et.', 'Proin imperdiet iaculis quam, vitae rutrum libero consequat sit amet.', NULL, '/library/images/Accommodation/garden-450x250.jpg', NULL, 'Accommodation Eco Cabin plus Bunks', NULL, NULL, 'Garden View Room', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'A', 3, '2019-08-29 10:35:45', '2026-01-22 22:31:09', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Beachfront Room', 'Beachfront Room', NULL, 'Beachfront Room', NULL, 'beachfront-room', '/beachfront-room', 'Curabitur ac volutpat erat, eget blandit augue. Sed imperdiet laoreet massa. Mauris nibh arcu, semper in enim non, iaculis convallis lectus. Sed ullamcorper euismod velit, sit amet placerat enim rutrum et.', 'Etiam tempor cursus volutpat. Donec eu commodo sapien, sed blandit nisi.', NULL, '/library/images/Accommodation/beachfront-450x250.jpg', NULL, 'Accommodation Curabitur', NULL, NULL, 'Beachfront Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '', '', '', '', '', '', '', 'accommodation_id', 0, 'A', 4, '2019-08-29 10:37:08', '2026-01-22 22:32:18', NULL, 1, 1, NULL, 36, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Semper dignissim augue vel posuere', NULL, NULL, 'Semper dignissim augue vel posuere', NULL, 'semper-dignissim-augue-vel-posuere', '/semper-dignissim-augue-vel-posuere', 'Pellentesque ut dolor sit amet urna posuere ultricies. Proin euismod lacus ut molestie efficitur. In semper dignissim augue vel posuere. Aenean volutpat libero a sem imperdiet, vitae suscipit est sodales. In vitae fringilla velit. Fusce sed vehicula', 'Mauris lobortis leo dui. Quisque aliquam est ut augue interdum tempus', '<p style=\"text-align:justify;margin-left:0px;\">Duis iaculis lacinia nibh, id rutrum purus molestie sed. Proin accumsan ligula non nunc feugiat cursus. Donec et porttitor neque, vel dapibus eros. Suspendisse pulvinar finibus pulvinar. Aenean tempor, lectus eget dignissim ornare, felis velit fermentum urna, eu vulputate purus tellus vel diam. Curabitur congue vestibulum lacus cursus faucibus. Vestibulum condimentum nisl at lacus convallis, sed gravida lorem maximus. Proin mattis orci at mauris sollicitudin, consequat sollicitudin mauris lacinia. Etiam sed ornare arcu. Pellentesque neque orci, ornare vitae ultricies sit amet, vulputate nec ipsum. Proin velit arcu, viverra id ultricies ut, consequat ac nibh. Vivamus ex tortor, rutrum ut nisl a, imperdiet venenatis neque. Nulla tincidunt molestie ipsum, sit amet finibus mi dignissim vitae.</p><p style=\"text-align:justify;margin-left:0px;\">In quis est eu quam hendrerit rutrum. Maecenas placerat congue metus, ut egestas dolor ultrices vitae. Sed eget lorem at metus lacinia fermentum. Maecenas dui nunc, posuere sed suscipit sit amet, ultricies et sem. Aenean ornare purus vitae pretium volutpat. Morbi ut fringilla ante. Donec at risus ligula. Mauris suscipit tellus ut neque mattis rhoncus eget a massa.</p><p style=\"text-align:justify;margin-left:0px;\">Praesent semper, metus id mollis bibendum, elit est tincidunt enim, sollicitudin mattis nisl ex nec diam. Nam dapibus ligula tincidunt consectetur vestibulum. Nulla quis erat aliquet mi venenatis varius non nec ipsum. Integer elementum vitae nisi id volutpat. Maecenas ullamcorper facilisis neque quis gravida. Cras ipsum nulla, imperdiet id orci id, dapibus congue mi. Nullam mollis nunc sit amet laoreet sodales. Phasellus vulputate mauris non ex imperdiet suscipit. Praesent laoreet enim vitae nisl tempus, quis faucibus diam dignissim. Donec vel magna lacus. Fusce cursus accumsan nibh, nec lacinia est consequat eu. Ut facilisis id nunc a euismod. Sed massa magna, sagittis id vehicula quis, egestas in magna.</p><p style=\"text-align:justify;margin-left:0px;\">Pellentesque ut dolor sit amet urna posuere ultricies. Proin euismod lacus ut molestie efficitur. In semper dignissim augue vel posuere. Aenean volutpat libero a sem imperdiet, vitae suscipit est sodales. In vitae fringilla velit. Fusce sed vehicula erat. Etiam cursus commodo sem, in lobortis dolor. Mauris lobortis leo dui. Quisque aliquam est ut augue interdum tempus. Integer sit amet purus in ligula blandit tristique. Etiam hendrerit felis nisi, eu consectetur tellus bibendum nec. Mauris ac feugiat eros.</p>', '/library/images/general/casey-horner-DXu4o-QI1VY-unsplash.jpg', '/uploads/casey-horner-DXu4o-QI1VY-unsplash-l9rk6.jpg', 'Semper dignissim augue vel posuere', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-08-29 10:51:07', '2023-02-08 14:12:56', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Life Style', 'Life Style', NULL, NULL, NULL, 'life-style', '/life-style', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Life Style MT', 'Life Style MD', 'Life Style OGT', 'Life Style OGD', '', '<script>console.log(\"Category Head Close\")</script>', '<script>console.log(\"Category Body Open\")</script>', '<script>console.log(\"Category Body Close\")</script>', '<script>console.log(\"Category Schema Markup\")</script>', 'post_category_id', 0, 'A', 0, '2019-08-29 10:52:34', '2023-02-08 14:17:56', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Adventure', 'Adventure', NULL, NULL, NULL, 'adventure', '/adventure', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'post_category_id', 0, 'A', 0, '2019-08-29 10:53:02', '2023-02-08 14:18:11', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Scenic', 'Scenic', NULL, NULL, NULL, 'scenic', '/scenic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'post_category_id', 0, 'A', 0, '2019-08-29 10:53:29', '2023-02-08 14:18:00', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Travel', 'Travel', NULL, NULL, NULL, 'travel', '/travel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'post_category_id', 0, 'A', 0, '2019-08-29 10:53:49', '2019-08-29 10:53:49', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Heritage', 'Heritage', NULL, NULL, NULL, 'heritage', '/heritage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'post_category_id', 0, 'H', 0, '2019-08-29 10:54:09', '2019-08-29 10:54:09', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Quisque a sagittis mauris', NULL, NULL, 'Quisque a sagittis mauris', NULL, 'quisque-a-sagittis-mauris', '/quisque-a-sagittis-mauris', 'In quis est eu quam hendrerit rutrum. Maecenas placerat congue metus, ut egestas dolor ultrices vitae. Sed eget lorem at metus lacinia fermentum.', 'In quis est eu quam hendrerit rutrum. Maecenas placerat congue metus, ut egestas', '<p style=\"text-align:justify;margin-left:0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec arcu massa, egestas non nisl volutpat, tincidunt malesuada ligula. Donec lobortis turpis tempor est porta vulputate at non nisi. Quisque a sagittis mauris, ac placerat justo. Praesent ullamcorper cursus purus eu elementum. Nulla facilisi. Sed interdum erat quis ultrices bibendum. Praesent at pulvinar augue. Proin magna lectus, imperdiet eu condimentum vel, rutrum ac mauris. Cras scelerisque dapibus scelerisque. Duis eu lorem pellentesque, vulputate tellus a, aliquam massa. Donec vulputate egestas tempus. In semper iaculis venenatis. Nullam tellus diam, convallis sit amet lectus eu, faucibus accumsan nisl.</p><p style=\"text-align:justify;margin-left:0px;\">Duis iaculis lacinia nibh, id rutrum purus molestie sed. Proin accumsan ligula non nunc feugiat cursus. Donec et porttitor neque, vel dapibus eros. Suspendisse pulvinar finibus pulvinar. Aenean tempor, lectus eget dignissim ornare, felis velit fermentum urna, eu vulputate purus tellus vel diam. Curabitur congue vestibulum lacus cursus faucibus. Vestibulum condimentum nisl at lacus convallis, sed gravida lorem maximus. Proin mattis orci at mauris sollicitudin, consequat sollicitudin mauris lacinia. Etiam sed ornare arcu. Pellentesque neque orci, ornare vitae ultricies sit amet, vulputate nec ipsum. Proin velit arcu, viverra id ultricies ut, consequat ac nibh. Vivamus ex tortor, rutrum ut nisl a, imperdiet venenatis neque. Nulla tincidunt molestie ipsum, sit amet finibus mi dignissim vitae.</p><p style=\"text-align:justify;margin-left:0px;\">In quis est eu quam hendrerit rutrum. Maecenas placerat congue metus, ut egestas dolor ultrices vitae. Sed eget lorem at metus lacinia fermentum. Maecenas dui nunc, posuere sed suscipit sit amet, ultricies et sem. Aenean ornare purus vitae pretium volutpat. Morbi ut fringilla ante. Donec at risus ligula. Mauris suscipit tellus ut neque mattis rhoncus eget a massa.</p><p style=\"text-align:justify;margin-left:0px;\">Praesent semper, metus id mollis bibendum, elit est tincidunt enim, sollicitudin mattis nisl ex nec diam. Nam dapibus ligula tincidunt consectetur vestibulum. Nulla quis erat aliquet mi venenatis varius non nec ipsum. Integer elementum vitae nisi id volutpat. Maecenas ullamcorper facilisis neque quis gravida. Cras ipsum nulla, imperdiet id orci id, dapibus congue mi. Nullam mollis nunc sit amet laoreet sodales. Phasellus vulputate mauris non ex imperdiet suscipit. Praesent laoreet enim vitae nisl tempus, quis faucibus diam dignissim. Donec vel magna lacus. Fusce cursus accumsan nibh, nec lacinia est consequat eu. Ut facilisis id nunc a euismod. Sed massa magna, sagittis id vehicula quis, egestas in magna.</p>', '/library/images/general/austin-neill-0A_b9G-Rm6w-unsplash.jpg', '/uploads/austin-neill-0A_b9G-Rm6w-unsplash-zbgsq.jpg', 'Quisque a sagittis mauris', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-08-29 10:56:56', '2020-12-16 11:39:09', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Post integer molestie finibus eleifend', NULL, NULL, 'Post integer molestie finibus eleifend', NULL, 'post-integer-molestie-finibus-eleifend', '/post-integer-molestie-finibus-eleifend', 'Donec faucibus nisi lectus, ac dignissim ligula ornare eget. Curabitur imperdiet aliquam eros ultricies scelerisque.', 'Donec faucibus nisi lectus, ac dignissim ligula ornare eget', '<p>Integer molestie finibus eleifend. Donec faucibus nisi lectus, ac dignissim ligula ornare eget. Curabitur imperdiet aliquam eros ultricies scelerisque. Phasellus eget risus id turpis aliquam cursus. In gravida viverra nisl, eu viverra sapien. Suspendisse faucibus mollis viverra. Nunc pellentesque hendrerit gravida. Morbi aliquet magna id augue efficitur, ac viverra augue ornare. Aliquam sed faucibus nibh.</p><p>Phasellus sit amet tincidunt nulla. Donec et tristique turpis. Sed laoreet ex neque, sed ultrices turpis egestas ac. Duis rhoncus lectus quis enim cursus, eu consectetur massa egestas. Phasellus vehicula quam mollis est feugiat, non porta lacus blandit. Donec et neque gravida, semper leo vel, ultricies leo. Duis facilisis nulla non nisi imperdiet gravida. Etiam molestie vulputate quam, id posuere libero sagittis at. Vestibulum ut convallis ex. Duis elit urna, iaculis sit amet aliquet eget, aliquam sit amet orci. Aliquam pulvinar at libero sodales condimentum. Nullam in massa id purus porttitor tempor. Mauris dignissim congue massa vel egestas. Proin sed feugiat nisi. Curabitur vel vestibulum lectus.</p>', '/library/images/general/jesse-gardner-4esAX0n8dOA-unsplash.jpg', '/uploads/jesse-gardner-4esAX0n8dOA-unsplash-530qr.jpg', 'Post integer molestie finibus eleifend ALt Trxt', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-08-29 10:58:52', '2023-02-08 14:10:06', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Post donec et tristique turpis', NULL, NULL, 'Post donec et tristique turpis', NULL, 'post-donec-et-tristique-turpis', '/post-donec-et-tristique-turpis', 'Donec et tristique turpis. Sed laoreet ex neque, sed ultrices turpis egestas ac. Duis rhoncus lectus quis enim cursus, eu consectetur massa egestas. Phasellus vehicula quam mollis est feugiat, non porta lacus blandit', 'Duis facilisis nulla non nisi imperdiet gravida. Etiam molestie vulputate quam', '<p>Phasellus sit amet tincidunt nulla. Donec et tristique turpis. Sed laoreet ex neque, sed ultrices turpis egestas ac. Duis rhoncus lectus quis enim cursus, eu consectetur massa egestas. Phasellus vehicula quam mollis est feugiat, non porta lacus blandit. Donec et neque gravida, semper leo vel, ultricies leo. Duis facilisis nulla non nisi imperdiet gravida. Etiam molestie vulputate quam, id posuere libero sagittis at. Vestibulum ut convallis ex. Duis elit urna, iaculis sit amet aliquet eget, aliquam sit amet orci. Aliquam pulvinar at libero sodales condimentum. Nullam in massa id purus porttitor tempor. Mauris dignissim congue massa vel egestas. Proin sed feugiat nisi. Curabitur vel vestibulum lectus.</p><p>Mauris fermentum sem molestie, auctor augue vel, molestie arcu. Cras ut iaculis ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla ut dictum nisl. Curabitur accumsan velit a eros ultricies imperdiet. Duis tempus ultrices ipsum ac tristique. Curabitur luctus non erat pellentesque blandit. Nunc id urna lectus. Donec nisi erat, lobortis nec porta eget, pretium non risus. Aenean dapibus laoreet mauris ac scelerisque. Sed nec ante scelerisque purus sagittis interdum eget non leo. Pellentesque id tempus nisi, quis fringilla augue. Cras vestibulum diam eget erat semper lobortis.</p>', '/library/images/general/casey-horner-4mjM65c95ik-unsplash.jpg', '/uploads/casey-horner-4mjM65c95ik-unsplash-dozh2.jpg', 'Post donec et tristique turpis Alt Text', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-08-29 11:00:41', '2020-12-16 11:39:10', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Proin magna lectus', NULL, NULL, 'Proin magna lectus', NULL, 'proin-magna-lectus', '/proin-magna-lectus', 'Proin magna lectus, imperdiet eu condimentum vel, rutrum ac mauris. Cras scelerisque dapibus scelerisque. Duis eu lorem pellentesque, vulputate tellus a, aliquam massa.', 'Nullam tellus diam, convallis sit amet lectus eu, faucibus accumsan nisl.', '<p style=\"text-align:justify;margin-left:0px;\">In quis est eu quam hendrerit rutrum. Maecenas placerat congue metus, ut egestas dolor ultrices vitae. Sed eget lorem at metus lacinia fermentum. Maecenas dui nunc, posuere sed suscipit sit amet, ultricies et sem. Aenean ornare purus vitae pretium volutpat. Morbi ut fringilla ante. Donec at risus ligula. Mauris suscipit tellus ut neque mattis rhoncus eget a massa.</p><p style=\"text-align:justify;margin-left:0px;\">Praesent semper, metus id mollis bibendum, elit est tincidunt enim, sollicitudin mattis nisl ex nec diam. Nam dapibus ligula tincidunt consectetur vestibulum. Nulla quis erat aliquet mi venenatis varius non nec ipsum. Integer elementum vitae nisi id volutpat. Maecenas ullamcorper facilisis neque quis gravida. Cras ipsum nulla, imperdiet id orci id, dapibus congue mi. Nullam mollis nunc sit amet laoreet sodales. Phasellus vulputate mauris non ex imperdiet suscipit. Praesent laoreet enim vitae nisl tempus, quis faucibus diam dignissim. Donec vel magna lacus. Fusce cursus accumsan nibh, nec lacinia est consequat eu. Ut facilisis id nunc a euismod. Sed massa magna, sagittis id vehicula quis, egestas in magna.</p><p style=\"text-align:justify;margin-left:0px;\">Pellentesque ut dolor sit amet urna posuere ultricies. Proin euismod lacus ut molestie efficitur. In semper dignissim augue vel posuere. Aenean volutpat libero a sem imperdiet, vitae suscipit est sodales. In vitae fringilla velit. Fusce sed vehicula erat. Etiam cursus commodo sem, in lobortis dolor. Mauris lobortis leo dui. Quisque aliquam est ut augue interdum tempus. Integer sit amet purus in ligula blandit tristique. Etiam hendrerit felis nisi, eu consectetur tellus bibendum nec. Mauris ac feugiat eros.</p><p style=\"text-align:justify;margin-left:0px;\">Nam venenatis semper lectus non semper. Quisque vel tristique urna. Integer ut est accumsan, tincidunt augue in, porta orci. Cras volutpat, massa eu gravida vestibulum, lectus nisl faucibus diam, hendrerit molestie nibh lectus a nisi. Integer luctus dolor a elit ultrices, a consectetur neque consequat. Cras sed ante laoreet, eleifend magna et, dignissim sem. Nullam non mattis dolor, a varius ligula. Cras elit diam, hendrerit sit amet consequat vitae, blandit in justo. Mauris dignissim orci nec diam commodo, quis placerat turpis auctor. Nam pulvinar, lectus rhoncus dapibus tincidunt, arcu magna auctor nulla, et finibus mauris nisl eget metus. Curabitur id pharetra libero. Nunc in ante eu eros feugiat posuere eget vitae purus. Vestibulum risus diam, pharetra vel accumsan ac, pretium a neque. Aenean dignissim augue a nunc egestas, ut sagittis risus tempor. Nam vel metus maximus, convallis nunc non, dictum neque.</p><p style=\"text-align:justify;margin-left:0px;\">Integer pharetra tellus ut posuere porta. Vestibulum euismod eget sem fermentum venenatis. Mauris elementum aliquet orci id convallis. Quisque finibus lectus eu libero posuere sollicitudin. Mauris quis efficitur lorem, varius tincidunt leo. Cras posuere, neque non ultrices ullamcorper, magna nisi porta dui, vel pharetra nunc dui eu est. Praesent eleifend purus a orci mattis, nec auctor neque gravida. Sed non nibh auctor dolor imperdiet bibendum. Donec tincidunt ultrices tellus, ac fringilla neque luctus ut. Etiam a nibh sit amet erat posuere consequat eu sit amet tellus. Vivamus sed sem ornare, volutpat mauris eget, tempus justo. Cras sodales augue sed dolor consequat, at rutrum nulla eleifend.</p>', '/library/images/general/kace-rodriguez-OgB2ZHA49bU-unsplash.jpg', '/uploads/kace-rodriguez-OgB2ZHA49bU-unsplash-lvso7.jpg', 'Proin magna lectus', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-08-29 11:01:58', '2020-12-16 11:39:17', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Packages', 'Packages', NULL, 'Packages', NULL, 'packages', '/packages', 'Mauris augue velit, viverra in tortor a, faucibus porta lacus. Mauris dictum ligula justo, id porta diam cursus mattis. In nec viverra est, sit amet fringilla sem. Aliquam elit lectus, mattis sed erat non, lobortis imperdiet nisi.', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Our Packages | Inspire Boutique Resort', 'We offer great deals and  packages', '', '', '', '', '', '<script id=\"cr-init__857d9fccce4d6d50\" src=\"https://starling.crowdriff.com/js/crowdriff.js\" async></script>', '', 'page_id', 0, 'A', 5, '2019-09-02 14:37:18', '2026-01-23 03:47:12', NULL, 1, 1, NULL, 35, 1, 1, '', NULL, NULL, NULL, 'Would you like to book a package?', '', 'https://userguidedemo-be.tomahawk.co.nz/room-booking/128?adult=2&amp;child=0&amp;apiKey=4f9b3tsxttzahxjgqc48pfe658', 'https://www.booking.com', 'Book Now', '/contact-us', NULL, 'Send Enquiry', 'escape to paradise reserve your treat today', 'RESERVE NOW', 'http://localhost/jmcr-cms/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Exp Suspendisse vel', 'Exp Suspendisse vel', NULL, 'Exp Suspendisse vel', NULL, 'exp-suspendisse-vel', '/exp-suspendisse-vel', 'Suspendisse vel ullamcorper felis. Etiam tincidunt malesuada neque lobortis pretium. Duis consequat metus a aliquam congue. Suspendisse vestibulum neque consequat nulla egestas, ut venenatis nisi iaculis.', 'Etiam tincidunt malesuada neque lobortis pretium. Duis consequat metus a aliquam', NULL, '/library/images/Experience/cat-450x550.jpg', '/uploads/cat-450x550-8f3oy.webp', 'Exp Suspendisse vel', NULL, NULL, '', '', '', '', '', '', '', '', '', 'experience_id', 0, 'D', 5, '2019-09-02 14:38:57', '2023-08-17 16:40:29', '2023-08-22 16:41:03', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Guided Cycle Tours', 'Guided Cycle Tours', NULL, 'Guided Cycle Tours', NULL, 'guided-cycle-tours', '/guided-cycle-tours', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Praesent semper, metus id mollis bibendum, elit est tincidunt enim, sollicitudin', NULL, '/library/images/general/austin-neill-0A_b9G-Rm6w-unsplash.jpg', '/uploads/austin-neill-0A_b9G-Rm6w-unsplash-deeci.jpg', 'Guided Cycle Tours Alt Text', NULL, NULL, '', '', '', '', '', '', '', '', '', 'experience_id', 0, 'D', 1, '2019-09-02 14:39:24', '2020-01-07 11:07:45', '2020-09-18 15:40:25', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Romantic Weekend', 'Romantic Weekend', NULL, 'Romantic Weekend', NULL, 'romantic-weekend', '/romantic-weekend', 'Nam venenatis semper lectus non semper. Quisque vel tristique urna. Integer ut est accumsan, tincidunt augue in, porta orci. Cras volutpat, massa eu gravida vestibulum, lectus nisl faucibus diam, hendrerit molestie nibh lectus a nisi.', 'Lorem Ipsum Dolor Sit Amet, In Nam Denique Suavitate Repudiandae, Homero stop.', NULL, '/library/images/Experience/romantic-450x300.jpg', '/uploads/romantic-450x300-8hojz.webp', 'romance', NULL, NULL, 'Romantic Weekend | Inspire Boutique Resort', 'A wonderful long weekend for a couple', '', 'OG Title Description', '', '', '', '', '', 'experience_id', 0, 'A', 2, '2019-09-02 14:39:53', '2023-09-26 14:18:22', NULL, 1, 1, NULL, 35, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Family Getaway', 'Family Getaway', NULL, 'Family Getaway', NULL, 'family-getaway', '/family-getaway', 'In quis est eu quam hendrerit rutrum. Maecenas placerat congue metus, ut egestas dolor ultrices vitae. Sed eget lorem at metus lacinia fermentum. Maecenas dui nunc, posuere sed suscipit sit amet, ultricies et sem.', 'Sed eget lorem at metus lacinia fermentum.', NULL, '/library/images/Experience/experience-family-450x300.jpg', '/uploads/experience-family-450x300-puut5.webp', 'Family', NULL, NULL, 'Family Getaway | Inspire Boutique Resort', '', '', '', '', '', '', '', '', 'experience_id', 0, 'A', 3, '2019-09-02 15:31:01', '2023-08-22 17:51:31', NULL, 1, 1, NULL, 35, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Accommodation Vestibulum', 'Accommodation Vestibulum', NULL, 'Accommodation Vestibulum', NULL, 'accommodation-vestibulum', '/accommodation-vestibulum', 'Vestibulum ultricies sit amet sapien et semper. In hac habitasse platea dictumst. Donec tristique pulvinar diam a aliquet. Morbi quis mauris finibus, facilisis neque quis, molestie nisi. Mauris eu luctus nunc. Sed quam magna, suscipit nec scelerisque', 'Cras dapibus nisl erat, nec efficitur turpis bibendum sit amet. Maecenas massa', NULL, '/library/images/accommodation/rowan-heuvel-bjej8BY1JYQ-unsplash.jpg', '/uploads/rowan-heuvel-bjej8BY1JYQ-unsplash-rk7fh.jpg', 'Accommodation Vestibulum', NULL, NULL, '', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'D', 6, '2019-09-12 20:46:28', '2019-11-21 09:55:38', '2020-09-07 15:58:09', 4, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Accommodation Aliquam', 'Accommodation Aliquam', NULL, 'Accommodation Aliquam', NULL, 'accommodation-aliquam', '/accommodation-aliquam', 'Aliquam erat volutpat. Etiam porttitor eget justo et sollicitudin. In sit amet justo nec nisl placerat euismod nec non lorem. Nunc tristique eros orci, vestibulum gravida odio convallis ut.', 'Donec id sollicitudin arcu. Nunc eget felis tellus. Sed tempus facilisis lorem', NULL, '/library/images/accommodation/seth-kane-XOEAHbE_vO8-unsplash.jpg', '/uploads/seth-kane-XOEAHbE_vO8-unsplash-bi0yh.jpg', 'Accommodation Aliquam', NULL, NULL, '', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'D', 5, '2019-09-09 09:11:08', '2019-11-21 09:55:26', '2020-09-07 15:58:09', 4, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Packages', 'Packages', NULL, 'Packages', NULL, 'packages', '/packages', 'Proin in finibus odio. Nam erat erat, eleifend vitae dictum nec, laoreet nec tortor. Nunc eget lectus odio. Duis porta finibus nisl, in viverra tellus aliquet non.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', 3, '2019-09-09 12:18:54', '2023-07-10 15:56:09', '2023-08-07 14:54:31', 4, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Friends Getaway', 'Friends Getaway', NULL, 'Friends Getaway', NULL, 'friends-getaway', '/friends-getaway', 'Duis eget nunc iaculis dui gravida pharetra sed vitae nulla. Pellentesque eu gravida purus. Ut non felis nisi. Proin magna sapien, luctus at pellentesque convallis, hendrerit a tortor. Donec id elit enim. Praesent eget faucibus eros. Donec sed neque', 'Pellentesque eu gravida purus. Ut non felis nisi. Proin magna sapien', NULL, '/library/images/Experience/experience-friend-450x300.jpg', '/uploads/experience-friend-450x300-44yot.webp', 'friends', NULL, NULL, 'Friends getaway Weekend | Inspire Boutique Resort', 'Get away for the weekend with this lovely friends package', '', '', '', '', '', '', '', 'experience_id', 0, 'H', 4, '2019-09-12 16:39:19', '2023-08-22 17:52:06', NULL, 4, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Privacy Policy', NULL, 'Privacy Policy', 'Privacy Policy', NULL, 'privacy-policy', '/privacy-policy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 10, '2019-09-18 22:39:58', '2019-11-18 11:29:43', NULL, 4, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Exp Morbi dignissim', 'Exp Morbi dignissim', NULL, 'Exp Morbi dignissim', NULL, 'exp-morbi-dignissim', '/exp-morbi-dignissim', 'Morbi dignissim eu nisi vel dapibus. Duis rutrum ante mi, non tincidunt urna suscipit ut. Etiam varius commodo ipsum, non consequat sapien aliquam id. Praesent id libero sit amet urna pellentesque tincidunt id nec eros. Praesent quis nulla ut magna f', 'Morbi dignissim eu nisi vel dapibus. Duis rutrum ante mi, non tincidunt urna', NULL, '/library/images/general/kace-rodriguez-OgB2ZHA49bU-unsplash.jpg', '/uploads/kace-rodriguez-OgB2ZHA49bU-unsplash-99yh6.jpg', 'Exp Morbi dignissim', NULL, NULL, '', '', '', '', '', '', '', '', '', 'experience_id', 0, 'D', 6, '2019-10-30 10:44:33', '2019-11-14 13:21:56', '2020-09-18 15:40:45', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Test image size', NULL, NULL, 'Test image size', NULL, 'test-image-size', '/test-image-size', 'Proin in finibus odio. Nam erat erat, eleifend vitae dictum nec, laoreet nec tortor. Nunc eget lectus odio. Duis porta finibus nisl, in viverra tellus aliquet non. Aenean ex odio, lobortis id viverra eu, maximus sed enim. Vestibulum fermentum, libero', 'Aenean ex odio, lobortis id viverra eu, maximus sed enim. Vestibulum fermentum', '<p style=\"margin-left:0px;text-align:justify;\">Integer pharetra tellus ut posuere porta. Vestibulum euismod eget sem fermentum venenatis. Mauris elementum aliquet orci id convallis. Quisque finibus lectus eu libero posuere sollicitudin. Mauris quis efficitur lorem, varius tincidunt leo. Cras posuere, neque non ultrices ullamcorper, magna nisi porta dui, vel pharetra nunc dui eu est. Praesent eleifend purus a orci mattis, nec auctor neque gravida. Sed non nibh auctor dolor imperdiet bibendum. Donec tincidunt ultrices tellus, ac fringilla neque luctus ut. Etiam a nibh sit amet erat posuere consequat eu sit amet tellus. Vivamus sed sem ornare, volutpat mauris eget, tempus justo. Cras sodales augue sed dolor consequat, at rutrum nulla eleifend.</p><p style=\"margin-left:0px;text-align:justify;\">Mauris augue velit, viverra in tortor a, faucibus porta lacus. Mauris dictum ligula justo, id porta diam cursus mattis. In nec viverra est, sit amet fringilla sem. Aliquam elit lectus, mattis sed erat non, lobortis imperdiet nisi. Duis ut gravida enim, lobortis pretium arcu. Integer porta, ipsum id interdum finibus, dui nibh blandit odio, ut accumsan lorem purus a dui. Maecenas bibendum, augue nec tincidunt tempor, purus massa porta risus, facilisis lacinia elit enim id lectus. Sed lacinia magna nisl, ut suscipit lectus vulputate nec. Mauris sed dui non nunc ullamcorper pretium. Nunc consequat, lectus quis pulvinar bibendum, libero nisi feugiat magna, ac imperdiet sapien sem consequat est. Morbi sed bibendum nibh. Phasellus nec odio condimentum, placerat purus non, scelerisque erat. Etiam sagittis molestie dapibus. Phasellus a pharetra erat. Duis consectetur non justo ut gravida.</p><p style=\"margin-left:0px;text-align:justify;\">Proin in finibus odio. Nam erat erat, eleifend vitae dictum nec, laoreet nec tortor. Nunc eget lectus odio. Duis porta finibus nisl, in viverra tellus aliquet non. Aenean ex odio, lobortis id viverra eu, maximus sed enim. Vestibulum fermentum, libero a faucibus vestibulum, nibh tortor condimentum dolor, sed faucibus elit lacus vel neque. Mauris lectus purus, congue sed tellus eget, feugiat laoreet nisl.</p><p style=\"margin-left:0px;text-align:justify;\">Duis eget nunc iaculis dui gravida pharetra sed vitae nulla. Pellentesque eu gravida purus. Ut non felis nisi. Proin magna sapien, luctus at pellentesque convallis, hendrerit a tortor. Donec id elit enim. Praesent eget faucibus eros. Donec sed neque bibendum, faucibus lorem et, maximus nunc. Cras nec diam metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin dapibus in turpis in cursus. Nulla tellus ipsum, pellentesque id iaculis ac, pharetra et lorem. Sed ullamcorper tincidunt ex a cursus. Donec a arcu non ligula placerat iaculis vitae at arcu. Duis vitae urna laoreet, interdum neque eget, imperdiet magna.</p>', '/library/images/Blog/blog-376x250.jpg', '/uploads/blog-376x250-nda2h.webp', 'Eleifend vitae dictum nec', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-10-30 11:49:07', '2023-10-12 15:55:16', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Cras vel vehicula quam', NULL, NULL, 'Cras vel vehicula quam', NULL, 'cras-vel-vehicula-quam', '/cras-vel-vehicula-quam', 'Integer mollis malesuada porttitor. In at imperdiet ante. Cras vel vehicula quam. Cras condimentum augue nec turpis rutrum elementum. Proin ac lobortis lorem, sit amet consectetur tellus.', 'Phasellus mollis dui tincidunt, tristique risus tempus, laoreet diam. Duis ac du', '<p style=\"text-align:justify;margin-left:0px;\">Mauris a nulla lectus. Sed ut erat ut ex lacinia molestie. Aenean sed pulvinar leo. Nam pharetra aliquet urna, lacinia ultricies enim molestie vitae. Etiam vel ante eget diam consequat posuere. Aliquam est est, maximus vitae feugiat in, malesuada et nibh. Aenean sapien enim, sagittis et velit ut, aliquam pellentesque lectus. Quisque velit lorem, ullamcorper eget nulla nec, rhoncus imperdiet purus. Nulla eget finibus mauris. Cras vitae neque tempus, ultricies enim ac, sollicitudin mi. Phasellus egestas velit lectus, ultrices mattis quam gravida quis. Curabitur tempus tincidunt augue non aliquam. Praesent vel auctor orci, quis lobortis enim. Phasellus imperdiet vel dolor eget mattis.</p><p style=\"text-align:justify;margin-left:0px;\">Integer mollis malesuada porttitor. In at imperdiet ante. Cras vel vehicula quam. Cras condimentum augue nec turpis rutrum elementum. Proin ac lobortis lorem, sit amet consectetur tellus. Phasellus mollis dui tincidunt, tristique risus tempus, laoreet diam. Duis ac dui felis. Proin gravida convallis libero, eget dignissim tortor placerat in. Integer eu urna magna. Praesent lacus justo, blandit vel lorem id, imperdiet venenatis diam. Phasellus nec consectetur urna, non congue arcu. Nulla tristique sagittis mollis. Etiam malesuada mi vitae justo viverra rhoncus. Suspendisse eleifend sodales orci, eu cursus mi fermentum vel. Phasellus malesuada lacus non mi aliquam, id porta sem rutrum.</p>', '/library/images/general/daniel-chen-AAvx9hyCuvQ-unsplash.jpg', '/uploads/daniel-chen-AAvx9hyCuvQ-unsplash-1brpq.jpg', 'Cras vel vehicula quam', NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'A', NULL, '2019-10-30 11:50:52', '2023-02-08 14:09:53', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Location', 'Location', NULL, 'Location', NULL, 'location', '/about-us/location', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', 5, '2019-11-11 11:23:01', '2020-07-29 15:23:51', '2023-08-07 14:55:12', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'example', 'Example', NULL, 'Example Page', NULL, 'example', '/about-us/example', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel faucibus diam sapien ac tellus. Suspendisse eleifend mauris id auctor lacinia. Nam luctus, nunc sed molestie accumsan, velit purus vestibulum metus, viverra dapibus ligula eros sit amet justo. Sed tempor ipsum magna, eget imperdiet tellus gravida eu. Maecenas quis ex vitae enim consectetur pellentesque sed at arcu. Donec pellentesque eu eros ac interdum. Nam faucibus, sapien sed porttitor convallis, ante leo egestas felis, dapibus vestibulum velit tellus vitae mauris. Suspendisse congue vitae velit eget consequat. Pellentesque eros justo, imperdiet eu nulla in, euismod gravida enim. Nunc diam ante, maximus ut maximus sed, vehicula nec risus. Pellentesque mollis libero quis sagittis posuere.', NULL, NULL, NULL, NULL, NULL, NULL, '', 'MT', 'MD', 'OGT', 'OGD', '/library/images/general/aerial-view-1149621_1920.jpg', '<script>console.log(\'Page Head Close\')</script>', '<script>console.log(\'Page Body Open\')</script>', '<script>console.log(\'Page Body Close\')</script>', '<script>console.log(\'Page Structured Data\')</script>', 'page_id', 0, 'A', 100, '2019-11-18 14:21:20', '2024-08-08 14:52:47', NULL, 1, 1, NULL, 36, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Tourism', 'Tourism', NULL, NULL, NULL, 'tourism', '/tourism', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MT', 'MD', 'OGT', 'OGD', '/library/images/general/aerial-view-1149621_1920.jpg', '<script>console.log(\'Blog Category Head Close\')</script>', '<script>console.log(\'Blog Category Body Open\')</script>', '<script>console.log(\'Blog Category Body Close\')</script>', '<script>console.log(\'Blog Category Structured Data\')</script>', 'post_category_id', 0, 'A', 10, '2019-11-18 15:20:26', '2019-11-18 15:20:26', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `page_meta_data` (`id`, `name`, `menu_label`, `footer_menu`, `heading`, `sub_heading`, `url`, `full_url`, `introduction`, `short_description`, `description`, `photo_path`, `thumb_photo_path`, `photo_alt_text`, `cover_photo`, `thumb_cover_photo`, `title`, `meta_description`, `og_title`, `og_meta_description`, `og_image`, `page_code_head_close`, `page_code_body_open`, `page_code_body_close`, `page_structure_data_markup`, `item_key`, `is_locked`, `status`, `rank`, `date_created`, `date_updated`, `date_deleted`, `created_by`, `updated_by`, `gallery_id`, `slideshow_id`, `template_id`, `page_meta_index_id`, `page_custom_code`, `valid_for`, `external_url`, `features`, `cta_bunner_title`, `cta_bunner_description`, `cta_bunner_primary_url`, `cta_bunner_primary_external_url`, `cta_bunner_primary_button_text`, `cta_bunner_secondary_url`, `cta_bunner_secondary_external_url`, `cta_bunner_secondary_button_text`, `reservation_banner_title`, `reservation_banner_button_text`, `reservation_banner_button_url`, `cta_heading`, `cta_btn1`, `cta_btn1_url`, `cta_btn2`, `cta_btn2_url`, `slideshow_page_id`, `prefilter_catid`, `prefilter_catname`) VALUES
(97, 'Tourism Blog Post', NULL, NULL, 'Tourism Blog Post', NULL, 'tourism-blog-post', '/tourism-blog-post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum malesuada scelerisque quis vel nisl. Ut nec arcu in urna auctor volutpat. Integer fermentum posuere tristique. Suspendisse vitae facilisis purus, vitae dapibus ex. Sed ma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel faucibus diam sapien ac tellus. Suspendisse eleifend mauris id auctor lacinia. Nam luctus, nunc sed molestie accumsan, velit purus vestibulum metus, viverra dapibus ligula eros sit amet justo. Sed tempor ipsum magna, eget imperdiet tellus gravida eu. Maecenas quis ex vitae enim consectetur pellentesque sed at arcu. Donec pellentesque eu eros ac interdum. Nam faucibus, sapien sed porttitor convallis, ante leo egestas felis, dapibus vestibulum velit tellus vitae mauris. Suspendisse congue vitae velit eget consequat. Pellentesque eros justo, imperdiet eu nulla in, euismod gravida enim. Nunc diam ante, maximus ut maximus sed, vehicula nec risus. Pellentesque mollis libero quis sagittis posuere.</p>', '/library/images/general/aerial-view-1149621_1920.jpg', '/uploads/aerial-view-1149621_1920-v0aus.jpg', 'Tourism Blog Post Alt Text', NULL, NULL, 'MT', 'MD', 'OGT', 'OGD', '/library/images/general/aerial-view-1149621_1920.jpg', '<script>console.log(\'Blog Post Head Close\')</script>', '<script>console.log(\'Blog Post Body Open\')</script>', '<script>console.log(\'Blog Post Body Close\')</script>', '<script>console.log(\'Blog Post Structured Data\')</script>', 'blog_post_id', 0, 'H', NULL, '2019-11-18 15:24:57', '2020-12-16 11:39:03', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Luxury Accommodation', 'Luxury Accommodation', NULL, 'Luxury Accommodation', NULL, 'luxury-accommodation', '/luxury-accommodation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum malesuada scelerisque quis vel nisl. Ut nec arcu in urna auctor volutpat. Integer fermentum posuere tristique. Suspendisse vitae facilisis purus, vitae dapibus ex. Sed ma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum', NULL, '/library/images/general/aerial-view-1149621_1920.jpg', '/uploads/aerial-view-1149621_1920-bymbu.jpg', 'Luxury Accommodation Alt Text', NULL, NULL, 'MT', 'MD', 'OGT', 'OGD', '/library/images/general/aerial-view-1149621_1920.jpg', '<script>console.log(\'Accommodation Head Close\')</script>', '<script>console.log(\'Accommodation Body Open\')</script>', '<script>console.log(\'Accommodation Body Close\')</script>', '<script>console.log(\'Accommodation Structured Data\')</script>', 'accommodation_id', 0, 'D', 10, '2019-11-19 08:40:24', '2019-11-20 14:53:10', '2020-09-07 15:58:09', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Adventure Experience', 'Adventure Experience', NULL, 'Adventure Experience', NULL, 'adventure-experience', '/adventure-experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum malesuada scelerisque quis vel nisl. Ut nec arcu in urna auctor volutpat. Integer fermentum posuere tristique. Suspendisse vitae facilisis purus, vitae dapibus ex. Sed ma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non tellus ac ipsum', NULL, '/library/images/general/aerial-view-1149621_1920.jpg', '/uploads/aerial-view-1149621_1920-784lw.jpg', 'Adventure Experience Alt Text', NULL, NULL, 'MT', 'MD', 'OGT', 'OGD', '/library/images/general/aerial-view-1149621_1920.jpg', '<script>console.log(\'Experience Head Close\')</script>', '<script>console.log(\'Experience Body Open\')</script>', '<script>console.log(\'Experience Body Close\')</script>', '<script>console.log(\'Experience Structured Data\')</script>', 'experience_id', 0, 'D', 10, '2019-11-20 09:26:52', '2019-11-20 14:57:14', '2020-09-18 15:40:25', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'Test Accommodation', 'Test Accommodation', NULL, 'Test Accommodation', NULL, 'test-accommodation', '/test-accommodation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'D', NULL, '2020-03-30 12:50:12', '2020-03-30 12:50:12', '2020-09-07 15:58:09', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'Test Accommodation', 'Test Accommodation', NULL, 'Test Accommodation', NULL, 'test-accommodation', '/test-accommodation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'D', NULL, '2020-03-30 12:50:12', '2020-03-30 12:50:12', '2020-09-07 15:58:09', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Test Accommodation', 'Test Accommodation', NULL, 'Test Accommodation', NULL, 'test-accommodation', '/test-accommodation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'D', NULL, '2020-03-30 12:50:12', '2020-03-30 12:50:12', '2020-09-07 15:58:09', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'General Page', 'General Page', NULL, 'General Page', NULL, 'general-page', '//general-page', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'General Page', 'This is a general page for this accomodation website', 'General Page', 'This is a general page for this accomodation website', '/library/images/dsc_0288.jpg', '', '', '', '', 'page_id', 0, 'D', NULL, '2021-01-20 15:09:46', '2021-01-20 15:09:46', '2021-01-20 15:10:05', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Gift Vouchers', 'Gift Vouchers', NULL, 'Gift Vouchers', NULL, 'gift-vouchers', '/about-us/gift-vouchers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 20, '2021-04-07 14:00:19', '2023-09-20 09:21:37', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Gift Voucher for 10$', 'Gift Voucher for 10$', NULL, NULL, NULL, NULL, NULL, NULL, 'This is the short description for voucher', '<p>Gift Voucher for 10$</p>', '/library/images/accommodation/rowan-heuvel-bjej8BY1JYQ-unsplash.jpg', '/uploads/rowan-heuvel-bjej8BY1JYQ-unsplash-2bwdr.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'A', 3, '2021-04-07 14:01:19', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Gift Voucher for 20$', 'Gift Voucher for 20$', NULL, NULL, NULL, NULL, NULL, NULL, 'this is the short description for voucher', '<p>Gift Voucher for 20$</p>', '/library/images/accommodation/chi-m-R1uiDu8vBh0-unsplash.jpg', '/uploads/chi-m-R1uiDu8vBh0-unsplash-g7ps8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'A', 2, '2021-04-07 14:01:33', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Gift Voucher for 30', 'Gift Voucher for 30', NULL, NULL, NULL, NULL, NULL, NULL, 'Gift Voucher for 30Gift Voucher for 30Gift Voucher for 30 a', '<p>Gift Voucher for 30Gift Voucher for 30Gift Voucher for 30Gift Voucher for 30Gift Voucher for 30Gift Voucher for 30</p>', '/library/images/accommodation/seth-kane-XOEAHbE_vO8-unsplash.jpg', '/uploads/seth-kane-XOEAHbE_vO8-unsplash-ve8x7.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'A', 1, '2021-04-07 14:01:49', NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'Shop', 'Shop', 'Shop', 'Shop', NULL, 'shop', '/shop', 'Browse our products', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'H', 4, '2021-04-13 13:38:22', '2023-01-24 14:16:10', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'Sustainability', 'Sustainability', 'Sustainability', 'Sustainability', NULL, 'sustainability', '/accommodation/sustainability', 'Sustainability Intro', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Sustainability | Dunluce Boutique Accommodation | Fiordland | Te Anau', 'Discover Mt Ruapehu during summer or winter! Ride the country\'s most advanced gondola, Sky Waka, high above the beautiful world-heritage-listed mountain', 'Sustainability | Dunluce Boutique Accommodation | Fiordland | Te Anau', 'Discover Mt Ruapehu during summer or winter! Ride the country\'s most advanced gondola, Sky Waka, high above the beautiful world-heritage-listed mountain', '/library/images/1_milford_sound.jpg', '', '', '', '', 'page_id', 0, 'A', 0, '2021-07-16 14:40:30', '2023-07-19 16:41:25', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'asdfasdf', 'nasdfasdf', NULL, 'asdfadss', NULL, 'asdfasdf', '/asdfasdf', NULL, NULL, NULL, '/library/images/events/priscilla-du-preez-oD7carJZ_G0-unsplash.jpg', '/uploads/priscilla-du-preez-oD7carJZ_G0-unsplash-9a38j.jpg', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'experience_id', 0, 'D', NULL, '2023-04-19 11:38:50', '2023-05-25 17:23:31', '2023-08-07 19:23:50', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Family Room', NULL, NULL, 'Family Room', NULL, 'family-room', '/family-room', 'Introduction Mauris tortor diam, sollicitudin eu est non, cursus cursus nisi. Sed vel gravida quam, ut semper augue. Mauris pharetra eros vitae interdum venenatis.Aliquam porta imperdiet est, nec venenatis lorem suscipit sed', 'Short Lorem ipsum dolor sit amet, consectetur adipiscing elit, so=', NULL, '/library/images/Accommodation/family-450x250.jpg', NULL, 'Accommodation Mauris tortor', NULL, NULL, 'Family Room', 'met desc here', '', '', '', '', '', '', '', 'accommodation_id', 0, 'A', 5, '2023-05-25 15:26:45', '2026-01-22 23:59:41', NULL, 1, 1, NULL, 36, 1, 1, '<div class=\"yonder-review-widget\" data-settings=\'{\"YONDER_CLIENT_CODE\":\"100\",\"type\":\"carousel\",\"background_fill\":\"#ffffff00\",\"font_color\":\"#FFFFFF\",\"product_id\":\"PXNBEA\",\"source\":\"product\"}\'></div><script async defer src=\'https://show-reviews.yonderhq.com/embed.bundle.js\'></script>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Login', 'Guest Login', NULL, 'Login', NULL, 'login', '/login', 'This should  go to external site opening in new window', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'H', 8, '2023-07-03 10:34:21', '2023-07-03 16:13:14', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, 'https://www.google.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Facilities', 'Facilities', NULL, 'Facilities', NULL, 'facilities', '/about-us/facilities', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', 6, '2023-07-03 16:32:12', '2023-07-03 16:42:44', '2023-08-07 14:54:52', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'test', 'test', NULL, 'TEsting', NULL, 'testurl', '/testurl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', NULL, '2023-07-07 10:26:47', '2023-07-07 10:26:47', '2023-07-07 10:31:29', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'test', 'test', NULL, 'TEsting', NULL, 'testurl', '/testurl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', NULL, '2023-07-07 10:26:56', '2023-07-07 10:38:51', '2023-07-07 10:39:14', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'testingurl', 'testingurl', NULL, 'testingurl', NULL, 'testingurl', '/testingurl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', NULL, '2023-07-07 10:40:18', '2023-07-07 10:40:18', '2023-07-07 10:47:21', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'testingurl', 'testingurl', NULL, 'testingurl', NULL, 'testingurl', '/testingurl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', NULL, '2023-07-07 10:40:49', '2023-07-07 10:40:49', '2023-07-07 10:47:21', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'testingurl', 'testingurl', NULL, 'testingurl', NULL, 'testingurl', '/testingurl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', NULL, '2023-07-07 10:41:48', '2023-07-07 10:41:48', '2023-07-07 10:47:21', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'testingurl', 'testingurl', NULL, 'testingurl', NULL, 'testingurl', '/testingurl', 'aasasasasasas', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', 0, '2023-07-07 10:47:12', '2023-08-07 10:44:52', '2023-08-07 14:56:02', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, '<h2>What we offer</h2><ul><li>Morbi auctor</li><li>Hendrerit tortor sed commodo</li><li>Proin scelerisque</li><li>A quam et convallis</li><li>Mauris a neque</li><li>Justo laoreet tempus</li><li>Donec maximus</li><li>Molestie orci</li><li>Eeget Efficitur</li><li>Massa finibus ve</li><li>ddddddd</li></ul>', 'Have a question', '', '/home', '11222', 'home', NULL, 'tttdddd', 'here', NULL, NULL, NULL, 'Have More Questions? qqq', 'send Enquiry qqqq', NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Standard', 'Standard Rooms', NULL, 'Standard', NULL, 'standard', '/standard', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'accommodation_category_id', 0, 'A', 1, '2023-07-17 14:29:39', '2023-10-03 10:22:45', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Our Delux Rooms', 'Our Delux Rooms', NULL, 'Our Delux Rooms', NULL, 'accomodation-categories', '/accommodation/accomodation-categories', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Our delux rooms | fasfsdfsdf', 'dfasdf asfsadfasdfasdf', '', '', '', '', '', '', '', 'page_id', 0, 'A', 0, '2023-07-17 16:00:04', '2023-10-03 10:20:53', NULL, 1, 1, NULL, 34, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
(122, 'Modules', 'Modules', NULL, 'Modules', NULL, 'netzone-modules', '/about-us/netzone-modules', 'All modules  on one page', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', 8, '2023-07-26 18:01:13', '2023-07-26 18:19:48', '2023-08-07 14:54:52', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Occasions', 'Occasions', NULL, 'Occasions', NULL, 'occasions', '/occasions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Ocassions', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 4, '2023-08-07 20:29:51', '2023-09-26 09:04:12', NULL, 1, 1, NULL, 30, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'https://www.google.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Restaurant', 'Restaurant', NULL, 'Restaurant', NULL, 'restaurant', '/restaurant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Our Restaurant | Inspire Boutique Resort', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 3, '2023-08-16 11:40:14', '2024-07-26 09:53:20', NULL, 1, 1, NULL, 31, 1, 1, '', NULL, NULL, '<h2>What we offer</h2><ul><li>Lorem ipsum dolor sit amet</li><li>Consectetur adipiscing elit</li><li>Sd do eiusmod tempor</li><li>incididunt ut labore et&nbsp;</li><li>Dolore magna aliqua</li><li>Ut enim ad minim veniam</li><li>Quis nostrud exercitation</li><li>Ullamco laboris nisi ut aliquip&nbsp;</li><li>Ex ea commodo consequat.</li></ul>', 'Would you like to reserve your table?', '', 'https://www.google.com', 'https://www.google.com', 'MAKE A RESERVATION', '/contact-us', NULL, 'Send enquiry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(125, 'Our Team', 'Our Team', NULL, 'Team', NULL, 'team', '/about-us/team', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minimum.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', 1, '2023-08-21 14:22:16', '2023-09-26 08:57:46', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Weddings', 'Weddings', NULL, 'Weddings', NULL, 'weddings', '/occasions/weddings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', NULL, '2023-08-21 14:33:45', '2023-08-22 18:33:13', NULL, 1, 1, NULL, 30, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'test', 'test', NULL, 'efefwef', NULL, 'test', '/about-us/test', 'ewfqewfqewf', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', NULL, '2023-08-21 20:16:54', '2023-11-20 17:59:59', NULL, 1, 1, 7, NULL, 1, 1, '', NULL, NULL, NULL, 'CTA PAGE BANNER', 'Description Description Description Description Description:Description Description Description', '/contact-us', NULL, 'Primary Button', 'https://www.google.com/', NULL, 'Secondary Button', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Delux', 'Delux Rooms', NULL, 'Delux', NULL, 'delux', '/delux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'accommodation_category_id', 0, 'A', NULL, '2023-08-28 11:45:57', '2023-10-03 10:22:14', NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Top Level Room', 'Top Level Room', NULL, 'Top Level Room', NULL, 'toplevelroom', '/toplevelroom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'H', NULL, '2023-10-03 18:02:54', '2023-10-03 18:02:54', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, '/accommodation/deluxe-twin-room', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, NULL, NULL, NULL, NULL, NULL, '', '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'blog_post_id', 0, 'H', NULL, '2023-10-12 15:55:20', '2023-10-12 15:55:20', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'General Page', NULL, NULL, 'General Page Heading', NULL, 'general-page', '/general-page', 'General Page Introduction', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'D', NULL, '2023-12-14 10:45:09', '2023-12-14 10:45:09', '2023-12-14 10:57:17', 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, NULL, NULL, NULL, NULL, NULL, 'test123', '/test123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', 'accommodation_id', 0, 'A', 6, '2024-09-06 12:00:16', '2024-09-06 12:00:16', NULL, 1, 1, NULL, NULL, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Stay', 'Stay', NULL, 'Eco Resort - Luxurious Bures &amp; Villas', NULL, 'stay', '/stay', 'Nestled in a pristine ocean setting, our traditional Fijian-style bures offer a haven for families seeking Fiji accommodation. Immerse yourself in the South Pacific&rsquo;s embrace, lulled by palm whispers and turquoise waves. Discover a gateway to paradise, woven with Fijian spirit and the allure of Fiji bure.', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'page_id', 0, 'A', NULL, '2026-01-22 21:27:11', '2026-01-23 10:40:55', NULL, 1, 1, NULL, 41, 1, 1, '', NULL, NULL, NULL, 'sd', 'dsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_index`
--

CREATE TABLE `page_meta_index` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `page_meta_index`
--

INSERT INTO `page_meta_index` (`id`, `name`, `value`, `title`) VALUES
(1, 'Index, Follow (Default)', 'INDEX, FOLLOW', 'This is the default setting. Index allows search engines to show this {mod} in the search results. Follow allows search engines to search for links on this {mod} so it can find other pages. '),
(2, 'No Index, Follow', 'NOINDEX, FOLLOW', 'No Index prevents search engines from showing this {mod} in the search results. Follow allows search engines to search for links on this {mod} so it can find other pages. '),
(3, 'Index, No Follow', 'INDEX, NOFOLLOW', 'Index allows search engines to show this {mod} in the search results. No Follow prevents search engines from searching for links on this {mod} to prevent it from finding other pages. '),
(4, 'No Index, No Follow', 'NOINDEX, NOFOLLOW', 'No Index prevents search engines from showing this {mod} in the search results. No Follow prevents search engines from searching for links on this {mod} to prevent it from finding other pages. ');

-- --------------------------------------------------------

--
-- Table structure for table `page_quicklink_section`
--

CREATE TABLE `page_quicklink_section` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quicklink_style_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `page_quicklink_section`
--

INSERT INTO `page_quicklink_section` (`id`, `heading`, `description`, `quicklink_style_id`, `item_id`, `item_key`) VALUES
(1, '', '', 1, 1, 'page_id'),
(2, '', '', 1, 39, 'page_id'),
(3, '', '', 1, 40, 'page_id'),
(4, '', '', 1, 41, 'page_id'),
(5, '', '', 1, 42, 'page_id'),
(6, '', '', 1, 43, 'page_id'),
(7, '', '', 1, 44, 'page_id'),
(8, '', '', 1, 45, 'page_id'),
(9, '', '', 1, 46, 'page_id'),
(10, 'Quicklink Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel fau', 1, 47, 'page_id'),
(11, 'Explore Further', '', 1, 2, 'page_id'),
(12, '', '', 1, 3, 'page_id'),
(13, 'Explore Further', '', 1, 4, 'page_id'),
(14, '', '', 1, 5, 'page_id'),
(15, 'Tile heading', 'Lorem ipsum dolor sit amet, in nam denique suavitate repudiandae, homero dictas omnesque duo et. Novum dignissim consectetuer ei mel. Ne patrioque consequat persequeris...', 3, 6, 'page_id'),
(16, '', '', 1, 7, 'page_id'),
(17, '', '', 1, 8, 'page_id'),
(18, '', '', 2, 9, 'page_id'),
(19, '', '', 1, 10, 'page_id'),
(20, '', '', 1, 11, 'page_id'),
(21, '', '', 1, 12, 'page_id'),
(22, '', '', 1, 13, 'page_id'),
(23, '', '', 1, 1, 'accommodation_id'),
(24, 'Quick link intro heading', 'Quick link description', 1, 2, 'accommodation_id'),
(25, '', '', 1, 3, 'accommodation_id'),
(26, '', '', 1, 4, 'accommodation_id'),
(27, '', '', 1, 1, 'blog_post_id'),
(28, 'Life Style QL Sectio Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.', 1, 1, 'post_category_id'),
(29, 'Adventure', 'Adventure', 1, 2, 'post_category_id'),
(30, '', '', 1, 3, 'post_category_id'),
(31, '', '', 1, 4, 'post_category_id'),
(32, '', '', 1, 5, 'post_category_id'),
(33, '', '', 1, 2, 'blog_post_id'),
(34, '', '', 1, 3, 'blog_post_id'),
(35, '', '', 1, 4, 'blog_post_id'),
(36, '', '', 1, 5, 'blog_post_id'),
(37, '', '', 1, 1, 'event_id'),
(38, '', '', 1, 2, 'event_id'),
(39, '', '', 1, 3, 'event_id'),
(40, '', '', 1, 4, 'event_id'),
(41, '', '', 1, 5, 'event_id'),
(42, 'Suspendisse facilisis velit', 'Morbi vel massa accumsan, volutpat lorem vel, feugiat mauris. Vivamus sit amet viverra ligula. Sed ullamcorper quam turpis, sed elementum sapien porta eget. Mauris vel condimentum est. Etiam eleifend odio elit, nec laoreet nisl pretium ac.', 1, 1, 'media_article_id'),
(43, '', '', 1, 2, 'media_article_id'),
(44, '', '', 1, 3, 'media_article_id'),
(45, '', '', 1, 4, 'media_article_id'),
(46, '', '', 1, 5, 'media_article_id'),
(47, 'Explore Further', '', 1, 14, 'page_id'),
(48, '', '', 1, 1, 'experience_id'),
(49, '', '', 1, 2, 'experience_id'),
(50, 'Explore Further', '', 1, 3, 'experience_id'),
(51, 'Explore Further', '', 1, 4, 'experience_id'),
(52, '', '', 1, 5, 'accommodation_id'),
(53, '', '', 1, 6, 'accommodation_id'),
(54, '', '', 1, 15, 'page_id'),
(55, '', '', 1, 16, 'page_id'),
(56, '', '', 1, 17, 'page_id'),
(57, '', '', 1, 18, 'page_id'),
(58, '', '', 1, 19, 'page_id'),
(59, '', '', 1, 20, 'page_id'),
(60, '', '', 1, 21, 'page_id'),
(61, '', '', 1, 22, 'page_id'),
(62, '', '', 1, 23, 'page_id'),
(63, '', '', 1, 24, 'page_id'),
(64, '', '', 1, 25, 'page_id'),
(65, '', '', 1, 26, 'page_id'),
(66, '', '', 1, 27, 'page_id'),
(67, '', '', 1, 28, 'page_id'),
(68, '', '', 1, 5, 'experience_id'),
(69, '', '', 1, 6, 'experience_id'),
(70, 'Quicklink Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel fau', 1, 7, 'experience_id'),
(71, '', '', 1, 8, 'experience_id'),
(72, '', '', 1, 9, 'experience_id'),
(73, '', '', 1, 10, 'experience_id'),
(74, '', '', 1, 11, 'experience_id'),
(75, '', '', 1, 12, 'experience_id'),
(76, '', '', 1, 13, 'experience_id'),
(77, '', '', 1, 14, 'experience_id'),
(78, '', '', 1, 15, 'experience_id'),
(79, '', '', 1, 16, 'experience_id'),
(80, 'Quicklink Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel fau', 1, 7, 'accommodation_id'),
(81, '', '', 1, 29, 'page_id'),
(82, '', '', 1, 30, 'page_id'),
(83, '', '', 1, 31, 'page_id'),
(86, '', '', 1, 6, 'blog_post_id'),
(87, '', '', 1, 7, 'blog_post_id'),
(88, '', '', 1, 1, 'donation_causes_id'),
(89, '', '', 1, 2, 'donation_causes_id'),
(90, '', '', 1, 3, 'donation_causes_id'),
(93, '', '', 1, 36, 'page_id'),
(96, 'Quicklink Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel fau', 1, 6, 'post_category_id'),
(97, 'Quicklink Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel fau', 1, 8, 'blog_post_id'),
(98, 'Explore More', 'Explore more of our website', 2, 48, 'page_id'),
(99, 'A few quick links', '', 4, 49, 'page_id'),
(100, '', '', 1, 50, 'page_id'),
(101, 'Quicklinks Introduction', 'Discover Mt Ruapehu during summer or winter! Ride the country&#39;s most advanced gondola, Sky Waka, high above the beautiful world-heritage-listed mountain', 2, 51, 'page_id'),
(102, '', '', 1, 52, 'page_id'),
(103, 'Our Facilities', '', 3, 53, 'page_id'),
(104, '', '', 1, 8, 'accommodation_id'),
(105, '', '', 1, 9, 'accommodation_id'),
(106, '', '', 1, 10, 'accommodation_id'),
(107, '', '', 1, 35, 'page_id'),
(108, 'Quick link intro heading', 'Quick link description', 1, 11, 'accommodation_id'),
(109, '', '', 1, 54, 'page_id'),
(110, '', '', 1, 55, 'page_id'),
(111, '', '', 1, 56, 'page_id'),
(112, '', '', 1, 57, 'page_id'),
(113, '', '', 1, 58, 'page_id'),
(114, '', '', 1, 59, 'page_id'),
(115, '', '', NULL, 1, 'accommodation_category_id'),
(116, '', '', 1, 60, 'page_id'),
(117, 'Quicklinks - Not a module', 'This is Quicklinks - not a module - always at bottom of page content', 1, 61, 'page_id'),
(118, 'Explore Further', '', 1, 62, 'page_id'),
(119, 'Explore Further', '', 1, 63, 'page_id'),
(120, '', '', 1, 64, 'page_id'),
(121, 'Explore Further', '', 1, 65, 'page_id'),
(122, 'Quick links Heading', 'Description', 1, 66, 'page_id'),
(123, '', '', NULL, 2, 'accommodation_category_id'),
(124, '', '', 1, 67, 'page_id'),
(125, '', '', 1, 9, 'blog_post_id'),
(126, '', '', 1, 68, 'page_id'),
(127, '', '', 1, 12, 'accommodation_id'),
(128, 'Step deeper into the island paradise', '', 4, 69, 'page_id');

-- --------------------------------------------------------

--
-- Table structure for table `partnership_logo`
--

CREATE TABLE `partnership_logo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `menu_label` varchar(100) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `thumb_logo_path` varchar(255) DEFAULT NULL,
  `alt_text` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url_target` varchar(20) DEFAULT NULL,
  `status` enum('A','D','H') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `partnership_logo`
--

INSERT INTO `partnership_logo` (`id`, `name`, `menu_label`, `logo_path`, `thumb_logo_path`, `alt_text`, `url`, `url_target`, `status`, `rank`) VALUES
(1, 'Logo 1', 'Logo 1 Title', '/library/images/cape-kidnappers_evening-shot-b3unt.jpg', '/uploads/black-and-white-crown-icon-qoigo.png', 'Logo 1 Alt', 'https://www.example.com', '_blank', 'D', 1),
(2, 'Logo 3', 'Logo 3', '/library/images/logos/eagleheadlogo.jpg', '/uploads/eagle-head-logo-nwwfk.jpg', 'Logo 3', NULL, '_blank', 'D', 3),
(3, 'Logo 5', 'Logo 5', '/library/images/logos/freelogo3.jpg', '/uploads/free-logo-3-evujp.jpg', 'Logo 5', 'https://www.example.com/', '_blank', 'D', 5),
(4, 'Logo 2', 'Logo 2', '/library/images/logos/drawingintologofree.jpg', '/uploads/drawing-into-logo-free-7stv9.jpg', 'Logo 2', NULL, '_blank', 'D', 2),
(5, 'Logo 4', 'Logo 4', '/library/images/logos/freeeaglelogo.jpg', '/uploads/free-eagle-logo-4rgai.jpg', 'Logo 4', NULL, '_blank', 'D', 4),
(6, 'Logo 6', 'Logo 6', '/library/images/logos/free-logo-creator2.png', '/uploads/free-logo-creator-2-evdi9.png', 'Logo 6', NULL, '_blank', 'D', 6),
(7, 'Logo 7', 'Logo 7', '/library/images/logos/gym-logo-seeklogo.com.png', '/uploads/gym-logo-3F51052256-seeklogo.com-mkdjs.png', 'Logo 7', NULL, '_blank', 'D', 7),
(8, 'Logo 8', 'Logo 8', '/library/images/logos/gym-logo-seeklogo.com.png', '/uploads/logo2-scuen.png', 'Logo 8', NULL, '_blank', 'D', 8),
(9, 'Logo 10', 'Logo 10', '/library/images/logos/gym-logo-seeklogo.com.png', '/uploads/gym-logo-3F51052256-seeklogo.com-o4zzu.png', 'Logo 10 Alt Text', 'https://example.com', NULL, 'D', 10),
(10, 'Enviro-Award', 'Enviro Award - Silver', '/library/images/Partners/logo-enviro-award.jpg', NULL, 'Enviro Award - Silver', NULL, NULL, 'A', NULL),
(11, 'Tiaki', 'tiaki', '/library/images/Partners/logo-tiaki.jpg', NULL, 'tiaki', 'https://www.tiakinewzealand.com/en_NZ/', NULL, 'A', NULL),
(12, 'Covid Clean', 'Covid Clean', '/library/images/Partners/logo-covid-clean.jpg', NULL, 'Covid Clean', NULL, NULL, 'A', NULL),
(13, 'TIA', 'TIA Member', '/library/images/Partners/logo-tia-member.jpg', NULL, 'TIA', NULL, NULL, 'A', NULL),
(14, 'Qualmark Endorsed Activity', 'Qualmark Endorsed Activity', '/library/images/Partners/qualmark-endorsed-visitors-activity.jpg', NULL, 'endorsed-vistors-activity', NULL, NULL, 'A', NULL),
(15, 'Logo2', 'Logo text', '/library/images/Partners/logo_-text.jpg', NULL, NULL, NULL, NULL, 'A', NULL),
(16, 'Logo 3', 'Company', '/library/images/Partners/logo-company.jpg', NULL, NULL, NULL, NULL, 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quicklinks`
--

CREATE TABLE `quicklinks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `thumb_photo_path` varchar(255) DEFAULT NULL,
  `photo_alt_text` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `status` enum('A','D','H') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quicklinks`
--

INSERT INTO `quicklinks` (`id`, `name`, `heading`, `description`, `photo_path`, `thumb_photo_path`, `photo_alt_text`, `page_id`, `url`, `button_text`, `status`, `rank`) VALUES
(1, 'Link without https', 'Link without https', 'Duis iaculis lacinia nibh, id rutrum purus molestie sed. Proin accumsan ligula non nunc feugiat cursus. Donec et porttitor neque, vel dapibus eros.', '/library/images/escape/pexels-tobi-674268.jpg', '/uploads/pexels-tobi-674268-66ofj.webp', 'Lorem ipsum dolor sit amet ALt Text', NULL, NULL, 'www.google.com', 'D', 2),
(2, 'About Us', 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.', '/library/images/testing-images/Banner-Pakiri-Beach.jpg', '/uploads/Banner-Pakiri-Beach-x8zso.webp', 'About us alt text', 4, NULL, 'Explore More', 'D', 1),
(3, 'Integer in luctus nulla', 'Integer in luctus nulla', 'Integer in luctus nulla. Morbi a risus ut nisi blandit fringilla in sed eros. Cras vehicula luctus bibendum. In ac mauris id elit luctus consectetur pretium a libero. Etiam vel fringilla elit.', '/library/images/general/lode-lagrainge-oAYs_Jr1RnQ-unsplash.jpg', '/uploads/lode-lagrainge-oAYs_Jr1RnQ-unsplash-a1usl.jpg', 'Integer in luctus nulla Alt text', NULL, NULL, 'Explore More', 'D', 5),
(4, 'Sed lacinia magna nisl', 'Sed lacinia magna nisl', 'Mauris augue velit, viverra in tortor a, faucibus porta lacus. Mauris dictum ligula justo, id porta diam cursus mattis. In nec viverra est, sit amet fringilla sem.', '/library/images/general/kuno-schweizer-a386UyKTEvg-unsplash.jpg', '/uploads/kuno-schweizer-a386UyKTEvg-unsplash-hl8bh.jpg', 'Sed lacinia magna nisl', 8, NULL, 'Explore More', 'D', 4),
(5, 'Maecenas placerat congue', 'Maecenas placerat congue', 'Maecenas dui nunc, posuere sed suscipit sit amet, ultricies et sem. Aenean ornare purus vitae pretium volutpat. Morbi ut fringilla ante. Donec at risus ligula. Mauris suscipit tellus ut neque mattis.', '/library/images/general/lighthouse-1209856_1920.jpg', '/uploads/lighthouse-1209856_1920-mwghb.jpg', 'Maecenas placerat congue', 9, NULL, 'Read More', 'D', 3),
(6, 'Contact', 'Contact', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viv', '/library/images/general/mark-harpur-K2s_YE031CA-unsplash.jpg', '/uploads/mark-harpur-K2s_YE031CA-unsplash-8vsag.jpg', 'Contact Alt Text', 11, 'https://example.com', 'Find out more', 'D', 10),
(7, 'Full external URL', 'Full external URL', 'Description here', '/library/images/events/eric-nopanen-3skLpaOBlMw-unsplash.jpg', '/uploads/eric-nopanen-3skLpaOBlMw-unsplash-r18r6.webp', 'alolive alt', NULL, 'https://www.google.com/', 'Open new window', 'D', NULL),
(8, 'Internal Accommodation', 'Internal Accommodation', 'Blah', '/library/images/1_milford_sound.jpg', NULL, 'Milford Sound Adventure | My Property', NULL, NULL, 'Relative link', 'D', NULL),
(9, 'Info-ClothesLine', 'Clothes Lines', 'Clothes lines are provided next to the toilet block, heading into the tenting area.', '/library/images/icons/chess.png', '/uploads/chess-fp3lg.webp', 'Clothes lines', NULL, NULL, NULL, 'D', NULL),
(10, 'Icon-P&eacute;tanque Court', 'P&eacute;tanque Court', NULL, '/library/images/icons/ball-petanque.png', '/uploads/ball-petanque-6kfxu.webp', 'P&eacute;tanque Ball', NULL, NULL, NULL, 'D', NULL),
(11, 'Icon- Giant Chess', 'Giant Chess', 'Great for all ages, our outdoor giant chess will be sure to keep you entertained!', NULL, NULL, 'Giant Chess', NULL, NULL, NULL, 'D', NULL),
(12, 'Icon-Cafe', 'Coffee Cube', 'Holiday Park FacilitiesHoliday Park FacilitiesHoliday Park FacilitiesHoliday Park Facilities', '/library/images/icons/kayak.png', '/uploads/kayak-qs2gh.webp', 'Cog=ffee Cup', 2, NULL, 'Find out more', 'D', NULL),
(13, 'Icon-Kayak', 'Kayak, SUP, Surf', 'The tranquil waters surrounding the Park are the perfect place to practice paddle boarding. The whole family can join in with a leisurely kayak in the estuary or a paddle down the Poutawa Stream.', '/library/images/icons/kayak.png', '/uploads/kayak-zlr3m.webp', 'Kayak icon', NULL, NULL, NULL, 'D', NULL),
(14, 'Image 450x550', 'Image 450x550', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua.', '/library/images/Quicklinks/quicklink-default-450x550.jpg', '/uploads/quicklink-default-450x550-vjf7k.webp', 'Eat', 14, NULL, 'Read More', 'A', NULL),
(15, 'Packages-Default', 'Packages', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua.', '/library/images/Quicklinks/pakages-450x550.jpg', '/uploads/pakages-450x550-uvbbm.webp', 'deals', 14, NULL, 'View deals', 'A', NULL),
(16, NULL, NULL, 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit.', '/library/images/Highlights/tile-interiors420x250.jpg', NULL, 'about', 4, NULL, NULL, 'A', NULL),
(17, 'FAQ-Tile', 'FAQ&#039;s', NULL, '/library/images/Highlights/tile-roomservice-420x250.jpg', '/uploads/tile-roomservice-420x250-zhma7.webp', 'faq', 6, NULL, 'Read more', 'A', NULL),
(18, 'Testing Image', 'Testing Image', 'Description', '/library/images/Quicklinks/quicklink-default-450x550.jpg', '/uploads/quicklink-default-450x550-b4k9m.webp', 'image', 2, NULL, 'Find out more', 'A', NULL),
(19, 'Cover-Wedding', 'Wedding', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '/library/images/Highlights/700x450.jpg', '/uploads/700x450-n6dgr.webp', 'wedding', 6, NULL, 'Find out more', 'A', NULL),
(20, 'Cover-Conference', 'Conference', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '/library/images/Highlights/700x450.jpg', '/uploads/700x450-m5sqz.webp', NULL, NULL, NULL, NULL, 'A', NULL),
(21, 'Cover-FAQ', 'Questions?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '/library/images/Highlights/pexels-pixabay-271639.jpg', '/uploads/pexels-pixabay-271639-6d2xz.webp', NULL, 63, NULL, 'Learn more', 'A', NULL),
(22, 'ContactUs-Tile', 'Contact Us', 'Lorem ipsum dolor sit amet, in nam denique suavitate repudiandae, homero dictas omnesque duo et. Novum dignissim consectetuer ei mel. Lorem ipsum dolor sit amet, in nam denique suavi aterepudian stop.', '/library/images/Highlights/highlight-ourpool-420x250.jpg', '/uploads/highlight-ourpool-420x250-uq090.webp', NULL, 11, NULL, NULL, 'A', NULL),
(23, 'Icon-1', 'Icon-1', 'Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptatem.', '/library/images/Icons/icon-tick.png', '/uploads/icon-tick-cskqp.webp', NULL, 1, NULL, NULL, 'A', NULL),
(24, 'Icon-2', 'Icon-2', 'Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptatem.', '/library/images/Icons/icon-tick.png', '/uploads/icon-tick-8z64r.webp', NULL, NULL, NULL, NULL, 'A', NULL),
(25, 'Icon-3', 'Icon-2', 'Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptatem.', '/library/images/Icons/store.png', '/uploads/store-qe6es.webp', NULL, 14, NULL, NULL, 'A', NULL),
(26, 'Occasions-Default', 'Occasions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '/library/images/Quicklinks/occasion-450x550.jpg', '/uploads/occasion-450x550-7c4za.webp', 'weddings', 62, NULL, 'Find out more', 'A', NULL),
(27, 'Aboutus-Default', 'About', NULL, '/library/images/Quicklinks/aboutus-450x550.jpg', NULL, 'view', 4, NULL, NULL, 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quicklink_style`
--

CREATE TABLE `quicklink_style` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `thumb_path` varchar(255) DEFAULT NULL,
  `is_default` enum('Y','N') DEFAULT 'N',
  `status` enum('A','D','H') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quicklink_style`
--

INSERT INTO `quicklink_style` (`id`, `title`, `thumb_path`, `is_default`, `status`, `rank`) VALUES
(1, 'Default', 'modules/quicklinks/assets/graphics/default-style.png', 'Y', 'A', 1),
(2, 'Cover', 'modules/quicklinks/assets/graphics/cover-style.png', 'N', 'A', 2),
(3, 'Icon', 'modules/quicklinks/assets/graphics/icon-style.png', 'N', 'A', 3),
(4, 'Tile', 'modules/quicklinks/assets/graphics/style-tiles.png', 'N', 'A', 4);

-- --------------------------------------------------------

--
-- Table structure for table `redirect`
--

CREATE TABLE `redirect` (
  `id` int(11) NOT NULL,
  `old_url` longtext NOT NULL,
  `new_url` longtext DEFAULT NULL,
  `status_code` int(11) NOT NULL DEFAULT 301,
  `status` enum('A','H','D') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `redirect`
--

INSERT INTO `redirect` (`id`, `old_url`, `new_url`, `status_code`, `status`) VALUES
(1, '/events.html', '/contact-us', 301, 'D'),
(2, '/events/foo/test.html', '/contact-us', 301, 'D'),
(3, '/events?foo1=1&foo2=1&foo3=1', '/contact-us', 301, 'D'),
(4, '/events/foo1/foo2/foo3', '/contact-us', 301, 'D'),
(5, '/agents/login.aspx?ReturnUrl=agency', '/contact-us', 301, 'D'),
(6, '/events?a=1&b=1c=1', '/contact-us', 301, 'D'),
(7, '/events?a=1&b=1c=1#!tab=events', '/contact-us', 301, 'D'),
(8, '/accommodations', '/contact-us', 301, 'D'),
(9, '/about-us/blog/post/post-lorem-ipsum-dolor-sit-amet', '/about-us/blog', 301, 'D'),
(10, '/about-us/blog/archive/2018', '/', 301, 'D'),
(11, '/oldurl', '/newurl', 301, 'D'),
(12, '/oldurl/lorem-ipsum', '/newurl', 301, 'D'),
(13, '/cras-vel-vehicula-quam', '/', 301, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `person_name` varchar(150) DEFAULT NULL,
  `person_location` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_posted` date DEFAULT NULL,
  `status` enum('A','D','H') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'H',
  `rank` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `person_name`, `person_location`, `description`, `date_posted`, `status`, `rank`, `date_created`, `date_updated`, `date_deleted`, `created_by`, `updated_by`) VALUES
(1, 'John Doe', 'Auckland, New Zealand', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at accumsan leo. Maecenas eget lorem sit amet quam tempus faucibus. Nullam pellentesque vehicula elementum. Quisque pharetra sed turpis nec porta. Nulla facilisi. Proin at egestas leo. Aliquam eget eros magna.', '2017-10-24', 'A', 1, NULL, '2023-01-24 14:16:16', NULL, NULL, 1),
(2, 'Jane Doe', 'Christchurch', 'Maecenas vel lacus facilisis, consequat augue nec, viverra nisi. Phasellus lacinia, eros dictum varius faucibus, nisi arcu aliquam sem, ut dignissim justo neque in quam. Nullam hendrerit nulla sed blandit vehicula.', '2018-02-02', 'A', 2, NULL, '2018-08-07 15:10:58', NULL, NULL, 1),
(3, 'Scott Doe', 'Auckland', 'Aenean diam quam, scelerisque eget lorem in, pretium auctor ipsum. Praesent nec enim diam. Sed iaculis porta eros, vitae ornare leo sagittis vitae. Aliquam id tellus lobortis, faucibus ligula ut, accumsan nisi. Integer blandit iaculis neque ac accumsan. Morbi vitae nisi eleifend, ullamcorper tellus vel, lacinia sapien.', '2017-10-08', 'A', 3, NULL, NULL, NULL, NULL, NULL),
(4, 'Lucas Doe', 'Sydney', 'Nunc semper orci nisl, vel sagittis nibh aliquam non. Curabitur mi justo, congue in ante a, auctor vehicula ipsum. Praesent sodales tellus vitae malesuada viverra. Integer mi eros, varius quis massa porta, imperdiet ullamcorper lacus.', '2017-10-13', 'A', 4, NULL, NULL, NULL, NULL, NULL),
(5, 'Mario Doe', 'Napier, New Zealand', 'Fusce enim enim, hendrerit eget cursus eget, facilisis a nunc. Phasellus a mi congue, sodales lectus ut, elementum risus. Curabitur elementum euismod felis ut malesuada. Quisque malesuada, arcu vel bibendum molestie, tellus tellus congue ex, sed congue justo tellus et risus.', '2018-08-02', 'A', 5, '2018-08-07 15:39:35', '2018-08-07 15:39:35', NULL, 1, 1),
(6, 'Rachel', 'Auckland', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed erat et purus vehicula consectetur eu non erat. Cras ut nisi sit amet neque pellentesque porttitor. Integer euismod, lacus sed viverra tincidunt, tortor nulla ultricies ex, vel faucibus diam sapien ac tellus. Suspendisse eleifend mauris id auctor lacinia. Nam luctus, nunc sed molestie accumsan, velit purus vestibulum metus, viverra dapibus ligula eros sit amet justo. Sed tempor ipsum magna, eget imperdiet tellus gravida eu. Maecenas quis ex vitae enim consectetur pellentesque sed at arcu. Donec pellentesque eu eros ac interdum. Nam faucibus, sapien sed porttitor convallis, ante leo egestas felis, dapibus vestibulum velit tellus vitae mauris. Suspendisse congue vitae velit eget consequat. Pellentesque eros justo, imperdiet eu nulla in, euismod gravida enim. Nunc diam ante, maximus ut maximus sed, vehicula nec risus. Pellentesque mollis libero quis sagittis posuere.', '2019-11-01', 'H', 10, '2019-11-18 11:39:27', '2019-11-18 11:39:27', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` int(11) NOT NULL,
  `option_name` varchar(100) DEFAULT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `option_name`, `option_value`) VALUES
(1, 'js_code_head_close', NULL),
(2, 'js_code_body_open', NULL),
(3, 'js_code_body_close', '<script src=\"https://code.jquery.com/jquery-3.6.0.min.js\" integrity=\"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=\" crossorigin=\"anonymous\"></script> <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/momentjs/latest/moment.min.js\" crossorigin=\"anonymous\"></script> <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js\" crossorigin=\"anonymous\"></script>'),
(4, 'gtm_code_head_close', NULL),
(5, 'gtm_code_body_open', NULL),
(6, 'adwords_code', NULL),
(7, 'structure_data_markup', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `showcase`
--

CREATE TABLE `showcase` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image_alt_txt` varchar(255) DEFAULT NULL,
  `status` enum('A','D','H') NOT NULL DEFAULT 'H',
  `rank` int(11) DEFAULT 0,
  `page_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `showcase`
--

INSERT INTO `showcase` (`id`, `name`, `header`, `description`, `image_path`, `image_alt_txt`, `status`, `rank`, `page_id`, `url`, `button_text`) VALUES
(3, 'STAY', 'Our Pristine Island Resort Stay', 'Nestled in a pristine ocean setting, our traditional Fijian-style bures offer a haven for families seeking Fiji accommodation. Immerse yourself in the South Pacific&rsquo;s embrace, lulled by palm whispers and turquoise waves.', '/library/images/testing-images/johannes-ludwig-348591-unsplash.jpg', 'test', 'A', 0, 10, NULL, 'OUR BURES'),
(4, 'DIVE', 'L&rsquo;Aventure: The Ultimate Dive Experience', 'From the moment you touch down at Nadi International Airport, you feel the warmth of Fiji time. &ldquo;Bula&rdquo; is more than a greeting; it&rsquo;s a heartfelt welcome from our staff, ready to guide you to you.', '/library/images/testing-images/lago-federa-3746335_1920.jpg', NULL, 'A', 0, 2, NULL, 'Explore Diving'),
(5, 'FAMILY', 'Where Families Unwind, and Kids Thrive', 'Discover a rare balance of indulgence and care. With dedicated nannies and curated experiences for every age, all included in your stay, families can relax knowing every detail is taken care of.', '/library/images/events/priscilla-du-preez-oD7carJZ_G0-unsplash.jpg', NULL, 'A', 0, 51, NULL, NULL),
(6, 'LOCATION', 'Plan Ahead for Your Journey to Paradise', 'Our secluded haven is surrounded by breathtaking natural beauty. An additional flight from Fiji&rsquo;s mainland is required, so we encourage arranging travel ahead of time to ensure a smooth arrival.', '/library/images/testing-images/01-testing-image.jpg', NULL, 'A', 0, NULL, 'https://google.com', 'how to get here'),
(7, 'Test', 'test', 'Testetstekhkjknlkjlkjlkjlkjkljhbhj', '/library/images/cape-kidnappers_evening-shot-b3unt.jpg', 'test', 'D', 0, NULL, NULL, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon_cls` varchar(255) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_external` enum('N','Y') NOT NULL DEFAULT 'Y',
  `is_active` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `label`, `url`, `title`, `icon_cls`, `rank`, `is_external`, `is_active`) VALUES
(1, 'Facebook', 'https://www.facebook.com', 'Join us on Facebook', 'fa fa-facebook', 1, 'Y', 'Y'),
(2, 'Instagram', 'http://www.instagram.com', 'Follow us on Instagram', 'fa fa-instagram', 2, 'Y', 'Y'),
(3, 'Twitter', 'http://www.twitter.com', 'Follow us on Twitter', 'fa fa-twitter', 3, 'Y', 'Y'),
(4, 'Pintrest', 'https://www.pinterest.com', 'Follow us on Pinterest\n', 'fa fa-pinterest', 4, 'Y', 'Y'),
(5, 'Google+', 'https://www.google.com', 'Follow us on Google+', 'fa fa-google-plus', 5, 'Y', 'Y'),
(6, 'Flickr', 'https://www.flickr.com', 'View our photos on Flickr', 'fa fa-flickr', 6, 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_account`
--

CREATE TABLE `social_media_account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `icon_cls` varchar(50) DEFAULT NULL,
  `icon_image_path` varchar(255) DEFAULT NULL,
  `status` enum('A','D','H') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `social_media_account`
--

INSERT INTO `social_media_account` (`id`, `name`, `url`, `title`, `icon_cls`, `icon_image_path`, `status`, `rank`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'Join us on Facebook', 'fab fa-facebook', NULL, 'A', 1),
(2, 'Instagram', 'https://www.instagram.com/', 'Follow us on Instagram', 'fab fa-instagram', NULL, 'A', 3),
(3, 'Trip Advisor', 'https://www.tripadvisor.co.nz/cathuagold', 'Trip Advisor', 'fab fa-tripadvisor', NULL, 'D', 5),
(4, 'X', 'https://www.twitter.com/', 'Follow us on twitter', 'fa-brands fa-x-twitter', NULL, 'A', 2),
(5, 'Youtube', 'https://www.youtube.com/', NULL, 'fab fa-youtube', NULL, 'A', 4),
(6, 'LinkedIn', 'https://example.com', 'LinkedIn', 'fab fa-linkedin-in', NULL, 'D', 10),
(7, NULL, NULL, NULL, NULL, NULL, 'D', 6);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `col1` int(11) DEFAULT NULL,
  `col2` int(11) DEFAULT NULL,
  `col3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `col1`, `col2`, `col3`) VALUES
(1, 1, 1, 'a'),
(2, 1, 1, 'b'),
(3, 1, 1, 'c'),
(4, 2, 1, 'x'),
(5, 2, 1, 'y'),
(6, 2, 2, 'z');

-- --------------------------------------------------------

--
-- Table structure for table `templates_normal`
--

CREATE TABLE `templates_normal` (
  `tmpl_id` int(11) NOT NULL COMMENT 'Primary key for template',
  `tmpl_name` varchar(100) NOT NULL COMMENT 'Template name',
  `tmpl_path` varchar(100) NOT NULL COMMENT 'Template URL (i.e. ''default'', ''shop'', ''googlemap'' etc). It is recommended that you leave the extension up to the application/code.',
  `tmpl_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `cms_preview_thumb_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `templates_normal`
--

INSERT INTO `templates_normal` (`tmpl_id`, `tmpl_name`, `tmpl_path`, `tmpl_showincms`, `cms_preview_thumb_path`) VALUES
(1, 'Default', 'index.tmpl', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `page_meta_data_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `amount`, `currency_code`, `page_meta_data_id`) VALUES
(1, 10.00, 'NZD', 105),
(2, 20.00, 'NZD', 106),
(3, 30.00, 'USD', 107);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_purchased`
--

CREATE TABLE `voucher_purchased` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `is_notified` enum('Y','N') DEFAULT 'N',
  `voucher_name` text DEFAULT NULL,
  `voucher_price` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `purchaser_first_name` text DEFAULT NULL,
  `purchaser_last_name` text DEFAULT NULL,
  `purchaser_email` text DEFAULT NULL,
  `purchaser_phone` varchar(50) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `recipient_name` text DEFAULT NULL,
  `recipient_name_on_voucher` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `delivery_option` varchar(45) DEFAULT NULL,
  `delivery_email` varchar(255) DEFAULT NULL,
  `delivery_post` varchar(255) DEFAULT NULL,
  `delivery_string` varchar(20) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `voucher_transaction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voucher_purchased`
--

INSERT INTO `voucher_purchased` (`id`, `date`, `amount`, `is_notified`, `voucher_name`, `voucher_price`, `quantity`, `purchaser_first_name`, `purchaser_last_name`, `purchaser_email`, `purchaser_phone`, `voucher_id`, `recipient_name`, `recipient_name_on_voucher`, `message`, `delivery_option`, `delivery_email`, `delivery_post`, `delivery_string`, `status`, `purchase_date`, `expiry_date`, `voucher_transaction_id`) VALUES
(1, NULL, 10.00, 'Y', 'Gift Voucher for 10$', NULL, NULL, 'Test', 'Alina', 'alina@tomahawk.co.nz', '+6400000000', NULL, 'Test Alina', 'Test Alina', 'Whoop Whoop', 'Email', 'alina@tomahawk.co.nz', NULL, 'J5QFq2OuC3', NULL, NULL, NULL, NULL),
(2, NULL, 5.00, 'Y', 'For coffee', NULL, NULL, 'Test', 'Alina', 'alina@tomahawk.co.nz', '+6400000000', NULL, 'Test Alina', 'Test Alina', 'Coffeeeeeee', 'Email', 'alina@tomahawk.co.nz', NULL, 'MWX5ibPGoi', NULL, NULL, NULL, NULL),
(3, NULL, 10.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', NULL, NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'i6mSjAyKBI', NULL, NULL, NULL, NULL),
(4, NULL, 30.00, 'Y', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'S0nydkXP6O', NULL, '2021-12-03 12:03:12', '2021-02-03 12:03:12', NULL),
(5, NULL, 30.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'pUq0zNWo4Y', NULL, NULL, NULL, NULL),
(6, NULL, 30.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '2SQSRGWJgY', NULL, NULL, NULL, NULL),
(7, NULL, 30.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'KkWEsin9rr', NULL, NULL, NULL, NULL),
(8, NULL, 30.00, 'Y', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'teset', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'eD4LUnHKS3', NULL, '2021-12-03 12:24:57', '2022-02-03 12:24:57', NULL),
(9, NULL, 50.00, 'N', NULL, NULL, NULL, 'hardik', 'test', 'hardik@tomahawk.co.nz', '0224989334', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'vtWTdOd1Su', NULL, NULL, NULL, NULL),
(10, NULL, 50.00, 'N', NULL, NULL, NULL, 'hardik', 'test', 'hardik@tomahawk.co.nz', '0224989334', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'raa950euKg', NULL, NULL, NULL, NULL),
(11, NULL, 50.00, 'Y', NULL, NULL, NULL, 'hardik', 'test', 'hardik@tomahawk.co.nz', '0224989334', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'GrgjvggAFB', NULL, NULL, NULL, NULL),
(12, NULL, 30.00, 'N', NULL, NULL, NULL, 'hardik', 'dhanani', 'hardik@tomahawk.co.nz', '0222', NULL, 'test', 'test', 'tst', 'Email', 'hardik@tomahawk.co.nz', NULL, 'ZIQIpgZZa0', NULL, NULL, NULL, NULL),
(13, NULL, 50.00, 'N', NULL, NULL, NULL, 'test', 'dhanani', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'zPJGfAEYYG', NULL, NULL, NULL, NULL),
(14, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'YIa8n0cpKl', NULL, NULL, NULL, NULL),
(15, NULL, 50.00, 'Y', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'YIa8n0cpKl', NULL, NULL, NULL, NULL),
(16, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'gnnMYqW3RX', NULL, NULL, NULL, NULL),
(17, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'gnnMYqW3RX', NULL, NULL, NULL, NULL),
(18, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'gnnMYqW3RX', NULL, NULL, NULL, NULL),
(19, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'nIVFT6vuYl', NULL, NULL, NULL, NULL),
(20, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'nIVFT6vuYl', NULL, NULL, NULL, NULL),
(21, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'nIVFT6vuYl', NULL, NULL, NULL, NULL),
(22, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'E90ZIX6oUM', NULL, NULL, NULL, NULL),
(23, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'E90ZIX6oUM', NULL, NULL, NULL, NULL),
(24, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'E90ZIX6oUM', NULL, NULL, NULL, NULL),
(25, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '2g5L4vfkqf', NULL, NULL, NULL, NULL),
(26, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '2g5L4vfkqf', NULL, NULL, NULL, NULL),
(27, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '2g5L4vfkqf', NULL, NULL, NULL, NULL),
(28, NULL, 80.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'F43fOaIuRj', NULL, NULL, NULL, NULL),
(29, NULL, 80.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'F43fOaIuRj', NULL, NULL, NULL, NULL),
(30, NULL, 80.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'F43fOaIuRj', NULL, NULL, NULL, NULL),
(31, NULL, 80.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'TDvdwJONl1', NULL, NULL, NULL, NULL),
(32, NULL, 80.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'TDvdwJONl1', NULL, NULL, NULL, NULL),
(33, NULL, 80.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'TDvdwJONl1', NULL, NULL, NULL, NULL),
(34, NULL, 80.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '0tEkQxtgS6', NULL, NULL, NULL, NULL),
(35, NULL, 80.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '0tEkQxtgS6', NULL, NULL, NULL, NULL),
(36, NULL, 80.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '0tEkQxtgS6', NULL, NULL, NULL, NULL),
(37, NULL, 80.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'rlOXv8lBSt', NULL, NULL, NULL, NULL),
(38, NULL, 80.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'rlOXv8lBSt', NULL, NULL, NULL, NULL),
(39, NULL, 80.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'rlOXv8lBSt', NULL, NULL, NULL, NULL),
(40, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'p0YIM144Cr', NULL, NULL, NULL, NULL),
(41, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'p0YIM144Cr', NULL, NULL, NULL, NULL),
(42, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'p0YIM144Cr', NULL, NULL, NULL, NULL),
(43, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'dgTecotKu2', NULL, NULL, NULL, NULL),
(44, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'dgTecotKu2', NULL, NULL, NULL, NULL),
(45, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'dgTecotKu2', NULL, NULL, NULL, NULL),
(46, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'pZLgtSt1al', NULL, NULL, NULL, NULL),
(47, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'pZLgtSt1al', NULL, NULL, NULL, NULL),
(48, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'pZLgtSt1al', NULL, NULL, NULL, NULL),
(49, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '0YgLKQqAaY', NULL, NULL, NULL, NULL),
(50, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '0YgLKQqAaY', NULL, NULL, NULL, NULL),
(51, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '0YgLKQqAaY', NULL, NULL, NULL, NULL),
(52, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'g9N44DpGkc', NULL, NULL, NULL, NULL),
(53, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'g9N44DpGkc', NULL, NULL, NULL, NULL),
(54, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'g9N44DpGkc', NULL, NULL, NULL, NULL),
(55, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'YVTyaIzsIV', NULL, NULL, NULL, NULL),
(56, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'YVTyaIzsIV', NULL, NULL, NULL, NULL),
(57, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'hardik', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'YVTyaIzsIV', NULL, NULL, NULL, NULL),
(58, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'hardik@gmail.com', '123', NULL, 'etst', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'iNq9Vh2ufs', NULL, NULL, NULL, NULL),
(59, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'hardik@gmail.com', '123', NULL, 'etst', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'iNq9Vh2ufs', NULL, NULL, NULL, NULL),
(60, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'hardik@gmail.com', '123', NULL, 'etst', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'iNq9Vh2ufs', NULL, NULL, NULL, NULL),
(61, NULL, 60.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '213', NULL, 'test', 'test', 'teset', 'Email', 'test@gmail.com', NULL, 'obyNIINMF2', NULL, NULL, NULL, NULL),
(62, NULL, 60.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '213', NULL, 'test', 'test', 'teset', 'Email', 'test@gmail.com', NULL, 'obyNIINMF2', NULL, NULL, NULL, NULL),
(63, NULL, 60.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '213', NULL, 'test', 'test', 'teset', 'Email', 'test@gmail.com', NULL, 'obyNIINMF2', NULL, NULL, NULL, NULL),
(64, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'tset', 'tes', 'Email', 'test@gmail.com', NULL, 'gM4H86UhBd', NULL, NULL, NULL, NULL),
(65, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'tset', 'tes', 'Email', 'test@gmail.com', NULL, 'gM4H86UhBd', NULL, NULL, NULL, NULL),
(66, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'rte', 'te', 'teyt@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'teyt@gmail.com', NULL, '6jtgYBjvL9', NULL, NULL, NULL, NULL),
(67, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'rte', 'te', 'teyt@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'teyt@gmail.com', NULL, '6jtgYBjvL9', NULL, NULL, NULL, NULL),
(68, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'Fja3XbS5Jv', NULL, NULL, NULL, NULL),
(69, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'Fja3XbS5Jv', NULL, NULL, NULL, NULL),
(70, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'RmrJeF1Raf', NULL, NULL, NULL, NULL),
(71, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'RmrJeF1Raf', NULL, NULL, NULL, NULL),
(72, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'U3wYFwsTfq', NULL, NULL, NULL, NULL),
(73, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'U3wYFwsTfq', NULL, NULL, NULL, NULL),
(74, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'jObGtSuJe7', NULL, NULL, NULL, NULL),
(75, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'tset', 'etst', 'test', 'Email', 'test@gmail.com', NULL, 'jObGtSuJe7', NULL, NULL, NULL, NULL),
(76, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'FirZXZgXjF', NULL, NULL, NULL, NULL),
(77, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'FirZXZgXjF', NULL, NULL, NULL, NULL),
(78, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'meXcykAc2F', NULL, NULL, NULL, NULL),
(79, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'meXcykAc2F', NULL, NULL, NULL, NULL),
(80, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'xtGavnTkhe', NULL, NULL, NULL, NULL),
(81, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'xtGavnTkhe', NULL, NULL, NULL, NULL),
(82, NULL, 50.00, 'N', 'Gift Voucher for 30$1', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'G3AePQyTGM', NULL, NULL, NULL, NULL),
(83, NULL, 50.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'G3AePQyTGM', NULL, NULL, NULL, NULL),
(84, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'MNmP2OvQnL', NULL, NULL, NULL, NULL),
(85, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'MNmP2OvQnL', NULL, NULL, NULL, NULL),
(86, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'oT1RM6GZfR', NULL, NULL, NULL, NULL),
(87, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'oT1RM6GZfR', NULL, NULL, NULL, NULL),
(88, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'C1Yui1EZBn', NULL, NULL, NULL, NULL),
(89, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'C1Yui1EZBn', NULL, NULL, NULL, NULL),
(90, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '1dWtMg8KH2', NULL, NULL, NULL, NULL),
(91, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '1dWtMg8KH2', NULL, NULL, NULL, NULL),
(92, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'IOq1zGH8pw', NULL, NULL, NULL, NULL),
(93, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'IOq1zGH8pw', NULL, NULL, NULL, NULL),
(94, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'yuVyEYHdqm', NULL, NULL, NULL, NULL),
(95, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'yuVyEYHdqm', NULL, NULL, NULL, NULL),
(96, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '8E64YpBzyC', NULL, NULL, NULL, NULL),
(97, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '8E64YpBzyC', NULL, NULL, NULL, NULL),
(98, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'hd0IS8gfKp', NULL, NULL, NULL, NULL),
(99, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'hd0IS8gfKp', NULL, NULL, NULL, NULL),
(100, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'tes', 'ttest', 'test@gmail.com', '123', NULL, 'tse', 'test', 'etst', 'Email', 'test@gmail.com', NULL, '90ILqJUZoT', NULL, NULL, NULL, NULL),
(101, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'tes', 'ttest', 'test@gmail.com', '123', NULL, 'tse', 'test', 'etst', 'Email', 'test@gmail.com', NULL, '90ILqJUZoT', NULL, NULL, NULL, NULL),
(102, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'tes', 'ttest', 'test@gmail.com', '123', NULL, 'tse', 'test', 'etst', 'Email', 'test@gmail.com', NULL, 'n3gx08FXnr', NULL, NULL, NULL, NULL),
(103, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'tes', 'ttest', 'test@gmail.com', '123', NULL, 'tse', 'test', 'etst', 'Email', 'test@gmail.com', NULL, 'n3gx08FXnr', NULL, NULL, NULL, NULL),
(104, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'tes', 'ttest', 'test@gmail.com', '123', NULL, 'tse', 'test', 'etst', 'Email', 'test@gmail.com', NULL, 'OXwzTV3Rob', NULL, NULL, NULL, NULL),
(105, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'tes', 'ttest', 'test@gmail.com', '123', NULL, 'tse', 'test', 'etst', 'Email', 'test@gmail.com', NULL, 'OXwzTV3Rob', NULL, NULL, NULL, NULL),
(106, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'test', 'test@gmail.com', '123', NULL, 'etst', 'test', 'tesetset', 'Email', 'test@gmail.com', NULL, 'qR1tXHpM0m', NULL, NULL, NULL, NULL),
(107, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'test', 'test@gmail.com', '123', NULL, 'etst', 'test', 'tesetset', 'Email', 'test@gmail.com', NULL, 'qR1tXHpM0m', NULL, NULL, NULL, NULL),
(108, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'teset', 'test', 'Email', 'hardik@gmail.com', NULL, 'LbgkATWshD', NULL, NULL, NULL, NULL),
(109, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'teset', 'test', 'Email', 'hardik@gmail.com', NULL, 'LbgkATWshD', NULL, NULL, NULL, NULL),
(110, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'test', 'tests@gmail.com', NULL, NULL, 'test', 'test', 'tests@gmail.com', 'Email', 'tests@gmail.com', NULL, 'TzM2kz0Jy2', NULL, NULL, NULL, NULL),
(111, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'test', 'tests@gmail.com', NULL, NULL, 'test', 'test', 'tests@gmail.com', 'Email', 'tests@gmail.com', NULL, 'TzM2kz0Jy2', NULL, NULL, NULL, NULL),
(112, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'cwJkRJOpQ7', NULL, NULL, NULL, NULL),
(113, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'cwJkRJOpQ7', NULL, NULL, NULL, NULL),
(114, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'zOIopgi86R', NULL, NULL, NULL, NULL),
(115, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'zOIopgi86R', NULL, NULL, NULL, NULL),
(116, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'b6HWmLUHLH', NULL, NULL, NULL, NULL),
(117, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'b6HWmLUHLH', NULL, NULL, NULL, NULL),
(118, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'zB6bCA0BOn', NULL, NULL, NULL, NULL),
(119, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'zB6bCA0BOn', NULL, NULL, NULL, NULL),
(120, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '8Qy3niKKFI', NULL, NULL, NULL, NULL),
(121, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '8Qy3niKKFI', NULL, NULL, NULL, NULL),
(122, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'IuoXvJHRZV', NULL, NULL, NULL, 51),
(123, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'IuoXvJHRZV', NULL, NULL, NULL, 51),
(124, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'xQWnYbk2Q0', NULL, NULL, NULL, 52),
(125, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'hardik', 'hardik', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'xQWnYbk2Q0', NULL, NULL, NULL, 52),
(126, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'Oov4EkWaPt', NULL, NULL, NULL, 53),
(127, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'Oov4EkWaPt', NULL, NULL, NULL, 53),
(128, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'tes', 'tsete', 'Email', 'test@gmail.com', NULL, 'YQAg3OJaJ4', NULL, NULL, NULL, 54),
(129, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'tes', 'tsete', 'Email', 'test@gmail.com', NULL, 'YQAg3OJaJ4', NULL, NULL, NULL, 54),
(130, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'aC1UIVAaQC', NULL, NULL, NULL, 55),
(131, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'aC1UIVAaQC', NULL, NULL, NULL, 55),
(132, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'CNoZ6ZGsJK', NULL, NULL, NULL, 56),
(133, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'CNoZ6ZGsJK', NULL, NULL, NULL, 56),
(134, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'zub9mEGFIQ', NULL, NULL, NULL, 57),
(135, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'zub9mEGFIQ', NULL, NULL, NULL, 57),
(136, NULL, 30.00, 'N', 'Gift Voucher for 20$', NULL, NULL, 'test', 'test', 'test@gmail.cm', NULL, NULL, 'test', NULL, 'test@gmail.cm', 'Email', 'test@gmail.cm', NULL, 'Xj5ASerwf7', NULL, NULL, NULL, 58),
(137, NULL, 30.00, 'N', 'Gift Voucher for 10$', NULL, NULL, 'test', 'test', 'test@gmail.cm', NULL, NULL, 'test', NULL, 'test@gmail.cm', 'Email', 'test@gmail.cm', NULL, 'Xj5ASerwf7', NULL, NULL, NULL, 58),
(138, NULL, 60.00, 'N', 'Gift Voucher for 20$', 20.00, NULL, 'test', 'test', 'test@gmail.com', '1234', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'pcmcailI0W', NULL, NULL, NULL, 59),
(139, NULL, 60.00, 'N', 'Gift Voucher for 10$', 10.00, NULL, 'test', 'test', 'test@gmail.com', '1234', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'pcmcailI0W', NULL, NULL, NULL, 59),
(140, NULL, 60.00, 'N', 'Gift Voucher for 30$1', 30.00, NULL, 'test', 'test', 'test@gmail.com', '1234', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'pcmcailI0W', NULL, NULL, NULL, 59),
(141, NULL, 60.00, 'N', 'Gift Voucher for 20$', 20.00, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'snlN3dC4sa', NULL, NULL, NULL, 60),
(142, NULL, 60.00, 'N', 'Gift Voucher for 10$', 10.00, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'snlN3dC4sa', NULL, NULL, NULL, 60),
(143, NULL, 60.00, 'N', 'Gift Voucher for 30$1', 30.00, NULL, 'test', 'test', 'hardik@tomahawk.co.nz', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'snlN3dC4sa', NULL, NULL, NULL, 60),
(144, NULL, 60.00, 'N', 'Gift Voucher for 20$', 20.00, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '5KggGpuMfi', NULL, '2022-01-26 12:54:48', '1970-01-01 12:00:00', 61),
(145, NULL, 60.00, 'N', 'Gift Voucher for 10$', 10.00, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '5KggGpuMfi', NULL, '2022-01-26 12:54:48', '2022-02-26 12:54:48', 61),
(146, NULL, 60.00, 'N', 'Gift Voucher for 30$1', 30.00, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, '5KggGpuMfi', NULL, '2022-01-26 12:54:48', '2022-03-26 12:54:48', 61),
(147, NULL, 66.00, 'N', 'Gift Voucher for 20$', 20.00, NULL, 'hardik', 'test', 'testhardik@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'testhardik@gmail.com', NULL, 'U3MVZ9Uzgj', NULL, '2022-01-26 01:00:23', '1970-01-01 12:00:00', 62),
(148, NULL, 66.00, 'N', 'Gift Voucher for 10$', 10.00, NULL, 'hardik', 'test', 'testhardik@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'testhardik@gmail.com', NULL, 'U3MVZ9Uzgj', NULL, '2022-01-26 01:00:23', '2022-02-26 01:00:23', 62),
(149, NULL, 66.00, 'N', 'Gift Voucher for 30$1', 30.00, NULL, 'hardik', 'test', 'testhardik@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'testhardik@gmail.com', NULL, 'U3MVZ9Uzgj', NULL, '2022-01-26 01:00:23', '2022-03-26 01:00:23', 62),
(150, NULL, 66.00, 'N', 'vouchercustom', 6.00, NULL, 'hardik', 'test', 'testhardik@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'testhardik@gmail.com', NULL, 'U3MVZ9Uzgj', NULL, '2022-01-26 01:00:23', '1970-01-01 12:00:00', 62),
(151, NULL, 100.00, 'N', 'Gift Voucher for 20$', 40.00, 2, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'wYAlzy9zKI', NULL, '2022-01-27 04:20:05', '1970-01-01 12:00:00', 63),
(152, NULL, 100.00, 'N', 'Gift Voucher for 10$', 30.00, 3, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'wYAlzy9zKI', NULL, '2022-01-27 04:20:05', '2022-02-27 04:20:05', 63),
(153, NULL, 100.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'wYAlzy9zKI', NULL, '2022-01-27 04:20:05', '2022-03-27 04:20:05', 63),
(154, NULL, 100.00, 'Y', 'Gift Voucher for 20$', 40.00, 2, 'test', 'test', 'tes@gmail.com', NULL, NULL, 'test', 'tes', 'test', 'Email', 'test@gmail.com', NULL, '5E05GTWaK0', NULL, '2022-01-27 04:22:40', '1970-01-01 12:00:00', 64),
(155, NULL, 100.00, 'N', 'Gift Voucher for 10$', 30.00, 3, 'test', 'test', 'tes@gmail.com', NULL, NULL, 'test', 'tes', 'test', 'Email', 'test@gmail.com', NULL, '5E05GTWaK0', NULL, '2022-01-27 04:22:40', '2022-02-27 04:22:40', 64),
(156, NULL, 100.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'tes@gmail.com', NULL, NULL, 'test', 'tes', 'test', 'Email', 'test@gmail.com', NULL, '5E05GTWaK0', NULL, '2022-01-27 04:22:40', '2022-03-27 04:22:40', 64),
(157, NULL, 254.00, 'Y', 'A1', 56.00, 1, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'ETagpobJFG', NULL, '2022-01-28 10:09:03', '1970-01-01 12:00:00', 65),
(158, NULL, 254.00, 'N', 'B2', 78.00, 1, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'ETagpobJFG', NULL, '2022-01-28 10:09:03', '1970-01-01 12:00:00', 65),
(159, NULL, 254.00, 'N', 'B6', 90.00, 2, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'ETagpobJFG', NULL, '2022-01-28 10:09:03', '1970-01-01 12:00:00', 65),
(160, NULL, 254.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'test@gmail.com', NULL, NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'ETagpobJFG', NULL, '2022-01-28 10:09:03', '2022-03-28 10:09:03', 65),
(161, NULL, 20.00, 'N', 'Gift Voucher for 20$', 20.00, NULL, 'test', 'test', 'test@gmail.com', '123', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'heiKGOaeHx', NULL, '2022-03-24 04:06:12', '1970-01-01 12:00:00', 66),
(162, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, NULL, 'test', 'test', 'test@gmail.com', '12344536545', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'CXrYfVab0p', NULL, '2022-11-03 03:20:40', '2023-01-03 03:20:40', 67),
(163, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'O0b21dr0ea', NULL, '2023-02-08 02:24:33', '2023-04-08 02:24:33', 68),
(164, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'Pz9ZZRreDG', NULL, '2023-02-08 03:03:33', '2023-04-08 03:03:33', 69),
(165, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'oMBiDq9QJM', NULL, '2023-02-08 03:06:01', '2023-04-08 03:06:01', 70),
(166, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'JXTyGBDQ0P', NULL, '2023-02-08 03:06:24', '2023-04-08 03:06:24', 71),
(167, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'TQ48F7lUpg', NULL, '2023-02-08 03:11:37', '2023-04-08 03:11:37', 72),
(168, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'VQMHbHDO2l', NULL, '2023-02-08 03:12:12', '2023-04-08 03:12:12', 73),
(169, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, '5xMAQFUn8B', NULL, '2023-02-08 03:12:49', '2023-04-08 03:12:49', 74),
(170, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '123123113213', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'NO60IAtuO8', NULL, '2023-02-08 03:19:51', '2023-04-08 03:19:51', 75),
(171, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'hardik@tomahawk.co.nz', '4234234', NULL, 'testset', 'tests', 'test from tomahawk', 'Email', 'hardik@tomahawk.co.nz', NULL, 'RS1xumHaA0', NULL, '2023-04-17 04:55:48', '2023-06-17 04:55:48', NULL),
(172, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'etst', 'etest', 'hardik@tomahawk.co.nz', '1231313123', NULL, 'test', 'test', 'ewett', 'Email', 'hardik@tomahawk.co.nz', NULL, 'L50euaDdpm', NULL, '2023-04-19 02:04:19', '2023-06-19 02:04:19', NULL),
(173, NULL, 45.00, 'N', 'frfsrfr', 45.00, 1, 'frwerf', 'fwerfwref', 'rina@tomahawk.co.nz', '5234523626', NULL, 'werfw', 'werfwerf', 'efwerf', 'Email', 'rina@tomahawk.co.nz', NULL, 'Pa6axUR9Nw', NULL, '2023-06-27 03:00:40', '2023-07-27 03:00:40', NULL),
(174, NULL, 45.00, 'N', 'fgsfghsfhg', 45.00, 1, 'xvxcb', 'xcvbxcvb', 'rina@tomahawk.co.nz', '678589879', NULL, 'hjfghj', 'jkfhjkhjk', 'kjhkfhk', 'Email', 'rina.transom@gmail.com', NULL, 'NTZVTsJyXA', NULL, '2023-10-05 12:24:15', '2023-11-05 12:24:15', 76),
(175, NULL, 45.00, 'N', 'hfghfg', 45.00, 1, 'htehfgd', 'dfghdf', 'rina@jjfjff.com', '634573567', NULL, 'dfgsdfgdfg', '456745', '657457', 'Email', 'rina@hdjd.com', NULL, '7PZ9dGpNjj', NULL, '2023-10-05 01:46:57', '2023-11-05 01:46:57', 77),
(176, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'test@gmail.com', '2342342', NULL, 'ateset', 'tests', 'test', 'Email', 'test@gmail.com', NULL, 'XhYatQwKaQ', NULL, '2024-05-31 05:01:43', '2024-07-31 05:01:43', 78),
(177, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'test@test.COM', '121212112', NULL, 'test', 'test', 'test', 'Email', 'test@test.com', NULL, '0yXFcyFGKZ', NULL, '2024-07-05 11:03:33', '2024-09-05 11:03:33', 79),
(178, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'test@gmail.com', '1223212', NULL, 'test', 'test', 'test', 'Email', 'misbah@tomahawk.co.nz', NULL, 'nOLrdUASl3', NULL, '2024-07-05 11:07:21', '2024-09-05 11:07:21', 80),
(179, NULL, 10.00, 'Y', 'Gift Voucher for 10$', 10.00, 1, 'test', 'test', 'bakhtiyar@tomahawk.co.nz', '022233544', NULL, 'Bakhtiyar', 'test2222', 'testtesttesttesttesttest', 'Email', 'BDuganov@gmail.com', NULL, 'VKyDNBtaKV', NULL, '2024-09-18 09:55:12', '2024-10-18 09:55:12', 81),
(180, NULL, 20.00, 'Y', 'Gift Voucher for 20$', 20.00, 1, 'test', 'test', 'BDuganov@gmail.com', '0223584327', NULL, 'bakhtiyar', 'test2', 'test2', 'Email', 'BDuganov@gmail.com', NULL, 'BtPUsWrtBJ', NULL, '2024-09-18 10:01:24', '2024-10-18 10:01:24', 82),
(181, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'test', 'Testd', 'BDuganov@gmail.com', '0223584327', NULL, 'Bakhtiyar', 'Bakhtiyar', 'Bakhtiyar', 'Email', 'BDuganov@gmail.com', NULL, '5r7jWOw02G', NULL, '2024-09-18 10:33:42', '2024-11-18 10:33:42', 83),
(182, NULL, 45.00, 'Y', 'DDDDD', 45.00, 1, 'test', 'tesrrr', 'BDuganov@gmail.com', '02222222', NULL, 'testtest', 'test111', 'BDuganov@gmail.comBDuganov@gmail.comBDuganov@gmail.comBDuganov@gmail.com', 'Email', 'BDuganov@gmail.com', NULL, 'CCSK2D8BfO', NULL, '2024-09-18 10:46:48', '2024-10-18 10:46:48', 84),
(183, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'BDuganov@gmail.com', '0222555745', NULL, 'ffferee', 'ssdscxc', 'BDuganov@gmail.comBDuganov@gmail.comBDuganov@gmail.comBDuganov@gmail.comBDuganov@gmail.com', 'Email', 'BDuganov@gmail.com', NULL, 'o366NIOVof', NULL, '2024-09-18 10:50:01', '2024-11-18 10:50:01', 85),
(184, NULL, 20.00, 'Y', 'Gift Voucher for 20$', 20.00, 1, 'test', 'test', 'Bduganov@gmail.com', '022255520', NULL, 'qwer', 'qwer', 'qqwqwqwqwqw', 'Email', 'Bduganov@gmail.com', NULL, 'BDWitWZYWa', NULL, '2024-09-18 11:25:25', '2024-10-18 11:25:25', 86),
(185, NULL, 10.00, 'Y', 'Gift Voucher for 10$', 10.00, 1, 'qwqwq', 'wewwe', 'BDuganov@gmail.com', '0222225454', NULL, 'qwqwqw', 'sdsds', 'vddfdf', 'Email', 'BDuganov@gmail.com', NULL, 'Ta1BBCxp9s', NULL, '2024-09-18 11:30:12', '2024-10-18 11:30:12', 87),
(186, NULL, 20.00, 'Y', 'Gift Voucher for 20$', 20.00, 1, 'qwqqw', 'dssd', 'BDuganov@gmail.com', '02255455', NULL, 'qqwee', 'ffdds', 'qqwqwqw', 'Email', 'BDuganov@gmail.com', NULL, '56XuC8jMUE', NULL, '2024-09-18 11:32:32', '2024-10-18 11:32:32', 88),
(187, NULL, 20.00, 'Y', 'Gift Voucher for 20$', 20.00, 1, 'qwe', 'qwe', 'BDuganov@gmail.com', '02254145', NULL, 'qwqw', 'ewewe', 'sdsdsd', 'Email', 'BDuganov@gmail.com', NULL, 'ceRV8hfCVL', NULL, '2024-09-18 11:46:03', '2024-10-18 11:46:03', 89),
(188, NULL, 20.00, 'Y', 'Gift Voucher for 20$', 20.00, 1, 'qwe', 'qwe', 'BDuganov@gmail.com', '02235555', NULL, 'asasa', 'xcxc', 'xcsdsd', 'Email', 'BDuganov@gmail.com', NULL, 'G1Yh221AJh', NULL, '2024-09-18 01:29:21', '2024-10-18 01:29:21', 90),
(189, NULL, 30.00, 'N', 'Gift Voucher for 30', 30.00, 1, 'qasdsdsdsd', 'dsds', 'test@gmail.com', '132323434', NULL, 'test', 'test', 'test', 'Email', 'test@gmail.com', NULL, 'dCOSLdciyQ', NULL, '2024-10-08 02:14:56', '2024-12-08 02:14:56', 91),
(190, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'test', 'test', 'dabbdsf@gmail.com', '123123123', NULL, 'asdadasd', '123123', 'asdasdasdasd', 'Email', 'trest@dada.com', NULL, 'kfyGM9thuf', NULL, '2024-10-15 10:17:14', '2024-12-15 10:17:14', 92),
(191, NULL, 1.00, 'Y', 'Test', 1.00, 1, 'ResBook', 'Test', 'annlauren1204@gmail.com', '123456789', NULL, 'Test', 'Test', 'Test', 'Email', 'annlauren1204@gmail.com', NULL, 'TTmf3WIS8i', NULL, '2024-10-15 12:10:27', '2024-11-15 12:10:27', 93),
(192, NULL, 35.00, 'N', '23', 35.00, 1, 'yrr', 'test', 'test@gmail.com', '1231132123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'VCE0KPTJ7N', NULL, '2024-11-13 11:09:42', '2024-12-13 11:09:42', 94),
(193, NULL, 35.00, 'N', '23', 35.00, 1, 'yrr', 'test', 'test@gmail.com', '1231132123', NULL, 'test', 'test', 'test', 'Email', 'hardik@tomahawk.co.nz', NULL, 'beHbJP5hW8', NULL, '2024-11-13 04:30:28', '2024-12-13 04:30:28', 95),
(194, NULL, 30.00, 'Y', 'Gift Voucher for 30', 30.00, 1, 'ResBook', 'Test', 'aprilann@resbook.com', '123456789', NULL, 'ResBook', 'Test', 'Test', 'Email', 'aprilann@respax.com', NULL, 'DlQznRMBaH', NULL, '2024-11-21 09:01:14', '2025-01-21 09:01:14', 96);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_settings`
--

CREATE TABLE `voucher_settings` (
  `id` int(11) NOT NULL,
  `terms_and_cond` text DEFAULT NULL,
  `fail_payment_message` varchar(200) DEFAULT NULL,
  `success_payment_message` varchar(200) DEFAULT NULL,
  `notification_email_address` varchar(200) DEFAULT NULL,
  `voucher_subject` text DEFAULT NULL,
  `client_subject` text DEFAULT NULL,
  `voucher_amount` text DEFAULT NULL,
  `surcharge_text` text DEFAULT NULL,
  `valid_for` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voucher_settings`
--

INSERT INTO `voucher_settings` (`id`, `terms_and_cond`, `fail_payment_message`, `success_payment_message`, `notification_email_address`, `voucher_subject`, `client_subject`, `voucher_amount`, `surcharge_text`, `valid_for`) VALUES
(1, '<p>Lorem</p>', 'fail', 'success 1111', 'www@netzone.website;bakhtiyar@tomahawk.co.nz;Daniyar@tomahawk.co.nz;', 'Gift voucher for you', 'Thank you for buying voucher', '5,10,25,35,45,56,67,87,99', 'Please Note There Is A 2.5% Surcharge For Using A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_transaction`
--

CREATE TABLE `voucher_transaction` (
  `id` int(11) NOT NULL,
  `amount_settlement` decimal(10,2) DEFAULT 0.00,
  `auth_code` varchar(250) DEFAULT NULL,
  `cc_name` varchar(250) DEFAULT NULL,
  `cc_holder_name` varchar(250) DEFAULT NULL,
  `cc_number` varchar(200) DEFAULT NULL,
  `cc_date_expire` varchar(100) DEFAULT NULL,
  `dps_billing_id` varchar(20) DEFAULT NULL,
  `dps_ref` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `data1` varchar(250) DEFAULT NULL,
  `data2` varchar(250) DEFAULT NULL,
  `data3` varchar(250) DEFAULT NULL,
  `currency_settlement` varchar(100) DEFAULT 'NZD',
  `client_ip` varchar(150) DEFAULT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `currency_input` varchar(100) DEFAULT NULL,
  `merchant_ref` varchar(255) DEFAULT NULL,
  `response_text` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `response_url` mediumtext DEFAULT NULL,
  `date_processsed` datetime DEFAULT NULL,
  `amount_surcharge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_notified` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `voucher_transaction`
--

INSERT INTO `voucher_transaction` (`id`, `amount_settlement`, `auth_code`, `cc_name`, `cc_holder_name`, `cc_number`, `cc_date_expire`, `dps_billing_id`, `dps_ref`, `type`, `data1`, `data2`, `data3`, `currency_settlement`, `client_ip`, `txn_id`, `currency_input`, `merchant_ref`, `response_text`, `mac_address`, `response_url`, `date_processsed`, `amount_surcharge`, `is_notified`) VALUES
(1, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(2, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(3, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(4, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(5, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(6, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(7, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(8, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(9, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(10, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(11, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(12, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(13, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(14, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(15, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(16, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(17, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(18, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(19, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(20, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(21, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(22, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(23, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(24, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(25, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(26, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(27, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(28, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(29, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(30, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(31, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(32, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(33, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(34, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(35, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(36, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(37, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(38, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(39, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(40, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(41, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(42, 30.00, '150522', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129477495', '000000013e205b97', 'Purchase', '', '', '', NULL, '114.23.241.67', 'ID61ee095e9ef8a', 'NZD', 'tomahawk61ee095e9ef87', 'APPROVED', '2BC20210', '000001011010831801ff24aa1464b5c9', '2022-01-24 03:18:59', 0.75, 'N'),
(43, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '106,107', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(44, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '108,109', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(45, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '110,111', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(46, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '112,113', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(47, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '114,115', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(48, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '116,117', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(49, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '118,119', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(50, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '120,121', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(51, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '122,123', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(52, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '124,125', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(53, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '126,127', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(54, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '129', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(55, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '131', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(56, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '133', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(57, 30.00, '151923', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129483418', '000000013e21274c', 'Purchase', '', '', '135', NULL, '114.23.241.67', 'ID61ee0ca816d1d', 'NZD', 'tomahawk61ee0ca816d1a', 'APPROVED', '2BC20210', '0000010110112744011d7678935634c6', '2022-01-24 03:19:24', 0.75, 'N'),
(58, 30.00, '152525', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129485929', '000000013e217fb7', 'Purchase', '', '', '136,137,', NULL, '114.23.241.67', 'ID61ee0e1208b3e', 'NZD', 'tomahawk61ee0e1208b3c', 'APPROVED', '2BC20210', '000001011011463201f035a975dc8b91', '2022-01-24 03:25:26', 0.75, 'N'),
(59, 60.00, '153544', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000010129490216', '000000013e22134d', 'Purchase', '', '', '138,139,140,', NULL, '114.23.241.67', 'ID61ee107b93818', 'NZD', 'tomahawk61ee107b93816', 'APPROVED', '2BC20210', '0000010110117728014a5e5e5ced3efc', '2022-01-24 03:35:45', 1.50, 'N'),
(60, 60.00, '105734', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000070059784517', '00000007214480ee', 'Purchase', '', '', '141,142,143,', NULL, '114.23.241.67', 'ID61f0724a1ffe3', 'NZD', 'tomahawk61f0724a1ffe0', 'APPROVED', '2BC20210', '0000070051634297076af6ced1ebbf0b', '2022-01-26 10:57:39', 1.50, 'N'),
(61, 60.00, '125451', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000070059835352', '00000007214b31b0', 'Purchase', '', '', '144,145,146,', NULL, '114.23.241.67', 'ID61f08dc813c4e', 'NZD', 'tomahawk61f08dc813c4c', 'APPROVED', '2BC20210', '0000070051675670074c5370edef8011', '2022-01-26 12:54:52', 1.50, 'N'),
(62, 66.00, '130026', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000070059837798', '00000007214b8483', 'Purchase', '', '', '147,148,149,150,', NULL, '114.23.241.67', 'ID61f08f1767a3a', 'NZD', 'tomahawk61f08f1767a38', 'APPROVED', '2BC20210', '000007005167758107bf6340eb2fff23', '2022-01-26 01:00:28', 1.65, 'N'),
(63, 100.00, '162009', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000070060289862', '0000000721871067', 'Purchase', '', '', '151,152,153,', NULL, '114.23.241.67', 'ID61f20f6545ae8', 'NZD', 'tomahawk61f20f6545ae5', 'APPROVED', '2BC20210', '00000700521282560709563887362f35', '2022-01-27 04:20:11', 2.50, 'N'),
(64, 100.00, '162243', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000070060291028', '0000000721873874', 'Purchase', '', '', '154,155,156,', NULL, '114.23.241.67', 'ID61f2100010714', 'NZD', 'tomahawk61f2100010712', 'APPROVED', '2BC20210', '000007005212903507807b9f7762cb31', '2022-01-27 04:22:44', 2.50, 'N'),
(65, 254.00, '100907', 'Visa', 'TEST PAYMENT', '411111........11', '0122', '0000070060494929', '0000000721a13521', 'Purchase', '', '', '157,158,159,160,', NULL, '114.23.241.67', 'ID61f309ef99f56', 'NZD', 'tomahawk61f309ef99f53', 'APPROVED', '2BC20210', '0000070052353341071f6ad07a03f188', '2022-01-28 10:09:08', 6.35, 'N'),
(66, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '161,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(67, 30.00, '152155', 'Visa', 'TEST', '411111........11', '0324', '0000070099612889', '000000073710266c', 'Purchase', '', '', '162,', NULL, '114.23.241.67', 'ID6363257847728', 'NZD', 'tomahawk6363257847725', 'APPROVED', '2BC20210', '000007009025378907d3132eb1bec27c', '2022-11-03 03:20:52', 0.75, 'N'),
(68, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '163,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(69, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '164,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(70, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '165,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(71, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '166,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(72, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '167,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(73, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '168,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(74, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '169,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0.00, 'N'),
(75, 30.00, '152214', 'Visa', 'TEST', '411111........11', '0124', '0000020031425440', '00000002114adf8f', 'Purchase', '', '', '170,', NULL, '114.23.241.67', 'ID63e306c769a5f', 'NZD', 'tomahawk63e306c769a5d', 'APPROVED', '2BC20210', '00000200254449230253fe4602a38280', '2023-02-08 03:21:40', 0.75, 'N'),
(76, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '174,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 'N'),
(77, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '175,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 'N'),
(78, 30.00, '170155', 'Visa', 'TEST', '411111........11', '0434', '0000080146402229', '000000084ca3f7f1', 'Purchase', '', '', '176,', NULL, '101.53.219.255', 'ID665959b7d5faa', 'NZD', 'tomahawk665959b7d5fa9', 'APPROVED', '2BC20210', '00000801361885750895651d068f9537', '2024-05-31 05:01:56', 0.75, 'N'),
(79, 30.00, '', '', 'User Cancelled', '000000........00', '', '', '00000008527a3a6e', 'Purchase', '', '', '177,', NULL, '150.107.175.151', 'ID66872a458c5f1', 'NZD', 'tomahawk66872a458c5f0', 'DECLINED', '', '0000080147442872086d0613f33575ea', '2024-07-05 11:03:40', 0.00, 'N'),
(80, 30.00, '110739', 'Visa', 'SDSADSD', '411111........11', '1124', '0000080157228614', '00000008527a7c94', 'Purchase', '', '', '178,', NULL, '150.107.175.151', 'ID66872b2985e9e', 'NZD', 'tomahawk66872b2985e9b', 'APPROVED', '2BC20210', '000008014744427408947881a4af0691', '2024-07-05 11:07:41', 0.75, 'N'),
(81, 10.00, '095530', 'Visa', 'ASASAS ASASAS', '411111........11', '1125', '0000020079332018', '000000022c77845c', 'Purchase', '', '', '179,', NULL, '150.107.175.248', 'ID66e9fac03555b', 'NZD', 'tomahawk66e9fac03555a', 'APPROVED', '2BC20210', '000002007630684902f43c827534604a', '2024-09-18 09:55:34', 0.25, 'N'),
(82, 20.00, '100139', 'Visa', 'QQWQW EEEE', '411111........11', '1125', '0000020079334665', '000000022c77e694', 'Purchase', '', '', '180,', NULL, '150.107.175.248', 'ID66e9fc3474e67', 'NZD', 'tomahawk66e9fc3474e64', 'APPROVED', '2BC20210', '00000200763094130207fc542b979d0e', '2024-09-18 10:01:43', 0.50, 'N'),
(83, 30.00, '103354', 'Visa', 'QWQW WQWQW', '411111........11', '1125', '0000020079349050', '000000022c7a03f9', 'Purchase', '', '', '181,', NULL, '150.107.175.248', 'ID66ea03c67f739', 'NZD', 'tomahawk66ea03c67f736', 'APPROVED', '2BC20210', '000002007632324002840b4c2de050b6', '2024-09-18 10:34:00', 0.75, 'N'),
(84, 45.00, '104705', 'Visa', 'SDSD CXCXCX', '411111........11', '1125', '0000020079355191', '000000022c7ae619', 'Purchase', '', '', '182,', NULL, '150.107.175.248', 'ID66ea06d870708', 'NZD', 'tomahawk66ea06d870707', 'APPROVED', '2BC20210', '000002007632886002b8041dda7fd0e2', '2024-09-18 10:47:09', 1.12, 'N'),
(85, 30.00, '105018', 'Visa', 'QWQWAS SASASA', '411111........11', '1126', '0000020079356707', '000000022c7b1d3c', 'Purchase', '', '', '183,', NULL, '150.107.175.248', 'ID66ea07998896d', 'NZD', 'tomahawk66ea07998896c', 'APPROVED', '2BC20210', '000002007633031302e146bcea8ffa89', '2024-09-18 10:50:22', 0.75, 'N'),
(86, 20.00, '112544', 'Visa', 'QWQWQW SDSDS', '411111........11', '1025', '0000020079373639', '000000022c7d9620', 'Purchase', '', '', '184,', NULL, '150.107.175.248', 'ID66ea0fe585a2c', 'NZD', 'tomahawk66ea0fe585a2a', 'APPROVED', '2BC20210', '000002007634666502a9982d80e35646', '2024-09-18 11:25:46', 0.50, 'N'),
(87, 10.00, '113025', 'Visa', 'FDFDF DTRETR', '411111........11', '1125', '0000020079375949', '000000022c7dea82', 'Purchase', '', '', '185,', NULL, '150.107.175.248', 'ID66ea110430a80', 'NZD', 'tomahawk66ea110430a7e', 'APPROVED', '2BC20210', '000002007634881802054baa966fdf3e', '2024-09-18 11:30:27', 0.25, 'N'),
(88, 20.00, '113244', 'Visa', 'QQW EWEWE', '411111........11', '1125', '0000020079377074', '000000022c7e14f8', 'Purchase', '', '', '186,', NULL, '150.107.175.248', 'ID66ea11908a4ae', 'NZD', 'tomahawk66ea11908a4ac', 'APPROVED', '2BC20210', '000002007634985302c3bfbc3ee78023', '2024-09-18 11:32:46', 0.50, 'N'),
(89, 20.00, '114615', 'Visa', 'ASAXCXCXC', '411111........11', '1025', '0000020079384033', '000000022c7f137c', 'Purchase', '', '', '187,', NULL, '150.107.175.248', 'ID66ea14bb9bbba', 'NZD', 'tomahawk66ea14bb9bbb9', 'APPROVED', '2BC20210', '000002007635626902447e2e0577f32c', '2024-09-18 11:46:18', 0.50, 'N'),
(90, 20.00, '132932', 'Visa', 'QWQ CXCXC', '411111........11', '1125', '0000020079440356', '000000022c874bcb', 'Purchase', '', '', '188,', NULL, '150.107.175.248', 'ID66ea2cf1f0ab1', 'NZD', 'tomahawk66ea2cf1f0ab0', 'APPROVED', '2BC20210', '000002007640332902ebb85a4fba1ee7', '2024-09-18 01:29:38', 0.50, 'N'),
(91, 30.00, '', '', 'User Cancelled', '000000........00', '', '', '000000085c44cbfa', 'Purchase', '', '', '189,', NULL, '150.107.175.248', 'ID670487900c04d', 'NZD', 'tomahawk670487900c04c', 'DECLINED', '', '0000080165032218087950f38401cac1', '2024-10-08 02:15:01', 0.00, 'N'),
(92, 30.00, '101806', 'Visa', 'ASDASD ASDASD', '411111........11', '0434', '0000020087562919', '000000023110e582', 'Purchase', '', '', '190,', NULL, '150.107.175.150', 'ID670d8a5af12f6', 'NZD', 'tomahawk670d8a5af12f5', 'APPROVED', '2BC20210', '00000200846306960265fd2a5b45de52', '2024-10-15 10:18:35', 0.75, 'N'),
(93, 1.00, '121048', 'Visa', 'A H', '411111........11', '1125', '0000020087616846', '000000023118e86b', 'Purchase', '', '', '191,', NULL, '203.211.108.252', 'ID670da4e3ec429', 'NZD', 'tomahawk670da4e3ec427', 'APPROVED', '2BC20210', '0000020084680330026cadc6ecfb0e87', '2024-10-15 12:10:54', 0.02, 'N'),
(94, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '192,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 'N'),
(95, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '193,', 'NZD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 'N'),
(96, 30.00, '090134', 'Visa', 'A H', '411111........11', '1125', '0000080182167822', '000000086049b78e', 'Purchase', '', '', '194,', NULL, '203.211.108.252', 'ID673e400a72a8f', 'NZD', 'tomahawk673e400a72a8d', 'APPROVED', '2BC20210', '000008017210409108fa752d2ef54c5f', '2024-11-21 09:01:37', 0.75, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accommodation_category`
--
ALTER TABLE `accommodation_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accommodation_has_category`
--
ALTER TABLE `accommodation_has_category`
  ADD PRIMARY KEY (`accommodation_id`,`accommodation_category_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_has_category`
--
ALTER TABLE `blog_post_has_category`
  ADD PRIMARY KEY (`post_id`,`category_id`);

--
-- Indexes for table `cms_accessgroups`
--
ALTER TABLE `cms_accessgroups`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `cms_blacklist_user`
--
ALTER TABLE `cms_blacklist_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_login_attempt`
--
ALTER TABLE `cms_login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`cmsset_id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_cms_users_access_idx_idx` (`access_id`);

--
-- Indexes for table `content_row`
--
ALTER TABLE `content_row`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_entry`
--
ALTER TABLE `form_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_entry_data`
--
ALTER TABLE `form_entry_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_photo`
--
ALTER TABLE `gallery_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_importantpages`
--
ALTER TABLE `general_importantpages`
  ADD PRIMARY KEY (`imppage_id`),
  ADD KEY `fk_general_importantpages_general_page1_idx` (`page_id`);

--
-- Indexes for table `general_pages`
--
ALTER TABLE `general_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id_idx` (`parent_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googlemap_account`
--
ALTER TABLE `googlemap_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googlemap_location`
--
ALTER TABLE `googlemap_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_banner`
--
ALTER TABLE `hero_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_banner_item`
--
ALTER TABLE `hero_banner_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_banner_item_hero_banner_idx_1` (`hero_banner_id`);

--
-- Indexes for table `highlight`
--
ALTER TABLE `highlight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlight_style`
--
ALTER TABLE `highlight_style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_accounts`
--
ALTER TABLE `instagram_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_feeds`
--
ALTER TABLE `instagram_feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailchimp_account`
--
ALTER TABLE `mailchimp_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailchimp_lists`
--
ALTER TABLE `mailchimp_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `module_pages`
--
ALTER TABLE `module_pages`
  ADD PRIMARY KEY (`modpages_id`,`mod_id`,`page_id`),
  ADD KEY `fk_module_pages_modules1_idx` (`mod_id`),
  ADD KEY `fk_module_pages_general_page1_idx` (`page_id`);

--
-- Indexes for table `module_settings`
--
ALTER TABLE `module_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_templates`
--
ALTER TABLE `module_templates`
  ADD PRIMARY KEY (`tmplmod_id`),
  ADD KEY `fk_module_templates_tmpl_id_idx` (`tmpl_id`),
  ADD KEY `fk_module_templates_mod_idx` (`mod_id`);

--
-- Indexes for table `page_highlight_section`
--
ALTER TABLE `page_highlight_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_meta_data`
--
ALTER TABLE `page_meta_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bsh_query_1` (`status`,`menu_label`,`heading`,`title`,`sub_heading`);

--
-- Indexes for table `page_meta_index`
--
ALTER TABLE `page_meta_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_quicklink_section`
--
ALTER TABLE `page_quicklink_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnership_logo`
--
ALTER TABLE `partnership_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quicklinks`
--
ALTER TABLE `quicklinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quicklink_style`
--
ALTER TABLE `quicklink_style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redirect`
--
ALTER TABLE `redirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcase`
--
ALTER TABLE `showcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_account`
--
ALTER TABLE `social_media_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates_normal`
--
ALTER TABLE `templates_normal`
  ADD PRIMARY KEY (`tmpl_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_purchased`
--
ALTER TABLE `voucher_purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_settings`
--
ALTER TABLE `voucher_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_transaction`
--
ALTER TABLE `voucher_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `accommodation_category`
--
ALTER TABLE `accommodation_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms_accessgroups`
--
ALTER TABLE `cms_accessgroups`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_blacklist_user`
--
ALTER TABLE `cms_blacklist_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cms_login_attempt`
--
ALTER TABLE `cms_login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1610;

--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `cmsset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for user', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `content_row`
--
ALTER TABLE `content_row`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1840;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_entry`
--
ALTER TABLE `form_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_entry_data`
--
ALTER TABLE `form_entry_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery_photo`
--
ALTER TABLE `gallery_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `general_importantpages`
--
ALTER TABLE `general_importantpages`
  MODIFY `imppage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_pages`
--
ALTER TABLE `general_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for pages', AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `googlemap_account`
--
ALTER TABLE `googlemap_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `googlemap_location`
--
ALTER TABLE `googlemap_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hero_banner`
--
ALTER TABLE `hero_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `hero_banner_item`
--
ALTER TABLE `hero_banner_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `highlight`
--
ALTER TABLE `highlight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `highlight_style`
--
ALTER TABLE `highlight_style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instagram_accounts`
--
ALTER TABLE `instagram_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instagram_feeds`
--
ALTER TABLE `instagram_feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailchimp_account`
--
ALTER TABLE `mailchimp_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mailchimp_lists`
--
ALTER TABLE `mailchimp_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for include', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `module_pages`
--
ALTER TABLE `module_pages`
  MODIFY `modpages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2167;

--
-- AUTO_INCREMENT for table `module_settings`
--
ALTER TABLE `module_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `module_templates`
--
ALTER TABLE `module_templates`
  MODIFY `tmplmod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `page_highlight_section`
--
ALTER TABLE `page_highlight_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `page_meta_data`
--
ALTER TABLE `page_meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `page_meta_index`
--
ALTER TABLE `page_meta_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_quicklink_section`
--
ALTER TABLE `page_quicklink_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `partnership_logo`
--
ALTER TABLE `partnership_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quicklinks`
--
ALTER TABLE `quicklinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `quicklink_style`
--
ALTER TABLE `quicklink_style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redirect`
--
ALTER TABLE `redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `showcase`
--
ALTER TABLE `showcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_media_account`
--
ALTER TABLE `social_media_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `templates_normal`
--
ALTER TABLE `templates_normal`
  MODIFY `tmpl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for template', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher_purchased`
--
ALTER TABLE `voucher_purchased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `voucher_settings`
--
ALTER TABLE `voucher_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher_transaction`
--
ALTER TABLE `voucher_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD CONSTRAINT `fk_cms_users_access_idx` FOREIGN KEY (`access_id`) REFERENCES `cms_accessgroups` (`access_id`);

--
-- Constraints for table `general_importantpages`
--
ALTER TABLE `general_importantpages`
  ADD CONSTRAINT `fk_general_importantpages_general_page1` FOREIGN KEY (`page_id`) REFERENCES `general_pages` (`id`);

--
-- Constraints for table `general_pages`
--
ALTER TABLE `general_pages`
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`parent_id`) REFERENCES `general_pages` (`id`);

--
-- Constraints for table `module_pages`
--
ALTER TABLE `module_pages`
  ADD CONSTRAINT `fk_module_pages_general_page1` FOREIGN KEY (`page_id`) REFERENCES `general_pages` (`id`),
  ADD CONSTRAINT `fk_module_pages_modules1` FOREIGN KEY (`mod_id`) REFERENCES `modules` (`mod_id`);

--
-- Constraints for table `module_templates`
--
ALTER TABLE `module_templates`
  ADD CONSTRAINT `fk_module_templates_mod_idx` FOREIGN KEY (`mod_id`) REFERENCES `modules` (`mod_id`),
  ADD CONSTRAINT `fk_module_templates_tmpl_idx` FOREIGN KEY (`tmpl_id`) REFERENCES `templates_normal` (`tmpl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
