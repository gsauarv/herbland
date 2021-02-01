-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2021 at 12:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herblandStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemOrder`
--

CREATE TABLE `itemOrder` (
  `orderId` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `itemPic` varchar(255) DEFAULT NULL,
  `itemQty` int(11) DEFAULT NULL,
  `itemPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemOrder`
--

INSERT INTO `itemOrder` (`orderId`, `userEmail`, `itemName`, `itemPic`, `itemQty`, `itemPrice`) VALUES
(92, NULL, 'Fern', '3.png', 10, 100),
(93, NULL, 'Fern', '3.png', 10, 100),
(94, 'raju@gmail.com', 'Fern', '3.png', 10, 100),
(95, 'raju@gmail.com', 'Fern', '3.png', 10, 100),
(96, NULL, 'Fern', '3.png', 10, 100),
(99, NULL, 'Fern', '3.png', 10, 100),
(100, NULL, 'Fern', '3.png', 100, 100),
(101, NULL, 'Fern', '3.png', 10, 100),
(103, NULL, 'Fern', '3.png', 100, 100),
(106, NULL, 'test3', '3.png', 10, 10),
(109, NULL, 'Fern', '3.png', 10, 100),
(112, NULL, 'test2', '2.png', 10, 10),
(116, NULL, 'Fern', '3.png', 10, 100),
(124, NULL, 'Fern', '3.png', 10, 100),
(126, NULL, 'Rose', '3.png', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `itemStore`
--

CREATE TABLE `itemStore` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `itemPrice` int(10) DEFAULT NULL,
  `itemType` varchar(20) DEFAULT NULL,
  `itemDesc` varchar(255) DEFAULT NULL,
  `itemPic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemStore`
--

INSERT INTO `itemStore` (`itemId`, `itemName`, `itemPrice`, `itemType`, `itemDesc`, `itemPic`) VALUES
(30, 'Fern', 100, 'Outdoor', 'This is the description of the outdoor plant fern.', '3.png'),
(31, 'Fern', 100, 'Indoor', 'hello', '1.png'),
(32, 'Avacoda', 122, 'Indoor', 'this is the desc', '1.png'),
(34, 'Avacoda', 12, 'Indoor', 'this is the desc', '3.png'),
(35, 'Test1', 100, 'Indoor', 'thos is a fedsscsd', '2.png'),
(36, 'test2', 1000, 'Outdoor', 'This is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a descThis is a desc', '1.png'),
(37, 'Fern', 1200, 'Outdoor', 'gffdgdfgd', '2.png'),
(38, 'Avacoda', 1500, 'Outdoor', 'kjkjkj', '1.png'),
(39, 'Fern', 1155, 'Outdoor', 'ffdfdf', '2.png'),
(40, 'Avacodo', 1500, 'Indoor', 'ffdfd', '1.png'),
(41, 'Avacoda', 100, 'Indoor', 'kkkjkj', '2.png'),
(42, 'Lily', 1500, 'Outdoor', 'This is the test .', 'purepng.com-bonsai-treenaturebonsaitree-961524678706soijt.png'),
(43, 'Bonsai ', 25000, 'Indoor', 'This is a bonsai tree 🌲', '5aec35a56554160a79be9fc1.png'),
(44, 'Maize plants', 250, 'Indoor', 'Test', '3-32232_indoor-plants-png-transparent-indoor-plant-png.png'),
(45, 'Rose', 10, 'Indoor', 'A rose is a woody perennial flowering plant of the genus Rosa, in the family Rosaceae, or the flower it bears. There are over three hundred species and tens of thousands of cultivars.', '3.png'),
(46, 'test2', 10, 'Indoor', 'hello', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userPassword` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `userEmail`, `userPassword`) VALUES
(15, 'Saurav', 'Ghimire', 'gh_saurav@gmail.com', '123'),
(20, 'Raju', 'Shrestha', 'raju@gmail.com', 'hello'),
(25, 'admin', 'admin', 'admin@admin.com', 'admin'),
(27, 'Saurav', 'Ghimire', 'gsaurav2000@gmail.com', 'hello'),
(29, 'Saurav', 'Ghimire', 'vitabinary@gmail.com', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemOrder`
--
ALTER TABLE `itemOrder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `itemStore`
--
ALTER TABLE `itemStore`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemOrder`
--
ALTER TABLE `itemOrder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `itemStore`
--
ALTER TABLE `itemStore`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
