-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 03:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `division`, `section`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', '', '', 'admin', 'admin'),
(50, 'proof', 'Technical Division', '', 'proof', 'proofproof'),
(51, 'admin', 'Readers\' Services Division', '', 'admin', 'adminadmin'),
(52, 'receive', 'Library Extension Division', '', 'receive', 'receivereceive'),
(53, 'receive', 'Technical Division', '', 'receive', 'receivereceive'),
(54, 'proo', 'Technical Division', '', 'rporoor', 'kgndjbnnbqbq'),
(55, 'ahah', 'Library Extension Division', '', 'ahahahaha', 'shshsshhshshhshshs'),
(56, 'TESTING', 'Readers\' Services Division', 'TESTING', '', 'TESTINGTESTING'),
(57, 'TESTINGTESTINGTESTING123', 'Publication Division', '', 'TESTINGTESTINGTESTING123', 'TESTINGTESTINGTESTING123'),
(58, 'FRANCISKING', 'Publication Division', '', 'FRANCISKING1123', 'FRANCISKING1123'),
(59, 'SKSSKKSKS', 'Publication Division', '', 'SKSKSKSKSKS', 'SKSSKSKSKSKSKSKSKSK'),
(60, 'FGHJKLDFGHJ', 'Publication Division', '', 'FGHJKLDFGHJ', 'DRFGHJKL;KJHGFD'),
(61, 'TESTINGTESTING', 'Administrative Services', '', 'FGHJKLDFGHJ', 'FGHJKLDFGHJFGHJKLDFGHJ');

-- --------------------------------------------------------

--
-- Table structure for table `boss1`
--

CREATE TABLE `boss1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss1`
--

INSERT INTO `boss1` (`id`, `name`, `division`, `section`, `username`, `password`) VALUES
(1, 'Boss 1', '', '', 'boss1', 'boss1'),
(13, 'boss1', 'Technical Division', '', 'boss1', 'boss1boss1'),
(14, 'lslmn', 'Technical Division', '', 'nmkmnk', 'flsblsfbml'),
(15, 'TESTING123456', 'Library Extension Division', '', 'TESTING123456', 'TESTING123456'),
(16, 'TESTING', 'Library Extension Division', '', 'TESTING', 'SDFGYHUJIKOLP;[\'[;LKJHGFD');

-- --------------------------------------------------------

--
-- Table structure for table `boss2`
--

CREATE TABLE `boss2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss2`
--

INSERT INTO `boss2` (`id`, `name`, `division`, `section`, `username`, `password`) VALUES
(1, 'Boss 2', '', '', 'boss2', 'boss2'),
(9, 'boss2', 'Technical Division', '', 'boss2', 'boss2boss2'),
(10, 'nicole', 'Readers\' Services Division', '', 'supermarkee', 'supermarkee');

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
(175, 'Screenshot 2024-05-07 105858.png', 'Readers Service Division', 'Filipiniana, Local History and Archives Section', 'Outgoing', '123', '2024-06-25', 'ahhga', 'guhigug', 'hfuhu', 'DOCS', 'File_Uploaded/Screenshot 2024-05-07 105858.png', 'oks', 'boss1', 'oks', 'Approved'),
(176, 'Screenshot 2024-05-07 105858.png', 'Readers Service Division', 'Reference Section', 'Incoming', '65775', '2024-06-25', 'kjsfv', 'guhvuih', 'hhuvui', 'PDF', 'File_Uploaded/Screenshot 2024-05-07 105858.png', '', 'boss1', 'ldg,d', 'Approved'),
(177, 'Screenshot 2024-05-10 081013.png', NULL, NULL, 'Incoming', '9999', '2024-06-25', 'kokoko', 'lmglam', 'glnglkg', 'DOCS', 'File_Uploaded/Screenshot 2024-05-10 081013.png', '', '', '', 'First Review'),
(178, 'Screenshot 2024-05-09 101939.png', NULL, NULL, 'Outgoing', '999', '2024-06-25', 'jngne', 'ngjjn', 'gknngj', 'PDF', 'File_Uploaded/Screenshot 2024-05-09 101939.png', 'oms', '', '', 'First Review'),
(179, 'userincomingdash.php', 'Readers Service Division', 'Reference Section', 'Outgoing', '23525', '2024-06-25', 'jjbfu', 'hfuhuh', 'fhufh', 'DOCS', 'File_Uploaded/userincomingdash.php', 'dsm;g', 'orsjhs', 'odaofd', 'Approved'),
(180, 'Timeline.docx', NULL, NULL, 'Outgoing', '8888', '2024-06-25', 'ihfishjhi', 'ojohjoej', 'ohjeojhoe', 'PDF', 'File_Uploaded/Timeline.docx', 'akfka', '', '', 'First Review'),
(181, 'QCPL.drawio.png', NULL, NULL, 'Outgoing', '777', '2024-06-25', 'lmklsjjqj', 'ggljig', 'gjgiejg', 'DOCS', 'File_Uploaded/QCPL.drawio.png', 'wwwwww', '', '', 'First Review'),
(182, 'basic-laws-book-2016.pdf', NULL, NULL, 'Incoming', '8979', '2024-06-25', 'fshguhu', 'hhghgi', 'highie', 'PDF', 'File_Uploaded/basic-laws-book-2016.pdf', '', '.g,gmdn', '', 'Second Review');

-- --------------------------------------------------------

--
-- Table structure for table `proofreader`
--

CREATE TABLE `proofreader` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proofreader`
--

INSERT INTO `proofreader` (`id`, `name`, `division`, `section`, `username`, `password`) VALUES
(1, 'Proof Reader', '', '', 'proofreader', 'proofreader'),
(6, 'testing', 'Library Extension Division', '', 'testing', 'testing123456789'),
(7, 'TESTING123', 'Library Extension Division', '', 'TESTING123', 'TESTING123123123'),
(8, 'guillermo', 'Library Extension Division', '', 'nicole ann', 'nicole ann');

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE `receiving` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiving`
--

INSERT INTO `receiving` (`id`, `name`, `division`, `section`, `username`, `password`) VALUES
(1, 'Receiving', '', '', 'receiving', 'receiving'),
(4, 'TESTING', 'Administrative Services', '', 'testing', 'testing123456789'),
(5, 'testing123123', 'District Libraries Division', '', 'testing123123', 'testing123123'),
(6, 'nicole ann', 'Administrative Services', '', 'pitong123', 'pitong123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `division`, `section`, `username`, `password`) VALUES
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
(78, 'Administrative Services', 'Administrative Services', 'Administrative Services', 'administrative', 'administrative'),
(79, 'Juluis', 'Technical Division', '', 'proof123', 'proof123'),
(80, 'Juluis', 'Technical Division', '', 'testtest123', 'testtest123'),
(81, 'user', 'Technical Division', '', 'user', 'useruser'),
(82, 'Juluis', 'Library Extension Division', '', 'sayababsayabab', 'sayababsayabab');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `boss1`
--
ALTER TABLE `boss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `boss2`
--
ALTER TABLE `boss2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `proofreader`
--
ALTER TABLE `proofreader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
