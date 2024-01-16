-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3006
-- Generation Time: Jan 16, 2024 at 04:51 PM
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
(66, 50, 45, 'VALID', 'I love BMW very much !', 4),
(70, 50, 46, 'VALID', 'Luxury Redefined, Ultimate Driving', 2),
(71, 50, 47, 'VALID', 'Sleek, Powerful, Elegant', 3),
(72, 51, 45, 'VALID', 'Reliable Daily Companion', 3),
(73, 51, 46, 'VALID', 'Bold, Robust, Adventure', 2),
(74, 51, 47, 'VALID', 'Off-Road Dominance', 2),
(75, 52, 45, 'VALID', 'Dependable, Efficient, Innovative', 2),
(76, 52, 46, 'VALID', 'Efficient,Dependable ,Innovative', 4),
(77, 52, 47, 'VALID', 'Stylish, Agile, Comfortabl', 5),
(78, 52, 48, 'VALID', 'I love Ford', 3),
(79, 52, 49, 'VALID', 'Very Expensive !', 1),
(80, 52, 50, 'VALID', 'Modern, Chic, Versatile', 3),
(81, 53, 48, 'VALID', 'Overpriced Maintenance Nightmare.', 1),
(82, 53, 49, 'VALID', 'Dated Design, Lackluster Features.', 2),
(83, 53, 50, 'VALID', 'Compact, Fun, Iconic', 5),
(84, 54, 48, 'VALID', 'Value, Modern, Reliable.', 5),
(85, 54, 49, 'VALID', 'Luxury, Innovation, Prestige.', 4),
(86, 54, 50, 'VALID', 'Uninspiring Design, High Price.', 1),
(87, 54, 51, 'VALID', 'Lack of Innovation, Boring', 2),
(88, 55, 51, 'VALID', 'Electric Future, Innovation.', 4),
(89, 55, 52, 'VALID', 'Zoom-Zoom, Stylish, Fun', 5),
(90, 55, 53, 'VALID', 'Italia Icon, Dependable ', 3),
(91, 56, 51, 'VALID', 'Exorbitant Maintenance Costs, Overrated.', 1),
(92, 56, 52, 'VALID', 'Poor Fuel Efficiency, Dull Interior', 2),
(93, 56, 53, 'VALID', 'Noisy Cabin, Uncomfortable Ride', 1),
(94, 56, 54, 'VALID', 'Tough, Professional Grade.', 4),
(95, 56, 55, 'VALID', 'I love it very much !', 4),
(96, 57, 55, 'VALID', 'Precision Crafted Performance', 4),
(97, 57, 56, 'VALID', 'Safety, Luxury, Scandinavian!', 5);

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
  `brandPicture` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `originCountry`, `headquarter`, `year`, `brandPicture`, `description`) VALUES
(45, 'BMW', 'Germany', 'Munich', 1916, 'bmw.svg', 'Bayerische Motoren Werke AG, commonly referred to as BMW, is a German multinational company that produces luxury vehicles and motorcycles. BMW is known for its high-performance and innovative vehicles, as well as its strong presence in the luxury automobile market.'),
(46, 'Audi', 'Germany', 'Ingolstadt', 1909, 'audi.svg', 'Audi AG is a German automobile manufacturer that designs, engineers, produces, markets, and distributes luxury vehicles. Audi is known for its sophisticated design, cutting-edge technology, and a strong emphasis on performance and innovation.'),
(47, 'Honda', 'Japan', 'Tokyo', 1948, 'honda.svg', 'Honda Motor Co., Ltd. is a Japanese multinational conglomerate known for manufacturing automobiles, motorcycles, and power equipment. Honda is recognized for its reliable and fuel-efficient vehicles, as well as its commitment to environmental sustainability.'),
(48, 'Ford', 'United States', 'Dearborn', 1903, 'ford.svg', 'Ford Motor Company is an American multinational automaker founded by Henry Ford. Ford is one of the largest and oldest car manufacturers globally, known for its wide range of vehicles, including trucks, SUVs, and iconic models like the Ford Mustang.'),
(49, 'Jeep', 'United States', 'Toledo', 1941, 'jeep.svg', 'Jeep is an American brand of off-road and sport utility vehicles, known for its rugged and iconic design. Originally produced for military use during World War II, Jeep has since become synonymous with off-road capability and adventure.'),
(50, 'Toyota', 'Japan', 'Toyota City', 1937, 'toyota.svg', 'Toyota Motor Corporation is a Japanese multinational automotive manufacturer known for its extensive range of vehicles, including hybrids and electric cars. Toyota is renowned for its quality, durability, and fuel efficiency.'),
(51, 'SEAT', 'Spain', 'Martorell', 1950, 'seat.svg', 'SEAT, S.A. is a Spanish automobile manufacturer and a subsidiary of the Volkswagen Group. SEAT produces a variety of cars known for their sporty design and performance, catering to a wide range of consumers.'),
(52, 'Renault', 'France', 'Boulogne-Billancourt', 1899, 'renault.svg', 'Renault S.A. is a French multinational automotive manufacturer with a rich history. Renault produces a diverse range of vehicles and is known for its involvement in motorsports, innovative designs, and commitment to sustainable mobility.'),
(53, 'Fiat', 'Italy', 'Turin', 1899, 'fiat.svg', 'Fiat Automobiles S.p.A. is an Italian automobile manufacturer and a subsidiary of Stellantis. Fiat is known for producing a wide range of vehicles, from compact cars to commercial vehicles, with a focus on practicality and style.'),
(54, 'Mercedes-Benz', 'Germany', 'Stuttgart', 1926, 'mercedes-benz.svg', 'Mercedes-Benz is a global automobile marque and a division of Daimler AG. Known for its luxury vehicles, buses, coaches, and trucks, Mercedes-Benz emphasizes innovation, safety, and a premium driving experience.'),
(55, 'Volkswagen', 'Germany', 'Wolfsburg', 1937, 'volkswagen.svg', 'Volkswagen AG is a German multinational automotive company and the flagship brand within the Volkswagen Group. Volkswagen is one of the worlds largest car manufacturers, producing a wide range of vehicles from compact cars to luxury models.'),
(56, 'Hyundai', 'South Korea', 'Seoul', 1967, 'hyundai.svg', 'Hyundai Motor Company is a South Korean multinational automotive manufacturer. Hyundai is one of the largest automobile manufacturers in the world, producing a wide range of vehicles known for their reliability, innovation, and value for money.');

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
(44, 1, 34, 39, 44, 47),
(45, 1, 52, 55, 61, 64),
(46, 1, 66, 67, 73, 79),
(47, NULL, NULL, NULL, 40, 48),
(48, 50, 45, 52, 62, 64),
(49, 1, 37, 52, 64, 67);

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
(1, 'The Ultimate Car Buyer Guide: A Comprehensive Overview for Smart Choices', 'Buying a new car is an exciting venture, but it can also be a daunting task. With a myriad of options, features, and financing choices, navigating the car-buying process requires careful consideration and research. In this comprehensive guide, we\'ll walk you through the essential steps to help you make an informed decision and drive off with the perfect vehicle.\r\n\r\n<b>1. Define Your Needs and Budget</b>\r\nBefore diving into the world of shiny cars, take a moment to evaluate your needs and set a realistic budget. Consider the size of your family, your daily commute, and any specific features you require. Assessing your budget early on will help you narrow down your choices and prevent financial surprises later.\r\n\r\n<b>2. Research, Research, Research</b>\r\nThe internet is your best friend when it comes to researching potential vehicles. Explore different makes and models, read reviews from reputable sources, and compare specifications. Look into safety features, fuel efficiency, and reliability ratings. Understanding the market will empower you to make choices aligned with your preferences.\r\n\r\n<b>3. New vs. Used: Weighing the Options</b>\r\nDecide whether a new or used vehicle suits your needs. While a new car offers the latest features and warranties, a used car might provide better value for your money. Certified pre-owned vehicles often come with extended warranties, giving you peace of mind without the hefty price tag.\r\n\r\n<b>4. Test Drives Matter</b>\r\nNever underestimate the importance of a test drive. Schedule appointments to test drive your top choices. Pay attention to the driving experience, comfort, visibility, and overall handling. Testing the car in different road conditions can give you a better sense of its performance.\r\n\r\n<b>5. Evaluate Ownership Costs</b>\r\nBeyond the sticker price, consider the long-term costs of owning a particular vehicle. Research insurance rates, maintenance costs, and fuel efficiency. Some cars may have a lower upfront cost but higher ongoing expenses, making them less economical in the long run.\r\n\r\n<b>6. Financing Options</b>\r\nExplore financing options before heading to the dealership. Get pre-approved for a loan from your bank or credit union. This gives you a clear understanding of your budget and allows you to negotiate more effectively with the dealership\'s financing department. Be aware of interest rates, loan terms, and any additional fees.\r\n\r\n<b>7. Negotiate Smartly</b>\r\nDon\'t be afraid to negotiate the price. Dealerships expect it, and it\'s a standard part of the car-buying process. Research the fair market value of the vehicle, be firm in your budget, and be prepared to walk away if the deal doesn\'t meet your expectations.\r\n\r\n<b>8. Understand the Terms</b>\r\nRead and understand the terms of the sale before signing any documents. Be aware of warranty details, return policies, and any additional fees. If something is unclear, don\'t hesitate to ask for clarification. It\'s crucial to know exactly what you\'re committing to.\r\n\r\n<b>9. Finalize the Paperwork</b>\r\n\r\nOnce you\'ve agreed on the terms, review all the paperwork carefully. Ensure that all the details, including the final price, financing terms, and any additional warranties or add-ons, are accurately reflected. Don\'t rush through this step; take the time to understand every document you\'re signing.\r\n\r\n<b>10. Take Delivery of Your New Car</b>\r\nCongratulations! You\'ve done the research, negotiated a fair deal, and completed the paperwork. Before driving off the lot, inspect the car thoroughly. Check for any damages or issues that may have occurred during the transport and delivery process. Familiarize yourself with the owner\'s manual and any special features your new car offers.\r\n\r\n<b>Conclusion</b>\r\nBuying a car is a significant investment, and being well-prepared is the key to a successful purchase. By defining your needs, conducting thorough research, and understanding the entire process, you\'ll be equipped to make informed decisions. Follow this guide, stay patient, and enjoy the excitement of bringing home the perfect car for your needs. Happy driving!\r\n-----------------------------------------------------------------------------------------------------------', '2024-01-16 10:58:51');

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
  `likes_count` int(11) DEFAULT 0,
  `newsImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `link`, `created_at`, `updated_at`, `tags`, `views_count`, `likes_count`, `newsImage`) VALUES
(34, 'Automotive Industry\'s Shift Towards Electric Vehicles', 'In recent years, the automotive industry has undergone a transformative shift towards sustainability, primarily driven by the surge in electric vehicles (EVs). This seismic change marks a departure from traditional internal combustion engines to a future dominated by electric power.\r\n\r\nManufacturers, both traditional and newcomers, prioritize electric vehicle technology, recognizing its potential to reduce environmental impact. The advancement in battery technology, especially Lithium-ion batteries, has significantly improved energy density and charging times, resulting in electric cars with longer ranges.\r\nMajor automotive players invest heavily in research and development, resulting in high-performance electric vehicles challenging preconceived notions about electric power limitations. \r\n\r\nThe proliferation of fast-charging stations addresses concerns about range and charging accessibility, making electric vehicles more convenient.\r\nConsumers, motivated by environmental consciousness, are contributing to increased demand for electric vehicles. Government incentives and rebates further sweeten the deal, making electric cars financially appealing. The electric vehicle market is expanding beyond passenger cars, with trucks, vans, and buses gaining traction.\r\n\r\nIn conclusion, the automotive industry\'s pivot towards electric vehicles is a monumental development driven by advancements in battery technology, a growing charging infrastructure, increased consumer demand, and a commitment to environmental responsibility. As electric vehicles continue to evolve and become more accessible, they are poised to redefine the automotive landscape, contributing to a sustainable and electrified future.', 'google.com', '2024-01-15 22:21:08', '2024-01-16 11:03:24', 'Sustainability, Electric Vehicles, EV Revolution', 0, 0, 'news1.jpg'),
(35, 'Autonomous Driving: The Future of Mobility', 'In the ever-evolving landscape of the automotive industry, the pursuit of autonomous driving technology has become a focal point for innovation. Recent advancements in this field are not only reshaping the driving experience but also laying the foundation for the future of mobility.\r\n\r\n Autonomous vehicles, commonly referred to as self-driving cars, rely on a sophisticated network of sensors, cameras, radar, and artificial intelligence to navigate and make real-time decisions on the road. The rapid development of these technologies has led to significant progress in the capabilities of autonomous vehicles.\r\n One of the key drivers of progress is the enhancement of AI algorithms. Machine learning algorithms are continually evolving, enabling autonomous vehicles to interpret and respond to complex scenarios with a level of sophistication that was once thought impossible. These advancements bring us closer to a reality where vehicles can understand and adapt to unpredictable situations on the road.\r\n\r\n The deployment of autonomous vehicles goes beyond personal transportation. Companies are exploring autonomous solutions for various industries, including delivery services, ride-sharing, and even public transportation. This expansion has the potential to revolutionize how goods are delivered and how people commute, offering efficiency, safety, and convenience.\r\n\r\n Safety remains a paramount concern in the development of autonomous driving technology. Rigorous testing, both in simulated environments and on real roads, is a crucial aspect of ensuring the reliability and safety of autonomous vehicles. The goal is to create a driving environment where accidents are minimized, and road safety is significantly improved.\r\n\r\n The regulatory landscape is also evolving to accommodate autonomous vehicles. Governments and transportation authorities are working to establish guidelines and regulations that address the unique challenges posed by self-driving cars. Striking the right balance between fostering innovation and ensuring public safety is a delicate yet crucial task.\r\n\r\n The integration of autonomous features in modern vehicles is already evident. Many new cars come equipped with advanced driver-assistance systems, such as lane-keeping assistance, adaptive cruise control, and automatic emergency braking. These features provide a glimpse into the capabilities of fully autonomous vehicles and contribute to increased road safety.\r\n\r\n Despite the progress, challenges remain on the path to full autonomy. Technical challenges, ethical considerations, and public perception are all factors that require careful consideration. Building public trust in autonomous technology is essential for its widespread acceptance.\r\n\r\n In conclusion, advancements in autonomous driving are transforming the automotive industry and shaping the future of mobility. The ongoing progress in AI, safety protocols, and regulatory frameworks are paving the way for a new era of transportation. As autonomous vehicles become an integral part of our daily lives, the way we think about and interact with transportation is poised for a revolutionary change.', 'https://example.com/autonomous-driving-advancements', '2024-01-15 22:40:51', '2024-01-16 11:03:54', 'driving, future, AI advancements', 0, 0, 'images.jpg'),
(36, 'Cutting-Edge Innovations in Electric Vehicle Technology', 'As the automotive industry continues its commitment to sustainability, cutting-edge innovations in electric vehicle (EV) technology are taking center stage. These advancements aim to redefine the electric driving experience and contribute to a greener future.\r\n\r\nElectric vehicles have come a long way, and ongoing research and development are pushing the boundaries of what is possible. Advances in battery technology are at the forefront, with breakthroughs in energy density, charging speed, and overall efficiency. These improvements translate to extended ranges, shorter charging times, and enhanced performance for EVs.\r\n\r\n One notable development is the rise of solid-state batteries, promising even higher energy density and improved safety compared to traditional lithium-ion batteries. The transition to solid-state technology could address some of the current limitations of EVs, such as range anxiety, and accelerate the widespread adoption of electric vehicles.\r\n\r\n Beyond batteries, electric vehicles are witnessing enhancements in electric motor technology, leading to increased efficiency and power output. The integration of smart features and artificial intelligence in electric cars further refines the driving experience, offering advanced safety features, intuitive interfaces, and autonomous capabilities.\r\n\r\n The charging infrastructure is also evolving rapidly, addressing one of the key concerns for potential electric vehicle adopters. Fast-charging stations, equipped with state-of-the-art technology, are becoming more widespread, making long-distance travel in electric vehicles more convenient and accessible.\r\n\r\n Major automakers are actively participating in these innovations, unveiling electric models with unprecedented capabilities. From high-performance electric sports cars to electric SUVs with spacious interiors, the diversity of electric vehicle offerings continues to expand, catering to various consumer preferences and needs.\r\n\r\n Government initiatives worldwide are supporting the shift towards electric mobility, with incentives, subsidies, and the development of charging infrastructure. The commitment to reducing carbon emissions and combating climate change is a driving force behind these supportive policies.\r\n\r\n In conclusion, the automotive industrys focus on electric vehicle technology is resulting in cutting-edge innovations that promise to revolutionize the way we drive. From advancements in batteries to smart features and an expanding charging infrastructure, the future of electric mobility looks promising. As these innovations continue to shape the landscape, electric vehicles are set to become more accessible, efficient, and integral to a sustainable transportation future.', 'https://example.com/ev-innovations', '2024-01-15 22:45:38', '2024-01-16 11:04:19', 'electric vehicles, EV technology, sustainability, innovation', 0, 0, 'dims.jpg'),
(37, 'Hydrogen-Powered Vehicles: A Paradigm Shift in Transportation', 'In a bid to diversify sustainable transportation options, hydrogen-powered vehicles are emerging as a viable and promising alternative. This paradigm shift holds the potential to reshape the automotive industry and contribute to a greener and more diversified future.\r\n\r\n Hydrogen fuel cell technology, powering these vehicles, is gaining traction due to its clean energy profile. Unlike traditional combustion engines, hydrogen fuel cells emit only water vapor and heat as byproducts, making them a zero-emission solution. This characteristic positions hydrogen-powered vehicles as a compelling option in the pursuit of reducing carbon footprints.\r\n\r\n The process involves converting hydrogen gas stored in a fuel cell into electricity, which then powers an electric motor. This electricity generation is efficient and produces no harmful emissions during the vehicles operation. The ability to generate electricity on-demand provides an advantage over batteries, addressing some of the challenges associated with electric vehicles.\r\n\r\n Automakers are actively investing in the development of hydrogen-powered vehicles, with prototypes and commercial models hitting the market. These vehicles range from passenger cars to heavy-duty trucks and buses, showcasing the versatility of hydrogen fuel cell technology across various transportation sectors.\r\n\r\n Infrastructure development is crucial for the widespread adoption of hydrogen-powered vehicles. Efforts are underway to establish hydrogen refueling stations, creating a network that supports long-distance travel and addresses concerns related to vehicle range. As the infrastructure grows, the appeal of hydrogen-powered vehicles is expected to increase.\r\n\r\n Government support plays a pivotal role in fostering the growth of this emerging technology. Incentives, subsidies, and collaborative initiatives are encouraging both manufacturers and consumers to embrace hydrogen-powered transportation. The commitment to a hydrogen-based future is aligned with global efforts to reduce reliance on fossil fuels.\r\n\r\n In conclusion, the rise of hydrogen-powered vehicles represents a significant paradigm shift in transportation. With their clean energy credentials and potential for wide-ranging applications, these vehicles are poised to contribute to a more sustainable and diversified mobility landscape. As technological advancements and infrastructure continue to evolve, hydrogen-powered vehicles are set to play a key role in shaping the future of transportation.', 'https://example.com/hydrogen-vehicles-rise', '2024-01-15 22:52:03', '2024-01-15 22:52:43', 'hydrogen-powered, sustainable, clean energy, fuel cell technology', 0, 0, 'news4.jpeg');

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
  `image_url` varchar(255) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliderimages`
--

INSERT INTO `sliderimages` (`id`, `image_url`, `news_id`) VALUES
(17, 'dims.jpg', 34),
(18, 'images.jpg', 35),
(19, 'news1.jpg', 36),
(20, 'news4.jpeg', 37);

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
(1, 35),
(1, 38),
(1, 45),
(1, 54),
(50, 34),
(50, 39),
(50, 43),
(50, 44),
(50, 47),
(50, 52),
(50, 54),
(51, 35),
(51, 40),
(51, 45),
(52, 36),
(52, 41),
(52, 49),
(53, 37),
(53, 42),
(53, 50),
(53, 53),
(54, 58),
(54, 62),
(54, 67),
(55, 78),
(55, 79),
(55, 82),
(56, 35),
(56, 71),
(56, 72),
(56, 73);

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
(50, '$2y$10$w6xo024tMd/RMRhmA/def.VfHEqJH5aYY4rSiIB.ubo75.yBxvqkS', 'moncef1', 'moncef1', 'moussaoui1', 'USER', '2024-01-01', 'MALE', 'VALID', 'user1.png'),
(51, '$2y$10$VvztZ/Wa5.3qEn4gUwyWeuCb6c.6iupeTUuNiBPEVQsxogymEFrMC', 'moncef2', 'moncef2', 'moussaoui2', 'USER', '2024-01-02', 'MALE', 'VALID', 'user2.png'),
(52, '$2y$10$Acvn.RPruxhyexJm0Farg.a6C9FR7oLavlaSWS3WOOX.7H1XnAlEa', 'moncef3', 'moncef3', 'moussaoui3', 'USER', '2024-01-03', 'MALE', 'VALID', 'user3.png'),
(53, '$2y$10$3tYsyKgXPLnQR1dvaZa2I.2y2mtvAY.nf9uswpT6Ev5SkRCEUTjCq', 'moncef4', 'moncef4', 'moussaoui4', 'USER', '2024-01-04', 'MALE', 'VALID', 'user4.png'),
(54, '$2y$10$z.z3CIbgYjK02rPX6xT1.OjLzN6.sHM5F2YN/IozB2Rh/0kcbDlbi', 'moncef5', 'moncef5', 'moussaoui5', 'USER', '2024-01-05', 'MALE', 'VALID', 'user6.png'),
(55, '$2y$10$GilqkUX3u/jkJBaatVcBbeqg0WcKaTmGLllJJM8dzetXwYxlsigMS', 'moncef6', 'moncef6', 'moussaoui6', 'USER', '2024-01-06', 'MALE', 'VALID', 'user5.png'),
(56, '$2y$10$8GdVRe8UYdnuNeASrA1zmeFxmEbz6bfYtao74OEqmR5yiBy0vYZLa', 'moncef7', 'moncef7', 'moussaoui7', 'USER', '2024-01-07', 'MALE', 'VALID', 'user7.png'),
(57, '$2y$10$DP5BZj0h1wwBHDzIuv/RsOmmiHw6J45XOOaDEUP5NwtUQdMYQTlfq', 'moncef8', 'moncef8', 'moussaoui8', 'USER', '2024-01-08', 'MALE', 'VALID', 'user8.png');

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
(75, 50, 34, 'VALID', 'Great handling and performance.', 5),
(76, 51, 34, 'VALID', 'Fuel efficiency needs improvement.', 3),
(77, 52, 34, 'VALID', 'Luxurious interior, smooth ride.', 4),
(78, 53, 34, 'VALID', 'Stylish design, powerful engine.', 5),
(79, 54, 34, 'VALID', 'Comfortable seats, reliable.', 4),
(80, 50, 35, 'VALID', 'Excellent safety features.', 5),
(81, 51, 35, 'VALID', 'Tech features are a bit complicated.', 3),
(82, 52, 35, 'VALID', 'Smooth acceleration, great handling.', 4),
(83, 53, 35, 'VALID', 'Spacious interior, good for families.', 4),
(84, 54, 35, 'VALID', 'High maintenance costs.', 2),
(85, 50, 36, 'VALID', 'Reliable and fuel-efficient.', 5),
(86, 51, 36, 'VALID', 'Simple and user-friendly controls.', 4),
(87, 52, 36, 'VALID', 'Affordable maintenance costs.', 4),
(88, 53, 36, 'VALID', 'Lacks advanced safety features.', 3),
(89, 54, 36, 'VALID', 'Great value for the price.', 5),
(90, 50, 37, 'VALID', 'Off-road capabilities are impressive.', 5),
(91, 51, 37, 'VALID', 'Fuel consumption is a bit high.', 3),
(92, 52, 37, 'VALID', 'Comfortable ride, rugged design.', 4),
(93, 53, 37, 'VALID', 'Interior lacks modern features.', 3),
(94, 54, 37, 'VALID', 'Great for outdoor adventures.', 4),
(95, 50, 38, 'VALID', 'Reliable and low maintenance.', 5),
(96, 51, 38, 'VALID', 'Sleek design, good fuel efficiency.', 4),
(97, 52, 38, 'VALID', 'Responsive handling on the road.', 4),
(98, 53, 38, 'VALID', 'Spacious interior, great for families.', 5),
(99, 54, 38, 'VALID', 'Could use more advanced tech features.', 3),
(100, 50, 39, 'VALID', 'Compact size, easy to maneuver.', 4),
(101, 51, 39, 'VALID', 'Interior materials could be better.', 3),
(102, 52, 39, 'VALID', 'Fuel efficiency is a strong point.', 5),
(103, 53, 39, 'VALID', 'Affordable and economical.', 4),
(104, 54, 39, 'VALID', 'Limited cargo space.', 3),
(105, 50, 40, 'VALID', 'Modern and stylish design.', 4),
(106, 51, 40, 'VALID', 'Comfortable ride, good handling.', 5),
(107, 52, 40, 'VALID', 'Lack of advanced safety features.', 3),
(108, 53, 40, 'VALID', 'Fuel efficiency is satisfactory.', 4),
(109, 54, 40, 'VALID', 'Affordable price for the features.', 4),
(110, 50, 41, 'VALID', 'Compact and easy to park.', 4),
(111, 51, 41, 'VALID', 'Fuel economy is impressive.', 5),
(112, 52, 41, 'VALID', 'Interior lacks premium materials.', 3),
(113, 53, 41, 'VALID', 'Affordable pricing for the features.', 4),
(114, 54, 41, 'VALID', 'Could use more advanced tech.', 3),
(115, 50, 42, 'VALID', 'Luxurious interior and smooth ride.', 5),
(116, 51, 42, 'VALID', 'High maintenance costs.', 2),
(117, 52, 42, 'VALID', 'Cutting-edge tech features.', 4),
(118, 53, 42, 'VALID', 'Performance meets expectations.', 4),
(119, 54, 42, 'VALID', 'Stylish design and attention to detail.', 5),
(120, 50, 43, 'VALID', 'Reliable and practical for daily use.', 4),
(121, 51, 43, 'VALID', 'Interior lacks some modern features.', 3),
(122, 52, 43, 'VALID', 'Fuel efficiency could be improved.', 3),
(123, 53, 43, 'VALID', 'Smooth handling and comfortable.', 4),
(124, 54, 43, 'VALID', 'Affordable pricing for the brand.', 4),
(125, 50, 44, 'VALID', 'Great value for the price.', 5),
(126, 51, 44, 'VALID', 'Fuel efficiency is a standout feature.', 5),
(127, 52, 44, 'VALID', 'Tech features are user-friendly.', 4),
(128, 53, 44, 'VALID', 'Stylish design and comfortable ride.', 5),
(129, 54, 44, 'VALID', 'Could use more advanced safety tech.', 3),
(130, 50, 45, 'VALID', 'Luxurious interior and powerful engine.', 5),
(131, 51, 45, 'VALID', 'Smooth handling on the road.', 4),
(132, 52, 45, 'VALID', 'Advanced tech features stand out.', 5),
(133, 53, 45, 'VALID', 'Fuel efficiency could be improved.', 3),
(134, 54, 45, 'VALID', 'Great overall driving experience.', 5),
(135, 50, 46, 'VALID', 'Reliable and fuel-efficient.', 5),
(136, 51, 46, 'VALID', 'Interior design is a bit outdated.', 3),
(137, 52, 46, 'VALID', 'Smooth acceleration and handling.', 4),
(138, 53, 46, 'VALID', 'Spacious interior for a compact car.', 4),
(139, 54, 46, 'VALID', 'Affordable price and good value.', 4),
(140, 50, 47, 'VALID', 'Powerful performance and towing capacity.', 5),
(141, 51, 47, 'VALID', 'Fuel efficiency is a bit lacking.', 3),
(142, 52, 47, 'VALID', 'Comfortable interior with modern features.', 4),
(143, 53, 47, 'VALID', 'Reliable for daily commuting.', 4),
(144, 54, 47, 'VALID', 'Affordable pricing for the brand.', 4),
(145, 50, 48, 'VALID', 'Off-road capabilities are exceptional.', 5),
(146, 51, 48, 'VALID', 'Fuel consumption is higher than expected.', 2),
(147, 52, 48, 'VALID', 'Rugged design and durable build.', 4),
(148, 53, 48, 'VALID', 'Interior lacks some modern features.', 3),
(149, 54, 48, 'VALID', 'Great for outdoor adventures.', 4),
(150, 50, 49, 'VALID', 'Reliable and fuel-efficient.', 5),
(151, 51, 49, 'VALID', 'Spacious interior for a compact car.', 4),
(152, 52, 49, 'VALID', 'Smooth acceleration and handling.', 4),
(153, 53, 49, 'VALID', 'Great value for the price.', 5),
(154, 54, 49, 'VALID', 'Advanced safety features stand out.', 5),
(155, 50, 50, 'VALID', 'Compact size and easy to park.', 4),
(156, 51, 50, 'VALID', 'Interior design could be more modern.', 3),
(157, 52, 50, 'VALID', 'Fuel efficiency is a strong point.', 5),
(158, 53, 50, 'VALID', 'Affordable and economical.', 4),
(159, 54, 50, 'VALID', 'Limited cargo space.', 3),
(170, 50, 52, 'VALID', 'Compact and easy to maneuver.', 4),
(171, 51, 52, 'VALID', 'Good fuel economy.', 5),
(172, 52, 52, 'VALID', 'Interior could be more premium.', 3),
(173, 53, 52, 'VALID', 'Affordable pricing for the brand.', 4),
(174, 54, 52, 'VALID', 'Tech features could be more advanced.', 3),
(175, 56, 54, 'VALID', 'amazing Car!', 1),
(176, 50, 43, 'VALID', 'I love this car very much !', 5),
(177, 1, 54, 'VALID', 'amazing Car !', 3);

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
(34, 'Audi Q5 Sportback', 'Base', 2022, 'audi-q5-sportback-2020-front-side-1.jpg', 4680.00, 1893.00, 1616.00, 2819.00, '2.0L Turbocharged Inline-4', '248 hp', 50000.00, 25.00, 46, 'Audi Q5 Sportback is a stylish and versatile SUV with a coupe-like design, offering a perfect blend of performance and luxury.'),
(35, 'Audi Q3', 'Premium', 2022, 'audi-q3-front-side-view.jpg', 4484.00, 1856.00, 1611.00, 2670.00, '2.0L Turbocharged Inline-4', '184 hp', 38000.00, 27.00, 46, 'The Audi Q3 is a compact luxury SUV known for its agile handling, premium interior, and advanced technology features.'),
(36, 'Audi Q3 Sportback', 'S Line', 2022, 'q3-sportback-2019.jpg', 4484.00, 1856.00, 1615.00, 2670.00, '2.0L Turbocharged Inline-4', '228 hp', 42000.00, 26.00, 46, 'The Audi Q3 Sportback combines the practicality of an SUV with the sporty design of a coupe, delivering a dynamic driving experience.'),
(37, 'Audi S8', 'Standard', 2022, 'audi-s8-2021-front-side-1.jpg', 209.00, 83.90, 58.60, 123.20, '4.0L Twin-Turbocharged V8', '563 hp', 130000.00, 21.00, 46, 'The Audi S8 is a luxurious and powerful full-size sedan, featuring a high-performance V8 engine and advanced technology for a refined driving experience.'),
(38, 'Audi Q4 e-tron', 'Premium', 2022, 'audi-q4-e-tron-2021-front-side-1.jpg', 180.70, 73.70, 64.30, 109.10, 'Electric Motor', '201 hp', 45000.00, 0.00, 46, 'The Audi Q4 e-tron is an all-electric compact SUV, offering a blend of electric performance, advanced technology, and Audis signature design and craftsmanship.'),
(39, 'BMW i4', 'Base', 2022, 'bmw-i4-2021-front-side-1.jpg', 4766.00, 1852.00, 1448.00, 2856.00, 'Electric Motor', '335 hp', 55000.00, 0.00, 45, 'The BMW i4 is an all-electric sedan, offering a perfect balance of luxury, performance, and sustainable mobility.'),
(40, 'BMW iX', 'xDrive50', 2022, 'bmw-ix-2021-side-front.jpg', 195.80, 78.70, 66.70, 117.50, 'Electric Motor', '516 hp', 80000.00, 0.00, 45, 'The BMW iX is an all-electric luxury SUV, featuring advanced technology, a spacious interior, and a powerful electric drivetrain.'),
(41, 'BMW iX3', 'xDrive30e', 2022, 'bmw-ix3-2020-side-front.jpg', 185.50, 74.10, 66.00, 112.70, 'Electric Motor', '286 hp', 60000.00, 0.00, 45, 'The BMW iX3 is an all-electric compact SUV, combining BMWs driving dynamics with efficient electric performance.'),
(42, 'BMW X3', 'xDrive30i', 2022, 'bmw-x3-2021-side-front.jpg', 185.90, 74.40, 66.00, 112.80, '2.0L Turbocharged Inline-4', '248 hp', 43000.00, 27.00, 45, 'The BMW X3 is a compact luxury SUV, known for its sporty performance, versatile interior, and advanced technology features.'),
(43, 'BMW Série 1', '118i', 2022, 'bmw-serie1-2019-side2.jpg', 170.90, 70.90, 56.80, 105.10, '1.5L Turbocharged Inline-3', '138 hp', 36000.00, 35.00, 45, 'The BMW Série 1 is a premium compact car, combining BMWs signature design and driving dynamics with a practical and stylish package.'),
(44, 'Civic e:HEV', 'Base', 2022, 'honda-civic-hev-front-view.jpg', 182.70, 70.90, 55.70, 106.30, 'Electric Motor with Hybrid', 'N/A', 25000.00, 0.00, 47, 'The Honda Civic e:HEV is a hybrid version of the popular Civic, offering fuel efficiency and a smooth electric driving experience.'),
(45, 'Nouvelle Jazz e:HEV', 'Base', 2022, 'honda-jazz-front-view.jpg', 161.40, 66.70, 60.70, 101.60, 'Electric Motor with Hybrid', 'N/A', 22000.00, 0.00, 47, 'The Nouvelle Jazz e:HEV is a hybrid version of the Jazz, featuring a compact design, versatile interior, and fuel-efficient hybrid technology.'),
(46, 'HR-V e:HEV', 'Base', 2022, 'honda-hr-v-ehev-2021-front-side-1.jpg', 170.40, 69.80, 63.20, 105.10, 'Electric Motor with Hybrid', 'N/A', 28000.00, 0.00, 47, 'The Honda HR-V e:HEV is a hybrid version of the HR-V, combining the versatility of an SUV with efficient hybrid performance.'),
(47, 'Puma', 'Base', 2022, 'puma.jpg', 153.10, 68.90, 63.80, 98.80, '1.0L Turbocharged Inline-3', '123 hp', 25000.00, 30.00, 48, 'The Ford Puma is a compact crossover, known for its stylish design, practicality, and efficient EcoBoost engine.'),
(48, 'Kuga', 'Base', 2022, 'ford-kuga.jpg', 185.20, 73.40, 66.30, 106.70, '2.0L Turbocharged Inline-4', '250 hp', 32000.00, 26.00, 48, 'The Ford Kuga is a midsize SUV with a spacious interior, advanced safety features, and a range of powerful and efficient engines.'),
(49, 'Mustang', 'EcoBoost', 2022, 'ford-mustang-coupe.jpg', 188.50, 75.40, 54.30, 107.10, '2.3L Turbocharged Inline-4', '310 hp', 40000.00, 24.00, 48, 'The Ford Mustang is an iconic sports car, known for its powerful performance, classic design, and exhilarating driving experience.'),
(50, 'Focus', 'SE', 2022, 'ford-focus-2021-side-front.jpg', 171.70, 71.80, 57.20, 104.30, '2.0L Inline-4', '160 hp', 20000.00, 29.00, 48, 'The Ford Focus is a compact car offering a balance of performance, comfort, and technology, making it a popular choice among drivers.'),
(52, 'Nouvelle Avenger', 'Base', 2022, 'jeep-avenger-front-view.jpg', 192.60, 73.20, 58.70, 114.80, '2.4L Inline-4', 'N/A', 35000.00, 0.00, 49, 'The Nouvelle Avenger is a midsize SUV with Jeeps signature rugged design, advanced safety features, and a comfortable interior.'),
(53, 'Avenger e-Hybrid', 'Base', 2022, 'jeep-avenger-hybrid-front-view.jpg', 192.60, 73.20, 58.70, 114.80, 'Electric Motor with Hybrid', 'N/A', 38000.00, 0.00, 49, 'The Nouvelle Avenger e-Hybrid is a hybrid version of the Avenger, combining the ruggedness of Jeep with efficient hybrid performance.'),
(54, 'Yaris Cross Hybride', 'Base', 2022, 'new-toyota-yaris-cross-2021.jpg', 164.50, 69.90, 61.00, 100.80, 'Hybrid', 'N/A', 28000.00, 0.00, 50, 'The Toyota Yaris Cross Hybride is a hybrid compact crossover, offering fuel efficiency, practicality, and Toyotas renowned reliability.'),
(55, 'Camry Hybride', 'LE', 2022, 'toyota-camry-2019-front-side-2.jpg', 192.10, 72.40, 56.90, 111.20, 'Hybrid', 'N/A', 32000.00, 0.00, 50, 'The Toyota Camry Hybride is a hybrid midsize sedan, known for its comfortable ride, spacious interior, and fuel-efficient hybrid technology.'),
(56, 'GR Yaris', 'Base', 2022, 'toyota-gr-yaris-2020-side-front.jpg', 157.50, 66.70, 57.30, 97.60, '1.6L Turbocharged Inline-3', '268 hp', 35000.00, 0.00, 50, 'The Toyota GR Yaris is a high-performance compact sports car, designed for rally racing with a powerful turbocharged engine.'),
(57, 'Nouvelle GR86', 'Base', 2022, 'toyota-gr86-2022-front-side-1.jpg', 167.90, 69.90, 51.20, 101.40, '2.4L Flat-4', '228 hp', 32000.00, 0.00, 50, 'The Nouvelle GR86 is a sports coupe, offering a thrilling driving experience with a focus on agility, balance, and performance.'),
(58, 'Nouvelle Aygo X', 'Base', 2022, 'toyota-aygox-front-view.jpg', 136.60, 65.30, 56.30, 96.90, '1.0L Inline-3', 'N/A', 18000.00, 0.00, 50, 'The Nouvelle Aygo X is a compact city car, known for its compact size, efficiency, and stylish design, perfect for urban commuting.'),
(59, 'Mirai', 'Base', 2022, 'toyota-mirai-2021.jpg', 196.70, 74.80, 57.10, 114.90, 'Fuel Cell Electric', 'N/A', 60000.00, 0.00, 50, 'The Toyota Mirai is a hydrogen fuel cell electric vehicle (FCEV), offering zero-emission driving with the convenience of hydrogen fuel technology.'),
(60, 'Arona', 'Base', 2022, 'seat-arona-2021-side-front.jpg', 164.30, 70.80, 61.10, 99.10, '1.0L Turbocharged Inline-3', 'N/A', 23000.00, 0.00, 51, 'The Nouvelle Arona is a compact SUV, offering a blend of practicality, style, and modern technology for urban and suburban driving.'),
(61, 'Leon', 'Base', 2022, 'seat-leon-hatchback-2020-front-angle-1.jpg', 173.20, 70.90, 56.90, 106.30, '1.5L Turbocharged Inline-4', 'N/A', 27000.00, 0.00, 51, 'The Seat Leon is a versatile and stylish compact car, known for its dynamic design, advanced features, and efficient engine options.'),
(62, 'Tarraco', 'Base', 2022, 'seat-terraco-2018-front-side-view.jpg', 183.90, 74.80, 66.90, 109.90, '2.0L Turbocharged Inline-4', 'N/A', 33000.00, 0.00, 51, 'The Seat Tarraco is a midsize SUV, providing a spacious and comfortable interior, advanced safety features, and a powerful yet efficient engine.'),
(63, 'Clio', 'Base', 2022, 'renault-clio-front-view.jpg', 161.30, 68.80, 56.10, 101.20, '1.0L Turbocharged Inline-3', 'N/A', 20000.00, 0.00, 52, 'The Nouvelle Clio is a popular subcompact car, known for its stylish design, fuel efficiency, and innovative features.'),
(64, 'Captur', 'Base', 2022, 'renault-captur-2019.jpg', 166.10, 70.40, 62.20, 102.80, '1.3L Turbocharged Inline-4', 'N/A', 25000.00, 0.00, 52, 'The Renault Captur is a compact crossover, offering a spacious and versatile interior, stylish design, and efficient engine options.'),
(65, 'Kangoo', 'Base', 2022, 'renault-kangoo-2021-side-front.jpg', 174.30, 72.00, 72.00, 112.90, '1.3L Turbocharged Inline-4', 'N/A', 28000.00, 0.00, 52, 'The Nouvelle Kangoo is a versatile and practical compact van, known for its cargo capacity, comfort, and modern features.'),
(66, 'Panda City Cross', 'Base', 2022, 'fiat-panda-cross-2021-side-front.jpg', 153.00, 67.90, 60.60, 90.60, '1.0L Hybrid', 'N/A', 15000.00, 0.00, 53, 'The Fiat Panda City Cross is a compact city car, known for its practicality, fuel efficiency, and ease of maneuverability.'),
(67, '500 Hybrid', 'Base', 2022, 'fiat-500-hybrid-2020-front-angle-2.jpg', 139.60, 66.70, 59.80, 90.90, '1.0L Hybrid', 'N/A', 18000.00, 0.00, 53, 'The Fiat 500 Hybrid is a hybrid version of the iconic 500, offering a stylish and eco-friendly option for urban driving.'),
(68, 'e-Ulysse', 'Base', 2022, 'fiat-e-ulysse-2022-front-side-3.jpg', 205.00, 80.70, 68.30, 119.10, 'Electric Motor', 'N/A', 35000.00, 0.00, 53, 'The Fiat e-Ulysse is an all-electric MPV, providing spacious and comfortable seating, ideal for family trips and daily commuting.'),
(69, 'Nouvelle Classe C Berline', 'Base', 2022, 'mercedes-benz-c-class-sedan-2021-front-side-1.jpg', 185.00, 71.30, 56.60, 111.80, '2.0L Turbocharged Inline-4', 'N/A', 40000.00, 0.00, 54, 'The Nouvelle Classe C Berline is a luxury compact sedan, known for its sophisticated design, advanced technology, and refined performance.'),
(70, 'Nouvelle GLA', 'Base', 2022, 'mercedes-benz-gla-front-view.jpg', 173.60, 72.20, 63.60, 107.40, '2.0L Turbocharged Inline-4', 'N/A', 38000.00, 0.00, 54, 'The Nouvelle GLA is a compact luxury SUV, offering a blend of style, comfort, and performance with the hallmark of Mercedes-Benz craftsmanship.'),
(71, 'Nouvelle EQB', 'Base', 2022, 'mercedes-benz-eqb-2021-front-side-3.jpg', 187.40, 72.20, 66.90, 113.10, 'Electric Motor', 'N/A', 45000.00, 0.00, 54, 'The Nouvelle EQB is an all-electric SUV, combining the versatility of an SUV with the sustainability of electric mobility, showcasing Mercedes-Benzs commitment to innovation.'),
(72, 'Polo', 'Base', 2022, 'volkswagen-polo-2021-front-side-1.jpg', 168.00, 75.80, 56.70, 99.90, '1.0L Turbocharged Inline-3', 'N/A', 20000.00, 0.00, 55, 'The Volkswagen Polo is a popular subcompact car, known for its quality build, efficiency, and practicality.'),
(73, 'Tiguan', 'Base', 2022, 'nuova-tiguan-2020-front-view-1.jpg', 185.10, 72.40, 65.60, 109.90, '2.0L Turbocharged Inline-4', 'N/A', 28000.00, 0.00, 55, 'The Volkswagen Tiguan is a compact SUV, offering a spacious interior, comfortable ride, and versatile features for family and adventure.'),
(74, 'Golf', 'Base', 2022, 'new-volkswagen-golf-2020.jpg', 167.60, 70.40, 58.20, 103.80, '1.5L Turbocharged Inline-4', 'N/A', 24000.00, 0.00, 55, 'The Volkswagen Golf is a classic compact car, known for its timeless design, quality construction, and dynamic driving experience.'),
(75, 'Caddy', 'Base', 2022, 'volkswagen-caddy-2020-front-side-2.jpg', 183.50, 72.20, 68.10, 112.90, '2.0L Turbocharged Inline-4', 'N/A', 26000.00, 0.00, 55, 'The Volkswagen Caddy is a versatile compact van, offering practicality, cargo space, and comfort for various commercial and personal uses.'),
(76, 'Touareg', 'Base', 2022, 'volkswagen-touareg-front-view.jpg', 192.00, 78.00, 67.00, 117.90, '3.0L Turbocharged V6', 'N/A', 50000.00, 0.00, 55, 'The Volkswagen Touareg is a luxury midsize SUV, known for its premium features, powerful engine options, and comfortable ride.'),
(77, 'Golf SW', 'Base', 2022, 'volkswagen-golf-variant-2020-front-side-1.jpg', 180.40, 70.80, 58.10, 105.30, '1.5L Turbocharged Inline-4', 'N/A', 26000.00, 0.00, 55, 'The Volkswagen Golf SW is a sporty and practical wagon, combining the dynamic driving experience of the Golf with additional cargo space.'),
(78, 'TUCSON', 'Base', 2022, 'hyundai-tucson-2020-side.jpg', 182.30, 73.40, 65.60, 108.50, '2.5L Inline-4', 'N/A', 25000.00, 0.00, 56, 'The Hyundai TUCSON is a compact SUV, known for its modern design, advanced safety features, and a comfortable and spacious interior.'),
(79, 'BAYON', 'Base', 2022, 'hyundai-bayon-2021-side-front.jpg', 165.40, 70.70, 59.10, 102.20, '1.0L Turbocharged Inline-3', 'N/A', 20000.00, 0.00, 56, 'The Hyundai BAYON is a subcompact crossover, offering a perfect balance of style, efficiency, and versatility for urban driving.'),
(80, 'Nouvelle i20', 'Base', 2022, 'hyundai-i20-front-view.jpg', 159.40, 70.70, 58.10, 99.40, '1.0L Turbocharged Inline-3', 'N/A', 18000.00, 0.00, 56, 'The Nouvelle i20 is a compact hatchback, known for its modern design, advanced technology, and fuel-efficient performance.'),
(81, 'Nouvelle i10', 'Base', 2022, 'hyundai-i10-front-view.jpg', 158.90, 66.70, 58.10, 98.40, '1.0L Inline-3', 'N/A', 15000.00, 0.00, 56, 'The Nouvelle i10 is a small city car, offering maneuverability, fuel efficiency, and modern features for urban commuting.'),
(82, 'Nexo', 'Base', 2022, 'hyundai-nexo-2018-front-side-1.jpg', 183.90, 73.20, 64.20, 109.80, 'Fuel Cell Electric', 'N/A', 60000.00, 0.00, 56, 'The Hyundai Nexo is a hydrogen fuel cell electric vehicle (FCEV), offering zero-emission driving with the convenience of hydrogen fuel technology.');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id_fk` (`news_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `comparisons`
--
ALTER TABLE `comparisons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `newsimages`
--
ALTER TABLE `newsimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliderimages`
--
ALTER TABLE `sliderimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `vehiculereviews`
--
ALTER TABLE `vehiculereviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
-- Constraints for table `sliderimages`
--
ALTER TABLE `sliderimages`
  ADD CONSTRAINT `news_id_fk` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
