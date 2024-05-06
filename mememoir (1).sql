-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 04:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mememoir`
--

-- --------------------------------------------------------

--
-- Table structure for table `allgroup`
--

CREATE TABLE `allgroup` (
  `id` int(11) NOT NULL,
  `date` varchar(250) NOT NULL,
  `GroupName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dev`
--

CREATE TABLE `dev` (
  `id` int(255) NOT NULL,
  `profname` varchar(255) NOT NULL,
  `cuurentdate` varchar(250) NOT NULL,
  `devdate` varchar(255) NOT NULL,
  `groupname` varchar(250) NOT NULL,
  `dev` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(250) NOT NULL,
  `phonenumber` varchar(250) NOT NULL,
  `groupname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE `monday` (
  `id` int(255) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `s78` varchar(250) NOT NULL,
  `s89` varchar(255) NOT NULL,
  `s910` varchar(250) NOT NULL,
  `s1011` varchar(250) NOT NULL,
  `s1112` varchar(250) NOT NULL,
  `s12` varchar(255) NOT NULL,
  `s23` varchar(255) NOT NULL,
  `s34` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `groupname` varchar(250) NOT NULL,
  `mada` varchar(255) NOT NULL,
  `note` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE `sunday` (
  `id` int(255) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `s78` varchar(250) NOT NULL,
  `s89` varchar(255) NOT NULL,
  `s910` varchar(250) NOT NULL,
  `s1011` varchar(250) NOT NULL,
  `s1112` varchar(250) NOT NULL,
  `s12` varchar(255) NOT NULL,
  `s23` varchar(255) NOT NULL,
  `s34` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thersday`
--

CREATE TABLE `thersday` (
  `id` int(255) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `s78` varchar(250) NOT NULL,
  `s89` varchar(255) NOT NULL,
  `s910` varchar(250) NOT NULL,
  `s1011` varchar(250) NOT NULL,
  `s1112` varchar(250) NOT NULL,
  `s12` varchar(255) NOT NULL,
  `s23` varchar(255) NOT NULL,
  `s34` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tusday`
--

CREATE TABLE `tusday` (
  `id` int(255) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `s78` varchar(250) NOT NULL,
  `s89` varchar(255) NOT NULL,
  `s910` varchar(250) NOT NULL,
  `s1011` varchar(250) NOT NULL,
  `s1112` varchar(250) NOT NULL,
  `s12` varchar(255) NOT NULL,
  `s23` varchar(255) NOT NULL,
  `s34` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phonenumber` varchar(152) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fami` varchar(500) NOT NULL,
  `childname` varchar(255) NOT NULL,
  `birth` varchar(250) NOT NULL,
  `place` varchar(250) NOT NULL,
  `class` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE `wednesday` (
  `id` int(255) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `s78` varchar(250) NOT NULL,
  `s89` varchar(255) NOT NULL,
  `s910` varchar(250) NOT NULL,
  `s1011` varchar(250) NOT NULL,
  `s1112` varchar(250) NOT NULL,
  `s12` varchar(255) NOT NULL,
  `s23` varchar(255) NOT NULL,
  `s34` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allgroup`
--
ALTER TABLE `allgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev`
--
ALTER TABLE `dev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sunday`
--
ALTER TABLE `sunday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thersday`
--
ALTER TABLE `thersday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tusday`
--
ALTER TABLE `tusday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allgroup`
--
ALTER TABLE `allgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dev`
--
ALTER TABLE `dev`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thersday`
--
ALTER TABLE `thersday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tusday`
--
ALTER TABLE `tusday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
