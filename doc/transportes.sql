-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: transportes
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

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
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistencia` (
  `id_asistencia` int NOT NULL AUTO_INCREMENT,
  `id_login` int DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horasalida` time DEFAULT NULL,
  `tiempo_uso` float DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_login` (`id_login`),
  CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (1,1,'Entrada','22:05:20','2023-05-17',NULL,NULL),(2,1,'Entrada','22:59:16','2023-05-17',NULL,NULL),(3,1,'Entrada','22:59:16','2023-05-17',NULL,NULL),(4,2,'Entrada','23:44:46','2023-05-17',NULL,NULL),(5,1,'Entrada tarde','11:02:57','2023-05-18',NULL,NULL),(6,2,'Entrada tarde','11:03:59','2023-05-18',NULL,NULL),(7,1,'Entrada comun','12:01:36','2023-05-18',NULL,NULL),(8,2,'Entrada comun','12:13:16','2023-05-18',NULL,NULL),(9,1,'Entrada comun','14:25:25','2023-05-18',NULL,NULL),(10,1,'Entrada comun','14:35:54','2023-05-18',NULL,NULL),(11,1,'Entrada comun','14:36:25','2023-05-18',NULL,NULL),(12,1,'Entrada comun','11:59:40','2023-05-19',NULL,NULL),(13,1,'Entrada comun','15:53:08','2023-05-19',NULL,NULL),(14,1,'Entrada comun','20:58:58','2023-05-19',NULL,NULL),(15,5,'','20:33:57','2024-04-10','20:34:23',0.433333),(16,1,'','20:34:51','2024-04-10',NULL,NULL),(17,1,'','18:14:54','2024-04-30',NULL,NULL),(18,1,'','15:58:13','2024-07-17',NULL,NULL);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ausencia`
--

DROP TABLE IF EXISTS `ausencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ausencia` (
  `id_ausencia` int NOT NULL AUTO_INCREMENT,
  `id_personal` int DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `descripcion` text,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `duracion` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_ausencia`),
  KEY `id_personal` (`id_personal`),
  CONSTRAINT `ausencia_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ausencia`
--

LOCK TABLES `ausencia` WRITE;
/*!40000 ALTER TABLE `ausencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ausencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boleta`
--

DROP TABLE IF EXISTS `boleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boleta` (
  `id_boleta` int NOT NULL AUTO_INCREMENT,
  `id_personal` int DEFAULT NULL,
  `id_cargo` int DEFAULT NULL,
  `id_ausencia` int DEFAULT NULL,
  `fecha_boleta` datetime DEFAULT NULL,
  `horas_trabajadas` float DEFAULT NULL,
  `horas_extras` float DEFAULT NULL,
  `horas_ausentes` float DEFAULT NULL,
  `pago_total` float DEFAULT NULL,
  PRIMARY KEY (`id_boleta`),
  KEY `id_personal` (`id_personal`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_ausencia` (`id_ausencia`),
  CONSTRAINT `boleta_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  CONSTRAINT `boleta_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `boleta_ibfk_3` FOREIGN KEY (`id_ausencia`) REFERENCES `ausencia` (`id_ausencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boleta`
--

LOCK TABLES `boleta` WRITE;
/*!40000 ALTER TABLE `boleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `boleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargo` (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `cargo` varchar(25) DEFAULT NULL,
  `pago_hora` float DEFAULT NULL,
  `planilla` tinyint(1) DEFAULT NULL,
  `nivel_usuario` int DEFAULT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `horas_trabajo` int DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'director',10,1,1,'completo',9),(2,'personal',5,0,2,'completo',9),(4,'seguridad',3,0,3,'medio',5);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `id_personal` int DEFAULT NULL,
  `id_cargo` int DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,1,1,'zeta','$2y$10$Ue8P6nvBdfbPoIW2SrG24.pUGZNQuyPQgj1ri6PruW9pch9/T6MUW'),(2,2,4,'johan','$2y$10$RdFtk2qbA1GFqvNsoCMF4OfvjF7FE8Syljfewdy0GDxJ5JJ17JJ42'),(3,3,1,'elmer','$2y$10$PRRAuRVgDaaDDhRgBhtSh.gsmV/ma.9eQwqQcZWZVhoShidd/9iym'),(5,5,2,'engel','$2y$10$vAYfilsGhVBzxe7D5Jmrre5kk1udyDlpL5KUx/aviyWCc70eKLIzi');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `id_personal` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `dni` int DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `id_cargo` int DEFAULT NULL,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `telefono` (`telefono`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'jersson','quispe','masculino',72535244,998777712,'pierdete buscando','puno',1),(2,'johan','apaza','masculino',72535242,998234324,'tupac','puno',2),(3,'elmer','quispe','masculino',234324,2343,'23423','puno',1),(5,'engel','cespedes','femenino',73432432,23432432,'circuvalacion','arequipa',2);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-17 15:59:39
