-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 07:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date_of_appointment` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date_of_appointment`, `client_id`, `doctor_id`) VALUES
(1, '2001-01-27 14:30:00', 4, 1),
(2, '2021-06-22 14:30:00', 4, 1),
(6, '2001-05-27 14:30:00', 23, 1),
(15, '2021-06-22 04:30:00', 26, 31),
(18, '2001-05-12 02:30:00', 26, 31),
(19, '2021-06-22 09:30:00', 23, 1),
(21, '2021-06-25 18:00:00', 27, 32);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phonenumber` varchar(16) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstname`, `lastname`, `date_of_birth`, `phonenumber`, `email`, `password`) VALUES
(4, 'taco', 'taco', '2000-01-01', '123456', 'taco@taco.com', '$2y$10$SAKFfnq9qagc3y7eQBLCy.RHLm4y5ONRelEDSlc12SKMV2lJhylnW'),
(18, 'john', 'smith', '2001-05-12', '789101112', 'johnsmith@gmail.com', '$2y$10$O0nqiWu3rzTi7sQNVkJU..k1AK5OqxKFizFwNFuVEMTuyFqVWy1DW'),
(19, 'taco', 'tacoson', '2007-07-07', '0123456', 'tacoson@gmail.com', '$2y$10$UCMRW5boJ15Uk70PSHKpaemUJuS/gvnQqbeyYtQQD9GZ4bYI3M8Te'),
(23, 'joe', 'joeson', '2000-05-30', '01234567', 'joeson@gmail.com', '$2y$10$DAWwXQGcjSB9Mog4RtPBEOnREFCkqpAY1oiiSxsbn0fjlJ2.7FBYW'),
(26, 'ALzi', 'labzi', '2001-06-05', '44859284897', 'Alzi94@gmail.com', '$2y$10$YFUp2J/1vUKqEd/v2unlvOKk0DcHxrYXA/So4OOfBkKMqI/JT6tXW'),
(27, 'ben', 'benny', '2000-08-20', '01234567', 'ben@gmail.com', '$2y$10$sBMz.kFDBhxbivZlsz6BVelHcjmQLfj90U/uZbnBQX6Vs5KJrQKH.');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `day` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`) VALUES
(0, 'Sunday'),
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phonenumber` varchar(16) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstname`, `lastname`, `date_of_birth`, `phonenumber`, `email`, `password`) VALUES
(1, 'updoc', 'DoctorUp', '2001-08-05', '789101112', 'doc@doc.com', '$2y$10$uvaNt18U2zx9HpjNazaO1eYZ5DcjDE4GkCHDywa66nxHOun3E6ggq'),
(2, 'mick', 'mickerson', '2000-11-30', '01234567', 'mickerson@gmail.com', '$2y$10$bBx8fgkASgFO6Qx8glMuwusucaHf0wxdk.NgkKOk1R7s1kW1BdQRO'),
(30, 'cri', 'crison', '2001-05-22', '01234567', 'crison@gmail.com', '$2y$10$uSMmtrOIaoIMEv8ag8FrAuJmLk4cz.1I1ajmeierf7oCe91prGs6e'),
(31, 'mick', 'gred', '1999-06-12', '012345678', 'mickgred@gmail.com', '$2y$10$snvK6fNq3h2U2BAjVDY5MeabTiVT5lY/7hm2fS7r.yoz68h3ilQPi'),
(32, 'nick', 'nickerson', '2001-04-24', '012345678', 'nickerson@gmail.com', '$2y$10$Lrh.zJu8SAYwVNWcFJTJ5eogpZfyU3BuPLuZLU7oHAHo5nZY1MII.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_address`
--

CREATE TABLE `doctor_address` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `region` varchar(50) NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_address`
--

INSERT INTO `doctor_address` (`id`, `doctor_id`, `address`, `departement`, `region`, `postal_code`) VALUES
(6, 1, '1, tacoville, mexitech', 'medical-buliding5', 'taco paco region', 75200),
(9, 2, '5 rue de route', 'medical buliding', 'green', 8520),
(18, 31, '11 rue de l\'adresse', '94800', 'paris', 94800),
(20, 32, '1 rue pierre', 'medical buliding', 'paris', 9630);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialization`
--

CREATE TABLE `doctor_specialization` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_specialization`
--

INSERT INTO `doctor_specialization` (`id`, `doctor_id`, `specialization_id`) VALUES
(1, 1, 2),
(9, 1, 4),
(11, 2, 4),
(12, 2, 2),
(13, 31, 1),
(15, 32, 5),
(16, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_unavailability`
--

CREATE TABLE `doctor_unavailability` (
  `id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_unavailability`
--

INSERT INTO `doctor_unavailability` (`id`, `day_id`, `doctor_id`) VALUES
(2, 6, 1),
(4, 0, 1),
(5, 3, 1),
(7, 0, 2),
(8, 6, 2),
(10, 0, 31),
(12, 0, 32),
(13, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_working_hour`
--

CREATE TABLE `doctor_working_hour` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `starting_hour` time NOT NULL,
  `ending_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_working_hour`
--

INSERT INTO `doctor_working_hour` (`id`, `doctor_id`, `day_id`, `starting_hour`, `ending_hour`) VALUES
(1, 1, 4, '14:30:00', '21:30:00'),
(11, 1, 2, '09:30:00', '17:00:00'),
(12, 1, 3, '07:30:00', '14:30:00'),
(13, 2, 3, '07:30:00', '23:00:00'),
(15, 31, 2, '02:30:00', '07:00:00'),
(21, 32, 5, '18:00:00', '21:00:00'),
(24, 32, 4, '01:00:00', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `specialization`) VALUES
(1, 'cardiology'),
(2, 'Allergist'),
(3, 'Dermatologist'),
(4, 'Generalist'),
(5, 'Osteopaths');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idappointments_UNIQUE` (`id`),
  ADD KEY `client_id_appointment_idx` (`client_id`),
  ADD KEY `doctor_id_appointment_idx` (`doctor_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idclient_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iddoctor_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `doctor_address`
--
ALTER TABLE `doctor_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnew_table_UNIQUE` (`id`),
  ADD KEY `doctor_address_id_idx` (`doctor_id`);

--
-- Indexes for table `doctor_specialization`
--
ALTER TABLE `doctor_specialization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iddoctor-specialization_UNIQUE` (`id`),
  ADD KEY `doctor_specialization_id_idx` (`doctor_id`),
  ADD KEY `specialization_id_idx` (`specialization_id`);

--
-- Indexes for table `doctor_unavailability`
--
ALTER TABLE `doctor_unavailability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_unavailable_id_idx` (`day_id`),
  ADD KEY `doctor_unavailable_id_idx` (`doctor_id`);

--
-- Indexes for table `doctor_working_hour`
--
ALTER TABLE `doctor_working_hour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iddoctor_working_hour_UNIQUE` (`id`),
  ADD KEY `doctor_available_id_idx` (`doctor_id`),
  ADD KEY `day_available_id_idx` (`day_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idregion_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `doctor_address`
--
ALTER TABLE `doctor_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctor_specialization`
--
ALTER TABLE `doctor_specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor_unavailability`
--
ALTER TABLE `doctor_unavailability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor_working_hour`
--
ALTER TABLE `doctor_working_hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `client_id_appointment` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `doctor_id_appointment` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `doctor_address`
--
ALTER TABLE `doctor_address`
  ADD CONSTRAINT `doctor_address_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_specialization`
--
ALTER TABLE `doctor_specialization`
  ADD CONSTRAINT `doctor_specialization_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `specialization_id` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_unavailability`
--
ALTER TABLE `doctor_unavailability`
  ADD CONSTRAINT `day_unavailable_id` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_unavailable_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_working_hour`
--
ALTER TABLE `doctor_working_hour`
  ADD CONSTRAINT `day_available_id` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_available_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
