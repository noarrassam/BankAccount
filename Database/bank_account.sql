-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 11:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_account`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(30) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `fname`, `lname`, `address`, `phone_number`, `email`) VALUES
(5, 'Alex', 'Paul', 'Canada', 234423, 'example@john.ca'),
(6, 'Alex', 'Jack', 'Germany', 23423, 'example@jack.ca'),
(7, 'Jack', 'Edward', 'Netherlands', 45654, 'jack@gmail.com'),
(8, 'Sally', 'Does', 'US', 3345, 'sally@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `clients_account`
--

CREATE TABLE `clients_account` (
  `account_number` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `account_type` varchar(35) NOT NULL,
  `account_balance` double NOT NULL,
  `withdrawals` double NOT NULL,
  `deposits` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_account`
--

INSERT INTO `clients_account` (`account_number`, `client_id`, `account_type`, `account_balance`, `withdrawals`, `deposits`) VALUES
(4, 5, 'Saving', 20000, 100, 500),
(5, 6, 'saving', 20000, 100, 300),
(6, 7, 'checking', 3000, 60, 150),
(7, 8, 'saving', 10000, 200, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `clients_account`
--
ALTER TABLE `clients_account`
  ADD PRIMARY KEY (`account_number`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients_account`
--
ALTER TABLE `clients_account`
  MODIFY `account_number` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients_account`
--
ALTER TABLE `clients_account`
  ADD CONSTRAINT `clients_account_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
