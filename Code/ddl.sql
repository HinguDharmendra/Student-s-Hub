-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2013 at 10:29 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hub`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `postid` int(16) NOT NULL AUTO_INCREMENT,
  `owner` int(9) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`postid`, `owner`, `level`) VALUES
(1, 101080000, 5),
(2, 101080000, 5),
(3, 101080043, 1),
(4, 101080046, 1),
(5, 101080043, 1),
(20, 101080043, 1),
(21, 101080043, 1),
(22, 101080043, 5);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `path` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `department` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(9) NOT NULL,
  `postid` int(16) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`,`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `postid`, `filename`, `name`) VALUES
(101080043, 3, 'New', 'New'),
(101080043, 5, 'Second', 'Second'),
(101080043, 20, 'Third', 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `postid` int(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creator` int(9) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `postid`, `name`, `creator`, `date`, `description`) VALUES
(1, 4, 'Python Workshop', 101080046, '2013-02-22', 'Python workshop by IIT-B'),
(3, 22, 'Android Application Development', 101080043, '2013-03-02', 'Aakash tablet application development initiative.');

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer`
--

CREATE TABLE IF NOT EXISTS `forum_answer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `cat` char(1) NOT NULL,
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer_dept`
--

CREATE TABLE IF NOT EXISTS `forum_answer_dept` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer_fes`
--

CREATE TABLE IF NOT EXISTS `forum_answer_fes` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer_soc`
--

CREATE TABLE IF NOT EXISTS `forum_answer_soc` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_dept`
--

CREATE TABLE IF NOT EXISTS `forum_question_dept` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  `dept` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_question_dept`
--

INSERT INTO `forum_question_dept` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`, `dept`) VALUES
(1, 'Python Examination', 'Python Examination is going to be held on 15th March  \r\nin DEP 2', 'Deep Shah', 'deepshah@live.com', '28/02/13', 2, 0, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_fes`
--

CREATE TABLE IF NOT EXISTS `forum_question_fes` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_question_fes`
--

INSERT INTO `forum_question_fes` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`) VALUES
(1, 'Senate Elections', 'Elections for different posts of the senate.', 'Admin', 'hubadmin@hub.com', '28/02/13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_soc`
--

CREATE TABLE IF NOT EXISTS `forum_question_soc` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_question_soc`
--

INSERT INTO `forum_question_soc` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`) VALUES
(1, 'Wall E Workshop', 'Robotics workshop by SRA', 'Admin', 'hubadmin@hub.com', '28/02/13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `content` text NOT NULL,
  `type` char(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`content`, `type`, `date`) VALUES
('-- MSTS from 11th March --', 'e', '2013-02-28'),
('-- Results of odd semester have been uploaded. --', 'r', '2013-02-28'),
('-- 4th March will be a holiday. --', 'h', '2013-02-28'),
('-- Enthusia has ended. --', 'o', '2013-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(9) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `subject`, `grade`) VALUES
(101080043, 'IT301', 9),
(101080043, 'IT302', 10),
(101080043, 'IT303', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hubmail` varchar(17) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `year` int(4) NOT NULL,
  `department` varchar(10) NOT NULL,
  `type` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hubmail`, `password`, `mobile`, `year`, `department`, `type`) VALUES
(101080000, 'Admin', 'hubadmin@hub.com', '101080000@hub.com', '6627415e807ee33c7302917216e7da68', 9819697698, 0, 'IT', 'a'),
(101080043, 'Deep Shah', 'deepshah@live.com', '101080043@hub.com', '6627415e807ee33c7302917216e7da68', 9967937424, 1, 'IT', 's'),
(101080045, 'Amey Nirgude', 'amey.nirgude@gmail.com', '101080045@hub.com', '6627415e807ee33c7302917216e7da68', 9819697698, 2, 'CS', 's'),
(101080046, 'Dharmendra Hingu', 'dharmendra.hingu@gmail.com', '101080046@hub.com', '6627415e807ee33c7302917216e7da68', 9819697698, 1, 'IT', 't');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
