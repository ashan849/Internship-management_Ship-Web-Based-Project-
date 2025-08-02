-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 08:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `ApproveID` int(11) NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approve`
--

INSERT INTO `approve` (`ApproveID`, `State`) VALUES
(1, 0),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CompanyID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` text DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Industry` varchar(255) DEFAULT NULL,
  `LogoPath` longblob DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ApproveID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyID`, `Name`, `Address`, `Description`, `Industry`, `LogoPath`, `UserID`, `ApproveID`) VALUES
(5, 'Company E', '00/0, Gunawardane Mawatha, Mahara, Kadawatha ', 'Surveying is considered as a skilled profession because modern surveyors require a broad basis of technical training and experience, as well as the able to utilize independent judgment. Colombo Institute for Engineering Survey and Design is a technology-driven surveying, mapping and geospatial services company in Sri Lanka. Our team provides superior services in Construction management, Engineering survey and Hydrographic consultancy. \\r\\nWe actively support commercial, industrial, development, and other large-scale projects with superior surveying technologies and services. Institute for Engineering Survey and Design(CIES) is a privately held company founded as a local investment in the year 2015, and registered under the Companies act no. 5 0f 2011 of the Sri Lanka in the year 2015. Our company is headquartered in the Mahara Pradesiyasaba area at Gampaha district. Our success is the result of working diligently as a team to do each job right as well as maintaining a long-term perspective and integrity in the face of daily pressures. The value of our services is derived from our commitment to produce consistently high quality work within the constraints of the client’s schedule and budget.\\r\\n', 'Construction', NULL, 18, 0),
(6, 'Survey Engineering Co. (Pvt) Ltd', '11/1 Kuda Edanda Road,\\r\\nWattala,\\r\\nGQ 11300,\\r\\nSri Lanka.\\r\\n', 'We, the Survey Engineering Company Limited, founded in xxxx, is the first incorporated surveying company in Sri Lanka, who can claim 30 years of professional experience. It is one of the premier institutions help fill a gap that existed after the liberalization of the economy in the seventies. The Company was organized with a view to satisfy the sophisticated demands called for by the rapid development programme of the Government. Our staff consists of qualified and experienced Surveyors, Cad Draughtsmen, Valuers, Architects, Engineers, Town Planners, Economists and IT personnel', 'Construction', NULL, 19, 0),
(7, ' Consultancy Services (Pvt) Ltd', '\\r\\nConsultancy Services (Pvt) Ltd,\\r\\nNo. xxxx,\\r\\n2nd Floor,\\r\\nColombo 08,\\r\\nRajagiriya Road,\\r\\nRajagiriya\\r\\nSri Lanka. \\r\\n', ' Consultancy Services (Pvt) Ltd. is a company formed by two professionals for the purpose of undertaking Quantity Surveying and Construction Cost Consultancy Services in Building and Civil Engineering projects. The Organization commenced operations as a partnership in 1987 and subsequently was registered as a private limited liability company in 1994. This is the first independent and ISO Certified Quantity Surveying Organization in Sri Lanka run by Sri Lankan nationals. \\r\\nThe Company has had the opportunity of serving several leading Architectural and Engineering establishments in Sri Lanka and Overseas as their specialist Quantity Surveyors and Cost Consultants and has served as independent Cost Consultants and advisers, to several leading business organizations in Sri Lanka\\r\\n', 'Construction', NULL, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `internshipapplications`
--

CREATE TABLE `internshipapplications` (
  `ApplicationID` int(11) NOT NULL,
  `app_StudentID` int(11) DEFAULT NULL,
  `app_CompanyID` int(11) DEFAULT NULL,
  `ApplicationDate` datetime DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internshipapplications`
--

INSERT INTO `internshipapplications` (`ApplicationID`, `app_StudentID`, `app_CompanyID`, `ApplicationDate`, `Status`) VALUES
(14, 1, 5, '2024-01-22 20:13:23', 'Approved'),
(15, 4, 6, '2024-01-22 20:25:34', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`) VALUES
(10, 'Student'),
(20, 'Company'),
(30, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Faculty` varchar(255) DEFAULT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `ProfilePhoto` longblob DEFAULT NULL,
  `CV` longblob DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `IndexNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `FirstName`, `LastName`, `Faculty`, `Course`, `ProfilePhoto`, `CV`, `UserID`, `IndexNumber`) VALUES
(1, 'Ashen', 'Jayarathne', 'Geomatics', 'Surveying Science', 0x75706c6f6164732f4c6f676f2d5355534c2e706e67, 0x75706c6f6164732f455220312e706466, 5, '19GES1156'),
(4, 'Ashan', 'Pradeep', 'Geomatics', 'Surveying Science', '', 0x75706c6f6164732f464332323233392d3139474553313135362e706466, 17, '19GES1173');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `ApproveID` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `RoleID`, `ApproveID`) VALUES
(1, 'ims_admin@ims.com', '$2y$10$7lNYBdYYAnZANUf2aUjVVucPT5BeyygphIn9u1K5ET3fATpfXGssa', 30, 2),
(5, 'ashenjayarathne@gmail.com', '$2y$10$vENEwRyfNf66ZMkeK7bjEOR6Tl5XMVL8WE584EfPhzq8g4M5.PO02', 10, 2),
(17, 'ashan@gmail.com', '$2y$10$3TvKgykiGUnCjwVSZu0SwOOkYt0zDmNxEmHstbhf1eOi4o2QPwEHq', 10, 2),
(18, 'company_e@gmail.com', '$2y$10$7FKCR1vZyWk0q8fWTbx2V.F8Ec0ieQFdRJtOWsj48F5kzEZddmH52', 20, 2),
(19, 'company_a@gmail.com', '$2y$10$Mb/Db2Pe9m5w3sbme6Nnn.QFrNtWobVgfhL/upLSLttfXQ1PPU1uq', 20, 2),
(20, 'company_b@gmail.com', '$2y$10$Z36v7SGvuddddu36VgJ82uglLrm.6kG4S7YrFAkKyml/VCz8rLRRy', 20, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`ApproveID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ApproveID` (`ApproveID`);

--
-- Indexes for table `internshipapplications`
--
ALTER TABLE `internshipapplications`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `app_StudentID` (`app_StudentID`),
  ADD KEY `app_CompanyID` (`app_CompanyID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `IndexNumber` (`IndexNumber`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `user_ibfk_approve` (`ApproveID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `ApproveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `internshipapplications`
--
ALTER TABLE `internshipapplications`
  MODIFY `ApplicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `internshipapplications`
--
ALTER TABLE `internshipapplications`
  ADD CONSTRAINT `internshipapplications_ibfk_1` FOREIGN KEY (`app_StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `internshipapplications_ibfk_2` FOREIGN KEY (`app_CompanyID`) REFERENCES `company` (`CompanyID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`),
  ADD CONSTRAINT `user_ibfk_approve` FOREIGN KEY (`ApproveID`) REFERENCES `approve` (`ApproveID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
