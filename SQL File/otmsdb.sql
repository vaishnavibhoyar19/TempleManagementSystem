-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 09:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abhishek`
--

CREATE TABLE `abhishek` (
  `A_ID` int(10) NOT NULL,
  `TempleID` int(10) NOT NULL,
  `AbhishekName` varchar(30) NOT NULL,
  `Price` int(10) NOT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(20) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abhishek`
--

INSERT INTO `abhishek` (`A_ID`, `TempleID`, `AbhishekName`, `Price`, `BookingDate`, `Remark`, `Status`) VALUES
(2, 17, 'Daily Pooja', 500, '2022-08-09 18:30:00', '', ''),
(4, 17, 'Maha Abhishek', 400, '2022-08-12 05:30:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9179555559, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `bookabhishek`
--

CREATE TABLE `bookabhishek` (
  `A_ID` int(20) NOT NULL,
  `BookingNumber` int(20) NOT NULL,
  `TempleID` int(20) NOT NULL,
  `UserID` int(20) NOT NULL,
  `AbhishekName` varchar(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `DateOfAbhishek` date DEFAULT NULL,
  `TimeOfAbhishek` time DEFAULT NULL,
  `TotalMember` int(5) NOT NULL,
  `NameOfMember` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Remark` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `AbhishekBookingDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Paid` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookabhishek`
--

INSERT INTO `bookabhishek` (`A_ID`, `BookingNumber`, `TempleID`, `UserID`, `AbhishekName`, `Price`, `DateOfAbhishek`, `TimeOfAbhishek`, `TotalMember`, `NameOfMember`, `Description`, `Remark`, `Status`, `AbhishekBookingDate`, `Paid`) VALUES
(18, 588356183, 17, 5, 'Maha Abhishek', 400, '2022-09-04', '14:38:00', 2, 'Tirang, Kiran', ' fffffff', '', 'Accepted', '2022-09-03 07:09:40.906757', ''),
(30, 339226032, 17, 5, 'Daily Pooja', 500, '2022-09-17', '13:28:00', 2, 'Nikita', ' hhhhh', '', 'Accepted', '2022-09-16 18:59:08.098571', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bookdarshan`
--

CREATE TABLE `bookdarshan` (
  `ID` int(5) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `TempleID` int(5) DEFAULT NULL,
  `DateofDarshan` date DEFAULT NULL,
  `TimeofDarshan` time DEFAULT NULL,
  `TotalMember` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookdarshan`
--

INSERT INTO `bookdarshan` (`ID`, `BookingNumber`, `UserID`, `TempleID`, `DateofDarshan`, `TimeofDarshan`, `TotalMember`, `Message`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(6, 785012992, 5, 1, '2022-08-07', '11:09:00', 4, ' for own family', '2022-08-06 16:42:46', '', 'Accepted', '2022-08-06 16:42:46'),
(17, 375407701, 7, 1, '2022-09-18', '16:25:00', 2, ' Members- Tirang, Kiran', '2022-09-18 08:56:10', NULL, NULL, '2022-09-18 08:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `bookpooja`
--

CREATE TABLE `bookpooja` (
  `P_ID` int(10) NOT NULL,
  `BookingNumber` int(10) NOT NULL,
  `TempleID` int(5) NOT NULL,
  `UserID` int(10) NOT NULL,
  `PoojaName` varchar(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `DateofPooja` date DEFAULT NULL,
  `TimeofPooja` time DEFAULT NULL,
  `TotalMember` int(5) NOT NULL,
  `NameOfMember` varchar(20) NOT NULL,
  `Prasad` varchar(10) NOT NULL,
  `Remark` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `PoojaBookingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookpooja`
--

INSERT INTO `bookpooja` (`P_ID`, `BookingNumber`, `TempleID`, `UserID`, `PoojaName`, `Price`, `DateofPooja`, `TimeofPooja`, `TotalMember`, `NameOfMember`, `Prasad`, `Remark`, `Status`, `PoojaBookingDate`) VALUES
(1, 218261910, 17, 5, 'Daily pooja', 900, '2022-08-14', '11:45:00', 2, 'Nikita', 'Yes', '', 'Rejected', NULL),
(6, 491202543, 17, 5, 'Mahamangal Pooja', 900, '2022-09-11', '14:57:00', 5, 'Kiran,Nikita,Vishal', 'NO', '', '', '2022-09-10 09:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `devotees`
--

CREATE TABLE `devotees` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `StreetName` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `ZipCode` text NOT NULL,
  `Landmark` varchar(30) NOT NULL,
  `City` varchar(20) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devotees`
--

INSERT INTO `devotees` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `StreetName`, `Location`, `ZipCode`, `Landmark`, `City`, `RegDate`) VALUES
(5, 'Nikita', 'Kale', 9156677889, 'nikita@gmail.com', 'a500b93bd1d753f1155876ea03d3b6de', 'Mauli Niwas', 'Dattanagar', '411034', 'Near AB Hospital', 'Pune', '2022-08-06 09:51:10'),
(7, 'Tirang', 'Gangarde', 9322584950, 'tirang@gmail.com', 'bc934c5df93608a0060f5e0e0555f00a', 'Mauli Niwas', 'Dattanagar', '411033', 'Near AB Hospital', 'Thergoan', '2022-09-16 16:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `ID` int(5) NOT NULL,
  `DonationNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `TempleID` int(5) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `State` varchar(250) DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `PANNumber` varchar(200) DEFAULT NULL,
  `DonationAmount` decimal(10,0) DEFAULT NULL,
  `PaymentOption` varchar(50) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `DonationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`ID`, `DonationNumber`, `UserID`, `TempleID`, `City`, `State`, `Country`, `PANNumber`, `DonationAmount`, `PaymentOption`, `Message`, `DonationDate`) VALUES
(66, 608421233, 5, 1, 'pune', 'maharashtra', 'India', 'ASDFE1234P', '400', 'online', ' Hi', '2022-09-02 04:43:56'),
(70, 765754481, 5, 4, 'Thergoan', 'Maharashtra', 'India', 'WERTY8907L', '3000', 'online', 'for self', '2022-09-02 04:48:22'),
(93, 614558815, 7, 17, 'Dattanagar', 'Maharashtra', 'India', 'DGFHJ1235K', '5000', 'online', ' Donation for my own reason.', '2022-09-16 16:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Id` int(5) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `OverallExperience` varchar(20) NOT NULL,
  `Performance` varchar(20) NOT NULL,
  `UserFriendly` varchar(20) NOT NULL,
  `AnyComment` varchar(40) NOT NULL,
  `feedbackDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Id`, `Name`, `Email`, `OverallExperience`, `Performance`, `UserFriendly`, `AnyComment`, `feedbackDate`) VALUES
(4, 'Antu', 'antu@gmail.com', '5-Excellent', '4', '2-poor', 'Poor', '2022-09-11 10:46:24'),
(5, 'Tirang Gangarde', 'tirang467@gmail.com', '4- Good', '3- Average', '7- Average', 'Nothing', '2022-09-11 10:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: center;\"><b style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif;\"><font size=\"6\">Smart Temple System</font></b></div><div style=\"text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; background-color: rgb(251, 251, 251);\"><font size=\"4\">Offering Pujas to murtis of Ganesha, Muruga and Shiva, it was founded on the traditions of Saiva Siddhanta and known as the Palaniswami Sivan Temple. It quickly became a popular site for the ever growing populace of newly arriving Hindus, some of whom personally knew of the Sage from Sri Lanka, YogaSwami, who initiated the American Guru. grow over the years, and on traditional festival days, the small temple could hardly accomodate the crowd of devotees. In 1988, to better facilitate the Hindu community, the temple was moved to a larger site in Concord, CA. The site was chosen due to availability and the fact that it had always been a place of worship.</font></span></div><div style=\"text-align: justify;\"><font size=\"4\"><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; background-color: rgb(251, 251, 251);\">The Temple has brouht the priest form all of India&nbsp;</span><span style=\"background-color: rgb(251, 251, 251); color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: left;\">&nbsp;</span><span style=\"background-color: rgb(251, 251, 251); color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: left;\">to oversee the daily rituals.</span><span style=\"background-color: rgb(251, 251, 251); color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: left;\">The first few years have been most generally spent in maintaining the buildings and a dependable schedule of religious events.</span></font></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'Pune', 'temple@gmail.com', 7896541236, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pooja`
--

CREATE TABLE `pooja` (
  `P_ID` int(20) NOT NULL,
  `TempleID` int(20) NOT NULL,
  `TempleName` varchar(30) NOT NULL,
  `PoojaName` varchar(30) NOT NULL,
  `Price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pooja`
--

INSERT INTO `pooja` (`P_ID`, `TempleID`, `TempleName`, `PoojaName`, `Price`) VALUES
(2, 17, '', 'Mahamangal Pooja', 900),
(3, 4, '', 'Daily Pooja', 600),
(4, 12, '', 'Rajbhog Pooja', 1200),
(5, 1, '', 'Mangala Pooja', 300),
(6, 1, '', 'Bhog Pooja', 150);

-- --------------------------------------------------------

--
-- Table structure for table `temple`
--

CREATE TABLE `temple` (
  `ID` int(5) NOT NULL,
  `TempleName` varchar(250) DEFAULT NULL,
  `TempleLocation` varchar(250) DEFAULT NULL,
  `State` varchar(250) DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `Religion` varchar(30) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `OpeningTime` varchar(50) DEFAULT NULL,
  `AartiTime` varchar(200) DEFAULT NULL,
  `Festivals` varchar(100) NOT NULL,
  `TempleImage1` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temple`
--

INSERT INTO `temple` (`ID`, `TempleName`, `TempleLocation`, `State`, `Country`, `Religion`, `Description`, `OpeningTime`, `AartiTime`, `Festivals`, `TempleImage1`, `CreationDate`) VALUES
(1, 'Kashi Vishwanath Temple', 'Varanasi', 'Maharashtra', 'India', 'Hindu', 'Kashi Vishwanath Temple is one of the most famous temple in Varanasi, also known as the Golden temple dedicated to the Lord Shiva. It was constructed in the year 1780 by the Maratha monarch, Maharani Ahilyabai Holkar of the Indore. This makes Varanasi a tourists place because of great religious importance to the Hindus. The gold used to cover the two domes of the temple was donated by the Punjab Kesari, the Sikh Maharaja Ranjit Singh, who ruled the Punjab. Now, after 28 January 1983, this temple becomes the property of the government of Uttar Pradesh and it is managed by Dr. Vibhuti Narayan Singh, then by the Kashi Naresh.\r\n\r\nCurrent structure built in: 1780\r\nCreator: Maharani Ahilyabai Holkar\r\n\r\nOpening time of the temple is: 3:00 am\r\n\r\nAarti time:\r\nMangala Aarti : 3 AM- 4 AM (Morning)\r\nBhog Aarti : 11.15 AM to 12.20 PM (Day)\r\nSandhya Aarti : 7 PM to 8.15 PM (Evening)\r\nShringar Aarti : 9 PM to 10.15 PM (Night)\r\nShayan Aarti : 10.30 PM â€“ 11 PM (Night)\r\n\r\nHow to reach to the temple: You can reach to the temple by having an auto rickshaw or taxi.', '4 am to 11 pm', 'Mangala Aarti : 4 am , Bhogaarti – 11:15 am to 12:30 pm , Sandhya aarti – 7 pm to 8:15 pm , Shringar Aarti - 9 pm to 10:15 pm , Shayan Aarti – 10:30 pm to 11 pm', 'Mahashivaratri, Makara Sankranthi, Shravan festiva', 'e927bc866b006ec9c5362f644f60f228.jpg', '2022-03-24 11:10:07'),
(4, 'Shirdi Sai Temple', 'Nashik', 'Maharashtra', 'India', 'Hindu', 'Shirdi is a major religious site in the Indian state of Maharashtra, located near Nashik. It is famous as the â€œland of Saiâ€. Shirdi is the home of the great saint Sai Baba where various temples are built, besides the famous Sai Baba temple and some historical sites. Located in Ahmednagar district of Maharashtra, Shirdi is a very sacred and pilgrimage place for the devotees of Sai Baba, where a large number of devotees come to visit every year.', '4:00 AM to 10:30 PM', '4:30 AM Kakad Aarti (Morning) , 5:00 AM Bhajan ,5:40 AM  Darshan Begins , 12:00 PM  Mid-day Aarti , 4:00 PM  Pothi Reading , 10:30 PM  Shej Aarti.', 'Ramnavami (March/April), Guru Purnima (July),and Vijayadashami (September).', '53ba34d755d1bbefcb7edb2f8faff5b1.jpg', '2022-03-24 11:24:57'),
(12, 'Shri Swaminarayan Mandir', 'Mumbai', 'Maharashtra', 'India', 'Hindu', 'Shri Swaminarayan Mandir, Mumbai  is a Hindu temple (Mandir) and a part of the Swaminarayan Sampraday. This Swaminarayan Temple is located in the Bhuleshwar area of Mumbai and is the oldest Swaminarayan Mandir in Mumbai, being over a hundred years old.\r\n\r\nThe present Mandir has a tri - spire structure and the Murtis installed are that of Laxminarayan Dev with Ghanshyam Maharaj, and Radha Krishna Dev with Hari Krishna Maharaj. In this temple, Radha Krishna are worshipped in the form of Radha Golokvihari as they are the residents of Goloka. It is a Shikharband Mandir and comes under the Laxminarayan Dev Gadi (Vadtal).[3] This temple is one of many in the Bhuleshwar area that led to the birth of Phool Galli (or flower market) in Bhuleshwar due to the high demand of flowers in these temples.', '7:30 AM to 6.30 PM', 'Daily Aarti Time:Morning: 7:30 AM Evening: 6:30 PM', 'Diwali Utsav, Shree hari Janmotsav, Shakotsav, Janmastami and Navratri.', 'b84dfdee0b73834ed103d5578cc90d34.jpg', '2022-07-27 05:18:45'),
(17, 'Dagdusheth Halwai Ganpati', 'Pune', 'Maharashtra', 'India', 'Hindu', 'Shreemant Dagdusheth Halwai Ganpati – the most endearing deity to the devotees. Shreemant Dagdusheth Halwai Ganpati is the epitome of pride and honor to the city of Pune. Devotees from every part of India and the world come here to pray to Lord Ganesha every year. Today, Shreemant Dagdusheth Halwai Mandir is not only one of the most highly revered places of worship in India but an institution that is actively engaged in social welfare and cultural development through Shreemant Dagdusheth Halwai Sarvajanik Ganpati Trust. The temple speaks of a long and glorious history. The deity of Lord Ganesha was incepted by Shri Dagdusheth Halwai and his wife Lakshmibai way back, when they lost their only son to the plague epidemic. Every year, the Ganpati festival was celebrated with deep faith and enthusiasm, not only by Dagdusheth’s family but the entire neighbourhood.', '5:00 AM to 10:30 PM', 'Suprabhatam Aarti – 07:30 AM to 07:45 AM, Naivedyam – 01:30 PM to 01:45 PM , Madhyana Aarti – 03:00 PM to 03:15 PM , Mahamangal Aarti – 08:00 PM to 09:00 PM', 'Vinayaki Chaturthi, Ashadi Ekadashi,  Guru Purnima', '3ea8fa187147fb59c6b35c537d40d64f.jpg', '2022-07-27 14:45:58'),
(18, 'Afghan Church', 'Mumbai', 'Maharashtra', 'India', 'Christian', 'The Church of St John the Evangelist, also known as Afghan Church, is located at Navy Nagar in Colaba, Mumbai. It is a Presbyterian Church built by the British in the honour of those who died in the First Afghan War of 1838. The church also memorialises the Bombay Army, Madras Army and Maharaja Ranjit Singh’s Army from Lahore.', '6:00 AM to 7:00 PM', 'NA.', 'Christmas', '3ff1100c1525aa82f83537ee3f7d6b5c.jpg', '2022-07-28 06:24:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abhishek`
--
ALTER TABLE `abhishek`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bookabhishek`
--
ALTER TABLE `bookabhishek`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `bookdarshan`
--
ALTER TABLE `bookdarshan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bookpooja`
--
ALTER TABLE `bookpooja`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `devotees`
--
ALTER TABLE `devotees`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pooja`
--
ALTER TABLE `pooja`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `temple`
--
ALTER TABLE `temple`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abhishek`
--
ALTER TABLE `abhishek`
  MODIFY `A_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookabhishek`
--
ALTER TABLE `bookabhishek`
  MODIFY `A_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bookdarshan`
--
ALTER TABLE `bookdarshan`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bookpooja`
--
ALTER TABLE `bookpooja`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `devotees`
--
ALTER TABLE `devotees`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pooja`
--
ALTER TABLE `pooja`
  MODIFY `P_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temple`
--
ALTER TABLE `temple`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
