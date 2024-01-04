-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3006
-- Generation Time: Jan 04, 2024 at 12:12 AM
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
-- Database: `carlog`
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
(59, 1, 42, 'PENDING', 'comment', 3),
(60, 1, 35, 'VALID', 'test', 2);

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
(35, 'Toyota', 'Japan', 'Toyota City', 1937, 'toyota.png'),
(36, 'Ford', 'USA', 'Dearborn', 1903, 'ford.png'),
(37, 'Honda', 'Japan', 'Tokyo City', 1948, 'honda.png'),
(38, 'Chevrolet', 'USA', 'Detroit', 1911, 'chevrolet.jpg'),
(39, 'Volkswagen', 'Germany', 'Wolfsburg', 1927, 'volkswagen.jpg'),
(40, 'Nissan', 'Japan', 'Yokohama', 1933, 'nissan.png'),
(41, 'Hyundai', 'South Korea', 'Seoul', 1967, 'hyundai.jpg'),
(42, 'test', 'test', 'test', 2002, 'camry-xle-2023.png');

-- --------------------------------------------------------

--
-- Table structure for table `comparisons`
--

CREATE TABLE `comparisons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicule_1_id` int(11) DEFAULT NULL,
  `vehicule_2_id` int(11) DEFAULT NULL,
  `vehicule_3_id` int(11) DEFAULT NULL,
  `vehicule_4_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comparisons`
--

INSERT INTO `comparisons` (`id`, `user_id`, `vehicule_1_id`, `vehicule_2_id`, `vehicule_3_id`, `vehicule_4_id`) VALUES
(32, 1, NULL, NULL, 26, 28),
(33, 1, NULL, NULL, 26, 28),
(34, 1, NULL, NULL, 26, 28),
(35, 1, NULL, NULL, 26, 28);

-- --------------------------------------------------------

--
-- Table structure for table `contactinformations`
--

CREATE TABLE `contactinformations` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactinformations`
--

INSERT INTO `contactinformations` (`id`, `email`, `phone`, `address`, `website`, `facebook_link`, `twitter_link`, `youtube_link`, `linkedin_link`, `instagram_link`) VALUES
(1, 'ka_moussaoui@esi.dz', '0553383214', 'Oued Semar , Algiers', 'https://portfolio-moncefme.vercel.app/', 'https://www.facebook.com/moncef.moussaoui.79/', 'https://twitter.com/MoncefMoussaou5', 'https://www.youtube.com/@moncefm1472', 'https://www.linkedin.com/in/abdelmouncif-moussaoui-35021a206/', 'https://www.instagram.com/moncefon/');

-- --------------------------------------------------------

--
-- Table structure for table `guidedachat`
--

CREATE TABLE `guidedachat` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guidedachat`
--

INSERT INTO `guidedachat` (`id`, `title`, `content`, `updated_at`) VALUES
(1, 'This is buyer guide', 'this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , this is a buyer guide , ', '2024-01-03 20:53:00');

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
(24, 'Breaking News: Major Discovery in Space Exploration', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 'test', '2024-01-01 22:49:46', '2024-01-03 23:11:35', 'test ,  news , car , good ', 0, 0),
(25, 'Feature Article with Stylish Formatting', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 'https://ckeditor.com/', '2024-01-01 22:58:33', '2024-01-03 23:11:45', 'new , amazing , nice , good , google', 0, 0),
(26, 'test', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 'test', '2024-01-01 23:25:15', '2024-01-03 23:11:54', 'test', 0, 0),
(27, 'asdfasdfasdf', 'Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news, Hello this is a news...', 'asdfasdfasdf', '2024-01-01 23:28:20', '2024-01-03 20:50:49', 'asdf,a,a,,a,a,a,a,a,a', 0, 0),
(28, 'test anothe rone ', '<p>test this is amazing</p><p><img src=\"data:image/png;base64,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\" data-filename=\"image.png\" style=\"width: 541.995px;\"></p><p>I hope you will get it&nbsp;</p>', 'here we go', '2024-01-03 12:23:56', '2024-01-03 12:23:56', 'I love youtuve', 0, 0);

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
-- Table structure for table `sliderimages`
--

CREATE TABLE `sliderimages` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
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
(1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `password`, `username`, `firstName`, `lastName`, `role`, `birthDate`, `sex`, `status`, `profilePicture`) VALUES
(1, '$2y$10$WQoAVvXzVvvZEAz5iv6nKOZyHKL.Aaa.YUrbOrHpOR1e0XebMGcK2', 'admin', 'admin', 'admin', 'ADMIN', '2023-12-11', 'MALE', 'VALID', 'Moncef.jpeg'),
(35, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user1', 'Moncefon', 'Moussaoui', 'ADMIN', '2002-07-29', 'MALE', 'VALID', 'Flag_of_Palestine.png');

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
(68, 1, 26, 'VALID', 'This car is amazing ', 4),
(69, 1, 28, 'PENDING', 'good car ', 2),
(70, 1, 28, 'PENDING', 'nice looking car ', 4),
(71, 1, 28, 'PENDING', 'I love it ', 2),
(72, 1, 27, 'PENDING', 'this review is here', 3);

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
(26, 'Camry', 'XLE', 2023, 'camry-xle-2023.png', 192.10, 72.40, 56.90, 111.20, '2.5L 4-cylinder', '185 hp', 27999.99, 28.50, 35, 'A reliable midsize sedan.'),
(27, 'Rav4', 'Limited', 2023, 'rav4_limited.jpg', 180.90, 73.00, 67.00, 105.90, '2.5L 4-cylinder', '203 hp', 32999.99, 26.30, 35, 'A versatile compact SUV.'),
(28, 'Highlander', 'Platinum', 2023, '2023_toyota_highlander_hybrid_le_01.png', 194.90, 76.00, 68.10, 112.20, '3.5L V6', '295 hp', 41999.99, 23.10, 35, 'A spacious and comfortable midsize SUV.');

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
-- Indexes for table `comparisons`
--
ALTER TABLE `comparisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicule1_fk` (`vehicule_1_id`),
  ADD KEY `vehicule2_fk` (`vehicule_2_id`),
  ADD KEY `vehicule3_fk` (`vehicule_3_id`),
  ADD KEY `vehicule4_fk` (`vehicule_4_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `contactinformations`
--
ALTER TABLE `contactinformations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidedachat`
--
ALTER TABLE `guidedachat`
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
-- Indexes for table `sliderimages`
--
ALTER TABLE `sliderimages`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comparisons`
--
ALTER TABLE `comparisons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contactinformations`
--
ALTER TABLE `contactinformations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guidedachat`
--
ALTER TABLE `guidedachat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `newsimages`
--
ALTER TABLE `newsimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliderimages`
--
ALTER TABLE `sliderimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vehiculereviews`
--
ALTER TABLE `vehiculereviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- Constraints for table `comparisons`
--
ALTER TABLE `comparisons`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule1_fk` FOREIGN KEY (`vehicule_1_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule2_fk` FOREIGN KEY (`vehicule_2_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule3_fk` FOREIGN KEY (`vehicule_3_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule4_fk` FOREIGN KEY (`vehicule_4_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
