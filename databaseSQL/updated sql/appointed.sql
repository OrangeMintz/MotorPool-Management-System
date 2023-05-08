-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 11:34 AM
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
(10, 1000, 12312, '2023-05-08 08:41:34', '2023-05-08 09:02:10'),
(11, 1001, 13123, '2023-05-08 09:17:26', '2023-05-08 09:17:26');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointed`
--
ALTER TABLE `appointed`
  MODIFY `appointed_vd` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointed`
--
ALTER TABLE `appointed`
  ADD CONSTRAINT `appointed_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `appointed_ibfk_2` FOREIGN KEY (`vehicle_number`) REFERENCES `vehicle` (`vehicle_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
