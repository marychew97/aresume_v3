-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 11:50 AM
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
-- Table structure for table `work_temp`
--

CREATE TABLE `work_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `company` text NOT NULL,
  `position` text NOT NULL,
  `work_country` text NOT NULL,
  `work_city` text NOT NULL,
  `work_startdate` text NOT NULL,
  `work_enddate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_temp`
--

INSERT INTO `work_temp` (`id`, `user_id`, `resume_id`, `company`, `position`, `work_country`, `work_city`, `work_startdate`, `work_enddate`) VALUES
(1, 1, 26, 'TriveAcademy Sdn. Bhd.', 'Junior Software Engineer', 'Malaysia', 'Puchong', '2019-03-18', '2019-08-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `work_temp`
--
ALTER TABLE `work_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `work_temp`
--
ALTER TABLE `work_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work_temp`
--
ALTER TABLE `work_temp`
  ADD CONSTRAINT `work_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `work_temp_ibfk_2` FOREIGN KEY (`resume_id`) REFERENCES `template_temp` (`resume_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
