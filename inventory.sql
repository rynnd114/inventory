-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 05:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int NOT NULL,
  `brand` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `model` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `serial_number` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `brand`, `model`, `serial_number`, `purchase_date`) VALUES
(1, 'acer', 'think', '46436', '2024-06-10'),
(3, 'toshiba', 'toss', '643563', '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `update_history`
--

CREATE TABLE `update_history` (
  `id` int NOT NULL,
  `laptop_id` int NOT NULL,
  `old_brand` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_model` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_serial_number` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_purchase_date` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_history`
--

INSERT INTO `update_history` (`id`, `laptop_id`, `old_brand`, `old_model`, `old_serial_number`, `old_purchase_date`, `updated_at`) VALUES
(1, 1, 'asus', 'zenn', '46436', '2024-06-10', '2024-06-10 01:52:20'),
(2, 1, 'lenbovo', 'think', '46436', '2024-06-10', '2024-06-10 01:52:44'),
(3, 3, 'samsung', 'T1', '64356345', '2024-05-28', '2024-06-10 01:54:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_number` (`serial_number`);

--
-- Indexes for table `update_history`
--
ALTER TABLE `update_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laptop_id` (`laptop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `update_history`
--
ALTER TABLE `update_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `update_history`
--
ALTER TABLE `update_history`
  ADD CONSTRAINT `update_history_ibfk_1` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
