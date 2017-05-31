-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2017 um 09:08
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `sp_termin_datenbank`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_termin`
--

CREATE TABLE `tbl_termin` (
  `termin_id` int(11) NOT NULL,
  `erstellungsdatum` datetime DEFAULT NULL,
  `ereignisdatum` date DEFAULT NULL,
  `uhrzeit` time DEFAULT NULL,
  `text_schrift` varchar(255) DEFAULT NULL,
  `text_memo` varchar(3500) DEFAULT NULL,
  `bearbeitungsdatum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  ADD PRIMARY KEY (`termin_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  MODIFY `termin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
