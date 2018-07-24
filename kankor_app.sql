-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 11:32 PM
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
-- Database: `kankor_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `a` text CHARACTER SET utf8 NOT NULL,
  `b` text CHARACTER SET utf8 NOT NULL,
  `c` text CHARACTER SET utf8 NOT NULL,
  `d` text CHARACTER SET utf8 NOT NULL,
  `answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(0, 'تواریخ حافظ رحمت خانی توسط چه کسی نوشته شده است؟', 'قاضی دل محمد خان', 'حافظ رحمت خان', 'میر محمد فاضل', 'محمود الحسینی', 3),
(1, 'درجنگ پانی پت تعدادسپاه احمدشاه بابا به چه تعداد میرسید؟', '70 هزار', '50 هزار', '60 هزار', '55 هزار', 3),
(2, 'کدام مذاکرات بین دولت افغانستان وانگلیس مدت سه ماه رادربرگرفت:', 'مونسوری', 'لاهور', 'کابل', 'راولپندی', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
