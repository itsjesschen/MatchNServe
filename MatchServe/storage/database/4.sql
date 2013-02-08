-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2013 at 03:51 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `matchserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `OrganizationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE IF NOT EXISTS `causes` (
  `CauseID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`CauseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`CauseID`, `Description`) VALUES
(4, 'Animals'),
(5, 'Science and Technology'),
(6, 'Education Literacy'),
(7, 'Family and Youth'),
(8, 'Politics and Government'),
(9, 'Food and Culinary'),
(10, 'Environment'),
(11, 'Health and Wellness'),
(12, 'Human Rights and Justice'),
(13, 'Community Development'),
(14, 'Religion and Spirituality'),
(15, 'Internship and Jobs'),
(16, 'Arts and Recreation'),
(17, 'Homelessness and Poverty');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `OrganizationID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  PRIMARY KEY (`OrganizationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`OrganizationID`, `Name`) VALUES
(1, 'Volunteer Master'),
(2, 'Serving Nation');

-- --------------------------------------------------------

--
-- Table structure for table `orgproject`
--

CREATE TABLE IF NOT EXISTS `orgproject` (
  `OrganizationID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orgproject`
--

INSERT INTO `orgproject` (`OrganizationID`, `ProjectID`) VALUES
(1, 1),
(2, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(1, 9),
(2, 10),
(2, 11),
(1, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Details` varchar(2000) NOT NULL,
  `Location` int(5) NOT NULL COMMENT 'The postcode of where the project will be',
  `Date` datetime NOT NULL COMMENT 'Time the project starts',
  `Spots` int(4) NOT NULL COMMENT 'Number of open spots for the project',
  `Admin` varchar(100) NOT NULL,
  `Cause` int(3) NOT NULL,
  `Status` enum('Open','Closed') NOT NULL,
  `Requirements` varchar(2000) NOT NULL,
  `Headline` varchar(1000) NOT NULL COMMENT 'The headline of the project',
  PRIMARY KEY (`ProjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectID`, `Name`, `Details`, `Location`, `Date`, `Spots`, `Admin`, `Cause`, `Status`, `Requirements`, `Headline`) VALUES
(1, 'Feed A Puppy', 'Feed a puppy at the Quad', 90089, '2013-02-06 00:00:00', 10, '', 3, 'Open', '', 'Cat lovers need not apply!'),
(2, 'Walk a dog', 'Help busy students walk their dogs', 90089, '2013-02-07 12:00:00', 5, '', 2, 'Open', '', ''),
(3, 'Build a hut', 'Build a hut to house chickens!', 90089, '2013-02-06 08:00:00', 20, '', 2, 'Open', '', ''),
(4, 'Note typer', 'Help an overworked student type out notes', 90089, '2013-02-06 08:00:00', 1, '', 2, 'Open', '', ''),
(5, 'Plant trees', 'Put some greens on USC soil.', 90089, '2013-02-06 09:00:00', 40, '', 2, 'Open', '', ''),
(6, 'Clean beach', 'Help clean a make belief beach at USC', 90089, '2013-02-06 08:30:00', 100, '', 1, 'Open', '', ''),
(7, 'Babysitters', 'Babysit babies. Simple as that. Pedos need not apply', 90210, '2013-02-06 09:00:00', 1, '', 3, 'Open', '', ''),
(8, 'Ushers', 'Help funnel students orderly into Bovard for some free event', 90089, '2013-02-09 09:30:00', 20, '', 3, 'Open', '', 'Help make this event run as smoothly as possible!'),
(9, 'Website design', 'Rich USC students offering money to do their project', 90089, '2013-02-06 00:00:00', 2, '', 2, 'Open', '', 'Creativity meets work...Joy...'),
(10, 'Database maintainer', 'More rich USC students offering money to do their homework!', 90089, '2013-02-05 09:00:00', 10, '', 3, 'Open', '', ''),
(11, 'Plumbing', 'Help plug the holes in pipes', 90009, '2013-02-08 09:00:00', 10, '', 1, 'Open', '', ''),
(12, 'Volunteer information session', 'Share your experiences of volunteering at our events with others!', 90089, '2013-02-05 10:00:00', 5, '', 3, 'Open', '', ''),
(13, 'Self defense experts', 'Have self-defense skills? Share them!', 90007, '2013-02-05 20:00:00', 1, '', 3, 'Open', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `projectskill`
--

CREATE TABLE IF NOT EXISTS `projectskill` (
  `ProjectID` int(11) NOT NULL,
  `Skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each row has one skill. A proj with 2 skills will take 2 rows.';

--
-- Dumping data for table `projectskill`
--

INSERT INTO `projectskill` (`ProjectID`, `Skill`) VALUES
(1, 18),
(2, 18),
(3, 18),
(4, 7),
(5, 18),
(6, 18),
(7, 18),
(7, 14),
(8, 11),
(9, 9),
(10, 17),
(11, 27),
(12, 10),
(12, 18),
(12, 7),
(12, 22),
(13, 29);

-- --------------------------------------------------------

--
-- Table structure for table `projecttime`
--

CREATE TABLE IF NOT EXISTS `projecttime` (
  `ProjectID` int(11) NOT NULL,
  `TS_IDs` varchar(9001) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `Skill` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`Skill`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`Skill`, `Description`) VALUES
(1, 'Nursing'),
(2, 'Long Term'),
(3, 'Cooking'),
(4, 'Surfing'),
(5, 'Miming'),
(6, 'Accounting'),
(7, 'Advertising'),
(8, 'Brand Strategy'),
(9, 'Communications'),
(10, 'Copywriting'),
(11, 'Typewriting'),
(12, 'Writing'),
(13, 'Design'),
(14, 'Event Planning'),
(15, 'Ushering'),
(16, 'Fundraising'),
(17, 'Legal'),
(18, 'Public Relations'),
(19, 'Photography'),
(20, 'Sales'),
(21, 'Programming'),
(22, 'Manual Labor'),
(23, 'Help Desk'),
(24, 'Documentation'),
(25, 'Archiving'),
(26, 'Customer Service'),
(27, 'Mentoring'),
(28, 'Education'),
(29, 'Counseling'),
(30, 'Engineering'),
(31, 'Plumbing'),
(32, 'Recruitment'),
(33, 'Tutoring'),
(34, 'Art'),
(35, 'Distribution'),
(36, 'Translation'),
(37, 'Nursing');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE IF NOT EXISTS `timeslot` (
  `TS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Day` char(3) NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`TS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=337 ;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`TS_ID`, `Day`, `Time`) VALUES
(1, 'MON', '00:00:00'),
(2, 'MON', '00:30:00'),
(3, 'MON', '01:00:00'),
(4, 'MON', '01:30:00'),
(5, 'MON', '02:00:00'),
(6, 'MON', '02:30:00'),
(7, 'MON', '03:00:00'),
(8, 'MON', '03:30:00'),
(9, 'MON', '04:00:00'),
(10, 'MON', '04:30:00'),
(11, 'MON', '05:00:00'),
(12, 'MON', '05:30:00'),
(13, 'MON', '06:00:00'),
(14, 'MON', '06:30:00'),
(15, 'MON', '07:00:00'),
(16, 'MON', '07:30:00'),
(17, 'MON', '08:00:00'),
(18, 'MON', '08:30:00'),
(19, 'MON', '09:00:00'),
(20, 'MON', '09:30:00'),
(21, 'MON', '10:00:00'),
(22, 'MON', '10:30:00'),
(23, 'MON', '11:00:00'),
(24, 'MON', '11:30:00'),
(25, 'MON', '12:00:00'),
(26, 'MON', '12:30:00'),
(27, 'MON', '13:00:00'),
(28, 'MON', '13:30:00'),
(29, 'MON', '14:00:00'),
(30, 'MON', '14:30:00'),
(31, 'MON', '15:00:00'),
(32, 'MON', '15:30:00'),
(33, 'MON', '16:00:00'),
(34, 'MON', '16:30:00'),
(35, 'MON', '17:00:00'),
(36, 'MON', '17:30:00'),
(37, 'MON', '18:00:00'),
(38, 'MON', '18:30:00'),
(39, 'MON', '19:00:00'),
(40, 'MON', '19:30:00'),
(41, 'MON', '20:00:00'),
(42, 'MON', '20:30:00'),
(43, 'MON', '21:00:00'),
(44, 'MON', '21:30:00'),
(45, 'MON', '22:00:00'),
(46, 'MON', '22:30:00'),
(47, 'MON', '23:30:00'),
(48, 'MON', '23:00:00'),
(49, 'TUE', '00:00:00'),
(50, 'TUE', '00:30:00'),
(51, 'TUE', '01:00:00'),
(52, 'TUE', '01:30:00'),
(53, 'TUE', '02:00:00'),
(54, 'TUE', '02:30:00'),
(55, 'TUE', '03:00:00'),
(56, 'TUE', '03:30:00'),
(57, 'TUE', '04:00:00'),
(58, 'TUE', '04:30:00'),
(59, 'TUE', '05:00:00'),
(60, 'TUE', '05:30:00'),
(61, 'TUE', '06:00:00'),
(62, 'TUE', '06:30:00'),
(63, 'TUE', '07:00:00'),
(64, 'TUE', '07:30:00'),
(65, 'TUE', '08:00:00'),
(66, 'TUE', '08:30:00'),
(67, 'TUE', '09:00:00'),
(68, 'TUE', '09:30:00'),
(69, 'TUE', '10:00:00'),
(70, 'TUE', '10:30:00'),
(71, 'TUE', '11:00:00'),
(72, 'TUE', '11:30:00'),
(73, 'TUE', '12:00:00'),
(74, 'TUE', '12:30:00'),
(75, 'TUE', '13:00:00'),
(76, 'TUE', '13:30:00'),
(77, 'TUE', '14:00:00'),
(78, 'TUE', '14:30:00'),
(79, 'TUE', '15:00:00'),
(80, 'TUE', '15:30:00'),
(81, 'TUE', '16:00:00'),
(82, 'TUE', '16:30:00'),
(83, 'TUE', '17:00:00'),
(84, 'TUE', '17:30:00'),
(85, 'TUE', '18:00:00'),
(86, 'TUE', '18:30:00'),
(87, 'TUE', '19:00:00'),
(88, 'TUE', '19:30:00'),
(89, 'TUE', '20:00:00'),
(90, 'TUE', '20:30:00'),
(91, 'TUE', '21:00:00'),
(92, 'TUE', '21:30:00'),
(93, 'TUE', '22:00:00'),
(94, 'TUE', '22:30:00'),
(95, 'TUE', '23:30:00'),
(96, 'TUE', '23:00:00'),
(97, 'WED', '00:00:00'),
(98, 'WED', '00:30:00'),
(99, 'WED', '01:00:00'),
(100, 'WED', '01:30:00'),
(101, 'WED', '02:00:00'),
(102, 'WED', '02:30:00'),
(103, 'WED', '03:00:00'),
(104, 'WED', '03:30:00'),
(105, 'WED', '04:00:00'),
(106, 'WED', '04:30:00'),
(107, 'WED', '05:00:00'),
(108, 'WED', '05:30:00'),
(109, 'WED', '06:00:00'),
(110, 'WED', '06:30:00'),
(111, 'WED', '07:00:00'),
(112, 'WED', '07:30:00'),
(113, 'WED', '08:00:00'),
(114, 'WED', '08:30:00'),
(115, 'WED', '09:00:00'),
(116, 'WED', '09:30:00'),
(117, 'WED', '10:00:00'),
(118, 'WED', '10:30:00'),
(119, 'WED', '11:00:00'),
(120, 'WED', '11:30:00'),
(121, 'WED', '12:00:00'),
(122, 'WED', '12:30:00'),
(123, 'WED', '13:00:00'),
(124, 'WED', '13:30:00'),
(125, 'WED', '14:00:00'),
(126, 'WED', '14:30:00'),
(127, 'WED', '15:00:00'),
(128, 'WED', '15:30:00'),
(129, 'WED', '16:00:00'),
(130, 'WED', '16:30:00'),
(131, 'WED', '17:00:00'),
(132, 'WED', '17:30:00'),
(133, 'WED', '18:00:00'),
(134, 'WED', '18:30:00'),
(135, 'WED', '19:00:00'),
(136, 'WED', '19:30:00'),
(137, 'WED', '20:00:00'),
(138, 'WED', '20:30:00'),
(139, 'WED', '21:00:00'),
(140, 'WED', '21:30:00'),
(141, 'WED', '22:00:00'),
(142, 'WED', '22:30:00'),
(143, 'WED', '23:30:00'),
(144, 'WED', '23:00:00'),
(145, 'THR', '00:00:00'),
(146, 'THR', '00:30:00'),
(147, 'THR', '01:00:00'),
(148, 'THR', '01:30:00'),
(149, 'THR', '02:00:00'),
(150, 'THR', '02:30:00'),
(151, 'THR', '03:00:00'),
(152, 'THR', '03:30:00'),
(153, 'THR', '04:00:00'),
(154, 'THR', '04:30:00'),
(155, 'THR', '05:00:00'),
(156, 'THR', '05:30:00'),
(157, 'THR', '06:00:00'),
(158, 'THR', '06:30:00'),
(159, 'THR', '07:00:00'),
(160, 'THR', '07:30:00'),
(161, 'THR', '08:00:00'),
(162, 'THR', '08:30:00'),
(163, 'THR', '09:00:00'),
(164, 'THR', '09:30:00'),
(165, 'THR', '10:00:00'),
(166, 'THR', '10:30:00'),
(167, 'THR', '11:00:00'),
(168, 'THR', '11:30:00'),
(169, 'THR', '12:00:00'),
(170, 'THR', '12:30:00'),
(171, 'THR', '13:00:00'),
(172, 'THR', '13:30:00'),
(173, 'THR', '14:00:00'),
(174, 'THR', '14:30:00'),
(175, 'THR', '15:00:00'),
(176, 'THR', '15:30:00'),
(177, 'THR', '16:00:00'),
(178, 'THR', '16:30:00'),
(179, 'THR', '17:00:00'),
(180, 'THR', '17:30:00'),
(181, 'THR', '18:00:00'),
(182, 'THR', '18:30:00'),
(183, 'THR', '19:00:00'),
(184, 'THR', '19:30:00'),
(185, 'THR', '20:00:00'),
(186, 'THR', '20:30:00'),
(187, 'THR', '21:00:00'),
(188, 'THR', '21:30:00'),
(189, 'THR', '22:00:00'),
(190, 'THR', '22:30:00'),
(191, 'THR', '23:30:00'),
(192, 'THR', '23:00:00'),
(193, 'FRI', '00:00:00'),
(194, 'FRI', '00:30:00'),
(195, 'FRI', '01:00:00'),
(196, 'FRI', '01:30:00'),
(197, 'FRI', '02:00:00'),
(198, 'FRI', '02:30:00'),
(199, 'FRI', '03:00:00'),
(200, 'FRI', '03:30:00'),
(201, 'FRI', '04:00:00'),
(202, 'FRI', '04:30:00'),
(203, 'FRI', '05:00:00'),
(204, 'FRI', '05:30:00'),
(205, 'FRI', '06:00:00'),
(206, 'FRI', '06:30:00'),
(207, 'FRI', '07:00:00'),
(208, 'FRI', '07:30:00'),
(209, 'FRI', '08:00:00'),
(210, 'FRI', '08:30:00'),
(211, 'FRI', '09:00:00'),
(212, 'FRI', '09:30:00'),
(213, 'FRI', '10:00:00'),
(214, 'FRI', '10:30:00'),
(215, 'FRI', '11:00:00'),
(216, 'FRI', '11:30:00'),
(217, 'FRI', '12:00:00'),
(218, 'FRI', '12:30:00'),
(219, 'FRI', '13:00:00'),
(220, 'FRI', '13:30:00'),
(221, 'FRI', '14:00:00'),
(222, 'FRI', '14:30:00'),
(223, 'FRI', '15:00:00'),
(224, 'FRI', '15:30:00'),
(225, 'FRI', '16:00:00'),
(226, 'FRI', '16:30:00'),
(227, 'FRI', '17:00:00'),
(228, 'FRI', '17:30:00'),
(229, 'FRI', '18:00:00'),
(230, 'FRI', '18:30:00'),
(231, 'FRI', '19:00:00'),
(232, 'FRI', '19:30:00'),
(233, 'FRI', '20:00:00'),
(234, 'FRI', '20:30:00'),
(235, 'FRI', '21:00:00'),
(236, 'FRI', '21:30:00'),
(237, 'FRI', '22:00:00'),
(238, 'FRI', '22:30:00'),
(239, 'FRI', '23:30:00'),
(240, 'FRI', '23:00:00'),
(241, 'SAT', '00:00:00'),
(242, 'SAT', '00:30:00'),
(243, 'SAT', '01:00:00'),
(244, 'SAT', '01:30:00'),
(245, 'SAT', '02:00:00'),
(246, 'SAT', '02:30:00'),
(247, 'SAT', '03:00:00'),
(248, 'SAT', '03:30:00'),
(249, 'SAT', '04:00:00'),
(250, 'SAT', '04:30:00'),
(251, 'SAT', '05:00:00'),
(252, 'SAT', '05:30:00'),
(253, 'SAT', '06:00:00'),
(254, 'SAT', '06:30:00'),
(255, 'SAT', '07:00:00'),
(256, 'SAT', '07:30:00'),
(257, 'SAT', '08:00:00'),
(258, 'SAT', '08:30:00'),
(259, 'SAT', '09:00:00'),
(260, 'SAT', '09:30:00'),
(261, 'SAT', '10:00:00'),
(262, 'SAT', '10:30:00'),
(263, 'SAT', '11:00:00'),
(264, 'SAT', '11:30:00'),
(265, 'SAT', '12:00:00'),
(266, 'SAT', '12:30:00'),
(267, 'SAT', '13:00:00'),
(268, 'SAT', '13:30:00'),
(269, 'SAT', '14:00:00'),
(270, 'SAT', '14:30:00'),
(271, 'SAT', '15:00:00'),
(272, 'SAT', '15:30:00'),
(273, 'SAT', '16:00:00'),
(274, 'SAT', '16:30:00'),
(275, 'SAT', '17:00:00'),
(276, 'SAT', '17:30:00'),
(277, 'SAT', '18:00:00'),
(278, 'SAT', '18:30:00'),
(279, 'SAT', '19:00:00'),
(280, 'SAT', '19:30:00'),
(281, 'SAT', '20:00:00'),
(282, 'SAT', '20:30:00'),
(283, 'SAT', '21:00:00'),
(284, 'SAT', '21:30:00'),
(285, 'SAT', '22:00:00'),
(286, 'SAT', '22:30:00'),
(287, 'SAT', '23:30:00'),
(288, 'SAT', '23:00:00'),
(289, 'SUN', '00:00:00'),
(290, 'SUN', '00:30:00'),
(291, 'SUN', '01:00:00'),
(292, 'SUN', '01:30:00'),
(293, 'SUN', '02:00:00'),
(294, 'SUN', '02:30:00'),
(295, 'SUN', '03:00:00'),
(296, 'SUN', '03:30:00'),
(297, 'SUN', '04:00:00'),
(298, 'SUN', '04:30:00'),
(299, 'SUN', '05:00:00'),
(300, 'SUN', '05:30:00'),
(301, 'SUN', '06:00:00'),
(302, 'SUN', '06:30:00'),
(303, 'SUN', '07:00:00'),
(304, 'SUN', '07:30:00'),
(305, 'SUN', '08:00:00'),
(306, 'SUN', '08:30:00'),
(307, 'SUN', '09:00:00'),
(308, 'SUN', '09:30:00'),
(309, 'SUN', '10:00:00'),
(310, 'SUN', '10:30:00'),
(311, 'SUN', '11:00:00'),
(312, 'SUN', '11:30:00'),
(313, 'SUN', '12:00:00'),
(314, 'SUN', '12:30:00'),
(315, 'SUN', '13:00:00'),
(316, 'SUN', '13:30:00'),
(317, 'SUN', '14:00:00'),
(318, 'SUN', '14:30:00'),
(319, 'SUN', '15:00:00'),
(320, 'SUN', '15:30:00'),
(321, 'SUN', '16:00:00'),
(322, 'SUN', '16:30:00'),
(323, 'SUN', '17:00:00'),
(324, 'SUN', '17:30:00'),
(325, 'SUN', '18:00:00'),
(326, 'SUN', '18:30:00'),
(327, 'SUN', '19:00:00'),
(328, 'SUN', '19:30:00'),
(329, 'SUN', '20:00:00'),
(330, 'SUN', '20:30:00'),
(331, 'SUN', '21:00:00'),
(332, 'SUN', '21:30:00'),
(333, 'SUN', '22:00:00'),
(334, 'SUN', '22:30:00'),
(335, 'SUN', '23:30:00'),
(336, 'SUN', '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userproject`
--

CREATE TABLE IF NOT EXISTS `userproject` (
  `UserID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `TS_IDs` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL DEFAULT '',
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` int(10) NOT NULL,
  `LastLoggedIn` date NOT NULL,
  `IsAvailable` tinyint(1) NOT NULL,
  `KarmaPoints` int(100) NOT NULL,
  `Availability` mediumtext NOT NULL COMMENT 'It uses TS_IDs',
  `Zipcode` int(5) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `Phone`, `LastLoggedIn`, `IsAvailable`, `KarmaPoints`, `Availability`, `Zipcode`) VALUES
(1, 'Cyrus', 'jasonyip@usc.edu', 'test123', 0, '0000-00-00', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userskill`
--

CREATE TABLE IF NOT EXISTS `userskill` (
  `UserID` int(11) NOT NULL,
  `Skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains users and their skills. One skill per row.';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
