-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 10:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u488372807_passwordlocker`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` longtext NOT NULL,
  `token_valid` date NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gst_no` varchar(255) NOT NULL,
  `pan_number` varchar(255) NOT NULL,
  `organisation_name` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive','Delete') DEFAULT 'Active',
  `modified_time` datetime DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_type` enum('1','2','3','4','5') DEFAULT NULL COMMENT '1=super admin,2=admin,3=accounts, 4=accountant,5=support'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `token`, `token_valid`, `mobile`, `gst_no`, `pan_number`, `organisation_name`, `state_id`, `city_id`, `address`, `zipcode`, `mobile_no`, `fax`, `status`, `modified_time`, `added_date`, `updated_date`, `last_login`, `user_type`) VALUES
(1, 'Lokesh', 'Singh', 'lokesh@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '9838507000', 'KJHJVGKXBWD1WD521', 'KAVCC22E1CC6', 'Prabhu Accociates', 3, 1, 'New Delhi', 201301, '05122230021', NULL, 'Active', NULL, '2018-05-29 07:48:18', NULL, '2020-04-02 08:59:42', '3'),
(2, 'Super', 'Admin', 'admin@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '65544654654', 'SD54SDF4S', 'SD654GD4FG6', 'Super Admin', 3, 1, 'fklnnggjngj', 2, '5464646464', NULL, 'Active', NULL, '2018-05-29 07:53:17', NULL, '2020-04-02 09:45:27', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
