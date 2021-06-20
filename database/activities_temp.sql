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
-- Table structure for table `activities_temp`
--

CREATE TABLE `activities_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `activity_country` text NOT NULL,
  `activity_name` text NOT NULL,
  `activity_city` text NOT NULL,
  `activity_startdate` text NOT NULL,
  `activity_enddate` text NOT NULL,
  `activity_desc` text NOT NULL,
  `photos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities_temp`
--

INSERT INTO `activities_temp` (`id`, `user_id`, `resume_id`, `activity_country`, `activity_name`, `activity_city`, `activity_startdate`, `activity_enddate`, `activity_desc`, `photos`) VALUES
(1, 1, 26, 'Malaysia', 'Volunteerism in Zoo Negara with KPMG', 'Ampang', '2019-07-27', '2019-07-27', 'Joined as a volunteer to help in cleaning in Zoo Negara with KPMG.', 'zoo2.jpeg,zoo1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities_temp`
--
ALTER TABLE `activities_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities_temp`
--
ALTER TABLE `activities_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities_temp`
--
ALTER TABLE `activities_temp`
  ADD CONSTRAINT `activities_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `activities_temp_ibfk_2` FOREIGN KEY (`resume_id`) REFERENCES `template_temp` (`resume_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
