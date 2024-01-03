-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3006
-- Generation Time: Jan 03, 2024 at 08:55 AM
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
(58, 40, 35, 'PENDING', 'This brand is very cool', 4);

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
(41, 'Hyundai', 'South Korea', 'Seoul', 1967, 'hyundai.jpg');

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
(33, 1, NULL, NULL, 26, 28);

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
(24, 'Breaking News: Major Discovery in Space Exploration', '<p>The scientific community is abuzz with excitement as astronomers have made a groundbreaking discovery in our universe. In a press conference held earlier today, researchers announced the identification of a new celestial phenomenon that challenges our current understanding of astrophysics.</p>\r\n<p>This unexpected finding opens up new possibilities for space exploration and has the potential to reshape our understanding of the cosmos. Scientists are now working tirelessly to analyze the data collected from various observatories around the world.</p>\r\n<ul>\r\n  <li><strong>Key Discoveries:</strong> Multiple exoplanets in the habitable zone, Unusual gamma-ray bursts</li>\r\n  <li><strong>Researchers:</strong> Dr. Emily Johnson, Dr. Michael Rodriguez, and the international team of astronomers</li>\r\n</ul>\r\n<p>Stay tuned for more updates on this extraordinary discovery as scientists delve deeper into the mysteries of the universe.</p>', 'test', '2024-01-01 22:49:46', '2024-01-01 22:49:46', 'test ,  news , car , good ', 0, 0),
(25, 'Feature Article with Stylish Formatting', '<h1 style=\"font-size: 36px; text-align: start; color: #3498db;\">Tech Innovations Shaping the Future</h1>\r\n\r\n<p>In a world driven by technological advancements, innovation continues to redefine the way we live and work. From artificial intelligence to renewable energy, the following features highlight some of the remarkable tech trends shaping our future:</p>\r\n\r\n<ol>\r\n\r\n  <li><strong>The Rise of AI:</strong> Exploring the impact of artificial intelligence on industries and everyday life.</li>\r\n\r\n  <li><strong>Sustainable Tech:</strong> Innovations in green technology and their role in combating climate change.</li>\r\n\r\n  <li><strong>Immersive Experiences:</strong> Virtual reality and augmented reality transforming entertainment and education.</li>\r\n\r\n</ol>\r\n\r\n<p>Join us on a journey through the cutting-edge developments that promise to revolutionize our world.</p>\r\n\r\n', 'https://ckeditor.com/', '2024-01-01 22:58:33', '2024-01-01 23:12:55', 'new , amazing , nice , good , google', 0, 0),
(26, 'test', '<p>asdfasdf</p><p>asdf</p><p>asdf</p><p>asd</p><p>fadfad</p><p>fad</p><p>fa</p><p>df</p><p>adsf</p><p>adf</p>', 'test', '2024-01-01 23:25:15', '2024-01-01 23:25:15', 'test', 0, 0),
(27, 'asdfasdfasdf', '<h1>this is a big text</h1><p>nice one mojio jo jo</p><p><span style=\"background-color: rgb(255, 255, 0);\">hello this is&nbsp;</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">what about having&nbsp;</span>&nbsp;asdf adf</p><p><br></p><ol><li><ol><li>this is amazing</li></ol></li></ol><p><ol></ol></p><p style=\"text-align: center; \">what about his&nbsp;</p><p style=\"text-align: center; \">this is amazing&nbsp;</p>', 'asdfasdfasdf', '2024-01-01 23:28:20', '2024-01-01 23:28:20', 'asdf,a,a,,a,a,a,a,a,a', 0, 0);

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
(1, 26),
(40, 26);

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
(35, '$2y$10$3hX6fz28TmsaPf75PZfRweRRolr6sOFftHgCvpilH/APLEiwnUkmC', 'user1', 'Moncefon', 'Moussaoui', 'ADMIN', '2002-07-29', 'MALE', 'VALID', 'Flag_of_Palestine.png'),
(40, '$2y$10$MEKiGD0diu2fONc89ZAc3u/xG8//iu1gasCYpDyGg1HFf0zwvMnMG', 'user2', 'User8', 'Last8', 'USER', '1997-08-08', 'FEMALE', 'VALID', 'logo-mta.jpg');

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
(68, 1, 26, 'VALID', 'This car is amazing ', 4);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `comparisons`
--
ALTER TABLE `comparisons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
