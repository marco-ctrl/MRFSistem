-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: mrfbermejobd
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `aalumno`
--

DROP TABLE IF EXISTS `aalumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aalumno` (
  `facodmie` varchar(10) NOT NULL,
  `pacodalu` varchar(10) NOT NULL,
  `caestalu` tinyint(1) NOT NULL,
  PRIMARY KEY (`pacodalu`),
  KEY `IXFK_Alumno_Miembro` (`facodmie`),
  CONSTRAINT `FK_alumno_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`),
  CONSTRAINT `FK_Alumno_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aalumno`
--

LOCK TABLES `aalumno` WRITE;
/*!40000 ALTER TABLE `aalumno` DISABLE KEYS */;
INSERT INTO `aalumno` VALUES ('MBR-000004','ALU-000001',1),('MBR-000005','ALU-000002',1),('MBR-000002','ALU-000004',0),('MBR-000006','ALU-000005',1),('MBR-000008','ALU-000006',1),('MBR-000007','ALU-000007',1),('MBR-000009','ALU-000008',1),('MBR-000010','ALU-000009',1);
/*!40000 ALTER TABLE `aalumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aarqcaj`
--

DROP TABLE IF EXISTS `aarqcaj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aarqcaj` (
  `pacodcaj` varchar(10) NOT NULL,
  `cainicaj` date NOT NULL,
  `cafincaj` date DEFAULT NULL,
  `camonini` decimal(10,2) NOT NULL,
  `camonfin` decimal(10,2) DEFAULT NULL,
  `caestcaj` tinyint(1) NOT NULL,
  `catoting` decimal(10,2) DEFAULT NULL,
  `catotegr` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`pacodcaj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aarqcaj`
--

LOCK TABLES `aarqcaj` WRITE;
/*!40000 ALTER TABLE `aarqcaj` DISABLE KEYS */;
INSERT INTO `aarqcaj` VALUES ('CAJ-000001','2021-11-26','2021-12-01',250.00,245.59,0,963.59,968.00),('CAJ-000002','2021-12-01','2021-12-01',245.59,423.59,0,1245.00,1067.00),('CAJ-000004','2021-12-11','2021-12-11',423.59,528.79,0,763.00,657.80),('CAJ-000005','2022-01-21','2022-01-21',528.79,1094.79,0,1915.00,1349.00),('CAJ-000007','2022-01-21','2022-01-21',1094.79,1606.79,0,1580.00,1068.00),('CAJ-000008','2022-01-25','2022-02-28',1606.79,1868.79,0,1830.00,1568.00),('CAJ-000009','2022-03-29','2022-03-29',1868.79,1793.99,0,988.00,1062.80);
/*!40000 ALTER TABLE `aarqcaj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `abardir`
--

DROP TABLE IF EXISTS `abardir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abardir` (
  `caestbar` tinyint(1) NOT NULL,
  `canombar` varchar(30) NOT NULL,
  `pacodbar` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodbar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abardir`
--

LOCK TABLES `abardir` WRITE;
/*!40000 ALTER TABLE `abardir` DISABLE KEYS */;
INSERT INTO `abardir` VALUES (1,'BOLIVAR','BAR-000001'),(1,'MUNICIPAL','BAR-000002'),(1,'AEROPUERTO','BAR-000003'),(1,'MOTO MENDEZ','BAR-000005'),(1,'CENTRAL','BAR-000006'),(1,'SAN JOSE','BAR-000008'),(1,'CENTRAL','BAR-000009'),(1,'LINDO','BAR-000011'),(1,'MOTO MENDEZ','BAR-000016'),(1,'MOTO MENDEZ','BAR-000017');
/*!40000 ALTER TABLE `abardir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acaldir`
--

DROP TABLE IF EXISTS `acaldir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acaldir` (
  `caestcal` tinyint(1) NOT NULL,
  `canomcal` varchar(30) NOT NULL,
  `pacodcal` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodcal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acaldir`
--

LOCK TABLES `acaldir` WRITE;
/*!40000 ALTER TABLE `acaldir` DISABLE KEYS */;
INSERT INTO `acaldir` VALUES (1,'LUIS DE FUENTES','CAL-000001'),(1,'COHABAMBA','CAL-000003'),(1,'PANDO','CAL-000005'),(1,'TARIJA','CAL-000006'),(1,'AMELLER','CAL-000008'),(1,'NILLS KLEMEN','CAL-000009'),(1,'LITORAL','CAL-000010'),(1,'LUIS DE FUENTES','CAL-000011'),(1,'MARISCAL ANDRES DE SANTA CRUZ','CAL-000012'),(1,'GERMAN BUSH','CAL-000013'),(1,'GERMAN BUSH','CAL-000014'),(1,'AMELLER','CAL-000015'),(1,'AMELLER','CAL-000016');
/*!40000 ALTER TABLE `acaldir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acelula`
--

DROP TABLE IF EXISTS `acelula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acelula` (
  `caestcel` tinyint(1) NOT NULL,
  `canomcel` varchar(30) NOT NULL,
  `canumcel` varchar(4) NOT NULL,
  `pacodcel` varchar(10) NOT NULL,
  `facodbar` varchar(10) NOT NULL,
  `calatcel` decimal(20,10) NOT NULL,
  `facodcal` varchar(10) NOT NULL,
  `calogcel` decimal(20,10) NOT NULL,
  `cacrokis` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pacodcel`),
  KEY `IXFK_Celula_Barrio` (`facodbar`),
  KEY `IXFK_Celula_Calle` (`facodcal`),
  CONSTRAINT `FK_bardir_celula` FOREIGN KEY (`facodbar`) REFERENCES `abardir` (`pacodbar`),
  CONSTRAINT `FK_caldir_celula` FOREIGN KEY (`facodcal`) REFERENCES `acaldir` (`pacodcal`),
  CONSTRAINT `FK_Celula_Barrio` FOREIGN KEY (`facodbar`) REFERENCES `abardir` (`pacodbar`),
  CONSTRAINT `FK_Celula_Calle` FOREIGN KEY (`facodcal`) REFERENCES `acaldir` (`pacodcal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acelula`
--

LOCK TABLES `acelula` WRITE;
/*!40000 ALTER TABLE `acelula` DISABLE KEYS */;
INSERT INTO `acelula` VALUES (1,'ALFA Y OMEGA','7','CEL-000001','BAR-000001',-22.7358520702,'CAL-000001',-64.3363237281,NULL),(1,'HEDEON','1','CEL-000002','BAR-000001',-22.7339152892,'CAL-000001',-64.3391561508,NULL),(1,'TORRE FUERTE','2','CEL-000003','BAR-000003',-22.7321341223,'CAL-000012',-64.3395423889,NULL),(1,'SOLDADOS DE CRISTO','4','CEL-000004','BAR-000001',-22.7368838492,'CAL-000011',-64.3355941772,NULL),(1,'ZION','6','CEL-000005','BAR-000001',-22.7316591405,'CAL-000001',-64.3418169022,NULL),(1,'HERALDOZ','8','CEL-000008','BAR-000011',-22.7352610444,'CAL-000010',-64.3390274048,NULL),(1,'LEON DE JUDA','9','CEL-000009','BAR-000002',-22.7245738000,'CAL-000009',-64.3426752090,NULL),(1,'CORDERO','11','CEL-000010','BAR-000008',-22.7267014198,'CAL-000005',-64.3381583691,NULL),(1,'HIJOS DEL REY','12','CEL-000011','BAR-000006',-22.7329653364,'CAL-000008',-64.3430614471,NULL),(1,'AGUILAS','13','CEL-000012','BAR-000001',-22.7349048164,'CAL-000014',-64.3392419815,NULL),(1,'CELULA','20','CEL-000013','BAR-000017',-22.7395357083,'CAL-000016',-64.3346929550,NULL);
/*!40000 ALTER TABLE `acelula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aciudad`
--

DROP TABLE IF EXISTS `aciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aciudad` (
  `caestciu` tinyint(1) NOT NULL,
  `canomciu` varchar(30) NOT NULL,
  `pacodciu` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodciu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aciudad`
--

LOCK TABLES `aciudad` WRITE;
/*!40000 ALTER TABLE `aciudad` DISABLE KEYS */;
INSERT INTO `aciudad` VALUES (1,'BERMEJO','CIU-000001'),(1,'PADCAYA','CIU-000002'),(1,'TARIJA','CIU-000003'),(1,'VILLAMONTES','CIU-000004'),(1,'YACUIBA','CIU-000005'),(1,'SANTA CRUZ','CIU-000006'),(1,'COCHABAMBA','CIU-000007'),(1,'LA PAZ','CIU-000008'),(1,'ORURO','CIU-000009'),(1,'POTOSI','CIU-000010');
/*!40000 ALTER TABLE `aciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aconegr`
--

DROP TABLE IF EXISTS `aconegr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aconegr` (
  `camonegr` int NOT NULL,
  `cadesegr` varchar(150) NOT NULL,
  `pacodegr` varchar(10) NOT NULL,
  `cafecegr` date DEFAULT NULL,
  PRIMARY KEY (`pacodegr`),
  KEY `IXFK_Aporte_Objeto_Aportes` (`pacodegr`),
  CONSTRAINT `FK_Aporte_Objeto_Aportes` FOREIGN KEY (`pacodegr`) REFERENCES `aconfin` (`pacodapo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aconegr`
--

LOCK TABLES `aconegr` WRITE;
/*!40000 ALTER TABLE `aconegr` DISABLE KEYS */;
INSERT INTO `aconegr` VALUES (200,'SERVICIOS DE LIMPIEZA','EGR-000005','2021-11-26'),(120,'SEGURIDAD','EGR-000006','2021-11-26'),(50,'INSTRUMENTOS DE MUSICA','EGR-000007','2021-11-26'),(20,'HERRAMIENTAS','EGR-000008','2021-11-26'),(482,'OFRENDA MINISTERIAL(50%)','EGR-000013','2021-12-01'),(96,'MISIONES(10%)','EGR-000014','2021-12-01'),(200,'SERVICIOS DE LIMPIEZA','EGR-000015','2021-12-01'),(120,'SEGURIDAD','EGR-000016','2021-12-01'),(623,'OFRENDA MINISTERIAL(50%)','EGR-000017','2021-12-01'),(125,'MISIONES(10%)','EGR-000018','2021-12-01'),(200,'SERVICIOS DE LIMPIEZA','EGR-000019','2021-12-11'),(382,'OFRENDA MINISTERIAL(50%)','EGR-000020','2021-12-11'),(76,'MISIONES(10%)','EGR-000021','2021-12-11'),(200,'SERVICIOS DE LIMPIEZA','EGR-000022','2022-01-21'),(958,'OFRENDA MINISTERIAL(50%)','EGR-000023','2022-01-21'),(192,'MISIONES(10%)','EGR-000024','2022-01-21'),(120,'SEGURIDAD','EGR-000025','2022-01-21'),(790,'OFRENDA MINISTERIAL(50%)','EGR-000028','2022-01-21'),(158,'MISIONES(10%)','EGR-000029','2022-01-21'),(200,'SERVICIOS DE LIMPIEZA','EGR-000030','2022-01-25'),(120,'SEGURIDAD','EGR-000031','2022-02-28'),(150,'SERVICIOS DE INTERNET','EGR-000032','2022-02-28'),(915,'OFRENDA MINISTERIAL(50%)','EGR-000033','2022-02-28'),(183,'MISIONES(10%)','EGR-000034','2022-02-28'),(200,'SERVICIOS DE LIMPIEZA','EGR-000035','2022-03-29'),(120,'SEGURIDAD','EGR-000036','2022-03-29'),(150,'SERVICIOS DE INTERNET','EGR-000037','2022-03-29'),(494,'OFRENDA MINISTERIAL(50%)','EGR-000038','2022-03-29'),(99,'MISIONES(10%)','EGR-000039','2022-03-29');
/*!40000 ALTER TABLE `aconegr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aconfin`
--

DROP TABLE IF EXISTS `aconfin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aconfin` (
  `caestapo` tinyint(1) NOT NULL,
  `cafecapo` date NOT NULL,
  `cahorapo` time(6) NOT NULL,
  `pacodapo` varchar(10) NOT NULL,
  `facodusu` varchar(10) NOT NULL,
  `facodcaj` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`pacodapo`),
  KEY `IXFK_Aportes_Usuario` (`facodusu`),
  KEY `IXFK_aconfin_aarqcaj` (`facodcaj`),
  CONSTRAINT `FK_aconfin_aarqcaj` FOREIGN KEY (`facodcaj`) REFERENCES `aarqcaj` (`pacodcaj`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_Aportes_Usuario` FOREIGN KEY (`facodusu`) REFERENCES `ausurio` (`pacodusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aconfin`
--

LOCK TABLES `aconfin` WRITE;
/*!40000 ALTER TABLE `aconfin` DISABLE KEYS */;
INSERT INTO `aconfin` VALUES (1,'2021-11-26','22:36:00.000000','EGR-000005','USU-000004','CAJ-000001'),(1,'2021-11-26','22:09:00.000000','EGR-000006','USU-000004','CAJ-000001'),(1,'2021-11-26','22:22:00.000000','EGR-000007','USU-000004','CAJ-000001'),(1,'2021-11-26','22:44:00.000000','EGR-000008','USU-000004','CAJ-000001'),(1,'2021-12-01','01:56:00.000000','EGR-000013','USU-000004','CAJ-000001'),(1,'2021-12-01','01:56:00.000000','EGR-000014','USU-000004','CAJ-000001'),(1,'2021-12-01','20:57:00.000000','EGR-000015','USU-000004','CAJ-000002'),(1,'2021-12-01','20:57:00.000000','EGR-000016','USU-000004','CAJ-000002'),(1,'2021-12-01','10:40:00.000000','EGR-000017','USU-000004','CAJ-000002'),(1,'2021-12-01','10:40:00.000000','EGR-000018','USU-000004','CAJ-000002'),(1,'2021-12-11','17:54:00.000000','EGR-000019','USU-000001','CAJ-000004'),(1,'2021-12-11','05:56:00.000000','EGR-000020','USU-000001','CAJ-000004'),(1,'2021-12-11','05:56:00.000000','EGR-000021','USU-000001','CAJ-000004'),(1,'2022-01-21','21:08:00.000000','EGR-000022','USU-000001','CAJ-000005'),(1,'2022-01-21','09:18:00.000000','EGR-000023','USU-000001','CAJ-000005'),(1,'2022-01-21','09:18:00.000000','EGR-000024','USU-000001','CAJ-000005'),(1,'2022-01-21','21:39:00.000000','EGR-000025','USU-000001','CAJ-000007'),(1,'2022-01-21','10:41:00.000000','EGR-000026','USU-000001','CAJ-000007'),(1,'2022-01-21','10:41:00.000000','EGR-000027','USU-000001','CAJ-000007'),(1,'2022-01-21','11:18:00.000000','EGR-000028','USU-000001','CAJ-000007'),(1,'2022-01-21','11:18:00.000000','EGR-000029','USU-000001','CAJ-000007'),(1,'2022-01-25','22:15:00.000000','EGR-000030','USU-000001','CAJ-000008'),(1,'2022-02-28','11:19:00.000000','EGR-000031','USU-000001','CAJ-000008'),(1,'2022-02-28','11:19:00.000000','EGR-000032','USU-000001','CAJ-000008'),(1,'2022-02-28','11:20:00.000000','EGR-000033','USU-000001','CAJ-000008'),(1,'2022-03-10','11:20:00.000000','EGR-000034','USU-000001','CAJ-000008'),(1,'2022-03-29','17:01:00.000000','EGR-000035','USU-000001','CAJ-000009'),(1,'2022-03-29','17:01:00.000000','EGR-000036','USU-000001','CAJ-000009'),(1,'2022-03-29','17:01:00.000000','EGR-000037','USU-000001','CAJ-000009'),(1,'2022-03-29','05:03:00.000000','EGR-000038','USU-000001','CAJ-000009'),(1,'2022-03-29','05:03:00.000000','EGR-000039','USU-000001','CAJ-000009'),(1,'2021-11-26','22:36:00.000000','ING-000016','USU-000004','CAJ-000001'),(1,'2021-11-26','22:01:00.000000','ING-000017','USU-000004','CAJ-000001'),(1,'2021-11-26','22:02:00.000000','ING-000018','USU-000004','CAJ-000001'),(1,'2021-11-26','22:08:00.000000','ING-000019','USU-000004','CAJ-000001'),(1,'2021-11-29','21:33:00.000000','ING-000020','USU-000004','CAJ-000001'),(1,'2021-11-29','21:33:00.000000','ING-000021','USU-000004','CAJ-000001'),(1,'2021-11-29','21:33:00.000000','ING-000022','USU-000004','CAJ-000001'),(1,'2021-11-29','21:48:00.000000','ING-000023','USU-000004','CAJ-000001'),(1,'2021-11-29','21:48:00.000000','ING-000024','USU-000004','CAJ-000001'),(1,'2021-11-29','21:48:00.000000','ING-000025','USU-000004','CAJ-000001'),(1,'2021-11-29','21:49:00.000000','ING-000026','USU-000004','CAJ-000001'),(1,'2021-12-01','20:54:00.000000','ING-000027','USU-000004','CAJ-000002'),(1,'2021-12-01','20:54:00.000000','ING-000028','USU-000004','CAJ-000002'),(1,'2021-12-01','20:54:00.000000','ING-000029','USU-000004','CAJ-000002'),(1,'2021-12-01','20:55:00.000000','ING-000030','USU-000004','CAJ-000002'),(1,'2021-12-01','20:55:00.000000','ING-000031','USU-000004','CAJ-000002'),(1,'2021-12-01','20:55:00.000000','ING-000032','USU-000004','CAJ-000002'),(1,'2021-12-11','17:50:00.000000','ING-000033','USU-000001','CAJ-000004'),(1,'2021-12-11','17:51:00.000000','ING-000034','USU-000001','CAJ-000004'),(1,'2022-01-21','21:06:00.000000','ING-000035','USU-000001','CAJ-000005'),(1,'2022-01-21','21:07:00.000000','ING-000036','USU-000001','CAJ-000005'),(1,'2022-01-21','21:07:00.000000','ING-000037','USU-000001','CAJ-000005'),(1,'2022-01-21','21:38:00.000000','ING-000038','USU-000001','CAJ-000007'),(1,'2022-01-21','21:38:00.000000','ING-000039','USU-000001','CAJ-000007'),(1,'2022-01-21','21:38:00.000000','ING-000040','USU-000001','CAJ-000007'),(1,'2022-01-25','21:50:00.000000','ING-000041','USU-000001','CAJ-000008'),(1,'2022-03-10','11:17:00.000000','ING-000042','USU-000001','CAJ-000008'),(1,'2022-03-10','11:17:00.000000','ING-000043','USU-000001','CAJ-000008'),(1,'2022-03-10','11:18:00.000000','ING-000044','USU-000001','CAJ-000008'),(1,'2022-03-10','11:18:00.000000','ING-000045','USU-000001','CAJ-000008'),(1,'2022-03-10','11:18:00.000000','ING-000046','USU-000001','CAJ-000008'),(1,'2022-03-29','16:59:00.000000','ING-000047','USU-000001','CAJ-000009'),(1,'2022-03-29','16:59:00.000000','ING-000048','USU-000001','CAJ-000009'),(1,'2022-03-29','17:00:00.000000','ING-000049','USU-000001','CAJ-000009'),(1,'2022-03-29','17:00:00.000000','ING-000050','USU-000001','CAJ-000009'),(1,'2022-03-29','17:00:00.000000','ING-000051','USU-000001','CAJ-000009'),(1,'2022-03-29','17:01:00.000000','ING-000052','USU-000001','CAJ-000009');
/*!40000 ALTER TABLE `aconfin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aconido`
--

DROP TABLE IF EXISTS `aconido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aconido` (
  `cadescon` varchar(150) NOT NULL,
  `caestcon` tinyint(1) NOT NULL,
  `canommat` varchar(20) NOT NULL,
  `pacodcon` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aconido`
--

LOCK TABLES `aconido` WRITE;
/*!40000 ALTER TABLE `aconido` DISABLE KEYS */;
INSERT INTO `aconido` VALUES ('MODULO 1 DE LA ESCUELA DE LIDEREZ',1,'MODULO 1','CON-000001'),('MARIO RODRIGUES',0,'MODULO 2','CON-000002'),('TERCER MODULO DE LA ESCUELA DE LIDERES',1,'MODULO 3','CON-000003'),('DESCRIPCIÓN',0,'HERMENÉUTICA','CON-000004'),('DESCRIPC',1,'MODULO 2','CON-000005');
/*!40000 ALTER TABLE `aconido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aconing`
--

DROP TABLE IF EXISTS `aconing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aconing` (
  `camoning` double(10,2) NOT NULL,
  `pacodeco` varchar(10) NOT NULL,
  `catiping` varchar(50) NOT NULL,
  `cafecing` date NOT NULL,
  PRIMARY KEY (`pacodeco`),
  KEY `IXFK_Aporte_Economico_Aportes` (`pacodeco`),
  CONSTRAINT `FK_Aporte_Economico_Aportes` FOREIGN KEY (`pacodeco`) REFERENCES `aconfin` (`pacodapo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aconing`
--

LOCK TABLES `aconing` WRITE;
/*!40000 ALTER TABLE `aconing` DISABLE KEYS */;
INSERT INTO `aconing` VALUES (200.00,'ING-000016','DIEZMOS','2021-11-26'),(100.00,'ING-000017','OFRENDAS','2021-11-26'),(50.59,'ING-000018','OFRENDA DE CELULAS','2021-11-26'),(20.00,'ING-000019','OFRENDA DE JOVENES','2021-11-26'),(300.00,'ING-000020','DIEZMOS','2021-11-29'),(60.00,'ING-000021','OFRENDA DE JOVENES','2021-11-29'),(30.00,'ING-000022','OFRENDA DE CELULAS','2021-11-29'),(63.00,'ING-000023','OFRENDAS','2021-11-29'),(52.00,'ING-000024','OFRENDA AYUNO','2021-11-29'),(32.00,'ING-000025','OTROS INGRESOS','2021-11-29'),(56.00,'ING-000026','DIEZMOS','2021-11-29'),(200.00,'ING-000027','DIEZMOS','2021-12-01'),(65.00,'ING-000028','OFRENDAS','2021-12-01'),(300.00,'ING-000029','OFRENDA DE CELULAS','2021-12-01'),(100.00,'ING-000030','OFRENDA DE JOVENES','2021-12-01'),(80.00,'ING-000031','OFRENDA AYUNO','2021-12-01'),(500.00,'ING-000032','OTROS INGRESOS','2021-12-01'),(559.00,'ING-000033','DIEZMOS','2021-12-11'),(204.00,'ING-000034','OFRENDAS','2021-12-11'),(900.00,'ING-000035','DIEZMOS','2022-01-21'),(865.00,'ING-000036','OFRENDAS','2022-01-21'),(150.00,'ING-000037','OFRENDA DE JOVENES','2022-01-21'),(500.00,'ING-000038','DIEZMOS','2022-01-21'),(80.00,'ING-000039','OFRENDAS','2022-01-21'),(1000.00,'ING-000040','OFRENDA DE CELULAS','2022-01-21'),(500.00,'ING-000041','DIEZMOS','2022-01-25'),(500.00,'ING-000042','OFRENDAS','2022-02-28'),(60.00,'ING-000043','OFRENDA DE CELULAS','2022-02-28'),(80.00,'ING-000044','OFRENDA DE JOVENES','2022-02-28'),(90.00,'ING-000045','OFRENDA AYUNO','2022-02-28'),(600.00,'ING-000046','OTROS INGRESOS','2022-02-28'),(500.00,'ING-000047','DIEZMOS','2022-03-29'),(98.00,'ING-000048','OFRENDAS','2022-03-29'),(100.00,'ING-000049','OFRENDA DE CELULAS','2022-03-29'),(25.00,'ING-000050','OFRENDA DE JOVENES','2022-03-29'),(65.00,'ING-000051','OFRENDA AYUNO','2022-03-29'),(200.00,'ING-000052','OTROS INGRESOS','2022-03-29');
/*!40000 ALTER TABLE `aconing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acreesp`
--

DROP TABLE IF EXISTS `acreesp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acreesp` (
  `cafecenc` date DEFAULT NULL,
  `cafecbau` date DEFAULT NULL,
  `cafeccon` date DEFAULT NULL,
  `cafecigl` date DEFAULT NULL,
  `pacodcre` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodcre`),
  KEY `IXFK_CrecimientoEspiritual_Miembro` (`pacodcre`),
  CONSTRAINT `FK_CrecimientoEspiritual_Miembro` FOREIGN KEY (`pacodcre`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_cremie_miebro` FOREIGN KEY (`pacodcre`) REFERENCES `amiebro` (`pacodmie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acreesp`
--

LOCK TABLES `acreesp` WRITE;
/*!40000 ALTER TABLE `acreesp` DISABLE KEYS */;
INSERT INTO `acreesp` VALUES ('2022-02-18','2022-02-06','2022-02-12','2022-02-20','MBR-000001'),('2022-02-11','2022-02-05','2022-02-18','2022-02-20','MBR-000002'),('2022-02-13','2022-02-12','2022-02-18','2022-02-06','MBR-000004'),('2022-02-06','2022-02-08','2022-02-11','2022-02-03','MBR-000005'),('2022-02-12','2022-02-06','2022-02-19','2022-02-20','MBR-000006'),('2022-02-05','2022-02-20','2022-02-19','2022-02-20','MBR-000007'),('2022-02-05','2022-02-12','2022-02-18','2022-02-13','MBR-000008'),('2022-02-13','2022-02-12','2022-02-19','2022-02-13','MBR-000009'),('2022-02-17','2022-02-19','2022-02-13','2022-02-12','MBR-000010'),('2022-02-12','2022-02-13','2022-02-11','2022-02-20','MBR-000019');
/*!40000 ALTER TABLE `acreesp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acursom`
--

DROP TABLE IF EXISTS `acursom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acursom` (
  `cadescur` varchar(15) NOT NULL,
  `caestcur` tinyint(1) NOT NULL,
  `cafecini` date NOT NULL,
  `cagescur` varchar(4) NOT NULL,
  `facodcon` varchar(10) NOT NULL,
  `facodmae` varchar(10) NOT NULL,
  `pacodcur` varchar(10) NOT NULL,
  `caparcur` varchar(1) NOT NULL,
  PRIMARY KEY (`pacodcur`),
  KEY `IXFK_Curso_Contenido` (`facodcon`),
  KEY `IXFK_Curso_Maestro` (`facodmae`),
  CONSTRAINT `FK_Curso_Contenido` FOREIGN KEY (`facodcon`) REFERENCES `aconido` (`pacodcon`),
  CONSTRAINT `FK_Curso_Maestro` FOREIGN KEY (`facodmae`) REFERENCES `amaetro` (`pacodmae`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acursom`
--

LOCK TABLES `acursom` WRITE;
/*!40000 ALTER TABLE `acursom` DISABLE KEYS */;
INSERT INTO `acursom` VALUES ('descripcion',1,'2021-10-16','2021','CON-000001','MTR-000001','CUR-000001','B'),('descr',1,'2021-10-23','2021','CON-000002','MTR-000002','CUR-000002','A'),('descrip',1,'2021-10-29','2021','CON-000003','MTR-000002','CUR-000003','A'),('descripcion',1,'2021-11-06','2021','CON-000001','MTR-000002','CUR-000004','A'),('descripcion',1,'2021-12-25','2021','CON-000005','MTR-000006','CUR-000005','C'),('descripcion',1,'2022-02-23','2022','CON-000003','MTR-000006','CUR-000006','A');
/*!40000 ALTER TABLE `acursom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aegrefij`
--

DROP TABLE IF EXISTS `aegrefij`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aegrefij` (
  `pacodefe` varchar(10) NOT NULL,
  `cadesefe` varchar(50) DEFAULT NULL,
  `cacanefe` double(10,2) NOT NULL,
  `caestefe` tinyint(1) NOT NULL,
  `catipcan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pacodefe`),
  KEY `IXFK_aegrent_aconegr` (`pacodefe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aegrefij`
--

LOCK TABLES `aegrefij` WRITE;
/*!40000 ALTER TABLE `aegrefij` DISABLE KEYS */;
INSERT INTO `aegrefij` VALUES ('EGE-000001','SERVICIOS DE LIMPIEZA',200.00,1,'EFECTIVO'),('EGE-000002','OFRENDA MINISTERIAL',50.00,1,'PORCENTUAL'),('EGE-000003','MISIONES',10.00,1,'PORCENTUAL'),('EGE-000004','SEGURIDAD',120.00,1,'EFECTIVO'),('EGE-000006','SERVICIOS DE INTERNET',150.00,1,'EFECTIVO');
/*!40000 ALTER TABLE `aegrefij` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ainfrme`
--

DROP TABLE IF EXISTS `ainfrme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ainfrme` (
  `cafecinf` date NOT NULL,
  `pacodinf` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodinf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ainfrme`
--

LOCK TABLES `ainfrme` WRITE;
/*!40000 ALTER TABLE `ainfrme` DISABLE KEYS */;
/*!40000 ALTER TABLE `ainfrme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aiteinf`
--

DROP TABLE IF EXISTS `aiteinf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aiteinf` (
  `pacodite` varchar(10) NOT NULL,
  `facodinf` varchar(10) NOT NULL,
  `facodmcl` varchar(10) NOT NULL,
  `facodvcl` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodite`),
  KEY `IXFK_Iteminforme_Informe` (`facodinf`),
  KEY `IXFK_Iteminforme_Miembro-celula` (`facodmcl`),
  KEY `IXFK_Iteminforme_Visita_celula` (`facodvcl`),
  CONSTRAINT `FK_iteinf_infrme` FOREIGN KEY (`facodinf`) REFERENCES `ainfrme` (`pacodinf`),
  CONSTRAINT `FK_iteinf_miecel` FOREIGN KEY (`facodmcl`) REFERENCES `amiecel` (`pacodmcl`),
  CONSTRAINT `FK_iteinf_viscel` FOREIGN KEY (`facodvcl`) REFERENCES `aviscel` (`pacodvcl`),
  CONSTRAINT `FK_Iteminforme_Informe` FOREIGN KEY (`facodinf`) REFERENCES `ainfrme` (`pacodinf`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_Iteminforme_Miembro-celula` FOREIGN KEY (`facodmcl`) REFERENCES `amiecel` (`pacodmcl`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_Iteminforme_Visita_celula` FOREIGN KEY (`facodvcl`) REFERENCES `aviscel` (`pacodvcl`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aiteinf`
--

LOCK TABLES `aiteinf` WRITE;
/*!40000 ALTER TABLE `aiteinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `aiteinf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amaetro`
--

DROP TABLE IF EXISTS `amaetro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amaetro` (
  `facodmie` varchar(10) NOT NULL,
  `pacodmae` varchar(10) NOT NULL,
  `caestmae` tinyint(1) NOT NULL,
  PRIMARY KEY (`pacodmae`),
  KEY `IXFK_Maestro_Miembro` (`facodmie`),
  CONSTRAINT `FK_Maestro_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_maetro_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amaetro`
--

LOCK TABLES `amaetro` WRITE;
/*!40000 ALTER TABLE `amaetro` DISABLE KEYS */;
INSERT INTO `amaetro` VALUES ('MBR-000001','MTR-000001',1),('MBR-000008','MTR-000002',1),('MBR-000007','MTR-000003',0),('MBR-000004','MTR-000006',1);
/*!40000 ALTER TABLE `amaetro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amatula`
--

DROP TABLE IF EXISTS `amatula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amatula` (
  `caestmat` tinyint(1) NOT NULL,
  `cafecmat` date NOT NULL,
  `cahormat` time NOT NULL,
  `pacodmat` varchar(10) NOT NULL,
  `facodalu` varchar(10) NOT NULL,
  `facodcur` varchar(10) NOT NULL,
  `facodusu` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodmat`),
  KEY `IXFK_Matriculacion_escuela_Alumno` (`facodalu`),
  KEY `IXFK_Matriculacion_escuela_Curso` (`facodcur`),
  KEY `IXFK_Matriculacion_escuela_Usuario` (`facodusu`),
  CONSTRAINT `FK_Matriculacion_escuela_Alumno` FOREIGN KEY (`facodalu`) REFERENCES `aalumno` (`pacodalu`),
  CONSTRAINT `FK_Matriculacion_escuela_Curso` FOREIGN KEY (`facodcur`) REFERENCES `acursom` (`pacodcur`),
  CONSTRAINT `FK_Matriculacion_escuela_Usuario` FOREIGN KEY (`facodusu`) REFERENCES `ausurio` (`pacodusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amatula`
--

LOCK TABLES `amatula` WRITE;
/*!40000 ALTER TABLE `amatula` DISABLE KEYS */;
INSERT INTO `amatula` VALUES (1,'2013-10-21','00:31:00','MAT-000001','ALU-000002','CUR-000001','USU-000001'),(1,'2013-10-21','00:40:00','MAT-000002','ALU-000001','CUR-000001','USU-000001'),(1,'2023-10-21','23:29:00','MAT-000003','ALU-000005','CUR-000001','USU-000001'),(1,'2031-10-21','10:18:00','MAT-000004','ALU-000002','CUR-000002','USU-000001'),(1,'2031-10-21','10:28:00','MAT-000005','ALU-000006','CUR-000003','USU-000001'),(1,'2021-11-07','10:21:00','MAT-000006','ALU-000007','CUR-000003','USU-000001'),(1,'2021-11-09','19:55:00','MAT-000007','ALU-000007','CUR-000002','USU-000001'),(1,'2021-12-11','18:10:00','MAT-000008','ALU-000009','CUR-000005','USU-000001');
/*!40000 ALTER TABLE `amatula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amiebro`
--

DROP TABLE IF EXISTS `amiebro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amiebro` (
  `camatmie` varchar(30) DEFAULT NULL,
  `capatmie` varchar(30) DEFAULT NULL,
  `cacelmie` varchar(15) DEFAULT NULL,
  `cacidmie` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cacidext` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cadirmie` varchar(100) DEFAULT NULL,
  `caestmie` tinyint(1) NOT NULL,
  `ceestciv` varchar(30) DEFAULT NULL,
  `cafecnac` date DEFAULT NULL,
  `cafotmie` blob,
  `canommie` varchar(30) NOT NULL,
  `facodciu` varchar(10) DEFAULT NULL,
  `facodpro` varchar(10) DEFAULT NULL,
  `pacodmie` varchar(10) NOT NULL,
  `caurlfot` varchar(90) DEFAULT NULL,
  `cabanmae` tinyint(1) NOT NULL,
  `cabanalu` tinyint(1) NOT NULL,
  `cafecenc` date DEFAULT NULL,
  `cafecbau` date DEFAULT NULL,
  `cafeccon` date DEFAULT NULL,
  `cafecigl` date DEFAULT NULL,
  PRIMARY KEY (`pacodmie`),
  KEY `FK_Miembro_Ciudad` (`facodciu`),
  KEY `FK_Miembro_Profesion` (`facodpro`),
  CONSTRAINT `FK_Miembro_Ciudad` FOREIGN KEY (`facodciu`) REFERENCES `aciudad` (`pacodciu`),
  CONSTRAINT `FK_Miembro_Profesion` FOREIGN KEY (`facodpro`) REFERENCES `aproion` (`pacodpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amiebro`
--

LOCK TABLES `amiebro` WRITE;
/*!40000 ALTER TABLE `amiebro` DISABLE KEYS */;
INSERT INTO `amiebro` VALUES ('VILLENA','MAMANI','69317832','7222862','','/B. MOTO MENDEZ',1,'SOLTERO/A','1994-03-31','','MARCO','CIU-000001','PRO-000001','MBR-000001','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000001MARCO220222103011.jmysqli',0,0,'2022-02-18','2022-02-06','2022-02-12','2022-02-20'),('VILLENA','OCAMPO','6545321','6549875','','B/ BOLIVAR C/ BELGRANO',1,'SOLTERO/A','1995-08-05','','JORGE','CIU-000001','PRO-000001','MBR-000002','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000002JORGE220222103347.jmysqli',1,1,'2022-02-11','2022-02-05','2022-02-18','2022-02-20'),('MARTINEZ','FLORES','654987','6549877','','B/ CENTRAL C/VILLARROEL',1,'SOLTERO/A','2000-05-08','','MATIAS','CIU-000001','PRO-000004','MBR-000004','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000004MATIAS220222103411.jmysqli',1,1,'2022-02-13','2022-02-12','2022-02-18','2022-02-06'),('MOLLO','SALINAZ','654987','6543218','','B/ MOTO MENDEZ C/COCHABAMBA',1,'CASADO/A','1999-05-31','','HECTOR','CIU-000001','PRO-000016','MBR-000005','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000005HECTOR220222103311.jmysqli',0,1,'2022-02-06','2022-02-08','2022-02-11','2022-02-03'),('FLORES','FARFAN','36559','2564788','','B/ CENTRAL C/COCHABAMBA',1,'SOLTERO/A','1999-08-05','','LUIS MARTIN','CIU-000001','PRO-000007','MBR-000006','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000006LUIS MARTIN220222103454.jmysqli',0,1,'2022-02-12','2022-02-06','2022-02-19','2022-02-20'),('YAPU','GONZALES','987654','9876548','','B/ AEROPUERTO C/ARGENTINA',1,'SOLTERO/A','1993-05-25','','MIGUEL','CIU-000001','PRO-000002','MBR-000007','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000007MIGUEL220222103235.jmysqli',1,1,'2022-02-05','2022-02-20','2022-02-19','2022-02-20'),('MORALES','TOLABA','987654','6546456','','B/ CENTRAL C/ MARISCAL SANTA CRUZ',1,'SOLTERO/A','1990-08-05','','CRISTIAN','CIU-000001','PRO-000019','MBR-000008','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000008CRISTIAN220222103205.jmysqli',1,1,'2022-02-05','2022-02-12','2022-02-18','2022-02-13'),('VARGAS','CONDORI','6587654','9876548','','B/ MOTO MENDEZ C/COCHABAMBA',1,'CASADO/A','2001-02-08','','JULIO','CIU-000002','PRO-000015','MBR-000009','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000009JULIO220222103133.jmysqli',0,1,'2022-02-13','2022-02-12','2022-02-19','2022-02-13'),('ORTIS','SALAZAR','25687','6547859','','B/ MUNICIPAL C/ NILLS KLEMEN',1,'SOLTERO/A','1998-12-11','','LUIS','CIU-000008','PRO-000006','MBR-000010','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000010LUIS220222103057.jmysqli',0,1,'2022-02-17','2022-02-19','2022-02-13','2022-02-12'),('VERAS','GARCIA','987654','6549875','','B/ LAPACHO C/ CAÑEROS',0,NULL,'1998-12-13',NULL,'ESTHER',NULL,NULL,'MBR-000014',NULL,0,0,NULL,NULL,NULL,NULL),('RAMIRES','TEJERINA','987654','9876549','','B/ 21 DE DICIEMBRE C/ PEDRO DOMINGO MURILLO',1,'SOLTERO/A','1998-05-08',NULL,'YULIANA','CIU-000003','PRO-000001','MBR-000015','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000015YULIANA130222103636.jmysqli',0,0,NULL,NULL,NULL,NULL),('QUISPE','MARTINEZ','321654','6832148','','B/ LINDO C/ BENI',0,NULL,'1997-05-02',NULL,'LUCIA',NULL,NULL,'MBR-000016',NULL,0,0,NULL,NULL,NULL,NULL),('VILTE','GONZALES','654987','9876541','','B/ AEROPUERTO C/ ARGENTINA',0,NULL,'1995-03-13',NULL,'PAULINA',NULL,NULL,'MBR-000017',NULL,0,0,NULL,NULL,NULL,NULL),('BALDEVIEZO','ZOTAR','987654','654654','','B/ LINDO C/ ANICETO ARCE',0,NULL,'1995-12-14',NULL,'JOSE MANUEL',NULL,NULL,'MBR-000018',NULL,0,0,NULL,NULL,NULL,NULL),('','GONZALES','98756','6579875','1G','B/ LAS PALMERAS',1,'SOLTERO/A','2010-01-19','','SEBASTIAN','CIU-000001','PRO-000001','MBR-000019','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000019SEBASTIAN220222103031.jmysqli',0,0,'2022-02-12','2022-02-13','2022-02-11','2022-02-20'),('','GALLARDO','657835','6549873','1S','B/ MUNICIPAL C/ GUADARQUIVIR',0,NULL,'2010-01-21',NULL,'ESTEBAN',NULL,NULL,'MBR-000020',NULL,0,0,NULL,NULL,NULL,NULL),('MIRANDA','AGUIRRE','896543','3565789','','B/MOTO MENDEZ C/ AMELLER ',1,'CASADO/A','1999-05-18',NULL,'JUAN EZEQUIEL','CIU-000003','PRO-000014','MBR-000021','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000021JUAN EZEQUIEL210322100111.jmysqli',0,0,'2022-03-04','2022-03-18','2022-03-17','2022-03-17'),('SANCHES','CONDORI','876654','9876543','','B7 21 DE DICIEMBRE C/ PEDRO DOMINGO MURILLO',0,NULL,'2010-03-21',NULL,'EDUARDO',NULL,NULL,'MBR-000022',NULL,0,0,NULL,NULL,NULL,NULL),('FLORES','ALDUNATE','987654','6598735','','B/ MUNICIPAL C/ FRANZ TAMAYO',1,'SOLTERO/A','1991-02-23',NULL,'OSCAR','CIU-000005','PRO-000006','MBR-000023','/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000023OSCAR300322122021.jmysqli',0,0,'2022-03-11','2022-03-19','2022-03-19','2022-03-19'),('VENTURA','LLANOS','5632165','1235687','1S','B/ SAN JOSE C/ LA PAZ',0,NULL,'1996-03-28',NULL,'GABRIELA',NULL,NULL,'MBR-000024',NULL,0,0,NULL,NULL,NULL,NULL),('MARTINES','MORALES','654975','5687652','','B7 BOLIVAR',0,NULL,'2006-03-17',NULL,'ESTEBAN',NULL,NULL,'MBR-000025',NULL,0,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `amiebro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amiecel`
--

DROP TABLE IF EXISTS `amiecel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amiecel` (
  `cafunmie` varchar(20) NOT NULL,
  `facodcel` varchar(10) NOT NULL,
  `facodmie` varchar(10) NOT NULL,
  `pacodmcl` varchar(10) NOT NULL,
  `caestmcl` tinyint(1) NOT NULL,
  PRIMARY KEY (`pacodmcl`),
  KEY `IXFK_Miembro-celula_Celula` (`facodcel`),
  KEY `IXFK_Miembro-celula_Miembro` (`facodmie`),
  CONSTRAINT `FK_miecel_celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`),
  CONSTRAINT `FK_miecel_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`),
  CONSTRAINT `FK_Miembro-celula_Celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_Miembro-celula_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amiecel`
--

LOCK TABLES `amiecel` WRITE;
/*!40000 ALTER TABLE `amiecel` DISABLE KEYS */;
INSERT INTO `amiecel` VALUES ('LIDER','CEL-000001','MBR-000002','MCL-000001',1),('DISCIPULO/A','CEL-000001','MBR-000001','MCL-000002',1),('LIDER','CEL-000003','MBR-000004','MCL-000003',1),('DISCIPULO/A','CEL-000003','MBR-000005','MCL-000004',1),('LIDER','CEL-000008','MBR-000006','MCL-000005',1),('LIDER','CEL-000009','MBR-000007','MCL-000006',1),('DISCIPULO/A','CEL-000008','MBR-000008','MCL-000007',1),('DISCIPULO/A','CEL-000003','MBR-000009','MCL-000008',1),('DISCIPULO/A','CEL-000011','MBR-000010','MCL-000009',1),('DISCIPULO/A','CEL-000012','MBR-000014','MCL-000013',1),('LIDER','CEL-000012','MBR-000015','MCL-000014',1),('ANFITRION','CEL-000012','MBR-000016','MCL-000015',1),('ASISTENTE','CEL-000012','MBR-000017','MCL-000016',1),('DISCIPULO/A','CEL-000010','MBR-000018','MCL-000017',1),('LIDER','CEL-000011','MBR-000019','MCL-000018',1),('DISCIPULO/A','CEL-000002','MBR-000020','MCL-000019',1),('LIDER','CEL-000013','MBR-000021','MCL-000020',1),('DISCIPULO/A','CEL-000009','MBR-000022','MCL-000021',1),('ASISTENTE','CEL-000009','MBR-000023','MCL-000022',1),('DISCIPULO/A','CEL-000012','MBR-000024','MCL-000023',1),('DISCIPULO/A','CEL-000013','MBR-000025','MCL-000024',1);
/*!40000 ALTER TABLE `amiecel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aproion`
--

DROP TABLE IF EXISTS `aproion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aproion` (
  `canompro` varchar(30) NOT NULL,
  `pacodpro` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aproion`
--

LOCK TABLES `aproion` WRITE;
/*!40000 ALTER TABLE `aproion` DISABLE KEYS */;
INSERT INTO `aproion` VALUES ('ESTUDIANTE','PRO-000001'),('ING. SISTEMAS','PRO-000002'),('COMERCIANTE','PRO-000003'),('DOCTOR','PRO-000004'),('ING. INDUSTRIAL','PRO-000006'),('ABOGADO','PRO-000007'),('DENTISTA','PRO-000008'),('VETERINARIO','PRO-000009'),('CONTADOR','PRO-000010'),('ARQUITECTO','PRO-000011'),('ING. CIVIL','PRO-000012'),('LICENCIADO','PRO-000013'),('ING. COMERCIAL','PRO-000014'),('MECANICO','PRO-000015'),('ELECTRICISTA','PRO-000016'),('PERIODISTA','PRO-000017'),('PSICOLOGO','PRO-000019');
/*!40000 ALTER TABLE `aproion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ausurio`
--

DROP TABLE IF EXISTS `ausurio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ausurio` (
  `caconusu` varchar(100) NOT NULL,
  `catipusu` varchar(20) NOT NULL,
  `canomusu` varchar(15) NOT NULL,
  `facodmie` varchar(10) NOT NULL,
  `pacodusu` varchar(10) NOT NULL,
  `caestusu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pacodusu`),
  KEY `IXFK_Usuario_Miembro` (`facodmie`),
  CONSTRAINT `FK_Usuario_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_usurio_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ausurio`
--

LOCK TABLES `ausurio` WRITE;
/*!40000 ALTER TABLE `ausurio` DISABLE KEYS */;
INSERT INTO `ausurio` VALUES ('40bd001563085fc35165329ea1ff5c5ecbdbbeef','ADMINISTRADOR','marck46','MBR-000001','USU-000001',1),('d36550fc4422fde2c3bb4169c939e24e583e79f0','TESORERO','hecsal5.tes','MBR-000005','USU-000004',1),('4b40c73283ebb2e860de3212fd3f2e5c1bc945d8','SECRETARIO','jorg_010@secre','MBR-000002','USU-000010',1),('2c1c7b7a6dbeea0565fe20376a53ed22688a43f7','TESORERO','luis_011@tesor','MBR-000010','USU-000011',1),('c4c774d6fe972d448cf792f43d3da6835c11c94d','TESORERO','seba_012@tesor','MBR-000019','USU-000012',1),('e19399c1a9d9c0f3b9f2dc34a73c96bf7fea99fb','LIDER','jorg_013@lider','MBR-000002','USU-000013',1),('96d42399a5c9ecbe3bbfc5956e922418a6647135','TESORERO','juan_014@tesor','MBR-000021','USU-000014',1);
/*!40000 ALTER TABLE `ausurio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aviscel`
--

DROP TABLE IF EXISTS `aviscel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aviscel` (
  `cafecvis` date NOT NULL,
  `facodcel` varchar(10) NOT NULL,
  `facodvis` varchar(10) NOT NULL,
  `pacodvcl` varchar(10) NOT NULL,
  `caestvcl` tinyint(1) NOT NULL,
  `pacodvis` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pacodvcl`),
  KEY `IXFK_Visita_celula_Celula` (`facodcel`),
  KEY `IXFK_Visita_celula_Visita` (`facodvis`),
  CONSTRAINT `FK_viscel_celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`),
  CONSTRAINT `FK_viscel_visita` FOREIGN KEY (`facodvis`) REFERENCES `avisita` (`pacodvis`),
  CONSTRAINT `FK_Visita_celula_Celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_Visita_celula_Visita` FOREIGN KEY (`facodvis`) REFERENCES `avisita` (`pacodvis`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aviscel`
--

LOCK TABLES `aviscel` WRITE;
/*!40000 ALTER TABLE `aviscel` DISABLE KEYS */;
/*!40000 ALTER TABLE `aviscel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avisita`
--

DROP TABLE IF EXISTS `avisita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avisita` (
  `caapavis` varchar(30) DEFAULT NULL,
  `caamavis` varchar(30) DEFAULT NULL,
  `cadirvis` varchar(60) NOT NULL,
  `canomvis` varchar(30) NOT NULL,
  `catelvis` varchar(15) NOT NULL,
  `caestvis` tinyint(1) NOT NULL,
  `pacodvis` varchar(10) NOT NULL,
  PRIMARY KEY (`pacodvis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avisita`
--

LOCK TABLES `avisita` WRITE;
/*!40000 ALTER TABLE `avisita` DISABLE KEYS */;
/*!40000 ALTER TABLE `avisita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `num_correlativo`
--

DROP TABLE IF EXISTS `num_correlativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `num_correlativo` (
  `codigo` varchar(10) NOT NULL,
  `correlativo` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_correlativo`
--

LOCK TABLES `num_correlativo` WRITE;
/*!40000 ALTER TABLE `num_correlativo` DISABLE KEYS */;
INSERT INTO `num_correlativo` VALUES ('ALU','9'),('BAR','17'),('CAJ','9'),('CAL','16'),('CEL','13'),('CIU','1'),('CON','5'),('CUR','6'),('del','2'),('EGE','6'),('EGR','39'),('ING','52'),('MAE','1'),('MAT','8'),('MBR','25'),('MCL','24'),('MTR','6'),('PRO','19'),('USU','14');
/*!40000 ALTER TABLE `num_correlativo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-30 11:44:52
