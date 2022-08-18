-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 10:12 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_no`, `is_correct`, `text`) VALUES
(1, 1, 0, 'Horse'),
(2, 1, 0, 'Lion'),
(3, 1, 0, 'Leopard'),
(4, 1, 1, 'Cheetah');

-- --------------------------------------------------------

--
-- Table structure for table `fill_in_blanks`
--

CREATE TABLE `fill_in_blanks` (
  `id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `sentence1` text NOT NULL,
  `sentence2` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fill_in_blanks`
--

INSERT INTO `fill_in_blanks` (`id`, `question_no`, `sentence1`, `sentence2`, `answer`, `score`) VALUES
(1, 0, 'fastest man is hussain ', '', 'bolt', 1),
(2, 0, 'pppp', '', 'p', 1),
(3, 0, 'bbbb', '', 'p', 1),
(4, 0, 'one of the founders of apple is ', 'j obs', 'steve', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`) VALUES
(1, 'images.png'),
(2, 'images.png'),
(3, 'images.png');

-- --------------------------------------------------------

--
-- Table structure for table `multiples`
--

CREATE TABLE `multiples` (
  `question_no` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiples`
--

INSERT INTO `multiples` (`question_no`, `text`) VALUES
(1, 'what is the fastest land animal ?');

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`code`, `email`) VALUES
('15e091373265ac', 'salimjaafar95@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Reg_no` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `theory` int(11) NOT NULL,
  `fill_in_blanks` int(11) NOT NULL,
  `multiple_choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Reg_no`, `username`, `firstname`, `lastname`, `theory`, `fill_in_blanks`, `multiple_choice`) VALUES
(1, 'a', 'a', 'a', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theory`
--

CREATE TABLE `theory` (
  `question_no` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `answer` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theory`
--

INSERT INTO `theory` (`question_no`, `question_text`, `answer`, `score`) VALUES
(1, 'anything', 'qq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `Reg_no` int(255) NOT NULL,
  `level` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`firstname`, `lastname`, `Reg_no`, `level`, `email`, `username`, `password`, `photo`) VALUES
('a', 'a', 1, 100, 'salimjaafar95@gmail.com', 'a', 'a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fill_in_blanks`
--
ALTER TABLE `fill_in_blanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiples`
--
ALTER TABLE `multiples`
  ADD PRIMARY KEY (`question_no`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Reg_no`);

--
-- Indexes for table `theory`
--
ALTER TABLE `theory`
  ADD PRIMARY KEY (`question_no`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`Reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fill_in_blanks`
--
ALTER TABLE `fill_in_blanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theory`
--
ALTER TABLE `theory`
  MODIFY `question_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `Reg_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
