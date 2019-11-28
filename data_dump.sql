-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for employee_status
CREATE DATABASE IF NOT EXISTS `employee_status` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `employee_status`;

-- Dumping structure for table employee_status.business_improvement
CREATE TABLE IF NOT EXISTS `business_improvement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `all_day` tinyint(4) DEFAULT '0',
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table employee_status.business_improvement: ~8 rows (approximately)
/*!40000 ALTER TABLE `business_improvement` DISABLE KEYS */;
INSERT INTO `business_improvement` (`id`, `name`, `location`, `status`, `all_day`, `date_in`, `date_out`, `reason`) VALUES
	(1, 'Elizabeth Sackson', 'Pandanus Building A', 0, 1, NULL, NULL, NULL),
	(2, 'Andre Bruna', 'Annual Leave', 1, 1, '2018-05-31', '2018-05-31', NULL),
	(3, 'David Balassa', 'Pandanus Building A', 0, 1, NULL, NULL, NULL),
	(4, 'Stephen Rosendale', 'Pandanus Building A', 0, 1, NULL, NULL, NULL),
	(5, 'Amanda Steele', 'Sick Leave', 1, 1, '2018-05-31', '2018-05-31', NULL),
	(6, 'Marcus Pagbilao', 'Pandanus Building A', 1, 1, NULL, NULL, NULL),
	(7, 'Steve Fejer', 'Pandanus Building A', 0, 1, NULL, NULL, NULL),
	(8, 'Ryan King', 'Pandanus Building A', 0, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `business_improvement` ENABLE KEYS */;

-- Dumping structure for table employee_status.business_solutions
CREATE TABLE IF NOT EXISTS `business_solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `all_day` tinyint(4) DEFAULT '0',
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table employee_status.business_solutions: ~14 rows (approximately)
/*!40000 ALTER TABLE `business_solutions` DISABLE KEYS */;
INSERT INTO `business_solutions` (`id`, `name`, `location`, `status`, `all_day`, `date_in`, `date_out`, `reason`) VALUES
	(1, 'Jimmy Cheah', 'Working from Home', 0, 1, '2018-05-31', '2018-05-29', NULL),
	(2, 'Patricia Rankine', 'Sick Leave', 1, 0, '2018-05-30', '2018-05-29', NULL),
	(3, 'Lisa Reed', 'Mac Arthur Avenue', 0, 1, NULL, NULL, NULL),
	(4, 'Jihan Zhu', 'Mac Arthur Avenue', 0, 1, NULL, NULL, NULL),
	(5, 'Anuj Bhatia', 'Pandanus Building B', 0, 1, NULL, NULL, NULL),
	(6, 'Satish Peddi', 'Sick Leave', 1, 1, '2018-05-29', '2018-05-29', NULL),
	(7, 'Karin Britz', 'Sick Leave', 1, 1, '2018-07-22', '2018-07-25', NULL),
	(8, 'Tobias Weber', 'Mac Arthur Avenue', 0, 1, NULL, NULL, NULL),
	(9, 'Tamas Revesz', 'Da Vinci Building', 0, 1, NULL, NULL, NULL),
	(10, 'Andrea Gannon', 'Sick Leave', 1, 1, '2018-05-23', '2018-05-22', NULL),
	(11, 'Ronald O\'Connor', 'Sick Leave', 1, 0, '2018-05-30', '2018-05-30', NULL),
	(12, 'Christopher Pocock', 'Mac Arthur Avenue', 0, 0, NULL, NULL, NULL),
	(13, 'Shilpika Bhadu', 'Mac Arthur Avenue', 0, 1, NULL, NULL, NULL),
	(14, 'Arnaud Franjou', 'Mac Arthur Avenue', 0, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `business_solutions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
