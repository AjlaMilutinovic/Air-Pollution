-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 05:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `air_pollution`
--
CREATE DATABASE IF NOT EXISTS `air_pollution` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `air_pollution`;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `BookmarkID` int(11) NOT NULL,
  `UserFK` int(11) NOT NULL,
  `StationFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(225) COLLATE utf8_bin NOT NULL,
  `CountryFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityID`, `CityName`, `CountryFK`) VALUES
(34, 'Sarajevo', 70),
(35, 'Zenica', 70),
(36, 'Tuzla', 70),
(37, 'Zagreb', 191),
(38, 'Belgrade', 688),
(39, 'Berlin', 276),
(40, 'Moscow', 643),
(41, 'Rome', 380),
(42, 'Tokyo', 392),
(43, 'Sydney', 36),
(44, 'Melbourne', 36),
(45, 'Skopje', 807),
(46, 'Banja Luka', 70);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryID`, `CountryName`) VALUES
(4, 'Afghanistan'),
(8, 'Albania'),
(10, 'Antarctica'),
(12, 'Algeria'),
(24, 'Angola'),
(31, 'Azerbaijan'),
(32, 'Argentina'),
(36, 'Australia'),
(40, 'Austria'),
(44, 'Bahamas'),
(50, 'Bangladesh'),
(51, 'Armenia'),
(56, 'Belgium'),
(64, 'Bhutan'),
(68, 'Bolivia, Plurinational State of'),
(70, 'Bosnia and Herzegovina'),
(72, 'Botswana'),
(76, 'Brazil'),
(84, 'Belize'),
(90, 'Solomon Islands'),
(96, 'Brunei Darussalam'),
(100, 'Bulgaria'),
(104, 'Myanmar'),
(108, 'Burundi'),
(112, 'Belarus'),
(116, 'Cambodia'),
(120, 'Cameroon'),
(124, 'Canada'),
(140, 'Central African Republic'),
(144, 'Sri Lanka'),
(148, 'Chad'),
(152, 'Chile'),
(156, 'China'),
(158, 'Taiwan, Province of China'),
(170, 'Columbia'),
(178, 'Congo'),
(180, 'Congo, the Democratic Republic of the'),
(188, 'Costa Rica'),
(191, 'Croatia'),
(192, 'Cuba'),
(196, 'Cyprus'),
(203, 'Czech Republic'),
(204, 'Benin'),
(208, 'Denmark'),
(214, 'Dominican Republic'),
(218, 'Ecuador'),
(222, 'El Salvador'),
(226, 'Equatorial Guinea'),
(231, 'Ethiopia'),
(232, 'Eritrea'),
(233, 'Estonia'),
(238, 'Falkland Islands (Malvinas)'),
(242, 'Fiji'),
(246, 'Finland'),
(250, 'France'),
(260, 'French Southern Territories'),
(262, 'Djibouti'),
(266, 'Gabon'),
(268, 'Georgia'),
(270, 'Gambia'),
(275, 'Palestinian Territory, Occupied'),
(276, 'Germany'),
(288, 'Ghana'),
(300, 'Greece'),
(304, 'Greenland'),
(320, 'Guatemala'),
(324, 'Guinea'),
(328, 'Guyana'),
(332, 'Haiti'),
(340, 'Honduras'),
(348, 'Hungary'),
(352, 'Iceland'),
(356, 'India'),
(360, 'Indonesia'),
(364, 'Iran, Islamic Republic of'),
(368, 'Iraq'),
(372, 'Ireland'),
(376, 'Israel'),
(380, 'Italy'),
(384, 'Cote d\'Ivoire'),
(388, 'Jamaica'),
(392, 'Japan'),
(398, 'Kazakhstan'),
(400, 'Jordan'),
(404, 'Kenya'),
(408, 'Korea, Democratic People\'s Republic of'),
(410, 'Korea, Republic of'),
(414, 'Kuwait'),
(417, 'Kyrgyzstan'),
(418, 'Lao People\'s Democratic Republic'),
(422, 'Lebanon'),
(426, 'Lesotho'),
(428, 'Latvia'),
(430, 'Liberia'),
(434, 'Libya'),
(440, 'Lithuania'),
(442, 'Luxembourg'),
(450, 'Madagascar'),
(454, 'Malawi'),
(458, 'Malaysia'),
(466, 'Mali'),
(478, 'Mauritania'),
(484, 'Mexico'),
(496, 'Mongolia'),
(498, 'Moldova, Republic of'),
(499, 'Montenegro'),
(504, 'Morocco'),
(508, 'Mozambique'),
(512, 'Oman'),
(516, 'Namibia'),
(524, 'Nepal'),
(526, 'Niger'),
(528, 'Netherlands'),
(540, 'New Calendonia'),
(548, 'Vanuatu'),
(554, 'New Zealand'),
(558, 'Nicaragua'),
(566, 'Nigeria'),
(578, 'Norway'),
(586, 'Pakistan'),
(591, 'Panama'),
(598, 'Papua New Guinea'),
(600, 'Paraguay'),
(604, 'Peru'),
(608, 'Philippines'),
(616, 'Poland'),
(620, 'Portugal'),
(624, 'Guinea-Bissau'),
(626, 'Timor-Leste'),
(630, 'Puerto Rico'),
(634, 'Qatar'),
(642, 'Romania'),
(643, 'Russian Federation'),
(646, 'Rwanda'),
(682, 'Saudi Arabia'),
(686, 'Senegal'),
(688, 'Serbia'),
(694, 'Sierra Leone'),
(703, 'Slovakia'),
(704, 'Vietnam'),
(705, 'Slovenia'),
(706, 'Somalia'),
(710, 'South Africa'),
(716, 'Zimbabwe'),
(724, 'Spain'),
(728, 'South Sudan'),
(729, 'Sudan'),
(732, 'Western Sahara'),
(740, 'Suriname'),
(748, 'Swaziland'),
(752, 'Sweden'),
(756, 'Switzerland'),
(760, 'Syrian Arab Republic'),
(762, 'Tajikistan'),
(764, 'Thailand'),
(768, 'Togo'),
(780, 'Trinidad and Tobago'),
(784, 'United Arab Emirates'),
(788, 'Tunisia'),
(792, 'Turkey'),
(795, 'Turkmenistan'),
(800, 'Uganda'),
(804, 'Ukraine'),
(807, 'Macedonia, the former Yugoslav Republic of'),
(818, 'Egypt'),
(826, 'United Kingdom'),
(834, 'Tanzania, United Republic of'),
(840, 'United States'),
(854, 'Burkina Faso'),
(858, 'Uruguay'),
(860, 'Uzbekistan'),
(862, 'Venezuela, Bolivarian Republic of'),
(887, 'Yemen'),
(894, 'Zambia');

-- --------------------------------------------------------

--
-- Table structure for table `deletelogs`
--

CREATE TABLE `deletelogs` (
  `D_LogID` int(11) NOT NULL,
  `MeasrID` int(11) NOT NULL,
  `DeleteTime` datetime NOT NULL,
  `LogInfo` varchar(100) COLLATE utf8_bin NOT NULL,
  `PollutionIndex` int(11) NOT NULL,
  `PM10` int(11) NOT NULL,
  `O3` int(11) NOT NULL,
  `NO2` int(11) NOT NULL,
  `SO2` int(11) NOT NULL,
  `CO` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `pressure` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `wind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `deletelogs`
--

INSERT INTO `deletelogs` (`D_LogID`, `MeasrID`, `DeleteTime`, `LogInfo`, `PollutionIndex`, `PM10`, `O3`, `NO2`, `SO2`, `CO`, `temp`, `pressure`, `humidity`, `wind`) VALUES
(1, 456, '2019-01-03 01:44:28', 'A measurment has been deleted from Measurments.', 222, 444, 40, 222, 222, 222, 222, 222, 222, 222),
(2, 40, '2019-01-04 14:38:07', 'A measurment has been deleted from Measurments.', 999, 999, 999, 999, 999, 999, 999, 9, 999, 999),
(3, 1, '2019-01-05 22:59:43', 'A measurment has been deleted from Measurments.', 1001, 0, 55, 34, 65, 32, 234, 54, 23, 34),
(4, 2, '2019-01-05 22:59:44', 'A measurment has been deleted from Measurments.', 546, 45, 34, 234, 565, 345, 65, 432, 43, 56),
(5, 3, '2019-01-05 22:59:46', 'A measurment has been deleted from Measurments.', 43, 634, 325, 45, 35, 13, 65, 43, 655, 34),
(6, 4, '2019-01-05 22:59:46', 'A measurment has been deleted from Measurments.', 34, 234, 453, 33, 34, 42, 65, 345, 35, 112),
(7, 454, '2019-01-05 22:59:47', 'A measurment has been deleted from Measurments.', 111, 111, 111, 111, 111, 111, 111, 111, 111, 111),
(8, 889, '2019-01-05 22:59:47', 'A measurment has been deleted from Measurments.', 666, 666, 666, 666, 666, 666, 666, 666, 666, 666),
(9, 1002, '2019-01-05 22:59:48', 'A measurment has been deleted from Measurments.', 77, 77, 77, 77, 77, 77, 77, 77, 77, 77),
(10, 1003, '2019-01-05 22:59:48', 'A measurment has been deleted from Measurments.', 11, 11, 11, 11, 11, 11, 11, 11, 11, 11),
(11, 1004, '2019-01-05 22:59:48', 'A measurment has been deleted from Measurments.', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12),
(12, 1005, '2019-01-05 22:59:49', 'A measurment has been deleted from Measurments.', 13, 13, 13, 13, 13, 13, 13, 13, 13, 13),
(13, 1006, '2019-01-05 22:59:49', 'A measurment has been deleted from Measurments.', 299, 45, 45, 45, 45, 45, 45, 45, 45, 45),
(14, 1007, '2019-01-05 22:59:50', 'A measurment has been deleted from Measurments.', 301, 55, 55, 55, 55, 55, 55, 55, 55, 55),
(15, 1008, '2019-01-05 22:59:50', 'A measurment has been deleted from Measurments.', 25, 0, 25, 25, 25, 25, 25, 25, 25, 100),
(16, 1009, '2019-01-05 22:59:52', 'A measurment has been deleted from Measurments.', 1000, 123, 123, 123, 123, 123, 123, 123, 123, 123),
(17, 1010, '2019-01-05 22:59:53', 'A measurment has been deleted from Measurments.', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `highestpollution`
-- (See below for the actual view)
--
CREATE TABLE `highestpollution` (
`CountryName` varchar(255)
,`CityName` varchar(225)
,`StationName` varchar(255)
,`PollutionIndex` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `insertlogs`
--

CREATE TABLE `insertlogs` (
  `I_LogID` int(11) NOT NULL,
  `MeasrID` int(11) NOT NULL,
  `InsertTime` datetime NOT NULL,
  `LogInfo` varchar(100) COLLATE utf8_bin NOT NULL,
  `PollutionIndex` int(11) NOT NULL,
  `PM10` int(11) NOT NULL,
  `O3` int(11) NOT NULL,
  `NO2` int(11) NOT NULL,
  `SO2` int(11) NOT NULL,
  `CO` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `pressure` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `wind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `insertlogs`
--

INSERT INTO `insertlogs` (`I_LogID`, `MeasrID`, `InsertTime`, `LogInfo`, `PollutionIndex`, `PM10`, `O3`, `NO2`, `SO2`, `CO`, `temp`, `pressure`, `humidity`, `wind`) VALUES
(1, 40, '0000-00-00 00:00:00', 'A new measurment has been inserted into Measurments.', 999, 999, 999, 999, 999, 999, 999, 999, 999, 999),
(2, 1002, '0000-00-00 00:00:00', 'A new measurment has been inserted into Measurments.', 77, 77, 77, 77, 77, 77, 77, 77, 77, 77),
(3, 1003, '0000-00-00 00:00:00', 'A new measurment has been inserted into Measurments.', 11, 11, 11, 11, 11, 11, 11, 11, 11, 11),
(4, 1004, '0000-00-00 00:00:00', 'A new measurment has been inserted into Measurments.', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12),
(5, 1005, '2019-01-02 21:37:11', 'A new measurment has been inserted into Measurments.', 13, 13, 13, 13, 13, 13, 13, 13, 13, 13),
(6, 1006, '2019-01-03 02:31:11', 'A new measurment has been inserted into Measurments.', 299, 45, 45, 45, 45, 45, 45, 45, 45, 45),
(7, 1007, '2019-01-03 02:31:36', 'A new measurment has been inserted into Measurments.', 301, 55, 55, 55, 55, 55, 55, 55, 55, 55),
(8, 1008, '2019-01-03 02:47:37', 'A new measurment has been inserted into Measurments.', 25, 25, 25, 25, 25, 25, 25, 25, 25, 25),
(9, 1009, '2019-01-04 14:53:21', 'A new measurment has been inserted into Measurments.', 1000, 123, 123, 123, 123, 123, 123, 123, 123, 123),
(10, 1010, '2019-01-04 14:53:35', 'A new measurment has been inserted into Measurments.', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10),
(11, 1, '2019-01-11 03:12:56', 'A new measurment has been inserted into Measurments.', 7, 7, 0, 10, 7, 0, 2, 1018, 63, 1),
(12, 2, '2019-01-11 03:19:51', 'A new measurment has been inserted into Measurments.', 95, 16, 37, 2, 23, 3, -3, 1015, 100, 2),
(13, 3, '2019-01-11 03:20:57', 'A new measurment has been inserted into Measurments.', 69, 69, 14, 1, 54, 15, -3, 1015, 100, 2),
(14, 4, '2019-01-11 03:22:38', 'A new measurment has been inserted into Measurments.', 152, 53, 7, 9, 3, 6, -3, 1015, 92, 5),
(15, 5, '2019-01-11 03:23:40', 'A new measurment has been inserted into Measurments.', 124, 43, 11, 10, 6, 11, -2, 1014, 82, 5),
(16, 6, '2019-01-11 03:30:59', 'A new measurment has been inserted into Measurments.', 236, 33, 0, 6, 0, 0, -2, 1013, 93, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lowestpollution`
-- (See below for the actual view)
--
CREATE TABLE `lowestpollution` (
`CountryName` varchar(255)
,`CityName` varchar(225)
,`StationName` varchar(255)
,`PollutionIndex` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `measurments`
--

CREATE TABLE `measurments` (
  `MeasurID` int(11) NOT NULL,
  `PollutionIndex` int(11) NOT NULL,
  `PM10` int(11) NOT NULL,
  `O3` int(11) NOT NULL,
  `NO2` int(11) NOT NULL,
  `SO2` int(11) NOT NULL,
  `CO` int(11) NOT NULL,
  `Temp` int(11) NOT NULL,
  `Pressure` int(11) NOT NULL,
  `Humidity` int(11) NOT NULL,
  `Wind` int(11) NOT NULL,
  `TimeDate` datetime NOT NULL,
  `StationsFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `measurments`
--

INSERT INTO `measurments` (`MeasurID`, `PollutionIndex`, `PM10`, `O3`, `NO2`, `SO2`, `CO`, `Temp`, `Pressure`, `Humidity`, `Wind`, `TimeDate`, `StationsFK`) VALUES
(1, 7, 7, 0, 10, 7, 0, 2, 1018, 63, 1, '2019-01-11 03:12:56', 9),
(2, 95, 16, 37, 2, 23, 3, -3, 1015, 100, 2, '2019-01-11 03:19:51', 1),
(3, 69, 69, 14, 1, 54, 15, -3, 1015, 100, 2, '2019-01-11 03:20:57', 4),
(4, 152, 53, 7, 9, 3, 6, -3, 1015, 92, 5, '2019-01-11 03:22:38', 8),
(5, 124, 43, 11, 10, 6, 11, -2, 1014, 82, 5, '2019-01-11 03:23:40', 7),
(6, 236, 33, 0, 6, 0, 0, -2, 1013, 93, 3, '2019-01-11 03:30:59', 11);

--
-- Triggers `measurments`
--
DELIMITER $$
CREATE TRIGGER `deletelog` AFTER DELETE ON `measurments` FOR EACH ROW BEGIN

INSERT INTO deletelogs SET MeasrID=OLD.MeasurID, DeleteTime=NOW(), LogInfo='A measurment has been deleted from Measurments.', PollutionIndex=OLD.PollutionIndex, PM10=OLD.PM10, O3=OLD.O3, NO2=OLD.NO2, SO2=OLD.SO2, CO=OLD.CO, Temp=OLD.Temp, Pressure=OLD.Pressure, Humidity=OLD.Humidity, Wind=OLD.Wind;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `measurments` FOR EACH ROW BEGIN

INSERT INTO insertlogs SET MeasrID=NEW.MeasurID, InsertTime=NEW.TimeDate, LogInfo='A new measurment has been inserted into Measurments.', PollutionIndex=NEW.PollutionIndex, PM10=NEW.PM10, O3=NEW.O3, NO2=NEW.NO2, SO2=NEW.SO2, CO=NEW.CO, Temp=NEW.Temp, Pressure=NEW.Pressure, Humidity=NEW.Humidity, Wind=NEW.Wind;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` AFTER UPDATE ON `measurments` FOR EACH ROW BEGIN

INSERT INTO updatelogs SET MeasrID=NEW.MeasurID, UpdateTime=NEW.TimeDate, LogInfo='A new update has been made in Measurments.', PollutionIndex=NEW.PollutionIndex, PM10=NEW.PM10, O3=NEW.O3, NO2=NEW.NO2, SO2=NEW.SO2, CO=NEW.CO, Temp=NEW.Temp, Pressure=NEW.Pressure, Humidity=NEW.Humidity, Wind=NEW.Wind;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `StationID` int(11) NOT NULL,
  `StationName` varchar(255) COLLATE utf8_bin NOT NULL,
  `Address` varchar(255) COLLATE utf8_bin NOT NULL,
  `CityFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`StationID`, `StationName`, `Address`, `CityFK`) VALUES
(1, 'Otoka', 'Otoka street', 34),
(2, 'US Embassy', 'Embassy street', 34),
(3, 'Ilidza', 'Ilidza street', 34),
(4, 'Radakovo', 'Radakovo street', 35),
(5, 'Zenica Centar', 'Centar ', 35),
(6, 'Brist', 'Brist street', 35),
(7, 'Zeleno Brdo', 'Zeleno brdo street', 38),
(8, 'Novi Beograd', 'Novi Beograd street', 38),
(9, 'Zagreb 1', 'Zagreb street 1', 37),
(10, 'Zagreb 2', 'Zagreb street 2', 37),
(11, 'Karposh', 'Karposh street', 45);

-- --------------------------------------------------------

--
-- Table structure for table `updatelogs`
--

CREATE TABLE `updatelogs` (
  `U_LogID` int(11) NOT NULL,
  `MeasrID` int(11) NOT NULL,
  `UpdateTime` datetime NOT NULL,
  `LogInfo` varchar(25) COLLATE utf8_bin NOT NULL,
  `CityName` varchar(20) COLLATE utf8_bin NOT NULL,
  `CountryName` varchar(20) COLLATE utf8_bin NOT NULL,
  `StationName` varchar(20) COLLATE utf8_bin NOT NULL,
  `PollutionIndex` int(11) NOT NULL,
  `PM10` int(11) NOT NULL,
  `O3` int(11) NOT NULL,
  `NO2` int(11) NOT NULL,
  `SO2` int(11) NOT NULL,
  `CO` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `pressure` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `wind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `updatelogs`
--

INSERT INTO `updatelogs` (`U_LogID`, `MeasrID`, `UpdateTime`, `LogInfo`, `CityName`, `CountryName`, `StationName`, `PollutionIndex`, `PM10`, `O3`, `NO2`, `SO2`, `CO`, `temp`, `pressure`, `humidity`, `wind`) VALUES
(1, 1, '0000-00-00 00:00:00', 'Record has been INSERTED', '', '', '', 124, 34, 55, 34, 65, 32, 234, 54, 23, 34),
(2, 40, '2019-01-30 00:00:00', 'A new update has been mad', '', '', '', 999, 999, 999, 999, 999, 999, 999, 9, 999, 999),
(3, 1008, '2019-01-03 02:47:37', 'A new update has been mad', '', '', '', 25, 0, 25, 25, 25, 25, 25, 25, 25, 100);

-- --------------------------------------------------------

--
-- Table structure for table `userspasswords`
--

CREATE TABLE `userspasswords` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8_bin NOT NULL,
  `Password` varchar(255) COLLATE utf8_bin NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `LastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `Email` varchar(255) COLLATE utf8_bin NOT NULL,
  `Birthday` date NOT NULL,
  `Regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isAdmin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userspasswords`
--

INSERT INTO `userspasswords` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`, `Birthday`, `Regdate`, `isAdmin`) VALUES
(1, 'Illora', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Ajla', 'Milutinovic', 'ajla@gmail.com', '2018-12-24', '2018-12-24 03:55:50', 1),
(2, 'Mastermind', '596727c8a0ea4db3ba2ceceedccbacd3d7b371b8', 'Artemis', 'Fowl', 'fowl@gmail.com', '2018-12-24', '2018-12-24 03:58:28', 0),
(9, 'Hanna', '05a8ea5382b9fd885261bb3eed0527d1d3b07262', 'Jahan', 'Rahmanova', 'Hanna@gmail.com', '0000-00-00', '2019-01-06 23:11:55', 1),
(20, 'Luke_Sky', '8cb2237d0679ca88db6464eac60da96345513964', 'Luke', 'Skywalker', 'luke@yahoo.com', '0000-00-00', '2019-01-12 02:48:28', 0),
(21, 'Mika', '8cb2237d0679ca88db6464eac60da96345513964', 'Mikasa', 'Ackerman', 'mikasa@yahoo.com', '0000-00-00', '2019-01-12 02:52:47', 0),
(22, 'Fenris', '9f8e8ed4a01ed7432b9394d627922ae3bb0a4fbe', 'Gylve', 'Nagell', 'fenris@yahoo.com', '0000-00-00', '2019-01-12 02:54:16', 0),
(23, 'Bine', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Albin', 'Borancic', 'albin@gmail.com', '1996-02-02', '2019-01-12 03:43:45', 1),
(27, 'Avdo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Abdulah', 'Zeljo', 'zeljo@gmail.com', '1999-01-15', '2019-01-12 04:14:15', 0);

-- --------------------------------------------------------

--
-- Structure for view `highestpollution`
--
DROP TABLE IF EXISTS `highestpollution`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `highestpollution`  AS  select `c`.`CountryName` AS `CountryName`,`cit`.`CityName` AS `CityName`,`s`.`StationName` AS `StationName`,`m`.`PollutionIndex` AS `PollutionIndex` from (((`countries` `c` join `cities` `cit`) join `stations` `s`) join `measurments` `m`) where ((`m`.`StationsFK` = `s`.`StationID`) and (`s`.`CityFK` = `cit`.`CityID`) and (`cit`.`CountryFK` = `c`.`CountryID`) and (`m`.`PollutionIndex` > 300) and (`m`.`TimeDate` > (now() - interval 1 day))) ;

-- --------------------------------------------------------

--
-- Structure for view `lowestpollution`
--
DROP TABLE IF EXISTS `lowestpollution`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lowestpollution`  AS  select `c`.`CountryName` AS `CountryName`,`cit`.`CityName` AS `CityName`,`s`.`StationName` AS `StationName`,`m`.`PollutionIndex` AS `PollutionIndex` from (((`countries` `c` join `cities` `cit`) join `stations` `s`) join `measurments` `m`) where ((`m`.`StationsFK` = `s`.`StationID`) and (`s`.`CityFK` = `cit`.`CityID`) and (`cit`.`CountryFK` = `c`.`CountryID`) and (`m`.`PollutionIndex` < 50) and (`m`.`TimeDate` > (now() - interval 1 day))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`BookmarkID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `CountryFK` (`CountryFK`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `deletelogs`
--
ALTER TABLE `deletelogs`
  ADD PRIMARY KEY (`D_LogID`);

--
-- Indexes for table `insertlogs`
--
ALTER TABLE `insertlogs`
  ADD PRIMARY KEY (`I_LogID`);

--
-- Indexes for table `measurments`
--
ALTER TABLE `measurments`
  ADD PRIMARY KEY (`MeasurID`),
  ADD KEY `StationsFK` (`StationsFK`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`StationID`),
  ADD KEY `CityFK` (`CityFK`);

--
-- Indexes for table `updatelogs`
--
ALTER TABLE `updatelogs`
  ADD PRIMARY KEY (`U_LogID`);

--
-- Indexes for table `userspasswords`
--
ALTER TABLE `userspasswords`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `BookmarkID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;

--
-- AUTO_INCREMENT for table `deletelogs`
--
ALTER TABLE `deletelogs`
  MODIFY `D_LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `insertlogs`
--
ALTER TABLE `insertlogs`
  MODIFY `I_LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `measurments`
--
ALTER TABLE `measurments`
  MODIFY `MeasurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `StationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `updatelogs`
--
ALTER TABLE `updatelogs`
  MODIFY `U_LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userspasswords`
--
ALTER TABLE `userspasswords`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`CountryFK`) REFERENCES `countries` (`CountryID`);

--
-- Constraints for table `measurments`
--
ALTER TABLE `measurments`
  ADD CONSTRAINT `measurments_ibfk_1` FOREIGN KEY (`StationsFK`) REFERENCES `stations` (`StationID`);

--
-- Constraints for table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_ibfk_1` FOREIGN KEY (`CityFK`) REFERENCES `cities` (`CityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
