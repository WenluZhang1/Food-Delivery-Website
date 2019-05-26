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
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `Rname` varchar(50) NOT NULL,
  `dishName` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(5) NOT NULL,
  `calories` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`Rname`, `dishName`, `description`, `price`, `calories`) VALUES
('Restaurant One', 'Chicken Wings', 'chicken Wings', 4, 30),
('Restaurant One', 'Fish Burger', 'pretium ipsum. Nulla justo lacus, volutpat et facilisis at, accumsan', 11, 1500),
('Restaurant One', 'Olive oil salad', 'Duis at pharetra velit. Pellentesque dapibus ultrices felis.', 12, 900),
('Restaurant Three', 'Chips', 'Cras bibendum, nunc sed auctor vulputate', 4, 1000),
('Restaurant Three', 'Lamb Curry', ' viverra metus. Sed id ligula tincidunt, posuere nisi vitae', 15, 1400),
('Restaurant Two', 'Chicken Pizza', 'Aenean volutpat diam at dapibus ullamcorper.', 18, 1800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`Rname`,`dishName`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
