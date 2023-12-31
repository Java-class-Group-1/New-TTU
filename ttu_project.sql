-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 11:30 AM
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
  `dateSent` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `admin_email`, `username`, `password`, `phone`, `dateSent`) VALUES
(1, 'admin1@example.com', 'admin1', '780c27334348bb95173ae6ed3e593393a158602afd95d6f4935c0c7c445f4349', '555-111-2222', '2023-11-13'),
(2, 'admin2@example.com', 'admin2', '780c27334348bb95173ae6ed3e593393a158602afd95d6f4935c0c7c445f4349', '555-333-4444', '2023-11-14'),
(3, 'admin3@example.com', 'admin3', '780c27334348bb95173ae6ed3e593393a158602afd95d6f4935c0c7c445f4349', '555-555-6666', '2023-11-15'),
(4, 'nana@gmail.com', 'nana botwe', '349edea14aabb592d1cd72779fd255e50654df939d8d9a3c58f7c2d6cdb4c0d1', '0550100160', NULL),
(5, 'botwe@gmail.com', 'emema neaa', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '024565489', '2023-11-22'),
(6, 'inbitfirm@gmail.com', 'faculty', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '+2339705330', '2023-11-22'),
(7, 'kwesime3@gmail.com', 'SCHOOL', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '087456789009', '2023-11-22'),
(8, 'inbitfirm@gmail.com', 'TEST', '94ee059335e587e501cc4bf90613e0814f00a7b08bc7c648fd865a2af6a22cc2', '087456789009', '2023-11-23'),
(9, 'inbitfirm@gmail.com', 'TEST', '94ee059335e587e501cc4bf90613e0814f00a7b08bc7c648fd865a2af6a22cc2', '087456789009', '2023-11-23'),
(10, 'isaacnanabotwe@gmail.com', 'TTU', '83cf4075e79a302d2cf9828e4d082b18c45db7c7b3659b01bb0b8be84b8f38d0', '087456789009', '2023-11-23'),
(11, 'ttu@gmail.com', 'emmanueal', '76fc6e9eb589ffe8f3c8e70a40e018bfe04c3d8bff2d5b9d471c37d3760f8bc2', '0550100160', '2023-11-23'),
(12, 'isaacnanabotwe@gmail.com', 'EXAMS123', '780c27334348bb95173ae6ed3e593393a158602afd95d6f4935c0c7c445f4349', '0550100160', '2023-11-25'),
(13, 'banson@ait.edu.gh', 'EXAMS123', '780c27334348bb95173ae6ed3e593393a158602afd95d6f4935c0c7c445f4349', '0550100160', '2023-11-27'),
(14, 'banson@ait.edu.gh', 'banson', '8cf2cbc46cc28458bfd84a57ad26efb0ac5789ea73d87a27265a4fe39e8a6421', '0550100160', '2023-11-27');

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `crdhrs` int(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `crdhrs`, `department_id`, `faculty_id`) VALUES
(1, 'Java', 3, 1, 5),
(2, 'C++', 3, 1, 5),
(3, 'Analytical chemistry IV practical', 3, 23, 5),
(4, 'Biochemistry III', 3, 23, 5),
(5, 'Electricals and Electronics', 3, 23, 5),
(6, 'Communication Skills', 3, 23, 5),
(7, 'Information Technology', 3, 1, 5),
(8, 'PHP Programming', 3, 1, 5),
(9, 'Programming using C++', 3, 1, 5),
(10, 'Database Management', 3, 1, 5),
(11, 'Communication skills', 3, 1, 5),
(12, 'Entrepreneurship', 3, 1, 5),
(13, 'Java Programming', 3, 1, 5),
(14, 'VB.net', 3, 1, 5),
(15, 'Hardware Technology', 3, 1, 5),
(16, 'Web Technology', 3, 1, 5),
(17, 'Networking', 3, 1, 5),
(18, 'Intro. Accounting', 3, 1, 5),
(19, 'Computer Graphics', 3, 1, 5),
(20, 'Information Security', 3, 1, 5),
(21, 'Maths and Stats', 3, 1, 5),
(22, 'Discret Maths', 3, 1, 5),
(23, 'Operating Systems', 3, 1, 5),
(24, 'Research Methods', 2, 1, 5),
(25, 'Research Methodology', 3, 1, 5),
(26, 'Artificial Intelligence', 3, 1, 5),
(27, 'Accommodation', 3, 10, 5),
(28, 'Entrepreneurship', 3, 10, 5),
(29, 'Food Production', 3, 10, 5),
(30, 'Food Science', 3, 10, 5),
(31, 'Research Methodology', 3, 10, 5),
(32, 'Nutrition', 3, 10, 5),
(33, 'Food Production and operation', 3, 10, 5),
(34, 'Front Office', 3, 10, 5),
(35, 'Hospitality management', 3, 10, 5),
(36, 'Food and Beverage', 3, 10, 5),
(37, 'Food and Beverage Service', 3, 10, 5),
(38, 'Hospitality Law', 3, 10, 5),
(39, 'African Studies', 3, 10, 5),
(40, 'Hospitality Accounting', 3, 10, 5),
(41, 'Communication Skills', 3, 10, 5),
(42, 'Microbiology practical', 3, 23, 5),
(43, 'Microbiology', 3, 23, 5),
(44, 'Lab. Management and admin', 3, 23, 5),
(45, 'Biochemistry', 3, 23, 5),
(46, 'Chemistry', 3, 23, 5),
(47, 'Research Methods', 3, 23, 5),
(48, 'Chemistry practical', 3, 23, 5),
(49, 'biochemistry practical', 3, 23, 5),
(50, 'Analytical cheistry', 3, 23, 5),
(51, 'Microbiology V', 3, 23, 5),
(52, 'Analytical chemistry practical', 3, 23, 5),
(53, 'General Maths', 3, 23, 5),
(54, 'Instrumental Science', 3, 23, 5),
(55, 'Electronics practical', 3, 23, 5),
(56, 'Computer Literacy', 3, 23, 5),
(57, 'Analytical chemistry IV practical', 3, 23, 5),
(58, 'Biochemistry III', 3, 23, 5),
(59, 'Electricals and Electronics', 3, 23, 5),
(60, 'Communication Skills', 3, 23, 5);

-- --------------------------------------------------------

--
-- Table structure for table `course_level`
--

CREATE TABLE `course_level` (
  `id` int(11) NOT NULL,
  `course_level` varchar(50) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_level`
--

INSERT INTO `course_level` (`id`, `course_level`, `date`) VALUES
(2, 'PROF DIP 2', '2023-11-14'),
(3, 'HND 1', '2023-11-15'),
(4, 'HND 1 EVENING', '2023-11-18'),
(5, 'HND 2\n', '2023-11-18'),
(8, 'HND 2 EVENING', '2023-11-27'),
(9, 'HND 3', '2023-11-13'),
(10, 'HND 3 EVENING', '2023-11-14'),
(11, 'BTECH 1', '2023-11-15'),
(12, 'BTECH 1 EVENING', '2023-11-18'),
(13, 'BTECH 2', '2023-11-18'),
(14, 'BTECH 2 EVENING', '2023-11-27'),
(15, 'BTECH 3', '2023-11-13'),
(16, 'BTECH 3 EVENING', '2023-11-14'),
(17, 'BTECH 4', '2023-11-15'),
(18, 'BTECH 4 EVENING', '2023-11-18'),
(19, 'One Year Topup', '2023-11-18'),
(20, 'TOP UP 1', '2023-11-27'),
(21, 'TOP UP 2', '2023-11-13'),
(22, 'NON-TERTIARY', '2023-11-14'),
(23, 'MTECH', '2023-11-15');

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
(1, 'Computer Science', 5, '2023-11-13 00:00:00'),
(2, 'Mathematics and Statistics', 5, '2023-11-19 00:00:00'),
(3, 'Accounting and Finance', 3, '2023-11-15 00:00:00'),
(4, 'Building Technology', 2, '2023-11-16 00:00:00'),
(5, 'Civil Engineering', 1, '2023-11-17 00:00:00'),
(6, 'Electrical / Electronic Engineering', 1, '2023-11-14 14:35:36'),
(7, 'Tourism Management', 5, '2023-11-14 15:15:00'),
(8, 'Graphic Design Technology', 4, '2023-11-18 07:23:04'),
(9, 'Ceramics Technology', 4, '2023-11-18 07:23:04'),
(10, 'Hospitality Management', 5, '2023-11-18 07:26:24'),
(11, 'Industrial and Health Science', 5, '2023-11-18 07:26:24'),
(12, 'Sculpture and Industrial Crafts', 4, '2023-11-18 07:29:30'),
(13, 'Textiles Design and Technology', 4, '2023-11-18 07:29:30'),
(14, 'Procurement and Supply', 3, '2023-11-18 07:31:41'),
(15, 'Marketing and Strategy', 3, '2023-11-18 07:31:41'),
(16, 'Interior Design Technology', 2, '2023-11-18 07:48:19'),
(17, 'Estate Management', 2, '2023-11-18 07:48:19'),
(18, 'Mechanical Engineering - Plant and Production', 1, '2023-11-18 07:48:19'),
(19, 'Mechanical Engineering - Auto and Ref. / Air Cond.', 1, '2023-11-18 07:48:19'),
(20, 'Secretary and Management Studies', 3, '2023-11-18 07:51:43'),
(21, 'Renewable Energy Engineering', 1, '2023-11-18 07:51:43'),
(22, 'Media and Communication', 4, '2023-11-18 08:00:20'),
(23, 'Sci Lab Tech', 5, '2023-11-18 08:00:20'),
(24, 'Medical Lab', 5, '2023-11-18 08:07:53'),
(25, 'Dispensary', 5, '2023-11-18 08:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `day` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_level_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `students` int(11) DEFAULT NULL,
  `hall` varchar(50) DEFAULT NULL,
  `invigilator_id` int(11) DEFAULT NULL,
  `acdyr` text NOT NULL,
  `sem` text NOT NULL,
  `seen` enum('N','S') NOT NULL,
  `datesend` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `day`, `date`, `course_id`, `course_level_id`, `program_id`, `department_id`, `faculty_id`, `session`, `time_start`, `time_end`, `students`, `hall`, `invigilator_id`, `acdyr`, `sem`, `seen`, `datesend`) VALUES
(1, 'Tuesday', '2023-11-09', 1, 5, 17, 5, 2, 'THIRD SESSION', '19:33:00', '12:30:00', 10, 'OB FF6', 8, '2023/2024', 'sem 1', 'N', '2023-11-28 16:30:35'),
(2, 'Tuesday', '2023-11-01', 2, 18, 3, 3, 2, 'SECOND SESSION', '05:05:00', '11:06:00', 20, 'OB FF5', 8, '2023/2024', 'sem 1', 'N', '2023-11-29 02:02:23'),
(3, 'Thursday', '2023-11-10', 1, 16, 1, 1, 3, 'THIRD SESSION', '07:00:00', '10:00:00', 37, 'Roof Top', 7, '2023/2024', 'sem 1', 'N', '2023-11-29 02:10:06'),
(4, 'Monday', '2023-11-09', 1, 2, 1, 1, 1, 'FIRST SESSION', '10:00:00', '13:00:00', 10, 'Drawing RM', 2, '2023/2024', 'sem 1', 'N', '2023-11-29 02:12:09'),
(5, 'Wednesday', '2023-11-06', 2, 19, 19, 16, 2, 'THIRD SESSION', '11:02:00', '17:00:00', 50, 'OB FF5', 7, '2023/2024', 'sem 1', 'N', '2023-11-29 02:54:51'),
(6, 'Thursday', '2023-11-01', 2, 17, 22, 18, 1, 'FOURTH SESSION', '08:09:00', '10:00:00', 10, 'OB FF4', 9, '2023/2024', 'sem 1', 'N', '2023-11-29 03:00:04'),
(7, 'Wednesday', '2023-11-15', 2, 18, 18, 15, 3, 'FOURTH SESSION', '06:02:00', '08:04:00', 10, 'OB FF4', 6, '2023/2024', 'sem 1', 'N', '2023-11-29 03:01:26'),
(8, 'Tuesday', '2023-11-16', 2, 17, 15, 18, 4, 'THIRD SESSION', '07:22:00', '07:22:00', 79, 'Drawing RM', 6, '2023/2024', 'sem 1', 'N', '2023-11-29 03:18:52'),
(9, 'Wednesday', '2023-11-10', 2, 17, 21, 18, 4, 'THIRD SESSION', '00:43:00', '02:45:00', 98, 'TF1', 6, '2023/2024', 'sem 1', 'N', '2023-11-29 10:41:45'),
(10, 'Friday', '2023-11-16', 4, 4, 18, 2, 3, 'THIRD SESSION', '18:00:00', '21:04:00', 55, 'OB FF1', 3, '2023/2024', 'sem 1', 'N', '2023-11-29 15:58:37'),
(11, 'Tuesday', '2023-11-10', 6, 4, 16, 3, 3, 'THIRD SESSION', '20:08:00', '19:07:00', 50, 'OB FF3', 4, '2023/2024', 'sem 1', 'N', '2023-11-29 16:05:07'),
(12, 'Wednesday', '2023-11-08', 16, 19, 20, 12, 4, 'THIRD SESSION', '06:39:00', '05:39:00', 49, 'Restaurant 2', 7, '2023/2024', 'sem 1', 'N', '2023-11-30 01:37:23'),
(13, 'Tuesday', '2023-11-08', 28, 12, 14, 9, 4, 'THIRD SESSION', '19:00:00', '21:00:00', 50, 'OB FF3', 9, '2023/2024', 'sem 1', 'N', '2023-11-30 04:21:06'),
(14, 'Sunday', '2023-11-28', 29, 10, 12, 12, 4, 'THIRD SESSION', '18:00:00', '21:00:00', 80, 'Drawing RM', 7, '2023/2024', 'sem 1', 'N', '2023-11-30 04:32:06'),
(15, 'Thursday', '2023-11-12', 14, 5, 19, 8, 4, 'SECOND SESSION', '09:38:00', '10:39:00', 50, 'OB FF2', 11, '2023/2024', 'sem 1', 'N', '2023-11-30 06:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(255) DEFAULT NULL,
  `names_of_departments` longtext DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`, `names_of_departments`, `date`) VALUES
(1, 'Engineering', 'Civil, Mechanical Eng., Electrical,Processing,Petroleum', '2023-11-13'),
(2, 'Built and Natural Environment', 'Renewable Energy, Interior Design, Estate Management,Building,Plumbing,Welding', '2023-11-18'),
(3, 'Business and Management Studies', 'Accountancy, Marketing, Purchasing and Supp,Secretaryship', '2023-11-19'),
(4, 'Applied Art and Technology', 'Graphics, Textiles, Painting,Sculpture,Ceramics,Fashion,Media and Comm', '2023-11-19'),
(5, 'Applied Sciences ', 'Hospitality, Maths and Statistics, Medical Lab,Dipensary,Tourism,ICT,Science Lab', '2023-11-19');

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
(2, 'Vivian Dadzie', '0550100160', 'Econs09', 3, 6, '2023-11-11'),
(3, 'Mr. Omari', '+2339705330', 'Testing', 5, 1, '2023-11-09'),
(4, 'Mr. Hillary', '087456789009', 'Hardware', 4, 18, '2023-11-10'),
(6, 'Mr. Isaac', '087456789009', 'Java', 5, 16, '2023-11-17'),
(7, 'Mr. Bright Otchere', '0245684840', 'Computer Hardware', 3, 2, '2023-11-23'),
(8, 'Nana Botwe ', '0249705330', 'Computer Software ', 4, 8, '2023-11-09'),
(9, 'Nana Botwe Banson', '0550100160', 'Computer Science ', 3, 7, '2023-11-08'),
(10, 'Albert Hayman', '0550100160', 'Analytical chemistry IV practical', 5, 5, '2023-11-15'),
(11, 'Bright Haynon', '024565489', 'Computer Graphics', 3, 10, '2023-11-16'),
(12, 'Albert Hayman', '0550100160', 'Operating Systems', 5, 6, '2023-11-21'),
(13, 'Albert Hayman', '0550100160', 'Operating Systems', 5, 5, '2023-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `malpractice_reports`
--

CREATE TABLE `malpractice_reports` (
  `id` int(11) NOT NULL,
  `student_index` varchar(50) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_department_id` varchar(100) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `supervisor_name` varchar(100) NOT NULL,
  `supervisor_department_id` varchar(100) NOT NULL,
  `supervisor_role` varchar(100) NOT NULL,
  `room_id` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `malpractice_type` varchar(50) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `item_seen` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `malpractice_reports`
--

INSERT INTO `malpractice_reports` (`id`, `student_index`, `student_name`, `student_department_id`, `course_code`, `supervisor_name`, `supervisor_department_id`, `supervisor_role`, `room_id`, `date_time`, `malpractice_type`, `student_image`, `item_seen`, `description`) VALUES
(2, '07150001152', 'Nana Beeeeeeeee', 'Marketing and Strategy', 'IT102', 'Mr. Akoto', 'Ceramics Technology', 'Chief', 'OB FF4', '2023-11-20 15:08:00', 'Using Unauthorized Materials', '../mypic/Bishop.jpg', 'sdfsdf', 'sdfds'),
(3, '084522653355', 'Faith Dogbe', 'Tourism Management', 'IT102', 'Mr. Akoto', 'Hospitality Management', 'Chief', 'Interior Design Studio A / B', '2023-11-14 19:16:00', 'Using Unauthorized Materials', '../mypic/roadmap.png', 'bad', 'baddddddddd'),
(4, '07150001152', 'FGNFGNFGNGF', 'Civil Engineering', 'IT102', 'Mr. Akoto', 'Industrial and Health Science', 'Chief', 'Painting Studio', '2023-11-14 21:53:00', 'Impersonation', '../mypic/Untitled design.png', 'GFNNGFG', 'GNGNGNF'),
(5, '6544356345354', 'gfhfgh', 'Civil Engineering', 'Analytical chemistry IV practical', 'fgvfdgdf', 'Graphic Design Technology', 'fghfghgf', 'OB FF5', '2023-11-16 02:38:00', 'Impersonation', '../mypic/portrait-young-successful-african-business-lady-white.jpg', 'fdgfdhg', 'dfgfdgfdgd'),
(6, '07150001152', 'Nana Beeeeeeeee', 'Mechanical Engineering - Plant and Production', 'Computer Graphics', 'Mr. Akoto', 'Mechanical Engineering - Plant and Production', 'Chief', 'Painting Studio', '2023-11-21 06:50:00', 'Impersonation', '../mypic/Bishop.jpg', 'BADDDD', 'BADDD'),
(7, '0718000152', 'Emame', 'Mechanical Engineering - Plant and Production', 'Hardware Technology', 'Mr. Akoto', 'Procurement and Supply', 'Chief', 'Room 5A', '2023-11-21 06:50:00', 'Using Unauthorized Materials', '../mypic/Bishop.jpg', 'BADDDD', 'BADDD'),
(8, '071080004', 'Nana Beee', 'Mathematics and Statistics', 'Intro. Accounting', 'Sir Ben', 'Graphic Design Technology', 'Chief', 'Painting Studio', '2023-11-14 07:00:00', 'Impersonation', '../mypic/Bishop.jpg', 'Bandii', 'bad');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `comment` longtext NOT NULL,
  `Date` date DEFAULT current_timestamp(),
  `Department` varchar(100) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`ID`, `Name`, `Email`, `comment`, `Date`, `Department`, `Faculty`) VALUES
(1, 'John Doe', 'john@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-01-15', 'IT', 'Engineering'),
(2, 'Jane Smith', 'jane@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-02-28', 'HR', 'Management'),
(3, 'Alice Johnson', 'alice@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-03-10', 'Marketing', 'Business'),
(4, 'Bob Brown', 'bob@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-04-05', 'Finance', 'Business'),
(5, 'Emily Davis', 'emily@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-05-20', 'Operations', 'Management'),
(6, 'Michael Wilson', 'michael@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-06-11', 'IT', 'Engineering'),
(7, 'Sarah Lee', 'sarah@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-07-04', 'HR', 'Management'),
(8, 'David Garcia', 'david@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-08-19', 'Marketing', 'Business'),
(9, 'Olivia Martinez', 'olivia@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-09-22', 'Finance', 'Business'),
(10, 'William Anderson', 'william@example.com', 'This code will fetch all the data from the student_notices table and output it as JSON. You can then handle this JSON data in your JavaScript to populate the table.  Modify the database credentials ($host, $dbname, $username, and $password) to match your actual database credentials. Also, adjust the table name and column names in the query if they differ from the example.', '2023-10-30', 'Operations', 'Management');

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
(1, 'Information Technology', 5, 5, '2023-11-14 17:18:56'),
(2, 'Tourism', 5, 5, '2023-11-14 17:24:12'),
(3, 'Mathematics and Statistic', 5, 5, '2023-11-14 17:27:19'),
(4, 'Hospitality', 5, 5, '2023-11-14 17:27:30'),
(6, 'Lab Tech', 5, 5, '2023-11-18 12:09:35'),
(8, 'Dispensary', 5, 5, '2023-11-18 12:09:35'),
(9, 'Graphics', 4, 4, '2023-11-18 12:12:22'),
(10, 'Textiles', 4, 4, '2023-11-18 12:12:22'),
(11, 'Painting', 4, 4, '2023-11-18 12:12:22'),
(12, 'Sculpture', 4, 4, '2023-11-18 12:13:40'),
(13, 'Ceramics', 4, 4, '2023-11-18 12:14:22'),
(14, 'Fashion', 4, 4, '2023-11-18 12:15:07'),
(15, 'Media and Comm.', 4, 4, '2023-11-18 12:16:40'),
(16, 'Accountancy', 3, 3, '2023-11-18 12:18:34'),
(17, 'Marketing', 3, 3, '2023-11-18 12:18:34'),
(18, 'Purchasing and Supply', 3, 3, '2023-11-18 12:20:00'),
(19, 'Secretaryship', 3, 3, '2023-11-18 12:20:48'),
(20, 'Building Technology', 2, 2, '2023-11-18 12:22:54'),
(21, 'Interior Design', 2, 2, '2023-11-18 12:22:54'),
(22, 'Estate Management', 2, 2, '2023-11-18 12:24:41'),
(24, 'Electrical / Electronic', 1, 1, '2023-11-18 12:25:44'),
(25, 'Mecha. Engineering - Plant', 1, 1, '2023-11-18 12:28:14'),
(26, 'Mecha. Eng. - Auto ', 1, 1, '2023-11-18 12:30:34'),
(27, 'Renewable Energy', 1, 1, '2023-11-18 12:33:02'),
(28, 'Mecha. Engineering - Refrig.', 1, 1, '2023-11-18 12:38:48'),
(29, 'Mecha. Engineering - Prod.', 1, 1, '2023-11-18 12:38:48'),
(30, 'Plumbing', 2, 2, '2023-11-18 12:41:51'),
(36, 'Software Testing soft', 2, 5, '2023-11-27 08:46:07'),
(37, 'ikoppp', 3, 4, '2023-11-28 08:50:33'),
(38, 'Information Technology', 1, 5, '2023-11-30 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `rollover`
--

CREATE TABLE `rollover` (
  `id` int(11) NOT NULL,
  `acdyr` varchar(50) NOT NULL,
  `sem` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rollover`
--

INSERT INTO `rollover` (`id`, `acdyr`, `sem`) VALUES
(1, '2023/2024', 'sem 1');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `room_size` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_name`, `room_size`, `location`, `date`) VALUES
(1, 'Drawing RM', 100, 'Applied Arts', '2023-11-13'),
(2, 'Room 3A', 50, 'Applied Arts', '2023-11-14'),
(3, 'Room 3B', 50, 'Applied Arts', '2023-11-15'),
(4, 'Room 5A', 50, 'Applied Arts', '2023-11-18'),
(5, 'Room 5B', 50, 'Applied Arts', '2023-11-18'),
(6, 'Room 6A', 50, 'Applied Arts', '2023-11-19'),
(7, 'Room 6B', 50, 'Applied Arts', '2023-11-19'),
(8, 'Room 4', 20, 'Applied Arts', '2023-11-18'),
(9, 'Room 2A', 20, 'Applied Arts', '2023-11-18'),
(10, 'Painting Studio', 70, 'Applied Arts', '2023-11-19'),
(11, 'OB FF1', 70, 'Oduro Block', '2023-11-19'),
(12, 'OB FF2', 70, 'Oduro Block', '2023-11-23'),
(13, 'OB FF3', 70, 'Oduro Block', '2023-11-17'),
(14, 'OB FF4', 70, 'Oduro Block', '2023-11-19'),
(15, 'OB FF5', 70, 'Oburo Block', '2023-11-17'),
(16, 'OB FF6', 40, 'Oduro Block', '2023-11-18'),
(17, 'OB SF1', 70, 'Oduro Block', '2023-11-19'),
(18, 'OB SF2', 70, 'Oduro Block', '2023-11-18'),
(19, 'OB SF3', 50, 'Oduro Block', '2023-11-18'),
(20, 'OB SF4', 50, 'Oduro Block', '2023-11-18'),
(21, 'OB SF5', 50, 'Oduro Block', '2023-11-18'),
(22, 'OB SF6', 15, 'Oduro Block', '2023-11-18'),
(23, 'OB SF7', 100, 'Oduro Block', '2023-11-18'),
(24, 'OB TF1', 70, 'Oduro Block', '2023-11-19'),
(25, 'OB TF2', 70, 'Oduro Block', '2023-11-18'),
(26, 'OB TF3', 50, 'Oduro Block', '2023-11-18'),
(27, 'OB TF4', 50, 'Oduro Block', '2023-11-18'),
(28, 'OB TF5', 30, 'Oduro Block', '2023-11-18'),
(29, 'OB TF6', 30, 'Oduro Block', '2023-11-18'),
(30, 'OB TF7', 120, 'Oduro Block', '2023-11-18'),
(31, 'OB LF1', 50, 'Oduro Block', '2023-11-19'),
(32, 'OB LF2', 50, 'Oduro Block', '2023-11-18'),
(33, 'OB LF3', 50, 'Oduro Block', '2023-11-18'),
(34, 'OB LF4', 50, 'Oduro Block', '2023-11-18'),
(35, 'OB LF5', 50, 'Oduro Block', '2023-11-18'),
(36, 'OB LF6', 40, 'Oduro Block', '2023-11-18'),
(37, 'OB LF7', 40, 'Oduro Block', '2023-11-18'),
(38, 'OB LT8', 120, 'Oduro Block', '2023-11-18'),
(39, 'OB Lab1', 20, 'Oduro Block GF.', '2023-11-18'),
(40, 'OB Lab2', 20, 'Oduro Block GF.', '2023-11-18'),
(41, 'OB Lab3', 20, 'Oduro Block GF.', '2023-11-18'),
(42, 'SO2', 70, 'Building Block', '2023-11-18'),
(43, 'SO4', 40, 'Building Block', '2023-11-18'),
(44, 'FO1', 40, 'Building Block', '2023-11-18'),
(45, 'CBT', 40, 'Building Block', '2023-11-18'),
(46, 'Plumbing', 35, 'Building Block', '2023-11-18'),
(47, 'CBT Room', 40, 'Building Block', '2023-11-18'),
(48, 'GF1', 50, 'BU Campus', '2023-11-18'),
(49, 'GF2', 50, 'BU Campus', '2023-11-18'),
(50, 'FF1', 100, 'BU Campus', '2023-11-18'),
(51, 'FF2', 50, 'BU Campus', '2023-11-18'),
(52, 'FF3', 50, 'BU Campus', '2023-11-19'),
(53, 'SF1', 50, 'BU Campus', '2023-11-18'),
(54, 'TF1', 100, 'BU Campus', '2023-11-18'),
(55, 'Library Block', 50, 'BU Campus', '2023-11-18'),
(56, 'MLL', 30, 'BU Campus', '2023-11-18'),
(57, 'Roof Top', 100, 'Main Campus', '2023-11-18'),
(58, 'Interior Design Studio A / B', 35, 'Main Campus', '2023-11-18'),
(59, 'HCIM Conf. RM', 40, 'Main Campus', '2023-11-18'),
(60, 'Restaurant 1', 50, 'Main Campus', '2023-11-18'),
(61, 'Restaurant 2', 50, 'Main Campus', '2023-11-18'),
(62, 'Restaurant 3', 50, 'Main Campus', '2023-11-18'),
(66, 'FFT456', 400, 'Applied Arts', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `first_session` varchar(100) NOT NULL,
  `second_session` varchar(100) NOT NULL,
  `third_session` varchar(100) NOT NULL,
  `fourth_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `department`, `faculty_id`, `department_id`) VALUES
(1, 'John Doe', 'Computer Science', 5, 1),
(2, 'Alice Smith', 'Graphic Design Technology', 1, NULL),
(3, 'Bob Johnson', 'Accounting and Finance', 4, NULL),
(4, 'Emma Brown', 'Hospitality Management', 2, NULL),
(5, 'Michael Wilson', 'Tourism Management', 1, NULL),
(6, 'Emma Brown', 'Civil Engineering', 3, NULL),
(7, 'Michael Wilson', 'Hospitality Management', 4, NULL);

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`);

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
  ADD KEY `course_id` (`course_id`),
  ADD KEY `course_level_id` (`course_level_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `invigilator_id` (`invigilator_id`);

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
-- Indexes for table `malpractice_reports`
--
ALTER TABLE `malpractice_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `rollover`
--
ALTER TABLE `rollover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_name` (`room_name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_faculty_id` (`faculty_id`),
  ADD KEY `fk_department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `course_level`
--
ALTER TABLE `course_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `malpractice_reports`
--
ALTER TABLE `malpractice_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rollover`
--
ALTER TABLE `rollover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`course_level_id`) REFERENCES `course_level` (`id`),
  ADD CONSTRAINT `exams_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`),
  ADD CONSTRAINT `exams_ibfk_4` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `exams_ibfk_5` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `exams_ibfk_6` FOREIGN KEY (`invigilator_id`) REFERENCES `lectures` (`id`);

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

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `fk_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
