-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 03:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `type`) VALUES
('admin', 'admin', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_status` varchar(255) NOT NULL,
  `appointment_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `dean_id` int(11) NOT NULL,
  `dean_firstname` varchar(255) NOT NULL,
  `dean_lastname` varchar(255) NOT NULL,
  `dean_password` varchar(255) NOT NULL,
  `dean_email` varchar(255) NOT NULL,
  `dean_phonenumber` varchar(255) NOT NULL,
  `dean_office` varchar(255) NOT NULL,
  `dean_image` text NOT NULL,
  `hall_id` int(11) NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'dean'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`dean_id`, `dean_firstname`, `dean_lastname`, `dean_password`, `dean_email`, `dean_phonenumber`, `dean_office`, `dean_image`, `hall_id`, `type`) VALUES
(1001, 'Richard', 'Rich', '123', 'garix@garix.com', '066635582', 'SC 56', 'default_profile.png', 102, 'dean'),
(1002, 'Sira', 'yut', 'yuyuyu', 'yu@yu.com', '0586952', 'SB 090', 'default_profile.png', 102, 'dean'),
(1003, 'Mika', 'mik', 'mimik', 'mik@mik.com', '03459', 'MK 34', 'default_profile.png', 101, 'dean');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `link`, `start_event`, `end_event`, `color`) VALUES
(72, 'C', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(73, 'b', 'https://google.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_status` varchar(255) NOT NULL,
  `hall_category` varchar(255) NOT NULL,
  `dean_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `hall_status`, `hall_category`, `dean_id`) VALUES
(101, 'Debora-Hall', 'Active', 'Guest', 1001),
(102, 'Solomon-Hall', 'Active', 'Female', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `plant_service`
--

CREATE TABLE `plant_service` (
  `ps_id` int(11) NOT NULL,
  `ps_firstname` varchar(255) NOT NULL,
  `ps_lastname` varchar(255) NOT NULL,
  `ps_password` varchar(255) NOT NULL,
  `ps_email` varchar(255) NOT NULL,
  `ps_phonenumber` varchar(255) NOT NULL,
  `ps_office` varchar(255) NOT NULL,
  `ps_picture` varchar(255) NOT NULL DEFAULT 'default_profile.png',
  `ps_role` varchar(255) NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'ms'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_service`
--

INSERT INTO `plant_service` (`ps_id`, `ps_firstname`, `ps_lastname`, `ps_password`, `ps_email`, `ps_phonenumber`, `ps_office`, `ps_picture`, `ps_role`, `type`) VALUES
(101, 'Praporn', 'Pra Awak', 'pra', 'pra@pra.com', '+69856958', 'BGT 8', 'default_profile.png', 'Technician', 'ms'),
(102, 'Mariam', 'Cika', 'cika', 'cika@cika.com', '903280470', 'GT 59', 'AI1.jpg', 'Technician', 'ms');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `report_title` varchar(80) NOT NULL,
  `report_desc` varchar(255) NOT NULL,
  `report_date` datetime NOT NULL,
  `report_image` varchar(255) NOT NULL,
  `report_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `student_id`, `report_title`, `report_desc`, `report_date`, `report_image`, `report_status`) VALUES
(1, 2011, 'test', 'test', '2024-04-22 00:00:00', '', 0),
(3, 2024001, 'test', 'test', '2024-05-04 00:00:00', '', 1),
(4, 2024001, 'New report', 'new report', '2024-05-04 08:47:00', '', 0),
(5, 2024001, 'Test', 'etes', '2024-05-04 08:51:00', '', 2),
(6, 2024001, 'sdf', 'sdf', '2024-05-04 09:02:00', 'Use Case Diagram.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_number` varchar(255) NOT NULL,
  `room_facility` varchar(255) NOT NULL,
  `room_status` varchar(255) NOT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `room_facility`, `room_status`, `hall_id`) VALUES
('D-101', 'AC', 'Available', 101),
('D-102', 'Ac', 'Available', 101),
('D-103', 'Fan', 'Available', 101),
('D-104', 'Ac', 'Available', 101),
('D-105', 'Fan', 'Available', 101),
('S-101', 'Fan', 'Available', 102);

-- --------------------------------------------------------

--
-- Table structure for table `room_inspection`
--

CREATE TABLE `room_inspection` (
  `id` int(11) NOT NULL,
  `room_inspection_score` varchar(255) NOT NULL,
  `room_inspection_date` date NOT NULL,
  `room_inspection_desc` varchar(255) NOT NULL,
  `room_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'sdf', 'sdf', '2024-05-10 05:55:00', '2024-05-17 14:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(7) NOT NULL,
  `student_firstname` varchar(255) NOT NULL,
  `student_lastname` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_major` varchar(255) NOT NULL,
  `student_image` text NOT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_firstname`, `student_lastname`, `student_email`, `student_password`, `student_major`, `student_image`, `room_number`, `type`) VALUES
(2024001, 'Martua', 'Bryan', 'bryan@bryan.com', '123456', 'IT', 'default_profile.png', 'S-101', 'student'),
(2024002, 'Maria', 'Maga', 'm@m.com', 'mama', 'IT', 'default_profile.png', 'D-103', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `worship_attendance`
--

CREATE TABLE `worship_attendance` (
  `worship_attendance_id` int(11) NOT NULL,
  `worship_attendance_date` date NOT NULL,
  `worship_attendance_score` varchar(255) NOT NULL,
  `worship_attendance_desc` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`dean_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`),
  ADD KEY `hall_ibfk_1` (`dean_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `room_inspection`
--
ALTER TABLE `room_inspection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_number` (`room_number`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `room_number` (`room_number`);

--
-- Indexes for table `worship_attendance`
--
ALTER TABLE `worship_attendance`
  ADD PRIMARY KEY (`worship_attendance_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `worship_attendance`
--
ALTER TABLE `worship_attendance`
  MODIFY `worship_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dean`
--
ALTER TABLE `dean`
  ADD CONSTRAINT `dean_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`dean_id`) REFERENCES `dean` (`dean_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_inspection`
--
ALTER TABLE `room_inspection`
  ADD CONSTRAINT `room_inspection_ibfk_1` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `worship_attendance`
--
ALTER TABLE `worship_attendance`
  ADD CONSTRAINT `worship_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
