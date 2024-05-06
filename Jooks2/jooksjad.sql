-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: d123187.mysql.zonevs.eu
-- Loomise aeg: Mai 06, 2024 kell 09:09 EL
-- Serveri versioon: 10.4.32-MariaDB-log
-- PHP versioon: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `d123187_database`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `jooksjad`
--

CREATE TABLE `jooksjad` (
  `id` int(11) NOT NULL,
  `eesnimi` varchar(30) DEFAULT NULL,
  `perenimi` varchar(30) DEFAULT NULL,
  `alustamisaeg` time DEFAULT NULL,
  `lopetamisaeg` time DEFAULT NULL,
  `result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `jooksjad`
--

INSERT INTO `jooksjad` (`id`, `eesnimi`, `perenimi`, `alustamisaeg`, `lopetamisaeg`, `result`) VALUES
(2, 'Edak', 'Daster', '10:25:07', '10:25:13', 6),
(4, 'Edak', 'Daster', '10:25:07', '00:00:00', -37507),
(7, 'MArija', 'Ivanova', '10:25:07', '10:25:14', 7),
(8, 'Kljan', 'Mbappe', '10:25:07', '10:25:15', 8),
(9, 'Ma ei tea', 'eesti keel', '10:25:07', '00:00:00', -37507),
(11, 'uue', 'ueie', '10:25:07', '00:00:00', -37507),
(12, 'adasd', 'asdas', '10:25:07', '00:00:00', -37507),
(14, 'dasdas', 'asdas', '10:25:07', '00:00:00', -37507),
(15, 'Tak', 'Sos', '10:25:07', '00:00:00', -37507);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `jooksjad`
--
ALTER TABLE `jooksjad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `jooksjad`
--
ALTER TABLE `jooksjad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
