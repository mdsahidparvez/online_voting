-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 03:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `ward` int(11) NOT NULL,
  `party_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `position`, `firstname`, `lastname`, `year_level`, `gender`, `img`, `ward`, `party_name`) VALUES
(1, 'President', 'Harry', 'Den', '4th Year', 'Male', 'upload/male3.jpg', 0, ''),
(2, 'Secretary', 'James', 'Corden', '3rd Year', 'Male', 'upload/male3.jpg', 1, ''),
(3, 'Secretary', 'samir', 'rai', '1st Year', 'Male', 'upload/1101251.jpg', 2, ''),
(4, 'ADAKSHYA', 'Rakesh', 'Paudels', '1st Year', 'Male', 'upload/1200px-Flag_of_the_Communist_Party_of_Nepal_(Maoist).svg.png', 0, ''),
(5, 'Adakshya', 'Santosh', 'Chetri', '1st Year', 'Male', 'upload/1101251.jpg', 3, ''),
(7, 'Mayor', 'Santosh', 'Giri', '', 'Male', 'upload/1200px-Flag_of_the_Communist_Party_of_Nepal_(Maoist).svg.png', 1, 'Nepal Communist Party'),
(8, 'Mayor', 'Bipin', 'Chhetri', '', 'Male', 'upload/Nepali-Congress-Tree-Rukha.png', 1, 'Nepali Congress'),
(9, 'Mayor', 'Mahanta', 'Thakur', '', 'Male', 'upload/RJPN.jpg', 1, 'Rastriya Janata Party'),
(10, 'Mayor', 'Upendra', 'Yadav', '', 'Male', 'upload/samajbadi party.png', 1, 'Samajbadi Party'),
(16, 'Deputy Mayor', 'Hari', 'Khadka', '', 'Male', 'upload/Nepali-Congress-Tree-Rukha.png', 2, 'Nepali Congress'),
(17, 'Deputy Mayor', 'Sushila', 'Poudel', '', 'Female', 'upload/1200px-Flag_of_the_Communist_Party_of_Nepal_(Maoist).svg.png', 4, 'Nepal Communist Party'),
(18, 'Deputy Mayor', 'Raj', 'Shresth', '', 'Male', 'upload/RJPN.jpg', 7, 'Rastriya Janata Party'),
(19, 'Deputy Mayor', 'Sabin', 'Aryal', '', 'Male', 'upload/samajbadi party.png', 1, 'Samajbadi Party'),
(20, 'Ward Chairperson', 'Surendra', 'Shresth', '', 'Male', 'upload/1200px-Flag_of_the_Communist_Party_of_Nepal_(Maoist).svg.png', 1, 'Nepal Communist Party'),
(21, 'Ward Chairperson', 'Ambhika', 'Khadka', '', 'Female', 'upload/Nepali-Congress-Tree-Rukha.png', 1, 'Nepali Congress'),
(22, 'Ward Chairperson', 'Bimal', 'Koiral', '', 'Male', 'upload/RJPN.jpg', 1, 'Rastriya Janata Party'),
(23, 'Ward Chairperson', 'Narayan', 'Khanal', '', 'Male', 'upload/samajbadi party.png', 1, 'Samajbadi Party');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'Sudarshan', 'Giri');

-- --------------------------------------------------------

--
-- Table structure for table `votereg`
--

CREATE TABLE `votereg` (
  `voters_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votereg`
--

INSERT INTO `votereg` (`voters_id`, `id_number`, `password`, `firstname`, `lastname`, `year_level`, `status`, `account`) VALUES
(1, 55, '12345678', 'samir', 'rai', '1st Year', 'Unvoted', '');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voters_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `ward` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voters_id`, `id_number`, `password`, `firstname`, `lastname`, `year_level`, `status`, `account`, `img`, `ward`) VALUES
(1, 21241523, 'MXq5cK0L', 'Christine', 'Grey', '3rd Year', 'Unvoted', 'Active', '', 0),
(2, 6666, 'VCK6YWiS', 'Harry', 'Den', '4th Year', 'Voted', 'Active', '', 0),
(3, 32, '4UA6pDiQ', 'safal', 'bhujel', '1st Year', 'Voted', 'Active', '', 0),
(4, 42, 'ljadjn6Y', 'sudarshan', 'giri', '1st Year', 'Voted', 'Rejected', '', 0),
(5, 22, 'password', 'rakesh', 'paudel', '1st Year', 'Voted', 'Rejected', '', 0),
(6, 18, '12345678', 'sahid', 'parvez', '1st Year', 'Voted', 'Rejected', '', 0),
(7, 0, 'user1', 'safal', 'bhujel', '1st Year', 'Unvoted', 'Rejected', '', 0),
(8, 48, '12345678', 'sachin', 'giri', '1st Year', 'Unvoted', 'Active', '', 0),
(9, 142036, '12345678', 'sudarshan', 'giri', '1st Year', 'Unvoted', 'Active', '', 0),
(10, 20, '12345678', 'rabin', 'limbu', '1st Year', 'Voted', 'Active', 'upload/citizenship-min.jpg', 0),
(11, 9, '12345678', 'sabin', 'rai', '1st Year', 'Unvoted', 'Rejected', 'upload/citizenship-min.jpg', 0),
(12, 40, '12345678', 'salman', 'khan', '1st Year', 'Voted', 'Active', 'upload/IMG_20170309_070522.jpg', 1),
(13, 30, '12345678', 'sabin', 'rai', '1st Year', 'Voted', 'Active', 'upload/_downloadfiles_wallpapers_1024_768_windows_glass_feel_7217.jpg', 1),
(14, 23, '12345678', 'sarita', 'giri', '1st Year', 'Voted', 'Active', 'upload/1101251.jpg', 0),
(15, 33, '12345678', 'hem', 'giri', '1st Year', 'Voted', 'Active', 'upload/Shiva-Wallpaper-Trishul.jpg', 0),
(16, 90, '12345678', 'sonuj', 'giri', '1st Year', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', 1),
(17, 333, '12345678', 'sachin', 'giri', '1st Year', 'Unvoted', 'Active', 'upload/IMG_20170309_070522.jpg', 2),
(18, 29, '12345678', 'bandana', 'giri', '1st Year', 'Unvoted', 'Active', 'upload/1101251.jpg', 3),
(19, 50, '12345678', 'samrat', 'rai', '1st Year', 'Unvoted', 'Active', 'upload/1101251.jpg', 2),
(20, 80, '12345678', 'sahid', 'parvez', '1st Year', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', 3),
(21, 325, '12345678', 'sajit', 'manandhar', '1st Year', 'Voted', 'Active', 'upload/_downloadfiles_wallpapers_2560_1440_landscape_windows_10_stock_17430.jpg', 1),
(22, 4444, '12345678', 'bikram', 'giri', '1st Year', 'Unvoted', 'Active', 'upload/1101251.jpg', 2),
(23, 68, '12345678', 'hem', 'giri', '1st Year', 'Unvoted', 'Active', 'upload/windows-dragon.jpg', 1),
(24, 121, '12345678', 'khem', 'raj', '1st Year', 'Unvoted', '', 'upload/chris-barbalis--nYBR0LFTvQ-unsplash.jpg', 1),
(25, 122, '12345678', 'subin', 'shrestha', '1st Year', 'Unvoted', '', 'upload/a.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(255) NOT NULL,
  `candidate_id` varchar(255) NOT NULL,
  `voters_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `candidate_id`, `voters_id`) VALUES
(1, '1', '2'),
(2, '', '2'),
(3, '', '2'),
(4, '2', '2'),
(5, '', '2'),
(6, '', '2'),
(7, '', '2'),
(8, '', '2'),
(9, '', '2'),
(10, '', '2'),
(11, '', '2'),
(12, '', '3'),
(13, '', '3'),
(14, '', '3'),
(15, '2', '3'),
(16, '', '3'),
(17, '', '3'),
(18, '', '3'),
(19, '', '3'),
(20, '', '3'),
(21, '', '3'),
(22, '', '3'),
(23, '', '4'),
(24, '', '4'),
(25, '', '4'),
(26, '3', '4'),
(27, '', '4'),
(28, '', '4'),
(29, '', '4'),
(30, '', '4'),
(31, '', '4'),
(32, '', '4'),
(33, '', '4'),
(34, '1', '6'),
(35, '', '6'),
(36, '', '6'),
(37, '3', '6'),
(38, '', '6'),
(39, '', '6'),
(40, '', '6'),
(41, '', '6'),
(42, '', '6'),
(43, '', '6'),
(44, '', '6'),
(45, '5', '5'),
(46, '', '5'),
(47, '', '5'),
(48, '', '5'),
(49, '', '5'),
(50, '', '5'),
(51, '', '5'),
(52, '', '5'),
(53, '', '5'),
(54, '', '5'),
(55, '', '5'),
(56, '4', ''),
(57, '', ''),
(58, '', ''),
(59, '', ''),
(60, '', ''),
(61, '', ''),
(62, '', ''),
(63, '', ''),
(64, '', ''),
(65, '', ''),
(66, '', ''),
(67, '4', ''),
(68, '', ''),
(69, '', ''),
(70, '2', ''),
(71, '', ''),
(72, '', ''),
(73, '', ''),
(74, '', ''),
(75, '', ''),
(76, '', ''),
(77, '', ''),
(78, '4', '15'),
(79, '', '15'),
(80, '', '15'),
(81, '3', '15'),
(82, '', '15'),
(83, '', '15'),
(84, '', '15'),
(85, '', '15'),
(86, '', '15'),
(87, '', '15'),
(88, '', '15'),
(89, '5', '16'),
(90, '', '16'),
(91, '', '16'),
(92, '', '16'),
(93, '', '16'),
(94, '', '16'),
(95, '', '16'),
(96, '', '16'),
(97, '', '16'),
(98, '', '16'),
(99, '', '16'),
(100, '8', '14'),
(101, '', '14'),
(102, '', '14'),
(103, '', '14'),
(104, '', '14'),
(105, '', '14'),
(106, '', '14'),
(107, '', '14'),
(108, '', '14'),
(109, '', '14'),
(110, '', '14'),
(111, '10', '13'),
(112, '', '13'),
(113, '20', '13'),
(114, '', '13'),
(115, '', '13'),
(116, '', '13'),
(117, '', '13'),
(118, '', '13'),
(119, '', '13'),
(120, '', '13'),
(121, '', '13'),
(122, '10', '12'),
(123, '', '12'),
(124, '', '12'),
(125, '', '12'),
(126, '', '12'),
(127, '', '12'),
(128, '', '12'),
(129, '', '12'),
(130, '', '12'),
(131, '', '12'),
(132, '', '12'),
(133, '9', '20'),
(134, '16', '20'),
(135, '', '20'),
(136, '', '20'),
(137, '', '20'),
(138, '', '20'),
(139, '', '20'),
(140, '', '20'),
(141, '', '20'),
(142, '', '20'),
(143, '', '20'),
(144, '7', '21'),
(145, '17', '21'),
(146, '21', '21'),
(147, '', '21'),
(148, '', '21'),
(149, '', '21'),
(150, '', '21'),
(151, '', '21'),
(152, '', '21'),
(153, '', '21'),
(154, '', '21'),
(155, '7', '10'),
(156, '19', '10'),
(157, '', '10'),
(158, '', '10'),
(159, '', '10'),
(160, '', '10'),
(161, '', '10'),
(162, '', '10'),
(163, '', '10'),
(164, '', '10'),
(165, '', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `votereg`
--
ALTER TABLE `votereg`
  ADD PRIMARY KEY (`voters_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voters_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votereg`
--
ALTER TABLE `votereg`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
