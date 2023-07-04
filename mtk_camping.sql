-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 04, 2023 at 05:46 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

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
('20cc8d80-7491-4a6a-9dcd-a509f02fee51', '059770b8-b023-4c83-b14d-255098f41e0c', '2', '07/04/2023', '07/04/2023', '2023-07-03 08:51:50', '2023-07-03 08:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `camping_sites`
--

CREATE TABLE `camping_sites` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camping_sites`
--

INSERT INTO `camping_sites` (`id`, `name`, `location`, `description`, `image`, `created_at`, `updated_at`) VALUES
('059770b8-b023-4c83-b14d-255098f41e0c', 'Bangkok Asiatique The Riverfront', 'TH', 'Bangkok beautiful camping sites', 'asiatique-riverfront.jpeg', '2023-06-19 05:40:16', '2023-07-03 07:49:39'),
('22664acc-3e56-4bd4-9bb4-41a6481af36c', 'Singapore', 'SG', '                                Singapore Attraction                            ', 'Singapore_place.jpeg', '2023-06-19 17:09:43', '2023-07-03 07:48:04'),
('72ee0e21-8423-4188-bc55-759ce350aff3', 'Mount Logan Canada', 'CA', 'Escape to the wilderness and enjoy breathtaking views', 'Logan-Main-Summit-2-1200x800.jpeg', '2023-07-04 05:41:41', '2023-07-04 05:41:41'),
('86f48a33-a55d-4287-ad71-103e4a09219f', 'Black Hills United States', 'US', 'A peaceful camping site surrounded by nature.', 'Black-Elk-Peak-region-Hills-Custer-State.webp', '2023-07-04 05:38:48', '2023-07-04 05:38:48'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Maldives', 'TH', '                                                                                                Camping is a cherished outdoor activity that allows individuals to immerse themselves in nature and temporarily escape the trappings of modern life. It involves setting up temporary shelters, such as tents or cabins, in designated camping areas, which can range from national parks and forests to private campgrounds and remote wilderness locations.                                                                                                                ', 'Hero_Soneva Jani Chapter Two by Aksham Abdul Ghadir.webp', '2023-06-19 05:40:00', '2023-07-03 05:31:42'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'Bagan', 'MM', '                                Bagan Pagodas                            ', 'sunrise-over-bagan.jpeg', '2023-06-19 17:09:20', '2023-07-03 07:50:14'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Sydney', 'AU', '                                                                                                                                Sydney Climbing Hills                                                                                                                ', 'Sydney-Opera-House-Port-Jackson.webp', '2023-06-19 17:08:07', '2023-07-03 07:50:37'),
('e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'Blue Lake Austrilia', 'AU', '                                                                Discover the beauty of nature and reconnect with the outdoors                                                        ', '092822_js_fewer-blue-lakes_feat-1030x580.jpeg', '2023-07-04 05:43:24', '2023-07-04 05:45:37');

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
('72ee0e21-8423-4188-bc55-759ce350aff3', '72ee0e21-8423-4188-bc55-759ce350aff3', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('86f48a33-a55d-4287-ad71-103e4a09219f', '86f48a33-a55d-4287-ad71-103e4a09219f', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'c03f1074-d8f7-4a59-b241-19e54524c95f', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Min Thu Kyaw', 'minthukyaw454@gmail.com', '09250048922'),
('e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'Min Thu Kyaw Min', 'minthukyaw454@gmail.com', '09250048922');

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
('72ee0e21-8423-4188-bc55-759ce350aff3', '72ee0e21-8423-4188-bc55-759ce350aff3', 'Fishing Spots'),
('86f48a33-a55d-4287-ad71-103e4a09219f', '86f48a33-a55d-4287-ad71-103e4a09219f', 'Hiking Trails'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Feature 1'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'c03f1074-d8f7-4a59-b241-19e54524c95f', 'Sightseeing'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Climbing Hills'),
('e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'Canoeing');

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
('72ee0e21-8423-4188-bc55-759ce350aff3', '72ee0e21-8423-4188-bc55-759ce350aff3', 'Historic Site'),
('86f48a33-a55d-4287-ad71-103e4a09219f', '86f48a33-a55d-4287-ad71-103e4a09219f', 'Waterfall'),
('8c7ccb12-d67b-4084-8036-dc3f61dfec53', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', 'Attraction 1'),
('c03f1074-d8f7-4a59-b241-19e54524c95f', 'c03f1074-d8f7-4a59-b241-19e54524c95f', 'Over thousand Bagan Pagodas'),
('c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', 'Dome'),
('e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'e6cebd50-7a02-45f2-93a4-fdb0551f357a', 'Scenic Viewpoint');

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
('4f35c752-d057-48f6-8fc0-5adcccc179b9', '8c7ccb12-d67b-4084-8036-dc3f61dfec53', '2', NULL, 'Amazing Sea View', '2023-07-03 09:10:25', '2023-07-03 09:10:25'),
('75987a27-52b1-4bba-8894-f22c05933f8d', 'c3c41639-2c95-4a78-b70a-0d67d1052c8b', '2', NULL, 'Amazing Opera              ', '2023-07-03 09:10:44', '2023-07-03 09:10:44'),
('a4f33000-2138-4fe8-8d93-8178ec968460', '059770b8-b023-4c83-b14d-255098f41e0c', '2', NULL, 'Amazing Food! Amazing Restaurants', '2023-06-19 06:48:23', '2023-07-03 09:15:06'),
('fadb0b06-3a27-45d5-af85-0b17fd33e802', '059770b8-b023-4c83-b14d-255098f41e0c', '2', NULL, 'Amazing amusement', '2023-06-19 09:09:53', '2023-07-03 09:21:30');

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

--
-- Dumping data for table `rss_feed`
--

INSERT INTO `rss_feed` (`id`, `title`, `description`, `published_at`) VALUES
('4e8c1e99-6499-4645-8a67-744a484d10fe', 'Each camping informations', 'http://127.0.0.1/one_camping.php', '2023-07-04 05:05:42'),
('76ea0ad4-1d08-4e74-ab66-b979be076b20', 'Register / Login Page', 'http://127.0.0.1/login.php', '2023-07-04 05:25:45'),
('afdaa52c-0875-4fa8-9a46-0420cdb8609b', 'Available Camping Informations', 'http://127.0.0.1/camping.php', '2023-07-04 05:14:18');

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
(3, 'user1', 'mtkmTK123#', 'User 1', 'user', NULL, '2023-06-19 09:13:01', '2023-06-19 09:13:01'),
(4, 'user3', '1111', 'User 3', 'user', NULL, '2023-07-04 05:26:33', '2023-07-04 05:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `visit_counter`
--

CREATE TABLE `visit_counter` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit_counter`
--

INSERT INTO `visit_counter` (`id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, '::1', '2023-07-03 07:38:33', '2023-07-03 07:38:33'),
(2, '127.0.0.1', '2023-07-03 08:35:28', '2023-07-03 08:35:28');

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
-- Indexes for table `visit_counter`
--
ALTER TABLE `visit_counter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visit_counter`
--
ALTER TABLE `visit_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
