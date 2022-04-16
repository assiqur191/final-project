-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 11:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dob` datetime NOT NULL,
  `phone` int(14) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `firstname`, `lastname`, `gender`, `email`, `dob`, `phone`, `username`, `password`) VALUES
(37, 'ASSIQUR', 'RAHMAN', 'f', 'rahmanmdassiqur@gmail.com', '1989-02-12 00:00:00', 1611559810, 'u1', '123'),
(40, 'ASSIQUR', 'RAHMAN', 'f', 'rahmanmdassiqur@gmail.com', '1998-02-14 00:00:00', 1611559810, 'y3', '123'),
(41, 'ASSIQUR', 'RAHMAN', 'm', 'rahmanmdassiqur@gmail.com', '1989-01-12 00:00:00', 1611559810, 'oo', '123'),
(42, 'ASSIQUR', 'RAHMAN', 'm', 'rahmanmdassiqur@gmail.com', '1989-03-06 00:00:00', 1611559810, 'u4', '123'),
(43, 'ASSIQUR', 'RAHMAN', 'm', 'rahmanmdassiqur@gmail.com', '1999-02-02 00:00:00', 1611559810, 'u5', '123'),
(44, 'ASSIQUR', 'RAHMAN', 'm', 'rahmanmdassiqur@gmail.com', '1999-02-02 00:00:00', 1611559810, 'u6', '123'),
(45, 'ASSIQUR', 'RAHMAN', 'm', 'rahmanmdassiqur@gmail.com', '1999-02-03 00:00:00', 1611559810, 'gg9', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
