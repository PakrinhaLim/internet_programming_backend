-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 09:25 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internet_programming`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_id` int(6) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `student_id`, `subject_id`, `grade`, `status_id`) VALUES
(1, 60023124, 2202, 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `major_id` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `major_id`, `address`, `created_at`, `updated_at`, `status_id`) VALUES
(1, '60023124', 'Pakrinha', 'Lim', '512112', 'University of Phayao', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-16 19:38:04', '2019-10-16 19:38:04', 1),
(3, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-17 09:35:03', '2019-10-17 09:35:03', 1),
(4, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-17 09:36:06', '2019-10-17 09:36:06', 1),
(5, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-17 09:47:01', '2019-10-17 09:47:01', 1),
(6, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-17 09:47:27', '2019-10-17 09:47:27', 1),
(7, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-17 10:01:55', '2019-10-17 10:01:55', 1),
(8, '60023125', 'hello', 'world', '1156', 'phayao', '2019-10-17 19:09:47', '2019-10-17 19:09:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
