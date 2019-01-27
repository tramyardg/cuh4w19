-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 09:59 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodinventory`
--

CREATE TABLE `foodinventory` (
  `foodid` int(11) NOT NULL,
  `categoryid` varchar(20) DEFAULT NULL,
  `foodname` varchar(60) NOT NULL,
  `actualQty` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodinventory`
--

INSERT INTO `foodinventory` (`foodid`, `categoryid`, `foodname`, `actualQty`) VALUES
  (2, 'dessert', 'Apple Sauce', 300),
  (3, 'meal', 'Beans', 450),
  (4, 'meal', 'Beef Stew', 250),
  (5, 'dessert', 'Apple Sauce', 300),
  (6, 'meal', 'Beans', 450),
  (7, 'meal', 'Beef Stew', 250),
  (8, 'drink', 'Boxed Milk', 400),
  (9, 'meal', 'Cereal', 600),
  (10, 'dessert', 'Apple Sauce', 300),
  (11, 'meal', 'Beans', 450),
  (12, 'meal', 'Beef Stew', 250),
  (13, 'drink', 'Boxed Milk', 400),
  (14, 'meal', 'Cereal', 600),
  (15, 'drink', 'Chicken', 500),
  (16, 'drink', 'Coffee', 375),
  (17, 'secondary', 'Condiments', 265),
  (18, 'dessert', 'Apple Sauce', 300),
  (19, 'meal', 'Beans', 450),
  (20, 'meal', 'Beef Stew', 250),
  (21, 'drink', 'Boxed Milk', 400),
  (22, 'meal', 'Cereal', 600),
  (23, 'drink', 'Chicken', 500),
  (24, 'drink', 'Coffee', 375),
  (25, 'secondary', 'Condiments', 265),
  (26, 'secondary', 'Crackers', 325),
  (27, 'drink', 'Evaporated Milk', 275),
  (28, 'meal', 'Mac and Cheese', 450),
  (29, 'meal', 'Manwich', 375),
  (30, 'dessert', 'Muffin Mix', 225),
  (31, 'meal', 'Oatmeal', 360),
  (32, 'meal', 'Pancake Mix', 175),
  (33, 'secondary', 'Pancake Syrup', 127),
  (34, 'meal', 'Pasta', 435),
  (35, 'secondary', 'Peanut Butter', 290),
  (36, 'meal', 'Rice', 430),
  (37, 'meal', 'Soup', 340),
  (38, 'secondary', 'Spaghetti Sauce', 190),
  (39, 'meal', 'Spam', 360),
  (40, 'meal', 'Tuna', 340);

-- --------------------------------------------------------

--
-- Table structure for table `foodrequest`
--

CREATE TABLE `foodrequest` (
  `requestid` int(11) NOT NULL,
  `userid` varchar(5) NOT NULL,
  `requestdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `food1` varchar(45) DEFAULT NULL,
  `food2` varchar(45) DEFAULT NULL,
  `food3` varchar(45) DEFAULT NULL,
  `food4` varchar(45) DEFAULT NULL,
  `food5` varchar(45) DEFAULT NULL,
  `food6` varchar(45) DEFAULT NULL,
  `food7` varchar(45) DEFAULT NULL,
  `food8` varchar(5) DEFAULT NULL,
  `pickupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivered` varchar(20) DEFAULT 'NOT DELIVERED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodrequest`
--

INSERT INTO `foodrequest` (`requestid`, `userid`, `requestdate`, `food1`, `food2`, `food3`, `food4`, `food5`, `food6`, `food7`, `food8`, `pickupdate`, `delivered`) VALUES
  (1, '21323', '2019-01-27 12:46:04', 'Apple Sauce', 'Beans', 'Beef Stew', 'Boxed Milk', 'Canned Fruit', NULL, NULL, NULL, '2019-01-27 12:46:04', 'NOT DELIVERED'),
  (2, '14323', '2019-01-27 13:34:29', 'Chicken', 'Evaporated Milk', 'Muffin Mix', 'Oatmeal', 'Pancake Mix', NULL, NULL, NULL, '2019-02-02 10:00:00', 'NOT DELIVERED'),
  (3, '33223', '2019-01-27 13:36:08', 'Beans', 'Cereal', 'Pasta', 'Rice', 'Spam', NULL, NULL, NULL, '2019-02-02 10:00:00', 'NOT DELIVERED'),
  (4, '24431', '2019-01-27 13:36:48', 'Apple Sauce', 'Boxed Milk', 'Mac and Cheese', 'Pancake Syrup', 'Rice', NULL, NULL, NULL, '2019-02-02 10:00:00', 'NOT DELIVERED'),
  (5, '53444', '2019-01-27 13:37:15', 'Crackers', 'Manwich', 'Pasta', 'Spaghetti Sauce', 'Spam', NULL, NULL, NULL, '2019-02-02 10:00:00', 'NOT DELIVERED'),
  (6, '15451', '2019-01-27 13:37:45', 'Beef Stew', 'Canned Fruit', 'Oatmeal', 'Pancake Mix', 'Peanut Butter', NULL, NULL, NULL, '2019-02-02 10:00:00', 'NOT DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `household_size` int(11) DEFAULT NULL,
  `fb_selected` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `user_id`, `full_name`, `household_size`, `fb_selected`) VALUES
  (1, '40294', 'David Austin', 5, '1002 Sherbrooke St W, Montreal, QC H3A 3L6'),
  (2, '47060', 'Alexander Hunold', 3, '1002 Sherbrooke St W, Montreal, QC H3A 3L6'),
  (3, '12124', 'Neena Kochhar', 2, '1002 Sherbrooke St W, Montreal, QC H3A 3L6'),
  (4, '88804', 'Lex De Haan', 4, '1490 Saint-Antoine St W, Montreal, QC H3C 1C3'),
  (5, '03222', 'Valli Pataballa', 3, '3875 St Urbain St, Montreal, QC H2W 1V1'),
  (6, '61459', 'Diana Dlorentz', 6, '1490 Saint-Antoine St W, Montreal, QC H3C 1C3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodinventory`
--
ALTER TABLE `foodinventory`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `foodrequest`
--
ALTER TABLE `foodrequest`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodinventory`
--
ALTER TABLE `foodinventory`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `foodrequest`
--
ALTER TABLE `foodrequest`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
