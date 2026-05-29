-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 05:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skladovy_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `historie`
--

CREATE TABLE `historie` (
  `Typ` varchar(8) NOT NULL,
  `ID` int(11) NOT NULL,
  `Zboží` varchar(32) NOT NULL,
  `Množství` decimal(10,2) NOT NULL,
  `Cena` decimal(10,2) NOT NULL,
  `Datum` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_produktu` int(32) NOT NULL,
  `Vytvořil` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `nazev` varchar(32) NOT NULL,
  `popis` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE `produkty` (
  `Název` varchar(64) NOT NULL,
  `Kategorie` varchar(32) NOT NULL,
  `EAN` bigint(128) DEFAULT NULL,
  `PLU` int(32) DEFAULT NULL,
  `Cena` decimal(10,2) NOT NULL,
  `Cena s DPH` decimal(10,2) NOT NULL,
  `DPH` float(10,0) NOT NULL,
  `Množství` float(10,0) NOT NULL,
  `Jednotka` varchar(4) NOT NULL,
  `Prodáno` int(11) NOT NULL DEFAULT 0,
  `ID` int(11) NOT NULL,
  `Pridal` varchar(32) NOT NULL,
  `Poznámka` varchar(255) NOT NULL,
  `Vytvořeno` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uzivatele`
--

CREATE TABLE `uzivatele` (
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ID` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historie`
--
ALTER TABLE `historie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`nazev`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Produkt_název` (`Název`);

--
-- Indexes for table `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `ID_user` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historie`
--
ALTER TABLE `historie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
