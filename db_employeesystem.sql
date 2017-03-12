-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2017 at 12:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_employeesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `prof_img` text,
  `date_of_join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `full_name`, `email`, `designation`, `status`, `prof_img`, `date_of_join`) VALUES
(1, 'taylor otwell', 'taylor@lara.com', 'developer', 0, 'uploads/8622092f0e.png', '2017-03-11 11:30:33'),
(6, 'steve smith', 'steve@gmail.com', 'asdf', 0, 'uploads/b10de1903f.png', '2017-03-11 11:51:07'),
(7, 'sarah taylor', 'sarah@anc.com', 'asdf', 0, 'uploads/fd5e016197.png', '2017-03-11 11:51:33'),
(8, 'martin guptil', 'guptil@abc.cim', 'asdf', 1, 'uploads/e5e5c07889.png', '2017-03-11 11:52:41'),
(9, 'dave warner', 'warner@acs.co', 'sadf', 0, 'uploads/eb4c50593c.png', '2017-03-11 11:53:14'),
(10, 'john hastings', 'has@ac.c', 'asdf', 0, 'uploads/478621ab44.png', '2017-03-11 11:54:19'),
(11, 'sdf', 'rea@asd.cs', 'sd', 0, 'uploads/f19b7d5fc1.png', '2017-03-11 11:54:38'),
(12, 'maria sharapova', 'maria@sh.c', 're', 1, 'uploads/f80b70ad51.png', '2017-03-11 11:55:26'),
(14, 'cirsten stuart', 'cirsten@ads.c', 'asdf', 0, 'uploads/663bd8a560.png', '2017-03-11 11:56:12'),
(16, 'chris smith', 'asdf@lcd.c', 'sadf', 0, 'uploads/35600cad3a.png', '2017-03-11 11:58:08'),
(17, 'dds ffs', 'df@fd.c', 'asasd', 1, 'uploads/86c0de0069.png', '2017-03-11 11:59:36'),
(19, 'abc xyz', 'abc@abc.co', 'sadf', 0, 'uploads/a7b3b1e121.png', '2017-03-11 12:53:30'),
(20, 'tahmidur rahman', 'tahmidrana@gmail.com', 'developer', 1, 'uploads/0856760628.png', '2017-03-11 12:54:08'),
(21, 'mr abc', 'sd@f.c', 'fds', 1, 'uploads/c15c97cae9.png', '2017-03-11 12:57:56'),
(22, 'tah mid', 'mid@abc.co', 'designer', 0, 'uploads/c6074e56ac.png', '2017-03-11 13:01:03'),
(23, 'john wick', 'john@asd.c', 'asdf', 0, NULL, '2017-03-12 17:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `prof_img` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `name`, `phone`, `prof_img`, `status`) VALUES
(1, 'Tahmidur Rahman', '01676470847', 'abc/abc/pic.jpg', 0),
(2, 'asdf', '33', 'abcdef.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
