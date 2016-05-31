-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 10:06 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas225`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` longtext NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `username`, `comment`, `datetime`) VALUES
(19, 'instructor ', 'Instructor.... ', '2015-11-23 00:00:12'),
(20, 'student', 'Student...', '2015-11-23 00:00:12'),
(21, 'jjones', 'I am very excited to be creating an entry in your guestbook!', '2015-11-23 00:00:49'),
(22, 'ssmart', 'I am the smartest student in my class.', '2015-11-23 00:00:49'),
(25, 'student', 'fsbgsbsfb', '2015-11-23 00:20:23'),
(26, 'student', 'dsgsgsdg', '2015-11-23 00:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `permissions` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `password`, `permissions`) VALUES
('instructor', 'Ron', 'Bekey', 'rbekey@pcc.edu', '789b49606c321c8cf228d17942608eff0ccc4171', 'admin'),
('jjones', 'Joe', 'Jones', 'jjones@email.com', '789b49606c321c8cf228d17942608eff0ccc4171', 'user'),
('ssmart', 'Sally', 'Smart', 'ssmart@email.com', '789b49606c321c8cf228d17942608eff0ccc4171', 'user'),
('student', 'Keith', 'Murphy', 'student.name@pcc.edu', '789b49606c321c8cf228d17942608eff0ccc4171', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
