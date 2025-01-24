-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 02:34 AM
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
-- Database: `db_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `p_member`
--

CREATE TABLE `p_member` (
  `me_id` int(255) NOT NULL,
  `me_name` varchar(255) NOT NULL,
  `me_email` varchar(255) NOT NULL,
  `me_pass` varchar(255) NOT NULL,
  `me_img` varchar(255) NOT NULL,
  `me_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_member`
--

INSERT INTO `p_member` (`me_id`, `me_name`, `me_email`, `me_pass`, `me_img`, `me_role`) VALUES
(2, 'admin', 'admin@gmail.com', 'qwerty', '879085461.jpg', 'admin'),
(3, 'asd', 'sfasnf@g', 'asd', '431663709.jpg', 'user'),
(4, 'user', 'user@gmail.com', 'qwerty', '747315606.jpg', 'user'),
(5, 'user2', 'user2@gmail.com', 'qwerty', '280250421.jpg', 'user'),
(6, 'user3', 'user3@gmail.com', 'qwerty', '860646059.jpg', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `p_me_ans`
--

CREATE TABLE `p_me_ans` (
  `ma_id` int(255) NOT NULL,
  `ma_qt_id` int(255) NOT NULL,
  `ma_qs_id` int(255) NOT NULL,
  `ma_qs_qst` varchar(255) NOT NULL DEFAULT '0',
  `ma_qs_ans` varchar(255) NOT NULL DEFAULT '0',
  `ma_me_id` int(255) NOT NULL,
  `ma_me_ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_me_ans`
--

INSERT INTO `p_me_ans` (`ma_id`, `ma_qt_id`, `ma_qs_id`, `ma_qs_qst`, `ma_qs_ans`, `ma_me_id`, `ma_me_ans`) VALUES
(134, 15, 92, 'คำถามที่: 1', '1', 4, '1'),
(135, 15, 93, 'คำถามที่: 2', '1', 4, '2'),
(140, 15, 92, 'คำถามที่: 1', '1', 5, '2'),
(141, 15, 93, 'คำถามที่: 2', '1', 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `p_me_points`
--

CREATE TABLE `p_me_points` (
  `mp_id` int(255) NOT NULL,
  `mp_qt_id` int(255) NOT NULL,
  `mp_me_id` int(255) NOT NULL,
  `mp_me_points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_me_points`
--

INSERT INTO `p_me_points` (`mp_id`, `mp_qt_id`, `mp_me_id`, `mp_me_points`) VALUES
(14, 15, 4, 1),
(15, 15, 4, 1),
(16, 15, 5, 1),
(17, 15, 5, 1),
(18, 15, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_qst`
--

CREATE TABLE `p_qst` (
  `qs_id` int(255) NOT NULL,
  `qs_qt_id` int(255) NOT NULL,
  `qs_qst` varchar(255) NOT NULL,
  `qs_ans` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_qst`
--

INSERT INTO `p_qst` (`qs_id`, `qs_qt_id`, `qs_qst`, `qs_ans`) VALUES
(92, 15, 'คำถามที่: 1', '1'),
(93, 15, 'คำถามที่: 2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `p_qst_op`
--

CREATE TABLE `p_qst_op` (
  `qo_id` int(255) NOT NULL,
  `qo_qt_id` int(255) NOT NULL,
  `qo_qs_id` int(255) NOT NULL,
  `qo_op` varchar(255) NOT NULL,
  `qo_pop` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_qst_op`
--

INSERT INTO `p_qst_op` (`qo_id`, `qo_qt_id`, `qo_qs_id`, `qo_op`, `qo_pop`) VALUES
(385, 15, 92, '1', 0),
(386, 15, 92, '2', 0),
(387, 15, 92, '3', 0),
(388, 15, 92, '4', 0),
(389, 15, 93, '1', 0),
(390, 15, 93, '2', 0),
(391, 15, 93, '3', 0),
(392, 15, 93, '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_qtitle`
--

CREATE TABLE `p_qtitle` (
  `qt_id` int(255) NOT NULL,
  `qt_title` varchar(255) NOT NULL,
  `qt_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_qtitle`
--

INSERT INTO `p_qtitle` (`qt_id`, `qt_title`, `qt_type`) VALUES
(15, 'ข้อสอบ', 'quiz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_member`
--
ALTER TABLE `p_member`
  ADD PRIMARY KEY (`me_id`);

--
-- Indexes for table `p_me_ans`
--
ALTER TABLE `p_me_ans`
  ADD PRIMARY KEY (`ma_id`);

--
-- Indexes for table `p_me_points`
--
ALTER TABLE `p_me_points`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `p_qst`
--
ALTER TABLE `p_qst`
  ADD PRIMARY KEY (`qs_id`);

--
-- Indexes for table `p_qst_op`
--
ALTER TABLE `p_qst_op`
  ADD PRIMARY KEY (`qo_id`);

--
-- Indexes for table `p_qtitle`
--
ALTER TABLE `p_qtitle`
  ADD PRIMARY KEY (`qt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_member`
--
ALTER TABLE `p_member`
  MODIFY `me_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_me_ans`
--
ALTER TABLE `p_me_ans`
  MODIFY `ma_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `p_me_points`
--
ALTER TABLE `p_me_points`
  MODIFY `mp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `p_qst`
--
ALTER TABLE `p_qst`
  MODIFY `qs_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `p_qst_op`
--
ALTER TABLE `p_qst_op`
  MODIFY `qo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `p_qtitle`
--
ALTER TABLE `p_qtitle`
  MODIFY `qt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
