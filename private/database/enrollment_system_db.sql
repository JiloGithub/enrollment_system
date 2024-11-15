-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 07:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_system_db`
CREATE DATABASE `enrollment_system_db`;
USE `enrollment_system_db`;
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `GRADE_ID` int(20) NOT NULL,
  `STUDENT_ID` int(20) NOT NULL,
  `SUBJECT_NAME` varchar(255) NOT NULL,
  `FIRST_GRADING` varchar(255) NOT NULL,
  `SECOND_GRADING` varchar(255) NOT NULL,
  `THIRD_GRADING` varchar(255) NOT NULL,
  `FOURTH_GRADING` varchar(255) NOT NULL,
  `FINAL` varchar(255) NOT NULL,
  `REMARKS` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `INSTRUCTOR_ID` int(20) NOT NULL,
  `INSTRUCTOR` varchar(255) NOT NULL,
  `MOBILE_NO` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`INSTRUCTOR_ID`, `INSTRUCTOR`, `MOBILE_NO`, `STATUS`) VALUES
(4, 'Arjhay Rigor', '09620765432', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `PROGRAM_ID` int(20) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `SCHEDULE_ID` int(255) NOT NULL,
  `SC_INSTRUCTOR` varchar(255) NOT NULL,
  `SC_DAY` varchar(255) NOT NULL,
  `SC_FROM` varchar(255) NOT NULL,
  `SC_TO` varchar(255) NOT NULL,
  `SC_ROOM` varchar(255) NOT NULL,
  `SC_YEAR_LEVEL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`SCHEDULE_ID`, `SC_INSTRUCTOR`, `SC_DAY`, `SC_FROM`, `SC_TO`, `SC_ROOM`, `SC_YEAR_LEVEL`) VALUES
(7, 'Arjhay Rigor', 'MTWTF', '08:00', '10:00', 'Room 1', 'Grade 7');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `SECTION_ID` int(20) NOT NULL,
  `SECTION` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`SECTION_ID`, `SECTION`, `YEAR_LEVEL`) VALUES
(1, 'Reiman', 'Grade 7');

-- --------------------------------------------------------

--
-- Table structure for table `shs_grades`
--

CREATE TABLE `shs_grades` (
  `GRADE_ID` int(20) NOT NULL,
  `STUDENT_ID` int(20) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `FIRST_GRADING` varchar(255) NOT NULL,
  `SECOND_GRADING` varchar(255) NOT NULL,
  `FINAL` varchar(255) NOT NULL,
  `REMARKS` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(255) NOT NULL,
  `SEMESTER` varchar(255) NOT NULL,
  `STRAND` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shs_subjects`
--

CREATE TABLE `shs_subjects` (
  `SUBJECT_ID` int(20) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(255) NOT NULL,
  `SEMESTER` varchar(255) NOT NULL,
  `STRAND` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shs_subjects`
--

INSERT INTO `shs_subjects` (`SUBJECT_ID`, `SUBJECT`, `YEAR_LEVEL`, `SEMESTER`, `STRAND`) VALUES
(2, 'Oral Communication I', 'Grade 11', 'First', 'ICT'),
(3, 'Oral Communication II', 'Grade 11', 'Second', 'ICT'),
(4, 'programming I', 'Grade 12', 'First', 'ICT'),
(5, 'programming II', 'Grade 12', 'Second', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `strands`
--

CREATE TABLE `strands` (
  `STRAND_ID` int(20) NOT NULL,
  `STRAND` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `strands`
--

INSERT INTO `strands` (`STRAND_ID`, `STRAND`, `DESCRIPTION`, `DATE`) VALUES
(2, 'ICT', 'Information Communication Technology', '2024-11-14 14:28:56'),
(3, 'HUMSS', 'Humanities and Social Sciences', '2024-11-14 14:29:11'),
(4, 'GAS', 'General Academic Strand', '2024-11-14 14:29:20'),
(5, 'STEM', 'Science, Technology, Engineering, and Mathematics', '2024-11-14 14:29:33'),
(6, 'ABM', 'Accountancy, Business and Management', '2024-11-14 14:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `STUDENT_ID` int(20) NOT NULL,
  `ST_LRN` varchar(255) NOT NULL,
  `ST_FNAME` varchar(255) NOT NULL,
  `ST_LNAME` varchar(255) NOT NULL,
  `ST_MI` varchar(255) NOT NULL,
  `ST_EXT_NAME` varchar(255) NOT NULL,
  `ST_PROFILE` varchar(255) NOT NULL,
  `ST_ADDRESS` varchar(255) NOT NULL,
  `ST_GENDER` varchar(255) NOT NULL,
  `ST_BIRTHDATE` varchar(255) NOT NULL,
  `ST_CIVIL_STATUS` varchar(255) NOT NULL,
  `ST_PLACEBIRTH` varchar(255) NOT NULL,
  `ST_NATIONALITY` varchar(255) NOT NULL,
  `ST_RELIGION` varchar(255) NOT NULL,
  `ST_EMAIL` varchar(255) NOT NULL,
  `ST_CONTACT_NO` varchar(255) NOT NULL,
  `ST_GDNAME` varchar(255) NOT NULL,
  `ST_GD_CONTACT_NO` varchar(255) NOT NULL,
  `ST_YEAR_LEVEL` varchar(255) NOT NULL,
  `ST_CURRENT_YEAR` varchar(255) NOT NULL,
  `ST_SCHOOL_YEAR` varchar(255) NOT NULL,
  `ST_TRACK_STRAND` varchar(255) NOT NULL,
  `ST_SEMESTER` varchar(255) NOT NULL,
  `ST_USERNAME` varchar(255) NOT NULL,
  `ST_PASSWORD` varchar(255) NOT NULL,
  `ST_STATUS` varchar(255) NOT NULL DEFAULT 'New',
  `ST_PASSCODE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SUBJECT_ID` int(20) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SUBJECT_ID`, `SUBJECT`, `YEAR_LEVEL`) VALUES
(2, 'Math', 'Grade 7'),
(3, 'English', 'Grade 8'),
(5, 'Science', 'Grade 9'),
(6, 'Filipino', 'Grade 10');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `TERM_ID` int(20) NOT NULL,
  `TERM` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`TERM_ID`, `TERM`, `STATUS`, `DATE`) VALUES
(44, '2024-2025', 'Active', 'Nov 06, 2024'),
(47, '2025-2026', 'Inactive', 'Nov 11, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(20) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `STATUS`) VALUES
(2, 'Admin', 'admin@admin.com', '$2y$10$VhBU/FMkWqsq.7jBLT0CFuVNSxMR2hgAv/fwma3i4xspwSM4lKJeq', 'Admin'),
(3, 'Staff', 'staff@staff.com', '$2y$10$Nqb2JsCxdFLmh4sJsoyViu2b0ar9plEzfmIdaxWxEmKLg3X6ze7Xu', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`GRADE_ID`),
  ADD KEY `cons_student_id` (`STUDENT_ID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`INSTRUCTOR_ID`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`PROGRAM_ID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`SCHEDULE_ID`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`SECTION_ID`);

--
-- Indexes for table `shs_grades`
--
ALTER TABLE `shs_grades`
  ADD PRIMARY KEY (`GRADE_ID`),
  ADD KEY `xxx` (`STUDENT_ID`);

--
-- Indexes for table `shs_subjects`
--
ALTER TABLE `shs_subjects`
  ADD PRIMARY KEY (`SUBJECT_ID`);

--
-- Indexes for table `strands`
--
ALTER TABLE `strands`
  ADD PRIMARY KEY (`STRAND_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SUBJECT_ID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`TERM_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `GRADE_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `INSTRUCTOR_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `PROGRAM_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `SCHEDULE_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `SECTION_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shs_grades`
--
ALTER TABLE `shs_grades`
  MODIFY `GRADE_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shs_subjects`
--
ALTER TABLE `shs_subjects`
  MODIFY `SUBJECT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `STRAND_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `STUDENT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SUBJECT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `TERM_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `cons_student_id` FOREIGN KEY (`STUDENT_ID`) REFERENCES `students` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_grades`
--
ALTER TABLE `shs_grades`
  ADD CONSTRAINT `xxx` FOREIGN KEY (`STUDENT_ID`) REFERENCES `students` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
