-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 11:07 PM
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
-- Database: `panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_number` varchar(20) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_number`, `capacity`) VALUES
(1, 'AAA-1234', 40),
(2, 'BBB-5678', 35),
(3, 'CCC-9012', 50),
(4, 'DDD-3456', 59),
(5, 'EEE-7890', 55),
(6, 'FFF-1234', 30),
(7, 'GGG-5678', 60),
(8, 'HHH-9012', 25),
(9, 'III-3456', 35),
(10, 'JJJ-7890', 40);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `name`, `email`, `phone`) VALUES
(7, 'Shah', 'aptechmoin2241@gmail.com', '5156165165'),
(8, 'Hammad', 'dsadsad@gmail.copm', '879876');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(100) DEFAULT NULL,
  `duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`, `duration`) VALUES
(1, 'Gulshan-e-Iqbal', '00:20:00'),
(2, 'Clifton', '00:30:00'),
(3, 'Saddar', '00:15:00'),
(4, 'North Nazimabad', '00:25:00'),
(5, 'Defence', '00:35:00'),
(6, 'Gulistan-e-Johar', '00:22:00'),
(7, 'Malir', '00:40:00'),
(8, 'Karachi University', '00:28:00'),
(9, 'Shahra-e-Faisal', '00:32:00'),
(10, 'Korangi', '00:45:00'),
(11, 'Nazimabad Kati Pajari', '00:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_from` varchar(100) DEFAULT NULL,
  `ticket_to` varchar(100) DEFAULT NULL,
  `passenger_name` varchar(100) DEFAULT NULL,
  `bus_number` varchar(20) DEFAULT NULL,
  `ticket_status` enum('Active','Canceled','Expired') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_from`, `ticket_to`, `passenger_name`, `bus_number`, `ticket_status`, `created_at`) VALUES
(4, 'Saddar', 'Korangi', 'Shah', 'CCC-9012', 'Active', '2024-05-16 20:54:13'),
(5, 'Gulistan-e-Johar', 'Defence', 'Hammad', 'JJJ-7890', 'Active', '2024-05-16 20:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `role_as`) VALUES
(28, 'Hammad', 'rayol42009@dovesilo.com', '123', 'Rawalpindi121', 0),
(31, 'Shah', 'aptechmoin2241@gmail.com', '123', 'Rawalpindi', 1),
(34, 'Shah Moinuddin 1', 'fantasticmr80@gmail.com', '123', 'Rawalpindi', 0),
(38, 'Viva Store', 'ITE1tgQfYzl7zc3@tercommunity.one', '123', 'Nazimabad Kati Pahari', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
