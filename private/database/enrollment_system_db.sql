-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 07:40 AM
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
(2, 'Andres Bonifacio', '+639610895342', 'Active'),
(3, 'Antonio Luna', '+639610834567', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `PROGRAM_ID` int(20) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`PROGRAM_ID`, `PROGRAM`, `DESCRIPTION`) VALUES
(10, 'Junior High School', 'JHS');

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
(4, 'Antonio Luna', 'MWF', '08:00', '16:00', 'Room 2', 'Grade 7'),
(5, 'Andres Bonifacio', 'MWF', '09:31', '21:31', 'Room 1', 'Grade 8');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `SECTION_ID` int(20) NOT NULL,
  `SECTION` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(255) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Information Communication Technology', 'ICT', '2024-11-03 23:58:28'),
(3, 'Humanities and Social Sciences', 'HUMSS', '2024-11-07 01:00:24'),
(4, 'General Academic Strand', 'GAS', '2024-11-07 01:01:17'),
(5, 'Science, Technology, Engineering, and Mathematics', 'STEM', '2024-11-07 01:02:08'),
(6, 'Accountancy, Business and Management', 'ABM', '2024-11-07 01:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `STUDENT_ID` int(20) NOT NULL,
  `ST_FNAME` varchar(255) NOT NULL,
  `ST_LNAME` varchar(255) NOT NULL,
  `ST_MI` varchar(255) NOT NULL,
  `ST_EXT_NAME` varchar(255) NOT NULL,
  `ST_PROFILE` varchar(255) NOT NULL,
  `ST_ADDRESS` varchar(255) NOT NULL,
  `ST_GENDER` varchar(255) NOT NULL,
  `ST_BIRTHDATE` varchar(255) NOT NULL,
  `ST_AGE` varchar(255) NOT NULL,
  `ST_CIVIL_STATUS` varchar(255) NOT NULL,
  `ST_PLACEBIRTH` varchar(255) NOT NULL,
  `ST_NATIONALITY` varchar(255) NOT NULL,
  `ST_RELIGION` varchar(255) NOT NULL,
  `ST_EMAIL` varchar(255) NOT NULL,
  `ST_CONTACT_NO` varchar(255) NOT NULL,
  `ST_GDNAME` varchar(255) NOT NULL,
  `ST_GD_CONTACT_NO` varchar(255) NOT NULL,
  `ST_YEAR_LEVEL` varchar(255) NOT NULL,
  `ST_SCHOOL_YEAR` varchar(255) NOT NULL,
  `ST_TRACK_STRAND` varchar(255) NOT NULL,
  `ST_USERNAME` varchar(255) NOT NULL,
  `ST_PASSWORD` varchar(255) NOT NULL,
  `ST_STATUS` varchar(255) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUDENT_ID`, `ST_FNAME`, `ST_LNAME`, `ST_MI`, `ST_EXT_NAME`, `ST_PROFILE`, `ST_ADDRESS`, `ST_GENDER`, `ST_BIRTHDATE`, `ST_AGE`, `ST_CIVIL_STATUS`, `ST_PLACEBIRTH`, `ST_NATIONALITY`, `ST_RELIGION`, `ST_EMAIL`, `ST_CONTACT_NO`, `ST_GDNAME`, `ST_GD_CONTACT_NO`, `ST_YEAR_LEVEL`, `ST_SCHOOL_YEAR`, `ST_TRACK_STRAND`, `ST_USERNAME`, `ST_PASSWORD`, `ST_STATUS`) VALUES
(1, 'Juan', 'Dela Cruz', 'D', '', '1731134155.png', 'Talavera', 'male', '2024-11-09', '23', 'Single', 'Talavera', 'Filipino', 'Catholic', 'juan@gmail.com', '09610893543', 'none', '09610893543', 'Grade 7', '2024-2025', '', 'Juan', '$2y$10$ruBkpZUWSM2kVk6O7ulDRe87ox.fHZH6eJAd9zF.9qRx4HrWrPYH.', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SUBJECT_ID` int(20) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `YEAR_LEVEL` varchar(255) NOT NULL,
  `UNIT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SUBJECT_ID`, `SUBJECT`, `YEAR_LEVEL`, `UNIT`) VALUES
(11, 'Filipino', 'Grade 7', '3'),
(12, 'Mathematics', 'Grade 7', '3'),
(13, 'English', 'Grade 7', '3'),
(14, 'Science', 'Grade 7', '3'),
(15, 'Programming 1', 'Grade 11', '2'),
(16, 'Programming 2', 'Grade 12', '2');

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
(47, '2025-2026', 'Inactive', 'Nov 09, 2024');

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
(1, 'Staff', 'Staff@gmail.com', '$2y$10$DkVV4XMFe8yeNvGdi2yxMeTPPQOm.olB7qcC8Oob6bAOJj8QBBLIK', 'Staff');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `INSTRUCTOR_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `PROGRAM_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `SCHEDULE_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `SECTION_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `STRAND_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `STUDENT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SUBJECT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `TERM_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
