-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Grd 21 d. 20:17
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itproject`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `komentaras`
--

CREATE TABLE `komentaras` (
  `autorius` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `zinute` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `ikelimo_laikas` date DEFAULT NULL,
  `id_Komentaras` int(11) NOT NULL,
  `skelbimo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `komentaras`
--

INSERT INTO `komentaras` (`autorius`, `zinute`, `ikelimo_laikas`, `id_Komentaras`, `skelbimo_id`) VALUES
('Autorius', 'Domintu informacija', '2020-12-07', 5, 2),
('Autorius', 'Turiu pasiūlymą.', '2020-12-08', 10, 12),
('mantas', 'Gera', '2020-12-08', 11, 1),
('admin', 'Šis skelbimas nebegalioja ir bus pašalintas.', '2020-12-21', 12, 2),
('mantas', 'Esu iš Šiaulių ir domintu šis darbas. Koks būtų atlyginimas?', '2020-12-21', 13, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `naudotojas`
--

CREATE TABLE `naudotojas` (
  `vartotojo_vardas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `pastas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `slaptazodis` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `gali_skelbti` tinyint(1) DEFAULT NULL,
  `vardas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `pavarde` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `telefonas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `id_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `skelbimas`
--

CREATE TABLE `skelbimas` (
  `pavadinimas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `aprasymas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `tipas` varchar(255) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL,
  `ikelimo_laikas` date DEFAULT NULL,
  `galiojimo_laikas` date DEFAULT NULL,
  `id_Skelbimas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `skelbimas`
--

INSERT INTO `skelbimas` (`pavadinimas`, `aprasymas`, `tipas`, `ikelimo_laikas`, `galiojimo_laikas`, `id_Skelbimas`) VALUES
('Ieškomas programuotojas', 'Ieškomas gilias žinias turintis programuotojas', 'Siūlo darbą', '2020-11-04', '2020-11-19', 1),
('Ieškomas statybininkas', 'Ieškomas įgūdžių turintis programuotojas', 'Siūlo darbą', '2020-11-04', '2020-11-19', 2),
('Ieškau darbo', 'Ieškau paprasto darbo.', 'Ieško darbo', '2020-11-29', '2020-11-29', 4),
('Ieškomas sandelio darbuotojas', 'Geras', 'Siūlo darbą', '2020-11-29', '2020-11-29', 5),
('Valytojo darbas', 'Šiauliuose', 'Siūlo darbą', '2020-12-07', '2020-12-07', 6),
('Valytojo darbas', 'Šiauliuose', 'Siūlo darbą', '2020-12-07', '2020-12-07', 7),
('Valytojo darbas', 'Šiauliuose', 'Siūlo darbą', '2020-12-07', '2020-12-08', 8),
('Valytojo darbas', 'Šiauliuose', 'Siūlo darbą', '2020-12-07', '2020-12-10', 9),
('Santechniko darbas', 'Vilnius', 'Siūlo darbą', '2020-12-07', '2020-12-17', 10),
('Pagalbinio darbininko darbas', 'IEŠKOME PAGALBINIŲ DARBUOTOJŲ GRIOVIMO DARBAMS ATLIKTI\r\n\r\nSėkminga įmonės plėtra nuolatos kuria naujas darbo vietas. Ieškome atsakingų, kruopščių, sąžiningų darbuotojų.\r\n\r\nDarbas komandiruotėse Vokietijoje.', 'Siūlo darbą', '2020-12-07', '2020-12-13', 11),
('Ieškau darbo', 'Ieškau darbo IT srityje. Patirties turiu.', 'Ieško darbo', '2020-12-08', '2020-12-13', 12);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`) VALUES
('admin', '6e5b5410415bde908bd4dee15dfb167a', '30538d011fe9fb3d2286b3fe95022d57', 9, 'admin@admin.com', '2020-12-21 19:07:42'),
('controller', '135b14c77c8bef98e73f70208325fa0d', 'e792be96af5713baf49dcd32b29d2cbd', 6, 'controller@controller.com', '2020-12-21 18:37:39'),
('mantas', '48634b42334327cace242d9eb1939359', '5d8bed6813150acc0b0cff0847da10d3', 5, 'mantas@gmail.com', '2020-12-21 19:01:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentaras`
--
ALTER TABLE `komentaras`
  ADD PRIMARY KEY (`id_Komentaras`);

--
-- Indexes for table `naudotojas`
--
ALTER TABLE `naudotojas`
  ADD PRIMARY KEY (`id_Naudotojas`);

--
-- Indexes for table `skelbimas`
--
ALTER TABLE `skelbimas`
  ADD PRIMARY KEY (`id_Skelbimas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentaras`
--
ALTER TABLE `komentaras`
  MODIFY `id_Komentaras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skelbimas`
--
ALTER TABLE `skelbimas`
  MODIFY `id_Skelbimas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
