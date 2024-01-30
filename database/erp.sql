-- MySQL dump 10.13  Distrib 8.2.0, for macos14.0 (arm64)
--
-- Host: localhost    Database: erp
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `dashboard_view`
--

DROP TABLE IF EXISTS `dashboard_view`;
/*!50001 DROP VIEW IF EXISTS `dashboard_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `dashboard_view` AS SELECT 
 1 AS `id`,
 1 AS `employee_number`,
 1 AS `firstname`,
 1 AS `lastname`,
 1 AS `email`,
 1 AS `telephone`,
 1 AS `recruitment_date`,
 1 AS `onboarding_date`,
 1 AS `position_id`,
 1 AS `position`,
 1 AS `department_id`,
 1 AS `department`,
 1 AS `payroll_id`,
 1 AS `gross_salary`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `department_positions`
--

DROP TABLE IF EXISTS `department_positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department_positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_id` int NOT NULL,
  `position` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `department_positions_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='List of department positions.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_positions`
--

LOCK TABLES `department_positions` WRITE;
/*!40000 ALTER TABLE `department_positions` DISABLE KEYS */;
INSERT INTO `department_positions` VALUES (1,1,'Operations Manager'),(2,1,'Procurement Officer'),(3,1,'Logistics Officer'),(4,2,'Finance Manager'),(5,2,'Accountant'),(6,2,'Cashier'),(7,3,'Marketing Manager'),(8,3,'Content Specialist'),(9,3,'Graphic Designer'),(10,4,'Chief Information Officer'),(11,4,'Network Administrator'),(12,4,'IT Support Specialist'),(13,5,'Sales Director'),(14,5,'Account Executive'),(15,5,'Sales Development Representative'),(16,6,'Customer Service Manager'),(17,6,'Customer Support Representative'),(18,6,'Client Success Specialist'),(19,7,'Research and Development Director'),(20,7,'Research Scientist'),(21,7,'Product Development Engineer'),(22,8,'General Counsel'),(23,8,'Legal Assistant'),(24,8,'Contracts Manager'),(25,9,'PR Manager'),(26,9,'Media Relations Specialist'),(27,9,'Event Coordinator'),(28,10,'HR Manager'),(29,10,'Recruitment Specialist'),(30,10,'Employee Relations Coordinator');
/*!40000 ALTER TABLE `department_positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='List of departments.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Operations Department'),(2,'Finance Department'),(3,'Marketing Department'),(4,'Information Technology Department'),(5,'Sales Department'),(6,'Customer Service Department'),(7,'Research and Development Department'),(8,'Legal Department'),(9,'Public Relations Department'),(10,'Human Resources Department');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_attendance`
--

DROP TABLE IF EXISTS `employee_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `attendance_datetime` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `browser_timezone` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timezone from browser',
  `browser_timestamp` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timestamp from browser',
  `server_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp from server',
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `employee_attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Employee performance table.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_attendance`
--

LOCK TABLES `employee_attendance` WRITE;
/*!40000 ALTER TABLE `employee_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_leave`
--

DROP TABLE IF EXISTS `employee_leave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_leave` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `leave_dates` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `browser_timezone` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timezone from browser',
  `browser_timestamp` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timestamp from browser',
  `server_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp from server',
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `employee_leave_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Employee leave table.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_leave`
--

LOCK TABLES `employee_leave` WRITE;
/*!40000 ALTER TABLE `employee_leave` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_leave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_payroll`
--

DROP TABLE IF EXISTS `employee_payroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_payroll` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `gross_salary` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `employee_payroll_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Employee performance table.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_payroll`
--

LOCK TABLES `employee_payroll` WRITE;
/*!40000 ALTER TABLE `employee_payroll` DISABLE KEYS */;
INSERT INTO `employee_payroll` VALUES (1,1,300000),(2,2,290000),(3,3,295000),(4,4,180000),(5,5,170000),(6,6,160000);
/*!40000 ALTER TABLE `employee_payroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_performance`
--

DROP TABLE IF EXISTS `employee_performance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_performance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `performance` enum('1','2','3','4','5') COLLATE utf8mb3_unicode_ci NOT NULL COMMENT '1=Very Low, 2=Low, 3=Neutral, 4=High, 5=Very High',
  `browser_timezone` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timezone from browser',
  `browser_timestamp` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timestamp from browser',
  `server_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp from server',
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `employee_performance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Employee performance table.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_performance`
--

LOCK TABLES `employee_performance` WRITE;
/*!40000 ALTER TABLE `employee_performance` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_performance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_training`
--

DROP TABLE IF EXISTS `employee_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_training` (
  `id` int NOT NULL AUTO_INCREMENT,
  `training_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `from_date` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `to_date` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `training_id` (`training_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `employee_training_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `training_list` (`id`),
  CONSTRAINT `employee_training_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='List of employee training.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_training`
--

LOCK TABLES `employee_training` WRITE;
/*!40000 ALTER TABLE `employee_training` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `position_id` int NOT NULL,
  `employee_number` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `recruitment_date` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `onboarding_date` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `browser_timezone` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timezone from browser',
  `browser_timestamp` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Timestamp from browser',
  `server_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp from server',
  PRIMARY KEY (`id`),
  UNIQUE KEY `emloyee_number` (`employee_number`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone` (`telephone`),
  UNIQUE KEY `employee_number` (`employee_number`),
  KEY `position_id` (`position_id`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `department_positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='List of employee information.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,28,'0001','Elizabeth','Njogu','enjogu@scgafrica.com','0722000001','2022-04-03','2022-04-07','Africa/Nairobi','1/30/2024 6:54:16 PM','2024-01-30 15:54:18'),(2,1,'0002','John','Musyoka','jmusyoka@scgafrica.com','0722000002','2021-05-07','2021-05-15','Africa/Nairobi','1/30/2024 6:55:43 PM','2024-01-30 15:55:45'),(3,4,'0003','Peter','Otieno','potieno@scgafrica.com','0722000003','2018-02-06','2018-02-15','Africa/Nairobi','1/30/2024 7:00:31 PM','2024-01-30 16:00:33'),(4,12,'0004','Janet','Kithinji','jkithinji@scgafrica.com','0722000004','2020-07-18','2020-07-25','Africa/Nairobi','1/30/2024 7:01:46 PM','2024-01-30 16:01:48'),(5,21,'0005','Martin','Yegon','myegon@scgafrica.com','0722000005','2017-09-11','2017-09-13','Africa/Nairobi','1/30/2024 7:05:55 PM','2024-01-30 16:05:57'),(6,23,'0006','Emily','Nyabuto','enyabuto@scgafrica.com','0722000006','2020-11-17','2020-11-23','Africa/Nairobi','1/30/2024 7:08:04 PM','2024-01-30 16:08:06');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levy_deductions`
--

DROP TABLE IF EXISTS `levy_deductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `levy_deductions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `deduction` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `the_rate` varchar(5) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='List of deductions.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levy_deductions`
--

LOCK TABLES `levy_deductions` WRITE;
/*!40000 ALTER TABLE `levy_deductions` DISABLE KEYS */;
INSERT INTO `levy_deductions` VALUES (1,'PAYE','30','Assuming it is 30%'),(2,'NSSF - Tier 1','360','Fixed amount in shillings'),(3,'NSSF - Tier 2','720','Fixed amount in shillings'),(4,'NHIF','3.75','Assuming it is 3.75%'),(5,'Housing Levy','1.5','Assuming it is 1.5%');
/*!40000 ALTER TABLE `levy_deductions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `organization_setup_view`
--

DROP TABLE IF EXISTS `organization_setup_view`;
/*!50001 DROP VIEW IF EXISTS `organization_setup_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `organization_setup_view` AS SELECT 
 1 AS `department_id`,
 1 AS `department`,
 1 AS `position_id`,
 1 AS `position`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `payroll_view`
--

DROP TABLE IF EXISTS `payroll_view`;
/*!50001 DROP VIEW IF EXISTS `payroll_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `payroll_view` AS SELECT 
 1 AS `payroll_id`,
 1 AS `employee_id`,
 1 AS `firstname`,
 1 AS `lastname`,
 1 AS `gross_salary`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `training_list`
--

DROP TABLE IF EXISTS `training_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `training` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='List of available training.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_list`
--

LOCK TABLES `training_list` WRITE;
/*!40000 ALTER TABLE `training_list` DISABLE KEYS */;
INSERT INTO `training_list` VALUES (1,'Leadership Development Training'),(2,'Communication Skills Workshop'),(3,'Team Building Activities'),(4,'Time Management Training'),(5,'Customer Service Excellence'),(6,'Diversity and Inclusion Training'),(7,'Cybersecurity Awareness'),(8,'Project Management Workshop'),(9,'Sales Training'),(10,'Change Management Seminar');
/*!40000 ALTER TABLE `training_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `dashboard_view`
--

/*!50001 DROP VIEW IF EXISTS `dashboard_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dashboard_view` AS select `e`.`id` AS `id`,`e`.`employee_number` AS `employee_number`,`e`.`firstname` AS `firstname`,`e`.`lastname` AS `lastname`,`e`.`email` AS `email`,`e`.`telephone` AS `telephone`,`e`.`recruitment_date` AS `recruitment_date`,`e`.`onboarding_date` AS `onboarding_date`,`e`.`position_id` AS `position_id`,`dp`.`position` AS `position`,`dp`.`department_id` AS `department_id`,`d`.`department` AS `department`,`p`.`id` AS `payroll_id`,`p`.`gross_salary` AS `gross_salary` from (((`employees` `e` join `employee_payroll` `p`) join `department_positions` `dp`) join `departments` `d`) where ((`p`.`employee_id` = `e`.`id`) and (`e`.`position_id` = `dp`.`id`) and (`dp`.`department_id` = `d`.`id`)) order by `e`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `organization_setup_view`
--

/*!50001 DROP VIEW IF EXISTS `organization_setup_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `organization_setup_view` AS select `d`.`id` AS `department_id`,`d`.`department` AS `department`,`dp`.`id` AS `position_id`,`dp`.`position` AS `position` from (`departments` `d` join `department_positions` `dp`) order by `d`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `payroll_view`
--

/*!50001 DROP VIEW IF EXISTS `payroll_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `payroll_view` AS select `p`.`id` AS `payroll_id`,`p`.`employee_id` AS `employee_id`,`e`.`firstname` AS `firstname`,`e`.`lastname` AS `lastname`,`p`.`gross_salary` AS `gross_salary` from (`employee_payroll` `p` join `employees` `e`) order by `p`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-30 19:11:47
