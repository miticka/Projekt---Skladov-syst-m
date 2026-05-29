-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 06:12 PM
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

--
-- Dumping data for table `historie`
--

INSERT INTO `historie` (`Typ`, `ID`, `Zboží`, `Množství`, `Cena`, `Datum`, `ID_produktu`, `Vytvořil`) VALUES
('Příjem', 1, 'Rohlík', 12.00, 3.00, '2026-05-28 20:47:55', 4, ''),
('Příjem', 2, 'Rohlík', 12.00, 3.00, '2026-05-28 20:51:04', 4, ''),
('Příjem', 3, 'Rohlík', 12.00, 3.00, '2026-05-28 20:51:24', 4, ''),
('Příjem', 4, 'Rohlík', 12.00, 3.00, '2026-05-28 20:51:27', 4, ''),
('Příjem', 5, 'Rohlík', 12.00, 3.00, '2026-05-28 20:52:52', 4, ''),
('Příjem', 6, 'Chleba', 12.00, 36.00, '2026-05-28 20:55:02', 6, 'admin'),
('Příjem', 7, 'Chleba', 12.00, 36.00, '2026-05-28 20:55:13', 6, 'admin'),
('Výdej', 8, 'Chleba', 12.00, 36.00, '2026-05-28 22:56:21', 6, 'root'),
('Výdej', 9, 'Loupáček', 1.00, 13.00, '2026-05-28 22:56:55', 10, 'root'),
('Výdej', 10, 'Anglický rohlík', 12.00, 19.01, '2026-05-28 22:57:03', 13, 'root'),
('Přidání', 14, 'Jojo', 0.00, 28.86, '2026-05-28 23:29:59', 29, 'admin'),
('Smazání', 17, 'Jojo', 0.00, 28.86, '2026-05-28 23:37:55', 29, 'admin'),
('Přidání', 18, 'Nůžky', 0.00, 124.11, '2026-05-29 00:11:55', 30, 'admin'),
('Výdej', 19, 'Chleba', 3.00, 36.00, '2026-05-29 00:26:19', 6, 'admin'),
('Příjem', 20, 'Rohlík', 12.00, 3.00, '2026-05-29 17:31:17', 4, 'user'),
('Přidání', 21, 'Čertovské klobásy', 3.00, 115.18, '2026-05-29 17:41:12', 31, 'user'),
('Přidání', 22, 'Vejce 10ks', 0.00, 60.71, '2026-05-29 17:41:47', 32, 'user'),
('Přidání', 23, 'Houby na nádobí 10ks červené', 0.00, 88.39, '2026-05-29 17:42:13', 33, 'user'),
('Přidání', 24, 'Canon EF 70-200mm f/2.8 IS USM', 0.00, 12000.00, '2026-05-29 17:43:44', 34, 'user'),
('Přidání', 25, 'Pepř Černý 20g', 0.00, 7.05, '2026-05-29 17:44:43', 35, 'user'),
('Přidání', 26, 'Lenovo Thinkpad E14', 0.00, 4464.29, '2026-05-29 17:45:20', 36, 'user'),
('Přidání', 27, 'Brambůrky solené', 100.00, 83.93, '2026-05-29 17:45:53', 37, 'user'),
('Přidání', 28, 'Donut Růžový 33g', 0.00, 12.50, '2026-05-29 17:46:23', 38, 'user'),
('Přidání', 29, 'Chleba Krájený', 0.00, 28.57, '2026-05-29 17:46:43', 39, 'user'),
('Příjem', 30, 'Kobliha', 13.00, 11.00, '2026-05-29 18:05:10', 9, 'user'),
('Výdej', 31, 'Kobliha', 32.00, 11.00, '2026-05-29 18:05:20', 9, 'user'),
('Výdej', 32, 'Loupáček', 42.00, 13.00, '2026-05-29 18:05:22', 10, 'user'),
('Výdej', 33, 'Slunečnicový Chléb', 11.00, 52.00, '2026-05-29 18:05:24', 11, 'user'),
('Výdej', 34, 'Slunečnicový Chléb', 12.00, 52.00, '2026-05-29 18:05:27', 11, 'user'),
('Příjem', 35, 'Banán', 12.00, 33.00, '2026-05-29 18:06:01', 18, 'user'),
('Příjem', 36, 'Jihočeské máslo 250g', 2.00, 40.09, '2026-05-29 18:06:03', 21, 'user'),
('Příjem', 37, 'Chleba', 32.00, 36.00, '2026-05-29 18:06:06', 6, 'user'),
('Výdej', 38, 'Chleba', 12.00, 36.00, '2026-05-29 18:06:08', 6, 'user'),
('Výdej', 39, 'Slunečnicový Chléb', 4.00, 52.00, '2026-05-29 18:06:12', 11, 'user'),
('Výdej', 40, 'Loupáček', 33.00, 13.00, '2026-05-29 18:06:14', 10, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `nazev` varchar(32) NOT NULL,
  `popis` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`nazev`, `popis`) VALUES
('Alkohol', ''),
('Drogerie', ''),
('Elektronika', ''),
('Koření', ''),
('Maso', ''),
('Nápoje', ''),
('Ostatní', ''),
('Ovoce', ''),
('Pečivo', ''),
('Potraviny', ''),
('Sladkosti', ''),
('Zelenina', ''),
('Zmrzliny', '');

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

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`Název`, `Kategorie`, `EAN`, `PLU`, `Cena`, `Cena s DPH`, `DPH`, `Množství`, `Jednotka`, `Prodáno`, `ID`, `Pridal`, `Poznámka`, `Vytvořeno`) VALUES
('Rohlík', 'Pečivo', 0, 1, 3.00, 3.00, 12, 186, 'Kus', 0, 4, 'admin', '', '2026-05-27 00:00:00'),
('Chleba', 'Pečivo', 0, 2, 36.00, 40.00, 12, 20, 'Kus', 99, 6, 'admin', '', '2026-05-27 00:00:00'),
('Kobliha', 'Pečivo', 0, 6, 11.00, 12.00, 12, 11, 'Kus', 32, 9, 'admin', '$Jsou kulaté a mají žlutý proužek', '2026-05-27 00:00:00'),
('Loupáček', 'Pečivo', 0, 5, 13.00, 15.00, 12, 1, 'Kus', 76, 10, 'admin', '$Má banánový tvar', '2026-05-27 00:00:00'),
('Slunečnicový Chléb', 'Pečivo', 0, 10, 52.00, 58.00, 12, 5, 'Kus', 27, 11, 'admin', '$', '2026-05-27 00:00:00'),
('Anglický rohlík', 'Pečivo', 0, 12, 19.01, 23.00, 12, 3, 'Kus', 12, 13, 'admin', '', '2026-05-27 00:00:00'),
('Kuřecí maso', 'Maso', 0, 20, 111.00, 124.00, 12, 15, 'Kg', 0, 14, 'admin', '$', '2026-05-27 22:55:50'),
('Mattoni 1,5L', 'Nápoje', 8593803224015, 1014, 18.00, 20.00, 12, 15, 'Kus', 0, 17, 'admin', '$', '2026-05-28 11:00:16'),
('Banán', 'Ovoce', NULL, 15, 33.00, 33.00, 0, 27, 'Kus', 0, 18, '', '', '2026-05-28 18:25:01'),
('Jihočeské máslo 250g', 'Potraviny', 847983264982, 1414, 40.09, 44.90, 12, 2, 'Kus', 0, 21, 'admin', '$', '2026-05-28 23:05:44'),
('Haribo 100g', 'Sladkosti', 0, 139, 21.34, 23.90, 12, 0, 'Kus', 0, 27, 'admin', '', '2026-05-28 23:26:28'),
('Nůžky', 'Ostatní', 3214421234, 3132, 124.11, 139.00, 21, 0, 'Kus', 0, 30, 'admin', '', '2026-05-29 00:11:55'),
('Čertovské klobásy', 'Ostatní', 79837489, 112, 115.18, 129.00, 12, 3, 'Kg', 0, 31, 'user', '', '2026-05-29 17:41:12'),
('Vejce 10ks', 'Ostatní', 0, 31, 60.71, 68.00, 12, 0, 'Kus', 0, 32, 'user', '', '2026-05-29 17:41:47'),
('Houby na nádobí 10ks červené', 'Drogerie', 88178367412, 0, 88.39, 99.00, 21, 0, 'Kus', 0, 33, 'user', '', '2026-05-29 17:42:13'),
('Canon EF 70-200mm f/2.8 IS USM', 'Ostatní', 0, 98, 12000.00, 12000.00, 0, 0, 'Kus', 0, 34, 'user', 'Bazar', '2026-05-29 17:43:44'),
('Pepř Černý 20g', 'Koření', 636287631, 32, 7.05, 7.90, 12, 0, 'Kus', 0, 35, 'user', '', '2026-05-29 17:44:43'),
('Lenovo Thinkpad E14', 'Ostatní', 0, 2147483647, 4464.29, 5000.00, 0, 0, 'Kus', 0, 36, 'user', 'Bazar', '2026-05-29 17:45:20'),
('Brambůrky solené', 'Potraviny', 738719290, 0, 83.93, 94.00, 12, 100, 'Kus', 0, 37, 'user', '', '2026-05-29 17:45:53'),
('Donut Růžový 33g', 'Pečivo', 72839, 23, 12.50, 14.00, 12, 0, 'Kus', 0, 38, 'user', '', '2026-05-29 17:46:23'),
('Chleba Krájený', 'Pečivo', 0, 21, 28.57, 32.00, 12, 0, 'Kus', 0, 39, 'user', '', '2026-05-29 17:46:43');

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
-- Dumping data for table `uzivatele`
--

INSERT INTO `uzivatele` (`username`, `password`, `date`, `ID`) VALUES
('admin', '$2y$10$X/jziU8Javz/Lq0WeEzpNuqdzWUVcmAix5Zh3d5Z21Eju4eXX/lWe', '2026-04-27 10:59:47', 1),
('supervizor', '$2y$10$lLF3XTYIfAXkwRQ2H66Vye.ND495gVd.AGQKnF8dVCVWzhzjW0Us2', '2026-05-29 18:07:47', 4),
('user', '$2y$10$P8Rx6.rCD5nHbpnJgNj3e.iNO596uWeWiEZyS/AsfxqCMMB8otdOm', '2026-05-29 17:25:37', 2),
('zamestnanec', '$2y$10$KYTu0KgN8Ca.Wm0s7Tl13OZDmo1SfEjUDZcdNYg/u8vxk36wKLBrq', '2026-05-29 17:30:56', 3);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
