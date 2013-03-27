-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2013 at 12:53 AM
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
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`OrganizationID`,`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`OrganizationID`, `UserID`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(3, 3),
(1, 4),
(5, 4),
(5, 5),
(4, 12),
(5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE IF NOT EXISTS `causes` (
  `CauseID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`CauseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`CauseID`, `Description`) VALUES
(1, 'Animals'),
(2, 'Science and Technology'),
(3, 'Education Literacy'),
(4, 'Family and Youth'),
(5, 'Politics and Government'),
(6, 'Food and Culinary'),
(7, 'Environment'),
(8, 'Health and Wellness'),
(9, 'Human Rights and Justice'),
(10, 'Community Development'),
(11, 'Religion and Spirituality'),
(12, 'Internship and Jobs'),
(13, 'Arts and Recreation'),
(14, 'Homelessness and Poverty'),
(15, 'Women''s Rights');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `OrganizationID` int(11) NOT NULL AUTO_INCREMENT,
  `OrgName` varchar(200) NOT NULL,
  `CauseID` int(11) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Zipcode` varchar(5) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Website` varchar(1000) NOT NULL,
  `Mission` varchar(1000) NOT NULL,
  PRIMARY KEY (`OrganizationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`OrganizationID`, `OrgName`, `CauseID`, `Address`, `Zipcode`, `Phone`, `Website`, `Mission`) VALUES
(1, 'Volunteer Master', 14, '', '', 0, '', ''),
(2, 'Serving Nation', 14, '', '', 0, '', ''),
(3, 'Downtown Women''s Center', 15, '', '', 0, '', ''),
(4, 'Jericho Road Project', 9, '', '', 0, '', ''),
(5, 'USC Social Work Services', 10, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orgproject`
--

CREATE TABLE IF NOT EXISTS `orgproject` (
  `OrganizationID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  PRIMARY KEY (`OrganizationID`,`ProjectID`),
  KEY `ProjectID` (`ProjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orgproject`
--

INSERT INTO `orgproject` (`OrganizationID`, `ProjectID`) VALUES
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(5, 24),
(5, 25),
(5, 26),
(5, 27);

-- --------------------------------------------------------

--
-- Table structure for table `pgfjoin`
--

CREATE TABLE IF NOT EXISTS `pgfjoin` (
  `ProjectID` int(11) NOT NULL,
  `PGF_ID` int(11) NOT NULL,
  PRIMARY KEY (`ProjectID`,`PGF_ID`),
  KEY `PGF_ID` (`PGF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pgfjoin`
--

INSERT INTO `pgfjoin` (`ProjectID`, `PGF_ID`) VALUES
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `projectgoodfor`
--

CREATE TABLE IF NOT EXISTS `projectgoodfor` (
  `PGF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(150) NOT NULL,
  PRIMARY KEY (`PGF_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `projectgoodfor`
--

INSERT INTO `projectgoodfor` (`PGF_ID`, `Description`) VALUES
(1, 'Kids'),
(2, 'Seniors'),
(3, 'Singles'),
(4, 'Families'),
(5, 'Groups'),
(6, 'Students');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(100) NOT NULL,
  `Details` varchar(2000) NOT NULL,
  `Location` char(5) DEFAULT NULL COMMENT 'The postcode of where the project will be',
  `StartTime` datetime NOT NULL COMMENT 'Time the project starts',
  `EndTime` datetime NOT NULL,
  `Spots` int(4) NOT NULL COMMENT 'Number of open spots for the project',
  `Admin` int(100) NOT NULL COMMENT 'references UserID',
  `Status` enum('Open','Closed','Draft') NOT NULL,
  `Requirements` varchar(2000) DEFAULT NULL,
  `Headline` varchar(1000) NOT NULL COMMENT 'The headline of the project',
  `Image` varchar(1000) NOT NULL,
  PRIMARY KEY (`ProjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectID`, `ProjectName`, `Details`, `Location`, `StartTime`, `EndTime`, `Spots`, `Admin`, `Status`, `Requirements`, `Headline`, `Image`) VALUES
(14, 'Web Developer', 'Knowledge of Lavarel, PHP and MySQL required. More backend development is involved.', '90071', '2013-03-04 10:00:00', '2013-03-08 16:00:00', 2, 1, 'Open', NULL, 'Know backend web dev?? Prove it!', ''),
(15, 'Kitchen Help', 'We need help unloading food cargo from the trucks. These food supplies then needs to be shelved. Help distribute food out as well. Lastly, help clean up the kitchen!', '90012', '2013-03-05 16:00:00', '2013-03-05 19:00:00', 10, 1, 'Open', NULL, 'Help feed the homeless!', ''),
(16, 'Family Counselor', 'Help counsel rape victims and their family. These people have suffered more than anyone should.', '90057', '2013-03-11 00:00:00', '2013-04-11 00:00:00', 1, 3, 'Open', 'Need to be certified professional. We will conduct a background check upon application.', 'Help those who really need it.', ''),
(17, 'Special Events Co-ordinator', 'Weeklong awareness campaign at LA Live! We need professional help to plan and coordinate the entire event with Downtown Women''s Center board!', '90015', '2013-03-11 00:00:00', '2013-03-15 00:00:00', 1, 3, 'Open', 'Professional background in events coordination', 'Are you OCD when it comes to event planning? We need you!', ''),
(18, 'Plumber', 'Unclog every single clogged pipe in the entire building! It''s stuck with grimy, disgusting goo that no one else would go within 500 feet off.', '90201', '2013-03-20 09:00:00', '2013-03-20 16:00:00', 0, 2, 'Open', NULL, 'Get down and dirty to clean!', ''),
(19, 'Child Care Co-ordinator', 'Help coordinate our child care efforts. Tasks range from hiring additional child carers as well as overseeing the entire operation.', '90007', '2013-03-04 00:00:00', '2013-09-04 00:00:00', 1, 2, 'Open', 'Must pass background check.', 'Love children? Love ordering people around?', ''),
(20, 'Brand Awareness Ambassador', 'Raise awareness about the organization at USC. Includes handing out flyers around the school, sticking posters all around the campus and nagging students as they eat at the campus center.', '90089', '2013-03-18 00:00:00', '2013-03-22 00:00:00', 10, 12, 'Open', NULL, 'It''s all in the brand.', ''),
(21, 'Social Worker Internship', 'Help do stuff around the office. You''re responsible for everything anyone tells you. Yes, that includes the janitor. But seriously, this internship will look so good on your resume, you''ll stand out like a sore thumb among all the other plain resumes.', '90803', '2013-04-01 00:00:00', '2013-10-01 00:00:00', 4, 12, 'Open', NULL, 'Help us, help you.', ''),
(24, 'Art Teacher', 'Help Main Fullterton Elementary School fill an open position. Teach aspiring artists how to get things done!', '92833', '2013-04-01 00:00:00', '2013-11-02 00:00:00', 1, 5, 'Open', 'Degree in education is required.', '', ''),
(25, 'Yoga Instructor', 'Teach yoga for one week (Our current instructor is getting married and is on his honeymoon). Sorry we do not provide any clothing or mats. We don''t have a location too so if we can use your place, that''d be great.', '90089', '2013-03-18 00:00:00', '2013-03-22 00:00:00', 1, 5, 'Open', 'Licensed instructors only! No perverts.', '', ''),
(26, 'Spiritual Development', 'People need direction in their spiritual life. Why not be that guiding light for them in this time of need?', '92821', '2013-03-26 09:00:00', '2013-03-26 14:00:00', 2, 13, 'Open', NULL, 'Spiritually Drained Aid', ''),
(27, 'Homeless Shelter VP', 'Our previous VP is no longer capable of overseeing the entire operation (he is now homeless too. Can you imagine that? What would the press think omg). Help our create errands for our other volunteers to help homeless people.', '90013', '2013-03-01 00:00:00', '2014-03-01 00:00:00', 1, 13, 'Open', NULL, 'The homeless plight continues.', '');

-- --------------------------------------------------------

--
-- Table structure for table `projectskill`
--

CREATE TABLE IF NOT EXISTS `projectskill` (
  `ProjectID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL,
  PRIMARY KEY (`ProjectID`,`SkillID`),
  KEY `SkillID` (`SkillID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each row has one skill. A proj with 2 skills will take 2 rows.';

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `SkillID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`SkillID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`SkillID`, `Description`) VALUES
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
-- Table structure for table `userproject`
--

CREATE TABLE IF NOT EXISTS `userproject` (
  `UserID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Approved` int(1) NOT NULL COMMENT '1 = approved, 0 = awaiting approval',
  PRIMARY KEY (`UserID`,`ProjectID`),
  KEY `ProjectID` (`ProjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL DEFAULT '' COMMENT 'This is the username of the user.',
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` int(10) NOT NULL,
  `LastLoggedIn` date NOT NULL,
  `IsAvailable` tinyint(1) NOT NULL,
  `KarmaPoints` int(100) NOT NULL,
  `Availability` mediumtext NOT NULL COMMENT 'It uses TS_IDs',
  `Zipcode` int(5) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Username`, `Email`, `Password`, `Phone`, `LastLoggedIn`, `IsAvailable`, `KarmaPoints`, `Availability`, `Zipcode`) VALUES
(1, 'Jason', 'Yip', 'Jason', 'jasonyip@usc.edu', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0),
(2, 'Rodrigo', 'Santos', 'Rodrigo', 'rigotek@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0),
(3, 'Jessica', 'Chen', 'Jessica', 'test2@test.com', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0),
(4, 'George', 'Chearswat', 'George', 'chearswa@usc.edu', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0),
(5, 'Pierre', 'Tasci', 'Pierre', 'tasci@usc.edu', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0),
(12, 'Anita', 'Singh', 'Anita', 'anitas3791@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0),
(13, 'Carina', 'Prynn', 'Carina', 'prynn@usc.edu', '202cb962ac59075b964b07152d234b70', 0, '0000-00-00', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userskill`
--

CREATE TABLE IF NOT EXISTS `userskill` (
  `UserID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`SkillID`),
  KEY `SkillID` (`SkillID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains users and their skills. One skill per row.';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`OrganizationID`) REFERENCES `organizations` (`OrganizationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orgproject`
--
ALTER TABLE `orgproject`
  ADD CONSTRAINT `orgproject_ibfk_2` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orgproject_ibfk_1` FOREIGN KEY (`OrganizationID`) REFERENCES `organizations` (`OrganizationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pgfjoin`
--
ALTER TABLE `pgfjoin`
  ADD CONSTRAINT `pgfjoin_ibfk_2` FOREIGN KEY (`PGF_ID`) REFERENCES `projectgoodfor` (`PGF_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pgfjoin_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectskill`
--
ALTER TABLE `projectskill`
  ADD CONSTRAINT `projectskill_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectskill_ibfk_2` FOREIGN KEY (`SkillID`) REFERENCES `skills` (`SkillID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userproject`
--
ALTER TABLE `userproject`
  ADD CONSTRAINT `userproject_ibfk_2` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userproject_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userskill`
--
ALTER TABLE `userskill`
  ADD CONSTRAINT `userskill_ibfk_2` FOREIGN KEY (`SkillID`) REFERENCES `skills` (`SkillID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userskill_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
