-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for fams
CREATE DATABASE IF NOT EXISTS `fams` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fams`;

-- Dumping structure for table fams.academic_year
CREATE TABLE IF NOT EXISTS `academic_year` (
  `ay_id` int(11) NOT NULL AUTO_INCREMENT,
  `ay_name` varchar(200) NOT NULL,
  `ay_active` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.academic_year: ~4 rows (approximately)
/*!40000 ALTER TABLE `academic_year` DISABLE KEYS */;
INSERT INTO `academic_year` (`ay_id`, `ay_name`, `ay_active`) VALUES
	(1, '2020-2021', 1),
	(2, '2021-2022', 1),
	(3, '2022-2023', 1),
	(4, '2024-2025', 1);
/*!40000 ALTER TABLE `academic_year` ENABLE KEYS */;

-- Dumping structure for table fams.active_sem_ay
CREATE TABLE IF NOT EXISTS `active_sem_ay` (
  `asa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_id` int(11) NOT NULL DEFAULT 0,
  `ay_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`asa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.active_sem_ay: ~1 rows (approximately)
/*!40000 ALTER TABLE `active_sem_ay` DISABLE KEYS */;
INSERT INTO `active_sem_ay` (`asa_id`, `sem_id`, `ay_id`) VALUES
	(1, 1, 1);
/*!40000 ALTER TABLE `active_sem_ay` ENABLE KEYS */;

-- Dumping structure for table fams.assign_schedule
CREATE TABLE IF NOT EXISTS `assign_schedule` (
  `ass_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_id` int(11) NOT NULL,
  `cy_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `sched_active` int(1) NOT NULL,
  PRIMARY KEY (`ass_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.assign_schedule: ~16 rows (approximately)
/*!40000 ALTER TABLE `assign_schedule` DISABLE KEYS */;
INSERT INTO `assign_schedule` (`ass_id`, `as_id`, `cy_id`, `room_id`, `ay_id`, `sem_id`, `day`, `start_time`, `end_time`, `sched_active`) VALUES
	(1, 1, 1, 1, 1, 1, 'Monday', '07:30:00', '08:30:00', 1),
	(2, 1, 1, 1, 1, 1, 'Wednesday', '07:30:00', '08:30:00', 1),
	(3, 1, 1, 1, 1, 1, 'Friday', '07:30:00', '08:30:00', 1),
	(7, 1, 1, 1, 1, 1, 'Monday', '09:30:00', '10:30:00', 1),
	(8, 1, 1, 1, 1, 1, 'Wednesday', '09:30:00', '10:30:00', 1),
	(9, 1, 1, 1, 1, 1, 'Friday', '09:30:00', '10:30:00', 1),
	(10, 2, 1, 2, 1, 1, 'Tuesday', '13:00:00', '15:00:00', 1),
	(13, 2, 1, 2, 1, 1, 'Thursday', '13:00:00', '15:00:00', 1),
	(14, 5, 2, 3, 1, 1, 'Monday', '07:30:00', '09:30:00', 1),
	(15, 5, 2, 3, 1, 1, 'Wednesday', '07:30:00', '09:30:00', 1),
	(16, 5, 2, 3, 1, 1, 'Friday', '07:30:00', '08:30:00', 1),
	(17, 6, 1, 1, 1, 1, 'Monday', '10:30:00', '11:30:00', 1),
	(18, 6, 1, 1, 1, 1, 'Wednesday', '10:30:00', '11:30:00', 1),
	(19, 6, 1, 1, 1, 1, 'Friday', '10:30:00', '11:30:00', 1),
	(29, 7, 1, 4, 1, 1, 'Monday', '07:30:00', '08:30:00', 1),
	(30, 7, 1, 4, 1, 1, 'Tuesday', '07:30:00', '08:30:00', 1);
/*!40000 ALTER TABLE `assign_schedule` ENABLE KEYS */;

-- Dumping structure for table fams.assign_subject
CREATE TABLE IF NOT EXISTS `assign_subject` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `ay_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `fac_num` int(11) NOT NULL,
  `as_active` int(1) NOT NULL,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.assign_subject: ~5 rows (approximately)
/*!40000 ALTER TABLE `assign_subject` DISABLE KEYS */;
INSERT INTO `assign_subject` (`as_id`, `ay_id`, `sem_id`, `sub_id`, `fac_num`, `as_active`) VALUES
	(1, 1, 1, 1, 2, 1),
	(2, 1, 1, 2, 3, 1),
	(5, 1, 1, 2, 1, 1),
	(6, 1, 1, 4, 4, 1),
	(7, 1, 1, 5, 5, 1);
/*!40000 ALTER TABLE `assign_subject` ENABLE KEYS */;

-- Dumping structure for table fams.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `ass_id` int(11) NOT NULL,
  `present` int(1) NOT NULL,
  `date` date NOT NULL,
  `dateentered` datetime NOT NULL,
  `ay_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `att_active` int(1) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.attendance: ~22 rows (approximately)
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` (`att_id`, `ass_id`, `present`, `date`, `dateentered`, `ay_id`, `sem_id`, `remarks`, `att_active`) VALUES
	(1, 1, 1, '2020-03-30', '2020-03-30 13:02:38', 1, 1, 'Late on her class', 1),
	(6, 14, 1, '2020-03-30', '2020-03-30 15:25:30', 1, 1, '', 1),
	(7, 2, 1, '2020-04-01', '2020-04-01 16:15:38', 1, 1, '', 1),
	(8, 3, 1, '2020-04-03', '2020-04-03 21:23:27', 1, 1, '', 1),
	(9, 16, 1, '2020-04-03', '2020-04-03 21:23:33', 1, 1, '', 1),
	(10, 1, 1, '2020-04-06', '2020-04-06 15:54:12', 1, 1, '', 1),
	(11, 14, 0, '2020-04-06', '2020-04-06 15:57:16', 1, 1, '', 1),
	(12, 29, 0, '2020-04-06', '2020-04-06 15:57:20', 1, 1, '', 1),
	(13, 7, 1, '2020-04-06', '2020-04-06 15:58:08', 1, 1, '', 1),
	(14, 17, 0, '2020-04-06', '2020-04-06 15:58:21', 1, 1, '', 1),
	(15, 30, 0, '2020-04-07', '2020-04-07 12:26:45', 1, 1, '', 1),
	(16, 10, 0, '2020-04-07', '2020-04-07 12:27:23', 1, 1, '', 1),
	(18, 2, 0, '2020-04-08', '2020-04-08 20:26:18', 1, 1, '', 1),
	(19, 15, 0, '2020-04-08', '2020-04-08 20:26:23', 1, 1, '', 1),
	(20, 8, 0, '2020-04-08', '2020-04-08 20:26:45', 1, 1, '', 1),
	(21, 18, 0, '2020-04-08', '2020-04-08 20:26:59', 1, 1, '', 1),
	(22, 13, 0, '2020-04-09', '2020-04-09 15:41:39', 1, 1, '', 1),
	(23, 3, 0, '2020-04-10', '2020-04-10 20:24:52', 1, 1, '', 1),
	(24, 16, 0, '2020-04-10', '2020-04-10 20:25:06', 1, 1, '', 1),
	(25, 16, 0, '2020-04-10', '2020-04-10 20:25:35', 1, 1, '', 1),
	(26, 9, 0, '2020-04-10', '2020-04-10 20:37:28', 1, 1, '', 1),
	(27, 19, 0, '2020-04-10', '2020-04-10 20:37:48', 1, 1, '', 1);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;

-- Dumping structure for table fams.cons_log
CREATE TABLE IF NOT EXISTS `cons_log` (
  `cons_log` int(11) NOT NULL AUTO_INCREMENT,
  `fac_num` int(11) NOT NULL,
  `last_date` date NOT NULL,
  PRIMARY KEY (`cons_log`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.cons_log: ~2 rows (approximately)
/*!40000 ALTER TABLE `cons_log` DISABLE KEYS */;
INSERT INTO `cons_log` (`cons_log`, `fac_num`, `last_date`) VALUES
	(1, 1, '2020-04-10'),
	(2, 4, '2020-04-10');
/*!40000 ALTER TABLE `cons_log` ENABLE KEYS */;

-- Dumping structure for table fams.course_year
CREATE TABLE IF NOT EXISTS `course_year` (
  `cy_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(200) NOT NULL,
  `year` varchar(2) NOT NULL,
  `section` varchar(2) NOT NULL,
  `cy_active` int(1) NOT NULL,
  PRIMARY KEY (`cy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.course_year: ~3 rows (approximately)
/*!40000 ALTER TABLE `course_year` DISABLE KEYS */;
INSERT INTO `course_year` (`cy_id`, `course`, `year`, `section`, `cy_active`) VALUES
	(1, 'Bachelor of Science in Information Systems', '1', 'A', 1),
	(2, 'Bachelor of Science in Information Systems', '1', 'C', 1),
	(3, 'Bachelor of Science in Information Systems', '1', 'B', 1);
/*!40000 ALTER TABLE `course_year` ENABLE KEYS */;

-- Dumping structure for table fams.faculty
CREATE TABLE IF NOT EXISTS `faculty` (
  `fac_num` int(11) NOT NULL AUTO_INCREMENT,
  `fac_ID` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fac_active` int(1) NOT NULL,
  PRIMARY KEY (`fac_ID`),
  KEY `fac_num` (`fac_num`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.faculty: ~5 rows (approximately)
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` (`fac_num`, `fac_ID`, `last_name`, `first_name`, `middle_name`, `date_of_birth`, `contact`, `email`, `fac_active`) VALUES
	(2, 'DAC1985010900', 'Dela Pena', 'Ann Marie', 'Currie', '1985-01-09', '639071210189', 'asher.abelilla@gmail.com', 1),
	(1, 'DJF1990010100', 'Dela Cruz', 'Juan', 'Filepe', '1987-12-31', '639086503050', 'jdubria1998@gmail.com', 1),
	(3, 'GEM1987031700', 'Gorox', 'Elain', 'Marie', '1987-03-17', '639306298873', 'asher.abelilla@gmail.com', 1),
	(5, 'GMC1991010100', 'Garcia', 'Mary Michele', 'Cailap', '1991-01-01', '639204135733', 'asher.abelilla@gmail.com', 1),
	(4, 'OJL1990031300', 'Ortega', 'Juan Miguel', 'Legazpi', '1990-03-13', '639071210189', 'jdubria1998@gmail.com', 1);
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;

-- Dumping structure for table fams.logs_per_day
CREATE TABLE IF NOT EXISTS `logs_per_day` (
  `log_pd` int(11) NOT NULL AUTO_INCREMENT,
  `att_id` int(11) NOT NULL,
  `date_checked` date NOT NULL,
  `absent` int(1) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  PRIMARY KEY (`log_pd`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.logs_per_day: ~12 rows (approximately)
/*!40000 ALTER TABLE `logs_per_day` DISABLE KEYS */;
INSERT INTO `logs_per_day` (`log_pd`, `att_id`, `date_checked`, `absent`, `sem_id`, `ay_id`) VALUES
	(1, 11, '2020-04-06', 1, 1, 1),
	(2, 12, '2020-04-06', 1, 1, 1),
	(3, 14, '2020-04-06', 1, 1, 1),
	(4, 15, '2020-04-07', 1, 1, 1),
	(5, 16, '2020-04-07', 1, 1, 1),
	(6, 19, '2020-04-08', 1, 1, 1),
	(7, 18, '2020-04-08', 1, 1, 1),
	(8, 21, '2020-04-08', 1, 1, 1),
	(9, 22, '2020-04-09', 1, 1, 1),
	(10, 24, '2020-04-10', 1, 1, 1),
	(11, 23, '2020-04-10', 1, 1, 1),
	(12, 27, '2020-04-10', 1, 1, 1);
/*!40000 ALTER TABLE `logs_per_day` ENABLE KEYS */;

-- Dumping structure for table fams.room
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `room_active` int(1) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.room: ~4 rows (approximately)
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` (`room_id`, `room_name`, `room_type`, `room_active`) VALUES
	(1, 'Laboratory 1', 'Laboratory Room', 1),
	(2, 'Laboratory 2', 'Laboratory Room', 1),
	(3, 'Laboratory 3', 'Laboratory Room', 1),
	(4, 'Room 1', 'Lecture Room', 1);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;

-- Dumping structure for table fams.semester
CREATE TABLE IF NOT EXISTS `semester` (
  `sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(50) NOT NULL,
  `sem_active` int(1) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.semester: ~2 rows (approximately)
/*!40000 ALTER TABLE `semester` DISABLE KEYS */;
INSERT INTO `semester` (`sem_id`, `sem_name`, `sem_active`) VALUES
	(1, '1st Semester', 1),
	(2, '2nd Semester', 1);
/*!40000 ALTER TABLE `semester` ENABLE KEYS */;

-- Dumping structure for table fams.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_code` varchar(200) NOT NULL,
  `sub_description` varchar(200) NOT NULL,
  `sub_unit` int(2) NOT NULL,
  `sub_hours` int(2) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sub_active` int(1) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table fams.subject: ~5 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`sub_id`, `sub_code`, `sub_description`, `sub_unit`, `sub_hours`, `sem_id`, `sub_active`) VALUES
	(1, 'FREE ELEC 1', 'Free Elective 1', 3, 5, 1, 1),
	(2, 'FREE ELEC 2', 'Free Elective 2', 3, 5, 1, 1),
	(3, 'FREE ELEC 3', 'Free Elective 3', 3, 5, 1, 1),
	(4, 'FREE ELEC 4', 'Free Elective 4', 3, 5, 1, 1),
	(5, 'SysPro1', 'System Project 1', 3, 5, 1, 1);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

-- Dumping structure for table fams.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_level` int(11) NOT NULL,
  `fac_num` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table fams.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_name`, `password`, `user_level`, `fac_num`, `active`) VALUES
	('admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, 1),
	('Ann', '21232f297a57a5a743894a0e4a801fc3', 3, 2, 1),
	('Grace', '21232f297a57a5a743894a0e4a801fc3', 2, NULL, 1),
	('John', '21232f297a57a5a743894a0e4a801fc3', 3, 1, 1),
	('student', '21232f297a57a5a743894a0e4a801fc3', 2, 1, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
