-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3006
-- Generation Time: Dec 28, 2023 at 08:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carlog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brandreviews`
--

CREATE TABLE `brandreviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `status` enum('VALID','PENDING','REJECTED') DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brandreviews`
--

INSERT INTO `brandreviews` (`id`, `user_id`, `brand_id`, `status`, `comment`, `rating`) VALUES
(1, 33, 22, 'VALID', 'Great brand!', 4.5),
(2, 34, 22, 'PENDING', 'Interesting products', 3.2),
(3, 35, 22, 'REJECTED', 'Not satisfied with the service', 2.1),
(4, 36, 22, 'VALID', 'Top-notch quality', 4.8),
(5, 37, 22, 'PENDING', 'Average experience', 3.5),
(6, 38, 23, 'VALID', 'Love their products', 4.2),
(7, 39, 23, 'PENDING', 'Would like to see more variety', 3),
(8, 40, 23, 'REJECTED', 'Not impressed', 2.5),
(9, 41, 23, 'VALID', 'Excellent customer service', 4.7),
(10, 42, 23, 'PENDING', 'Mixed feelings', 3),
(11, 33, 24, 'VALID', 'Positive experience', 4),
(12, 34, 24, 'PENDING', 'Waiting for improvements', 3.3),
(13, 35, 24, 'REJECTED', 'Unsatisfactory service', 1.9),
(14, 36, 24, 'VALID', 'Impressed with the brand', 4.6),
(15, 37, 24, 'PENDING', 'Average quality', 3.2),
(16, 33, 25, 'VALID', 'Highly recommend their products', 4.4),
(17, 34, 25, 'PENDING', 'Good value for money', 3.7),
(18, 35, 25, 'REJECTED', 'Poor customer service', 2),
(19, 36, 25, 'VALID', 'Great overall experience', 4.9),
(20, 37, 25, 'PENDING', 'Could be better', 3.4),
(21, 38, 26, 'VALID', 'Very satisfied with the brand', 4.6),
(22, 39, 26, 'PENDING', 'Expecting more features', 3.5),
(23, 40, 26, 'REJECTED', 'Quality issues', 1.8),
(24, 41, 26, 'VALID', 'Top-notch products', 4.8),
(25, 42, 26, 'PENDING', 'Average performance', 3.3),
(26, 33, 27, 'VALID', 'Excellent service and support', 4.7),
(27, 34, 27, 'PENDING', 'Hoping for improvements', 3.2),
(28, 35, 27, 'REJECTED', 'Unreliable products', 1.5),
(29, 36, 27, 'VALID', 'Impressed with the variety', 4.5),
(30, 37, 27, 'PENDING', 'Average quality', 3),
(31, 38, 28, 'VALID', 'Great brand to associate with', 4.5),
(32, 39, 28, 'PENDING', 'Looking for more options', 3.1),
(33, 40, 28, 'REJECTED', 'Unsatisfactory experience', 2.2),
(34, 41, 28, 'VALID', 'Quality products', 4.7),
(35, 42, 28, 'PENDING', 'Mixed feelings', 3),
(36, 33, 29, 'VALID', 'Positive vibes with the brand', 4.3),
(37, 34, 29, 'PENDING', 'Waiting for improvements', 3.2),
(38, 35, 29, 'REJECTED', 'Unsatisfactory service', 1.9),
(39, 36, 29, 'VALID', 'Impressed with the brand', 4.6),
(40, 37, 29, 'PENDING', 'Average quality', 3.2),
(41, 38, 30, 'VALID', 'Great brand to associate with', 4.5),
(42, 39, 30, 'PENDING', 'Looking for more options', 3.1),
(43, 40, 30, 'REJECTED', 'Unsatisfactory experience', 2.2),
(44, 41, 30, 'VALID', 'Quality products', 4.7),
(45, 42, 30, 'PENDING', 'Mixed feelings', 3),
(46, 42, 31, 'VALID', 'Impressive innovation', 4.9),
(47, 41, 31, 'PENDING', 'Waiting for new releases', 3.8),
(48, 40, 31, 'REJECTED', 'Disappointed with recent changes', 2.3),
(49, 39, 31, 'VALID', 'Satisfied with the brand', 4.5),
(50, 38, 31, 'PENDING', 'Looking forward to future products', 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `originCountry` varchar(255) DEFAULT NULL,
  `headquarter` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `brandPicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `originCountry`, `headquarter`, `year`, `brandPicture`) VALUES
(22, 'Brand1', 'Country1', 'HQ1', 2001, '9ff.png'),
(23, 'Brand2', 'Country2', 'HQ2', 2002, 'abadal.png'),
(24, 'Brand3', 'Country3', 'HQ3', 2003, 'abarth.png'),
(25, 'Brand4', 'Country4', 'HQ4', 2004, 'abbott-detroit.png'),
(26, 'Brand5', 'Country5', 'HQ5', 2005, 'ac.png'),
(27, 'Brand6', 'Country6', 'HQ6', 2006, 'aspark.png'),
(28, 'Brand7', 'Country7', 'HQ7', 2007, 'apollo.png'),
(29, 'Brand8', 'Country8', 'HQ8', 2008, 'bestune.png'),
(30, 'Brand9', 'Country9', 'HQ9', 2009, 'bugatti.png'),
(31, 'Brand10', 'Country10', 'HQ10', 2010, 'caparo.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` varchar(255) DEFAULT NULL,
  `views_count` int(11) DEFAULT 0,
  `likes_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `link`, `created_at`, `updated_at`, `tags`, `views_count`, `likes_count`) VALUES
(11, 'Electric Revolution: Tesla Unveils New Model with Mind-Blowing Range', 'Tesla, the pioneer in electric vehicles, has just revealed its latest model that boasts an unprecedented range of over 500 miles on a single charge. This breakthrough sets a new standard for the electric car industry.', 'https://www.google.com/', '2023-12-27 22:57:16', '2023-12-28 14:18:19', 'electric vehicles, Tesla, innovation, sustainable transportation', 100, 50),
(12, 'Title2', 'Content2', 'link2', '2023-12-27 22:57:16', '2023-12-27 23:16:38', 'tag3,tag4', 120, 70),
(13, 'Title3', 'Content3', 'link3', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag5,tag6', 80, 40),
(14, 'Title4', 'Content4', 'link4', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag7,tag8', 150, 90),
(15, 'Title5', 'Content5', 'link5', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag9,tag10', 200, 120),
(16, 'Title6', 'Content6', 'link6', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag11,tag12', 90, 30),
(17, 'Title7', 'Content7', 'link7', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag13,tag14', 110, 60),
(18, 'Title8', 'Content8', 'link8', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag15,tag16', 130, 80),
(19, 'Title9', 'Content9', 'link9', '2023-12-27 22:57:16', '2023-12-27 22:57:16', 'tag17,tag18', 70, 20);

-- --------------------------------------------------------

--
-- Table structure for table `newsimages`
--

CREATE TABLE `newsimages` (
  `id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userfavoritevehicules`
--

CREATE TABLE `userfavoritevehicules` (
  `user_id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userfavoritevehicules`
--

INSERT INTO `userfavoritevehicules` (`user_id`, `vehicule_id`) VALUES
(1, 13),
(1, 15),
(1, 16),
(1, 17),
(1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `role` enum('USER','ADMIN') DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `sex` enum('MALE','FEMALE') DEFAULT NULL,
  `status` enum('VALID','REJECTED','PENDING') DEFAULT NULL,
  `profilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `firstName`, `lastName`, `role`, `birthDate`, `sex`, `status`, `profilePicture`) VALUES
(1, '$2y$10$cbaohRdiLFMtfiQ5us0gdesjNNRadKc3JOSibIKU5TY9mZrXU2wMq', 'admin@admin', 'admin', 'admin', 'ADMIN', '2023-12-11', 'MALE', 'VALID', 'admin.png'),
(33, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user1@example.com', 'User1', 'Last1', 'USER', '1990-01-01', 'MALE', 'VALID', 'user1.jpg'),
(34, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user2@example.com', 'User2', 'Last2', 'USER', '1991-02-02', 'FEMALE', 'VALID', 'user2.jpg'),
(35, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user3@example.com', 'User3', 'Last3', 'ADMIN', '1992-03-03', 'MALE', 'VALID', 'user3.jpg'),
(36, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user4@example.com', 'User4', 'Last4', 'USER', '1993-04-04', 'FEMALE', 'PENDING', 'user4.jpg'),
(37, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user5@example.com', 'User5', 'Last5', 'USER', '1994-05-05', 'MALE', 'VALID', 'user5.jpg'),
(38, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user6@example.com', 'User6', 'Last6', 'ADMIN', '1995-06-06', 'FEMALE', 'VALID', 'user6.jpg'),
(39, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user7@example.com', 'User7', 'Last7', 'USER', '1996-07-07', 'MALE', 'PENDING', 'user7.jpg'),
(40, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user8@example.com', 'User8', 'Last8', 'USER', '1997-08-08', 'FEMALE', 'REJECTED', 'user8.jpg'),
(41, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user9@example.com', 'User9', 'Last9', 'ADMIN', '1998-09-09', 'MALE', 'VALID', 'user9.jpg'),
(42, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user10@example.com', 'User10', 'Last10', 'USER', '1999-10-10', 'FEMALE', 'PENDING', 'user10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculereviews`
--

CREATE TABLE `vehiculereviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `status` enum('VALID','PENDING','REJECTED') DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehiculereviews`
--

INSERT INTO `vehiculereviews` (`id`, `user_id`, `vehicule_id`, `status`, `comment`, `rating`) VALUES
(12, 33, 12, 'VALID', 'Excellent performance', 4.5),
(13, 34, 12, 'PENDING', 'Waiting for upgrades', 3.2),
(14, 35, 12, 'REJECTED', 'Issues with fuel consumption', 2.1),
(15, 36, 12, 'VALID', 'Smooth ride', 4.8),
(16, 37, 12, 'PENDING', 'Average experience', 3.5),
(17, 38, 13, 'VALID', 'Impressive features', 4.2),
(18, 39, 13, 'PENDING', 'Expecting more variety', 3),
(19, 40, 13, 'REJECTED', 'Not impressed with the design', 2.5),
(20, 41, 13, 'VALID', 'Excellent fuel efficiency', 4.7),
(21, 42, 13, 'PENDING', 'Mixed feelings about performance', 3),
(22, 33, 14, 'VALID', 'Smooth ride and handling', 4.4),
(23, 34, 14, 'PENDING', 'Good value for money', 3.7),
(24, 35, 14, 'REJECTED', 'Issues with maintenance', 2),
(25, 36, 14, 'VALID', 'Great overall experience', 4.9),
(26, 37, 14, 'PENDING', 'Could be better', 3.4),
(27, 38, 15, 'VALID', 'Very satisfied with the vehicle', 4.6),
(28, 39, 15, 'PENDING', 'Expecting more features', 3.5),
(29, 40, 15, 'REJECTED', 'Quality issues with components', 1.8),
(30, 41, 15, 'VALID', 'Top-notch performance', 4.8),
(31, 42, 15, 'PENDING', 'Average fuel efficiency', 3.3),
(32, 33, 16, 'VALID', 'Excellent safety features', 4.7),
(33, 34, 16, 'PENDING', 'Hoping for improvements', 3.2),
(34, 35, 16, 'REJECTED', 'Unreliable components', 1.5),
(35, 36, 16, 'VALID', 'Impressed with the design', 4.5),
(36, 37, 16, 'PENDING', 'Average comfort level', 3),
(37, 38, 17, 'VALID', 'Great for family trips', 4.5),
(38, 39, 17, 'PENDING', 'Looking for more options', 3.1),
(39, 40, 17, 'REJECTED', 'Unsatisfactory experience with features', 2.2),
(40, 41, 17, 'VALID', 'Quality build', 4.7),
(41, 42, 17, 'PENDING', 'Mixed feelings about the performance', 3),
(42, 33, 18, 'VALID', 'Positive experience with maintenance', 4.3),
(43, 34, 18, 'PENDING', 'Waiting for improvements', 3.2),
(44, 35, 18, 'REJECTED', 'Unsatisfactory service', 1.9),
(45, 36, 18, 'VALID', 'Impressed with the features', 4.6),
(46, 37, 18, 'PENDING', 'Average quality', 3.2),
(47, 38, 19, 'VALID', 'Great for city driving', 4.5),
(48, 39, 19, 'PENDING', 'Looking for more options', 3.1),
(49, 40, 19, 'REJECTED', 'Unsatisfactory experience', 2.2),
(50, 41, 19, 'VALID', 'Quality components', 4.7),
(51, 42, 19, 'PENDING', 'Mixed feelings', 3),
(52, 33, 20, 'VALID', 'Positive vibes with the vehicle', 4.3),
(53, 34, 20, 'PENDING', 'Waiting for improvements', 3.2),
(54, 35, 20, 'REJECTED', 'Unsatisfactory service', 1.9),
(55, 36, 20, 'VALID', 'Impressed with the vehicle', 4.6),
(56, 37, 20, 'PENDING', 'Average quality', 3.2),
(57, 42, 21, 'VALID', 'Highly recommend this vehicle', 4.9),
(58, 41, 21, 'PENDING', 'Waiting for new models', 3.8),
(59, 40, 21, 'REJECTED', 'Disappointed with recent changes', 2.3),
(60, 39, 21, 'REJECTED', 'Satisfied with the overall experience', 4.5),
(61, 38, 21, 'PENDING', 'Looking forward to future upgrades', 3.6),
(63, 33, 13, 'REJECTED', 'this is a test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `vehiculePicture` varchar(255) DEFAULT NULL,
  `length` decimal(8,2) DEFAULT NULL,
  `width` decimal(8,2) DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `wheelBase` decimal(8,2) DEFAULT NULL,
  `engine` varchar(255) DEFAULT NULL,
  `performance` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `consumption` decimal(5,2) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id`, `model`, `version`, `year`, `vehiculePicture`, `length`, `width`, `height`, `wheelBase`, `engine`, `performance`, `price`, `consumption`, `brand_id`, `note`) VALUES
(12, 'Model1', 'Version1', 2001, 'zenos.png', 4.50, 2.00, 1.80, 2.70, 'Engine1', 'Performance1', 30000.00, 8.50, 22, 'Note1'),
(13, 'Model2', 'Version2', 2002, 'kaiser.png', 4.70, 2.20, 1.90, 2.80, 'Engine2', 'Performance2', 35000.00, 9.00, 23, 'Note2'),
(14, 'Model3', 'Version3', 2003, 'cisitalia.png', 4.90, 2.40, 2.00, 3.00, 'Engine3', 'Performance3', 40000.00, 9.50, 24, 'Note3'),
(15, 'Model4', 'Version4', 2004, 'elfin.png', 5.10, 2.60, 2.10, 3.20, 'Engine4', 'Performance4', 45000.00, 10.00, 25, 'Note4'),
(16, 'Model5', 'Version5', 2005, 'diatto.png', 5.30, 2.80, 2.20, 3.40, 'Engine5', 'Performance5', 50000.00, 10.50, 26, 'Note5'),
(17, 'Model6', 'Version6', 2006, 'fiat.png', 5.50, 3.00, 2.30, 3.60, 'Engine6', 'Performance6', 55000.00, 11.00, 27, 'Note6'),
(18, 'Model7', 'Version7', 2007, 'honda.png', 5.70, 3.20, 2.40, 3.80, 'Engine7', 'Performance7', 60000.00, 11.50, 28, 'Note7'),
(19, 'Model8', 'Version8', 2008, 'dayun.png', 5.90, 3.40, 2.50, 4.00, 'Engine8', 'Performance8', 65000.00, 12.00, 29, 'Note8'),
(20, 'Model9', 'Version9', 2009, 'byd.png', 6.10, 3.60, 2.60, 4.20, 'Engine9', 'Performance9', 70000.00, 12.50, 30, 'Note9'),
(21, 'Model10', 'Version10', 2010, 'ikco.png', 6.30, 3.80, 2.70, 4.40, 'Engine10', 'Performance10', 75000.00, 13.00, 31, 'Note10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brandreviews`
--
ALTER TABLE `brandreviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsimages`
--
ALTER TABLE `newsimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `userfavoritevehicules`
--
ALTER TABLE `userfavoritevehicules`
  ADD PRIMARY KEY (`user_id`,`vehicule_id`),
  ADD KEY `fk_2` (`vehicule_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehiculereviews`
--
ALTER TABLE `vehiculereviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicule_id` (`vehicule_id`);

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brandreviews`
--
ALTER TABLE `brandreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `newsimages`
--
ALTER TABLE `newsimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vehiculereviews`
--
ALTER TABLE `vehiculereviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brandreviews`
--
ALTER TABLE `brandreviews`
  ADD CONSTRAINT `brandreviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `brandreviews_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsimages`
--
ALTER TABLE `newsimages`
  ADD CONSTRAINT `newsimages_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Constraints for table `userfavoritevehicules`
--
ALTER TABLE `userfavoritevehicules`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehiculereviews`
--
ALTER TABLE `vehiculereviews`
  ADD CONSTRAINT `vehiculereviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculereviews_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
