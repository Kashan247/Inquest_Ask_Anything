-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 12:02 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inquest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_Id` int(11) NOT NULL,
  `A_Name` varchar(50) NOT NULL,
  `A_UserName` varchar(50) NOT NULL,
  `A_Password` varchar(50) NOT NULL,
  `A_Cnic` int(11) NOT NULL,
  `A_Dof` date NOT NULL,
  `A_Gender` varchar(50) NOT NULL,
  `A_Contact` int(11) NOT NULL,
  `A_Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_Id`, `A_Name`, `A_UserName`, `A_Password`, `A_Cnic`, `A_Dof`, `A_Gender`, `A_Contact`, `A_Email`) VALUES
(1, 'Kashan', 'Admin123', 'Admin12345', 2147483647, '2020-07-06', 'Male', 2147483647, 'kashan@gmail.com'),
(2, 'Khulaid', 'Admin', 'Admin12345', 2147483647, '1998-01-11', 'Male', 2147483647, 'Khulaid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cate_Id` int(11) NOT NULL,
  `Cate_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cate_Id`, `Cate_Name`) VALUES
(2, ' Programming'),
(3, 'Food'),
(4, 'Mobiles'),
(6, 'Electronic'),
(8, 'Science'),
(9, 'Physics'),
(10, 'Animals');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Com_Id` int(11) NOT NULL,
  `PA_Id` int(11) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `Com_Like` varchar(250) NOT NULL,
  `Com_Comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_Id` int(11) NOT NULL,
  `U_Id` int(11) DEFAULT NULL,
  `F_Massage` varchar(10000) NOT NULL,
  `F_DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`F_Id`, `U_Id`, `F_Massage`, `F_DateTime`) VALUES
(1, 8, 'good', '2020-06-30 00:00:00'),
(2, 7, 'good keep it up', '2020-07-08 00:00:00'),
(3, 7, 'This is checking', '2020-07-07 00:00:00'),
(6, 8, 'demo feedback please check', '2011-07-20 02:09:05'),
(7, 7, 'demo', '2011-07-20 02:41:31'),
(9, 7, 'Never Give Up..', '2011-07-20 04:56:54'),
(11, 13, 'shup', '2011-07-20 05:14:59'),
(12, 7, 'checking feedback', '2012-07-20 12:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `postanswer`
--

CREATE TABLE `postanswer` (
  `PA_Id` int(11) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `PA_Answer` varchar(250) NOT NULL,
  `PA_DateTime` datetime NOT NULL,
  `PQ_Id` int(11) NOT NULL,
  `PA_Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postanswer`
--

INSERT INTO `postanswer` (`PA_Id`, `U_Id`, `PA_Answer`, `PA_DateTime`, `PQ_Id`, `PA_Status`) VALUES
(5, 7, 'prince chocolate and rio different categories', '2020-07-03 00:00:00', 3, 'Related'),
(7, 8, 'done ok', '2020-07-07 00:00:00', 4, 'Related'),
(13, 8, 'kashan', '2009-07-20 07:25:37', 5, 'Related'),
(14, 8, 'kashan', '2009-07-20 07:35:45', 5, 'Approved'),
(21, 7, 'specifications', '2011-07-20 10:17:30', 4, 'Related'),
(22, 7, 'specifications', '2011-07-20 10:17:44', 4, 'Related'),
(23, 7, 'Moto E4 specification Processor 1.3GHz quad-core, Processor make MediaTek MT6737M, RAM 2GB, Internal storage	16GB', '2011-07-20 10:21:23', 4, 'Related'),
(24, 7, 'Moto E4 specification Processor 1.3GHz quad-core, Processor make MediaTek MT6737M, RAM 2GB, Internal storage	16GB', '2011-07-20 10:21:39', 4, 'Approved'),
(25, 8, 'Go to Youtube and watch tutorial.', '2011-07-20 05:17:05', 32, 'Related'),
(28, 8, 'demo12344', '2012-07-20 10:56:00', 3, 'Not Related'),
(29, 7, 'demo1234', '2012-07-20 02:35:37', 3, ''),
(30, 7, 'kal submit karwana hai..', '2012-07-20 02:36:58', 3, ''),
(31, 8, 'The Prince has a chocolate cream and the Rio has a multiple creams.', '2012-07-20 07:03:07', 3, ''),
(32, 8, 'fsdfsdf', '2013-07-20 10:37:23', 28, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `postquestion`
--

CREATE TABLE `postquestion` (
  `PQ_Id` int(11) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `PQ_Questions` varchar(50) NOT NULL,
  `PQ_DateTime` datetime NOT NULL,
  `Cate_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postquestion`
--

INSERT INTO `postquestion` (`PQ_Id`, `U_Id`, `PQ_Questions`, `PQ_DateTime`, `Cate_Id`) VALUES
(3, 7, 'Difference between Prince and Rio', '2020-06-30 00:00:00', 2),
(4, 8, 'Specification in Moto E4', '2020-07-15 00:00:00', 4),
(5, 8, 'what is your name?', '2020-07-05 00:00:00', 4),
(6, 9, 'Which food do you like?', '2020-07-04 00:00:00', 3),
(7, 8, 'abc', '2020-07-06 00:00:00', 3),
(28, 8, 'ddxdrfcf', '2007-07-20 11:11:27', 2),
(29, 8, 'ddxdrfcf', '2007-07-20 11:22:12', 2),
(30, 8, 'jnjhbjhb', '2007-07-20 11:22:40', 4),
(31, 7, 'jhassabckdsjbc', '2007-07-20 11:24:11', 6),
(32, 13, 'How can I hack NASA with the help of HTML?', '2011-07-20 05:13:39', 2),
(33, 8, 'hello', '2012-07-20 08:49:45', 2),
(34, 8, 'demo123456', '2012-07-20 11:38:37', 7),
(35, 8, 'Specification Moto E5?', '2012-07-20 06:53:08', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userinterest`
--

CREATE TABLE `userinterest` (
  `UI_Id` int(11) NOT NULL,
  `U_Id` int(250) DEFAULT NULL,
  `Cate_Id` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinterest`
--

INSERT INTO `userinterest` (`UI_Id`, `U_Id`, `Cate_Id`) VALUES
(3, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_Id` int(11) NOT NULL,
  `U_Name` varchar(50) NOT NULL,
  `U_FName` varchar(50) NOT NULL,
  `U_UserName` varchar(50) NOT NULL,
  `U_Email` varchar(50) NOT NULL,
  `U_Gender` varchar(50) NOT NULL,
  `U_DOB` date NOT NULL,
  `U_Contact` int(11) NOT NULL,
  `U_Image` blob NOT NULL,
  `U_PostalCode` varchar(50) NOT NULL,
  `U_State` varchar(50) NOT NULL,
  `U_City` varchar(50) NOT NULL,
  `U_Country` varchar(50) NOT NULL,
  `U_Password` varchar(50) NOT NULL,
  `U_Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_Id`, `U_Name`, `U_FName`, `U_UserName`, `U_Email`, `U_Gender`, `U_DOB`, `U_Contact`, `U_Image`, `U_PostalCode`, `U_State`, `U_City`, `U_Country`, `U_Password`, `U_Status`) VALUES
(7, 'Haris', 'Khan', 'Haris123', 'haris@gmail.com', 'Male', '2020-06-09', 2147483647, 0x6572726f722e504e47, '123434', 'Sindh', 'Karachi', 'Pakistan', 'Haris12345', 'active'),
(8, 'Sania', 'Khan', 'Sania123', 'sania@gmail.com', 'Female', '2020-07-08', 2147483647, 0x64656d6f2e6a7067, '232343', 'Sindh', 'Karachi', 'Pakistan', 'sania12345', 'active'),
(9, 'Kahsan', 'Khan', 'Kashan123', 'sdvs@gmail.com', 'Male', '2020-07-01', 234354, 0x436170747572652e504e47, '123434', 'sindh', 'karachi', 'Pakistan', 'Kashan12345', 'Actice'),
(11, 'Sadaf', 'Sadaf', 'SadafKhan', 'sdvs@gmail.com', 'Female', '1997-07-07', 353464564, 0x53616461662e6a7067, '123434', 'Sindh', 'Karachi', 'Pakistan', 'sadaf12345', 'active'),
(12, 'Nadir', 'Ali', 'nigga', 'nadir@gmail.com', 'Female', '1995-02-13', 34534534, 0x436170747572652e504e47, '123434', 'Sindh', 'Karachi', 'Pakistan', 'asd', 'active'),
(13, 'Khizar', 'Ali', 'KhizarAli', 'khizar@gmail.com', 'Male', '1999-07-09', 344545656, 0x6b68692e6a7067, '223234', 'Sindh', 'Karachi', 'Pakistan', 'khizar123', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cate_Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Com_Id`),
  ADD KEY `fk_postanswer` (`PA_Id`),
  ADD KEY `fk_users` (`U_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_Id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `postanswer`
--
ALTER TABLE `postanswer`
  ADD PRIMARY KEY (`PA_Id`),
  ADD KEY `fk_users` (`U_Id`),
  ADD KEY `fk_postquestion` (`PQ_Id`);

--
-- Indexes for table `postquestion`
--
ALTER TABLE `postquestion`
  ADD PRIMARY KEY (`PQ_Id`),
  ADD KEY `fk_category` (`Cate_Id`),
  ADD KEY `fk_users` (`U_Id`);

--
-- Indexes for table `userinterest`
--
ALTER TABLE `userinterest`
  ADD PRIMARY KEY (`UI_Id`),
  ADD KEY `fk_User` (`U_Id`),
  ADD KEY `fk_Category` (`Cate_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cate_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Com_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `postanswer`
--
ALTER TABLE `postanswer`
  MODIFY `PA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `postquestion`
--
ALTER TABLE `postquestion`
  MODIFY `PQ_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `userinterest`
--
ALTER TABLE `userinterest`
  MODIFY `UI_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userinterest`
--
ALTER TABLE `userinterest`
  ADD CONSTRAINT `fk_Category` FOREIGN KEY (`Cate_Id`) REFERENCES `category` (`Cate_Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_User` FOREIGN KEY (`U_Id`) REFERENCES `users` (`U_Id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
