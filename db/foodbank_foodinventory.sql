-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: foodbank
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `foodinventory`
--

DROP TABLE IF EXISTS `foodinventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foodinventory` (
  `foodid` varchar(5) NOT NULL,
  `categoryid` varchar(5) NOT NULL,
  `foodbankid` varchar(5) NOT NULL,
  `foodname` varchar(45) NOT NULL,
  `actualQty` int(11) DEFAULT '0',
  `virtualQty` int(11) DEFAULT '0',
  PRIMARY KEY (`foodid`,`categoryid`,`foodbankid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foodinventory`
--

LOCK TABLES `foodinventory` WRITE;
/*!40000 ALTER TABLE `foodinventory` DISABLE KEYS */;
INSERT INTO `foodinventory` VALUES ('B05','02','BONM','Boxed Milk',100,100),('BB01','04','BONM','Peanute Butter',200,10),('C01','01','BONM','Cereal',100,100),('C01','03','BONM','Crackers',100,100),('C04','06','BONM','Canned Fruit',100,10),('M01','01','BONM','Manwich',50,20),('M02','01','BONM','Mac and Cheese',100,100),('M03','03','BONM','Muffin Mix',100,100),('M04','03','BONM','Pancake Mix',100,100),('P01','04','BONM','Pancake Syrup',100,100),('P02','01','BONM','Pasta',100,100),('R01','01','BONM','Rice',200,100),('R02','01','BONM','Oat',100,100),('R02','01','MISA','Basmati Rice',300,150),('SO01','01','BONM','Soup',100,100),('SP01','01','BONM','Spagheti Tuna',100,100),('SP02','01','BONM','SPAM',100,100),('TN01','01','BONM','Tuna',100,100),('VB01','02','ALLO','Brocoli',100,50),('VS','02','MONT','Spinach',50,10);
/*!40000 ALTER TABLE `foodinventory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-26 14:51:16
