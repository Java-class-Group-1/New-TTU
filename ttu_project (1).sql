-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 06:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttu_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dateSent` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `admin_email`, `username`, `password`, `phone`, `dateSent`) VALUES
(1, 'admin1@example.com', 'admin1', 'admin123', '555-111-2222', '2023-11-13'),
(2, 'admin2@example.com', 'admin2', 'admin456', '555-333-4444', '2023-11-14'),
(3, 'admin3@example.com', 'admin3', 'admin789', '555-555-6666', '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `class_time`
--

CREATE TABLE `class_time` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `Time_set` varchar(20) DEFAULT NULL,
  `Time_end` varchar(20) DEFAULT NULL,
  `Lecture_name` varchar(255) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `room_size` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_time`
--

INSERT INTO `class_time` (`id`, `course_name`, `course_code`, `Time_set`, `Time_end`, `Lecture_name`, `room_id`, `room_size`, `department_id`, `date`) VALUES
(1, 'Introduction to Programming', 'CS101', '09:00:00', '10:30:00', 'John Doe', 1, 35, 1, '2023-11-13'),
(2, 'Calculus II', 'MATH202', '10:30:00', '12:00:00', 'Jane Smith', 2, 25, 2, '2023-11-14'),
(3, 'Mechanics', 'PHYS101', '14:00:00', '15:30:00', 'Bob Johnson', 3, 40, 3, '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `course_level`
--

CREATE TABLE `course_level` (
  `id` int(11) NOT NULL,
  `course_level` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_level`
--

INSERT INTO `course_level` (`id`, `course_level`, `date`) VALUES
(1, 'Undergraduate', '2023-11-13'),
(2, 'Graduate', '2023-11-14'),
(3, 'Ph.D.', '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `depart_name` varchar(255) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depart_name`, `faculty_id`, `date`) VALUES
(1, 'Computer Science', 1, '2023-11-13 00:00:00'),
(2, 'Mathematics', 2, '2023-11-14 00:00:00'),
(3, 'Physics', 3, '2023-11-15 00:00:00'),
(4, 'Biology', 2, '2023-11-16 00:00:00'),
(5, 'Chemistry', 1, '2023-11-17 00:00:00'),
(6, 'Agric', 1, '2023-11-14 14:35:36'),
(7, 'Tourism', 2, '2023-11-14 15:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `date_of_exams` varchar(20) DEFAULT NULL,
  `Time_set` varchar(20) DEFAULT NULL,
  `Time_end` varchar(20) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `year_of_study` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `date_of_exams`, `Time_set`, `Time_end`, `course_code`, `year_of_study`, `room_id`, `faculty_id`, `department_id`, `date`) VALUES
(4, '2023-12-01', '09:00:00', '12:00:00', 'CS101', 2, 1, 1, 1, '2023-11-13'),
(5, '2023-12-02', '10:30:00', '13:30:00', 'MATH202', 3, 2, 2, 2, '2023-11-14'),
(6, '2023-12-03', '14:00:00', '17:00:00', 'PHYS101', 1, 3, 3, 3, '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(255) DEFAULT NULL,
  `number_of_departments` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`, `number_of_departments`, `date`) VALUES
(1, 'Engineering', 2, '2023-11-13'),
(2, 'Science', 3, '2023-11-14'),
(3, 'CIVIL ENGINEERING', 1, '2023-11-15'),
(4, 'APPLIED ARTS', 20, '2023-11-14'),
(5, 'APPLIED SCIENCE', 20, '2023-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `lec_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `course_taught` varchar(255) DEFAULT NULL,
  `Faculty_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `lec_name`, `phone`, `course_taught`, `Faculty_id`, `department_id`, `date`) VALUES
(1, 'Vivian Dadzie', '0550100160', 'Econs09', 1, 1, '2023-11-18'),
(2, 'Vivian Dadzie', '0550100160', 'Econs09', 3, 6, '2023-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `prog_name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `prog_name`, `department_id`, `faculty_id`, `date`) VALUES
(1, 'Computer Literature ', 1, 5, '2023-11-14 17:18:56'),
(3, 'Software Testing', 1, 5, '2023-11-14 17:24:12'),
(4, 'Software Testing', 3, 2, '2023-11-14 17:27:19'),
(5, 'Software Testing', 1, 4, '2023-11-14 17:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `room_size` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_name`, `room_size`, `location`, `date`) VALUES
(1, 'Room 101', 30, 'Building A', '2023-11-13'),
(2, 'Room 202', 25, 'Building B', '2023-11-14'),
(3, 'Room 303', 40, 'Building C', '2023-11-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_time`
--
ALTER TABLE `class_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `course_level`
--
ALTER TABLE `course_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Faculty_id` (`Faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_level`
--
ALTER TABLE `course_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_time`
--
ALTER TABLE `class_time`
  ADD CONSTRAINT `class_time_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `class_time_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `exams_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`Faculty_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `lectures_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `program_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `faculty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
