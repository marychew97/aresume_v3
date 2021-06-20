-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 11:51 AM
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
-- Database: `aresumefyptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `institution_temp`
--

CREATE TABLE `institution_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `institution` text NOT NULL,
  `studyarea` text NOT NULL,
  `edulevel` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `startdate` text NOT NULL,
  `enddate` text NOT NULL,
  `cgpa` float NOT NULL,
  `transcript` text NOT NULL,
  `certificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution_temp`
--

INSERT INTO `institution_temp` (`id`, `user_id`, `resume_id`, `institution`, `studyarea`, `edulevel`, `country`, `city`, `startdate`, `enddate`, `cgpa`, `transcript`, `certificate`) VALUES
(1, 1, 26, 'University Malaysia of Computer Science and Engineering', 'Software Engineering', 'Bachelor\'s Degree', 'Malaysia', 'Cyberjaya', '2017-04-24', 'Present', 3.84, 'UNIMY - Semester Result Slip (1).pdf', 'AResume Operation Manual.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `institution_temp`
--
ALTER TABLE `institution_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institution_temp`
--
ALTER TABLE `institution_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `institution_temp`
--
ALTER TABLE `institution_temp`
  ADD CONSTRAINT `institution_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `institution_temp_ibfk_2` FOREIGN KEY (`resume_id`) REFERENCES `template_temp` (`resume_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
