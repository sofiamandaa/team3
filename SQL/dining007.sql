-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 21, 2022 at 01:19 PM
-- Server version: 8.0.26
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dining007`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `tunnus` varchar(200) NOT NULL,
  `salasana` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asiakas`
--

CREATE TABLE `asiakas` (
  `id` int NOT NULL,
  `etunimi` varchar(100) NOT NULL,
  `sukunimi` varchar(100) NOT NULL,
  `puhelinnro` int NOT NULL,
  `sposti` varchar(200) NOT NULL,
  `kayttajatunnus` varchar(100) NOT NULL,
  `salasana` varchar(200) NOT NULL,
  `katuosoite` varchar(200) DEFAULT NULL,
  `postinumero` int NOT NULL,
  `postitoimipaikka` varchar(100) DEFAULT NULL,
  `ika` int NOT NULL,
  `kayttaja_tyyppi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `asiakas`
--

INSERT INTO `asiakas` (`id`, `etunimi`, `sukunimi`, `puhelinnro`, `sposti`, `kayttajatunnus`, `salasana`, `katuosoite`, `postinumero`, `postitoimipaikka`, `ika`, `kayttaja_tyyppi`) VALUES
(1, 'joo', 'joo', 123, 'joo', 'joo', 'a2e882c6adfe06c527ff0c58d4cf8919513d11e933694e3e5120873682158fc8', 'joo', 123, 'joo', 123, NULL),
(2, 'Aku', 'Ankka', 501234567, 'akuankka@ankkalinna.fi', 'Aankka', 'f163256800aa49f3d191ddceb9188ddeab2f84c85dd59212921ceada9bbac2e5', 'Ankkalinnantie 2', 11111, 'Ankkalinna', 22, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `palaute`
--

CREATE TABLE `palaute` (
  `nimi` varchar(40) NOT NULL,
  `asiakaspalvelu` varchar(200) NOT NULL,
  `ruoka` varchar(200) NOT NULL,
  `Vapaapalaute` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `palaute`
--

INSERT INTO `palaute` (`nimi`, `asiakaspalvelu`, `ruoka`, `Vapaapalaute`) VALUES
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('Hessu', 'Hyvin.', 'Hyvää', 'Hieno paikka.'),
('aku', 'hyvä hyvä', 'maukasta', 'hieno paikka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;