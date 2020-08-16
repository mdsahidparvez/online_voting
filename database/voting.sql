-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 10:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(23, 'Ward Chairperson', 'Narayan', 'Khanal', '', 'Male', 'upload/samajbadi party.png', 1, 'Samajbadi Party'),
(24, 'Member', 'Saraswati ', 'Lama', '', 'Female', 'upload/1200px-Flag_of_the_Communist_Party_of_Nepal_(Maoist).svg.png', 1, 'Nepal Communist Party');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `img`) VALUES
(2, 'admin1', '$2y$10$S1QKt26nQtSJKz1BRIPnxexmPNZT046bsVbmjBltopKL/XOQPX9gC', 'sudarshan', 'giri', 'upload/admin/p.jpg'),
(3, 'admin2', '$2y$10$XVJgscZUZJUyXb6nNeS7EOsrPlTYEo6B/XhtXoUM6SQiufAwqf//u', 'admin', '2', 'upload/admin/p.jpg'),
(5, 'admin3', '$2y$10$nLH/KsdiWbeQ2nCzx.Ooau9KLncl.B5tHVETVmxFWihmqa9Kcfqm.', 'admin', '3', 'upload/admin/p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voters_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `secret_voter_id` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` text NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `citizenship_back` varchar(255) NOT NULL,
  `ward` int(11) NOT NULL,
  `dob` date NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voters_id`, `id_number`, `secret_voter_id`, `photo`, `password`, `firstname`, `middlename`, `lastname`, `status`, `account`, `img`, `citizenship_back`, `ward`, `dob`, `mobile`, `email`) VALUES
(35, 22, '', '', '$2y$10$5l/G7WT6FDKkega3R4.YyeskGlYNVegF0LnxkxfZE/Kl.6DsLSD3e', 'saachin', '', 'giri', 'Voted', 'Active', 'upload/IMG_20170309_070522.jpg', '', 1, '0000-00-00', '9861554665', 'technologyfighter@gmail.com'),
(34, 1974, '', '', '$2y$10$UaVnLFH5vmL.TxLQ7gPy9erEU15tISz3jH3p78v1TEBzTs6pE0Vua', 'sudarshan2', '', 'giri', 'Voted', 'Active', 'upload/IMG_20170309_070522.jpg', '', 1, '0000-00-00', '9861554665', 'sudarshanhang@gmail.com'),
(36, 1985, '', '', '$2y$10$n/Le6uz8AiFdbYu0hZBpeeI4yrFMPwPmRxkV0fCLUaXhkX1eQKayO', 'sudarshan', '', 'giri', 'Voted', 'Active', 'upload/IMG_20170309_070522.jpg', '', 1, '1998-03-20', '9861554665', 'sachin.girihang@gmail.com'),
(37, 2000, '', '', '$2y$10$I7RzVNqMJRANGBzF2wclOOnfqVwqEz5HQC76STKxeyVGfjBPMpOWi', 'sonuj', '', 'giri', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', '', 1, '2020-04-14', '9861554665', 'almightyzr@yahoo.com'),
(38, 26, '', '', '$2y$10$iukaaYaiEyWsZP7csqi0Ye.nyMF2gI2l47XrGAVnpcFvfCuuScBc6', 'user', '', '2', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', '', 1, '2020-04-14', '4581236745', 'sudarshanhang@gmail.com'),
(39, 18, '', '', '$2y$10$TijEhOocORvvn.Qkt2Zf/e0XehnsTJMSEIkD3lwpvo.q6AZv7BzQm', 'user', '', '3', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', '', 1, '2020-04-14', '9861554665', 'sudarshanhang@gmail.com'),
(40, 50, '', '', '$2y$10$nLV3mAAlifVn10/psKlqce/ul3HPxdpavNSrkqeER3C6vLFO4GB/m', 'user', '', '4', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', '', 1, '2020-04-08', '9861554665', 'sudarshanhang@gmail.com'),
(41, 222, '', '', '$2y$10$N.qgtBSP7fjAOW2ehRwOS.dTbI27RZgmY/L2grN6UXLGOjS6HmWZO', 'user', '', '5', 'Voted', 'Active', 'upload/dandelion-167112_1920.jpg', '', 1, '2020-04-20', '9861447859', 'sudarshanhang@gmail.com'),
(42, 333, '', '', '$2y$10$ZhHj13zoJCAZMf.S1GZfQeesFu/WRkk57/rkYHPFcZmvcC7B20o6i', 'user', '', '7', 'Unvoted', 'Active', 'upload/dandelion-167112_1920.jpg', '', 1, '2020-04-06', '1234567890', 'sudarshanhang@gmail.com'),
(43, 789, '', '', '$2y$10$5F1dU8zEkDGyicR2OVJ1yOG6K.RJ114H0gJbOCX1ws5Plm5OUvGBC', 'sudarshan', '', 'giri', 'Unvoted', 'Active', 'upload/1 (1).jpg', '', 1, '2020-05-18', '9861554665', 'sudarshanhang@gmail.com'),
(44, 38, '', '', '$2y$10$CJY/EM/jKki4.hE8cUgysOARIY5iK1Pxn3TSgP/d4EXqsSL5KvUr.', 'new ', '', 'user', 'Unvoted', 'Active', 'upload/1 (1).jpg', '', 1, '2020-05-04', '9861554665', 'sudarshanhang@gmail.com'),
(45, 39, '', '', '$2y$10$6eNHFutG.JKl/bUlRgKHl.jruJ4yKBq8.r6qy3fRwXkCfrO9fzQUa', 'new', '', 'user', 'Unvoted', 'Active', 'upload/1 (1).jpg', '', 2, '2020-05-10', '1234567890', 'sudarshanhang@gmail.com'),
(46, 12345, '', '', '$2y$10$mdBl3vPiUv0bU/KTkYUqH.EgTy7taEa0yTpBqlxCphMtEzQT4BsYu', 'lasihd', '', 'user', 'Unvoted', '', 'upload/1 (1).jpg', '', 1, '2002-05-12', '1234567890', 'sudarshanhang@gmail.com'),
(47, 1231, '', 'upload/passport size photo.jpg', '$2y$10$Th5JEezeidEpGsw51B3kJOb/neA0.tDoLvlpY4kqnHNcXiq76H0O6', 'lasihd', '', 'user', 'Unvoted', 'Rejected', 'upload/1 (1).jpg', '', 1, '2002-06-12', '1234567890', 'sudarshanhang@gmail.com'),
(48, 1234758, '', '', '$2y$10$ojLuJBT6d25ZuHGCbbTi5uls1QHblRbFDV1MbDXuyBTsdn3gR.7LC', 'user', '', '33', 'Unvoted', 'Active', 'upload/1 (1).jpg', '', 1, '2002-06-12', '9861235495', 'sudarshanhang@gmail.com'),
(49, 44444, '', '', '$2y$10$1ZWQ0dTDd8Ii83PhbZfVeOldLmAGtJ4qvtZAcB.uotjSn7p2qTMlK', 'bandana', '', 'giri', 'Voted', 'Active', 'upload/sss.jpg', '', 1, '2001-05-20', '9861544236', 'sudarshanhang@gmail.com'),
(50, 45678, '', '', '$2y$10$N/YglIQQyBVgJCSLx0hoFuqFzyX3YhaTo6sLLrOY7EMAMVvXMEfsG', 'sudarshan', '', 'giri', 'Voted', 'Active', 'upload/citizenship_front.jpg', '', 1, '1992-05-04', '1234567895', 'sudarshanhang@gmail.com'),
(51, 3216, '', '', '$2y$10$vcrmRDef1vbTASRF3bKc/ezbeMzbaQhr38GXaB5YRwpOaOV7rQswu', 'sudarshan', '', 'giri', 'Voted', 'Active', 'upload/citizenship_front.jpg', '', 1, '1998-08-11', '9861554665', 'sudarshanhang@gmail.com'),
(54, 3323, '', 'upload/passport size photo.jpg', '$2y$10$GjWaNtHLLqd/j0slZ6mwm.gxD9vxFXgA16rG.quVUGpYNAMf0lHxS', 'sudarshan', '', 'giri', 'Voted', 'Active', 'upload/citizenship_front.jpg', '', 1, '1998-03-20', '9861554665', 'sudarshanhang@gmail.com'),
(55, 2323, '', 'upload/31113751_1814116201986148_7783782871356932096_o (2).jpg', '$2y$10$CYt4j3SLH9edC26MOBVDMurKAkfmhJmjkxVIoLPn5OiIQUvzy5pJa', 'sudarshan', '', 'giri', 'Unvoted', 'Active', 'upload/citizenship_front.jpg', '', 1, '1998-03-20', '9861554665', 'sudarshanhang@gmail.com'),
(56, 4458, '555', 'upload/passport size photo.jpg', '$2y$10$oAMUV2iCu2h0OYtWl7lGVexeIfoXAX39DNWizQKp9Bx1Ggs/7sCR2', 'sudarshan', '', 'giri', 'Unvoted', 'Active', 'upload/citizenship_front.jpg', '', 1, '1998-03-20', '9861554665', 'sudarshanhang@gmail.com'),
(57, 12, '', 'upload/passport size photo.jpg', '$2y$10$J8Vmeez2bdd/bxeZf8TXx.rxeae83ACXsrXpE3b/IGTvjMgu3bKRK', 'sudarshan', '', 'giri', 'Unvoted', '', 'upload/citizenship_front.jpg', '', 1, '1998-03-20', '9861554665', 'sudarshanhang@gmail.com'),
(58, 555, '', 'upload/passport size photo.jpg', '$2y$10$06nnDgUvjnKhb6ZB6xhvtuskl/j0VOwDpp/pRlJKpEqXD3wpPv7GK', 'sudarshan', '', 'giri', 'Unvoted', '', 'upload/citizenship_front.jpg', 'upload/citizenship_back.jpg', 1, '1998-03-20', '9861554665', 'sudarshanhang@gmail.com'),
(59, 4665, '4665', 'upload/passport size photo.jpg', '$2y$10$cUI3IWr8J19zQliworLbRemd2a.ojmi4fmgmod/tmgoWbD5Ca7GHa', 'sudarshan', '', 'giri', 'Unvoted', 'Active', 'upload/citizenship_front.jpg', 'upload/citizenship_back.jpg', 1, '1998-03-20', '9861554665', 'sudarshanhang@gmail.com');

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
(1, 'UERBSVVrMzBMeFpnTGNwMS9wVk1jdz09Ojrkn+0zcTabX64giUue/7Vz', '34'),
(2, 'ME1TNUNzVFZNb3UxQ2EweG9RS29xUT09OjqkPjcv3Yh7qt/sXuDUFVol', '34'),
(3, 'dFIzSW5FeWF5WkVKTk9oVG41QTRFZz09OjqEdhS7L2oNqc7qcCKpgiOV', '34'),
(4, 'MGk0aFh0UCtuNFZPR2VVQThHUGRNQT09Ojp981IriTfxiFgFuAK5GcJO', '34'),
(5, 'eWgxYkFSNFRGTGRMWVpnYUhld1RIUT09OjpC89o6Es3ezvYxObMKLIGg', '34'),
(6, 'dVhURUthMkZmRmFJM0l4b1FBZHBtUT09Ojqnb0xd94Da1lzrEr2wi62i', '34'),
(7, 'MFZaNmdTWENLek5td2ZzVzRmNzhoUT09Ojpm7r3um4Ff4N5DaML1Btd9', '36'),
(8, 'YjFvcEJNYkNOWTVmUzNXcEF4Y1hCZz09OjpybTwe/QMas+6bzjd9d03X', '36'),
(9, 'akdYa1kvOE1WcU04dWZmTU11eTBNQT09Ojou6TjxpPYcCSisU/d6YYag', '36'),
(10, 'TXQ5VjZFNzhXa05qbEtPOTRRMkJQdz09OjrCyBv4c25Cu2PX1RMPv/XS', '36'),
(11, 'dGFMTlFsN2RGcUtCSFFWUWZDZkx1UT09OjqPgdusx/gF847bt+wEPzM4', '36'),
(12, 'ai9JRHpETmJXMVpXTWF1Z0ZwYVVvQT09OjrZ4LqHShviYZmZ+hCpwTdg', '36'),
(13, 'NVFrUTZsQ3laUEhnVERJMkx0SHZSZz09OjpkUJHvHlPrvHpLfreBpMlD', ''),
(14, 'U1NiYnphYks4VXg0NTJycm9vOGk1UT09OjquVFqWMrDJ8nOr9a4s06dV', ''),
(15, 'bVhmZWoyelhJYnY3Zy9iRVh0VHN6QT09OjpZc1XvMbYVbeiB9IKdiMNo', ''),
(16, 'SWgwWW02WG9FeVpxb2wxeGVMaGZuUT09OjrQ0Q0G/qeUS5m43ML5gv2D', ''),
(17, 'NFdtMmszOUdmcVpJQTRCWFB1R1p0dz09OjriHnkx1ibjFgrxRIWpulzV', ''),
(18, 'aGZVWHUwd05aUXA1STZGdVVYUzdpUT09OjrKm9ZVCNHatFMeaQHErCoe', ''),
(19, 'QzdXbXBWSG03UVJXK3B2bjB3eHlCZz09OjoR1ktz4yvRFgRuryuIdaCh', '38'),
(20, 'Zm55U3AvVEVoOXpSY2xhK3JObml5UT09OjouHTMkBv4pd5RDNyqAEHEl', '38'),
(21, 'WUliWFpEVXVRbWovMFgxZGw5QnRkUT09OjrvfUiHogEZvZDFUUZY5UBY', '38'),
(22, 'bXo0ZnNRMXBwZWpwa1hBc0pjcU9QQT09OjpaZg4/73O138wdeDlRVnci', '38'),
(23, 'US92NjhEVUd6KzBBUERIdXNWTkdLZz09Ojq5pzGpZ4Xoi7JqR5RBr7BZ', '38'),
(24, 'cmVYQ0hjMnV6MkJDZ0xIQlZWcnZJdz09OjqNSkr0NGz/ej2ffP6+Q65Y', '38'),
(25, 'V2s5VVV6M21BTUN4NzhiZWRYTmk4QT09Ojp24PDkc/61xz0s6wWGCY/J', '35'),
(26, 'K21hblpETElHMDZobW5ndVpVbkNsZz09OjqwOVJqLc4O5CVGPXkIFT23', '35'),
(27, 'cmIrS2o2Wk0rOWQ4MmxmN1FWSklTdz09OjqEEXm11RmgEiV1Qmfb4bkS', '35'),
(28, 'U2o3dkE0T0E4d1RTZ2dnQTI3dmpNZz09OjqyV4NfCV9r765aQrimwg9J', '35'),
(29, 'WngzemlFazhCeW0vV09KQXhCcnR0Zz09OjrqNjjZfx1dcMj5zqJnuhIh', '35'),
(30, 'MjNhWHRLNTN5eURQV3JSeGNoOGFRdz09OjqQ2lzU4pkSVI+Qtn/QMQeb', '35'),
(31, 'aVIxVFNDYTFzOVFIYzhoaHpnV2M3dz09OjpmYiS64Qmgu3mhrcVziB/H', '39'),
(32, 'WjA2YlhFcjdwKzBYa2xqd016b2czUT09OjoBjM4udjUjrIE7YNSxBkxE', '39'),
(33, 'cWpneWhDWjN6ZXhZTFRhYU5VQjhMUT09Ojp+tOXHidBgc1haKVEROeAs', '39'),
(34, 'OENjWktGU0UxdEVSancvdTlEMVkwQT09Ojq/fg3Anadp76Ort7qalJ9w', '39'),
(35, 'RlQ3Q0EvSzVlZzVvOVBWTGMrTjlLdz09Ojq0pzYmcci4WT2x2JVSSbna', '39'),
(36, 'NGw0YU5xTWlvcXpibTE4dEIrN2xtQT09Ojr2B33oqfO12xPuTJXDPZuU', '39'),
(37, 'Y3pRT0RPcmhaTlhJdGpsTTVqUzAyUT09OjrrANytPWNcvpTb9znXGyV0', '40'),
(38, 'd1I4ODJFcUVzQjhIcnRSM3l4aUpqdz09Ojo6WucGOiwJeSlBIBntfoaz', '40'),
(39, 'VTNVVlpwS1ljRVIxbDNGcnNtakQ1Zz09OjpR++OuZwxGN8zVcdqL8Z3B', '40'),
(40, 'UWVwamlFMXFpbUYrMUxmTy9tWnBpZz09Ojr6zWcbaVETk1zG5T0W0T7/', '40'),
(41, 'N1hvZDBRMW1QUHBxWGZYK1pGZG1VUT09OjoQ411Rby48WNPSormeHQqx', '40'),
(42, 'UUVYRERXeml0QnB6dXBCR0VhYkRWZz09Ojqcnk10LyqbEzJVemPFtppo', '40'),
(43, 'TWVUWW5HMXlIb2dMZGRMV0Zyd2lwZz09Ojpy5PLkwpNyw6+sUlitbq5o', '37'),
(44, 'ZlBseHN4WVFnK2dwN2trck1yTVphUT09OjpeK6t1F6NECNM/KN11xCD3', '37'),
(45, 'a2pHMUcrQW5semViZU02TUZnQ1B1QT09OjqSTNgyGkDAvvX+usadqFAO', '37'),
(46, 'Uk5VeUFOZ3NkZG0xNW1qeWV4YTBVQT09OjryGgZLVUjfxM/3wqLnp8d7', '37'),
(47, 'ZE10YmlhWDE2eHdqOXJTcnEzcUlTUT09Ojp5IcJpNZmgNFHFsCwsNVmS', '37'),
(48, 'd2NxbUZBNWJ5OXNLa3hNV3B4ZlI0UT09OjpeQe5kC/i4u4EmzZJgZ2YR', '37'),
(49, 'bnBhT1RwQ2VONmdKbjhxLzE4UUJrdz09Ojqthh8A5lWTJnZ63eeWLsy8', ''),
(50, 'Sk1jVjVSZ0xreGh5U1gzS1lwWlIyUT09OjoQX2V5KnT7QY251gdjK2NJ', ''),
(51, 'YnRoSG44anp1U1EvTm85YnJPSUVEdz09OjqgnS/yVAqFl7JZPQUk7y0T', ''),
(52, 'MGYzZnhXdTkyR0lwZ2ZNbkhaL1hjdz09OjraDKCMnxgnyF/WDcNXPTNA', ''),
(53, 'cEdGMHpQN1lRVFZiaWc4ODhtNi9uQT09OjqENPPUCPNlMh1VXYok+R21', ''),
(54, 'SDhqNGtXVDBPVk91U0dXazg4Z1lMZz09Ojq/9hcjfyx+GPjt/ytQv2dV', ''),
(55, 'U293bWFGcTlSSlRHejNhTWg5bFduQT09OjppHKlg05lECTwKmLX0PCkf', '41'),
(56, 'VXU1WjRPQzFKZjY0Q3liQzZITGFydz09Ojpm0IoHWni6kGOPmfzoMA4a', '41'),
(57, 'TWtMMG1YZjJleXAxU2ZSNmNheUwxQT09OjpKKyHpSOfsAsTYBA7kIZIz', '41'),
(58, 'RC92V2c0Wk1ETnQ5UHJESi9FWGkzQT09OjrVOd4FLvNeByfd5Fy1/1EJ', '41'),
(59, 'Ylg4bllOSVNSVDZ3Mzhma3lWMkJyQT09Ojp1pH1pvEq/NppPKSNwZvIO', '41'),
(60, 'T3VySG02OE4vdFlWN3F6Y2xLOEo5Zz09Ojp0wKGjj0vZIEiOsRNRdDVJ', '41'),
(61, 'K2JOVXdtdm5qZ29keUxNS0RqVlBhUT09OjoR2oR2IJJsxxWQ4Zqp4asY', '49'),
(62, 'L0Z2dkFqOHpVWkdyejZnL3hlSjNGZz09Ojr3wg7apcurT37DYvcqc8/u', '49'),
(63, 'ZkhvNXpWWjYrTG5Ca3NCUFlpNFk3UT09OjphnI/t4il4BJZzUreJq8gF', '49'),
(64, 'YVhSaWZhS0hzUTBnTFgwVUNzSEp2Zz09OjruoAyq47okQJPuEkwNCesf', '49'),
(65, 'RkxVYnZQVGFzWlR1V001VXRXRHpmdz09OjpHZwlogRuZhB2CWN6HeahR', '49'),
(66, 'bEM1WVYvelNSbHJtWlE0am9JWGRZdz09Ojpa2CV1RkbcB1YzdbYTLNal', '49'),
(67, 'clZaL1hzYUtyazVodW9meWxwMTlyQT09OjrXuLYfVAdeKCbPFKwV+Ahl', '50'),
(68, 'VVVTS2hUWDlhWGp2YitOWWJMc2JFZz09Ojo6mVzW+q35Tj6SWE7We25y', '50'),
(69, 'TUg0Ym42NkdZajE2U0RSNXNyN3ByUT09OjpPk+nNw8wY6f5XT9NxCzbM', '50'),
(70, 'aTk5cWlkRVloRStyZkJZM3JoVC8yUT09OjpcaUOKzj2CyOiV0ykLk56X', '50'),
(71, 'TVNOaERhU01sMm5BbGtid1h0b1dZdz09OjoUWtGFzZJf0xdd9kawP7Nb', '50'),
(72, 'b3BIWWl6Qk9IUS9hdGY4S0ViUEI0UT09Ojo+xjHtqBBjO9TBrqqTXJwa', '50'),
(73, 'Qm1CQ0ZaMHZJeHNRY0JLZzgwZDJpQT09OjoURslcjmT10lmvS7ond4QP', '51'),
(74, 'YjU2N0Z6OUF5Q2V1Mm1ieWdWS3A1UT09OjohUGSySA3Q/qXrJPk8qjCt', '51'),
(75, 'ZWUzb3g5V0FMOVdFV1BMaXE3Qm1Fdz09OjqpOYJanuGZfgLwLemuPfwU', '51'),
(76, 'cHkyZVdQUHhVTlVwOGRWdmYxcjVZQT09OjocT/+0HmZKAhZiXPE9+BV7', '51'),
(77, 'M0F2UE9ucFdVWWpkU0lramxvZkl5QT09Ojr5r3nPSaR2zM1W9mUDmcZI', '51'),
(78, 'dXRkbWNWK1hXZGttd0doOGl2YXpsdz09Ojq5LBbZneW15HWzKiyRD6WY', '51'),
(79, 'RUp4VDVITWdaRnp2ZWhyRkVCMzFPUT09OjqVVox52AMcMvpby7Dq5yNz', '54'),
(80, 'bWhDSlZzRHlGYTNNS3YwVDllWHdHdz09Ojo/2Yda42CPeeb9mVuXOAWw', '54'),
(81, 'L1crR3VDU0MzamJXY1JZMUo4RFJvQT09Ojr43gURlH3wNcv1Wtq4eAGb', '54'),
(82, 'WnpQd3VpMU50TkN5NmZKK0JYOFFHUT09OjqWEoKp2is+Wl4/+VnTV2dz', '54'),
(83, 'eHRueVVSNURudzVFdS9CVnFJakl2dz09OjrCURE7VXR1X0RryRdS2j70', '54'),
(84, 'MnFUSjdmakdHMm5hOGt3YjQrdkRmUT09OjqXqB5zuF9mQVNZBvDJpWqI', '54');

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
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
