-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: us-cdbr-iron-east-01.cleardb.net    Database: heroku_7ccf8a1d4c91da4
-- ------------------------------------------------------
-- Server version	5.5.56-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `commission` float DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Super Man','superman',0,'123456','2018-08-24 13:11:55',1),(2,'Wonder Woman','wonderwoman',0,'123456','2018-08-24 13:11:55',1),(3,'Rocket Groot','rocketgroot',0,'123456','2018-08-24 13:11:55',1),(4,'Iron Man','ironman',0,'123456','2018-08-24 13:11:55',1),(5,'kim','shiru',0,'123456','2018-08-24 13:11:55',3),(6,'Zainabu Sinyora','admin',0,'123456','2018-08-24 13:13:15',1),(7,'Drax','drax',0,'123456','2018-08-24 13:11:55',1),(8,'Black Panther','blackpanther',0,'123456','2018-08-24 13:11:55',1),(9,'Black Window','blackwindow',0,'123456','2018-08-24 13:11:55',1),(10,'Gamora','gamora',0,'123456','2018-08-24 13:11:55',1),(11,'Hulk','hulk',0,'123456','2018-08-24 13:11:55',1),(12,'Doctor Strange','doctorstrange',0,'123456','2018-08-24 13:11:55',1),(13,'Star Lord','starlord',0,'123456','2018-08-24 13:11:55',1),(14,'Thor','thor',0,'123456','2018-08-24 13:11:55',1),(15,'Winter Solder','wintersolder',0,'123456','2018-08-24 13:11:55',1),(16,'Captain America','shiru',0,'123456','2018-08-24 13:11:55',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id_appointment` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `client` varchar(255) NOT NULL,
  `attendant` varchar(255) NOT NULL,
  `date_of_appointment` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_appointment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duties`
--

DROP TABLE IF EXISTS `duties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duties` (
  `id_duty` int(11) NOT NULL AUTO_INCREMENT,
  `attendant` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_duty`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duties`
--

LOCK TABLES `duties` WRITE;
/*!40000 ALTER TABLE `duties` DISABLE KEYS */;
INSERT INTO `duties` VALUES (1,6,'2018-08-31'),(2,7,'2018-09-01'),(3,5,'2018-08-27'),(4,5,'2018-08-30');
/*!40000 ALTER TABLE `duties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id_member` int(11) NOT NULL,
  `given_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `given_cash` int(11) NOT NULL,
  `service_offered` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,'2018-08-08 14:13:38',1200,NULL),(1,'2018-08-08 14:14:17',1000,NULL),(1,'2018-08-08 14:17:27',1200,NULL),(222,'2018-08-09 05:32:23',1200,NULL),(222,'2018-08-09 05:33:05',1000,NULL),(1,'2018-08-09 05:41:55',1000,NULL),(763489,'2018-08-10 10:17:25',3400,NULL),(7,'2018-08-10 10:44:54',7,NULL),(53635,'2018-08-10 10:48:44',32,NULL),(43746,'2018-08-10 10:53:46',434,NULL),(1,'2018-08-10 10:53:58',11,NULL),(4728980,'2018-08-10 10:58:01',4,NULL),(1,'2018-08-10 10:58:09',1111,NULL),(1,'2018-08-10 10:58:22',111,NULL),(32928333,'2018-08-10 10:58:34',3,NULL),(1,'2018-08-10 11:13:43',111,NULL),(44444,'2018-08-10 11:13:51',444,NULL),(522525,'2018-08-10 11:14:20',5,NULL),(222222222,'2018-08-10 11:15:14',2,NULL),(1,'2018-08-10 11:24:27',11111,NULL),(11,'2018-08-23 17:37:13',1100,NULL),(1,'2018-08-23 19:41:44',323,NULL),(1,'2018-08-23 20:03:58',2112,'NN'),(13,'2018-08-23 20:24:25',310,'Braiding and message'),(1,'2018-08-23 21:09:00',1000,'Body Massage and Muscle Relaxasion'),(1,'2018-08-23 21:10:25',1000,'Muscle Relaxation'),(1,'2018-08-23 21:12:36',1000,'Massage'),(1,'2018-08-23 21:32:11',100,'<p><strong>Pure Hare <s>cut no</s></strong></p>\r\n'),(1,'2018-08-23 21:37:14',210,'<p>Relax</p>\r\n'),(1,'2018-08-24 07:29:54',2000,'<p>Mexican Hair cut</p>\r\n'),(1,'2018-08-24 15:57:35',200,'<p>Hair cut</p>\r\n'),(1,'2018-08-24 15:59:00',200,'<p>Hair cut</p>\r\n'),(200,'2018-08-25 15:12:31',800,'<p><strong>Brainding</strong></p>\r\n'),(1,'2018-08-25 15:14:44',100,'<p>Hair cut</p>\r\n'),(1,'2018-08-25 15:16:18',100,'<p>Hair cut</p>\r\n'),(1,'2018-08-26 12:53:07',500,'<p>Cryptonian Haircut</p>\r\n'),(1,'2018-08-26 13:08:49',1000,'<p>Hair cut</p>\r\n');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `superadmin`
--

DROP TABLE IF EXISTS `superadmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `superadmin` (
  `id_super` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_super`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `superadmin`
--

LOCK TABLES `superadmin` WRITE;
/*!40000 ALTER TABLE `superadmin` DISABLE KEYS */;
INSERT INTO `superadmin` VALUES (1,'James Chege','superadmin','123456');
/*!40000 ALTER TABLE `superadmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users1`
--

DROP TABLE IF EXISTS `users1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users1` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `member_number` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `member_number` (`member_number`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users1`
--

LOCK TABLES `users1` WRITE;
/*!40000 ALTER TABLE `users1` DISABLE KEYS */;
INSERT INTO `users1` VALUES (1,'Spock','Startrek','New york','Actor','1',0,1,'2018-08-08 14:03:10','1'),(2,'Jean-Luc','Picard','Los Angeles','Actor','2',0,1,'2018-08-08 15:40:02','2'),(3,'Bat','Man','Los Angeles','Vigilante','3',0,1,'2018-08-09 06:17:12','3'),(4,'Indiana','Jones','Mars','Acheologist','4',0,1,'2018-08-09 06:19:45','4'),(5,'Killer','Terminator','Illinois','Terminator','5',0,1,'2018-08-09 06:27:58','5'),(6,'Luke','Skywalker','NewYork','Actor','6',0,1,'2018-08-23 17:52:18','6'),(7,'Jack','Sparrow','Kayole','Explorer','7',0,1,'2018-08-23 17:54:00','7'),(8,'Gangalf','Slasher','Athens','Witch Slayer','8',0,1,'2018-08-23 20:44:40','1'),(9,'Wolver','Rine','London','X-man','9',0,1,'2018-08-23 20:47:34','2'),(10,'Tonny ','Montana','Nairobi','Boxer','10',0,1,'2018-08-24 11:14:51','8'),(11,'Malcom','Raynolds','NewYork','Vampire Hunter','11',0,1,'2018-08-24 11:20:13','9'),(12,'Jack','Chan','Karen','Entertainer','12',0,1,'2018-08-24 13:14:38','6'),(13,'Donnie','Yen','Ngong','Actor','13',0,1,'2018-08-24 13:49:44','6');
/*!40000 ALTER TABLE `users1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-26 16:18:51
