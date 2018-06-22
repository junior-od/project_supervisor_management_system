-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 03:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supervisor_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_junior_od`
--

CREATE TABLE `appointment_junior_od` (
  `id` int(3) UNSIGNED NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `appointment_date` varchar(30) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_schedule_junior_od`
--

CREATE TABLE `appointment_schedule_junior_od` (
  `id` int(3) UNSIGNED NOT NULL,
  `days` varchar(30) NOT NULL,
  `from_time` varchar(30) DEFAULT NULL,
  `to_time` varchar(30) DEFAULT NULL,
  `max_num_students_per_day` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_schedule_junior_od`
--

INSERT INTO `appointment_schedule_junior_od` (`id`, `days`, `from_time`, `to_time`, `max_num_students_per_day`) VALUES
(1, 'sunday', '10:00', '13:00', 3),
(2, 'monday', '', '', 0),
(3, 'tuesday', '12:00', '18:00', 4),
(4, 'wednesday', '', '', 0),
(5, 'thursday', '09:00', '12:00', 2),
(6, 'friday', '09:00', '10:00', 1),
(7, 'saturday', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_junior_od`
--

CREATE TABLE `message_junior_od` (
  `id` int(9) UNSIGNED NOT NULL,
  `sender` varchar(60) NOT NULL,
  `receiver` varchar(60) NOT NULL,
  `message` varchar(500) NOT NULL,
  `opened` enum('0','1') NOT NULL,
  `sender_delete` enum('0','1') NOT NULL,
  `receiver_delete` enum('0','1') NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_junior_od`
--

INSERT INTO `message_junior_od` (`id`, `sender`, `receiver`, `message`, `opened`, `sender_delete`, `receiver_delete`, `time_sent`) VALUES
(1, 'junior oduberu', 'ayo adesina', 'yo yo yo', '1', '0', '0', '2018-04-21 01:29:02'),
(2, 'junior oduberu', 'opeyemi', 'whats up?', '1', '0', '0', '2018-04-21 01:29:16'),
(3, 'junior oduberu', 'opeyemi', 'whats up?', '1', '0', '0', '2018-04-21 01:30:27'),
(4, 'opeyemi', 'junior oduberu', 'fhjksd', '1', '0', '0', '2018-04-21 22:16:44'),
(5, 'opeyemi', 'junior oduberu', 'yees yes', '1', '0', '0', '2018-04-21 22:16:44'),
(6, 'opeyemi', 'junior oduberu', 'hey you', '1', '0', '0', '2018-04-21 22:16:44'),
(7, 'ayo adesina', 'junior oduberu', 'sup boy', '1', '0', '0', '2018-04-21 03:32:18'),
(8, 'ayo adesina', 'junior oduberu', 'hey boy', '1', '0', '0', '2018-04-21 03:34:06'),
(9, 'junior oduberu', 'ayo adesina', 'yo', '1', '0', '0', '2018-04-21 03:59:05'),
(10, 'junior oduberu', 'ayo adesina', 'im sooryy mehn no time', '1', '0', '0', '2018-04-21 03:59:21'),
(11, 'ayo adesina', 'junior oduberu', 'hi', '1', '0', '0', '2018-04-21 04:01:37'),
(12, 'tola lawal', 'junior oduberu', 'sup', '1', '0', '0', '2018-04-21 04:04:17'),
(13, 'tola lawal', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-21 13:36:49'),
(14, 'junior oduberu', 'tola lawal', 'sorry man', '1', '0', '0', '2018-04-21 13:40:19'),
(15, 'opeyemi', 'junior oduberu', 'sup man', '1', '0', '0', '2018-04-21 22:16:44'),
(16, 'opeyemi', 'junior oduberu', 'jkdjkdkjw', '1', '0', '0', '2018-04-21 22:16:45'),
(19, 'junior oduberu', 'opeyemi', 'gsdhjgdsjh', '1', '0', '0', '2018-04-21 22:28:10'),
(20, 'tomide aina', 'junior oduberu', 'bhjbdsjfsdb', '1', '0', '0', '2018-04-21 22:36:33'),
(21, 'tola lawal', 'junior oduberu', 'i want to see you sir', '1', '0', '0', '2018-04-21 22:39:26'),
(22, 'tola lawal', 'junior oduberu', 'i want to see you', '1', '0', '0', '2018-04-21 22:44:00'),
(23, 'junior oduberu', 'tola lawal', 'no vex my g', '1', '0', '0', '2018-04-22 00:19:25'),
(24, 'junior oduberu', 'tomide aina', 'whats up', '0', '0', '0', '2018-04-22 00:59:43'),
(25, 'junior oduberu', 'tomide aina', 'how are you doing boy?', '0', '0', '0', '2018-04-22 01:00:07'),
(26, 'junior oduberu', 'tomide aina', 'call me', '0', '0', '0', '2018-04-22 01:00:36'),
(27, 'junior oduberu', 'opeyemi', 'how far loser pay guy', '1', '0', '0', '2018-04-22 01:01:02'),
(28, 'junior oduberu', 'opeyemi', 'let me tell you a story of a boy who walked the streest of bariga so he died the end', '1', '0', '0', '2018-04-22 01:02:06'),
(29, 'junior oduberu', 'ayo adesina', 'how far now', '1', '0', '0', '2018-04-22 01:04:54'),
(30, 'opeyemi', 'junior oduberu', 'please', '1', '0', '0', '2018-04-22 01:09:10'),
(31, 'opeyemi', 'junior oduberu', 'fhg', '1', '0', '0', '2018-04-22 01:09:34'),
(32, 'opeyemi', 'junior oduberu', 'yes', '1', '0', '0', '2018-04-22 01:10:19'),
(33, 'tomide aina', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-22 01:22:50'),
(34, 'junior oduberu', 'tomide aina', 'whats good my g', '0', '0', '0', '2018-04-22 01:23:59'),
(35, 'ayo adesina', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-22 03:01:22'),
(36, 'ayo adesina', 'junior oduberu', 'whats good', '1', '0', '0', '2018-04-22 03:01:35'),
(37, 'junior oduberu', 'ayo adesina', 'im alright,just preparing for exams here!!', '1', '0', '0', '2018-04-22 03:02:29'),
(38, 'ayo adesina', 'junior oduberu', 'cool cool, All the best!!', '1', '0', '0', '2018-04-22 03:03:09'),
(39, 'junior oduberu', 'ayo adesina', 'thanks g', '1', '0', '0', '2018-04-22 03:03:33'),
(40, 'opeyemi', 'junior oduberu', 'guy i wan see you', '1', '0', '0', '2018-04-22 03:04:21'),
(41, 'tola lawal', 'junior oduberu', 'abeg now', '1', '0', '0', '2018-04-22 03:05:00'),
(42, 'opeyemi', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-22 17:03:38'),
(43, 'opeyemi', 'junior oduberu', 'sup', '1', '0', '0', '2018-04-22 21:12:58'),
(44, 'opeyemi', 'junior oduberu', 'jbjfd', '1', '0', '0', '2018-04-22 21:13:34'),
(45, 'opeyemi', 'junior oduberu', 'cgvgvs', '1', '0', '0', '2018-04-22 21:41:27'),
(46, 'opeyemi', 'junior oduberu', 'cgvgvs', '1', '0', '0', '2018-04-22 21:41:27'),
(47, 'opeyemi', 'junior oduberu', 'cgvgvs', '1', '0', '0', '2018-04-22 21:47:38'),
(48, 'opeyemi', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-22 21:48:15'),
(49, 'opeyemi', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-22 21:48:15'),
(50, 'opeyemi', 'junior oduberu', 'yo', '1', '0', '0', '2018-04-22 21:49:06'),
(51, 'opeyemi', 'junior oduberu', 'yo', '1', '0', '0', '2018-04-22 21:49:06'),
(52, 'opeyemi', 'junior oduberu', 'whats up', '1', '0', '0', '2018-04-22 21:50:05'),
(53, 'opeyemi', 'junior oduberu', 'kjdhkjsdhjk', '1', '0', '0', '2018-04-22 21:51:19'),
(54, 'opeyemi', 'junior oduberu', 'sup', '1', '0', '0', '2018-04-22 22:00:26'),
(55, 'opeyemi', 'junior oduberu', 'hi', '1', '0', '0', '2018-04-22 22:02:36'),
(56, 'opeyemi', 'junior oduberu', 'hey', '1', '0', '0', '2018-04-22 22:02:43'),
(57, 'opeyemi', 'junior oduberu', 'kik', '1', '0', '0', '2018-04-22 22:02:49'),
(58, 'opeyemi', 'junior oduberu', 'whats up', '1', '0', '0', '2018-04-22 22:03:15'),
(59, 'opeyemi', 'junior oduberu', 'hello', '1', '0', '0', '2018-04-22 22:03:21'),
(61, 'ayo adesina', 'junior oduberu', 'yo', '1', '0', '0', '2018-04-22 22:18:45'),
(62, 'ayo adesina', 'junior oduberu', 'no', '1', '0', '0', '2018-04-22 22:53:42'),
(63, 'ayo adesina', 'junior oduberu', 'yo', '1', '0', '0', '2018-04-22 22:56:40'),
(64, 'ayo adesina', 'junior oduberu', 'jh', '1', '0', '0', '2018-04-22 23:03:16'),
(65, 'ayo adesina', 'junior oduberu', 'yo', '1', '0', '0', '2018-04-22 23:16:13'),
(66, 'ayo adesina', 'junior oduberu', 'hey', '1', '0', '0', '2018-04-22 23:17:32'),
(67, 'ayo adesina', 'junior oduberu', 'hey', '1', '0', '0', '2018-04-22 23:23:43'),
(68, 'ayo adesina', 'junior oduberu', 'y', '1', '0', '0', '2018-04-22 23:25:54'),
(69, 'ayo adesina', 'junior oduberu', 'hi', '1', '0', '0', '2018-04-22 23:29:06'),
(70, 'junior oduberu', 'ayo adesina', 'okay', '1', '0', '0', '2018-04-22 23:41:35'),
(71, 'junior oduberu', 'ayo adesina', 'great day', '1', '0', '0', '2018-04-22 23:41:59'),
(73, 'junior oduberu', 'tomide aina', 'junior is my name', '0', '0', '0', '2018-04-23 09:18:24'),
(76, 'opeyemi', 'junior oduberu', 'hii', '1', '0', '0', '2018-04-27 10:40:25'),
(78, 'opeyemi', 'junior oduberu', 'd', '1', '0', '0', '2018-04-27 10:41:41'),
(79, 'ayo adesina', 'junior oduberu', 'h', '1', '0', '0', '2018-04-27 10:44:14'),
(80, 'ayo adesina', 'junior oduberu', 'yes', '1', '0', '0', '2018-04-27 10:44:34'),
(81, 'ayo adesina', 'junior oduberu', 'okay', '1', '0', '0', '2018-04-27 10:47:03'),
(82, 'ayo adesina', 'junior oduberu', 'ghgh', '1', '0', '0', '2018-04-27 10:48:28'),
(83, 'ayo adesina', 'junior oduberu', 'vfhfjh', '1', '0', '0', '2018-04-27 10:51:19'),
(84, 'ayo adesina', 'junior oduberu', 'gfghvjhjh', '1', '0', '0', '2018-04-27 10:51:39'),
(85, 'ayo adesina', 'junior oduberu', 'hdsdjs', '1', '0', '0', '2018-04-27 10:52:27'),
(86, 'ayo adesina', 'junior oduberu', 'sup', '1', '0', '0', '2018-04-27 10:57:19'),
(87, 'opeyemi', 'junior oduberu', 'sup', '1', '0', '0', '2018-04-27 11:04:42'),
(88, 'opeyemi', 'junior oduberu', 'june time', '1', '0', '0', '2018-04-27 11:05:04'),
(89, 'tola lawal', 'junior oduberu', 'hey man', '1', '0', '0', '2018-04-27 11:07:29'),
(90, 'tola lawal', 'junior oduberu', 'may baby', '1', '0', '0', '2018-04-27 11:08:13'),
(91, 'opeyemi', 'junior oduberu', 'yo', '1', '0', '0', '2018-04-27 19:00:28'),
(92, 'junior oduberu', 'tomide aina', 'no', '0', '0', '0', '2018-04-27 19:05:14'),
(93, 'junior oduberu', 'tomide aina', 'okY', '0', '0', '0', '2018-04-27 19:05:35'),
(94, 'opeyemi', 'junior oduberu', 'hey', '1', '0', '0', '2018-05-08 21:11:26'),
(95, 'junior oduberu', 'opeyemi', 'ppp', '1', '0', '0', '2018-05-08 21:13:25'),
(99, 'junior oduberu', 'opeyemi', 'fuck you', '1', '0', '0', '2018-05-17 10:43:16'),
(101, 'fresh', 'junior oduberu', 'man', '1', '0', '0', '2018-05-17 11:15:07'),
(102, 'fresh', 'junior oduberu', 'shitttt', '1', '0', '0', '2018-05-17 11:35:16'),
(103, 'junior oduberu', 'fresh', 'heyyy', '1', '0', '0', '2018-05-17 11:35:58'),
(104, 'junior oduberu', 'fresh', 'supp', '1', '0', '0', '2018-05-17 11:38:04'),
(105, 'opeyemi', 'junior oduberu', 'sssshhs', '1', '0', '0', '2018-05-17 12:41:59'),
(106, 'opeyemi', 'junior oduberu', 'fuck me', '1', '0', '0', '2018-05-17 12:44:38'),
(107, 'junior oduberu', 'fresh', 'i cant see you baba', '1', '0', '0', '2018-05-17 12:48:07'),
(108, 'junior oduberu', 'opeyemi', 'dd', '0', '0', '0', '2018-05-17 12:51:23'),
(109, 'junior oduberu', 'fresh', 'ss', '1', '0', '0', '2018-05-17 12:51:32'),
(110, 'fresh', 'junior oduberu', 'hdjhsjfsj', '1', '0', '0', '2018-05-17 12:53:14'),
(111, 'fresh', 'junior oduberu', 'hfjhfjkshfkjdshkf', '1', '0', '0', '2018-05-17 12:53:32'),
(112, 'junior oduberu', 'fresh', 'fresh', '0', '0', '0', '2018-05-17 12:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(3) UNSIGNED NOT NULL,
  `fullName` varchar(60) NOT NULL,
  `matricNo` varchar(50) NOT NULL,
  `supervisor_user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullName`, `matricNo`, `supervisor_user_name`, `email`, `profile_picture`, `password`, `reg_date`) VALUES
(1, 'ayo adesina', '150805513', 'junior_od', 'ayomide@gmail.com', 'profile_picture/13_reasons_why.jpg', 'c691a31ab86436087c9510d879c9d78d', '2018-04-20 23:31:32'),
(2, 'opeyemi', '150805511', 'junior_od', 'opeyemi@gmail.com', 'profile_picture/breaking_bad.jpg', '57f25de99fff7e6c90d08fe096523a39', '2018-05-17 12:45:01'),
(3, 'tola lawal', '150805505', 'junior_od', 'tola_lawal@gmail.com', 'profile_picture/basketball_event1.jpeg', '179d706ff1c0e3ff7d03d236678bc663', '2018-04-21 04:03:38'),
(4, 'tomide aina', '150805506', 'junior_od', 'tomide_aina@gmail.com', 'profile_picture/default.jpg', 'eac2e310e9141e8a6917e7bd0acdb03d', '2018-04-21 22:36:00'),
(5, 'fresh', '150805512', 'junior_od', 'fresh@gmail.com', 'profile_picture/default.jpg', '03b62516184fb6ef591f45bd4974b753', '2018-05-17 12:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(3) UNSIGNED NOT NULL,
  `supervisor_name` varchar(60) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `supervisor_name`, `userName`, `email`, `password`, `reg_date`) VALUES
(1, 'junior oduberu', 'junior_od', 'opeyemi.oduberu@gmail.com', '57f25de99fff7e6c90d08fe096523a39', '2018-04-20 23:28:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_junior_od`
--
ALTER TABLE `appointment_junior_od`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_schedule_junior_od`
--
ALTER TABLE `appointment_schedule_junior_od`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_junior_od`
--
ALTER TABLE `message_junior_od`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_junior_od`
--
ALTER TABLE `appointment_junior_od`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `appointment_schedule_junior_od`
--
ALTER TABLE `appointment_schedule_junior_od`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message_junior_od`
--
ALTER TABLE `message_junior_od`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table appointment_junior_od
--

--
-- Metadata for table appointment_schedule_junior_od
--

--
-- Metadata for table message_junior_od
--

--
-- Metadata for table students
--

--
-- Metadata for table supervisors
--

--
-- Metadata for database supervisor_management_system
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
