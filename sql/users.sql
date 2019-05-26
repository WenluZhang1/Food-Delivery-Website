-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2019 at 01:01 PM
-- Server version: 5.7.20
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `suburb` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postCode` int(4) DEFAULT NULL,
  `profileLink` varchar(100) DEFAULT 'profile/defaultProfileImage.png',
  `activated` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `phoneNumber`, `email`, `password`, `address`, `suburb`, `state`, `postCode`, `profileLink`, `activated`) VALUES
(71, 'asd', 123456789, 'wenlu.zhang1@uqconnect.edu.a', '$2y$10$97bFTltSkvIDgbz2.2etG.CSbFKH.2gvkvROMSH.Q9frsIDIfr8xu', '123 Street', 'City', 'Tasmania', 4004, 'profile/profile1.png', 1),
(72, 'dfsds', 1234567890, 'wenlu.zhang1d@uqconnect.edu.au', '$2y$10$O.hWQDsDwgA6D7vbNKnsmOkM25g2Yitql5jMw5GsBXMi5h/0MrZve', '123 Street', 'City', 'Tasmania', 4004, 'profile/defaultProfileImage.png', 0),
(78, 'Iris', 123456789, 'wenlu.zhang1@uqconnect.edu', '$2y$10$R2lMbGXsVa/Uh3jEwqEvL.BsNahhdMsuPbnPXAFPF5icD7uDfwVd2', '123 Street', 'City', 'Tasmania', 4004, 'profile/defaultProfileImage.png', 1),
(79, 'Iris123', 2147483647, 'wenlu.zhang1@uqconnect.edu.au', '$2y$10$DsUZakX.rufFW6a/AGDGJOBkHVJvDzGrE9OUUFE.FDgnXZdJTd0yK', '123 Street', 'City', 'Queensland', 4004, 'profile/defaultProfileImage.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
