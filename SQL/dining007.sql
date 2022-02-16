-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 16, 2022 at 12:29 PM
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
  `ika` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
