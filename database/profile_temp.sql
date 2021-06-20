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
-- Table structure for table `profile_temp`
--

CREATE TABLE `profile_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `job` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `location` text NOT NULL,
  `summary` text NOT NULL,
  `website` text NOT NULL,
  `linkedin` text NOT NULL,
  `github` text NOT NULL,
  `facebook` text NOT NULL,
  `profile_image` text NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_temp`
--

INSERT INTO `profile_temp` (`id`, `user_id`, `resume_id`, `name`, `job`, `email`, `phone`, `location`, `summary`, `website`, `linkedin`, `github`, `facebook`, `profile_image`, `video`) VALUES
(1, 1, 26, 'Mary Chew Jia Yi', 'Student', 'jiayi1172@gmail.com', '0167601013', 'Pusing, Perak, Malaysia', 'I\'m keen in learning programming and new technologies. I\'m interested in web development.', '', 'https://www.linkedin.com/in/mary-c-30316a9b/', 'https://github.com/marychew97', '', 'download.png', 'bigfoot1.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile_temp`
--
ALTER TABLE `profile_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile_temp`
--
ALTER TABLE `profile_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_temp`
--
ALTER TABLE `profile_temp`
  ADD CONSTRAINT `profile_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `profile_temp_ibfk_2` FOREIGN KEY (`resume_id`) REFERENCES `template_temp` (`resume_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
