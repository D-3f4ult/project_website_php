-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2024 at 02:47 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_user_cart` (`user_id`),
  KEY `fk_product_cart` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `added_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `description` text,
  `weight` decimal(10,2) DEFAULT NULL,
  `image` longtext,
  `stock_quantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `cost`, `color`, `description`, `weight`, `image`, `stock_quantity`) VALUES
(4, '', 'watch s1', 100.00, 'black', 'The S1 Smart Watch in black combines style and functionality, featuring fitness tracking, smartphone integration, and a vibrant color display for a seamless experience.', 29.00, 'uploads/w1.png', 19),
(5, '', 'watch s2', 2000.00, 'green', 'Introducing the S12 Smart Watch in a vibrant green hue, blending bold style with advanced functionality. This sleek wearable offers precise fitness tracking, seamless smartphone integration, and a vivid color display. Stay connected and motivated in style with the S12—your ultimate companion for a dynamic lifestyle.', 10.00, 'uploads/w2.png', 9),
(6, '', 'watch w3', 3000.00, 'pink', 'Introducing the W3 Smart Watch in a charming pink hue, marrying fashion with function effortlessly. This elegant wearable boasts advanced features including fitness tracking, smartphone synchronization, and a vivid color display. Stay connected and on-trend with the W3—your perfect accessory for a vibrant lifestyle.', 10.00, 'uploads/w3.png', 2),
(7, '', 'watch w4', 3000.00, 'Blue', 'Introducing the W4 Smart Watch in a cool blue shade, harmonizing style with substance seamlessly. This versatile wearable offers precise fitness tracking, seamless smartphone connectivity, and a vibrant color display. Stay connected and motivated with the W4—your ideal companion for an active lifestyle.', 10.00, 'uploads/w4.png', 17),
(8, '', 'watch s5', 3000.00, 'wihte', 'Introducing the S5 Smart Watch in a pristine white hue, combining elegance with advanced functionality. This sleek wearable offers precise fitness tracking, seamless smartphone integration, and a crisp color display. Stay connected and stylish with the S5—your ultimate companion for a sophisticated lifestyle.', 10.00, 'uploads/w5.png', 0),
(9, '', 'watch s6', 3000.00, 'orange', 'Introducing the S6 Smart Watch in a vibrant orange hue, merging style with innovation flawlessly. This dynamic wearable boasts precise fitness tracking, seamless smartphone integration, and a vivid color display. Stay connected and energized with the S6—your perfect companion for an active and colorful lifestyle.', 10.00, 'uploads/w6.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'firstname',
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'lastname',
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_online` tinyint(1) DEFAULT '0',
  `online_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Offline',
  `blocked` tinyint(1) DEFAULT '0',
  `photo_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'photo',
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'contry',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `firstname`, `lastname`, `last_login`, `is_online`, `online_status`, `blocked`, `photo_profile`, `country`) VALUES
(3, 'admin', 'admin@example.com', 'alaa0987', 'admin', 'alaa', 'motran', '2024-04-06 05:17:50', 0, 'Offline', 0, NULL, NULL),
(51, 'user2', 'user2@gmail.com', '123', 'user', 'user', 'two', '2024-04-06 08:26:02', 0, 'Offline', 0, 'uploads/c2.jpg', 'israel'),
(50, 'user1', 'user1@gmail.com', '123', 'user', 'user', 'one', '2024-04-06 11:25:37', 0, 'Offline', 0, 'uploads/user1-3.png', 'israel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
