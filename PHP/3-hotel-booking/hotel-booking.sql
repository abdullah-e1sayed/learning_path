-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 12:10 PM
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
-- Database: `hotel-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(2) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminName`, `email`, `pass`, `created_at`) VALUES
(1, 'Admin', 'info@admin.com', '$2y$10$KudV3tuvDp25UUxRrYMV5.zZ9FEwXengv7.cWAHgvYdheWECVfjy2', '2023-07-18 08:09:39'),
(2, 'Abdullah', 'abdullah@gmail.com', '$2y$10$zlN/TU7oar20WPVY3ur0NOlUI9BPhTs04DD2g7vu9X9e6mN9CIK/y', '2023-07-18 15:58:51'),
(3, 'Falcon', 'falcon@gmail.com', '$2y$10$JgZOZySUsInAFWv/mOKijeEQEx8xqWyafXFeYYeCfF5aDmKhLJ9yu', '2023-07-18 15:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `check_in` varchar(50) NOT NULL,
  `check_out` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment` int(10) NOT NULL,
  `user_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `check_in`, `check_out`, `email`, `phone_number`, `full_name`, `hotel_name`, `room_name`, `status`, `payment`, `user_id`, `created_at`) VALUES
(1, '7/18/2023', '7/20/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'The Ritz', '0', 'Confirmed', 0, 1, '2023-07-10 15:24:08'),
(3, '6/26/2023', '7/17/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'The Ritz', 'Family Room', 'Pending', 0, 1, '2023-07-10 15:29:51'),
(4, '6/27/2023', '7/19/2023', 'lohewo2446@jobsfeel.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'Done', 0, 1, '2023-07-10 18:54:41'),
(5, '6/26/2023', '7/17/2023', 'info@admin.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'Pending', 0, 1, '2023-07-10 19:14:36'),
(6, '7/18/2023', '7/20/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'Confirmed', 100, 2, '2023-07-15 11:35:47'),
(7, '7/18/2023', '7/20/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'pending', 100, 2, '2023-07-15 11:36:54'),
(8, '7/18/2023', '7/19/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'pending', 100, 2, '2023-07-15 11:37:26'),
(9, '7/23/2023', '7/24/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'The Ritz', 'Deluxe Room', 'pending', 250, 2, '2023-07-15 11:50:24'),
(10, '7/11/2023', '7/4/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'pending', 100, 2, '2023-07-16 11:42:13'),
(11, '7/17/2023', '7/20/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'The Ritz', 'Family Room', 'pending', 600, 2, '2023-07-16 12:24:00'),
(12, '7/11/2023', '7/12/2023', 'falcon@gmail.com', '01060431414', 'Abdullah Elsayed', 'Sheraton', 'Suite Room', 'pending', 100, 2, '2023-07-17 15:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `image`, `description`, `location`, `status`, `created_at`) VALUES
(1, 'sharqia', 'services-1.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic', 'Sharqia', 1, '2023-07-08 13:57:10'),
(2, 'The Plaza Hote', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'New york.', 1, '2023-07-08 13:57:10'),
(3, 'The Ritz', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', ' Paris.', 1, '2023-07-08 13:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `num_persons` int(3) NOT NULL,
  `size` int(4) NOT NULL,
  `view` varchar(200) NOT NULL,
  `num_beds` int(2) NOT NULL,
  `hotel_id` int(6) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `price`, `num_persons`, `size`, `view`, `num_beds`, `hotel_id`, `hotel_name`, `status`, `created_at`) VALUES
(1, 'Suite Room', 'room-1.jpg', 100, 2, 50, 'Sea View', 1, 1, 'Sharqia', 1, '2023-07-09 16:18:35'),
(2, 'Standard Room', 'room-2.jpg', 150, 4, 60, 'Sea View', 2, 2, 'The Plaza Hote', 1, '2023-07-09 16:18:35'),
(3, 'Family Room', 'room-3.jpg', 200, 8, 70, 'Sea View', 4, 3, 'The Ritz', 1, '2023-07-09 16:18:35'),
(4, 'Deluxe Room', 'room-4.jpg', 250, 6, 75, 'sea view', 3, 3, 'The Ritz', 1, '2023-07-09 16:18:35'),
(5, 'Luxury Room', 'room-5.jpg', 120, 2, 65, 'see view', 1, 1, 'Sharqia', 1, '2023-07-16 12:39:40'),
(6, 'Superior Room', 'room-6.jpg', 180, 3, 70, 'see view', 2, 2, 'The Plaza Hote\r\n', 1, '2023-07-16 12:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `date`) VALUES
(1, 'admin', 'info@admin.com', '$2y$10$KudV3tuvDp25UUxRrYMV5.zZ9FEwXengv7.cWAHgvYdheWECVfjy2', '2023-07-08 13:20:41'),
(2, 'falcon', 'falcon@gmail.com', '$2y$10$.Ubtud79W5y5OCqNBiqV9eERL1ZKbJbMvSATFhLL5XV3i61PxZXPe', '2023-07-08 13:23:46'),
(3, 'test', 'test@gmail.com', '$2y$10$0fUc7QspEg5MNtSfjrDyY.8ePK6UX6rxZUEIPuBRhegMu2XWci12u', '2023-07-08 13:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(9) NOT NULL,
  `name` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `room_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `icon`, `description`, `room_id`, `created_at`) VALUES
(1, 'Tea Coffee', 'flaticon-diet', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-07-10 12:03:15'),
(2, 'Hot Showers', 'flaticon-workout', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-07-10 12:03:15'),
(3, 'Laundry', 'flaticon-diet-1', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-07-10 12:03:15'),
(4, 'Air Conditioning', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 2, '2023-07-10 12:03:15'),
(5, 'Free Wifi', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 2, '2023-07-10 12:03:15'),
(6, 'Kitchen', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 3, '2023-07-10 12:03:15'),
(7, 'Lovkers', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 3, '2023-07-10 12:03:15'),
(8, 'Ironing', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 4, '2023-07-10 12:03:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
