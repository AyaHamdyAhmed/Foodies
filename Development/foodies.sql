-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 01:16 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(10) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `idUserType` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `userId`, `email`, `password`, `idUserType`) VALUES
(45, 'MMMmmm', 'ma@yahoo.com', 'MMmm@@12', 2),
(46, 'DDdd', 'mariam@yahoo.com', 'DDdd12@@', 1),
(47, 'Mariam', 'Mariam@yahoo.com', 'MMmm12@@', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `promotion` varchar(100) DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `location`, `phone`, `promotion`, `item`, `price`) VALUES
(15, 'notela', 'Cario', '01224720271', NULL, 'p , p2 , p3 , p4 , p5', '10 , 20 , 30 , 40 , 50'),
(16, 'Mariam', 'Giza', '01224720271', NULL, 'p , p2 ,  ,  , ', '10 , 20 ,  ,  , '),
(19, 'pizza', 'Alexandria', '01224720271', NULL, 'p , p2 , p3 , p4 , p5', '10 , 20 , 30 , 40 , 50'),
(20, 'Mariamm', 'Cario', '01224720271', NULL, 'p , p2 , p3 ,  , ', '5 , 20 , 30 ,  , '),
(25, 'new notala', 'Cario', '01224720271', 'take one free ', 'p ,  ,  ,  , ', '10 ,  ,  ,  , '),
(26, 'Ahash w malh', 'Giza', '01224720271', 'take one free ', 'p , p2 , p3 ,  , ', '10 , 20 , 30 ,  , '),
(30, 'notelaa', 'Cario', '01224720271', 'take one free ', 'p , p2 ,  ,  , ', '10 , 20 ,  ,  , '),
(31, 'dina farm', 'Giza', '01224720271', 'take one free ', 'p , p2 ,  ,  , ', '10 , 20 ,  ,  , '),
(32, 'zacks', 'Giza', '01224720271', 'take one free ', 'p , p2 ,  ,  , ', '10 , 20 ,  ,  , '),
(33, 'kfc', 'Giza', '01224720271', 'take one free ', 'p , p2 ,  ,  , ', '10 , 20 ,  ,  , '),
(34, 'mac', 'Giza', '01224720271', 'take one free ', 'p , p2 , p3 ,  , ', '10 , 20 , 30 ,  , '),
(35, 'papa', 'Giza', '01224720271', 'take one free ', 'p , p2 , p3 , p4 , p5', '10 , 20 , 30 , 40 , 50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `personID` int(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `numOfPoints` int(10) DEFAULT NULL,
  `numOfFreeOrders` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `personID`, `location`, `gender`, `numOfPoints`, `numOfFreeOrders`) VALUES
(33, 45, 'Alexandria', 'female', 0, 0),
(34, 47, 'Giza', 'Female', 38, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personID` (`personID`),
  ADD KEY `personID_2` (`personID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_person_id` FOREIGN KEY (`personID`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
