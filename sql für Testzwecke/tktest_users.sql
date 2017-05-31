-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2017 um 13:43
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tktestmap`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tktest_users`
--

CREATE TABLE `tktest_users` (
  `ID` int(10) UNSIGNED NOT NULL COMMENT 'ID Nummer',
  `username` varchar(255) NOT NULL COMMENT 'Benutzername',
  `mail` varchar(255) NOT NULL COMMENT 'Email-Adresse',
  `role` int(11) NOT NULL COMMENT 'Benutzerrolle',
  `password` varchar(255) NOT NULL,
  `informations` text,
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'gehashtes Passwort'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tktest_users`
--

INSERT INTO `tktest_users` (`ID`, `username`, `mail`, `role`, `password`, `informations`, `created`) VALUES
(1, 'johnnitzsche', 'john.nitzsche@deutschebahn.com', 1, 'nichts bis jetzt', NULL, '2017-05-30 14:30:59'),
(2, 'hgofsd', '', 0, '$2a$10$bnc/N..uqDUlsge1evD3q.4R6l8AkwyAjFky1SMjydeWrGVN0s0Wu', NULL, '2017-05-31 09:44:35');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tktest_users`
--
ALTER TABLE `tktest_users`
  ADD UNIQUE KEY `ID_2` (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tktest_users`
--
ALTER TABLE `tktest_users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID Nummer', AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
