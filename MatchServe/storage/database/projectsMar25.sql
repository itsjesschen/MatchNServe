-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2013 at 07:22 PM
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
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectID`, `Name`, `Details`, `Location`, `StartTime`, `EndTime`, `Spots`, `Admin`, `Status`, `Requirements`, `Headline`, `Image`) VALUES
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
