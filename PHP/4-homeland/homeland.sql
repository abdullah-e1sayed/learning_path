-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 09:14 PM
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
-- Database: `homeland`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminName`, `email`, `pass`, `created_at`) VALUES
(1, 'Admin', 'info@admin.com', '$2y$10$kDWY/uNv5/YWuuGfpbMuK.UJHp1w8w.UXL2X0H7e07SpUVzOyGsue', '2023-09-05 15:56:29'),
(3, 'Abdullah', 'falcon@gmail.com', '$2y$10$C49kJ2kRNOIJeELWtN38T.NFdTUqefsNNuPMPbU8Fg0LXYzD80vBq', '2023-09-06 13:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `admins_info`
--

CREATE TABLE `admins_info` (
  `id` int(11) NOT NULL,
  `admins_email` varchar(200) NOT NULL,
  `ip_addr` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `device` varchar(50) NOT NULL,
  `tracking_admins` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`) VALUES
(1, 'New York', '2023-08-31 04:22:58'),
(2, 'Los Angeles', '2023-08-31 04:22:58'),
(3, 'Cairo', '2023-08-31 04:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `home_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_name`, `email`, `phone`, `home_id`, `user_id`, `admin_name`, `created_at`) VALUES
(1, 'falcon ', 'falcon@gmail.com', '1', 4, 1, 'Abdullah', '2023-09-03 11:56:42'),
(2, 'falcon ', 'falcon@gmail.com', '01060431414', 3, 1, 'Admin', '2023-09-03 12:22:33'),
(3, 'falcon ', 'falcon@gmail.com', '01060431414', 1, 1, 'Abdullah', '2023-09-03 16:50:58'),
(5, 'falcon ', 'falcon@gmail.com', '01060431414', 11, 1, 'Abdullah', '2023-09-09 17:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id` int(11) NOT NULL,
  `home_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`id`, `home_id`, `client_id`, `client_email`, `status`, `created_at`) VALUES
(1, 1, 1, 'falcon@gmail.com', 0, '2023-08-31 18:18:53'),
(2, 2, 1, 'falcon@gmail.com', 0, '2023-08-31 18:22:47'),
(3, 3, 1, 'falcon@gmail.com', 1, '2023-08-31 18:36:24'),
(4, 4, 2, 'info@admin.com', 0, '2023-08-31 18:46:28'),
(5, 1, 2, 'info@admin.com', 0, '2023-08-31 19:00:04'),
(6, 4, 1, 'falcon@gmail.com', 0, '2023-09-03 11:39:15'),
(7, 11, 1, 'falcon@gmail.com', 1, '2023-09-09 17:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `home_images`
--

CREATE TABLE `home_images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_images`
--

INSERT INTO `home_images` (`id`, `image`, `prop_id`, `created_at`) VALUES
(1, 'hero_bg_1.jpg', 1, '2023-08-26 12:20:29'),
(2, 'img_2.jpg', 2, '2023-08-26 12:20:29'),
(3, 'img_3.jpg', 3, '2023-08-26 12:20:29'),
(4, 'img_4.jpg', 1, '2023-08-26 12:20:29'),
(5, 'img_5.jpg', 2, '2023-08-26 12:20:29'),
(6, 'img_6.jpg', 3, '2023-08-26 12:20:29'),
(7, 'img_8.jpg', 4, '2023-08-26 13:17:06'),
(8, 'img_7.jpg', 4, '2023-08-26 13:17:06'),
(9, 'hero_bg_1.jpg', 11, '2023-09-09 11:57:04'),
(10, 'hero_bg_2.jpg', 11, '2023-09-09 11:57:04'),
(11, 'hero_bg_3.jpg', 11, '2023-09-09 11:57:04'),
(12, 'hero_bg_4.jpg', 11, '2023-09-09 11:57:04'),
(13, 'img_1.jpg', 11, '2023-09-09 11:57:04'),
(14, 'img_2.jpg', 11, '2023-09-09 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `offers_type`
--

CREATE TABLE `offers_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers_type`
--

INSERT INTO `offers_type` (`id`, `name`, `created_at`) VALUES
(1, 'RENT', '2023-08-26 15:36:58'),
(2, 'SALE', '2023-08-26 15:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `created_at`) VALUES
(1, 'Condo', '2023-08-24 13:20:18'),
(2, 'Commercial-Building', '2023-08-24 13:20:18'),
(3, 'Land-Property', '2023-08-24 13:20:18'),
(8, 'Villa', '2023-09-06 18:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `props`
--

CREATE TABLE `props` (
  `id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `beds` int(10) NOT NULL,
  `baths` int(10) NOT NULL,
  `sq_ft` varchar(20) NOT NULL,
  `home_type` varchar(50) NOT NULL,
  `year_built` varchar(10) NOT NULL,
  `price_sqft` int(10) NOT NULL,
  `description` text NOT NULL,
  `offers` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `props`
--

INSERT INTO `props` (`id`, `admin_name`, `name`, `location`, `price`, `image`, `beds`, `baths`, `sq_ft`, `home_type`, `year_built`, `price_sqft`, `description`, `offers`, `created_at`) VALUES
(1, 'Abdullah ', '625 S. BERENDO ST', ' 625 S. Berendo St Unit 607 Los Angeles, CA 90005', 3000500, 'hero_bg_1.jpg', 3, 2, '7000', 'Condo', '2018', 520, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.  Nisi voluptatum error ipsum repudiandae, autem deleniti, velit dolorem enim quaerat rerum incidunt sed, qui ducimus! Tempora architecto non, eligendi vitae dolorem laudantium dolore blanditiis assumenda in eos hic unde.  Voluptatum debitis cupiditate vero tempora error fugit aspernatur sint veniam laboriosam eaque eum, et hic odio quibusdam molestias corporis dicta! Beatae id magni, laudantium nulla iure ea sunt aliquam. A.', 'RENT', '2023-08-21 10:47:56'),
(2, 'Admin', '871 Crenshaw Blvd', '1 New York Ave, Warners Bay, NSW 2282', 2965500, 'img_2.jpg', 5, 2, '1620', 'Commercial-Building', '2022', 8000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatum error ipsum repudiandae, autem deleniti, velit dolorem enim quaerat rerum incidunt sed, qui ducimus! Tempora architecto non, eligendi vitae dolorem laudantium dolore blanditiis assumenda in eos hic unde.\r\n\r\nVoluptatum debitis cupiditate vero tempora error fugit aspernatur sint veniam laboriosam eaque eum, et hic odio quibusdam molestias corporis dicta! Beatae id magni, laudantium nulla iure ea sunt aliquam. A.', 'SALE', '2023-08-21 10:57:29'),
(3, 'Admin', '853 S Lucerne Blvd', '853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005', 2565500, 'img_3.jpg', 5, 2, '1620', 'Land-Property', '2022', 8000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.\r\n\r\nNisi voluptatum error ipsum repudiandae, autem deleniti, velit dolorem enim quaerat rerum incidunt sed, qui ducimus! Tempora architecto non, eligendi vitae dolorem laudantium dolore blanditiis assumenda in eos hic unde.\r\n\r\nVoluptatum debitis cupiditate vero tempora error fugit aspernatur sint veniam laboriosam eaque eum, et hic odio quibusdam molestias corporis dicta! Beatae id magni, laudantium nulla iure ea sunt aliquam. A.', 'RENT', '2023-08-21 10:57:35'),
(4, 'Abdullah', '625 S. BERENDO ST', ' 625 S. Berendo St Unit 607 Los Angeles, CA 90005', 1500500, 'img_7.jpg', 5, 3, '1850', 'Condo', '2023', 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.  Nisi voluptatum error ipsum repudiandae, autem deleniti, velit dolorem enim quaerat rerum incidunt sed, qui ducimus! Tempora architecto non, eligendi vitae dolorem laudantium dolore blanditiis assumenda in eos hic unde.  Voluptatum debitis cupiditate vero tempora error fugit aspernatur sint veniam laboriosam eaque eum, et hic odio quibusdam molestias corporis dicta! Beatae id magni, laudantium nulla iure ea sunt aliquam. A.', 'SALE', '2023-08-26 13:05:48'),
(7, 'Abdullah', ' 625 S. SHARKIA St ', ' 625 S. SHARKIA St Unit 607 ,EGYPT', 5865000, 'img_1.jpg', 6, 2, '2000', 'Villa', '2022', 5800, 'jjjjjj', 'RENT', '2023-09-08 19:03:46'),
(11, 'Abdullah', ' 210 S. KAFR SAQR St ', ' 210 S. KAFR SAQR St ,EGYPT', 6245000, 'hero_bg_4.jpg', 7, 2, '2500', 'Villa', '2023', 6000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.  Nisi voluptatum error ipsum repudiandae, autem deleniti, velit dolorem enim quaerat rerum incidunt sed, qui ducimus! Tempora architecto non, eligendi vitae dolorem laudantium dolore blanditiis assumenda in eos hic unde.  Voluptatum debitis cupiditate vero tempora error fugit aspernatur sint veniam laboriosam eaque eum, et hic odio quibusdam molestias corporis dicta! Beatae id magni, laudantium nulla iure ea sunt aliquam. A.', 'SALE', '2023-09-09 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `created_at`) VALUES
(1, 'falcon', 'falcon@gmail.com', '$2y$10$kDWY/uNv5/YWuuGfpbMuK.UJHp1w8w.UXL2X0H7e07SpUVzOyGsue', '2023-08-15 13:14:16'),
(2, 'admin', 'info@admin.com', '$2y$10$Gpn31M6tyHX92UC6JcXTNueH49dzm5veTJ0lq.JhX7kMVcIaHk4nO', '2023-08-16 13:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `ip_addr` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `device` varchar(50) NOT NULL,
  `tracking_users` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_messages`
--

CREATE TABLE `users_messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_messages`
--

INSERT INTO `users_messages` (`id`, `username`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'falcon', 'falcon@gmail.com', 'test', 'mtest', 1, '2023-09-07 11:26:23'),
(2, 'falcon', 'falcon@gmail.com', 'test', 'mtest2', 1, '2023-09-07 11:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `visitors_info`
--

CREATE TABLE `visitors_info` (
  `id` int(11) NOT NULL,
  `ip_addr` varchar(20) NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `device` varchar(50) NOT NULL,
  `tracking_visitors` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors_info`
--

INSERT INTO `visitors_info` (`id`, `ip_addr`, `os`, `browser`, `device`, `tracking_visitors`, `created_at`) VALUES
(1, '::1', 'Windows 10', 'Chrome', 'Computer', 'index.php', '2023-09-09 19:10:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins_info`
--
ALTER TABLE `admins_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_images`
--
ALTER TABLE `home_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_type`
--
ALTER TABLE `offers_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `props`
--
ALTER TABLE `props`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_messages`
--
ALTER TABLE `users_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors_info`
--
ALTER TABLE `visitors_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins_info`
--
ALTER TABLE `admins_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home_images`
--
ALTER TABLE `home_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `offers_type`
--
ALTER TABLE `offers_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `props`
--
ALTER TABLE `props`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_messages`
--
ALTER TABLE `users_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors_info`
--
ALTER TABLE `visitors_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
