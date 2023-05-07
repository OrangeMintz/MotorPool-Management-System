-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 09:17 PM
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
-- Database: `motorpool_management_system`
--

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
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_number`),
  ADD UNIQUE KEY `vehicle_number` (`vehicle_number`),
  ADD UNIQUE KEY `vehicle_plate` (`vehicle_plate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
