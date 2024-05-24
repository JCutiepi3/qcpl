-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 06:06 AM
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
(25, 'adminn', 'Readers\' Services Division', 'adminn', 'adminn123'),
(26, 'Guillermo Mercado', 'Library Extension Division', 'guillermomercado123', 'guillermomercado123');

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
(1, 'boss1', 'boss1', 'boss1', 'boss1'),
(6, 'Guillermo Mamaril', 'Technical Division', 'guillermomamaril123', 'guillermomamaril123');

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
(1, 'boss2', 'boss2', 'boss2', 'boss2');

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
  `boss2_comment` varchar(255) NOT NULL,
  `boss1_comment` varchar(255) NOT NULL,
  `status` enum('pending','processing','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `file_name`, `division`, `section`, `category`, `locator_num`, `received_date`, `received_from`, `subject`, `description`, `type`, `file_path`, `boss2_comment`, `boss1_comment`, `status`) VALUES
(87, '6928-1-19774-1-10-20191218.pdf', 'Readers\' Services Division', 'Publishing Section', 'Incoming', '12345', '2024-05-17', 'done', 'done', 'done', 'PDF', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', 'saadad', 'hgfdsa', 'pending'),
(88, 'user.htm', 'Library Extension Division', 'Recreational', 'Incoming', '909', '2024-05-17', 'ok', 'ok', 'ok', 'DOCS', 'File_Uploaded/user.htm', '', 'aaaa', 'pending'),
(89, '6928-1-19774-1-10-20191218.pdf', 'Technical Division', 'Collection Development', 'Outgoing', '8989', '2024-05-17', 'okok', 'okok', 'okok', 'IMG', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', 'sd', 'pending'),
(90, '6928-1-19774-1-10-20191218.pdf', 'Publication Division', 'Publishing Section', 'Incoming', '7676', '2024-05-17', 'nice', 'nice', 'nice', 'IMG', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', 'jhgfdes', 'pending'),
(91, '6928-1-19774-1-10-20191218.pdf', NULL, NULL, 'Outgoing', '3434', '2024-05-17', 'uwu', 'uwu', 'uwu', 'PDF', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', '', 'pending'),
(92, '6928-1-19774-1-10-20191218.pdf', '', '', 'Incoming', '136462', '2024-05-17', 'done', 'done', 'done', 'PDF', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', '', 'completed'),
(93, 'user.htm', '', '', 'Outgoing', '11', '2024-05-17', '4pm', '4pm', '4pm', 'DOCS', 'File_Uploaded/user.htm', 'GUMANA KANA PLSSSSSSSSSSSSSSSSSSSSSS', 'nigga moments', 'pending'),
(94, '6928-1-19774-1-10-20191218.pdf', 'readers', 'Children;s Section', 'Incoming', '9090909', '2024-05-20', 'okokookok', 'okokokokk', 'okokokokk', 'DOCS', 'File_Uploaded/6928-1-19774-1-10-20191218.pdf', '', 'ok', 'processing'),
(95, 'PDF 2.pdf', NULL, NULL, 'Incoming', '90091', '2024-05-21', 'bro', 'bro', 'bro', 'DOCS', 'File_Uploaded/PDF 2.pdf', '', '', 'pending'),
(96, 'PDF 2.pdf', NULL, NULL, 'Incoming', '456', '2024-05-04', 'AAA', 'SSSS', 'SSS', 'PDF', 'File_Uploaded/PDF 2.pdf', '', '', 'pending'),
(97, 'TASK OJT.txt', NULL, NULL, 'Incoming', '0', '2024-05-23', 'ok', 'opo', 'oo', 'DOCS', 'File_Uploaded/TASK OJT.txt', '', '', 'pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `boss1`
--
ALTER TABLE `boss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `boss2`
--
ALTER TABLE `boss2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `testupload`
--
ALTER TABLE `testupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
