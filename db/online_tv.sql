-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 09:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_tv`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(110) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(6, 'Comedy'),
(7, 'Science'),
(8, 'Animations'),
(9, 'Educate'),
(10, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `comment` text NOT NULL,
  `comments_date` date NOT NULL,
  `video_id` int(11) NOT NULL,
  `published_status` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `name`, `email`, `comment`, `comments_date`, `video_id`, `published_status`) VALUES
(3, 'Jahangir Alam', 'rafiq@gmail.com', 'asdf', '2016-10-11', 2, 1),
(6, 'Mizanur Rahman', 'md.robinkhan@ymail.com', 'asdf', '2016-10-10', 3, 0),
(7, 'Shawkat ali', 'shawkat@gmail.com', 'Nice', '0000-00-00', 10, 0),
(8, 'sadasd', 'asdasd@sdf.com', 'asdasdasd', '2016-10-10', 7, 1),
(9, 'Sports', 'admin@base4.com', 'sadf', '2016-10-03', 7, 0),
(10, 'Sadiya Akhter', 'sadiya@gmail.com', 'good', '2016-09-05', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `type` varchar(1) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `name`, `email`, `password`, `gender`, `type`) VALUES
(1, 'Nahida Akhter', 'nahida@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'female', 'r');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `subscriber_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`subscriber_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`subscriber_id`, `email`) VALUES
(28, 'ahad_07dsfgvdgf55@yahoo.com'),
(26, 'shawkatali527@dfdfgmail.com'),
(27, 'shawkxzcvdfgvbdfatali527@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(4) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `type`, `created_date`) VALUES
(1, 'shawkat ali', 'admin@base4.com', 'a', 'sa', '2016-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `video` varchar(50) NOT NULL,
  `popular` int(11) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `cate_id`, `title`, `video`, `popular`) VALUES
(2, 7, 'Flight of the Future - Science Fiction or Reality', 'qn2x62G5GmM', 1),
(3, 8, 'Dinosaur Animation', 'zBkjFGYKMhA', 0),
(4, 8, 'Sleep In the Island', 'YvR8LGOUpNA', 0),
(5, 8, 'Funny animations Movie', 'MDvmWI6PFCs', 1),
(6, 8, 'Le Fiabe Disney', 'cWnJsozLHco', 0),
(7, 8, 'Donald Duck and Huey', 'xLZhlP-PQ5A', 1),
(8, 10, 'Bangladesh vs Afganistan 3rd ODI', 'vF3nuaOs8PQ', 0),
(9, 10, 'Bangladesh vs Afganistan 3rd ODI', 'ZFh5vijKqr8', 0),
(10, 10, 'Bangladesh vs England Cricket', 'Al1WUBtsaeA', 0),
(11, 10, 'Bangladesh vs England 1st ODI', 'pmw5P8W0Dhc', 1),
(12, 6, 'Bangla New Funny Video "Tree Stooges', '22V3VO9MAwE', 0),
(13, 6, 'Tree Stooges Bangla Catching', 'A6495AI1VCE', 0),
(14, 6, 'Herro Alom How Cow Show', 'oheIaoYS02M', 0),
(15, 6, 'Best Bangla Funny Video', '_hbfIsxQSEA', 0),
(16, 6, 'Ittadi Funny Bangla Dubbed Video', 'A8hmA51dbZo', 0),
(17, 9, 'World Best Motivation Video', 'Tjnq5StX68g', 1),
(18, 9, 'Good Team Work and Bad Team Work', 'fUXdrl9ch_Q', 0),
(19, 9, 'Team Work Motivation video ', 'fm1gh5GAmWc', 0),
(20, 10, 'The Magical Mustafizur', 'YTYZmNWHpZw', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
