-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 07:16 AM
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
(1, 'Guillermom Mercado', '', 'admin', 'admin'),
(2, 'Juluis Tadena', '', 'admins', 'admins');

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
(1, 'Guillermom Mercado', '', 'boss1', 'boss1'),
(2, 'Juluis Tadena', '', 'boss11', 'boss11');

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
(1, 'Guillermom Mercado', '', 'boss2', 'boss2'),
(2, 'Juluis Tadena', '', 'boss22', 'boss22');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `category` enum('Incoming','Outgoing','','') DEFAULT NULL,
  `locator_num` varchar(255) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `received_from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `proofreader_comment` varchar(255) NOT NULL,
  `boss2_comment` varchar(255) NOT NULL,
  `boss1_comment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `file_name`, `division`, `section`, `category`, `locator_num`, `received_date`, `received_from`, `subject`, `description`, `type`, `file_path`, `proofreader_comment`, `boss2_comment`, `boss1_comment`, `status`) VALUES
(118, 'Annex_B-1_FOI_Laws_on_Disclosures.pdf', 'Readers Service Division', 'Reference Section', 'Incoming', '123456789012', '2024-06-07', 'MIS', 'QCPL', 'immediately', 'PDF', 'File_Uploaded/Annex_B-1_FOI_Laws_on_Disclosures.pdf', '', 'ghdh', 'lgagldmlambla', 'Approved'),
(119, 'Elements_of_Law.pdf', 'Readers Service Division', 'Reference Section', 'Outgoing', '101112131415', '2024-06-07', 'ADMIN', 'QCPL', 'RUSH', 'PDF', 'File_Uploaded/Elements_of_Law.pdf', '', 'reeh', 'sdkhmfskmhkfmsh', 'Approved'),
(120, 'basic-laws-book-2016.pdf', NULL, NULL, 'Incoming', '234567890123', '2024-06-07', 'LIBRARY', 'QCPL', 'N EED REVIEW', 'PDF', 'File_Uploaded/basic-laws-book-2016.pdf', '', 'adas', '', 'Second Review'),
(121, 'legal.pdf', NULL, NULL, 'Outgoing', '990011223344', '2024-06-07', 'QCPL', 'PUBLICATION', 'NEED REVISION', 'PDF', 'File_Uploaded/legal.pdf', '', 'fs[g', '', 'Second Review'),
(122, 'Patrick_Star.svg.png', NULL, NULL, 'Incoming', '345678901234', '2024-06-07', 'LIBRARY', 'QCPL', 'NEED DETAILS', 'IMG', 'File_Uploaded/Patrick_Star.svg.png', '', 'oks', '', 'Second Review'),
(123, 'a837c9ebbacc661902b41878fb3e6503.jpg', NULL, NULL, 'Outgoing', '889900112233', '2024-06-07', 'EXECUTIVE', 'QCPL', 'RUSH', 'DOCS', 'File_Uploaded/a837c9ebbacc661902b41878fb3e6503.jpg', '', 'done', '', 'Second Review'),
(124, '19490618-RA-0386-JPL.pdf', NULL, NULL, 'Outgoing', '0', '2024-06-07', 'ADMIN', 'QCPL', 'RE-CHECKED', 'PDF', 'File_Uploaded/19490618-RA-0386-JPL.pdf', '', '', '', 'First Review');

-- --------------------------------------------------------

--
-- Table structure for table `proofreader`
--

CREATE TABLE `proofreader` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proofreader`
--

INSERT INTO `proofreader` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', '', 'proofreader', 'proofreader'),
(2, 'Juluis Tadena', '', 'proofreaders', 'proofreaders');

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE `receiving` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiving`
--

INSERT INTO `receiving` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', '', 'receiving', 'receiving'),
(2, 'Juluis Tadena', '', 'receivings', 'receivings');

-- --------------------------------------------------------

--
-- Table structure for table `testupload`
--

CREATE TABLE `testupload` (
  `ID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testupload`
--

INSERT INTO `testupload` (`ID`, `filename`, `filepath`) VALUES
(25, 'PDF 2.docx', 0x433a2f78616d70702f6874646f63732f7163706c2f4261636b656e642f46696c655f55706c6f616465642f50444620322e646f6378),
(26, 'PDF 2.pdf', 0x433a2f78616d70702f6874646f63732f7163706c2f4261636b656e642f46696c655f55706c6f616465642f50444620322e706466);

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
(1, 'Guillermo Mercado', '', 'user', 'user'),
(2, 'Juluis Tadena', '', 'users', 'users');

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
-- Indexes for table `proofreader`
--
ALTER TABLE `proofreader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving`
--
ALTER TABLE `receiving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testupload`
--
ALTER TABLE `testupload`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `boss1`
--
ALTER TABLE `boss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `boss2`
--
ALTER TABLE `boss2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `proofreader`
--
ALTER TABLE `proofreader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testupload`
--
ALTER TABLE `testupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
