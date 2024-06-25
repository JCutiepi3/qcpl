-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 06:43 AM
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
(1, 'Guillermo Mercado', '', 'admin', 'admin');

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
(1, 'Boss 1', '', 'boss1', 'boss1');

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
(1, 'Boss 2', '', 'boss2', 'boss2');

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
(175, 'Screenshot 2024-05-07 105858.png', NULL, NULL, 'Outgoing', '123', '2024-06-25', 'ahhga', 'guhigug', 'hfuhu', 'DOCS', 'File_Uploaded/Screenshot 2024-05-07 105858.png', 'oks', 'boss1', '', 'Second Review'),
(176, 'Screenshot 2024-05-07 105858.png', 'Readers Service Division', 'Reference Section', 'Incoming', '65775', '2024-06-25', 'kjsfv', 'guhvuih', 'hhuvui', 'PDF', 'File_Uploaded/Screenshot 2024-05-07 105858.png', '', 'boss1', 'ldg,d', 'Approved'),
(177, 'Screenshot 2024-05-10 081013.png', NULL, NULL, 'Incoming', '9999', '2024-06-25', 'kokoko', 'lmglam', 'glnglkg', 'DOCS', 'File_Uploaded/Screenshot 2024-05-10 081013.png', '', '', '', 'First Review'),
(178, 'Screenshot 2024-05-09 101939.png', NULL, NULL, 'Outgoing', '999', '2024-06-25', 'jngne', 'ngjjn', 'gknngj', 'PDF', 'File_Uploaded/Screenshot 2024-05-09 101939.png', '', '', '', 'PROOFREAD');

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
(1, 'Proof Reader', '', 'proofreader', 'proofreader');

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
(1, 'Receiving', '', 'receiving', 'receiving');

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
  `Section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `division`, `Section`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', '', '', 'user', 'user'),
(63, 'Fil Loc Arch Section', 'Readers\' Services Division', 'Filipiniana, Local History and Archives Section', 'filipiniana', 'filipiniana'),
(64, 'Law Research Section', 'Readers\' Services Division', 'Law Research Section', 'research', 'research'),
(65, 'Periodical Section', 'Readers\' Services Division', 'Periodical Section', 'periodical', 'periodical'),
(66, 'Childrens Section', 'Readers\' Services Division', 'Childrens Section', 'children', 'children'),
(67, 'MIS Section', 'Readers\' Services Division', 'Management Information System Section', 'informationsystem', 'informationsystem'),
(68, 'Reference Section', 'Readers\' Services Division', 'Reference Section', 'reference', 'reference'),
(69, 'Collection Development Section', 'Technical Division', 'Collection Development Section', 'collection', 'collection'),
(70, 'Cataloging Section', 'Technical Division', 'Cataloging Section', 'cataloging', 'cataloging'),
(71, 'Binding and Preservation Section', 'Technical Division', 'Binding and Preservation Section', 'bindingsection', 'bindingsection'),
(72, 'Recreational', 'Library Extension Division', 'Recreational', 'recreational', 'recreational'),
(73, 'Outreach', 'Library Extension Division', 'Outreach', 'outreach', 'outreach'),
(74, 'Puppeteers', 'Library Extension Division', 'Puppeteers', 'puppeteers', 'puppeteers'),
(75, 'Publishing Section', 'Publication Division', 'Publishing Section', 'publishing', 'publishing'),
(76, 'Marketing Section', 'Publication Division', 'Marketing Section', 'marketing', 'marketing'),
(77, 'District Libraries Division', 'District Libraries Division', 'District Libraries Division', 'branchlibraries', 'branchlibraries'),
(78, 'Administrative Services', 'Administrative Services', 'Administrative Services', 'administrative', 'administrative');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `boss1`
--
ALTER TABLE `boss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `boss2`
--
ALTER TABLE `boss2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `proofreader`
--
ALTER TABLE `proofreader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testupload`
--
ALTER TABLE `testupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
