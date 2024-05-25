-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 12:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `documenttracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `ClientID` int(11) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `MName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `CivilStatus` varchar(255) NOT NULL,
  `ContactNo` varchar(11) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`ClientID`, `FName`, `MName`, `LName`, `Password`, `Gender`, `CivilStatus`, `ContactNo`, `EmailAddress`, `Address`, `Image`) VALUES
(1, 'Oscar Kyanu', 'Cabahug', 'Kho', '$2y$15$Eaj9/VaBCPndT7RR.tMSJuoE6rATi0QtTWkEnQQA6KOLMO1.7/XXO', 'male', 'Married', '09060880593', 'kyanukho@gmail.com', 'Hermilinda Homes, Blk 13, Lot 15', '6641ab9d74e803.41947344.png'),
(2, 'Jazer John', 'Drake', 'Lamar', '$2y$15$ZLldkC1paJ00nA8UG/VUIuiidh.m9yp8t/4sOvyl4zt4n6XpA2Nay', '', '', '', 'jazerjohn@gmail.com', '', '6641ab9d74e803.41947344.png'),
(3, 'Edward', 'Jack', 'Kenway', '$2y$15$VclCV0B2QhM.6q/suXZ8peFvQf.iaEstFTDpgei1fjddGRA/xP9fy', '', '', '', 'edwardkenway@gmail.com', '', ''),
(4, 'Leo Rafael', 'Ojoylan', 'Salo', '$2y$15$t3m8FcbN2kRdXXaUSNNAiu7Pq8wIszG91HBUHX1pwAxY/nkK0Cxjy', '', '', '', 'leorafaelsalo@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clientprocess`
--

CREATE TABLE `tbl_clientprocess` (
  `ClientProcessID` int(11) NOT NULL,
  `ProcessID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `StartDate` datetime NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `OriginalFileName` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clientprocess`
--

INSERT INTO `tbl_clientprocess` (`ClientProcessID`, `ProcessID`, `ClientID`, `StartDate`, `Title`, `Type`, `Status`, `OriginalFileName`, `FileName`) VALUES
(26, 2, 1, '2024-05-19 01:24:29', 'test1', 'New', 'In progress', 'Kho_Final Journal.pdf', '6648e44dc977e5.67021698___Kho_Final Journal.pdf'),
(27, 2, 1, '2024-05-19 08:53:23', 'test2', 'New', 'In progress', 'Kho_Pictures (1).pdf', '66494d83a08701.93481874___Kho_Pictures (1).pdf'),
(28, 1, 1, '2024-05-19 08:53:41', 'test3', 'New', 'In progress', 'Kho_Personal Insights - Assessment Guide Questions.pdf', '66494d959b0419.25536234___Kho_Personal Insights - Assessment Guide Questions.pdf'),
(29, 1, 2, '2024-05-23 00:27:31', 'From Jazer', 'New', 'In progress', 'Endterm Exam- Kyanu.pdf', '664e1cf39683d3.20284229___Endterm Exam- Kyanu.pdf'),
(30, 2, 2, '2024-05-23 00:41:11', 'from jazer2', 'New', 'In progress', 'Endterm Exam- Kyanu.pdf', '664e2027cf40b4.49345925___Endterm Exam- Kyanu.pdf'),
(31, 2, 2, '2024-05-23 00:42:02', 'from jazer', 'New', 'In progress', 'Endterm Exam- Kyanu.pdf', '664e205a0c2df2.29475861___Endterm Exam- Kyanu.pdf'),
(32, 2, 2, '2024-05-23 00:46:51', 'fefejazer', 'New', 'In progress', 'Endterm Exam- Kyanu.pdf', '664e217ba48e29.88977649___Endterm Exam- Kyanu.pdf'),
(33, 2, 2, '2024-05-24 11:20:53', 'Test again1', 'New', 'In progress', 'Kho_Pictures (1).pdf', '66500795061ce2.37381652___Kho_Pictures (1).pdf'),
(34, 2, 2, '2024-05-24 14:58:11', 'Chakto na ni', 'New', 'In progress', 'Daily-Time-Record-OSCAR-KYANU-KHO.pdf', '66503a83a49005.63551479___Daily-Time-Record-OSCAR-KYANU-KHO.pdf'),
(35, 1, 2, '2024-05-24 15:39:11', 'toastr', 'New', 'Pending', 'Endterm Exam- Kyanu.pdf', '6650441fc6ee79.56458262___Endterm Exam- Kyanu.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clientsteps`
--

CREATE TABLE `tbl_clientsteps` (
  `ClientStepsID` int(11) NOT NULL,
  `ClientProcessID` int(11) NOT NULL,
  `StepID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `ProcessID` int(11) NOT NULL,
  `IN` datetime NOT NULL,
  `OUT` datetime NOT NULL,
  `ProcessBy` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clientsteps`
--

INSERT INTO `tbl_clientsteps` (`ClientStepsID`, `ClientProcessID`, `StepID`, `ClientID`, `ProcessID`, `IN`, `OUT`, `ProcessBy`, `Status`, `Remarks`) VALUES
(17, 26, 2, 1, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', ''),
(18, 27, 2, 1, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'testttt'),
(19, 28, 8, 1, 1, '2024-05-19 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', ''),
(20, 29, 8, 2, 1, '2024-05-23 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', ''),
(21, 30, 2, 2, 2, '2024-05-23 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', ''),
(22, 32, 2, 2, 2, '2024-05-23 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', ''),
(23, 31, 2, 2, 2, '2024-05-23 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', ''),
(24, 30, 3, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'hello new'),
(73, 30, 4, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'hellooooo again directly'),
(74, 26, 3, 1, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'hellooooo again directly'),
(125, 33, 2, 2, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', ''),
(147, 30, 5, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'Last try memeh'),
(148, 34, 2, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', ''),
(149, 34, 3, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'hehehee'),
(150, 34, 4, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'another one'),
(151, 30, 6, 2, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', 'another one hehe'),
(152, 27, 3, 1, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'Nami2 ah!'),
(153, 26, 4, 1, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', 'Anotheroneeee! dapat may processby nani'),
(154, 27, 4, 1, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'Another one! pls gana na toastr'),
(155, 27, 5, 1, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'Hello worlds'),
(156, 27, 6, 1, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', 'Ahay.'),
(157, 31, 3, 2, 2, '2024-05-24 00:00:00', '2024-05-24 00:00:00', 'username2', 'Completed', 'Anotherone'),
(158, 31, 4, 2, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', '20 seconds toastr'),
(159, 32, 3, 2, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', 'another toastr testing'),
(160, 34, 5, 2, 2, '2024-05-24 00:00:00', '0000-00-00 00:00:00', 'username2', 'In progress', 'hello world toastr plps gana na\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyclientprofile`
--

CREATE TABLE `tbl_companyclientprofile` (
  `ID` int(11) NOT NULL,
  `OrgID` int(11) NOT NULL,
  `ProfileName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `OrgID` int(11) NOT NULL,
  `OrgName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `ContactPerson` varchar(255) NOT NULL,
  `ContactNumber` varchar(55) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_organization`
--

INSERT INTO `tbl_organization` (`OrgID`, `OrgName`, `Address`, `EmailAddress`, `ContactPerson`, `ContactNumber`, `Image`) VALUES
(1, '7-Eleven', '123 Main Street, Bacolod City', 'info@7eleven.com', 'John Doe', '63', '662f58fdf11944.40714853.png'),
(2, 'Central Philippine State University (CHMSU)', 'Lopez Jaena St., Bacolod City', 'info@chmsu.edu.ph', 'Jane Smith', '63', '662f5a4272a788.26068312.png'),
(3, 'University of St. La Salle (USLS)', 'La Salle Ave., Bacolod City', 'info@usls.edu.ph', 'Michael Johnson', '63', '662f5a8f953fe1.83959805.png'),
(4, 'Dunkin Donuts', 'Libertad Bacolod City', 'DunkinDonuts@gmail.com', 'CEO Dunkin', '09080706050', '6639dd847f66d2.78549593.png'),
(7, 'Pag-Ibig Fund', '2nd Floor, Gaisano Grand Malls, Araneta Street, Singcang-Airport, Bacolod City, 6100', 'contactus@pagibig.com', 'Ryan Rems', '4346147', '664457512ae806.19113703.png'),
(8, 'Social Security System', 'SSS Building, 2nd-Lacson Streets, Bacolod City, 6100', 'contactus@sss.com', 'Ramil Casimiro', '4345262', '66457058afd098.42412857.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization_departments`
--

CREATE TABLE `tbl_organization_departments` (
  `ID` int(255) NOT NULL,
  `OrgID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_organization_departments`
--

INSERT INTO `tbl_organization_departments` (`ID`, `OrgID`, `Username`, `Department`, `Password`) VALUES
(1, 2, 'username', 'Human Resources', '$2y$15$d1H7W8nHNSmNyEsMrW69ue62E.27wsxIaLgsIQEG3EA9cMfyapzS.'),
(3, 1, 'username2', 'Human Resources', '$2y$15$HELvfWBGhv8ZefAa1jgiQ.a7vk1FVW5rItTybHUx2tCW9n7ouqJWy'),
(4, 1, 'username3', 'Human Resources', '$2y$15$kTa67oPlmJ1jjaBbr.niGOUNy9UGCC.Y9Nuk.6TykDjb0131xHJ0a'),
(5, 2, 'username4', 'Human Resources', '$2y$15$OqYzriFzBeg/pG5FFWR2ruhF5mYoHK9tZEUgTujy2W33YclW8oz.2'),
(6, 2, 'username123', 'Human Resources', '$2y$15$ajJuVxbUZ5RdZ.hzU1GP5ulOmC3hM9m30Yug0WMNfZinv8K1/dnAS'),
(7, 7, 'processing@pagibigfund.com', 'Processing', '$2y$15$zMEBlmkl39yYTeum//KeMeAY0QSIko/29oFD/3uRlluTtQjC9sS72'),
(8, 8, 'processing@sss.com', 'Processing', '$2y$15$6f2OXj8q.9RHU/RCCw8Ua./XoDLvkddTORs7LOqjgayWqFvvyBoSi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process`
--

CREATE TABLE `tbl_process` (
  `ProcessID` int(11) NOT NULL,
  `OrgID` int(11) NOT NULL,
  `ProcessName` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `ExpectedDays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_process`
--

INSERT INTO `tbl_process` (`ProcessID`, `OrgID`, `ProcessName`, `Description`, `ExpectedDays`) VALUES
(1, 1, 'Document Submission', 'Submit new documents for processing and approval.', '2'),
(2, 1, 'Document Review', 'Review submitted documents for accuracy and comple', '3'),
(3, 2, 'Thesis Proposal Approval', 'Review and approve thesis proposals submitted by s', '7'),
(4, 2, 'Document Archiving', 'Archive completed documents for future reference.', '1'),
(5, 3, 'Grant Application Review', 'Evaluate grant applications submitted by faculty m', '10'),
(6, 3, 'Document Distribution', 'Distribute approved documents to relevant stakehol', '2'),
(7, 1, 'test', 'test', '2'),
(8, 7, 'Housing Loan', '1What is the Pag-IBIG Housing Loan? The Pag-IBIG F', '30'),
(9, 7, 'Short Term Loan', 'Short-Term Loan (STL) The Pag-IBIG Fund Multi-Purp', '2'),
(10, 8, 'Salary Loan', 'A one-month salary loan is equivalent to the avera', '15'),
(11, 8, 'Calamity Loan', 'Members can borrow up to 80% of their Total Accumu', '15'),
(12, 8, 'Pension Loan', 'avail of the pension loan with a 6-month loan repa', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_steps`
--

CREATE TABLE `tbl_steps` (
  `StepID` int(11) NOT NULL,
  `ProcessID` int(11) NOT NULL,
  `StepName` varchar(500) NOT NULL,
  `SequenceNumber` int(11) NOT NULL,
  `Prerequisite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_steps`
--

INSERT INTO `tbl_steps` (`StepID`, `ProcessID`, `StepName`, `SequenceNumber`, `Prerequisite`) VALUES
(2, 2, 'Check Document Formatting', 1, 0),
(3, 2, 'Verify Document Content', 2, 1),
(4, 2, 'Cross-reference Information', 3, 2),
(5, 2, 'Approve Document for Distribution', 4, 3),
(6, 2, 'Notify Document Owner of Approval Status', 5, 4),
(7, 2, 'Archive Document', 6, 5),
(8, 1, 'Gather all required documents.', 1, 0),
(9, 1, 'Complete any necessary forms or applications.', 2, 1),
(10, 1, 'Submit the documents along with the required forms', 3, 2),
(11, 1, 'Wait for the documents to be processed.', 4, 3),
(12, 1, 'If necessary, provide any additional information o', 5, 4),
(13, 1, 'Once reviewed, the documents will either be approv', 6, 5),
(14, 1, 'If approved, receive confirmation and any associat', 7, 6),
(15, 1, 'If rejected, follow instructions for resubmission ', 8, 7),
(16, 1, 'Archive or retain copies of all submitted document', 9, 8),
(17, 7, 'test', 1, 0),
(18, 4, 'Test', 1, 0),
(19, 4, 'test2', 2, 1),
(20, 9, 'Fill Up Short Term Loan', 1, 0),
(21, 9, 'Get STL Acknowledgement Receipt (HQP-SLF-121)', 2, 1),
(22, 9, 'On scheduled date, get loan proceeds.', 3, 2),
(23, 6, 'Cross Reference Document Details', 1, 0),
(24, 6, 'Send out documents to the assigned clients', 2, 1),
(25, 8, 'Complete Requirements for Pag-Ibig Housing Loan', 1, 0),
(26, 8, 'Submit Housing Loan Application', 2, 1),
(27, 8, 'Recive Notice of Approval (NOA) and Letter of Guar', 3, 2),
(28, 8, 'Complete Requirements Stated in NOA', 4, 3),
(29, 8, 'Receive your Pag-Ibig Housing Loan Proceeds', 5, 4),
(30, 8, 'Start Paying your Pag-Ibig Loan', 6, 5),
(31, 12, 'The pensioner-borrower must go personally to any S', 1, 0),
(32, 12, '. Wait for the results of the eligibility check to', 2, 1),
(33, 12, 'Choose the loan amount and repayment term being ap', 3, 2),
(34, 12, ' Review the pensioner-borrower information and loa', 4, 3),
(35, 10, 'Log in to your My.SSS account.', 1, 0),
(36, 10, 'Click on E-Services > Loans > Apply for Salary Loa', 2, 1),
(37, 10, 'Select your desired loan amount.', 3, 2),
(38, 10, 'Select the disbursement account where you want to ', 4, 3),
(39, 11, 'Log in to your account.', 1, 0),
(40, 11, 'On your dashboard, click E-Services.', 2, 1),
(41, 11, 'You’ll be then directed to the Disbursement Accoun', 3, 2),
(42, 11, 'Under the Enrollment tab, supply your bank account', 4, 3),
(43, 11, 'Once you’ve registered your bank account, it will ', 5, 4),
(44, 11, 'Once your bank account is active, you can apply fo', 6, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `tbl_clientprocess`
--
ALTER TABLE `tbl_clientprocess`
  ADD PRIMARY KEY (`ClientProcessID`);

--
-- Indexes for table `tbl_clientsteps`
--
ALTER TABLE `tbl_clientsteps`
  ADD PRIMARY KEY (`ClientStepsID`);

--
-- Indexes for table `tbl_companyclientprofile`
--
ALTER TABLE `tbl_companyclientprofile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrgID` (`OrgID`);

--
-- Indexes for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  ADD PRIMARY KEY (`OrgID`);

--
-- Indexes for table `tbl_organization_departments`
--
ALTER TABLE `tbl_organization_departments`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `tbl_process`
--
ALTER TABLE `tbl_process`
  ADD PRIMARY KEY (`ProcessID`),
  ADD KEY `OrgID` (`OrgID`);

--
-- Indexes for table `tbl_steps`
--
ALTER TABLE `tbl_steps`
  ADD PRIMARY KEY (`StepID`),
  ADD KEY `ProcessID` (`ProcessID`),
  ADD KEY `Prerequisite` (`Prerequisite`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_clientprocess`
--
ALTER TABLE `tbl_clientprocess`
  MODIFY `ClientProcessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_clientsteps`
--
ALTER TABLE `tbl_clientsteps`
  MODIFY `ClientStepsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `tbl_companyclientprofile`
--
ALTER TABLE `tbl_companyclientprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `OrgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_organization_departments`
--
ALTER TABLE `tbl_organization_departments`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_process`
--
ALTER TABLE `tbl_process`
  MODIFY `ProcessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_steps`
--
ALTER TABLE `tbl_steps`
  MODIFY `StepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_companyclientprofile`
--
ALTER TABLE `tbl_companyclientprofile`
  ADD CONSTRAINT `tbl_companyclientprofile_ibfk_1` FOREIGN KEY (`OrgID`) REFERENCES `tbl_organization` (`OrgID`);

--
-- Constraints for table `tbl_process`
--
ALTER TABLE `tbl_process`
  ADD CONSTRAINT `tbl_process_ibfk_1` FOREIGN KEY (`OrgID`) REFERENCES `tbl_organization` (`OrgID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_steps`
--
ALTER TABLE `tbl_steps`
  ADD CONSTRAINT `tbl_steps_ibfk_1` FOREIGN KEY (`ProcessID`) REFERENCES `tbl_process` (`ProcessID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
