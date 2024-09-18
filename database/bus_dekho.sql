-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bus_dekho
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_master`
--

DROP TABLE IF EXISTS `admin_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_master` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(512) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_master`
--

LOCK TABLES `admin_master` WRITE;
/*!40000 ALTER TABLE `admin_master` DISABLE KEYS */;
INSERT INTO `admin_master` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admin_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bus_lineup_master`
--

DROP TABLE IF EXISTS `bus_lineup_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bus_lineup_master` (
  `lineup_id` int NOT NULL AUTO_INCREMENT,
  `color` varchar(32) DEFAULT NULL,
  `fuel_type` varchar(32) DEFAULT NULL,
  `bus_type` varchar(32) DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `count` int DEFAULT '0',
  `activity` tinyint DEFAULT '1',
  PRIMARY KEY (`lineup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bus_lineup_master`
--

LOCK TABLES `bus_lineup_master` WRITE;
/*!40000 ALTER TABLE `bus_lineup_master` DISABLE KEYS */;
INSERT INTO `bus_lineup_master` VALUES (1,'Red','CNG','AC',64,0,1),(2,'Green','CNG','Non-AC',64,0,1);
/*!40000 ALTER TABLE `bus_lineup_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bus_master`
--

DROP TABLE IF EXISTS `bus_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bus_master` (
  `bus_id` int NOT NULL AUTO_INCREMENT,
  `lineup_id` int DEFAULT NULL,
  `bus_name` varchar(64) DEFAULT NULL,
  `registration` varchar(64) DEFAULT NULL,
  `last_service_date` date DEFAULT NULL,
  `activity` tinyint DEFAULT '1',
  PRIMARY KEY (`bus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bus_master`
--

LOCK TABLES `bus_master` WRITE;
/*!40000 ALTER TABLE `bus_master` DISABLE KEYS */;
INSERT INTO `bus_master` VALUES (1,2,'258','DL 1PC 8432',NULL,1),(2,2,'258','DL 1PC 0190',NULL,1),(3,1,'423','DL 1PC 7016',NULL,1);
/*!40000 ALTER TABLE `bus_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bus_route_map`
--

DROP TABLE IF EXISTS `bus_route_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bus_route_map` (
  `br_id` int NOT NULL AUTO_INCREMENT,
  `bus_id` int NOT NULL,
  `route_id` int NOT NULL,
  PRIMARY KEY (`br_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bus_route_map`
--

LOCK TABLES `bus_route_map` WRITE;
/*!40000 ALTER TABLE `bus_route_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `bus_route_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conductor_master`
--

DROP TABLE IF EXISTS `conductor_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conductor_master` (
  `conductor_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) DEFAULT NULL,
  `middle_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `activity` tinyint DEFAULT '1',
  PRIMARY KEY (`conductor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductor_master`
--

LOCK TABLES `conductor_master` WRITE;
/*!40000 ALTER TABLE `conductor_master` DISABLE KEYS */;
INSERT INTO `conductor_master` VALUES (1,'Conductor',NULL,'1','987654321','202cb962ac59075b964b07152d234b70','1992-12-12',1);
/*!40000 ALTER TABLE `conductor_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depot_master`
--

DROP TABLE IF EXISTS `depot_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depot_master` (
  `depot_id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(256) NOT NULL,
  `activity` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`depot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depot_master`
--

LOCK TABLES `depot_master` WRITE;
/*!40000 ALTER TABLE `depot_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `depot_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_master`
--

DROP TABLE IF EXISTS `driver_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `driver_master` (
  `driver_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) DEFAULT NULL,
  `middle_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `activity` tinyint DEFAULT '1',
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_master`
--

LOCK TABLES `driver_master` WRITE;
/*!40000 ALTER TABLE `driver_master` DISABLE KEYS */;
INSERT INTO `driver_master` VALUES (1,'Test',NULL,'Driver','1234567890','202cb962ac59075b964b07152d234b70','1993-04-23',1),(2,'Test','Driver','2','2345678901','caf1a3dfb505ffed0d024130f58c5cfa','1988-12-18',1);
/*!40000 ALTER TABLE `driver_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `route_master`
--

DROP TABLE IF EXISTS `route_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `route_master` (
  `route_id` int NOT NULL AUTO_INCREMENT,
  `route_name` varchar(128) DEFAULT NULL,
  `from` varchar(256) DEFAULT NULL,
  `to` varchar(256) DEFAULT NULL,
  `geojson_path` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `route_master`
--

LOCK TABLES `route_master` WRITE;
/*!40000 ALTER TABLE `route_master` DISABLE KEYS */;
INSERT INTO `route_master` VALUES (1,'Route 66','New Delhi Railway Station','Indigo Terminal 1 IGI Airport','./../routes/Route 66.geojson');
/*!40000 ALTER TABLE `route_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift_master`
--

DROP TABLE IF EXISTS `shift_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift_master` (
  `shift_id` int NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(64) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `activity` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift_master`
--

LOCK TABLES `shift_master` WRITE;
/*!40000 ALTER TABLE `shift_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `shift_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_master` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `phone` int NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(64) NOT NULL,
  `activity` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_master`
--

LOCK TABLES `user_master` WRITE;
/*!40000 ALTER TABLE `user_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-19  2:50:34
