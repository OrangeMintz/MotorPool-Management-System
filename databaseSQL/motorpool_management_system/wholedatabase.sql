-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 09:20 PM
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
-- Database: `testfordatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointed`
--

CREATE TABLE `appointed` (
  `appointed_vd` int(20) NOT NULL,
  `driver_id` int(20) NOT NULL,
  `vehicle_number` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointed`
--

INSERT INTO `appointed` (`appointed_vd`, `driver_id`, `vehicle_number`, `created_at`, `updated_at`) VALUES
(7, 1001, 67867, '2023-05-07 04:44:08', '2023-05-07 04:44:08'),
(8, 1002, 12312, '2023-05-07 08:18:38', '2023-05-07 09:14:11'),
(9, 1000, 67786, '2023-05-07 09:15:04', '2023-05-07 09:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `birthday` date NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `phone_number` char(11) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `birthday`, `barangay`, `city`, `province`, `phone_number`, `email_address`, `created_at`, `updated_at`) VALUES
(1000, 'Djeikuje Nickolai', '', 'Gacus', NULL, '2002-09-10', 'Poblacion', 'Valencia City', 'Bukidnon', '9350050225', 'nickolaigacus@yahoo.com', '2023-05-04 14:39:57', '2023-05-07 09:31:15'),
(1001, 'Jhon Kert', '', 'Talha', NULL, '2002-02-07', 'Poblacion', 'Valencia City', 'Bukidnon', '9564566454', 'talhajhonkert@gmail.com', '2023-05-07 00:36:07', '2023-05-07 09:15:32'),
(1002, 'Jeffrey', '', 'Sedoro', NULL, '2023-05-04', 'Bagontaas', 'Valencia City', 'Bukidnon', '9566756756', 'example@gmail.com', '2023-05-07 04:22:50', '2023-05-07 04:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `schedule_id` int(20) NOT NULL,
  `appointed_vd` int(20) NOT NULL,
  `departure_datetime` datetime NOT NULL,
  `arrival_datetime` datetime DEFAULT NULL,
  `schedule_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduling`
--

INSERT INTO `scheduling` (`schedule_id`, `appointed_vd`, `departure_datetime`, `arrival_datetime`, `schedule_status`, `created_at`, `updated_at`) VALUES
(109, 9, '2023-06-09 00:58:00', '0000-00-00 00:00:00', 'Traveling ', '2023-05-07 09:41:22', '2023-05-07 16:58:26'),
(110, 7, '2023-05-07 19:50:00', '0000-00-00 00:00:00', 'Traveling ', '2023-05-07 11:50:52', '2023-05-07 18:48:36'),
(111, 8, '2023-05-08 02:48:00', '2023-05-08 02:48:00', 'Arrived', '2023-05-07 18:48:44', '2023-05-07 18:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trips_id` int(20) NOT NULL,
  `schedule_id` int(20) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trips_id`, `schedule_id`, `origin`, `destination`) VALUES
(1, 109, 'Valencia', 'Cagayan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `full_name`, `birthday`, `address`, `phone_number`, `email_address`) VALUES
(0, 'admin', 'adminlogin', 'Djeikuje Nickolai C. Gacus', '2002-09-10', 'Purok 6-A Dayyo Sub, Poblacion Valencia City', '9350050225', 'nickzgacus@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_number` int(5) NOT NULL,
  `vehicle_brand` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_plate` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_number`, `vehicle_brand`, `vehicle_model`, `vehicle_plate`, `created_at`, `updated_at`) VALUES
(12312, 'Nissan', 'ViosN', '67867', '2023-05-07 04:32:10', '2023-05-07 04:32:10'),
(12315, 'Nissan', 'Vios', '4567S', '2023-05-03 15:14:57', '2023-05-04 15:59:36'),
(67786, 'Ford', 'ViosH', 'zUwUz', '2023-05-03 15:59:45', '2023-05-07 09:16:36'),
(67867, 'Nissan', 'ViosN', 'SASF4', '2023-05-04 02:40:11', '2023-05-07 04:36:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointed`
--
ALTER TABLE `appointed`
  ADD PRIMARY KEY (`appointed_vd`),
  ADD UNIQUE KEY `appointed_vd` (`appointed_vd`),
  ADD UNIQUE KEY `driver_id` (`driver_id`),
  ADD UNIQUE KEY `vehicle_number` (`vehicle_number`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `driver_id` (`driver_id`),
  ADD UNIQUE KEY `driver_id_2` (`driver_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`schedule_id`),
  ADD UNIQUE KEY `schedule_id` (`schedule_id`),
  ADD UNIQUE KEY `appointed_vd` (`appointed_vd`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trips_id`),
  ADD UNIQUE KEY `trips_id` (`trips_id`),
  ADD UNIQUE KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_password` (`user_password`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_number`),
  ADD UNIQUE KEY `vehicle_number` (`vehicle_number`),
  ADD UNIQUE KEY `vehicle_plate` (`vehicle_plate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointed`
--
ALTER TABLE `appointed`
  MODIFY `appointed_vd` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `schedule_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trips_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointed`
--
ALTER TABLE `appointed`
  ADD CONSTRAINT `appointed_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `appointed_ibfk_2` FOREIGN KEY (`vehicle_number`) REFERENCES `vehicle` (`vehicle_number`);

--
-- Constraints for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD CONSTRAINT `scheduling_ibfk_1` FOREIGN KEY (`appointed_vd`) REFERENCES `appointed` (`appointed_vd`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `scheduling` (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
