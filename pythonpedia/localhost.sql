-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2022 at 09:54 AM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userregistration`
--
CREATE DATABASE IF NOT EXISTS `userregistration` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `userregistration`;

-- --------------------------------------------------------

--
-- Table structure for table `thecomments`
--

CREATE TABLE `thecomments` (
  `ForumID` bigint(255) NOT NULL,
  `Comment` longtext NOT NULL,
  `Username` varchar(255) NOT NULL,
  `CommentID` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `titleandcontent`
--

CREATE TABLE `titleandcontent` (
  `postID` bigint(255) NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Content` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `Username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thecomments`
--
ALTER TABLE `thecomments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `titleandcontent`
--
ALTER TABLE `titleandcontent`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thecomments`
--
ALTER TABLE `thecomments`
  MODIFY `CommentID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titleandcontent`
--
ALTER TABLE `titleandcontent`
  MODIFY `postID` bigint(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
