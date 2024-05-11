-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 08:44 AM
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
-- Database: `qcpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(5, 'try', 'try', 'try');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `owner` enum('admin','user','','') DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `category` enum('incoming','outgoing','','') DEFAULT NULL,
  `locator_num` varchar(255) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `received_from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `file_name`, `owner`, `division`, `section`, `category`, `locator_num`, `received_date`, `received_from`, `subject`, `description`, `type`, `file_path`) VALUES
(78, 'Screenshot 2024-05-10 083332.png', 'admin', 'ADMIN', '4B', 'incoming', '222', '2024-05-10', 'ok', 'ok', 'ok', 'Pdf', 'File_Uploaded/Screenshot 2024-05-10 083332.png'),
(79, 'Screenshot 2024-05-07 105858.png', 'user', 'MIS', '4A', 'outgoing', '000', '2024-05-10', 'sfs', 'sfsf', 'sfs', 'Pdf', 'File_Uploaded/Screenshot 2024-05-07 105858.png'),
(80, 'Screenshot 2024-05-10 081013.png', 'user', 'ADMIN', '4B', 'outgoing', '2323', '2024-05-10', '215125', 'j', 'high', 'Docs', 'File_Uploaded/Screenshot 2024-05-10 081013.png'),
(81, 'c4611_sample_explain.pdf', 'admin', 'MIS', '4B', 'outgoing', '0909', '2024-05-10', 'ok', 'ok', 'ok', 'Pdf', 'File_Uploaded/c4611_sample_explain.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(19, 'ok', 'user', 'user'),
(25, 'try', 'try', 'try');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
