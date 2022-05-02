-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2022 at 03:49 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabinet_dentaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(6) NOT NULL,
  `SSN` int(6) NOT NULL,
  `role` varchar(128) NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `SSN`, `role`, `salary`) VALUES
(1, 86858483, 'dentiste', 100000),
(2, 102001, 'dentiste', 20000),
(3, 3524, 'dentiste', 150000),
(8, 1002, 'receptionniste', 100000),
(9, 19790102, 'dentiste', 150000),
(10, 1234, 'receptionniste', 100000),
(11, 19811229, 'dentiste', 150000),
(12, 19850411, 'receptionniste', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `SSN` int(11) NOT NULL,
  `patient_id` int(4) NOT NULL,
  `insurance` varchar(128) DEFAULT 'Aucune assurance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`SSN`, `patient_id`, `insurance`) VALUES
(999, 2, 'Aucune assurance'),
(0, 3, 'Aucune assurance'),
(4564, 4, 'Aucune assurance'),
(4563, 5, 'Aucune assurance'),
(1001, 6, 'Aucune assurance'),
(19890708, 7, 'Aucune assurance');

-- --------------------------------------------------------

--
-- Table structure for table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `rdv_id` int(6) NOT NULL,
  `patient_id` int(6) NOT NULL,
  `employee_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT 'À venir',
  `room` varchar(128) NOT NULL DEFAULT 'Office du prestataire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rendezvous`
--

INSERT INTO `rendezvous` (`rdv_id`, `patient_id`, `employee_id`, `date`, `start_hour`, `end_hour`, `status`, `room`) VALUES
(1, 2, 1, '2022-05-31', '14:08:00', '15:08:00', 'À venir', '22'),
(2, 2, 1, '2022-03-15', '13:25:00', '14:25:00', 'Effectué', '24'),
(3, 2, 1, '2022-05-10', '23:15:00', '21:17:00', 'A venir', '32'),
(4, 7, 11, '2022-05-02', '11:17:00', '00:17:00', 'A venir', '45');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `SSN` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL DEFAULT 'Nom non renseigné',
  `Password` varchar(64) NOT NULL,
  `Role` varchar(32) NOT NULL,
  `email` varchar(128) DEFAULT 'Veuillez renseigner votre email',
  `surname` varchar(128) DEFAULT 'Prénom(s) non renseigné(s)',
  `birthday` date DEFAULT NULL,
  `street` varchar(128) NOT NULL DEFAULT 'Veuillez renseigner votre rue',
  `city` varchar(128) NOT NULL DEFAULT 'Veuillez renseigner votre ville',
  `province` varchar(128) NOT NULL DEFAULT 'Veuillez renseigner votre province',
  `code_postal` varchar(7) NOT NULL DEFAULT '___-___'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`SSN`, `Name`, `Password`, `Role`, `email`, `surname`, `birthday`, `street`, `city`, `province`, `code_postal`) VALUES
(0, 'Dummy', 'AZERTY00', 'patient', NULL, '', '2022-04-13', '', '', '', ''),
(999, 'Yephihy Akissi Paule Noura', 'AZERTY99', 'patient', 'test@test.T', 'Offia', '2004-05-24', '80 Localhost ', 'Src', 'Project', '4D1-M1N'),
(1001, 'Test', 'test', 'patient', 'T1@test.Test', 'T1', '2022-05-01', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(1002, 'Test', '12345', 'receptionniste', 'dummy@dummy.org', 'T2', '2022-05-01', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(1234, 'wsd', 'qwertyu', 'receptionniste', 'oddd@gmail.com', 'qeeq', '2022-05-06', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(3524, 'RHS', '12345', 'dentiste', 'oddd@gmail.com', 'Php', '2022-05-04', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(4563, 'Dummy', 'ABCDEF', 'patient', 'dummy@dummy.org', 'Dummy3', '2022-05-01', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(4564, 'Dummy', '12345', 'patient', 'dummy@dummy.org', 'Dummy2', '2022-05-01', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(102001, 'Parker', 'peta', 'dentiste', 'peter@peta.paka', 'Peter', '2001-08-10', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(19790102, 'Pierre', 'azerty01', 'dentiste', 'fauch@rd.pierre', 'Fauchard', '1979-01-02', 'Veuillez renseigner votre rue', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(19811229, 'Rosalie', 'azerty04', 'dentiste', 'ros@l.ie', 'Fougelberg', '1981-12-29', 'Rue imaginaire', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(19850411, 'Bessica', 'azerty05', 'receptionniste', 'Bessic@R.aiche', 'Raiche', '1985-04-11', 'Rue imaginaire', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(19890708, 'Amalia', 'azerty03', 'patient', 'amali@A.ssur', 'ASSUR', '1989-07-08', 'Test', 'Veuillez renseigner votre ville', 'Veuillez renseigner votre province', '___-___'),
(78777675, 'Dylan', 'Azerty04', 'patient', NULL, 'D', '2022-04-12', '', '', '', ''),
(82818079, 'Gloria', 'Azerty03', 'patient', '', NULL, NULL, '', '', '', ''),
(86858483, 'Sebastien', 'Azerty02', 'dentiste', 'Seb@gmail.com', NULL, '2022-04-14', 'Def', 'Def', 'Def', 'Def'),
(90898887, 'Stephane', 'Azerty01', 'dentiste', NULL, 'N\'zue', NULL, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `SSN` (`SSN`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `SSN` (`SSN`);

--
-- Indexes for table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`rdv_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`SSN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `rdv_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `utilisateur` (`SSN`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `utilisateur` (`SSN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
