-- MySQL dump 10.15  Distrib 10.0.17-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: datab
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
-- Table structure for table `الابناء`
--
create database datab;
use datab;

DROP TABLE IF EXISTS `الابناء`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `الابناء` (
  `الاسم` varchar(100) DEFAULT NULL,
  `الرقم_القومى_للابن` int(20) NOT NULL,
  `الرقم_القومى_للاب` int(20) NOT NULL,
  `النوع` varchar(10) DEFAULT NULL,
  `السن` int(11) DEFAULT NULL,
  `دخله` double DEFAULT NULL,
  PRIMARY KEY (`الرقم_القومى_للاب`,`الرقم_القومى_للابن`),
  CONSTRAINT `الابناء_ibfk_1` FOREIGN KEY (`الرقم_القومى_للاب`) REFERENCES `الحاله` (`الرقم_القومى`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `الابناء`
--

LOCK TABLES `الابناء` WRITE;
/*!40000 ALTER TABLE `الابناء` DISABLE KEYS */;
INSERT INTO `الابناء` VALUES ('Ahmed',111111,123123,'ذكر',20,0);
/*!40000 ALTER TABLE `الابناء` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `الجمعيات`
--

DROP TABLE IF EXISTS `الجمعيات`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `الجمعيات` (
  `اسم_الجمعيه` varchar(50) NOT NULL,
  `المدير` varchar(200) NOT NULL,
  `رقم_الهاتف` varchar(15) DEFAULT NULL,
  `العنوان` varchar(100) DEFAULT NULL,
  `الايميل` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`اسم_الجمعيه`,`المدير`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `الجمعيات`
--

LOCK TABLES `الجمعيات` WRITE;
/*!40000 ALTER TABLE `الجمعيات` DISABLE KEYS */;
INSERT INTO `الجمعيات` VALUES ('الرجاء','ا:مصطفى','011003399999','اسيوط شارع  المحافظه متفرع من شارع النميس مجمع الرجاء','Ahmednn156@gmail.com'),('الرحاب','أ:محمود','0110555669999','اسيوط شارع  المحافظه متفرع من شارع النميس مجمع الرجاء','lasFci133156@gmail.com');
/*!40000 ALTER TABLE `الجمعيات` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `الحاله`
--

DROP TABLE IF EXISTS `الحاله`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `الحاله` (
  `الاسم` varchar(100) DEFAULT NULL,
  `الرقم_القومى` int(20) NOT NULL,
  `الحاله_الاجتماعيه` varchar(30) DEFAULT NULL,
  `المؤهل` varchar(30) DEFAULT NULL,
  `السن` int(11) DEFAULT NULL,
  `عدد_الابناء` int(11) DEFAULT NULL,
  `العمل` varchar(50) DEFAULT NULL,
  `اجمالى_الدخل` double DEFAULT NULL,
  `اجمالى_المصروفات` double DEFAULT NULL,
  `رقم_الهاتف` varchar(15) DEFAULT NULL,
  `تاريخ_البحث` text,
  `نوع_البحث` varchar(20) DEFAULT NULL,
  `القائم_بالبحث` varchar(30) DEFAULT NULL,
  `دليل_الحاله` varchar(30) DEFAULT NULL,
  `التموين` varchar(10) DEFAULT NULL,
  `الجمعيات_المساعده` int(11) DEFAULT NULL,
  `السكن` varchar(10) DEFAULT NULL,
  `مساحه_السكن` double DEFAULT NULL,
  `نوع_المساعده_المطلوبه` varchar(30) DEFAULT NULL,
  `اسم_الجمعيه_التى_اضافه_الحاله` varchar(50) NOT NULL,
  `العنوان` varchar(100) DEFAULT NULL,
  `فتره_المساعده` int(11) DEFAULT NULL,
  PRIMARY KEY (`الرقم_القومى`,`اسم_الجمعيه_التى_اضافه_الحاله`),
  KEY `اسم_الجمعيه_التى_اضافه_الحاله` (`اسم_الجمعيه_التى_اضافه_الحاله`),
  CONSTRAINT `الحاله_ibfk_1` FOREIGN KEY (`اسم_الجمعيه_التى_اضافه_الحاله`) REFERENCES `الجمعيات` (`اسم_الجمعيه`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `الحاله`
--

LOCK TABLES `الحاله` WRITE;
/*!40000 ALTER TABLE `الحاله` DISABLE KEYS */;
INSERT INTO `الحاله` VALUES ('Alaa samy',123123,'اعذب','امى',12,4,'سائق',122.22,1000.5,'01149268565','12/10/2017','مكتبى','Alaa','لايوجد','يصرف',3,'اجار',200,'ماديه','الرجاء','سوهاج-طما-التحرير',2);
/*!40000 ALTER TABLE `الحاله` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `الدخل`
--

DROP TABLE IF EXISTS `الدخل`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `الدخل` (
  `الرقم_القومى` int(20) NOT NULL,
  `المصدر` varchar(30) NOT NULL,
  `المبلغ` double NOT NULL,
  PRIMARY KEY (`الرقم_القومى`,`المصدر`,`المبلغ`),
  CONSTRAINT `الدخل_ibfk_1` FOREIGN KEY (`الرقم_القومى`) REFERENCES `الحاله` (`الرقم_القومى`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `الدخل`
--

LOCK TABLES `الدخل` WRITE;
/*!40000 ALTER TABLE `الدخل` DISABLE KEYS */;
INSERT INTO `الدخل` VALUES (123123,'دخل الابن احمد',1000),(123123,'مرتب',1100),(123123,'مساعدات',100);
/*!40000 ALTER TABLE `الدخل` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `المصروفات`
--

DROP TABLE IF EXISTS `المصروفات`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `المصروفات` (
  `الرقم_القومى` int(20) NOT NULL,
  `النوع` varchar(30) NOT NULL,
  `المبلغ` double NOT NULL,
  PRIMARY KEY (`الرقم_القومى`,`النوع`,`المبلغ`),
  CONSTRAINT `المصروفات_ibfk_1` FOREIGN KEY (`الرقم_القومى`) REFERENCES `الحاله` (`الرقم_القومى`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `المصروفات`
--

LOCK TABLES `المصروفات` WRITE;
/*!40000 ALTER TABLE `المصروفات` DISABLE KEYS */;
INSERT INTO `المصروفات` VALUES (123123,'ايجار',500),(123123,'ديون',200),(123123,'طعام',900),(123123,'مصاريف المدارس',200);
/*!40000 ALTER TABLE `المصروفات` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_in`
--

DROP TABLE IF EXISTS `log_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_in` (
  `user_name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `اسم_الجمعيه` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_name`,`pwd`),
  KEY `اسم_الجمعيه` (`اسم_الجمعيه`),
  CONSTRAINT `log_in_ibfk_1` FOREIGN KEY (`اسم_الجمعيه`) REFERENCES `الجمعيات` (`اسم_الجمعيه`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_in`
--

LOCK TABLES `log_in` WRITE;
/*!40000 ALTER TABLE `log_in` DISABLE KEYS */;
INSERT INTO `log_in` VALUES ('Ahmed','222','user','الرحاب'),('alaa','111','admin','الرجاء'),('amr','333','user','الرحاب');
/*!40000 ALTER TABLE `log_in` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-30 19:39:46
