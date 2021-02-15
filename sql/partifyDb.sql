-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: partify
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
-- Table structure for table `admindetail`
--

DROP TABLE IF EXISTS `admindetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admindetail` (
  `adminId` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `contactNo` int NOT NULL,
  PRIMARY KEY (`adminId`,`email`),
  KEY `adminId` (`adminId`),
  KEY `adminId_2` (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admindetail`
--

LOCK TABLES `admindetail` WRITE;
/*!40000 ALTER TABLE `admindetail` DISABLE KEYS */;
INSERT INTO `admindetail` VALUES (2,'group1@gmail.com','group','1',775607878),(24,'ucscadmin@gmail.com','ucsc','admin',774589351);
/*!40000 ALTER TABLE `admindetail` ENABLE KEYS */;
UNLOCK TABLES;

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
  `location` varchar(1) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`bookingId`,`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,13,'My Wedding','Wedding Ceromony','2021-04-30','08:00:00','16:00:00','Y','Y','N','Y','N','PENDING'),(2,22,'Get together','Get Together','2021-08-18','12:00:00','17:00:00','Y','Y','N','N','Y','PENDING'),(3,15,'Kevin bday','BirthDay Party','2021-02-26','12:00:00','16:40:00','Y','N','N','N','N','PENDING'),(4,17,'Annual Get together','Get Together','2021-04-14','14:59:00','20:00:00','Y','Y','Y','Y','Y','PENDING'),(7,17,'Kevin bday','BirthDay Party','2021-02-18','16:16:00','18:16:00','N','N','N','Y','N','PENDING');
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
INSERT INTO `catering` VALUES (3,'N','Y','Y',0,450,400),(8,'Y','Y','N',350,600,0),(11,'N','Y','N',0,890,0),(12,'Y','Y','Y',700,1050,1050),(23,'Y','Y','N',600,2000,0);
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
  `mealName` varchar(45) NOT NULL,
  `noOfPlates` int NOT NULL,
  PRIMARY KEY (`bookingId`,`spId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cateringbooking`
--

LOCK TABLES `cateringbooking` WRITE;
/*!40000 ALTER TABLE `cateringbooking` DISABLE KEYS */;
INSERT INTO `cateringbooking` VALUES (1,8,'lunch',450),(2,23,'lunch',400),(4,23,'dinner',400);
/*!40000 ALTER TABLE `cateringbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int NOT NULL,
  `messege` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES (12,'Dasun Deshapriya','dasundeshapriya@gmail.com',776548963,'can you provide me more details about the price ranges'),(13,'Amal Peiris','amal@gmail.com',112456987,'I want to know more about the packages. How can I know them?'),(14,'Kusal Dissanayake','kusaldissanayake@gmail.com',774563212,'Can I please know about price ranges and how to pay you money?'),(15,'Dilani Perera','dilaniperera@gmail.com',112547896,'Can you please provide us details about venues?'),(16,'Dasuni Perera','dasuniperera@gmail.com',112457896,'Can I know about the Decorations and Venues?'),(17,'Nithila Karunarathna','nithilakarunarathna@gmail.com',1123654789,'Can I know about the Price ranges of organizing of events?'),(18,'Nithasha De Silva','nithashasilva@gmail.com',773214569,'Can I get more details about wedding decorations and places? Do you Provide the Cakes along with the decorations?'),(19,'Nishani Amarasekara','nishaniamarasekara@gmail.com',775896321,'Can you please provide more details abouts pacakges?'),(20,'Dasith Pathirage','dasithpathirage@gmail.com',765478963,'Can I know the minimum Price it takes to arrange a birthday party?');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decoration`
--

DROP TABLE IF EXISTS `decoration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decoration` (
  `pId` int NOT NULL AUTO_INCREMENT,
  `spId` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`pId`,`spId`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decoration`
--

LOCK TABLES `decoration` WRITE;
/*!40000 ALTER TABLE `decoration` DISABLE KEYS */;
INSERT INTO `decoration` VALUES (1,3,'platinum',20000,'provide all our services'),(2,6,'Flower decorations',60000,'can supply any type of flowers'),(3,11,'winter',67000,'all the decorations are related to winter'),(4,23,'Silver',50000,'Everything in Silver');
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
  `decorationType` varchar(45) NOT NULL,
  PRIMARY KEY (`bookingId`,`spId`),
  CONSTRAINT `bookId` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decorationbooking`
--

LOCK TABLES `decorationbooking` WRITE;
/*!40000 ALTER TABLE `decorationbooking` DISABLE KEYS */;
INSERT INTO `decorationbooking` VALUES (7,11,'.winter.');
/*!40000 ALTER TABLE `decorationbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `pId` int NOT NULL AUTO_INCREMENT,
  `spId` int NOT NULL,
  `packtype` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `address` varchar(150) NOT NULL,
  `ac` varchar(1) NOT NULL,
  `pool` varchar(1) NOT NULL,
  PRIMARY KEY (`pId`,`spId`,`packtype`,`address`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,5,'Golden Ballroom',150000,'can accommodate about 300 guests','Mount Lavinia','Y','N'),(2,6,'Royal Banquet Hall',300000,'can accommodate about 450 people','Negombo','Y','N'),(3,12,'Crescent Moon hall',400000,'can accommodate around 700 people','Weligama','Y','Y');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locationbooking`
--

DROP TABLE IF EXISTS `locationbooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locationbooking` (
  `bookingId` int NOT NULL,
  `spId` int NOT NULL,
  `locationType` varchar(45) NOT NULL,
  PRIMARY KEY (`bookingId`,`spId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locationbooking`
--

LOCK TABLES `locationbooking` WRITE;
/*!40000 ALTER TABLE `locationbooking` DISABLE KEYS */;
INSERT INTO `locationbooking` VALUES (2,6,'Royal Banquet Hall'),(4,6,'Royal Banquet Hall');
/*!40000 ALTER TABLE `locationbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photography`
--

DROP TABLE IF EXISTS `photography`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photography` (
  `pId` int NOT NULL AUTO_INCREMENT,
  `spId` int NOT NULL,
  `albumType` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`pId`,`spId`,`albumType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photography`
--

LOCK TABLES `photography` WRITE;
/*!40000 ALTER TABLE `photography` DISABLE KEYS */;
INSERT INTO `photography` VALUES (1,3,'Ultimate',10000,'include an album with 300 images'),(2,5,'Gold',15000,'includes an album with 350 images '),(3,10,'diamond',75000,'Full day shoot');
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
INSERT INTO `photographybooking` VALUES (1,3,'.Ultimate.'),(2,5,'.Gold.'),(4,5,'5');
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
  `catering` varchar(1) NOT NULL,
  `photography` varchar(1) NOT NULL,
  `videography` varchar(1) NOT NULL,
  `decoration` varchar(1) NOT NULL,
  `location` varchar(1) NOT NULL,
  PRIMARY KEY (`spId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (3,'Y','Y','N','Y','N'),(5,'N','Y','N','N','Y'),(6,'N','N','N','Y','Y'),(8,'Y','N','Y','N','N'),(10,'N','Y','Y','N','N'),(11,'Y','N','N','Y','N'),(12,'Y','N','N','N','Y'),(23,'Y','N','N','Y','N');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'group1','$2y$10$RgKQ8io4un5Q2.nOFeinDuoaA1UnbPzaAARfNqDm7DHb7FOlfSCQe','Admin'),(3,'Ranjan','$2y$10$KEJIw2pUPasDKEBf33D6IuFzwV7mPkAyBlN4io5nY7SoKbU/KWnD.','Vendor'),(4,'Kamal','$2y$10$Y.NihzJpVYgHoMRltcLkneZsRJ6Y0NerzYDxqe8lNPdWQCHnDTCZW','Vendor'),(5,'Nimal','$2y$10$ZCDbhyTkxi9aFvTwfcNeo.IQokcBsZQgiPBY/WSt2/3iUlDLcDrCW','Vendor'),(6,'LassanaFlora','$2y$10$j6Ymv06Rb5qm6i40vcynheFZTNq8kGzzTmo20Jb/Byla2ar0bc.K6','Vendor'),(7,'Amith','$2y$10$BsAAApfD06iWq4RkWobfJeMKbD6v5ZQv9fp5SypmCWJpWXAwfliBu','Vendor'),(8,'Sunil','$2y$10$niU7Oyo9H7J6K65TiIMoNOSlMO9RS6fT01y19sqoLaQzVygR4.oZC','Vendor'),(9,'Gamini','$2y$10$SccuqLY94h.bWopF7zOqYO2wEiNotZ.DUkzkW6Bahxi3wYBi68A.q','Vendor'),(10,'Kleetas','$2y$10$ke0Zso.z/jgeI1y4XLK/9Ooope6s1AC99mB1OwBGIsj7wrErVHjbu','Vendor'),(11,'Perfections','$2y$10$cgKN15zSvPVJYghZv4HZcOR/ktCQBS/umDvzJ7ubpxYaHU0CpHfua','Vendor'),(12,'Thilina','$2y$10$3TQW6QEFMlpP7dffozIFNeQBIFklyQ4vxg3e6ZXwdAUtH7E/gjCLu','Vendor'),(13,'Fathima','$2y$10$nxx/caGFkMl/v7KVrHDsiu1/qHtnzn/nUKhSsQ.BAPbflswxHlov2','User'),(15,'Kevin98','$2y$10$FTE7J1SK/BO7zSy7YjCSqeY2iqfj4YzuCXl7WmAGLSk6qHMzuSrhS','User'),(16,'Yinol','$2y$10$JTNfK5d.nRugqV0SWI1mFugnCpDYUfIjbspi1ny51qqYKSe6qILGq','User'),(17,'EMMA455','$2y$10$gVhpYt5on5D2ZN24N/mzx.ETXXyscVJa9CMlttghYGTCrxGDgmLnm','User'),(18,'shane','$2y$10$o2546.8h4.9p01zdPoeLfemRV6i3styg3iziX9S64iOYOh25mW7vG','User'),(19,'Arshad','$2y$10$fxdOGJs2kBXZUYIxfpDyV.I2secqA2s5hHoXmPN9o4tNJsMCCmAJa','User'),(20,'Kisal02','$2y$10$UMIfCt.WymHuK88K1x2.q.DNY4t6d7o4p4nSmb4Ki71gbor1EeiES','User'),(21,'Sehansa99','$2y$10$0orYnTHmYyCAoSGscrUeAuT4o/IZ5fgrAnpcymZgYP14ZGVZRm3Ta','User'),(22,'ucsc1','$2y$10$TgqyHLBYNfCLXAkmq62dLe4h1.ntHnRXWhjgcbCw/rOn5IXqAIx4C','User'),(23,'ucsc2','$2y$10$9rb6q66YtLwMOPsjwlOfOe1Q.2CZmtStE1f6g8mgiZkjs9qwZWFJC','Vendor'),(24,'ucsc','$2y$10$.d8fAZVA5dLf624LhIZTTuGchLYNLF6Hw5OPqBMtXhzsEKPW/b1di','Admin');
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
INSERT INTO `userdetail` VALUES (13,'fathima@gmail.com','Fathima','Jeffrey','F','1999-12-01',719867456,'no 22, Church Road, Kolonnawa.'),(15,'kevin98@gmail.com','Kevin','Perera','M','1996-03-13',778604252,'no 62,Sumangala Mawatha,Athurugiriya.'),(16,'yinol@gmail.com','Yinol','Jayawardana','M','1997-04-01',789056543,'no 16/B, Hospital Road , Kiribathgoda.'),(17,'emma@gmail.com','Emma','Rextor','F','1997-06-06',112365478,'no 38, Grairo Place. Kirulapone'),(18,'shane123@gmail.comm','Shane','Kannangara','M','1996-02-14',712396461,'no 72, Jawatta Road, Colombo 6.'),(19,'mohammed@gmail.com','Mohammed','Arshad','M','1994-07-07',412234567,'no 35, Dharga town,Kalutara'),(20,'kisal@gmail.com','Kisal','Hettiarachchi','M','2002-10-16',412223344,'no 34, Bandarawatta Road, Pamburana.'),(21,'sehansa@gmail.com','Rusandi','Sehansa','F','1999-03-01',412222942,'no 56, Araliya Residencies, Wallawatta.'),(22,'ucsc1@gmail.com','ucsc','1','M','1998-02-10',116704232,'no35, .Reid Avenue, Colombo 7');
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
  PRIMARY KEY (`spId`),
  CONSTRAINT `usrId` FOREIGN KEY (`spId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (3,'Delta','no 67, Dharmapala Mawatha ,Gampaha.','ranjan@gmail.com',773456232),(4,'Kamal Party Services','no 4, Grair0 place, piliyandala.','kamal@gmail.com',76347865),(5,'Alpha services','no 57/4, Sri Rathanapala Mawatha, Kapugama.','nimal@gmail.com',412234543),(6,'Lassana flora','45/9, Temple Road,Kandy.','lassanaflora@gmail.com',913478455),(7,'Priyasad Services','no 61, Ishwari Road, Colombo.','amith@gmail.com',412223367),(8,'The ballet','no 201, Thomas Road, Rajagiriya.','ballet@gmail.com',705046789),(9,'Perera Party Services','no 16, Rathupaswala, Mudungoda.','perera@gmail.com',708123456),(10,'Party mania','no 11/A, Alfred Place, Maligawatta.','mania@gmail.com',712378945),(11,'Perfect Get Togethers','no 102, Bauddaloka Mawatha, Colombo 7.','perfections@gmail.com',776456767),(12,'Thilina Parties','no 55/C, Samagi Mawatha, Piliyandala.','thilina@gmail.com',778976456),(23,'ucsc2','no 35, Reid Avenue , Colombo 7.','ucsc2@gmail.com',773456232);
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videography`
--

DROP TABLE IF EXISTS `videography`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videography` (
  `pId` int NOT NULL AUTO_INCREMENT,
  `spId` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`pId`,`spId`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videography`
--

LOCK TABLES `videography` WRITE;
/*!40000 ALTER TABLE `videography` DISABLE KEYS */;
INSERT INTO `videography` VALUES (1,8,'Wedding',65000,'Full wedding coverage'),(2,10,'Standard',75000,'Full day coverage');
/*!40000 ALTER TABLE `videography` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videographybooking`
--

DROP TABLE IF EXISTS `videographybooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videographybooking` (
  `bookingId` int NOT NULL,
  `spId` varchar(45) NOT NULL,
  `albumType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`bookingId`,`spId`),
  CONSTRAINT `bId` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videographybooking`
--

LOCK TABLES `videographybooking` WRITE;
/*!40000 ALTER TABLE `videographybooking` DISABLE KEYS */;
INSERT INTO `videographybooking` VALUES (4,'','5');
/*!40000 ALTER TABLE `videographybooking` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-15 17:44:05
