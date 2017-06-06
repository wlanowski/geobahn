-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportiere Datenbank Struktur für tktestmap
CREATE DATABASE IF NOT EXISTS `tktestmap` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tktestmap`;

-- Exportiere Struktur von Tabelle tktestmap.tktest_projekte
CREATE TABLE IF NOT EXISTS `tktest_projekte` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Projekt ID (Intern hier!)',
  `projektname` varchar(255) COLLATE utf8_german2_ci DEFAULT '0',
  `typ` varchar(255) COLLATE utf8_german2_ci DEFAULT '0',
  `ort` varchar(255) COLLATE utf8_german2_ci DEFAULT '0',
  `ort_geo_lon` float DEFAULT '0',
  `ort_geo_lat` float DEFAULT '0',
  `ansprechpartner` varchar(255) COLLATE utf8_german2_ci DEFAULT '0',
  `start` date DEFAULT NULL,
  `ende` date DEFAULT NULL,
  `ende_prog` date DEFAULT NULL,
  `status` int(11) DEFAULT '9' COMMENT '0 in Bearbeitung, 1 fertig, 2 verspätet, 9 n.def',
  `zusatz` mediumtext COLLATE utf8_german2_ci,
  `erstellt` datetime DEFAULT NULL,
  `erstelltvon` varchar(255) COLLATE utf8_german2_ci DEFAULT '0',
  `geämdert` datetime DEFAULT NULL,
  `geändertvon` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `strecke` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci COMMENT='enthält alle Projekte und Informationen zu diesen';

-- Exportiere Daten aus Tabelle tktestmap.tktest_projekte: ~2 rows (ungefähr)
DELETE FROM `tktest_projekte`;
/*!40000 ALTER TABLE `tktest_projekte` DISABLE KEYS */;
INSERT INTO `tktest_projekte` (`ID`, `projektname`, `typ`, `ort`, `ort_geo_lon`, `ort_geo_lat`, `ansprechpartner`, `start`, `ende`, `ende_prog`, `status`, `zusatz`, `erstellt`, `erstelltvon`, `geämdert`, `geändertvon`, `strecke`) VALUES
	(1, 'EP Elektrifizierung Hof Marktredwitz', '', 'Marktredwitz', 12.0825, 50.0045, 'maxmuster', NULL, NULL, NULL, 1, 'Halo i Bims', '2017-06-01 11:59:47', 'johnnitzsche', '2017-06-01 12:23:14', 'maxmuster', 5050),
	(2, 'AP Bffm Taucha', '', 'Taucha', 12.4783, 51.3766, 'maxmuster', NULL, NULL, NULL, 1, 'Halo i Bims', '2017-06-06 08:39:47', 'johnnitzsche', '2017-06-06 09:00:00', 'maxmuster', 6360);
/*!40000 ALTER TABLE `tktest_projekte` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle tktestmap.tktest_users
CREATE TABLE IF NOT EXISTS `tktest_users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID Nummer',
  `username` varchar(255) COLLATE utf8_german2_ci NOT NULL COMMENT 'Benutzername',
  `mail` varchar(255) COLLATE utf8_german2_ci NOT NULL COMMENT 'Email-Adresse',
  `role` int(11) NOT NULL COMMENT 'Benutzerrolle',
  `password` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `informations` mediumtext COLLATE utf8_german2_ci,
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'gehashtes Passwort',
  `nameclear` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  UNIQUE KEY `ID_2` (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- Exportiere Daten aus Tabelle tktestmap.tktest_users: ~2 rows (ungefähr)
DELETE FROM `tktest_users`;
/*!40000 ALTER TABLE `tktest_users` DISABLE KEYS */;
INSERT INTO `tktest_users` (`ID`, `username`, `mail`, `role`, `password`, `informations`, `created`, `nameclear`) VALUES
	(1, 'johnnitzsche', 'john.nitzsche@deutschebahn.com', 1, 'nichts bis jetzt', NULL, '2017-05-30 14:30:59', 'John Nitzsche'),
	(2, 'maxmuster', '', 0, '$2a$10$bnc/N..uqDUlsge1evD3q.4R6l8AkwyAjFky1SMjydeWrGVN0s0Wu', NULL, '2017-05-31 09:44:35', 'Max Muster');
/*!40000 ALTER TABLE `tktest_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
