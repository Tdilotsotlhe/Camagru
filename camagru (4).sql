-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2018 at 07:12 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comms_id` int(255) NOT NULL,
  `friend_id` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `commtstamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `comimg_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comms_id`, `friend_id`, `comment`, `commtstamp`, `comimg_id`) VALUES
(1, 1, 'wetwet', '2018-11-05 06:23:18.621927', 2),
(2, 1, 'ewtwet', '2018-11-05 06:23:23.966604', 3),
(3, 1, 'rherfghdfhdfhdfhdfh', '2018-11-05 06:23:50.813788', 2),
(4, 1, 'vbnvbnvbn', '2018-11-05 06:24:07.013150', 3),
(5, 1, 'nyrurysjyrjryjrytyrj', '2018-11-05 06:24:15.845008', 2),
(6, 1, 'OK', '2018-11-07 08:34:48.292551', 7),
(7, 1, 'its working', '2018-11-07 08:35:01.267041', 4),
(8, 1, 'cvncb', '2018-11-08 14:02:57.241779', 2),
(9, 1, 'tsek', '2018-11-08 14:03:22.331602', 4),
(10, 1, 'sdg', '2018-11-10 09:46:30.698533', 3),
(11, 1, 'xcbxcb', '2018-11-10 10:23:53.667862', 2),
(12, 1, 'asfasf', '2018-11-10 11:05:57.245980', 2),
(13, 1, '11111', '2018-11-10 11:06:04.318094', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `img_id` int(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `users_id` int(255) NOT NULL,
  `uptime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`img_id`, `img_name`, `users_id`, `uptime`) VALUES
(2, '1$poo.png', 1, '2018-11-01 07:55:33.123582'),
(4, '1$derp-face-png-7.png', 1, '2018-11-07 08:16:08.583530'),
(5, '1$memes-face-png-2.png', 1, '2018-11-07 08:16:23.678027'),
(6, '1$Screen Shot 2018-11-03 at 14.06.40.png', 1, '2018-11-07 08:16:29.470490'),
(7, '1$herpderp.png', 1, '2018-11-07 08:16:41.717686'),
(8, '1$photo-1533467915241-eac02e856653.jpeg', 1, '2018-11-09 06:11:05.491937'),
(34, '1$252.png', 1, '2018-11-09 07:32:18.585583'),
(36, '1$cxncn.jpeg', 1, '2018-11-11 12:22:58.579997'),
(38, '1$qq.jpeg', 1, '2018-11-11 12:24:25.339209'),
(41, '1$penguin.png', 1, '2018-11-11 13:53:49.198904');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `theimg_id` int(255) NOT NULL,
  `likers_id` int(255) NOT NULL,
  `likestatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`theimg_id`, `likers_id`, `likestatus`) VALUES
(2, 1, 1),
(4, 1, 0),
(5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT '0',
  `ugroup` int(255) NOT NULL DEFAULT '0',
  `acthash` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `passw`, `email`, `active`, `ugroup`, `acthash`) VALUES
(1, 'admin', '$2y$10$tUXUMREHQ1nyOB7GE28Q6.GVZchkTAm.fONAiiR9oy8i4ZFKMQ6A2', 'sdsd@gmail.com', 0, 0, 'c9892a989183de32e976c6f04e700201');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comms_id`),
  ADD KEY `friend_id` (`friend_id`),
  ADD KEY `img_id` (`comimg_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `likesindex` (`theimg_id`,`likers_id`),
  ADD KEY `likelink` (`likers_id`),
  ADD KEY `likedim` (`theimg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ugroup` (`ugroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comms_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `img_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likedim` FOREIGN KEY (`theimg_id`) REFERENCES `gallery` (`img_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likelink` FOREIGN KEY (`likers_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
