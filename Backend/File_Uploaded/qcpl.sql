-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 03:32 AM
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
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(21, 'Guillermo Mercado', 'Readers\' Services Division', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `boss1`
--

CREATE TABLE `boss1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss1`
--

INSERT INTO `boss1` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'boss1', 'boss1', 'boss1', 'boss1');

-- --------------------------------------------------------

--
-- Table structure for table `boss2`
--

CREATE TABLE `boss2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss2`
--

INSERT INTO `boss2` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'boss2', 'Readers\' Services Division', 'boss2', 'boss2');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `category` enum('incoming','outgoing','','') DEFAULT NULL,
  `locator_num` varchar(255) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `received_from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `boss2_comment` varchar(255) NOT NULL,
  `boss1_comment` varchar(255) NOT NULL,
  `status` enum('pending','processing','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `file_name`, `division`, `section`, `category`, `locator_num`, `received_date`, `received_from`, `subject`, `description`, `type`, `file_path`, `boss2_comment`, `boss1_comment`, `status`) VALUES
(87, '6928-1-19774-1-10-20191218.pdf', 'district', 'Branch Libraries', 'incoming', '12345', '2024-05-17', 'done', 'done', 'done', 'PDF', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', 'ok', 'completed'),
(88, 'user.htm', NULL, NULL, 'incoming', '909', '2024-05-17', 'ok', 'ok', 'ok', 'DOCS', 'File_Uploaded/user.htm', '', '', 'pending'),
(89, '6928-1-19774-1-10-20191218.pdf', NULL, NULL, 'outgoing', '8989', '2024-05-17', 'okok', 'okok', 'okok', 'IMG', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', '', 'pending'),
(90, '6928-1-19774-1-10-20191218.pdf', NULL, NULL, 'incoming', '7676', '2024-05-17', 'nice', 'nice', 'nice', 'IMG', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', '', 'pending'),
(91, '6928-1-19774-1-10-20191218.pdf', NULL, NULL, 'outgoing', '3434', '2024-05-17', 'uwu', 'uwu', 'uwu', 'PDF', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', '', 'pending'),
(92, '6928-1-19774-1-10-20191218.pdf', '', '', 'incoming', '136462', '2024-05-17', 'done', 'done', 'done', 'PDF', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', '', 'completed'),
(93, 'user.htm', 'publication', 'Publishing Section', 'outgoing', '11', '2024-05-17', '4pm', '4pm', '4pm', 'DOCS', 'File_Uploaded/user.htm', '', 'ampogi mo po sir', 'completed'),
(94, '6928-1-19774-1-10-20191218.pdf', 'readers', 'Children;s Section', 'incoming', '9090909', '2024-05-20', 'okokookok', 'okokokokk', 'okokokokk', 'DOCS', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', 'ok', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'user', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boss1`
--
ALTER TABLE `boss1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boss2`
--
ALTER TABLE `boss2`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `boss1`
--
ALTER TABLE `boss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boss2`
--
ALTER TABLE `boss2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
