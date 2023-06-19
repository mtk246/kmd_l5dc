-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Jun 19, 2023 at 05:10 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtk_camping`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(100) NOT NULL,
  `camping_site_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `camping_site_id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
('b6d51b97-fca7-4405-88fd-7c30fe660009', '059770b8-b023-4c83-b14d-255098f41e0c', '2', '06/01/2023', '06/07/2023', '2023-06-19 06:18:54', '2023-06-19 06:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `camping_sites`
--

CREATE TABLE `camping_sites` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camping_sites`
--

INSERT INTO `camping_sites` (`id`, `name`, `location`, `description`, `created_at`, `updated_at`) VALUES
('059770b8-b023-4c83-b14d-255098f41e0c', 'Camping 5', 'SG', 'iManage Stock Management Application', '2023-06-19 05:40:16', '2023-06-19 05:40:16'),
('22664acc-3e56-4bd4-9bb4-41a6481af36c', 'Singapore', 'SG', 'Singapore Attraction', '2023-06-19 17:09:43', '2023-06-19 17:09:43'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Maldives', 'TH', '                                                                Camping is a cherished outdoor activity that allows individuals to immerse themselves in nature and temporarily escape the trappings of modern life. It involves setting up temporary shelters, such as tents or cabins, in designated camping areas, which can range from national parks and forests to private campgrounds and remote wilderness locations.                                                                                    ', '2023-06-19 05:40:00', '2023-06-19 17:07:33'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'Bagan', 'MM', 'Bagan Pagodas', '2023-06-19 17:09:20', '2023-06-19 17:09:20'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Sydney', 'AU', 'Sydney Climbing Hills', '2023-06-19 17:08:07', '2023-06-19 17:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` varchar(100) NOT NULL,
  `camping_site_id` varchar(100) NOT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `camping_site_id`, `contact_name`, `contact_email`, `contact_phone`) VALUES
('059770b8-b023-4c83-b14d-255098f41e0c', '059770b8-b023-4c83-b14d-255098f41e0c', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('22664acc-3e56-4bd4-9bb4-41a6481af36c', '22664acc-3e56-4bd4-9bb4-41a6481af36c', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'c03f1074-d8f7-4a59-b241-19e54524c95f', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` varchar(100) NOT NULL,
  `camping_site_id` varchar(100) NOT NULL,
  `feature_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `camping_site_id`, `feature_name`) VALUES
('059770b8-b023-4c83-b14d-255098f41e0c', '059770b8-b023-4c83-b14d-255098f41e0c', 'Feature 1'),
('22664acc-3e56-4bd4-9bb4-41a6481af36c', '22664acc-3e56-4bd4-9bb4-41a6481af36c', 'Night Life'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Feature 1'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'c03f1074-d8f7-4a59-b241-19e54524c95f', 'Sightseeing'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Climbing Hills');

-- --------------------------------------------------------

--
-- Table structure for table `local_attractions`
--

CREATE TABLE `local_attractions` (
  `id` varchar(100) NOT NULL,
  `camping_site_id` varchar(100) NOT NULL,
  `attraction_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_attractions`
--

INSERT INTO `local_attractions` (`id`, `camping_site_id`, `attraction_name`) VALUES
('059770b8-b023-4c83-b14d-255098f41e0c', '059770b8-b023-4c83-b14d-255098f41e0c', 'Maldives'),
('22664acc-3e56-4bd4-9bb4-41a6481af36c', '22664acc-3e56-4bd4-9bb4-41a6481af36c', 'Night Life'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Attraction 1'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'c03f1074-d8f7-4a59-b241-19e54524c95f', 'Over thousand Bagan Pagodas'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Dome');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(100) NOT NULL,
  `camping_site_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `camping_site_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
('7f8f0681-814a-4d11-9bc7-e7b45953b462', '059770b8-b023-4c83-b14d-255098f41e0c', '2', NULL, 'hello', '2023-06-19 06:48:56', '2023-06-19 09:01:25'),
('a4f33000-2138-4fe8-8d93-8178ec968460', '059770b8-b023-4c83-b14d-255098f41e0c', '2', NULL, 'greate sea view', '2023-06-19 06:48:23', '2023-06-19 06:48:23'),
('fadb0b06-3a27-45d5-af85-0b17fd33e802', '059770b8-b023-4c83-b14d-255098f41e0c', '2', NULL, 'hello', '2023-06-19 09:09:53', '2023-06-19 09:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `rss_feed`
--

CREATE TABLE `rss_feed` (
  `id` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin', NULL, '2023-06-19 05:36:22', '2023-06-19 05:36:22'),
(2, 'mtk246', 'mtkMTK123#', 'Min Thu Kyaw', 'user', NULL, '2023-06-19 05:40:58', '2023-06-19 05:40:58'),
(3, 'user1', 'mtkmTK123#', 'User 1', 'user', NULL, '2023-06-19 09:13:01', '2023-06-19 09:13:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camping_sites`
--
ALTER TABLE `camping_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_attractions`
--
ALTER TABLE `local_attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss_feed`
--
ALTER TABLE `rss_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
