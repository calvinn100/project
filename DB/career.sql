-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 04:54 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int(11) NOT NULL,
  `path` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `address` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `affiliation` text COLLATE latin1_general_ci NOT NULL,
  `profilepic` text COLLATE latin1_general_ci NOT NULL,
  `location` text COLLATE latin1_general_ci NOT NULL,
  `city` text COLLATE latin1_general_ci NOT NULL,
  `state` text COLLATE latin1_general_ci NOT NULL,
  `country` text COLLATE latin1_general_ci NOT NULL,
  `latitude` text COLLATE latin1_general_ci NOT NULL,
  `longitude` text COLLATE latin1_general_ci NOT NULL,
  `phone` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `collegetype` text COLLATE latin1_general_ci NOT NULL,
  `departments` text COLLATE latin1_general_ci NOT NULL,
  `courses` text COLLATE latin1_general_ci NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `description`, `address`, `affiliation`, `profilepic`, `location`, `city`, `state`, `country`, `latitude`, `longitude`, `phone`, `email`, `password`, `collegetype`, `departments`, `courses`, `status`) VALUES
(1, 'Yvette Cruz', 'Quia assumenda nihil totam distinctio. Eveniet, consectetur quam cumque ea sed.', 'Ut omnis aspernatur aspernatur nihil sit, id, explicabo. Est id facilis.', './assets/images/company/proof/58b7ec71e30c99.05006507.jpg', './assets/images/company/dp/58b7ec71e33001.76994300.jpg', 'Andhra Pradesh, India', 'Andhra Pradesh', 'Andhra Pradesh', ' India', '', '', '+438-22-6114765', 'hehigucabo@yahoo.com', 'ead2e9', '', '', '', 'pending'),
(2, 'Hope Davis', 'Voluptatem. Sunt cupiditate voluptas et adipisicing assumenda quidem eu dolorem sed.', 'Incididunt debitis exercitation deserunt sunt, dolorem pariatur? Est id consequatur, rerum nostrum voluptas atque expedita doloremque fuga. Non.', './assets/images/company/proof/58b7ec97548d32.97146349.png', './assets/images/company/dp/58b7ec9754c1e7.55718976.png', 'Andhra Pradesh, India', '', '', '', '', '', '+648-40-7622202', 'pibego@gmail.com', 'bc6116', '', '', '', 'pending'),
(3, 'Hope Davis', 'Voluptatem. Sunt cupiditate voluptas et adipisicing assumenda quidem eu dolorem sed.', 'Incididunt debitis exercitation deserunt sunt, dolorem pariatur? Est id consequatur, rerum nostrum voluptas atque expedita doloremque fuga. Non.', './assets/images/company/proof/58b7ec989ee722.78742424.png', './assets/images/company/dp/58b7ec989f09d3.32441484.png', 'Andhra Pradesh, India', 'Andhra Pradesh', 'Andhra Pradesh', ' India', '', '', '+648-40-7622202', 'pibego@gmail.com', 'fa73b9', '', '', '', 'pending'),
(4, 'Hope Davis', 'Voluptatem. Sunt cupiditate voluptas et adipisicing assumenda quidem eu dolorem sed.', 'Incididunt debitis exercitation deserunt sunt, dolorem pariatur? Est id consequatur, rerum nostrum voluptas atque expedita doloremque fuga. Non.', './assets/images/company/proof/58b7ee8cbb69e7.30473554.png', './assets/images/company/dp/58b7ee8cbba3b9.76655565.png', '', 'Andhra Pradesh', 'Andhra Pradesh', ' India', '15.9128998', '79.73998749999998', '+648-40-7622202', 'pibego@gmail.com', '29c3ab', '', '', '', 'pending'),
(5, 'Nola Garrett', 'In duis tempor velit veritatis nisi sit, similique fugiat nulla aliquam eos ab natus debitis et molestiae.', 'Dolorum ut ut reiciendis harum sint, omnis dolores eveniet, non non a.', './assets/images/company/proof/58b7eeafa2c4f6.72613121.png', './assets/images/company/dp/58b7eeafa2eaf0.05786366.png', 'Andhra Pradesh, India', 'Andhra Pradesh', 'Andhra Pradesh', ' India', '15.9128998', '79.73998749999998', '+273-72-7366263', 'dofirypo@hotmail.com', 'e03118', 'Quaerat et earum velit culpa vel magnam pariatur', '', '', 'pending'),
(6, 'Leroy Whitehead', 'Sit accusamus facere unde voluptate dolore earum labore voluptatibus et ut.', 'Ullam tempor voluptate minim eos, ut dolore placeat, magnam eligendi et error accusamus ad et vel et commodo.', './assets/images/company/proof/58b7f0e0f35902.30839968.jpg', './assets/images/company/dp/58b7f0e0f37957.43227647.jpg', 'Andhra Pradesh, India', 'Andhra Pradesh', 'Andhra Pradesh', ' India', '15.9128998', '79.73998749999998', '+647-62-5458972', 'xebiqizyfe@hotmail.com', 'a1cf3b', 'Et voluptas corporis dolore dolore aspernatur vitae necessitatibus consequatur', '3', '4', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `collegetypes`
--

DROP TABLE IF EXISTS `collegetypes`;
CREATE TABLE IF NOT EXISTS `collegetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `companydescription` text COLLATE latin1_general_ci NOT NULL,
  `proof` text COLLATE latin1_general_ci NOT NULL,
  `profilepic` text COLLATE latin1_general_ci NOT NULL,
  `departments` text COLLATE latin1_general_ci NOT NULL,
  `worktypes` text COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci,
  `address` text COLLATE latin1_general_ci NOT NULL,
  `hqlocation` text COLLATE latin1_general_ci NOT NULL,
  `hqlatitude` text COLLATE latin1_general_ci NOT NULL,
  `hqlongitude` text COLLATE latin1_general_ci NOT NULL,
  `city` text COLLATE latin1_general_ci NOT NULL,
  `state` text COLLATE latin1_general_ci NOT NULL,
  `country` text COLLATE latin1_general_ci NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `mailverification` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `companydescription`, `proof`, `profilepic`, `departments`, `worktypes`, `phone`, `email`, `password`, `address`, `hqlocation`, `hqlatitude`, `hqlongitude`, `city`, `state`, `country`, `status`, `mailverification`) VALUES
(1, 'Fuller Villarreal', 'Laboris repudiandae magni consequuntur cumque dolor expedita natus sed error occaecat.', './assets/images/company/proof/58b7cb4f120d03.99907369.jpg', './assets/images/company/dp/58b7cb4f122b95.15636949.jpg', '3', '1', 'Watts Nunez Traders', 'jeybin@f.c', '198d7c', 'Dolorem optio, deserunt veniam, ex dolor nostrum quasi ad saepe consequat. Non.', 'Andheri East, Mumbai, Maharashtra, India', '19.1154908', '72.87269519999995', ' Mumbai', ' Maharashtra', ' India', 'pending', 'not verified'),
(2, 'Clinton Castillo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', './assets/images/company/proof/58b870d8bb33b1.84359402.png', './assets/images/company/dp/58b870d8bb6a85.67520767.png', '3', '1', 'Romero Lancaster Co', 'jeybin@gmail.com', '000', 'Deserunt rerum commodo dolor nemo qui sint commodi autem sapiente perferendis amet, dolores minim sit, magni nulla est, autem.', 'Andheri East, Mumbai, Maharashtra, India', '19.1154908', '72.87269519999995', ' Mumbai', ' Maharashtra', ' India', 'approved', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `companyworktype`
--

DROP TABLE IF EXISTS `companyworktype`;
CREATE TABLE IF NOT EXISTS `companyworktype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `companyworktype`
--

INSERT INTO `companyworktype` (`id`, `department`, `name`, `status`) VALUES
(1, 3, 'information technology', 'approved'),
(2, 3, 'asd', 'approved'),
(3, 2, 'asdas', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `department` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `courseduration` text COLLATE latin1_general_ci NOT NULL,
  `insertby` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `department`, `courseduration`, `insertby`) VALUES
(3, 'asd', '3', '', 'admin'),
(4, 'Jessamine Ferrell', '3', '', 'admin'),
(5, 'Cally Moran', '8', '3 semesters', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `insertby` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `insertby`) VALUES
(3, 'CE', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `college` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `certificates` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviewquestions`
--

DROP TABLE IF EXISTS `interviewquestions`;
CREATE TABLE IF NOT EXISTS `interviewquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE latin1_general_ci NOT NULL,
  `answer` text COLLATE latin1_general_ci NOT NULL,
  `companydepartment` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledgecenter`
--

DROP TABLE IF EXISTS `knowledgecenter`;
CREATE TABLE IF NOT EXISTS `knowledgecenter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `pdfpath` text COLLATE latin1_general_ci NOT NULL,
  `postedon` text COLLATE latin1_general_ci NOT NULL,
  `postedby` text COLLATE latin1_general_ci NOT NULL,
  `departmentid` text COLLATE latin1_general_ci NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionpaper`
--

DROP TABLE IF EXISTS `questionpaper`;
CREATE TABLE IF NOT EXISTS `questionpaper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `coursetime` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `path` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuts`
--

DROP TABLE IF EXISTS `tuts`;
CREATE TABLE IF NOT EXISTS `tuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `contentpath` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `profileimage` text COLLATE latin1_general_ci NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `profileimage`, `status`) VALUES
(1, 'Harlan Kim', 'jeybin@gmail.com', '123', '+578-50-6629695', './assets/images/users/dp/58b672f108b9c0.45070439.png', 'pending'),
(2, 'Seth Allison', 'zymer@yahoo.com', '835bf9', '+731-97-9753740', './assets/images/users/dp/58b7f129c508e4.17552434.png', 'pending'),
(3, 'Seth Allison', 'zymer@yahoo.com', '345aad', '+731-97-9753740', './assets/images/users/dp/58b7f12c283451.12228947.png', 'pending'),
(4, 'Ursula Shaw', 'jalo@hotmail.com', '559144', '+898-99-9390397', './assets/images/users/dp/58b7f1730b87e8.57082191.jpg', 'pending'),
(5, 'Ursula Shaw', 'jalo@hotmail.com', 'aa0855', '+898-99-9390397', './assets/images/users/dp/58b7f1c0e015d5.70850090.jpg', 'pending'),
(6, 'Ursula Shaw', 'jalo@hotmail.com', '164c1f', '+898-99-9390397', './assets/images/users/dp/58b7f1e337e029.44508939.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) NOT NULL,
  `departmentid` text COLLATE latin1_general_ci NOT NULL,
  `worktypesid` text COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `vacancies` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `companyid`, `departmentid`, `worktypesid`, `description`, `vacancies`) VALUES
(2, 2, '3', '1', 'Vel maiores nobis veritatis quae excepturi est, labore quas provident, culpa explicabo. Obcaecati.', '54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
