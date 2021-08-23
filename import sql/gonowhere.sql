-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 10, 2020 at 05:43 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gonowhere`
--

-- --------------------------------------------------------

--
-- Table structure for table `client-register`
--

CREATE TABLE `client-register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client-register`
--

INSERT INTO `client-register` (`id`, `username`, `password`, `email`, `phone`, `image`, `address`) VALUES
(9, 'abhiraj', '1111111', 'ab@gmail.com', '1111111111', 'service_provider.png', ',,5/244/29,Ichalkaranji,416115'),
(10, 'mayur', '1234567', 'mk@gmail.com', '1111111111', 'LOGO.png', ',,5/244/29,Ichalkaranji,416115'),
(13, 'lakshmikanth', '7fa8282ad93047a4d6fe6111c93b308a', 'lkgr892@gmail.com', '7559117767', 'LOGO.png', 'kolhapur'),
(14, 'John', '7fa8282ad93047a4d6fe6111c93b308a', 'john@gmail.com', '1234543211', 'avatar img.png', 'vjhdsfjh');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `cid`, `sid`, `comment`, `rating`) VALUES
(0, 13, 4, 'well done', 4);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `workdesc` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `accepted` varchar(10) DEFAULT 'pending',
  `newold` int(11) DEFAULT 1,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `cid`, `sid`, `workdesc`, `price`, `accepted`, `newold`, `date`) VALUES
(5, 7, 4, 'hello', 7777777, 'declined', 1, ''),
(14, 7, 4, 'you have to do carpaintary work,for two sofa', 33333, 'active', 1, ''),
(18, 13, 7, 'fuck off', 1000, 'completed', 1, ''),
(19, 13, 7, 'saad', 10000000, 'completed', 1, ''),
(20, 13, 7, 'please accept', 444, 'completed', 1, ''),
(21, 13, 4, 'modal', 5555, 'completed', 1, ''),
(22, 13, 7, 'wow', 1111, 'pending', 1, ''),
(23, 13, 4, 'hello', 3333, 'completed', 1, ''),
(24, 13, 4, 'mayur', 33334, 'completed', 1, ''),
(25, 13, 4, 'hjofjsd', 9999, 'completed', 1, ''),
(26, 13, 4, 'eee', 555, 'completed', 1, ''),
(27, 13, 4, 'smily', 11111, 'completed', 1, ''),
(28, 13, 4, 'try', 3343, 'completed', 1, ''),
(29, 13, 11, 'please accept', 11111, 'active', 1, ''),
(30, 14, 11, 'Table Fixing', 800, 'completed', 1, ''),
(32, 14, 11, 'you have to do carpaintary work,for two sofa', 222, 'pending', 1, '2020-01-18'),
(38, 14, 11, 'hello', 3242, 'pending', 1, '2020-01-18'),
(39, 14, 11, 'change', 2323, 'active', 1, '2020-01-24'),
(40, 13, 11, 'santosh', 333, 'active', 1, '2020-01-24'),
(41, 13, 11, 'please accept', 2222, 'active', 1, '2020-01-23'),
(42, 13, 11, 'please accept', 2222, 'active', 1, '2020-01-23'),
(43, 13, 11, 'please accept', 2222, 'active', 1, '2020-01-23'),
(44, 13, 11, 'you have to do carpaintary work,for two sofa', 2222, 'active', 1, '2020-01-22'),
(45, 13, 11, 'wow', 333, 'active', 1, '2020-01-23'),
(50, 13, 11, 'wow', 5454, 'active', 1, '2020-01-24'),
(52, 13, 11, 'you have to do carpaintary work,for two sofa', 1111, 'completed', 1, '2020-01-28'),
(53, 13, 11, 'you have to do carpaintary work,for two sofa', 333, 'active', 1, '2020-01-24'),
(54, 13, 11, 'you have to do carpaintary work,for two sofa', 1223, 'completed', 1, '2020-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `service-provider`
--

CREATE TABLE `service-provider` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `work` varchar(30) NOT NULL,
  `loaclity` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `rating` float NOT NULL,
  `serviceprovided` int(11) NOT NULL,
  `hourly-wage` int(11) NOT NULL,
  `admin-check` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service-provider`
--

INSERT INTO `service-provider` (`name`, `email`, `password`, `phone`, `work`, `loaclity`, `id`, `image`, `rating`, `serviceprovided`, `hourly-wage`, `admin-check`) VALUES
('lakshmikanth', 'lkgr892@gmail.com', '7fa8282ad93047a4d6fe6111c93b308a', '7559117767', 'painter', 'kolhapur', 11, 'image1.jpg', 155, 0, 300, 1),
('lakshmikanth', 'lkgr8@gmail.com', '7fa8282ad93047a4d6fe6111c93b308a', '7559117767', 'carpainter', 'kolhapur', 15, 'image1.jpg', 5, 0, 300, 1),
('bhamange', 'mk@gmail.com', '79d886010186eb60e3611cd4a5d0bcae', '7559117767', 'carpainter', 'Ichalkaranji', 16, 'appliance2.jpg', 7, 0, 1000, 1),
('bhamange', '11@gmail.com', '79d886010186eb60e3611cd4a5d0bcae', '7559117767', 'Driver', 'Ichalkaranji', 17, 'appliance2.jpg', 7, 0, 1000, 0),
('sdf', 'parthbhosale01@gmail.com', 'bdb889ac0f9e13c2bfc915d54c1c2c68', '7559117767', 'Electrician', 'kolhapur', 18, 'appliance1.jpg', 0, 0, 200, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client-register`
--
ALTER TABLE `client-register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service-provider`
--
ALTER TABLE `service-provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client-register`
--
ALTER TABLE `client-register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `service-provider`
--
ALTER TABLE `service-provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
