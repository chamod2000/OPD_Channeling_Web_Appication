-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: opd_cannelling
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','123','4'),(2,'admin_admin','851','4');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appoinment`
--

DROP TABLE IF EXISTS `appoinment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appoinment` (
  `idappoinment` int NOT NULL AUTO_INCREMENT,
  `appoi_id` int DEFAULT NULL,
  `paitent_id` int DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `hospital_id` int DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `status_p` varchar(45) DEFAULT NULL,
  `status_d` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idappoinment`),
  KEY `fk_p_idx` (`paitent_id`),
  KEY `fk_d_idx` (`doctor_id`),
  KEY `fk_h_idx` (`hospital_id`),
  CONSTRAINT `fk_d` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`iddoctors`),
  CONSTRAINT `fk_h` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`idhospital`),
  CONSTRAINT `fk_p` FOREIGN KEY (`paitent_id`) REFERENCES `patients` (`idpatients`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appoinment`
--

LOCK TABLES `appoinment` WRITE;
/*!40000 ALTER TABLE `appoinment` DISABLE KEYS */;
INSERT INTO `appoinment` VALUES (1,1,1,3,2,'2021-11-25','1','1'),(2,2,2,3,2,'2021-11-25','1','1'),(3,4,1,3,2,'2021-11-25','1','1'),(4,5,1,3,2,'2021-11-25','1','1'),(5,6,1,3,2,'2021-11-25','1','1'),(6,7,2,3,2,'2021-11-25','1','1'),(7,2,2,5,2,'2021-11-26','1','1'),(8,2,2,4,3,'2021-11-24','1','1'),(9,1,2,4,3,'2021-11-29','1','1'),(10,1,1,3,2,'2021-11-24','1','1'),(11,1,1,5,2,'2021-11-23','1','1'),(12,1,1,4,3,'2021-11-28','1','1'),(13,1,1,3,2,'2021-11-30','1','1');
/*!40000 ALTER TABLE `appoinment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `iddoctors` int NOT NULL AUTO_INCREMENT,
  `tital` varchar(45) DEFAULT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `nic_number` varchar(13) DEFAULT NULL,
  `license_nu` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  `hospital_name` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`iddoctors`),
  UNIQUE KEY ` license_nu_UNIQUE` (`license_nu`),
  UNIQUE KEY `nic_number_UNIQUE` (`nic_number`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (3,'Dr(Ms','chamodd','maduwantha','200022402104','102FG','maduwantha@gmail.com','076387901','02:02:00','18:00:00','123','2','leasens'),(4,'Dr(Ms','kasun','perera','200022402102','102FE','kasun@gmail.com','076387902','02:02:00','18:00:00','321','2','melstar'),(5,'Dr(Ms','Vikum','fernando','200022402101','102Fq','vikum@gmal.com','0763877909','02:02:00','18:00:00','147','2','leasens'),(9,'9','Charaka','Fernando','200022402105','105GF','charaka@gmail.com','0715533890','00:00:00','00:00:00','136','2','leasens');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital` (
  `idhospital` int NOT NULL AUTO_INCREMENT,
  `hname` varchar(45) NOT NULL,
  `haddress` varchar(145) NOT NULL,
  `hcontact` varchar(10) NOT NULL,
  PRIMARY KEY (`idhospital`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (1,'hemas','wattala','011936295'),(2,'leasens','ragama','011247856'),(3,'melstar','ragamaaa','076896423');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `idpatients` int NOT NULL AUTO_INCREMENT,
  `tital` varchar(45) DEFAULT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `nic_number` varchar(13) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpatients`),
  UNIQUE KEY `nic_number_UNIQUE` (`nic_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'Mrs','Chamod ','Maduwantha','200022402104','maduwanthachamod01@gmail.com','0763877901','123','0'),(2,'Mr','Sithum','Perera','200022402103','kasun@gmail.com','0763877908','321','0');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `idpayment` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `po_id_no` int DEFAULT NULL,
  PRIMARY KEY (`idpayment`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,1,'1',2250),(2,1,'1',2250),(3,1,'1',2250);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'opd_cannelling'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-23  0:28:55
