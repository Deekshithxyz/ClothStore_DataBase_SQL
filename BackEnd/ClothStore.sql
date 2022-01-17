-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ClothStore2
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB-1:10.3.13+maria~bionic-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Account` (
  `Date` varchar(10) DEFAULT NULL,
  `Time` varchar(5) DEFAULT NULL,
  `TID` varchar(14) NOT NULL,
  `EID` varchar(14) DEFAULT NULL,
  `Net` decimal(40,2) DEFAULT 0.00,
  `Discount` decimal(20,2) DEFAULT 0.00,
  `Salary` decimal(20,2) DEFAULT 0.00,
  `TotalCost` decimal(40,2) DEFAULT 0.00,
  `SupplierCost` decimal(40,2) DEFAULT 0.00,
  `Tax` decimal(20,2) DEFAULT 0.00,
  PRIMARY KEY (`TID`),
  KEY `fk_EID` (`EID`),
  CONSTRAINT `fk_EID` FOREIGN KEY (`EID`) REFERENCES `Employee` (`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account`
--

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account` VALUES ('29/03/2019','02:55','10001',NULL,54084.00,5.00,0.00,55100.00,0.00,1738.50),('29/03/2019','03:00','10002',NULL,49804.00,5.00,0.00,50820.00,0.00,1524.50),('20/01/2019','02:22','20001',NULL,545000.00,0.00,0.00,0.00,545000.00,0.00),('20/01/2019','02:55','20002',NULL,545000.00,0.00,0.00,0.00,545000.00,0.00),('20/01/2019','03:03','20003',NULL,545000.00,0.00,0.00,0.00,545000.00,0.00),('20/01/2019','03:55','20004',NULL,545000.00,0.00,0.00,0.00,545000.00,0.00),('20/01/2019','08:00','30001','30001',5000.00,0.00,5000.00,0.00,0.00,0.00),('20/01/2019','08:00','30002','30002',7000.00,0.00,7000.00,0.00,0.00,0.00),('20/01/2019','08:00','30003','30003',10000.00,0.00,10000.00,0.00,0.00,0.00);
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `Category` varchar(18) NOT NULL,
  PRIMARY KEY (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES ('Accessories'),('Bottom Wear'),('Indian Wear'),('Inner Wear'),('Sports Wear'),('Top Wear'),('Winter Wear');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customer` (
  `CID` varchar(14) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `PhoneNo` varchar(10) DEFAULT NULL,
  `Date` varchar(10) DEFAULT NULL,
  `Time` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customer`
--

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` VALUES ('10001','Deekshith','9856743210','29/03/2019','02:55'),('10002','Puja','9856743211','29/03/2019','03:00');
/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger cust_list_trigger
  after insert on Customer
  for each row
  begin
    insert into Account(Date,Time,TID) select Date,Time,CID from Customer order by convert(`CID`,decimal) desc limit 1; 
  end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Employee`
--

DROP TABLE IF EXISTS `Employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employee` (
  `EID` varchar(14) NOT NULL,
  `Name` varchar(15) DEFAULT NULL,
  `Post` varchar(20) DEFAULT NULL,
  `Date` varchar(10) DEFAULT NULL,
  `Time` varchar(5) DEFAULT NULL,
  `Salary` decimal(20,2) DEFAULT 0.00,
  PRIMARY KEY (`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employee`
--

LOCK TABLES `Employee` WRITE;
/*!40000 ALTER TABLE `Employee` DISABLE KEYS */;
INSERT INTO `Employee` VALUES ('30001','Roubal','seller','01/01/2019','05:30',5000.00),('30002','Vinay','cashier','01/01/2018','05:00',7000.00),('30003','Kawale','manager','01/01/2017','04:30',10000.00),('30004','Amitab','seller','02/01/2019','04:30',5000.00),('30005','Bob','sweeper','01/02/2019','03:30',2000.00),('30006','Rani','seller','01/03/2019','05:30',5000.00);
/*!40000 ALTER TABLE `Employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product` (
  `PID` varchar(14) NOT NULL,
  `Name` varchar(8) DEFAULT NULL,
  `Size` varchar(3) DEFAULT NULL,
  `Brand` varchar(8) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 0,
  `Cost` decimal(20,2) DEFAULT 0.00,
  `Category` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`PID`),
  KEY `fk_cat` (`Category`),
  CONSTRAINT `fk_cat` FOREIGN KEY (`Category`) REFERENCES `Category` (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
INSERT INTO `Product` VALUES ('00001','Jeans','XL','Pepe',180,1070.00,'Bottom Wear'),('00002','T-shirt','XXL','Pepe',180,535.00,'Top Wear'),('00003','Jeans','XL','Us Polo',190,963.00,'Bottom Wear'),('00004','T-shirt','M','Us Polo',370,535.00,'Top Wear'),('00005','Sweater','L','Lenin',380,428.00,'Bottom Wear'),('00006','Sweater','M','Lenin',180,374.50,'Winter Wear'),('00007','Jacket','XL','Armani',380,1605.00,'Winter Wear'),('00008','Tie','XL','Us Polo',400,321.00,'Accessories'),('00009','Jeans','XL','Mufti',200,1070.00,'Bottom Wear'),('00010','T-shirt','XXL','Mufti',200,535.00,'Top Wear'),('00011','Jeans','XL','Roadster',200,963.00,'Bottom Wear'),('00012','Sweater','M','Arrow',200,374.50,'Winter Wear');
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Supplier`
--

DROP TABLE IF EXISTS `Supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Supplier` (
  `SID` varchar(14) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Date` varchar(10) DEFAULT NULL,
  `Time` varchar(5) DEFAULT NULL,
  `PhoneNo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Supplier`
--

LOCK TABLES `Supplier` WRITE;
/*!40000 ALTER TABLE `Supplier` DISABLE KEYS */;
INSERT INTO `Supplier` VALUES ('20001','Vinay','20/01/2019','02:22','987654311'),('20002','Anil','20/01/2019','02:55','987654312'),('20003','Vishal','20/01/2019','03:03','987654313'),('20004','kumar','20/01/2019','03:55','987654314');
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger supp_list_trigger
  after insert on Supplier
  for each row
  begin
    insert into Account(Date,Time,TID) select Date,Time,SID from Supplier order by convert(`SID`,decimal) desc limit 1;
  end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `cust_list`
--

DROP TABLE IF EXISTS `cust_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cust_list` (
  `PID` varchar(14) DEFAULT NULL,
  `CID` varchar(11) DEFAULT NULL,
  `Cost` decimal(20,2) DEFAULT 0.00,
  `Quantity` int(11) DEFAULT 1,
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SNo`),
  KEY `fk_CID` (`CID`),
  CONSTRAINT `fk_CID` FOREIGN KEY (`CID`) REFERENCES `Customer` (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cust_list`
--

LOCK TABLES `cust_list` WRITE;
/*!40000 ALTER TABLE `cust_list` DISABLE KEYS */;
INSERT INTO `cust_list` VALUES ('00001','10001',1070.00,10,15),('00002','10001',535.00,10,16),('00003','10001',963.00,10,17),('00004','10001',535.00,10,18),('00005','10001',428.00,10,19),('00006','10001',374.00,10,20),('00007','10001',1605.00,10,21),('00004','10002',535.00,10,22),('00002','10002',535.00,10,23),('00001','10002',1070.00,10,24),('00004','10002',535.00,10,25),('00005','10002',428.00,10,26),('00006','10002',374.00,10,27),('00007','10002',1605.00,10,28);
/*!40000 ALTER TABLE `cust_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger total_cost_trigger
  after insert on cust_list
  for each row
  begin
    update Account set Tax = Tax+(select IF(Cost>1000,0.12*Cost,0.5*Cost) from cust_list where SNo = (select MAX(SNo) from cust_list)) where Account.TID=(select MAX(CID) from Customer);
    update Account set TotalCost = (select sum(Cost*Quantity) from cust_list where CID=(select MAX(CID) from Customer)) where Account.TID=(select MAX(CID) from Customer);
    update Product set Quantity = Quantity-(select Quantity from cust_list where SNo=(select MAX(SNo) from cust_list)) where Product.PID=(select PID from cust_list where SNo=(select MAX(SNo) from cust_list));
    update Account set Discount = (select IF(TotalCost>1000,5,0) from Account where TID=(select MAX(CID) from Customer)) where Account.TID=(select MAX(CID) from Customer);   
    call NET((select max(CID) from Customer));
  end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `supp_list`
--

DROP TABLE IF EXISTS `supp_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supp_list` (
  `Name` varchar(8) DEFAULT NULL,
  `Size` varchar(3) DEFAULT NULL,
  `Brand` varchar(8) DEFAULT NULL,
  `SID` varchar(14) DEFAULT NULL,
  `SCost` decimal(40,2) DEFAULT 0.00,
  `Quantity` int(11) DEFAULT 1,
  `PID` varchar(14) DEFAULT NULL,
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SNo`),
  KEY `fk_SID` (`SID`),
  CONSTRAINT `fk_SID` FOREIGN KEY (`SID`) REFERENCES `Supplier` (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supp_list`
--

LOCK TABLES `supp_list` WRITE;
/*!40000 ALTER TABLE `supp_list` DISABLE KEYS */;
INSERT INTO `supp_list` VALUES ('Jeans','XL','Pepe','20001',1000.00,100,'00001',65),('T-shirt','XXL','Pepe','20001',500.00,100,'00002',66),('Jeans','XL','Us Polo','20001',900.00,100,'00003',67),('T-shirt','M','Us Polo','20001',500.00,100,'00004',68),('Sweater','L','Lenin','20001',400.00,100,'00005',69),('Sweater','M','Lenin','20001',350.00,100,'00006',70),('Jacket','XL','Armani','20001',1500.00,100,'00007',71),('Tie','XL','Us Polo','20001',300.00,100,'00008',72),('Jeans','XL','Mufti','20002',1000.00,100,'00009',73),('T-shirt','XXL','Mufti','20002',500.00,100,'00010',74),('Jeans','XL','Roadster','20002',900.00,100,'00011',75),('T-shirt','M','Us Polo','20002',500.00,100,'00004',76),('Sweater','L','Lenin','20002',400.00,100,'00005',77),('Sweater','M','Arrow','20002',350.00,100,'00012',78),('Jacket','XL','Armani','20002',1500.00,100,'00007',79),('Tie','XL','Us Polo','20002',300.00,100,'00008',80),('Jeans','XL','Pepe','20003',1000.00,100,'00001',81),('T-shirt','XXL','Pepe','20003',500.00,100,'00002',82),('Jeans','XL','Us Polo','20003',900.00,100,'00003',83),('T-shirt','M','Us Polo','20003',500.00,100,'00004',84),('Sweater','L','Lenin','20003',400.00,100,'00005',85),('Sweater','M','Lenin','20003',350.00,100,'00006',86),('Jacket','XL','Armani','20003',1500.00,100,'00007',87),('Tie','XL','Us Polo','20003',300.00,100,'00008',88),('Jeans','XL','Mufti','20004',1000.00,100,'00009',89),('T-shirt','XXL','Mufti','20004',500.00,100,'00010',90),('Jeans','XL','Roadster','20004',900.00,100,'00011',91),('T-shirt','M','Us Polo','20004',500.00,100,'00004',92),('Sweater','L','Lenin','20004',400.00,100,'00005',93),('Sweater','M','Arrow','20004',350.00,100,'00012',94),('Jacket','XL','Armani','20004',1500.00,100,'00007',95),('Tie','XL','Us Polo','20004',300.00,100,'00008',96);
/*!40000 ALTER TABLE `supp_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger supp_cost_trigger
  after insert on supp_list
  for each row
  begin
    update Account set SupplierCost = (select sum(SCost*Quantity) from supp_list where SID=(select MAX(SID) from Supplier)) where Account.TID=(select MAX(SID) from Supplier);
    update Product set Quantity = (Quantity+(select Quantity from supp_list where SNo = (select max(SNo) from supp_list))) where Product.PID=(select PID from supp_list where SNo = (select max(SNo) from supp_list)) and exists(select * from Product where PID = (select PID from supp_list where SNo = (select max(SNo) from supp_list))) ;
    insert into Product(PID,Name,Size,Brand,Quantity,Cost) select PID,Name,Size,Brand,Quantity,SCost*1.07 from supp_list where not exists(select * from Product where PID = (select PID from supp_list where SNo = (select max(SNo) from supp_list))) and SNo = (select max(SNo) from supp_list) ; 
    update Account set Net=SupplierCost where TID = (select max(SID) from Supplier);
  end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30  3:46:25
