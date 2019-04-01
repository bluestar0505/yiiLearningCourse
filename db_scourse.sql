-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2018 at 06:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `coursename` varchar(125) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `uploadtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifytime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `schoolid`, `departmentid`, `uploadtime`, `modifytime`) VALUES
(1, 'TTTTTTT', 2, 2, '2018-12-23 16:12:53', '2018-12-23 16:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `coursehandbook`
--

CREATE TABLE `coursehandbook` (
  `courseid` int(11) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `modifytime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courseyear`
--

CREATE TABLE `courseyear` (
  `cyearid` int(11) NOT NULL,
  `yearid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `coursehbid` int(11) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `modifytime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` int(11) NOT NULL,
  `departmentname` varchar(125) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `uploadtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifytime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`, `schoolid`, `uploadtime`, `modifytime`) VALUES
(1, 'Mathmatic', 1, '2018-12-23 14:12:19', '2018-12-23 16:12:37'),
(2, 'Biology', 2, '2018-12-23 16:12:59', '2018-12-23 16:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageid` int(11) NOT NULL,
  `stepid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `modifytime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `linkid` int(11) NOT NULL,
  `stepid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `modifytime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_steps`
--

CREATE TABLE `page_steps` (
  `stepid` int(11) NOT NULL,
  `coursehbid` int(11) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `modifytime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolid` int(11) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `uploadtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifytime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolid`, `schoolname`, `uploadtime`, `modifytime`) VALUES
(1, 'Test School 1', '2018-12-23 14:12:26', '2018-12-23 14:12:26'),
(2, 'Test School 2', '2018-12-23 14:12:54', '2018-12-23 14:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `textboxes`
--

CREATE TABLE `textboxes` (
  `tbid` int(11) NOT NULL,
  `stepid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `modifytime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(125) NOT NULL,
  `usertype` tinyint(1) NOT NULL,
  `auth_key` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `usertype`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 1, 'HGikrPn6hN8u4dN34cWGQNjSTCGXHKF3', '2018-12-23 16:17:37', '2018-12-23 16:17:37'),
(3, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 1, '2zJLB9AucgxYbXCBo6Usg87i1nVeL78z', '2018-12-23 16:34:09', '2018-12-23 16:34:09'),
(4, 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Gv2aqqR0Cut8DNLUbjWiZY2x_QDEPWCP', '2018-12-23 16:57:24', '2018-12-23 16:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid` int(11) NOT NULL,
  `stepid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `modifytime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yearid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `uploadtime` datetime NOT NULL,
  `modifytime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `departmentis` (`departmentid`),
  ADD KEY `schoolid` (`schoolid`);

--
-- Indexes for table `coursehandbook`
--
ALTER TABLE `coursehandbook`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `courseyear`
--
ALTER TABLE `courseyear`
  ADD PRIMARY KEY (`cyearid`),
  ADD KEY `coursehbid` (`coursehbid`),
  ADD KEY `yearid` (`yearid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`),
  ADD KEY `schoolid` (`schoolid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageid`) USING BTREE,
  ADD KEY `stepid` (`stepid`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`linkid`);

--
-- Indexes for table `page_steps`
--
ALTER TABLE `page_steps`
  ADD PRIMARY KEY (`stepid`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolid`);

--
-- Indexes for table `textboxes`
--
ALTER TABLE `textboxes`
  ADD PRIMARY KEY (`tbid`),
  ADD KEY `stepid` (`stepid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `stepid` (`stepid`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`yearid`),
  ADD KEY `year` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursehandbook`
--
ALTER TABLE `coursehandbook`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courseyear`
--
ALTER TABLE `courseyear`
  MODIFY `cyearid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `linkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_steps`
--
ALTER TABLE `page_steps`
  MODIFY `stepid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `schoolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `textboxes`
--
ALTER TABLE `textboxes`
  MODIFY `tbid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yearid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
