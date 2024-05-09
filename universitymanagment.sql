-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 07:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitymanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stage` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `stage`, `teacher_id`, `department_id`) VALUES
(1, 'MBC', 1, 1, 0),
(2, '1st Software', 3, 14, 6),
(3, 'Image Proccessing', 4, 14, 4),
(5, 'Mobile Computing 2', 4, 26, 4),
(6, 'bnbvn', 1, 26, 4);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`) VALUES
(1, 'كلية تكنولوجيا المعلومات'),
(2, 'كلية الهندسة'),
(3, 'dfasdfasd');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `college_id`) VALUES
(4, 'تقنيات المعلومات', 3),
(7, 'ادارة اعمال', 3),
(8, 'تكنولوجيا المعلومات', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `filename` varchar(245) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `name`, `filename`, `department_id`, `stage`, `user_id`, `group_no`) VALUES
(7, 'المحاضرة الاولى', '2_5431860502349220981.pdf', 0, 3, 0, ''),
(8, 'المحاضرة الاولى لمادة برمجة الموبايل', '2_5431860502349220981.pdf', 0, 5, 0, ''),
(9, 'المحاضرة الاولى', 'UM Acer manual.pdf', 0, 1, 0, ''),
(13, 'ertert', 'احتساب شهادة.pdf', 4, 1, 28, 'A'),
(16, 'test lect', 'احتساب شهادة.pdf', 4, 1, 28, 'A'),
(17, 'test lect', 'احتساب شهادة.pdf', 4, 1, 28, 'A'),
(18, 'test lect', 'احتساب شهادة.pdf', 7, 1, 28, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `level`) VALUES
(1, 'Super Admin', 1),
(2, 'College Manager', 2),
(3, 'Department Manager', 3),
(4, 'Teacher', 4),
(5, 'Student', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_homework`
--

CREATE TABLE `student_homework` (
  `id` int(11) NOT NULL,
  `activity_name` varchar(255) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_homework`
--

INSERT INTO `student_homework` (`id`, `activity_name`, `class_id`, `teacher_id`) VALUES
(4, 'test', 3, 1),
(5, 'test2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `homeword_id` int(11) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `filename` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `homeword_id`, `student_id`, `filename`) VALUES
(3, 6, '25', 'homework2434.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `stage` int(11) NOT NULL,
  `group_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `college_id`, `department_id`, `stage`, `group_no`) VALUES
(1, 'Super Admin', 'super', '1234', 1, 0, '', 0, NULL),
(22, 'admin', 'admin', '1234', 2, 4, NULL, 0, NULL),
(26, 'manager', 'manager', '1234', 3, NULL, 'دكتوراه', 0, NULL),
(28, 'teacher', 'teacher', '1234', 4, 1, NULL, 0, NULL),
(29, 'student', 'student', '1234', 5, 4, '7', 1, 'C'),
(30, 'كلية القانون', 'a@a.a', '1234', 2, 3, NULL, 0, NULL),
(31, 'hasan abo dihn', 'h@s.c', '12', 5, 3, '9', 0, NULL),
(32, 'ياسر مهند', 'y@a.c', '1234', 5, 4, NULL, 3, NULL),
(33, 'ياسر مهند', 'y@a.c', '1234', 5, 3, NULL, 3, NULL),
(34, 'ياسر مهند', 'y@a.c', '1234', 5, 3, NULL, 3, NULL),
(35, 'ياسر مهند', 'y@a.c', '1234', 5, 3, NULL, 3, 'B'),
(36, 'محمد حسن كاظم', 'ali.hassan164@yahoo.com', '11', 5, 3, '8', 3, 'A'),
(37, NULL, NULL, NULL, 0, 3, '4', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_homework`
--
ALTER TABLE `student_homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_homework`
--
ALTER TABLE `student_homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
