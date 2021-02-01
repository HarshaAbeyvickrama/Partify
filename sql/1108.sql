-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: 1108
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `bookingId` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `eventName` varchar(60) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `meal` varchar(1) NOT NULL,
  `photography` varchar(1) NOT NULL,
  `videography` varchar(1) NOT NULL,
  `decoration` varchar(1) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`bookingId`,`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,1,'Bday','Bday','2021-01-20','00:00:12','00:00:05','y','y','y','n',NULL),(2,1,'Bday','Bday','2021-01-20','00:12:00','00:05:00','y','y','y','n',NULL),(3,2,'party','Bday','2021-03-20','12:00:00','05:20:00','y','y','y','n',NULL),(4,1,'dbjhbd','','2021-01-27','16:43:00','16:46:00','N','N','N','N',NULL),(5,1,'dbjhbd','','2021-01-27','16:43:00','16:46:00','N','N','N','N',NULL),(6,8,'party','','2021-01-30','19:50:00','22:50:00','N','N','N','N',NULL),(7,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(8,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(9,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(10,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(11,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(12,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(13,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(14,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(15,1,'new','','2021-01-05','16:03:00','21:57:00','N','N','N','N',NULL),(16,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(17,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(18,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(19,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(20,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(21,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(22,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(23,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(24,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(25,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(26,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(27,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(28,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(29,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(30,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(31,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(32,1,'ewfse','','2021-01-05','17:06:00','22:01:00','N','N','N','N',NULL),(33,6,'harsha','','2021-02-03','17:37:00','17:40:00','Y','Y','Y','N',NULL),(34,6,'harsha','0','2021-02-03','17:37:00','17:40:00','Y','Y','Y','N',NULL);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catering`
--

DROP TABLE IF EXISTS `catering`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catering` (
  `spId` int NOT NULL,
  `breakfast` varchar(1) NOT NULL,
  `lunch` varchar(1) NOT NULL,
  `dinner` varchar(1) NOT NULL,
  `breakfastPlate` decimal(10,0) DEFAULT NULL,
  `lunchPlate` decimal(10,0) DEFAULT NULL,
  `dinnerPlate` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`spId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catering`
--

LOCK TABLES `catering` WRITE;
/*!40000 ALTER TABLE `catering` DISABLE KEYS */;
/*!40000 ALTER TABLE `catering` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cateringbooking`
--

DROP TABLE IF EXISTS `cateringbooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cateringbooking` (
  `bookingId` int NOT NULL,
  `spId` int NOT NULL,
  `meal` varchar(45) NOT NULL,
  `noOfPlates` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`bookingId`,`spId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cateringbooking`
--

LOCK TABLES `cateringbooking` WRITE;
/*!40000 ALTER TABLE `cateringbooking` DISABLE KEYS */;
/*!40000 ALTER TABLE `cateringbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decoration`
--

DROP TABLE IF EXISTS `decoration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decoration` (
  `spId` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`spId`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decoration`
--

LOCK TABLES `decoration` WRITE;
/*!40000 ALTER TABLE `decoration` DISABLE KEYS */;
/*!40000 ALTER TABLE `decoration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decorationbooking`
--

DROP TABLE IF EXISTS `decorationbooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decorationbooking` (
  `bookingId` int NOT NULL,
  `spId` int NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`bookingId`,`spId`),
  CONSTRAINT `bookId` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decorationbooking`
--

LOCK TABLES `decorationbooking` WRITE;
/*!40000 ALTER TABLE `decorationbooking` DISABLE KEYS */;
/*!40000 ALTER TABLE `decorationbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photography`
--

DROP TABLE IF EXISTS `photography`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photography` (
  `spId` int NOT NULL,
  `albumType` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`spId`,`albumType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photography`
--

LOCK TABLES `photography` WRITE;
/*!40000 ALTER TABLE `photography` DISABLE KEYS */;
/*!40000 ALTER TABLE `photography` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photographybooking`
--

DROP TABLE IF EXISTS `photographybooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photographybooking` (
  `bookingId` int NOT NULL,
  `spId` int NOT NULL,
  `albumType` varchar(45) NOT NULL,
  PRIMARY KEY (`bookingId`,`spId`),
  CONSTRAINT `bookingId` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photographybooking`
--

LOCK TABLES `photographybooking` WRITE;
/*!40000 ALTER TABLE `photographybooking` DISABLE KEYS */;
/*!40000 ALTER TABLE `photographybooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `spId` int NOT NULL,
  `serviceType` varchar(15) NOT NULL,
  PRIMARY KEY (`spId`,`serviceType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(6) NOT NULL,
  PRIMARY KEY (`userId`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'VH','$2y$10$FF/ELC.6uMw6nFky8wwPd.Jh1fNQXU1UFYT8T.vErBhjJxnZi40E6','User'),(2,'V_H','$2y$10$F76wlRhGixwJqlk1fS9mJeosUSbjTpmLD9xQOe5EFi/ijanIq8lbW','User'),(12,'har','123','Admin'),(13,'har','123','Admin'),(14,'Thisuri','123','Vendor'),(15,'Yohombu','123','Vendor'),(16,'Shanika','123','Vendor');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetail`
--

DROP TABLE IF EXISTS `userdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userdetail` (
  `userId` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `contactNo` int NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`userId`,`email`),
  CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetail`
--

LOCK TABLES `userdetail` WRITE;
/*!40000 ALTER TABLE `userdetail` DISABLE KEYS */;
INSERT INTO `userdetail` VALUES (1,'harshaabeyvickrama@gmail.com','Harsha','Abeyvickrama','M','1998-08-29',711425085,'testAddress'),(2,'projectyt2146@gmail.com','Harsha','Abeyvickrama','M','2021-02-02',711425085,'testAddress'),(12,'vha@gmail.com','vh','abey','M','1998-08-29',123456,'rawkana'),(13,'vha@gmail.com','vh','abey','M','1998-08-29',123456,'rawkana');
/*!40000 ALTER TABLE `userdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor` (
  `spId` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactNo` int NOT NULL,
  `catering` varchar(1) NOT NULL,
  `photography` varchar(1) NOT NULL,
  `videograpghy` varchar(1) NOT NULL,
  `decoration` varchar(1) NOT NULL,
  PRIMARY KEY (`spId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (1,'vh_tech','Rakwana','harsha@gmail.com',711425085,'Y','Y','Y','Y'),(2,'vh','Rakwana','vh@gmail.com',711425085,'Y','N','Y','N'),(14,'Thisuri Stores','Mathara','thisu@gmail.com',452278945,'Y','Y','Y','N'),(15,'Dula Stores','Pokunuwita','dula@gmail.com',452278945,'Y','Y','Y','N'),(16,'Shani Stores','Pokunuwita','snai96@gmail.com',452278945,'N','Y','Y','N');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videograpghybooking`
--

DROP TABLE IF EXISTS `videograpghybooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videograpghybooking` (
  `bookingId` int NOT NULL,
  `spId` varchar(45) NOT NULL,
  `albumType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`bookingId`,`spId`),
  CONSTRAINT `bId` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videograpghybooking`
--

LOCK TABLES `videograpghybooking` WRITE;
/*!40000 ALTER TABLE `videograpghybooking` DISABLE KEYS */;
/*!40000 ALTER TABLE `videograpghybooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videography`
--

DROP TABLE IF EXISTS `videography`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videography` (
  `spId` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`spId`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videography`
--

LOCK TABLES `videography` WRITE;
/*!40000 ALTER TABLE `videography` DISABLE KEYS */;
/*!40000 ALTER TABLE `videography` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-30 17:11:00
