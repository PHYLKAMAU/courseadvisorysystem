-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2023 at 11:25 AM
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
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisor_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisor_id`, `fullname`, `username`, `email`, `school`, `password`) VALUES
(1, 'ngigi paul', 'Paul', 'paul@exa.com', 'SAFS', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `group_meeting`
--

CREATE TABLE `group_meeting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meeting_link` varchar(255) NOT NULL,
  `daytime` datetime NOT NULL,
  `scheduled_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_meeting`
--

INSERT INTO `group_meeting` (`id`, `title`, `meeting_link`, `daytime`, `scheduled_by`) VALUES
(1, 'fcvhbn', 'xfcgkvhbn', '2023-05-04 17:57:00', 'ngigi paul'),
(2, 'computer science year 3', 'https://cj g k hj jh h', '2023-04-24 10:00:00', 'ngigi paul');

-- --------------------------------------------------------

--
-- Table structure for table `private_meeting`
--

CREATE TABLE `private_meeting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` longtext NOT NULL,
  `daytime` datetime NOT NULL,
  `request_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `private_meeting`
--

INSERT INTO `private_meeting` (`id`, `title`, `descr`, `daytime`, `request_from`) VALUES
(1, 'dccdfvdf', 'dsvszc', '2023-04-18 15:04:00', ''),
(2, 'cbdc ', 'difjsbfcbczjzfdiisdj', '2023-04-18 21:45:00', 'PAUL NG\'ANG\'A'),
(3, 'vgj vj j', 'i;b hivculviuifyfutdyxckvkhgvh l td rytf dtuy ', '2023-04-18 21:46:00', 'PAUL NG\'ANG\'A'),
(4, 'finance', 'missing mRKS', '2023-04-21 13:19:00', 'dolly'),
(5, 'bhdfbvlbvn ', 'haeufhsu bnunsingoshgthhsio oooooo', '2023-04-29 15:22:00', 'PAUL NG\'ANG\'A'),
(6, 'kbjkf bjk', 'hbucvu;nkl;mi f', '2023-04-26 12:26:00', 'PAUL NG\'ANG\'A');

-- --------------------------------------------------------

--
-- Table structure for table `School`
--

CREATE TABLE `School` (
  `id` int(11) NOT NULL,
  `Schoolname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `School`
--

INSERT INTO `School` (`id`, `Schoolname`) VALUES
(1, 'School ofcomputing and informatics]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school` varchar(255) NOT NULL,
  `password` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `school`, `password`) VALUES
(13, 'PAUL NG\'ANG\'A', 'Paul jii gover', 'ngigipaul912@gmail.com', 'SCI', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisor_id`);

--
-- Indexes for table `group_meeting`
--
ALTER TABLE `group_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_meeting`
--
ALTER TABLE `private_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `School`
--
ALTER TABLE `School`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `advisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_meeting`
--
ALTER TABLE `group_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `private_meeting`
--
ALTER TABLE `private_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `School`
--
ALTER TABLE `School`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
