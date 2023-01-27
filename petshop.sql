-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 07:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `kategorija_id` int(11) NOT NULL,
  `naziv_kategorije` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`kategorija_id`, `naziv_kategorije`) VALUES
(1, 'pas'),
(2, 'macka'),
(3, 'ptice'),
(4, 'akvaristika'),
(5, 'male zivotinje');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `opis` varchar(500) NOT NULL,
  `cena` int(11) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `slika` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `naziv`, `opis`, `cena`, `kategorija_id`, `slika`) VALUES
(1, 'Hrana', 'Pravilna ishrana je izuzetno važna za Vašeg psa. Kvalitetna, lako svarljiva hrana prilagođena individualnim potrebama značajna je za rast i razvoj mladih pasa, kao i za održavanje zdravlja i kondicije pasa svih uzrasta.\r\n\r\nPet centar nudi širok izbor raznovrsne hrane za pse. Odaberite najbolju hranu za svog ljubimca s obzirom na njegovu rasu, starost, nivo fizičke aktivnosti i specifične potrebe.', 2000, 1, NULL),
(2, 'als Igračka za pse Lopta', 'Jedinstveni proizvod, posebno razvijen za smanjenje stresa kod pasa. Čim se dodirne, lopta svetli i govori. Posebno je što možete uključiti tekst koji ste izabrali. Ako vlasnik nije kod kuc´e ili u blizini, to c´e pomoc´i psima da dožive manje stresa.\r\nFunkcioniše vrlo jednostavno: otvorite kuglicu priloženim šrafcigerom, napunite lopticu priloženim USB kablom i snimite tekst.', 2000, 1, NULL),
(6, 'Biter aromatin angostura', 'dsadasdas', 164990, 2, 'WhatsApp Image 2023-01-27 at 16.36.07.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`kategorija_id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorija_id` (`kategorija_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `kategorija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`kategorija_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
