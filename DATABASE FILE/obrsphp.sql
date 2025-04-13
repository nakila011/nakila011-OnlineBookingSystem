-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 05:18 AM
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
-- Database: `obrsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '1=Paid, 0- Unpaid',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `schedule_id`, `ref_no`, `name`, `qty`, `status`, `date_updated`) VALUES
(1, 1, '202206248407', 'Janpel Reyna', 2, 1, '2025-01-24 21:43:13'),
(2, 4, '202206252673', 'Jouselo Nakila', 2, 0, '2025-01-24 17:10:27'),
(3, 2, '202206251496', 'Marck Balatayo', 2, 1, '2025-03-30 19:07:51'),
(4, 4, '202206254769', 'Julios Curteso', 1, 1, '2025-01-25 20:02:23'),
(5, 7, '202206257753', 'Charles Olayan', 34, 0, '2025-01-25 20:04:20'),
(6, 5, '20220625746', 'Kie Escuyos', 3, 1, '2025-01-25 23:19:45'),
(7, 9, '202206252201', 'Jhon Ivan Tabanao', 1, 0, '2025-01-25 23:23:51'),
(8, 1, '20250331292', 'Julios Curteso', 1, 0, '2025-03-30 15:46:38'),
(9, 10, '202504141891', 'Jouselo Nakila', 1, 0, '2025-04-13 18:53:52'),
(10, 9, '202504147251', 'Julios Curteso122', 1, 1, '2025-04-13 18:56:34'),
(11, 10, '202504149431', 'Jouselo Nakila555', 1, 0, '2025-04-13 19:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `bus_number` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `bus_number`, `status`, `date_updated`) VALUES
(1, 'Bus Companies, Bachelor Express Butuan', 'ADG4455', 1, '2025-04-01 15:08:49'),
(2, 'KingLong', 'ADG7782', 1, '2025-01-24 19:00:21'),
(3, 'Bus Companies, Bachelor Express Butuan', 'ADG6657', 1, '2025-04-01 15:08:53'),
(4, 'Bus Companies, Bachelor Express Butuan', 'ADG3244', 1, '2025-04-13 18:39:03'),
(5, 'KingLong', 'SFH2587', 1, '2025-01-24 19:01:13'),
(6, 'KingLong', 'SFH7777', 0, '2025-04-13 18:56:41'),
(7, 'KingLong', 'QWE8787', 1, '2025-01-24 19:01:38'),
(8, 'KingLong', 'ERE2585', 1, '2025-01-24 19:01:54'),
(9, 'KingLong', 'TWE8969', 0, '2025-04-13 18:40:16'),
(10, 'KingLong', 'TTY5874', 0, '2025-04-13 18:40:13'),
(11, 'KingLong', 'TWE1258', 0, '2025-04-01 15:09:09'),
(12, 'Davao Metro Shuttle ', 'GDH4543', 1, '2025-04-13 18:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `terminal_name` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= inactive , 1= active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `terminal_name`, `city`, `state`, `status`, `date_updated`) VALUES
(1, 'Davao Terminal', 'Davao City', 'P One', 1, '2022-06-24 19:10:58'),
(2, 'Cagayan de Oro Terminal', 'Cagayan de Oro', 'Region 10', 1, '2025-04-13 18:42:50'),
(3, 'Zamboanga Terminal', 'Zamboanga City', 'P Four', 0, '2025-04-13 18:42:59'),
(4, 'General Santos Terminal', 'General Santos City', 'P One', 1, '2022-06-24 19:13:35'),
(5, 'Butuan City Terminal', 'District -2', 'Region 13', 1, '2025-04-13 18:42:37'),
(6, 'Iligan Terminal', 'Iligan City', 'P Three', 1, '2022-06-24 19:14:05'),
(7, 'Cotabato Terminal', 'Cotabato City', 'P Three', 1, '2022-06-24 19:13:51'),
(8, 'Tagum Terminal', 'Tagum City', 'P Three', 0, '2025-04-13 18:42:57'),
(9, 'Malaybalay Terminal', 'Malaybalay City', 'P Four', 1, '2022-06-24 19:09:37'),
(10, 'Surigao Terminal', 'Surigao City', 'P Five', 0, '2025-04-13 18:42:55'),
(11, 'Dipolog Terminal', 'Dipolog City', 'P Six', 1, '2022-06-25 22:05:24'),
(12, 'Pagadian Terminal', 'Pagadian City', 'P Six', 1, '2022-06-25 22:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `bus_id` int(30) NOT NULL,
  `from_location` int(30) NOT NULL,
  `to_location` int(30) NOT NULL,
  `departure_time` datetime NOT NULL,
  `eta` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `availability` int(11) NOT NULL,
  `price` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `bus_id`, `from_location`, `to_location`, `departure_time`, `eta`, `status`, `availability`, `price`, `date_updated`) VALUES
(1, 11, 1, 5, '2025-01-24 15:00:00', '2025-01-24 20:00:00', 1, 25, '50', '2025-01-26 01:27:08'),
(2, 6, 1, 2, '2025-04-13 09:00:00', '2025-04-13 02:00:00', 0, 35, '80', '2025-04-14 02:50:25'),
(3, 1, 3, 9, '2025-01-24 10:00:00', '2025-01-24 16:00:00', 1, 32, '33', '2025-01-25 17:10:46'),
(4, 9, 4, 1, '2025-01-25 08:00:00', '2025-01-25 19:00:00', 1, 30, '65', '2025-01-25 17:11:55'),
(5, 7, 1, 1, '2025-01-25 10:00:00', '2025-01-25 19:00:00', 1, 35, '80', '2025-04-14 03:09:31'),
(6, 4, 7, 6, '2025-01-25 11:00:00', '2025-01-25 13:00:00', 1, 35, '43', '2025-01-25 17:17:10'),
(7, 8, 9, 4, '2025-01-26 15:00:00', '2025-01-26 23:00:00', 1, 34, '75', '2025-01-25 17:18:08'),
(8, 3, 6, 2, '2025-01-26 12:00:00', '2025-01-26 17:00:00', 1, 31, '68', '2025-01-25 17:20:35'),
(9, 10, 11, 12, '2025-01-26 10:00:00', '2025-01-26 13:00:00', 1, 38, '65', '2025-01-26 01:36:18'),
(10, 1, 5, 2, '2025-04-13 09:00:00', '2025-04-13 05:00:00', 1, 30, '120', '2025-04-14 02:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 1,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 0 = incative , 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `username`, `password`, `status`, `date_updated`) VALUES
(1, 'Administrator', 1, 'admin', '57f032b441324ec6c01c9fe62d57ebf3', 1, '2025-03-30 20:16:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
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
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
