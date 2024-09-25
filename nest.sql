-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2023 at 11:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nest`
--

-- --------------------------------------------------------

--
-- Table structure for table `HouseImages`
--

CREATE TABLE `HouseImages` (
  `image_id` int(11) NOT NULL,
  `house_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `HouseImages`
--

INSERT INTO `HouseImages` (`image_id`, `house_id`, `filename`) VALUES
(1, 18, 'https://images.pexels.com/photos/6835179/pexels-photo-6835179.jpeg'),
(2, 18, 'https://images.pexels.com/photos/6835175/pexels-photo-6835175.jpeg'),
(3, 18, 'https://images.pexels.com/photos/6835181/pexels-photo-6835181.jpeg'),
(4, 19, 'https://images.pexels.com/photos/6835175/pexels-photo-6835175.jpeg'),
(5, 19, 'https://images.pexels.com/photos/6835181/pexels-photo-6835181.jpeg'),
(6, 19, 'https://images.pexels.com/photos/6835179/pexels-photo-6835179.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Houses`
--

CREATE TABLE `Houses` (
  `house_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `rent` decimal(10,2) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `square_feet` int(11) DEFAULT NULL,
  `date_of_availability` date DEFAULT NULL,
  `availability_status` enum('Available','Rented') NOT NULL DEFAULT 'Available',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Houses`
--

INSERT INTO `Houses` (`house_id`, `title`, `description`, `rent`, `address`, `city`, `bedrooms`, `bathrooms`, `square_feet`, `date_of_availability`, `availability_status`, `user_id`) VALUES
(18, 'Modern Apartment', 'Title: Charming 3-Bedroom Home for Rent in a Picturesque Neighborhood\r\n\r\nDescription:\r\n🏡 Welcome to your new home! This beautifully renovated 3-bedroom house is now available for rent in the heart of a serene and family-friendly neighborhood. If you\'ve been dreaming of a cozy and inviting place to call your own, look no further. \r\n\r\n✨ Features:\r\n🛏️ 3 bedrooms, perfect for families or a home office\r\n🛁 2 full bathrooms for your convenience\r\n🍽️ Spacious kitchen with modern appliances\r\n🌳 A lovely backyard, ideal for outdoor activities and gardening\r\n🚗 Attached garage and ample parking space\r\n🏫 Proximity to excellent schools and parks\r\n🛒 Convenient access to shopping and dining\r\n\r\nThis house is more than just walls and a roof; it\'s the canvas for your future memories. Imagine hosting gatherings in the open living and dining areas, cozying up by the fireplace during winter evenings, or savoring morning coffee on your private patio.\r\n\r\nWith easy access to schools, parks, shopping centers, and major roads, this location offers the perfect blend of convenience and tranquility. The neighborhood is known for its friendly atmosphere and a strong sense of community.\r\n\r\nDon\'t miss out on this opportunity to make this house your home sweet home. Contact us today to schedule a viewing and take the first step towards your next chapter.', '30000.00', 'Block A, Basundhara R/A', 'Dhaka', 3, 2, 2000, '2023-12-31', 'Available', 2),
(19, 'Test Property', 'test ', '10000.00', 'Basundhara R/A', 'Dhaka', 3, 3, 1500, '2023-12-31', 'Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `message_id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`message_id`, `sender`, `receiver`, `subject`, `message_text`, `timestamp`, `is_read`) VALUES
(1, 'sarwar', 'Aladeen', 'Hello World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-10-26 10:56:30', 1),
(2, 'sarwar', 'Aladeen', 'Hello World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-10-26 10:57:01', 0),
(3, 'sarwar', 'Aladeen', 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-10-26 10:58:57', 1),
(4, 'sarwar', 'aladeen', 'Test', 'test', '2023-10-26 10:59:10', 0),
(5, 'Aladeen', 'sarwar', 'STOP SENDING ME MESSAGES!!!', 'STOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!\r\nSTOP SENDING ME MESSAGES!!!', '2023-10-26 11:54:43', 1),
(10, 'sarwar', 'goyim', 'Hello', 'hello', '2023-10-31 22:38:13', 0),
(11, 'user1', 'sarwar', 'Hello', 'Hi', '2023-11-01 19:06:56', 1),
(12, 'Aladeen', 'sarwar', 'Hello', 'Hello', '2023-11-02 03:01:29', 1),
(13, 'user2', 'testuser', 'test', 'test', '2023-11-02 07:10:30', 1),
(14, 'testuser', 'user2', 'hello', 'hello', '2023-11-02 08:17:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_role` enum('tenant','owner','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `user_role`) VALUES
(1, 'sarwar', 'sarwar.uddin@northsouth.edu', '$2y$10$TJ5kVIdzZYp/gHQ15LASzu0Ra5DT/Q7dx4lZnHlmcBnzrj5MAT2oq', 'Sarwar', 'Uddin', 'admin'),
(2, 'testuser', 'test@gmail.com', '$2y$10$NOphhuSid.3ZOejw0gRZ8./PoT8p.LTNveiLrc9sJ/QslmzWbiLQe', 'Test ', 'User', 'owner'),
(3, 'Aladeen', 'aladeen@aladeen.aladeen', '$2y$10$OQ6tgAHEnOneYLEYrqTS6eK7BTD.VUPrN1WPFPX6lIjKgWD/HY0UG', 'Haffaz Ajamhinadad  ', 'Osama Hussein Aladeen', 'tenant'),
(4, 'goyim', 'goyim@goyim.net', '$2y$10$aJC/Gx7ncN9YjJnvhPoeguMZOevzc2MctTog8xfgsf6HGf/QV/Zr6', '', '', 'tenant'),
(5, 'user1', 'a@a.com', '$2y$10$fhK9leYcZpr5sh0kGEZV2uOMPCgLhnZv/9olMmEMt0.axnfhFqAze', 'User', 'one', 'owner'),
(6, 'user2', 'user@user.com', '$2y$10$NuZmjBwfJ839YrdqcIeakOs6OPGbOj1hrUVOYeJjD5YQc5Hvuu3X6', '', '', 'tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `HouseImages`
--
ALTER TABLE `HouseImages`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `Houses`
--
ALTER TABLE `Houses`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `HouseImages`
--
ALTER TABLE `HouseImages`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Houses`
--
ALTER TABLE `Houses`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `HouseImages`
--
ALTER TABLE `HouseImages`
  ADD CONSTRAINT `HouseImages_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `Houses` (`house_id`) ON DELETE CASCADE;

--
-- Constraints for table `Houses`
--
ALTER TABLE `Houses`
  ADD CONSTRAINT `Houses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
