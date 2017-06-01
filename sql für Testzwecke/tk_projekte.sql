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

-- Exportiere Daten aus Tabelle tktestmap.tktest_projekte: ~2 rows (ungefähr)
DELETE FROM `tktest_projekte`;
/*!40000 ALTER TABLE `tktest_projekte` DISABLE KEYS */;
INSERT INTO `tktest_projekte` (`ID`, `projektname`, `typ`, `ort`, `ort_geo_lon`, `ort_geo_lat`, `ansprechpartner`, `start`, `ende`, `ende_prog`, `status`, `zusatz`, `erstellt`, `erstelltvon`, `geämdert`, `geändertvon`, `strecke`) VALUES
	(1, 'EP Elektrifizierung Hof Marktredwitz', '', 'Marktredwitz', 10.4515, 51.1657, 'maxmuster', NULL, NULL, NULL, 1, 'Halo i Bims', '2017-06-01 11:59:47', 'johnnitzsche', '2017-06-01 12:23:14', 'maxmuster', 5050),
	(2, 'EP Elektrifizierung Hof Marktredwitz', '', 'Marktredwitz', 10.4515, 51.1657, 'maxmuster', NULL, NULL, NULL, 1, 'Halo i Bims', '2017-06-01 11:59:47', 'johnnitzsche', '2017-06-01 12:23:14', 'maxmuster', 5050);
/*!40000 ALTER TABLE `tktest_projekte` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
