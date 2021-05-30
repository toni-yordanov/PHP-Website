-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: studmysql01.fhict.local
-- Generation Time: May 31, 2021 at 12:13 AM
-- Server version: 5.7.26-log
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbi450402`
--

-- --------------------------------------------------------

--
-- Table structure for table `deleted_user`
--

CREATE TABLE `deleted_user` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_nr` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rights` enum('USER','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deleted_user`
--

INSERT INTO `deleted_user` (`id`, `first_name`, `last_name`, `email`, `phone_nr`, `password`, `rights`) VALUES
(11, 'john', 'smith', 'js@gmail.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'USER'),
(12, 'user', 'user', 'user@gmail.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'USER'),
(18, 'Mark', 'John', 'sl@gmail.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'USER'),
(20, 'Alex', 'Alex', 'ax@ax.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float(10,2) NOT NULL,
  `description` text,
  `material` varchar(20) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `name`, `price`, `description`, `material`, `category`, `file_name`, `deleted`) VALUES
(1, 'Table', 420.00, 'Averynicetable', 'Wood', 'Bedroom', '', 0),
(2, 'Table', 420.00, 'A very nice table', 'Wood', 'Garden', '', 0),
(3, 'Table', 420.00, 'A very nice table', 'Wood', 'Kitchen', '', 0),
(4, 'chair', 123.00, 'a grey chair', 'Metal', 'Kitchen', '', 0),
(6, 'chair', 10.00, 'it is a chair', 'Pladtic', 'Kitchen', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(16, 'asd', '421e87d97dbbe384', '$2y$10$1k3e6LB9cDQCHaefWW2l7u9rY/ppYEYRgxuuRd584MXINr1H5gev.', '1621790200');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_nr` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rights` enum('USER','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone_nr`, `password`, `rights`) VALUES
(22, 'Asd', 'As', 'as@gmail.com', '06123463856', 'b640dd6bf65d61bfad404c17364e7803', 'USER'),
(23, 'Asd', 'Asd', 'adfs@gmail.com', '04012345678', 'ab8a563f7abc15bbb11d0e785924cae7', 'USER'),
(24, 'Daniel', 'Mac', 'MdC@gmail.com', '0770513478', '1cb3223c5b0532960f2e759aa68dc560', 'USER'),
(25, 'Mark', 'Jhones', 'mkj23@yahoo.com', '0450513478', '41a271cb34c209f62cb1e2147b18f65d', 'USER'),
(26, 'Cristian', 'Smith', 'css22s@gmail.com', '06728282828', '7372d9dd55e09af705bae2534a913567', 'USER'),
(27, 'Klim', 'McKenna', 'mckK@yahoo.com', '0692928562', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(28, 'Dan', 'White', 'whd52@hotmail.com', '0682923485', 'ed6b562a2a43a5e0b676681ff00f9532', 'ADMIN'),
(29, 'Andrej', 'Smith', 'asdafs@afdas.s', '0619859125', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(30, 'Andrej', 'Smith', 'asdasfs@afdas.s', '0619859125', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(31, 'Andrej', 'Smith', 'asdaffsfs@afdas.s', '0619859125', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(32, 'ASDads', 'ASDdgs', 'Aasda2@asda.com', '0622945784', 'a0445cda5eac3bf5092473cafe989ca5', 'USER'),
(33, 'Hgs', 'Hgs', 'hsg@hsg.com', '0642339234', '94f8b88f826c86b1551ae1ba196afb6e', 'USER'),
(34, 'Mark', 'Asdasd', 'asd@asdasda.casd', '0698239290', '94f8b88f826c86b1551ae1ba196afb6e', 'USER'),
(35, 'Mark', 'John', 'asdfja@apsopf.com', '0618828282', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(36, 'Mark', 'John', 'asfdfja@apsopf.com', '0618828282', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(37, 'Mark', 'John', 'asssssfdfja@apsopf.com', '0618828282', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(38, 'Mark', 'John', 'asssxsssfdfja@apsopf.com', '0618828282', 'f4fd2772b90a40c5f789e22518033ac0', 'USER'),
(39, 'Fasdas', 'Gasdas', 'gasd23@asd.com', '0770513478', '94f8b88f826c86b1551ae1ba196afb6e', 'USER'),
(40, 'Fasdas', 'Gasdas', 'gasddd23@asd.com', '0770513478', '94f8b88f826c86b1551ae1ba196afb6e', 'USER'),
(41, 'Fasd', 'Gasda', 'gasd3@asda.com', '06828283242', '94f8b88f826c86b1551ae1ba196afb6e', 'USER'),
(42, 'Asd', 'Ada', 'asd@asd.cs', '04012345678', '94f8b88f826c86b1551ae1ba196afb6e', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deleted_user`
--
ALTER TABLE `deleted_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deleted_user`
--
ALTER TABLE `deleted_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
